<?php
session_start();
require_once('Connect.php');
$adminSSN = $_SESSION['ssn'];
$ourValues=$_POST['hiddenValues'];
$splitValues=explode(',',$ourValues);
$childSSN=$splitValues[0];
$schoolName=$splitValues[1];
$radioOutput=$_POST['accept'];
$accept=($radioOutput=="accept")?true:false;
echo $accept . " ".$schoolName." ".$childSSN."<br>";

$sql="call acceptOrReject('$schoolName','$childSSN','$accept')";

if(!mysqli_query($conn,$sql)) {
    die(mysqli_error($conn));
//    die('something went wrong accepting/reject student go back to try again');
}
else
    header("location: acceptChildrenPage.php");

?>