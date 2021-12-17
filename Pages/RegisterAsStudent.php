<?php 
require '../vendor/autoload.php';
require_once("../config.php");
require_once("../FormSanitizer.php"); 
require_once("../Constants.php"); 
require_once("../Account.php"); 

$account = new Account($con);

if(isset($_POST["submitButton"])) {
    $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
    $lastname = FormSanitizer::sanitizeFormString($_POST["lastName"]);

    $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);

    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
    $emailc = FormSanitizer::sanitizeFormEmail($_POST["emailc"]);

    $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
    $passwordc = FormSanitizer::sanitizeFormPassword($_POST["passwordc"]);

    $success = $account->register($firstName,$lastname,$username,$email,$emailc,$password,$passwordc, $type);
    if($success) {
        header("Location: ../index.php");
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
    <link rel="stylesheet" type="text/css" href="../CSS/RegisterAsStd.css">
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
                <form action="RegisterAsStudent.php" method="POST">
                    <?php echo $account->getError(Constants::$nameLength); ?>
                    <input type="text" name="firstName" value="<?php getInputValue('firstName'); ?>" placeholder="First Name" autocomplete="off" required>
                    <?php echo $account->getError(Constants::$nameLength); ?>
                    <input type="text" name="lastName" value="<?php getInputValue('lastName'); ?>" placeholder="Last Name" autocomplete="off" required>
                    
                    <?php echo $account->getError(Constants::$usernameLength); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>
                    <input type="text" name="username" value="<?php getInputValue('username'); ?>" placeholder="Username" autocomplete="off" required>
                    
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
                    
                    <input type="submit" name="submitButton" value="Sign up">
                </form>
            </div>
            <a class="signInMessage" href="index.php">Already have an account? Sign in here!</a>
        </div>
    </div>
</body>
