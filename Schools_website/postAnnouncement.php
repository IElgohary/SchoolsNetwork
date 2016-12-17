<?php
require_once('Connect.php');
session_start();
$adminSSN =$_SESSION['ssn'];
$date=date("Y-m-d");
$title=addslashes($_POST['title']);
$description=addslashes($_POST['description']);
$type=$_POST['type'];
$sql="call postAnnouncement('$title','$description','$type','$date','$adminSSN')";

if(!mysqli_query($conn,$sql))
    die(mysqli_error($conn));

else
    header("location:admin.php");
?>