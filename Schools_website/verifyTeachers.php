<?php
session_start();
require_once('Connect.php');
$adminSSN =$_SESSION['ssn'];
$teacherSSN=$_POST['ssnTeacher'];
$username=$_POST['usernameTeacher'];
$password=$_POST['passwordTeacher'];

echo $username. " ".$password. " ". $teacherSSN.'<br>';
$sql="call verifyTeacher('$adminSSN','$teacherSSN','$username','$password')";

if(!mysqli_query($conn,$sql))
    die('something went wrong verifying teacher go back to try again');

else
    header("location:verifyTeachersPage.php");

?>