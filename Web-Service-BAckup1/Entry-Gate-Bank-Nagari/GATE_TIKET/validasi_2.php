<?php 
include 'koneksi.php';
include 'AES_DENC.php';
include 'key.php';
		echo json_encode("_start_");

// echo $_SERVER["REQUEST_METHOD"] ;
		if ($_SERVER["REQUEST_METHOD"] == 'POST') {
		echo $_POST['data'];	
		}
if (isset($_POST['data'])) {
	# code...
	$chipperteks=$_POST['data'];
	echo "<br> Karakter yang diterima :".$chipperteks;
	// $plainteks= decrypt($chipperteks,$denc_Key);
	// $data=parsing_react_api($plainteks);

 //     echo "<br>Date :".$data['dateValue'];   
 //     echo "<br>LevelX :".$data['levelValue'];   
 //     echo "<br>Nomor Bukti :".$data['nomorbuktiValue'];   
	
	
			
}else{
	echo "Data Tidak ada";
}
 ?>