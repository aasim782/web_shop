<?php 
session_start();



if(isset($_SESSION['adminid']))
{ 
	unset($_SESSION['adminid']); //reset admin session
	header("location:../admin/login.php"); //aceess page
}

?>



