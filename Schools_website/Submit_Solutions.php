<?php

require_once ("Connect.php");
include "header.php";
$ssn= S_SESSION['ssn'];


$solve= $_POST['solve'];
$assignment= $_POST['assignment'];



$query= "call Solve_Assignment('{$ssn}', '{$solve}', '{$assignment}')";
$response=@mysqli_query($conn,$query);

if($response)
{
    echo 'submitted the answer correctly';
}
else
{
    echo 'A problem occurred while submitting the answer, Please try again';
}

mysqli_close($conn);

?>

<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
