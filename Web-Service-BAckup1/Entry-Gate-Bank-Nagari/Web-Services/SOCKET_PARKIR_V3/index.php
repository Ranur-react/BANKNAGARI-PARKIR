<?php 
// Wating Sensor Loop Detector I
include 'koneksi.php';

include 'Read.php';
include 'Write.php';

include 'GenerateId.php';
include 'CaptureImages.php';
include 'PritBarcode.php';

$d['mesin']="MOBIL";
$d['id_mesin']=01;
$d['status']=true;
$d['vld_status']=false;
while (true) {
    		# code...
    	 	
$data= Read($connfig);
	//1. jika mobil terdeteksi VLD 
if($data == $msg=chr(0xA6)."IN3ON".chr(0xA9)){
	$d['vld_status']=true;
	$kendaraan=1;
	// sleep(5);
	$data= Read($connfig);
	//2. jika tombol hijau ditekan ----- NEXT
	if($data == $msg=chr(0xA6)."IN1ON".chr(0xA9)){
		$d['btn_status']='green';
		Write($connfig,'MT00002');
		// 3. Generate ID Parkir
		$id= GenerateID_Entry($d['id_mesin']);
		$d['id_parkir']=$id;
		// 4. Simpan ID Parkir
		mysqli_query($conn, "INSERT INTO `tb_entry` (`id_entry`, `gate_id`,date) VALUES ('$id', '01',now());");
		// 5. Print Barcode
		PrintBarcode($id,$connfig);
		// 6. KAMERA Melakukan Capture Hasil Capture Insert ke Folder dengan folder name 'ID' (php Capture_Vehcle())
		$CameraConfig['folder']=$id;
		Write($connfig,'TRIG1');
		// CaptureImages($CameraConfig,$id);
		// 7. Setelah Driver Mengambil Kertas Barcode, Controller Membuka Gate (php Write ='OUT1ON')
	}
	if($data == $msg=chr(0xA6)."IN2ON".chr(0xA9)){
		$d['btn_status']='red';	
		// 	 Alaram DARURAT Berbunyi ----- STOP
		Write($connfig,'MT00010');
		$d['status']=false;
	}
	// $d['status']=true;	
}
 // Kendaraan tidak ada ----- STOP
else if($data == $msg=chr(0xA6)."IN1ON".chr(0xA9)){
	$d['status']=true;
	Write($connfig,'MT00010');
	$d['vld_status']=false;

} 
//Note
}   
// Setelah Write, Read akan dihentikan oleh Library, jadi usahakan jika ingin READ pastikan Write Setelahnnya
echo json_encode($d);

 ?>