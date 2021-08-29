<?php 

 function SensorCountHumans($coneksi,$plainteks) {
 	mysqli_query($coneksi,"INSERT INTO `db_banknagari`.`tb_hitung_dewasa` (`notiket`, `date`) VALUES ('$plainteks', NOW());");

	// $qry = mysqli_fetch_array(mysqli_query($coneksi,"SELECT SUM(`tb_human_entry`.`detect_dewasa`) AS rc_dewasa FROM `tb_human_entry`;"));
	// $adult_before=$qry['rc_dewasa'];

//adult COUNT BEFORE bside plush FROM url;
	//mysqli_query($coneksi,"UPDATE `db_banknagari`.`tb_human_entry` SET `detect_dewasa`=($adult_before+1) WHERE `no` = '1';");
	//entry COUNT WITH the entry DATA;
	//mysqli_query($coneksi,"UPDATE `db_banknagari`.`tb_human_entry` SET `ticket_entry` = (SELECT COUNT(`tb_tiketmasuk`.`id_ecn`) FROM `tb_tiketmasuk` ) WHERE `no` = '1'");

//COUNT child
	//mysqli_query($coneksi,"UPDATE `db_banknagari`.`tb_human_entry` SET anakanak=(`ticket_entry`-`detect_dewasa`) WHERE `no` = '1';");
}

 ?>