<!doctype html>

<?php session_start();
	if(isset($_SESSION['cusid']))
	{
		header("location:profile.php");	
	}

 ?>
 

<html lang="en">
  <head>
  <?php include "customer_reg.php"; ?>
  <?php include "customer_forget_password.php"; ?>
    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.js?i=15"></script>
    <script src="js/popper.min.js?i=15"></script>
    <script src="js/bootstrap.min.js?i=15"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css?i=15">
	<script src="js/all.js?i=15" data-auto-replace-svg="nest"></script>
	<script src="prg_main.js?i=15" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="css/all.css?i=15">
    <title>Dress Line</title>
  </head>
  <body>
<!-- Image and text -->
<!-- Navigation Bar -->


<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-th-list"></i> Product</a>
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
        <a class="nav-link" href="#"><i class="fas fa-star"></i> Feedback</a>
      </li>
	   <li class="nav-item active" >
     
      </li>
 			
			
			<!-- Sign Up Form -->
	<div class="btn-group">
	  <button type="button" class="btn btn-secondary dropdown-toggle mr-2" data-toggle="dropdown" aria-expanded="false">
		<i class="fas fa-shopping-cart"></i>Cart<span class="badge">0</span>
	  </button>


 <div class="dropdown-menu dropdown-menu-right ">
								<div class="container">
									<div class="row">
								
									
											<div class="col-sm-12 col-md-10 col-md-offset-1">
												<table class="table table-hover">
													<thead  style='background-color:#ff4747;padding:10px;color:white;'>
														<tr>
															<th style='padding:10px;'>No</th>
															<th style='padding:10px;'>Product Name</th>
															<th style='padding:10px;'>Product Image</th>
															<th style='padding:10px;' class="text-center">Quantity</th>
															<th style='padding:10px;' class="text-center">Total price RS.</th>
												

														</tr>
													</thead>	
													
												
													<tbody >			
											
																	
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




<!-- Sign Up Form -->

	 <li class="nav-item active">
        <a class="nav-link" href="login.php"><i class="fas fa-user"></i> Login</a>
      </li>


<!-- /signIn -->





	
	<!-- Button trigger modal -->




	</ul>
	  </div>
	  
	  
	</nav>
	
	
	<!-- NAv -->



	
	<div class="container col-5 mt-6">
	<div class="row m-5">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item " >
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> <i class="fas fa-user"></i> Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#"  data-toggle="modal" data-target="#signupModel"  role="tab"> <i class="fas fa-man"></i> Create Account</a>
  </li>
</ul>

<div class="tab-content col-12 " id="myTabContent">

  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    	<div class="container" >
			<div id="cus_reg_alert_msg_login" class=" mt-3"></div>
		</div>
				<form class="mt-4 ">
			  <div class="form-group ">
				<label for="exampleDropdownFormEmail2">Email address</label>
				<input type="email" class="form-control" id="lg_email_txt" placeholder="email@example.com">
			  </div>
			  <div class="form-group">
				<label for="exampleDropdownFormPassword2">Password</label>
				<input type="password" class="form-control" id="lg_password_txt" placeholder="Password">
			  </div>

			  <button type="submit" id="login_page_login_btn" class="btn btn-danger">Login</button>	 
  
  	<div class="row mt-2 ">
	<a class="nav-link"  href="#"  data-toggle="modal" data-target="#forget_OTP_verify_model" >Forgot password?</a>
 <a  class="nav-link" href="#"  data-toggle="modal" data-target="#customer_forget_password" >New Password?</a>

</div>


			 
			 
			 
			 
			 
			</form>
  </div>

</div>
</div>
  
	</div>

</body>
</html>