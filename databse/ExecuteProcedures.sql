use School_Network;
# “As a system administrator, I should be able to ...”
#1 Create a school with its information:
# school name, address, phone number, email, general informa- tion, vision, mission, main language,
# type(national, international) and fees.

call createSchool('El Daher Secondary School','To establish the Egyptian ethics and traditions in young adults',
		'To follow the Egyptian Ministry of Education Curriculum','Arabic',120,'Cairo','El Daher St.','50','11563','0225884032',
		null,'national',12,9,null);
#2 Add courses to the system with all of its information: course code, course name,
# course level (elementary, middle, high), grade, description and prerequisite course(s).
call createCourse('SCI501','Biology','Introduction to biology',5,'Elementary');

# 3 Add admins to the system with their information: first name, middle name, last name, birthdate, address, email, username,
# password, and gender. Given the school name, I should assign admins to work in this school.
# Note that the salary of the admin depends on the type of the school. The salary of an admin working in a national school
# is 3000 EGP, and that working in an international school is 5000 EGP.
call addAdmin('1112223349','ali_kamal','aliAli313','Ali','Kamal','Ali', '1975-11-25', 'ali_ali_kamal@hotmail.com', 'male','Cairo',
	'Shoubra St.', '105', '11146','El Daher Secondary School');
# call updateAdminSchool('El Daher Secondary School','1112223349');

# 4 Delete a school from the database with all of its corresponding information.
# Students and employees of this school should not be deleted from the system,
# but should not have a username and password on the system until they are assigned to a new school again.
call deleteSchool('El Daher Secondary School');

# "As a system user (registered, or not registered), I should be able to ...”
# 1 Search for any school by its name, address or its type (national/international).
call searchByName('Modern English School Cairo');
call searchByAddress('New Cairo','Khaled Ibn El Waleed','Area C');

# 2 View a list of all available schools on the system categorized by their level.
# call listSchools();

#3 View the information of a certain school along with the reviews written about it
#  and teachers teaching in this school.
# call schoolsInfo('Modern English School Cairo');

###############################################################################################################################################################


# "As an admin, I shoue be able to..."

#ExecAdmin number 5
#executing procedure for editing the information of the school by the admin working in it
# call editSchool('1112223340','American International School of Egypt','A great nation starts by inspiring students.','We strive to build a whole generation who can excel in different fields','English',80000.00,'Cairo',
# 				'Beside the Police Academy','3','12340','0226188435','registrar@aisegypt.com','international',12,1,null);






#ExecAdmin number 6
# executeing posting an announcement prcedure by an admin
call postAnnouncement('Merrry Christmas', 'Merry Christmas, no school activities will take place next week.', 'news','2016-12-23','1112223460');








# “As a teacher, I should be able to ...”
-- executing the SignUpTeacher procedure
use School_Network;
call SignUpTeacher('3489214901','Omar', 'Kareem', 'Ahmed', '1990-3-21', 'Cairo', 'Abo El Feda St., Zamalek', '12', '11634',
					'omar_ahmed@gmail.com', 'male','American International School of Egypt');

call SignUpTeacher('3489214903','Ali', 'Sayed', 'Ahmed', '1989-2-1', 'Cairo', 'Abo El Feda St., Zamalek', '12', '11234',
					'Ali_Sayed@gmail.com', 'male','Sam Baiker American Schools');

call SignUpTeacher('3489214904','Ahmed', 'Hesham', 'Ali', '1990-3-1', 'Cairo', 'El Orouba St.', '20', '11260',
					'ahmed_hesh_ali@hotmail.com', 'male','American International School of Egypt');


call SignUpTeacher('3489214905','Mohamed', 'Magdy', 'Mohamed', '1988-3-1', 'Cairo', 'Salah Salem St.', '205', '11257',
					'mohamed_magdy12@gmail.com', 'male','American International School of Egypt');


#ExecAdmin number 1
#executing proc for verifying teachers by admin for the school the admin works in
use School_Network;
call verifyTeacher('1112223340','3489214901','omar_kareem_ahmed_AISE','omarKareem4901');
call verifyTeacher('1112223340','3489214904','ahmed_hesham_ali_AISE','ahmedHesham4904');
call verifyTeacher('1112223340','3489214905','mohamed_magdy_mohamed_AISE','mohamedMagdy4905');


#ExecAdmin number 3
#executing procedure for adding other admins by an admin at his school
call addOtherAdmins('1112223340','1112223460','markovic_carl','markovicCarl3460','Markovic','Mario','Carl','1985-12-12','markovicarl@gmail.com','male','Cairo','15 May Bridge St., Zamalk','120','11290');


#ExecAdmin number 4
#executing proc for deleting an employee by an admin from the system
# call deleteEmployee('3489214904');


#ExecAdmin number 7
#executing procedure for creating an activity and assigning a teacher to it
call createActivity('Math Final Revision','B2.203','Study','2016-12-10','3489214901','1112223340');


#ExecAdmin number 8
#executing procedure for updating the activity teacher
# call updateActivityTeacher (1,'3489214905');


#ExecAdmin number 9
#executing procedure for assigning teacher to courses in my school by an admin
call assignTeacherToCourse('3489214901','MATH1203');


#ExecAdmin number10
#executing procedure for assigning supervisors to a teacher in my school by an admin
call assignSupervisor('3489214901','3489214905');





-- executing PostAssignments procedure by a teacher
call PostAssignment('3489214901','MATH1203','2016-11-18','2016-11-25','Solve Questions 1.24 a b c d f g j , 1.27 a b d from textbook page 121');




-- ececuting WriteReport by a teacher
call WriteReport('3489214901', '23456098762', 'Math Report #1 for first Month',
	'Improvement is needed but it is okay since it is the first month of the year','2016-11-18');



-- executing the viewMyCourses procedure by a teacher
# call ViewMYCourses('3489214901');



-- executing ViewAssignmentSolutions by a teacher
# call ViewAssignmentSolutions('3489214901', 1, 'MATH1203');



-- executing GradeAssignment by a teacher
call GradeAssignment(1,'23456098762', 85.50);


-- Executing DeleteAssignment by a teacher
# call DeleteAssignment(1);



-- Executing ViewQuestions by a teacher
# call ViewQuestions('3489214901', 'MATH1203');



-- Executing AnswerQuestion by a teacher
call AnswerQuestion('23456098762','MATH1203','Inquiry about Problem 1.27 a in text book', 'We will explain this next class in details.');




-- executing ViewMyStudents by a teacher
# call ViewMyStudents('3489214901');




-- executing StudentsWithNoActivities by a teacher
call StudentsWithNoActivities('3489214901');




-- Executing StudentInMostClubs
call StudentInMostClubs( 'American International School of Egypt');


# “As a parent, I should be able to ...”

# 1 Sign up by providing my name (first name and last name),
# contact email, mobile number(s), address, home phone number, a unique username and password.
call Register_Parent('Osama','Elgohary','osama@mail.com','02387867246','6th October','9','7','Osama','password','12345');
call Register_Parent('Isaac', 'Kamel', 'isaac@hotmail.com','0225846283','Ramsis','6','4','Isaac','password2','11637');
call Register_Parent('Emad', 'Tadros', 'emad@hotmail.com','0225336283','Obour','4','3','Emad','password3','11876');
call Register_Parent('Gamil', 'Khalil', 'gamil@hotmail.com','0225855283','Nasr City','1','2','Gamil','password4','11227');
call Register_Parent('Adel', 'El sayed', 'adel@gmail.com','0225336283','5th Settlement','3','3','Adel','password5','11557');


call Register_Parent_Mobile('01064553921','Osama');
call Register_Parent_Mobile('01064443921','Osama');
call Register_Parent_Mobile('01064550011','Isaac');
call Register_Parent_Mobile('01064558753','Emad');
call Register_Parent_Mobile('01064558888','Gamil');
call Register_Parent_Mobile('01064550000','Adel');



# 2 Apply for my children in any school. For each child I should provide his/her
# social security number (SSN), name, birthdate, and gender.
call Apply_Child_for_School(12,'Osama','23456098762','Islam','6/22/2012','Male','American International School of Egypt');
call Apply_Child_for_School(12,'Osama','23456098762','Islam','6/22/2012','Male','Future Rise Language School');
call Apply_Child_for_School(12,'Osama','23456098763','Eman','6/22/2012','Female','American International School of Egypt');
call Apply_Child_for_School(12,'Osama','23456098763','Eman','6/22/2012','Female','Future Rise Language School');
call Apply_Child_for_School(12,'Isaac','23456098755','Mark','11/21/1995','Male','American International School of Egypt');
call Apply_Child_for_School(12,'Isaac','23456098755','Mark','6/21/1995','Male','Future Rise Language School');
call Apply_Child_for_School(12,'Isaac','23456098750','Ereny','11/13/2000','Female','American International School of Egypt');
call Apply_Child_for_School(12,'Isaac','23456098750','Ereny','11/13/2000','Female','Future Rise Language School');

#ExecAdmin number 11
#executing provedure for accepting or rejecting applications submitted by parents to their children by an admin
call acceptOrReject('American International School of Egypt','23456098762',1);
call acceptOrReject('American International School of Egypt','23456098763',1);
call acceptOrReject('American International School of Egypt','23456098755',1);
call acceptOrReject('American International School of Egypt','23456098750',1);



#ExecAdmin number 4
#executing proc for deleting students by an admin from the system
# call deleteStudents('23456098763');


# 3 View a list of schools that accepted my children categorized by child.
# call Children_Accepted_by_School('Osama');

# 4 Choose one of the schools that accepted my child to enroll him/her.
#  The child remains unverified (no username and password, refer to user story 2 for the administrator)
# until the admin verifies him.
call Enroll_Child_in_School('23456098762','American International School of Egypt');
call Enroll_Child_in_School('23456098755','American International School of Egypt');
call Enroll_Child_in_School('23456098750','American International School of Egypt');
call Enroll_Child_in_School('23456098763','Future Rise Language School');

#ExecAdmin number 2
#executing proc for viewing students by an admin who are enrolled in his/her school
# call View_Students_Enrolled_To_My_School('1112223340');

#ExecAdmin number 2
#executing proc for verifying students by an admins who are enrolled in his/her school and assign to them a usename and password
call verifyStudents('1112223340','23456098762','islam_el_gohary_AISE','islamElGohary8762');
call verifyStudents('1112223340','23456098763','eman_el_gohary_AISE','emanElGohary8763');
call verifyStudents('1112223340','23456098755','mark_arsanious_AISE','markArsanious8755');
call verifyStudents('1112223340','23456098750','ereny_arsanious_AISE','erenyArsanious8750');




# 5 View reports written about my children by their teachers.
# call View_Children_Reports('Osama');

# 6 Reply to reports written about my children by their teachers.
call Reply_to_Reports('Osama','Math Report #1 for first Month','3489214901','Seen');

# 7 View a list of all schools of all my children ordered by its name.
# call View_Schools_of_Children('Osama');

# 8 View the announcements posted within the past 10 days about a school if one of my children is enrolled in it.
call Announcements_About_Children_School('Osama');

# 9 Rate any teacher that teaches my children.
# call Show_Children_Teachers('Osama');
call Rate_Children_Teacher('Osama','3489214901',4);

# 10 Write reviews about my children’s school(s).


# 11 Delete a review that i have written.
# call View_My_Reviews('Osama');
# call Delete_My_Reviews('American International School of Egypt','Osama');

# 12 View the overall rating of a teacher, where the overall rating is calculated as the average of ratings provided by
# parents to that teacher.
# call Teacher_Average_Rating('3489214901',@result);
SELECT @result;

# 13 View the top 10 schools with the highest number of reviews or highest number of enrolled students.
# # This should exclude schools that my children are enrolled in.
# call Top_10_Schools_By_Student_Number('Osama');
# call Top_10_Schools_By_Student_Number('Gamil');
# call Top_10_Schools_By_Reviews('Osama');
# call Top_10_Schools_By_Reviews('Gamil');

# 14 Find the international school which has a reputation higher than all national schools, i.e.
# has the highest number of reviews.
# call Top_International_School();

# “As an enrolled student, I should be able to ...”

# 1 Update my account information except for the username.
# call Update_Student_Account('23456098763', '23456098763','password',6);
# call Update_Student_Account('23456098762', '23456098762','password',6);
#
# 2 View a list of courses’ names assigned to me based on my grade ordered by name.
# call List_Student_Courses('23456098762');


# 3 Post questions I have about a certain course.
call Post_Question_About_Course('MATH1203','23456098762','Inquiry about Problem 1.27 a in text book','Can\'t start solving.');

# 4 View all questions asked by other students on a certain course along with their answers.
# call Questions_Asked_About_Course('MATH1203');

# 5 View the assignments posted for the courses I take.
# call View_Student_Assignments('23456098762');

# 6 Solve assignments posted for courses I take.
call Solve_Assignment('23456098762','1a 2c 3d',1);
call Solve_Assignment('23456098755','1a 2b 3c',1);
call Solve_Assignment('23456098750','1b 2b 3d',1);


# 7 View the grade of the assignments I solved per course.
# call Grades_of_Assignments_Solved('23456098762');

# 8 View the announcements posted within the past 10 days about the school I am enrolled in.
# call Announcements_About_School('23456098762','2016-5-12');

# 9 View all the information about activities offered by my school, as well as the teacher responsible for it.
# call Activities_of_School('23456098762');

# 10 Apply for activities in my school on the condition that I can not join two activities of the same type on the same date.
call Apply_for_Activity('23456098762',1);

# 11 Join clubs offered by my school, if I am a highschool student.
call Join_Clubs('23456098762','Music');

# 12 Search in a list of courses that i take by its name or code.
call Search_Courses_By_Code('23456098762','MATH1203');
call Search_Courses_By_Name('23456098762','math');