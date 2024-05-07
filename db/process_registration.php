<?php
include "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $password = $_POST["password"];

    if (empty($full_name) || empty($email) || empty($password)) {
        echo "Please fill in all required fields.";
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (full_name, email, phone_number, password) VALUES ('$full_name', '$email', '$phone_number', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            // Registration successful, redirect to login page
            header("Location: /jon/index.php");
            exit(); // Ensure that subsequent code is not executed after the redirect
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
} else {
    echo "Form submission method not allowed.";
}
?>