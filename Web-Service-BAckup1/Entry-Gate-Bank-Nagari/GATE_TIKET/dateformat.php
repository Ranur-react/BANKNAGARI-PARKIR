<?php 
	date_default_timezone_set("Asia/Jakarta");

 function dateFormat($value)
{
	$ymd = DateTime::createFromFormat('dmYHis', $value)->format('Y-m-d');
	return $ymd;
}
 function timeFormat($value)
{
	$ymd = DateTime::createFromFormat('dmYHis', $value)->format('H:i:s');
	return $ymd;
}
 function dateEqualas($d)
{
	$today = date("Y-m-d");
	$date = "$d";
	if ($date >= $today) {
		return true;
	}else{
		return false;

	}
}
 ?>