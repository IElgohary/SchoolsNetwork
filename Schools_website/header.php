

    <link href="css/bootstrap.css" type="text/css" rel="stylesheet"/>
    <meta name="viewport" content="width= device-width, initial-scale=1"/>
    <nav class="nav navbar-default">
        <div class="container-fluid">
            <?php if (session_status() == PHP_SESSION_NONE) {
                session_start();
            } ?>
            <div class="navbar-header">
                <ul class="nav navbar-nav">
                    <li><a href="index.php" class="navbar-brand glyphicon glyphicon-home">SchoolNetwork</a></li>
                    <li><a href="SchoolsList.php" class="btn">List All Schools</a></li>
                    <li><a href="Advanced_School_Search.php" class="btn">Advanced Search</a></li>
                </ul>

            </div>

            <div class="col-sm-3 col-md-3">
                <form class="navbar-form form-inline" role="search" action="Search_School_Name.php">

                    <div class="input-group" >
                        <input type="text" class="form-control" placeholder="Search by School Name" id = 'school' name="school">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit" ><i class="glyphicon glyphicon-search"></i></button>

                        </div>


                    </div>
                </form>

            </div>


            <?php
            if (isset($_SESSION['class'])&&$_SESSION['class'] == 'Parent') {
                ?>
                <ul class="nav navbar-nav navbar-right"  >
                    <li class="dropdown">
                        <a class="dropdown-toggle glyphicon glyphicon-menu-hamburger" data-toggle="dropdown" href="#" >Menu
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Apply_for_Child_Form.php" >Apply For Child</a></li>
                            <li><a href="View_Schools_Accepted_My_Children.php">Enroll Children</a></li>
                            <li> <a href="View_Children_Schools.php">Schools</a></li>
                            <li><a href="View_Children_Teachers.php" >Teachers</a></li>
                            <li><a href="View_Children_Reports.php" >Reports</a></li>
                            <li><a href="View_My_Reviews.php" >My Reviews</a></li>
                            <li><a href="Add_Mobile_Form.php" >Add Mobile Number</a></li>
                        </ul>
                    </li>
                </ul>

            <?php }elseif (isset($_SESSION['class'])&&$_SESSION['class'] == 'Admin') {?>
                <div class="navbar-header" style="margin-left: 41%">
                    <ul class="nav navbar-nav">
                        <li><a href="admin.php" class="nav navbar-nav navbar-right">Admin Page </a></li>
                    </ul>
                </div>

            <?php }elseif (isset($_SESSION['class'])&&$_SESSION['class'] == 'Teacher') {?>
                <ul class="nav navbar-nav navbar-right"  >
                    <li class="dropdown">
                        <a class="dropdown-toggle glyphicon glyphicon-menu-hamburger" data-toggle="dropdown" href="#" >Menu
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="TeacherCourses.php" >View My Courses</a></li>
                           <li> <a href="AddAssignment.php" >Post new Assignment</a></li>
                            <li><a href="Choose_Course_For_Assignment.php" >View posted Assignments</a></li>
                            <li><a href="ViewMyStudents.php">View My Students</a></li>
                            <li><a href="Choose_Course_For_Questions.php">View Asked Questions</a></li>
                            <li><a href="AddReport.php" >Write a report</a></li>
                        </ul>
                    </li>
                </ul>
            <?php }elseif (isset($_SESSION['class'])&&$_SESSION['class'] == 'Student') {?>
                <ul class="nav navbar-nav navbar-right"  >
                    <li class="dropdown">
                        <a class="dropdown-toggle glyphicon glyphicon-menu-hamburger" data-toggle="dropdown" href="#" >Menu
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <a href="Activities_of_School.php" >View School Activities</a>
                            <a href="View_Course_Assignments.php">View Assignments</a>
                            <a href="Grades_of_Assignments_Solved.php">View Assignments Grades</a>
                            <a href="View_Clubs.php">View Clubs</a>
                            <a href="List_Student_Courses.php">View Courses</a>
                            <a href="View_Course_Questions.php">View All Questions</a>
                            <a href="Update_Student_Account.php">View My Information</a>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
            <ul class="nav navbar-nav navbar-right">
            <?php
            if (isset($_SESSION['username'])) {
                ?>

                    <li><a href="Logout.php" class="glyphicon glyphicon-log-out">Logout</a></li>

            <?php } else { ?>
                <li class="dropdown">
                    <a class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" href="#" >Signup
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="Teacher_Signup_Form.php" >Teacher SignUp</a></li>
                        <li><a href="Parent_Signup_Form.php" >Parent SignUp</a></li>
                    </ul>
                </li>


            <?php } ?>

            </ul>
        </div>

    </nav>




