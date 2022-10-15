<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>hronologija
</title>
<SCRIPT LANGUAGE="JavaScript">
<!--

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
<form method="get" id="f2" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%"  border=1>
<tr><td>
<?php

if ($_GET['dd']) {
	$dan = $_GET['dd'];
	$iiix=1;
} else {
	$dan = date("d");
}
if ($_GET['mm']) {
	$mesec = $_GET['mm'];
	$iiix=1;
} else {
	$mesec = date("m");
}
if ($_GET['yy']) {
	$godina = $_GET['yy'];
	$iiix=1;
} else {
	$godina = 1943;
}
if ($_GET['grad']) {
	$grad_id = $_GET['grad'];
	$iiix=1;
} else {
	$grad_id = 490;
}

$gradovi=array();
$akcije=array();
$rr=0;
$rrr=0;
//echo 10497+ strtotime('1945-5-15')/86400;

$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

$upit_e="SELECT distinct(eventu.ko) FROM entia INNER JOIN eventu ON entia.id=eventu.ko;";
$rezultat_e = mysqli_query($konekcija,$upit_e);

while(1) {
	$red_e=mysqli_fetch_assoc($rezultat_e);
	if(!isset($red_e)) {break;}
	$gradovi[$rr]=$red_e['ko'];
	$rr++;
}
for($ii=0;$ii<$rr;$ii++) {
	$upit_g="SELECT * FROM `entia` WHERE id=" . $gradovi[$ii] . ";";
	$rezultat_g = mysqli_query($konekcija,$upit_g);
	$red_g=mysqli_fetch_assoc($rezultat_g);
	echo "<input type=" . chr(34) . "radio" . chr(34) . " name=" . chr(34) . "grad" . chr(34) . " value=" . chr(34) . $gradovi[$ii] . chr(34) . ">" . $red_g['naziv'] . "<br>\n";
	if($ii==((int)($rr/3)) or $ii==((int)(2 * $rr/3))) {echo "</td><td>\n";}
}
?>
</td><td>dan, mesec i godina: <input type="text" name="dd" /><input type="text" name="mm" /><input type="text" name="yy" /><br><br><br>
<?php

$dan_rata=10497+ strtotime($godina . "-" . $mesec . "-" . $dan)/86400;
$upit_s="SELECT * FROM eventu WHERE ko=$grad_id order by kadyy,kadmm,kadd";
$rezultat_s = mysqli_query($konekcija,$upit_s);
$ishod=2;
while(1) {
	$red_s=mysqli_fetch_assoc($rezultat_s);
	if(!isset($red_s)) {break;}
	$dan_akcije=10497+ strtotime($red_s['kadyy'] . "-" . $red_s['kadmm'] . "-" . $red_s['kadd'])/86400;
	if($dan_akcije>$dan_rata) {break;}
	$ishod=$red_s['sta'];
	$rrr++;
}
if ($ishod==1) {$izraz="slobodan";} else {$izraz="okupiran";}
$upit_g="SELECT * FROM `entia` WHERE id=" . $grad_id . ";";
$rezultat_g = mysqli_query($konekcija,$upit_g);
$red_g=mysqli_fetch_assoc($rezultat_g);
echo "datum: " . $dan . "." . $mesec . "." . $godina . "<br>\n";
echo "grad: " . $red_g['naziv'] . "<br>\n";
echo "status: " . $izraz . "<br>\n";
?>
<br><br><br><input type="submit" name="submit" value="Get" />
</td></tr></table>
</form>
</body>
</html>
