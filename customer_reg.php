 <html> <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css?i=26">
	<script src="js/all.js?i=26" data-auto-replace-svg="nest"></script>
	<script src="prg_main.js?i=26" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="css/all.css?i=26">
    <title>Dress Line</title>
  </head>
  
  <body>
  
   
  
  <!-- customer login model -->
<div class="modal fade" id="customer_login_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-warning">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i>&nbsp Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
	<div class="container  ">
    	<div class="container" >
			<div id="cus_reg_alert_msg_login" class=" mt-3"></div>
		</div>
				<form class="mt-4">
			  <div class="form-group ">
				<label for="exampleDropdownFormEmail2">Email</label>
				<input type="email" class="form-control" id="lg_email_txt" placeholder="email@example.com">
			  </div>
			  <div class="form-group">
				<label for="exampleDropdownFormPassword2">Password</label>
				<input type="password" class="form-control" id="lg_password_txt" placeholder="Password">
			  </div>
 			
  <div class="col-12">
	<div class="col-sm">
    <a class="nav-link " href="#"  id="create_form_model" data-toggle="modal" data-target="#signupModel"  role="tab"> <i class="fas fa-man"></i> Create Account</a>
	</div>
		<div class="col-sm">
    	   <a class="nav-link " href="#"  id="forget_btn"  data-toggle="modal" data-target="#customer_forget_Password_model"  role="tab"> <i class="fas fa-man"></i>Forgot password </a>
	</div>
	 
	</div>
	</div>
	  
      </div>
      <div class="modal-footer">
          <button type="submit" id="login_page_login_btn" class="btn btn-danger">Login</button>	 
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
 </form>
    </div>
  </div>
</div> <!-- /Customer form model -->
 
<!-- signupModel -->
<div class="modal fade" id="signupModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-warning">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i>&nbspRegistration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		
	   <!-- Customer Registration Form -->
	 <form id="customer_reg_form" >
	 		<div id="cus_alert_msg" > </div>
		  <div class="form-row">
			<div class="col-md-6">
			  <label for="validationCustom01">First name</label>
			  <input type="text" class="form-control" id="fname" name="fnametxt" placeholder="First name">
		
			</div>
			
			<div class="col-md-6">
			  <label for="validationCustom02">Last name</label>
			  <input type="text" class="form-control" id="lname"  name='lnametxt' placeholder="Last name" >
		
			</div>
			</div>
	
	
	<div class="form-row">
	    <div class="col-md-6">
      <label for="validationCustom02">Email</label>
      <input type="text" class="form-control" id="email"  name="emailtxt" placeholder="Email" >

    </div>
	<div class="col-6">
      <label for="validationCustom04">Phone</label>
      <input type="text" class="form-control" size="10"  maxlength="11"  id="phone" name="phonetxt" placeholder="9477000000">
      </div>
    </div>

  
  
	  <div class="form-row">
		<div class="col-6">
		  <label for="validationCustom03">Create Paasword</label>
		  
		  <input type="password" class="form-control" id="password" name="password1txt" placeholder="Create Paasword">

		</div>
	   
		<div class="col-md-6">
		  <label for="validationCustom05">Confirm Paasword</label>
		  <input type="password" class="form-control" id="repassword" placeholder="Confirm Paasword">

		</div>
	  </div>
  

  
    <div class="form-row">
    <div class="col-md-12">
    <label for="exampleFormControlTextarea1">Address</label>
    <textarea class="form-control" id="address"  name="addresstxt" rows="3"></textarea>

	</div>
	</div>
	    <div class="form-row">
  		<div class="col-md-6">
		  <label for="validationCustom05">City</label>
		  <input type="text" class="form-control" id="city" name="citytxt" placeholder="City">

		</div>
  
    <div class="col-6">
      <label for="validationCustom05">Postal Code</label>
      <input type="number" class="form-control" id="postal" maxlength="3"  name="postaltxt" placeholder="Postal Code" >

    </div>
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Save</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- /Customer Reg form -->
    </div>
  </div>
</div> <!-- /Customer form model -->

















 <!-- /Customer chanepassword Model -->

<div class="modal fade" id="chanepasswordModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-warning">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-key"></i>&nbspChange Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		
	   <!-- password change Form -->
	 <form id="customer_change_password_form" >
	 		<div id="customer_change_passwrd_msg" > </div>
		  <div class="form-row">
			<div class="col-md-12">
			  <label for="validationCustom01">Old password</label>
			  <input type="password" class="form-control" id="Old_passwordtxt" name="Old_password" placeholder="Old password">
		
			</div>

			</div>
	
	
	<div class="form-row">
	    <div class="col-md-6">
      <label for="validationCustom02">New password</label>
      <input type="password" class="form-control" id="New_Paaswordtxt"  name="New_Paasword" placeholder="New password" >

    </div>
	<div class="col-6">
      <label for="validationCustom04">Confirm password</label>
      <input type="password" class="form-control" id="Confirm_Paaswordtxt" name="Confirm_Paasword" placeholder="Confirm password">
      </div>
    </div>

 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" id="cus_chanepassword_btn">Change</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- / form -->
    </div>
  </div>
</div> <!-- / -->







<div class="modal fade" id="customer_complain_Model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-warning">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-key"></i>&nbspComplain</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		
	   <!-- password change Form -->
	 <form id="customer_complian_form" >
	 		<div id="customer_complain_msg" ></div>
		  <div class="form-row justify-content-center ">
		<div class="form-group col-md-6 ">
      
      <select id="complain_item_list" class="form-control ">
	  
      </select>
    </div>
			
			</div>
	<div class="form-row">
	 
	<div class="col-12">
      <label for="validationCustom04">Complain </label>
         <textarea class="form-control" id="complain_messagetxt"  name="complain_message"  placeholder="Message" rows="10"></textarea>
		 </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" id='complain_btn'>Send</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- / form -->
    </div>
  </div>
</div> <!-- / -->











<div class="modal fade" id="customer_feedback_Model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-warning">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-envelope"></i>&nbspFeedback Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		
	   <!-- password change Form -->
	 <form id="customer_feedback_frm" >
	 		<div id="customer_feedback_msg"  ><div class="alert alert-warning alert-dismissible fade show" role="alert" data-auto-dismiss=""> We will Use your feedback to Improve our portal.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div></div>
			
		  <div class="form-row justify-content-center ">
	 
			</div>
	<div class="form-row">
	 
	<div class="col-12">
      <label for="validationCustom04">Message: *</label>
         <textarea class="form-control" id="feedback_messagetxt"  name="feedback_message"   placeholder="Tell us What You Like about us? or What should we do to more to improve our portal." rows="10"></textarea>
		 
		 
		 
		 </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" id='customer_feedback_btn'>Send</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- / form -->
    </div>
  </div>
</div> <!-- / -->







</body>
</html>