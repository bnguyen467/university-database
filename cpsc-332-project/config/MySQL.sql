DROP DATABASE IF EXISTS university;

CREATE DATABASE university;

USE university;

CREATE TABLE Professor(
SSN varchar(10),
PName varchar(50),
Sex varchar(10),
Street varchar(50),
City varchar(30),
State varchar(20),
Zipcode varchar(10),
PTelephoneNumber varchar(15),
PTitle varchar(30),
Degree varchar(30),
Salary decimal(8,2),
PRIMARY KEY (SSN)
);

INSERT INTO Professor(SSN, PName, Sex, Street, City, State, Zipcode, PTelephoneNumber, PTitle, Degree, Salary)
values ('1112223333', 'John Doe', 'Male', '123 Yorba Linda', 'Fullerton', 'CA', '92831', '(123)123-1123', 'Mathematics Professor', 'MS', 100000);

INSERT INTO Professor(SSN, PName, Sex, Street, City, State, Zipcode, PTelephoneNumber, PTitle, Degree, Salary)
values ('4445556666', 'Jane Smith', 'Female', '456 Nutwood Ave', 'Fullerton', 'CA', '92318', '(456)456-4456', 'Computer Science Professor', 'MS', 110000);

INSERT INTO Professor(SSN, PName, Sex, Street, City, State, Zipcode, PTelephoneNumber, PTitle, Degree, Salary)
values ('7778889999', 'Taylor Lewis', 'Male', '789 State College Blvd', 'Fullerton', 'CA', '92183', '(789)789-7789', 'Computer Science Professor', 'PhD', 120000);

CREATE TABLE Department(
DNumber varchar(10),
DName varchar(20),
DTelephoneNumber varchar(15),
DLocation varchar(50),
Chairperson varchar(50),
ChairpersonSSN varchar (10),
PRIMARY KEY (DNumber),
FOREIGN KEY (ChairpersonSSN) REFERENCES Professor(SSN) 
);

INSERT INTO Department(DNumber, DName, DTelephoneNumber, DLocation, Chairperson, ChairpersonSSN)
values ('0147', 'Mathematics', '(014)147-7410', 'Humanities-Social Sciences Building', 'John Doe', '1112223333');

INSERT INTO Department(DNumber, DName, DTelephoneNumber, DLocation, Chairperson, ChairpersonSSN)
values ('0258', 'Computer Science', '(025)258-8520', 'Engineer and Computer Science Building', 'Taylor Lewis', '7778889999');

CREATE TABLE Course(
CNumber varchar(10),
CTitle varchar(100),
Textbook varchar(100),
Units int,
Prerequisite varchar(30),
DeptNumber varchar(10),
PRIMARY KEY (CNumber),
FOREIGN KEY (Prerequisite) REFERENCES Course(CNumber),
FOREIGN KEY (DeptNumber) REFERENCES Department(DNumber)
);

INSERT INTO Course(CNumber, CTitle, Textbook, Units, Prerequisite, DeptNumber)
values ('0240', 'Computer Organization and Assembly Language', 'assembly language for x86 processors seventh edition', 3, 'CPSC 0131', '0258');

INSERT INTO Course(CNumber, CTitle, Textbook, Units, Prerequisite, DeptNumber)
values ('0332', 'File Structures and Database Systems', 'Fundamentals of Database Systems 7th Edition', 3, 'CPSC 0131', '0258');

INSERT INTO Course(CNumber, CTitle, Textbook, Units, Prerequisite, DeptNumber)
values ('0250', 'Introduction to Linear Algebra and Differential Equations', 'Differential Equations and Linear Algebra', 3, 'Math 150', '0147');

INSERT INTO Course(CNumber, CTitle, Textbook, Units, Prerequisite, DeptNumber)
values ('0280', 'Strategies of Proof', 'A Transition to Advanced Mathematics, Books a la Carte Edition', 3, 'Math 250', '0147');

CREATE TABLE Section(
SNumber varchar(10),
SName varchar(100),
RoomNumber varchar(30),
SeatNumber varchar(10),
Meetdays varchar(50),   
TimeStart varchar(10),
TimeEnd varchar(10),
PSSN varchar(10),
CourseNumber varchar(10),
PRIMARY KEY (SNumber),
FOREIGN KEY (PSSN) REFERENCES Professor(SSN),
FOREIGN KEY (CourseNumber) REFERENCES Course(CNumber)
);

INSERT INTO Section(SNumber, SName, RoomNumber, SeatNumber, Meetdays, TimeStart, TimeEnd, PSSN, CourseNumber)
values ('CPSC 240-1', 'Computer Organization and Assembly Language', 'CS 104 - Teaching Lab', '30', 'T Th', '8:00AM', '10:00AM', '4445556666', '0240');

INSERT INTO Section(SNumber, SName, RoomNumber, SeatNumber, Meetdays, TimeStart, TimeEnd, PSSN, CourseNumber)
values ('CPSC 240-2', 'Computer Organization and Assembly Language', 'CS 408 - Teaching Lab', '30', 'M W', '9:00AM', '11:00AM', '4445556666', '0240');

INSERT INTO Section(SNumber, SName, RoomNumber, SeatNumber, Meetdays, TimeStart, TimeEnd, PSSN, CourseNumber)
values ('CPSC 332-1', 'File Structures and Database Systems', 'CS 300 - Lecture Room', '25', 'T Th', '11:00AM', '1:00PM', '7778889999', '0332');

INSERT INTO Section(SNumber, SName, RoomNumber, SeatNumber, Meetdays, TimeStart, TimeEnd, PSSN, CourseNumber)
values ('CPSC 332-2', 'File Structures and Database Systems', 'CS 300 - Lecture Room', '25', 'M W', '12:00PM', '2:00PM', '7778889999', '0332');

INSERT INTO Section(SNumber, SName, RoomNumber, SeatNumber, Meetdays, TimeStart, TimeEnd, PSSN, CourseNumber)
values ('MATH 0250', 'Introduction to Linear Algebra and Differential Equations', 'MH 464 - Lecture Room', '35', 'M W', '3:00PM', '5:00PM', '1112223333', '0250');

INSERT INTO Section(SNumber, SName, RoomNumber, SeatNumber, Meetdays, TimeStart, TimeEnd, PSSN, CourseNumber)
values ('MATH 0280', 'Strategies of Proof', 'MH 416 - Lecture Room', '20', 'F', '6:00PM', '9:00PM', '1112223333', '0280');

CREATE TABLE Student(
CWID varchar(10),
FName varchar(30),
LName varchar(30),
Address varchar(100),
STelephoneNumber varchar(15),
Major varchar(30),
Minor varchar(30),
PRIMARY KEY (CWID),
FOREIGN KEY (Major) REFERENCES Department(DNumber),
FOREIGN KEY (Minor) REFERENCES Department(DNumber)
);

INSERT INTO Student(CWID, FName, LName, Address, STelephoneNumber, Major, Minor)
values ('000111222', 'Emma', 'Watson', '012 Random Blvd, Fullerton, CA 92831', '0001112222', 'Mathematics', 'Accounting');

INSERT INTO Student(CWID, FName, LName, Address, STelephoneNumber, Major, Minor)
values ('000222333', 'Robert', 'Moore', '023 Random Ave, Anaheim, CA 92311', '0002223333', 'Mathematics', 'Chemistry, Liberal Art');

INSERT INTO Student(CWID, FName, LName, Address, STelephoneNumber, Major)
values ('000333444', 'Lewis', 'King', '023 W Random Rd, Santa Ana, CA 92864', '0003334444', 'Mathematics');

INSERT INTO Student(CWID, FName, LName, Address, STelephoneNumber, Major, Minor)
values ('000444555', 'Susan', 'Baker', '045 E Random Ave, Santa Ana, CA 92865', '0004445555', 'Mathematics', 'Engineer');

INSERT INTO Student(CWID, FName, LName, Address, STelephoneNumber, Major, Minor)
values ('111555666', 'Edwards', 'Young', '156 Down Street, Random City, CA 90156', '1115556666', 'Computer Science', 'Engineer');

INSERT INTO Student(CWID, FName, LName, Address, STelephoneNumber, Major, Minor)
values ('111666777', 'Jackson', 'Chapman', '167 Up Street, Random City, CA 90167', '1116667777', 'Computer Science', 'Mathematics');

INSERT INTO Student(CWID, FName, LName, Address, STelephoneNumber, Major)
values ('111777888', 'James', 'Wilkinson', '178 Right Street, City of Random, CA 90178', '1117778888', 'Computer Science');

INSERT INTO Student(CWID, FName, LName, Address, STelephoneNumber, Major)
values ('111888999', 'Laura', 'Smith', '189 Left Street, City of Random, CA 90189', '1118889999', 'Computer Science');

CREATE TABLE Enrollment(
StudentID varchar(10),
CourseSection varchar(10),
Grade varchar(2),
PRIMARY KEY (StudentID, CourseSection),
FOREIGN KEY (StudentID) REFERENCES Student(CWID),
FOREIGN KEY (CourseSection) REFERENCES Section(SNumber)
);

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('000111222', 'CPSC 240-1', 'A');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('000111222', 'CPSC 332-1', 'A+');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('000222333', 'CPSC 240-2', 'B');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('000222333', 'CPSC 332-2', 'A-');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('000222333', 'MATH 0250', 'A');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('000333444', 'CPSC 240-1', 'B-');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('000333444', 'MATH 0280', 'B+');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('000333444', 'CPSC 332-1', 'C');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('000444555', 'CPSC 240-1', 'A-');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('000444555', 'CPSC 332-1', 'B');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('000444555', 'CPSC 332-2', 'A+');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('111555666', 'CPSC 240-2', 'C+');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('111666777', 'CPSC 240-1', 'C');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('111666777', 'CPSC 332-2', 'B');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('111666777', 'MATH 0250', 'B+');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('111777888', 'CPSC 240-1', 'A');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('111777888', 'MATH 0280', 'A-');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('111888999', 'CPSC 240-2', 'A');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('111888999', 'MATH 0250', 'A+');

INSERT INTO Enrollment(StudentID, CourseSection, Grade)
values ('111888999', 'MATH 0280', 'A');