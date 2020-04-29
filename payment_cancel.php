<!doctype html>

<?php session_start();
	if(!isset($_SESSION['cusid']))
	{
		header("location:index.php");	
	}

 ?>
 

<html lang="en">
  <head>
  <?php include "customer_reg.php"; ?>
  <?php include "customer_forget_password.php"; ?>
    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.js?i=13"></script>
    <script src="js/popper.min.js?i=13"></script>
    <script src="js/bootstrap.min.js?i=13"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css?i=13">
	<script src="js/all.js?i=13" data-auto-replace-svg="nest"></script>
	<script src="prg_main.js?i=13" ></script>
	
	
	 <!-- All icons -->
	<link rel="stylesheet" href="css/all.css?i=13">
    <title>Dress Line</title>
  </head>
  <body>
<!-- Image and text -->
<nav class="navbar navbar-light bg-warning justify-content-center">
  <a class="navbar-brand" href="#">
    <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    <i class="fas fa-home"></i>Dress Line</a>
  </a>
</nav>




	
	<div class="container col-6 mt-5">
	<div class="row m-5">


<div class="tab-content col-10" id="myTabContent">

<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Your payment done!</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>

</div>
</div>

	</div>

</body>
</html>