<?php

require_once ("Connect.php");
include "header.php";

//session_start();

//$username= S_SESSION['username'];
//$ssn_string= 'Select ssn from Employees where $username=username';
//$teacher_ssn= @mysqli_query($conn,$ssn_string);

    $teacher_ssn=$_SESSION['ssn'];
    $student_ssn = $_POST['student_ssn'];
    $course_code = $_POST['course_code'];
    $title = $_POST['title'];
    $answer= $_POST['answer'];

    $query = "call AnswerQuestion('{$student_ssn}', '{$course_code}', '{$title}', '{$answer}');";

    $response = @mysqli_query($conn, $query);

    if ($response) {
        echo 'Posted the answer successfully';
    } else {
        echo 'A problem occurred while posting the answer , Please try again';
    }

mysqli_close($conn);


?>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
