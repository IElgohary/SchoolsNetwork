<!DOCTYPE html>
<br>
<head>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <title>Assignments</title>
    <?php include "header.php"; ?>
</head>
<br>
</br>
</br>
<div class='jumbotron'><h1 align='center'> WELCOME TO OUR SCHOOL PAGE </h1></div>
<h4 align='left'> You can view our school info below: </h4>

<?php

require_once ("Connect.php");

$school_name=$_POST['school_name'];

$query="call searchByName('{$school_name}')";
$response=@mysqli_query($conn,$query);

$school_info=array();
while($row=$response->fetch_assoc())
    $school_info[]=$row;
$response->free();



foreach($school_info as $info) {
    if ($info['vision'] != null)
        $school_vision = $info['vision'];
    else
        $school_vision = 'No data';

    if ($info['mission'] != null)
        $school_mission = $info['mission'];
    else
        $school_mission = 'No data';

    if ($info['main_language'] != null)
        $school_main_language = $info['main_language'];
    else
        $school_main_language = 'No data';

    if ($info['fees'] != null)
        $school_fees = $info['fees'];
    else
        $school_fees = 'No data';

    if ($info['block'] != null || $info['street'] != null || $info['city'] != null || $info['zipcode'] != null)
        $school_address = $info['block'] . " " . $info['street'] . ", " . $info['city'] . ", " . $info['zipcode'];
    else
        $school_address = 'No data';

    if ($info['phone_number'] != null)
        $school_phone_number = $info['phone_number'];
    else
        $school_phone_number = 'No data';

    if ($info['email'] != null)
        $school_email = $info['email'];
    else
        $school_email = 'No data';

    if ($info['type'] != null)
        $school_type = $info['type'];
    else
        $school_type = 'No data';

    if ($info['max_grade'] != null)
        $school_max_grade = $info['max_grade'];
    else
        $school_max_grade = 'No data';

    if ($info['min_grade'] != null)
        $school_min_grade = $info['min_grade'];
    else
        $school_min_grade = 'No data';

    if ($info['general_info'] != null)
        $school_general_info = $info['general_info'];
    else
        $school_general_info = 'Currently no general info';

    echo "<div class='container'>
            <div class='row'>
                
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'> 
                <h4><a href='#name_col' data-toggle='collapse'>Name</a></h4>
                <div id='name_col' class='collapse'>" . $school_name . "</div>
                </div>
                
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'> 
                <h4><a href='#vision_col' data-toggle='collapse'>Vision</a></h4>
                <div id='vision_col' class='collapse'>" . $school_vision . "</div>
                </div>  
                
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'> 
                <h4><a href='#mission_col' data-toggle='collapse'>Mission</a></h4>
                <div id='mission_col' class='collapse'>" . $school_mission . "</div>
                </div>
                
                
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'> 
                <h4><a href='#main_language_col' data-toggle='collapse'>Main Language</a></h4>
                <div id='main_language_col' class='collapse'>" . $school_main_language . "</div>
                </div>
                
                <div class='clearfix visible-lg'></div>
                
                </br>
                
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'> 
                <h4><a href='#fees_col' data-toggle='collapse'>Fees</a></h4>
                <div id='fees_col' class='collapse'>" . $school_fees . "</div>
                </div>
                
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'> 
                <h4><a href='#address_col' data-toggle='collapse'>Address</a></h4>
                <div id='address_col' class='collapse'>" . $school_address . "</div>
                </div>
                
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'> 
                <h4><a href='#phone_num_col' data-toggle='collapse'>Phone number</a></h4>
                <div id='phone_num_col' class='collapse'>" . $school_phone_number . "</div>
                </div>
                
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'> 
                <h4><a href='#email_col' data-toggle='collapse'>Email</a></h4>
                <div id='email_col' class='collapse'>" . $school_email . "</div>
                </div>
                
                </br>
                </br>
                </br>
                </br>
                
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'> 
                <h4><a href='#type_col' data-toggle='collapse'>Type</a></h4>
                <div id='type_col' class='collapse'>" . $school_type . "</div>
                </div>
                
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'> 
                <h4><a href='#min_grade_col' data-toggle='collapse'>Minimum Grade</a></h4>
                <div id='min_grade_col' class='collapse'>" . $school_min_grade . "</div>
                </div>
                
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                <h4><a href='#max_grade_col' data-toggle='collapse'>Maximum Grade</a></h4>
                <div id='max_grade_col' class='collapse'>" . $school_max_grade . "</div>
                </div>
                
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                <h4><a href='#general_info_col' data-toggle='collapse'>General Info</a></h4>
                <div id='general_info_col' class='collapse'>" . $school_general_info . "</div>
                </div></br></br></br></br>";
}

mysqli_next_result($conn);

$query2="Select * from Parents_review_Schools where school_name='{$school_name}'";
$response2=@mysqli_query($conn,$query2);
$school_reviews=array();
while($row2=$response2->fetch_assoc())
    $school_reviews[]=$row2;
$response2->free();

echo "<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
    <h4><a href='#reviews_col' data-toggle='collapse'>Reviews</a></h4>
    <div id='reviews_col' class='collapse'>";
foreach($school_reviews as $review)
{
    echo $review['review']. "</br></br>";
}
echo"</div></div>";



mysqli_more_results($conn);
$query3="Select * from Announcements A,Employees E where A.admin_ssn=E.ssn AND E.school_name='{$school_name}'";
$response3=@mysqli_query($conn,$query3);
$school_announcements=array();
while($row3=$response3->fetch_assoc())
    $school_announcements[]=$row3;
$response3->free();


echo "<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
    <h4><a href='#announcements_col' data-toggle='collapse'>Announcements</a></h4>
    <div id='announcements_col' class='collapse'>";

foreach($school_announcements as $announcement)
{
    echo  $announcement['description'] . "</br></br>";
}
echo "</div></div>";


echo   "</div></div>";


?>


<script src='https://ajax.google.apis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
