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
$assignment_id=$_POST['assignment_id'];
$student_ssn=$_POST['student_ssn'];

echo "<form action='GradeAssignment.php' method='post'>
    <fieldset>
        <legend>Enter Grade</legend>
        <input type='hidden' name='teacher_ssn' value=\"$teacher_ssn\" >
        <input type='hidden' name='student_ssn' value=\"$student_ssn\" >
        <input type='hidden' name='assignment_id' value=\"$assignment_id\">
        <div>Grade: <input name='grade' type='text' size='50' placeholder='Enter the grade here' required='required'/></div>
    </fieldset>
    <input type='submit' value='Submit Grade' />
</form>";

?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
