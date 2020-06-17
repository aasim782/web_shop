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


 

//Get all category for the add product form 
if(isset($_POST["get_category_admin"])){

$sql = "SELECT  * from category_tbl where active=1";
$check_query = mysqli_query($con,$sql);
		echo "<option value='0' selected>Choose Category...</option>";
			while($row = mysqli_fetch_array($check_query))
						{	$category_id = $row["category_id"];
							$category_name = $row["category_name"];
						 
								//option list output	
								echo "<option value='$category_id'>$category_name</option> ";
								
							
						}
						

}



//Get all brand for the add product form 
if(isset($_POST["get_brand_admin"])){
$sql = "SELECT  * from brand_tbl where active=1";
$check_query = mysqli_query($con,$sql);

		echo "<option value='0' selected>Choose Brand...</option>";
		
			while($row = mysqli_fetch_array($check_query))
						{	$brand_id = $row["brand_id"];
							$brand_name = $row["brand_name"];
						 
								//option list output	
								echo "<option value='$brand_id'>$brand_name</option> ";
								
							
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




 


//Prduct Related Codes
if(isset($_POST['add_to_prd_tbl']) || isset($_POST["get_admin_product"]) || isset($_POST["edit_admin_product"])  || isset($_POST["delete_admin_product"]) || isset($_POST["product_count"])){
	
	$product_query = "SELECT  product_tbl.product_id,product_tbl.product_name,product_tbl.product_price,product_tbl.product_desc,product_tbl.product_total_qty,product_tbl.product_img,category_tbl.category_name,brand_tbl.brand_name
					 from product_tbl,category_tbl,brand_tbl
					 where (product_tbl.product_category = category_tbl.category_id) and (product_tbl.product_brand = brand_tbl.brand_id) and product_tbl.active=1";
	$run_query = mysqli_query($con,$product_query);
 
	if(isset($_POST['add_to_prd_tbl']) )
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
			$prd_total_qty= $_POST['prd_total_qty'];
			
		
		 //check product is exist or not active
		$sql = "SELECT * FROM product_tbl WHERE product_name = '$product_name' && active=1" ;
		$check_query = mysqli_query($con,$sql);
		$chk_ext_product_active = mysqli_num_rows($check_query);


		
		 //check product is exist or not inactive
		$sql1 = "SELECT * FROM product_tbl WHERE product_name = '$product_name' && active=0 " ;
		$check_query1 = mysqli_query($con,$sql1);
		$chk_ext_product_inactive = mysqli_num_rows($check_query1);

		if($chk_ext_product_active > 0){
			echo "1";
			 
		} 
		elseif($chk_ext_product_inactive>0){
			
			 echo "2";
		}
		else
		{
			
				$sql1= "INSERT INTO `product_tbl`(`product_id`, `product_category`, `product_brand`, `product_name`, `product_desc`, `product_img`, `product_price`,`product_total_qty`,`product_keywords`) VALUES ($Product_id,'	$get_category','$get_brand','$product_name','$product_desc','$prd_img',$product_price,'$prd_total_qty','$product_keywords')";
	
							if(mysqli_query($con,$sql1))
							{
							
									echo "3";

							}
		}
	
	}
	else if(isset($_POST["get_admin_product"]))
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
	
	else if(isset($_POST["product_count"])){
		
	$Product_query = "SELECT COUNT(product_id) as total_product from product_tbl";
	$run_query = mysqli_query($con,$Product_query);
	$row = mysqli_fetch_array($run_query);
	$total_product_counted = $row["total_product"];
 
	
	
	$product_query1 = "SELECT COUNT(product_id) as total_product_active from product_tbl where active=1";
	$run_query1 = mysqli_query($con,$product_query1);
	$row1 = mysqli_fetch_array($run_query1);
	$total_product_active_counted = $row1["total_product_active"];
	echo "$total_product_active_counted";
	
	}
	

}


 






if(isset($_POST["Category_filter"]))
{
$search_val = $_POST["search_val"];
$category_query = "SELECT * FROM category_tbl where active= 1 ";
$run_query = mysqli_query($con,$category_query);
 
}







if(isset($_POST["get_admin_category"]) || isset($_POST["edit_category"]) || isset($_POST["remove_admin_category"]) ||  isset($_POST["update_admin_category"]) || isset($_POST["add_category_admin"]) || isset($_POST["category_count"])){

$category_query = "SELECT * FROM category_tbl where active= 1 ";
$run_query = mysqli_query($con,$category_query);
 
 
 
 
	//add the category to table
if(isset($_POST["add_category_admin"]))
{
	
	$category_name= $_POST['category_name'];	

	 
	 	 //check product is exist or not and it has active
		$sql = "SELECT * FROM category_tbl WHERE category_name = '$category_name' && active=1  " ;
		$check_query = mysqli_query($con,$sql);
		$chk_ext_category = mysqli_num_rows($check_query);


	 	 //check product is exist or not and it has inactive
		$sql1 = "SELECT * FROM category_tbl WHERE category_name = '$category_name' && active=0 " ;
		$check_query1 = mysqli_query($con,$sql1);
		$chk_ext_category_inactive = mysqli_num_rows($check_query1);
		
		//already ext and active
		if($chk_ext_category > 0)
		{
			echo "1";
			 
		} 
		//already ext but active
		else if($chk_ext_category_inactive > 0){
			
		 echo "2";
		}
		else
		{
				$sql2= "INSERT INTO `category_tbl`(`category_name`) VALUES ('$category_name')";
	 
				if(mysqli_query($con,$sql2))
				{
				
						echo "3";

				}
			
		}
	 
	 
	 
	
}

	else if(isset($_POST["get_admin_category"]))
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
							<a href='' category_edit_id='$category_id' class='btn btn-info category_edit'><i class='fa fa-edit'></i></a>
							<a href='' category_delete_id='$category_id' class='btn btn-danger category_delete'><i class='fa fa-trash-alt'></i></a>
							</div> 
							</td>
						  </tr> 
						   
					"; $i++;
				}
			}	
	}
	
 else if(isset($_POST["edit_category"]))
	{
		
	$edit_id = $_POST["pid"];
	$category_query = "SELECT * FROM category_tbl where category_id =  $edit_id ";
	$run_query = mysqli_query($con,$category_query);
	$row = mysqli_fetch_array($run_query);
 	$category_name = $row["category_name"];
	echo "$category_name";
		
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
	else if(isset($_POST["update_admin_category"]))
	{
		
			$Update_catg_id = $_POST["Update_catg_id"];
			$Update_Category_Val = $_POST["Update_Category_Val"];
		$sql = "update category_tbl set category_name='$Update_Category_Val' WHERE category_id = '$Update_catg_id'" ;
	$check_query = mysqli_query($con,$sql);
	
	
	}
	else if(isset($_POST["category_count"])){
		
		$category_query = "SELECT COUNT(category_id) as total_cat from category_tbl";
	$run_query = mysqli_query($con,$category_query);
	$row = mysqli_fetch_array($run_query);
	$total_cat_counted = $row["total_cat"];
 
	
	
	$category_query1 = "SELECT COUNT(category_id) as total_cat_active from category_tbl where active=1";
	$run_query1 = mysqli_query($con,$category_query1);
	$row1 = mysqli_fetch_array($run_query1);
	$total_cat_active_counted = $row1["total_cat_active"];
	echo "$total_cat_active_counted";
	
	}
	


}

 

if(isset($_POST["get_admin_brand"]) || isset($_POST["edit_brand"]) || isset($_POST["delete_admin_brand"]) || isset($_POST["add_brand_admin"]) || isset($_POST["update_admin_brand"])  || isset($_POST["brand_count"])){
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
	else if(isset($_POST["edit_brand"]))
	{
		
	$edit_id = $_POST["pid"];
	$brand_query = "SELECT * FROM brand_tbl where brand_id =  $edit_id ";
	$run_query = mysqli_query($con,$brand_query);
	$row = mysqli_fetch_array($run_query);
 	$brand_name = $row["brand_name"];
	echo "$brand_name";
		
		
		
	}
	else if(isset($_POST["delete_admin_brand"]))
	{
		
	$delete_id = $_POST["brand_delete_id"];

	
	$brand_query = "UPDATE `brand_tbl` SET `active`= 0 WHERE brand_id = '$delete_id' ";
	$run_query = mysqli_query($con,$brand_query);
	
 
		
	}
	else if(isset($_POST["add_brand_admin"])){
		
		$brand_name= $_POST['brand_name'];
		
		//check brand is exist or active
		$sql = "SELECT * FROM brand_tbl WHERE brand_name = '$brand_name' && active=1" ;
		$check_query = mysqli_query($con,$sql);
		$chk_ext_brand_active = mysqli_num_rows($check_query);
		
		
		
		//check brand is exist or not inactive
		$sql1 = "SELECT * FROM brand_tbl WHERE brand_name = '$brand_name' && active=0" ;
		$check_query1 = mysqli_query($con,$sql1);
		$chk_ext_brand_inactive = mysqli_num_rows($check_query1);
 
	
		//already ext and active
		if($chk_ext_brand_active > 0)
		{
			echo "1";
			 
		} 
		//already ext but active
		else if($chk_ext_brand_inactive > 0)
		{
			echo "2";
		}
		else
		{
			 $sql = "INSERT INTO `brand_tbl`(`brand_name`) VALUES ('$brand_name')";
	 
			if(mysqli_query($con,$sql))
			{
			
					echo "3";
			}
	
			
		}
	
 
	}
	
		else if(isset($_POST["update_admin_brand"]))
	{
		
			$Update_brand_id = $_POST["Update_brand_id"];
			$Update_brand_Val = $_POST["Update_brand_Val"];
			$sql = "update brand_tbl set brand_name='$Update_brand_Val' WHERE brand_id = '$Update_brand_id'" ;
			$check_query = mysqli_query($con,$sql);
	
	
	}
	else if(isset($_POST["brand_count"])){
		
	$brand_query = "SELECT COUNT(brand_id) as total_brand from brand_tbl";
	$run_query = mysqli_query($con,$brand_query);
	$row = mysqli_fetch_array($run_query);
	$total_brand_counted = $row["total_brand"];
 
	
	
	$brand_query1 = "SELECT COUNT(brand_id) as total_brand_active from brand_tbl where active=1";
	$run_query1 = mysqli_query($con,$brand_query1);
	$row1 = mysqli_fetch_array($run_query1);
	$total_brand_active_counted = $row1["total_brand_active"];
	echo "$total_brand_active_counted";
	
	}
	
	
	

}



if(isset($_FILES["file"]["name"] ))
{
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = rand(100, 999) . '.' . $ext;
 $location = './upload/' . $name;  
 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
 echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
}




 

?>