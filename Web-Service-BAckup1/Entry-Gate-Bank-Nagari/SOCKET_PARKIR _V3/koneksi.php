<?php 
	
	//Koneksi ke DBMS
	$severname = "localhost";
	$username = "root";
	$password = "Padri0@@@";
	$dbname = "db_banknagari";

	$conn = new mysqli($severname, $username, $password, $dbname);
	if(!$conn){
		die("koneksi Database gagal" . mysqli_connect_error());
	}


	//Koneksi Hardware
	// $connfig['host']='192.168.1.100';
	// $connfig['port']=5000;
	// $connfig['socket']=socket_create(AF_INET, SOCK_STREAM, 0);
	// socket_connect($connfig['socket'], $connfig['host'],$connfig['port']);

	//Koneksi Kamera
	$CameraConfig['ip']='192.168.1.101';
	$CameraConfig['port']=5000;
	$CameraConfig['folder']='capture';
 ?>