<?php
require_once('Connect.php');
session_start();
$adminSSN =$_SESSION['ssn'];
$courseCode=$_POST['course_code'];
$teacherSSN=$_POST['teacher_ssn'];

$sql="call assignTeacherToCourse('$teacherSSN', '$courseCode')";

if(!mysqli_query($conn,$sql))
    die(mysqli_error($conn));

else
    header("location:admin.php");
?>