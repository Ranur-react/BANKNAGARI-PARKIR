<?php 
include 'koneksi.php';
CaptureImages($CameraConfig);
function CaptureImages($CameraConfig)
{
	
$username = "admin";
$password = "Hikvision!!";
$remote_url = 'http://admin:Hikvision!!@192.168.1.64/ISAPI/Streaming/channels/101/picture';

$context = stream_context_create(array(
    "http" => array(
        "header" => "Authorization: Digest username='admin' " . base64_encode("$username:$password"),
        "protocol_version" => 1.1, //IMPORTANT IS HERE
    )));

$data = file_get_contents($remote_url);

echo $data;


} 


// ?ScreenShotUrl($url);

// CaptureImages($CameraConfig);
 ?>