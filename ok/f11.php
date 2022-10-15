<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>hronologija
</title>
<SCRIPT LANGUAGE="JavaScript">
<!--
function showBoxes(frm){
   var message;
   for (var i = 0; i < frm.pripadnost.length; i++){
      if (frm.pripadnost[i].checked){
         message = message + "\n" + frm.pripadnost[i].value;
         break;
      }
   }
   alert(message);
   document.getElementById('c9').value = "testing !!!!!";
}
function freg(smer){
	var f2_val;
	f2_val=document.getElementById('d2').value;
	if (smer==0) { 
		--f2_val; }
	if (smer==1) { 
		++f2_val; }
	if (f2_val<1) { 
		f2_val=1; }
	document.getElementById('d2').value = f2_val;
	document.getElementById("f2").submit();
}
-->
</SCRIPT>
<style type="text/css">
<!--
@import url(/normal.css);
-->
</style>
</head>
<body>
<div class=BELITASTER>
<br><br>
<table width="100%"  border=1>
<tr><td>
<?php
set_time_limit (7200);
echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = get_browser(null, true);
print_r($browser);

$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

$upit1="SELECT * FROM `hr_int` inner join hr_int as hr_int1 on hr_int.zapis=hr_int1.zapis WHERE hr_int.broj=hr_int1.broj and hr_int.id<hr_int1.id;";
$rezultat = mysqli_query($konekcija,$upit1);
while(1) {
	$red1 = mysqli_fetch_assoc($rezultat);
	if(!isset($red1)) {echo "0!"; break;}
	$aa1=$red1['hr_int.broj'];
	$aa2=$red1['hr_int.zapis'];
	echo "<br>" . $red1['hr_int.id'] . "-" . $red1['hr_int1.id'] . " - " . $aa1 . " * " . $aa2;
}
/*echo mktime(0, 0, 0, date("d"), date("m"), date("Y")) . "<br>";
$ddd= date("d");
$mmm= date("m");
$yyy= date("y");
$upit1="SELECT * FROM hr1 inner join hr2 on hr1.id=hr2.id order by yy,mm,dd;";// where dd=20 and mm=11 
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 
$rezultat = mysqli_query($konekcija,$upit1);

$numerr=array('&#273;','&#269;','&#263;','&#272;','&#268;','&#262;','&#353;','&#352;','&#382;','&#381;');
$normall=array('đ','č','ć','Đ','Č','Ć','š','Š','ž','Ž');
*/
/*
$upit7="SELECT * FROM entia where id>695";
$rezultat7 = mysqli_query($konekcija,$upit7);

while(1) {
	$red7 = mysqli_fetch_assoc($rezultat7);
	if(!isset($red7)) {break;}
	$grad=$red7['naziv'];
	$grad=str_replace(" ","_",$grad);
	$grad=str_replace($numerr,$normall,$grad);

	$data = file_get_contents("https://en.wikipedia.org/wiki/" . $grad);
	echo "<pre>" . $grad . "*" . $red7['id'] . "*" . substr($data,strpos($data,"°")-2,6) . "*" . substr($data,strpos($data,"°",strpos($data,"°")+2)-2,6) . "</pre>";

}
*/

/*
while(1) {
	$red1 = mysqli_fetch_assoc($rezultat);
	if(!isset($red1)) {break;}
	$aa1=$red1['h1.tekst'];
	$aa2=$red1['h1.tekst'];
	*/
/*	$akteri=$red1['akteri'];
	$imali=strpos($aa,"srem");
	$imali2=strpos($aa,"iverz");
	$imali3=strpos($aa,"Srem");
	$imali4=strpos($aa,"Zagreb-Beograd");
	$imali5=strpos($aa,"Beograd-Zagreb");
	*/
	//if(($imali!==FALSE) and ($imali3===FALSE) and ($imali4===FALSE) and ($imali5===FALSE)) {// and ($imali3===FALSE)
	//if((($imali!==FALSE) or ($imali3!==FALSE)) and ($imali2!==FALSE)) {
/*	//if(strlen($akteri)>1 and substr($akteri,strlen($akteri)-2,2)=="11") {
		$rrr++;
		$upit2="INSERT INTO hr_int (vrsta,broj,zapis) VALUES (1,831," . $red1['id'] . ");";
		if(($red1['id']>7501) or ($red1['id']<7200)) {$rezultat2 = mysqli_query($konekcija,$upit2);}
		//$rezultat2 = mysqli_query($konekcija,$upit2);
		echo "<br>" . $aa1 . "-" . $aa2;
	//}
	//echo "<br>" . $red1['yy'] . "-" . $red1['mm'] . "-" . $red1['dd'] . " - " . $aa;
} */
echo "<br>" . "<br>" . $rrr;
die;
