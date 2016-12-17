<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/bootstrap.css" rel = "stylesheet"/>
    <title>Teacher Sigup</title>
</head>
<body>
<?php session_start();
require_once ('Connect.php');
	include"header.php";
    $query="Select * from Schools;";
    $result = $conn->query($query);
    $names = array();
    while($name = $result->fetch_assoc())
        $names[] = $name;
$result->free();?>
<div class="container " align="center">
    <form action="Teacher_Signup.php" method="post" >
        <div class="row" >
            <div class="col-lg-4 col-lg-offset-4">
                <div class="input-group">
                    <label for ="ssn">SSN:</label>
                    <input type="text" name ="ssn" id = "ssn" class="form-control" required>
                    <br/>
                    <label for ="fname">First Name:</label>
                    <input type="text" name ="fname" id = "fname" class="form-control" required>
                    <br/>
                    <label for ="mname">Middle Name:</label>
                    <input type="text" name ="mname" id = "mname" class="form-control" required>
                    <br/>
                    <label for ="lname">Last Name:</label>
                    <input type="text" name ="lname" id = "lname" class="form-control" required>
                    <br/>
                    <label for ="email">Email:</label>
                    <input type="email" name ="email" id = "email" class="form-control" required>
                    <br/>
                    <label for ="gender">Gender:</label>
                    <input type="radio" name="gender" value="Male" id ="gender" required/>Male
                    <input type="radio" name="gender" value="Female"/>Female
                    <br/>
                    <label for ="bdate">Birth Date:</label>
                    <input type="date" name="bdate" id="bdate" class="form-control" required/>
                    <br/>
                    <label for ="school">School:</label>
                    <select class='form-control' name='school' id='school' required>
        			<?php foreach($names as $n)
       					 echo "<option>" .$n['name']. "</option>"
					?>
    				</select>
    				<br/>

                    <label for ="city">City:</label>
                    <input type="text" name ="city" id = "city" class="form-control" required>
                    <br/>
                    <label for ="street">Street:</label>
                    <input type="text" name ="street" id = "street" class="form-control" required>
                    <br/>
                    <label for ="block">Block:</label>
                    <input type="text" name ="block" id = "block" class="form-control" required>
                    <br/>
                    <label for ="zipcode">Zipcode:</label>
                    <input type="text" name ="zipcode" id = "zipcode" class="form-control" required>
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