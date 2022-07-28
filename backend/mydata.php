
<?php
require 'connection.php';
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("location : /login.php");

}



if (isset($_POST['update'])) {

    $id1 = $_SESSION['id'];
    $add1 = $_POST['add1'];
    $add2 = $_POST['add2'];
    $city = $_POST['city'];
    $fax = $_POST['fax'];
    $zip = $_POST['zip'];
    echo $state = $_POST['state'];

    $country = $_POST['country'];

    $sql = "UPDATE users SET UserAddress ='$add1',UserAddress2 = '$add2', UserCity='$city', UserFax='$fax', UserZip ='$zip', UserState='$state' , UserCountry='$country' WHERE UserID='$id1' ";



    if ($conn->query($sql) === TRUE) {
        $account = "Data Update";
        header("location: /account.php?account=$account");
    } else {
        $account = "Try Again";
        header("location: /account.php?account=$account");
    }

}

if (isset($_POST['delete'])) {

    $id1 = $_SESSION['id'];
    $add1 = '';
    $add2 = '';
    $city = '';
    $fax = '';
    $zip = '';
    $state = '';
    $country = '';
    $success1 = '';
    $error1 = '';

    $sql = "UPDATE users SET UserAddress ='$add1',UserAddress2 = '$add2', UserCity='$city', UserFax='$fax', UserZip ='$zip', UserState='$state' , UserCountry='$country' WHERE UserID='$id1' ";


    if ($conn->query($sql) === TRUE) {
        $account = "Data Deleted";
        header("location: /account.php?account=$account");
    } else {
        $account = "Try Again";
        header("location: /account.php?account=$account");
    }

}

?>

