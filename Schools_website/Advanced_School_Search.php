<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <title>Advanced Search</title>
</head>
<body>
<?php
include "header.php";
require_once('Connect.php');

?>
<div class="page-header" align="center">
    <h3>Advanced Search</h3>
</div>
<?php
if (isset($_POST['submit'])) {

    $school = $_POST['school'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $block = $_POST['block'];
    $type = $_POST['type'];
    $schools=array();




    $query = "call searchByName('{$school}');";
    $result = mysqli_query($conn,$query);
    $byName = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_next_result($conn);

    $query = "call searchByAddress('{$city}','{$street}','{$block}');";
    $result = mysqli_query($conn,$query);
    $byAddress=mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_next_result($conn);

    function compareDeepValue($val1, $val2)
    {
        return strcmp($val1['name'], $val2['name']);
    }

    $schools = array_uintersect($byName, $byAddress, 'compareDeepValue');
    if(!($type == 'both')) {
        $query = "call searchByType('{$type}');";
        $result = mysqli_query($conn,$query);
        $byType=mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_next_result($conn);

        $schools = array_uintersect($schools, $byType, 'compareDeepValue');
    }

    echo "<div class='container' align='center'>";
    echo "<table class='table-bordered table-responsive'>";
    echo"<tr>
                <th>School</th>
                <th>City</th>
                <th>Street</th>
                <th>Block</th>
                <th>Type</th>
            </tr>";
    foreach($schools as $s)
    {
        echo "<div class=\"row\" >
                <div class=\"col-lg-4 col-lg-offset-4\">
                 <div class=\"input-group\">";
        echo "<tr><td>";
        echo "<form action=\"School_info.php\" method=\"post\">";
        echo "<input type='hidden' name='school_name' value=\"".$s['name']."\" >";
        echo "<button class='button-transparent' href='School_info.php' type='submit' >".$s['name']."</button>";
        echo "</form>";
        echo "</td><td>";
        echo $s['city'];
        echo "</td><td>";
        echo $s['street'];
        echo "</td><td>";
        echo $s['block'];
        echo "</td><td>";
        echo $s['type'];
        echo "</td>";
        echo "</tr>";
        echo "</div></div></div>";
    }
    echo "</table></div>";
}else{
?>
<div class="container" align="center">
<form action="Advanced_School_Search.php" method="post">
    <div class="row" >
        <div class="col-lg-4 col-lg-offset-4">
            <div class="input-group">
                    <label for="school">School Name</label>
                    <input type="text" name="school" class="form-control" id="school"/>
                    <br/>
                    <label for="city" class=>City</label>
                    <input type="text" name="city" class="form-control" id="city"/>
                    <br/>
                    <label for="street" >Street</label>
                    <input type="text" name="street" class="form-control" id="street"/>
                    <br/>
                    <label for="block">Block</label>
                    <input type="text" name="block" class="form-control" id="block"/>
                    <br/>
                    <label for ="type" >Type</label>
                    <select class="form-control" name="type" id="type">
                        <option>national</option>
                        <option>international</option>
                        <option selected>both</option>
                    </select>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <input type="submit" name='submit' value="Search" class="btn btn-group-lg btn-info"/>
                </div>
            </div>
        </div>
</form>
</div>
<?php } ?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
