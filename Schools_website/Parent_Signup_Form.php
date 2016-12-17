<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/bootstrap.css" rel = "stylesheet"/>
    <title>Parent Sigup</title>
</head>
<body>
<?php session_start();
include"header.php" ?>
<div class="container " align="center">
    <form action="Parent_Signup.php" method="post" >
        <div class="row" >
            <div class="col-lg-4 col-lg-offset-4">
                <div class="input-group">
                    <label for ="username">Username:</label>
                    <input type="text" name ="username" id = "username" class="form-control">
                    <br/>
                    <label for ="password">Password:</label>
                    <input type="password" name ="password" id = "password" class="form-control">
                    <br/>
                    <label for ="fname">First Name:</label>
                    <input type="text" name ="fname" id = "fname" class="form-control">
                    <br/>
                    <label for ="lname">Last Name:</label>
                    <input type="text" name ="lname" id = "lname" class="form-control">
                    <br/>
                    <label for ="email">Email:</label>
                    <input type="email" name ="email" id = "email" class="form-control">
                    <br/>
                    <label for ="home">Home Phone number:</label>
                    <input type="text" name ="home" id = "home" class="form-control">
                    <br/>
                    <label for ="city">City:</label>
                    <input type="text" name ="city" id = "city" class="form-control">
                    <br/>
                    <label for ="street">Street:</label>
                    <input type="text" name ="street" id = "street" class="form-control">
                    <br/>
                    <label for ="block">Block:</label>
                    <input type="text" name ="block" id = "block" class="form-control">
                    <br/>
                    <label for ="zipcode">Zipcode:</label>
                    <input type="text" name ="zipcode" id = "zipcode" class="form-control">
                    <br/>
                    <label for ="mobile">Mobile:</label>
                    <input type="text" name ="mobile" id = "mobile" class="form-control">
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <input type="submit" value="Apply" class="btn btn-group-lg btn-info form-control"/>
                </div>
            </div>
        </div>

    </form>
</div>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>