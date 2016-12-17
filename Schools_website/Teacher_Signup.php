<?php
require_once ('Connect.php');
include "header.php";

$ssn = $_POST['ssn'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname= $_POST['lname'];
$bdate = $_POST['bdate'];
$city = $_POST['city'];
$street = $_POST['street'];
$block = $_POST['block'];
$zipcode = $_POST['zipcode'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$school = $_POST['school'];


$apply = $conn->prepare("call SignUpTeacher(?,?,?,?,?,?,?,?,?,?,?,?)");
$apply->bind_param('ssssssssssss',$ssn,$fname,$mname,$lname,$bdate,$city,$street,$block,$zipcode,$email,$gender,$school);
$apply->execute();
if ($conn->errno != 0) {
    echo $conn->errno . " " . $conn->error;
} else {
    header("location: Success.php");
    die();
}


?>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
