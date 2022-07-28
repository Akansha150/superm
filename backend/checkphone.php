<?php

require 'connection.php';
# create database connection
if (!empty($_POST["phone"])) {

    $user_exists_query = "SELECT * FROM users WHERE UserPhone='" . $_POST["phone"] . "'";

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