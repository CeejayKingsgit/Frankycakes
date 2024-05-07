<?php
// Include the database connection script
include "db/db_connection.php";
include "header.php";
?>
      <!-- product  section -->
      <div class="product">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="titlepage">
                     <h2>Our Gallery</h2>
                  </div>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 padding_left0">
                  <div class="product_box">
                     <figure><img src="images/product1.jpg" alt="#"/></figure>
                     <div class="letterbox">Glacier Cakes<i class="fa fa-cart-plus" aria-hidden="true"></i> 
					 <br> From &euro; 10.99 
					 </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                  <div class="product_box">
                     <figure><img src="images/product2.jpg" alt="#"/></figure>
                     <div class="letterbox">Fondant Cake<i class="fa fa-cart-plus" aria-hidden="true"></i> 
					 <br> From &euro; 13.99 
					 </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 padding_right0">
                  <div class="product_box">
                     <figure><img src="images/product3.jpg" alt="#"/></figure>
                     <div class="letterbox">Fruit Bread Cake<i class="fa fa-cart-plus" aria-hidden="true"></i> 
					 <br> From &euro; 5.99  
					 </div>
                  </div>
               </div>
               <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 padding_left0">
                  <div class="product_box">
                     <figure><img src="images/product4.jpg" alt="#"/></figure>
                     <div class="letterbox">Cupcakes<i class="fa fa-cart-plus" aria-hidden="true"></i> 
					 <br> From &euro; 10.99 
					 </div>
                  </div>
               </div>
               <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 padding_right0">
                  <div class="product_box">
                     <figure><img src="images/product5.jpg" alt="#"/></figure>
                     <div class='letterbox'>Cake Slices<i class="fa fa-cart-plus" aria-hidden="true"></i> 
					 <br> From &euro; 2.99 
					 </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end product  section -->
      <?php
include "footer.php";
?>