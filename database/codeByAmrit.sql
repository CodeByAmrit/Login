-- create database codebyamrit;
-- use codebyamrit;

-- create table user(
-- id int auto_increment primary key,
-- name varchar(255) not null,
-- emaiL VARCHAR(255) unique key,
-- password VARCHAR(255) NOT NULL,

-- image_data LONGBLOB,
-- image_name VARCHAR(255) NOT NULL

-- );

-- CREATE TABLE student_marks (
    
--     user_id int PRIMARY KEY,
--     student_name VARCHAR(255) NOT NULL,
--     st1 INT,
--     sp1 INT,
--     st2 INT,
--     sp2 INT,
--     st3 INT,
--     sp3 INT,
--     st4 INT,
--     sp4 INT,
--     st5 INT,
--     sp5 INT,
--     st6 INT,
--     sp6 INT
    
-- );




-- Create a database
CREATE DATABASE IF NOT EXISTS SchoolDB;
USE SchoolDB;

-- Create a table for branches
CREATE TABLE IF NOT EXISTS Branches (
    BranchID INT PRIMARY KEY AUTO_INCREMENT,
    BranchName VARCHAR(50) UNIQUE
);

-- Create a table for courses
CREATE TABLE IF NOT EXISTS Courses (
    CourseID INT PRIMARY KEY AUTO_INCREMENT,
    CourseName VARCHAR(50) UNIQUE
);

-- Create a table for semesters
CREATE TABLE IF NOT EXISTS Semesters (
    SemesterID INT PRIMARY KEY AUTO_INCREMENT,
    SemesterName VARCHAR(50) UNIQUE
);

-- Create a table for students
CREATE TABLE IF NOT EXISTS Students (
    StudentID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    FatherName VARCHAR(50),
    DOB date,
    Address_student VARCHAR(255),
    phone_number VARCHAR(20),
    gender VARCHAR(10),
    BranchID INT,
    
    CONSTRAINT FK_BranchID FOREIGN KEY (BranchID) REFERENCES Branches(BranchID),
    CONSTRAINT UC_StudentName UNIQUE (FirstName, LastName)
);

-- Create a table for records of different subjects
CREATE TABLE IF NOT EXISTS Subjects (
    SubjectID INT PRIMARY KEY AUTO_INCREMENT,
    SubjectName VARCHAR(50) UNIQUE,
    CourseID INT,
    SemesterID INT,
    CONSTRAINT FK_CourseID FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
    CONSTRAINT FK_SemesterID FOREIGN KEY (SemesterID) REFERENCES Semesters(SemesterID)
);

-- Create a table for marks
CREATE TABLE IF NOT EXISTS Marks (
    MarkID INT PRIMARY KEY AUTO_INCREMENT,
    StudentID INT,
    SubjectID INT,
    MarksObtained INT,
    CONSTRAINT FK_StudentID FOREIGN KEY (StudentID) REFERENCES Students(StudentID),
    CONSTRAINT FK_SubjectID FOREIGN KEY (SubjectID) REFERENCES Subjects(SubjectID)
);

-- Create a table for student login credentials
CREATE TABLE IF NOT EXISTS StudentLogin (
    StudentID INT PRIMARY KEY,
    LoginID VARCHAR(50) UNIQUE,
    Password VARCHAR(255),
    image_data LONGBLOB,
    CONSTRAINT FK_StudentLoginID FOREIGN KEY (StudentID) REFERENCES Students(StudentID)
);
