<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dressline</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css?i=135">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css?i=135">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css?i=135">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css?i=135">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css?i=135">
 
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css?i=135">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css?i=135">

 <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css?i=135">
  	
  <!-- note -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
	
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700/i=135" rel="stylesheet">
   <!-- summernote -->

 
  
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery.js?i=135"></script>
 
	<script src="../prg_main.js?i=135" ></script>
	<script src="admin_main.js?i=135" ></script>
	
 

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


<!--navbar-->
<?php include "navbar.php" ?>

  <!-- Main Sidebar Container -->
<?php  include "side_bar.php" ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
		
		  
  	  <div class="text-right mt-4 mb-3">	
	 
	  </div>
	  
	  
	  
	  
	 
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
 
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-9">
		  
		  
		  
		  
		  
		  
		  
		  

		   	  <div class="text-right   mb-3">	
		<a href="" update_id="$product_id" class="btn btn-success"     id="prd_btns"  ><i class="fa fa-plus-circle"></i> Add Product</a>
	  </div>
		      <div id="product_reg_msg">
	  </div>		  
 
	 
	  <div id="get_add_form">
	  </div>
       

          <div class="card card-warning card-outline">			  
              <div class="card-header text-center"  >
				<h2>Product</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  	  
			  	  <div class="row ">
			 
						<div class=" col-sm-16 col-md-9 text-right p-1   ">
					 
						</div>
							<div class="col-sm-16 col-md-3 text-right mb-3 ">
							<div class="col-sm-12">
							
					 <div class="input-group input-group-sm">
					 <input class="form-control form-control-navbar" type="search" id="product_filter" placeholder="Search" aria-label="Search" autocomplete="off">
					<div class="input-group-append">
					<button class="btn btn-navbar border" type="submit">
						<i class="fas fa-search"></i>
					</button>
					</div>
					</div>
					
						</div>
						</div>
						  </div>
                <table  class="table table-bordered table-hover">
                  <thead>
                  <tr  class="text-center">
					 <th>No</th>
                      <th colspan="2" class="text-center">Product </th>
				        <th>Category</th>
                      <th>Brand</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Action</th>
                  </tr>
                  </thead>
				
				<!-- get all product to the admin product table  -->
                  <tbody id="get_all_product" class="text-center">
              
                  </tbody>
               
                </table>
			 
				<div id="get_footer_num_product" class="mt-2 text-right"></div>
		 
              </div>
           
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-3 mt-5">
          <div class="card card-primary shadow-sm card-outline">
              <div class="card-header">
                <h5 class="m-0 text-primary">TOTAL PRODUCTS</h5>
              </div>
         <div class="card-body  bg-primary justfy-content-center  ">
                 <label class="card-title " id="count_product" style="font-size:52pt;"></label> 
              </div>
            </div>

            <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="m-0 text-danger">TOTAL CATEGORY</h5>
              </div>
              <div class="card-body text-center bg-danger">
                <label class="card-title " id="count_catg" style="font-size:52pt"></label>
  
              </div>
            </div>
			
			         <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="m-0 text-success">TOTAL BRAND</h5>
              </div>
           <div class="card-body bg-success">
                <label class="card-title text-center"  id="count_brand" style="font-size:52pt"></label>
  
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
          <!-- /.col-md-6 -->
		 
  
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
 
		   
	 
		
			
					
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
	

	
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 
  <!-- Main Footer -->
  <?php include "footer.php" ?>
  <!-- /Main Footer -->
  
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>


<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

 
 

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>


<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  
  
  
  
  
 

</script>

 
 
 
 
  
 
 
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
