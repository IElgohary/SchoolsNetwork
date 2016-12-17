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
<h3> Courses' Questions</h3>
<?php

require_once ("Connect.php");
session_start();

$student_ssn= S_SESSION['ssn'];

if(!empty($student_ssn))
{
$_SESSION['student_ssn']=$student_ssn;

$course_code = $_POST['course_code'];


//$course_code="Eng601";
$query= "Select * from  Questions where course_code='{$course_code}'";

$response=@mysqli_query($conn,$query);
$questions=array();

while($row= $response->fetch_assoc())
    $questions[]=$row;
$response->free();

echo "<table align='center' border='1' cellspacing='5' cellpadding='8'>
        <tr> 
        <td align='center'><b> Student SSN </b></td>
        <td align='center'><b> Course Code </b></td>
        <td align='center'><b> Title </b></td>
        <td align='center'><b> Content </b></td>
        <td align='center'><b> Answer </b></td>
        </tr> ";

foreach($questions as $question)
{
    echo "<tr>";
    echo "<td align='left'>".$question['student_ssn']."</td>";
    echo "<td align='left'>".$question['course_code']."</td>";
    echo "<td align='left'>".$question['title']."</td>";
    echo "<td align='left'>".$question['content']."</td>";
    echo "<td align='left'>".$question['answer']."</td>";
    echo "</form></td></tr>";
}
echo "</table>";

}



?>
</body>
</html>

<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
