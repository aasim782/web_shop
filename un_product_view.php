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
        <a class="nav-link" href="#"><i class="fas fa-home"></i>Home </a>
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
        <a class="nav-link" href="#"><i class="fas fa-star"></i>Feedback</a>
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




<!-- Sign Up Form -->

	 <li class="nav-item active">
        <a class="nav-link" href="login.php"><i class="fas fa-user"></i> Login</a>
      </li>


<!-- /signIn -->





	
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
		
	<!--
	<div class="card">
  <div class="card-body shadow-sm ">
  
  
  <div class="container">
  <div class="row">
    <div class="col-4">
       <img  class='thumbnail zoom card-img-bottom text-center  ' src='prg_img/samsung_a50.jpg '   style='padding-top:10px;padding-bottom:10px;width:190px;height:250px'/><br>		
 
 		
    </div>
    <div class="col-sm">
   	  <div class=" col-sm row  rounded ml-1 mb-2">
			  		  <div class="col-sm mt-3 mb-2">	
					  <b>Man's Shirt</b> <p id="product_ID"></p>	<div class="justify-content-center">
					<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
					<i class='fas fa-star'></i> (120)
					</div>	   <hr>
 
  <div class="row">
    <div class="col-sm">
     <p  ><b> Category </b> : sdasdsadasdada </p> 
    </div>
    <div class="col-sm">
	<p ><b> Brand  </b>: asdsadassdav</p> 
    </div>
  </div>
 
					
	 <div class="row">
    <div class="col-sm">
		<p >  <b>Price </b> : Rs.20000.00</p>

    </div>
  </div>		
  
  					
	 <div class="row ">	 
   <div class=" ml-3 pt-1 ">
		 <b> Qty :</b> 
 
    </div>

  <div class="col-3 text-left"> 
	 	 <input type='number'  class='form-control text-center qty '  maxlength="4" size="4"  > 
    </div>
  </div>
  
  
  	 <div class="row mt-3">	 
 
	 <div class="col-sm"> 
	  <p class="text-success"  >In Stock</p>   
    </div>
 
  </div>
					
			  <div class="col-sm">


    </div>		
					
				  
			
				  
				   
				 
		<div class="col-4">

		</div>
				   <p><b>Delivery within 24 hours</b></p> 
				   
		 <button class='btn btn-danger btn-sm mt-2 mb-2'  style='padding-bottom:10px;padding-top:10px' pid='$product_id'  id='particular_product_btn'  ><i class='fa fa-shopping-cart'></i> Add to cart </button>        
			 
	 
 
				</div>
	
			</div>
    </div>
 
  </div>
</div>


     
  
		</div>
 
				  </div>
				  -->
				 </div>
				</div>	
				
				
					 <div class="col justify-content-center text-center" id="recomended_prd_list_right"></div>

	<!--  recomended_prd_list_right ">
	<div class="col justify-content-center text-center">
 <b align="center" >Recomended</b>
   <img  class='card-img-bottom text-center border mt-2' src='prg_img/samsung_a50.jpg '   style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/><label style="color:brown;"> <b>Rs.1500.00</b></label><br>		
   <img  class='card-img-bottom text-center border mt-2' src='prg_img/samsung_a50.jpg '   style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/><label style="color:brown;"> <b>Rs.1500.00</b> </label><br>		
   <img  class='card-img-bottom text-center border mt-2' src='prg_img/samsung_a50.jpg '   style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/><label style="color:brown;"> <b>Rs.1500.00</b> </label><br>		
 		
 
    </div>-->
	
	
    </div>
	<div class="row mt-3">
	
	  <div class="col ">
  <div class="col justify-content-center text-center" id="recomended_prd_list_left"></div>
		 <!--
    <div class="col justify-content-center text-center ">
 <b align="center" >Recomended</b>
   <img  class='card-img-bottom text-center border mt-2' src='prg_img/asuslap.png '   style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/><label style="color:brown;"> <b>Rs.1500.00</b> </label><br>		
   <img  class='card-img-bottom text-center border mt-2' src='prg_img/asuslap.png '   style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/><label style="color:brown;"> <b>Rs.1500.00</b> </label><br>		
   <img  class='card-img-bottom text-center border mt-2' src='prg_img/asuslap.png '   style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/><label style="color:brown;"> <b>Rs.1500.00</b> </label><br>		
   <img  class='card-img-bottom text-center border mt-2' src='prg_img/asuslap.png '   style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/><label style="color:brown;"> <b>Rs.1500.00</b> </label><br>		
 
    </div>
	
	-->
		 
		</div>
	
	
	    <div class="col-10 border">	 
   <nav class="mt-3">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">OverView</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Customer Reviews</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div id="prd_dec_details" class="m-3"> </div> 
  </div>
  
  <div class="tab-pane fade  mt-4  " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <a  class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">  DIYAMANTHI ATHAUDAHETTI
	  
					<div class="justify-content-center">
					<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
					<i class='fas fa-star'></i>
					</div></h5>

      <small>3 days ago</small>
    </div>
    <p class="mb-1">
		The product is good and compatible, tested with my Mix 2S and Huawei P20 successfully. The materials with which it is built are similar to the original brand product. It only has one defect, it works 100% for hands-free only in a sense of the connection that is whether you insert it to the phone in a sense works, if you turn him around, not so it's not 100% reversible. The shipment was very fast, then in less than a month.</p>
    <small>Donec id elit non mi porta.</small>
  </a>
 
 
    <a  class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">  DIYAMANTHI ATHAUDAHETTI
	  
					<div class="justify-content-center">
					<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
					<i class='fas fa-star'></i>
					</div></h5>

      <small>3 days ago</small>
    </div>
    <p class="mb-1">
		The product is good and compatible, tested with my Mix 2S and Huawei P20 successfully. The materials with which it is built are similar to the original brand product. It only has one defect, it works 100% for hands-free only in a sense of the connection that is whether you insert it to the phone in a sense works, if you turn him around, not so it's not 100% reversible. The shipment was very fast, then in less than a month.</p>
    <small>Donec id elit non mi porta.</small>
  </a>
  
  
     <a  class="list-group-item list-group-item-action flex-column align-items-start  ">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">  DIYAMANTHI ATHAUDAHETTI
	  
					<div class="justify-content-center">
					<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
					<i class='fas fa-star'></i>
					</div></h5>

      <small>3 days ago</small>
    </div>
    <p class="mb-1">
		The product is hands-free only in a sense of the connection that is whether you insert it to the phone in a sense works, if you turn him around, not so it's not 100% reversible. The shipment was very fast, then in less than a month.</p>
    <img  class='card-img-bottom text-center border mt-2' src='prg_img/samsung_a50.jpg '   style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/>
 <img  class='card-img-bottom text-center border mt-2' src='prg_img/samsung_a50.jpg '   style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/>
 <img  class='card-img-bottom text-center border mt-2' src='prg_img/samsung_a50.jpg '   style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/>
 
  </a>
  
 
  
     <a  class="list-group-item list-group-item-action flex-column align-items-start  ">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">  DIYAMANTHI ATHAUDAHETTI
	  
					<div class="justify-content-center">
					<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
					<i class='fas fa-star'></i>
					</div></h5>

      <small>3 days ago</small>
    </div>
    <p class="mb-1">
		The product is good and   the connection that is whether you insert it to the phone in a sense works, if you turn him around, not so it's not 100% reversible. The shipment was very fast, then in less than a month.</p>
    <small>Donec id elit non mi porta.</small>
  </a> 
  
     <a  class="list-group-item list-group-item-action flex-column align-items-start  ">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">  DIYAMANTHI ATHAUDAHETTI
	  
					<div class="justify-content-center">
					<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
					<i class='fas fa-star'></i>
					</div></h5>

      <small>3 days ago</small>
    </div>
    <p class="mb-1">
		The product is good and compatible, tested with my Mix 2S and Huawei P20 successfully. The materials with which it is built are similar to the original brand product. It only has one defect, it works 100% for hands-free only in a sense of the connection that is whether you insert it to the phone in a sense works, if you turn him around, not so it's not 100% reversible. The shipment was very fast, then in less than a month.</p>
    <small>Donec id elit non mi porta.</small>
  </a>
  
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
</div>
		 
		 
		</div>
		  
    </div>
				
				
 
 
</body>
</html>