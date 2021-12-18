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
    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $postalCode = $_POST["postalCode"];
    $state = $_POST["state"];
    $province = $_POST["province"];
    $country = $_POST["country"];
    $hobbies = $_POST["hobbies"];
    $qualification = $_POST["qualification"];
    $inMajor = $_POST["inMajor"];
    $success = $account->apply($firstName,$lastname,$email,$phone,$gender,$dob,$address,$city,$postalCode,$state,$province,$country,$hobbies,$qualification,$inMajor);
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
    <link rel="stylesheet" type="text/css" href="../CSS/Applicationform.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2>Student Application form</h3>
    <form action="Applicationform.php" method="POST">
    <table align="center" cellpadding = "10">
    <!--------------------- First Name ------------------------------------------>
    <tr>
    <td>First Name</td>
    <td><input type="text" name="firstname" value="<?php getInputValue('firstname'); ?>" placeholder="First Name" autocomplete="off" required>
    (Max 50 Characters Allowed)
    </td>
    </tr>
    <!------------------------ Last Name --------------------------------------->
    <tr>
    <td>Last Name</td>
    <td><input type="text" name="lastname" value="<?php getInputValue('lastname'); ?>" placeholder="Last Name" autocomplete="off" required>
    (Max 50 Characters Allowed)
    </td>
    </tr>
    <!-------------------------- Email ID ------------------------------------->
    <tr>
    <td>Email ID</td>
    <td><input type="email" name="email" value="<?php getInputValue('email'); ?>" placeholder="Your Email" require></td>
    </tr>
    <!-------------------------- Mobile Number ------------------------------------->
    <tr>
    <td>Mobile Number</td>
    <td>
    <input type="tel" name="phone" value="<?php getInputValue('phone'); ?>" placeholder="123-45-678" autocomplete="off" required>
    (10 Digits Allowed)
    </td>
    </tr>
    <!---------------------- Gender ------------------------------------->
    <tr>
    <td>Gender</td>
    <td><input type="text" name="gender" value="<?php getInputValue('gender'); ?>" placeholder="Gender" autocomplete="off" required>
    </td>
    </tr>
    <!--------------------------Date Of Birth----------------------------------->
    <tr>
    <td>Date of Birth(DOB)</td>
    <td>
    <input type="date" name="dob" value="<?php getInputValue('dob'); ?>" placeholder="dob" autocomplete="off" required>
    </td>
    </tr>
    <!------------------------- Address ---------------------------------->
    <tr>
    <td>Address<br /><br /><br /></td>
    <td><input type="text" name="address" value="<?php getInputValue('address'); ?>" placeholder="Address" autocomplete="off" required></td>
    </tr>
    <!-------------------------- City ------------------------------------->
    <tr>
    <td>City</td>
    <td><input type="text" name="city" value="<?php getInputValue('city'); ?>" placeholder="City" autocomplete="off" required>
    (Max 50 Characters Allowed)
    </td>
    </tr>
    <!----- -------------------- Pin Code-------------------------------------->
    <tr>
    <td>Postal Code</td>
    <td><input type="text" name="postalCode" value="<?php getInputValue('postalCode'); ?>" placeholder="Postal Code" autocomplete="off" required>
    (Max 6 Numbers Allowed)
    </td>
    </tr>
    <!---------------------------- State ----------------------------------->
    <tr>
    <td>State</td>
    <td><input type="text" name="state" value="<?php getInputValue('state'); ?>" placeholder="State" autocomplete="off" required>
    (Max 50 Characters Allowed)
    </td>
    </tr>
     <!---------------------------- Province ----------------------------------->
    <td>Province</td>
    <td><input type="text" name="province" value="<?php getInputValue('province'); ?>" placeholder="Province" autocomplete="off" required>
    (Max 50 Characters Allowed)
    </td>
    </tr>
    <!------------------------------ Country --------------------------------->
    <tr>
    <td>Country</td>
    <td><input type="text" name="country" value="<?php getInputValue('country'); ?>" placeholder="Country" autocomplete="off" required></td>
    </tr>
    <!------------------------- Hobbies -------------------------------------->
    <tr>
    <td>Hobbies <br /><br /><br /></td>
    <td>
    <input type="text" name="hobbies" value="<?php getInputValue('hobbies'); ?>" placeholder="Dancing, Writing, Painting ..." autocomplete="off" required>
    (Max 50 Characters Allowed)
    </td>
    </tr>
    <!-----------------------Qualification---------------------------------------->
    <tr>
    <td>Qualification <br /><br /><br /></td>
    <td>
    <input type="text" name="qualification" value="<?php getInputValue('qualification'); ?>" placeholder="High School, Bachelor, Master ..." autocomplete="off" required>
    </td>
    </tr>
    <!---------------------------- Courses ----------------------------------->
    <tr>
    <td>Intended Major</td>
    <td>
    <input type="text" name="inMajor" value="<?php getInputValue('inMajor'); ?>" placeholder="Intended Major" autocomplete="off" required>
    </td>
    </tr>
    <!----------------------- Submit and Reset ------------------------------->
    <tr>
    <td colspan="2" align="center">
    <input type="submit" name="submitButton" value="Apply">
    </td>
    </tr>
    </table>
</form>
    </body>
</html>
