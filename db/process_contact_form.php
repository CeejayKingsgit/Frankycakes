<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo '<pre>' . print_r($_POST, true) . '</pre>'; // This will print all POST data
    // Retrieve form data
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"] ?? ''; // Use null coalescing operator in case it's not provided
    $message = $_POST["message"];

    // Validate form data (you can add more validation as needed)
    if (empty($full_name) || empty($email) || empty($message)) {
        echo "Please fill in all required fields.";
    } else {
        // If data is valid, process the form (e.g., store the message in the database)
        require "db_connection.php"; // Using require to ensure the file must be loaded

        // Prepare an SQL statement to prevent SQL injection
        $sql = "INSERT INTO contact_messages (full_name, email, phone_number, message) VALUES (?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared SQL statement
            $stmt->bind_param("ssss", $full_name, $email, $phone_number, $message);
            // Execute the statement
            if ($stmt->execute()) {
                echo "Message sent successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
} else {
    // If the form was not submitted via POST method, display an error message
    echo "Form submission method not allowed.";
}
?>