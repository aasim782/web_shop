<!doctype html>

 
<html lang="en">
  <head>
  <?php include "customer_reg.php"; ?>
  <?php include "customer_forget_password.php"; ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.js?i=123"></script>
    <script src="js/popper.min.js?i=123"></script>
    <script src="js/bootstrap.min.js?i=123"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css?i=123">
	 <link rel="stylesheet" href="css/customes_css.css?i=123">
	<script src="js/all.js?i=123" data-auto-replace-svg="nest"></script>
	<script src="prg_main.js?i=123" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="css/all.css?i=123">
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
    <img src="prg_img/logo/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
   Dress Line
  </a>

 <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
  </div>
  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
    <ul class='navbar-nav justify-content-center '>
     <li class='nav-item active'>
        <a class='nav-link' href='index.php'><i class='fas fa-home'></i>Home </a>
      </li>
      <li class='nav-item active'>
        <a class='nav-link' href='#'><i class='fas fa-th-list'></i> Product</a>
      </li>
    </ul>
		<!-- Search bar -->
		<ul class='nav justify-content-center mr-auto '>
		<div class='form-inline my-2 my-lg-0'> 
		<input size='50' class='form-control mr-sm-2' id='search_txt' type='search' placeholder='Search here...' aria-label='Search'>
		  <button class='btn btn-danger my-2 my-sm-0'  type='submit' id='search_btn'>Search</button>
		</div>
		</ul>
		
	   <ul class='navbar-nav'>
	 
	 
			
			<!-- Sign Up Form -->
	<div class='btn-group' >
	  <button type='button' id='card_container_btn' class='btn btn-secondary dropdown-toggle mr-2' data-toggle='dropdown' aria-expanded='false'>
		<span class='badge badge-light'   >0</span> <i class='fas fa-shopping-cart'></i> Rs.<a >0</a>.00
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




	
	<!-- Button trigger modal -->




	</ul>
	  </div>
	  
	  
	</nav>
<!-- /navbar -->
	 
  
		
		
<div class="container mt-4">
  <div class="row">
    <div class="col-10 mr-2">
    	<div class="container m-3  ">
		
			<div id="indivitual_prd_view"></div>
		
	 
				 </div>
				</div>	
				
				
					 <div class="col justify-content-center text-center" id="recomended_prd_list_right"></div>

 
	
    </div>
	<div class="row mt-3">
	
	  <div class="col ">
  <div class="col justify-content-center text-center" id="recomended_prd_list_left"></div>
 
		 
		</div>
	
	
	    <div class="col-10 border">	 
   <nav class="mt-3">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">OverView</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Customer Reviews <span id="customer_review_count"></span></a>
   </div>
</nav>
 
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div id="prd_dec_details" class="m-3"> </div> 
  </div>
  





















  <div class="tab-pane fade  mt-4  " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  
 
 
  </div>













 
</div>
		 
		 
		</div>
		  
    </div>
    </div>
				
  <?php include "footer.php" ?>
  		
 
 
</body>
</html>