<?php

require_once("../includes/povezivanje.php");
$broj_oznake = $_POST['broj_oznake'];
$svi_tagovi = json_decode(stripslashes($_POST['tagovi']));

$ukupno_pojmova = count($svi_tagovi);

if ($ukupno_pojmova > 0) {

	// broji koliko se koji element pojavljuje i vraća asocijativni niz
	$svi_tagovi = array_count_values($svi_tagovi);
	unset($svi_tagovi[$broj_oznake]);	// izbacuje ovaj tag

	// kopira u privremenu varijablu i redja da bi našao najveće
	$poredjani_tagovi = $svi_tagovi;
	arsort($poredjani_tagovi);
	// uzima prvi element koji ima najveću vrednost
	$najvise_ponavljanja = array_values($poredjani_tagovi)[0];
	unset($poredjani_tagovi);	// briše privremeni niz

	// meša niz
	$kljucevi = array_keys($svi_tagovi);
	shuffle($kljucevi);
	foreach($kljucevi as $kljuc) {
		$novi_niz[$kljuc] = $svi_tagovi[$kljuc];
	}
	$svi_tagovi = $novi_niz;

	// ispisuje tagove
	foreach ($svi_tagovi  as $tag => $ucestalost) {

		$id_pojma = $tag;
		$ponavljanje_pojma = $ucestalost;
		$rezultat_za_naziv = $mysqli->query("SELECT naziv FROM entia WHERE id=$id_pojma ");
		$naziv_pojma = $rezultat_za_naziv->fetch_assoc()["naziv"];

		if($ponavljanje_pojma > 6 && $ponavljanje_pojma > $najvise_ponavljanja * 0.5) {
			$klasa = 'najveci_tag';
		} else if ($ponavljanje_pojma > 5 && $ponavljanje_pojma > $najvise_ponavljanja * 0.25) {
			$klasa = 'veliki_tag';
		} else if ($ponavljanje_pojma > 4) {
			$klasa = 'srednji_tag';
		} else if ($ponavljanje_pojma > 2) {
			$klasa = 'manji_srednji_tag';
		} else if ($ponavljanje_pojma > 1) {
			$klasa = 'mali_tag';
		} else {
			$klasa = 'najmanji_tag';
		}	// kraj razvrstava po veličini

		echo "<a href='odrednica.php?br=$id_pojma' class='$klasa'>$naziv_pojma </a><span class='najmanji_tag'> &#9733; </span>";
	}


} else {
	echo "<p>Nema povezanih pojmova.</p>";
}

?>
