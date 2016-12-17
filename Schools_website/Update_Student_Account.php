<!DOCTYPE html>
<html>
<head>

    <title>Student Information</title>
    <?php
    include "header.php";
    ?>
</head>
<body>
<h3> Student Information</h3>



<?php

require_once ("Connect.php");
session_start();

$student_ssn= S_SESSION['ssn'];


if(!empty($student_ssn))
{
  $_SESSION['student_ssn']=$student_ssn;
 $student_ssn=$_POST['student_ssn'];

//$student_ssn="23456098762";

$query= "Select * from  Students where student_ssn='{$student_ssn}'";

$response=@mysqli_query($conn,$query);
$students=array();

while($row= $response->fetch_assoc())
    $students[]=$row;
$response->free();

echo "<table align='center' border='1' cellspacing='7' cellpadding='10'>
        <tr> 
        <td align='center'><b> Student SSN </b></td>
        <td align='center'><b> Username </b></td>
        <td align='center'><b> Password </b></td>
        <td align='center'><b> Grade </b></td>
        <td align='center'><b> Enrolled School </b></td>
        </tr> ";

foreach($students as $student)
{
    echo "<tr>";
    echo "<td align='left'>".$student['student_ssn']."</td>";
    echo "<td align='left'>".$student['username']."</td>";
    echo "<td align='left'>".$student['password']."</td>";
    echo "<td align='left'>".$student['grade']."</td>";
    echo "<td align='left'>".$student['enrolled_school_name']."</td>";
    echo " method='post'>";
    echo "<input type='submit' value='Update'/>";
    echo "</form></td></tr>";
}
echo "</table>";
}

?>

</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
