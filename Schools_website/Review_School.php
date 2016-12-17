<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel = "stylesheet"/>
    <title>Review School</title>
</head>
<body>
<?php

require_once ('Connect.php');
include "header.php";
$parent = $_SESSION['username'];
if(isset($_POST['Delete']))
{
    $school = $_POST['school'];
    $query = $conn->prepare("call Delete_My_Reviews(?,?)");
    $query->bind_param('ss', $school,$parent);
    $query->execute() or die ("error: ". $conn->error);
    header("location: View_My_Reviews.php");
    die();
}
else {

    $school = $_POST['school'];
    $s = $_POST['review'];

    echo "<div class=\"container \" align=\"center\">";
    echo "<p>" . $school . "</p><br/>";

    echo "<form action=\"Review_School.php\" method=\"post\">";
    echo "<div class=\"row\" >
                <div class=\"col-lg-4 col-lg-offset-4\">
                 <div class=\"input-group\">";
    echo "<input type='text' name=\"review\" value='" . $s . "'class=\"form-control\"/>";
    echo "<input type = 'hidden' name = 'school' value =\"" . $school . "\" class=\"form-control\"/>";
    echo "<input type=\"submit\" name = 'submit' value=\"Submit\" class=\"btn btn-group-lg btn-info so\"/>";
    echo "</div></div></div></form>";
    echo "</div>";
    if (isset($_POST['submit'])) {
        $s = $_POST['review'];
        $school = $_POST['school'];

        $query = $conn->prepare("call Review_Children_Schools(?,?,?)");
        $query->bind_param('sss', $s, $parent, $school);
        $query->execute() or die ("error: " . $conn->error);
        header("location: View_Children_Schools.php");
        die();
    }
}
?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>