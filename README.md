# ADBMS-minorproject
Registration page using html,css,mysadmin(xamp).
This project aims to create a simple registration form using HTML for the frontend, PHP for server-side processing, and MySQL for database management. The registration form allows users to enter their personal details, which are then stored in a MySQL database using XAMPP as the server environment.
steps to run the code:
step 1: Download the files index.html,styles.css and submit.php into your system 
step 2: Download and install XAMPP form:  https://www.apachefriends.org/download.html
step 3: save the files in this path in your system: C:\xampp\htdocs\folder
step 4: open the XAMPP controll panel and "start" first two opetions (apache , mysql)
step 5: click on 2nd option "admin" of mysql to open the myphpadmin.
step 6: Now create the database and table using this sql query: 
-- Create a new database
CREATE DATABASE registration_db;
-- Use the database
USE registration_db;
-- Create a table to store the form data
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    account_type ENUM('Personal Account', 'Business Account') NOT NULL,
    terms_accepted BOOLEAN NOT NULL,
    profile_picture VARCHAR(255),
    age INT,
    referrer VARCHAR(50),
    bio TEXT
);
step 7: Now open the index page on your broser by typing: localhost/folder and click enter
step 8: Done
