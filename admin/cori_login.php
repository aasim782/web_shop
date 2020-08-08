<!doctype html>

<?php session_start();
 
	if(isset($_SESSION['cour_user_id']))
	{
		header("location:cori_tracking.php");	
	}
 ?>
 

<html lang="en">
  <head>
 

    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery.js?i=15"></script>
    <script src="../js/popper.min.js?i=15"></script>
    <script src="../js/bootstrap.min.js?i=15"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css?i=15">
	<script src="../js/all.js?i=15" data-auto-replace-svg="nest"></script>
	<script src="admin_main.js?i=16" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="../css/all.css?i=15">
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
     
		<!-- Search bar -->
	 
		
	   <ul class="navbar-nav">
	 
	   
 			
			
			<!-- Sign Up Form -->
	<div class="btn-group">
	  

 

				  
	</div>
<!-- /signIn -->




<!-- Sign Up Form -->
 


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
 
</ul>

<div class="tab-content col-12 " id="myTabContent">

  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    	<div class="container" >
			<div id="cori_login_alert_msg" class=" mt-3"></div>
		</div>
		
			 <img src="upload/cor_login_image.png" width="80%" height="40%">
		
		
			 <form class="mt-4 ">
			  <div class="form-group ">
				<label for="exampleDropdownFormEmail2">Email address</label>
				<input type="email" class="form-control" id="cori_email_txt" placeholder="email@example.com">
			  </div>
			  <div class="form-group">
				<label for="exampleDropdownFormPassword2">Password</label>
				<input type="password" class="form-control" id="cori_password_txt" placeholder="Password">
			  </div>
 
			  <button type="submit" id="courier_login_page_login_btn" class="btn btn-danger">Login</button>	 
  
 
 
			</form>
  </div>

</div>
</div>
  
	</div>

</body>
</html>