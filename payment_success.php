<!doctype html>

<?php session_start();
	if(!isset($_SESSION['cusid']))
	{
		header("location:index.php");	
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
	<script src="js/jquery.js?i=13"></script>
    <script src="js/popper.min.js?i=13"></script>
    <script src="js/bootstrap.min.js?i=13"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css?i=13">
	<script src="js/all.js?i=13" data-auto-replace-svg="nest"></script>
	<script src="prg_main.js?i=13" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="css/all.css?i=13">
    <title>Dress Line</title>
  </head>
  <body>
<!-- Image and text -->




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
        <a class="nav-link" href="#" ><i class="fas fa-search"></i>Tracking</a>
      </li>
	   <li class="nav-item active" >
        <a class="nav-link" href="#"><i class="fas fa-star"></i>Complain</a>
      </li>
 			
			
			<!-- Sign Up Form -->
	<div class="btn-group" >
	  <button type="button" id="card_container_btn" class="btn btn-secondary dropdown-toggle mr-2" data-toggle="dropdown" aria-expanded="false">
		<i class="fas fa-shopping-cart"></i>Cart<span class="badge" id='badge'>0</span>
	  </button>

				  
				  <div class="dropdown-menu dropdown-menu-right ">
								<div class="container">
									<div class="row">
								
									
											<div class="col-sm-12 col-md-10 col-md-offset-1">
												<table class="table table-hover">
													<thead  style='background-color:#ff4747;padding:10px;color:white;'>
														<tr>
															<th style='padding:10px;'>No</th>
															<th colspan="2" style='padding:10px;'>Product</th>
															<th style='padding:10px;' class="text-center">Quantity</th>
															<th style='padding:10px;' class="text-center">Price</th>
												

														</tr>
														
													</thead>	
													
												
													<tbody id="all_product_list">			
											
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
															  <img class="d-block w-100" height="50px" width="10px" src="prg_img/man_Shirt.jpg" alt="Third slide">
															</td>
															<td class="col-sm-1 col-md-1 text-center"><strong>Rs.400.87</strong></td>
														</tr>

													-->
														
													
													</tbody>
												</table>
											</div>
											
											
									</div>
									
								</div>
				</div>
	</div>
<!-- /signIn -->




<!-- Sign Up Form -->
<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	Hi, <?php echo $_SESSION['cus_fname'];?> <!--nav bar name / login user fname-->
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item   btn btn-light " onclick="window.location='cart.php'" type="button">Cart</button>
    <button class="dropdown-item   btn btn-light" type="button">Change Password</button>
	<button class="dropdown-item btn btn-light" onclick="window.location='logout.php'"  type="button">Logout</button> <!-- login session reset-->
  </div>
</div>
<!-- /signIn -->





	
	<!-- Button trigger modal -->




	</ul>
	  </div>
	  
	  
	</nav>




	
<div class="container mt-5"><br><br>
<div class="row  justify-content-center">
<div class="alert alert-light">
  <h4 class="alert-heading text-center text-black">Thank you!</h4>
    <div><center><img class="d-block w-60 " src="prg_img/correct.png" height="150px"  alt="Third slide"></center></div>
  <p>Hello <b><?php echo $_SESSION['cus_fname'];?></b> your payment process successfully completed & your transaction id is : <b>12345</b></p>
  <hr>

							<div class="col-md-12 ">
							<div class="row  justify-content-center">
										<div class="btn-group">
										<a href="my_orders.php" class="btn btn-danger mr-2"><i class="fa fa-bars"></i> View order</a><br>
										<a href="profile.php" class="btn btn-success"><i class="fa fa-people-carry"></i> Continue Shopping</a><br>
										</div>
							</div>
							
							</div>
							
		  <hr>					
</div>
</div>
</div>

				<?php
				
						include "db_conn/config.php"; 
						$customer_id =$_SESSION['cusid'];
						
						$order_id =$_GET['order_id'];
						$today= date('Y-m-d'); //get system dates
						
						 
							$sql = "update customer_ord_prds set payment_status=1 where customer_id= '$customer_id' && order_id = '$order_id' ";
							mysqli_query($con,$sql);
							
							$sql = "INSERT INTO `payment_tbl`(`order_id`, `payment_date`, `paymen_catg`) VALUES ('$order_id','$today','1')";
						
								
								if(	mysqli_query($con,$sql))
								{
									
										$sql = "SELECT payment_id FROM payment_tbl WHERE order_id = '$order_id'" ;
										$check_query = mysqli_query($con,$sql);
										$row = mysqli_fetch_array($check_query);
											$payment_id = $row["payment_id"];
	
									$sql = "INSERT INTO `online_tran_tbl`(`payment_id`) VALUES ($payment_id)";
									mysqli_query($con,$sql);
										
								}
							
						
				?>

</body>
</html>