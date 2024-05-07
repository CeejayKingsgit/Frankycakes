<?php
// Include the database connection script
include "db/db_connection.php";
include "header.php";
?>

     
     
      <!--  footer -->
      <footer id="contact">
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-4">
                     <div class="titlepage">
                        <h2>Order Now</h2>
						
                        <form name="first_form" id="first_form" method="post" action="db/process_contact.php">
    <table>
        <tr>
            <td>
                <label for="user_name">Username</label>
            </td>
            <td>
                <input type="text" id="user_name" name="Full_Name" size="40" />
            </td>
        </tr>
        <tr>
            <td>
                <label for="email">Email</label>
            </td>
            <td>
                <input type="email" id="email" name="Email" size="40" />
            </td>
        </tr>
        <tr>
            <td>
                <label for="number">Phone</label>
            </td>
            <td>
                <input type="number" id="number" name="Phone_Number" min="1" step="1" ondrop="return false;" onpaste="return false" onkeypress="return event.charCode>=48&& event.charCode<=57" />
            </td>
        </tr>
        <tr>
            <td>
                <label for="cake_type">Choose Cake:</label>
            </td>
            <td>
                <select name="Cake_Type">
                    <option value="select">Select</option>
                    <option value="Birthday">Birthday cake - &euro; 15</option>
                    <option value="party">Party cake - &euro; 25</option>
                    <option value="wedding">Wedding cake - &euro; 50.50</option>
                    <option value="chocolate">Chocolate cake - &euro; 20.50</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Submit" />
                <button type="reset">Reset</button>
            </td>
        </tr>
    </table>
</form>
		</div>
	     </div>
		</div>
		</div>
		</div>
		</footer>
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                              <ul class="social_icon">
                                 <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                              </ul>
                           </div>
						  
						   
				   
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>Copyright &copy; 2022 <a href="https://html.design/"></a></p>
                     </div>
                  </div>
               </div>
            </div>
         

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