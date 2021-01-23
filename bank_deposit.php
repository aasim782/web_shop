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
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i>&nbsp Bank Deposit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		
	   <!-- Customer Registration Form -->
	 <form id="customer_bankdep_form" >
	 		<div id="bank_dep_alert_msg" > </div>
		  <div class="form-row mb-2">
			<div class="col-md-6">
			  <label for="validationCustom01">Deposit date</label>
			  <input type="date" class="form-control" id="de_datetxt" name="de_datetxt" placeholder="Deposited Date">
		
			</div>		
			
			<div class="col-md-6">
			  <label for="validationCustom01">Deposit Time</label>
			  <input type="time" class="form-control" id="de_timetxt" name="de_timetxt"  placeholder="">
			</div>		
			</div>
	
	
	<div class="form-row  mb-3">
 
		<div class="col-md-6">
			  <label for="validationCustom02">Branch Name :</label>
			  <input type="text" class="form-control" id="branch_nametxt"   placeholder="Branch Name" >
		
		</div>
		
		<div class="col-md-6">
			  <label for="validationCustom02">Deposit Amount :</label>
			  <input type="number" class="form-control" id="dep_amount_txt"    placeholder="Diposit Amount" >
		
		</div>

    </div>
	
	
		<div class="form-row  justify-content-center ">
		<div class="col-md-6">
			  <label for="validationCustom02">Deposit Slip Number :</label>
			  <input type="text" class="form-control" id="slip_number_txt"    placeholder="Deposit Slip Number" >
		
		</div>



		<div class="col-md-6 ">
		  <label for="validationCustom02">Bank Slip :</label>
			<div class="custom-file   ">
				
		 <form  >
         
            <div > 
                <input type="file" id="file" name="file" />
             
            </div>
       
				  
				</div>

		
		</div>


    </div>
	


      </div>
      <div class="modal-footer">
      <input type="button" class="btn btn-danger" value="Upload" name="but_upload" id="but_upload">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- /Customer Reg form -->
	  </form> <!-- /Customer Reg form -->
    </div>
  </div>
</div> <!-- /Customer form model -->





</body>
</html>