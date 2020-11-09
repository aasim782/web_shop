-message particially complted
" Ver 0.6.28"
 

Developemnt pending.
-service tracking info update (reciver details admin)
  
  
-cancel or unpaid something module (error also should solve)

-order module full chekup
-customes order

 


"problem doest not solwed"
-db insert have prb
-index page does not have filter
-product image size valideation
 
Report doc
newprice in offer tabele ---->active
order table --> discount rate
date at product table
delivery table small changes image and recived date filed miss
commets table product id added
register button name changed

--when i register login is comming
--ready to pickup doest not hide
--bank deposite date validation
























		  
		
		$sql = "SELECT * FROM tracking_tbl WHERE tracking_id = '$cori_tracking_id'" ;
		$check_query = mysqli_query($con,$sql);
		$count_rows = mysqli_num_rows($check_query);
		$delivery_id = $row_data["delivery_id"];
		
		
		$sql = "SELECT * FROM delivery_tbl WHERE delivery_id = '$delivery_id'" ;
		$check_query = mysqli_query($con,$sql);
		$count_rows = mysqli_num_rows($check_query);
		$order_id = $row_data["order_id"];
		
		
		if($count_rows>0)
		{
			
			$sql = "SELECT * FROM courier_tbl WHERE id = '$cour_user_id'" ;
			$check_query = mysqli_query($con,$sql);
			$row_data = mysqli_fetch_array($check_query);
			$District = $row_data["District"];
		
			$sql = " UPDATE `tracking_tbl` SET `current_district`= '$District' WHERE tracking_id = '$cori_tracking_id'" ;
			$check_query = mysqli_query($con,$sql);

			$sql1 = "UPDATE  receive_person_details_tbl  SET  received_person_name='$cori_name', nic='$cori_nic' ,phone= '$cori_phone') where order_id=$order_id" ;
			$check_query = mysqli_query($con,$sql1);
 
			
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






























		$sql = "SELECT * FROM delivery_tbl WHERE delivery_id = $delivery_id" ;
		$check_query = mysqli_query($con,$sql);
		$count_rows = mysqli_num_rows($check_query);
		$order_id = $row_data["order_id"];
		
		
		if($count_rows>0)
		{
			
			$sql = "SELECT * FROM courier_tbl WHERE id = '$cour_user_id'" ;
			$check_query = mysqli_query($con,$sql);
			$row_data = mysqli_fetch_array($check_query);
			$District = $row_data["District"];
		
			$sql = " UPDATE `tracking_tbl` SET `current_district`= '$District' WHERE tracking_id = '$cori_tracking_id'" ;
			$check_query = mysqli_query($con,$sql);

			$sql1 = "UPDATE  receive_person_details_tbl  SET  received_person_name='$cori_name', nic='$cori_nic' ,phone= '$cori_phone') where order_id=$order_id" ;
			$check_query = mysqli_query($con,$sql1);
 
			
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

