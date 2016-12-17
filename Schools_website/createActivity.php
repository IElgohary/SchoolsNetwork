<?php
require_once('Connect.php');
session_start();
$adminSSN =$_SESSION['ssn'];
$description=addslashes($_POST['description']);
$date=date("Y-m-d");
$location=addslashes($_POST['location']);
$type=$_POST['type'];
$teacherSSN=$_POST['teacher_ssn'];

$sql="call createActivity('$description', '$location', '$type', '$date','$teacherSSN','$adminSSN')";

if(!mysqli_query($conn,$sql))
    die('something went wrong updating school go back to try again');

else
    header("location:admin.php");
?>