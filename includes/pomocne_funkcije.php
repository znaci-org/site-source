<?php

function je_li_aktivno($entitet_id, $dan, $mesec, $godina)
{
	$dan_rata = 10497 + strtotime($godina . "-" . $mesec . "-" . $dan) / 86400;
	$konekcija = mysqli_connect("", getenv('MYSQL_UN'), getenv('MYSQL_PW'), getenv('MYSQL_DB'));
	mysqli_set_charset($konekcija, 'utf8');

	$upit = "SELECT * FROM eventu WHERE ko=$entitet_id order by kadyy, kadmm, kadd;";
	$rezultat = mysqli_query($konekcija, $upit);
	$ishod = 2;
	while ($red = mysqli_fetch_assoc($rezultat)) {
		if (!isset($red)) {
			break;
		}
		$kko = $red['ko'];
		$dan_akcije = 10497 + strtotime($red['kadyy'] . "-" . $red['kadmm'] . "-" . $red['kadd']) / 86400;
		if ($dan_akcije > $dan_rata) {
			break;
		}
		$ishod = $red['sta'];
		if ($ishod > 2) {
			$ishod = $ishod - 2;
		}
	}
	return $ishod;
}

function string_divizije($dan, $mesec, $godina)
{
	$konekcija = mysqli_connect("", getenv('MYSQL_UN'), getenv('MYSQL_PW'), getenv('MYSQL_DB'));
	mysqli_set_charset($konekcija, 'utf8');

	$i = 0;
	$nazivi = array();
	// selektuje sve nemačke divizije u jugoslaviji
	$upit = "SELECT distinct(eventu.ko), entia.id as entia_id, entia.naziv as entia_naziv FROM entia INNER JOIN eventu ON entia.id=eventu.ko WHERE entia.prip=11;";
	$rezultat = mysqli_query($konekcija, $upit);
	while ($red = mysqli_fetch_assoc($rezultat)) {
		$nazivi[$i] = $red['entia_naziv'];
		$idovi[$i] = $red['entia_id'];
		$i++;
	}

	$strg = "";
	for ($i = 0; $i < count($nazivi); $i++) {
		$status = je_li_aktivno($idovi[$i], $dan, $mesec, $godina);
		if ($status == 1) {
			$stil = " class=bigTitle_c";
		} else {
			$stil = "";
		}
		$strg = $strg . "<span" . $stil . ">" . $nazivi[$i] . "</span> * ";
	}
	$strg = substr($strg, 0, strlen($strg) - 3);
	return $strg;
}
