<?php
require 'backend/connection.php';
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require('phpmailer/Exception.php');
require('phpmailer/PHPMailer.php');
require('phpmailer/SMTP.php');


//Email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email)
{

    $mail = new PHPMailer(true);
    try {
        //Server settings

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'pbgp123456@gmail.com';                     //SMTP username
        $mail->Password = 'cerkaarewkaofidf';                               //SMTP password
        $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('akansha.wadkar@sigmainfo.net', 'Akansha Wadkar');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification for demo';
        $mail->Body = "Thanks for Subscribed Newsletter on supermarket!
                            <a href='http://supermarket.com/news.php?email=$email'>Verify</a>";


        $mail->send();
        return true;
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
}


if (isset($_POST['Email'])) {
    $email = $_POST['Email'];

    $query = "INSERT INTO news (UserEmail) VALUES ('$email')";
    echo $query;
    $result = mysqli_query($conn, $query);
    var_dump($result);
    if (mysqli_query($conn, $query) && sendMail($email)) {

        $msg = "Verify Mail";
        header("location: /index.php?data=$msg");

    } else {
        //if data not successfully send
        $msg = "Verification Failed";

        header("location: /index.php?data=$msg");
    }


}

?>