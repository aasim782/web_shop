 <html> <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css?i=77">
	<script src="../js/all.js?i=77" data-auto-replace-svg="nest"></script>
	<script src="../prg_main.js?i=77" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="../css/all.css?i=77">
    <title>Dress Line</title>
  </head>
  
  <body>
  
  
<!-- product_reg_model -->
<div class="modal fade" id="product_reg_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header " style="background-color:#34495e">
        <h5 class="modal-title" id="exampleModalLabel"  style="color:white"><i class="fas fa-user"></i>&nbspProduct Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		
	   <!-- product_reg_model Form -->
	 <form id="product_reg_form" >
	 		<div id="product_reg_msg" > </div>
		  <div class="form-row">
			<div class="col-md-6">
			  <label for="validationCustom01">Product ID</label>
			  <input type="text" class="form-control text-center" id="Product_id_txt" name=""    disabled>
		
			</div>
			
			<div class="col-md-6">
			  <label for="validationCustom02">Date</label>
			  <input type="date" class="form-control text-center" id="prd_add_date_txt"  name=''  >
		
			</div>
			</div>
	
	
	<div class="form-row mt-2">
 
    <div class="form-group col-6">
           <label for="validationCustom02">Category</label>
      <select id="get_category" class="form-control"></select>
    </div>



    <div class="form-group col-6">
           <label for="validationCustom02">Brand</label>
      <select id="get_brand" class="form-control"></select>
    </div>
    </div>
  
	  <div class="form-row ">
		<div class="col-6">
		  <label for="validationCustom03">Product Name</label>	  
		  <input type="text" class="form-control" id="product_name_txt"  maxlength="18" name="product_name" placeholder="Product Name">
		</div>
	   
		<div class="col-md-6">
		  <label for="validationCustom05">Product Price</label>
		  <input type="number" class="form-control" id="product_price_txt" placeholder="Product Price">

		</div>
	  </div>
  
     <div class="form-row mt-2  ">
    <div class="col-6 form-group">
    <label for="exampleFormControlFile1">Select Product Image</label>
    <input type="file" class="form-control-file" id="prd_img">
  </div>
     <div class="col-6 form-group ">
    <label for="exampleFormControlFile1">Example file input</label>
    <img class=" d-block w-48 " height="70px" src="../prg_img/mouse.jpg" alt="Third slide">
  </div>
  </div>
  
  
    <div class="form-row mt-2">
    <div class="col-12">
      <label for="validationCustom05">Product Decription</label>
  <textarea class="form-control" id="product_desc_txt"  name="product_dec" rows="10"></textarea>
    </div>
  </div>
 
		  <div class="form-row mt-2">
		<div class="col-12">
		  <label for="validationCustom03">Product Keywords</label>	  
		   <textarea class="form-control" id="product_keywords_txt"  name="ProductKeyword" rows="3"></textarea>
		</div>
	   

	  </div>
	  
	  

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Add</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- /product_reg_model form -->
    </div>
  </div>
</div> <!-- /product_reg_model   -->







<!--brand add -->
<div class="modal fade" id="Category_reg_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header " style="background-color:#34495e">
        <h5 class="modal-title" id="exampleModalLabel"  style="color:white"><i class="fas fa-user"></i>&nbspCategory Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		
	   <!-- product_reg_model Form -->
	 <form id="Category_reg_form" >
	 	<div id="Category_reg_msg" > </div>
		  <div class="form-row">
			<div class="col-md-12">
			  <label for="validationCustom01">Category Name</label>
			  <input type="text" class="form-control" id="Category_txt" name="" placeholder="Category Name">
		
			</div>
	 
			</div>
	
 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Add</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- /product_reg_model form -->
    </div>
  </div>
</div> <!-- /product_reg_model   -->


 


<!--brand add -->
<div class="modal fade" id="brand_reg_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header " style="background-color:#34495e">
        <h5 class="modal-title" id="exampleModalLabel"  style="color:white"><i class="fas fa-user"></i>&nbspBrand Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		
	   <!-- product_reg_model Form -->
	 <form id="brand_reg_form" >
	 	<div id="brand_reg_msg" > </div>
		  <div class="form-row">
			<div class="col-md-12">
			  <label for="validationCustom01">Bramd Name</label>
			  <input type="text" class="form-control" id="bramd_txt" name="" placeholder="Bramd Name">
		
			</div>
	 
			</div>
	
 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Add</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form> <!-- /product_reg_model form -->
    </div>
  </div>
</div> <!-- /product_reg_model   -->







</body>
</html>