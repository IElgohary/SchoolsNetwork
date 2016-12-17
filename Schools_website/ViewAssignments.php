<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <title>Assignments</title>
    <?php
    include "header.php";
    ?>
</head>
<body>
<h3 align='center'> Assignments</h3>
<?php

require_once ("Connect.php");
//session_start();

//$username= S_SESSION['username'];

//$ssn_string= 'Select ssn from Employees where $username=username';
//$teacher_ssn= @mysqli_query($conn,$ssn_string);

//if(!empty($teacher_ssn))
//{
  //  $_SESSION['teacher_ssn']=$teacher_ssn;
  // $teacher_ssn=$_POST['teacher_ssn'];
$teacher_ssn=$_SESSION['ssn'];
$course_code=$_POST['course_code'];
$query= "Select * from  Assignments, Assignments_posted_by_Teachers where id=assignment_id AND teacher_ssn='{$teacher_ssn}' AND '{$course_code}'=course_code ";

$response=@mysqli_query($conn,$query);
$assignments=array();

while($row= $response->fetch_assoc())
    $assignments[]=$row;
$response->free();

echo "<div class=\"container \" align=\"center\"><table class='table table-striped table-hover table-bordered' align='center' border='1' cellspacing='5' cellpadding='8'>
        <tr> 
        <td align='center'><b> ID </b></td>
        <td align='center'><b> Course Code </b></td>
        <td align='center'><b> Post Date </b></td>
        <td align='center'><b> Due Date </b></td>
        <td align='center'><b> Content </b></td>
        <td align='center'><b> Solution </b></td>
        </tr> ";

foreach($assignments as $assignment)
{
    echo "<tr>";
    echo "<td align='left'>".$assignment['id']."</td>";
    echo "<td align='left'>".$assignment['course_code']."</td>";
    echo "<td align='left'>".$assignment['post_date']."</td>";
    echo "<td align='left'>".$assignment['due_date']."</td>";
    echo "<td align='left'>".$assignment['content']."</td>";
    echo "<td><form action=\"ViewSolutions.php\" method='post'>";
    echo "<input type='hidden' name='teacher_ssn' value=".'{$teacher_ssn}'."\">";
    echo "<input type='hidden' name='assignment_id' value=\"".$assignment['id']."\">";
    echo "<input type='hidden' name='course_code' value=\"".$assignment['course_code']."\">";
    echo "<input type='submit' value='Solution'/>";
    echo "</form></td></tr>";
}
echo "</table></div>";
    
//}



?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
