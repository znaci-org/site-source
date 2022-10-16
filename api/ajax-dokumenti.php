<?php

require_once("../model/Odrednica.php");
require_once("../model/Dokument.php");

$broj_pojma = $_GET['br'];
$odrednica = new Odrednica($broj_pojma);
$broj_dokumenata = count($odrednica->dokumenti);

$ucitaj_od = $_GET['ucitaj_od'];
$ucitaj_do = $_GET['ucitaj_do'];
if($ucitaj_do > $broj_dokumenata) $ucitaj_do = $broj_dokumenata;

$i = 0;
foreach($odrednica->dokumenti as $id => $opis){
	if ($i >= $ucitaj_od) Dokument::rendaj($id, $opis);
	if ($i >= $ucitaj_do - 1) break;
	$i++;
}

if($ucitaj_do < $broj_dokumenata) {
	echo '<p class="ucitavac"><img src="images/ajax-loader.gif" alt="loading" /> Još materijala se učitava...</p>';
}