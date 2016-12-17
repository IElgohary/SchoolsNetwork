<!DOCTYPE html>
<html lang="en">

<?php


require_once ("Connect.php");
include "header.php";
session_start();

$student_ssn= S_SESSION['ssn'];


$student_ssn_new=$_POST['student_ssn'];
$student_ssn=$_POST['student_ssn_new'];
$password= $_POST['password'];
$grade = $_POST['grade'];

$query= "call Update_Student_Account('{$student_ssn_new}', '{$student_ssn}', '{$password}', '{$grade}')";

$response=@mysqli_query($conn,$query);

if($response)
{
    echo 'Updated student successfully';
}
else
{
    echo 'A problem occurred while updating student, Please try again';
}

mysqli_close($conn);
?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>


