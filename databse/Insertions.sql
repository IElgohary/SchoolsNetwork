Use School_Network;

INSERT INTO Schools(name,vision,mission,main_language,fees,city,street,block,zipcode,phone_number,email,type,max_grade,min_grade,general_info)
VALUES ('Sam Baiker American Schools','The graduation of a new generation of personal integrated leaders capable of 
		dealing withh the surrounding mediumm efficiently. Preparing students 
		from the age of four through programs of character building using educational and recreational methods.', 
		'Monitoring the reactions and responses to test his/her capabilities and identify weaknesses to improve it and develop points of strengths.',
		'English',30000,'Cairo','part 7 H beside zahraa almaadi' ,'15','1101','01022345029','s_b@hotmail.com','international',12,1,
		'One of top rated american schools located in maadi for those interested in International top quality Schools');

INSERT INTO Schools(name,vision,mission,main_language,fees,city,street,block,zipcode,phone_number,email,type,max_grade,min_grade,general_info) 
VALUES('Future Rise Language School', 'Is to create a happy & secure environment where your children can learn at their own pace about the world themselves 
	& people around them .supervised by dedicated & experienced caring teachers will inspire 
	them to develop their characters to become balanced confident little learners & beyond.',
	'Has been emerging in response to parents’ requests & needs in developing the child’s natural intelligence.',
	'English',20000,'Cairo','Behind BMW - Maadi','Block H9','11936','19049','info@rise-school.com','international',
	12,1,'Your children are Egypt’s best resource and our staff is our most valuable resource. 
	We will ensure an excellent education as your children progress steadily and successfully.');

INSERT INTO Schools(name,vision,mission,main_language,fees,city,street,block,zipcode,phone_number,email,type,max_grade,min_grade,general_info) 
VALUES('Egypt Institution for Autism','we strive for the best',
		'We reduce curriculums and cancel some school subjects according to the case and the abilities of every child.',
		'Arabic',7000,'Cairo','Sayed Anbar St. - New Maadi','3/4','1001','01062895692','mohamedkamel.mk82@gmail.com','national',9,1,
		'We accept children with an age starting from 3 years.');

INSERT INTO Schools(name,vision,mission,main_language,fees,city,street,block,zipcode,phone_number,email,type,max_grade,min_grade,general_info) 
VALUES('Misr American College','our vision is to provide our children the best american system','To provide an educational setting which enables 
		students to acquire the academic knowledge and develop the learning skills necessary to succeed in higher education and to 
		work and prepare for adulthood, both personally and professionally',
		'English',65000,'Cairo','No 20 Tunis St - New Maadi' ,'20','11201','01006694170','info@mac.com.eg','international',12,1,'Top quality rated american school');

INSERT INTO Schools(name,vision,mission,main_language,fees,city,street,block,zipcode,phone_number,email,type,max_grade,min_grade,general_info) 
VALUES('Ghamra preparatory School','We believe that national schools used to and will always be the fundamental way to establish a well educated society',
	'We strive to keep good morals even before good education for this teenagers','Arabic',140,
	'Cairo','Lotfy El Sayed St - Ghamra','12','11563','0226747830',null,'national',9,7,null);

INSERT INTO Schools(name,vision,mission,main_language,fees,city,street,block,zipcode,phone_number,email,type,max_grade,min_grade,general_info) 
VALUES('American International School of Egypt','our vision is to make better generations',
	'To provide the students with high standards educational system','English',13500,'New Cairo','Beside Police Academy','2','12341','0226188435',
	'registrar@aisegypt.com','international',12,1, null);

INSERT INTO Schools(name,vision,mission,main_language,fees,city,street,block,zipcode,phone_number,email,type,max_grade,min_grade,general_info) 
VALUES('Modern English School Cairo','Rise a whole generation for better Egypt','To facilitate students to achieve their own dreams in different 
		media','English',70000,'New Cairo','Khaled Ibn El Waleed','Area C','11835','0226170006',
		'mescairo@mescairo.com','international',12,1,'We are the school for ur kids');

INSERT INTO Schools(name,vision,mission,main_language,fees,city,street,block,zipcode,phone_number,email,type,max_grade,min_grade,general_info) 
VALUES('Europa Schule Kairo','Establish native German speakers students with German system education','To rise a perfectly educated generation
		with more than just the academic skills.','German',70000,'New Cairo',' 5th Compound','1','11041','01227903951',
		'sekretariat@europaschulekairo.com','international',12,1,'We are the school to make your children the next Einstein');

INSERT INTO Schools(name,vision,mission,main_language,fees,city,street,block,zipcode,phone_number,email,type,max_grade,min_grade,general_info) 
VALUES('Deutsch Schule Der Borromarinnen DSB Kairo','Education is not a luxury','we provide the best facilities to our children',
		'German',20000,'Cairo',
		'Mohamed Mahmoud St., Abdeen','8','11613','0227900088',
		'dsb_edu.eg.de','international',12,1,null);

INSERT INTO Schools(name,vision,mission,main_language,fees,city,street,block,zipcode,phone_number,email,type,max_grade,min_grade,general_info) 
VALUES('New ramses college','Building a balanced personality qualified with positive human values.',
		'The school offers distinctive education that prepares a unique person','English',8000,'Cairo','Lotfy El Sayed - Ghamra','12','11299','0226537906',
		'nrcschools@live.edu.eg','international',12,1,'We are related to Synode Nile Association');

INSERT INTO Schools(name,vision,mission,main_language,fees,city,street,block,zipcode,phone_number,email,type,max_grade,min_grade,general_info) 
VALUES('Samaret El Tawfeek Primary School','Raising young children with good moralsl for the rest of their lives',
		'To offer a well organised curriculum according to the Egyptian Ministry of Education','Arabic',100,'Cairo','Bostan El Kafoory - Fagalla','7','11234','0225882053',
		null,'national',6,1,null);


INSERT INTO Levels (value)
VALUES ('Elementary');

INSERT INTO Levels (value)
VALUES ('Middle');

INSERT INTO Levels (value)
VALUES ('High');



INSERT INTO Elementary_Schools(school_name , level)
VALUES ('Sam Baiker American Schools', 'Elementary');

INSERT INTO Elementary_Schools(school_name , level)
VALUES ('Future Rise Language School', 'Elementary');

INSERT INTO Elementary_Schools(school_name , level)
VALUES ('Egypt Institution for Autism', 'Elementary');

INSERT INTO Elementary_Schools(school_name , level)
VALUES ('Misr American College', 'Elementary');

INSERT INTO Elementary_Schools(school_name , level)
VALUES ('American International School of Egypt', 'Elementary');

INSERT INTO Elementary_Schools(school_name , level)
VALUES ('Modern English School Cairo', 'Elementary');

INSERT INTO Elementary_Schools(school_name , level)
VALUES ('Europa Schule Kairo', 'Elementary');

INSERT INTO Elementary_Schools(school_name , level)
VALUES ('Deutsch Schule Der Borromarinnen DSB Kairo', 'Elementary');

INSERT INTO Elementary_Schools(school_name , level)
VALUES ('New ramses college', 'Elementary');

INSERT INTO Elementary_Schools(school_name , level)
VALUES ('Samaret El Tawfeek Primary School', 'Elementary');



INSERT INTO Middle_Schools(school_name , level)
VALUES ('Sam Baiker American Schools','Middle');

INSERT INTO Middle_Schools(school_name , level)
VALUES ('Future Rise Language School','Middle');

INSERT INTO Middle_Schools(school_name , level)
VALUES ('Egypt Institution for Autism','Middle');

INSERT INTO Middle_Schools(school_name , level)
VALUES ('Misr American College','Middle');

INSERT INTO Middle_Schools(school_name , level)
VALUES ('Ghamra preparatory School','Middle');

INSERT INTO Middle_Schools(school_name , level)
VALUES ('American International School of Egypt','Middle');

INSERT INTO Middle_Schools(school_name , level)
VALUES ('Modern English School Cairo','Middle');

INSERT INTO Middle_Schools(school_name , level)
VALUES ('Europa Schule Kairo','Middle');

INSERT INTO Middle_Schools(school_name , level)
VALUES ('Deutsch Schule Der Borromarinnen DSB Kairo','Middle');

INSERT INTO Middle_Schools(school_name , level)
VALUES ('New ramses college','Middle');



INSERT INTO High_Schools(school_name , level)
VALUES ('Sam Baiker American Schools','High');

INSERT INTO High_Schools(school_name , level)
VALUES ('Future Rise Language School','High');

INSERT INTO High_Schools(school_name , level)
VALUES ('Misr American College','High');

INSERT INTO High_Schools(school_name , level)
VALUES ('American International School of Egypt','High');

INSERT INTO High_Schools(school_name , level)
VALUES ('Modern English School Cairo','High');

INSERT INTO High_Schools(school_name , level)
VALUES ('Europa Schule Kairo','High');

INSERT INTO High_Schools(school_name , level)
VALUES ('Deutsch Schule Der Borromarinnen DSB Kairo','High');

INSERT INTO High_Schools(school_name , level)
VALUES ('New ramses college','High');


INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('PHYS902','Physics 9','Physics basics for preparatory education',9,'Middle');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('TRIG904','Advanced Trignometry 3','Trignometrical sets of rules and manipulation', 9 ,'Middle');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('BIO803','Biology 8','Classifying humany body systems and their interactions', 8 ,'Middle');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('Arab702','Arabic 7','Arabic Grammar and Reading Skills for preparatory education',7,'Middle');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('Eng601','English 6','English as foreign language',6,'Elementary');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('HIST604','Egyptian History','Egyptian Wars and Suffering until being Independent Country',6,'Elementary');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('CHEM505','Chemistry 5','Describing the basic chemical reactions and their effects on industry',5,'Elementary');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('MATH202','Math 2','Simple Equations and Operations on integers',2,'Elementary');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('Eng304','English 3','Enhancing the students English Language with more Vocabulary and Grammar rules',3,'Elementary');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('SCI401','Science 4','Introduction for different branches of Sciences',4,'Elementary');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('Eng102','English 1','Simple words and construction of sentences',1,'Elementary');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('CSEN101','Introduction to Computer Sciences','Fundamentals of Computer Sciences and Programming Languages',10,'High');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('MATH1203','Advanced Pure Mathematics','Pure Mathematics Complex Equations, Polynomial Functions and Matrix Operations',12,'High');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('MECH1206','Fundamentals of Mechanics','Mechanics Problems and Equilibrium Conditions through Simple Modeled Life examples',12,'High');

INSERT INTO Courses (code,name,description,grade,level) 
VALUES ('ACC1103','Accounting Operaions for Companies','Learning the basic fundamentals of the sciences of Accounting followed by modern Large Companies',11,'High');



INSERT INTO Employees (ssn, username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223334','mohamed_kamel','mk203456','Mohamed','Ashraf','Kamel', '1980-1-1', 'mohamed_kamel@gmail.com', 'male', 3500, 'Cairo',
	'Abd El Khalek Tharwat St.', '5', '12046','Sam Baiker American Schools');

INSERT INTO Employees (ssn, username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223335','ahmed_khaled','ak02015ak','Ahmed','Ali','Khaled', '1982-5-1', 'ahmed_khaled@hotmail.com', 'male', 3700, 'Cairo',
	'Mostafa El Nahhas St.', '7', '12546','Sam Baiker American Schools');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223336','yasmine_mohamed','ymym203!!','Yasmine','Ahmed','Mohamed', '1990-11-21', 'yaso_moh123@gmail.com', 'female', 4500, 'Cairo',
	'Ramsis St.', '205', '11246','Future Rise Language School');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223337','nourhan_khalil','nokh123456','Nourhan','Osama','Khalil', '1988-8-16', 'nour-khalil@yahoo.com', 'female', 3000, 'Cairo',
	'Makram Ebeid St.', '15', '11002','Egyptian Institution for Autism');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223338','mina_william','12m53ww012','Mina','Adel','William', '1990-10-1', 'mina_adel_william@gmail.com', 'male', 3200, 'Cairo',
	'El Ahram St.', '92', '11216','Misr American College');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223339','mona_hashem','123gbhn789','Mona','Hashem','Ramzy', '1975-12-21', 'mona_mona_mona@hotmail.com', 'female', 1300, 'Cairo',
	'Aswan St.', '12', '11116','Ghamra preparatory School');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223340','ali_hesham','aliHeshamAli222','Ali','Hesham','Mohamed', '1985-11-21', 'ali_hesh_ali@gmail.com', 'male', 3500, 'Cairo',
	'South 90th St.', '125', '12206','American International School of Egypt');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223341','maya_jacob','mj!2036','Maya','Peter','Jacob', '1991-1-12', 'maya_jacob@live.com', 'female', 4500, 'Cairo',
	'Abd El Khalek Tharwat St.', '125', '11124','Modern English School Cairo');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223342','andrew_rodger','ara!4562','Andrew','Peter','Rodger', '1990-11-14', 'andrew_rodger@gmail.com', 'male', 4600, 'Cairo',
	'Lebanon St.', '52', '10296','Modern English School Cairo');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223343','peter_huffman','pffhKl21','Peter','Muller','Huffman', '1985-12-1', 'peter_huff_mann@gmail.com', 'male', 5000, 'Cairo',
	'Abo El Feda St., Zamalek', '51', '12211','Europa Schule Kairo');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223344','ruth_hamilton','ruthamilton3456','Ruth','Railey','Hamilton', '1978-5-21', 'ruthamilton_22@gmail.com', 'female', 5000, 'Cairo',
	'Abo El Feda St.', '52', '10296','Europa Schule Kairo');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223345','muller_shweinsteiger','mullerMschweinsteigerS','Muller','Reus','Shweinsteiger', '1992-12-12', 'muller.shweinsteiger@gmail.com', 'male', 4500, 'Cairo',
	'El tahrir St.', '5', '12336','Deutsch Schule Der Borromarinnen DSB Kairo');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223346','hanz_magdburg','hanz!hanz20','Hanz','Magdburg','Huth', '1985-3-13', 'hanz_magdburg12@hotmail.com', 'male', 3500, 'Cairo',
	'Road 9 St., Maadi', '20', '11046','Deutsch Schule Der Borromarinnen DSB Kairo');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223347','maurice_ghali','ghaliMaurice123','Maurice','Emad','Ghali', '1978-10-10', 'maurice_ghali@gmail.com', 'male', 3000, 'Cairo',
	'Mohamed Mahmoud St.', '15', '12226','New ramses college');

INSERT INTO Employees (ssn,username,password,first_name,middle_name,last_name, birth_date, email, gender, salary, city, street, block, zipcode, school_name) 
VALUES ('1112223348','mohamed_ahmed','ma56MA!','Mohamed','Ahmed','Ahmed', '1983-7-1', 'mohamed_ahm_ahm@yahoo.com', 'male', 1500, 'Cairo',
	'Ahmed Ezzat St.', '52', '11306','Samaret El Tawfeek Primary School');


INSERT INTO Admins (ssn)
VALUES ('1112223334');

INSERT INTO Admins (ssn)
VALUES ('1112223335');

INSERT INTO Admins (ssn)
VALUES ('1112223336');

INSERT INTO Admins (ssn)
VALUES ('1112223337');

INSERT INTO Admins (ssn)
VALUES ('1112223338');

INSERT INTO Admins (ssn)
VALUES ('1112223339');

INSERT INTO Admins (ssn)
VALUES ('1112223340');

INSERT INTO Admins (ssn)
VALUES ('1112223341');

INSERT INTO Admins (ssn)
VALUES ('1112223342');

INSERT INTO Admins (ssn)
VALUES ('1112223343');

INSERT INTO Admins (ssn)
VALUES ('1112223344');

INSERT INTO Admins (ssn)
VALUES ('1112223345');

INSERT INTO Admins (ssn)
VALUES ('1112223346');

INSERT INTO Admins (ssn)
VALUES ('1112223347');

INSERT INTO Admins (ssn)
VALUES ('1112223348');

insert into Clubs(name, high_school, purpose) values('Music','American International School of Egypt','Enhance students musical talents');


INSERT INTO Courses_taken_by_Students(course_code, student_ssn)
values('MATH1203','23456098762');

INSERT INTO Courses_taken_by_Students(course_code, student_ssn)
values('MECH1206','23456098762');

INSERT INTO Courses_taken_by_Students(course_code, student_ssn)
values('ACC1103','23456098762');

INSERT INTO Courses_taken_by_Students(course_code, student_ssn)
values('TRIG904','23456098755');

INSERT INTO Courses_taken_by_Students(course_code, student_ssn)
values('MECH1206','23456098750');

INSERT INTO Courses_taken_by_Students(course_code, student_ssn)
values('MECH1206','23456098755');




INSERT INTO Courses_taught_by_Teachers (course_code, teacher_ssn)
VALUES ('MECH1206','3489214901');

INSERT INTO Courses_taught_by_Teachers (course_code, teacher_ssn)
VALUES ('ACC1103','3489214901');

INSERT INTO Courses_taught_by_Teachers (course_code, teacher_ssn)
VALUES ('TRIG904','3489214901');
INSERT INTO Courses_taught_by_Teachers (course_code, teacher_ssn)
VALUES ('MATH1203','3489214901');

INSERT INTO Courses_taught_by_Teachers (course_code, teacher_ssn)
VALUES ('MATH202','3489214901');




INSERT INTO Students(student_ssn, username, password,grade, enrolled_school_name)
Values ('23456098750', 'ereny_arsanious_AISE', 'erenyArsanious8750',12,'American International School of Egypt');

INSERT INTO Students(student_ssn, username, password,grade, enrolled_school_name)
Values ('23456098755', 'mark_arsanious_AISE', 'markArsanious8755',12,'American International School of Egypt');



INSERT INTO Parents_review_Schools(school_name, parent_username,review)
values ('American International School of Egypt','Osama','Very friendly staff');

INSERT INTO Parents_review_Schools(school_name, parent_username,review)
values ('American International School of Egypt','Isaac','Large Campus and good quality of teaching');



INSERT into Announcements(title,description,type, date, admin_ssn)
Values('Sharmoofers on campus','Next Thursday at 6pm a concert will be held at the school operated by sharmoofers band.','music','2012-12-1','1112223340');
