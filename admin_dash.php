<?php
// Include database connection
include "db/db_connection.php";

// Fetch all users from the database
$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

// Fetch all contact form submissions from the database
$sql_submissions = "SELECT * FROM order_requests";
$result_submissions = $conn->query($sql_submissions);

// Check if queries were successful
if ($result_users === false || $result_submissions === false) {
    // Handle database query error
    echo "Error: Unable to fetch this  data from the database.";
} else {
    // Close the database connection
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .no-data {
            text-align: center;
            color: #888;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Welcome to Admin Dashboard</h1>

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
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_users->num_rows > 0) {
                    while($row = $result_users->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["user_id"] . "</td>";
                        echo "<td>" . $row["full_name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone_number"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='no-data'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Contact Form Submissions Section -->
    <section>
        <h2>Contact Form Submissions</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Cake Type</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_submissions->num_rows > 0) {
                    while($row = $result_submissions->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["cake_type"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='no-data'>No contact form submissions found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>
<?php } ?>