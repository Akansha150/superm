<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'connection.php';
require('../phpmailer/Exception.php');
require('../phpmailer/PHPMailer.php');
require('../phpmailer/SMTP.php');


//Email 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//email
function sendMail($email, $vcode)
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
        $mail->Body = "Thanks for Registration on supermarket!
                            <a href='http://supermarket.com/backend/verify.php?email=$email&vcode=$vcode '>Verify</a>";


        $mail->send();
        return true;
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
}



//login form
if (isset($_POST['login'])) {

    //fetch data from login form

    $password1 = $_POST['password'];
    $user = $_POST['user'];
//    $phone=$_POST['phone'];


    $user_exists_query = "SELECT * FROM users WHERE UserEmail='$user' OR UserPhone='$user'";
    $result = mysqli_query($conn, $user_exists_query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {

            $result_fetch = mysqli_fetch_assoc($result);
            //if successfully logged
            if (password_verify($_POST['password'], $result_fetch['UserPassword'])) {

                $id = $result_fetch['UserID'];
                $msg = "Login Successfully on Super Market";
                session_start();
                $_SESSION['logged_in'] = 'true';
                $_SESSION['id'] = $result_fetch['UserID'];
                $_SESSION['name'] = $result_fetch['UserFirstName'];


                header("location: /account.php?message=$msg");

            }
            else {

                $msg2 = "Wrong password!!Try Again";
                header("location: /login.php?message=$msg2");
            }
        }else { //when mail is not found in database
            $msg2 = "Try Again";
            header("location: /login.php?message=$msg2");
        }
    } else {
        $msg2 = "Try Again";
        header("location: /login.php?message=$msg2");
    }
}


//For Register
if (isset($_POST['register'])) {
    //Fetch Data from form
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $phone = $_POST['phone'];
    $file = addslashes(file_get_contents($_FILES['document']['tmp_name']));
    $msg = '';
    $news = $_POST['checkbox'];
    $isValid = filter_var($email, FILTER_VALIDATE_EMAIL);


//query part


    //user registered first time
    $passwordH = password_hash($password, PASSWORD_BCRYPT);
    $vcode = bin2hex(random_bytes(8));
    $query = "INSERT INTO users(UserFirstName,UserLastName,UserEmail,UserPassword,UserPhone,Image,UserAddress,UserAddress2,UserFax,UserCity,UserZip,UserState,UserCountry,UserVerificationCode,UserEmailVerified,UserSubscribe) VALUES ('$first','$last','$email','$passwordH','$phone','$file',' ',' ',' ',' ',' ',' ',' ','$vcode','0','$news')";
//
    if ($isValid && mysqli_query($conn, $query) && sendMail($email, $vcode)) {

        $msg = "Registered Successfully";
        header("location: /login.php?data=$msg");

    } else {
        //if data not successfully inserted
        $msg = "Verification Failed";
        header("location: /registered.php?data=$msg");
    }

}
?>

  
