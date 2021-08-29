<?php 
include 'koneksi.php';
	$qry = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(`tb_human_entry`.`detect_dewasa`) AS rc_dewasa FROM `tb_human_entry`;"));
	$adult_before=$qry['rc_dewasa'];
		




//adult COUNT BEFORE bside plush FROM url;
	mysqli_query($conn,"UPDATE `db_banknagari`.`tb_human_entry` SET `detect_dewasa`=($adult_before+1) WHERE `no` = '1';");

//entry COUNT WITH the entry DATA;
	mysqli_query($conn,"UPDATE `db_banknagari`.`tb_human_entry` SET `ticket_entry` = (SELECT COUNT(`tb_tiketmasuk`.`id_ecn`) FROM `tb_tiketmasuk` ) WHERE `no` = '1'");

//COUNT child
	mysqli_query($conn,"UPDATE `db_banknagari`.`tb_human_entry` SET anakanak=(`ticket_entry`-`detect_dewasa`) WHERE `no` = '1';");

$qryx1 = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(`tb_human_entry`.`detect_dewasa`) AS rc_dewasa FROM `tb_human_entry`;"));
	$rc_adult_after=$qryx1['rc_dewasa'];

// $qryx2 = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(`tb_human_entry`.`anakanak`) AS rc_anakanak FROM `tb_human_entry`;"));
// 	$rc_child_after=$qryx2['rc_anakanak'];

// $qry = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(`level_tiket`) as rc_tiket_dewasa FROM `tb_tiketmasuk` WHERE level_tiket='0001';"));
// 	$rc_adult_ticket=$qry['rc_tiket_dewasa'];
// $qry = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(`level_tiket`) as rc_tiket_touris FROM `tb_tiketmasuk` WHERE level_tiket='0003';"));
// 	$rc_touris_ticket=$qry['rc_tiket_touris'];

// //hitung  jumlah orang yang gak bayay tikrt
// 	// Formula: jumlah = (Tank-Rcank) + (Rcdewsa -(RcAdult + Ttouris))
$qryx4 = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(`level_tiket`) as rc_tiket_anak FROM `tb_tiketmasuk` WHERE level_tiket='0002';"));
$childTicket=$qryx4['rc_tiket_anak'];
// 	$rc_free_after=($qry['rc_tiket_anak']-$rc_child_after)+($rc_adult_after-($rc_adult_ticket+$rc_touris_ticket));


$qryx5 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `tb_human_entry`"));
	$rc_entry=$qryx5['ticket_entry'];

	echo "Jumlah Dewasa Terdeteksi: ".$rc_adult_after;	//Fokus
	echo "Jumlah anak-anak dengn Tiket: ".$childTicket;	
	echo "Jumlah orang yang masuk dengan Tiket: ".$rc_entry;	
	echo "Jumlah orang yang masuk tanpa Bayar: ".($rc_adult_after-$childTicket-$rc_entry);	

 ?>