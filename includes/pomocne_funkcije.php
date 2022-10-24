<?php

function je_li_aktivno($entitet_id, $dan, $mesec, $godina)
{
	$konekcija = mysqli_connect("", getenv('MYSQL_UN'), getenv('MYSQL_PW'), getenv('MYSQL_DB'));
	mysqli_set_charset($konekcija, 'utf8');
	
	$upit = "SELECT * FROM eventu WHERE ko=$entitet_id order by kadyy, kadmm, kadd;";
	$rezultat = mysqli_query($konekcija, $upit);
	
	$dan_rata = 10497 + strtotime($godina . "-" . $mesec . "-" . $dan) / 86400;
	$status = 2;
	while ($red = mysqli_fetch_assoc($rezultat)) {
		if (!isset($red)) {
			break;
		}
		$dan_akcije = 10497 + strtotime($red['kadyy'] . "-" . $red['kadmm'] . "-" . $red['kadd']) / 86400;
		if ($dan_akcije > $dan_rata) {
			break;
		}
		$status = $red['sta'];
		if ($status > 2) {
			$status = $status - 2;
		}
	}
	return $status == 1;
}

function string_divizije($dan, $mesec, $godina)
{
	$konekcija = mysqli_connect("", getenv('MYSQL_UN'), getenv('MYSQL_PW'), getenv('MYSQL_DB'));
	mysqli_set_charset($konekcija, 'utf8');

	$divizije = [];

	// selektuje nemačke divizije u jugoslaviji
	$upit = "SELECT distinct(eventu.ko) AS id, entia.naziv, entia.slug FROM entia 
	INNER JOIN eventu ON eventu.ko=entia.id 
	WHERE entia.prip=11";

	$rezultat = mysqli_query($konekcija, $upit);

	while ($red = mysqli_fetch_assoc($rezultat)) {
		$data[] = $red['id']; // 0
		$data[] = $red['naziv'];	// 1
		$data[] = $red['slug'];		// 2
		$data[] = je_li_aktivno($red['id'], $dan, $mesec, $godina); // 3
		$divizije[] = $data;
		unset($data);
	}

	$strg = "";
	for ($i = 0; $i < count($divizije); $i++) {
		$divizija = $divizije[$i];
		if ($divizija[3]) {
			$strg = $strg . "<a href=odrednica.php?slug=$divizija[2]>" . $divizija[1] . "</a> * ";
		}
	}
	return $strg;
}
