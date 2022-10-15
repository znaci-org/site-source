<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>hronologija
</title>

<style type="text/css">
<!--
@import url(/normal.css);
-->
</style>
</head>
<body>
<div class=BELITASTER>
<br><br>
<form method="get" id="f2" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%"  border=1>
<tr><td>
<?php
include "neke_funkcije.php";
echo mktime(0, 0, 0, date("d"), date("m"), date("Y")) . "<br>";
$ddd= date("d");
$mmm= date("m");
$yyy= date("y");

$upit1="SELECT * FROM hr1 inner join hr2 on hr1.id=hr2.id order by yy,mm,dd;";// where dd=20 and mm=11 
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 
$rezultat = mysqli_query($konekcija,$upit1);

$numerr=array('&#273;','&#269;','&#263;','&#272;','&#268;','&#262;','&#353;','&#352;','&#382;','&#381;');
$normall=array('đ','č','ć','Đ','Č','Ć','š','Š','ž','Ž');

$ii=0;
$nazivi=array();
$geo_rang=array();
$geo_rang_2=array();
$upit14="SELECT distinct(eventu.ko),entia.id as id1,entia.naziv as naziv1,entia.e as e, entia.n as n FROM entia INNER JOIN eventu ON entia.id=eventu.ko WHERE entia.vrsta=2;";
$rezultat14 = mysqli_query($konekcija,$upit14);
while($red14 = mysqli_fetch_assoc($rezultat14)) {
	$nazivi[$ii]=$red14['naziv1'];
	$idovi[$ii]=$red14['id1'];
	$geo_rang[$ii]=$red14['n']-$red14['e'];
	$geo_rang_2[$ii]=$red14['n']-$red14['e'];
	echo $nazivi[$ii] . ":" . $geo_rang[$ii] . "<br>";
	$ii++;
}
print_r($geo_rang);
echo "<br><br>";
arsort($geo_rang);
print_r($geo_rang);
$sorted_geo_rang=array_keys($geo_rang);
echo "<br><br>";
print_r($sorted_geo_rang);
echo "<br><br>";

for($ii=0;$ii<count($sorted_geo_rang);$ii++) {
	$jj=$sorted_geo_rang[$ii];
	$status=je_li_slobodan($idovi[$jj],19,12,1943);
	if ($status==1) {$stil=" class=bigTitle_c";} else {$stil="";}
	$strg= $strg . "<b" . $stil . ">" . $nazivi[$jj] . "</b> * ";
}
$strg=substr($strg,0,strlen($strg)-3);
$slbd=string_slobodni(19,12,1943);
echo "---------" . $slbd . "---------";
echo "<br><br>";
$slob_gr=slobodni_gradovi(19,12,1943);
$slob_gr_keys=array_keys($slob_gr);
for($ii=0;$ii<count($slob_gr_keys);$ii++) {
	$upit_n="SELECT * FROM entia WHERE id=" . $slob_gr[$slob_gr_keys[$ii]];
	$rezultat_n = mysqli_query($konekcija,$upit_n);
	$red_n = mysqli_fetch_assoc($rezultat_n);
	echo $red_n['naziv'] . " * ";
}

?>

</tr></td></table>
</body>
</html>
