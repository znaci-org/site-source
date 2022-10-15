<?php
function slobodni_gradovi($dan,$mesec,$godina) {

$gradovi=array();
$akcije=array();
$rr=0;

$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

$upit_e="SELECT distinct(eventu.ko) FROM entia INNER JOIN eventu ON entia.id=eventu.ko;";
$rezultat_e = mysqli_query($konekcija,$upit_e);
$dan_rata=10497+ strtotime($godina . "-" . $mesec . "-" . $dan)/86400;

while($red_e=mysqli_fetch_assoc($rezultat_e)) {
	if(!isset($red_e)) {break;}
	$gradovi[$rr]=$red_e['ko'];
	

	//echo $gradovi[$rr] . $dan . $mesec . $godina . "<br>";

	if (je_li_slobodan($gradovi[$rr],$dan,$mesec,$godina)==1) {
		$slob_gradovi[$rr]=$gradovi[$rr];
/*		$upit_g="SELECT * FROM `entia` WHERE id=" . $kko . ";";
		$rezultat_g = mysqli_query($konekcija,$upit_g);
		$red_g=mysqli_fetch_assoc($rezultat_g);
		$ovaj_grad=$red_g['naziv'];
		$duzina=($red_g['e'] - 13) * 100 + 40;
		$sirina=(47 - $red_g['n']) * 100 + 180;
		echo "<div class=bigTitle_c style=" . chr(34) . "position: absolute; left:" . $duzina . "px; top:" . $sirina . "px;" . chr(34) . ">*" . $ovaj_grad . "</div>";
		*/
	}
	$rr++;
	
}
return $slob_gradovi;
}

function je_li_slobodan($grad,$dan,$mesec,$godina) {
$dan_rata=10497+ strtotime($godina . "-" . $mesec . "-" . $dan)/86400;
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

	$upit_sx="SELECT * FROM eventu WHERE ko=" . $grad . " order by kadyy,kadmm,kadd;";
	$rezultat_sx = mysqli_query($konekcija,$upit_sx);
	$ishod=2;
	while($red_sx=mysqli_fetch_assoc($rezultat_sx)) {
		if(!isset($red_sx)) {break;}
		$kko=$red_sx['ko'];
		$dan_akcije=10497+ strtotime($red_sx['kadyy'] . "-" . $red_sx['kadmm'] . "-" . $red_sx['kadd'])/86400;
		//echo $dan_rata . " * " . $dan_akcije . "<br>";
		if($dan_akcije>$dan_rata) {break;}
		$ishod=$red_sx['sta'];
		if ($ishod>2) {$ishod=$ishod-2;}
	}
	return $ishod;
}

function string_slobodni($dan,$mesec,$godina) {
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

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
	$ii++;
}
arsort($geo_rang);
$sorted_geo_rang=array_keys($geo_rang);

for($ii=0;$ii<count($sorted_geo_rang);$ii++) {
	$jj=$sorted_geo_rang[$ii];
	$status=je_li_slobodan($idovi[$jj],$dan,$mesec,$godina);
	if ($status==1) {$stil=" class=bigTitle_c";} else {$stil="";}
	$strg= $strg . "<b" . $stil . ">" . $nazivi[$jj] . "</b> * ";
}
$strg=substr($strg,0,strlen($strg)-3);
return $strg;

}


function string_divizije($dan,$mesec,$godina) {
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

$ii=0;
$nazivi=array();
$upit14="SELECT distinct(eventu.ko),entia.id as id1,entia.naziv as naziv1 FROM entia INNER JOIN eventu ON entia.id=eventu.ko WHERE entia.prip=11;";
$rezultat14 = mysqli_query($konekcija,$upit14);
while($red14 = mysqli_fetch_assoc($rezultat14)) {
	$nazivi[$ii]=$red14['naziv1'];
	$idovi[$ii]=$red14['id1'];
	$ii++;
}

for($ii=0;$ii<count($nazivi);$ii++) {
	$status=je_li_slobodan($idovi[$ii],$dan,$mesec,$godina);
	if ($status==1) {$stil=" class=bigTitle_c";} else {$stil="";}
	$strg= $strg . "<b" . $stil . ">" . $nazivi[$ii] . "</b> * ";
}
$strg=substr($strg,0,strlen($strg)-3);
return $strg;

}

?>