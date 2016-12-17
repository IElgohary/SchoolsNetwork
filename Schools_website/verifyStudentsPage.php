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
            background-color:grey
            border-color: darkgrey;
        }

        #dialog-form{
            visibility: hidden;
        }



    </style>

<body>
<h1 align="center">Verify Students</h1>
<hr>

<h2 align="center">Click on the record you want to update </h2>
<br class="helper" id="nill">


<script>
    $(function () {
        document.getElementById('dialog-form').style.visibility='visible';

        var dialog = $('#dialog-form').dialog({
            autoOpen: false

        });

        $('.records').on("click", function () {
            document.getElementById('ssn').value=this.id;
            console.log(document.getElementById('ssn').value);
            console.log('hopalaa');
            dialog.dialog('open');
        });
    });




</script>
<?php

require_once('Connect.php');
$adminSSN =$_SESSION['ssn'];
$sql = "call View_Students_Enrolled_To_My_School('$adminSSN')";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {


    echo '<div align="center">';
    echo '<p align="center"> <pre>' .'<b>SSN</b><br>';



    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['student_ssn'];
        echo "<button class='records' id='$id'>" . '<pre style="color:black">' . $row['student_ssn'] .'</pre></button><br>';
        $id++;
    }

    }
else
    echo "<h3 align='center'>No Records to show</h3>";
?>




<div id="dialog-form" title="Dialog Form">
    <form action="verifyStudents.php" method="post">
        <fieldset>
            <input id="ssn" name=ssnStudent type="hidden" value="">
            <label>Username:</label>
            <input id="username" name="usernameStudent" type="text">
            <label>Password:</label>
            <input id="password" name="passwordStudent" type="password">
            <input id="submit" type="submit" value="Submit">
        </fieldset>
    </form>
</div>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
