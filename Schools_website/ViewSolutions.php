<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <title>Assignment Solutions</title>
    <?php
    include "header.php";
    ?>
</head>
<body>
<h3 align='center'> Assignment Solutions</h3>
<?php


require_once ("Connect.php");
  //  $_SESSION['teacher_ssn']=$teacher_ssn;

$teacher_ssn=$_SESSION['ssn'];
$assignment_id=$_POST['assignment_id'];
$course_code=$_POST['course_code'];

$query= "call ViewAssignmentSolutions('{$teacher_ssn}', {$assignment_id} , '{$course_code}')";

$response=@mysqli_query($conn,$query);
$solutions=array();
while($row=$response->fetch_assoc())
    $solutions[]=$row;
$response->free();

echo "<div class=\"container \" align=\"center\"><table class='table table-striped table-bordered table-hover' align='center' border='1' cellspacing='5' cellpadding='8'>
<tr> 
<td align='center'><b> Student ID </b></td>
<td align='center'><b> Student SSN </b></td>
<td align='center'><b> Assignment ID </b></td>
<td align='center'><b> Solution </b></td>
<td align='center'><b> Grade </b></td>
</tr> ";

foreach($solutions as $solution)
{
    echo "<tr>";
    echo "<td align='left'>".$solution['id']."</td>";
    echo "<td align='left'>".$solution['student_ssn']."</td>";
    echo "<td align='left'>".$solution['assignment_id']."</td>";
    echo "<td align='left'>".$solution['solution']."</td>";
    if($solution['mark']!=null)
    {
        echo "<td align='left'>".$solution['mark']."</td>";
    }
    else
    {
        echo "<td align = 'left' >";
        echo "<form action=\"PostGrade.php\" method=\"post\">";
        echo "<input type='hidden' name='teacher_ssn' value=\"$teacher_ssn\" >";
        echo "<input type='hidden' name='student_ssn' value=\"".$solution['student_ssn']."\" >";
        echo "<input type='hidden' name='assignment_id' value=\"$assignment_id\" >";
        echo "<input type = 'submit' value = 'Grade Assignment' />";
        echo "</form></td>";
    }
    
    echo "</tr>";
}
echo "</table></div>";

//}

mysqli_close($conn);

?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>