<?php
// Include the database connection script
include "db/db_connection.php";
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Dashboard, <?php echo $name; ?>!</h1>
        <p>Here are your details:</p>
        <ul>
            <li><strong>Name:</strong> <?php echo $name; ?></li>
            <li><strong>Email:</strong> <?php echo $email; ?></li>
            <li><strong>Phone Number:</strong> <?php echo $phone; ?></li>
        </ul>
    </div>
</body>
</html>