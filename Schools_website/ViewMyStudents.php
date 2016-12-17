<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <title> Students Solutions</title>
    <?php
    include "header.php";
    ?>
</head>
<body>

<?php


require_once ("Connect.php");

//  $_SESSION['teacher_ssn']=$teacher_ssn;
//$teacher_ssn=$_POST['teacher_ssn'];
$teacher_ssn=$_SESSION['ssn'];
$query= "call ViewMyStudents('{$teacher_ssn}')";
$response=@mysqli_query($conn,$query);
$students= array();

while($row= $response->fetch_assoc())
    $students[]=$row;
$response->free();


echo "<div class=\"container \" align=\"center\"><table class='table table-striped table-bordered table-hover' align='center' border='1' cellspacing='5' cellpadding='8'>
<tr> 
<td align='center'><b> Grade </b></td>
<td align='center'><b> First Name </b></td>
<td align='center'><b> Last Name </b></td>
<td align='center'><b> Student SSN </b></td>
<td align='center'><b> Student ID </b></td>
<td align='center'><b> Username </b></td>
</tr> ";

foreach($students as $student)
{
    echo "<tr>";
    echo "<td align='left'>".$student['grade']."</td>";
    echo "<td align='left'>".$student['name']."</td>";
    echo "<td align='left'>".$student['last_name']."</td>";
    echo "<td align='left'>".$student['student_ssn']."</td>";
    echo "<td align='left'>".$student['id']."</td>";
    echo "<td align='left'>".$student['username']."</td>";
    echo "</tr>";
}
echo "</table></div>";

//}


?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
