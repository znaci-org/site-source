<?php
require_once "includes/povezivanje.php";

/* jel grad slobodan ili divizija prisutna */
function je_li_aktivno($entitet_id, $dan, $mesec, $godina)
{
	global $mysqli;

	$upit = "SELECT * FROM eventu WHERE ko=$entitet_id order by kadyy, kadmm, kadd;";
	$rezultat = $mysqli->query($upit);

	$dan_rata = 10497 + strtotime($godina . "-" . $mesec . "-" . $dan) / 86400;
	$status = 2; // default state

	while ($red = $rezultat->fetch_assoc()) {
		$dan_akcije = 10497 + strtotime($red['kadyy'] . "-" . $red['kadmm'] . "-" . $red['kadd']) / 86400;
		if ($dan_akcije > $dan_rata) break;

		$status = $red['sta'] > 2 ? $red['sta'] - 2 : $red['sta'];
	}
	return $status == 1;
}

function get_slobodni_gradovi($dan, $mesec, $godina)
{
	global $mysqli;
	$niz = [];

	$upit = "SELECT * FROM entia WHERE vrsta=2;";
	$rezultat = $mysqli->query($upit);

	while ($red = $rezultat->fetch_assoc()) {
		if (!je_li_aktivno($red['id'], $dan, $mesec, $godina)) continue;

		$data = array(
			"naziv" => $red['naziv'],
			"lat" => $red['n'],
			"lon" => $red['e'],
			"slug" => $red['slug'],
		);
		array_push($niz, $data);
	}
	return $niz;
}

function get_prisutne_divizije($dan, $mesec, $godina)
{
	global $mysqli;
	$niz = [];

	$upit = "SELECT distinct(eventu.ko) AS id, entia.naziv, entia.slug FROM entia 
	INNER JOIN eventu ON eventu.ko=entia.id 
	WHERE entia.prip=11";
	$rezultat = $mysqli->query($upit);

	while ($red = $rezultat->fetch_assoc()) {
		if (!je_li_aktivno($red['id'], $dan, $mesec, $godina)) continue;

		$data = array(
			"naziv" => $red['naziv'],
			"slug" => $red['slug'],
		);
		array_push($niz, $data);
	}
	return $niz;
}

// TODO: poruka ako nema divizija, http://localhost:8000/na-danasnji-dan.php?dan=24&mesec=4&godina=1941
function render_divizije($dan, $mesec, $godina)
{

	$niz = get_prisutne_divizije($dan, $mesec, $godina);
	$strg = "";
	foreach ($niz as $divizija) {
		$slug = $divizija['slug'];
		$naziv = $divizija['naziv'];
		$strg = $strg . "<a href=odrednica.php?slug=$slug>" . $naziv . "</a> <b>✠</b> ";
	}
	echo $strg;
}
