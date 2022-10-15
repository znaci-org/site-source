<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Biblioteka</title>
<style type="text/css">
<!--
@import url(/normal.css);
--></style>
<?php
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

if ($_GET['subjekt']) {
	$aa = $_GET['subjekt'];
} 

?>

</head>

<body>

<div class=BELITASTER>
<table width="60%" border=1>
<form method="GET" id="f1" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<tr>
<td style="background-color: #aaaaaa" width="50%">
	sa: <input type="text" name="subjekt" value="10">
</td>
<td style="background-color: #aaaaaa" width="50%">
	<input type="submit">
</td>
</tr>
</form>	
<tr>
<td valign=top colspan="2">
<?php
	$ko_upit="SELECT * FROM entia WHERE id=" . $aa . ";";
	$ko_rzlt = mysqli_query($konekcija,$ko_upit);
	$ko_red=mysqli_fetch_assoc($ko_rzlt);
	$ko=$ko_red['naziv'];
echo $ko . " - veze:<br><br>";
echo "broj preklapanja - subjekt preklapanja<br><br>";
srodnost($aa,1,$konekcija);
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
	

	for($ii=1;$ii<count($novi_niz_brojeva_veza);$ii++) {
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
</td>
</tr>


</table>
</body>
</html>