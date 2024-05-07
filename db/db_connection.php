<?php
// Database configuration
$host = "localhost"; // MySQL host (usually "localhost" for local development)
$username = "root"; // MySQL username
$password = "x25Eme070kings"; // MySQL password
$database = "jon_2"; // MySQL database name

// Attempt to connect to MySQL database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set UTF-8 character set
$conn->set_charset("utf8mb4");

// If the connection is successful, you can include this file in other PHP scripts to access the database connection.
?>