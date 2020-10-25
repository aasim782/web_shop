<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dressline | Brand</title>
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
					 	 <h2><span class="info-box-icon"><i class="fas fa-file-pdf"></i> Customer's Details</h2>
						</div>
							<div class="col-sm-16 col-md-3 text-right mb-3 ">
							<div class="col-sm-12">
							
							<button type="button" id="form_prd_add_btn" name="form_prd_add_btn" class="btn btn-success mb-2"><i class="fas fa-file-pdf text-center"></i> Generate PDF</button>
							
							
					 <div class="input-group input-group-sm">
					 <input class="form-control form-control-navbar" type="search" id="all_order_filter" placeholder="Search" aria-label="Search" autocomplete="off">
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
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr class="text-center  shadow-sm bg-dark">
                      <th>No</th>
                      <th> </th>
                      <th>Firstname</th>
                      <th>Lastname</th>
					  <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>City  </th>
                      <th>Postal</th>
             
                    </tr>
                    </thead>
                   <tbody id="get_all_customers"> <tr class="text-center">	
					 <td><b>1 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>Mohamed</b></td>
                      <td> <b>Aasim</b></td>
                      <td><b>aasim782@gmail.com</b></td>
                      <td><b>94756881134</b></td>
                      <td><b>155,Meeranagar Road, Nintavur</b></td>
					  <td><b>Nintavur </b></td>
					  <td><b>32340 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>2 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>mohamed</b></td>
                      <td> <b>aaqil</b></td>
                      <td><b>aasim1@gmail.com</b></td>
                      <td><b>94769051995</b></td>
                      <td><b>155,
Meera oda val</b></td>
					  <td><b>nintvaur </b></td>
					  <td><b>32310 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>3 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>mohamed</b></td>
                      <td> <b>aaqil</b></td>
                      <td><b>aasim789@gmail.com</b></td>
                      <td><b>94756881123</b></td>
                      <td><b>155,
Meera oda val</b></td>
					  <td><b>nintvaur </b></td>
					  <td><b>32310 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>4 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>fsdf</b></td>
                      <td> <b>sfsdf</b></td>
                      <td><b>sfsdfs@asda.lk</b></td>
                      <td><b></b></td>
                      <td><b>dfsd</b></td>
					  <td><b>df </b></td>
					  <td><b>12345 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>5 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>fsdf</b></td>
                      <td> <b>sfsdf</b></td>
                      <td><b>sfsdfsasd@asda.lk</b></td>
                      <td><b></b></td>
                      <td><b>dfsd</b></td>
					  <td><b>df </b></td>
					  <td><b>12345 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>6 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>ad</b></td>
                      <td> <b>asda</b></td>
                      <td><b>sdasd@sadsa.lkl</b></td>
                      <td><b></b></td>
                      <td><b>sadasd</b></td>
					  <td><b>dasdsa </b></td>
					  <td><b>12321 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>7 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>sddfcsdf</b></td>
                      <td> <b>sdfdsf</b></td>
                      <td><b>aasim2@gmail.com</b></td>
                      <td><b></b></td>
                      <td><b>Srilanak
asdas</b></td>
					  <td><b>dasdsa </b></td>
					  <td><b>23123 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>8 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>sdfsfdsf</b></td>
                      <td> <b>sdfdsfdsf</b></td>
                      <td><b>aasim3@gmail.com</b></td>
                      <td><b></b></td>
                      <td><b>1231231</b></td>
					  <td><b>1231 </b></td>
					  <td><b>12312 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>9 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>asd</b></td>
                      <td> <b>asdasdsa</b></td>
                      <td><b>dasd@sadasda.ks</b></td>
                      <td><b></b></td>
                      <td><b>asdad</b></td>
					  <td><b>asd </b></td>
					  <td><b>12345 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>10 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>sad</b></td>
                      <td> <b>dasd</b></td>
                      <td><b>aasdasd@sadsada.kl</b></td>
                      <td><b></b></td>
                      <td><b>sdasdasd</b></td>
					  <td><b>dasdasda </b></td>
					  <td><b>04544 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>11 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>asdasdasdas</b></td>
                      <td> <b>dasdasdsadaad</b></td>
                      <td><b>dadsadasdasd@asdasd.ll</b></td>
                      <td><b>94777200778</b></td>
                      <td><b>SRILANKA
SRILANKA</b></td>
					  <td><b>SRILANKA </b></td>
					  <td><b>32323 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>12 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>Mohamed</b></td>
                      <td> <b>Rislin</b></td>
                      <td><b>rislin2020@gmail.com</b></td>
                      <td><b>0756998884</b></td>
                      <td><b>155,Meeranagar Road, Nintavur</b></td>
					  <td><b>NINTAVUR </b></td>
					  <td><b>32340 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>13 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>mohmaed</b></td>
                      <td> <b>rasik</b></td>
                      <td><b>rasik@gmail.com</b></td>
                      <td><b>94756881134</b></td>
                      <td><b>155, meeranagae Road, nintavyr</b></td>
					  <td><b>nintavur </b></td>
					  <td><b>32340 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>14 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>asdad</b></td>
                      <td> <b>adsad</b></td>
                      <td><b>asda@sadasdl.lk</b></td>
                      <td><b>0756881134</b></td>
                      <td><b>asd</b></td>
					  <td><b>asdas </b></td>
					  <td><b>32340 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>15 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>ada</b></td>
                      <td> <b>sdsada</b></td>
                      <td><b>dadaaq@sadds.lk</b></td>
                      <td><b>0756881134</b></td>
                      <td><b>asdaasdada</b></td>
					  <td><b>sadas </b></td>
					  <td><b>32340 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>16 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>Mohamed</b></td>
                      <td> <b>Aasim</b></td>
                      <td><b>aasiqmam@gmail.com</b></td>
                      <td><b>94756881134</b></td>
                      <td><b>155, Nintavur</b></td>
					  <td><b>nintavur </b></td>
					  <td><b>32340 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>17 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>aaso</b></td>
                      <td> <b>mam</b></td>
                      <td><b>mam@gmail.com</b></td>
                      <td><b>94756881134</b></td>
                      <td><b>155,Srilanka</b></td>
					  <td><b>nintavur </b></td>
					  <td><b>32340 </b></td>
                   </tr>
				  
					
					
					 <tr class="text-center">	
					 <td><b>18 </b></td>
                      <td> <img src="upload/432_abc.png" width="70px" class="rounded-circle" height="70px">  </td>
                      <td> <b>asda</b></td>
                      <td> <b>asadas</b></td>
                      <td><b>asd@sadas.lk</b></td>
                      <td><b>94756881134</b></td>
                      <td><b>asdadas</b></td>
					  <td><b>adsada </b></td>
					  <td><b>23122 </b></td>
                   </tr>
				  
					
					
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
