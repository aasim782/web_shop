 <style>
	 @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

 body {
     background-color: #eeeeee;
     font-family: 'Open Sans', serif
 }
 
 .card {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -ms-flex-direction: column;
     flex-direction: column;
     min-width: 0; 
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(0, 0, 0, 0.1);
     border-radius: 0.10rem
 }

 .card-header:first-child {
     border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
 }

 .card-header {
     padding: 0.75rem 1.25rem;
     margin-bottom: 0;
     background-color: #fff;
     border-bottom: 1px solid rgba(0, 0, 0, 0.1)
 }

 .track {
     position: relative;
     background-color: #ddd;
     height: 7px;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 60px;
     margin-top: 50px
 }

 .track .step {
     -webkit-box-flex: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
     width: 25%;
     margin-top: -18px;
     text-align: center;
     position: relative
 }

 .track .step.active:before {
     background: #FF5722
 }

 .track .step::before {
     height: 7px;
     position: absolute;
     content: "";
     width: 100%;
     left: 0;
     top: 18px
 }

 .track .step.active .icon {
     background: #ee5435;
     color: #fff
 }

 .track .icon {
     display: inline-block;
     width: 40px;
     height: 40px;
     line-height: 40px;
     position: relative;
     border-radius: 100%;
     background: #ddd
 }

 .track .step.active .text {
     font-weight: 400;
     color: #000
 }

 .track .text {
     display: block;
     margin-top: 7px
 }

 .itemside {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     width: 100%
 }

 .itemside .aside {
     position: relative;
     -ms-flex-negative: 0;
     flex-shrink: 0
 }

 .img-sm {
     width: 80px;
     height: 80px;
     padding: 7px
 }

 ul.row,
 ul.row-sm {
     list-style: none;
     padding: 0
 }

 .itemside .info {
     padding-left: 15px;
     padding-right: 7px
 }

 .itemside .title {
     display: block;
     margin-bottom: 5px;
     color: #212529
 }

 p {
     margin-top: 0;
     margin-bottom: 1rem
 }

 .btn-warning {
     color: #ffffff;
     background-color: #ee5435;
     border-color: #ee5435;
     border-radius: 1px
 }

 .btn-warning:hover {
     color: #ffffff;
     background-color: #ff2b00;
     border-color: #ff2b00;
     border-radius: 1px
 }
	</style>
 

 
	  
	  
	  <!-- Large modal -->
 

<div class="modal fade bd-example-modal-lg" id="traking_model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header  bg-warning">
        <h5 class="modal-title text-dark" id="exampleModalLabel"><i class="fa fa-transgender"></i></i>&nbspProduct Tracking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


  <!-- Page Content -->
	<div class="container">
    <article class="card">
     
        <div class="card-body">
		
		<div class="container">
			  <div class="row">
				<div class="col-sm">
				<h6>Shipping ID: <b id="trk_model_order_id"> </b></h6> 
				</div>
				<div class="col-sm">
		 
				</div>
				<div class="col-sm">
				<h6>   <b id="trk_model_order_id"> </b></h6>
				</div>
			  </div>
		</div> 
						
			
			
			
            <article class="card shadow-sm">
                <div class="card-body row" id="tracking_model_details">
					 

			
                </div>
            </article>
            <div class="track" id="tracking_prograss_line">
			
 
            </div>
            <hr>
            <ul class="row" id="traveling_item">
			
				 
            
            </ul>
            <hr>	
			
           				<div class='text-center' ><button type="button" class="btn btn-primary " data-dismiss="modal">Close</button></div>
        </div>

    </article>

</div>
				 
 
 










	  
      <!-- /.col-lg-3 -->
	
	
	
			</div>
			
			
			    <!-- card end -->
			

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  
 
  <!-- /.container -->
 