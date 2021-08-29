<?php 
include 'koneksi.php';
include 'AES_DENC.php';
		echo json_encode("_start_");


if (isset($_GET['data'])) {
	# code...
	$id=$_GET['data'];
	
	$qry = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `tb_detail_tiket` WHERE `tb_detail_tiket`.`seri_tiket`='$id' ;"));
	if (!empty($qry['seri_tiket'])) {
		// echo "Data : ".$qry['id']." Ada di dalam database";
		// $json['Data'] = "Ada di dalam database";
		// echo json_encode($json);
	// echo "availble";
				$qryx = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `tb_detail_tiket` WHERE `tb_detail_tiket`.`seri_tiket`='$id' AND tb_detail_tiket.`status`='1' ;"));
				if (!empty($qryx['seri_tiket'])) {
					// echo "Data : ".$qry['id']." Ada di dalam database";
					// $json['Data'] = "Ada di dalam database";
					// echo json_encode($json);
				echo "true";
				//Tiket langsung dimatikan
				mysqli_query($conn,"UPDATE `tb_detail_tiket` SET `status` = '0' WHERE `seri_tiket` = '$id';");
				}else{
				echo "false";

				//mysqli_query($conn,"INSERT INTO `tb_log` ( id,log,jenis_log, gate_id,date) VALUES (NULL, 'iD Tiket .$id. yang digunakan sudah Tidak Berlaku','already_used', '05',now());");
				}
	}else{
		// echo "Data : ".$id." TIDAK Ada di dalam database";
		// $json['Data'] = "TIDAK Ada di dalam database";
		// echo json_encode($json);
	echo "false";
		
		//mysqli_query($conn,"INSERT INTO `tb_log` ( id,log,jenis_log, gate_id,date) VALUES (NULL, 'iD Tiket .$id. yang digunakan tidak ada di dalam database','failure_ticket', '05',now());");
	}


				
			
}else{
	echo "Data Tidak ada";
}
 ?>