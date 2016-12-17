<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel = "stylesheet"/>
    <title>Children's Teachers</title>
    <?php include "header.php";?>
</head>
<body>
<div class="page-header" align="center">
<h3>Children's Teachers</h3>
</div>
<?php
require_once ('Connect.php');

$parent = $_SESSION['username'];

$query = "Select c.name, c.ssn from Children c WHERE parent_username = '{$parent}';";
$result = $conn->query($query) ;
$children = array();
while($c = $result->fetch_assoc())
    $children[] = $c;
$result->free();

$query = "call Show_Children_Teachers('{$parent}');";
$result = $conn->query($query);
$teachers = array();
while($teacher = $result->fetch_assoc())
    $teachers[] = $teacher;
$result ->free();


if($children)
{
    foreach($children as $child )
    {
        echo "<div class=\"container \" align=\"center\">";
        echo "<h3>" . $child['name'] . "</h3><br/>";
        echo "<table class='table-bordered table-responsive'>";
        echo"<tr >
                <th style='text-align: center'>Teacher's Name</th>
                <th style='text-align: center'>Average Rating</th>
                <th style='text-align: center'>Your Rating</th>
                <th style='text-align: center'>Action</th>
            </tr>";

        foreach( $teachers as $teacher)
        {
            if($teacher['student_ssn'] == $child['ssn'])
            {
                echo "<tr align='center'>";
                echo "<form action=\"Rate_Teacher.php\" method=\"post\">";
                echo "<td>";
                echo $teacher['first_name'] . " " . $teacher['last_name'];
                echo "</td><td>";
                echo $teacher['overall_rating'];
                echo "</td>";
                echo "<td>";
                echo " <label for = '1' > 1 </label> ";
                if($teacher['rate_value']== 1)
                    echo "<input type='radio' name='rate' value= '1' id = '1' checked='checked' /> ";
                else
                    echo "<input type='radio' name='rate' value= '1' id = '1' /> ";
                echo "<label for = '2'> 2 </label> ";
                if($teacher['rate_value']== 2)
                    echo "<input type='radio' name='rate' value= '2' id = '2' checked='checked' /> ";
                else
                    echo "<input type='radio' name='rate' value= '2' id = '2' /> ";
                echo "<label for = '3'> 3 </label> ";
                if($teacher['rate_value']== 3)
                    echo "<input type='radio' name='rate' value= '3' id = '3' checked='checked' /> ";
                else
                    echo "<input type='radio' name='rate' value= '3' id = '3' /> ";
                echo "<label for = '4'> 4 </label> ";
                if($teacher['rate_value'] == 4)
                    echo "<input type='radio' name='rate' value= '4' id = '4' checked='checked' /> ";
                else
                    echo "<input type='radio' name='rate' value= '4' id = '4' /> ";
                echo "<label for = '5'> 5 </label> ";
                if($teacher['rate_value']== 5)
                    echo "<input type='radio' name='rate' value= '5' id = '5' checked='checked' /> ";
                else
                    echo "<input type='radio' name='rate' value= '5' id = '5' /> ";
                echo "<input type = 'hidden' name = 'teacher' value =\"". $teacher['teacher_ssn']."\"/>";
                echo "</td>";
                echo "<td>";
                echo "<input type='submit' value='Rate' class='btn btn-group-lg btn-info'/>";
                echo "</td></form></tr>";

            }
        }
        echo "</table></div>";
    }
}


?>
</body>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>