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
		echo "<option value='0' cat_name='assa' selected>Choose Category...</option>";
			while($row = mysqli_fetch_array($check_query))
						{	$category_id = $row["category_id"];
							$category_name = $row["category_name"];
						 
								//option list output	
								echo "<option value='$category_name' cat_name='$category_name'>$category_name</option> ";
								
							
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
								echo "<option value='$brand_name'>$brand_name</option> ";
								
							
						}
						

}


//get product add form
if(isset($_POST["get_product_add_form"])){
echo "
	<div class='card card-warning card-outline'>   
	<div class='card-header text-center'  >
	<div class='card-tools'>
	<button type='button' class='btn btn-tool' data-card-widget='collapse'>
	<i class='fas fa-minus'></i></button><button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-times'></i></button></div>				<h2>Add Product</h2>              </div>			            <div class='card-body'>            <form id='product_reg_form' >	 		<div id='product_reg_msg' > </div>		  <div class='form-row'>			<div class='col-md-6'>			  <label for='validationCustom01'>Product ID</label>			  <input type='text' class='form-control text-center' id='Product_id_txt' name='Product_id_txt'    disabled>					</div>						<div class='col-md-6'>			  <label for='validationCustom02'>Date</label>			  <input type='date' class='form-control text-center' id='prd_add_date_txt'  name='' disabled >					</div>			</div>							<div class='form-row mt-2'>     <div class='form-group col-6'>           <label for='validationCustom02'>Category</label>     <select id='get_category' class='form-control category_class'></select>    </div>   
	<div class='form-group col-6'>   
	<label for='validationCustom02'>Brand</label>     
	<select id='get_brand' class='form-control brand_class'></select>   
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
	<div class='col-3 form-group'>    
	<label for='validationCustom03'>Total Quantity</label>	  		
	<input type='number' min='1'  class='form-control' id='Total_qty' maxlength='10' name='Total_qty' placeholder='Total Quantity' autocomplete='off'>
	</div>
	
 
	<div class='form-group col-3'>        
	<label for='validationCustom02'>Choose the weight  (kg)</label>     
	<select id='get_weight' class='form-control '>
		<option value='0' weight_val='0' selected=''>Choose weight</option>
		<option value='< 1Kg'>< 1Kg</option> 
		<option value='2Kg - 3Kg'>2Kg - 3Kg</option> 
		<option value='4Kg  - 5Kg'>4Kg  - 5Kg</option>
		<option value='6Kg - 10Kg'>6Kg - 10Kg</option> 
		<option value='11Kg - 20Kg'>11Kg - 20Kg</option>
		<option value='21Kg - 30Kg'>21Kg - 30Kg</option>
		<option value='31Kg - 50Kg'>31Kg - 50Kg</option>
		<option value='51Kg < 100Kg'>51Kg < 100Kg </option>
		<option value='101Kg < Up'>101Kg< Up</option>
	</select>   
	</div>
	
	
	<div class='form-group col-6'> 	  
	<label for='exampleFormControlFile1' class='mt-1'>Select Product Image</label>  <div class='custom-file' >
	<input type='file' name='file' id='file' ></div> </div> 


	<div class='col-6 form-group mt-2 text-center'></label></div>  </div>   
	<div class='form-row mt-2'> <div class='col-12'><label for='validationCustom05'>Product Description</label> 
	<div class='col-md-12'>   
	<textarea class='textarea' id='product_desc_txt'  name='product_dec' placeholder='Place some text here'style='width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 30px;'></textarea>                            </div>           </div>        </div> <div class='form-row mt-2'> <div class='col-12'><label for='validationCustom03'>Product Keywords</label>	<div class='col-md-12'>    <textarea class='form-control' id='product_keywords_txt'  name='ProductKeyword' rows='3'></textarea>   </div> 
	<div class='modal-footer'  id='prd_footer'> 
	<button type='button' id='form_prd_add_btn' name='form_prd_add_btn' class='btn btn-danger'>Add</button><button type='button' class='btn btn-secondary'    data-card-widget='remove' >Close</button></div></form> </div></div><script>$(function () { $('.textarea').summernote() })</script></div></div> ";
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
				$_SESSION['user_role'] = $row['user_role'];
				$_SESSION['password'] = $row['password'];
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert' 
				data-auto-dismiss><strong>Successfully login</strong> <button type='button' 
				class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				echo "<script> window.location.assign('index.php?success=1'); </script>
				
				";	
		}
		else
		{
	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' 
		data-auto-dismiss>Please check your<strong> email or password</strong> <button type='button' 
		class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			
		}

}




 

 
 
 


//Prduct Related Codes
if(isset($_POST['add_to_prd_tbl']) || isset($_POST['update_prd'])|| isset($_POST['get_last_five_prd_dashbord']) || isset($_FILES["file"]["name"] ) || isset($_POST["get_admin_product"]) || isset($_POST["edit_admin_product"])  || isset($_POST["delete_admin_product"]) || isset($_POST["product_count"]) || isset($_POST["get_admin_product_filter"]) || isset($_POST["Prduct_table_footer_num"])){
	
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

	 
	$product_query = "SELECT  product_tbl.product_id,product_tbl.created_date,product_tbl.product_name,product_tbl.product_price,product_tbl.product_desc,product_tbl.product_total_qty,product_tbl.product_img,category_tbl.category_name,brand_tbl.brand_name
					 from product_tbl,category_tbl,brand_tbl
					 where (product_tbl.product_category = category_tbl.category_id) and (product_tbl.product_brand = brand_tbl.brand_id) and (product_tbl.active=1) ORDER BY product_tbl.product_id ASC   LIMIT $start,$page_number_limit";
	$run_query = mysqli_query($con,$product_query);
 
	 
 
 if(isset($_POST['add_to_prd_tbl']) )
	{  
		   
			$Product_id= $_POST['Product_id'];
			$prd_add_date= $_POST['prd_add_date'];
			$get_category_name= $_POST['get_category'];//from text
			$get_brand_name= $_POST['get_brand']; //from text
			$product_name= $_POST['product_name'];//
			$product_price= $_POST['product_price'];
			$product_desc= $_POST['product_desc'];
			$product_keywords= $_POST['product_keywords'];
			$prd_total_qty= $_POST['prd_total_qty'];
			$product_profit_rate= $_POST['product_profit_rate'];
			$get_weight= $_POST['get_weight'];
			  
			$orderid="Pid_".$Product_id.".";	
					
		//change category name to category id			
		$get_category_id_sql = "SELECT  category_id FROM category_tbl WHERE active=1 and category_name = '$get_category_name'" ;
		$get_category_id_check_query = mysqli_query($con,$get_category_id_sql);	
		$get_category_row = mysqli_fetch_array($get_category_id_check_query);	
		$get_category = $get_category_row["category_id"];			
				
		//change brand name to brand id		
		$get_brand_id_sql = "SELECT  brand_id FROM brand_tbl WHERE active=1 and brand_name = '$get_brand_name'" ;
		$get_brand_id_check_query = mysqli_query($con,$get_brand_id_sql);	
		$get_brand_row = mysqli_fetch_array($get_brand_id_check_query);	
		$get_brand = $get_brand_row["brand_id"];			
					
		  
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

		if($chk_ext_product_active > 0)
{
			echo "1"; //existing 
			 
		} 
		elseif($chk_ext_product_inactive>0)
		{
			
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
							
			
				$sql1= "INSERT INTO `product_tbl`(`product_id`,`created_date`, `product_category`, `product_brand`, `product_name`, `product_desc`, `product_img`, `profit_rate` , `product_price`,`product_total_qty`,`product_keywords`,`product_weight`) VALUES ($Product_id,'$prd_add_date','$get_category','$get_brand','$product_name','$product_desc','$prd_img','$product_profit_rate', $product_price,'$prd_total_qty','$product_keywords','$get_weight')";
	
							if(mysqli_query($con,$sql1))
							{
							
									echo "3";

							}
		}
	
				}
	}
	else if(isset($_POST['update_prd']) )
	{
		
		 
			$Product_id= $_POST['Product_id'];
			$prd_add_date= $_POST['prd_add_date'];
			$get_category_name= $_POST['get_category'];//from text
			$get_brand_name= $_POST['get_brand']; //from text
			$product_name= $_POST['product_name'];//
			$product_price= $_POST['product_price'];
			$product_desc= $_POST['product_desc'];
			$product_keywords= $_POST['product_keywords'];
			$prd_total_qty= $_POST['prd_total_qty'];
			$product_profit_rate= $_POST['product_profit_rate'];
			$get_weight= $_POST['get_weight'];
			@$file= $_POST['file'];//undefined as create a error in php that's why used @
			
			$orderid="Pid_".$Product_id.".";	
			
			  
		  
		//change category name to category id			
		$get_category_id_sql = "SELECT  category_id FROM category_tbl WHERE active=1 and category_name = '$get_category_name'" ;
		$get_category_id_check_query = mysqli_query($con,$get_category_id_sql);	
		$get_category_row = mysqli_fetch_array($get_category_id_check_query);	
		$get_category = $get_category_row["category_id"];			
				
		//change brand name to brand id		
		$get_brand_id_sql = "SELECT  brand_id FROM brand_tbl WHERE active=1 and brand_name = '$get_brand_name'" ;
		$get_brand_id_check_query = mysqli_query($con,$get_brand_id_sql);	
		$get_brand_row = mysqli_fetch_array($get_brand_id_check_query);	
		$get_brand = $get_brand_row["brand_id"];			
					
		 		  
		
			date_default_timezone_set('Asia/Kolkata');
			//define date and time
			$date = date('Y-m-d_H-i-s_', time());

		  	 if($file=='undefined')
			  {
				 $sql2= "update product_tbl set created_date='$prd_add_date', product_category=$get_category, product_brand=$get_brand, product_name='$product_name',product_desc='$product_desc',profit_rate ='$product_profit_rate' , product_price=$product_price,product_total_qty=$prd_total_qty,product_keywords ='$product_keywords',product_weight='$get_weight' where product_id='$Product_id'";
			 
			  }	
			  else
			  {
				  	  
				 /* Getting file name */
				 $filename = $_FILES['file']['name'];
				 
				 /* Location */
				$location = "./upload/"."Product_images."."/";
				$uploadOk = 1;
				$imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
				 
				$new_file_name=$date.$orderid.$imageFileType;
				$prd_img =$new_file_name;
				 
				 
				 /* Valid extensions */
				$valid_extensions = array("jpg","jpeg","png");
			
				if(!in_array(strtolower($imageFileType), $valid_extensions))
					{
					echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File extension not suppoted!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
					}
				else
					{
							 if($uploadOk == 0)
								{
										echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File not uploded !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
								}
								else
								{
								   /* Upload file */
								  if(move_uploaded_file($_FILES['file']['tmp_name'],$location.$new_file_name))
								  {
									 
								   }
								   else
								   {
										echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File not uploded !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
								
								   }
								} 
				

						$sql2= "update product_tbl set created_date='$prd_add_date',product_img='', product_category=$get_category, product_brand=$get_brand, product_name='$product_name', product_desc='$product_desc',product_img='$prd_img', profit_rate ='$product_profit_rate' , product_price=$product_price,product_total_qty=$prd_total_qty,product_keywords ='$product_keywords',product_weight='$get_weight' where product_id='$Product_id'";
			  
					}
			}
			  
		 $check_query2 = mysqli_query($con,$sql2);  
		 echo 1;
		 
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
	} // get the last 5 product to admin dashboard
	else if(isset($_POST["get_last_five_prd_dashbord"]))
	{	 

 	$prd_last_five_sql = "SELECT  product_tbl.product_id,product_tbl.created_date,product_tbl.product_name,product_tbl.product_price,product_tbl.product_desc,product_tbl.product_total_qty,product_tbl.product_img,category_tbl.category_name,brand_tbl.brand_name
					 from product_tbl,category_tbl,brand_tbl
					 where (product_tbl.product_category = category_tbl.category_id) and (product_tbl.product_brand = brand_tbl.brand_id) and (product_tbl.active=1)    order by product_tbl.product_id desc LIMIT 5 ";
					 
				 
			 $prd_last_five_qry = mysqli_query($con,$prd_last_five_sql);
	  
		$i=$start+1;
		if(mysqli_num_rows($prd_last_five_qry) > 0){
			while($row = mysqli_fetch_array($prd_last_five_qry))
			{
				$product_id = $row["product_id"];
				$product_id = $row["product_id"];
				$product_category = $row["category_name"];
				$product_brand = $row["brand_name"];
				$product_name = $row["product_name"];
				$product_price = $row["product_price"];
				$product_desc = $row["product_desc"];
				$product_img = $row["product_img"];
				$product_total_qty = $row["product_total_qty"];
				$created_date = $row["created_date"];
				echo "	
	           <tr>
				   <td>
                      $created_date
                    </td>
                    <td>
                      <img src='../admin/upload/Product_images/$product_img'  class='img-circle img-size-32 mr-2'>
                       $product_name
		 
                    </td>
                     
					<td>
						$product_category
                    </td>
						<td>
                    $product_brand
                    </td>
                    <td>
                      Rs.$product_price.00
                    </td>
                  </tr>
					 ";
					  $i++;
	 
			}
		
		
		
		}
		else
		{
			
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
	else if( isset($_POST["edit_admin_product"])){
	$product_edit_id = $_POST["product_edit_id"];
	$prd_edit_sql = "SELECT  product_tbl.product_id,product_tbl.product_keywords,product_tbl.profit_rate,product_tbl.product_weight,product_tbl.created_date,product_tbl.product_name,product_tbl.product_price,product_tbl.product_desc,product_tbl.product_total_qty,product_tbl.product_img,category_tbl.category_name,brand_tbl.brand_name
					 from product_tbl,category_tbl,brand_tbl
					 where (product_tbl.product_category = category_tbl.category_id) and (product_tbl.product_brand = brand_tbl.brand_id) and ((product_tbl.active=1) and (product_tbl.product_id='$product_edit_id') )";
	$run_query = mysqli_query($con,$prd_edit_sql);
	$row = mysqli_fetch_array($run_query);
				$product_id = $row["product_id"];
				$created_date = $row["created_date"];
				$product_category = $row["category_name"];
				$product_brand = $row["brand_name"];
				$product_name = $row["product_name"];
				$product_price = $row["product_price"];
				$profit_rate = $row["profit_rate"];
				$product_weight = $row["product_weight"];
				$product_desc = $row["product_desc"];
				$product_img = $row["product_img"];
				$product_total_qty = $row["product_total_qty"];
				$product_keywords = $row["product_keywords"];
			 
			 
			 
 echo "$product_id*/*$created_date*/*$product_category*/*$product_brand*/*$product_name*/*$product_price*/*$profit_rate*/*$product_weight*/*$product_desc*/*$product_img*/*$product_total_qty*/*$product_keywords*/*";	
				
	}
	else if( isset($_POST["delete_admin_product"]))
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
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.email,customer_tbl.last_name,product_tbl.product_name
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
				$email = $row["email"];
				$customer_note=$row["customer_note"];
				$payment_status=$row["payment_status"];
				$order_status=$row["order_status"];
				$customer_ord_id=$row["customer_ord_id"];
				 
	 
		
	 //$order_status=0 -> pending ,$order_status=1 ->process ,$order_status=2 -> Shipped, $order_status=3 ->compelted
	 //$payment_status=1 ->online  ,  $payment_status=2 ->bank , $payment_status=3 -> cash on delivery
		
		if(($payment_status==1 && $order_status==0) || ($payment_status==2 && $order_status==0) || ($payment_status==3 && $order_status==0) )
		{
			 $status_btn=   "<span class='badge badge-warning'> Pending</span>";
			 $action_btn=	"<button class=' btn-success shadow btn'  id='order_accept_panding_btn' ordid='$order_id' cust_order_id='$customer_ord_id' ><i class='fa fa-check text-light'></i></button> 
			 <button cust_order_id='$customer_ord_id' class='btn btn-danger shadow remove'><i class='fa fa-times text-light'></i></button>";
		}
		
		else if(($payment_status==1 && $order_status==1) || ($payment_status==2 && $order_status==1) || ($payment_status==3 && $order_status==1) )
		{
			 $status_btn=   "<span class='badge badge-info'> Processing</span>";
			 $action_btn=	"<button class='btn btn-warning shadow' id='order_shipment_btn' ordid='$order_id'  cust_order_id='$customer_ord_id'  ><i class='fa fa-truck text-dark'></i></button>
			 <button class='btn btn-outline-secondary' print_order_id='$order_id'  id='print_btn'><i class='fa fa-print text-dark'></i></button>
					 ";
		
		}
		else if($payment_status==0)
		{
			$action_btn= " ";
			$status_btn=   "<span class='badge badge-danger'> Unpaid</span> ";
			
		}
		if(($payment_status==1 && $order_status==2) || ($payment_status==2 && $order_status==2) || ($payment_status==3 && $order_status==2) )
		{
			 $status_btn=   "<span class='badge badge-success' > shipped</span>";
			 $action_btn=	"<button class='shadow btn btn-success '>Confirm Goods Received</button>
			  <button class='btn btn-outline-secondary' print_order_id='$order_id'  id='print_btn'><i class='fa fa-print text-dark'></i></button>
			 ";
			 
		}
 
	  
		
 	//recipt button show on all order table in admin	 
	$sql_payment_category ="SELECT  payment_tbl.paymen_catg,payment_tbl.order_id,customer_ord_prds.order_status FROM payment_tbl,customer_ord_prds
	where (payment_tbl.order_id = customer_ord_prds.order_id) && (payment_tbl.order_id=$order_id) " ;
	$check_query_payment_category = mysqli_query($con,$sql_payment_category);
 	$row1 = mysqli_fetch_array($check_query_payment_category);
	$paymen_catg = $row1["paymen_catg"];
	$order_status = $row1["order_status"];
		
		
$msg= "<button class='btn btn-dark shadow' data-toggle='modal' data-target='#admin_message_model' style='cursor: pointer;' id='admin_message_btn' customer_email='$email'><i class='fas fa-envelope text-light'></i></button>";

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
			 $action_btn=	"<button class='btn btn-success shadow' disabled>Confirm goods Received </button>
			  <button class='btn btn-outline-secondary' print_order_id='$order_id'  id='print_btn'><i class='fa fa-print text-dark'></i></button>";
		}
		
		
		
		
		
		
 
 	
 	//recipt button show on all order table in admin	 
	$sql_payment_category ="SELECT  payment_tbl.paymen_catg,payment_tbl.order_id,customer_ord_prds.order_status FROM payment_tbl,customer_ord_prds
	where (payment_tbl.order_id = customer_ord_prds.order_id) && (payment_tbl.order_id=$order_id) " ;
	$check_query_payment_category = mysqli_query($con,$sql_payment_category);
 	$row1 = mysqli_fetch_array($check_query_payment_category);
	$paymen_catg = $row1["paymen_catg"];
	$order_status = $row1["order_status"];
		
		
$msg= "<button class='btn btn-dark shadow'  data-toggle='modal' data-target='#admin_message_model' style='cursor: pointer;' ><i class='fas fa-envelope text-light'></i></button>";

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
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.current_price_per_prd,customer_ord_prds.customer_note,customer_tbl.email,customer_tbl.last_name,product_tbl.product_name
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
				$email = $row["email"];
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
								<button   ordid='$order_id '  class='btn btn-dark shadow' data-toggle='modal' data-target='#admin_message_model' style='cursor: pointer;' id='admin_message_btn' customer_email='$email'><i class='fas fa-envelope text-light'></i></button>
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
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.email,customer_tbl.last_name,product_tbl.product_name
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
				$email = $row["email"];
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
					<button class='btn btn-warning shadow' id='order_shipment_btn' cust_order_id='$cust_order_id' ordid='$order_id'><i class='fa fa-truck text-dark'></i></button>
					<button   ordid='$order_id '  class='btn btn-dark shadow'   data-toggle='modal' data-target='#admin_message_model' style='cursor: pointer;' id='admin_message_btn' customer_email='$email' ><i class='fas fa-envelope text-light'></i></button>
                      <button class='btn btn-outline-secondary' print_order_id='$order_id'  id='print_btn'><i class='fa fa-print text-dark'></i></button>
 
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
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.email,customer_tbl.last_name,product_tbl.product_name
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
				$email = $row["email"];
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
						<button   ordid='$order_id '  class='btn btn-dark shadow'  data-toggle='modal' data-target='#admin_message_model' style='cursor: pointer;' id='admin_message_btn' customer_email='$email'><i class='fas fa-envelope text-light'></i></button>
						<button class='btn btn-outline-secondary' print_order_id='$order_id'  id='print_btn'><i class='fa fa-print text-dark'></i></button>

						
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
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.last_name,customer_tbl.email,product_tbl.product_name
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
				$email = $row["email"];
				$customer_note=$row["customer_note"];
				$payment_status=$row["payment_status"];
				$order_status=$row["order_status"];
				$customer_ord_id =$row["customer_ord_id"];
	
	
				$sql_rec_per_details ="SELECT * from receive_person_details_tbl where order_id=$order_id" ;
				$check_query_rec_details = mysqli_query($con,$sql_rec_per_details);
				$row_re_details = mysqli_fetch_array($check_query_rec_details);
				$received_person_name =$row_re_details["received_person_name"];
		  
		  
		  
				$sql_rec_date ="SELECT * from delivery_tbl where order_id=$order_id" ;
				$check_query_rec_date = mysqli_query($con,$sql_rec_date);
				$row_re_date = mysqli_fetch_array($check_query_rec_date);
				$prd_received_date =$row_re_date["prd_received_date"];
				
				 
	
		
		echo " <tr class='text-center' >	
					 <td><b>$i </b></td>
                      <td>$order_id  </td>
                      <td> $last_name </td>
                      <td> $order_date</td>
                      <td> $product_name</td>
                 
                      <td>
					   $prd_received_date
					  </td>
					<td>
					   $received_person_name
					  </td>
                 
					   <td>
						 
						 <a href=''  class='btn btn-success '  data-toggle='modal' id='admin_message_btn' data-target='#admin_message_model' style='cursor: pointer;' customer_email='$email' > <i class='fas fa-envelope'></i></a>
					  <button class='btn btn-outline-secondary' print_order_id='$order_id'  id='print_btn'><i class='fa fa-print text-dark'></i></button>

					 
                      </td>

                   </tr>
				  
					
					
					";
					
				$i++	;
			}
	 
	 
	 
 }

 
 
 
 
 
 
 
 
 
 
  
 
 //get all unpaid order  to admin unpaid table 
 if(isset($_POST["get_all_unpaid_orders"]) || isset($_POST["count_total_unpaid_order"]) ){
 
 $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.customer_ord_id,customer_ord_prds.order_date,customer_ord_prds.order_qtry,customer_ord_prds.current_price_per_prd, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.email,customer_tbl.last_name,product_tbl.product_name
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
				$email = $row["email"];
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
	 
					<button   ordid='$order_id'  class='btn btn-info'  data-toggle='modal' data-target='#admin_message_model' style='cursor: pointer;' id='admin_message_btn' customer_email='$email' ><i class='fas fa-envelope'></i></button>
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
		$cori_nic = $_POST["cori_nic"]; 
		$cori_name = $_POST["cori_name"]; 
		$cori_phone = $_POST["cori_phone"]; 
		
		
		$sql = "update customer_ord_prds set order_status='2' WHERE order_id = '$order_id' and customer_ord_id=$cust_order_id" ;
		$check_query = mysqli_query($con,$sql);

			
		date_default_timezone_set('Asia/Kolkata');
		//define date and time
		$today = date("Y-m-d"); // get the date
		
		
		$sql_orderid_ex = "select  * from delivery_tbl where order_id=$order_id" ;
		$check_query_orderid_ex = mysqli_query($con,$sql_orderid_ex);		
 		$count_orderid_ex = mysqli_num_rows($check_query_orderid_ex);
		 
		 if($count_orderid_ex ==0)
			{
					$sql = "insert into delivery_tbl (order_id,prd_send_date) values ($order_id,'$today')" ;
					$check_query = mysqli_query($con,$sql);
			
				  
					$sql = "select  delivery_id from delivery_tbl where order_id=$order_id" ;
					$check_query = mysqli_query($con,$sql);
					$row_data = mysqli_fetch_array($check_query);

					
						if($row_data>0)
						{
								$delivery_id = $row_data["delivery_id"];
							  
							    $sql_delivery_id_ex = "select  * from tracking_tbl where delivery_id=$delivery_id" ;
								$check_query_delivery_id_ex = mysqli_query($con,$sql_delivery_id_ex);		
								$count_delivery_ex = mysqli_num_rows($check_query_delivery_id_ex);
								 
								 if($count_delivery_ex ==0)
									{
										$sql = "insert into tracking_tbl (delivery_id) values ($delivery_id)" ;
										$check_query = mysqli_query($con,$sql);
										
										
										$sql_re = "SELECT * FROM receive_person_details_tbl where order_id=$order_id ";
										$check_query_re_ex = mysqli_query($con,$sql_re);
										$count_re_ex = mysqli_num_rows($check_query_re_ex);
									
										if ($count_re_ex==0)
										{ 
											$sql = "insert into receive_person_details_tbl (order_id) values ($order_id)" ;
											$check_query = mysqli_query($con,$sql);
										}
											
									 
										
									}
						
						 
						
						} 
			
			
			
			}
		     
		
	 
		
  }
 
 
 
  
  //bankslip image_view on admin table
  if(isset($_POST["bankslip_image_view"])){
	
	 	$order_id = $_POST["order_id"];
		
$sql ="SELECT payment_tbl.payment_id,payment_tbl.order_id,bank_dep_tbl.dep_date,bank_dep_tbl.amount,bank_dep_tbl.slip_no,bank_dep_tbl.dep_time,bank_dep_tbl.branch_name,bank_dep_tbl.upolod_slip_img,bank_dep_tbl.payment_id FROM payment_tbl,bank_dep_tbl
 where (payment_tbl.payment_id = bank_dep_tbl.payment_id)  && (payment_tbl.order_id=$order_id)" ;
$check_query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($check_query);
	$image_name = $row["upolod_slip_img"];
	$dep_date = $row["dep_date"];
	$dep_time = $row["dep_time"];
	$branch_name = $row["branch_name"];
	$branch_name = $row["branch_name"];
	$amount = $row["amount"];
	$slip_no = $row["slip_no"];
	
	 

	  
	  	 echo "    
	  <div class='row'>
			  
			  <table class='table table-bordered'>
				 
						<tr>
						  <td scope='col' id='Deposited_date'>Deposit Date:  &nbsp <b>$dep_date</b> </td>
						  <td scope='col'  id='Deposited_time'>Deposit Time:  &nbsp<b>$dep_time</b></td>
						  <td scope='col'  id='Deposited_branch'>Branch Name: &nbsp <b>$branch_name</b> </td>
						</tr>
							<tr>
							<td scope='col' id='Deposited_date'>Deposit Amount:  &nbsp <b>Rs. $amount.00</b> </td>
							<td class='text-center' scope='col' colspan='2' id='Deposited_date'>Deposit Slip Number:  &nbsp <b>$slip_no </b></td>
							</tr>
				  
			  </table>
			   
			  </div>
  
				<img src='../prg_img/bank_slip/$image_name' width='100%' height='50%'>";
 
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
	
	
	
		date_default_timezone_set('Asia/Kolkata');
			//define date and time
			$date = date('Y-m-d');
			 
			
		$cour_user_id=$_SESSION['cour_user_id'];
		$cori_tracking_id = $_POST["cori_tracking_id"];
		
		$cori_nic = $_POST["cori_nic"]; 
		$cori_name = $_POST["cori_name"]; 
		$cori_phone = $_POST["cori_phone"]; 
		 
			   
		$sql = "SELECT delivery_id FROM tracking_tbl WHERE tracking_id = $cori_tracking_id" ;
		$check_query = mysqli_query($con,$sql);
		$count_rows = mysqli_num_rows($check_query);
		$row_data = mysqli_fetch_array($check_query);
			
			
		if( $count_rows>0)
		{
				$delivery_id = $row_data["delivery_id"];
				 
				
				$sql = "SELECT * FROM delivery_tbl WHERE delivery_id = $delivery_id" ;
				$check_query = mysqli_query($con,$sql);
				$count_rows = mysqli_num_rows($check_query);
				$row_data = mysqli_fetch_array($check_query);
				$order_id = $row_data["order_id"];
				
			$sql = "SELECT * FROM courier_tbl WHERE id = '$cour_user_id'" ;
			$check_query = mysqli_query($con,$sql);
			$row_data = mysqli_fetch_array($check_query);
			$District = $row_data["District"];
		
			$sql = " UPDATE `tracking_tbl` SET `current_district`= '$District' WHERE tracking_id = '$cori_tracking_id'" ;
			$check_query = mysqli_query($con,$sql);

			$sql1 = "UPDATE  receive_person_details_tbl  SET  received_person_name='$cori_name', nic='$cori_nic' ,phone= '$cori_phone'  where order_id=$order_id" ;
			$check_query = mysqli_query($con,$sql1);
			
			
			// update parcel recived date
			$sql = "update delivery_tbl set prd_received_date='$date' where order_id=$order_id" ;
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





//cancel Customer Order
if(isset($_POST["remove_cus_order"])){
    $remove_cust_order_id = $_POST["remove_cust_order_id"]; 
	$sql = "UPDATE `customer_ord_prds` SET `active`=0 WHERE customer_ord_id = $remove_cust_order_id" ;
	$check_query = mysqli_query($con,$sql);
}



if(isset($_POST["get_all_canceled_orders"]))

{ 

 $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.customer_ord_id,customer_ord_prds.order_date,customer_ord_prds.order_qtry,customer_ord_prds.current_price_per_prd, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id    && customer_ord_prds.active=0 order by order_id" ;
  $check_query = mysqli_query($con,$sql);
  $count_unpaid_order = mysqli_num_rows($check_query);
	
 
 
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
					<span class='badge badge-danger'> Cancelled</span>
					  </td>
                 
			 
                   </tr>
			 
					
					";
					
				$i++	;
			}
 
		
	 
	
 
}




//show outofstock list
if(isset($_POST["get_out_of_stock_product"])){

$start=0;
 $product_query = "SELECT  product_tbl.product_id,product_tbl.product_name,product_tbl.product_price,product_tbl.product_desc,product_tbl.product_total_qty,product_tbl.product_img,category_tbl.category_name,brand_tbl.brand_name
					 from product_tbl,category_tbl,brand_tbl
					 where (product_tbl.product_category = category_tbl.category_id) and (product_tbl.product_brand = brand_tbl.brand_id) and (product_tbl.active=1) and (product_tbl.product_total_qty<=5)  ORDER BY product_tbl.product_total_qty";
	$run_query = mysqli_query($con,$product_query);
 
 
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
				<tr class='text-center'>
						<td>$i</td>
						<td>$product_name</td>
						<td> <img src='../admin/upload/Product_images/$product_img'  width='50px' height='40px'></td>
						<td>$product_category</td>
						<td>$product_brand</td>
						<td>Rs.$product_price.00</td>
						"; 
						if($product_total_qty<=2)
						{
							echo "<td class='text-center bg-danger text-5'><h2>$product_total_qty</h2></td>";
						}
						else
						{
							echo "<td class='text-center bg-success  text-5'><h2>$product_total_qty</h2></td>";
						}
						
						echo"
						</tr>
					  
							";
					  $i++;
	 
			}
		
		
		
		}
 
}

//adding the banner to admin  table
if(isset($_POST["add_banner"])){
 $banner_title = $_POST["banner_title"]; 
 $filename = $_FILES['files']['name'];

  
			date_default_timezone_set('Asia/Kolkata');
			//define date and time
			$date = date('Y-m-d_H-i-s_', time());

			/* Location */
			$location = "./upload/"."banners."."/";
			$uploadOk = 1;
			$imageFileType = pathinfo($filename,PATHINFO_EXTENSION);


			$new_file_name="banner"._.$date.".".$imageFileType;
			$prd_img =$new_file_name;
			/* Valid extensions */
			$valid_extensions = array("jpg","jpeg","png");
			 
			 
			 
			 
			 
						 if($uploadOk == 0){
								echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File not uploded !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
						}
						else{
						   /* Upload file */
						  if(move_uploaded_file($_FILES['files']['tmp_name'],$location.$new_file_name)){
							 
						   
						   
						   }else{
							   
								echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> File not uploded !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";	
						
						   }
						   
						} 
						

			 
 $sql = "insert into banner_tbl (title,image) values ('$banner_title','$new_file_name')" ;
 $check_query = mysqli_query($con,$sql);
 
	echo "<div class='alert alert-success alert-dismissible fade show' role='alert' 
			data-auto-dismiss><strong> Banner</strong> successfully added<button type='button' 
			class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

}



  


	//count the total banners
	if(isset($_POST["banner_count"])){
			
	$query = "SELECT COUNT(title) as total_banner from banner_tbl";
	$run_query = mysqli_query($con,$query);
	$row = mysqli_fetch_array($run_query);
	$total_banner = $row["total_banner"];
	echo "$total_banner";
}




//get the banner to admin  table
if(isset($_POST["get_banner"])){
	 
		$sql = "SELECT title,image FROM banner_tbl" ;
		$check_query = mysqli_query($con,$sql);
			
		$start=0;
			if(mysqli_num_rows($check_query) > 0){
			while($row = mysqli_fetch_array($check_query))
			{
				 
				$title = $row["title"];
				$image = $row["image"];
				
					$start++;
					echo "<tr class='text-center'>
							<td>$start</td>
							<td>$title</td>
							 <td><img src='../admin/upload/banners/$image' class='rounded' 'width='500px' height='120px'></td>
						  
							<td>
	
							<div class='btn-group '>
							 <a href='' banner_title='$title'   class='btn btn-danger btn_banner_delete'><i class='fa fa-trash-alt'></i></a>
							</div> 
							</td>
						</tr>";
						
			}
			
	
						
						
	}
}



//remove the banner from admin  table
if(isset($_POST["remove_admin_branner"])){
		$banner_title = $_POST["banner_title"]; 
		$sql = "DELETE FROM `banner_tbl` WHERE title='$banner_title'" ;
		$check_query = mysqli_query($con,$sql);

}


//add the offer to admin  table
if(isset($_POST["Offer_add"])){
	 
	  	$Offer_desc = $_POST["Offer_desc"];
	  	$Offer_str = $_POST["Offer_str"];
	  	$Offer_end = $_POST["Offer_end"];
	  	$Offer_rate = $_POST["Offer_rate"];
		
		$sql = "insert into offer_tbl (offer_start_date,offer_end_date,discount_rate,reason) values ('$Offer_str','$Offer_end','$Offer_rate','$Offer_desc')" ;
		$check_query = mysqli_query($con,$sql);
	 
}


if(isset($_POST["get_offer"])){
		$sql = "SELECT offer_id,offer_start_date,offer_end_date,discount_rate,reason,active  FROM offer_tbl" ;
		$check_query = mysqli_query($con,$sql);
		$start=0;
			if(mysqli_num_rows($check_query) > 0){
			while($row = mysqli_fetch_array($check_query))
			{
				$offer_start_date = $row["offer_start_date"];
				$offer_end_date = $row["offer_end_date"];
				$discount_rate = $row["discount_rate"];
				$offer_id = $row["offer_id"];
				$reason = $row["reason"];
				$active = $row["active"];
			$start++;
			echo "  <tr > 
							<td>$start</td>
							<td>$reason</td>
							<td>$offer_start_date</td>
							<td>$offer_end_date</td>
							<td class='text-center'>$discount_rate%</td>
							<td>
	
							<div class='btn-group '>
							<a href='' offer_id='$offer_id'  class='btn btn-info btn_offer_edit'><i class='fa fa-edit'></i></a>
							<a href='' offer_id='$offer_id'  class='btn btn-danger btn_offer_delete'><i class='fa fa-trash-alt'></i></a>
				  ";
							
							if($active==1)
							{ 
								echo "<a href='' id='deactive_btn' alt='Deactive' st_date='$offer_start_date' end_date='$offer_end_date' offer_dactive_id='$offer_id' class='btn btn-success  '><i class='fas fa-check-circle'></i></i></a>"; 
							 
							}
							else
							{
								echo "<a href='' id='btn_offer_active' st_date='$offer_start_date' end_date='$offer_end_date' class='btn btn-warning '  offer_active_id='$offer_id' ><i class='fas fa-check-double'></i></a>"; 
							}
						
						echo "  </div> 
							</td>
						  </tr> 
					
						  "; 
			}
		 }
}

//get ongoing offer
if(isset($_POST["get_ongoing_offer"])){
	$sql = "SELECT reason,active  FROM offer_tbl where active=1" ;
	$check_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($check_query);
	$reason = $row["reason"];
	echo "$reason";
	
}


//delete the offer
if(isset($_POST["delete_offer"])){
	$offer_id = $_POST["offer_id"];
	$sql = "DELETE FROM `offer_tbl` WHERE offer_id=$offer_id" ;
	$check_query = mysqli_query($con,$sql);
}

 

//edit the offer
if(isset($_POST["edit_offer"]))
{   
	$offer_id = $_POST["offer_id"];
	$offer_query = "SELECT * FROM offer_tbl where offer_id =  $offer_id ";
	$run_query = mysqli_query($con,$offer_query);
	$row = mysqli_fetch_array($run_query);
 	 
				$offer_start_date = $row["offer_start_date"];
				$offer_end_date = $row["offer_end_date"];
				$discount_rate = $row["discount_rate"];
				$offer_id = $row["offer_id"];
				$reason = $row["reason"];
				$active = $row["active"];
				 
		echo "$reason*/*$offer_start_date*/*$offer_end_date*/*$discount_rate*/*";
			
			
  
		
}






//update the offer
if(isset($_POST["Offer_update"]))
{   

		$offer_id = $_POST["offer_id"];
		$Offer_desc = $_POST["Offer_desc"];
	  	$Offer_str = $_POST["Offer_str"];
	  	$Offer_end = $_POST["Offer_end"];
	  	$Offer_rate = $_POST["Offer_rate"];
		 
	$offer_id = $_POST["offer_id"];
	$offer_query = "UPDATE `offer_tbl` SET `offer_start_date`='$Offer_str',`offer_end_date`='$Offer_end',`discount_rate`='$Offer_rate',`reason`='$Offer_desc' WHERE offer_id='$offer_id'";
	$run_query = mysqli_query($con,$offer_query);
 
 	 
}
 
 
 //offer deactive
if(isset($_POST["offer_deactive"]))
{   
	$offer_id = $_POST["offer_inactive_id"];
	$offer_query = "UPDATE `offer_tbl` SET `active`=0 WHERE offer_id='$offer_id'";
	$run_query = mysqli_query($con,$offer_query);
 

	}

//offer active
if(isset($_POST["offer_active"]))
{   
	$offer_id = $_POST["offer_active_id"];
	
	$offer_query = "UPDATE `offer_tbl` SET `active`=1 WHERE offer_id='$offer_id'";
	$run_query = mysqli_query($con,$offer_query);
	
	$offer_query = "UPDATE `offer_tbl` SET `active`=0 WHERE !(offer_id='$offer_id')";
	$run_query = mysqli_query($con,$offer_query);

	}


 if(isset($_POST["count_total_customers"]))
{ 

	$total_customers_sql = "SELECT COUNT(customer_id) as total_customer from customer_tbl where 1";
	$run_query = mysqli_query($con,$total_customers_sql);
	$row = mysqli_fetch_array($run_query);
	$count_total_customer = $row["total_customer"];
	echo "$count_total_customer";
 
}



 


 if(isset($_POST["total_number_of_sale"]))
{ 

			date_default_timezone_set('Asia/Kolkata');
			//define date and time
			$year = date('Y');
			$month = date('m');
			 
	$total_sale_query = "SELECT customer_ord_prds.order_date,customer_ord_prds.current_price_per_prd,customer_ord_prds.order_qtry,product_tbl.profit_rate from customer_ord_prds,product_tbl 
	where (customer_ord_prds.product_id=product_tbl.product_id) and  (customer_ord_prds.order_status=3 and  (MONTH(order_date) = $month AND YEAR(order_date) = $year))";
	$run_query = mysqli_query($con,$total_sale_query);
	 $count=mysqli_num_rows($run_query);
		 
			
		if(	$count>0)
		{
						$total_sales_count=0;
						$total_revenue=0;
						$total_cost=0;
						$total_profit=0;
				while($row = mysqli_fetch_array($run_query))
				{  
					$total_sales_count++; //total delivered orders
					$order_qtry = $row["order_qtry"]; //total qty orders
					$profit_rate = $row["profit_rate"] ; // profit rate
					$current_price_per_prd = $row["current_price_per_prd"]; //price per product
					$total_without_profit_price= round(($current_price_per_prd-($profit_rate/($profit_rate+100))*$current_price_per_prd));
					$total_cost=$total_cost+($total_without_profit_price*$order_qtry);
					$total_revenue_a_prd = $order_qtry * $current_price_per_prd; //total revenue for a prd model
					$total_revenue = $total_revenue+$total_revenue_a_prd;  //total revenue calculate
			 
				 }
		
					$total_profit=$total_revenue-$total_cost;
		
				echo "$total_sales_count*/*$total_revenue*/*$total_profit*/*$total_cost*/*";
		
		
		
		}
		else
		{
			 echo "0*/*0*/*0*/*0*/*";
		}
		
 

}



//customer order month wise for dashboar
 if(isset($_POST["customer_order_month"]))
{ 	

		date_default_timezone_set('Asia/Kolkata');
			//define date and time
		$year = date('Y');
		
			$jan_count=0;
			$feb_count=0;
			$march_count=0;
			$april_count=0;
			$may_count=0;
			$jun_count=0;
			$july_count=0;
			$aug_count=0;
			$sep_count=0;
			$october_count=0;
			$november_count=0;
			$december_count=0;
			$month=0;
	$order_month_query = "SELECT MONTH(order_date),COUNT(*) FROM customer_ord_prds WHERE YEAR(order_date) ='$year' GROUP BY MONTH(order_date)";  
	$run_query = mysqli_query($con,$order_month_query);
	$count=mysqli_num_rows($run_query);
	
				while($row = mysqli_fetch_array($run_query))
				{  
					$month=$row["MONTH(order_date)"]; 
					$count=$row["COUNT(*)"]; 
				  
					if($month == 1)
					{
						$jan_count=$count;
					
					}
					else if($month == 2)
					{
						$feb_count=$count;
					}
					else if($month == 3)
					{
						$march_count=$count;
					}
					else if($month == 4)
					{
						$april_count=$count;
					}
					else if($month ==5)
					{
						$may_count=$count;
					}
					else if($month == 6)
					{
						$jun_count=$count;
					}
					else if($month == 7)
					{
						$july_count=$count;
					}
					else if($month == 8)
					{
						$aug_count=$count;
					}
					 
					else if($month == 9)
					{
						$sep_count=$count;
					}
					else if($month ==10)
					{
						$october_count=$count;
					}
					else if($month == 11)
					{
						$november_count=$count;
					}
					else if($month == 12)
					{
						$december_count=$count;
					} 
		
				
				}
					 
								
 		echo "$jan_count*/*$feb_count*/*$march_count*/*$april_count*/*$may_count*/*$jun_count*/*$july_count*/*$aug_count*/*$sep_count*/*$october_count*/*$november_count*/*$december_count*/*";
		

} 

 


 if(isset($_POST["data_for_dashboard_fast_moving_prd"]))
{ 
	 
	 
	  date_default_timezone_set('Asia/Kolkata');
			//define date and time
		$year = date('Y');
		$month = date('m');
		 
	$sql="SELECT  product_id,count(*) AS count_product from customer_ord_prds WHERE YEAR(order_date) ='$year' and MONTH(order_date) ='$month' and order_status=3 GROUP BY product_id ORDER BY count_product DESC LIMIT 5";
	$run_query = mysqli_query($con,$sql);
 				
				while($row = mysqli_fetch_array($run_query))
				{  
					$product_id=$row["product_id"]; 
					$count_fast_move_product=$row["count_product"];


						$sql1="SELECT  product_name,product_id from product_tbl WHERE product_id='$product_id'";
						$run_query1 = mysqli_query($con,$sql1);
						$row = mysqli_fetch_array($run_query1);
						$product_name=$row["product_name"]; 
						
				echo "$product_name*/*$count_fast_move_product*/*" ;	
				}
	 						
	 
}





 if(isset($_POST["data_for_dashboard_order_status"]))
{ 
	  
 $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.order_qtry,customer_ord_prds.customer_ord_id,customer_ord_prds.order_date, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.current_price_per_prd,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id   && ((customer_ord_prds.payment_status=1 || customer_ord_prds.payment_status=2 || customer_ord_prds.payment_status=3 ) && (customer_ord_prds.order_status=0) ) && customer_ord_prds.active=1 ORDER BY order_id ASC" ;
 $check_query = mysqli_query($con,$sql);
 $count_panding_order = mysqli_num_rows($check_query);
 
 $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.customer_ord_id,customer_ord_prds.order_date, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id   && ((customer_ord_prds.payment_status=1 || customer_ord_prds.payment_status=2 || customer_ord_prds.payment_status=3 ) && (customer_ord_prds.order_status=1) ) && customer_ord_prds.active=1 order by order_id" ;
 $check_query = mysqli_query($con,$sql);
 $count_process_order = mysqli_num_rows($check_query);

 
 $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.order_date, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id   && ((customer_ord_prds.payment_status=1 || customer_ord_prds.payment_status=2 || customer_ord_prds.payment_status=3 ) && (customer_ord_prds.order_status=2) ) order by order_id" ;
 $check_query = mysqli_query($con,$sql);
 $count_shipped_order = mysqli_num_rows($check_query);
	
 
 $sql ="SELECT customer_ord_prds.order_id,customer_ord_prds.customer_ord_id,customer_ord_prds.order_date,customer_ord_prds.order_qtry,customer_ord_prds.current_price_per_prd, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.last_name,product_tbl.product_name
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id && customer_ord_prds.product_id=product_tbl.product_id   && ((customer_ord_prds.payment_status=0)) && customer_ord_prds.active=1 order by order_id" ;
  $check_query = mysqli_query($con,$sql);
  $count_unpaid_order = mysqli_num_rows($check_query);
 
 

	 echo "$count_panding_order*/*$count_process_order*/*$count_shipped_order*/*$count_unpaid_order*/*";


}




 if(isset($_POST["data_for_dashboard_revenue_cost"]))
{ 
 
 
  	date_default_timezone_set('Asia/Kolkata');
			//define date and time
		$year = date('Y');
		 
	$monthly_revenue_query = "SELECT  sum(current_price_per_prd*order_qtry) AS Monthly_total_revenue ,MONTH(order_date) AS Month FROM customer_ord_prds WHERE order_status=3 and  YEAR(order_date) ='$year' GROUP BY MONTH(order_date), YEAR(order_date)";
	$run_query = mysqli_query($con,$monthly_revenue_query);
	$count=mysqli_num_rows($run_query);
 	
    $monthly_cost_query ="SELECT MONTH(order_date) AS cost_month,CEILING(sum((customer_ord_prds.current_price_per_prd - (product_tbl.profit_rate/(product_tbl.profit_rate+100))*customer_ord_prds.current_price_per_prd)*customer_ord_prds.order_qtry )) AS Monthly_total_cost FROM customer_ord_prds,product_tbl WHERE (customer_ord_prds.product_id=product_tbl.product_id) and order_status=3 and YEAR(order_date) ='$year' GROUP BY MONTH(order_date), YEAR(order_date)";
	$run_query_cost = mysqli_query($con,$monthly_cost_query);
    		 
			$jan_count=0;
			$feb_count=0;
			$march_count=0;
			$april_count=0;
			$may_count=0;
			$jun_count=0;
			$july_count=0;
			$aug_count=0;
			$sep_count=0;
			$october_count=0;
			$november_count=0;
			$december_count=0;
			$month=0;	
				
				
			$jan_cost_count=0;
			$feb_cost_count=0;
			$march_cost_count=0;
			$april_cost_count=0;
			$may_cost_count=0;
			$jun_cost_count=0;
			$july_cost_count=0;
			$aug_cost_count=0;
			$sep_cost_count=0;
			$october_cost_count=0;
			$november_cost_count=0;
			$december_cost_count=0;
			$Monthly_total_cost=0;
			
				  
				
				while($row = mysqli_fetch_array($run_query))
				{  
						$monthly_total_revenue=$row["Monthly_total_revenue"]; 
						$month=$row["Month"]; 
						 
								if($month == 1 )
								{
									$jan_count=$monthly_total_revenue;
								
								
								}
								else if($month == 2 )
								{
									$feb_count=$monthly_total_revenue;
							
								}
								else if($month == 3)
								{
									$march_count=$monthly_total_revenue;
								
								}
								else if($month == 4 )
								{
									$april_count=$monthly_total_revenue;
									
								}
								else if($month ==5)
								{
									$may_count=$monthly_total_revenue;
									
								}
								else if($month == 6)
								{
									$jun_count=$monthly_total_revenue;
								
								}
								else if($month == 7 )
								{
									$july_count=$monthly_total_revenue;
									
								}
								else if($month == 8)
								{
									$aug_count=$monthly_total_revenue;

								}
								 
								else if($month == 9 )
								{
									$sep_count=$monthly_total_revenue;
									
								}
								else if($month ==10 )
								{
									$october_count=$monthly_total_revenue;

								}
								else if($month == 11 )
								{
									$november_count=$monthly_total_revenue;
									
								}
								else if($month == 12 )
								{
									$december_count =$monthly_total_revenue;
								
								} 
								
						while($row_cost = mysqli_fetch_array($run_query_cost))
						{
							$cost_month=$row_cost["cost_month"]; 
							$Monthly_total_cost=$row_cost["Monthly_total_cost"]; 
							  
								if($cost_month==1 )
								{	
									$jan_cost_count=$Monthly_total_cost;
								}
								else if($cost_month==2)
								{
									
									$feb_cost_count=$Monthly_total_cost;
								}
								else if($cost_month==3)
								{
									$march_cost_count=$Monthly_total_cost;
								}
								else if($cost_month==4)
								{
									$april_cost_count=$Monthly_total_cost;
								}
								else if($cost_month==5)
								{
									$may_cost_count=$Monthly_total_cost;
								}
								else if($cost_month==6)
								{
									$jun_cost_count=$Monthly_total_cost;
								}
								else if($cost_month==7)
								{
									$july_cost_count=$Monthly_total_cost;
								}
								else if($cost_month==8)
								{
									$aug_cost_count=$Monthly_total_cost;
								}
								else if($cost_month==9)
								{
									$sep_cost_count=$Monthly_total_cost;
								}
								else if($cost_month==10)
								{
									$october_cost_count=$Monthly_total_cost;
								}
								else if($cost_month==11)
								{
									$november_cost_count=$Monthly_total_cost;
								}
								else if($cost_month==12)
								{
									$december_cost_count =$Monthly_total_cost;
								}
										 
							 
					}
					
					
				}
	 
 		echo "$jan_count*/*$feb_count*/*$march_count*/*$april_count*/*$may_count*/*$jun_count*/*$july_count*/*$aug_count*/*$sep_count*/*$october_count*/*$november_count*/*$december_count*/*$jan_cost_count*/*$feb_cost_count*/*$march_cost_count*/*$april_cost_count*/*$may_cost_count*/*$jun_cost_count*/*$july_cost_count*/*$aug_cost_count*/*$sep_cost_count*/*$october_cost_count*/*$november_cost_count*/*$december_cost_count";
		
}
	
	
	
 // get all sales data without any filter
if(isset($_POST["get_sales_report"]))
{ 
 
	 
	$total_sale_query = "SELECT category_tbl.category_name,brand_tbl.brand_name,customer_tbl.first_name,customer_tbl.last_name,customer_ord_prds.order_date,customer_ord_prds.current_price_per_prd,customer_ord_prds.order_qtry,product_tbl.profit_rate,product_tbl.product_name from customer_ord_prds,product_tbl,customer_tbl,brand_tbl,category_tbl
	where   (category_tbl.category_id=product_tbl.product_category) and (brand_tbl.brand_id=product_tbl.product_brand) and (customer_ord_prds.customer_id=customer_tbl.customer_id) and  (customer_ord_prds.product_id=product_tbl.product_id) and  (customer_ord_prds.order_status=3 ) order by customer_ord_prds.order_date asc ";
	$run_query = mysqli_query($con,$total_sale_query);
	 $count=mysqli_num_rows($run_query);
		 
		$i=0;
		
		if(	$count>0)
		{ 
				while($row = mysqli_fetch_array($run_query))
				{  
				
				 $i++;
					$order_date=$row["order_date"]; 
					$current_price_per_prd=$row["current_price_per_prd"]; 
					$last_name=$row["last_name"]; 
					$first_name=$row["first_name"]; 
					$product_name=$row["product_name"]; 
					$order_qtry=$row["order_qtry"]; 
					$brand_name=$row["brand_name"]; 
					$category_name=$row["category_name"]; 
					$profit_rate=$row["profit_rate"]; 
			 
			 
					
					$profit = round(($profit_rate/(100+$profit_rate))*$current_price_per_prd)*$order_qtry;
					$cost_of_product= ($current_price_per_prd-$profit);
					
						 echo 	"	
									<tr class='text-center'>
									<td>$i</td>
									<td>$order_date</td>
									<td>$first_name $last_name</td>
									<td >$product_name</td>
									<td>$category_name</td>
									<td>$brand_name</td>
									<td>Rs.$current_price_per_prd.00</td>
									<td>Rs.$cost_of_product.00</td>
								 	<td><b>$order_qtry</b></td>
									<td>Rs.$profit.00</td>
						 
								  </tr>	";
						 
			 
			 
			 
			 
			 
			 
			 
				 }
				 
				 
		 
		}





}
	
	
// get sales report data using date start and end
if(isset($_POST["get_sales_report_date_wise_filter"]))
{ 
$sales_report_from = $_POST["sales_report_from"];
$sales_report_to = $_POST["sales_report_to"];
  

	date_default_timezone_set('Asia/Kolkata');
			//define date and time
			$year = date('Y');
			$month = date('m');
			 
	$total_sale_query = "SELECT category_tbl.category_name,brand_tbl.brand_name,customer_tbl.first_name,customer_tbl.last_name,customer_ord_prds.order_date,customer_ord_prds.current_price_per_prd,customer_ord_prds.order_qtry,product_tbl.profit_rate,product_tbl.product_name from customer_ord_prds,product_tbl,customer_tbl,brand_tbl,category_tbl
	where   (category_tbl.category_id=product_tbl.product_category) and (brand_tbl.brand_id=product_tbl.product_brand) and (customer_ord_prds.customer_id=customer_tbl.customer_id) and  (customer_ord_prds.product_id=product_tbl.product_id) and  (customer_ord_prds.order_status=3 ) and customer_ord_prds.order_date BETWEEN '$sales_report_from' and '$sales_report_to' order by customer_ord_prds.order_date asc";
	$run_query = mysqli_query($con,$total_sale_query);
	 $count=mysqli_num_rows($run_query);
		 
		$i=0;
		
		if(	$count>0)
		{ 
				while($row = mysqli_fetch_array($run_query))
				{  
				
				 $i++;
					$order_date=$row["order_date"]; 
					$current_price_per_prd=$row["current_price_per_prd"]; 
					$last_name=$row["last_name"]; 
					$first_name=$row["first_name"]; 
					$product_name=$row["product_name"]; 
					$order_qtry=$row["order_qtry"]; 
					$brand_name=$row["brand_name"]; 
					$category_name=$row["category_name"]; 
					$profit_rate=$row["profit_rate"]; 
			 
			 
					
					$profit = round(($profit_rate/(100+$profit_rate))*$current_price_per_prd)*$order_qtry;
					$cost_of_product= ($current_price_per_prd-$profit);
					
						 echo 	"	
									<tr class='text-center'>
									<td>$i</td>
									<td>$order_date</td>
									<td>$first_name $last_name</td>
									<td >$product_name</td>
									<td>$category_name</td>
									<td>$brand_name</td>
									<td>Rs.$current_price_per_prd.00</td>
									<td>Rs.$cost_of_product.00</td>
									<td><b>$order_qtry</b></td>
									<td>Rs.$profit.00</td>
						 
								  </tr>	";
						 
			 
			 
			 
			 
			 
			 
			 
				 }
				 
				 
		 
		}


}

	 
	
	
	
// get sales report data using search filter
	
if(isset($_POST["get_sales_report_search_filter"]))
{ 
$sales_report_from = $_POST["sales_report_from"];
$sales_report_to = $_POST["sales_report_to"];
$sales_report_search = $_POST["sales_report_search"];
 

if($sales_report_from != "" || $sales_report_to !="" )
{
	$order_date_selected ="and customer_ord_prds.order_date BETWEEN '$sales_report_from' and '$sales_report_to'";
}
else
{
	
	$order_date_selected ="";
}




 date_default_timezone_set('Asia/Kolkata');
			//define date and time
			$year = date('Y');
			$month = date('m');
			 
	$total_sale_query = "SELECT category_tbl.category_name,brand_tbl.brand_name,customer_tbl.first_name,customer_tbl.last_name,customer_ord_prds.order_date,customer_ord_prds.current_price_per_prd,customer_ord_prds.order_qtry,product_tbl.profit_rate,product_tbl.product_name from customer_ord_prds,product_tbl,customer_tbl,brand_tbl,category_tbl
	where   (category_tbl.category_id=product_tbl.product_category) and (brand_tbl.brand_id=product_tbl.product_brand) and (customer_ord_prds.customer_id=customer_tbl.customer_id) and  (customer_ord_prds.product_id=product_tbl.product_id) and  (customer_ord_prds.order_status=3 ) $order_date_selected and (customer_ord_prds.order_date  like '%".$sales_report_search."%' OR customer_ord_prds.current_price_per_prd like '%".$sales_report_search."%' OR customer_tbl.first_name like '%".$sales_report_search."%' OR customer_tbl.last_name like '%".$sales_report_search."%' OR product_tbl.product_name like '%".$sales_report_search."%' OR  customer_ord_prds.order_qtry like '%".$sales_report_search."%' OR  brand_tbl.brand_name like '%".$sales_report_search."%' OR category_tbl.category_name like '%".$sales_report_search."%') order by customer_ord_prds.order_date asc";
	$run_query = mysqli_query($con,$total_sale_query);
	 $count=mysqli_num_rows($run_query);
		 
		$i=0;
		
		if(	$count>0)
		{ 
				while($row = mysqli_fetch_array($run_query))
				{  
				
				 $i++;
					$order_date=$row["order_date"]; 
					$current_price_per_prd=$row["current_price_per_prd"]; 
					$last_name=$row["last_name"]; 
					$first_name=$row["first_name"]; 
					$product_name=$row["product_name"]; //
					$order_qtry=$row["order_qtry"]; //
					$brand_name=$row["brand_name"]; //
					$category_name=$row["category_name"]; //
					$profit_rate=$row["profit_rate"]; 
			 
			 
					
				 $profit = round(($profit_rate/(100+$profit_rate))*$current_price_per_prd)*$order_qtry;
					$cost_of_product= ($current_price_per_prd-$profit);
					
						 echo 	"	
									<tr class='text-center'>
									<td>$i</td>
									<td>$order_date</td>
									<td>$first_name $last_name</td>
									<td >$product_name</td>
									<td>$category_name</td>
									<td>$brand_name</td>
									<td>Rs.$current_price_per_prd.00</td>
									<td>Rs.$cost_of_product.00</td>
									<td><b>$order_qtry</b></td>
									<td>Rs.$profit.00</td>
						 
								  </tr>	";
						 
			 
			 
			 
			 
			 
			 
			 
				 }
				 
				 
		 
		}


}








//customer details  for report
if(isset($_POST["get_customer_report"]))
{  

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
					 <td>$i</td>
                  <td> $first_name</td>
                      <td>  $last_name</td>
                      <td> $email</td>
                      <td > $phone</td>
                      <td > $address </td>
					  <td> $city  </td>
					  <td> $postal </td>
                   </tr>
				  
					
					
					";
					
				$i++	;
			}
}
	
	
	
//customer details filter by search in report
if(isset($_POST["get_customer_report_search_filter"]))
{ 
$customer_filter_report_search = $_POST["customer_filter_report_search"];

$sql ="SELECT * from customer_tbl where (customer_tbl.first_name  like '%".$customer_filter_report_search."%' || customer_tbl.last_name  like '%".$customer_filter_report_search."%' || customer_tbl.first_name  like '%".$customer_filter_report_search."%' || customer_tbl.email  like '%".$customer_filter_report_search."%' || customer_tbl.phone  like '%".$customer_filter_report_search."%' || customer_tbl.postal  like '%".$customer_filter_report_search."%' || customer_tbl.city  like '%".$customer_filter_report_search."%' ) " ;
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
					 <td> $i </td>
						<td> $first_name</td>
                      <td>  $last_name</td>
                      <td> $email</td>
                      <td > $phone</td>
                      <td > $address </td>
					  <td> $city  </td>
					  <td> $postal </td>
                   </tr>
				  
					
					
					";
					
				$i++	;
			}
}







 

 
 

if(isset($_POST["get_stock_details_for_report"]))
{ 
  
	  
			$prd_filter_sql = "SELECT  product_tbl.product_id,product_tbl.profit_rate,product_tbl.created_date,product_tbl.product_weight,product_tbl.product_name,product_tbl.product_price,product_tbl.product_desc,product_tbl.product_total_qty,product_tbl.product_img,category_tbl.category_name,brand_tbl.brand_name
					 from product_tbl,category_tbl,brand_tbl
					where (product_tbl.product_category = category_tbl.category_id) and (product_tbl.product_brand = brand_tbl.brand_id) and (product_tbl.active=1)";
					$prd_filter_qry = mysqli_query($con,$prd_filter_sql);
					$get_filter_output = mysqli_num_rows($prd_filter_qry);

		$i=1;
		 
					
		if(mysqli_num_rows($prd_filter_qry) > 0){
			while($row = mysqli_fetch_array($prd_filter_qry))
			{
				$product_id = $row["product_id"];
				$created_date = $row["created_date"];
				$product_category = $row["category_name"];
				$product_brand = $row["brand_name"];
				$product_name = $row["product_name"];
				$current_price_per_prd = $row["product_price"];
				$product_desc = $row["product_desc"];
				$profit_rate = $row["profit_rate"];
				$product_weight = $row["product_weight"];
				$product_img = $row["product_img"];
				$product_total_qty = $row["product_total_qty"];
				
				
				
		$profit = round(($profit_rate/(100+$profit_rate))*$current_price_per_prd) ;
		 $cost_of_product= ($current_price_per_prd-$profit);
		 
		 
		 
		 
				echo "	
	 
					<tr  class='text-center'>
						<td>$i</td>
						<td>$created_date</td>
						<td>$product_name</td>
						<td>$product_category</td>
						<td>$product_brand</td>
						<td>$product_weight</td>
						<td>Rs.$cost_of_product.00</td>
						<td>Rs.$current_price_per_prd.00</td>
						<td>$product_total_qty</td>
				 
					  </tr>";
					  $i++;
	 
			}
 
		}
 

}










//get the stock details filter
if(isset($_POST["get_stock_details_filter_for_report"]))
{ 

$get_stock_details_search = $_POST["get_stock_details_search"];


			$prd_filter_sql = "SELECT  product_tbl.product_id,product_tbl.profit_rate,product_tbl.created_date,product_tbl.product_weight,product_tbl.product_name,product_tbl.product_price,product_tbl.product_desc,product_tbl.product_total_qty,product_tbl.product_img,category_tbl.category_name,brand_tbl.brand_name
					 from product_tbl,category_tbl,brand_tbl 
					 where (product_tbl.product_category = category_tbl.category_id) and (product_tbl.product_brand = brand_tbl.brand_id) and (product_tbl.active=1) and( (product_tbl.created_date  like '%".$get_stock_details_search."%') ||  (category_tbl.category_name  like '%".$get_stock_details_search."%') ||  (brand_tbl.brand_name  like '%".$get_stock_details_search."%')  || (product_tbl.product_name  like '%".$get_stock_details_search."%') ||(product_tbl.product_price  like '%".$get_stock_details_search."%') || (product_tbl.product_weight  like '%".$get_stock_details_search."%') || (product_tbl.product_total_qty  like '%".$get_stock_details_search."%') )";
					$prd_filter_qry = mysqli_query($con,$prd_filter_sql);
					$get_filter_output = mysqli_num_rows($prd_filter_qry);

		$i=1; 			
		if(mysqli_num_rows($prd_filter_qry) > 0){
			while($row = mysqli_fetch_array($prd_filter_qry))
			{
				$product_id = $row["product_id"];
				$created_date = $row["created_date"];
				$product_category = $row["category_name"];
				$product_brand = $row["brand_name"];
				$product_name = $row["product_name"];
				$current_price_per_prd = $row["product_price"];
				$profit_rate = $row["profit_rate"];
				$product_weight = $row["product_weight"];
				$product_total_qty = $row["product_total_qty"];
				
				
				
		$profit = round(($profit_rate/(100+$profit_rate))*$current_price_per_prd) ;
		 $cost_of_product= ($current_price_per_prd-$profit);
		 
		 
		 
		 
				echo "	
	 
					<tr  class='text-center'>
						<td>$i</td>
						<td>$created_date</td>
						<td>$product_name</td>
						<td>$product_category</td>
						<td>$product_brand</td>
						<td>$product_weight</td>
						<td>Rs.$cost_of_product.00</td>
						<td>Rs.$current_price_per_prd.00</td>
						<td>$product_total_qty</td>
				 
					  </tr>";
					  $i++;
	 
			}
 
		}
}





 



// get the customer message
if(isset($_POST["get_customer_message_to_admin"]))
{ 
 
					date_default_timezone_set('Asia/Kolkata');
					//define date and time
					$today = date("Y-m-d"); // get the date
					$time = date("h:i:sa");
		 		
				
				
				
		$sql1="SELECT * FROM comments_tbl where comment_type=4 and active=1 and admin=0 and active=1 and date='$today' and admin_reply_comment_id=0 ";
		$run_query1 = mysqli_query($con,$sql1);
		$count=mysqli_num_rows($run_query1);

 
		
		 
		
		if($count>0)
		{
					 while($row = mysqli_fetch_array($run_query1))
							{
								$customer_id = $row["customer_id"];
								$description = $row["description"];
								$comments_id = $row["comments_id"];
								$date = $row["date"];
							  
								 $sql_cus="SELECT * FROM customer_tbl where customer_id=$customer_id";
								 $run_query_cus = mysqli_query($con,$sql_cus);
								 $row_cus = mysqli_fetch_array($run_query_cus);
								 $email = $row_cus["email"];
											
  
												
							echo"
							<tr class='text-center shadow-sm rounded-sm'><td>
										<div class='row  '>
											<div class='col-sm'>
											<p class='card-text text-left'>Date : <b>$date</b> </p> 
													</div>	
													<div class='col-sm'>
															<p class='card-text text-l'><b></b> </p>
													</div>
													
													<div class='col-sm'>
													<p class='card-text text-right' >Customer email : $email <b> </b> </p>
													</div>	
													</div>	
												<p class='card-text mt-2' style='cursor: pointer;'><span style='width:800px;display: inline-block;'>$description</span><small><b></b></small></p>
												  
													 	 <div class='btn-group mt-2  '>
																<a href='' class='btn btn-warning mr-2 rounded' id='comment_reply_btn' admin_reply_customer_id='$customer_id' customer_email_for_admin_model='$email' comment_id='$comments_id' data-toggle='modal' data-target='#admin_message_model' ><i class='fa fa-check'></i> Reply </a>
						 
																<a href='message.php' class='btn btn-danger mr-2  rounded'><i class='fa fa-times'></i> Cancel</a>
						  
														 </div>
														 </td> </tr>
												";
															
		 
								
							}

 

			
			
		}
		
		

		
	


							

}




 
//send the message to customer
if(isset($_POST["send_customer_message"]))
{ 

$admin_msg_to_customer = $_POST["admin_msg_to_customer"];
$cus_email = $_POST["cus_email"];
@$admin_reply_comment_id = $_POST["admin_reply_comment_id"];
 
 
		date_default_timezone_set('Asia/Kolkata');
		
 		 //define date and time
		 $today = date("Y-m-d"); 
		 $time = date("h:i:sa");
		 
		  
 
		$sql_customer_id="SELECT customer_id FROM customer_tbl where email='$cus_email'";
		$run_query_coustomer_id= mysqli_query($con,$sql_customer_id);
		$row_email = mysqli_fetch_array($run_query_coustomer_id);
		$count=mysqli_num_rows($run_query_coustomer_id);
		$customer_id = $row_email["customer_id"];
	 
	 
		  if($count>0)
		  {
			   $sql="insert  into comments_tbl (customer_id,date,time,comment_type,description,active,admin_reply_comment_id,admin) values($customer_id,'$today','$time',4,'$admin_msg_to_customer',1,1,1)";
				 $run_query = mysqli_query($con,$sql);
						
				  
				 
				 $sql="update comments_tbl set  active=0,admin_reply_comment_id=1 where comment_type=4 and active=1 and admin=0 and  customer_id=$customer_id";
				 $run_query = mysqli_query($con,$sql);
				 
		  }
		  else
		  {
			  echo "1";
		  }
 


}





if(isset($_POST["count_cutomer_msg_admin_panel"]))
{
	
		date_default_timezone_set('Asia/Kolkata');
					//define date and time
					$today = date("Y-m-d"); // get the date
					$time = date("h:i:sa");
		 		
				
		$sql1="SELECT * FROM comments_tbl where comment_type=4 and active=1 and admin=0 and active=1 and date='$today' and admin_reply_comment_id=0 ";
		$run_query1 = mysqli_query($con,$sql1);
		$count=mysqli_num_rows($run_query1);
		echo "$count";

}


 
	
	
	
	
	
	
	
if(isset($_POST["get_print_data"]))
{
	
date_default_timezone_set('Asia/Kolkata');
//define date and time
$today = date("Y-m-d"); // get the date
					
					
$invoice_id = $_POST["invoice_id"];
$order_id=$invoice_id;


$sql_customer_details="SELECT * FROM customer_tbl,customer_ord_prds where customer_tbl.customer_id =customer_ord_prds.customer_id and  order_id=$order_id";
		$run_query_customer_details = mysqli_query($con,$sql_customer_details);
		$row_customer_details = mysqli_fetch_array($run_query_customer_details);
		$last_name = $row_customer_details["last_name"];
		$first_name = $row_customer_details["first_name"];
		$phone = $row_customer_details["phone"];
		$address = $row_customer_details["address"];
		$city = $row_customer_details["city"];
		$postal = $row_customer_details["postal"];
		
		
		
		
echo "
 
 
<tr >
<td colspan='5' ><hr></td>
</tr>
<tr>
<td  colspan='2'><strong>BILL TO</strong></td>
<td>&nbsp;</td>
<td align='right' ><strong>INVOICE&nbsp; NO : </strong> </td>
 

<td  >
 &nbsp $invoice_id
</td>
 
</tr>


<tr  >
<td  colspan='2' ><strong>  $first_name  $last_name</strong></td>
<td >&nbsp;</td>
<td align='right' ><strong>INVOICE DATE : </strong></td>
 

<td   > &nbsp $today</td>
 
</tr>
<tr >
<td  colspan='2' style='width:200px; height: 18px;'>$address</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
 
 
</tr>
<tr >
<td colspan='2' >$city</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
 
 
</tr>
<tr >
<td  colspan='2'>$postal</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
 
 
</tr>
<tr >
<td  colspan='2'>$phone</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
 
</tr>
<tr >
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
 
</tr>
<tr  style='font-size:20;background-color: #dff0d8 !important;
    -webkit-print-color-adjust: exact;'>
<td style='width: 10px; height: 18px;' ><strong>NO</strong></td>
<td ><strong>ITEM</strong></td>
<td align='center' style='width: 154px; height: 18px; margin-left:50px'><strong>QTY</strong></td>
<td style='width: 154px; height: 18px;'><strong>UNIT PRICE</strong></td>
<td style='width: 154px; height: 18px;'><strong>TOTAL PRICE</strong></td>
 
</tr>
";





$sql ="SELECT customer_ord_prds.current_price_per_prd,customer_ord_prds.order_qtry,customer_ord_prds.order_id,customer_ord_prds.customer_ord_id,customer_ord_prds.order_date, customer_ord_prds.product_id 
 ,customer_ord_prds.order_status,customer_ord_prds.payment_status,customer_ord_prds.customer_id,customer_ord_prds.customer_note,customer_tbl.email,customer_tbl.last_name,product_tbl.product_name,product_tbl.product_weight
 FROM product_tbl,customer_ord_prds,customer_tbl where customer_ord_prds.customer_id = customer_tbl.customer_id   && customer_ord_prds.product_id=product_tbl.product_id && not(customer_ord_prds.order_status=3)  && customer_ord_prds.active=1 && customer_ord_prds.order_id=$order_id" ;
 $check_query = mysqli_query($con,$sql);

  $total=0;
		 $i=$start+1;

 
		

$sql1="SELECT discount_rate FROM order_tbl where order_id=$order_id";
		$run_query1 = mysqli_query($con,$sql1);
		$row_rate = mysqli_fetch_array($run_query1);
		$discount_rate = $row_rate["discount_rate"];
  
		while($row = mysqli_fetch_array($check_query))
			{
				
				$order_id = $row["order_id"];
				$order_date = $row["order_date"];
				$product_name = $row["product_name"];
 
				$current_price_per_prd=$row["current_price_per_prd"];
				$order_status=$row["order_status"];
				$customer_ord_id=$row["customer_ord_id"];
				$order_qtry=$row["order_qtry"];
				$product_weight=$row["product_weight"];
 
				 
				 $qty_mul_price= ($current_price_per_prd*$order_qtry);
				 $total=$total+$qty_mul_price;
				 $discount=(($discount_rate/100)*$total);
				 
				 $final_amount_before_cor=$total-$discount;
				 
				
				 
				  
				 
				 
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
								
				 
				 
				 
				  $final_amount_wiht_cor= $final_amount_before_cor+$Courier;
				 
				 
				 
				
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
					echo"


					<tr>
					<td >$i</td>
					<td >$product_name</td>
					<td align='center'>$order_qtry</td>
					<td >Rs.$current_price_per_prd.00</td>
					<td >Rs.$qty_mul_price.00</td>
					 
					</tr>
					 "; 
					 $i++;


			}

  
echo 
"
<tr >
<td>&nbsp;  </td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
 
</tr>
<tr >
<td  >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td   >&nbsp;</td>
 
</tr>
<tr  >
<td  >&nbsp;</td>
<td  >&nbsp;</td>
<td  >&nbsp;</td>
<td  >&nbsp;</td>
<td  >&nbsp;</td>
 
</tr>
<tr >
<td ><strong>NOTE:</strong></td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td align='right'><strong>SUB TOTAL</strong></td>
<td align='center' style='  background-color: #dff0d8 !important;
    -webkit-print-color-adjust: exact;'>&nbsp;<b>Rs.$total.00</b></td>
 
</tr>
<tr >
<td colspan='2'>No return acceptable</td>
<td >&nbsp;</td>
 
<td align='right'><strong>DISCOUNT</strong></td>
<td align='center' style='  background-color: #dff0d8 !important;
    -webkit-print-color-adjust: exact;' >&nbsp; (Rs.$discount.00)</td>
 
</tr>
<tr >
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td align='right'><strong>COURIER CHARGE</strong></td>
<td align='center' style='  background-color: #dff0d8 !important;
    -webkit-print-color-adjust: exact;'>&nbsp; $Courier</td>
 
</tr>
<tr >
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td align='right' ><strong>TOTAL</strong></td>
<td align='center'  style='  background-color: #dff0d8 !important;
    -webkit-print-color-adjust: exact;'>&nbsp&nbsp&nbsp<b>$final_amount_wiht_cor</b></td>
 
</tr>";
    
}
	
	
	
	
?>