<?php
session_start(); // Start the session at the very beginning
error_reporting(E_ALL); // Enable error reporting for development
include "db/db_connection.php";

$error = ''; // Initialize error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare a SQL statement to find the user
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user_result = $stmt->get_result();

    if ($user_result->num_rows > 0) {
        $user = $user_result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Password is correct, save user info in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['is_admin'] = false;  // Only relevant if you differentiate between admin and user accounts elsewhere
            // Instead of a direct header redirection, we will use JavaScript below
            echo "<script>
                alert('You are logged in.');
                window.location.href = 'home.php';
            </script>";
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Invalid username or password.";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- HTML5 Charset -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    
    <!-- site metas -->
    <title>Franky CAKES</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!--The main CSS styling sheet for this project is style.css-->

    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->
<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <!-- <a href="index.html"><img src="images/logo.png" alt="#" /></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <?php
                                    // Check if the user is logged in
                                    if(isset($_SESSION['user_id'])) {
                                        // User is logged in
                                        // Display home page link
                                        echo '<li class="nav-item active">';
                                        echo '<a class="nav-link" href="index.php"> Home </a>';
                                        echo '</li>';
                                    } else {
                                        // User is not logged in
                                        // Display register and login links
                                        echo '<li class="nav-item">';
                                        echo '<a class="nav-link" href="about.php">Register</a>';
                                        echo '</li>';
                                        echo '<li class="nav-item">';
                                        echo '<a class="nav-link" href="login.php">Login</a>';
                                        echo '</li>';
                                    }
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.php">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="products.php">Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="gallery.php">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="blog.php">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.php">Contact</a>
                                    </li>
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="nav-item cart">
                                        <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                    </li>
                                    <li class=" d_none get_btn">
                                        <a  href="#">FAQ</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
<body>
    <section class="container-fluid">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" method="post" role="form">
                    <div class="form-group">
                        <h4 class="text-center font-weight-bold"> Login </h4>
                        <label for="InputEmail1">Email Address</label>
                        <input type="email" class="form-control" id="InputEmail1" name="username" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword1">Password</label>
                        <input type="password" class="form-control" id="InputPassword1" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Submit</button>
                    <div class="form-footer">
                        <span>Don't have an Account? <a href="register.php">Sign Up</a></span>
                    </div>
                </form>
                <?php if (isset($error)) echo "<p class='text-center text-danger'>$error</p>"; ?>
            </section>
        </section>
    </section>
    <?php include "footer.php"; ?>
</body>
</html>