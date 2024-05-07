<?php
// Include the database connection script
include "db/db_connection.php";
include "header.php";
?>


     <!-- Blog section -->
    <div class="blog-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="blog-title">Our Blog</h2>
                    <p class="blog-description">Explore our latest blog posts and stay updated!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                // Include database connection
                include "db/db_connection.php";

                // Fetch blog posts from the database
                $sql = "SELECT * FROM blogs ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="blog-post">';
                        echo '<h3>' . $row["title"] . '</h3>';
                        echo '<p>' . $row["content"] . '</p>';
                        echo '<a href="#" class="blog-read-more">Read More</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No blog posts found.</p>';
                }

                // Close the database connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <!-- end Blog section -->

    <?php
include "footer.php";
?>