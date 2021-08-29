<?php
include 'koneksi.php';
$qry=mysqli_query($conn, "INSERT INTO `tb_entry`  VALUES (null,'12345678', '01',now());");
var_dump($qry) ;
?>