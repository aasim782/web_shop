<?php
//php databse Connection
$host="localhost";
$username="root";
$password="";
$database="web_shop_db";

//create connection
$con=mysqli_connect($host,$username,$password,$database);

		//check the connection
		if(!$con)
		{
		die("Connection failed:". mysqli_connect_error());
		}

?>