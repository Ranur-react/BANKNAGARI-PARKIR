<?php 
include 'koneksi.php';
	$qry = mysqli_fetch_array(mysqli_query($conn,"SELECT*FROM `tb_config` WHERE OPTIONS='denc_key';"));
	echo "Key yang dipake";
	echo "Key denc: ".$denc_Key=$qry['value'];
		
 ?>