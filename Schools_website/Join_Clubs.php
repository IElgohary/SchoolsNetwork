<?php

require_once ("Connect.php");
include "header.php";

$student_ssn= S_SESSION['ssn'];


$student_ssn=$_POST['ssn'];
$club_name = $_POST['club_name'];


$query= "call Join_Clubs('{$student_ssn}', '{$club_name}')";
$response=@mysqli_query($conn,$query);

if($response)
{
    echo 'Congrats You joined the club';
}
else
{
    echo 'A problem occurred while joining to the club, Please try again';
}

mysqli_close($conn);

?>

<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
