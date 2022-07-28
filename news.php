<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'backend/connection.php';
if (isset($_GET['email'])) {

    $email = $_GET['email'];

    $sql = "SELECT * FROM news WHERE UserEmail='$email' ";

    $result = mysqli_query($conn, $sql);


    if ($result) {

        if (mysqli_num_rows($result) > 0) {

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
         window.location.href='http://supermarket.com/';
        </script>
            ";
                }

            } else {
                echo "
        <script>
        
        alert('Verification Failed')
         window.location.href='http://supermarket.com/';
        </script>
        
            ";
            }


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
?>