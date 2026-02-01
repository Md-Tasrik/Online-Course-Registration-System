# Online Course Registration Portal

## Introduction

Welcome to the Online Course Registration System! This web-based registration software facilitates the seamless registration of courses online, catering to the needs of educational institutions, corporate training programs, and online courses. The system allows students to register for courses by providing the necessary details, and administrators can manage various aspects of the registration process.

## Project Requirements

- Language Used: PHP 8.2.12
- Database: MySQL
- User Interface Design: HTML, CSS, AJAX, jQuery, JavaScript
- Software: XAMPP/Wamp/Mamp/Lamp (anyone)

## Modules or Use Cases

### Admin
- The admin module is responsible for registering students and providing them with a username, password, and a unique pin code.
- Pin code is used when a student enrolls for a course.
- Admin can manage sessions, semesters, departments, courses, students, and view student logs.
- Admin can post new announcements for all the students.

  #### _Login Details for Admin_
  - Username: admin
  - Password: Test@123

![image](https://github.com/bhavya51/Course_Registration_Portal/assets/93445041/3ef87444-e8f1-4887-9b1f-b54c452bf332)
![image](https://github.com/bhavya51/Course_Registration_Portal/assets/93445041/07905ff8-71b6-4201-82a3-fe9a7982c17d)
![image](https://github.com/bhavya51/Course_Registration_Portal/assets/93445041/ecf2154c-cfab-4eb4-98c3-c6597f2b36dd)


### Student
- Students can log in using their registration number and password provided by the admin.
- They can enroll in any available course and obtain a printout of their registered courses.

  #### _Login Details for Student_
  - Reg No.: 10806121
  - Password: 123456
  - Student Pincode for Course Enrollment (Student): 390022

  ![image](https://github.com/bhavya51/Course_Registration_Portal/assets/93445041/8e1482ed-862f-42c3-8cb0-e0315d1c89e1)
  ![image](https://github.com/bhavya51/Course_Registration_Portal/assets/93445041/e81d1a4a-ed38-4f7d-b2e2-1c60df5cbd89)
  ![image](https://github.com/bhavya51/Course_Registration_Portal/assets/93445041/fa61778c-c35e-465e-9247-957adbf7cbbd)
  ![image](https://github.com/bhavya51/Course_Registration_Portal/assets/93445041/f940fe16-60ee-458f-bc45-b0aeecbc202d)

## Installation Steps

- Download the zip file and unzip the project file on your local system.
- Cut the 'sql_file' folder, and paste it into some other directory, you will need the '.sql' file located in it.
- Copy the "Course_Registration_Portal" folder and place it inside the root directory of your server. (E.g. : C:\xampp\htdocs\Course_Registration_Portal)

## Database Configuration Steps:
- Open PHPMyAdmin.
- Create a new database named "onlinecourse"
- Import the database schema from the "onlinecourse.sql" file provided in the "sql_file" folder that you saved in some other directory earlier.

## Accesing the Portal on Browser:
- Open your browser and enter the following URL: 'http://localhost/Course_Registration_Portal'
