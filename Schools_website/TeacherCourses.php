<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <title> Teacher Courses</title>
    <?php
    include "header.php";
    ?>
</head>
<body>
<?php
require_once ("Connect.php");

$teacher_ssn=$_SESSION['ssn'];
$query= "call ViewMyCourses('{$teacher_ssn}');";
$response=@mysqli_query($conn,$query);

$courses = array();
while($row=$response -> fetch_assoc())
    $courses[]=$row;
$response->free();

echo "<div class='container' align='center'> <table class='table table-striped table-hover table-bordered' align='center' border='1' cellspacing='5' cellpadding='8'>";
echo "<tr>
       <th align='center'><b> Code </b></th>
        <th align='center'><b> Name </b></th>
        <th align='center'><b> Description </b></th>
        <th align='center'><b> Level </b></th>
        <th align='center'><b> Grade </b></th>
        </tr> ";

foreach($courses as $course)
{
    echo "<tr>";
    echo "<td align='left'>".$course['code']."</td>";
    echo "<td align='left'>".$course['name']."</td>";
    echo "<td align='left'>".$course['description']."</td>";
    echo "<td align='left'>".$course['level']."</td>";
    echo "<td align='left'>".$course['grade']."</td>";
    echo "</tr>";

}

echo "</table></div>";

//}


?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
