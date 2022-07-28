<?php
require 'connection.php';
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['email']) && ($_GET['vcode'])) {

 $email = $_GET['email'];
 $vcode = $_GET['vcode'];
 $sql = "SELECT * FROM users WHERE UserEmail='$email' AND UserVerificationCode='$vcode'";
 $result = mysqli_query($conn, $sql);

 if ($result) {
  if (mysqli_num_rows($result) == 1) {
   $row = mysqli_fetch_assoc($result);
   if ($row['UserEmailVerified'] == 0) {
    $update = "UPDATE users SET UserEmailVerified='1' WHERE UserEmail='$email'";
    if (mysqli_query($conn, $update)) {
     echo "
        <script>
        
        alert('Verification Done')
         window.location.href='http://supermarket.com/';
        </script>
       
            ";
    } else {

     echo "
        <script>
        
        alert('Verification Failed')
         window.location.href='/index.php';
        </script>
            ";
    }

   } else {
    echo "
        <script>
        
        alert('Verification Failed')
         window.location.href='/index.php';
        </script>
        
            ";
   }


  }
 } else {
  echo "
        <script>
        
        alert('Verification Failed')
        </script>
        window.location.href='/index.php';
            ";
 }

}
?>