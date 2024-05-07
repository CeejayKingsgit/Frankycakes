<?php
// Include database connection
include "db/db_connection.php";
include "header.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_user"])) {
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    
    // Update user details in the database
    $sql_update_user = "UPDATE users SET full_name='$name', email='$email', phone_number='$phone' WHERE user_id='$user_id'";
    if ($conn->query($sql_update_user) === TRUE) {
        echo '<script>alert("User updated successfully!")</script>';
    } else {
        echo "Error: " . $sql_update_user . "<br>" . $conn->error;
    }
}

if (isset($_GET["id"])) {
    $user_id = $_GET["id"];
    
    // Fetch user details from the database
    $sql_get_user = "SELECT * FROM users WHERE user_id='$user_id'";
    $result_get_user = $conn->query($sql_get_user);
    
    if ($result_get_user->num_rows == 1) {
        $row = $result_get_user->fetch_assoc();
        $name = $row["full_name"];
        $email = $row["email"];
        $phone = $row["phone_number"];
    } else {
        echo "User not found.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
        
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required><br><br>
        
        <button type="submit" name="update_user">Update User</button>
    </form>
</body>
</html>