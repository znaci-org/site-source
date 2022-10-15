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
set_time_limit (7200);

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
/*
$clanovi_ime=array();
$clanovi_prezime=array();
$clanovi_clbroj=array();
$clanovi_email=array();
$clanovi_tel=array();
*/
$predstave=array();
$rr=0;
$rrr=0;
//$yuscii=('~','\}');//,'`','\{','|','q','w','x','^','\]','@','\[','\\','Q','W','X'$yuscii=(chr(126),chr(125));//,chr(96),chr(123),chr(124),chr(113),chr(119),chr(120),chr(94),chr(93),chr(64),chr(91),chr(92),chr(81),chr(87),chr(88)
//echo $yuscii[0];
//die;
//$yuscii=('~','\}','`','\{','|','q','w','x','^','\]','@','\[','\\','Q','W','X');
//$dijakr=('č','ć','ž','š','đ','lj','nj','dž','Č','Ć','Ž','Š','Đ','Lj','Nj','Dž');
//echo 10497+ strtotime('1945-5-15')/86400;

$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 
if (mysqli_connect_errno()) {
	echo "Ne radi veza sa bazom: rr " . mysqli_connect_errno();
	exit();
} 
$upit_c="SELECT * FROM clanovi;";
$upit_p="SELECT * FROM predstave;";
$rezultat_c = mysqli_query($konekcija,$upit_c);
$rezultat_p = mysqli_query($konekcija,$upit_p);

while(1) {
	$imee="";
	$prezimee="";
	$red_c=mysqli_fetch_assoc($rezultat_c);
	if(!isset($red_c)) {break;}
	$clanovi_id=$red_c['id'];
	$clanovi_ime=$red_c['ime'];
	//$clanovi_ime=str_replace($yuscii,$dijakr,$clanovi_ime);
	$clanovi_prezime=$red_c['prezime'];
	for($ii=0;$ii<strlen($clanovi_ime);$ii++) {
		switch (ord(substr($clanovi_ime,$ii,1))) {
			case 126:
				$imee=$imee . 'č';
				break;
			case 125:
				$imee=$imee . 'ć';
				break;
			case 96:
				$imee=$imee . 'ž';
				break;
			case 123:
				$imee=$imee . 'š';
				break;
			case 124:
				$imee=$imee . 'đ';
				break;
			case 113:
				$imee=$imee . 'lj';
				break;
			case 119:
				$imee=$imee . 'nj';
				break;
			case 120:
				$imee=$imee . 'dž';
				break;
			case 94:
				$imee=$imee . 'Č';
				break;
			case 93:
				$imee=$imee . 'Ć';
				break;
			case 64:
				$imee=$imee . 'Ž';
				break;
			case 91:
				$imee=$imee . 'Š';
				break;
			case 92:
				$imee=$imee . 'Đ';
				break;
			case 81:
				$imee=$imee . 'Lj';
				break;
			case 87:
				$imee=$imee . 'Nj';
				break;
			case 88:
				$imee=$imee . 'Dž';
				break;
		
			default:
				$imee=$imee . substr($clanovi_ime,$ii,1);
				break;
		}
	}
	
	for($ii=0;$ii<strlen($clanovi_prezime);$ii++) {
		switch (ord(substr($clanovi_prezime,$ii,1))) {
			case 126:
				$prezimee=$prezimee . 'č';
				break;
			case 125:
				$prezimee=$prezimee . 'ć';
				break;
			case 96:
				$prezimee=$prezimee . 'ž';
				break;
			case 123:
				$prezimee=$prezimee . 'š';
				break;
			case 124:
				$prezimee=$prezimee . 'đ';
				break;
			case 113:
				$prezimee=$prezimee . 'lj';
				break;
			case 119:
				$prezimee=$prezimee . 'nj';
				break;
			case 120:
				$prezimee=$prezimee . 'dž';
				break;
			case 94:
				$prezimee=$prezimee . 'Č';
				break;
			case 93:
				$prezimee=$prezimee . 'Ć';
				break;
			case 64:
				$prezimee=$prezimee . 'Ž';
				break;
			case 91:
				$prezimee=$prezimee . 'Š';
				break;
			case 92:
				$prezimee=$prezimee . 'Đ';
				break;
			case 81:
				$prezimee=$prezimee . 'Lj';
				break;
			case 87:
				$prezimee=$prezimee . 'Nj';
				break;
			case 88:
				$prezimee=$prezimee . 'Dž';
				break;
		
			default:
				$prezimee=$prezimee . substr($clanovi_prezime,$ii,1);
				break;
		}
	}

	echo $imee . "," . $prezimee . "," . $clanovi_id . "<br>";

	$upit_imex="UPDATE clanovi SET clanovi.imee=" . chr(34) . $imee . chr(34) . " WHERE id=" . $clanovi_id . ";";
	$upit_prezimex="UPDATE clanovi SET clanovi.prezimee=" . chr(34) . $prezimee . chr(34) . " WHERE id=" . $clanovi_id . ";";

	$rezultat_imex = mysqli_query($konekcija,$upit_imex);
	$rezultat_prezimex = mysqli_query($konekcija,$upit_prezimex);

	
	/*	for($ii=0;$ii<strlen($clanovi_prezime);$ii++) {
		echo ord(substr($clanovi_prezime,$ii,1)) . "<br>";
	}
	*/
	//$clanovi_prezime=str_replace($yuscii,$dijakr,$clanovi_prezime);
	$clanovi_clbroj=$red_c['clbroj'];
	$clanovi_email=$red_c['email'];
	$clanovi_tel=$red_c['tel'];
	//echo $clanovi_ime . "," . $clanovi_prezime . "," . $clanovi_clbroj . "," . $clanovi_email . "," . $clanovi_tel . "<br>";
	$rr++;
}
echo $clanovi_ime . "," . $clanovi_prezime . "," . $clanovi_clbroj . "," . $clanovi_email . "," . $clanovi_tel . "<br>";
for($ii=0;$ii<strlen($clanovi_prezime);$ii++) {
	echo ord(substr($clanovi_prezime,$ii,1)) . "<br>";
}
die;
for($ii=0;$ii<$rr;$ii++) {
	//$upit_g="SELECT * FROM `entia` WHERE id=" . $gradovi[$ii] . ";";
	//$rezultat_g = mysqli_query($konekcija,$upit_g);
	//$red_g=mysqli_fetch_assoc($rezultat_g);
	//echo "<input type=" . chr(34) . "radio" . chr(34) . " name=" . chr(34) . "grad" . chr(34) . " value=" . chr(34) . $gradovi[$ii] . chr(34) . ">" . $red_g['naziv'] . "<br>\n";
	//if($ii==((int)($rr/3)) or $ii==((int)(2 * $rr/3))) {echo "</td><td>\n";}
	echo $clanovi_ime . "," . $clanovi_prezime . "," . $clanovi_clbroj . "," . $clanovi_email . "," . $clanovi_tel . "<br>";
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
