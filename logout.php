<?php 
session_start();
unset($_SESSION['cusid']); //reset the cusid session
unset($_SESSION['cus_fname']); //reset the fname session
unset($_SESSION['adminid']); //reset the fname session
header("location:index.php"); //aceess page


?>