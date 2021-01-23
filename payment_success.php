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




 <nav class="navbar navbar-expand-lg navbar-dark  " style="background-color:#3d3d3d">
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
        <a class="nav-link" href="index.php"><i class="" data-fa-i2svg=""><svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path></svg></i>Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="" data-fa-i2svg=""><svg class="svg-inline--fa fa-th-list fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="th-list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M149.333 216v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24v-80c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zM125.333 32H24C10.745 32 0 42.745 0 56v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24zm80 448H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm-24-424v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24zm24 264H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24z"></path></svg></i> Product</a>
      </li>
    </ul>
		<!-- Search bar -->
		<ul class="nav justify-content-center mr-auto ">
		<div class="form-inline my-2 my-lg-0"> 
		<input size="50" class="form-control mr-sm-2" id="search_txt" type="search" placeholder="i'm,shopping for..." aria-label="Search">
		  <button class="btn btn-danger my-2 my-sm-0" type="submit" id="search_btn">Search</button>
		</div>
		</ul>
		
	   <ul class="navbar-nav">
	 
	   <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#customer_complain_Model"><i class="" data-fa-i2svg=""><svg class="svg-inline--fa fa-comments fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path></svg></i> Complain</a>
      </li>
 			
			
			<!-- Sign Up Form -->
	<div class="btn-group">
	  <button type="button" id="card_container_btn" class="btn btn-secondary dropdown-toggle mr-2" data-toggle="dropdown" aria-expanded="false">
		<span class="badge badge-light" id="badge">0</span> <i class="" data-fa-i2svg=""><svg class="svg-inline--fa fa-shopping-cart fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path></svg></i> Rs.<a id="nav_list_total_val">0</a>.00
	  </button>

				  
				  <div class="dropdown-menu dropdown-menu-right ">
								<div class="container">
									<div class="row  overflow-auto  shadow-sm" style="height:350px;">
								
									
											<div class="col-sm-12 col-md-10 col-md-offset-1">
												<table class="table table-hover">
													<thead style="background-color:#ff4747;padding:10px;color:white;">
														<tr>
															<th style="padding:10px;">No</th>
															<th colspan="2" style="padding:10px;">Product</th>
															<th style="padding:10px;" class="text-center">Qty</th>
															<th style="padding:10px;" class="text-center">Price</th>
												

														</tr>
														
													</thead>	
													
												
													<tbody id="all_product_list" class=""></tbody>
										
												</table>
										 

											</div>
											
									</div>
									
																<div class="container mb-2   mt-3 justify-content-center">
																<a href="cart.php" class="btn btn-primary mr-2" role="button"><i class="" data-fa-i2svg=""><svg class="svg-inline--fa fa-shopping-cart fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path></svg></i> Cart List</a>
																<a href="cart.php" class="btn btn-danger mr-2" role="button"><i class="" data-fa-i2svg=""><svg class="svg-inline--fa fa-shopping-cart fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path></svg></i> Checkout</a>
										
														
																</div>
								</div>
				</div>
	</div>
<!-- /signIn -->




<!-- dropdown -->
<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="" data-fa-i2svg=""><svg class="svg-inline--fa fa-user fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg></i> ANSAF <!--nav bar name / login user fname-->
  </button>
  <div class="dropdown-menu dropdown-menu-right">
     <button class="dropdown-item   btn btn-light " onclick="window.location='cart.php'" type="button">Cart List <span class="badge badge-primary" id="badge_in_nave_manue">0</span> </button>
    <button class="dropdown-item   btn btn-light " onclick="window.location='my_orders.php'" type="button">My orders  <span class="badge badge-primary" id="orders_badge_in_nave_manue">0</span> </button>
    <button class="dropdown-item   btn btn-light" type="button" data-toggle="modal" data-target="#chanepasswordModel">Change Password</button>
	<button class="dropdown-item btn btn-light" onclick="window.location='logout.php'" type="button">Logout</button> <!-- login session reset-->
  </div>
</div>
<!-- /dropdown -->





	
	<!-- Button trigger modal -->




	</ul>
	  </div>
	  
	  
	</nav>



	
<div class="container mt-5"><br><br>
<div class="row  justify-content-center">
<div class="alert alert-light">
  <h4 class="alert-heading text-center text-black">Thank you!</h4>
    <div><center><img class="d-block w-60 " src="admin/upload/correct.png" height="150px"  alt="Third slide"></center></div>
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
	
									$sql = "INSERT INTO `online_tran_tbl`(`payment_id`,transaction_id,transaction_date) VALUES ($payment_id,12345,'$today')";
									mysqli_query($con,$sql);
										
								}
							
						
				?>
  <?php include "footer.php" ?>
</body>
</html>