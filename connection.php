<?php
$conn=mysqli_connect("localhost","admin","admin","SupMarket");


if(mysqli_connect_error()){
    echo "<script>alert('Cannot connect to database')</script>";
    exit();
}
?>