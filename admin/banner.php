<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dressline | Banner</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css?i=122">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css?i=122">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css?i=122">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css?i=122">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css?i=122">



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery.js?i=122"></script>
	<script src="../prg_main.js?i=122" ></script>
	<script src="admin_main.js?i=122" ></script>
 
 
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css?i=122">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css?i=122">
 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700?i=122" rel="stylesheet">
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
	
 
 
        <div class="row">
          <div class="col-lg-9 mt-4 ">
 		  
		<form id="banner_form">
         	<div class="card card-danger  mb-3">		  
                <div class="card-header">
                <h3 class="card-title text-center">Add Banner</h3>
		 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
			  
               <div class="col-md-12 pb-2">
			  <label for="validationCustom01">Title</label>
			  <input type="text" class="form-control" id="banner_title" name="" placeholder="Title">
		
			</div>
		
		
		<label for="exampleFormControlFile1" class="mt-1">Select Banner Image</label>
			<div class="custom-file">  
				<input type="file"  id="banner_file">
			</div> 
      

	  </div>
     <div class="modal-footer " "="" id="category_add_footer">
        <button class="btn btn-danger" id="banner_add_btn">Add</button>
 
      </div>
			
 
	
		 
			
            </div>
			
				</form>
          </div>
   
          <div class="col-lg-3 mt-4  " >
             <div class="card card-danger card-outline ">
              <div class="card-header  ">
                <h5 class="m-0 text-danger justify-content-center text-center">TOTAL BANNERS</h5>
              </div>
              <div class="card-body bg-danger  ">
           
				   <div class="card-body text-center" id="count_banner" style="font-size:54pt"></div>
				 
				 
              </div>
            </div>
			
 
          </div>
          <!-- /.col-md-6 -->
     
    </div>
    <!-- /.content -->
          <!-- /.col-md-6 -->
		 
  
        <!-- /.row -->
 

		 
	  
          <div class="card card-danger card-outline">			  
              <div class="card-header text-center"  >
            <h2>Banner</h2>
              </div>
              <!-- /.card-header -->
			  

			  
              <div class="card-body">
			  	
						  <div class="row">
			 
						  <div class="col-sm-16 col-md-9 text-right p-1">
			 
						</div>
							<div class="col-sm-16 mb-3  col-md-3 text-right ">
							<div class="col-sm-12">
 	
				 
							
							</div>
						 
							</div>
						  </div>
			  
			   <div class="row"><div class="col-sm-12 ">
			   
			  
                <table  class="table table- table-striped">
                  <thead>
                  <tr  class="text-center">
						<th>No</th>
                      <th>Title</th>
                      <th>Banner</th>
                      <th>Action</th>
                 
                  </tr>
                  </thead>
                  <tbody id="get_all_banners" class="text-center">
            
 
			
					 			
                  </tbody>
                
                </table>
				
				
				 
		 
              </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
