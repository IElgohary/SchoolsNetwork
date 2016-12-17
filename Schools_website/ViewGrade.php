<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment Grades</title>
    <?php
    include "header.php";
    ?>
</head>
<body text-align="center" >
</br>
</br>
</br>
</br>
<div class='container' >

    <div class='row'>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-0"></div>
        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'  >
            <form align='center' action="Grades_of_Assignments_Solved.php" method="post">
                <fieldset>
                    <legend>Assignment Grades</legend>
                    <div class=' input-group input-group-lg'> <span class='input-group-addon'>  SSN: </span><input class='form-control' name="ssn" size="50" type="text" placeholder="Enter your SSN"  required="required" /></div>
                    </br>
                </fieldset>
                </br>
                </br>
                <button class='btn btn-info btn-lg ' type="submit"> Post<span class='glyphicon glyphicon-check'></span></button>
            </form></div> <div class="col-lg-3 col-md-3 col-sm-3 col-xs-0"> </div></div></div></div>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>