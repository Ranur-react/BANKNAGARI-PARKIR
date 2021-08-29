<?php 
include 'koneksi.php';
			
			if ($_SERVER["REQUEST_METHOD"] == 'POST') {
			$chiper=$_POST['data'];
				
		}else{
			$chiper=$_GET['data'];
			// echo "Nulll";
		}
		echo "$chiper";
	mysqli_query($conn,"INSERT INTO `db_banknagari`.`tb_log` (`log`, `jenis_log`, `gate_id`, `date`) VALUES ('$chiper', 'erorr', '01', '2021-05-11 14:17:08');");
		echo "Eror";
 ?>