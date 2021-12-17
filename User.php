<?php

class User {
    private $con, $data;
    
    public function __construct($con, $username) {
        if(!$username == "") {
            $this->con = $con;
            $q = $this->con->users->findOne(["username" => (string) $username]);
            $this->data = ($q == null) ? "" : $q;
        }
        else {
            $this->data = $username;
        }
    }
    public static function isLoggedIn() {
        return isset($_SESSION["loggedIn"]) ? $_SESSION["loggedIn"] : "";
    }
    public function getUsername() {
        return (!$this->data == null) ? $this->data["username"] : null;
    }
    public function getName() {
        return $this->data["firstName"] . " " . $this->data["lastName"];
    }
    public function getFirstName() {
        return $this->data["firstName"];
    }
    public function getLastName() {
        return $this->data["lastName"];
    }
    public function getEmail() {
        return $this->data["email"];
    }
    public function getPictureID() {
        return $this->data["profilePic"];
    }
    public function getPicture() {
        try {
            $q = $this->con->files->findOne(['_id' => $this->data["profilePic"]]);
            return utf8_decode($q["content"]);
        } catch (\Exception $e) {
            return "Could not retrieve picture from database";
        }
    }
    public function getSignUpDate() {
        return $this->data["signUpDate"];
    }
}

?>