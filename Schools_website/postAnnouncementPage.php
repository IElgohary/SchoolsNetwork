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
            border-color: darkgrey;
        }



    </style>

<body>
<h1 align="center">Post Announcement</h1>


    <div align="center">
    <form action="postAnnouncement.php" method="post">
        <fieldset>
            <label>Title:</label>
            <input id="title" name="title" size="25"><br>
            <label>Description:</label>
            <textarea id="description" name="description" style="margin-top:10px"></textarea><br>
            <label>Type:</label>
            <input id="type" name="type" size="25"><br>
            <input id="submit" type="submit" value="Submit">
        </fieldset>
    </form>
        <script src="js/bootstrap.min.js"></script>

</body>
</html>
