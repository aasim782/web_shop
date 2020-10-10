<!DOCTYPE html>
<html>
<head>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Dashboard | Dressline</title>
	
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
 
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 
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
          <div class="col-12 mt-3">
	
 
 
        <div class="row">
          <div class="col-lg-9 mt-4 ">
		    
 	  
		<form id="banner_form">
         	<div class="card card-info  mb-3">		  
                <div class="card-header">
                <h3 class="card-title text-center">Add Offer</h3>
		 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
			  <div class="form-row">
               <div class="col-md-12 pb-2">
			  <label for="validationCustom01">Reason of sale </label>
			  <input type="text" class="form-control" id="title_txt" name="" placeholder="Reason of the sale it will appear on customer page">
		
			</div>
			</div>
			<div class="form-row">
			
			<div class="col-md-6">		
			<label for="validationCustom02">Offer Start On</label>		
			<input type="date" class="form-control text-center" id="prd_add_date_txt" name="">			
			</div>
			
			<div class="col-md-6">		
			<label for="validationCustom02">Offer End On</label>		
			<input type="date" class="form-control text-center"  name="">			
			</div>
			
		
			</div>
			<div class="form-row ">
			<div class="col-md-4">		
			<label for="validationCustom02">Discount Rate (%)</label>		
			<input type="number" class="form-control text-center">
			
			</div>
			</div>

	  </div>
     
			<div class="modal-footer " "="" id="category_add_footer">
        <button class="btn btn-danger" id="category_add_btn_admin">Add</button>
 
      </div>
 
	
		 
			
            </div>
			
				</form>
          </div>
    <div class="col-lg-3 mt-4  ">
 
			
            <!-- Calendar -->
            <div class="card card-footer bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
			
                <!-- tools card -->
                <div class="card-tools">
                   <div class="btn-group">
    
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
 
          </div>
     
		  
          <!-- /.col-md-6 -->
     
    </div>
	
    <!-- /.content -->
          <!-- /.col-md-6 -->
		 
  
        <!-- /.row -->
	

 
 
 <div class="shadow p-3 col-12 card text-white bg-danger mb-3" >
    <h2 class="card-text text-center">General Offer 20% </h2>
  </div>
</div>
 


	  
          <div class="col-12  card card-info card-outline">			  
              <div class="card-header text-center"  >
            <h2>Offer List</h2>
              </div>
              <!-- /.card-header -->
			  

			  
              <div class="card-body" >
			  	
						  <div class="row">
			 
						  <div class="col-sm-16 col-md-9 text-right p-1">
			 
							</div>
							<div class="col-sm-16 mb-3  col-md-3 text-right ">
							<div class="col-sm-12">
 	
				 
							
							</div>
						 
						 
							</div>
						  </div>
			  
		<div class="row"><div class="col-sm-12 ">
			   
			  
                <table class="table table- table-striped">
                  <thead>
                  <tr class="text-center">
						<th>No</th>
					  <th>Reason</th>
                      <th>Offer start On</th>
                      <th>Offer End On</th>
                      <th>Discount Rate</th>
                      <th>Action</th>
                 
                  </tr>
                  </thead>
                  <tbody >
						  <tr >
							<td>1</td>
							<td>Christmas offers 2020</td>
							<td>12/10/2020</td>
							<td>12/10/2020</td>
							<td class="text-center">50%</td>
							 
							<td>
	
							<div class="btn-group ">
							<a href="" class="btn btn-info"><i class="fa fa-edit"></i></a>
							<a href="" class="btn btn-danger btn_category_delete"><i class="fa fa-trash-alt"></i></a>
							<a href=""  class="btn btn-warning btn_category_delete"><i class="fas fa-check-double"></i></a>
							 
							</div> 
							</td>
						  </tr> 
					
					
					<tr >
							<td>2</td>
							<td>General Offer</td>
							<td>12/10/2020</td>
							<td>12/10/2020</td>
							<td class="text-center">20%</td>
							 
							<td>
	
							<div class="btn-group ">
							<a href="" class="btn btn-info"><i class="fa fa-edit"></i></a>
							<a href="" class="btn btn-danger btn_category_delete"><i class="fa fa-trash-alt"></i></a>
							<a href=""  class="btn btn-success btn_category_delete"><i class="fas fa-check-circle"></i></i></a>
							 
							</div> 
							</td>
						  </tr> 						
						  </tr> 
						
						
						<tr >
							<td>3</td>
							<td>Black Friday offer</td>
							<td>12/10/2020</td>
							<td>12/10/2020</td>
							<td class="text-center">10%</td>
							 
							<td>
	
							<div class="btn-group ">
							<a href="" class="btn btn-info"><i class="fa fa-edit"></i></a>
							<a href="" class="btn btn-danger btn_category_delete"><i class="fa fa-trash-alt"></i></a>
										<a href=""  class="btn btn-warning btn_category_delete"><i class="fas fa-check-double"></i></a>
							 
							</div> 
							</td>
						  </tr>  
						  <tr >
							<td>4</td>
							<td>Ramzan Sale Offer 5% the Cart..!</td>
							<td>12/10/2020</td>
							<td>12/10/2020</td>
							<td class="text-center">50%</td>
							 
							<td>
	
							<div class="btn-group ">
							<a href="" class="btn btn-info"><i class="fa fa-edit"></i></a>
							<a href="" class="btn btn-danger btn_category_delete"><i class="fa fa-trash-alt"></i></a>
										<a href=""  class="btn btn-warning btn_category_delete"><i class="fas fa-check-double"></i></a>
							 
							</div> 
							</td>
						  </tr> 
 
						  
					 
						   
					</tbody>
                
                </table>
				
				
			 
              </div>
              </div>
              </div>
              <!-- /.card-body -->
         
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content --><br id="sparkline-1">
			<br id="sparkline-2">
			<br  id="sparkline-3">
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

<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
