<?php


require_once ("Connect.php");
include "header.php";


$teacher_ssn=$_SESSION['ssn'];
$student_ssn = $_POST['student_ssn'];
$title= $_POST['title'];
$content= $_POST['content'];
$date= $_POST['date'];

$query= "call WriteReport('{$teacher_ssn}', '{$student_ssn}', '{$title}', '{$content}', '{$date}');";

$response=@mysqli_query($conn,$query);

if($response)
{
    echo 'Submitted the report correctly';
}
else
{
    echo 'A problem occurred while submitting the report. Most probably there is already a report submitted by you with the same title
    so try changing title';
}

mysqli_close($conn);


?>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
