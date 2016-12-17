<?php
require_once('Connect.php');
session_start();
$adminSSN =$_SESSION['ssn'];
$schoolName=$_POST['name'];
$vision=$_POST['vision'];
$mission=$_POST['mission'];
$main_language=$_POST['main_language'];
$fees=$_POST['fees'];
$city=$_POST['city'];
$street =$_POST['street'];
$block =$_POST['block'];
$zipcode =$_POST['zipcode'];
$phone_number  =$_POST['phone_number'];
$email =$_POST['email'];
$type =$_POST['type'];
$max_grade=$_POST['max_grade'];
$min_grade =$_POST['min_grade'];
$general_info=$_POST['general_info'];

echo $schoolName. " ".$vision." ".$mission.'<br>';
//echo $schoolName. " ".$vision. " ". $mission.'<br>';
$sql="call editSchool('$adminSSN','$schoolName','$vision','$mission','$main_language','$fees','$city','$street',
'$block','$zipcode','$phone_number','$email','$type','$max_grade','$min_grade','$general_info')";

if(!mysqli_query($conn,$sql))
    die(mysqli_error($conn));

else
    header("location: admin.php");
?>