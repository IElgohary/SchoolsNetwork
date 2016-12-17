<?php
session_start();
?>

<?php
include 'header.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>Admin Page</title>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="30">
    <style>
        a{
            color: black;
        }
    </style>
</head>


<body bgcolor="#e8e6e5">

<br>
<h1 align="center">Admin Page</h1>

<div class="adminOptions">
    <h2 >Verify Teachers</h2>
    <p>As an admin you can verify unverified teachers and set their username/passwords.</p>
    <button onclick="location.href='verifyTeachersPage.php'" align="center" ><a>Click Here To verify teachers</a></button>
</div>

<hr>

<div class="adminOptions">
    <h2 >Applications</h2>
    <p>View applications of students and accept/reject.</p>
    <button onclick="location.href='acceptChildrenPage.php'" align="center"><a>Click Here To view applications</a></button>
</div>
<hr>
<div class="adminOptions">
    <h2 >Verify Enrolled Students</h2>
    <p>View a list of newly enrolled students in the school you are responsible of for verification by
        assigning to them a unique username and password.</p>
    <button onclick="location.href='verifyStudentsPage.php'" align="center"><a>Click Here To verify students</a></button>
</div>
<hr>
<div class="adminOptions">
    <h2 >Edit School Information</h2>
    <p>Edit the information of the school in the school  your working in.</p>
    <button onclick="location.href='editSchoolInfoPage.php'" align="center"><a>Click Here To edit your school information</a></button>

</div>
<hr>
<div class="adminOptions">
    <h2 >Post Announcements</h2>
    <p>Post announcements with the following information: date, title, description and type (events, news,
        trips ...etc)</p>
    <button onclick="location.href='postAnnouncementPage.php'" align="center"><a>Click Here To post an announcement</a></button>

</div>
<hr>
<div class="adminOptions">
    <h2 >Create&Assign Activities</h2>
    <p>Create activities and assign every activity to a certain teacher.</p>
    <button onclick="location.href='createActivityPage.php'" align="center"><a>Click Here To create an activity</a></button>

</div>
<hr>
<div class="adminOptions">
    <h2 >Assign Teachers</h2>
    <p>Assign teachers in your school to courses.</p>
    <button onclick="location.href='assignTeacherToCoursePage.php'" align="center"><a>Click Here To assign teachers</a></button>

</div>

</body>
</html>