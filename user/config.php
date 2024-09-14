<?php
session_start(); // Start session to store user information

// Database connection
$host = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "student_management"; 

$con = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>