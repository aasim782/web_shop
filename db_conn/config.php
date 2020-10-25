<?php
//php databse Connection
$host="localhost"; // name of the host
$username="root"; //database user name
$password=""; //database password
$database="web_shop_db"; //database name

//create connection
$con=mysqli_connect($host,$username,$password,$database);

		//check the connection
		if(!$con)
		{
		die("Connection failed:". mysqli_connect_error());
		}

?>