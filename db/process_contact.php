<?php
// Include the database connection script
include "db_connection.php";
// include "header.php";


// Retrieve form data 
$fullName = $_POST['Full_Name'];
$email = $_POST['Email'];
$phoneNumber = $_POST['Phone_Number'];
$cakeType = $_POST['Cake_Type'];

// Simulate saving the form data to the database (do NOT use this in production)
// This code is highly vulnerable to SQL injection
$sql = "INSERT INTO order_requests (full_name, email, phone_number, cake_type) VALUES ('$fullName', '$email', '$phoneNumber', '$cakeType')";
// Execute the SQL query (assuming $conn is your database connection)
$conn->query($sql);

// Redirect back to the contact page after submitting the form
header("Location: home.php");
exit(); // Make sure no other content is sent after the redirect
?>