<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Assignment</title>
    <?php
    include "header.php";
    ?>
</head>
<body text-align="center">
<?php
require_once ("Connect.php");

$teacher_ssn=$_SESSION['ssn'];
$query= "call ViewMyCourses('{$teacher_ssn}');";
$response=@mysqli_query($conn,$query);

$courses = array();
while($row = $response -> fetch_assoc())
    $courses[]=$row;
$response->free();

echo" </br>
</br>
</br>
</br>
<div class='container' >

    <div class='row'>
        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-0'></div>
        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'  >
<form align='center' action='PostAssignment.php' method='post'>
    <fieldset>
        <legend>Post Assignment</legend>
        <select class='form-control' name='course_code' id='type'>";
foreach($courses as $course)
    echo "<option>".$course['code']."</option>";

echo "</select>        
        </br>
        <div class=' input-group input-group-lg'><span class='input-group-addon'> Post Date: </span><input class='form-control' name='post_date' size='50' type='text' placeholder='Enter the date in the format of Year-Month-Day' required='required'/></div>
        </br>
        <div class=' input-group input-group-lg'><span class='input-group-addon'> Due Date: </span><input class='form-control' name='due_date' size='50' type='text' placeholder='Enter the date in the format of Year-Month-Day' required='required'/></div>
        </br>
        <div class=' input-group input-group-lg'><span class='input-group-addon'> Content: </span><input  class='form-control' name='content' size='100' type='text' required='required' placeholder='Enter the content of the assignment here' /></div>
    </fieldset>
    </br>
    </br>
    <button class='btn btn-info btn-lg ' type='submit'> Post<span class='glyphicon glyphicon-check'></span></button>
</form></div> <div class='col-lg-3 col-md-3 col-sm-3 col-xs-0'> </div></div></div></div>";
?>
</body>
</html>
<script src='js/jquery-latest.js'></script>
<script src='js/bootstrap.min.js'></script>