

<!-- brand delete conformation Modal -->
<div class="modal fade" id="brand_del_confirm_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-question"></i> Are you want to delete brand ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        These brand may be choose to ordered the item by any customers. So if you delete the brand automatically the brand will hide in homepage also brand continue as inactive mode
      </div>
      <div class="modal-footer">
	  
	  	<a href='' id='brand_delete_id_btn'  class='btn btn-danger brand_delete'>Yes</a>
		 <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
       
      </div>
    </div>
  </div>
</div>


<!-- category delete conformation Modal -->
<div class="modal fade" id="category_del_confirm_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-question"></i> Are you want to delete category ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        These category may be choose to ordered the item by any customers. So if you delete the category automatically the category will hide in homepage also category continue as inactive mode
      </div>
      <div class="modal-footer">
	  
	  	<a href='' id='category_delete_id_btn'  class='btn btn-danger category_delete'>Yes</a>
		 <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
       
      </div>
    </div>
  </div>
</div>



<!-- category delete conformation Modal -->
<div class="modal fade" id="product_del_confirm_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-question"></i> Are you want to delete product ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        These product may be choose to ordered by any customers. So if you delete the product automatically the product will hide in homepage also category continue as inactive mode
      </div>
      <div class="modal-footer">
	  
	  	<a href='' id='product_delete_id_btn'  class='btn btn-danger product_delete'>Yes</a>
		 <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
       
      </div>
    </div>
  </div>
</div>



<!-- out of stock Modal -->
<div class="modal fade bd-example-modal-lg" id="out_of_stock_Modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Out of stock summary</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 <table class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
					 <th>No</th>
                      <th colspan="2" class="text-center">Product </th>
				        <th>Category</th>
                      <th>Brand</th>
                      <th>Price</th>
                      <th>Quantity</th>
                  
                  </tr>
                  </thead>
				
				<!-- get all product to the admin product table  -->
                  <tbody  class="text-center">	
	 
					<tr class="text-center">
						<td>1</td>
						<td>Galaxy A50</td>
						<td> <img src="../admin/upload/Product_images/samsung_a50.jpg" width="50px" height="40px"></td>
						<td>Electronics</td>
						<td>Samsung</td>
						<td>Rs.20000.00</td>
						<td class="text-center bg-danger text-5"><h2>1</h2></td>
			 
					  </tr>	
	 
					<tr class="text-center">
						<td>2</td>
						<td>Mens Shirt</td>
						<td> <img src="../admin/upload/Product_images/manShirts.jpg" width="50px" height="40px"></td>
						<td>Mens Wears</td>
						<td>Signature</td>
						<td>Rs.1750.00</td>
						<td>5</td>
	 
					  </tr>	
	 
					<tr class="text-center">
						<td>3</td>
						<td>kids Car</td>
						<td> <img src="../admin/upload/Product_images/kids.jpg" width="50px" height="40px"></td>
						<td>Kids wears</td>
						<td>General</td>
						<td>Rs.5000.00</td>
						<td>4</td>
		 
					  </tr>	
	 
					<tr class="text-center">
						<td>4</td>
						<td>Hp Laptop</td>
						<td> <img src="../admin/upload/Product_images/asuslap.png" width="50px" height="40px"></td>
						<td>Electronics</td>
						<td>General</td>
						<td>Rs.65000.00</td>
						<td>4</td>
 
					  </tr>	
	 
					<tr class="text-center">
						<td>5</td>
						<td>Women Watches</td>
						<td> <img src="../admin/upload/Product_images/watch.jpg" width="50px" height="40px"></td>
						<td>Ladies Wears</td>
						<td>General</td>
						<td>Rs.1200.00</td>
							<td class="text-center bg-danger text-5"><h2>1</h2></td>
 
					  </tr>	
	 
					<tr class="text-center">
						<td>6</td>
						<td>Men's Sunglasses</td>
						<td> <img src="../admin/upload/Product_images/glass.jpg" width="50px" height="40px"></td>
						<td>Mens Wears</td>
						<td>General</td>
						<td>Rs.3000.00</td>
						<td>5</td>
	 
					  </tr>	
	 
					<tr class="text-center">
						<td>7</td>
						<td>Wireless earphones</td>
						<td> <img src="../admin/upload/Product_images/headphone.jpeg" width="50px" height="40px"></td>
						<td>Electronics</td>
						<td>HP</td>
						<td>Rs.3500.00</td>
						<td>3</td>
		 
					  </tr>	
	 
					<tr class="text-center">
						<td>8</td>
						<td>3.0 USB Charger</td>
						<td> <img src="../admin/upload/Product_images/3Acharger.jpg" width="50px" height="40px"></td>
						<td>Electronics</td>
						<td>General</td>
						<td>Rs.500.00</td>
							<td class="text-center bg-danger text-5"><h2>0</h2></td>
			 
					  </tr>	
	 
		 
					  
					  
					  </tbody>
               
                </table>

 </div>
      <div class="modal-footer">
	  
	  	<a href='' id='out_of_stock_Modal_btn'  class='btn btn-danger category_delete'>Close</a>
       
      </div>
    </div>
  </div>
</div>














<div class="modal fade" id="admin_message_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-envelope"></i> Message prompt</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	   <!-- password change Form -->
	 <form id="customer_message_model_form" >
	 		<div id="customer_message_msg" ></div>
 
	<div class="form-row">
	 
	<div class="col-12">
      <label for="validationCustom04">Enter customer email </label>
         <input type="rext" class="form-control"  placeholder="Customer Email">
		 </div>
		 
		 	<div class="col-12">
      <label for="validationCustom04">Please enter your message </label>
         <textarea class="form-control"  placeholder="Message" rows="3"></textarea>
		 </div>
		 
    </div>


</div>
      <div class="modal-footer">
	  
	  	<a href='' id='product_delete_id_btn'  class='btn btn-danger product_delete'>Send</a>
		 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

 

