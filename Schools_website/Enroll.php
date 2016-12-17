<?php
require_once ('Connect.php');
include "header.php";
$ssn = $_POST['ssn'];
$school = $_POST['School'];

$query = $conn->prepare("call Enroll_Child_in_School(?,?);");
$query->bind_param('ss',$ssn,$school);
$query->execute();
if($query->affected_rows > 0)
{
    echo "Enrolled Successfully";
}
else
{
    echo "Enrollment failed.";
}
?>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
