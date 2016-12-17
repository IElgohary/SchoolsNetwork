<?php
 require_once ("Connect.php");
include "header.php";

session_start();
$ssn= S_SESSION['ssn'];

$course=$_POST['course'];
$ssn = $_POST['ssn'];
$qtitle= $_POST['qtitle'];
$qcontent = $_POST['qcontent'];


$query= "call Post_Question_About_Course('{$course}', '{$ssn}', '{$qtitle}', '{$qcontent}'";
$response=@mysqli_query($conn,$query);

if($response)
{
    echo 'Posted the question correctly';
}
else
{
    echo 'A problem occurred while posting the question, Please try again';
}

mysqli_close($conn);

?>

<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
