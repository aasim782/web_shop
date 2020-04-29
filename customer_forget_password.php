<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/all.js" data-auto-replace-svg="nest"></script>
	<link rel="stylesheet" href="css/all.css">
    <title>Dress Line</title>
  </head>
  <body>

	<!-- Modal -->
<div class="modal fade" id="customer_forget_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Varified</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
	   
	   <!-- Customer Registration Form -->
	 <form class="needs-validation" novalidate>
		  <div class="form-row">
			<div class="col-md-6">
			  <label for="validationCustom01">New Paasword</label>
			  <input type="text" class="form-control" id="validationCustom01" placeholder="New Paasword" required>
				<div class="valid-feedback">
				Looks good!
			  </div>
			   <div class="invalid-feedback">
				Please provide a valid state.
			  </div>
			</div>
			
			<div class="col-md-6">
			  <label for="validationCustom02">Confirm Password</label>
			  <input type="text" class="form-control" id="validationCustom02" placeholder="Confirm Password" required>
			  <div class="valid-feedback">
				Looks good!
			  </div>
			   <div class="invalid-feedback">
				Please provide a valid state.
			  </div>
			</div>
			</div>
	
	
  
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>

      </div>
      <div class="modal-footer">
        <button type="submit"  id="signup_btn" class="btn btn-danger">Save changes</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- /Customer Reg form -->
    </div>
  </div>
</div> <!-- /Customer form model -->












	<!-- Modal -->
<div class="modal fade" id="customer_forget_password_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Customer Paasword Reset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
	   
	   <!-- Customer Registration Form -->
	 <form class="needs-validation" novalidate>
	
	
	
	<div class="form-row justify-content-center">
	    <div class="col-6">
      <label for="validationCustom02">Email</label>
      <input type="email" class="form-control" id="validationCustom02" placeholder="Email" required>
      <div class="valid-feedback">
        Looks good!
      </div>
	   <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>

  </div>
  
  


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Save changes</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- /Customer Reg form -->
    </div>
  </div>
</div> <!-- /Customer form model -->















				 <script>
					// Example starter JavaScript for disabling form submissions if there are invalid fields
					(function() {
					  'use strict';
					  window.addEventListener('load', function() {
						// Fetch all the forms we want to apply custom Bootstrap validation styles to
						var forms = document.getElementsByClassName('needs-validation');
						// Loop over them and prevent submission
						var validation = Array.prototype.filter.call(forms, function(form) {
						  form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
							  event.preventDefault();
							  event.stopPropagation();
							}
							form.classList.add('was-validated');
						  }, false);
						});
					  }, false);
					})();
					</script>
</body>
</html>