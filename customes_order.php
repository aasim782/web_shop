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
  
  
<!-- signupModel -->
<div class="modal fade" id="customes_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-warning">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i>&nbspCustomes Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		
	   <!-- Customer Registration Form -->
	 <form id="customes_order_form" >
	 		<div id="cus_alert_msg" > </div>
		  <div class="form-row">
			<div class="col-md-6">
			  <label for="validationCustom01">Firt Name </label>
			  <input type="text" class="form-control" id="Customes_order_fnametxt" name="Customes_order_fnametxt" placeholder="First name">
		
			</div>
			
			<div class="col-md-6">
			  <label for="validationCustom02">Last Name</label>
			  <input type="text" class="form-control" id="Customes_order_lnametxt"  name='Customes_order_lnametxt' placeholder="Last name" >
		
			</div>
			</div>
	
	
	<div class="form-row">
	    <div class="col-md-6">
      <label for="validationCustom02">Email</label>
      <input type="text" class="form-control" id="Customes_order_emailtxt"  name="Customes_order_emailtxt" placeholder="Email" >

    </div>
	<div class="col-6">
      <label for="validationCustom04">Phone</label>
      <input type="text" class="form-control" size="10"  maxlength="10"  id="Customes_order_phonetxt" name="Customes_order_phonetxt" placeholder="Phone">
      </div>
    </div>

  
    
    <div class="form-row">
    <div class="form-group col-12">
    <label for="exampleFormControlTextarea1">What do you want</label>
    <textarea class="form-control" id="Customes_order_txt"  name="Customes_order_msg" rows="3"></textarea>

	</div>
	</div>
	

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Request</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- /Customer Reg form -->
    </div>
  </div>
</div> <!-- /Customer form model -->

</body>
</html>