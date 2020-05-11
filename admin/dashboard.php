 <!doctype html>
  <?php 
 session_start();
	if(!isset($_SESSION['adminid']))
	{
		header("location:../admin/login.php");	
	}
 ?>
 
<html lang="en">
  <head>
 <?php  include "product_reg.php" ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery.js?i=77"></script>
    <script src="../js/popper.min.js?i=77"></script>
    <script src="../js/bootstrap.min.js?i=77"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css?i=77">
	<script src="../js/all.js?i=77" data-auto-replace-svg="nest"></script>
	<script src="../prg_main.js?i=77" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="../css/all.css?i=77">
    <title>Dress Line</title>
	
  </head>
  <body>
  


  
<!-- Navigation Bar -->
<nav class="navbar shadow-sm navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
      </li>
 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Product
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown"  id="product_btn">
 
		<button class="dropdown-item btn btn-light" data-toggle="modal"    data-target="#product_reg_model" type="button">Add Product</button> 
			<div class="dropdown-divider"></div>		  
 
		  		  <button class="dropdown-item btn btn-light" data-toggle="modal"    data-target="#Category_reg_model" type="button">Add Category</button> 
		    <div class="dropdown-divider"></div>
		  <button class="dropdown-item btn btn-light" data-toggle="modal"   data-target="#brand_reg_model" type="button">Add Brand</button> 
 
        </div>
		
      </li>
  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Product
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown"  >
  
	 
		<button class="dropdown-item btn btn-light" onclick="window.location='../admin/logout.php'"  type="button">Logout</button> 
        </div>
		
      </li>
 
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!--nave close-->
<div class='container'>
<div class="row mt-5">
<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Primary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="col-lg-3  "> <!--lg 3 used for cloumn width-->
	<!--Filter-->
	 <li class="list-group-item list-group-item-action bg-info" style="color:white;background-color:#FF4747;">
		<h5><i class="fas fa-th-list " ></i>&nbspTOTAL SALE</h5>
		
		<li class="list-group-item mb-2 rounded" style="background-color:#d6d8d9;">Cras justo odioasdsadasdas
			das
			d-blocksad
			asdasdd
		</li>
	
		</li>
</div>
</div><!-- row close-->
</div> 	<!--container close-->

 






</body>
</html>