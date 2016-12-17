<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel = "stylesheet"/>
    <title>Reply to Report</title>
    <?php include "header.php"; ?>;
</head>
<body>
<div class="page-header" align="center">
<h3>Reply to Report</h3>
    </div>
<?php
require_once ('Connect.php');

$school = $_POST['teacher'];
$title = $_POST['title'];
$content = $_POST['content'];
$parent = $_SESSION['username'];
echo "<div class=\"container \" align=\"center\">";
echo "<form action=\"Reply_to_Report.php\" method=\"post\">";
echo "<div class=\"row\" >
                <div class=\"col-lg-4 col-lg-offset-4\">
                 <div class=\"input-group\">";
echo "<p>".$content."</p><br/>";
echo "<input type=\"text\"  name=\"reply\" class=\"form-control\"/>";
echo "<input type = 'hidden' name = 'teacher' value =\"". $school."\"class=\"form-control\"/>";
echo "<input type = 'hidden' name = 'title' value =\"". $title."\"class=\"form-control\"/>";
echo "<input type=\"submit\" name = 'submit' value=\"Submit\" class=\"btn btn-group-lg btn-info so\"/>";
echo "</div></div></div>";
echo "</form>";
echo "</div>";

if(isset($_POST['submit'])) {
    $reply = $_POST['reply'];
    $school = $_POST['teacher'];
    $title = $_POST['title'];

    $query = $conn->prepare("call Reply_to_Reports(?,?,?,?)");
    $query->bind_param('ssss', $parent, $title, $school, $reply);
    $query->execute() or die ("error: ". $conn->error);
    header("location: View_Children_Reports.php");
    die();
}
?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
