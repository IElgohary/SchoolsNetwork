<?php
include 'header.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="style.css">
    <link href="css/bootstrap.css" rel = "stylesheet"/>

    <style>
        a {
            display: block;
        }

        a:hover, a:focus {
            color: #004c6e;
        }

        button {
            background-color: grey;
            border-color: darkgrey;
        }



    </style>

<body>
<h1 align="center">Assign Teacher To Course</h1>


<div align="center">
    <form action="assignTeacherToCourse.php" method="post">
        <input id="date" name="date" type=hidden><br>
        <fieldset>
            <label>TeacherSSN</label>
            <input id="teacher_ssn" name="teacher_ssn" style="margin-top:10px">
            <label>Course Code:</label>
            <input id="course_code" name="course_code" size="25">
            <input id="submit" type="submit" value="Submit">
        </fieldset>
    </form>
    <script>
        function setDate() {
            document.getElementById('date').value=new Date();
        }
        setDate();
    </script>

</body>
</html>
