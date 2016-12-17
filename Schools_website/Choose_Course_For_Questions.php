<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <title> Choose a Course</title>
    <?php
    include "header.php";
    ?>
</head>
<body>
<?php
require_once ("Connect.php");
//session_start();

//$username= S_SESSION['username'];

//$ssn_string= 'Select ssn from Employees where $username=username';
//$teacher_ssn= @mysqli_query($conn,$ssn_string);

//if(!empty($teacher_ssn))
//{
//  $_SESSION['teacher_ssn']=$teacher_ssn;

$teacher_ssn=$_SESSION['ssn'];
$query= "call ViewMyCourses('{$teacher_ssn}');";
$response=@mysqli_query($conn,$query);

$courses = array();
while($row = $response -> fetch_assoc())
    $courses[]=$row;
$response->free();
echo "</br>
</br>
</br>
</br>
<form align='center' action='ViewQuestions.php' method='post'>
    <h3 align='center'> Select a specific course</h3>
    <div class='row' >
        <div class='col-lg-4 col-lg-offset-4'>
            <div class='input-group'>
                    <select class='form-control' name='course_code' id='type'>";
foreach($courses as $course)
    echo "<option>".$course['code']."</option>";

echo "</select>
      </br>
      </br>
      <input type='submit' value='View Questions' class='btn btn-group-lg btn-info'/>
    </div>
    </div>
    </div>
</form> ";

//}


?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
