<?php

require_once(dirname(__DIR__).'/model/Odrednica.php');
require_once(dirname(__DIR__).'/model/Dogadjaj.php');

$broj_pojma = $_GET['br'];
$odrednica = new Odrednica($broj_pojma);
$broj_dogadjaja = count($odrednica->dogadjaji);

$ucitaj_od = $_GET['ucitaj_od'];
$ucitaj_do = $_GET['ucitaj_do'];
if($ucitaj_do > $broj_dogadjaja) $ucitaj_do = $broj_dogadjaja;

$i = 0;
foreach($odrednica->dogadjaji as $id => $data){
	if ($i >= $ucitaj_od) Dogadjaj::rendaj($id, $data[0], $data[1]);
	if ($i >= $ucitaj_do - 1) break;
	$i++;
}

if ($ucitaj_do < $broj_dogadjaja) {
	echo '<p class="ucitavac"><img src="/images/ajax-loader.gif" alt="loading" /> Još materijala se učitava...</p>';
}