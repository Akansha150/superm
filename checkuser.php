<?php

require 'connection.php';
# create database connection
if (!empty($_POST["user"])) {

    $user_exists_query = "SELECT * FROM users WHERE UserPhone='" . $_POST["user"] . "' OR UserEmail='" . $_POST["user"] . "'";

    $result = mysqli_query($conn, $user_exists_query);


    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "<lable style='color:red'> Sorry User Not exists .</lable>";
        echo "<script>$('#login').prop('disabled',true);</script>";
    } else {
        echo "<lable style='color:green'>User Exists</lable>";
        echo "<script>$('#login').prop('disabled',false);</script>";
    }
}
?>
