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
<h1 align="center">Accept/Reject Children</h1>
<hr>

<h2 align="center">Click on the record you want to update </h2>


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
$adminSSN = $_SESSION['ssn'];
$sql = "call viewChildrenApplications('$adminSSN')";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {


    echo '<div align="center">';
    echo '<p class="labels">' . '<pre>' .
        '<b>Child SSN</b>' . "\t" . '<b>Grade</b> '."\t" . '<b>Parent Username</b></p></div>';

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['child_ssn'].','.$row['school_name'];
        echo "<div align='center'><button class='records' id='$id'>" . '<pre style="color:black">' . $row['child_ssn'] . "\t" .
            $row['grade'] . "\t" . $row['parent_username'] . '</pre>' . '</button>'.'</div>';
        $id++;
    }
}
else
    echo "<h3 align='center'>No Records to show</h3>";

?>




<div id="dialog-form" title="Dialog Form">
    <form action="acceptChildren.php" method="post">
        <fieldset>
            <input id="ssn" name=hiddenValues type="hidden" value="">
            <label>Accept</label>
            <input id="accept" name="accept" value="accept" type="radio">
            <label>Reject</label>
            <input id="reject" name="accept" value="reject" type="radio">
            <input id="submit" type="submit" value="Submit">
        </fieldset>
    </form>
</div>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
