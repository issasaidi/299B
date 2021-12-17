<?php
require __DIR__ .'/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "/Users/fotoonshehabi/vendor/autoload.php";
class Mailer {
    private $clien, $key, $recipient;
    public function __construct($con) {
        $this->con = $con;
        $this->confMail();
    }
    public function setVerContent($recipient, $key){
        $this->mail->Subject = "Verification Email From Horizon";
        $this->mail->Body = "
        <!DOCTYPE>
        <html>
        <head>
        <title>Horizon Registration Email</title>
        </head>
        <body>
        <div style='border:2px solid #4A403A;height:200px;width:80%;padding:30px;overflow:auto; background-color: #EFEFEF'>
        <h1 style='color:#A45D5D'>Thank You For Choosing Our Platform</h1>
        <h2 style='color:#A45D5D'> Please use this link to verify your email</h2>
        <p style='color:#A45D5D'> Verify your email address by clicking on the following link: <span style='color:#F04E3E'>http://localhost:8888/299B/verify.php?key=$key</span></p>
        <i style='color:#A45D5D'> Have a nice day!</i>
        </div>
        </body>
        </html>
        ";
        $this->mail->addAddress($recipient);
    }
    public function setRecContent($recipient, $key){
        $this->mail->Subject = "Password Recovery Email From Horizon";
        $this->mail->Body = "
        <!DOCTYPE>
        <html>
        <head>
        <title>Horizon Password Recovery Email</title>
        </head>
        <body>
        <div style='border:2px solid #4A403A;height:200px;width:80%;padding:30px;overflow:auto; background-color: #EFEFEF'>
        <h1 style='color:#A45D5D'>If you did not submit the password recovery request ignore this email</h1>
        <h2 style='color:#A45D5D'> Please use this link to recover your account's password</h2>
        <p style='color:#A45D5D'> Recover your account's password by clicking on the following link: <span style='color:#F04E3E'>http://localhost:8888/299B/recoveryPage.php?key=$key</span></p>
        <i style='color:#A45D5D'> Have a nice day!</i>
        </div>
        </body>
        </html>
        ";
        $this->mail->addAddress($recipient);
    }

    public function confMail(){
        $mail = new PHPMailer(true);
        //$mail->SMTPDebug = 3;                               
        $mail->isSMTP();            
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;                          
        $mail->Username = "horizon299b@gmail.com";                 
        $mail->Password = "fyp299horizon";                           
        $mail->SMTPSecure = "tls";                           
        $mail->Port = 587;                                   
        $mail->From = "horizon299b@gmail.com";
        $mail->FromName = "Horizon";
        $mail->isHTML(true);
        $this->mail = $mail;
    }

    public function sendVerMail($recipient, $key){
        $this->setVerContent($recipient, $key);
        try {
            $this->mail->send();
            echo "Message has been sent successfully";
        } catch (Exception $e) {
            echo "Mailer Error: " . $this->mail->ErrorInfo;
        }
    }

    public function sendRecMail($recipient, $key){
        $this->setRecContent($recipient, $key);
        try {
            $this->mail->send();
            echo "<script>alert('Email has been sent successfully')</script>";
        } catch (Exception $e) {
            echo "<script>alert('No Bueno')</script>";
        }
    }


}