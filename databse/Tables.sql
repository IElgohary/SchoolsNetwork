CREATE DATABASE School_Network;
Use School_Network;


-- Function to return the max grade of the school to be used in checks in elementary,middle or high schools table
delimiter //
CREATE FUNCTION GetMaxGrade (school_name varchar(50))
RETURNS int
DETERMINISTIC
BEGIN

DECLARE result int DEFAULT 0;

SELECT S.max_grade into result
from Schools S
where S.name=school_name;

RETURN result;

END //


-- Function to return the min grade of the school to be used in checks in elementary,middle or high schools table
delimiter //
CREATE FUNCTION GetMinGrade (school_name varchar(50))
RETURNS int
DETERMINISTIC
BEGIN

DECLARE result int DEFAULT 0;

SELECT S.min_grade into result
from Schools S
where S.name=school_name;

RETURN result;

END//



-- Function that checks if teacher has more than 15 years of experience (so can be a supervisor)
-- and returns '1' if condition is satisfied and 'O' otherwise
-- to be used in Supervisor table creation
delimiter //
CREATE FUNCTION IsASupervisor(ssn varchar(50))
RETURNS BIT
DETERMINISTIC
BEGIN

DECLARE exp int DEFAULT 0;
DECLARE returnedValue BIT DEFAULT NULL;

SELECT T.experience into exp
from Teachers T
where T.ssn=ssn;

IF (exp>=15)
THEN
SET returnedValue = '1';
ELSE
SET returnedValue = '0';
END IF;

RETURN returnedValue;

END//

delimiter ;

Create table Schools(
  name varchar(50) PRIMARY KEY NOT NULL ,
  vision varchar(300),
  mission VARCHAR(300),
  main_language VARCHAR(30),
  fees FLOAT(10,2) not NULL ,
  city VARCHAR(30) not null,
  street VARCHAR(30) not null,
  block VARCHAR(10) not null,
  zipcode VARCHAR(10),
  phone_number VARCHAR(20) not null,
  email VARCHAR(100) UNIQUE ,
  type VARCHAR(30),
  max_grade int not null,
  min_grade int not null,
  general_info VARCHAR(200)
);

create table Levels(
  value varchar(30) PRIMARY KEY NOT NULL
);

create table Elementary_Schools(
  school_name VARCHAR(50) not null PRIMARY KEY ,
  level varchar(30) not null,
  FOREIGN KEY (school_name) REFERENCES Schools(name)
  on DELETE CASCADE,
  FOREIGN KEY (level) REFERENCES Levels (value)
  on DELETE CASCADE on UPDATE CASCADE,
  CHECK (GetMinGrade(school_name)=1)
);

create table Elementary_Supplies(
  supply VARCHAR(50) not null,
  school_name VARCHAR(50),
  PRIMARY KEY (school_name,supply),
  FOREIGN KEY (school_name) REFERENCES Schools(name)
  on DELETE CASCADE on UPDATE CASCADE
);

create table Middle_Schools(
 school_name VARCHAR(50) not null PRIMARY KEY ,
  level varchar(30) not null,
  FOREIGN KEY (school_name) REFERENCES Schools(name)
  on DELETE CASCADE,
  FOREIGN KEY (level) REFERENCES Levels (value)
  on DELETE CASCADE on UPDATE CASCADE,
  CHECK (GetMaxGrade(school_name)>=9 AND GetMinGrade(school_name)<=7)
);

create table High_Schools(
  school_name VARCHAR(50) not null PRIMARY KEY ,
  level varchar(30) not null,
  FOREIGN KEY (school_name) REFERENCES Schools(name)
  on DELETE CASCADE,
  FOREIGN KEY (level) REFERENCES Levels (value)
  on DELETE CASCADE on UPDATE CASCADE,
  CHECK (GetMaxGrade(school_name)=12)
);

create table Parents(
  username VARCHAR(50) NOT NULL PRIMARY KEY ,
  password VARCHAR(50) not null,
  email VARCHAR(50) UNIQUE,
  first_name VARCHAR(50) NOT NULL ,
  last_name VARCHAR(50) not NULL ,
  home_phone VARCHAR(20),
  city VARCHAR(30) not null,
  street VARCHAR(30) not null,
  block VARCHAR(10) not null,
  zipcode VARCHAR(10)
);

create table Mobile_Numbers_belongs_to_Parents(
  username VARCHAR(50) NOT NULL,
  mobile_number VARCHAR(20) not null,
  PRIMARY KEY (username,mobile_number),
  FOREIGN KEY (username) REFERENCES Parents(username)
  on DELETE CASCADE on UPDATE CASCADE
);

create table Employees(
  ssn VARCHAR(50) PRIMARY KEY,
  username VARCHAR(50) unique,
  password VARCHAR(50) ,
  first_name VARCHAR(50) not null,
  middle_name VARCHAR(50) not null,
  last_name VARCHAR(50) not null,
  birth_date DATE not null,
  age int as (year('2016-1-1') - year (birth_date)),
  email VARCHAR(100) UNIQUE ,
  gender VARCHAR(10),
  salary FLOAT(10,2) ,
  city VARCHAR(30) not null,
  street VARCHAR(30) not null,
  block VARCHAR(10) not null,
  zipcode VARCHAR(10),
  school_name VARCHAR(50)REFERENCES Schools(school_name)
  on DELETE SET NULL on UPDATE CASCADE

);

create table Teachers(
  ssn VARCHAR(50) PRIMARY KEY,
  start_date date,
  experience int as (year('2016-1-1') - year(start_date)) ,
  overall_rating float(3,1),
  supervisor BIT DEFAULT 0,
  FOREIGN KEY (ssn) REFERENCES Employees(ssn)
  on DELETE CASCADE on UPDATE CASCADE
);

create table Parent_rates_Teacher(
  parent_username VARCHAR(50) NOT NULL REFERENCES Parents(username)
  on DELETE CASCADE on UPDATE CASCADE ,
  teacher_ssn VARCHAR(50) NOT NULL REFERENCES Teachers(ssn)
  on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (parent_username,teacher_ssn),
  rate_value int
);

create table Supervisors(
  ssn VARCHAR(50) PRIMARY KEY REFERENCES Teachers(ssn)
  on DELETE CASCADE ON UPDATE CASCADE,
  CHECK (IsASupervisor(ssn)='1')
);

create table Admins (
  ssn VARCHAR(50) PRIMARY KEY REFERENCES Employees(ssn)
  ON UPDATE CASCADE on DELETE CASCADE
);

create table Assignments(
  id int PRIMARY KEY AUTO_INCREMENT,
  content VARCHAR(1000) not null,
  post_date date not NULL,
  due_date date not Null
);

create table Courses(
  code VARCHAR(10) PRIMARY KEY,
  name VARCHAR(50) not null,
  description VARCHAR(200) not null,
  grade int not null,
  level VARCHAR(50) REFERENCES Levels(value)
  ON UPDATE CASCADE on DELETE CASCADE
);

create table Children(
  ssn VARCHAR(50) PRIMARY KEY,
  name VARCHAR(50) not null,
  birth_date date not null,
  age int as (year('2016-1-1') - year (birth_date)),
  gender VARCHAR(10) not null,
  parent_username VARCHAR(50) not null REFERENCES Parents(username)
);

create table Students(
  student_ssn VARCHAR(50) PRIMARY KEY REFERENCES Children(ssn)
  on DELETE CASCADE on UPDATE CASCADE,
  id int AUTO_INCREMENT UNIQUE,
  username VARCHAR(50) UNIQUE ,
  password VARCHAR(50),
  grade int DEFAULT 0,
  enrolled_school_name VARCHAR(50)REFERENCES Schools(name)
  on DELETE SET NULL on UPDATE CASCADE
);

create table Activities(
  id int PRIMARY KEY AUTO_INCREMENT,
  description VARCHAR(300),
  location VARCHAR(50),
  type VARCHAR(50),
  date date,
  teacher_ssn VARCHAR(50) REFERENCES Teachers(ssn)
  on DELETE CASCADE on UPDATE CASCADE,
  admin_ssn VARCHAR(50) REFERENCES Admins(ssn)
  on DELETE CASCADE on UPDATE CASCADE
);

create table Announcements(
  id int PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(50),
  description VARCHAR(300),
  type VARCHAR(50),
  date date,
  admin_ssn VARCHAR(50) REFERENCES Admins(ssn)
  ON UPDATE cascade on DELETE cascade
);

create table Clubs (
  name VARCHAR(50),
  high_school VARCHAR(50),
  PRIMARY KEY (high_school,name),
  purpose VARCHAR(300),
  FOREIGN KEY (high_school) REFERENCES High_Schools(school_name)
  on DELETE CASCADE on UPDATE CASCADE
);

create table Equipment(
  activity_id int,
  name VARCHAR(50),
  PRIMARY KEY (activity_id,name),
  quantity int not null,
  availability BIT as (quantity > 0)
);

create table Reports(
  teacher_ssn VARCHAR(50) REFERENCES Teachers(ssn)
  on DELETE SET NULL on UPDATE CASCADE,
  title VARCHAR(50),
  PRIMARY KEY (teacher_ssn,title),
  comment VARCHAR(200),
  date date not null,
  content varchar(500) not null,
  student_ssn VARCHAR(50) REFERENCES Students(student_ssn)
  on DELETE CASCADE on UPDATE CASCADE ,
  parent_username VARCHAR(50) REFERENCES Parents(username)
  on DELETE CASCADE on UPDATE CASCADE

);

CREATE table Questions(
  student_ssn VARCHAR(50)REFERENCES Students(student_ssn)
  on DELETE SET NULL on UPDATE CASCADE ,
  course_code VARCHAR(10) REFERENCES Courses(code)
  on DELETE CASCADE on UPDATE CASCADE,
  title VARCHAR(50),
  PRIMARY KEY (student_ssn,course_code,title),
  content VARCHAR(300) NOT NULL ,
  answer VARCHAR(300)
);


create table Parents_review_Schools(
  school_name VARCHAR(50) REFERENCES Schools(name)
  on DELETE CASCADE on UPDATE CASCADE ,
  parent_username VARCHAR(50) REFERENCES Parents(username)
  on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (school_name,parent_username),
  review VARCHAR(300)
);

create table Clubs_joined_by_Students(
  club_name VARCHAR(50),
  school_name VARCHAR(50),
  student_ssn VARCHAR(50),
  PRIMARY KEY (club_name,school_name, student_ssn),
  FOREIGN KEY (school_name,club_name) REFERENCES Clubs(high_school,name)
  on DELETE CASCADE on UPDATE CASCADE,
  FOREIGN KEY (student_ssn) REFERENCES Students(student_ssn)
  on DELETE CASCADE on UPDATE CASCADE
);

create TABLE Courses_Prerequisite_Courses(
  course_code VARCHAR(10),
  prerequisite_code VARCHAR(10),
  PRIMARY KEY (course_code,prerequisite_code),
  FOREIGN KEY (course_code) REFERENCES Courses(code)
   on DELETE CASCADE on UPDATE CASCADE,
  FOREIGN KEY (prerequisite_code) REFERENCES Courses(code)
   on DELETE CASCADE on UPDATE CASCADE
);

create table Activities_joined_by_Students(
  student_ssn VARCHAR(50),
  activity_id int,
  PRIMARY KEY (student_ssn,activity_id)
);

create table Parents_apply_for_Schools(
  school_name VARCHAR(50)REFERENCES Schools(name)
   on DELETE CASCADE on UPDATE CASCADE,
  child_ssn VARCHAR(50)REFERENCES Children(ssn)
  on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (school_name,child_ssn),
  accepted BIT DEFAULT 0,
  grade int not null,
  parent_username VARCHAR(50) REFERENCES Parents(username)
   on DELETE CASCADE on UPDATE CASCADE
);

create table Assignments_posted_by_Teachers(
  assignment_id int PRIMARY KEY,
  course_code VARCHAR(50) REFERENCES Courses(code)
   on DELETE CASCADE on UPDATE CASCADE,
  teacher_ssn VARCHAR(50) REFERENCES Teachers(ssn)
   on DELETE CASCADE on UPDATE CASCADE,
  FOREIGN KEY (assignment_id) REFERENCES Assignments(id)
   on DELETE CASCADE on UPDATE CASCADE
);

create table Assignments_solved_by_Students(
  student_ssn VARCHAR(50),
  assignment_id int,
  PRIMARY KEY (student_ssn,assignment_id),
  solution VARCHAR(3000),
  mark FLOAT(5,2),
  FOREIGN KEY (student_ssn) REFERENCES Students(student_ssn)
  on DELETE CASCADE on UPDATE CASCADE ,
  FOREIGN KEY (assignment_id) REFERENCES Assignments(id)
  on DELETE CASCADE on UPDATE CASCADE
);

CREATE table Courses_taken_by_Students(
  course_code VARCHAR(50) REFERENCES Courses(code)
   on DELETE CASCADE on UPDATE CASCADE,
  student_ssn VARCHAR(50) REFERENCES Students(student_ssn)
   on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (course_code,student_ssn)
);


CREATE table Courses_taught_by_Teachers (
  course_code VARCHAR(50) REFERENCES Courses(code)
  on DELETE CASCADE on UPDATE CASCADE,
  teacher_ssn VARCHAR(50) REFERENCES Teachers(ssn)
   on DELETE CASCADE on UPDATE CASCADE,
   PRIMARY KEY (course_code, teacher_ssn)
);
