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
  <title>Dressline | Sales</title>
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


 <div class="row ">
 	  <center><H1> Sales Report</h1></center>
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
		  <th>No</td>
		<th>Date</td>
		<th>Customer Name</td>
		<th>Product Name</td>
		<th>Category</td>
		<th>Brand</td>
		<th>Sales(Rs)</td>
		<th>Cost</td>
		<th>Qty</td>
		<th>Profit</tH>
		  </thead>
		 <tbody  id="get_sales_report_data"> </tbody>
		  </table>
	
	   </div>
 </div>
		  
 
			  asdsadasda
   <script type="text/javascript" id="java_call_print"> 
	 window.print();
</script>
	</body>
	</html>
	
			  
			  