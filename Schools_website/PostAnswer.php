<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <title> Teacher Courses</title>
    <?php
    include "header.php";
    ?>
</head>
<body>

<?php
require_once ("Connect.php");

$teacher_ssn= $_SESSION['ssn'];
$course_code=$_POST['course_code'];
$student_ssn=$_POST['student_ssn'];
$title=$_POST['title'];

echo "<form action='AnswerQuestion.php' method='post'>
    <fieldset>
        <legend>Enter Answer</legend>
        <input type='hidden' name='teacher_ssn' value=\"$teacher_ssn\" >
        <input type='hidden' name='student_ssn' value=\"$student_ssn\" >
        <input type='hidden' name='course_code' value=\"$course_code\">
        <input type='hidden' name='title' value=\"{$title}\">
        <div>Answer: <input name='answer' type='text' size='100' placeholder='Enter the answer here' required='required'/></div>
    </fieldset>
    <input type='submit' value='Submit Answer' />
</form>";

?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
