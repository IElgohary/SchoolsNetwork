<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel = "stylesheet"/>
    <title>Delete Review</title>
</head>
<body>

<h3>Delete review</h3>
<?php

require_once ('Connect.php');
include "header.php";
$parent = $_SESSION['username'];
$school = $_POST['school'];
$query = $conn->prepare("call Delete_My_Reviews(?,?)");
$query->bind_param('ss', $school,$parent);
$query->execute() or die ("error: ". $conn->error);
header("location: View_My_Reviews.php");
die();


?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>