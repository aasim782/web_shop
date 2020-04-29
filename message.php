<!doctype html>
<?php session_start();
	if(!isset($_SESSION['cusid'])) //user loged or not check through the session
	{
		header("location:index.php");	 //access page
	}
		
	
	include "bank_deposit.php";
 ?>
<html lang="en">
  <head>
  <?php include "customer_reg.php"; ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.js?i=19"></script>
    <script src="js/popper.min.js?i=19"></script>
    <script src="js/bootstrap.min.js?i=19"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css?i=19">
	<script src="js/all.js?i=19" data-auto-replace-svg="nest"></script>
	<script src="prg_main.js?i=19" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="css/all.css?i=19">
    <title>Dress Line</title>
  </head>
  <body>
  


  
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info" >
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
        <a class="nav-link" href="profile.php"><i class="fas fa-home"></i>Home </a>
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
	 <li class="nav-item active">
        <a class="nav-link" href="#" ><i class="fas fa-search"></i> Tracking</a>
      </li>
	   <li class="nav-item active" >
        <a class="nav-link" href="#" data-toggle="modal" data-target="#customer_complain_Model"><i class="fas fa-star"></i> Complain</a>
      </li>
 			




<!-- dropdown -->
<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	Hi, <?php echo $_SESSION['cus_fname'];?> <!--nav bar name / login user fname-->
  </button>
  <div class="dropdown-menu dropdown-menu-right">
     <button class="dropdown-item   btn btn-light " onclick="window.location='cart.php'" type="button">Cart List</button>
    <button class="dropdown-item   btn btn-light " onclick="window.location='my_orders.php'" type="button">My orders</button>
    <button class="dropdown-item   btn btn-light" type="button">Change Password</button>
	<button class="dropdown-item btn btn-light" onclick="window.location='logout.php'"  type="button">Logout</button> <!-- login session reset-->
  </div>
</div>
<!-- /dropdown -->




	
	<!-- Button trigger modal -->




	</ul>
	  </div>
	  
	  
	</nav>
<!-- /navbar -->
	
	<div class="container col-10 mt-4">
	<div id="ord_msg"></div>

  <!-- Page Content -->
				<div class="card ">
				  <div class="card-header " style="background-color:#ff4747;"><i class="fa fa-shopping-cart"></i> My orders</div>
				  <div class="card-body">
				

<div class="container">
  <div class="row">
    <div class="col-3">
   	<ul class="list-group">
		  <li class="list-group-item active">Orders</li>
		  <li class="list-group-item"><a  href="my_orders.php" >All orders</a></li>
		  <li class="list-group-item">Tracking</li>
		  <li class="list-group-item" > <a  href="#" data-toggle="modal" data-target="#customer_complain_Model" >Complain</a></li>
		  <li class="list-group-item">Vestibulum at eros</li>
		</ul>
    </div>
    <div class="col-sm mr-2">
    	<div class="container ">
			  <div  id="my_order_lists"></div>


							<div class="card">
  <h5 class="card-header text-center">Message Ceneter</h5>
  <div class="card-body">
    <h5 class="card-title">MOHAMED</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
 <p class="card-text"><small class="text-muted">2020/12/02 10:10:10 AM </small></p>
  </div>
  	  <div class="card-footer">  
	  	  
	  
	  <form class="form-inline">
  <div class="form-group mx-sm-4 mb-2">
   
	  <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Message">
  </div>
  <button type="submit" class="btn btn-danger mb-2">Send</button>
</form>
	  
	  </div>
	  
	  
	  

</div>
					

				  </div>
    </div>

  </div>
</div>
				  
				  
				  
				  
				  
				  
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
	
</body>
</html>