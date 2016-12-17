use School_Network;
# “As a system administrator, I should be able to ...”
#1 Create a school with its information:
# school name, address, phone number, email, general informa- tion, vision, mission, main language,
# type(national, international) and fees.
create procedure createSchool(
  IN nameProc varchar(50) ,
  IN visionProc varchar(300),
  IN missionProc  VARCHAR(300),
  IN main_languageProc  VARCHAR(30),
  IN feesProc  FLOAT(10,2) ,
  IN cityProc  VARCHAR(30) ,
  IN streetProc  VARCHAR(30),
  IN blockProc  VARCHAR(10),
  IN zipcodeProc  VARCHAR(10),
  IN phone_numberProc  VARCHAR(20) ,
  IN emailProc  VARCHAR(100) ,
  IN typeProc  VARCHAR(30),
  IN max_gradeProc  int ,
  IN min_gradeProc  int ,
  IN general_infoProc  VARCHAR(200))

		BEGIN

		 INSERT INTO Schools(name,vision,mission,main_language,fees,
 							city,street,block,zipcode,phone_number,
                             email,type,max_grade,min_grade,general_info)
     VALUES (nameProc,visionProc ,missionProc ,main_languageProc,
            feesProc ,cityProc ,streetProc ,blockProc ,zipcodeProc ,phone_numberProc,
            emailProc ,typeProc ,max_gradeProc ,min_gradeProc ,general_infoProc);
		END;




#2 Add courses to the system with all of its information: course code, course name,
# course level (elementary, middle, high), grade, description and prerequisite course(s).

  create procedure createCourse( # User Story number 2
	  IN codeProc VARCHAR(10) ,
	  IN nameProc VARCHAR(50) ,
	  IN descriptionProc VARCHAR(200) ,
	  IN gradeProc int,
    IN levelProc varchar(50))

      BEGIN
      insert into Courses(code,name,description,grade,level)
      values(codeProc,nameProc,descriptionProc,gradeProc,levelProc);
      END;


   CREATE PROCEDURE assignPrerequisite(course_codeProc VARCHAR(50),prerequisite_codeProc VARCHAR(50))
     BEGIN
      INSERT INTO Courses_Prerequisite_Courses(course_code, prerequisite_code)
      VALUES (course_codeProc,prerequisite_codeProc);
       END ;


# 3 Add admins to the system with their information: first name, middle name, last name, birthdate, address, email, username,
# password, and gender. Given the school name, I should assign admins to work in this school.
# Note that the salary of the admin depends on the type of the school. The salary of an admin working in a national school
# is 3000 EGP, and that working in an international school is 5000 EGP.

	create procedure addAdmin(
    SSNProc    VARCHAR(50),
    usernameProc VARCHAR(50),
    passwordProc    VARCHAR(50),
    first_nameProc  VARCHAR(50),
    middle_nameProc VARCHAR(50),
    last_nameProc   VARCHAR(50),
    birth_dateProc  DATE,
    emailProc      VARCHAR(100),
    genderProc      VARCHAR(10),
    cityProc        VARCHAR(30),
    streetProc      VARCHAR(30),
    blockProc       VARCHAR(10),
    zipcodeProc     VARCHAR(10),
    school_nameProc VARCHAR(50)
  )
    BEGIN
    DECLARE  salaryValue FLOAT;
#Check on type of school to set salary of admin accordingly
    if (SELECT exists (SELECT  * FROM Schools S WHERE S.name=school_nameProc and S.type='international'))
    THEN
      SET salaryValue:=5000;

    ELSE
      SET  salaryValue:=3000;
    END IF ;


    INSERT  INTO Employees(ssn,username, password, first_name, middle_name, last_name,
                           birth_date,  email, gender, salary, city, street, block,
                           zipcode, school_name)
      VALUES (SSNProc,usernameProc,passwordProc,first_nameProc,middle_nameProc,last_nameProc,
              birth_dateProc,emailProc,genderProc,salaryValue,cityProc,
              streetProc,blockProc,zipcodeProc,school_nameProc);

     INSERT INTO Admins(ssn)
       VALUES (SSNProc);


    END;

# Updates the school of the admin and the salary accordingly
  CREATE PROCEDURE updateAdminSchool(schoolName VARCHAR(50),adminSSN VARCHAR(50))
      BEGIN
        DECLARE  salaryValue FLOAT;

    if (SELECT exists (SELECT  * FROM Schools S WHERE S.name=schoolName and S.type='international'))
    THEN
      SET salaryValue:=5000;

    ELSE
      SET  salaryValue:=3000;
    END IF ;

      UPDATE Employees E SET E.school_name=schoolName ,E.salary=salaryValue WHERE E.ssn=adminSSN;
      END;

# 4 Delete a school from the database with all of its corresponding information.
# Students and employees of this school should not be deleted from the system,
# but should not have a username and password on the system until they are assigned to a new school again.
     create procedure deleteSchool(IN nameOfSchool varchar(50))
      BEGIN
        UPDATE Employees
        SET username=NULL , password=NULL
		    WHERE Employees.school_name=nameOfSchool;


        UPDATE Students
        SET username=NULL ,password=NULL
		    WHERE  Students.enrolled_school_name=nameOfSchool;

		    DELETE FROM  Schools
        WHERE Schools.name=nameOfSchool;
        END ;

# "As a system user (registered, or not registered), I should be able to ...”
# 1 Search for any school by its name, address or its type (national/international).
   create procedure searchByName(IN schoolName varchar(50))
     BEGIN
		select * from  Schools S
        where S.name LIKE concat('%',schoolName,'%');
    END ;


	create procedure searchByAddress(schoolCity VARCHAR(30) , schoolStreet VARCHAR(30) ,schoolBlock VARCHAR(10))
  BEGIN

		select * from  Schools S
        where S.city LIKE concat('%',schoolCity,'%') and S.street LIKE concat('%',schoolStreet,'%') and
			  S.block LIKE concat('%',schoolBlock,'%') ;
  END ;
	create procedure searchByType(IN schoolType varchar(30))
    BEGIN
		select * from  Schools S
        where S.type =schoolType;

  END ;

# 2 View a list of all available schools on the system categorized by their level.
	create procedure listSchools()
    BEGIN
    Select S.name as 'Name',E.level as 'Level'
      FROM Schools S join Elementary_Schools E ON S.name=E.school_name

      UNION
    Select S.name as 'Name',M.level as 'Level'
      FROM Schools S join Middle_Schools M ON S.name=M.school_name

      UNION
    Select S.name as 'Name' ,H.level as 'Level'
      FROM Schools S join High_Schools H ON S.name=H.school_name;
    END ;


#3 View the information of a certain school along with the reviews written about it
#  and teachers teaching in this school.

create procedure schoolsInfo(schoolName VARCHAR(50))
    BEGIN
		select
    S.name ,
		S.vision,
		S.mission ,
		S.main_language ,
		S.fees,
		S.city ,
		S.street ,
		S.block ,
		S.zipcode ,
		S.phone_number ,
		S.email ,
		S.type ,
		S.max_grade ,
		S.min_grade ,
		S.general_info,
    E.first_name,
    E.middle_name,
    E.last_name,
    R.review

        from ((Schools S LEFT JOIN Parents_review_Schools R ON S.name=R.school_name)
          LEFT JOIN Employees E ON E.school_name=S.name)
          WHERE S.name=schoolName and
                (E.ssn IN (SELECT T.ssn From Teachers T) OR  E.ssn is NULL) ;
    END;

# “As an administrator, I should be able to ...”
# 1 View and verify teachers who signed up as employees of the school I am responsible of,
#  and assign to them a unique username and password.
# The salary of a teacher is calculated as follows: years of experience * 500 EGP.

CREATE PROCEDURE View_Teachers_Applied_for_My_School(adminSSN VARCHAR(50))
  BEGIN

    Select * from Employees e2
    Inner Join
    (Select * from Employees e
    INNER JOIN Schools s on e.school_name = s.name
    INNER JOIN Teachers t on t.ssn = e.ssn
    WHERE e.username is null) temp on temp.name = e2.school_name
    Where e2.ssn = adminSSN;

  END;

 CREATE PROCEDURE verifyTeacher(adminSSN VARCHAR(50),teacherSSN VARCHAR(50),usernameProc VARCHAR(50),passwordProc VARCHAR(50))
    BEGIN
        DECLARE salaryValue FLOAT(10,2);
        if(SELECT exists(SELECT * FROM Teachers Join Employees E1 WHERE
            Teachers.ssn=E1.ssn and Teachers.ssn=teacherSSN and
            E1.school_name in (Select E2.school_name
                             From Employees E2
                              WHERE E2.ssn=adminSSN))) THEN
          UPDATE Employees E, Teachers T SET E.username=usernameProc,
                E.password=passwordProc ,E.salary=T.experience*500
          WHERE E.ssn=T.ssn and E.ssn=teacherSSN;

        ELSE
          SELECT 'Teacher not found in teachers you have access to';
        END IF;
    END;

# 2 View and verify students who enrolled to the school I am responsible of,
# and assign to them a unique username and password.

CREATE PROCEDURE View_Students_Enrolled_To_My_School(adminSSN VARCHAR(50))
  BEGIN
    Select st.* from Students st
    Inner Join Schools sc on st.enrolled_school_name = sc.name
    INNER JOIN Employees e on e.school_name = (SELECT e2.school_name from Employees e2
                                                WHERE e2.ssn = adminSSN);

  END;
  CREATE PROCEDURE verifyStudents(adminSSN VARCHAR(50),studentSSN VARCHAR(50),usernameProc VARCHAR(50),passwordProc VARCHAR(50))
    BEGIN
        if(SELECT exists(SELECT * FROM Students S1 WHERE  S1.student_ssn=studentSSN and
              S1.enrolled_school_name in(SELECT E1.school_name
                                        FROM Employees E1
                                        WHERE E1.ssn=adminSSN))) THEN
          UPDATE Students S SET S.username=usernameProc,S.password=passwordProc
          where s.student_ssn = studentSSN;
        ELSE
          SELECT 'Student not found in students you have access to';
        END IF;
    END;



# 3 Add other admins to the school I am working in. An admin has first name, middle name, last name, birthdate,
# address, email, username, password, and gender. Note that the salary of the admin depends on the type of the school.
  CREATE PROCEDURE addOtherAdmins(
    adminSSN VARCHAR(50),
    newAdminSSN VARCHAR(50),
    usernameProc    VARCHAR(50),
    passwordProc    VARCHAR(50),
    first_nameProc  VARCHAR(50),
    middle_nameProc VARCHAR(50),
    last_nameProc   VARCHAR(50),
    birth_dateProc  DATE,
    emailProc      VARCHAR(100),
    genderProc      VARCHAR(10),
    cityProc        VARCHAR(30),
    streetProc      VARCHAR(30),
    blockProc       INT,
    zipcodeProc     VARCHAR(10))

    BEGIN
      DECLARE school_name VARCHAR(50);
      SET school_name:=(SELECT Employees.school_name
                        FROM Employees WHERE Employees.ssn=adminSSN);

      CALL  addAdmin(newAdminSSN,usernameProc,passwordProc,first_nameProc,middle_nameProc,
                     last_nameProc,birth_dateProc,emailProc,genderProc,cityProc,streetProc,
                     blockProc,zipcodeProc,school_name);
    END;

# 4 Delete employees and students from the system.
  CREATE PROCEDURE deleteEmployee(SSN VARCHAR(50))
    BEGIN
      DELETE FROM Employees WHERE Employees.ssn=SSN;
    END;

  CREATE PROCEDURE deleteStudents(SSN VARCHAR(50))
    BEGIN
      DELETE FROM Students WHERE Students.student_ssn=SSN;
    END;


# The site will handle unchanged data...
# 5 Edit the information of the school I am working in.
  CREATE PROCEDURE editSchool(
    IN adminSSN          VARCHAR(50),
    IN nameProc          VARCHAR(50),
    IN visionProc        VARCHAR(300),
    IN missionProc       VARCHAR(300),
    IN main_languageProc VARCHAR(30),
    IN feesProc          FLOAT(10, 2),
    IN cityProc          VARCHAR(30),
    IN streetProc        VARCHAR(30),
    IN blockProc         VARCHAR(10),
    IN zipcodeProc       VARCHAR(10),
    IN phone_numberProc  VARCHAR(20),
    IN emailProc         VARCHAR(100),
    IN typeProc          VARCHAR(30),
    IN max_gradeProc     INT,
    IN min_gradeProc     INT,
    IN general_infoProc  VARCHAR(200)
  )
    BEGIN
      DECLARE schoolName VARCHAR(50);
      SET schoolName:=(SELECT S.name FROM Schools S WHERE S.name= (Select E.school_name From Employees E WHERE E.ssn=adminSSN));

      UPDATE Schools S SET S.name=nameProc,S.vision=visionProc,S.mission=missionProc,
                           S.main_language=main_languageProc,S.fees=feesProc,S.city=cityProc,
                           S.street=streetProc,S.block=blockProc,S.zipcode=zipcodeProc,
                           S.block=blockProc,S.zipcode=zipcodeProc,S.phone_number=phone_numberProc,
                           S.email=emailProc,S.type=typeProc,S.max_grade=max_gradeProc,S.type=typeProc,
                           S.max_grade=max_gradeProc,S.min_grade=min_gradeProc,
                           S.general_info=general_infoProc
      WHERE S.name=schoolName;
    END;

#6 Post announcements with the following information: date, title, description and type (events, news, trips ...etc).
  CREATE PROCEDURE postAnnouncement(
    titleProc VARCHAR(50),
    descriptionProc VARCHAR(300),
    typeProc VARCHAR(50),
    dateProc DATE,
    admin_ssnProc VARCHAR(50)
  )
    BEGIN
      INSERT INTO Announcements(title, description, type, date, admin_ssn)
        VALUES (titleProc,descriptionProc,typeProc,dateProc,admin_ssnProc);
    END;

#7 Create activities and assign every activity to a certain teacher.
# An activity has its own date, location in school, type, equipment(if any), and description.
  CREATE PROCEDURE createActivity(
    descriptionProc VARCHAR(300),
    locationProc    VARCHAR(50),
    typeProc        VARCHAR(50),
    dateProc        DATE,
    teacher_ssnProc VARCHAR(50),
    admin_ssnProc   VARCHAR(50)
  )
    BEGIN
      INSERT INTO Activities(description, location, type, date,teacher_ssn,admin_ssn)
        VALUES (descriptionProc,locationProc,typeProc,dateProc,teacher_ssnProc,admin_ssnProc);
    END;

#8 Change the teacher assigned to an activity.
   CREATE PROCEDURE updateActivityTeacher(idValue INT,teacherSSN VARCHAR(50))
    BEGIN
      UPDATE Activities A SET A.teacher_ssn=teacherSSN WHERE A.id=idValue;
    END ;
#9 Assign teachers to courses that are taught in my school based on the levels it offers.
CREATE PROCEDURE assignTeacherToCourse(teacherSSN VARCHAR(50),courseCode VARCHAR(50))
BEGIN 
INSERT INTO Courses_taught_by_Teachers(course_code, teacher_ssn)
VALUES (courseCode, teacherSSN);
END;

# 10 Assign teachers to be supervisors to other teachers.
  CREATE PROCEDURE assignSupervisor(teacherSSN VARCHAR(50),SSNProc VARCHAR(50))
    BEGIN
      INSERT INTO Supervisors(ssn)
        VALUES (SSNProc);

      UPDATE Teachers T SET T.supervisor=1 WHERE T.ssn=teacherSSN;
    END;

# 11 Accept or reject the application submitted by parents to their children.
  CREATE PROCEDURE acceptOrReject(school_nameProc VARCHAR(50),child_ssnProc VARCHAR(50),
                                  verdict BIT)
    BEGIN
      UPDATE Parents_apply_for_Schools P SET P.accepted=verdict
      WHERE P.school_name=school_nameProc and P.child_ssn=child_ssnProc;

    END;


# “As a teacher, I should be able to ...”
-- Teacher signing up for an account with his details, inserted into both tables employees and teachers
delimiter //
CREATE PROCEDURE SignUpTeacher(ssn varchar (50), first_name varchar(50), middle_name varchar(50),
								last_name varchar(50), Sbirth_date VARCHAR(20),	city varchar(30), street varchar(30), block varchar(10),
								zipcode varchar(10), email varchar(100), gender varchar(10), related_school_name varchar(50) )
BEGIN
declare date DATE ;
    set date = DATE_FORMAT(STR_TO_DATE(Sbirth_date, '%Y-%m-%d'), '%Y-%m-%d');
IF (ssn  is null or city is null or street is null or block is null or first_name is null or middle_name is null or last_name is null or related_school_name is null)
THEN
SELECT 'Some of the inputs can''t be accepted as null values';
ELSE
insert into Employees(ssn, first_name, middle_name, last_name,birth_date, email, gender, city, street, block, zipcode, school_name)
values(ssn,first_name, middle_name, last_name, birth_date, email, gender, city, street, block, zipcode, related_school_name);
insert into Teachers(ssn)
values (ssn);
END IF;
END //



-- procedure for a signed up teacher to view the courses he/she teaches
delimiter //
CREATE PROCEDURE ViewMyCourses (ssn varchar(50))
BEGIN
SELECT DISTINCT C.*
FROM Teachers T, Courses C, Courses_taught_by_Teachers CTT
where T.ssn=ssn AND T.ssn=CTT.teacher_ssn AND C.code=CTT.course_code
order by C.grade, C.level;
END //






-- teacher posting a new assignment
delimiter //
CREATE PROCEDURE PostAssignment(ssn varchar(50), course_code varchar(50),post_date date, due_date date, content varchar(1000))

BEGIN

DECLARE lastAddedID int DEFAULT 0;

IF (ssn is null or post_date is null or due_date is null or content is null)
THEN
SELECT 'Some of the inputs can''t be accepted as null values';
ELSE
insert into Assignments (content, post_date, due_date)
values (content, post_date, due_date);

Select max(id) into lastAddedID
from Assignments;

insert into Assignments_posted_by_Teachers(assignment_id, course_code, teacher_ssn)
values(lastAddedID, course_code, ssn);
END IF;
END //





-- Teacher Viewing  the Students' Assignment Solutions
delimiter //
CREATE PROCEDURE ViewAssignmentSolutions(ssn varchar(50), assignment_id2 int , course_code2 varchar(50))
BEGIN
SELECT DISTINCT S.id, sol1.*
FROM Assignments_posted_by_Teachers ass1, Assignments_solved_by_Students sol1, Students S, Employees E
where ssn=ass1.teacher_ssn AND S.student_ssn=sol1.student_ssn AND S.enrolled_school_name=E.school_name
    AND ass1.assignment_id=sol1.assignment_id AND sol1.assignment_id=assignment_id2 AND ass1.course_code=course_code2
order by S.id;
END //





-- Teacher Grading an assignment for a specific student

CREATE PROCEDURE GradeAssignment(assignment_id int, student_ssn varchar(50), grade float(5,2))
BEGIN
UPDATE Assignments_solved_by_Students Sol
SET Sol.mark= grade
where Sol.student_ssn=student_ssn AND Sol.assignment_id= assignment_id;
END//




-- Teacher deleting a specific assignment
CREATE PROCEDURE DeleteAssignment (assignment_id int)
BEGIN
DELETE FROM Assignments
where id=assignment_id;
END//






-- Teacher Writing reports for a specific student

CREATE PROCEDURE WriteReport(teacher_ssn varchar(50), student_ssn varchar(50), title varchar(50) ,
							content varchar(500), date date)
BEGIN
DECLARE parentOfStudent varchar(50);

Select C.parent_username into parentOfStudent
FROM Children C
where C.ssn= student_ssn;

INSERT into Reports(teacher_ssn , title, content, date, student_ssn, parent_username)
VALUES (teacher_ssn, title, content, date, student_ssn, parentOfStudent);

END//






-- Teacher Viewing Questions asked by Students for a specific Course
delimiter //
CREATE PROCEDURE ViewQuestions(teacher_ssn varchar(50), course_code2 varchar(10))
BEGIN
Select DISTINCT Q.*, C.name
FROM Questions Q, Children C, Courses_taken_by_Students Cts, Courses_taught_by_Teachers Ctt
where Q.student_ssn=C.ssn AND C.ssn=Cts.student_ssn AND Q.course_code=course_code2 AND Cts.course_code=Ctt.course_code 
AND Ctt.course_code=course_code2 AND Ctt.teacher_ssn=teacher_ssn;
END //






-- Teacher Answering A question from a specific student for a specific course taught by the teacher

CREATE PROCEDURE AnswerQuestion(student_ssn2 varchar(50), course_code2 varchar(10), title2 varchar(50), answer2 varchar(300))
BEGIN
UPDATE Questions
SET answer= answer2
where student_ssn=student_ssn2 AND course_code= course_code2 AND title=title2;
END //






-- Teacher Viewing all his/her students details grouped by grade
-- and ordered by their first and last names
-- it can be used also to get student ssn in order to write a report for that student if he/she wishes to.
delimiter //
CREATE PROCEDURE ViewMyStudents(ssn varchar(50))
BEGIN
SELECT DISTINCT C.name, P.last_name, S.student_ssn, S.id, S.username, S.grade
FROM  Children C, Students S, Parents P, Courses_taken_by_Students Cts, Courses_taught_by_Teachers Ctt, Employees E
where Ctt.teacher_ssn=ssn AND Cts.student_ssn=C.SSN AND S.student_ssn=C.SSN AND C.parent_username=P.username AND C.ssn=Cts.student_ssn
      AND Cts.course_code=Ctt.course_code AND E.ssn=Ctt.teacher_ssn AND E.school_name=S.enrolled_school_name
order by S.grade, C.name, P.last_name;
END //





-- Teacher Viewing list of students who didn't join any activities

CREATE PROCEDURE StudentsWithNoActivities(teacher_ssn varchar(50))
BEGIN

Select S1.*
from Students S1
Where S1.student_ssn NOT IN (Select student_ssn
							from Activities_joined_by_Students);

END//



-- Teacher displaying the name of his student with the max number of clubs joined

CREATE PROCEDURE StudentInMostClubs(school_name varchar(50))
BEGIN
DECLARE maxStudent varchar(50);

Select Cjs.student_ssn into maxStudent
From Clubs_joined_by_Students Cjs, Students S
where S.enrolled_school_name=school_name AND Cjs.student_ssn=S.student_ssn
group by Cjs.student_ssn
Having count(Cjs.club_name) = (Select max(S.C)
							  From (Select Count(Cjs2.club_name) as C
							  		From Clubs_joined_by_Students Cjs2, Students S2
									where S2.enrolled_school_name=school_name AND Cjs2.student_ssn=S2.student_ssn) S);

(Select concat(C.name, ' ', P.last_name) as 'Student Name'
from Children C, Parents P
where C.SSN=maxStudent AND C.parent_username=P.username);
END//
delimiter ;

DELIMITER //

# “As a parent, I should be able to ...”

# 1 Sign up by providing my name (first name and last name),
# contact email, mobile number(s), address, home phone number, a unique username and password.
CREATE PROCEDURE Register_Parent(fname VARCHAR(50), lname VARCHAR(50),email VARCHAR(100), home VARCHAR(20),city VARCHAR(30),
street VARCHAR(30), blk VARCHAR(10), username VARCHAR(50), password VARCHAR(50), zipcode VARCHAR(10))
  BEGIN
    INSERT INTO Parents (username, password, email, first_name, last_name, home_phone, city, street, block, zipcode)
      VALUES (username, password, email,fname, lname,home,city,street,blk,zipcode);
  END //

CREATE PROCEDURE Register_Parent_Mobile(num VARCHAR(20), username VARCHAR(50))
  BEGIN
    INSERT INTO Mobile_Numbers_belongs_to_Parents(username, mobile_number)
      VALUES (username, num);
  END //

# 2 Apply for my children in any school. For each child I should provide his/her
# social security number (SSN), name, birthdate, and gender.
CREATE PROCEDURE Apply_Child_for_School(grade int,parent_username VARCHAR(50),ssn VARCHAR(50),fname VARCHAR(50),bdate VARCHAR(30), gender VARCHAR(30), school VARCHAR(50))
  BEGIN
    declare date DATE ;
    set date = DATE_FORMAT(STR_TO_DATE(bdate, '%m/%d/%Y'), '%Y-%m-%d');
    if not exists(select * from Children WHERE Children.ssn = ssn)
      THEN INSERT into Children (SSN, name, birth_date, gender, parent_username)
        VALUES (ssn,fname,date, gender,parent_username);
        END IF ;

    INSERT into Parents_apply_for_Schools(school_name, child_ssn,grade, parent_username)
      VALUES (school, ssn, grade, parent_username);

  END //

# 3 View a list of schools that accepted my children categorized by child.
CREATE PROCEDURE Children_Accepted_by_School(username VARCHAR(50))
  BEGIN
    SELECT *
      FROM Children c
        INNER JOIN Parents p on p.username = c.parent_username
      left OUTER JOIN Parents_apply_for_Schools pas on pas.child_ssn = c.SSN
    WHERE pas.accepted = '1' and p.username = username and not exists(
      select * from Students s WHERE pas.school_name = s.enrolled_school_name AND
      c.ssn = s.student_ssn);
  END //

# 4 Choose one of the schools that accepted my child to enroll him/her.
#  The child remains unverified (no username and password, refer to user story 2 for the administrator)
# until the admin verifies him.
CREATE PROCEDURE Enroll_Child_in_School(ssn VARCHAR(50), school_name VARCHAR(50))
  BEGIN
    DECLARE grade int;
    SELECT p.grade into grade from Parents_apply_for_Schools p where ssn = p.child_ssn and school_name = p.school_name;
    INSERT INTO Students (student_ssn, grade, enrolled_school_name)
      VALUES (ssn,grade,school_name);
  END //

# 5 View reports written about my children by their teachers.
CREATE PROCEDURE View_Children_Reports(username VARCHAR(50))
  BEGIN
    select * from Reports r
      Inner join Employees e on r.teacher_ssn = e.ssn
      INNER join Children d on d.ssn = r.student_ssn
    where r.parent_username = username;
  END //

# 6 Reply to reports written about my children by their teachers.
CREATE PROCEDURE Reply_to_Reports(username VARCHAR(50), title VARCHAR(50), teacher VARCHAR(50), reply VARCHAR(500))
  BEGIN
      UPDATE Reports r SET r.comment = reply
    WHERE r.parent_username = username and (r.title, r.teacher_ssn) = (title,teacher);
  END //

# 7 View a list of all schools of all my children ordered by its name.
CREATE PROCEDURE View_Schools_of_Children(username VARCHAR(50))
  BEGIN
    SELECT * FROM Schools s
    INNER JOIN Students c on c.enrolled_school_name = s.name
    INNER JOIN (SELECT ssn
                FROM Children cc
               WHERE cc.parent_username = username) as T on c.student_ssn = T.ssn;
  END //
# 8 View the announcements posted within the past 10 days about a school if one of my children is enrolled in it.
CREATE PROCEDURE Announcements_About_Children_School(username VARCHAR(50))
  BEGIN
    SELECT a.*
      from Announcements a
    INNER JOIN Employees e on e.ssn = a.admin_ssn
    INNER JOIN (
        SELECT temp.enrolled_school_name, temp.student_ssn from Students temp) s
        on s.enrolled_school_name = e.school_name
    INNER JOIN Children c on s.student_ssn = c.SSN
    where a.date >= date_sub(current_date, INTERVAL 10 DAY) AND
        c.parent_username = username;
  END //

# 9 Rate any teacher that teaches my children.
delimiter //
CREATE PROCEDURE Show_Children_Teachers(username varchar(50))
  BEGIN
    select Distinct Ctt.teacher_ssn, Cts.student_ssn,e.first_name,e.last_name,overall_rating,rate_value from Children c
      INNER JOIN Parents p  on p.username = c.parent_username
      INNER JOIN Students st on c.SSN = st.student_ssn
      INNER JOIN Courses_taken_by_Students Cts on Cts.student_ssn = st.student_ssn
      INNER JOIN Courses_taught_by_Teachers Ctt on Cts.course_code=Ctt.course_code
      INNER JOIN Teachers t on Ctt.teacher_ssn = t.ssn
      INNER Join Employees e on t.ssn = e.ssn
      LEFT outer JOIN Parent_rates_Teacher prt on (prt.parent_username,prt.teacher_ssn)= (p.username,t.ssn)
    WHERE p.username = 'Osama';
  END //


CREATE PROCEDURE Rate_Children_Teacher(username VARCHAR(50),tssn VARCHAR(50), rating INT)
  BEGIN
  if(not exists(select * from Parent_rates_Teacher p where (p.parent_username,p.teacher_ssn) = (username,tssn)))
    then
    INSERT into Parent_rates_Teacher(parent_username, teacher_ssn, rate_value)
      VALUES (username,tssn,rating);
    else
      UPDATE Parent_rates_Teacher p SET p.rate_value = rating where (p.parent_username,p.teacher_ssn) = (username,tssn);
    END IF ;
  UPDATE Teachers t SET t.overall_rating = (SELECT AVG(p.rate_value) FROM Parent_rates_Teacher p
                                            WHERE p.teacher_ssn = tssn)
    where t.ssn = tssn;
  END //

# 10 Write reviews about my children’s school(s).
CREATE PROCEDURE Review_Children_Schools(preview VARCHAR(300), username VARCHAR(50), school VARCHAR(50))
  BEGIN
    if ( not exists(SELECT * from Parents_review_Schools p where (p.school_name,p.parent_username)= (school,username)))
      THEN
  INSERT into Parents_review_Schools(school_name, parent_username, review)
    VALUES (school,username,preview);
      ELSE
      UPDATE Parents_review_Schools p SET p.review = preview where (p.school_name,p.parent_username)= (school,username);
      END If;
  END //

# 11 Delete a review that i have written.
CREATE PROCEDURE View_My_Reviews(username VARCHAR(50))
  BEGIN
  SELECT r.* from Parents_review_Schools r
    WHERE r.parent_username = username;
  END //

CREATE PROCEDURE Delete_My_Reviews(schoolName VARCHAR(50), username VARCHAR(50))
  BEGIN
    DELETE from Parents_review_Schools WHERE school_name = schoolName AND parent_username = username;

  END //

# 12 View the overall rating of a teacher, where the overall rating is calculated as the average of ratings provided by
# parents to that teacher.
CREATE PROCEDURE Teacher_Average_Rating(tssn VARCHAR(50), OUT rating FLOAT(3,1))
  BEGIN
  SELECT t.overall_rating into rating FROM Teachers t WHERE t.ssn = tssn;

  END //

# 13 View the top 10 schools with the highest number of reviews or highest number of enrolled students.
# This should exclude schools that my children are enrolled in.
CREATE PROCEDURE Top_10_Schools_By_Reviews(puser VARCHAR(50))
  BEGIN
    Select s.* ,count(re.review) FROM Schools s
      INNER JOIN Parents_review_Schools re on s.name = re.school_name
    WHERE s.name not in (select sc.name from Children c
      INNER JOIN Parents p  on c.parent_username = puser
      INNER JOIN Students st on c.SSN = st.student_ssn
      INNER JOIN Schools sc on st.enrolled_school_name = sc.name)
      GROUP BY s.name
    ORDER BY count(re.review) desc, s.name
    LIMIT 10;
  END //

CREATE PROCEDURE Top_10_Schools_By_Student_Number(puser VARCHAR(50))
  BEGIN
    Select s.* , count(stu.student_ssn) FROM Schools s
      INNER JOIN Students stu  on s.name = stu.enrolled_school_name
    WHERE s.name not in (select sc.name from Children c
      INNER JOIN Parents p  on c.parent_username = puser
      INNER JOIN Students st on c.SSN = st.student_ssn
      INNER JOIN Schools sc on st.enrolled_school_name = sc.name)
      AND s.name = stu.enrolled_school_name
       GROUP BY s.name
    ORDER BY count(stu.student_ssn) desc, s.name
    LIMIT 10;
  END //

# 14 Find the international school which has a reputation higher than all national schools, i.e.
# has the highest number of reviews.
CREATE PROCEDURE Top_International_School()
  BEGIN
  SELECT s.*, count(r.review) from Schools s
    INNER JOIN Parents_review_Schools r on s.name = r.school_name
    WHERE s.type = 'international'
    GROUP BY s.name
    ORDER BY count(r.review)
    LIMIT 1;
  END //

# “As an enrolled student, I should be able to ...”

# 1 Update my account information except for the username.
CREATE PROCEDURE Update_Student_Account(user_ssn VARCHAR(50),ssn VARCHAR(50),password VARCHAR(50), grade int)
  BEGIN
  UPDATE Students s
    SET s.password = password,
        s.grade = grade
    WHERE s.student_ssn = user_ssn;
  UPDATE Children c
    SET c.SSN = ssn
    WHERE c.ssn = user_ssn;
  END //

# 2 View a list of courses’ names assigned to me based on my grade ordered by name.
delimiter //
CREATE PROCEDURE List_Student_Courses(ssn VARCHAR(50))
  BEGIN
    SELECT C.*
      FROM Courses_taken_by_Students Cts, Courses C
    where Cts.student_ssn = ssn AND C.code=Cts.course_code
    order by C.name;
  END //

# 3 Post questions I have about a certain course.
CREATE PROCEDURE Post_Question_About_Course(course VARCHAR(10),ssn VARCHAR(50), qtitle VARCHAR(50), qcontent VARCHAR(300))
  BEGIN
    INSERT INTO Questions (student_ssn, course_code, title, content, answer)
      VALUES (ssn,course ,qtitle,qcontent,'');
  END //

# 4 View all questions asked by other students on a certain course along with their answers.
CREATE PROCEDURE Questions_Asked_About_Course(course VARCHAR(10))
  BEGIN
    SELECT *
      FROM Questions
        WHERE course_code =course;
  END //

# 5 View the assignments posted for the courses I take.
CREATE PROCEDURE View_Student_Assignments(ssn VARCHAR(50))
  BEGIN
    DECLARE student_grade VARCHAR(50);
    SELECT grade into student_grade
    from Students
    where ssn = student_ssn;

    SELECT a.*
      FROM Assignments a INNER  JOIN Assignments_posted_by_Teachers T on T.assignment_id = a.id
    INNER JOIN Courses c on c.code = T.course_code
    where c.grade = student_grade;
  END //

# 6 Solve assignments posted for courses I take.
CREATE PROCEDURE Solve_Assignment(ssn VARCHAR(50),solve VARCHAR(3000), assignment INT)
  BEGIN
    INSERT INTO Assignments_solved_by_Students (student_ssn, assignment_id, solution)
      VALUES (ssn,assignment,solve);
  END //

# 7 View the grade of the assignments I solved per course.
CREATE PROCEDURE Grades_of_Assignments_Solved(ssn VARCHAR(50))
  BEGIN
  SELECT tpa.course_code, tpa.assignment_id ,ssa.mark
    FROM Assignments_solved_by_Students ssa
      INNER JOIN Assignments_posted_by_Teachers tpa on tpa.assignment_id = ssa.assignment_id
    WHERE ssa.student_ssn = ssn
    ORDER BY tpa.course_code;
  END //

# 8 View the announcements posted within the past 10 days about the school I am enrolled in.
CREATE PROCEDURE Announcements_About_School(ssn VARCHAR(60), today date)
  BEGIN
    SELECT a.*
      from Announcements a
    INNER JOIN Employees e on e.ssn = a.admin_ssn
    INNER JOIN Students s on ssn = s.student_ssn
    where e.school_name = s.enrolled_school_name AND
      a.date >= date_sub(today, INTERVAL 10 DAY);
  END //

# 9 View all the information about activities offered by my school, as well as the teacher responsible for it.

CREATE PROCEDURE Activities_of_School(inssn VARCHAR(50))
 BEGIN
   SELECT * from Students st
   INNER JOIN Schools sc on sc.name = st.enrolled_school_name
   INNER JOIN Employees e on e.school_name  = sc.name
   Inner JOIN Admins ad on e.ssn = ad.ssn
   INNER JOIN Activities a on ad.ssn = a.admin_ssn
   INNER JOIN Teachers t on t.ssn = a.teacher_ssn
   WHERE inssn = st.student_ssn;

 END //

# 10 Apply for activities in my school on the condition that I can not join two activities of the same type on the same date.
CREATE PROCEDURE Apply_for_Activity(ssn VARCHAR(50), activity_id int)
  BEGIN
    if not EXISTS(
    SELECT *
     FROM Activities a
       INNER JOIN Activities_joined_by_Students s
       on a.id = s.activity_id
    where a.date = (
      SELECT ac.date
       from Activities ac
        where activity_id = ac.id)
          and a.id <> activity_id and s.student_ssn = ssn)

      THEN
      INSERT into Activities_joined_by_Students(student_ssn, activity_id)
        VALUES (ssn,activity_id);

      ELSE
      SELECT 'Cannot Apply for two activities on the same date.';
    END IF;
  END //

# 11 Join clubs offered by my school, if I am a highschool student.

CREATE PROCEDURE Join_Clubs(ssn VARCHAR(50), club_name VARCHAR(50))
  BEGIN
    DECLARE school VARCHAR(50);
    DECLARE grade int;
    SELECT s.grade into grade from Students s where s.student_ssn = ssn;
    SET school :=(SELECT s.enrolled_school_name from Students s WHERE s.student_ssn = ssn);

    if grade >= 10
      THEN
      IF EXISTS(SELECT * FROM Clubs c where club_name = c.name and c.high_school = school)
        THEN
        INSERT into Clubs_joined_by_Students(club_name, school_name, student_ssn)
          VALUES (club_name,school,ssn);
      END IF;
    END IF;
  END //

# 12 Search in a list of courses that i take by its name or code.
CREATE PROCEDURE Search_Courses_By_Name(ssn VARCHAR(50), course_name VARCHAR(50))
  BEGIN
    SELECT c.* from Students s
      INNER JOIN Courses_taken_by_Students Cts on Cts.student_ssn = s.student_ssn
      INNER JOIN Courses c on Cts.course_code = c.code
    WHERE c.name like concat('%',course_name,'%') and s.student_ssn = ssn;

  END //

CREATE PROCEDURE Search_Courses_By_Code(ssn VARCHAR(50), course_code VARCHAR(10))
  BEGIN
    SELECT c.* from Students s
    INNER JOIN Courses_taken_by_Students Cts on Cts.student_ssn = s.student_ssn
    INNER JOIN Courses c on Cts.course_code = c.code
    WHERE c.code = course_code and s.student_ssn = ssn;

  END //
DELIMITER ;