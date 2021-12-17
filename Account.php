<?php
include_once("User.php");
include_once("Mailer.php");

class Account {
    // used to validate and insert an Account's data
    private $con;
    private $errors = array();
    public function __construct($con) {
        $this->con = $con;
    }
    public function registerStudent($fn, $ln, $un, $em, $emc, $pw, $pwc, $tp) {
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUsername($un);
        $this->validateEmailR($em, $emc);
        $this->validatePasswords($pw, $pwc);
        if(empty($this->errors)) {
            $result = $this->insertUserDetailsStudent($fn, $ln, $un, $em, $pw, $tp);
            if($result != null){
                $mailer = new Mailer($this->con);
                $verK = new MongoDB\Bson\ObjectID();
                $mailer->sendVerMail($em, $verK);
                $q = $this->con->users->updateOne(['email'=>$em],['$set'=>['verificationID'=>$verK]]);
                return $result;
            } else {
                return $result;
            }
        }
        else {
            return false;
        }
    }
    public function registerUni($fn, $em, $emc, $pw, $pwc, $tp, $phone, $country, $city, $address, $postalCode) {
        $this->validateEmailR($em, $emc);
        $this->validatePasswords($pw, $pwc);
        if(empty($this->errors)) {
            $result = $this->insertUserDetailsUni($fn, $em, $emc, $pw, $pwc, $tp, $phone, $country, $city, $address, $postalCode);
            if($result != null){
                $mailer = new Mailer($this->con);
                $verK = new MongoDB\Bson\ObjectID();
                $mailer->sendVerMail($em, $verK);
                $q = $this->con->users->updateOne(['email'=>$em],['$set'=>['verificationID'=>$verK]]);
                return $result;
            } else {
                return $result;
            }
        }
        else {
            return false;
        }
    }
    public function login($em, $pw) {
        $pw = hash("sha512", $pw);
        $q = $this->con->users->findOne(["email" => (string) $em, "password" => (string) $pw]);
        if($q != null) {
            return true;
        }
        else {
            array_push($this->errors, Constants::$loginFailed);
            return false;
        }
    }
    public function getDefaultPic() {
        $q = $this->con->files->findOne(['username' => 'default', 'usage' => 'profilePic'], ['$projection' =>['_id' => 1, 'content' => 0]]);
        return $q['_id'];
    }
    public function insertUserDetailsStudent($fn, $ln, $un, $em, $pw, $tp) {
        $pw = hash("sha512", $pw);
        $profilePic = $this->getDefaultPic();

        $q = $this->con->users->insertOne([
            "firstName" => $fn,
            "lastName" => $ln,
            "username" => $un,
            "email" => $em,
            "password" => $pw,
            "profilePic" => $profilePic,
            "signUpDate" => date("Y/m/d"),
            "type" => $tp
        ]);

        return $q;
    }
    public function insertUserDetailsUni($fn, $em, $emc, $pw, $pwc, $tp, $phone, $country, $city, $address, $postalCode) {
        $pw = hash("sha512", $pw);
        $profilePic = $this->getDefaultPic();

        $q = $this->con->users->insertOne([
            "name" => $fn,
            "email" => $em,
            "password" => $pw,
            "profilePic" => $profilePic,
            "signUpDate" => date("Y/m/d"),
            "type" => $tp,
            "phone" => $phone,
            "country" => $country,
            "city" => $city,
            "address" => $address,
            "postalCode" => $postalCode
        ]);

        return $q;
    }
    private function validateFirstName($fn) {
        if(strlen($fn)>25 || strlen($fn) < 2) {
            array_push($this->errors, Constants::$nameLength);
        }
    }
    private function validateLastName($ln) {
        if(strlen($ln)>25 || strlen($ln) < 2) {
            array_push($this->errors, Constants::$nameLength);
        }
    }
    private function validateUsername($un) {
        if(strlen($un)>50 || strlen($un) < 2) {
            array_push($this->errors, Constants::$usernameLength);
            return;
        }
        $q = $this->con->users->findOne(["username" => $un]);
        if($q != null) {
            array_push($this->errors, Constants::$usernameTaken);
        }
    }
    private function validatePicture($pp) {
        if($pp['size'] > 10485760) {
            array_push($this->errors, Constants::$imageTooBig);
        }
    }
    private function validateEmailR($em,$emc) {
        if($em != $emc) {
            array_push($this->errors, Constants::$emailsMismatch);
        }
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errors, Constants::$emailInvalid);
        }
        if(strlen($em)>255 || strlen($em) < 8) {
            array_push($this->errors, Constants::$emailLength);
            return;
        }
        $q = $this->con->users->findOne(["email" => $em]);
        if($q != null) {
            array_push($this->errors, Constants::$emailTaken);
        }
    }
    private function validateEmailU($em, $un) {
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errors, Constants::$emailInvalid);
        }
        if(strlen($em)>255 || strlen($em) < 8) {
            array_push($this->errors, Constants::$emailLength);
            return;
        }
        $q = $this->con->users->findOne(['email' => $em, 'username' => ['$not' => ['$eq' => $un]]]);
        if($q != null) {
            array_push($this->errors, Constants::$emailTaken);
        }
    }
    private function verifyPassword($un, $pw) {
        $pw = hash("sha512", $pw);
        $q = $this->con->users->findOne(['username' => $un], ['projection' => ['password' => 1]]);
        $hash = $q["password"];
        if($pw == $hash) {
            return true;
        }
        else {
            array_push($this->errors, Constants::$passwordInvalid);
            return false;
        }
    }
    public function verifyEmailRecovery($em){
        $q = $this->con->users->findOne(['email' => $em]);
        if($q["email"] != null){
            return true;
        }
        else {
            array_push($this->errors, Constants::$emailInvalid);
            return false;
        }
    }
    private function validatePasswords($pw,$pwc) {
        if($pw != $pwc) {
            array_push($this->errors, Constants::$passwordsMismatch);
        }
        if(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%^&*()\?])[0-9A-Za-z!@#$%^&*()\?]{8,25}$/", $pw)) {
            array_push($this->errors, Constants::$passwordCharacters);
        }
    }
    private function getImageData($pp) {
        return utf8_encode(file_get_contents($pp["tmp_name"]));
    }
    public function getError($error) {
        if(in_array($error, $this->errors)) {
            return "<span class='errorMessage'>$error</span>";
        }
    }
    public function updateDetails($fn, $ln, $em, $un, $pw) {
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmailU($em, $un);
        $this->verifyPassword($un, $pw);
        if(empty($this->errors)) {
            $q = $this->con->users->updateOne(
                ['username' => $un], 
                ['firstName' => $fn, 'lastName' => $ln, 'email' => $em]
            );
            return true;
        }
        else {
            
            return false;
        }
    }
    private function uploadProfilePicture($pp, $un) {
        try{
            $data = $this->getImageData($pp);
            $uploadContent = ['content' => $data, 'username' => $un, 'usage' => 'profilePic'];
            $q = $this->con->files->insertOne($uploadContent);
            return $q->getInsertedId();;
        } catch (\Exception $e) {
            array_push($this->errors, Constants::$uploadError);
            return false;
        }
    }
    public function deleteOldPicture($un) {
        $def = $this->getDefaultPic();
        $pp = new User($this->con, $un);
        $pp = $pp->getPictureID();
        if ($pp != $def) {
            try {
                $q = $this->con->files->deleteOne(['_id' => $pp]);
                $u = $this->con->users->updateOne(['username' => $un], ['$set' => ['profilePic' => $def]]);
                return true;
            } catch (\Exception $e){
                array_push($this->errors, Constants::$uploadError);
                return false;
            }
        }
        else {
            return false;
        }
    }
    public function updatePicture($pp, $un) {
        $this->validatePicture($pp);
        $this->deleteOldPicture($un);
        if(empty($this->errors)) {
            $id = $this->uploadProfilePicture($pp, $un);
            if (empty($this->errors)) {
                $q = $this->con->users->updateOne(["username" => $un], ['$set' => ["profilePic" => $id]]);
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    public function getFirstError() {
        if(!empty($this->errors)) {
            return $this->errors[0];
        }
        else {
            return "";
        }
    }
    public function updatePassword($pw, $npw, $npwc, $un) {
        $this->verifyPassword($un, $pw);
        $this->validatePasswords($npw, $npwc);
        $npw = hash("sha512", $npw);
        if(empty($this->errors)) {
            $q = $this->con->users->updateOne(['username' => $un], ['$set' => ['password' => $npw]]);
            return true;
        }
        else {
            
            return false;
        }
    }
    public function recoverPassword($npw, $npwc, $un) {
        $this->validatePasswords($npw, $npwc);
        $npw = hash("sha512", $npw);
        if(empty($this->errors)) {
            $q = $this->con->users->updateOne(['username' => $un], ['$set' => ['password' => $npw]]);
            return true;
        }
        else {
            
            return false;
        }
    }
}

?>