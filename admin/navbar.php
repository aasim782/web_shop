 
<!-- product registration modedl  -->

<?php  
include "models.php";
 ?>
 
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
 


  
    </ul>

 

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
	  
	  
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge" id="total_orders_count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header" id="total_orders_count" >15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="pending_order.php" class="dropdown-item">
            <i class="fas fa-sync-alt mr-2"></i>Panding orders
            <span class="float-right text-muted text-sm" id="count_total_panding_order_noti"></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="processing_order.php" class="dropdown-item">
            <i class="fa fa-spinner mr-2"></i> Processing Orders
            <span class="float-right text-muted text-sm"  id="count_total_process_order_noti"> </span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="un_paid_order.php" class="dropdown-item">
            <i class="fas fa-file mr-2"></i>Unpaid Orders
            <span class="float-right text-muted text-sm" id="count_total_unpaid_order_noti"></span>
          </a>
          <div class="dropdown-divider"></div>
		    <a href="shipped_order.php" class="dropdown-item">
            <i class="fa fa-truck mr-2"></i>Shipped Orders
            <span class="float-right text-muted text-sm" id="count_total_shipped_order_noti"></span>
          </a>
		   <div class="dropdown-divider"></div>
          <a href="all_orders.php" class="dropdown-item dropdown-footer">See All Notifications</a>
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