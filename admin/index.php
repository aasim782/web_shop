<!DOCTYPE html>
 
  <?php 
 session_start();
	if(!isset($_SESSION['adminid']))
	{
		header("location:../admin/login.php");	
	}
 ?>
 
<html lang="en">
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
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
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
    <!-- Content Header (Page header) -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row  mt-3">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box shadow bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Number of Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
      
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box shadow bg-success">
              <div class="inner">
                <h3>Rs. 540000.00</h3>

                <p>Revenue</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars m-4"></i>
              </div>
  
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box shadow bg-warning">
              <div class="inner">
                <h3>Rs. 44000.00</h3>

                <p>Profit</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-line m-4"></i>
              </div>
            
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box shadow bg-secondary ">
              <div class="inner">
                <h3>Rs. 496000.00 </h3>

                <p>Cost</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph  m-4"></i>
				
              </div>
              
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
		
		  <div class="row  mt-3">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box shadow bg-danger ">
              <div class="inner">
                <h3 id="count_product"></h3>
			<p>Total Products</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-basket"></i>
              </div>
      
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box shadow bg-info">
              <div class="inner">
                <h3 id="count_catg"></h3>

                <p>Total Categories</p>
              </div>
              <div class="icon">
                 <i class="fa fa-list-alt"></i>
              </div>
  
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box shadow bg-blue">
              <div class="inner">
                <h3 id="count_brand"></h3>

                <p>Total Brands</p>
              </div>
              <div class="icon">
              <i class="fab fa-bandcamp"></i>
              </div>
            
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box shadow bg-purple">
              <div class="inner">
                <h3>65</h3>

                <p>Total Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
        </div>
		
		
		
		
        <!-- Main row -->
        <div class="row pt-2">
          <!-- Left col -->
   
		   
		  
		  <div class="col-md-6">
            <!-- Line chart -->
            <div class="card card-primary ">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Order
                </h3>

                 
              </div>
                <div class="card-body">
                <div id="bar-chart" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->

    

          </div>
          <!-- /.col (LEFT) -->
            <!-- PIE CHART -->
            <div class="card card-danger ">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-users"></i> Customer Order Status</h3>
              
              </div>
              <div class="card-body">
                <canvas id="pieCharts" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>        
		 
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
		
		</div>
		
		   <!-- Main row -->
        <div class="row pt-2   ">
		
		
		                <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-area"></i> Sales Rrevenue & Cost</h3>

             
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
		  
		  
		 
			
         <!-- /.col (LEFT) -->
            <!-- PIE CHART -->
            <div class="card card-danger ">
              <div class="card-header">
                <h3 class="card-title"><i class="fab fa-product-hunt"></i> Top 5 Fast moving Products </h3>
              
              </div>
               <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
			  
		 
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
		  
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
	  
 	  
	   
	       <!-- Main row -->
        <div class="row pt-2">
          <!-- Left col -->
                   <div class="col-12">
		     
		<div class="card  card-outline">
              <div class="card-header bg-dark ">
                <h3 class="card-title"><i class="fas fa-thumbtack"></i>  Recently Added Products</h3>
                <div class="card-tools">
 
                </div>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
					<th>Date</th>	
                    <th>Product</th>
                     
                    <th>Brand</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
				   <td>
                       12/02/2020
                    </td>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                       Galaxy A50
                    </td>
                     
                                        <td>
                    Electronics
                    </td>
                    <td>
                      Rs.22500.00
                    </td>
                  </tr>
                 <tr>
				   <td>
                       10/02/2020
                    </td>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
					Kids wears 
                    </td>
					
                     <td>
                    Kids wears
                    </td>
				 

                    <td>
                      Rs.5000.00
                    </td>
					
					
					
					
                  </tr>
				  <tr>
				   <td>
                       10/02/2020
                    </td>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Headphone 
                    </td>
                                          <td>
                  Electronics
                    </td>
                    <td>
                      Rs.12500.00
                    </td>
                  </tr>
				  <tr>
				   <td>
                       08/02/2020
                    </td>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                       Electronics
                    </td>
                                          <td>
					Hp Laptop
                    </td>
                   
                    <td>
                      Rs.50000.00
                    </td>
                  </tr>
				  
                  </tbody>
                </table>
              </div>
            </div>
            </div>
		  
	
 
		
		</div>
	  
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
           
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->










 



  <!-- Main Footer -->
 
  <?php include "footer.php" ?>
  
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
 
 <!-- FLOT CHARTS -->
<script src="plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="plugins/flot-old/jquery.flot.pie.min.js"></script>
 
 
 
 
 
 
 
 
 
 
 
 
   
 
 
 <script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------
    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, { 
      type: 'line',
      data: areaChartData, 
      options: areaChartOptions
    })
 
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#pieChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Galaxy A50', 
          'Women Watches',
          'Hp Laptop', 
          'Headphone', 
          'Mouse', 
          
      ],
      datasets: [
        {
          data: [10,60,4,200,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc' ],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })


  //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })











    var donutChartCanvas = $('#pieCharts').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Pending Orders', 
          'Process Orders',
          'Shipped Orders', 
          'Delivered Orders', 
          'Un Paid Orders', 
          
      ],
      datasets: [
        {
          data: [10,60,4,200,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc' ],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })




 
 
 

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
	
	 
	
	
  })
  
  
  
  
  
 
  
  
  
  
    $(function () {
    

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9]],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June']]
      }
    })
    /* END BAR CHART */

     

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
</body>
</html>