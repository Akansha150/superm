<?php

require 'connection.php';
# create database connection
if (!empty($_POST["email"])) {

    $user_exists_query = "SELECT * FROM users WHERE UserEmail='" . $_POST["email"] . "'";

    $result = mysqli_query($conn, $user_exists_query);


    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "<lable style='color:red'> Sorry User already exists .</lable>";
        echo "<script>$('#register').prop('disabled',true);</script>";
    } else {
        echo "<lable style='color:green'> User available for Registration .</lable>";
        echo "<script>$('#register').prop('disabled',false);</script>";
    }
}
?>
<?php
if (!empty($_POST["Email"])) {

    $user_exists_query = "SELECT * FROM news WHERE UserEmail='" . $_POST["Email"] . "'";

    $result = mysqli_query($conn, $user_exists_query);


    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "<lable style='color:red'> Already Subscribed .</lable>";
        echo "<script>$('#snews').prop('disabled',true);</script>";
    } else {
        echo "<lable style='color:green'></lable>";
        echo "<script>$('#snews').prop('disabled',false);</script>";
    }
}
?>
