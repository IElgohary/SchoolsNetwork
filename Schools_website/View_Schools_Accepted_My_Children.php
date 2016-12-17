<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>

    <title>Schools Accepted My Children</title>
    <?php include "header.php"; ?>
</head>
<body>
<div class="page-header" align="center">
<h3>Schools Accepted My Children</h3>
</div>
<?php
require_once('Connect.php');

$parent =$_SESSION['username'];

$query = "Select name from Children c WHERE parent_username = '{$parent}';";
$result = $conn->query($query);

$children = array();
while ($name = $result->fetch_array()) {
    $children[] = $name[0];
}
$result->free();

$query = "call Children_Accepted_by_School('{$parent}');";
$result = $conn->query($query);
$schools = array();
while ($school = $result->fetch_assoc())
    $schools[] = $school;
//echo $schools[0]['name']." ".$schools[1]['name'];

$result->free();
if ($children) {
    foreach ($children as $child) {

        echo "<div class=\"container \" align=\"center\">";
        echo "<h3>" . $child . "</h3><br/>";
        echo"<table class='table'>";
        echo "<form action=\"Enroll.php\" method=\"post\">";
        echo "<tr align='center'>";
        echo "<div class=\"row\" >
                <div class=\"col-lg-4 col-lg-offset-4\">
                 <div class=\"input-group\">";
        echo "<td>";
        foreach ($schools as $s) {

            if ($s['name'] == $child && $s['parent_username'] == $parent) {

                echo "<label for =\"School\">". $s['school_name'] . "</label>";
                echo "<input type=\"radio\" id ='School' name=\"School\" class=\"radio\" value=\"" . $s['school_name'] . "\" /><br/>";
                echo "<input type = \"hidden\" name =\"ssn\"value=\"" . $s['ssn'] . "\" class=\"form-control\"/>";


            }

        }

        echo "<br/><input type=\"submit\" value=\"enroll\" class='\btn btn-group-lg btn-info '/>";
        echo "</td>";
        echo "    </div>
                </div>
               </div>";
        echo "</tr>";
        echo "</form></table>";
        echo "</div>";
    }
} ?>


</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>