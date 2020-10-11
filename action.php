<?php
session_start();
//database connection
include "db_conn/config.php"; 

//left side category list 
if(isset($_POST["category"])){
	
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
		
		@$customer_id = $_SESSION['cusid'] ;	
		
		if($customer_id=='')
		{
			
		}
		else
		{
			echo " <a href='#' class='list-group-item list-group-item-action' data-toggle='modal' data-target='#customes_order'  >Customs Order</a>";
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
	
	
	$product_query = "SELECT * FROM product_tbl where active=1 LIMIT $start,$page_number_limit ";
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
			     <div class='col-4 mb-3' >
            <div class='card shadow-sm'> 
			<div class='card-header' style='font-size:15px;background-color:#f5f5f5'> <b style='cursor: pointer;' id='particular_product_search_btn' session_val='$customer_id'   pid='$product_id'>$product_name</b>
			
		<button type='button' id='particular_product_search_btn' session_val='$customer_id'  pid='$product_id' style='float:right;' class='btn btn-warning'><i class='fas fa-search' ></i></button>
					<div style='padding-top:1px;' >
					<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
					<i class='fas fa-star'></i>
					</div>
			</div>
			
		   <div class='text-center' >
			<img  class='card-img-bottom text-center '  id='particular_product_search_btn'  session_val='$customer_id'  pid='$product_id' src='admin/upload/Product_images/$product_img' align='center' style='cursor: pointer;padding-top:10px;padding-bottom:10px;width:120px;height:160px'/><br>		
			</div>
         
    <div class='form-group row justify-content-center'>

        <label for='inputPassword' class='p-1'>QTY :</label>
        <div class='col-sm-4'>
            <input type='number' class='form-control ' min='1' size='2' session_val='$customer_id'  pid='$product_id' value='1'  id='qty-$product_id' >
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
	
	else    //when we search through the brand
	{ 
		$selected_keywords = $_POST["keywords"];
		$query = "SELECT * FROM product_tbl where active=1 and product_keywords LIKE '%$selected_keywords%' LIMIT $start,$page_number_limit ";
	}

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
			<div class=' col-4 mb-3' >
            <div class='  card shadow-sm'> 
			<div class='card-header' style='font-size:15px;background-color:#f5f5f5'> <b style='cursor: pointer;' id='particular_product_search_btn' session_val='$customer_id'  pid='$product_id'>$product_name</b>
			
		<button type='button' id='particular_product_search_btn' pid='$product_id' session_val='$customer_id'  style='float:right;' class='btn btn-warning'><i class='fas fa-search' ></i></button>
					<div style='padding-top:1px;' >
					<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
					<i class='fas fa-star'></i>
					</div>
			</div>
			
		   <div class='text-center' >
			<img  class='card-img-bottom text-center ' pid='$product_id' session_val='$customer_id'  id='particular_product_search_btn' src='admin/upload/Product_images/$product_img' align='center' style='cursor: pointer;padding-top:10px;padding-bottom:10px;width:120px;height:160px'/><br>		
			</div>
         
    <div class='form-group row justify-content-center'>

        <label for='inputPassword' class='p-1'>QTY :</label>
        <div class='col-sm-4'>
            <input type='number' class='form-control text-center' min='1' size='2' pid='$product_id' value='1'  id='qty-$product_id' >
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
	if(mysqli_num_rows($run_query)==0){
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
		echo "<script> window.location.assign('login.php'); </script>";		
		exit();
		}
	}
				
}


//login through the login page normally it will use when the new user register
if(isset($_POST["userLogin"])){
		$login_email = $_POST["useremail"]; // mysql_real_escape_string used prevent from @ - sysmbol enter values
		$login_password= md5($_POST["userpassword"]);// get password encryption
	
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
								$sql = "INSERT INTO `order_tbl` (`order_id`,`customer_id`) VALUES ($order_id,$customer_id)";
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
	$count = mysqli_num_rows($check_query);
	$no=1;
	$total=0;
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
					
						$Courier=300; 
						$discount=0;
						$total=$total+$current_total_price ;
								//used to get the product details
						$final_total=($total+$Courier)-$discount;
						
						while($row = mysqli_fetch_array($check_query1))
							{
								$product_name = $row["product_name"];
								$product_img = $row["product_img"];
								
									if(isset($_POST["get_added_products_into_card"]))
								{
									
														echo "<tr style='cursor: pointer;' id='card_page_view_url'>
															<th class='col-2'>$no</th>
																<td><img height='50px' width='50px' src='admin/upload/Product_images/$product_img' alt='Third slide'></td>
																<td style='width: 30%'><label style='cursor: pointer;'  >$product_name</label></td>
															<td class='col-sm-1 col-md-1 text-center'><strong>$order_qtry</strong></td>
															<td class='col-sm-1 col-md-1 text-center'><strong>Rs.$current_total_price.00</strong></td>
															</tr>
								
								
								";}			
															
								
								
									
							else{
											
											echo " <div class='row mb-2 mt-4'>
														<div class='col-md-1 text-center'><b>$no.</b></div>
														<div class='col-md-3'><img height='55px' class='mr-3' width='55px' src='admin/upload/Product_images/$product_img' >$product_name
														
														 
																<textarea class='form-control mt-2 note' id='note-$product_id'   pid='$product_id'     name='customer_note' rows='2' size='4'  placeholder='Note...'>$customer_note</textarea>
														  
														</div>
												 
														<div class='col-md-1  '>	
												
														<input type='number'   min='1' class='form-control text-center qty ' id='qty-$product_id' pid='$product_id'  value='$order_qtry'>
														
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
					<div class='col-sm-2 pt-1 text-right'style='background:orange;'> Courier chrage :  </div>
					<div class='col-sm-2 pt-1  text-left' style='background:orange;'><b>Rs.300.00</b></div>
				  </div>
	
				<div class='row  ml-5'>
					<div class='col-sm-3'> </div>
					<div class='col-sm-4'> </div>
					<div class='col-sm-2 text-right pt-1'style='background:orange;'> Discount :  </div>
					<div class='col-sm-2 pt-1   text-left' style='background:orange;'><b>(Rs.$discount.00)</b></div>
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
						Please upload a picture of your money deposited slip. Click here to upload it (Please inclued the date, time and branch). 
						<div class='text-center m-2'><button class='btn btn-warning ' type='button'  data-toggle='modal' data-target='#bankdepModel'  >Upload</button></div>
					  </div>
					</div>
					
					
					
					<div class='collapse multi-collapse' id='cash_on_delivery_btn_click'>
					  <div class='card card-body'>
						Cash on delivery is only available for the products under 50,000. Otherwise use bank payment or online payement. 
						 ";
						 
					//phone verify conform - agree button hide show 
					
					$sql_phn_veryfy ="SELECT * FROM customer_tbl WHERE customer_id = '$customer_id' && otp_verify = '1'  "  ;
					$check_query_sql_phn_veryfy = mysqli_query($con,$sql_phn_veryfy);
					 $count = mysqli_num_rows($check_query_sql_phn_veryfy);
				 
					if($count==1)
					{
				
						
						echo "<div class='text-center m-2'><input type='button' class='btn btn-warning' id='cash_on_agree_btn' value='Confirm''></div>";
						
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
											echo"<a href='' class='btn btn-warning mr-2 rounded  order_id='$order_id'    customer_ord_id='$customer_ord_id'  id='customer_prd_conform_btn'  data-toggle='modal'><i class='fa fa-check'></i> Confirm goods Received </a>";
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
	
								$sql = "INSERT INTO `bank_dep_tbl`(`payment_id`,`dep_date`,`dep_time`,`branch_name`,`upolod_slip_img`) VALUES ($payment_id,'$dep_date','$dep_time','$branch_name','$new_file_name')";
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
					<i class='' style='color:orange' data-fa-i2svg=''><svg class='svg-inline--fa fa-star fa-w-18' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='star' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512' data-fa-i2svg=''><path fill='currentColor' d='M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z'></path></svg></i>
                	<i class='' style='color:orange' data-fa-i2svg=''><svg class='svg-inline--fa fa-star fa-w-18' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='star' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512' data-fa-i2svg=''><path fill='currentColor' d='M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z'></path></svg></i>
                	<i class='' style='color:orange' data-fa-i2svg=''><svg class='svg-inline--fa fa-star fa-w-18' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='star' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512' data-fa-i2svg=''><path fill='currentColor' d='M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z'></path></svg></i>
                	<i class='' style='color:orange' data-fa-i2svg=''><svg class='svg-inline--fa fa-star fa-w-18' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='star' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512' data-fa-i2svg=''><path fill='currentColor' d='M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z'></path></svg></i>
					<i class='' data-fa-i2svg=''><svg class='svg-inline--fa fa-star fa-w-18' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='star' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512' data-fa-i2svg=''><path fill='currentColor' d='M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z'></path></svg></i> (120)
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
		   <input type='number' class='form-control text-center' min='1' size='2' pid='$product_id' value='1'  id='qty-$product_id' >
    </div>
  </div>
  
  
  	 <div class='row mt-3'>	 
 
	 <div class='col-sm' id='stock_msg'> 
	 ";
	 
	 if($product_total_qty>0){
		  echo "<p class='text-success'>In Stock</p>";
	 }
	 else
	 {
		 echo "<p class='text-danger'>Out of Stock</p>";
	 }

	   
   	 echo " </div>
 
  </div>
					
			  <div class='col-sm'>


    </div>		
					
				  
			
				  
				   
				 
		<div class='col-4'>

		</div>
				   <p><b>Delivery within 24 hours</b></p> 
				   
		 <button class='btn btn-danger btn-sm mt-2 mb-2' style='padding-bottom:10px;padding-top:10px' pid='$product_id' id='particular_product_btn'><i class='' data-fa-i2svg=''><svg class='svg-inline--fa fa-shopping-cart fa-w-18' aria-hidden='true' focusable='false' data-prefix='fa' data-icon='shopping-cart' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512' data-fa-i2svg=''><path fill='currentColor' d='M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z'></path></svg></i> Add to cart </button>        
			 
	 
 
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
		

		//customerId_sholud mension here
 
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
	
	
//shipment and tracking details at tracking model
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	//shipment and tracking details at tracking model
 if(isset($_POST["customer_order_item_feedback"]))
	{
 	$customer_id = $_SESSION['cusid'] ;
	$customer_ord_id = $_POST['customer_ord_id'];
	$customer_item_feedback_description = $_POST['customer_item_feedback_description'];
	$g_rating = $_POST['g_rating'];
	
			
	 date_default_timezone_set('Asia/Kolkata');
		//define date and time
	 $date = date("Y-m-d"); // get the date
 
 	$sql = "INSERT INTO `comments_tbl`(`customer_id`,`date`,`comment_type`,`customer_ord_id`,`description`,`feedback_img_1`,`feedback_img_2`,`feedback_img_3`,`rating`) VALUES ($customer_id,'$date',3,$customer_ord_id,'$customer_item_feedback_description','image1','image2','image3',$g_rating)";
	mysqli_query($con,$sql);
		
	 
	// used to get the order id through customer order id
	$sql = "SELECT * FROM customer_ord_prds WHERE customer_ord_id=$customer_ord_id " ;
		$check_query = mysqli_query($con,$sql);
		$row_data = mysqli_fetch_array($check_query);
		$order_id = $row_data["order_id"];

 	 
	// update parcel recived date
	$sql = "update delivery_tbl set prd_received_date='$date' where order_id=$order_id" ;
	$check_query = mysqli_query($con,$sql);	
	
	//update customer order status = 3
	$sql = "update customer_ord_prds set order_status=3  WHERE customer_ord_id=$customer_ord_id " ;
	$check_query = mysqli_query($con,$sql);	
	
	echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>  Thank you for your feedback!</strong>  </div>";
  
		  

	}
	
	
	
//get customer ordered item feedback
 if(isset($_POST["get_customer_order_item_feedback"]))
	{
		
	$product_id = $_POST['product_id'];
	$sql = "SELECT comments_tbl.date,comments_tbl.customer_id,comments_tbl.description,comments_tbl.feedback_img_1,comments_tbl.feedback_img_2,comments_tbl.feedback_img_3 FROM comments_tbl
	WHERE customer_ord_prds.customer_ord_id= " ;
	$check_query = mysqli_query($con,$sql);
		
		 
		
	 if(mysqli_num_rows($check_query) > 0){
		while($row = mysqli_fetch_array($check_query))
		{ 
			echo "";
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
  
  
  
  
  
  
  
  
  
?>