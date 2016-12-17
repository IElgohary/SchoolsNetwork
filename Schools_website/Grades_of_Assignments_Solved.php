<?php

require_once ("Connect.php");
include "header.php";
session_start();

$student_ssn= S_SESSION['ssn'];



 if(!empty($student_ssn)) {
    $_SESSION['student_ssn'] = $student_ssn;
    $student_ssn = $_POST['student_ssn'];


    //$student_ssn = "23456098762";


    $query = "Select * from  Assignments_solved_by_Students a INNER JOIN Assignments_posted_by_Teachers tpa on tpa.assignment_id = a.assignment_id WHERE student_ssn='{$student_ssn}'";

    $response = @mysqli_query($conn, $query);
    $assignments = array();

    while ($row = $response->fetch_assoc())
        $assignments[] = $row;
    $response->free();

    echo "<table align='center' border='1' cellspacing='5' cellpadding='8'>
        <tr> 
        <td align='center'><b>  SSN </b></td>
        <td align='center'><b> ID </b></td>
        <td align='center'><b> Solution </b></td>
        <td align='center'><b> Mark </b></td>
        
        </tr> ";

    foreach ($assignments as $assignment) {
        echo "<tr>";
        echo "<td align='left'>" . $assignment['student_ssn'] . "</td>";
        echo "<td align='left'>" . $assignment['assignment_id'] . "</td>";
        echo "<td align='left'>" . $assignment['solution'] . "</td>";
        echo "<td align='left'>" . $assignment['mark'] . "</td>";


    }
    echo "</table>";


    echo "If you have any inqueries about the mark kindly head to the Teachers office";

}

echo "</form></td></tr>";


mysqli_close($conn);
?>

<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>



