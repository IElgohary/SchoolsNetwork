<?php

require_once ("Connect.php");
include "header.php";

//session_start();

//$username= S_SESSION['username'];

//$ssn_string= 'Select ssn from Employees where $username=username';
//$teacher_ssn= @mysqli_query($conn,$ssn_string);

//if(!empty($teacher_ssn)) {
  //  $_SESSION['teacher_ssn'] = $teacher_ssn;
    $teacher_ssn=$_SESSION['ssn'];
    $assignment_id = $_POST['assignment_id'];
    $student_ssn = $_POST['student_ssn'];
    $grade_given = $_POST['grade'];
    $query = "call GradeAssignment('{$assignment_id}','{$student_ssn}', '{$grade_given}')";

    $response = @mysqli_query($conn, $query);
    if ($response) {
        echo 'Graded the assignment correctly';
    } else {
        echo 'A problem occurred while grading the assignment, Please try again';
        echo $conn->error;
    }
//}

mysqli_close($conn);


?>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
