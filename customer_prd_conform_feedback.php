 <style>
.stars input {
    position: absolute;
    left: -999999px;
}

.stars a {
    display: inline-block;
    padding-right:4px;
    text-decoration: none;
    margin:0;
}

.stars a:after {
    position: relative;
    font-size: 18px;
    font-family: 'FontAwesome', serif;
    display: block;
    content: "\f005";
    color: #9e9e9e;
}

 
.stars a:hover ~ a:after{
  color: #9e9e9e !important;
}
span.active a.active ~ a:after{
  color: #9e9e9e;
}

span:hover a:after{
  color:orange !important;
}

span.active a:after,
.stars a.active:after{
  color:orange;
}
</style>




<!-- Modal -->
<div class="modal fade" id="customer_prd_conform_feedback"  data-backdrop='static' data-keyboard='false' tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-warning">
        <h5 class="modal-title" id="exampleModalLongTitle">Customer Order Feedback</h5>
           <button type="button" class="close" id="feedback_close_button" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="cus_order_feedback_form">
	  	<div id="cus_order_feedback_alert_msg" > </div>
  <div class="row">
   <div class="col">
	<strong>01. Please give your rate</strong>
  </div>
  </div>
    <div class="row">
   <div class="col text-center">
 		<div style='padding-top:1px;' >
					 
				<p class="stars" id="g_rating_val">
					  <span  style="cursor: pointer;" >
						<a class="star-1" rating_val="1"></a>
						<a class="star-2" rating_val="2"></a>
						<a class="star-3" rating_val="3"></a>
						<a class="star-4" rating_val="4"></a>
						<a class="star-5" rating_val="5"></a>
					  </span><label class="ml-3" id="rated_val">0</label>/5
					</p> 
		</div>
				 

  </div>
  </div>

  	 <div class="form-row mb-2">
    <div class="col-md-12">
    <label for="exampleFormControlTextarea1"><strong>02. Your feedback about the item</label></strong>
    <textarea class="form-control" id="customer_item_beedback_txt"  name="customer_item_beedback_txt" rows="3"></textarea>

	</div>
	</div>

   <label for="exampleFormControlTextarea1"><strong>03. Upload 3 images</strong></label>
				  <div class="form-row  text-center">
				  
					<div class="col-sm">
					  	<div class="custom-file ">
							<div> 
								<input type="file" id="file_1" name="file_1_1" />
							</div>
					 </div>
					</div>
					<div class="col-sm">
						<div class="custom-file ">
							<div> 
						<input type="file" id="file_2" name="file_1_2" />
							</div>
					 </div>
					</div>
					<div class="col-sm">
					 	<div class="custom-file ">
							<div> 
							<input type="file" id="file_3" name="file_1_3" />
							</div>
					 </div>
					</div>
				  </div>
  
	  
				
					 
	 
					 
		</form>			 
      </div>
      <div class="modal-footer" id="customer_prd_fedb_conform_footer">
	   <button type="button" class="btn btn-danger"  feedback_product_id="0" id="customer_prd_fedb_conform_btn">Confirm</button>
        <button type="button" class="btn btn-secondary" id='feedback_close_button' >Close</button>

      </div>
    </div>
  </div>
</div>


 
