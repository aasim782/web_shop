<!doctype html>

<?php session_start();
	if(isset($_SESSION['cusid']))
	{
		header("location:profile.php");	
	}
	 

 ?>
 
<html lang="en">
  <head>
  <?php 
  include "customer_forget_password.php"; 
  include "customer_reg.php";
  include "customes_order.php";
  ?>
    <?php include "customer_models.php" ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.js?i=45"></script>
    <script src="js/popper.min.js?i=45"></script>
    <script src="js/bootstrap.min.js?i=45"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css?i=45">
	<script src="js/all.js?i=45" data-auto-replace-svg="nest"></script>
	<script src="prg_main.js?i=45" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="css/all.css?i=45">
    <title>Dress Line</title>
  </head>
  <body>

  	    <!-- alert -->
				<div class="alert p-0 alert-danger alert-dismissible m-0 fade show rounded-0" role="alert">
				  <center>Ramzan Sale Offer <strong>50%</strong> the Cart..!</center>
				  <button type="button" class="close p-0 m-0" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div> 
	    <!-- /alert -->

  
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark  " style='background-color:#3d3d3d'>
 <a class="navbar-brand" href="#">
    <img src="https://learncodeweb.com/wp-content/uploads/2019/12/fb-login.png" width="30" height="30" class="d-inline-block align-top" alt="">
   Dress Line
  </a>

 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  </div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav justify-content-center ">
     <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i>Home </a>
      </li>
     
    </ul>
		<!-- Search bar -->
		<ul class="nav justify-content-center mr-auto ">
		<div class="form-inline my-2 my-lg-0"> 
		<input size="50" class="form-control mr-sm-2" id="search_txt" type="search" placeholder="i'm,shopping for..." aria-label="Search">
		  <button class="btn btn-outline-danger my-2 my-sm-0" style="background-color:#ff4747;color:white;" type="submit" id="search_btn">Search</button>
		</div>
		</ul>
		
	   <ul class="navbar-nav">
	 <li class="nav-item active">
        <a class="nav-link"   data-toggle="modal" data-target="#customer_feedback_Model" style="cursor: pointer;"><i class="fas fa-star"></i>Feedback</a>
      </li>
	   <li class="nav-item active" >
     
      </li>
 			
			
			<!-- Sign Up Form -->
	<div class="btn-group">
	  <button type="button" id="card_container_btn" class="btn btn-secondary dropdown-toggle mr-2" data-toggle="dropdown" aria-expanded="false">
		<span class="badge badge-light"  >0</span> <i class="fas fa-shopping-cart"></i> Rs.<a >0</a>.00
	  </button>


  
				  <div class="dropdown-menu dropdown-menu-right ">
								<div class="container">
									<div class="row  overflow-auto" style='height:350px;'>
								
									
											<div class="col-sm-12 col-md-10 col-md-offset-1">
												<table class="table table-hover " >
													<thead  style='background-color:#ff4747;padding:10px;color:white;'>
														<tr>
															<th style='padding:10px;'>No</th>
															<th colspan="2"  style='padding:5px;'>Product</th>
															<th style='padding:10px;' class="text-center">Quantity</th>
															<th style='padding:10px;' class="text-center">Price</th>
												

														</tr>
														
													</thead>	
													
												
													<tbody   class=""  > 
 					
														<tr>
													</tr>

													
														
													
													</tbody>
												</table>
											</div>
											
											
									</div>
								</div>
				</div>

				  
	</div>
<!-- /signIn -->




 
<!-- top login button -->
<a   data-toggle="modal" data-target="#customer_login_model"  class='btn btn-danger' role='button' style='color:white;'>  <i class='fas fa-user'></i> Login</a>
<a  data-toggle="modal" data-target="#signupModel"  class='btn btn-warning ml-2 text-center' role='button'> <i class='fas fa-user'></i> Register</a>



<!-- /signIn -->





	
	<!-- Button trigger modal -->




	</ul>
	  </div>
	  
	  
	</nav>
<!-- /navbar -->
			<!-- Slider -->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators"> 		<!-- Slider_Mark -->
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>  
				<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>  
				<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>  
			  </ol>
			  <div class="carousel-inner">
				<div class="carousel-item ">  		<!-- Slider_image_1 -->
				<img class="d-block w-100" src="admin/upload/slider3.jpg" alt="Third slide">
				</div>
				<div class="carousel-item active">
				  <img class="d-block w-100" src="admin/upload/slider1.jpg"alt="Second slide">
				</div>
			
				<div class="carousel-item">
				  <img class="d-block w-100" src="admin/upload/slider3.jpg" alt="Third slide">
				</div>
				<div class="carousel-item">
				  <img class="d-block w-100" src="admin/upload/slider4.jpg" alt="Third slide">
				</div>
				<div class="carousel-item">
				  <img class="d-block w-100" src="admin/upload/slider5.jpg" alt="Third slide">
				</div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>



  <!-- Page Content -->
  <div class="container">
    <div class="row mt-3 ">
	</div>
	<div class="row">
	 <div class="col-lg-3">
	
    <!-- Category -->

				
						<div id="get_category"> </div>
				
		
	<!-- Brands -->		

	
						<div id="get_brand"> </div>
						
						

      </div>
	  
      <!-- /.col-lg-3 -->
	
	  
      <div class="col-lg-9">
				 
	
		  	    <!--alert-->
				<div id="show_msg"></div>
		  
	    <!-- All Product-->
	<div class="card">
  <div class="card-header" style="background-color:rgba(255, 193, 7, 0.48);"><h6>&nbspAll Products</h6></div>
  <div class="card-body ">
	
		<!-- All Product-->
					<div class="row" id="get_product"> </div>
						
			<!-- 
		     <div class="col-4 mb-3" >
            <div class="card"> 
			<div class="card-header" style="font-size:15px;background-color:rgba(255, 193, 7, 0.48);"> <b>Samsung Galaxy A30</b>
					<button type="button"  style='float:right;' class="btn btn-warning"><i class="fas fa-search" ></i></button>
			</div>
				<div class="text-center">
				
				<img  class="card-img-top" src='admin/upload/man_Shirt.jpg' align="center" style='width:160px;height:250px'/><br>		
					<div class="text-center"  style="padding-top:15px;">
					<i class="fas fa-star " style="color:orange"></i> 
                	<i class="fas fa-star " style="color:orange"></i>
                	<i class="fas fa-star " style="color:orange"></i>
                	<i class="fas fa-star " style="color:orange"></i>
					<i class="fas fa-star"></i>
					</div>
				</div>
              <div class="card-footer">
				<b><strike>Rs.50</strike>/Rs.50</b>
			<button class="btn btn-danger btn-sm"  style='float:right;font-size:13px'><i class="fa fa-shopping-cart"></i> Add to Cart</button>        
				</div>
            </div>
          </div>
		  
		  -->
	
		  
		  
		  
		  	
		  
				
					
					
		     </div>
		  <!-- /.row --> 
		  
		   
					
	</div>
	<!-- /card-body -->
				 		
		<div class="card-footer text-right" style="background-color:white;">
			  		 <!-- next button/pagination-->
						<nav aria-label="asdasd" class="nav justify-content-center">
					  <ul class="pagination" id="pagenumber">
					
						
					  </ul>
					</nav>
				</div>
				   <!-- footer end -->
				
				
				</div>
	
			</div>
			
			    <!-- card end -->
			
 
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  </div>
  <!-- /.container -->
	  <?php include "footer.php" ?>
</body>
</html>