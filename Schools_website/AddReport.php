<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Write Report</title>
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
while($row = $response -> fetch_assoc())
    $courses[]=$row;
$response->free();

echo"</br>
</br>
</br>
</br>
<div class='container'>

    <div class='row'>
        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-'> </div>
        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'  >
<form align='center' action='WriteReport.php' method='post'>
    <fieldset>
        <legend>Write Report</legend>
        <div class='input-group input-group-lg'><span class='input-group-addon'> Student SSN: </span><input class='form-control' name='student_ssn' size='50' type='text' placeholder='Enter the SSN of student you wish to write report about' required='required'/></div>
        </br>
         <select class='form-control' name='course_code' id='type'>";
    foreach($courses as $course)
    echo "<option>".$course['code']."</option>";

echo "</select>
        </br>
        <div class='input-group input-group-lg'><span class='input-group-addon'> Date: </span> <input class='form-control' name='date' size='50' type='text' required='required' placeholder='Enter the date of the report' /></div>
        </br>
        <div class='input-group input-group-lg'> <span class='input-group-addon'> Title: </span><input class='form-control' name='title' type='text' size='50' placeholder='Enter the report title' required='required'/></div>
        </br>
        <div class='input-group input-group-lg'><span class='input-group-addon'> Comment: </span><input class='form-control' name='content' size'100' type='text' required='required' placeholder='Enter the report content' /></div>
    </fieldset>
    </br>
    </br>
    <button class='btn btn-info btn-lg ' type='submit'> Post Report<span class='glyphicon glyphicon-check'></span></button>
    </form></div>
        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-0'> </div>
    </div></div>";
?>
</body>
</html>
<script src='js/jquery-latest.js'></script>
<script src='js/bootstrap.min.js'></script>