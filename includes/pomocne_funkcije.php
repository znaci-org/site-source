<?php

function je_li_slobodan($grad, $dan, $mesec, $godina)
{
	$dan_rata = 10497 + strtotime($godina . "-" . $mesec . "-" . $dan) / 86400;
	$konekcija = mysqli_connect("", getenv('MYSQL_UN'), getenv('MYSQL_PW'), getenv('MYSQL_DB'));
	mysqli_set_charset($konekcija, 'utf8');

	$upit_sx = "SELECT * FROM eventu WHERE ko=" . $grad . " order by kadyy,kadmm,kadd;";
	$rezultat_sx = mysqli_query($konekcija, $upit_sx);
	$ishod = 2;
	while ($red_sx = mysqli_fetch_assoc($rezultat_sx)) {
		if (!isset($red_sx)) {
			break;
		}
		$kko = $red_sx['ko'];
		$dan_akcije = 10497 + strtotime($red_sx['kadyy'] . "-" . $red_sx['kadmm'] . "-" . $red_sx['kadd']) / 86400;
		if ($dan_akcije > $dan_rata) {
			break;
		}
		$ishod = $red_sx['sta'];
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

	$ii = 0;
	$nazivi = array();
	$upit14 = "SELECT distinct(eventu.ko),entia.id as id1,entia.naziv as naziv1 FROM entia INNER JOIN eventu ON entia.id=eventu.ko WHERE entia.prip=11;";
	$rezultat14 = mysqli_query($konekcija, $upit14);
	while ($red14 = mysqli_fetch_assoc($rezultat14)) {
		$nazivi[$ii] = $red14['naziv1'];
		$idovi[$ii] = $red14['id1'];
		$ii++;
	}

	for ($ii = 0; $ii < count($nazivi); $ii++) {
		$status = je_li_slobodan($idovi[$ii], $dan, $mesec, $godina);
		if ($status == 1) {
			$stil = " class=bigTitle_c";
		} else {
			$stil = "";
		}
		$strg = $strg . "<span" . $stil . ">" . $nazivi[$ii] . "</span> * ";
	}
	$strg = substr($strg, 0, strlen($strg) - 3);
	return $strg;
}
