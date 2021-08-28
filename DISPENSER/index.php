<?php 
// Wating Sensor Loop Detector I
include 'koneksi.php';
// include 'Read.php';
include 'Write.php';
include 'GenerateId.php';
include 'CaptureImages.php';
include 'PritBarcode.php';

$d['mesin']="MOTOR";
$d['id_mesin']=02;

// 1. Bunyikan Suara "Terimakasih" Mesin
Write($connfig,'MT00002');
// 2. Generate ID Parkir
$id= GenerateID_Entry($d['id_mesin']);
$d['id_parkir']=$id;
// 3. Simpan ID Parkir
mysqli_query($conn, "INSERT INTO `tb_entry` (`id_entry`, `gate_id`,date) VALUES ('$id', '02',now());");
// 4. Print Barcode
PrintBarcode($id,$connfig);

// 5. Setelah Driver Mengambil Kertas Barcode, Controller Membuka Gate (php Write ='OUT1ON')
Write($connfig,'TRIG1');
$CameraConfig['folder']=$id;
// CaptureImages($CameraConfig,$id);
echo "_start_";
echo "true";
?>