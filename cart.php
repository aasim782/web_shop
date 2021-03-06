<!doctype html>
<?php session_start();
	if(!isset($_SESSION['cusid'])) //user loged or not check through the session
	{
		header("location:index.php");	 //access page
	}
		
	

 ?>
<html lang="en">
  <head>
<?php include "customer_reg.php"; ?>
<?php include "customer_forget_password.php";
	include "bank_deposit.php";
	?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.js?i=57"></script>
    <script src="js/popper.min.js?i=57"></script>
    <script src="js/bootstrap.min.js?i=57"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css?i=57">
	<script src="js/all.js?i=57" data-auto-replace-svg="nest"></script>
	<script src="prg_main.js?i=57" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="css/all.css?i=93">
    <title>Dress Line</title>
  </head>
  <body>
  


    	    <!-- alert -->
			<div id="offer_msg_at_card" > </div>
	    <!-- /alert -->

  
  
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark  " style='background-color:#3d3d3d'>
 <a class="navbar-brand" href="#">
    <img src="prg_img/logo/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
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
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-th-list"></i> Product</a>
      </li>
    </ul>
		<!-- Search bar -->
		<ul class="nav justify-content-center mr-auto ">
		<div class="form-inline my-2 my-lg-0"> 
		<input size="50" class="form-control mr-sm-2" id="search_txt" type="search" placeholder="i'm,shopping for..." aria-label="Search">
		  <button class="btn btn-danger my-2 my-sm-0"  type="submit" id="search_btn">Search</button>
		</div>
		</ul>
		
	   <ul class="navbar-nav">
	 
	   <li class="nav-item active" >
        <a class="nav-link" href="#" data-toggle="modal" data-target="#customer_complain_Model"   ><i class="fas fa-comments"></i> Complain</a>
      </li>
 			
			
			<!-- Sign Up Form -->
	<div class="btn-group" >
	  <button type="button" id="card_container_btn" class="btn btn-secondary dropdown-toggle mr-2" data-toggle="dropdown" aria-expanded="false">
		<span class="badge badge-light"  id='badge'>0</span> <i class="fas fa-shopping-cart"></i> Rs.<a id='nav_list_total_val'>0</a>.00
	  </button>

				  
				  <div class="dropdown-menu dropdown-menu-right ">
								<div class="container">
									<div class="row  overflow-auto  shadow-sm" style='height:350px;' >
								
									
											<div class="col-sm-12 col-md-10 col-md-offset-1">
												<table class="table table-hover" >
													<thead  style='background-color:#ff4747;padding:10px;color:white;'>
														<tr>
															<th style='padding:10px;'>No</th>
															<th  colspan="2"  style='padding:10px;'>Product</th>
															<th style='padding:10px;' class="text-center">Qty</th>
															<th style='padding:10px;' class="text-center">Price</th>
												

														</tr>
														
													</thead>	
													
												
													<tbody id="all_product_list" class=""  >			
											
							 
														
													
													</tbody>
										
												</table>
										 

											</div>
											
									</div>
									
																<div class="container mb-2   mt-3 justify-content-center">
																<a href="cart.php" class="btn btn-primary mr-2" role="button"><i class="fas fa-shopping-cart"></i> Cart List</a>
																<a href="cart.php" class="btn btn-danger mr-2" role="button"><i class="fas fa-shopping-cart"></i> Checkout</a>
										
														
																</div>
								</div>
				</div>
	</div>
<!-- /signIn -->




<!-- dropdown -->
<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fas fa-user"></i> <?php echo $_SESSION['cus_fname'];?> <!--nav bar name / login user fname-->
  </button>
  <div class="dropdown-menu dropdown-menu-right">
     <button class="dropdown-item   btn btn-light " onclick="window.location='cart.php'" type="button">Cart List <span class="badge badge-primary"  id='badge_in_nave_manue'>0</span> </button>
    <button class="dropdown-item   btn btn-light " onclick="window.location='my_orders.php'" type="button">My orders  <span class="badge badge-primary"  id='orders_badge_in_nave_manue'>0</span> </button>
    <button class="dropdown-item   btn btn-light" type="button"  data-toggle="modal" data-target="#chanepasswordModel" >Change Password</button>
	<button class="dropdown-item btn btn-light" onclick="window.location='logout.php'"  type="button">Logout</button> <!-- login session reset-->
  </div>
</div>
<!-- /dropdown -->





	
	<!-- Button trigger modal -->




	</ul>
	  </div>
	  
	  
	</nav>
<!-- /navbar -->


		
	
	<div class="container mt-4">
	<div id="cart_msg"></div>

  <!-- Page Content -->
				<div class="card mb-3">
				  <div class="card-header text-light" style="background-color:#ff4747;"><i class="fa fa-shopping-cart"></i>Cart</div>
				  <div class="card-body">
					<div class="row ">
							<div class="col-md-1 text-center"><h5>No</h5></div>
							
							<div class="col-md-3"><h5>Product</h5></div>
							<div class="col-md-1 text-center"><h5>QTY</h5></div>
							<div class="col-md-2 text-center"><h5>Product Price</h5></div>
							<div class="col-md-2 text-center"><h5>Total Price</h5></div>
							<div class="col-md-2 text-center"><h5>Update/Delete</h5></div>
					
					
					</div>
				  <div  id="card_page_list"></div>
				  
				  <!-- <div class="row">
						
							<div class="col-md-1">01.</div>
							<div class="col-md-2">T Schirt</div>
							<div class="col-md-2">dasd</div>
							<div class="col-md-2">Rs.100.00</div>
							<div class="col-md-1">	
							<div class="col-md-0">
							<input type="text"  class="form-control"  id="pricemax" size="1" maxlength="8"  name="max">
							</div>
							</div>
							
							
						<div class="col-md-2">1000000</div>
						<div class="col-md-2">
										<div class="btn-group">
										<a href="" class="btn btn-info"><i class="fa fa-check-circle"></i></a>
										<a href="" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
										</div>
							</div>
					</div>
				  -->
				  
				
				 

				  </div>
				  <div class="card-footer text-right"><img src="https://www.payhere.lk/downloads/images/payhere_long_banner.png" alt="PayHere" width="400"/></div>
				</div>
				
				
				
				
				
				
				
				
		
				
				

				
				</div>
	  

	  
      <!-- /.col-lg-3 -->
	
	 

 


	
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