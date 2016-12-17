<?php
require_once('Connect.php');
session_start();
$adminSSN = $_SESSION['ssn'];
$studentSSN=$_POST['ssnStudent'];
$username=$_POST['usernameStudent'];
$password=$_POST['passwordStudent'];

echo $username. " ".$password. " ". $studentSSN.'<br>';
$sql="call verifyStudents('$adminSSN','$studentSSN','$username','$password')";

if(!mysqli_query($conn,$sql))
    die('something went wrong verifying student go back to try again');

else
    header("location: verifyStudentsPage.php");

?>