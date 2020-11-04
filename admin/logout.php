<?php 
session_start();

if(isset($_SESSION['cour_user_id']))
{
unset($_SESSION['cour_user_id']); //reset the cori_id session
 header("location:../admin/cori_login.php"); //aceess page
}

if(isset($_SESSION['adminid']))
{ 
	unset($_SESSION['adminid']); //reset admin session
	header("location:../admin/login.php"); //aceess page
}

?>



