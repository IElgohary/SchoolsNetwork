<!DOCTYPE html>
<html>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <title>Questions</title>
    <?php
    include "header.php";
    ?>
</head>
<body>
<h3 align='center'> Questions </h3>

<?php


require_once ("Connect.php");

//  $_SESSION['teacher_ssn']=$teacher_ssn;

//$teacher_ssn=$_POST['teacher_ssn'];
$teacher_ssn=$_SESSION['ssn'];
$course_code=$_POST['course_code'];
$query="call ViewQuestions('{$teacher_ssn}', '{$course_code}')";

$response=@mysqli_query($conn,$query);
$questions=array();

while($row=$response ->fetch_assoc())
    $questions[]=$row;
$response->free();

echo "<div class=\"container \" align=\"center\"><table class='table table-bordered table-striped table-hover' align='center' border='1' cellspacing='50' cellpadding='8'>
<tr> 
<td align='center'><b> Title </b></td>
<td align='center'><b> Content </b></td>
<td align='center'><b> Student Name </b></td>
<td align='center'><b> Student SSN </b></td>
<td align='center'><b> Answer </b></td>
</tr> ";

foreach($questions as $question)
{
    echo "<tr>";
    echo "<td align='left'>".$question['title']."</td>";
    echo "<td align='left'>".$question['content']."</td>";
    echo "<td align='left'>".$question['name']."</td>";
    echo "<td align='left'>".$question['student_ssn']."</td>";

    if($question['answer']!=null)
    {
       echo "<td align='left' >".$question['answer']."</td >";
    }
    else
    {
       echo "<td align = 'left' >";
       echo "<form action=\"PostAnswer.php\" method=\"post\">";
       echo "<input type='hidden' name='teacher_ssn' value='{$teacher_ssn}' >";
       echo "<input type='hidden' name='student_ssn' value=\"".$question['student_ssn']."\" >";
       echo "<input type='hidden' name='course_code' value='{$course_code}' >";
       echo "<input type='hidden' name='title' value=\"".$question['title']."\" >";
       echo "<button type='submit' href='AddAnswer.php'>Answer</button>";
       echo "</form></td>";
    }

    echo "</tr>";
}
echo "</table></div>";

//}

?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>