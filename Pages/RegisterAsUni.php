<?php 
require '../vendor/autoload.php';
require_once("../config.php");
require_once("../FormSanitizer.php"); 
require_once("../Constants.php"); 
require_once("../Account.php"); 

$account = new Account($con);

if(isset($_POST["submitButton"])) {

    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
    $emailc = FormSanitizer::sanitizeFormEmail($_POST["emailc"]);

    $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
    $passwordc = FormSanitizer::sanitizeFormPassword($_POST["passwordc"]);

    $type = $_POST["type"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $postalCode = $_POST["postalCode"];
    
    $success = $account->registerUni($name,$email,$emailc,$password,$passwordc, $type, $phone, $country, $city, $address, $postalCode);
    if($success) {
        header("Location: ../index.php");
    }
    else{
      echo("FAILED");
    }
}

function getInputValue($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

?>
<html lang="en" dir = "ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../CSS/RegisterAsUni.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="signInContainer">
        <div class="column">
            <div class="header">
                <a class="logoContainer" href="index.php">
                  
                </a>
                <hr>
                <h3>Sign Up</h3>
                <span>to continue to Horizon</span>
            </div>
            <div class="loginForm">
                <form action="RegisterAsUni.php" method="POST">
                    <input type="text" name="name" value="<?php getInputValue('name'); ?>" placeholder="Name" autocomplete="off" required>
                  
                    
                    <?php echo $account->getError(Constants::$emailLength); ?>
                    <?php echo $account->getError(Constants::$emailsMismatch); ?>
                    <?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                    <input type="email" name="email" value="<?php getInputValue('email'); ?>" placeholder="Your Email" require>
                    <input type="email" name="emailc" value="<?php getInputValue('emailc'); ?>" placeholder="Confirm Email" autocomplete="off" required>

                    <?php echo $account->getError(Constants::$passwordsMismatch); ?>
                    <?php echo $account->getError(Constants::$passwordCharacters); ?>
                    <input type="password" name="password" placeholder="New Password" autocomplete="off" required>
                    <input type="password" name="passwordc" placeholder="Confirm Password" autocomplete="off" required>
                    <input type="text" name="type" value="<?php getInputValue('type'); ?>" placeholder="applicant / institute" autocomplete="off" required>
                    <input type="tel" name="phone" value="<?php getInputValue('phone'); ?>" placeholder="123-45-678" autocomplete="off" required>
                    <input type="text" name="country" value="<?php getInputValue('country'); ?>" placeholder="Country" autocomplete="off" required>
                    <input type="text" name="city" value="<?php getInputValue('city'); ?>" placeholder="City" autocomplete="off" required>
                    <input type="text" name="address" value="<?php getInputValue('address'); ?>" placeholder="Address" autocomplete="off" required>
                    <input type="text" name="postalCode" value="<?php getInputValue('postalCode'); ?>" placeholder="Postal Code" autocomplete="off" required>
                    
                    <input type="submit" name="submitButton" value="Sign up">
                </form>
            </div>
            <a class="signInMessage" href="index.php">Already have an account? Sign in here!</a>
        </div>
    </div>
</body>
