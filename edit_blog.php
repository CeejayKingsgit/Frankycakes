<?php
include "db/db_connection.php";
$message = '';

// Check if the 'id' GET parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the blog post from the database
    $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $blog = $result->fetch_assoc();

    // Check if the blog post exists
    if (!$blog) {
        $message = "No blog post found with ID " . $id;
    }

    // Process the form when it is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date_published = $_POST['date_published']; // Assuming you want to allow editing the publish date

        // Update the blog post
        $update_stmt = $conn->prepare("UPDATE blogs SET title = ?, content = ?, date_published = ? WHERE id = ?");
        $update_stmt->bind_param("sssi", $title, $content, $date_published, $id);
        if ($update_stmt->execute()) {
            $message = "Blog post updated successfully!";
        } else {
            $message = "Error updating blog post: " . $conn->error;
        }
        $update_stmt->close();
    }
} else {
    $message = "No blog post ID specified.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post</title>
</head>
<body>
    <h1>Edit Blog Post</h1>
    <?php if (!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <?php if ($blog): ?>
        <form action="edit_blog.php?id=<?= $id ?>" method="post">
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($blog['title']) ?>" required>
            </div>
            <div>
                <label for="content">Content:</label>
                <textarea id="content" name="content" required><?= htmlspecialchars($blog['content']) ?></textarea>
            </div>
            <div>
                <label for="date_published">Date Published:</label>
                <input type="date" id="date_published" name="date_published" value="<?= $blog['date_published'] ?>">
            </div>
            <button type="submit">Update Blog Post</button>
        </form>
    <?php endif; ?>
</body>
</html>