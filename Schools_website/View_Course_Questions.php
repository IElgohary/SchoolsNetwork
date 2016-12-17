<!DOCTYPE html>
<html>
<body>

<?php


require_once ("Connect.php");


$student_ssn=$_SESSION['ssn'];

//$student_ssn="23456098762";

$query= "select course_code from Courses_taken_by_Students WHERE student_ssn='{$student_ssn}'";

$response=@mysqli_query($conn,$query);

$courses = array();
while($row = $response -> fetch_assoc())
    $courses[]=$row;
$response->free();
echo "</br>
</br>
</br>
</br>
<div class='col-lg-3 col-md-3 col-sm-3 col-xs-1'></div>
<div class='col-lg-6 col-md-6 col-sm-6 col-xs-10'>
<form align='center' action='Questions_Asked_About_Course.php' method='post'>
    <h3 align='center'>Select Course</h3>
    <div class='row' >
        <div class='col-lg-4 col-lg-offset-4'>
            <div class='input-group'>
                    <select class='form-control' name='course_code' id='type'>";
foreach($courses as $course)
    echo "<option>".$course['course_code']."</option>";

echo "</select>
      </br>
      </br>
      <input type='submit' value='View Questions' class='btn btn-group-lg btn-info'/>
    </div>
    </div>
    </div>
</form></div><div class='col-lg-3 col-md-3 col-sm-3 col-xs-1'></div>
 ";

//}


?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>