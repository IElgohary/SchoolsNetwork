<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grading An Assignment</title>
    <?php
    include "header.php";
    ?>
</head>
<body>
</br>
</br>
</br>
</br>
<div class='container'>

    <div class='row'>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-0"> </div>
        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'  >
<form align='center' action="http://localhost/GradeAssignment.php" method="post">
    <fieldset>
        <legend>Grade Assignment</legend>
        <div class="input-group input-group-lg"><span class='input-group-addon'>Student SSN: </span><input class='form-control' name="student_ssn" size="60" type="text" placeholder="Enter the SSN of student you wish to grade the assignment of" required="required"/></div>
        </br>
        <div class="input-group input-group-lg"><span class='input-group-addon'> Assignment ID: </span><input class='form-control' name="assignment_id" size="60" type="text" placeholder="Enter the id of the assignment you wish to grade"  required="required" /></div>
        </br>
        <div class="input-group input-group-lg"><span class='input-group-addon'> Grade: </span><input class='form-control' name="grade" size="30" type="text" required="required" placeholder="Enter the grade here" /></div>
    </fieldset>
    </br>
    </br>
    <button class='btn btn-info btn-lg ' type="submit"> Submit Grade<span class='glyphicon glyphicon-check'></span></button>
</form></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-0"> </div></div></div>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
