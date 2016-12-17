<?php
require_once ('Connect.php');
include "header.php";

$ssn = $_POST['ssn'];
$name = $_POST['fname'];
$gender = $_POST['gender'];
$bdate = date('m/d/Y',strtotime($_POST['bdate']));
$school = $_POST['school'];
$grade = $_POST['grade'];
$parent_username = $_SESSION['username'];

$schools=array();
$result = $conn->query("Select * from Schools s where s.name = '{$school}'");
while($r = $result->fetch_assoc())
    $schools[] = $r;

if($grade>$schools[0]['max_grade']|| $grade< $schools[0]['min_grade'])
{
    echo "<h3 align='center'>Grade is not valid.</h3>";
}
else {
    $apply = $conn->prepare("call Apply_Child_for_School(?,?,?,?,?,?,?)");
    $apply->bind_param('issssss', $grade, $parent_username, $ssn, $name, $bdate, $gender, $school);
    $apply->execute();
    if ($conn->errno != 0) {
        echo "Error " . $conn->errno . " " . $conn->error;
    } else {
        header("location: View_Schools_Accepted_My_Children.php");
        die();
    }

}

?>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
