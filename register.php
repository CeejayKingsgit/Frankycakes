<?php
// Include the database connection script
include "db/db_connection.php";
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login_style.css">
</head>
   
<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    <!-- Registration form creation starts -->
    <section class="container-fluid">
        <!-- row and justify-content-center class is used to place the form in center -->
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" method="post" action="db/process_registration.php">
                    <div class="form-group">
                        <h4 class="text-center font-weight-bold">Register</h4>
                        <label for="InputFullName">Full Name</label>
                        <input type="text" class="form-control" id="InputFullName" name="full_name" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Email Address</label>
                        <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="InputPhoneNumber">Phone Number</label>
                        <input type="tel" class="form-control" id="InputPhoneNumber" name="phone_number" placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Submit</button>
                    <div class="form-footer">
                        <span>Already have an account? <a href="index.php">Login</a></span>
                    </div>
                </form>
            </section>
        </section>
    </section>
    <!-- Registration form creation ends --> 
    <?php
include "footer.php";
?>