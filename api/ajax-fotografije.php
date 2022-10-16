<?php

require_once(dirname(__DIR__).'/model/Odrednica.php');
require_once(dirname(__DIR__).'/model/Fotografija.php');

$broj_pojma = $_GET['br'];
$odrednica = new Odrednica($broj_pojma);
$broj_fotografija = count($odrednica->fotografije);

$ucitaj_od = $_GET['ucitaj_od'];
$ucitaj_do = $_GET['ucitaj_do'];
if ($ucitaj_do > $broj_fotografija) $ucitaj_do = $broj_fotografija;

$i = 0;
foreach($odrednica->fotografije as $inv){
	if ($i >= $ucitaj_od) Fotografija::rendaj($inv);
	if ($i >= $ucitaj_do - 1) break;
	$i++;
}

if ($ucitaj_do < $broj_fotografija) {
	echo '<p class="ucitavac"><img src="/images/ajax-loader.gif" alt="loading" /> Još fotografija se učitava...</p>';
}