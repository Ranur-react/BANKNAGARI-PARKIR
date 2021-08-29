<?php 
include 'koneksi.php';
include 'AES_DENC.php';
include 'key.php';
include 'dateformat.php';
include 'sensorCount.php';
		echo json_encode("_start_");
// 1. server menerima POST
		if ($_SERVER["REQUEST_METHOD"] == 'POST') {
			$chiper=$_POST['data'];
			$adult=$_POST['adult'];
				
		}else{
			$chiper=$_GET['data'];
			$adult=$_POST['adult'];
			// echo "Nulll";
		}


	// 2. server decnripsi plain teks POST
	$chipperteks=str_replace(" ","+",$chiper);
	$plainteks= decrypt($chipperteks,$denc_Key);
	$data=parsing_react_api($plainteks);
		$serial=$plainteks;
//dewasa state
if($data['levelValue'] =='0001' & $adult=='true'){
	$qry = mysqli_fetch_array(mysqli_query($conn,"SELECT*FROM `tb_tiketmasuk` WHERE `id_denc_serial`='$serial';"));
						if (!empty($qry['id_denc_serial'])) {
							//mysqli_query($conn,"INSERT INTO `tb_log` ( id,log,jenis_log, gate_id,date) VALUES (NULL, 'iD Tiket .$plainteks. yang digunakan sudah Tidak Berlaku karena sudah digunakan','already_used', '05',now());");
						echo "false";	
						}else{
							$level=$data['levelValue'];
							$nomorbuktiValue=$data['nomorbuktiValue'];
							 $date_serial=dateFormat($data['dateValue']);
							 $time_serial=timeFormat($data['dateValue']);
							 if (dateEqualas($date_serial)) {
							 	SensorCountHumans($conn,$plainteks);
								mysqli_query($conn,"INSERT INTO `db_banknagari`.`tb_tiketmasuk` (`id_ecn`, `id_denc_serial`, `date_serial`, `time_serial`, `level_tiket`, `nomor_bukti`, `date_in`, `id_gate`) VALUES ('$chipperteks', '$plainteks', '$date_serial', '$time_serial', '$level', '$nomorbuktiValue', NOW(), '05')");
							 	# code...
								echo "true";	
							 }else{
							//mysqli_query($conn,"INSERT INTO `tb_log` ( id,log,jenis_log, gate_id,date) VALUES (NULL, 'iD Tiket .$plainteks. yang digunakan sudah Tidak Berlaku /Kdaluarsa','ove_due', '05',now());");

								echo "Kadaluarsa ";	
							 }
						}
}else if($data['levelValue'] =='0001' & $adult=='false'){
	echo "Palsu Dewasa REJECT";
}
//anak-anak state
else if($data['levelValue'] =='0002' & $adult=='true'){
	echo "Palsu anak-anak REJECT";
}else if($data['levelValue'] =='0002' & $adult=='false'){
	////koding esekusi
					$qry = mysqli_fetch_array(mysqli_query($conn,"SELECT*FROM `tb_tiketmasuk` WHERE `id_denc_serial`='$serial';"));
						if (!empty($qry['id_denc_serial'])) {
						//	mysqli_query($conn,"INSERT INTO `tb_log` ( id,log,jenis_log, gate_id,date) VALUES (NULL, 'iD Tiket .$plainteks. yang digunakan sudah Tidak Berlaku karena sudah digunakan','already_used', '05',now());");
						echo "false";	
						}else{
							$level=$data['levelValue'];
							$nomorbuktiValue=$data['nomorbuktiValue'];
							 $date_serial=dateFormat($data['dateValue']);
							 $time_serial=timeFormat($data['dateValue']);
							 if (dateEqualas($date_serial)) {
								mysqli_query($conn,"INSERT INTO `db_banknagari`.`tb_tiketmasuk` (`id_ecn`, `id_denc_serial`, `date_serial`, `time_serial`, `level_tiket`, `nomor_bukti`, `date_in`, `id_gate`) VALUES ('$chipperteks', '$plainteks', '$date_serial', '$time_serial', '$level', '$nomorbuktiValue', NOW(), '05')");
							 	# code...
								echo "true";	
							 }else{
							//mysqli_query($conn,"INSERT INTO `tb_log` ( id,log,jenis_log, gate_id,date) VALUES (NULL, 'iD Tiket .$plainteks. yang digunakan sudah Tidak Berlaku /Kdaluarsa','ove_due', '05',now());");

								echo "Kadaluarsa ";	
							 }
						}
//end esekusi
}
//Touris
else if($data['levelValue'] =='0003' & $adult=='true'){
	////koding esekusi
					$qry = mysqli_fetch_array(mysqli_query($conn,"SELECT*FROM `tb_tiketmasuk` WHERE `id_denc_serial`='$serial';"));
						if (!empty($qry['id_denc_serial'])) {
							//mysqli_query($conn,"INSERT INTO `tb_log` ( id,log,jenis_log, gate_id,date) VALUES (NULL, 'iD Tiket .$plainteks. yang digunakan sudah Tidak Berlaku karena sudah digunakan','already_used', '05',now());");
						echo "false";	
						}else{
							$level=$data['levelValue'];
							$nomorbuktiValue=$data['nomorbuktiValue'];
							 $date_serial=dateFormat($data['dateValue']);
							 $time_serial=timeFormat($data['dateValue']);
							 if (dateEqualas($date_serial)) {
								mysqli_query($conn,"INSERT INTO `db_banknagari`.`tb_tiketmasuk` (`id_ecn`, `id_denc_serial`, `date_serial`, `time_serial`, `level_tiket`, `nomor_bukti`, `date_in`, `id_gate`) VALUES ('$chipperteks', '$plainteks', '$date_serial', '$time_serial', '$level', '$nomorbuktiValue', NOW(), '05')");
							 	# code...
								echo "true";	
							 }else{
							//mysqli_query($conn,"INSERT INTO `tb_log` ( id,log,jenis_log, gate_id,date) VALUES (NULL, 'iD Tiket .$plainteks. yang digunakan sudah Tidak Berlaku /Kdaluarsa','ove_due', '05',now());");

								echo "Kadaluarsa ";	
							 }
						}
//end esekusi
}else if($data['levelValue'] =='0003' & $adult=='false'){
	////koding esekusi
					$qry = mysqli_fetch_array(mysqli_query($conn,"SELECT*FROM `tb_tiketmasuk` WHERE `id_denc_serial`='$serial';"));
						if (!empty($qry['id_denc_serial'])) {
							//mysqli_query($conn,"INSERT INTO `tb_log` ( id,log,jenis_log, gate_id,date) VALUES (NULL, 'iD Tiket .$plainteks. yang digunakan sudah Tidak Berlaku karena sudah digunakan','already_used', '05',now());");
						echo "false";	
						}else{
							$level=$data['levelValue'];
							$nomorbuktiValue=$data['nomorbuktiValue'];
							 $date_serial=dateFormat($data['dateValue']);
							 $time_serial=timeFormat($data['dateValue']);
							 if (dateEqualas($date_serial)) {
								mysqli_query($conn,"INSERT INTO `db_banknagari`.`tb_tiketmasuk` (`id_ecn`, `id_denc_serial`, `date_serial`, `time_serial`, `level_tiket`, `nomor_bukti`, `date_in`, `id_gate`) VALUES ('$chipperteks', '$plainteks', '$date_serial', '$time_serial', '$level', '$nomorbuktiValue', NOW(), '05')");
							 	# code...
								echo "true";	
							 }else{
							//mysqli_query($conn,"INSERT INTO `tb_log` ( id,log,jenis_log, gate_id,date) VALUES (NULL, 'iD Tiket .$plainteks. yang digunakan sudah Tidak Berlaku /Kdaluarsa','ove_due', '05',now());");

								echo "Kadaluarsa ";	
							 }
						}
//end esekusi

}

 ?>