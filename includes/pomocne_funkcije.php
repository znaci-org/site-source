<?php

function je_li_aktivno($entitet_id, $dan, $mesec, $godina)
{
	$dan_rata = 10497 + strtotime($godina . "-" . $mesec . "-" . $dan) / 86400;
	$konekcija = mysqli_connect("", getenv('MYSQL_UN'), getenv('MYSQL_PW'), getenv('MYSQL_DB'));
	mysqli_set_charset($konekcija, 'utf8');

	$upit = "SELECT * FROM eventu WHERE ko=$entitet_id order by kadyy, kadmm, kadd;";
	$rezultat = mysqli_query($konekcija, $upit);

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

	$i = 0;
	$nazivi = array();
	$brojevi = array();
	$slugovi = array();

	// selektuje nemačke divizije u jugoslaviji
	$upit = "SELECT distinct(eventu.ko) AS id, entia.naziv, entia.slug FROM entia 
	INNER JOIN eventu ON eventu.ko=entia.id 
	WHERE entia.prip=11";

	$rezultat = mysqli_query($konekcija, $upit);

	while ($red = mysqli_fetch_assoc($rezultat)) {
		$nazivi[$i] = $red['naziv'];
		$brojevi[$i] = $red['id'];
		$slugovi[$i] = $red['slug'];
		$i++;
	}

	$strg = "";
	for ($i = 0; $i < count($brojevi); $i++) {
		if (je_li_aktivno($brojevi[$i], $dan, $mesec, $godina)) {
			$strg = $strg . "<a href=odrednica.php?slug=$slugovi[$i]>" . $nazivi[$i] . "</a> * ";
		}
	}
	return $strg;
}
