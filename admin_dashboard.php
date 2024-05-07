<?php
session_start();
// Ensure the user is logged in and is an admin
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: admin_login.php"); // Redirect to admin login page
    exit();
}

include "db/db_connection.php";

// Handle form submission for creating a new user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create_user"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    
    $sql_create_user = "INSERT INTO users (full_name, email, phone_number) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql_create_user);
    $stmt->bind_param("sss", $name, $email, $phone);
    
    if ($stmt->execute()) {
        echo '<script>alert("User created successfully!")</script>';
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch data
$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

$sql_blog_posts = "SELECT * FROM blogs";
$result_blog_posts = $conn->query($sql_blog_posts);

$sql_requests = "SELECT * FROM order_requests";
$result_requests = $conn->query($sql_requests);

// Fetch contact messages data
$sql_contact_messages = "SELECT * FROM contact_messages";
$result_contact_messages = $conn->query($sql_contact_messages);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        h1, h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #ddd; }
        .no-data { text-align: center; color: #888; font-style: italic; }
    </style>
</head>
<body>
    <h1>Welcome to Admin Dashboard</h1>

    <!-- Add Blog Post Button -->
    <section>
        <h2>Add Blog Post</h2>
        <a href="add_blog.php">Add New Blog Post</a>
    </section>

    <!-- Blog Posts Section -->
    <section>
        <h2>Blog Posts</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date Published</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_blog_posts->num_rows > 0) {
                    while($row = $result_blog_posts->fetch_assoc()) {
                        echo "<tr><td>{$row['id']}</td><td>{$row['title']}</td><td>{$row['date_published']}</td>";
                        echo "<td><a href='edit_blog.php?id={$row['id']}'>Edit</a> | <a href='delete_blog.php?id={$row['id']}'>Delete</a></td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='no-data'>No blog posts found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Create New User Form -->
    <section>
        <h2>Create New User</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required><br><br>
            <button type="submit" name="create_user">Create User</button>
        </form>
    </section>

    <!-- Users Section -->
    <section>
        <h2>Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_users->num_rows > 0) {
                    while($row = $result_users->fetch_assoc()) {
                        echo "<tr><td>{$row['user_id']}</td><td>{$row['full_name']}</td><td>{$row['email']}</td><td>{$row['phone_number']}</td>";
                        echo "<td><a href='edit_user.php?id={$row['user_id']}'>Edit</a> | <a href='delete_user.php?id={$row['user_id']}'>Delete</a></td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='no-data'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Contact Messages Section -->
    <section>
        <h2>Contact Messages</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Message</th>
                    <th>Received At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_contact_messages->num_rows > 0) {
                    while($row = $result_contact_messages->fetch_assoc()) {
                        echo "<tr><td>{$row['id']}</td><td>{$row['full_name']}</td><td>{$row['email']}</td>";
                        echo "<td>{$row['phone_number']}</td><td>{$row['message']}</td><td>{$row['created_at']}</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='no-data'>No contact messages found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

</body>
</html>