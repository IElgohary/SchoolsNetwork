<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel = "stylesheet"/>
    <title>Reply to Report</title>
    <?php include "header.php"; ?>;
</head>
<body>
<div class="page-header" align="center">
    <h3>Add Mobile Number</h3>
</div>
<?php
require_once ('Connect.php');

$parent =$_SESSION['username'];
echo "<form action=\"Add_Mobile_Form.php\" method=\"post\">";
echo "<div class=\"container \" align=\"center\">";
echo "<div class=\"row\" >
                <div class=\"col-lg-4 col-lg-offset-4\">
                 <div class=\"input-group\">";
echo "<input type=\"text\"  name=\"number\" class=\"form-control\"/>";
echo "<input type=\"submit\" name = 'submit' value=\"Submit\" class=\"btn btn-group-lg btn-info so\"/>";
echo "</div></div></div>";
echo "</form>";
echo "</div>";

if(isset($_POST['submit'])) {

    $number = $_POST['number'];
    $query = $conn->prepare("call Register_Parent_Mobile(?,?)");
    $query->bind_param('ss', $number,$parent);
    $query->execute() or die ("error: ". $conn->error);
    header("location: success.php");
    die();
}
?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
