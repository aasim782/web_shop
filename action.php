<?php
session_start();
//database connection
include "db_conn/config.php"; 

//left side category list 
if(isset($_POST["category"])){
	@$customer_id = $_SESSION['cusid'] ;	
	$category_query = "SELECT * FROM category_tbl where active=1";
	$run_query = mysqli_query($con,$category_query);
	
	echo "<a href='#' class='list-group-item list-group-item-action ' style='color:white;background-color:#FF4747;' >
	<h5><i class='fas fa-th-list' ></i>&nbspAll Categories</h5></a>";

	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query))
		{
			$cid = $row["category_id"];
			$cat_name = $row["category_name"];
			echo "
			<a href='#' id='category' class='list-group-item list-group-item-action' cid='$cid'>$cat_name</a>		
			";
		}
		 
		if($customer_id=='')
		{
			echo " <a href='#' class='list-group-item list-group-item-action' data-toggle='modal' data-target='#customer_login_model'  >Customs Order &nbsp <i class='fas fa-box-open'></i></a>";
		}
		else
		{
			echo " <a href='#' class='list-group-item list-group-item-action' data-toggle='modal' data-target='#customes_order'  >Customs Order  &nbsp <i class='fas fa-box-open'></i> </a>";
		}
			
	}
}





if(isset($_POST["filter_category_list_item"])){
		$category_query = "SELECT * FROM category_tbl where active=1";
	$run_query = mysqli_query($con,$category_query);
		if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query))
		{
			$cid = $row["category_id"];
			$cat_name = $row["category_name"];
			echo "
			<button id='category' cid='$cid' class='dropdown-item' type='button'>$cat_name</button>			
			";
		}
		
	}
	
}


//left side brand list 
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brand_tbl where active=1 ";
	$run_query = mysqli_query($con,$brand_query);
	
	echo "<a href='#' class='list-group-item list-group-item-action ' style='color:white;background-color:#FF4747;'>
	<h5><i class='fas fa-tags' ></i>&nbspAll Brands</h5>
	</a>";

	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query))
		{
			$brand_id = $row["brand_id"];
			$brand_name = $row["brand_name"];
			echo "
			<a href='#' id='brand' class='list-group-item list-group-item-action' bid='$brand_id'>$brand_name</a>
			";
		}
	}
}

//define a footer number
if(isset($_POST["page_footer_num"])){
	
	$sql = "SELECT * FROM product_tbl where active=1";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno=ceil($count/9); //rouded 
	for($i=1;$i<=$pageno;$i++)
	{
			echo "<li class='page-item'><a class='page-link' href='#' page='$i' id='page'>$i</a></li>";
	}
}



//all product without filter creiteria
if(isset($_POST["product"])){
	@$customer_id = $_SESSION['cusid'] ;
	$page_number_limit=9; //per page have 9 products
	
	if(isset($_POST["setpagenumber"])){
		
		$pageno=$_POST["pagenumber"];
		$start=($pageno*$page_number_limit)-$page_number_limit;
	}
	else
	{
		$start=0;
	}
	
	
	$product_query = "SELECT * FROM product_tbl where active=1 LIMIT $start,$page_number_limit  ";
	$run_query = mysqli_query($con,$product_query);


	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query))
		{
			$product_id = $row["product_id"];
			$product_category = $row["product_category"];
			$product_brand = $row["product_brand"];
			$product_name = $row["product_name"];
			$product_price = $row["product_price"];
			$product_desc = $row["product_desc"];
			$product_img = $row["product_img"];
			$product_total_qty = $row["product_total_qty"];
			echo "
			     <div class='col-lg-4 col-sm-12 col-md-6 mb-3'>
            <div class='card shadow-sm'> 
			<div class='card-header' style='font-size:15px;background-color:#f5f5f5'> <b style='cursor: pointer;' id='particular_product_search_btn' session_val='$customer_id'   pid='$product_id'>$product_name</b>
			
		<button type='button' id='particular_product_search_btn' session_val='$customer_id'  pid='$product_id' style='float:right;' class='btn btn-warning'><i class='fas fa-search' ></i></button>
					<div style='padding-top:1px;' >
					
					";
						//getting rating values
					$rating_sql="SELECT  max(comments_tbl.rating) AS max_rate FROM product_tbl,comments_tbl where comments_tbl.product_id=$product_id";
							 $run_query_rating = mysqli_query($con,$rating_sql);
							 $count_prd=mysqli_num_rows($run_query_rating);
							 $row_rating = mysqli_fetch_array($run_query_rating);
						

							if($count_prd>0)
							{
								$max_rate=$row_rating["max_rate"];
							}
							else
							{
								$max_rate=0;
							}
							
							
							
							
					for($x=1;$x<=$max_rate;$x++)
					{
						 echo "<i class='fas fa-star ' style='color:orange'></i>";
						 if($x ==$max_rate)
							{ 
									for($y=$x;$y<5;$y++)
									{
										 echo "<i class='fas fa-star ' ></i>";
											 
									}
								
							}
							 
					}  
					
					echo "  
					
					</div>
			</div>
			
		   <div class='text-center' >
			<img  class='card-img-bottom text-center '  id='particular_product_search_btn'  session_val='$customer_id'  pid='$product_id' src='admin/upload/Product_images/$product_img' align='center' style='cursor: pointer;padding-top:10px;padding-bottom:10px;width:120px;height:160px'/><br>		
			</div>
         
    <div class='form-group row justify-content-center'>

        <label   class='p-1'>QTY :</label>
        <div class='col-sm-4'>
            <input type='number' class='form-control text-center ' min='1' size='2' step='1' oninput='validity.valid||(value = '' );' session_val='$customer_id'  pid='$product_id' value='1'  id='qty-$product_id' >
		</div>
		</div>
	<button class='btn btn-danger btn-sm' style='padding-bottom:10px;padding-top:10px' session_val='$customer_id'  pid='$product_id'  id='particular_product_btn'  ><i class='fa fa-shopping-cart'></i> Add to cart </button>        
	<div class='text-center pt-1' style='background-color:#fffff;'><label for='class_type' ><h4><span class=' label label-primary' align='center'>&nbsp Rs.$product_price.00 &nbsp </span></h4></label>	</div>
			</div>
            </div>
          </div>
         
			";
		}
	}
}
//  pid='$product_id' -- defind for when the user click any prd that prd id will get 
//id='this_product_btn' -- defind for particular product button /products button /add to card button





//Get the product through category,brand or search button
if(isset($_POST["get_selected_category"]) || isset($_POST["get_selected_brand"]) || isset($_POST["get_search"])){
@$customer_id = $_SESSION['cusid'] ;
	$page_number_limit=9; //per page have 9 products
	
	if(isset($_POST["setpagenumber"])){
		
		$pageno=$_POST["pagenumber"];
		$start=($pageno*$page_number_limit)-$page_number_limit;
	}
	else
	{
		$start=0;
	}
	
	 
	 
	if(isset($_POST["get_selected_category"])) //when we search through the category
	{	
	
		$selected_cid = $_POST["selected_cid"];
		$query = "SELECT * FROM product_tbl where active=1 and  product_category='$selected_cid'  LIMIT $start,$page_number_limit ";
  
 
		//verify category as active or in active
		$category_verify_query = "SELECT * FROM category_tbl where category_id=$selected_cid and active=1";
		$category_run_query = mysqli_query($con,$category_verify_query);
		$category_verify_val = mysqli_num_rows($category_run_query);
		 
		//if it is inactive auto refresh
		if($category_verify_val <= 0)
		 {	
		
			 echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#category_not_available_msg_model').modal('show');
					      setTimeout(function(){// wait for 2 secs
							   location.reload(); // then reload the page.
						  }, 2000); 
						
						
						 product_longer_available_msg();
						function product_longer_available_msg(){
						$('.card-body').html('<center>Sorry, this category is no longer available</center>');
						}
						  
						});
						 
						</script>
						";
			
		 }
	  
		 
	}
	else if(isset($_POST["get_selected_brand"]))    //when we search through the brand
	{ 
	
	 
		$selected_bid = $_POST["selected_bid"];
		$query = "SELECT * FROM product_tbl where active=1 and  product_brand='$selected_bid' LIMIT $start,$page_number_limit  ";
	
	
		//verify category as active or in active
		$brand_verify_query = "SELECT * FROM brand_tbl where brand_id=$selected_bid and active=1";
		$brand_run_query = mysqli_query($con,$brand_verify_query);
		$brand_verify_val = mysqli_num_rows($brand_run_query);
		 
		//if it is inactive auto refresh
		if($brand_verify_val <= 0)
		 {	
		
			 echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#brand_not_available_msg_model').modal('show');
					      setTimeout(function(){// wait for 2 secs
							   location.reload(); // then reload the page.
						  }, 2000); 
						
						
						 product_longer_available_msg();
						function product_longer_available_msg(){
						$('.card-body').html('<center>Sorry, this brand is no longer available</center>');
						}
						  
						});
						 
						</script>
						";
			
		 }
	
	
	}
	
	else    // get search
	{ 
		$selected_keywords = $_POST["keywords"];
		$query = "SELECT * FROM product_tbl where active=1 and product_keywords LIKE '%$selected_keywords%' LIMIT $start,$page_number_limit ";
	 
	}


//get search
	$run_query = mysqli_query($con,$query);
	while($row = mysqli_fetch_array($run_query))
		{
			$product_id = $row["product_id"];
			$product_category = $row["product_category"];
			$product_brand = $row["product_brand"];
			$product_name = $row["product_name"];
			$product_price = $row["product_price"];
			$product_desc = $row["product_desc"];
			$product_img = $row["product_img"];
			$product_total_qty = $row["product_total_qty"];
			echo "
		 
			 <div class='col-lg-4 col-sm-12 col-md-6 mb-3'>
            <div class='  card shadow-sm'> 
			<div class='card-header' style='font-size:15px;background-color:#f5f5f5'> <b style='cursor: pointer;' id='particular_product_search_btn' session_val='$customer_id'  pid='$product_id'>$product_name</b>
			
		<button type='button' id='particular_product_search_btn' pid='$product_id' session_val='$customer_id'  style='float:right;' class='btn btn-warning'><i class='fas fa-search' ></i></button>
					<div style='padding-top:1px;' >
					
					
					
					";
						//getting rating values
					$rating_sql="SELECT  max(comments_tbl.rating) AS max_rate FROM product_tbl,comments_tbl where comments_tbl.product_id=$product_id";
							 $run_query_rating = mysqli_query($con,$rating_sql);
							 $count_prd=mysqli_num_rows($run_query_rating);
							 $row_rating = mysqli_fetch_array($run_query_rating);
						

							if($count_prd>0)
							{
								$max_rate=$row_rating["max_rate"];
							}
							else
							{
								$max_rate=0;
							}
							
							
							
							
					for($x=1;$x<=$max_rate;$x++)
					{
						 echo "<i class='fas fa-star ' style='color:orange'></i>";
						 if($x ==$max_rate)
							{ 
									for($y=$x;$y<5;$y++)
									{
										 echo "<i class='fas fa-star ' ></i>";
											 
									}
								
							}
							 
					}  
					
					echo "  
					
					
					
					
					
					
					</div>
			</div>
			
		   <div class='text-center' >
			<img  class='card-img-bottom text-center ' pid='$product_id' session_val='$customer_id'  id='particular_product_search_btn' src='admin/upload/Product_images/$product_img' align='center' style='cursor: pointer;padding-top:10px;padding-bottom:10px;width:120px;height:160px'/><br>		
			</div>
         
    <div class='form-group row justify-content-center'>

        <label for='inputPassword' class='p-1'>QTY :</label>
        <div class='col-sm-4'>
            <input type='number' class='form-control text-center' min='1' step='1' oninput=validity.valid||(value='1'); size='2' pid='$product_id' value='1'  id='qty-$product_id' >
		</div>
		</div>
	<button class='btn btn-danger btn-sm' style='padding-bottom:10px;padding-top:10px' pid='$product_id'  id='particular_product_btn'  ><i class='fa fa-shopping-cart'></i> Add to cart </button>        
	<div class='text-center pt-1' style='background-color:#fffff;'><label for='class_type' ><h4><span class=' label label-primary' align='center'>&nbsp Rs.$product_price.00 &nbsp </span></h4></label>	</div>
			</div>
            </div>
          </div>
			";
		}
		
	
	 	//no such a category product
				if(mysqli_num_rows($run_query)==0)
				{
					
					
							if(!isset($_SESSION['cusid']))
									{
										
										  echo "<div class='container text-center'>
													<div class='alert alert-info '  role='alert' >
													  <h4 class='alert-heading'>We don't have such kind of a product right now.!</h4>
													  <p>We are sorry to say that we don't have such a product.!</p>
													  <p  >You can make a request here for your need </p>
													  <button class='btn btn-danger mt-2'  data-toggle='modal' data-target='#customer_login_model' ><i class='fa fa-shopping-cart'></i> CLICK HERE</button>  </p>
													</div> 
													</div> 
											";
										
									}
									else
									{
										
										 echo "
											<div class='container text-center'>
												<div class='alert alert-info '  role='alert' >
												  <h4 class='alert-heading'>We don't have such kind of a product right now.!</h4>
												  <p>We are sorry to say that we don't have such a product.!</p>
												  <p  >You can make a request here for your need </p>
												  <button class='btn btn-danger mt-2'  data-toggle='modal' data-target='#customes_order' ><i class='fa fa-shopping-cart'></i> CLICK HERE</button>  </p>
												</div> 
												</div> 
												";
										
									}
		
		
				
				 
			
			
		}
	

	
	
	}
	
	 

		
 //Customer Registration
if(isset($_POST["cus_reg"])){
		$fname = $_POST["fname"];
		$lname= $_POST["lname"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$password = $_POST["passwords"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$postal = $_POST["postal"];



	 //existing email address in our database
	$sql = "SELECT customer_id FROM customer_tbl WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	
	
	if($count_email > 0){
		echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' 
		data-auto-dismiss><strong>$email is already registered</strong> <button type='button' 
		class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
		exit();
	} 
	else {
		$password = md5($password);// password encryption
		$sql = "INSERT INTO `customer_tbl` 
		(`customer_id`, `first_name`, `last_name`, `email`, 
		`password`, `phone`,`address`,`city`, `postal`) 
		VALUES (NULL, '$fname', '$lname', '$email', 
		'$password', '$phone', '$address', '$city','$postal')";
		
		$run_query = mysqli_query($con,$sql);
		if($run_query){
		
		echo "<div class='alert alert-success alert-dismissible fade show' role='alert' 
		data-auto-dismiss><strong>Registered Successfully</strong> <button type='button' 
		class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		
		
		echo "<script type='text/javascript'>
			$(document).ready(function(){
			
			window.location.assign('index.php?login=0');
  		 
			});
				";		
		exit();
		}
	}
				
}


//User login  
if(isset($_POST["userLogin"])){
		$login_email = $_POST["useremail"]; //getting the useremail from Jquery
		$login_password= md5($_POST["userpassword"]);//getting the password from Jquery
	
		$sql = "SELECT * FROM customer_tbl WHERE email = '$login_email' and password='$login_password' " ;
		$check_query = mysqli_query($con,$sql);
		$count_email = mysqli_num_rows($check_query);
		if($count_email==1)
		{
				$row = mysqli_fetch_array($check_query);
				$_SESSION['cusid'] = $row['customer_id'];
				$_SESSION['cus_fname'] = $row['first_name'];
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert' 
				data-auto-dismiss><strong>Signed in Successfully</strong> <button type='button' 
				class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				echo "<script> window.location.assign('profile.php'); </script>";	
		}
		else
		{
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' 
		data-auto-dismiss>Please check your<strong> email or password</strong> <button type='button' 
		class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			
		}
}



if(isset($_POST["add_to_card"])){

	$order_id=0;
	$product_id = $_POST['product_id']; 
	$product_qty = $_POST['product_qty']; 
	
	
	//without please sign in msg
	if(!isset($_SESSION['cusid']))
	{
		
		  echo "<script type='text/javascript'>
			$(document).ready(function(){
			$('#customer_login_model').modal('show');
			});
			</script>
			";
		
	}
	else
	{
	$customer_id = $_SESSION['cusid'] ;	
	 
  
	$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and product_id='$product_id' and payment_status='0' && active=1" ;
	$check_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($check_query);
	
	
	$sql ="SELECT * FROM product_tbl WHERE product_id = '$product_id' and active=1" ;
	$check_query = mysqli_query($con,$sql);
	$count_product=mysqli_num_rows($check_query);	
				
	
		if($count>0 && $count_product>0)
		{
				echo "	<div class='alert alert-danger alert-dismissible fade show col-lg-12' role='alert'>
				  <strong>Product has been already added to the Cart..! </strong>. 'You can increase your quantity from the cart'
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				  </button>
				</div> ";
			
		}
		else
		{								
				$sql ="SELECT * FROM product_tbl WHERE product_id = '$product_id' and active=1" ;
				$check_query = mysqli_query($con,$sql);
				$count_product=mysqli_num_rows($check_query);
				
							//get the ongoing discount rate  
							$sql_discount = "SELECT  discount_rate  FROM offer_tbl where active=1" ;
							$qry_discount = mysqli_query($con,$sql_discount);
							$count_discount = mysqli_num_rows($qry_discount);		
							$discount_row = mysqli_fetch_array($qry_discount);
							
								if($count_discount>0)
								{
									$discount_rate = $discount_row["discount_rate"];
								}
								else
								{
									$discount_rate = 0;
								}
								
								
				
				if($count_product>0)
				 {
					$row = mysqli_fetch_array($check_query);
					$product_id = $row["product_id"];
					$product_price = $row["product_price"];
					
					date_default_timezone_set('Asia/Kolkata');
					//define date and time
					$today = date("Y-m-d"); // get the date
					
					$sql = "SELECT * FROM customer_ord_prds " ;
					$check_query = mysqli_query($con,$sql);
					$count = mysqli_num_rows($check_query);
				if($count==0)
				{
					
					$order_id=1; //no orders in the table - project star 1st recode order id
				}
				else
				{		//conforming the existing custormer or not
						$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' && active=1 " ;
						$check_query = mysqli_query($con,$sql);
						$row1 = mysqli_num_rows($check_query);
						
					if($row1>0)	
					{		//customer have any paid orders
						$sql = "SELECT order_id FROM customer_ord_prds WHERE customer_id = '$customer_id' and ( payment_status=0) && active=1 " ;
						$check_query = mysqli_query($con,$sql);
						$row2 = mysqli_num_rows($check_query);
				
							if($row2>0)
							{		 
							 		 //if he have same order id will appear
									while( $row2 = mysqli_fetch_array($check_query))
										{
												$order_id = $row2["order_id"];
												$sql = "UPDATE `order_tbl` SET `discount_rate`= $discount_rate WHERE order_id= $order_id";
												$check_query_discount = mysqli_query($con,$sql);
											
										
										}
									
							}
								
							else
								{	//if he haven't order id  increse by 1
									$sql = "SELECT max(order_id) as max_order_id  FROM customer_ord_prds  " ;
									$check_query = mysqli_query($con,$sql);
									$row = mysqli_num_rows($check_query);
										
									while($row = mysqli_fetch_array($check_query))
										{
												$order_id = $row["max_order_id"]+1;
										}
									
								}

					}
					else
					{			//if he totally new existing id will increase
								$sql = "SELECT max(order_id) as max_order_id FROM  customer_ord_prds " ;
								$check_query = mysqli_query($con,$sql);
								$row3 = mysqli_num_rows($check_query);
											while($row3 = mysqli_fetch_array($check_query))
										{
												
												$order_id = $row3["max_order_id"]+1;
										}
				
					}
					
			
				
				}
				
				 
				$sql ="SELECT * FROM product_tbl WHERE product_id = '$product_id' and active=1" ;
					$check_query = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($check_query);
					$product_id = $row["product_id"];
					$product_price = $row["product_price"];
					$product_total_qty = $row["product_total_qty"];
					
						
						
						 
						
						
						if($product_total_qty==0){
							echo "<div class='alert alert-danger alert-dismissible fade show col-lg-12' role='alert'>
									  Dear, Cusomer ! <strong>This product is out of stock.</strong>
									  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
									  </button>
									</div> ";
						}
						else if(($product_qty>$product_total_qty) &&  ($product_total_qty!=0))
						{
								echo "<div class='alert alert-danger alert-dismissible fade show col-lg-12' role='alert'>
									  Dear, Customer ! <strong>Right now we have only $product_total_qty in our stock in this item.</strong>
									  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
									  </button>
									</div> ";
							
						}
						else
						{
								
							$today = date("Y-m-d"); // get the date
					
					
							$sql = "SELECT * FROM  order_tbl where order_id= $order_id" ;
							$check_query1 = mysqli_query($con,$sql);
							$rows = mysqli_num_rows($check_query1);
					
					
							
						
							if($rows == 0)
							{
								$sql = "INSERT INTO `order_tbl` (`order_id`,`customer_id`,discount_rate) VALUES ($order_id,$customer_id,$discount_rate)";
								$check_query = mysqli_query($con,$sql);
							}
 
								
								$sql = "INSERT INTO `customer_ord_prds` 
								(`customer_ord_id`,`order_date`, `customer_id`, `product_id`, `order_qtry`, 
								`current_price_per_prd`,`order_id`) 
								VALUES (NULL, '$today', $customer_id , $product_id, 
								$product_qty , $product_price,$order_id)";
								
								
								
								
								$Current_qty= ($product_total_qty-$product_qty);
								
								$sql1 = "UPDATE product_tbl SET product_total_qty=$Current_qty  where  product_id=$product_id && active=1";
								 
								mysqli_query($con,$sql);
									echo "<div class='alert alert-success alert-dismissible fade show col-lg-12' role='alert'>
									  <strong>Product Successfully added to</strong> Cart..!
									  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
									  </button>
									</div> ";
									mysqli_query($con,$sql1);
								
							
							
							
						}
				
							
					}
					else
					{
						
						 echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#prodcuct_not_available_msg_model').modal('show');
					      setTimeout(function(){// wait for 5 secs(2)
							   location.reload(); // then reload the page.(3)
						  }, 2000); 
						});
						</script>
						";
					}								
			
				
				
		
		}
	}

	
	

	
}

//count the orderes for to nav badget
if(isset($_POST["cart_count"]))
{
	$customer_id = $_SESSION['cusid'] ;
			$sql ="SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and payment_status=0 && active=1" ;
					$check_query = mysqli_query($con,$sql);
					echo mysqli_num_rows($check_query);	//total row for that customer ordered without payment
	
}



//count the orderes for to nav badget
if(isset($_POST["orderd_prd_count"]))
{
	$customer_id = $_SESSION['cusid'] ;
			$sql ="SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and (payment_status=1) and (order_status=0 || order_status=1 || order_status=2) && active=1" ;
					$check_query = mysqli_query($con,$sql);
					echo mysqli_num_rows($check_query);	//total customer orded product (with different payment)
	
}


if(isset($_POST["nav_list_total"]))
{
$customer_id = $_SESSION['cusid'] ;
$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and payment_status='0' &&  active=1" ; //payment_status - 0 unpaid,1-online tra,2-bank,3-cash delivery
$check_query = mysqli_query($con,$sql);
$count = mysqli_num_rows($check_query);
	 
	$total=0;
	
			if($count>0)
				{	//used to get the customer orderd details
					while($row = mysqli_fetch_array($check_query))
						{
				 
						$current_price_per_prd = $row["current_price_per_prd"];
						$order_qtry = $row["order_qtry"];
						
						$current_total_price =  	$current_price_per_prd* $order_qtry;
						$total=$total+$current_total_price ;
						}
							echo $total;
				}
				else{
					
						echo 0;
				}
}



if(isset($_POST["get_added_products_into_card"]) || isset($_POST["card_page_list"])){
$customer_id = $_SESSION['cusid'] ;
$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and payment_status='0' && active=1" ; //payment_status - 0 unpaid,1-online tra,2-bank,3-cahone delivery
	$check_query = mysqli_query($con,$sql);
	 
	//get the offer deatils
	 
	$count = mysqli_num_rows($check_query);
	$no=1;
	$total=0;
	$Courier=0;
		if($count>0)
		{	//used to get the customer orderd details
				while($row = mysqli_fetch_array($check_query))
					{
				
						$customer_ord_id = $row["customer_ord_id"];
						$order_qtry = $row["order_qtry"];
						$customer_note = $row["customer_note"];
						$product_id = $row["product_id"];
						$current_price_per_prd = $row["current_price_per_prd"];
					
						
						$current_total_price = $current_price_per_prd* $order_qtry;
						
						$sql = "SELECT * FROM product_tbl where product_id='$product_id'" ;
						$check_query1 = mysqli_query($con,$sql);
					 
						
						
						
						//get the ongoing discount rate
						$sql_discount = "SELECT  offer_start_date,offer_end_date,discount_rate  FROM offer_tbl where active=1" ;
						$qry_discount = mysqli_query($con,$sql_discount);
						$row = mysqli_fetch_array($qry_discount);
					 	$discount_rate = $row["discount_rate"];
					 	$offer_end_date = $row["offer_end_date"];
					 	$offer_start_date = $row["offer_start_date"];
					  
		
						$today= date('Y-m-d'); //get system dates
						 
						  
						$total=$total+$current_total_price ;
								//used to get the product details
								
								
								
						//validate discount is avaiable or not
						if($offer_start_date<=$today and $today <=$offer_end_date)
						{
							$discount = round(($discount_rate/100)*$total);
						}
						else
						{
							$discount=0;
						}
			 
						
				
						
						while($row = mysqli_fetch_array($check_query1))
							{
								$product_name = $row["product_name"];
								$product_img = $row["product_img"];
								$product_weight = $row["product_weight"];
								
								
								if($product_weight =="< 1Kg")
								{
									$courier_price=300;
									$Courier=$Courier+$courier_price; 
								}
								else if($product_weight =="2Kg - 3Kg")
								{
										$courier_price=500;
										$Courier=$Courier+$courier_price; 
								}
								else if($product_weight == "4Kg  - 5Kg ")
								{
										$courier_price=700;
										$Courier=$Courier+$courier_price; 
								}
								else if($product_weight == "6Kg - 10Kg")
								{
										$courier_price=900;
										$Courier=$Courier+$courier_price; 
								}
								else if($product_weight == "11Kg - 20Kg" )
								{
										$courier_price=1200;
										$Courier=$Courier+$courier_price; 
								}
								else if($product_weight == "21Kg - 30Kg" )
								{
										$courier_price=1500;
										$Courier=$Courier+$courier_price; 
									
								}else if($product_weight ==" 31Kg - 50Kg ")
								{
										$courier_price=2500;
										$Courier=$Courier+$courier_price; 
								}
								else if($product_weight == "51Kg < 100Kg" )
								{
										$courier_price=3500;
										$Courier=$Courier+$courier_price; 
								}
								else if($product_weight ==" 101Kg < Up" )
								{
										$courier_price=5000;
										$Courier=$Courier+$courier_price; 
								}
								 
							 	$final_total= round($total+$Courier)-$discount;
								
									if(isset($_POST["get_added_products_into_card"]))
								{
									
														echo "<tr style='cursor: pointer;' id='card_page_view_url'>
															<th class='col-2'>$no</th>
																<td><img height='50px' width='50px' src='admin/upload/Product_images/$product_img' alt='Third slide'></td>
																<td style='width: 30%'><label style='cursor: pointer;'  >$product_name</label></td>
															<td class='col-sm-1 col-md-1 text-center'><strong>$order_qtry</strong></td>
															<td class='col-sm-1 col-md-1 text-center'><strong>Rs.$current_total_price.00</strong></td>
															</tr> 
															";
								
								}			
															
								
								
									
							else{
											
											echo " <div class='row mb-2 mt-4'>
														<div class='col-md-1 text-center'><b>$no.</b></div>
														<div class='col-md-3'><img height='55px' class='mr-3' width='55px' src='admin/upload/Product_images/$product_img' >$product_name
														
														 
																<textarea class='form-control mt-2 note' id='note-$product_id'   pid='$product_id'     name='customer_note' rows='2' size='4'  placeholder='Note...'>$customer_note</textarea>
														  
														</div>
												 
														<div class='col-md-1  '>	
												
														<input type='number'  min='1' step='1' oninput=validity.valid||(value='1');   class='form-control text-center qty ' id='qty-$product_id' pid='$product_id'  value='$order_qtry'>
														
														</div>	
														
														<div class='col-md-2 text-center'><b> Rs&nbsp<label pid='$product_id' id='price-$product_id' class='price'>$current_price_per_prd</label>.00</b></div>
														
														<div class='col-md-2 text-center total'><b> Rs&nbsp<label id='total-$product_id' pid='$product_id' class='total'>$current_total_price</label>.00</b></div>
														<div class='col-md-2 text-center'>
																	<div class='btn-group '>
																	<a href='' update_id='$product_id' class='btn btn-info update'><i class='fa fa-check-circle'></i></a>
																	<a href='' remove_id='$product_id' class='btn btn-danger remove'><i class='fa fa-trash-alt'></i></a>
																	</div>
															
																</div>
											 
														
																
														</div>
														<hr>";
														
											
							
						}
								
						$no=$no+1;
					
					}
				
				
			
					
					}
					
					
						if(isset($_POST["card_page_list"])){
							
							
						$sql = "SELECT * FROM customer_tbl WHERE customer_id = '$customer_id'  " ;
						$check_query = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($check_query))
					{
						$first_name = $row["first_name"];
						$last_name = $row["last_name"];
						$phone = $row["phone"];
						$email = $row["email"];
						$address = $row["address"];
						$city = $row["city"];
						$postal = $row["postal"];
						
						
					$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and payment_status=0 && active=1" ;
						$check_query = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($check_query))
						{
							$order_id = $row["order_id"];
						}
				
					}
				
				
				
				
							
										//check out button after looop
					echo "
				 
				<div class='row  ml-5'>
					<div class='col-sm-3 '> </div>
					<div class='col-sm-4'> </div>
					<div class='col-sm-2 pt-1 text-right'style='background:orange;'> Sub Total : </div>
					<div class='col-sm-2 pt-1   text-left' style='background:orange;'><b>Rs.$total.00</b></div>
				  </div>
	<div class='row  ml-5'>
					<div class='col-sm-3'> </div>
					<div class='col-sm-4'> </div>
					<div class='col-sm-2 text-right pt-1'style='background:orange;'>(-) Discount :  </div>
					<div class='col-sm-2 pt-1   text-left' style='background:orange;'><b>(Rs.$discount.00)</b></div>
				  </div>
				 	<div class='row  ml-5'>
					<div class='col-sm-3'> </div>
					<div class='col-sm-4'> </div>
					<div class='col-sm-2 pt-1 text-right'style='background:orange;'>(+) Courier chrage :  </div>
					<div class='col-sm-2 pt-1  text-left' style='background:orange;'><b>Rs.$Courier.00</b></div>
				  </div>
	
			
				<div class='row ml-5'>
					<div class='col-sm-3'> </div>
					<div class='col-sm-4'> </div>
					<div class='col-sm-2  text-right pt-1 pb-1'style='background:yellow;'><h5><b>Total :</h5> </b></div>
					<div class='col-sm-2 pt-1   text-left' style='background:yellow;'><h5><b>Rs.$final_total.00</b></h5></div>
				  </div>
				
					
				<form method='post' action='https://sandbox.payhere.lk/pay/checkout'>  
	
				<div class='row mt-3 '>
	
					<div class='col-sm-4'> </div>
					<div class='col-sm-3'> </div>
					<div class='col-sm-5 justify-content-center'>	
					<p>
				<input type='submit' class='btn btn-info' value='Visa/Master/Other'>
				  <a class='btn btn-danger' data-toggle='collapse' href='#bank_btn_clk' role='button' aria-expanded='false' aria-controls='bank_btn_clk'> Bank</a>
				  <a class='btn btn-dark' data-toggle='collapse' href='#cash_on_delivery_btn_click' role='button' aria-expanded='false' aria-controls='cash_on_delivery_btn_click'>Cash On Delivery</a>
			
				</p>
				<div class='row '>
				  <div class='col-12 justify-content-center'>
					<div class='collapse multi-collapse' id='bank_btn_clk'>
					  <div class='card card-body'>
					<div class='row ml-3 text-center  justify-content-center'><div class='sm'> Bank : </div><div class='sm'> <b> &nbsp&nbspPeoples Bank </b></div> </div>
						<div class='row ml-3  justify-content-center'><div class='sm'> Account No: </div><div class='sm'> <b>&nbsp&nbsp204200100091326 </b> </div>
					</div><br>
					Please upload a picture of your money deposited slip. Click here to upload it (Please inclued the date, time and branch). 
					<br>
					<div class='row ml-3'><b><i class='fas fa-info'></i>&nbspNote : </b><span> &nbsp&nbspYou can upload a slip for an order</span>
					</div>
						<div class='text-center m-2'><button class='btn btn-warning ' type='button'  data-toggle='modal' data-target='#bankdepModel'>Upload</button></div>
					  </div>
					</div>
					
					
					
					<div class='collapse multi-collapse' id='cash_on_delivery_btn_click'>
					  <div class='card card-body'>
						<div>Cash on delivery is only available for the products under <b>Rs.50,000.00 </b>&nbspOtherwise use bank payment or online payement. 
						</div> ";
						 
					//phone verify conform - agree button hide show 
					
					$sql_phn_veryfy ="SELECT * FROM customer_tbl WHERE customer_id = '$customer_id' && otp_verify = '1'  "  ;
					$check_query_sql_phn_veryfy = mysqli_query($con,$sql_phn_veryfy);
					 $count = mysqli_num_rows($check_query_sql_phn_veryfy);
				 
					if($count==1)
					{
							if($final_total<=50000) 
							{
								echo "<div class='text-center m-2'><input type='button' class='btn btn-warning' id='cash_on_agree_btn' value='Confirm'></div>";
					
							}
							else
							{
									echo "<div class='text-center m-2'><input type='button' class='btn btn-warning' id='cash_on_agree_btn' value='Confirm'' disabled></div>";
							}
						
					}
					else
					{
						echo "
						<div class='text-center m-2'><input type='button' class='btn btn-warning' data-toggle='modal' data-target='#OTP_verify_model' value='Phone number verify'></div>";
					}
						
						 
					
					  echo "</div>
					</div>
					
				  </div>
				 
				</div>
					
					
					</div>
					
				  </div>
	
		<input type='hidden' name='merchant_id' value='1214039'>    <!-- Replace your Merchant ID -->
		<input type='hidden' name='return_url' value='http://localhost/project37/payment_success.php'>
		<input type='hidden' name='cancel_url' value='http://localhost/project37/payment_cancel.php'>
		<input type='hidden' name='notify_url' value='http://localhost/project37/cart.php'>  
				 
		<input type='hidden' name='order_id' value='$order_id'>
		<input type='hidden' name='items' value='Dressline'><br>
		<input type='hidden' name='currency' value='LKR'>
		<input type='hidden' name='amount' value='$final_total'>  
 
		<input type='hidden' name='first_name' value='$first_name'>
		<input type='hidden' name='last_name' value='$last_name'><br>
		<input type='hidden' name='email' value='$email'>
		<input type='hidden' name='phone' value='$phone'><br>
		<input type='hidden' name='address' value='$address'>
		<input type='hidden' name='city' value='$city'>
		<input type='hidden' name='country' value='Sri Lanka'><br><br> 

																
	</form> 
												
																			
														
														";
						}
		
		
			
			
		}
	 
	
}






//delete the item from customer order before payment
if(isset($_POST["removefromcart"])){
$customer_id = $_SESSION['cusid'] ;
$new_qty = $_POST['new_qty']; //that is used for increase the qty bcz when delete the ord qty .prd qty should increse  
$remove_product_id = $_POST['remove_product_id'];

$sql1 ="SELECT * FROM product_tbl WHERE product_id = '$remove_product_id'" ;
					$check_query1 = mysqli_query($con,$sql1);
					$row1 = mysqli_fetch_array($check_query1);
					$product_total_qty = $row1["product_total_qty"];

					
 $sql = "update product_tbl set product_total_qty= ($product_total_qty+$new_qty) WHERE product_id='$remove_product_id' AND active = 1" ;
 $check_query = mysqli_query($con,$sql);
	
 $sql = "Delete FROM customer_ord_prds WHERE customer_id = '$customer_id' AND product_id='$remove_product_id' AND payment_status = 0 && active=1" ;
	$check_query = mysqli_query($con,$sql);
 

	if($check_query1 && $check_query){
		
		echo "	<div class='alert alert-danger alert-dismissible fade show col-lg-12' role='alert'>
							  <strong>Product Successfully deleted</strong> from Cart..!
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div> ";
	}
}


//update the item from customer order before payment
if(isset($_POST["updatefromcart"])){
$customer_id = $_SESSION['cusid'] ;
$update_product_id = $_POST['update_product_id'];
$new_qty = $_POST['new_qty'];
$current_product_total = $_POST['current_product_total'];
$customer_note = $_POST['customer_note'];



	$sql ="SELECT * FROM product_tbl WHERE product_id = '$update_product_id'" ;
					$check_query = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($check_query);
					$product_id = $row["product_id"];
					$product_price = $row["product_price"];
					$product_total_qty = $row["product_total_qty"];
					


	$sql ="SELECT * FROM customer_ord_prds WHERE product_id = '$update_product_id' && payment_status=0 && customer_id=$customer_id" ;
					$check_query = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($check_query);
					$order_qtry = $row["order_qtry"];
					
					
					
						$aditinal_added=$new_qty-$order_qtry;
						$final_qty_in_prd= $product_total_qty-$aditinal_added;
						
						
						
						
							//Existing Qty check
						
						if($product_total_qty==0 && $order_qtry<$new_qty){
							
								echo "<div class='alert alert-danger alert-dismissible fade show col-lg-12' role='alert'>
									  Dear, Cusomer ! <strong>This product is out of stock right now.</strong>
									  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
									  </button>
									</div> ";
							
						}	
						else if($new_qty==$order_qtry)
						{
						 $sql = "update customer_ord_prds set customer_note='$customer_note' WHERE customer_id = '$customer_id' AND product_id='$update_product_id' AND payment_status = 0" ;
							$check_query = mysqli_query($con,$sql);
								echo "<div class='alert alert-success alert-dismissible fade show col-lg-12' role='alert'>
									  Dear Customer! <strong>your order has been updated </strong>
									  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
									  </button>
									</div> ";
							
						}
						else if(($aditinal_added > $product_total_qty)   )
						{
								echo "<div class='alert alert-danger alert-dismissible fade show col-lg-12' role='alert'>
									  Dear, Cusomer ! <strong>Right now we have only $product_total_qty items in our stocks.</strong>
									  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
									  </button>
									</div> ";
							
						}
						else
						{
							
							$sql = "update customer_ord_prds set order_qtry='$new_qty', customer_note='$customer_note' WHERE customer_id = '$customer_id' AND product_id='$update_product_id' AND payment_status = 0" ;
							$check_query = mysqli_query($con,$sql);
							if($check_query){
		
									echo "	<div class='alert alert-success alert-dismissible fade show col-lg-12' role='alert'>
							  <strong>Product Quantity Successfully updated</strong> to the Cart..!
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div> ";
							
						
							 
							 
							 $sql = "update product_tbl set product_total_qty='$final_qty_in_prd' WHERE product_id='$update_product_id' AND active = 1" ;
							$check_query = mysqli_query($con,$sql);
							
							
 
							
									}
							
						}
						
				
						
						
					
					 
					
						
						
						





}


 
	
 
	
	
if(isset($_POST["myorder"]) || isset($_POST["myorder_footer_num"])){
	$total=0;
	$customer_id = $_SESSION['cusid'] ;

	 //when click the page number star end assign on order page
	$page_number_limit=5; 
	if(isset($_POST["setpagenumber"])){
		
		$pageno=$_POST["pagenumber"];
		$start=($pageno*$page_number_limit)-$page_number_limit;
	}
	else
	{
		$start=0;
	}
	
	
	
	
	 //display the order panination number
	if(isset($_POST["myorder_footer_num"]))
	{
		$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and (payment_status=1 or  payment_status=2 or payment_status=3) and !(order_status =3) && active=1" ;
		$check_query = mysqli_query($con,$sql);
 
		$count = mysqli_num_rows($check_query);
		$pageno=ceil($count/5); //rouded 
			for($i=1;$i<=$pageno;$i++)
			{
					echo "<label class='page-item'><a class='page-link' href='#' myorder_page_num='$i' id='myorder_page_num'>$i</a></label>";
			}
	}
	
	$i=	$start;
$customer_id = $_SESSION['cusid'] ;
$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and (payment_status=1 or  payment_status=2 or payment_status=3) and !(order_status=3) && active =1 limit $start,$page_number_limit" ;
$check_query = mysqli_query($con,$sql);
		if(isset($_POST["myorder"])){
	
				while($row = mysqli_fetch_array($check_query))
						{
							
							$i++;
						$customer_ord_id = $row["customer_ord_id"];
						$order_id = $row["order_id"];
						$order_date = $row["order_date"];
						$order_qtry = $row["order_qtry"];
						$product_id = $row["product_id"];
						$current_price_per_prd = $row["current_price_per_prd"];
						$customer_note = $row["customer_note"];
						$order_status = $row["order_status"];
						$current_total_price =  $current_price_per_prd* $order_qtry;
						
						$sql2 = "SELECT * FROM payment_tbl where order_id=$order_id" ;
						$check_query2 = mysqli_query($con,$sql2);
						
						
						
						
						
						while($row = mysqli_fetch_array($check_query2))
						{
							$payment_date = $row["payment_date"];
							$paymen_catg = $row["paymen_catg"];
					
						
						$sql = "SELECT * FROM product_tbl where product_id='$product_id'" ;
						$check_query1 = mysqli_query($con,$sql);
					
						$Courier=300;
						$discount=0;
						$total=$total+$current_total_price ;
								//used to get the product details
						$final_total=($total+$Courier)-$discount;
						
						while($row = mysqli_fetch_array($check_query1))
							{
								$product_name = $row["product_name"];
								$product_img = $row["product_img"];
								
							}	
							 
						}
						
						
						//order status in myorder page panding/verified
						if($order_status==0)
						{
							$payment_verify_status_veriable="<b class='text-danger'>Pending</b> ";
							
						}
						else  
						{
							$payment_verify_status_veriable="<b class='text-success'>Verified</b> ";
						
						}
						 
						
						
	echo "
				 <div class='row '>		
				<div class='row col-12 shadow-sm col-sm   border rounded ml-1 mb-3'>
				  <div class='col-12 mt-3'>
				   <div class='row '>
							<div class='col-sm'>
							  <b class='text-success'>($i)</b> Order ID : <b>$customer_ord_id</b> 
							</div>
							
							<div class='col-sm text-right'>
							OrderDate :<b> $order_date  </b> 
							</div>
						  </div>
				  </div>
				  <div>
						<img src='admin/upload/Product_images/$product_img' class='ml-2 mt-2 '  height='100px' width='100px'>
						
				</div>  
						
						
						  <div class='card-body'>
						  <div class='container'>
					 
						  <div class='row'>
							<div class='col-sm'>
							<b> $product_name</b> 
							</div>
							<div class='col-sm'>
								Payment : $payment_verify_status_veriable
							</div>
							
							<div class='col text-right'>		
							<img src='admin/upload/$paymen_catg.jpg' class='text-right'  height='40px' width='60px'>
 
							</div>
						  </div>
						  
						  
						  
						  
						  <div class='row mt-2'>
								<div class='col-sm'>
							<p class='card-text text-left'>Price : <b>Rs.$current_price_per_prd.00</b> </p>
								</div>	<div class='col-sm'>
										<p class='card-text text-center'>QTY : <b>$order_qtry</b> </p>
								</div>
								
								<div class='col-sm'>
								<p class='card-text text-right'>Total : <b>Rs.$current_total_price.00</b> </p>
								</div>	
								</div>	
							<p class='card-text mt-2 '>Note : <small><b>$customer_note</b></small></p>
							  </div>
								
				
								<div class='btn-group mt-2'>
								";
										if(!($order_status==2))
										{
											echo"<button  class='btn btn-warning mr-2 rounded disabled'><i class='fa fa-check'></i> Confirm goods Received </button>";
										}
										else
										{
											echo"<a href='' class='btn btn-warning mr-2 rounded  order_id='$order_id'  product_id='$product_id'  customer_ord_id='$customer_ord_id'  id='customer_prd_conform_btn'  data-toggle='modal'><i class='fa fa-check'></i> Confirm goods Received </a>";
										}
									  
									  echo "
										<a href='' class='btn btn-danger mr-2 rounded' order_id='$order_id'  customer_ord_id='$customer_ord_id'  id='trcking_btn' data-toggle='modal' data-target='#traking_model'><i class='fa fa-search'></i> Tracking Order </a>
										<a href='message.php' class='btn btn-dark mr-2  rounded'><i class='fa fa-sms'></i> Message</a>
					
										</div>
						  </div>
						  </div>
						</div>
	";
							
							
							}	
								
						
}
		

	
	
} 

 
 
 

	 
	
	
	
//customer change password
if(isset($_POST["chnagepassowrd"])){

	$customer_id = $_SESSION['cusid'] ;
	$old_password = md5($_POST['oldpsw']) ;
	$new_password = md5($_POST['new_psw']) ;
	
	
	$sql = "SELECT * FROM customer_tbl WHERE customer_id = '$customer_id'" ;
	$check_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($check_query);
			
				$dbpassword = $row["password"];
				if($old_password == $dbpassword )
					{
													
					$sql = "update customer_tbl set password='$new_password' WHERE customer_id = '$customer_id'" ;
					$check_query = mysqli_query($con,$sql);
						if($check_query)
						{
						echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> password changed succesfully<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
						}	
												
					}
					else
						{
													
						echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> your old password is incorrect<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
					
													
						}
									
			
	}
	


//customer can complain about ordered item 
if(isset($_POST["complain_items"])){
$customer_id = $_SESSION['cusid'] ;
//get the customer_ord_id from customer_ord_prds table *
$sql = "SELECT  customer_ord_prds.customer_ord_id,customer_ord_prds.product_id 
		FROM customer_tbl,customer_ord_prds 
		WHERE customer_tbl.customer_id = customer_ord_prds.customer_id 
		AND (customer_ord_prds.customer_id = '$customer_id' and (customer_ord_prds.payment_status=1 or  customer_ord_prds.payment_status=2 or customer_ord_prds.payment_status=3))  and !(customer_ord_prds.order_status=0 || customer_ord_prds.order_status =3 || customer_ord_prds.order_status =1)" ;
$check_query = mysqli_query($con,$sql);

	echo " <option value='null'>Please Select Order .. </option>";
			while($row = mysqli_fetch_array($check_query))
						{	$product_id = $row["product_id"];
							$customer_ord_id = $row["customer_ord_id"];
						 		
							//get the product name from product table *		
							$sql1 = "SELECT  product_tbl.product_name 
									 FROM product_tbl,customer_ord_prds 
									 WHERE (customer_ord_prds.product_id = '$product_id')  
									 AND product_tbl.product_id = customer_ord_prds.product_id " ;
							
									$check_query1 = mysqli_query($con,$sql1);	
									while($row1 = mysqli_fetch_array($check_query1))
									{
										$product_name = $row1["product_name"];
									}
									
								//option list output	
								echo " <option value='$customer_ord_id'><b>$product_name - (Order ID : $customer_ord_id)</b></option>";
								
							
						}
}



//complain msg insert in to table 
//comments type :- complain-1,Feedback-2
if(isset($_POST["complain_msg"])){
$customer_id = $_SESSION['cusid'] ;
$customer_ord_id = $_POST['customer_ord_ids'] ;
$complain_message = $_POST['complain_messages'] ;

$sql = "INSERT INTO `comments_tbl` (comments_id,customer_id,comment_type,customer_ord_id,description) VALUES (NULL, $customer_id,'1' ,$customer_ord_id, '$complain_message')";
$check_query = mysqli_query($con,$sql);

echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Complain !</strong> Successfully sent to the seller<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
						


}







//feedback msg insert in to table 
//comments type :- complain-1,Feedback-2
if(isset($_POST["feedback_msg"])){
$customer_id = $_SESSION['cusid'] ;
$feedback_message = $_POST['feedback_message'] ;

$sql = "INSERT INTO `comments_tbl` (comments_id,customer_id,comment_type,customer_ord_id,description) VALUES (NULL, $customer_id,'2','Null', '$feedback_message')";
$check_query = mysqli_query($con,$sql);
 

echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss>Sent Succesfully, Thanks for feedback us! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";


}










//bank deposit upoload process and place order
if(isset($_POST["bank_dep"])){
 //bank deposit code
		$customer_id = $_SESSION['cusid'];
		$dep_date = $_POST["dep_date"];
		$dep_time = $_POST["dep_time"];
		$branch_name = $_POST["branch_name"];	
		$dep_amount = $_POST["dep_amount"];	
		$slip_number = $_POST["slip_number"];	
	 

$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and (payment_status=0)" ;
$check_query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($check_query);
$order_id = $row["order_id"];
						
$today= date('Y-m-d'); //get system dates
  
$orderid=$order_id.".";	
		
/* Getting file name */
$filename = $_FILES['file']['name'];
 

date_default_timezone_set('Asia/Kolkata');
//define date and time
$date = date('Y-m-d_H-i-s_', time());

/* Location */
$location = "./prg_img/"."bank_slip."."/";
$uploadOk = 1;
$imageFileType = pathinfo($filename,PATHINFO_EXTENSION);


$new_file_name=$date.$orderid.$imageFileType;

/* Valid extensions */
$valid_extensions = array("jpg","jpeg","png");

/* Check file extension */
if(!in_array(strtolower($imageFileType), $valid_extensions)) {
    	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File extension not suppoted!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
}
else
{
	 
			 if($uploadOk == 0){
			     	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File not uploded!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
			}else{
			   /* Upload file */
			   if(move_uploaded_file($_FILES['file']['tmp_name'],$location.$new_file_name)){
				 
			   }else{
			     	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File not uploded!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
			
			   }
			}
				
				 
								
						 
							$sql = "update customer_ord_prds set payment_status=1 where customer_id= '$customer_id' && order_id = '$order_id' ";
							mysqli_query($con,$sql);
							
							$sql = "INSERT INTO `payment_tbl`(`order_id`, `payment_date`, `paymen_catg`) VALUES ('$order_id','$today','2')";
						 	if(	mysqli_query($con,$sql))
								{
									
										$sql = "SELECT payment_id FROM payment_tbl WHERE order_id = '$order_id'" ;
										$check_query = mysqli_query($con,$sql);
										$row = mysqli_fetch_array($check_query);
											$payment_id = $row["payment_id"];
	
								$sql = "INSERT INTO `bank_dep_tbl`(`payment_id`,`dep_date`,`dep_time`,`branch_name`,`upolod_slip_img`,`amount`,`slip_no`) VALUES ($payment_id,'$dep_date','$dep_time','$branch_name','$new_file_name',$dep_amount,'$slip_number')";
									mysqli_query($con,$sql);
									
								echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong> Your order has been completed succesfully!</strong> Please wait until the seller verifies your payment<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 
										
								}
 
	
			}	
 
}








//cash on delvery process
if(isset($_POST['cash_on_delivery']))
{
	$customer_id = $_SESSION['cusid'] ;

$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and (payment_status=0)" ;
$check_query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($check_query);
$order_id = $row["order_id"];

	 			$today= date('Y-m-d'); //get system dates
						
						 
							$sql = "update customer_ord_prds set payment_status=1 where customer_id= '$customer_id' && order_id = '$order_id' ";
							mysqli_query($con,$sql);
							
							$sql = "INSERT INTO `payment_tbl`(`order_id`, `payment_date`, `paymen_catg`) VALUES ('$order_id','$today','3')";
						 	if(	mysqli_query($con,$sql))
								{
									
										$sql = "SELECT payment_id FROM payment_tbl WHERE order_id = '$order_id'" ;
										$check_query = mysqli_query($con,$sql);
										$row = mysqli_fetch_array($check_query);
											$payment_id = $row["payment_id"];
	
								$sql = "INSERT INTO `cash_on_delivery`(`payment_id`) VALUES ($payment_id)";
								mysqli_query($con,$sql);
									
								echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong> Your order has been completed sucessfully!</strong>Please wait until seller verify your payment<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 
										
								} 
}


 //prodcuct description on page view
 if(isset($_POST['prd_dec_details_get']))
{
$product_id = $_POST["pid"];
$sql = "SELECT product_desc FROM product_tbl WHERE product_id = $product_id" ;
$check_query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($check_query);
$product_desc = $row["product_desc"];

	
	echo "$product_desc";
	
}
 
 
 
 
 
 
 
  if(isset($_POST['particular_prd_view']))

{
	
	
	$product_id = $_POST["pid"];
	$product_query = "SELECT product_tbl.product_id,product_tbl.product_name,product_tbl.product_price,product_tbl.product_desc,product_tbl.product_img,product_tbl.product_total_qty,category_tbl.category_name,brand_tbl.brand_name FROM product_tbl,category_tbl,brand_tbl where((product_tbl.product_category = category_tbl.category_id) && (product_tbl.product_brand = brand_tbl.brand_id) && (product_tbl.product_id=$product_id && product_tbl.active=1))";
	$run_query = mysqli_query($con,$product_query);
	

	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query))
		{
			$product_id = $row["product_id"];
			$category_name = $row["category_name"];
			$brand_name = $row["brand_name"];
			$product_name = $row["product_name"];
			$product_price = $row["product_price"];
			$product_desc = $row["product_desc"];
			$product_img = $row["product_img"];
			$product_total_qty = $row["product_total_qty"];
		 
 
	
	
	echo"
	 
	 <div id='show_msg'></div>
	<div class='card'>
  <div class='card-body shadow-sm   '>
  
  
  <div class='container'>
  <div class='row'>
    <div class='col-4 text-center'>
       <img class='thumbnail zoom card-img-bottom text-center  ' src='admin/upload/Product_images/$product_img' style='padding-top:10px;padding-bottom:10px;width:190px;height:250px'><br>		
 
 		
    </div>
    <div class='col-sm'>
   	  <div class=' col-sm row  rounded ml-1 mb-2'>
			  		  <div class='col-sm mt-3 mb-2'>	
					  <b>$product_name</b><div class='justify-content-center'>
					  
					  
					  
			";
						//getting rating values
					$rating_sql="SELECT  max(comments_tbl.rating) AS max_rate FROM product_tbl,comments_tbl where comments_tbl.product_id=$product_id";
							 $run_query_rating = mysqli_query($con,$rating_sql);
							 $count_prd=mysqli_num_rows($run_query_rating);
							 $row_rating = mysqli_fetch_array($run_query_rating);
						

							if($count_prd>0)
							{
								$max_rate=$row_rating["max_rate"];
							}
							else
							{
								$max_rate=0;
							}
							
							
							
							
					for($x=1;$x<=$max_rate;$x++)
					{
						 echo "<i class='fas fa-star ' style='color:orange'></i>";
						 if($x ==$max_rate)
							{ 
									for($y=$x;$y<5;$y++)
									{
										 echo "<i class='fas fa-star ' ></i>";
											 
									}
								
							}
							 
					}  
					
					echo "  
					
					
					</div>	   <hr>
 
  <div class='row'>
    <div class='col-sm'>
     <p><b> Category </b> : $category_name </p> 
    </div>
    <div class='col-sm'>
	<p><b> Brand  </b>: $brand_name</p> 
    </div>
  </div>
 
					
	 <div class='row'>
    <div class='col-sm'>
		<p>  <b>Price </b> : Rs.$product_price.00</p>

    </div>
  </div>		
  
  					
	 <div class='row '>	 
   <div class=' ml-3 pt-1 '>
		 <b> Qty :</b> 
 
    </div>

  <div class='col-3 text-left'> 
		   <input type='number' class='form-control text-center' min='1' step='1' oninput=validity.valid||(value='1'); size='2' pid='$product_id' value='1'  id='qty-$product_id' >
    </div>
  </div>
  
  
  	 <div class='row mt-3'>	 
 
	 <div class='col-sm' id='stock_msg'> 
	 ";
	 
	 if($product_total_qty>0){
		  echo "<p class='text-success'><i class='fas fa-cubes'></i> In Stock</p>";
	 }
	 else
	 {
		 echo "<p class='text-danger'><i class='fas fa-exclamation-triangle'></i> Out of Stock</p>";
	 }

	   
   	 echo " 
  
	 </div>
 
  </div>
					
			  <div class='col-sm'>


    </div>		
					
			 
				 
		<div class='col-4'>

		</div>
				   <p><b><i class='fas fa-truck'></i> Delivery within 24 hours</b></p> 
				   
		 <button data-toggle='tooltip' data-placement='right' title='If you have any special requirments, Please leave a note in the checkout page' class='btn btn-danger btn-sm mt-2 mb-2' style='padding-bottom:10px;padding-top:10px' pid='$product_id' id='particular_product_btn'> <i class='fas fa-shopping-cart'></i>  Add to cart </button>        
	
 
				</div>
	
			</div>
    </div>
 
  </div>
</div>


     
  
		</div>
 
				  </div>";
	
	
	
	
	
		}
	}
	

	
}
 
 
 
 
 
 
 
//Recomended product show right
 
  if(isset($_POST['recomended_prd_list_right'])){
	  
	@$customer_id = $_SESSION['cusid'] ;
	$product_id = $_POST["pid"];
	$product_query = "SELECT * from  product_tbl where (product_id=$product_id && active=1)";
	$run_query = mysqli_query($con,$product_query);
	echo " <b align='center' >Recomended</b>";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query))
		{
 	 
	 //category id
	$product_category_id = $row["product_category"];	
	
 	$product = "SELECT  product_id,product_img , product_price ,RAND() as IDX FROM product_tbl where active=1 and product_category = $product_category_id ORDER BY IDX  limit 3";
	$run_query = mysqli_query($con,$product);

	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query))
		{
					$Click_product_id = $row["product_id"];
			$product_price = $row["product_price"];
			$product_img = $row["product_img"];
			
			echo "  
 
			 

   <div  class='col-sm-12 '><img session_val='$customer_id'   id='particular_product_search_btn'  class='card-img-bottom text-center border border-warning shadow-sm p-2 mt-2' src='admin/upload/Product_images/$product_img' pid='$Click_product_id' style='padding-top:10px;padding-bottom:10px;width:100px;height:100px;cursor: pointer;'/><label style='color:brown;'> <b>Rs.$product_price.00</b></label> 	</div>	
    ";	
		}	
	}}
	  
	  
  }
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
 //Recomended product show left
 
  if(isset($_POST['recomended_prd_list_left'])){
	 @$customer_id = $_SESSION['cusid'] ;
	$product_id = $_POST["pid"];
	$product_query = "SELECT * from  product_tbl where (product_id=$product_id && active=1)";
	$run_query = mysqli_query($con,$product_query);
	echo " <b align='center' >Recomended</b>";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query))
		{
 	 
	 //category id
	$product_category_id = $row["product_category"];	
	
 	$product = "SELECT product_id,product_img , product_price ,RAND() as prd FROM product_tbl  where active=1 ORDER BY prd  limit 4";
	$run_query = mysqli_query($con,$product);

	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query))
		{
			$Click_product_id = $row["product_id"];
			$product_price = $row["product_price"];
			$product_img = $row["product_img"];
			
			echo "  
<div  class='col-sm-12 mb-2'><img  session_val='$customer_id'   id='particular_product_search_btn' class='card-img-bottom text-center border border-warning shadow-sm p-2 mt-2' src='admin/upload/Product_images/$product_img' pid='$Click_product_id' style='padding-top:10px;padding-bottom:10px;width:100px;height:100px;cursor: pointer;'/><label style='color:brown;'> <b>Rs.$product_price.00</b></label></div>		
    ";	
		
		}	
	}}
	  
	  
  }
  }
  
  
  
  
  //send the code to the customer phone
    if(isset($_POST['pohne_code_send_btn_func'])){
		$customer_id = $_SESSION['cusid'] ;
		$OTP = $_POST["OTP_code"];
		$pohne_no = $_POST["pohne_no"];
		
		$customer_phone_query = "SELECT * from  customer_tbl where phone=$pohne_no && customer_id=$customer_id ";
		$run_query = mysqli_query($con,$customer_phone_query);
		$row = mysqli_num_rows($run_query);
 
		if($row>0)
		{
			$sql = "update customer_tbl set otp_verify= $OTP  WHERE phone = $pohne_no && customer_id=$customer_id" ;
			$check_query = mysqli_query($con,$sql);
			echo "1";//update success
		}
		else
		{
			echo "2";//no recode exist
		}
 
		
	}
	
	
	
	
  
  //phone number show for verification
     if(isset($_POST['phone_number_show'])){
		 
		$customer_id = $_SESSION['cusid'] ;
		 
		$customer_phone_query = "SELECT * from  customer_tbl where customer_id=$customer_id";
		$run_query = mysqli_query($con,$customer_phone_query);
		$row = mysqli_num_rows($run_query);
		$row_data = mysqli_fetch_array($run_query);
		$phone = $row_data["phone"];
		
		$phone = substr($phone, -3);
		
		echo "*******$phone";
	 }
	 
	 
  
       if(isset($_POST['pohne_code_verify_fucn'])){
		$customer_id = $_SESSION['cusid'] ; 
		$OTP = $_POST["user_otp"];
		$attempt_val = $_POST["attempt_val"];
			
		$customer_phone_query = "SELECT * from  customer_tbl where customer_id=$customer_id && otp_verify=$OTP";
		$run_query = mysqli_query($con,$customer_phone_query);
		$row = mysqli_num_rows($run_query);
			if($row>0)
				{
				
				$sql = "update customer_tbl set otp_verify= 1  WHERE  customer_id=$customer_id " ;
				$check_query = mysqli_query($con,$sql);
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> Successfully verified<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"; 
				echo '<script type="text/javascript">
								window.open("cart.php","_self");
							</script>';
				
				}
				else
				{
					if($attempt_val>=3){
						$sql = "update customer_tbl set otp_verify=0  WHERE customer_id=$customer_id " ;
						$check_query = mysqli_query($con,$sql);
					echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> verification is disabled, Please try again<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"; 
					echo '<script type="text/javascript">
								window.open("index.php","_self");
							</script>';
					}
					else
					{
						 echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> Your OTP code is incorrect. Your $attempt_val attempt<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"; 
				
					}
					 
				}
				
		
		   }
 
 
 
 
 //tracking model getting data
    if(isset($_POST['tracking_model_items'])){
	$order_id = $_POST["order_id"];
	$customer_ord_id = $_POST["customer_ord_id"];
	$sql = "SELECT  customer_ord_prds.product_id,customer_ord_prds.order_qtry,product_tbl.product_name ,product_tbl.product_img,product_tbl.product_price,customer_ord_prds.order_id FROM customer_ord_prds,product_tbl
	where (customer_ord_prds.order_id = $order_id and customer_ord_prds.product_id=product_tbl.product_id)";
	$check_query = mysqli_query($con,$sql);
   
 if(mysqli_num_rows($check_query) > 0){
		while($row = mysqli_fetch_array($check_query))
		{ 
			$product_name = $row["product_name"];	
			$product_price =$row["product_price"];	
			$product_img =  $row["product_img"];	
			$order_qtry =  $row["order_qtry"];	
		 
			
		 echo"
		 <li class='col-md-4'>
                    <figure class='itemside mb-3'>
                        <div class='aside'><img src='admin/upload/Product_images/$product_img' class='img-sm border'></div>
                        <figcaption class='info align-self-center'>
                            <p class='title'>$product_name<br>Qty: $order_qtry </p> <span class='text-muted'>Rs. $product_price.00 </span>
                        </figcaption>
                    </figure>
                </li>
				
				";
			
			
		}
	}
	
		 
		  
	 
	 
	 }
 
 
 
 
 
 
 
 
 
 
  //tracking prograss color line
 if(isset($_POST["tracking_prograss_line"]))
	{
		
$order_id = $_POST['order_id'];
$customer_ord_id = $_POST['customer_ord_id'];
$sql = "SELECT * FROM customer_ord_prds WHERE order_id=$order_id and customer_ord_id=$customer_ord_id" ;
$check_query = mysqli_query($con,$sql);
$row_data = mysqli_fetch_array($check_query);
$order_status = $row_data["order_status"];
	
		
		if($order_status==0)
		{
			echo "<div class='step'> <span class='icon'> <i class='fa fa-check'></i> </span> <span class='text'>Order confirmed</span> </div>
                <div class='step'> <span class='icon'> <i class='fa fa-user'></i> </span> <span class='text'> Packing</span> </div>
                <div class='step'> <span class='icon'> <i class='fa fa-truck'></i> </span> <span class='text'> On the way </span> </div>
                <div class='step'> <span class='icon'> <i class='fa fa-box'></i> </span> <span class='text'>Ready for pickup</span> </div>";
	
		}
		else if($order_status==1)
		{
				echo "<div class='step active'> <span class='icon'> <i class='fa fa-check'></i> </span> <span class='text'>Order confirmed</span> </div>
                <div class='step active'> <span class='icon'> <i class='fa fa-user'></i> </span> <span class='text'> Packing</span> </div>
                <div class='step'> <span class='icon'> <i class='fa fa-truck'></i> </span> <span class='text'> On the way </span> </div>
                <div class='step'> <span class='icon'> <i class='fa fa-box'></i> </span> <span class='text'>Ready for pickup</span> </div>";
	
		}
		 else if($order_status==2)
		{
				echo "<div class='step active'> <span class='icon'> <i class='fa fa-check'></i> </span> <span class='text'>Order confirmed</span> </div>
                <div class='step active'> <span class='icon'> <i class='fa fa-user'></i> </span> <span class='text'> Packing</span> </div>
                <div class='step active'> <span class='icon'> <i class='fa fa-truck'></i> </span> <span class='text'> On the way </span> </div>
                <div class='step'> <span class='icon'> <i class='fa fa-box'></i> </span> <span class='text'>Ready for pickup</span> </div>";
	
		}		
		else if($order_status==3)
		{
				echo  "<div class='step active'> <span class='icon'> <i class='fa fa-check'></i> </span> <span class='text'>Order confirmed</span> </div>
                <div class='step active'> <span class='icon'> <i class='fa fa-user'></i> </span> <span class='text'> Packing</span> </div>
                <div class='step active'> <span class='icon'> <i class='fa fa-truck'></i> </span> <span class='text'> On the way </span> </div>
                <div class='step active'> <span class='icon'> <i class='fa fa-box'></i> </span> <span class='text'>Ready for pickup</span> </div>";
	
		}
		else
		{
						echo  "Error";
		}
	 
		 
	
	}
	
	
//getting the tracking details
 if(isset($_POST["tracking_model_details"]))
	{
		$order_id = $_POST['order_id'];
		$customer_ord_id = $_POST['customer_ord_id'];
		$status="";
		$sql = "SELECT * FROM customer_ord_prds WHERE order_id=$order_id and customer_ord_id=$customer_ord_id" ;
		$check_query = mysqli_query($con,$sql);
		$row_data = mysqli_fetch_array($check_query);
		$order_status = $row_data["order_status"];

		
		
		if($order_status==0)
		{
				echo "<div class='col text-center text-danger'> <strong> Payment Not Verified</strong> </div> ";
		}
		else if($order_status==1)
		{
			 
			echo " 
                   <div class='col text-center '> <strong>Status</strong> <br> Pending for shipment</div>
                    ";
		}
		else if($order_status==2)
		{
		$sql = "SELECT * FROM delivery_tbl WHERE order_id=$order_id " ;
		$check_query = mysqli_query($con,$sql);
		$row_data = mysqli_fetch_array($check_query);
		$prd_send_date = $row_data["prd_send_date"];
		$delivery_id = $row_data["delivery_id"];
	 
		$sql = "SELECT * FROM tracking_tbl WHERE delivery_id = $delivery_id" ;
		$check_query = mysqli_query($con,$sql);
		$row_data = mysqli_fetch_array($check_query);
		$tracking_id = $row_data["tracking_id"];
 
		$sql = "SELECT * FROM customer_ord_prds WHERE order_id=$order_id " ;
		$check_query = mysqli_query($con,$sql);
		$row_data = mysqli_fetch_array($check_query);
		$order_status = $row_data["order_status"];
		
		
		$sql = "SELECT * FROM tracking_tbl WHERE delivery_id=$delivery_id" ;
		$check_query = mysqli_query($con,$sql);
		$row_data = mysqli_fetch_array($check_query);
		$current_district = $row_data["current_district"];
		
		
		
		
		
		  echo "	   <div class='col'> <strong>Shipped On :</strong> <br><label > $prd_send_date<label> </div>
				   <div class='col text-center'> <strong>Tracking ID #:</strong> <br> $tracking_id  </div>
                   <div class='col'> <strong>Status:</strong> <br> On the way</div>
                   <div class='col'> <strong>Current District #:</strong> <br> <strong class='text-success'>$current_district <strong></div>";
		}
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	//custermer give product review
 if(isset($_POST["customer_order_item_feedback"]))
	{
 	$customer_id = $_SESSION['cusid'] ;
	$customer_ord_id = $_POST['customer_ord_id'];
	$customer_item_feedback_description = $_POST['customer_item_feedback_description'];
	$g_rating = $_POST['g_rating'];
	$product_id = $_POST['product_id'];
 
  
date_default_timezone_set('Asia/Kolkata');
		//define date and time
$date = date("Y-m-d"); // get the date
  
  
date_default_timezone_set('Asia/Kolkata');
//define date and time
$date_image = date('Y-m-d_H-i-s', time());

/* Location */
$location = "./prg_img/"."feedback."."/";
 
		

 if(!empty($_FILES['files_1']) && $customer_item_feedback_description != "" && $g_rating != "" )
	{
	 
				 $filename[0] = $_FILES['files_1']['name'];
	   
				$imageFileType = pathinfo($filename[0],PATHINFO_EXTENSION);
				$new_file_name_1="1_".$customer_id."_"."$product_id"."_".$date_image.".".$imageFileType;
				/* Upload file */
				
			 
					  if(move_uploaded_file($_FILES['files_1']['tmp_name'],$location.$new_file_name_1))
							   {
								 
							   }
							   else
							   {
									echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File not uploded!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
							   }
	 }
	 
	 else
	 {
		$new_file_name_1 = 0;
	
	}   
	 
 
 
			 

			   
 
 if(!empty($_FILES['files_2']) && $customer_item_feedback_description != "" && $g_rating != "")
 { 
 	   
		
		    $filename[1] = $_FILES['files_2']['name'];
			$imageFileType = pathinfo($filename[1],PATHINFO_EXTENSION);
			$new_file_name_2="2_".$customer_id."_"."$product_id"."_".$date_image.".".$imageFileType;
				
			if(move_uploaded_file($_FILES['files_2']['tmp_name'],$location.$new_file_name_2))
			   {
				 
			   }
			   else
			   {
			     	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File not uploded!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
			   }	   
		
 }
 else
 {
	 		$new_file_name_2 = 0;
 }
  
   

 if(!empty($_FILES['files_3']) && $customer_item_feedback_description != "" && $g_rating != "")
 {
	 
 $filename[2] = $_FILES['files_3']['name'];
	  		$imageFileType = pathinfo($filename[2],PATHINFO_EXTENSION);
			$new_file_name_3="3_".$customer_id."_"."$product_id"."_".$date_image.".".$imageFileType;
			   
			if(move_uploaded_file($_FILES['files_3']['tmp_name'],$location.$new_file_name_3))
			   {
				 
			   }
			   else
			   {
			     	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File not uploded!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
			   }
 }
 else
 {
	 $new_file_name_3= 0;
 }
	   
 
	 
	 
	 
 	// used to get the order id through customer order id
		$sql = "SELECT order_id,product_id FROM customer_ord_prds WHERE customer_ord_id=$customer_ord_id " ;
		$check_query = mysqli_query($con,$sql);
		$row_data = mysqli_fetch_array($check_query);
		$order_id = $row_data["order_id"];
		$product_id = $row_data["product_id"];
 
 
 	$sql2 = "INSERT INTO `comments_tbl`(`customer_id`,`date`,`product_id`,`comment_type`,`customer_ord_id`,`description`,`feedback_img_1`,`feedback_img_2`,`feedback_img_3`,`rating`) VALUES ($customer_id,'$date',$product_id,3,$customer_ord_id,'$customer_item_feedback_description','$new_file_name_1','$new_file_name_2','$new_file_name_3',$g_rating)";
	mysqli_query($con,$sql2);
		
	   

	
	//update customer order status = 3
	$sql = "update customer_ord_prds set order_status=3  WHERE customer_ord_id=$customer_ord_id " ;
	$check_query = mysqli_query($con,$sql);	
	
	echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>  Thank you for your feedback!</strong>  </div>";
  
 
	
	
	 
	}
  
   
   
  
   
  //get customer ordered item feedback
 if(isset($_POST["get_customer_orders_reviews"]))
	{ 
$product_id = $_POST["product_id"];

	$sql= "SELECT comments_tbl.product_id,comments_tbl.date,customer_tbl.first_name,customer_tbl.last_name,comments_tbl.description,comments_tbl.feedback_img_1,comments_tbl.feedback_img_2,comments_tbl.feedback_img_3,comments_tbl.rating FROM comments_tbl,customer_tbl WHERE comments_tbl.comment_type = 3 and (customer_tbl.customer_id = comments_tbl.customer_id) and product_id=$product_id  ORDER BY comments_tbl.date DESC";
	$run_query = mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
		
		
				 echo "<script type='text/javascript'>
						$(document).ready(function(){
						
							if($count != 0)
							{
								 $('#customer_review_count').html('('+$count+')'); 
							}
						
						}
						  
						);
						 
						</script>
						";
						
						
		if($count>0)
		{
			
		  while($row = mysqli_fetch_array($run_query))
			{
				$date = $row["date"];
				$first_name = $row["first_name"];
				$last_name = $row["last_name"];
				$rating = $row["rating"];
				$description = $row["description"];
				$feedback_img_1 = $row["feedback_img_1"];
				$feedback_img_2 = $row["feedback_img_2"];
				$feedback_img_3 = $row["feedback_img_3"];
		 
		 
		

		//if image empty dontn't show error image. Otherwise show
		
		if($feedback_img_1 ==0)
		 {
			 $image1="";
		 }
		 else
		 {
			  $image1="<img  class='thumbnail zoom card-img-bottom text-center  card-img-bottom text-center  mt-2 rouded' src='prg_img/feedback/$feedback_img_1'   style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/>";
	
		 }
	 
	 
	 
		 if($feedback_img_2 ==0)
		 {
			  $image2="";
		 }
		 	 else
		 {
			 $image2="<img  class='thumbnail zoom card-img-bottom text-center  card-img-bottom text-center  mt-2' src='prg_img/feedback/$feedback_img_2'    style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/>";
		 }
	 
	 
	 
		 if($feedback_img_3 ==0)
		 {
			  $image3="";
		 }
		 	 else
		 {
			  $image3="<img  class='thumbnail zoom card-img-bottom text-center  card-img-bottom text-center  mt-2' src='prg_img/feedback/$feedback_img_3'   style='padding-top:10px;padding-bottom:10px;width:100px;height:100px'/> ";
		 }
				
				
		  
		 
		 
		  echo "   <a  class='list-group-item list-group-item-action flex-column align-items-start  '>
					   <div class='d-flex w-100 justify-content-between'>
					  <div class='row '><h5 class='mb-1 ml-3 mr-2'>  $first_name $last_name </h5>
					  <div class='justify-content-center'>
					   
					   
					   ";
				 
						

							if($count>0)
							{
								$max_rate=$rating;
							}
							else
							{
								$max_rate=0;
							}
							
							
							
							
					for($x=1;$x<=$max_rate;$x++)
					{
						 echo "<i class='fas fa-star ' style='color:orange'></i>";
						 if($x ==$max_rate)
							{ 
									for($y=$x;$y<5;$y++)
									{
										 echo "<i class='fas fa-star ' ></i>";
											 
									}
								
							}
							 
					}  
					
					echo "   
									
									</div>
									
					</div>
					 <small>$date</small>
					 </div>
					<p class='mb-1'>
						 $description </p>
				 
				 $image1 $image2 $image3
			
				  </a>
				  ";
		
		
		
		}
		
		
		}
	
	
	}
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   if(isset($_POST["product_available_verify"]))
	{
	$product_id = $_POST['product_id'];
	$sql = "SELECT * from product_tbl where product_id= $product_id and  active=1" ;
	$check_query = mysqli_query($con,$sql);
	$count_prd=mysqli_num_rows($check_query);
		
		if($count_prd>0)
		{
			echo "1";
		}
		else
		{
			echo "2";
		}
	}
  
  
  
  
   
   //verify email and phone number for reset password
       if(isset($_POST['reset_password_pohne_code_verify_fucn'])){
 
		$phone_no = $_POST["phone_no"];
		$email = $_POST["email_id"];
		$OTP_code = $_POST["OTP_code"];
			
			
		$sql = "select * from customer_tbl WHERE  email='$email' and phone='$phone_no'" ;
		$result=mysqli_query($con,$sql);
		$chk_availability=mysqli_num_rows($result);	

		
				if($chk_availability>0)
				{
					
					
					$sql = "update customer_tbl set otp_verify= $OTP_code  WHERE  (email='$email' and phone='$phone_no') " ;
					$result=mysqli_query($con,$sql);
					 echo "1";
										
					
				}
				else
				{
						echo "2";//no record found
				}
				  
		   }
  
   
  
  //verify btn click --> reset password
     if(isset($_POST['pohne_code_verify_btn'])){
		$email = $_POST["email_id"];
		$OTP = $_POST["OTP_code"];
 
		$customer_phone_query = "SELECT * from  customer_tbl where (email='$email' and otp_verify='$OTP')";
		$run_query = mysqli_query($con,$customer_phone_query);
		$row = mysqli_num_rows($run_query);
			if($row>0)
				{
				
				$sql = "update customer_tbl set otp_verify= 1  WHERE  email=$email " ;
				$check_query = mysqli_query($con,$sql);
 
					echo "1";
				}
				else
				{
						echo "2";
				}
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	   //verify btn click --> reset password
     if(isset($_POST['reset_password_update_fun'])){
		$pasword = md5($_POST["reset_new_pasword"]);
		$email = $_POST["email_id"];
		
				$sql = "update customer_tbl set password='$pasword'  WHERE  email='$email' " ;
				$check_query = mysqli_query($con,$sql);
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss>Password sucessfully updated<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
					echo '<script type="text/javascript">
								window.open("index.php","_self");
							</script>';


	}
	 
	 
	 
	 
	 
	 



//get the slider image 
if(isset($_POST["get_slider_image"])){
	 
		$sql = "SELECT title,image FROM banner_tbl" ;
		$check_query = mysqli_query($con,$sql);
			
	  $active='active';
			if(mysqli_num_rows($check_query) > 0){
			while($row = mysqli_fetch_array($check_query))
			{ 
			 $title = $row["title"];
			 $image = $row["image"];
			
			 echo " 
				 <div class='carousel-item $active'>  
				<img class='d-block w-100' src='admin/upload/banners/$image' >
				</div>
				 
				";
			$active='';	//active class remove
			}
			
			}
			

}






//get the slider image footer
if(isset($_POST["get_slider_image_footer"])){
	 
		$sql = "SELECT title,image FROM banner_tbl" ;
		$check_query = mysqli_query($con,$sql);
		$start=0;
		$active='active';
			if(mysqli_num_rows($check_query) > 0){
			while($row = mysqli_fetch_array($check_query))
			{ 
		
			$start++;
			 echo "<li data-target='#carouselExampleIndicators' data-slide-to='$start' class='$active'></li>";
			$active='';	//active class remove
			}
			
			}
			

}






 
  // get the onging offer
  if(isset($_POST["get_ongoing_offer"])){
	   
		date_default_timezone_set('Asia/Kolkata');
		//define date and time
		$today = date("Y-m-d"); // get the date
					
	  
		$sql = "SELECT reason,active,offer_start_date,offer_end_date  FROM offer_tbl where active=1" ;
		$check_query = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($check_query);
		$offer_start_date = $row["offer_start_date"];
		$offer_end_date = $row["offer_end_date"];
		$reason = $row["reason"];
		
		
		if($offer_start_date<=$today and $today <=$offer_end_date)
		{
			echo "$reason";
			
		}
		
 

}



  



//left side category list for filter
if(isset($_POST["category_in_filter"])){
	
	$category_query = "SELECT * FROM category_tbl where active=1";
	$run_query = mysqli_query($con,$category_query);
	
	echo "<a href='#' class='list-group-item list-group-item-action ' style='color:white;background-color:#FF4747;' >
	<h5><i class='fas fa-th-list' ></i>&nbspAll Categories</h5></a>";

	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query))
		{
			$cid = $row["category_id"];
			$cat_name = $row["category_name"];
			echo "
			<a href='#' id='filter_category_btn' class='list-group-item list-group-item-action' cid='$cid'>$cat_name</a>		
			";
		}
		
		@$customer_id = $_SESSION['cusid'] ;	
		
		if($customer_id=='')
		{
			echo " <a href='#' class='list-group-item list-group-item-action' data-toggle='modal' data-target='#customer_login_model'>Customs Order &nbsp <i class='fas fa-box-open'></i> </a>";
		}
		else
		{
			echo " <a href='#' class='list-group-item list-group-item-action' data-toggle='modal' data-target='#customes_order'  >Customs Order &nbsp <i class='fas fa-box-open'></i></a>";
		}
			
	}
}


  







//left side brand list for filter
if(isset($_POST["brand_in_filter"])){
	$brand_query = "SELECT * FROM brand_tbl where active=1 ";
	$run_query = mysqli_query($con,$brand_query);
	
	echo "<a href='#' class='list-group-item list-group-item-action ' style='color:white;background-color:#FF4747;'>
	<h5><i class='fas fa-tags' ></i>&nbspAll Brands</h5>
	</a>";

	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query))
		{
			$brand_id = $row["brand_id"];
			$brand_name = $row["brand_name"];
			echo "
			<a href='#' id='filter_brand_btn' class='list-group-item list-group-item-action' bid='$brand_id'>$brand_name</a>
			";
		}
	}
}
  
  
  
  
if(isset($_POST["prodcuct_multiple_filter"]))
	{	
	$count_prd=0;
	@$customer_id = $_SESSION['cusid'] ; //because same method used for index_filter page and profile_filter page
						

$product_l_price=0;
$product_h_price=0;

		$search_txt = $_POST["search_txt"];
		$cid_txt = $_POST["cid_txt"];
		$brd_txt = $_POST["brd_txt"];
		$lprice_txt = $_POST["lprice_txt"];
		$hprice_txt = $_POST["hprice_txt"];
		$rate_txt = $_POST["rate_txt"];
		
		
		$selected_keywords = $search_txt;
		
		
		 if($cid_txt == 0 && $brd_txt == 0 && $lprice_txt == 0 &&  $hprice_txt == 0 && $rate_txt == 0 )
		 {
		 
				$query = "SELECT * FROM product_tbl where active=1 and product_keywords LIKE '%$selected_keywords%' ";
				$run_query = mysqli_query($con,$query);
				$count_prd=mysqli_num_rows($run_query);
		 }
		 else
		 {
			 
			 if($cid_txt == 0 )
				{
					$product_category_sql="";
				}
			else
				{
					$product_category_sql="product_tbl.product_category=$cid_txt and";
				}
				 
			 
			
			
			
			if($lprice_txt == 0 &&  $hprice_txt==0)
				{
				 
					 $product_filter_price="";
				}
			else
				{
					 $product_l_price=$lprice_txt;
					 $product_h_price=$hprice_txt;	
					  
					if($lprice_txt != 0 && $hprice_txt == 0)
					{
						 $product_filter_price="and product_tbl.product_price >= $product_l_price";
					}
					else if($hprice_txt != 0 &&$lprice_txt==0)
					{
						 $product_filter_price="and product_tbl.product_price <= $product_h_price";
					}
					else if($hprice_txt != 0 && $lprice_txt!=0)
					{
						 $product_filter_price="and product_tbl.product_price BETWEEN $product_l_price AND $product_h_price";
					}
					 
					 
					
				}
				 
				
				
			if($brd_txt == 0 )
				{
					$product_brand_sql="";
				}
			else
				{
					$product_brand_sql="product_tbl.product_brand=$brd_txt and";
				}
				
				
				
				
		 	if($rate_txt == 0)
				{ 
					$query = "SELECT * FROM product_tbl where $product_category_sql $product_brand_sql  active=1 and product_keywords LIKE '%$selected_keywords%' $product_filter_price ";
					$run_query = mysqli_query($con,$query);
					$count_prd=mysqli_num_rows($run_query);
				}
				else
				{
					
					
						if($cid_txt == 0 && $brd_txt == 0 && $lprice_txt == 0 &&  $hprice_txt == 0 && $rate_txt==0)
						{		 
						
								$rate_txt_val="$rate_txt";
								$rate_sql="SELECT product_tbl.product_category,product_tbl.product_brand,comments_tbl.product_id,comments_tbl.rating FROM comments_tbl,product_tbl where $product_category_sql $product_brand_sql and comments_tbl.rating=$rate_txt_val and (product_tbl.product_id = comments_tbl.product_id) and  product_tbl.active=1 and product_tbl.product_keywords LIKE '%$selected_keywords%' $product_filter_price";
								$run_query_rating = mysqli_query($con,$rate_sql);
								$count_rating_record=mysqli_num_rows($run_query_rating);
				
								while($row = mysqli_fetch_array($run_query_rating))
									{		
									$product_id = $row["product_id"];
									$product_brand = $row["product_brand"];
									$product_category = $row["product_category"];
										
										if($count_rating_record>0)
										{
												$query = "SELECT * FROM product_tbl where (product_brand=$product_brand and product_category=$product_category) and product_id=$product_id $product_filter_price";
												$run_query = mysqli_query($con,$query);
												$count_prd=mysqli_num_rows($run_query);
										}
									 
  
				 	
								}
							
						}
						
						else
						{
							
							
							
							if($cid_txt != 0 && $brd_txt != 0 && $lprice_txt != 0 &&  $hprice_txt != 0) 
							{
								$rate_txt_val="$rate_txt";
								$rate_sql="SELECT product_tbl.product_category,product_tbl.product_brand,comments_tbl.product_id,comments_tbl.rating FROM comments_tbl,product_tbl where comments_tbl.rating=$rate_txt_val and  $product_category_sql $product_brand_sql (product_tbl.product_id = comments_tbl.product_id) and  product_tbl.active=1 and product_tbl.product_keywords LIKE '%$selected_keywords%' $product_filter_price";
								$run_query_rating = mysqli_query($con,$rate_sql);
								$count_rating_record=mysqli_num_rows($run_query_rating);
				
								while($row = mysqli_fetch_array($run_query_rating))
									{		
									$product_id = $row["product_id"];
									$product_brand = $row["product_brand"];
									$product_category = $row["product_category"];
										
										if($count_rating_record>0)
										{
												$query = "SELECT * FROM product_tbl where (product_brand=$product_id and product_category=$product_brand) and product_id=$product_id $product_filter_price";
												$run_query = mysqli_query($con,$query);
												$count_prd=mysqli_num_rows($run_query);
										}
 
						 
				 	
										}
							}
							else
							{
								if($cid_txt == 0 && $brd_txt == 0 && $lprice_txt == 0 &&  $hprice_txt == 0  && $rate_txt != 0) 
								{
									$rate_txt_val="$rate_txt";
									//filter the prduct in specially rating plus other filter option
									$max_rate_sql="SELECT product_tbl.product_id,product_tbl.product_total_qty,product_tbl.product_img,product_tbl.product_name,product_tbl.product_desc,product_tbl.product_price,product_tbl.product_brand,product_tbl.product_category,product_tbl.product_id, max(comments_tbl.rating) FROM comments_tbl,product_tbl where (product_tbl.product_id = comments_tbl.product_id) and product_tbl.active=1 and product_tbl.product_keywords LIKE '%$selected_keywords%' GROUP BY product_tbl.product_id HAVING (MAX(comments_tbl.rating)=$rate_txt_val or MAX(comments_tbl.rating)>=$rate_txt_val)";
									$max_run_query = mysqli_query($con,$max_rate_sql);
									$max_run_query_row = mysqli_num_rows($max_run_query);
	 			
										while($row = mysqli_fetch_array($max_run_query))
										{	
										 
											$product_id = $row["product_id"];
											 
											  		
														$run_query = mysqli_query($con,$max_rate_sql);
														$count_prd=mysqli_num_rows($max_run_query);
									 
										
										}
  
								}
								else if ($cid_txt!= 0 && $brd_txt == 0 && $lprice_txt == 0 &&  $hprice_txt == 0  && $rate_txt != 0)
								{
									
										$rate_txt_val="$rate_txt";
									//filter the prduct in specially rating plus other filter option
									$max_rate_sql="SELECT product_tbl.product_id,product_tbl.product_total_qty,product_tbl.product_img,product_tbl.product_name,product_tbl.product_desc,product_tbl.product_price,product_tbl.product_brand,product_tbl.product_category,product_tbl.product_id, max(comments_tbl.rating) FROM comments_tbl,product_tbl where   $product_category_sql $product_brand_sql (product_tbl.product_id = comments_tbl.product_id) and product_tbl.active=1 and product_tbl.product_keywords LIKE '%$selected_keywords%' GROUP BY product_tbl.product_id HAVING (MAX(comments_tbl.rating)=$rate_txt_val or MAX(comments_tbl.rating)>=$rate_txt_val)";
									$max_run_query = mysqli_query($con,$max_rate_sql);
									$max_run_query_row = mysqli_num_rows($max_run_query);
	 			
										while($row = mysqli_fetch_array($max_run_query))
										{	
										 
											$product_id = $row["product_id"];
											 
											  		
														$run_query = mysqli_query($con,$max_rate_sql);
														$count_prd=mysqli_num_rows($max_run_query);
									 
										
										}

										
								}
								else if ($cid_txt!= 0 && $brd_txt == 0 && ($lprice_txt != 0 ||  $hprice_txt != 0)  && $rate_txt != 0)
								{
									
									
										
										$rate_txt_val="$rate_txt";
									//filter the prduct in specially rating plus other filter option
									$max_rate_sql="SELECT product_tbl.product_id,product_tbl.product_total_qty,product_tbl.product_img,product_tbl.product_name,product_tbl.product_desc,product_tbl.product_price,product_tbl.product_brand,product_tbl.product_category,product_tbl.product_id, max(comments_tbl.rating) FROM comments_tbl,product_tbl where   $product_category_sql $product_brand_sql (product_tbl.product_id = comments_tbl.product_id) and product_tbl.active=1 and product_tbl.product_keywords LIKE '%$selected_keywords%' GROUP BY product_tbl.product_id HAVING (MAX(comments_tbl.rating)=$rate_txt_val or MAX(comments_tbl.rating)>=$rate_txt_val) $product_filter_price";
									$max_run_query = mysqli_query($con,$max_rate_sql);
									$max_run_query_row = mysqli_num_rows($max_run_query);
	 			
										while($row = mysqli_fetch_array($max_run_query))
										{	
										 
											$product_id = $row["product_id"];
											 
											  		
														$run_query = mysqli_query($con,$max_rate_sql);
														$count_prd=mysqli_num_rows($max_run_query);
									 
										
										}
									
									
									
								}
								else
								{
									
												
										$rate_txt_val="$rate_txt";
									//filter the prduct in specially rating plus other filter option
									$max_rate_sql="SELECT product_tbl.product_id,product_tbl.product_total_qty,product_tbl.product_img,product_tbl.product_name,product_tbl.product_desc,product_tbl.product_price,product_tbl.product_brand,product_tbl.product_category,product_tbl.product_id, max(comments_tbl.rating) FROM comments_tbl,product_tbl where   $product_category_sql $product_brand_sql (product_tbl.product_id = comments_tbl.product_id) and product_tbl.active=1 and product_tbl.product_keywords LIKE '%$selected_keywords%' GROUP BY product_tbl.product_id HAVING  (MAX(comments_tbl.rating)=$rate_txt_val or MAX(comments_tbl.rating)>=$rate_txt_val) $product_filter_price";
									$max_run_query = mysqli_query($con,$max_rate_sql);
									$max_run_query_row = mysqli_num_rows($max_run_query);
	 			
										while($row = mysqli_fetch_array($max_run_query))
										{	
										 
											$product_id = $row["product_id"];
											 
											  		
														$run_query = mysqli_query($con,$max_rate_sql);
														$count_prd=mysqli_num_rows($max_run_query);
									 
										
										}
									
									
								}
							}
							
						}
							 
				 
				}
		 
	 
	
	}
	 
   
  
	if($count_prd>0)
	{	
		while($row = mysqli_fetch_array($run_query))
		{
			$product_id = $row["product_id"];
			$product_category = $row["product_category"];
			$product_brand = $row["product_brand"];
			$product_name = $row["product_name"];
			$product_price = $row["product_price"];
			$product_desc = $row["product_desc"];
			$product_img = $row["product_img"];
			$product_total_qty = $row["product_total_qty"];
			
			 
			echo "
			<div class='col-lg-4 col-sm-12  col-md-6 mb-3'>
            <div class='  card shadow-sm'> 
			<div class='card-header' style='font-size:15px;background-color:#f5f5f5'> <b style='cursor: pointer;' id='particular_product_search_btn' session_val='$customer_id'  pid='$product_id'>$product_name</b>
			
		<button type='button' id='particular_product_search_btn' pid='$product_id' session_val='$customer_id'  style='float:right;' class='btn btn-warning'><i class='fas fa-search' ></i></button>
					<div style='padding-top:1px;' >
					
					
					";
					  
					//getting rating values
							$rating_sql="SELECT  max(comments_tbl.rating) AS max_rate FROM product_tbl,comments_tbl where comments_tbl.product_id=$product_id";
							 $run_query_rating = mysqli_query($con,$rating_sql);
							 $count_prd=mysqli_num_rows($run_query_rating);
							 $row_rating = mysqli_fetch_array($run_query_rating);
						

							if($count_prd>0)
							{
								$max_rate=$row_rating["max_rate"];
							}
							else
							{
								$max_rate=0;
							}
							 
							 
					for($x=1;$x<=$max_rate;$x++)
					{
						 echo "<i class='fas fa-star ' style='color:orange'></i>";
						 if($x ==$max_rate)
							{ 
									for($y=$x;$y<5;$y++)
									{
										 echo "<i class='fas fa-star ' ></i>";
											 
									}
								
							}
							 
					}  
					
					echo " 
					</div>
			</div>
			
		   <div class='text-center' >
			<img  class='card-img-bottom text-center ' pid='$product_id' session_val='$customer_id'  id='particular_product_search_btn' src='admin/upload/Product_images/$product_img' align='center' style='cursor: pointer;padding-top:10px;padding-bottom:10px;width:120px;height:160px'/><br>		
			</div>
         
    <div class='form-group row justify-content-center'>

        <label for='inputPassword' class='p-1'>QTY :</label>
        <div class='col-sm-4'>
            <input type='number' class='form-control text-center' min='1'   step='1' oninput=validity.valid||(value='1');  size='2' pid='$product_id' value='1'  id='qty-$product_id' >
		</div>
		</div>
	<button class='btn btn-danger btn-sm' style='padding-bottom:10px;padding-top:10px' pid='$product_id'  id='particular_product_btn'  ><i class='fa fa-shopping-cart'></i> Add to cart </button>        
	<div class='text-center pt-1' style='background-color:#fffff;'><label for='class_type' ><h4><span class=' label label-primary' align='center'>&nbsp Rs.$product_price.00 &nbsp </span></h4></label>	</div>
		</div>
            </div>
          </div>
			";
		}
		
	}
	else
	{  							
								if(!isset($_SESSION['cusid']))
									{
										
										  echo "<div class='container text-center'>
													<div class='alert alert-info '  role='alert' >
													  <h4 class='alert-heading'>We don't have such kind of a product right now.!</h4>
													  <p>We are sorry to say that we don't have such a product.!</p>
													  <p  >You can make a request here for your need </p>
													  <button class='btn btn-danger mt-2'  data-toggle='modal' data-target='#customer_login_model' ><i class='fa fa-shopping-cart'></i> CLICK HERE</button>  </p>
													</div> 
													</div> 
											";
										
									}
									else
									{
										
										 echo "
											<div class='container text-center'>
												<div class='alert alert-info '  role='alert' >
												  <h4 class='alert-heading'>We don't have such kind of a product right now.!</h4>
												  <p>We are sorry to say that we don't have such a product.!</p>
												  <p  >You can make a request here for your need </p>
												  <button class='btn btn-danger mt-2'  data-toggle='modal' data-target='#customes_order' ><i class='fa fa-shopping-cart'></i> CLICK HERE</button>  </p>
												</div> 
												</div> 
												";
										
									}
		
		
		 
		
	 }
	
		
		    
		  
	}


if(isset($_POST["get_cat_brd_names_tag"]))
	{	

		$cid_id = $_POST["cid_id"];
		$brd_id = $_POST["brd_id"];
		
		
		$sql="SELECT category_name FROM category_tbl where category_id=$cid_id";
		$run_query = mysqli_query($con,$sql);
		$count_cat=mysqli_num_rows($run_query);

		  
		
			if($count_cat>0)
			{
				$row = mysqli_fetch_array($run_query);
				$category_name = $row["category_name"];
			 }
			else
			{		
				$category_name = 0;
				
			}
	
		
		$sql1="SELECT brand_name FROM brand_tbl where brand_id=$brd_id";
		$run_query1 = mysqli_query($con,$sql1);
		$count_brd=mysqli_num_rows($run_query1);
			
				if($count_brd>0)
				{
					$row1 = mysqli_fetch_array($run_query1);
					$brand_name = $row1["brand_name"];
				}
				else
				{
				 $brand_name =0;
				}
	 
				
				
 	echo "$category_name*/*$brand_name";
			
	 	 

	}
  
  
  
  
  
  
  
  
  if(isset($_POST["send_the_msg_by_customer"]))
	{	

		$customer_id = $_SESSION['cusid'];
		$customer_msg = $_POST["customer_msg"];
		
		
				
					date_default_timezone_set('Asia/Kolkata');
					//define date and time
					$today = date("Y-m-d"); // get the date
					$time = date("h:i:sa");
		 		
					
		$sql="insert  into comments_tbl (customer_id,date,time,comment_type,description,active) values($customer_id,'$today','$time',4,'$customer_msg',1)";
		$run_query = mysqli_query($con,$sql);
	
 
 
	}
  
  
    
  if(isset($_POST["get_customer_message"]))
	{	
  
		$customer_id = $_SESSION['cusid'];
		$sql1="SELECT * FROM comments_tbl where customer_id=$customer_id and  comment_type=4 order by time,date ASC";
		$run_query1 = mysqli_query($con,$sql1);
		$count_brd=mysqli_num_rows($run_query1);
		

		
	 while($row = mysqli_fetch_array($run_query1))
		{
					 
			$description = $row["description"];
			$date = $row["date"];
			$time = $row["time"];
			$comments_id = $row["comments_id"];
			$admin = $row["admin"];
	
			 if($admin==1)
			 {	
				 			echo "
							
							
		<p class='card-text mt-3   text-left'><span style='width:500px;display: inline-block;  border-radius: 20px 20px 20px 20px;' class='bg-light p-3'> <image width='50px' src='prg_img\user\admin.webp' alt='Seller'>Seller<br>$description 
									
									 
																	</span>
																<br>
													
										 
													 	 <small   class='ml-2' style='font-size:x-small;color:#8f9295;'>$date $time</small>	
															
													 
												 
																	
																</p> 
																";
				 
			 }
			 else
			 {
				 
				 		 
				echo    "<p class='card-text mt-2  p-3 text-right'><span style='width:500px;display: inline-block;  border-radius: 20px 20px 20px 20px; background-color:rgb(232 252 241);'  class='p-3'>Me <image width='50px' alt='Me' src='prg_img\user\person.png'> <br class='text-left'>$description</span>
				
				
				
				
					<br>
					 <small   class='mr-2' style='font-size:x-small;color:#8f9295;'>$date $time</small>	
				
				</p>  ";
			

		 
			}
		 
			  
  
		
		}
		
		
		
		

		
		
		
	}
  
 
  
  

?>