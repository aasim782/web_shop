 <html> <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css?i=40">
	<script src="js/all.js?i=40" data-auto-replace-svg="nest"></script>
	<script src="prg_main.js?i=40" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="css/all.css?i=40">
    <title>Dress Line</title>
  </head>
  
  <body><!-- Modal -->
<div class="modal fade" id="bankdepModel" tabindex="-1" role="dialog" aria-labelledby="bankdepModel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-warning">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i>&nbsp Bank Deposit Slip Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		
	   <!-- Customer Registration Form -->
	 <form id="customer_bankdep_form" >
	 		<div id="bank_dep_alert_msg" ><div class="alert alert-primary" role="alert">
				Please upload your slip
			</div></div>
		  <div class="form-row mb-2">
			<div class="col-md-6">
			  <label for="validationCustom01">Deposited date</label>
			  <input type="date" class="form-control" id="de_datetxt" name="de_datetxt" placeholder="Deposited Date">
		
			</div>		
			
			<div class="col-md-6">
			  <label for="validationCustom01">Deposited Time</label>
			  <input type="time" class="form-control" id="de_timetxt" name="de_timetxt" placeholder="">
			</div>		
			</div>
	
	
	<div class="form-row  mb-3">
 
		<div class="col-md-6">
			  <label for="validationCustom02">Branch Name :</label>
			  <input type="text" class="form-control" id="branch_nametxt"  name='' placeholder="Branch Name" >
		
		</div>


    </div>
	
	
		<div class="form-row  justify-content-center ">
	
		<div class="col-md-7 mt-1 ">
		
			<div class="custom-file ">
				
				  <input type="file" class="custom-file-input" id="upolod_slip_txt" lang="es">
				  <label class="custom-file-label" for="customFileLang">Upload your receipt</label>
				</div>

		
		</div>


    </div>
	


      </div>
      <div class="modal-footer">
        <button type="submit" id='bank_dep_btn' class="btn btn-danger">Send</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- /Customer Reg form -->
    </div>
  </div>
</div> <!-- /Customer form model -->





</body>
</html>