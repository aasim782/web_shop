<!DOCTYPE html>
  <?php 
 session_start();
	if(!isset($_SESSION['adminid']))
	{
		header("location:../admin/login.php");	
	}
	  
 ?>
<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dressline | Stock</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css?i=124">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css?i=124">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css?i=124">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css?i=124">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css?i=124">



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery.js?i=124"></script>
	<script src="../prg_main.js?i=124" ></script>
	<script src="admin_main.js?i=124" ></script>
 
 
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css?i=124">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css?i=124">
 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700?i=124" rel="stylesheet">
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
        <div class="col-12 mt-3">
             <!-- TABLE: LATEST ORDERS -->
         
		 
		 
	<div class="card card-dark shadow  card-outline">
              <div class="card-header  border-transparent">
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
			
				<div class="row mt-3 ">
			 
						<div class=" col-sm-16 col-md-9  text-left p-1   ">
					 	 <h2><span class="info-box-icon"><i class="fas fa-file-pdf"></i> Stock Details</h2>
						</div>
							<div class="col-sm-16 col-md-3 text-right mb-3 ">
							<div class="col-sm-12">
							
							<button type="button" id="stock_report_btn"  class="btn btn-success mb-2"><i class="fas fa-file-pdf text-center"></i> Generate PDF</button>
							
							
					 <div class="input-group input-group-sm">
					 <input class="form-control form-control-navbar" type="search" id="get_stock_details_search" placeholder="Search" aria-label="Search" autocomplete="off">
					<div class="input-group-append">
					
					<button class="btn btn-navbar border" type="submit">
						<i class="fas fa-search"></i>
					</button>
					</div>
					
					</div>
					
						</div>
						</div>
						  </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" id="printTable">
			  
			  
			<div id="sale_report_title" class="text-center">
			 
			 <table style="border-collapse:collapse; margin:20px; padding:0; width:100%;">
			   
			<tr style="margin-top:2px;text-align:center;">
			  <td style="" colspan="2" id="stock_report_heading"></td>
			</tr>
			
			  </div>
			  
			  
			  
			  
                <div class="table-responsive">
                  <table class="table m-0"  border="1" style=" border-collapse: collapse; margin-bottom:2px;">
                    <thead>
                    <tr class="text-center  shadow-sm bg-dark">
                      <th>No</th>
                      <th>Date </th>
                      <th>Product </th>
                      <th>Category</th>
                      <th>Brand</th>
                      <th>Weight (kg)</th>
				 
					  <th>Buying Price</th>
					  <th>Selling Price</th>
                      <th>Qty</th>
                  
             
                    </tr>
                    </thead>
                   <tbody id="stock_report_data">  
				 
	   
					  
					  </tbody>
				  
					
		 
				  
					
					
	 
					
					
 
					
  
					
					
					</tbody>
                  
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
             
              <!-- /.card-footer -->
            </div>
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
        </div>
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
