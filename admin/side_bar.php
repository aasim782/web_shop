 
  <?php  include "db_backup.php"; ?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="..\prg_img\logo\logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dressline</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
     	
		
		<?php  	

		if($_SESSION['user_role']=="admin")
		 {
		 
				echo "  
				  <li class='nav-item has-treeview menu-open' id='dashboard_btn'>
					<a href='index.php' class='nav-link active'>
					  <i class='nav-icon fas fa-home'></i>
					  <p>
						Dashboard
		 
					  </p>
					</a>
		 
				  </li>";
		  
		 }
	 
		  
		  
		  ?>
		  

		  
		          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
                 
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="brand.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand</p>
                </a>
              </li>
              
            </ul>
          </li>
		  
 
		  
		      <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-shopping-basket"></i>
              <p>
                Orders
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right" id="total_pending_order"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="all_orders.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Orders</p>
				  
                </a>
              </li>
			  
			    <li class="nav-item">
                <a href="pending_order.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Orders</p>
                </a>
              </li>
			  
			  
              <li class="nav-item">
                <a href="processing_order.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Processing Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="shipped_order.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shipped</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="delivered_order.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delivered</p>
                </a>
              </li>
			      <li class="nav-item">
                <a href="cancelled_order.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cancelled</p>
                </a>
              </li>
			  
			  
			  
			  <li class="nav-item">
                <a href="un_paid_order.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unpaid</p>
                </a>
              </li>
            </ul>
          </li>
		  
		  
		  
		  
		  
		  
		  
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tags"></i>
              <p>
                Offer
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="banner.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                   <p>Banner</p>
                </a>
              </li>
        
              <li class="nav-item">
                <a href="offer.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Offer</p>
                </a>
              </li>
              
            </ul>
          </li>
		  
		  
		  
		  
		     <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customer
                <i class="fas fa-angle-left right"></i>
          
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="customer_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="customer_complain.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Complain</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="customer_feedback.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Feedback </p>
                </a>
              </li>
                    
            </ul>
          </li>
		  
		  
		  
		    
		  
		  	   <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-university"></i>
              <p>
                  Courier service
                <i class="fas fa-angle-left right"></i>
              
              </p>
            </a>
            <ul class="nav nav-treeview">
              
             
          <li class="nav-item">
                <a href="../admin/cori_login.php"  target="_blank" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Courier service login</p>
                </a>
              </li>
         
              
            </ul>
          </li>
		 <?php  
		 
		 
		 if($_SESSION['user_role']=="admin")
		 {
						
						echo "  <li class='nav-item has-treeview' id='report_btn'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fa fa-list-alt'></i>
              <p>
                Reports
                <i class='fas fa-angle-left right'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='sales_report.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Sales Report</p>
                </a>
              </li>
				<li class='nav-item'>
                <a href='stock_list_report.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Stock Report</p>
                </a>
              </li>
              	<li class='nav-item'>
                <a href='customer_list_report.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Customer's Details Report</p>
                </a>
              </li>
		 
            </ul>
          </li>
		  
		  ";	
						
		 }
	
		  
		  	?>
   <li class="nav-item has-treeview">
            <a href="customer_message.php" class="nav-link">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                Messages
              </p>
            </a>
        
          </li>
		  
		  
		<?php  	 if($_SESSION['user_role']=="admin")
		 {
		 
		echo " 
		  <li class='nav-item'  data-toggle='modal' data-target='#db_backup_Model' style='cursor: pointer; ' id='database_backup_btn' >
            <a   class='nav-link'>
              <i class='nav-icon fa fa-cogs'></i>
              <p >
				Database backup
          
              </p>
            </a>
          </li>";
		  
		 }
		 
		 ?>
		  
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fa fa-power-off"></i>
              <p>
				Sign out
                
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>