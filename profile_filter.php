<!doctype html>
<?php


 session_start();
	if(!isset($_SESSION['cusid'])) //user loged or not check through the session
	{
		header("location:index.php");	 //access page
	}

 ?>
<html lang="en">
  <head>
  <?php 
  include "customer_reg.php";
  include "customes_order.php";
  ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.js?i=93"></script>
    <script src="js/popper.min.js?i=93"></script>
    <script src="js/bootstrap.min.js?i=93"></script>

 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css?i=93">
	<script src="js/all.js?i=93" data-auto-replace-svg="nest"></script>
	<script src="prg_main.js?i=93" ></script>
	<script src="js/pace.js?i=93" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="css/all.css?i=93">
	<link rel="stylesheet" href="css/paetheme.css?i=93">
    <title>Dress Line</title>
  </head>
  <body>
  

  	    <!-- alert -->
			<div id="offer_msg_at_profile_filter" > </div>
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
        <a class="nav-link" href="#" data-toggle="modal" data-target="#customer_complain_Model"   ><i class="fas fa-star"></i>Complain</a>
      </li>
 			
			
			<!-- Sign Up Form -->
	<div class="btn-group" >
	  <button type="button" id="card_container_btn" class="btn btn-secondary dropdown-toggle mr-2" data-toggle="dropdown" aria-expanded="false">
		<span class="badge badge-light"  id='badge'>0</span> <i class="fas fa-shopping-cart"></i> Rs.<a id='nav_list_total_val'>0</a>.00
	  </button>

				  
				  <div class="dropdown-menu dropdown-menu-right ">
								<div class="container">
									<div class="row overflow-auto  shadow-sm" style='height:350px; ' >
											<div class="col-12 col-md-offset-1">
												<table class="table table-hover" >
													<thead  style='background-color:#ff4747;padding:10px;color:white;'>
														<tr>
															<th style='padding:10px;'>No</th>
															<th  colspan="2"  style='padding:10px;'>Product</th>
															<th style='padding:10px;' class="text-center">Qty</th>
															<th style='padding:10px;' class="text-center">Price</th>
												

														</tr>
														
													</thead>	
													
												
													<tbody id="all_product_list" >			
											
													<!--					
														<tr>
															<td class="col-md-2"><h5 class="media-heading">01.</h5></td>
																<td class="col-md-6">
															<div class="media">
																<div class="media-body">
																	<h5 class="media-heading">Shoes</h5>
																</div>
															</div></td>
															<td class="col-sm-1 col-md-1" style="text-align: center">
															  <img class="d-block w-100" height="50px" width="10px" src="admin/upload/man_Shirt.jpg" alt="Third slide">
															</td>
															<td class="col-sm-1 col-md-1 text-center"><strong>Rs.400.87</strong></td>
														</tr>

													-->
														
													
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
		



  <!-- Page Content -->
  <div class="container">
    <div class="row mt-3 ">
	</div>
	<div class="row">
	  
	 <div class="col-lg-3"> <!--lg 3 used for cloumn width-->
	

				<!--Filter-->
				<!-- <li class="list-group-item list-group-item-action bg-info" style="color:white;background-color:#FF4747;">
					<h5><i class="fas fa-th-list" ></i>&nbspFilter</h5>
					
					<li class="list-group-item mb-2 rounded" style="background-color:#d6d8d9;"> 
					</li>
					</li> -->

	<!-- Category -->	
  
	
						<div id="get_category_in_filter" class="mb-2"> </div>
				
		
		
 <div class="card mb-2" id="price_div">	
   <div class="card-header">
     <div class="row" ><h5>&nbspPrice (Rs.)</h5>
	   <div class="col-sm"> </div>
	     <div class="col-sm">  <span href="#" id="price_ok_btn"></span> </div>
	   </div>
  
  </div>
  <div class="card-body"  >
		 
  <div class="row" >
    <div class="col-sm">
      	<input type="number"  class="form-control text-center"   id="lpriceid" placeholder="Min" value="" min="0" step="1" oninput="validity.valid||(value='');"    autocomplete="off">
    </div>
	
	  <div class="text-center">
      	-
    </div>
    <div class="col-sm">
     	<input type="number"   class="form-control text-center"   id="hpriceid" placeholder="Max" value=""  min="0" step="1" oninput="validity.valid||(value='');"   autocomplete="off">
    </div>
 	
  </div>
  </div>
  </div>
 
 
		 
		
		
		
	<!-- Brands -->		

	
						<div id="get_brand_in_filter" class="mb-2"> </div>
						
						
						
						
						
						
						
						
						
	 

 <div class="card">	
   <div class="card-header">
 	<h5>Rating</h5></a>  
  </div>
  <div class="card-body" >
  <div class="row" id="feedbackstrs" style="cursor: pointer;"  startval="5">
   <i class="fa fa-star active" style="color:orange" aria-hidden="true"></i>
   <i class="fa fa-star" style="color:orange" aria-hidden="true"></i>
   <i class="fa fa-star" style="color:orange" aria-hidden="true"></i>
   <i class="fa fa-star" style="color:orange" aria-hidden="true"></i>
   <i class="fa fa-star" style="color:orange" aria-hidden="true"></i>

  </div>
  
 
    <div class="row "  id="feedbackstrs" style="cursor: pointer;"  startval="4">
   <i class="fa fa-star" style="color:orange" aria-hidden="true"></i>
   <i class="fa fa-star" style="color:orange"aria-hidden="true"></i>
   <i class="fa fa-star" style="color:orange" aria-hidden="true"></i>
   <i class="fa fa-star" style="color:orange"aria-hidden="true"></i>
   <i class="fa fa-star" aria-hidden="true"></i>&nbspAnd Up
     
	</div>
	
	    <div class="row "  id="feedbackstrs" style="cursor: pointer;"  startval="3">
   <i class="fa fa-star" style="color:orange" aria-hidden="true"></i>
   <i class="fa fa-star" style="color:orange" aria-hidden="true"></i>
   <i class="fa fa-star" style="color:orange" aria-hidden="true"></i>
   <i class="fa fa-star" aria-hidden="true"></i>
   <i class="fa fa-star" aria-hidden="true"></i>&nbspAnd Up
 
     
	</div>
	
	
	    <div class="row "  id="feedbackstrs" style="cursor: pointer;" startval="2">
   <i class="fa fa-star " style="color:orange" aria-hidden="true"></i>
   <i class="fa fa-star"  style="color:orange" aria-hidden="true"></i>
   <i class="fa fa-star" aria-hidden="true"></i>
   <i class="fa fa-star" aria-hidden="true"></i>
   <i class="fa fa-star" aria-hidden="true"></i>&nbspAnd Up
     
	</div>
	
	
	
	
  <div class="row"  id="feedbackstrs"  style="cursor: pointer;"  startval="1">
   <i class="fa fa-star" style="color:orange" aria-hidden="true"></i>
   <i class="fa fa-star" aria-hidden="true"></i>
   <i class="fa fa-star" aria-hidden="true"></i>
   <i class="fa fa-star" aria-hidden="true"></i>
   <i class="fa fa-star" aria-hidden="true"></i>&nbspAnd Up
	</div>
	</div>
	</div>
 
  

      </div>
	  
      <!-- /.col-lg-3 -->
	
	
      <div class="col-lg-9"  style="border-radius: 50px 50px;">
		 <div class="mb-2 mt-2" id="filter_tag">
		 
		
			 
			  <div  class="ml-2 mb-2 text-secondary" id="Filter_title_tag" >	
			  
			  
			   </div>
			   
			   
			   
			 <span   id="Category_tag" >	
			 
		
			</span>
			
			
			<span  id="brand_tag" >	
		
			 </span>
			 
			 
			
			<span id="Lower_tag" >	
		
			</span>
				
				<span id="Highest_tag" >	
			
				
				</span>
				
				
				<span id="Rating_tag" >	
				
			
				</span>
		
			 
				
				
		 
		  </div>
		  	    <!--alert-->
				<div id="show_msg"></div>
	    <!-- /alert -->
	    <!-- All Product-->
	<div class="card" >				<!-- filter option -->
	<div class="card-header" style="background-color:rgba(255, 193, 7, 0.48);">
	    <div class="form-row">
		<h4 for="validationCustom05 "  class="p-1 "><i class="fa fa-shopping-basket"></i> Products</h4>
		 
		 
		
		 
			
			
	  </div>
		

	</div>
	
	
  <div class="card-body ">
	
		<!-- All Product-->
					<div class="row" id="get_product_filter"> </div>
						
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