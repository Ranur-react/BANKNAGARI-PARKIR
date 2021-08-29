<?php 
	
	//Koneksi ke DBMS
	$severname = "localhost";
	$username = "root";
	$password = "";
	// $password = "Padri0@@@";
	$dbname = "db_banknagari";

	$conn = new mysqli($severname, $username, $password, $dbname);
	if(!$conn){
		die("koneksi Database gagal" . mysqli_connect_error());
	}
 ?>