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

        p.labels: {
            vertical-align: top;
            display: inline-block;
            font-size: 120%;
        }

        #dialog-form{
            visibility: hidden;
        }


    </style>

<body>
<h1 align="center">Verify Teachers</h1>
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
$sql = "call View_Teachers_Applied_for_My_School('$adminSSN')";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {


    echo '<div align="center">';
    echo '<p class="labels">' . '<pre>' . "\t" . '<b>SSN</b>' . "\t" .
        '<b>First Name</b>' . "\t" . '<b>Middle Name</b></p>';




    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['ssn'];
        echo "<button class='records' id='$id'>" . '<pre style="color:black">' . $row['ssn'] . "\t" .
            $row['first_name'] . "\t" . $row['middle_name'] . '</pre>' . '</button>';
        $id++;
    }
}
else
    echo "<h3 align='center'>No Records to show</h3>";

?>




<div id="dialog-form" title="Dialog Form">
    <form action="verifyTeachers.php" method="post">
        <fieldset>
            <input id="ssn" name=ssnTeacher type="hidden" value="">
            <label>Username:</label>
            <input id="username" name="usernameTeacher" type="text">
            <label>Password:</label>
            <input id="password" name="passwordTeacher" type="password">
            <input id="submit" type="submit" value="Submit">
        </fieldset>
    </form>
</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
