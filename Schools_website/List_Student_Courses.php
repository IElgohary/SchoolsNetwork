<!DOCTYPE html>
<html>
<head>

    <title>Student Information</title>
    <?php
    include "header.php";
    ?>
</head>
<body>
<h3> Courses</h3>


<?php

require_once ("Connect.php");
session_start();

$student_ssn= S_SESSION['ssn'];

if(!empty($student_ssn))
{
$_SESSION['student_ssn']=$student_ssn;
$student_ssn=$_POST['student_ssn'];


//$student_ssn="23456098763";

    $query= "Select  c.code,c.name,c.description,c.grade,c.level from Courses c INNER JOIN Students s ON s.grade=c.grade
 INNER JOIN Courses_taken_by_Students ct on ct.course_code=c.code
where student_ssn='{$student_ssn}' Order by c.name";

    $response=@mysqli_query($conn,$query);
    $courses=array();

    while($row= $response->fetch_assoc())
        $courses[]=$row;
    $response->free();

    echo "<table align='center' border='1' cellspacing='7' cellpadding='10'>
        <tr> 
        
        <td align='center'><b> Course Code </b></td>
        <td align='center'><b> Name </b></td>
        <td align='center'><b> Description </b></td>
        <td align='center'><b> Grade </b></td>
        <td align='center'><b> Level </b></td>
        </tr> ";

    foreach($courses as $course)
    {
        echo "<tr>";
        echo "<td align='left'>".$course['code']."</td>";
        echo "<td align='left'>".$course['name']."</td>";
        echo "<td align='left'>".$course['description']."</td>";
        echo "<td align='left'>".$course['grade']."</td>";
        echo "<td align='left'>".$course['level']."</td>";
        echo "<td><form action=\"AddQuestion.php\" method='post'>";
        echo "<input type='submit' value='Add Question'/>";
        echo "</form></td></tr>";
    }
    echo "</table>";

}



?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
