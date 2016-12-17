<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel = "stylesheet"/>
    <title>My Reviews</title>
</head>
<body>
<?php include "header.php"; ?>
<div class="page-header" align="center">
<h3>My Reviews</h3>
    </div>
<?php
require_once ('Connect.php');

$parent = $_SESSION['username'];

$query = "call View_My_Reviews('{$parent}');";
$result = $conn->query($query) ;
$reviews = array();
while($r = $result->fetch_assoc())
    $reviews[] = $r;
$result->free();
echo "<div class='container' align='center'>";
echo "<table class='table-bordered table-responsive'>";
echo"<tr>
                <th>School</th>
                <th>Review</th>
                <th>Action</th>
            </tr>";
foreach($reviews as $review)
{
    echo "<div class=\"row\" >
                <div class=\"col-lg-4 col-lg-offset-4\">
                 <div class=\"input-group\">";
    echo "<tr> <td>";
    echo $review['school_name'];
    echo "</td><td>";
    echo $review['review'];
    echo "</td><td>";
    echo "<form action=\"Review_School.php\" method=\"post\">";
    echo "<input type = 'hidden' name = 'school' value = \"".$review['school_name']."\">";
    echo "<input type = 'hidden' name = 'review' value = \"".$review['review']."\">";
    echo "<input type='submit' value='Edit' class=\"btn btn-group-lg btn-info form-control\"/>";
    echo "</form>";
    echo "<form action=\"Delete_Review.php\" method=\"post\">";
    echo "<input type = 'hidden' name = 'school' value = \"".$review['school_name']."\">";
    echo "<input type='submit' value='Delete' class=\"btn btn-group-lg btn-info form-control\"/>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";

}
echo "</div></div></div></table></div>";

?>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>