q<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <title>School Activities</title>
    <?php
    include "header.php";
    ?>
</head>
<body>
<h3> School Activities</h3>
<?php

require_once ("Connect.php");
session_start();

$student_ssn= S_SESSION['ssn'];


if(!empty($student_ssn))

{


//$teacher_ssn="3489214901";
//$teacher_ssn2="3489214905";
$query= "Select a.id,a.description,a.location,a.type,a.date,e.first_name,e.last_name from  Activities a INNER JOIN Teachers t on a.teacher_ssn= t.ssn
 INNER JOIN Employees e 
 ON t.ssn=e.ssn INNER JOIN Students s on s.enrolled_school_name=e.school_name  WHERE student_ssn='{$student_ssn}'";



$response=@mysqli_query($conn,$query);
$activities=array();

while($row= $response->fetch_assoc())
    $activities[]=$row;
$response->free();

echo "<table align='center' border='1' cellspacing='5' cellpadding='8'>
        <tr> 
        <td align='center'><b> ID </b></td>
        <td align='center'><b> Description </b></td>
        <td align='center'><b> Location </b></td>
        <td align='center'><b> Type </b></td>
        <td align='center'><b> Date </b></td>
        <td align='center'><b> Teacher First Name </b></td>
        <td align='center'><b> Teacher Last Name </b></td>

        
        
        </tr> ";

foreach($activities as $activity)
{
    echo "<tr>";
    echo "<td align='left'>".$activity['id']."</td>";
    echo "<td align='left'>".$activity['description']."</td>";
    echo "<td align='left'>".$activity['location']."</td>";
    echo "<td align='left'>".$activity['type']."</td>";
    echo "<td align='left'>".$activity['date']."</td>";
    echo "<td align='left'>".$activity['first_name']."</td>";
    echo "<td align='left'>".$activity['last_name']."</td>";
    echo " method='post'>";
    echo "<input type='submit' value='Join'/>";
    echo "</form></td></tr>";
}
echo "</table>";

}


?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
