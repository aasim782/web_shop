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
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i>&nbspCustome Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		
	   <!-- Customer Registration Form -->
	 <form id="customes_order_form" >
	 		<div id="customes_alert_msg" >
			
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  Place your custom order content, We will try our best to get it for you
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div> 

</div>
   
    <div class="form-row">
    <div class="form-group col-12">
	
    <label for="exampleFormControlTextarea1">Tell us about what do you need *</label>
    <textarea class="form-control" id="customer_msg_type_txt"   rows="3"></textarea>

	</div>
	</div>
	

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="customer_msg_btn">Request</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- /Customer Reg form -->
    </div>
  </div>
</div> <!-- /Customer form model -->

</body>
</html>