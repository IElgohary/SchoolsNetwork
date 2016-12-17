use School_Network;
Drop PROCEDURE acceptOrReject;

delimiter //
CREATE PROCEDURE acceptOrReject(school_nameProc VARCHAR(50),child_ssnProc VARCHAR(50),
                                  verdict TINYINT)
BEGIN
      UPDATE Parents_apply_for_Schools P SET P.accepted=verdict
      WHERE P.school_name=school_nameProc and P.child_ssn=child_ssnProc;

    END//


DROP PROCEDURE IF EXISTS School_Network.View_Students_Enrolled_To_My_School;
CREATE  PROCEDURE View_Students_Enrolled_To_My_School(adminSSN VARCHAR(50))
BEGIN
    Select st.* from Students st WHERE st.enrolled_school_name=(SELECT school_name FROM Employees E
    WHERE E.ssn=adminSSN) and st.username is NULL ;

  END//

 DROP PROCEDURE IF EXISTS School_Network.View_Teachers_Applied_for_My_School;
CREATE PROCEDURE View_Teachers_Applied_for_My_School(adminSSN VARCHAR(50))
BEGIN
    Select * from Employees e1

    WHERE e1.school_name=(SELECT school_name from Employees e2 WHERE e2.ssn=adminSSN)
    AND e1.ssn IN (SELECT ssn FROM Teachers ) AND e1.username is NULL ;
  END//


DROP PROCEDURE IF EXISTS School_Network.verifyStudents;
CREATE PROCEDURE verifyStudents(adminSSN VARCHAR(50),studentSSN VARCHAR(50),usernameProc VARCHAR(50),passwordProc VARCHAR(50))
BEGIN
        if(SELECT exists(SELECT * FROM Students S1 WHERE  S1.student_ssn=studentSSN and
              S1.enrolled_school_name in(SELECT E1.school_name
                                        FROM Employees E1
                                        WHERE E1.ssn=adminSSN))) THEN
          UPDATE Students S SET S.username=usernameProc,S.password=passwordProc
          where S.student_ssn = studentSSN;
        ELSE
          SELECT 'Student not found in students you have access to';
        END IF;
    END //

DROP PROCEDURE IF EXISTS School_Network.viewChildrenApplications;
CREATE PROCEDURE viewChildrenApplications(adminSSN VARCHAR(50))
BEGIN
    SELECT * FROM Parents_apply_for_Schools P WHERE
			P.school_name=(SELECT Employees.school_name FROM Employees WHERE adminSSN=Employees.ssn);
  END //
DELIMITER ;


DROP TABLE Parents_apply_for_Schools;
CREATE TABLE `Parents_apply_for_Schools` (
  `school_name` varchar(50) NOT NULL,
  `child_ssn` varchar(50) NOT NULL,
  `accepted` tinyint(4) DEFAULT '0',
  `grade` int(11) NOT NULL,
  `parent_username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`school_name`,`child_ssn`)
) 
