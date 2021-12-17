<?php 
require_once("config.php");
require_once("FormSanitizer.php"); 
require_once("Constants.php"); 
require_once("Account.php"); 
require_once("SettingsForm.php");
 
$formProvider = new SettingsForm();
$verifyMessage = "";
if(isset($_GET["key"])){
    $keyString = $_GET['key'];
    $key = new MongoDB\Bson\ObjectID($_GET["key"]);
    $q = $con->users->count(["verificationID"=>$key]);
    if($q != null && $q == 1){
        echo $formProvider->createVerifyForm($keyString);
    }
}
elseif(isset($_POST["verify"]) && isset($_POST["key"])){
    $account = new Account($con);
    $key = new MongoDB\Bson\ObjectID($_POST["key"]);
    $q = $con->users->updateOne(['verificationID'=>$key],['$unset'=>["verificationID" => 1]]);
        if($q->getModifiedCount() == 1){
            $verifyMessage = "Email successfully verified!";
        }
        else {
            $verifyMessage = "Something went wrong..";
        }
}
else {
        $verifyMessage = "Failed to find the verification key.";
}
echo $verifyMessage;
?>