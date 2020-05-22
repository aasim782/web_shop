<?php
session_start();
//database connection
include "../db_conn/config.php"; 

//used for admin panel product adding model
if(isset($_POST['get_product_id']))
{
$sql = "SELECT max(product_id) as max_pid FROM product_tbl" ;
$check_query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($check_query);
$pid = $row["max_pid"]+1;
echo "$pid";
}


 
 
 
//get the date
if(isset($_POST['get_date']))
{
	
$today= date('Y-m-d');
 echo "$today";
	
}



//add the product to product table
if(isset($_POST['add_to_prd_tbl']))
{
	$Product_id= $_POST['Product_id'];
	$prd_add_date= $_POST['prd_add_date'];
	$get_category= $_POST['get_category'];
	$get_brand= $_POST['get_brand'];
	$product_name= $_POST['product_name'];
	$product_price= $_POST['product_price'];
	$prd_img= $_POST['prd_img'];
	$product_desc= $_POST['product_desc'];
	$product_keywords= $_POST['product_keywords'];
	
	$sql = "INSERT INTO `product_tbl`(`product_id`, `product_category`, `product_brand`, `product_name`, `product_desc`, `product_img`, `product_price`, `product_keywords`) VALUES ($Product_id,'	$get_category','$get_brand','$product_name','$product_desc','$prd_img',$product_price,'$product_keywords')";
	
	 
	if(mysqli_query($con,$sql))
	{
	
			echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

	}
}




//get the category for product add model
if(isset($_POST["get_category_admin"])){

$sql = "SELECT  * from category_tbl";
$check_query = mysqli_query($con,$sql);
		echo "<option value='0' selected>Choose Category...</option>";
			while($row = mysqli_fetch_array($check_query))
						{	$category_id = $row["category_id"];
							$category_name = $row["category_name"];
						 
								//option list output	
								echo "<option value='$category_id'>$category_name</option> ";
								
							
						}
						

}



//get the brand for product add model
if(isset($_POST["get_brand_admin"])){
$sql = "SELECT  * from brand_tbl";
$check_query = mysqli_query($con,$sql);

		echo "<option value='0' selected>Choose Brand...</option>";
		
			while($row = mysqli_fetch_array($check_query))
						{	$brand_id = $row["brand_id"];
							$brand_name = $row["brand_name"];
						 
								//option list output	
								echo "<option value='$brand_id'>$brand_name</option> ";
								
							
						}
						

}





//add the category to table
if(isset($_POST["add_category_admin"])){
	
	$category_name= $_POST['category_name'];
	
	
	
	
	$sql = "INSERT INTO `category_tbl`(`category_name`) VALUES ('$category_name')";
	 
	if(mysqli_query($con,$sql))
	{
	
			echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

	}
}


//add the brand to table
if(isset($_POST["add_brand_admin"])){
	$brand_name= $_POST['brand_name'];
	$sql = "INSERT INTO `brand_tbl`(`brand_name`) VALUES ('$brand_name')";
	 
	if(mysqli_query($con,$sql))
	{
	
			echo "<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

	}
	
	
}


if(isset($_POST["admin_userLogin"])){
		$admin_email = $_POST["admin_email"]; // mysql_real_escape_string used prevent from @ - sysmbol enter values
		$admin_password= md5($_POST["admin_password"]);// get password encryption
	
		$sql = "SELECT * FROM admin_tbl WHERE email = '$admin_email' and password='$admin_password' " ;
		$check_query = mysqli_query($con,$sql);
		$count_email = mysqli_num_rows($check_query);
		if($count_email==1)
		{
				$row = mysqli_fetch_array($check_query);
				$_SESSION['adminid'] = $row['email'];
				$_SESSION['password'] = $row['password'];
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert' 
				data-auto-dismiss><strong>Successfully login</strong> <button type='button' 
				class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				echo "<script> window.location.assign('dashboard.php'); </script>";	
		}
		else
		{
	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' 
		data-auto-dismiss>Please check your<strong> email or password</strong> <button type='button' 
		class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			
		}

}



//get all product for admin product table
if(isset($_POST["get_admin_product"]) || isset($_POST["edit_admin_product"])  || isset($_POST["delete_admin_product"])){
	
	$product_query = "SELECT  product_tbl.product_id,product_tbl.product_name,product_tbl.product_price,product_tbl.product_desc,product_tbl.product_total_qty,product_tbl.product_img,category_tbl.category_name,brand_tbl.brand_name
					 from product_tbl,category_tbl,brand_tbl
					 where (product_tbl.product_category = category_tbl.category_id) and (product_tbl.product_brand = brand_tbl.brand_id) and product_tbl.active=1";
	$run_query = mysqli_query($con,$product_query);

	if(isset($_POST["get_admin_product"]))
	{	$i=1;
		if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query))
			{
				$product_id = $row["product_id"];
				$product_category = $row["category_name"];
				$product_brand = $row["brand_name"];
				$product_name = $row["product_name"];
				$product_price = $row["product_price"];
				$product_desc = $row["product_desc"];
				$product_img = $row["product_img"];
				$product_total_qty = $row["product_total_qty"];
				echo "	
	 
					<tr  class='text-center'>
						<td>$i</td>
						<td>$product_name</td>
						<td> <img src='../prg_img/$product_img' width='50px' height='40px'></td>
						<td>$product_category</td>
						<td>$product_brand</td>
						<td>Rs.$product_price.00</td>
						<td>$product_total_qty</td>
						<td>
						 <div class='btn-group '>
						 <a href='' product_edit_id='$product_id' class='btn btn-info product_edit'><i class='fa fa-edit'></i></a>
						<a href='' product_delete_id='$product_id' class='btn btn-danger product_delete'><i class='fa fa-trash-alt'></i></a>
						</div> 
						</td>
					  </tr>";
					  $i++;
	 
			}
		
		
		
		}
	}
	elseif( isset($_POST["edit_admin_product"])){

	}
	elseif( isset($_POST["delete_admin_product"]))
	{

	$delete_id = $_POST["product_delete_id"];
	$product_query = "UPDATE `product_tbl` SET `active`= 0 WHERE product_id = $delete_id";
	$run_query = mysqli_query($con,$product_query);
	
	echo "<div class='alert alert-success alert-dismissible fade show' role='alert' 
	data-auto-dismiss>Category <strong> successfully deleted</strong> <button type='button' 
	class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";


	}
	

}


if(isset($_POST["get_admin_category"]) || isset($_POST["edit_admin_category"]) || isset($_POST["remove_admin_category"])){

$category_query = "SELECT * FROM category_tbl where active= 1 ";
$run_query = mysqli_query($con,$category_query);
 
	if(isset($_POST["get_admin_category"]))
	{	$i=1;
		if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query))
				{
					$category_id = $row["category_id"];
					$category_name = $row["category_name"];
					echo "
						  <tr  class='text-center'>
							<td>$i</td>
							<td>$category_name</td>
							 
							<td>
	
							<div class='btn-group '>
							<a href='' category_edit_id='$category_id'  data-toggle='modal' data-target='#Category_edit_model' class='btn btn-info category_edit'><i class='fa fa-edit'></i></a>
							<a href='' category_delete_id='$category_id' class='btn btn-danger category_delete'><i class='fa fa-trash-alt'></i></a>
							</div> 
							</td>
						  </tr> 
						   
					"; $i++;
				}
			}	
	}
	
 else if(isset($_POST["edit_admin_category"]))
	{
		
	$edit_id = $_POST["edit_id"];
	$category_query = "SELECT * FROM category_tbl where category_id = '$edit_id' ";
	$run_query = mysqli_query($con,$category_query);
	$row = mysqli_fetch_array($run_query);
 	$category_name = $row["category_name"];
	echo "10";
		
	}
	else if(isset($_POST["remove_admin_category"]))
	{
		
	$delete_id = $_POST["delete_id"];
	$category_query = "UPDATE `category_tbl` SET `active`= 0 WHERE category_id = $delete_id";
	$run_query = mysqli_query($con,$category_query);
	
	echo "<div class='alert alert-success alert-dismissible fade show' role='alert' 
	data-auto-dismiss>Category <strong> successfully deleted</strong> <button type='button' 
	class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

	}
	


}

 

if(isset($_POST["get_admin_brand"]) || isset($_POST["edit_admin_brand"]) || isset($_POST["delete_admin_brand"])){
	$category_query = "SELECT * FROM brand_tbl where active = 1";
$run_query = mysqli_query($con,$category_query);

	if(isset($_POST["get_admin_brand"]))
	{
		$i=1;
		if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query))
			{
				$brand_id = $row["brand_id"];
				$brand_name = $row["brand_name"];
				echo "
					 <tr  class='text-center'>
						<td>$i</td>
						<td>$brand_name</td>
						 
						<td>
	
						<div class='btn-group '>
						<a href='' brand_edit_id='$brand_id' class='btn btn-info brand_edit'><i class='fa fa-edit'></i></a>
						<a href='' brand_delete_id='$brand_id' class='btn btn-danger brand_delete'><i class='fa fa-trash-alt'></i></a>
						</div> 
						</td>
					  </tr> 
				";
				$i++;
			}
		}
	}
	else if(isset($_POST["edit_admin_brand"]))
	{
		
		
		
		
		
	}
	else if(isset($_POST["delete_admin_brand"]))
	{
		
	$delete_id = $_POST["brand_delete_id"];

	
	$brand_query = "UPDATE `brand_tbl` SET `active`= 0 WHERE brand_id = '$delete_id' ";
	$run_query = mysqli_query($con,$brand_query);
	
	echo "k";
		
	}
	
	

}





?>