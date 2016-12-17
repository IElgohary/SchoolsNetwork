<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel = "stylesheet"/>
</head>
<body>
<?php
require_once ('Connect.php');
include "header.php";
$parent = $_SESSION['username'];
$teacher = $_POST['teacher'];
$rating = $_POST['rate'];

echo $rating;
$query = $conn->prepare("call Rate_Children_Teacher(?,?,?)");
$query->bind_param('sss', $parent, $teacher, $rating);
$query->execute() or die ("error: ". $conn->error);
header("location: View_Children_Teachers.php");
die();

?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>