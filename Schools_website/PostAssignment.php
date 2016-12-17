<?php

require_once ("Connect.php");
include "header.php";
//session_start();

//$username= S_SESSION['username'];

//$ssn_string= 'Select ssn from Employees where $username=username';
//$teacher_ssn= @mysqli_query($conn,$ssn_string);
$teacher_ssn=$_SESSION['ssn'];
$course_code = $_POST['course_code'];
$post_date= $_POST['post_date'];
$due_date = $_POST['due_date'];
$content= $_POST['content'];

$query= "call PostAssignment('{$teacher_ssn}', '{$course_code}', '{$post_date}', '{$due_date}', '{$content}')";
$response=@mysqli_query($conn,$query);

if($response)
{
    echo 'Posted the assignment correctly';
}
else
{
    echo 'A problem occurred while submitting the assignment, Please try again';
}

mysqli_close($conn);

?>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
