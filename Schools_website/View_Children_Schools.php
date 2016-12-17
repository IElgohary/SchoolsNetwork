<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>

    <title>Children's Schools</title>

</head>
<?php session_start();
include"header.php" ?>
<body>
<div class="page-header" align="center">
    <h3>Children's Schools</h3>
</div>
<?php
require_once('Connect.php');

$parent = $_SESSION['username'];

$query = "Select c.name, c.ssn from Children c WHERE parent_username = '{$parent}';";
$result = $conn->query($query);
$children = array();
while ($c = $result->fetch_assoc())
    $children[] = $c;
$result->free();

$query = "call View_Schools_of_Children('{$parent}');";
$result = $conn->query($query);
$schools = array();
while ($s = $result->fetch_assoc())
    $schools[] = $s;
$result->free();


if ($children) {
    foreach ($children as $child) {
        echo "<div class=\"container \" align=\"center\">";
        echo "<h3>" . $child['name'] . "</h3><br/>";
        echo "<table class='table'>";
        echo "<tr align='center'>";
        echo "<td>";
        foreach ($schools as $school) {
            if ($school['student_ssn'] == $child['ssn']) {


                echo "<form action=\"Review_School.php\" method=\"post\">";
                echo "<div class=\"row\" >
                <div class=\"col-lg-4 col-lg-offset-4\">
                 <div class=\"input-group\">";

                echo "<label for =\"School\">" . $school['name'] . "</label>";
                echo "<br/>";
                echo "<input type = 'hidden' name = 'school' value = \"" . $school['name'] . "\">";
                echo "<input type = 'hidden' name = 'review' value = \"" . $school['review'] . "\">";
                echo "<input type='submit' value='Review' class='btn btn-group-lg btn-info'/>";
                echo "
                        </div></div></div></form>";
            }
        }
        echo "</td></tr>";
        echo "</table></div>";
    }
}


?>
</body>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>