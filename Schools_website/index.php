<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel = "stylesheet"/>
    <title>Home</title>

</head>
<body>
<?php

include "header.php";

if (!isset($_SESSION["class"])){?>
<div class="container " align="center">
<form action="Login.php" method="post">
    <div class="row" >
        <div class="col-lg-4 col-lg-offset-4">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name = "username" id = "username" class="form-control"/><br/>

                <label for="password">Password</label>
                <input type="password" name = "password" id="password" class="form-control"/>
                <br/>
                <br/>
                <br/>
                <ul class="list-inline">
                    <li><label for="student">Student</label>
                        <input type="radio" name="class" value="Student" id="student"/></li>
                    <li><label for="teacher">Teacher</label>
                        <input type="radio" name="class" value="Teacher" id="teacher"/></li>
                    <li><label for="admin">Admin</label>
                        <input type="radio" name="class" value="Admin" id="admin"/></li>
                    <li><label for="parent">Parent</label>
                        <input type="radio" name="class" value="Parent" id="parent"/></li>
                </ul>


                <input type="submit" class="btn btn-group-lg btn-info form-control" value="Login" />
            </div>
        </div>
    </div>
    <br/>


</form>
</div>

<?php } ?>

</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>