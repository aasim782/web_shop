 
<!-- product registration modedl  -->

<?php  
include "models.php";
 ?>
 
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i> </a>
      </li>
  


  
    </ul>

 

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link"  href="customer_message.php">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge" id="admin_msg_count"></span>
        </a>
    
      </li>
      <!-- Notifications Dropdown Menu -->
	  
	  
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge" id="total_orders_count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
     
          <div class="dropdown-divider"></div>
          <a href="pending_order.php" class="dropdown-item">
            <i class="fas fa-sync-alt mr-2"></i> Pending orders
            <span class="float-right text-muted text-sm" id="count_total_panding_order_noti"></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="processing_order.php" class="dropdown-item">
            <i class="fa fa-spinner mr-2"></i> Processing Orders
            <span class="float-right text-muted text-sm"  id="count_total_process_order_noti"> </span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="un_paid_order.php" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> Unpaid Orders
            <span class="float-right text-muted text-sm" id="count_total_unpaid_order_noti"></span>
          </a>
          <div class="dropdown-divider"></div>
		    <a href="shipped_order.php" class="dropdown-item">
            <i class="fa fa-truck mr-2"></i> Shipped Orders
            <span class="float-right text-muted text-sm" id="count_total_shipped_order_noti"></span>
          </a>
		     <div class="dropdown-divider"></div>
		    <a   id="out_of_stock_btn" class="dropdown-item">
			<i class="fa fa-shopping-basket" ></i>&nbsp  Out of Stocks
			<span class="float-right text-muted text-sm" id="count_total_outofstock_noti"></span>
			
          </a>
		   <div class="dropdown-divider"></div>
          <a href="all_orders.php" class="dropdown-item dropdown-footer"> See All Notifications</a>
        </div>
      </li>
	  
	  
	  
	<li class="nav-item">
        <a class="nav-link" href="logout.php" role="button">
          <i class="fa fa-power-off"></i> 
        </a>
      </li>
 
    </ul>
  </nav>
  <!-- /.navbar -->