<?php

require_once ("Connect.php");
include "header.php";

$student_ssn= S_SESSION['ssn'];

$activity_id = $_POST['activity_id'];


$query= "call Apply_for_Activity('{$student_ssn}', '{$activity_id}')";
$response=@mysqli_query($conn,$query);

if($response)
{
    echo 'Application done successfully';
}
else
{
    echo 'A problem occurred while applying for the activity, Please try again';
}

mysqli_close($conn);

?>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>