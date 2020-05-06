<?php
session_start();
//database connection
include "db_conn/config.php"; 

//left side category list 
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM category_tbl";
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
			echo " <a href='#' class='list-group-item list-group-item-action' data-toggle='modal' data-target='#customes_order'  >Customs Order</a>";
	}
}





if(isset($_POST["filter_category_list_item"])){
		$category_query = "SELECT * FROM category_tbl";
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
	$brand_query = "SELECT * FROM brand_tbl";
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
	$sql = "SELECT * FROM product_tbl";
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
	
	$page_number_limit=9; //per page have 9 products
	
	if(isset($_POST["setpagenumber"])){
		
		$pageno=$_POST["pagenumber"];
		$start=($pageno*$page_number_limit)-$page_number_limit;
	}
	else{
		$start=0;
	}
	
	
	$product_query = "SELECT * FROM product_tbl LIMIT $start,$page_number_limit";
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
            <div class='card'> 
			<div class='card-header' style='font-size:15px;background-color:#f5f5f5'> <b>$product_name</b>
			
		<button type='button'  style='float:right;' class='btn btn-warning'><i class='fas fa-search' ></i></button>
					<div style='padding-top:1px;' >
					<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
					<i class='fas fa-star'></i>
					</div>
			</div>
			
		   <div class='text-center' >
			<img  class='card-img-bottom text-center ' src='prg_img/$product_img' align='center' style='padding-top:10px;padding-bottom:10px;width:120px;height:160px'/><br>		
			</div>
         
    <div class='form-group row justify-content-center'>

        <label for='inputPassword' class='p-1'>QTY :</label>
        <div class='col-sm-4'>
            <input type='number' class='form-control' size='2' pid='$product_id' value='1'  id='qty-$product_id' >
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
}
//  pid='$product_id' -- defind for when the user click any prd that prd id will get 
//id='this_product_btn' -- defind for particular product button /products button /add to card button





//Get the product through category,brand or search button
if(isset($_POST["get_selected_category"]) || isset($_POST["get_selected_brand"]) || isset($_POST["get_search"])){
	
	if(isset($_POST["get_selected_category"])) //when we search through the category
	{
		$selected_cid = $_POST["selected_cid"];
		$query = "SELECT * FROM product_tbl where product_category='$selected_cid'";
	}
	else if(isset($_POST["get_selected_brand"]))    //when we search through the brand
	{ 
		$selected_bid = $_POST["selected_bid"];
		$query = "SELECT * FROM product_tbl where product_brand='$selected_bid'";
	}
	
	else    //when we search through the brand
	{ 
		$selected_keywords = $_POST["keywords"];
		$query = "SELECT * FROM product_tbl where product_keywords LIKE '%$selected_keywords%'";
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
            <div class='  card'> 
			<div class='card-header' style='font-size:15px;background-color:#f5f5f5'> <b>$product_name</b>
			
		<button type='button'  style='float:right;' class='btn btn-warning'><i class='fas fa-search' ></i></button>
					<div style='padding-top:1px;' >
					<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
                	<i class='fas fa-star ' style='color:orange'></i>
					<i class='fas fa-star'></i>
					</div>
			</div>
			
		   <div class='text-center' >
			<img  class='card-img-bottom text-center ' src='prg_img/$product_img' align='center' style='padding-top:10px;padding-bottom:10px;width:120px;height:160px'/><br>		
			</div>
         
    <div class='form-group row justify-content-center'>

        <label for='inputPassword' class='p-1'>QTY :</label>
        <div class='col-sm-4'>
            <input type='number' class='form-control' size='2' pid='$product_id' value='1'  id='qty-$product_id' >
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
			  <h4 class='alert-heading'>We haven't such a product right now.!</h4>
			  <p>We have sorry to say, we haven't such a product.!</p>
			  <p  >You can make a customes order </p>
			  <button class='btn btn-danger mt-2' ><i class='fa fa-shopping-cart'></i> CLICK HERE</button>  </p>
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
		data-auto-dismiss><strong>Successfully Registered</strong> <button type='button' 
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
				data-auto-dismiss><strong>Successfully login</strong> <button type='button' 
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
	$customer_id = $_SESSION['cusid'] ;
	$product_id = $_POST['product_id']; 
	$product_qty = $_POST['product_qty']; 
	
	$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and product_id='$product_id' and payment_status='0'" ;
	$check_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($check_query);
		if($count>0)
		{
				echo "	<div class='alert alert-danger alert-dismissible fade show col-lg-12' role='alert'>
				  <strong>Product already added to the Cart..! </strong>. 'You can increase your quantity at cart page'
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				  </button>
				</div> ";
			
		}
		else
		{						
				$sql ="SELECT * FROM product_tbl WHERE product_id = '$product_id'" ;
					$check_query = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($check_query);
					$product_id = $row["product_id"];
					$product_price = $row["product_price"];
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
						$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' " ;
						$check_query = mysqli_query($con,$sql);
						$row1 = mysqli_num_rows($check_query);
						
					if($row1>0)	
					{		//customer have any paid orders
						$sql = "SELECT order_id FROM customer_ord_prds WHERE customer_id = '$customer_id' and ( payment_status=0) " ;
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
									$sql = "SELECT max(order_id) as max_order_id  FROM customer_ord_prds " ;
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
	
				$sql ="SELECT * FROM product_tbl WHERE product_id = '$product_id'" ;
					$check_query = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($check_query);
					$product_id = $row["product_id"];
					$product_price = $row["product_price"];
					
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
								
								mysqli_query($con,$sql);
									echo "<div class='alert alert-success alert-dismissible fade show col-lg-12' role='alert'>
									  <strong>Product Successfully added to</strong> the Cart..!
									  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
									  </button>
									</div> ";
								
							
								
			
				
				
		
		}
	
	

	
}

//count the orderes for to nav badget
if(isset($_POST["cart_count"]))
{
	$customer_id = $_SESSION['cusid'] ;
			$sql ="SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and payment_status=0" ;
					$check_query = mysqli_query($con,$sql);
					echo mysqli_num_rows($check_query);	//total row for that customer ordered without payment
	
}



//count the orderes for to nav badget
if(isset($_POST["orderd_prd_count"]))
{
	$customer_id = $_SESSION['cusid'] ;
			$sql ="SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and (payment_status=1 or payment_status=2 or payment_status=3)" ;
					$check_query = mysqli_query($con,$sql);
					echo mysqli_num_rows($check_query);	//total customer orded product (with different payment)
	
}


if(isset($_POST["nav_list_total"]))
{
$customer_id = $_SESSION['cusid'] ;
$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and payment_status='0'" ; //payment_status - 0 unpaid,1-online tra,2-bank,3-cahone delivery
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
$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and payment_status='0'" ; //payment_status - 0 unpaid,1-online tra,2-bank,3-cahone delivery
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
						
						$current_total_price =  	$current_price_per_prd* $order_qtry;
						
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
									
														echo "<tr>
															<th class='col-2'>$no</th>
																<td><img height='50px' width='50px' src='prg_img/$product_img' alt='Third slide'></td>
																<td style='width: 30%'><label>$product_name</label></td>
															<td class='col-sm-1 col-md-1 text-center'><strong>$order_qtry</strong></td>
															<td class='col-sm-1 col-md-1 text-center'><strong>$current_total_price</strong></td>
															</tr>
								
								
								";}			
															
								
								
									
							else{
											
											echo " <div class='row mb-2 mt-4'>
														<div class='col-md-1 text-center'><b>$no.</b></div>
														<div class='col-md-3'><img height='55px' class='mr-3' width='55px' src='prg_img/$product_img' >$product_name
														
														 
																<textarea class='form-control mt-2 note' id='note-$product_id'   pid='$product_id'     name='customer_note' rows='2' size='4'  placeholder='Note...'>$customer_note</textarea>
														 
														
														
														</div>
												
															
														<div class='col-md-1  '>	
												
														<input type='number'  class='form-control text-center qty ' id='qty-$product_id' pid='$product_id'  value='$order_qtry'>
														
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
							
							
						$sql = "SELECT * FROM customer_tbl WHERE customer_id = '$customer_id'" ;
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
						
						
					$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and payment_status=0" ;
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
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
						<div class='text-center m-2'><button class='btn btn-warning ' type='button'  data-toggle='modal' data-target='#bankdepModel'  >Upload</button></div>
					  </div>
					</div>
					
					
					
					<div class='collapse multi-collapse' id='cash_on_delivery_btn_click'>
					  <div class='card card-body'>
						Cash on delivery only posible under 50,000 on ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
						that have term and conditions
						<div class='text-center m-2'><input type='button' class='btn btn-warning' value='Agree to conform' id='cash_on_delivery_btn'></div>
					  </div>
					</div>
					
				  </div>
				 
				</div>
					
					
					</div>
					
				  </div>
	
		<input type='hidden' name='merchant_id' value='1214039'>    <!-- Replace your Merchant ID -->
		<input type='hidden' name='return_url' value='http://localhost/project34/payment_success.php'>
		<input type='hidden' name='cancel_url' value='http://localhost/project34/payment_cancel.php'>
		<input type='hidden' name='notify_url' value='http://localhost/project34/cart.php'>  
	
	

			 
		<input type='hidden' name='order_id' value='$order_id'>
		<input type='hidden' name='items' value='Door bell wireless'><br>
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







if(isset($_POST["removefromcart"])){
$customer_id = $_SESSION['cusid'] ;
$remove_product_id = $_POST['remove_product_id'];

 $sql = "Delete FROM customer_ord_prds WHERE customer_id = '$customer_id' AND product_id='$remove_product_id' AND payment_status = 0" ;
	$check_query = mysqli_query($con,$sql);
	if($check_query){
		
		echo "	<div class='alert alert-danger alert-dismissible fade show col-lg-12' role='alert'>
							  <strong>Product Successfully deleted</strong> from Cart..!
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div> ";
	}
}



if(isset($_POST["updatefromcart"])){
$customer_id = $_SESSION['cusid'] ;
$update_product_id = $_POST['update_product_id'];
$new_qty = $_POST['new_qty'];
$current_product_total = $_POST['current_product_total'];
$customer_note = $_POST['customer_note'];

 $sql = "update customer_ord_prds set order_qtry='$new_qty', customer_note='$customer_note' WHERE customer_id = '$customer_id' AND product_id='$update_product_id' AND payment_status = 0" ;
	$check_query = mysqli_query($con,$sql);
	if($check_query){
		
		echo "	<div class='alert alert-success alert-dismissible fade show col-lg-12' role='alert'>
							  <strong>Product Successfully updated</strong> to the Cart..!
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div> ";
	}
}




if(isset($_POST["myorder"])){
$total=0;
$customer_id = $_SESSION['cusid'] ;
$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and (payment_status=1 or  payment_status=2 or payment_status=3)" ;
$check_query = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($check_query))
						{
						$customer_ord_id = $row["customer_ord_id"];
						$order_id = $row["order_id"];
						$order_qtry = $row["order_qtry"];
						$product_id = $row["product_id"];
						$current_price_per_prd = $row["current_price_per_prd"];
						$customer_note = $row["customer_note"];
						$current_total_price =  $current_price_per_prd* $order_qtry;
						
						$sql2 = "SELECT * FROM payment_tbl where order_id=$order_id" ;
						$check_query2 = mysqli_query($con,$sql2);
						
						while($row = mysqli_fetch_array($check_query2))
						{
							$payment_date = $row["payment_date"];
					
						
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
						
						
															
	echo "
				 <div class='row '>		
				<div class='row col-12 shadow-sm col-sm   border rounded ml-1 mb-3'>
				  <div class='col-12 mt-3'>
				   <div class='row '>
							<div class='col-sm'>
							  Order ID : <b>$customer_ord_id</b> 
							</div>
							
							<div class='col-sm text-right'>
							Ordered Date :<b> $payment_date  </b> 
							</div>
						  </div>
				  </div>
				  <div>
						<img src='prg_img/$product_img' class='ml-2 mt-2 '  height='100px' width='100px'></div> 
						  <div class='card-body'>
						  <div class='container'>
					 
						  <div class='row'>
							<div class='col-sm'>
							<b> $product_name</b> 
							</div>
							
							<div class='col-sm'>
							Payment Status :<b class='text-success'> Payment veriifed  </b> 
							</div>
						  </div>
						  
						  
						  
						  
						  <div class='row mt-2'>
								<div class='col-sm'>
							<p class='card-text text-left'>Price : <b>Rs.$current_price_per_prd.00</b> </p>
								</div>	<div class='col-sm'>
										<p class='card-text text-center'>QTY : <b>$order_qtry</b> </p>
								</div>
								
								<div class='col-sm'>
								<p class='card-text text-right'>Total : <b>Rs.$current_total_price</b> </p>
								</div>	
								</div>	
							<p class='card-text mt-2 '>Note : <small><b>$customer_note</b></small></p>
							  </div>
								

								<div class='btn-group mt-2 '>
										<a href='' class='btn btn-warning mr-2 rounded '><i class='fa fa-check'></i> Conform goods Received </a>
										<a href='' class='btn btn-danger mr-2 rounded'><i class='fa fa-search'></i> Track Order </a>
										<a href='message.php' class='btn btn-dark mr-2  rounded'><i class='fa fa-sms'></i> message</a>
					
										</div>
						  </div>
						  </div>
						</div>
	";
							
							
							}	
								
								

	
	
} 

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
						echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> password changed<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
						}	
												
					}
					else
						{
													
						echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> your old password is wrong<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
					
													
						}
									
			
	}
	

if(isset($_POST["complain_items"])){
$customer_id = $_SESSION['cusid'] ;
//get the customer_ord_id from customer_ord_prds table *
$sql = "SELECT  customer_ord_prds.customer_ord_id,customer_ord_prds.product_id 
		FROM customer_tbl,customer_ord_prds 
		WHERE customer_tbl.customer_id = customer_ord_prds.customer_id 
		AND (customer_ord_prds.customer_id = '$customer_id' and (customer_ord_prds.payment_status=1 or  customer_ord_prds.payment_status=2 or customer_ord_prds.payment_status=3))" ;
$check_query = mysqli_query($con,$sql);

	echo " <option >Please Select Order .. </option>";
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
if(isset($_POST["complain_msg"])){
$customer_id = $_SESSION['cusid'] ;
$customer_ord_id = $_POST['customer_ord_ids'] ;
$complain_message = $_POST['complain_messages'] ;

$sql = "INSERT INTO `comments_tbl` (comments_id,customer_id,comment_type,customer_ord_id,description) VALUES (NULL, $customer_id,'complain' ,$customer_ord_id, '$complain_message')";
$check_query = mysqli_query($con,$sql);

echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Complain !</strong> Successfully send to the seller<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
						


}

// 
if(isset($_POST["bank_dep"])){
$customer_id = $_SESSION['cusid'] ;
		$dep_date = $_POST["dep_date"];
		$dep_time = $_POST["dep_time"];
		$branch_name = $_POST["branch_name"];	
		$upolod_slip_img = $_POST["upolod_slip"];	
 

$sql = "SELECT * FROM customer_ord_prds WHERE customer_id = '$customer_id' and (payment_status=0)" ;
$check_query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($check_query);
$order_id = $row["order_id"];
						
				 
						$today= date('Y-m-d'); //get system dates
						
						 
							$sql = "update customer_ord_prds set payment_status=1 where customer_id= '$customer_id' && order_id = '$order_id' ";
							mysqli_query($con,$sql);
							
							$sql = "INSERT INTO `payment_tbl`(`order_id`, `payment_date`, `paymen_catg`) VALUES ('$order_id','$today','2')";
						 	if(	mysqli_query($con,$sql))
								{
									
										$sql = "SELECT payment_id FROM payment_tbl WHERE order_id = '$order_id'" ;
										$check_query = mysqli_query($con,$sql);
										$row = mysqli_fetch_array($check_query);
											$payment_id = $row["payment_id"];
	
								$sql = "INSERT INTO `bank_dep_tbl`(`payment_id`,`dep_date`,`dep_time`,`branch_name`,`upolod_slip_img`) VALUES ($payment_id,'$dep_date','$dep_time','$branch_name','$upolod_slip_img')";
									mysqli_query($con,$sql);
									
								echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong> Your order completed !</strong>Please wait until seller verify your payment<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 
										
								}
 
}

?>