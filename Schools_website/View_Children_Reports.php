<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel = "stylesheet"/>

    <title>Children Reports</title>

    <?php
    include "header.php";
    ?>
</head>
<body>
<div class="page-header" align="center">
<h3>Children Reports</h3>
</div>
<?php
require_once ('Connect.php');

$parent = $_SESSION['username'];

$query = "Select c.name, c.ssn from Children c WHERE parent_username = '{$parent}';";
$result = $conn->query($query) ;
$children = array();
while($c = $result->fetch_assoc())
    $children[] = $c;
$result->free();

$query="call View_Children_Reports('{$parent}');";
$result = $conn->query($query);
$reports = array();
while($report = $result->fetch_assoc())
    $reports[] = $report;
$result->free();


if($children) {
    echo "<div class=\"container \" align=\"center\">";
    foreach($children as $child) {

        echo "<h3>" . $child['name'] . "</h3><br/>";
        echo "<table class='table-bordered table-responsive'>";
        echo"<tr>
                <th style='text-align: center'>Date</th>
                <th style='text-align: center'>Teacher</th>
                <th style='text-align: center'>Comment</th>
                <th style='text-align: center'>Reply</th>
            </tr>";

        foreach ($reports as $r) {
//            echo $r['student_ssn']." ".$child['ssn'];
            if ($r['student_ssn'] == $child['ssn']) {
                echo "<form action=\"Reply_to_Report.php\" method=\"post\">";
                echo "<div class=\"row\" >
                <div class=\"col-lg-4 col-lg-offset-4\">
                 <div class=\"input-group\">";
                echo "<tr align='center'>";
                echo "<td >";
                echo $r['date'];
                echo "</td><td>";
                echo $r['first_name'] . " " . $r['last_name'];
                echo "</td>";
                echo "<td>";
                echo $r['content'];
                echo "</td>";
                echo "<td>";

                echo "<input type = 'hidden' name = 'teacher' value =\"". $r['teacher_ssn']."\"/>";
                echo "<input type = 'hidden' name = 'title' value = \"". $r['title']."\" />";
                echo "<input type = 'hidden' name = 'content' value = \"". $r['content']."\" />";
                if ($r['comment'] == null)
                    echo "<input type=\"submit\" value=\"Reply\" class='btn btn-group-lg btn-info'/>";
                else
                    echo $r['comment'];
                echo "</td></tr></div></div></div></form>";

            }
            }
        echo "</table>";
        }

    }
echo "</div>";
?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
