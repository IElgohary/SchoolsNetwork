<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <title>Schools List</title>
    <?php
    include "header.php";
    ?>
</head>
<body>
<?php

require_once ("Connect.php");

$queryLevels= "Select * from Levels";
$responseLevels=@mysqli_query($conn,$queryLevels);
$levels=array();
while($row=$responseLevels->fetch_assoc())
    $levels[]=$row;
$responseLevels->free();

$querySchools= "call listSchools()";
$responseSchools=@mysqli_query($conn,$querySchools);
$schools=array();
while($row= $responseSchools->fetch_assoc())
    $schools[]=$row;
$responseSchools->free();



foreach($levels as $level)
{
    echo "<div class='container col-lg-4 col-md-4 col-sm-12' align=\"center\">";
    echo "<h3>" . $level['value'] . " " . "Schools" . "</h3><br/>";
    echo "<table class='table-bordered table-responsive table-hover table-striped'>";
    echo"<tr >
                <th style='text-align: center'>Name</th>
         </tr>";


    foreach( $schools as $school)
        {
            if($level['value'] == $school['Level'])
            {
                echo "<tr align='center'>";
                echo "<td align='center'>";
                echo "<form action=\"School_info.php\" method=\"post\">";
                echo "<input type='hidden' name='school_name' value=\"".$school['Name']."\" >";
                echo "<button class='button-transparent' href='School_info.php' type='submit' >".$school['Name']."</button>";
                echo "</form></td>";
                echo "</tr>";
            }
        }
    echo "</table></div>";
}

//}



?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
