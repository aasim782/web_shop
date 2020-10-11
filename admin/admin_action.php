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


//get product add form
if(isset($_POST["get_product_add_form"])){
echo "<div class='card card-warning card-outline'>   
	<div class='card-header text-center'  >
	<div class='card-tools'>
	<button type='button' class='btn btn-tool' data-card-widget='collapse'>
	<i class='fas fa-minus'></i></button><button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-times'></i></button></div>				<h2>Add Product</h2>              </div>			            <div class='card-body'>            <form id='product_reg_form' >	 		<div id='product_reg_msg' > </div>		  <div class='form-row'>			<div class='col-md-6'>			  <label for='validationCustom01'>Product ID</label>			  <input type='text' class='form-control text-center' id='Product_id_txt' name=''    disabled>					</div>						<div class='col-md-6'>			  <label for='validationCustom02'>Date</label>			  <input type='date' class='form-control text-center' id='prd_add_date_txt'  name=''  >					</div>			</div>							<div class='form-row mt-2'>     <div class='form-group col-6'>           <label for='validationCustom02'>Category</label>     <select id='get_category' class='form-control'></select>    </div>   
	<div class='form-group col-6'>   
	<label for='validationCustom02'>Brand</label>     
	<select id='get_brand' class='form-control'></select>   
	</div>   </div>		

 
  
	<div class='form-row '>		
	<div class='col-6'>		 
	<label for='validationCustom03'>Product Name</label>	
	<input type='text' class='form-control' id='product_name_txt'  maxlength='18' name='product_name' placeholder='Product Name'>	
	</div>	   		
		
		 
			<div class='col-sm'>
			<label for='validationCustom05'>Buying Price</label>	
			<input type='number'  min='1' class='form-control text-center' id='product_price_txt' placeholder='Price'>	
			</div>
		 
		 <div class='col-sm'>
			<label for='validationCustom05'>Profit rate %</label>	
			<input type='number'  min='1' class='form-control text-center' id='product_profit_txt' value='5' placeholder='Profit Rate'>	
		</div>
		 <div class='col-sm'>
			<label for='validationCustom05'>Price</label>	
			<input type='number'  min='1' class='form-control text-center' id='product_price_with_rate_txt' placeholder='Price' disabled>	
			</div>
			
	</div>  	     
	<div class='form-row mt-2  '>   
	<div class='col-6 form-group'>    <label for='validationCustom03'>Total Quantity</label>	  		  <input type='number' min='1'  class='form-control' id='Total_qty' maxlength='10' name='Total_qty' placeholder='Total Quantity' autocomplete='off'></div> <div class='form-group col-6'> 	   <label for='exampleFormControlFile1' class='mt-1'>Select Product Image</label>  <div class='custom-file' >  <input     type='file' name='file' id='file' ></div> </div>    <div class='col-6 form-group mt-2 text-center'></label></div>  </div>      <div class='form-row mt-2'> <div class='col-12'><label for='validationCustom05'>Product Description</label> <div class='col-md-12'>   <textarea class='textarea' id='product_desc_txt'  name='product_dec' placeholder='Place some text here'style='width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 30px;'></textarea>                            </div>           </div>        </div> <div class='form-row mt-2'> <div class='col-12'><label for='validationCustom03'>Product Keywords</label>	<div class='col-md-12'>    <textarea class='form-control' id='product_keywords_txt'  name='ProductKeyword' rows='3'></textarea>   </div> <div class='modal-footer'> <button type='button' id='form_prd_add_btn' name='form_prd_add_btn' class='btn btn-danger'>Add</button><button type='button' class='btn btn-secondary'    data-card-widget='remove' >Close</button></div></form> </div></div><script>$(function () { $('.textarea').summernote() })</script></div></div> ";
}



if(isset($_POST["admin_userLogin"])){
		$admin_email = $_POST["admin_email"]; // mysql_real_escape_string used prevent from @ - sysmbol enter values
		$admin_password= md5($_POST["admin_password"]);// get password encryption
	
		$sql = "SELECT * FROM user_tbl WHERE email = '$admin_email' and password='$admin_password' " ;
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
				echo "<script> window.location.assign('index.php'); </script>";	
		}
		else
		{
	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' 
		data-auto-dismiss>Please check your<strong> email or password</strong> <button type='button' 
		class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			
		}

}




 

 
 
 


//Prduct Related Codes
if(isset($_POST['add_to_prd_tbl']) || isset($_FILES["file"]["name"] ) || isset($_POST["get_admin_product"]) || isset($_POST["edit_admin_product"])  || isset($_POST["delete_admin_product"]) || isset($_POST["product_count"]) || isset($_POST["get_admin_product_filter"]) || isset($_POST["Prduct_table_footer_num"])){
	
	$page_number_limit=10; //per page have 10 products
	if(isset($_POST["setpagenumber"])){
		
		$pageno=$_POST["pagenumber"];
		$start=($pageno*$page_number_limit)-$page_number_limit;
	}
	else
	{
		$start=0;
	}
 
 
 
 
 //define a footer number of product
if(isset($_POST["Prduct_table_footer_num"])){
	$sql = "SELECT * FROM product_tbl where active=1";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno=ceil($count/10); //rouded 
	for($i=1;$i<=$pageno;$i++)
	{
			echo "<label class='page-item'><a class='page-link' href='#' product_tbl_page_num='$i' id='product_tbl_page_num'>$i</a></label>";
	}
}

	 
	$product_query = "SELECT  product_tbl.product_id,product_tbl.product_name,product_tbl.product_price,product_tbl.product_desc,product_tbl.product_total_qty,product_tbl.product_img,category_tbl.category_name,brand_tbl.brand_name
					 from product_tbl,category_tbl,brand_tbl
					 where (product_tbl.product_category = category_tbl.category_id) and (product_tbl.product_brand = brand_tbl.brand_id) and (product_tbl.active=1) ORDER BY product_tbl.product_id ASC   LIMIT $start,$page_number_limit";
	$run_query = mysqli_query($con,$product_query);
 
	 
 
 if(isset($_POST['add_to_prd_tbl']) )
	{  
		   
			$Product_id= $_POST['Product_id'];
			$prd_add_date= $_POST['prd_add_date'];
			$get_category= $_POST['get_category'];
			$get_brand= $_POST['get_brand'];
			$product_name= $_POST['product_name'];
			$product_price= $_POST['product_price'];
			$product_desc= $_POST['product_desc'];
			$product_keywords= $_POST['product_keywords'];
			$prd_total_qty= $_POST['prd_total_qty'];
			$product_profit_rate= $_POST['product_profit_rate'];
			  
			$orderid="Pid_".$Product_id.".";	
					
			/* Getting file name */
			$filename = $_FILES['file']['name'];
			  
			date_default_timezone_set('Asia/Kolkata');
			//define date and time
			$date = date('Y-m-d_H-i-s_', time());

			/* Location */
			$location = "./upload/"."Product_images."."/";
			$uploadOk = 1;
			$imageFileType = pathinfo($filename,PATHINFO_EXTENSION);


			$new_file_name=$date.$orderid.$imageFileType;
			$prd_img =$new_file_name;
			/* Valid extensions */
			$valid_extensions = array("jpg","jpeg","png");

			/* Check file extension */
			if(!in_array(strtolower($imageFileType), $valid_extensions)) {
					echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File extension not suppoted!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
			}
			else
			{ 	  
		
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
			
						 if($uploadOk == 0){
								echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File not uploded !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
						}
						else{
						   /* Upload file */
						  if(move_uploaded_file($_FILES['file']['tmp_name'],$location.$new_file_name)){
							 
						   }else{
								echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File not uploded !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
						
						   }
						} 
							
			
				$sql1= "INSERT INTO `product_tbl`(`product_id`, `product_category`, `product_brand`, `product_name`, `product_desc`, `product_img`, `profit_rate` , `product_price`,`product_total_qty`,`product_keywords`) VALUES ($Product_id,'	$get_category','$get_brand','$product_name','$product_desc','$prd_img','$product_profit_rate', $product_price,'$prd_total_qty','$product_keywords')";
	
							if(mysqli_query($con,$sql1))
							{
							
									echo "3";

							}
		}
	
	}
	}
	else if(isset($_POST["get_admin_product"]))
	{	

		$i=$start+1;
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
						<td> <img src='../admin/upload/Product_images/$product_img' width='50px' height='40px'></td>
						<td>$product_category</td>
						<td>$product_brand</td>
						<td>Rs.$product_price.00</td>
						<td>$product_total_qty</td>
						<td>
						 <div class='btn-group '>
						 <a href='' product_edit_id='$product_id' class='btn btn-info product_edit'><i class='fa fa-edit'></i></a>
						 <a href='' product_delete_id='$product_id'  data-toggle='modal' data-target='#product_del_confirm_Modal' class='btn btn-danger btn_product_delete'><i class='fa fa-trash-alt'></i></a>
						</div> 
						</td>
					  </tr>";
					  $i++;
	 
			}
		
		
		
		}
	}
	else if(isset($_POST["get_admin_product_filter"]))
	{
		
		$search_val = $_POST["Search_product_filter_table"];
	 
	  
	 	$prd_filter_sql = "SELECT  product_tbl.product_id,product_tbl.product_name,product_tbl.product_price,product_tbl.product_desc,product_tbl.product_total_qty,product_tbl.product_img,category_tbl.category_name,brand_tbl.brand_name
					 from product_tbl,category_tbl,brand_tbl
					where (product_tbl.product_category = category_tbl.category_id) and (product_tbl.product_brand = brand_tbl.brand_id) and (product_tbl.active=1) and (product_tbl.product_name like '%".$search_val."%' OR brand_tbl.brand_name like '%".$search_val."%'  OR category_tbl.category_name like '%".$search_val."%' OR product_tbl.product_total_qty like '%".$search_val."%' OR product_tbl.product_price like '%".$search_val."%')  ";
					$prd_filter_qry = mysqli_query($con,$prd_filter_sql);
					$get_filter_output = mysqli_num_rows($prd_filter_qry);

		$i=1;
		if(mysqli_num_rows($prd_filter_qry) > 0){
			while($row = mysqli_fetch_array($prd_filter_qry))
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
						<td> <img src='../admin/upload/Product_images/$product_img' width='50px' height='40px'></td>
						<td>$product_category</td>
						<td>$product_brand</td>
						<td>Rs.$product_price.00</td>
						<td>$product_total_qty</td>
						<td>
						 <div class='btn-group '>
						 <a href='' product_edit_id='$product_id' class='btn btn-info product_edit'><i class='fa fa-edit'></i></a>
					 	 <a href='' product_delete_id='$product_id'  data-toggle='modal' data-target='#product_del_confirm_Modal' class='btn btn-danger btn_product_delete'><i class='fa fa-trash-alt'></i></a>
					 </div> 
						</td>
					  </tr>";
					  $i++;
	 
			}
 
		}
		else
			{
				
						echo "	
	 
					<tr  class='text-center'>
					<td colspan='8'>No matching records found</td>
					  </tr>";
 
				
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


 


 
 

 


if(isset($_POST["get_admin_category"]) || isset($_POST["edit_category"]) || isset($_POST["remove_admin_category"]) ||  isset($_POST["update_admin_category"]) || isset($_POST["add_category_admin"]) || isset($_POST["category_count"]) || isset($_POST["get_admin_category_filter"]) || isset($_POST["Category_table_footer_num"])){

	$page_number_limit=5; //per page have 10 products
	if(isset($_POST["setpagenumber"])){
		
		$pageno=$_POST["pagenumber"];
		$start=($pageno*$page_number_limit)-$page_number_limit;
	}
	else
	{
		$start=0;
	}
 
 
 
 
  //define a footer number for category
if(isset($_POST["Category_table_footer_num"])){
	$sql = "SELECT * FROM category_tbl where active=1";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno=ceil($count/5); //rouded 
	for($i=1;$i<=$pageno;$i++)
	{
			echo "<label class='page-item'><a class='page-link' href='#' category_tbl_page_num='$i' id='category_tbl_page_num'>$i</a></label>";
	}
}


 
 
 
 
 
 
 
$category_query = "SELECT * FROM category_tbl where active= 1   LIMIT $start,$page_number_limit";
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
	{	$i=$start+1;
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
							<a  href='' category_delete_id='$category_id' data-toggle='modal' data-target='#category_del_confirm_Modal' class='btn btn-danger btn_category_delete'><i class='fa fa-trash-alt'></i></a>
							 
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
	
	$category_query = "UPDATE `product_tbl` SET `active`= 0 WHERE product_category = $delete_id";
	$run_query = mysqli_query($con,$category_query);
	
	
	echo "<div class='alert alert-success alert-dismissible fade show' role='alert' 
	data-auto-dismiss>Category <strong> Successfully deleted</strong> <button type='button' 
	class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

	}
	else if(isset($_POST["update_admin_category"]))
	{
		
			$Update_catg_id = $_POST["Update_catg_id"];
			$Update_Category_Val = $_POST["Update_Category_Val"];
		$sql = "update category_tbl set category_name='$Update_Category_Val' WHERE category_id = '$Update_catg_id'" ;
	$check_query = mysqli_query($con,$sql);
	
	
	}
	else if(isset($_POST["get_admin_category_filter"])){
		
		$search_val = $_POST["Search_category_filter_table"];
		
			 	 //check product is exist or not and it has active
		$sql1 = "SELECT * FROM category_tbl WHERE active=1 and category_name like '%".$search_val."%'" ;
		$check_query1 = mysqli_query($con,$sql1);
		$get_filter_output = mysqli_num_rows($check_query1);
 
		$i=1;
		if($get_filter_output> 0){
			while($row = mysqli_fetch_array($check_query1))
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
							 <a  href='' category_delete_id='$category_id' data-toggle='modal' data-target='#category_del_confirm_Modal' class='btn btn-danger btn_category_delete'><i class='fa fa-trash-alt'></i></a>
							 </div> 
							</td>
						  </tr> 
						   
					"; $i++;
				}
			}
			else
			{
				
						echo "	
	 
					<tr  class='text-center'>
					<td colspan='3'>No matching records found</td>
					  </tr>";
 
				
			}
		
		
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

 
 
 



if(isset($_POST["get_admin_brand"]) || isset($_POST["edit_brand"]) || isset($_POST["delete_admin_brand"]) || isset($_POST["add_brand_admin"]) || isset($_POST["update_admin_brand"])  || isset($_POST["brand_count"]) || isset($_POST["get_admin_brand_filter"]) ||isset($_POST["Brand_table_footer_num"])){

				 $page_number_limit=5; //per page have 10 products
				 if(isset($_POST["setpagenumber"])){
						
						$pageno=$_POST["pagenumber"];
						$start=($pageno*$page_number_limit)-$page_number_limit;
					}
					else
					{
						$start=0;
					}
				 

				 
				 //define a footer number for brand
				if(isset($_POST["Brand_table_footer_num"])){
					$sql = "SELECT * FROM brand_tbl where active=1 ";
					$run_query = mysqli_query($con,$sql);
					$count = mysqli_num_rows($run_query);
					$pageno=ceil($count/5); //rouded 
					for($i=1;$i<=$pageno;$i++)
					{
							echo "<label class='page-item'><a class='page-link' href='#' brand_tbl_page_num='$i' id='brand_tbl_page_num'>$i</a></label>";
					}
				}



$brand_query = "SELECT * FROM brand_tbl where active = 1 LIMIT $start,$page_number_limit";
$run_query = mysqli_query($con,$brand_query);

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
						<a  href='' brand_delete_id='$brand_id' data-toggle='modal' data-target='#brand_del_confirm_Modal' class='btn btn-danger btn_delete_model'><i class='fa fa-trash-alt'></i></a>
						
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
	
	$category_query = "UPDATE `product_tbl` SET `active`= 0 WHERE product_brand = $delete_id";
	$run_query = mysqli_query($con,$category_query);
	
	}
	else if(isset($_POST["add_brand_admin"]))
	{
		
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
	else if(isset($_POST["get_admin_brand_filter"]))
	{
		$search_val = $_POST["Search_brand_filter_table"];
		$brand_query = "SELECT * FROM brand_tbl where active = 1 and brand_name like '%".$search_val."%'";
		$run_query = mysqli_query($con,$brand_query);
		
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
						<a  href='' brand_delete_id='$brand_id' data-toggle='modal' data-target='#brand_del_confirm_Modal' class='btn btn-danger btn_delete_model'><i class='fa fa-trash-alt'></i></a>
						</div> 
						</td>
					  </tr> 
				";
				$i++;
			}
		}
			else
			{
				
						echo "	
	 
					<tr  class='text-center'>
					<td colspan='3'>No matching records found</td>
					  </tr>";
 
				
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







 
//get all ordered prd to order admin table 
 if(isset($_POST["all_customer_order"]) || isset($_POST["all_customer_order_footer_num"]) ){
	  
				$page_number_limit=10; //per page have 10 products
				 if(isset($_POST["setpagenumber"])){
						
						$pageno=$_POST["pagenumber"];
						$start=($pageno*$page_number_limit)-$page_number_limit;
					}
					else
					{
						$start=0;
					}
				 

				 
				 //define a footer number for brand
				if(isset($_POST["all_customer_order_footer_num"])){
					$sql = "SELECT customer_ord_prds.order_id,customer_ord_prds.order_date, customer_ord_prds.product_id 
						,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
					FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id &&  not(customer_ord_prds.order_status=3) && customer_ord_prds.active=1 ";
					$run_query = mysqli_query($con,$sql);
					$count = mysqli_num_rows($run_query);
					$pageno=ceil($count/10); //rouded 
					for($i=1;$i<=$pageno;$i++)
					{
							echo "<label class='page-item'><a class='page-link' href='#' all_order_table_footer_num='$i' id='all_order_table_footer_num'>$i</a></label>";
					}
				}
 
 
 //get all orders
 if(isset($_POST["all_customer_order"]) )
 {
	  $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.customer_ord_id,customer_ord_prds.order_date, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id &&  not(customer_ord_prds.order_status=3)  && customer_ord_prds.active=1 ORDER BY order_id ASC LIMIT $start,$page_number_limit " ;
 $check_query = mysqli_query($con,$sql);

$status_btn="";
$action_btn="";
$recipt="";
		 $i=$start+1;
		 
		while($row = mysqli_fetch_array($check_query))
			{
				$order_id = $row["order_id"];
				$order_date = $row["order_date"];
				$product_name = $row["product_name"];
				$last_name = $row["last_name"];
				$customer_note=$row["customer_note"];
				$payment_status=$row["payment_status"];
				$order_status=$row["order_status"];
				$customer_ord_id=$row["customer_ord_id"];
				 
	 
		
	 //$order_status=0 -> pending ,$order_status=1 ->process ,$order_status=2 -> Shipped, $order_status=3 ->compelted
	 //$payment_status=1 ->online  ,  $payment_status=2 ->bank , $payment_status=3 -> cash on delivery
		
		if(($payment_status==1 && $order_status==0) || ($payment_status==2 && $order_status==0) || ($payment_status==3 && $order_status==0) )
		{
			 $status_btn=   "<span class='badge badge-warning'> Pending</span>";
			 $action_btn=	"<button class='btn btn-success shadow'  id='order_accept_panding_btn' ordid='$order_id' cust_order_id='$customer_ord_id' ><i class='fa fa-check text-light'></i></button> 
			 <button cust_order_id='$customer_ord_id' class='btn btn-danger shadow remove'><i class='fa fa-times text-light'></i></button>";
		}
		
		else if(($payment_status==1 && $order_status==1) || ($payment_status==2 && $order_status==1) || ($payment_status==3 && $order_status==1) )
		{
			 $status_btn=   "<span class='badge badge-info'> Processing</span>";
			 $action_btn=	"<button class='btn btn-warning shadow' id='order_shipment_btn' ordid='$order_id'  cust_order_id='$customer_ord_id'  ><i class='fa fa-truck text-dark'></i></button>
							 <button cust_order_id='$customer_ord_id' class='btn btn-danger shadow remove'><i class='fa fa-times text-light'></i></button>";
		
		}
		else if($payment_status==0)
		{
			$action_btn= " ";
			$status_btn=   "<span class='badge badge-danger'> Unpaid</span> ";
			
		}
		if(($payment_status==1 && $order_status==2) || ($payment_status==2 && $order_status==2) || ($payment_status==3 && $order_status==2) )
		{
			 $status_btn=   "<span class='badge badge-success' > shipped</span>";
			 $action_btn=	"<button class='btn btn-success shadow'>Confirm products Received</button>";
		}
 
	  
		
 	//recipt button show on all order table in admin	 
	$sql_payment_category ="SELECT  payment_tbl.paymen_catg,payment_tbl.order_id,customer_ord_prds.order_status FROM payment_tbl,customer_ord_prds
	where (payment_tbl.order_id = customer_ord_prds.order_id) && (payment_tbl.order_id=$order_id) " ;
	$check_query_payment_category = mysqli_query($con,$sql_payment_category);
 	$row1 = mysqli_fetch_array($check_query_payment_category);
	$paymen_catg = $row1["paymen_catg"];
	$order_status = $row1["order_status"];
		
		
$msg= "<button class='btn btn-dark shadow'><i class='fas fa-envelope text-light'></i></button>";

		if($paymen_catg==1)
		{
		$recipt="";
		$paymen_catg_img="<img src='upload/1.jpg' width='50px' height='30px'>";
		}
		else if( $paymen_catg==2)
		{
		$paymen_catg_img="<img src='upload/2.jpg' width='50px' height='30px'>";
			  if($paymen_catg==2 && $order_status==0)
						{
						$recipt="<a href='' class='btn btn-info text-light shadow' ordid='$order_id' id='bankslip_image_btn' data-toggle='modal' data-target='#bank_recipt_model' ><i class='fa fa-list-alt'></i></a>";
							 
						}else
						{
							$recipt="";
						 
						}

		}
		else if($paymen_catg==3)
		{
		$recipt="";
		$paymen_catg_img="<img src='upload/3.jpg' width='50px' height='30px'>";
		
		}
		else
		{
			$paymen_catg_img="<span class='badge badge-danger'> Unpaid</span>";
			$recipt="<button cust_order_id='$customer_ord_id' class='btn btn-danger shadow remove'><i class='fa fa-times text-light'></i></button>";
		}
	  
		
		 
		echo " <tr class='text-center' >	
					 <td><b>$i</b></td>
                      <td >   $order_id  </td>
                      <td> $order_date</td>
                      <td> $last_name</td>
                      <td>$product_name</td>
                      <td>$paymen_catg_img</td>
                      <td >
					   $status_btn    
					  </td>
                 
					   <td>
						$action_btn  $recipt $msg
                      </td>
					   
                   </tr>
				  
					
					
					";
					
				 $i++	;
			}
	 
 }

	 
 }








 






 


 
//all order filter filter

if(isset($_POST["get_all_order_filter"]))
	{
		
 $search_val = $_POST["Search_all_orde_filter_table"];
 
 
 $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.customer_ord_id,customer_ord_prds.order_date, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id &&  not(customer_ord_prds.order_status=3) and  ((customer_ord_prds.order_id  like '%".$search_val."%') OR (customer_ord_prds.order_date like '%".$search_val."%') OR  (customer_tbl.last_name like '%".$search_val."%') OR  (product_tbl.product_name like '%".$search_val."%') OR  (product_tbl.product_name like '%".$search_val."%')) " ;
 $check_query = mysqli_query($con,$sql);
	$total_rows=mysqli_num_rows($check_query);
	
	
	if($total_rows>0){
		$status_btn="";
$action_btn="";
		$i=1;
		while($row = mysqli_fetch_array($check_query))
			{
				$order_id = $row["order_id"];
				$order_date = $row["order_date"];
				$product_name = $row["product_name"];
				$last_name = $row["last_name"];
				$customer_note=$row["customer_note"];
				$payment_status=$row["payment_status"];
				$order_status=$row["order_status"];
				$customer_ord_id=$row["customer_ord_id"];
				 
	  
	 //$order_status=0 -> Pending ,$order_status=1 ->process ,$order_status=2 -> Shipped, $order_status=3 ->compelted
	 //$payment_status=1 ->online  ,  $payment_status=2 ->bank , $payment_status=3 -> cash on delivery

				if(($payment_status==1 && $order_status==0) || ($payment_status==2 && $order_status==0) || ($payment_status==3 && $order_status==0) )
		{
			 $status_btn=   "<span class='badge badge-warning'> Pending</span>";
			 $action_btn=	"<button class='btn btn-success shadow'  id='order_accept_panding_btn' ordid='$order_id' cust_order_id='$customer_ord_id' ><i class='fa fa-check text-light'></i></button> 
			 <button cust_order_id='$customer_ord_id' class='btn btn-danger shadow remove'><i class='fa fa-times text-light'></i></button>";
		}
		
		else if(($payment_status==1 && $order_status==1) || ($payment_status==2 && $order_status==1) || ($payment_status==3 && $order_status==1) )
		{
			 $status_btn=   "<span class='badge badge-info'> Processing</span>";
			 $action_btn=	"<button class='btn btn-warning shadow' id='order_shipment_btn' ordid='$order_id'  cust_order_id='$customer_ord_id'  ><i class='fa fa-truck text-dark'></i></button>";
		}
		else if($payment_status==0)
		{
			$action_btn= " ";
			$status_btn=   "<span class='badge badge-danger'> Unpaid</span> ";
			
		}
		if(($payment_status==1 && $order_status==2) || ($payment_status==2 && $order_status==2) || ($payment_status==3 && $order_status==2) )
		{
			 $status_btn=   "<span class='badge badge-success' > shipped</span>";
			 $action_btn=	"<button class='btn btn-success shadow' disabled>Confirm goods Received </button>";
		}
		
		
		
		
		
		
 
 	
 	//recipt button show on all order table in admin	 
	$sql_payment_category ="SELECT  payment_tbl.paymen_catg,payment_tbl.order_id,customer_ord_prds.order_status FROM payment_tbl,customer_ord_prds
	where (payment_tbl.order_id = customer_ord_prds.order_id) && (payment_tbl.order_id=$order_id) " ;
	$check_query_payment_category = mysqli_query($con,$sql_payment_category);
 	$row1 = mysqli_fetch_array($check_query_payment_category);
	$paymen_catg = $row1["paymen_catg"];
	$order_status = $row1["order_status"];
		
		
$msg= "<button class='btn btn-dark shadow'><i class='fas fa-envelope text-light'></i></button>";

		if($paymen_catg==1)
		{
		$recipt="";
		$paymen_catg_img="<img src='upload/1.jpg' width='50px' height='30px'>";
		}
		else if( $paymen_catg==2)
		{
		$paymen_catg_img="<img src='upload/2.jpg' width='50px' height='30px'>";
			  if($paymen_catg==2 && $order_status==0)
						{
						$recipt="<a href='' class='btn btn-info text-light shadow' ordid='$order_id' id='bankslip_image_btn' data-toggle='modal' data-target='#bank_recipt_model' ><i class='fa fa-list-alt'></i></a>";
							 
						}else
						{
							$recipt="";
						 
						}

		}
		else if($paymen_catg==3)
		{
		$recipt="";
		$paymen_catg_img="<img src='upload/3.jpg' width='50px' height='30px'>";
		}
		else
		{
			$paymen_catg_img="<span class='badge badge-danger'> Unpaid</span>";
			$recipt="<button class='btn btn-danger shadow'><i class='fa fa-times text-light'></i></button>";
		}
	  
		 
		echo " <tr class='text-center' >	
					 <td><b>$i</b></td>
                      <td >   $order_id  </td>
                      <td> $order_date</td>
                      <td> $last_name</td>
                      <td>$product_name</td>
                      <td>$paymen_catg_img</td>
                      <td >
					   $status_btn    
					  </td>
                 
					   <td>
						$action_btn  $recipt $msg
                      </td>
					   
                   </tr>
				  
					
					
					";
					
				$i++	;
			}
	 
	 
	}
	  else
	  {
		  	 echo "
					<tr class='text-center'>
					<td colspan='8'>No matching records found</td>
					  </tr>";
		  
	  }
	 
	 

 
		}
		



















//get all pending order  to admin pending table    order status ->0
 if(isset($_POST["get_all_panding_orders"]) || isset($_POST["count_total_panding_order"]) ){
 
 $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.order_qtry,customer_ord_prds.customer_ord_id,customer_ord_prds.order_date, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.current_price_per_prd,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id   && ((customer_ord_prds.payment_status=1 || customer_ord_prds.payment_status=2 || customer_ord_prds.payment_status=3 ) && (customer_ord_prds.order_status=0) ) && customer_ord_prds.active=1 ORDER BY order_id ASC" ;
 $check_query = mysqli_query($con,$sql);
 $count_panding_order = mysqli_num_rows($check_query);
	
	
	//get total number of  unpaid order 
	if(isset($_POST["count_total_panding_order"]))
	{
			echo "$count_panding_order";
	}
	
	
	if(isset($_POST["get_all_panding_orders"]))
	{
		$i=1;
		while($row = mysqli_fetch_array($check_query))
			{
				$order_id = $row["order_id"];
				$order_date = $row["order_date"];
				$product_name = $row["product_name"];
				$last_name = $row["last_name"];
				$customer_note=$row["customer_note"];
				$payment_status=$row["payment_status"];
				$order_status=$row["order_status"];
				$current_price_per_prd=$row["current_price_per_prd"];
				$order_qtry=$row["order_qtry"];	
				$customer_ord_id = $row["customer_ord_id"];	
	   
	//recipt button show on all order table in admin	 
	$sql_payment_category ="SELECT  payment_tbl.paymen_catg,payment_tbl.order_id,customer_ord_prds.order_status FROM payment_tbl,customer_ord_prds
	where (payment_tbl.order_id = customer_ord_prds.order_id) && (payment_tbl.order_id=$order_id) " ;
	$check_query_payment_category = mysqli_query($con,$sql_payment_category);
 	$row1 = mysqli_fetch_array($check_query_payment_category);
	$paymen_catg = $row1["paymen_catg"];
		
		if($paymen_catg==1)
		{
		$recipt="";
		$paymen_catg_img="<img src='upload/1.jpg' width='50px' height='30px'>";
		}
		if($paymen_catg==2)
		{
		$recipt="<a href='' class='btn btn-info text-light shadow' ordid='$order_id' id='bankslip_image_btn' data-toggle='modal' data-target='#bank_recipt_model' ><i class='fa fa-list-alt'></i></a>";	
		$paymen_catg_img="<img src='upload/2.jpg' width='50px' height='30px'>";
		}
		if($paymen_catg==3)
		{
		$recipt="";
		$paymen_catg_img="<img src='upload/3.jpg' width='50px' height='30px'>";
		}
	 
	  
		echo " <tr class='text-center' >	
					 <td><b>$i </b></td>
                      <td >   $order_id  </td>
                      <td> $order_date</td>
                      <td> $last_name</td>
                      <td>$product_name</td>
                      <td>Rs.$current_price_per_prd.00</td>
                      <td>$order_qtry</td>
                      <td>$paymen_catg_img</td>
                      <td>
					<span class='badge badge-warning'> Panding</span>
					  </td>
                 
					   <td  >
					   
					   <table class='table border-0'>
							<tr>
								<td>
								<button class='btn btn-success shadow' id='order_accept_panding_btn' cust_order_id='$customer_ord_id' ordid='$order_id ' alt='asdas' ><i class='fa fa-check text-light'></i> </button> 
								</td>
								<td>
								<button cust_order_id='$customer_ord_id'  class='btn btn-danger shadow remove'><i class='fa fa-times text-light'></i></button>
								</td>
							</tr>
							
								<tr>
								<td>
								$recipt
								</td>
								<td>
								<button   ordid='$order_id '  class='btn btn-dark shadow' ><i class='fas fa-envelope text-light'></i></button>
								</td>
							</tr>
						</table>
					
                      </td>
                   </tr>
			 
					
					";
					
				$i++	;
			}
		
		
	}
	
	
		
	 
	 
	 
 }
 
  
 
 

//get all process order  to admin processing table  order status ->1
 if(isset($_POST["get_all_process_orders"]) || isset($_POST["count_total_process_order"])){
 
 $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.customer_ord_id,customer_ord_prds.order_date, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id   && ((customer_ord_prds.payment_status=1 || customer_ord_prds.payment_status=2 || customer_ord_prds.payment_status=3 ) && (customer_ord_prds.order_status=1) ) && customer_ord_prds.active=1 order by order_id" ;
 $check_query = mysqli_query($con,$sql);
 $count_process_order = mysqli_num_rows($check_query);
	
	
	//get total number of  shipped order 
	if(isset($_POST["count_total_process_order"]))
	{
			echo "$count_process_order";
	}
	
 
 
 
 if(isset($_POST["get_all_process_orders"]))
		{
		
		
		$i=1;
		while($row = mysqli_fetch_array($check_query))
			{
				$order_id = $row["order_id"];
				$order_date = $row["order_date"];
				$product_name = $row["product_name"];
				$last_name = $row["last_name"];
				$customer_note=$row["customer_note"];
				$payment_status=$row["payment_status"];
				$order_status=$row["order_status"];
				$cust_order_id=$row["customer_ord_id"];
	   
		echo " <tr class='text-center' >	
					 <td><b>$i </b></td>
                      <td >   $order_id  </td>
                      <td> $order_date</td>
                      <td> $last_name</td>
                      <td>$product_name</td>
                      <td   >
					<span class='badge badge-info'> Processing</span>
					  </td>
                 
					   <td>
					<button class='btn btn-success shadow' id='order_shipment_btn' cust_order_id='$cust_order_id' ordid='$order_id'>Shipped</button>
					<button   ordid='$order_id '  class='btn btn-dark shadow' ><i class='fas fa-envelope text-light'></i></button>
                      </td>
                   </tr>
				  
					
					
					";
					
				$i++	;
			}
	 
	 
		
		}
 
 
	 
 }
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 //get all shipped order  to admin shipped table  order status ->2
 if(isset($_POST["get_all_shipped_orders"]) || isset($_POST["count_total_shipped_order"])){
 
 $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.order_date, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id   && ((customer_ord_prds.payment_status=1 || customer_ord_prds.payment_status=2 || customer_ord_prds.payment_status=3 ) && (customer_ord_prds.order_status=2) ) order by order_id" ;
 $check_query = mysqli_query($con,$sql);
 $count_shipped_order = mysqli_num_rows($check_query);
	
	
	//get total number of  shipped order 
	if(isset($_POST["count_total_shipped_order"]))
	{
			echo "$count_shipped_order";
	}
	
	
	if(isset($_POST["get_all_shipped_orders"]))
	{
		$i=1;
				
		while($row = mysqli_fetch_array($check_query))
			{
				$order_id = $row["order_id"];
				$order_date = $row["order_date"];
				$product_name = $row["product_name"];
				$last_name = $row["last_name"];
				$customer_note=$row["customer_note"];
				$payment_status=$row["payment_status"];
				$order_status=$row["order_status"];
			  
		
		echo " <tr class='text-center' >	
					 <td><b>$i </b></td>
                      <td >   $order_id  </td>
                      <td> $order_date</td>
                      <td> $last_name</td>
                      <td>$product_name</td>
                      <td   >
					  <span class='badge badge-success'> shipped</span>
					  </td>
                 
					   <td>
						<button class='btn btn-success shadow' >Confirm goods Received </button>
						<button   ordid='$order_id '  class='btn btn-dark shadow' ><i class='fas fa-envelope text-light'></i></button>
 
						
                      </td>

                   </tr>
				  
					
					
					";
					
				$i++	;
				
				
				
			}
		
	}
		
	 
	 
	 
 }

 
 
 
 
 
 
 
 //get all deliver order  to admin deliver table  order status ->3
 if(isset($_POST["get_all_delivered_orders"])){
 
 $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.customer_ord_id,customer_ord_prds.order_date, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id   && ((customer_ord_prds.payment_status=1 || customer_ord_prds.payment_status=2 || customer_ord_prds.payment_status=3 ) && (customer_ord_prds.order_status=3) ) order by order_id" ;
 $check_query = mysqli_query($con,$sql);
 $count_deliver_order = mysqli_num_rows($check_query);
 
 
 
 
 
		$i=1;
		while($row = mysqli_fetch_array($check_query))
			{
				$order_id = $row["order_id"];
				$order_date = $row["order_date"];
				$product_name = $row["product_name"];
				$last_name = $row["last_name"];
				$customer_note=$row["customer_note"];
				$payment_status=$row["payment_status"];
				$order_status=$row["order_status"];
				$customer_ord_id =$row["customer_ord_id"];
			  
		
		echo " <tr class='text-center' >	
					 <td><b>$i </b></td>
                      <td >   $order_id  </td>
                      <td> $order_date</td>
                      <td> $last_name</td>
                 
                      <td   >
					   10/12/2020
					  </td>
                  <td   >
					   
					  </td>
                 
					   <td>
						 
						 <a href=''  class='btn btn-success remove'><i class='fas fa-envelope'></i></a>
						 <a href=''  cust_order_id='$customer_ord_id' class='btn btn-danger remove'><i class='fa fa-trash-alt'></i></a>
					 
                      </td>

                   </tr>
				  
					
					
					";
					
				$i++	;
			}
	 
	 
	 
 }

 
 
 
 
 
 
 
 
 
 
  
 
 //get all unpaid order  to admin unpaid table 
 if(isset($_POST["get_all_unpaid_orders"]) || isset($_POST["count_total_unpaid_order"]) ){
 
 $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.customer_ord_id,customer_ord_prds.order_date,customer_ord_prds.order_qtry,customer_ord_prds.current_price_per_prd, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id   && ((customer_ord_prds.payment_status=0)) && customer_ord_prds.active=1 order by order_id" ;
  $check_query = mysqli_query($con,$sql);
  $count_unpaid_order = mysqli_num_rows($check_query);
	
	
	//get total number of  unpaid order 
	if(isset($_POST["count_total_unpaid_order"]))
	{
			echo "$count_unpaid_order";
	}
	
	 
	if(isset($_POST["get_all_unpaid_orders"])){
		$i=1;
		while($row = mysqli_fetch_array($check_query))
			{
				$order_id = $row["order_id"];
				$order_date = $row["order_date"];
				$product_name = $row["product_name"];
				$last_name = $row["last_name"];
				$customer_note=$row["customer_note"];
				$payment_status=$row["payment_status"];
				$order_status=$row["order_status"];
			  	$current_price_per_prd=$row["current_price_per_prd"];
				$order_qtry=$row["order_qtry"];
				$customer_ord_id=$row["customer_ord_id"];
		
 		echo " <tr class='text-center' >	
					 <td><b>$i </b></td>
                      <td >   $order_id  </td>
                      <td> $order_date</td>
                      <td> $last_name</td>
                      <td>$product_name</td>
                      <td>Rs.$current_price_per_prd.00</td>
                      <td>$order_qtry</td>
                 
                      <td>
					<span class='badge badge-danger'> unpaid</span>
					  </td>
                 
					   <td>
	 
					<button   ordid='$order_id'  class='btn btn-info'><i class='fas fa-envelope'></i></button>
					<button cust_order_id='$customer_ord_id' class='btn btn-danger shadow remove'><i class='fa fa-times text-light'></i></button>
                      </td>
                   </tr>
			 
					
					";
					
				$i++	;
			}
	}
		
	 
	 
	 
	 
 }

 

 
 
 
  //get all customers to admin customer table 
 if(isset($_POST["get_all_customers"])){
 
 $sql ="SELECT * from customer_tbl" ;
 $check_query = mysqli_query($con,$sql);
 
		$i=1;
		while($row = mysqli_fetch_array($check_query))
			{
				$customer_id = $row["customer_id"];
				$first_name = $row["first_name"];
				$last_name = $row["last_name"];
				$email = $row["email"];
				$phone=$row["phone"];
				$address=$row["address"];
				$city=$row["city"];
				$postal=$row["postal"];
			  
		
		echo " <tr class='text-center' >	
					 <td><b>$i </b></td>
                      <td > <img src='upload/432_abc.png' width='70px' class='rounded-circle' height='70px'>  </td>
                      <td> <b>$first_name</b></td>
                      <td> <b>$last_name</b></td>
                      <td><b>$email</b></td>
                      <td ><b>$phone</b></td>
                      <td ><b>$address</b></td>
					  <td><b>$city </b></td>
					  <td><b>$postal </b></td>
                   </tr>
				  
					
					
					";
					
				$i++	;
			}
	 
	 
	 
 }




 
  //get all customers complain to admin customer complain table  
  //complain -1 , feedback -2
 if(isset($_POST["get_all_customers_complain"])){
 
 $sql ="SELECT comments_tbl.description,customer_tbl.first_name,customer_tbl.last_name,comments_tbl.customer_ord_id 
 from comments_tbl,customer_tbl,customer_ord_prds
 where (comments_tbl.customer_ord_id =customer_ord_prds.customer_ord_id) && (comments_tbl.customer_id=customer_tbl.customer_id)&& comments_tbl.comment_type='1'" ;
 $check_query = mysqli_query($con,$sql);
 
		$i=1;
		while($row = mysqli_fetch_array($check_query))
			{
				$description = $row["description"];
				$first_name = $row["first_name"];
				$last_name = $row["last_name"];
				$customer_ord_id = $row["customer_ord_id"];
			 
		 
			  
		
		echo " <tr class='text-center shadow-sm rounded-sm' >	
					 <td>
                   
				   	  <div class='row mt-2 '>
								<div class='col-sm'>
							<p class='card-text text-left'>Customer Name: <b>$first_name $last_name </b> </p>
								</div>	<div class='col-sm'>
										<p class='card-text text-center'><b></b> </p>
								</div>
								
								<div class='col-sm'>
								<p class='card-text text-right'>Item ID :<b>$customer_ord_id </b> </p>
								</div>	
								</div>	
							<p class='card-text mt-2  '>$description <small><b></b></small></p>
							  </div>
								

								<div class='btn-group mt-2  '>
										<a href='' class='btn btn-warning mr-2 rounded '><i class='fa fa-check'></i> Accept </a>
 
										<a href='message.php' class='btn btn-danger mr-2  rounded'><i class='fa fa-times'></i> Cancel</a>
										<a href='message.php' class='btn btn-dark mr-2  rounded'><i class='fa fa-sms'></i> message</a>
					
								 </div>
						  </div>
						  </div>
						</div>
				   </td>
					 </tr>
					
					";
					
				$i++	;
			}
	 
	 
	 
 }



 




 //get all customers complain to admin customer complain table  
  //complain -1 , feedback -2
 if(isset($_POST["get_all_customers_feedback"])){
  $sql ="SELECT comments_tbl.description,comments_tbl.comment_type 
  from comments_tbl where  comments_tbl.comment_type='2' " ;
 $check_query = mysqli_query($con,$sql);
 
		$i=1;
		while($row = mysqli_fetch_array($check_query))
			{
				$description = $row["description"];
				 
		
		echo " <tr class='text-center shadow-sm rounded-sm' >	
					 <td>
                   
				   	  <div class='row mt-2 '>
								<div class='col-sm'>
						 
								</div>	<div class='col-sm'>
										<p class='card-text text-center'><b></b> </p>
								</div>
								
								<div class='col-sm'>
								<p class='card-text text-right'> <b> </b> </p>
								</div>	
								</div>	
							<p class='card-text mt-2  '>$description <small><b></b></small></p>
							  </div>
								

								<div class='btn-group mt-2  '>
										<a href='' class='btn btn-warning mr-2 rounded '><i class='fa fa-check'></i> Accept </a>
 
										<a href='message.php' class='btn btn-danger mr-2  rounded'><i class='fa fa-times'></i> Cancel</a>
 
					
								 </div>
						  </div>
						  </div>
						</div>
				   </td>
					 </tr>
					
					";
					
				$i++	;
			}
	 
	 
	 
 }
 
   //change the pending  stage to process
  if(isset($_POST["change_panding_to_process"])){
	  
	  	$order_id = $_POST["order_id"];
	  	$cust_order_id = $_POST["cust_order_id"];
		$sql = "update customer_ord_prds set order_status='1' WHERE order_id = '$order_id' and customer_ord_id=$cust_order_id" ;
		$check_query = mysqli_query($con,$sql);
  }
 
 
 
 
  //change the process stage to_shipment
  if(isset($_POST["change_process_to_shipment"])){
	  
	  	$order_id = $_POST["order_id"];
	  	$cust_order_id = $_POST["cust_order_id"];
		$sql = "update customer_ord_prds set order_status='2' WHERE order_id = '$order_id' and customer_ord_id=$cust_order_id" ;
		$check_query = mysqli_query($con,$sql);

			
		date_default_timezone_set('Asia/Kolkata');
		//define date and time
		$today = date("Y-m-d"); // get the date
		
		$sql = "insert into delivery_tbl (order_id,prd_send_date) values ($order_id,'$today')" ;
		$check_query = mysqli_query($con,$sql);
		
		$sql = "select  delivery_id from delivery_tbl where order_id=$order_id" ;
		$check_query = mysqli_query($con,$sql);
		$row_data = mysqli_fetch_array($check_query);
		$delivery_id = $row_data["delivery_id"];
	 
		
		$sql = "insert into tracking_tbl (delivery_id) values ($delivery_id)" ;
		$check_query = mysqli_query($con,$sql);
		
  }
 
 
 
  
  //bankslip image_view on admin table
  if(isset($_POST["bankslip_image_view"])){
	
	 	$order_id = $_POST["order_id"];
		
$sql ="SELECT payment_tbl.payment_id,payment_tbl.order_id,bank_dep_tbl.upolod_slip_img,bank_dep_tbl.payment_id FROM payment_tbl,bank_dep_tbl
 where (payment_tbl.payment_id = bank_dep_tbl.payment_id)  && (payment_tbl.order_id=$order_id)" ;
$check_query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($check_query);
$image_name = $row["upolod_slip_img"];
	  
	  	 echo " <img src='../prg_img/bank_slip/$image_name' width='100%' height='50%'>";
 
  }
 
 
 
 
 //courier login
if(isset($_POST["courier_login"])){
		$login_email = $_POST["cori_email"]; // mysql_real_escape_string used prevent from @ - sysmbol enter values
		$login_password= md5($_POST["cori_password"]);// get password encryption
	
		$sql = "SELECT * FROM courier_tbl WHERE email = '$login_email' and password='$login_password' " ;
		$check_query = mysqli_query($con,$sql);
		$count_email = mysqli_num_rows($check_query);
		if($count_email==1)
		{
				$row = mysqli_fetch_array($check_query);
				$_SESSION['cour_user_id'] = $row['id'];
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert' 
				data-auto-dismiss><strong>Login Successfull</strong> <button type='button' 
				class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				echo "<script> window.location.assign('cori_tracking.php'); </script>";	
		}
		else
		{
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' 
		data-auto-dismiss>Please check your<strong> email or password</strong> <button type='button' 
		class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			
		}
}


//database manual backup
if(isset($_POST["db_backup"])){
	 
  
  		echo "<div class='alert alert-success alert-dismissible fade show' role='alert' 
		data-auto-dismiss>Database<strong> successfully</strong> backuped<button type='button' 
		class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

}


//courier tracking_info update
if(isset($_POST["courier_tracking_info_update"])){
	$cour_user_id=$_SESSION['cour_user_id'];
		$cori_tracking_id = $_POST["cori_tracking_id"]; 
		$sql = "SELECT * FROM tracking_tbl WHERE tracking_id = '$cori_tracking_id'" ;
		$check_query = mysqli_query($con,$sql);
		$count_rows = mysqli_num_rows($check_query);
		
		if($count_rows>0)
		{
			
			$sql = "SELECT * FROM courier_tbl WHERE id = '$cour_user_id'" ;
			$check_query = mysqli_query($con,$sql);
			$row_data = mysqli_fetch_array($check_query);
			$District = $row_data["District"];
		
			$sql = " UPDATE `tracking_tbl` SET `current_district`= '$District' WHERE tracking_id = '$cori_tracking_id'" ;
			$check_query = mysqli_query($con,$sql);

			echo "<div class='alert alert-success alert-dismissible fade show' role='alert' 
			data-auto-dismiss>Tracking infomation <strong> successfully</strong> Updated<button type='button' 
			class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		}
		else
		{
			 echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' 
			data-auto-dismiss><strong> Tracking ID is wrong. </strong>Please check the Tracking ID<button type='button' 
			class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		}

}





//Remove Customer Order
if(isset($_POST["remove_cus_order"])){
    $remove_cust_order_id = $_POST["remove_cust_order_id"]; 
	$sql = "UPDATE `customer_ord_prds` SET `active`=0 WHERE customer_ord_id = $remove_cust_order_id" ;
	$check_query = mysqli_query($con,$sql);
}









?>