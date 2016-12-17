q<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <title>Assignments</title>
    <?php
    include "header.php";
    ?>
</head>
<body>
<h3> Assignments</h3>
<?php

require_once ("Connect.php");
//session_start();

//$username= S_SESSION['username'];
//$password = S_SESSION['password'];

//$ssn_string= 'Select student_ssn from Students where $username=username AND $password=password';
//$student_ssn= @mysqli_query($conn,$ssn_string);

//if(!empty($student_ssn))
//{
//$_SESSION['student_ssn']=$student_ssn;
//$student_ssn=$_POST['student_ssn'];
$course_code = $_POST['code'];

//$course_code="Math1203";
$query= "Select * from  Assignments, Assignments_posted_by_Teachers where id=assignment_id  AND '{$course_code}'=course_code ";

$response=@mysqli_query($conn,$query);
$assignments=array();

while($row= $response->fetch_assoc())
    $assignments[]=$row;
$response->free();

echo "<table align='center' border='1' cellspacing='5' cellpadding='8'>
        <tr> 
        <td align='center'><b> ID </b></td>
        <td align='center'><b> Course Code </b></td>
        <td align='center'><b> Post Date </b></td>
        <td align='center'><b> Due Date </b></td>
        <td align='center'><b> Content </b></td>
        
        </tr> ";

foreach($assignments as $assignment)
{
    echo "<tr>";
    echo "<td align='left'>".$assignment['id']."</td>";
    echo "<td align='left'>".$assignment['course_code']."</td>";
    echo "<td align='left'>".$assignment['post_date']."</td>";
    echo "<td align='left'>".$assignment['due_date']."</td>";
    echo "<td align='left'>".$assignment['content']."</td>";
    echo " method='post'>";
    echo "<input type='submit' value='Solution'/>";
    echo "</form></td></tr>";
}
echo "</table>";

//}



?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>