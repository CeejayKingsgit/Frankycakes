<?php
// Include database connection
include "db/db_connection.php";
include "header.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Prepare and execute SQL statement to insert the new blog post
    $sql = "INSERT INTO blogs (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        // Blog post added successfully, redirect to blog.php
        header("Location: blog.php");
        exit();
    } else {
        // Error occurred while adding the blog post
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>


<body>
    <div class="container mt-5">
        <h2>Add New Blog Post</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

<!--  footer -->
<footer id="contact">
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-4">
                     <div class="titlepage">
                        <h2>Contact Us</h2>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <form id="request" class="main_form">
                        <div class="row">
                           <div class="col-md-3 ">
                              <input class="contactus" placeholder="Full Name" type="text" name="Full Name"> 
                           </div>
                           <div class="col-md-3">
                              <input class="contactus" placeholder="Email" type="text" name="Email"> 
                           </div>
                           <div class="col-md-3">
                              <input class="contactus" placeholder="Phone Number" type="text" name="Phone Number">                          
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                              <ul class="social_icon">
                                 <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                              </ul>
                           </div>
                           <div class="col-md-8">
                              <textarea class="contactus1" placeholder="text">Message </textarea>
                           </div>
                           <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                              <button class="send_btn">Send</button>
                           </div>
                           
                        </div>
                     </form>
                  </div>
                  
                   <div class="col-md-3 border_right">
                     <ul class="location_icon">
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> Locatins</li>
                        <li><a href="#"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></a> +3534754234</li>
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>jon_cakes@gmail.com</li>
                     </ul>
                  </div>
                  <div class="col-md-3 border_right">
                     <h3>Useful Link</h3>
                     <ul class="link">
                        <li><a href="#">birthday cakes </a></li>
                        <li><a href="#">wedding cakes </a> </li>
                        <li><a href="#">cup cakes </a></li>
                        <li><a href="#">children cakes  </a> </li>
                        <li><a href="#">Anniversary cakes  </a></li>
                     </ul>
                  </div>
                  <div class="col-md-3 border_right">
                     <h3>Quick links</h3>
                     <ul class="link">
<li><a href="index.html">Home</a></li>                             
<li><a href="about.html">About</a></li>                                                     
<li><a href="products.html">Products</a></li>
<li><a href="Gallery.html">Gallery</a></li>                             
<li><a href="blog.html">Blog</a></li>
<li><a href="contact.html">Contact</a></li>
                     </ul>
                  </div>
                  <div class="col-md-3">
                     <form class="bottom_form">
                        <h3>Newsletter</h3>
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>Copyright &copy;  2022 <a href="https://html.design/"> Free  html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>