q<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <title>Clubs</title>
    <?php
    include "header.php";
    ?>
</head>
<body>
<h3> Clubs</h3>
<?php

require_once ("Connect.php");
session_start();

$student= S_SESSION['ssn'];


if(!empty($student_ssn)) {
    $_SESSION['student_ssn'] = $student_ssn;
    $student_ssn = $_POST['student_ssn'];

    //$student_ssn = "23456098762";
    $query = "Select c.name,c.purpose from Clubs c INNER JOIN Students s on c.high_school = s.enrolled_school_name INNER JOIN High_Schools h 
on s.enrolled_school_name = h.school_name WHERE student_ssn='{$student_ssn}'";

    $response = @mysqli_query($conn, $query);
    $clubs = array();

    while ($row = $response->fetch_assoc())
        $clubs[] = $row;
    $response->free();

    echo "<table align='center' border='1' cellspacing='5' cellpadding='8'>
        <tr> 
        <td align='center'><b> Name </b></td>
        <td align='center'><b> Purpose </b></td>
        
        </tr> ";

    foreach ($clubs as $club) {
        echo "<tr>";
        echo "<td align='left'>" . $club['name'] . "</td>";
        echo "<td align='left'>" . $club['purpose'] . "</td>";
        echo " method='post'>";
        echo "<input type='submit' value='Join'/>";
        echo "</form></td></tr>";
    }
}
echo "</table>";

?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>