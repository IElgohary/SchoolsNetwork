<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel = "stylesheet"/>
    <title>Search Results</title>

    <?php require_once ('Connect.php');
    include "header.php"; ?>
</head>
<body>
<div class="page-header" align="center">
    <h3>Schools</h3>
</div>
<?php
$school = $_GET['school'];
$query = "call searchByName('{$school}');";
$result = $conn->query($query) or die($conn->error);

if($result->num_rows)
{
    echo "<div class=\"container \" align=\"center\">";
    echo "<table class='table-bordered table-responsive table-hover table-striped'>";
    echo"<tr >
                <th style='text-align: center'>Name</th>
         </tr>";
    while($r = $result->fetch_assoc())
    {
        echo "<tr align='center'>";
        echo "<td align='center'>";
        echo "<form action=\"School_info.php\" method=\"post\">";
        echo "<input type='hidden' name='school_name' value=\"".$r['name']."\" >";
        echo "<button class='button-transparent' href='School_info.php' type='submit' >".$r['name']."</button>";
        echo "</form></td>";
        echo "</tr>";

    }
    echo "</table></div>";
}
else
{
    echo "<h4 align='center'>No Results Found</h4>";
}

?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>