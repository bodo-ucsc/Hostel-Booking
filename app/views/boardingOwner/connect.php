<?php

		// $connection = mysqli_connect(dbserever,dbuser,dbpass,dbname);
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "test";
		//$connection=mysqli_connect("localhost","root","","grocerydb");
		$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		if(!$connection)
		{
		die("cannot connect to server". mysqli_connect_error());
		}	
?>