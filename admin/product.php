<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dressline</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css?i=104">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css?i=104">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css?i=104">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css?i=104">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css?i=104">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700/i=104" rel="stylesheet">
   <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css/i=104">
 
  
  
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery.js?i=104"></script>
 
	<script src="../prg_main.js?i=104" ></script>
	<script src="admin_main.js?i=104" ></script>
	
 

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
                <table id="example1" class="table table-bordered table-hover">
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
                 <label class="card-title " style="font-size:52pt;">2000</label> 
              </div>
            </div>

            <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="m-0 text-danger">TOTAL CATEGORY</h5>
              </div>
              <div class="card-body text-center bg-danger">
                <label class="card-title " style="font-size:52pt">555</label>
  
              </div>
            </div>
			
			         <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="m-0 text-success">TOTAL BRAND</h5>
              </div>
           <div class="card-body bg-success">
                <label class="card-title text-center " style="font-size:52pt">15000</label>
  
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
  
 
   <?php  include "product_reg.php" ?>
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
</body>
</html>
