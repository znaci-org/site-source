<?php
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 
//$aa=slicni(1,1,$konekcija);
function slicni($kome,$vrsta_materijala,$konekcija) {
	$zapisi=array();
	//$kandidati=array();
	$rr=0;
	$upit_zapis="SELECT * FROM hr_int WHERE broj=" . $kome . " AND vrsta_materijala=" . $vrsta_materijala . ";";
	$rezultat_zapis = mysqli_query($konekcija,$upit_zapis);
	while ($red_zapis = mysqli_fetch_assoc($rezultat_zapis)) {
		$zapisi[$rr]= $red_zapis['zapis'];
		$upit_broj="SELECT * FROM hr_int WHERE zapis=" . $zapisi[$rr] . " AND vrsta_materijala=" . $vrsta_materijala . ";";
		$rezultat_broj = mysqli_query($konekcija,$upit_broj);
		$rrx=0;
		while ($red_broj = mysqli_fetch_assoc($rezultat_broj)) {
			//echo $red_broj['broj'] . "<br>";
			if($red_broj['broj']!=$kome) {
				$kandidati[$rr][$rrx]=$red_broj['broj'];
				echo $rr . ":" . $rrx . ":" . $kandidati[$rr][$rrx]. "<br>";
				$rrx++;
			}
		}
		$rr++;
	}
	echo $kandidati[11][2] . "<br>";
	for($ii=0;$ii<1000;$ii++) {
		if(!isset($kandidati[$ii][0])) {break;}
		for($jj=0;$jj<1000;$jj++) {
			if(!isset($kandidati[$ii][$jj])) {break;}
			echo $ii . ":" . $jj . ":" . $kandidati[$ii][$jj] . ",";
		}
		echo "<br>";
	}
	
	print_r($zapisi);
	return $rzlt;
}

$aa=srodnost(10,1,$konekcija);
function srodnost($ciji,$vrsta_materijala,$konekcija) {
	$niz_brojeva_veza=array();
	$niz_entia=array();
	$upit_dele_zapis="SELECT hr_int.broj as broj1,hr_int_1.broj as broj2,hr_int.zapis as zapis1 FROM `hr_int` INNER JOIN hr_int AS hr_int_1 ON hr_int.zapis = hr_int_1.zapis WHERE hr_int.vrsta_materijala=$vrsta_materijala AND hr_int_1.vrsta_materijala=$vrsta_materijala AND hr_int.broj = $ciji AND hr_int.broj <> hr_int_1.broj ORDER BY broj2;";
	$rezultat_dele_zapis = mysqli_query($konekcija,$upit_dele_zapis);
	$broj_veza=0;
	$indeks=0;
	$red_dele_zapis = mysqli_fetch_assoc($rezultat_dele_zapis);
	$prethodni=$red_dele_zapis['broj2'];
	while ($red_dele_zapis = mysqli_fetch_assoc($rezultat_dele_zapis)) {
		$novi=$red_dele_zapis['broj2'];
		
		if($novi==$prethodni) {
			$broj_veza++;
		}
		else {
			$indeks++;
			$niz_brojeva_veza[$indeks]=$broj_veza+1+($prethodni/10000);
			$niz_entia[$indeks]=$prethodni;
			$broj_veza=0;
			$prethodni=$novi;
		}
	}
	
	$niz_indeksa=array_keys($niz_brojeva_veza);
	sort($niz_brojeva_veza);
	$xx=0;
	for($ii=count($niz_brojeva_veza);$ii>-1;$ii--) {
		$novi_niz_brojeva_veza[$xx]=$niz_brojeva_veza[$ii];
		$xx++;
	}
	

	for($ii=0;$ii<count($novi_niz_brojeva_veza);$ii++) {
		$entia_id=intval($novi_niz_brojeva_veza[$ii]);
		$skim_num=intval(10000 * $novi_niz_brojeva_veza[$ii]-10000*$entia_id );
		$skim_upit="SELECT * FROM entia WHERE id=" . $skim_num . ";";
		$skim_rzlt = mysqli_query($konekcija,$skim_upit);
		$skim_red=mysqli_fetch_assoc($skim_rzlt);
		$skim=$skim_red['naziv'];
		echo $entia_id . ":" . $skim . "<br>";
	}
	return 0;
}
?>