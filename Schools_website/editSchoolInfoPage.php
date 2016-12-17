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
    <link rel="stylesheet" href="navigation.css">
    <style>
        a {
            display: block;
        }

        a:hover, a:focus {
            color: #004c6e;
        }

        button {
            background-color: grey;
            height:100px;
        }

        #dialog-form{
            visibility: hidden;
        }



    </style>

<body>
<h1 align="center">Update School Info</h1>
<br class="helper" id="nill">


<script>


    $(function () {
        document.getElementById('dialog-form').style.visibility='visible';
        var dialog = $('#dialog-form').dialog({
            autoOpen: false,
            width:600,
        });

        $('.records').on("click", function () {
            var splitValues=this.id.split(",");
            document.getElementById('name').value=splitValues[0];
            document.getElementById('vision').value=splitValues[1];
            document.getElementById('mission').value=splitValues[2];
            document.getElementById('main_language').value=splitValues[3];
            document.getElementById('fees').value=splitValues[4];
            document.getElementById('city').value=splitValues[5];
            document.getElementById('street').value=splitValues[6];
            document.getElementById('block').value=splitValues[7];
            document.getElementById('zipcode').value=splitValues[8];
            document.getElementById('phone_number').value=splitValues[9];
            document.getElementById('email').value=splitValues[10];
            document.getElementById('type').value=splitValues[11];
            document.getElementById('max_grade').value=splitValues[12];
            document.getElementById('min_grade').value=splitValues[13];
            document.getElementById('general_info').value=splitValues[14];

            console.log('hopalaa');
            dialog.dialog('open');
        });
    });

</script>
<?php

require_once('Connect.php');
$adminSSN =$_SESSION['ssn'];
$sql = "select * from Schools WHERE name=(SELECT school_name FROM Employees WHERE ssn=$adminSSN)";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id =implode(",",array_values($row));
echo "<div align='center'><button class='records' id='$id'>" .'Update School Info' .'</button></div>';
?>

<div id="dialog-form" title="Dialog Form">
    <form action="editSchoolInfo.php" method="post" id="myForm">
        <fieldset>
            <label>Name</label>
            <input id="name" name="name" type="text" size="50">
            <label>Vision</label>
           <input id="vision" name="vision" type="text" size="50" >
            <label>Mission</label>
            <input id="mission" name="mission" type="text" size="50">
            <label>Main-Language</label>
            <input id="main_language" name="main_language" type="text" size="50">
            <label>Fees</label>
            <input id="fees" name="fees" type="text" size="50">
            <label>City</label>
            <input id="city" name="city" type="text" size="50">
            <label>Street</label>
            <input id="street" name="street" type="text" size="50">
            <label>Block</label>
            <input id="block" name="block" type="text" size="50">
            <label>Zipcode</label>
            <input id="zipcode" name="zipcode" type="text" size="50">
            <label>Phone-Number</label>
            <input id="phone_number" name="phone_number" type="text" size="50">
            <label>Email</label>
            <input id="email" name="email" type="text" size="50">
            <label>Type</label>
            <input id="type" name="type" type="text" size="50">
            <label>Max-Grade</label>
            <input id="max_grade" name="max_grade" type="text" size="50">
            <label>Min-Grade</label>
            <input id="min_grade" name="min_grade" type="text" size="50">
            <label>General-Info</label>
            <input id="general_info" name="general_info" type="text" size="50">
            <input id="submit" type="submit" value="Submit">

        </fieldset>
    </form>
</div>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
