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
	  </form>