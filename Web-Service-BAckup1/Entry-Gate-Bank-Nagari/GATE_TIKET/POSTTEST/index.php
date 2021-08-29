<?php 
include './../koneksi.php';

		if ($_SERVER["REQUEST_METHOD"] == 'POST') {
			$chiper=$_POST['data'];
				
		}else{
			$chiper=$_GET['data'];
			// echo "Nulll";
		}

mysqli_query($conn,"INSERT INTO `tb_log` ( id,log,jenis_log, gate_id,date) VALUES (NULL, 'Test $chiper','already_used', '05',now());");
	echo "Data Diterima: $chiper";
		
 ?>