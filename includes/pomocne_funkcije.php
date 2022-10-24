<?php
require_once "includes/povezivanje.php";

function je_li_slobodan($entitet_id, $dan, $mesec, $godina)
{
	global $mysqli;

	$dan_rata = 10497 + strtotime($godina . "-" . $mesec . "-" . $dan) / 86400;
	$status = 2;	// podrazumevano nije slobodan

	$upit = "SELECT * FROM eventu WHERE ko=$entitet_id order by kadyy,kadmm,kadd";
	$rezultat = $mysqli->query($upit);
	while ($red = $rezultat->fetch_assoc()) {
		$dan_akcije = 10497 + strtotime($red['kadyy'] . "-" . $red['kadmm'] . "-" . $red['kadd']) / 86400;
		if ($dan_akcije > $dan_rata) break;
		$status = $red['sta'];
	}
	return $status == 1;
}

function je_li_aktivno($entitet_id, $dan, $mesec, $godina)
{
	global $mysqli;

	$upit = "SELECT * FROM eventu WHERE ko=$entitet_id order by kadyy, kadmm, kadd;";
	$rezultat = $mysqli->query($upit);

	$dan_rata = 10497 + strtotime($godina . "-" . $mesec . "-" . $dan) / 86400;
	$status = 2;
	while ($red = $rezultat->fetch_assoc()) {
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

function get_slobodni_gradovi($dan, $mesec, $godina)
{
	global $mysqli;

	$upit_gradovi = sprintf("SELECT * FROM entia WHERE vrsta=2;");
	$gradovi = [];

	if ($rezultat_gradovi = $mysqli->query($upit_gradovi)) {
		$data = [];
		while ($red = $rezultat_gradovi->fetch_assoc()) {
			$data[] = $red['id']; // 0
			$data[] = $red['naziv'];	// 1
			$data[] = $red['n'];		// 2
			$data[] = $red['e'];		// 3
			$data[] = $red['slug'];		// 4

			$data[] = je_li_aktivno($red['id'], $dan, $mesec, $godina);
			$gradovi[] = $data;
			unset($data);
		}
		$rezultat_gradovi->free();
	}
	return $gradovi;
}

function get_aktivne_divizije($dan, $mesec, $godina)
{
	global $mysqli;

	$divizije = [];

	$upit = "SELECT distinct(eventu.ko) AS id, entia.naziv, entia.slug FROM entia 
	INNER JOIN eventu ON eventu.ko=entia.id 
	WHERE entia.prip=11";

	$rezultat = $mysqli->query($upit);

	while ($red = $rezultat->fetch_assoc()) {
		if (je_li_aktivno($red['id'], $dan, $mesec, $godina)) {
			$data[] = $red['id']; // 0
			$data[] = $red['naziv'];	// 1
			$data[] = $red['slug'];		// 2
			$divizije[] = $data;
		}
	}
	return $divizije;
}

function string_divizije($dan, $mesec, $godina)
{

	$divizije = get_aktivne_divizije($dan, $mesec, $godina);
	$strg = "";
	for ($i = 0; $i < count($divizije); $i++) {
		$divizija = $divizije[$i];
		$strg = $strg . "<a href=odrednica.php?slug=$divizija[2]>" . $divizija[1] . "</a> * ";
	}
	return $strg;
}
