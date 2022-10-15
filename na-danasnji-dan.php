<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Na današnji dan - Biblioteka Znaci</title>
	<link href="normal.css" rel="stylesheet" type="text/css">
	<style>
		.naslov-hronologija {
			background: white;
			margin: 0;
			padding-top: 8px;
			padding-bottom: 8px;
		}
	</style>
	<?php
	include "includes/pomocne_funkcije.php";

	$iiix = 0;
	if ($_POST['grad']) {
		$grad_str = $_POST['grad'];
		if ($_POST['grad'] == 'Draža Mihailović') {
			$grad = 625;
		}
		$iyiy = 7;
	}
	if ($_POST['dan']) {
		$ddd = $_POST['dan'];
		$iiix = 7;
	} else {
		$ddd = date("d");
	}
	if ($_POST['mesec']) {
		$mmm = $_POST['mesec'];
		$iiiy = 7;
	} else {
		$mmm = date("m");
	}

	$ixix = 0;
	if ($_POST['brigada']) {
		$brigada = substr($_POST['brigada'], 5);
		$ixix = 7;
	}

	$konekcija = mysqli_connect("", getenv('MYSQL_UN'), getenv('MYSQL_PW'), getenv('MYSQL_DB'));
	mysqli_set_charset($konekcija, 'utf8');

	$upit17 = "UPDATE klikovi set b4=(b4+1);";
	$rezultat17 = mysqli_query($konekcija, $upit17);

	$divizije = array();
	$gradovi = array();
	$divizije[1941] = "<font color=#b00000><b>704. pešad.</b></font> * <font color=#b00000><b>714. pešad.</b></font> * <font color=#b00000><b>717. pešad.</b></font> * <font color=#b00000><b>718. pešad.</b></font> * 42. lovačka * 100. lovačka * 104. lovačka * 114. lovačka * 117. lovačka * 118. lovačka * 1. brdska * 98. brdska * Brandenburg * 1. SS oklopna LSSAH * 4. SS policijska oklopna grenadirska * 7. SS * 11. SS oklopna grenadirska Nordland * 13. SS Handžar * 14. SS Galizia * 21. SS * 1. kozačka konjička * 2. kozačka konjička * <font color=#b00000><b>113. pešad.</b></font> * 22. pešad. * 41. tvrđavska * 44. pešad. Hoch und Deutschmeister * 71. pešad. * 181. pešad. * 188. brdska * 162. pešad. (Turkmenska) * 173. rezervna * 187. rezervna * 237. rezervna * 264. pešad. * 277. pešad. * 297. pešad. * <font color=#b00000><b>342. pešad.</b></font> * 367. pešad. * 371. pešad. * 369. legionarska Teufel * 373. legionarska Tiger * 392. legionarska Blaue * Stefan * Böttcher";
	$divizije[1942] = "<font color=#b00000><b>704. pešad.</b></font> * <font color=#b00000><b>714. pešad.</b></font> * <font color=#b00000><b>717. pešad.</b></font> * <font color=#b00000><b>718. pešad.</b></font> * 42. lovačka * 100. lovačka * 104. lovačka * 114. lovačka * 117. lovačka * 118. lovačka * 1. brdska * 98. brdska * Brandenburg * 1. SS oklopna LSSAH * 4. SS policijska oklopna grenadirska * <font color=#b00000><b>7. SS</b></font> * 11. SS oklopna grenadirska Nordland * 13. SS Handžar * 14. SS Galizia * 21. SS * 1. kozačka konjička * 2. kozačka konjička * 113. pešad. * 22. pešad. * 41. tvrđavska * 44. pešad. Hoch und Deutschmeister * 71. pešad. * 181. pešad. * 188. brdska * 162. pešad. (Turkmenska) * 173. rezervna * 187. rezervna * 237. rezervna * 264. pešad. * 277. pešad. * 297. pešad. * 342. pešad. * 367. pešad. * 371. pešad. * 369. legionarska Teufel * 373. legionarska Tiger * 392. legionarska Blaue * Stefan * Böttcher ";
	$divizije[1943] = "704. pešad. * 714. pešad. * 717. pešad. * 718. pešad. * 42. lovačka * 100. lovačka * 104. lovačka * <font color=#b00000><b>114. lovačka</b></font> * 117. lovačka * <font color=#b00000><b>118. lovačka</b></font> * <font color=#b00000><b>1. brdska</b></font> * 98. brdska * <font color=#b00000><b>Divizija Brandenburg</b></font> * 1. SS oklopna LSSAH * 4. SS policijska oklopna grenadirska * <font color=#b00000><b>7. SS</b></font> * 11. SS oklopna grenadirska Nordland * 13. SS Handžar * 14. SS Galizia * 21. SS * <font color=#b00000><b>1. kozačka konjička</b></font> * 2. kozačka konjička * 113. pešad. * 22. pešad. * 41. tvrđavska * <font color=#b00000><b>44. pešad. Hoch und Deutschmeister</b></font> * <font color=#b00000><b>71. pešad.</b></font> * <font color=#b00000><b>181. pešad.</b></font> * 188. brdska * <font color=#b00000><b>162. pešad. (Turkmenska)</b></font> * <font color=#b00000><b>173. rezervna</b></font> * <font color=#b00000><b>187. rezervna</b></font> * 237. rezervna * <font color=#b00000><b>264. pešad.</b></font> * <font color=#b00000><b>277. pešad.</b></font> * 297. pešad. * 342. pešad. * <font color=#b00000><b>367. pešad.</b></font> * <font color=#b00000><b>371. pešad.</b></font> * <font color=#b00000><b>369. legionarska Teufel</b></font> * <font color=#b00000><b>373. legionarska Tiger</b></font> * 392. legionarska Blaue * Stefan * Böttcher * ";
	$divizije[1944] = "704. pešad. * 714. pešad. * 717. pešad. * 718. pešad. * 42. lovačka * 100. lovačka * <font color=#b00000><b>104. lovačka</b></font> * 114. lovačka * <font color=#b00000><b>117. lovačka</b></font> * <font color=#b00000><b>118. lovačka</b></font> * <font color=#b00000><b>1. brdska</b></font> * 98. brdska * Divizija Brandenburg * 1. SS oklopna LSSAH * 4. SS policijska oklopna grenadirska * <font color=#b00000><b>7. SS</b></font> * 11. SS oklopna grenadirska Nordland * 13. SS Handžar * <font color=#b00000><b>14. SS Galizia</b></font> * <font color=#b00000><b>21. SS</b></font> * <font color=#b00000><b>1. kozačka konjička</b></font> * <font color=#b00000><b>2. kozačka konjička</b></font> * 113. pešad. * <font color=#b00000><b>22. pešad.</b></font> * <font color=#b00000><b>41. tvrđavska</b></font> * 44. pešad. Hoch und Deutschmeister * 71. pešad. * <font color=#b00000><b>181. pešad.</b></font> * <font color=#b00000><b>188. brdska</b></font> * 162. pešad. (Turkmenska) * 173. rezervna * 187. rezervna * <font color=#b00000><b>237. rezervna</b></font> * 264. pešad. * 277. pešad. * <font color=#b00000><b>297. pešad.</b></font> * 342. pešad. * 367. pešad. * 371. pešad. * <font color=#b00000><b>369. legionarska Teufel</b></font> * <font color=#b00000><b>373. legionarska Tiger</b></font> * <font color=#b00000><b>392. legionarska Blaue</b></font> * <font color=#b00000><b>Stefan</b></font> * Böttcher";
	$gradovi[1941] = "Poreč * Rovinj * Pazin * Metlika * Novo Mesto * Koprivnica * Ludbreg * Virovitica * Pakrac * Daruvar * Slavonska Požega * Senj * Karlobag * Otočac * Udbina * Korenica * Donji Lapac * Vojnić * Vrginmost * Glina * Slunj * Bihać * Prijedor * Sanski Most * Drvar * Bos.Petrovac * Bos.Grahovo * Ključ * Prnjavor * Kotor Varoš * Jajce * Glamoč * Bugojno * Livno * Kupres * Zadar * Šibenik * Split * Brač * Hvar * Orebić * Korčula * Vela Luka * Dubrovnik * Modriča * Gračanica * Bosanski Šamac * Tuzla * Bijeljina * Zvornik * Kladanj * Olovo * <font color=#d00000><b>Vlasenica</b></font> * Rogatica * Višegrad * Foča * Gacko * Priboj * Prijepolje * Nikšić * <font color=#d00000><b>Žabljak</b></font> * Bijelo Polje * Mojkovac * Kolašin * Berane * Cetinje * Podgorica * Herceg Novi * Risan * Subotica * NoviSad * Beograd * Valjevo * Užice * Čačak * Kraljevo * Niš * Vranje * Debar * Kičevo * Ohrid * Skoplje";
	$gradovi[1942] = "Poreč * Rovinj * Pazin * Metlika * Novo Mesto * Koprivnica * Ludbreg * Virovitica * Pakrac * Daruvar * Slavonska Požega * Senj * Karlobag * Otočac * Udbina * Korenica * Donji Lapac * <font color=#d00000><b>Vojnić</b></font> * <font color=#d00000><b>Vrginmost</b></font> * Glina * <font color=#d00000><b>Slunj</b></font> * <font color=#d00000><b>Bihać</b></font> * Prijedor * Sanski Most * <font color=#d00000><b>Drvar</b></font> * <font color=#d00000><b>Bos.Petrovac</b></font> * <font color=#d00000><b>Bos.Grahovo</b></font> * Ključ * <font color=#d00000><b>Prnjavor</b></font> * <font color=#d00000><b>Kotor Varoš</b></font> * Jajce * <font color=#d00000><b>Glamoč</b></font> * Bugojno * Livno * Kupres * Zadar * Šibenik * Split * Brač * Hvar * Orebić * Korčula * Vela Luka * Dubrovnik * Modriča * Gračanica * Bosanski Šamac * Tuzla * Bijeljina * Zvornik * Kladanj * Olovo * Vlasenica * Rogatica * Višegrad * Foča * Gacko * Priboj * Prijepolje * Nikšić * Žabljak * Bijelo Polje * Mojkovac * Kolašin * Berane * Cetinje * Podgorica * Herceg Novi * Risan * Subotica * NoviSad * Beograd * Valjevo * Užice * Čačak * Kraljevo * Niš * Vranje * Debar * Kičevo * Ohrid * Skoplje";
	$gradovi[1943] = "Poreč * Rovinj * Pazin * Metlika * Novo Mesto * <font color=#d00000><b>Koprivnica</b></font> * <font color=#d00000><b>Ludbreg</b></font> * Virovitica * Pakrac * Daruvar * Slavonska Požega * <font color=#d00000><b>Senj</b></font> * <font color=#d00000><b>Karlobag</b></font> * <font color=#d00000><b>Otočac</b></font> * <font color=#d00000><b>Udbina</b></font> * <font color=#d00000><b>Korenica</b></font> * <font color=#d00000><b>Donji Lapac</b></font> * <font color=#d00000><b>Vojnić</b></font> * <font color=#d00000><b>Vrginmost</b></font> * Glina * Slunj * Bihać * Prijedor * <font color=#d00000><b>Sanski Most</b></font> * <font color=#d00000><b>Drvar</b></font> * <font color=#d00000><b>Bos.Petrovac</b></font> * Bos.Grahovo * <font color=#d00000><b>Ključ</b></font> * <font color=#d00000><b>Prnjavor</b></font> * <font color=#d00000><b>Kotor Varoš</b></font> * <font color=#d00000><b>Jajce</b></font> * <font color=#d00000><b>Glamoč</b></font> * <font color=#d00000><b>Bugojno</b></font> * Livno * <font color=#d00000><b>Kupres</b></font> * Zadar * Šibenik * Split * <font color=#d00000><b>Brač</b></font> * <font color=#d00000><b>Hvar</b></font> * <font color=#d00000><b>Korčula</b></font> * <font color=#d00000><b>Vela Luka</b></font> * Dubrovnik * Vlasenica * Rogatica * <font color=#d00000><b>Višegrad</b></font> * <font color=#d00000><b>Foča</b></font> * Gacko * Priboj * Prijepolje * Nikšić * <font color=#d00000><b>Žabljak</b></font> * <font color=#d00000><b>Bijelo Polje</b></font> * <font color=#d00000><b>Mojkovac</b></font> * <font color=#d00000><b>Kolašin</b></font> * <font color=#d00000><b>Berane</b></font> * Cetinje * Podgorica * Herceg Novi * Risan * Subotica * NoviSad * Beograd * Valjevo * Užice * Čačak * Kraljevo * Niš * Vranje * Debar * Kičevo * Ohrid * Skoplje";
	$gradovi[1944] = "Poreč * Rovinj * Pazin * Metlika * Novo Mesto * Koprivnica * <font color=#d00000><b>Ludbreg</b></font> * <font color=#d00000><b>Virovitica</b></font> * <font color=#d00000><b>Pakrac</b></font> * <font color=#d00000><b>Daruvar</b></font> * <font color=#d00000><b>Slavonska Požega</b></font> * Senj * Karlobag * Otočac * <font color=#d00000><b>Udbina</b></font> * <font color=#d00000><b>Korenica</b></font> * Donji Lapac * <font color=#d00000><b>Vojnić</b></font> * <font color=#d00000><b>Vrginmost</b></font> * <font color=#d00000><b>Glina</b></font> * <font color=#d00000><b>Slunj</b></font> * Bihać * <font color=#d00000><b>Prijedor</b></font> * <font color=#d00000><b>Sanski Most</b></font> * <font color=#d00000><b>Drvar</b></font> * <font color=#d00000><b>Bos.Petrovac</b></font> * <font color=#d00000><b>Bos.Grahovo</b></font> * <font color=#d00000><b>Ključ</b></font> * <font color=#d00000><b>Prnjavor</b></font> * <font color=#d00000><b>Kotor Varoš</b></font> * <font color=#d00000><b>Jajce</b></font> * <font color=#d00000><b>Glamoč</b></font> * <font color=#d00000><b>Bugojno</b></font> * <font color=#d00000><b>Livno</b></font> * <font color=#d00000><b>Kupres</b></font> * <font color=#d00000><b>Zadar</b></font> * <font color=#d00000><b>Šibenik</b></font> * <font color=#d00000><b>Split</b></font> * <font color=#d00000><b>Brač</b></font> * <font color=#d00000><b>Hvar</b></font> * <font color=#d00000><b>Orebić</b></font> * <font color=#d00000><b>Korčula</b></font> * <font color=#d00000><b>Vela Luka</b></font> * <font color=#d00000><b>Dubrovnik</b></font> * Modriča * <font color=#d00000><b>Gračanica</b></font> * Bosanski Šamac * <font color=#d00000><b>Tuzla</b></font> * Bijeljina * Zvornik * <font color=#d00000><b>Kladanj</b></font> * <font color=#d00000><b>Olovo</b></font> * <font color=#d00000><b>Vlasenica</b></font> * Rogatica * Višegrad * Foča * <font color=#d00000><b>Gacko</b></font> * Priboj * Prijepolje * <font color=#d00000><b>Nikšić</b></font> * <font color=#d00000><b>Žabljak</b></font> * Bijelo Polje * Mojkovac * <font color=#d00000><b>Kolašin</b></font> * <font color=#d00000><b>Berane</b></font> * <font color=#d00000><b>Cetinje</b></font> * Podgorica * <font color=#d00000><b>Herceg Novi</b></font> * Risan * <font color=#d00000><b>Subotica</b></font> * <font color=#d00000><b>NoviSad</b></font> * <font color=#d00000><b>Beograd</b></font> * <font color=#d00000><b>Valjevo</b></font> * Užice * <font color=#d00000><b>Čačak</b></font> * <font color=#d00000><b>Kraljevo</b></font> * <font color=#d00000><b>Niš</b></font> * <font color=#d00000><b>Vranje</b></font> * <font color=#d00000><b>Debar</b></font> * <font color=#d00000><b>Kičevo</b></font> * <font color=#d00000><b>Ohrid</b></font> * <font color=#d00000><b>Skoplje</b></font>";
	?>
</head>

<body>

	<?php include "includes/header.php"; ?>
	<h2>Hronologija NOR-a: na današnji dan</h2>

	<table width="50%" border=1>
		<form method="POST" id="f1" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
			<TR>
				<TD>dan: <input type="text" value="<?php echo $ddd; ?>" name="dan">
				</TD>
				<TD>mesec: <input type="text" value="<?php echo $mmm; ?>" name="mesec">
				</TD>
				<TD><input type="submit" value="pronadji">
				</TD>
			</TR>
		</form>
	</table>

	<table width="100%" border=1 style="background-color: #dadada">
		<tr>
			<td rowspan=3 valign="top">
				<table width="20%" border="1" style="float:right">
					<form method="POST" id="f2" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
						<tr>
							<td>
								<b>hronološki podaci za:</b><br>
								<button type="submit" name="brigada" value="code 625">Draža Mihailović</button>
								<button type="submit" name="brigada" value="code 503">grad Zagreb</button>
								<button type="submit" name="brigada" value="code 504">grad Split</button>
								<button type="submit" name="brigada" value="code 705">grad Trst</button>
								<button type="submit" name="brigada" value="unit 658">Divizija Brandenburg</button>
								<button type="submit" name="brigada" value="unit 686">373. legionarska divizija</button>
								<button type="submit" name="brigada" value="unit 829">2. diverzantski bataljon NOVH</button>
								<button type="submit" name="brigada" value="unit 830">3. diverzantski bataljon NOVH</button>
								<button type="submit" name="brigada" value="unit 831">Diverzantski bataljon GŠ za Vojvodinu</button>
								<button type="submit" name="brigada" value="unit 287">15. slovenačka divizija</button>
								<button type="submit" name="brigada" value="unit 8">1. slovenačka udarna brigada Tone Tomšič</button>
								<button type="submit" name="brigada" value="unit 153">13. slovenačka udarna brigada Mirko Bračič</button>
								<button type="submit" name="brigada" value="unit 156">19. slovenačka udarna brigada Srečko Kosovel</button>
								<button type="submit" name="brigada" value="unit 164">11. slovenačka udarna brigada Miloš Zidanšek</button>
							</td>
						</tr>
					</form>
				</table>

				<div style="background-color: #dadada">
					<?php
					$dan_rata1 = 10497 + strtotime(1941 . "-" . $mmm . "-" . $ddd) / 86400;
					if ($dan_rata1 < 56) {
						$raspon = 1942;
					} else {
						$raspon = 1941;
					}

					for ($godina = $raspon; $godina < $raspon + 4; $godina++) {
						echo "<div style='background-color: #dadada'><h1 style=margin-bottom:0>$godina:</h1>
						<h3>Nemačke divizije na teritoriji Jugoslavije na dan $ddd.$mmm.$godina (crveno):</h3>";
						echo string_divizije($ddd, $mmm, $godina);
						echo "</div>";
						echo "<div style='background-color: #f4f4fa; overflow:auto'>
						<h3>Slobodni gradovi Jugoslavije na dan $ddd.$mmm.$godina (crveno):</h3>";
						echo string_slobodni($ddd, $mmm, $godina);
						echo "</div><h3 class='naslov-hronologija'>Hronologija događaja:</h3>";

						if ($grad_str and !$grad) {
							$upit17 = "SELECT * FROM entia WHERE naziv=" . chr(39) . $grad_str . chr(39) . ";";
							$rezultat17 = mysqli_query($konekcija, $upit17);
							$red17 = mysqli_fetch_assoc($rezultat17);
							$grad = $red17['id'];
						}
						if ($brigada) {
							$upit1 = "SELECT * FROM hr1 INNER JOIN hr_int ON hr1.id=hr_int.zapis WHERE broj=$brigada AND yy=$godina order by mm,dd;";
							$upit7 = "UPDATE klikovi set b2=(b2+1);";
						} else {
							$upit1 = "SELECT * FROM hr1 WHERE dd=$ddd and mm=$mmm AND yy=$godina;";
							if ($iiix or $iiiy) {
								$upit7 = "UPDATE klikovi set b1=(b1+1);";
							}
						}

						if ($grad) {
							$upit1 = "SELECT * FROM hr1 INNER JOIN hr_int ON hr1.id=hr_int.zapis WHERE broj=$grad AND yy=$godina order by mm,dd;";
							$upit3 = "SELECT COUNT('zapis') as ukup FROM hr1 INNER JOIN hr_int ON hr1.id=hr_int.zapis WHERE broj=$grad AND yy=$godina order by mm,dd;";
							$rezultat3 = mysqli_query($konekcija, $upit3);
							$red3 = mysqli_fetch_assoc($rezultat3);
							$broj_pogodaka = $broj_pogodaka + $red3['ukup'];
							$upit7 = "UPDATE klikovi set b3=(b3+1);";
						}
						$rezultat = mysqli_query($konekcija, $upit1);

						if ($upit7) {
							$rezultat7 = mysqli_query($konekcija, $upit7);
						}
						while (1) {
							$linkovi = "";
							$red1 = mysqli_fetch_assoc($rezultat);
							if (!isset($red1)) {
								break;
							}
							$aa = $red1['tekst'];
							$tt = $red1['tip'];
							$rr = $red1['rang'];

							$upit37 = "SELECT * FROM linkovi WHERE uz=" . $red1['zapis'] . ";";
							if (($iiix == 0) or ($iiix == 7)) {
								$upit37 = "SELECT * FROM linkovi WHERE uz=" . $red1['id'] . ";";
							}
							$rezultat37 = mysqli_query($konekcija, $upit37);
							while (1) {
								$red37 = mysqli_fetch_assoc($rezultat37);
								if (!isset($red37)) {
									break;
								}
								switch ($red37['vrsta']) {
									case 1:
										$u_linku = "wiki";
										break;
									case 2:
										$u_linku = "dokument";
										break;
									case 3:
										$u_linku = "knjiga";
										break;
									case 4:
										$u_linku = "dokument na nemačkom";
										break;
									case 5:
										$u_linku = "foto";
										break;
								}
								$linkovi = $linkovi . "<b style='background: #b0c0ff'><u><a href=" . chr(34) . $red37['izraz'] . chr(34) . " target=new>" . $u_linku . "</a></b></u>, ";
							}
							$u_linku = "";
							if (strlen($linkovi) > 0) {
								$linkovi = " * (" . substr($linkovi, 0, strlen($linkovi) - 2) . ")";
							}

							if ($tt == -1) {
								$dod = "/" . ($red1['dd'] + 1);
							}
							if ($rr == 1) {
								$dod2a = "<b style='background: #d0e0ff'>";
								$dod2b = "</font></b>";
							}
							$dann = $red1['dd'];
							if ($grad or $brigada) {
								if ($red1['tip'] == 101) {
									$dann = "-početak";
								}
								if ($red1['tip'] == 111) {
									$dann = "-sredina";
								}
								if ($red1['tip'] == 121) {
									$dann = "-kraj";
								}
								if ($red1['tip'] == 201) {
									$dann = "-prva polovina";
								}
								if ($red1['tip'] == 216) {
									$dann = "-druga polovina";
								}
								if ($red1['tip'] == 301) {
									$dann = "-tokom meseca";
								}
							}
							echo "<div style='background-color: #ffffff'>" . $dann . $dod . "." . $red1['mm'] . "."  . $red1['yy'] . ". " . $dod2a . $aa . $dod2b . $linkovi . "</div>";
							$rrr++;
							$dod = "";
							$dod2a = "";
							$dod2b = "";
						}
					}
					if (($brigada == 829) or ($brigada == 830) or ($brigada == 831)) {
						echo "<br>";
						echo '<center><font size=' . '"' . '2' . '"' . '><a href=' . '"' . '/00003/541.htm' . '"' . ' target=' . '"' . '_blank' . '"' . '><span>&nbsp;&nbsp;<font color=#106000>&#9658;</font>&nbsp;Vuka&#353;in Karanovi&#263;: TRE&#262;I DIVERZANTSKI ODRED 1941-1945.</span></a><br /></center>';
						echo "<br>";
						echo "Kronologija diverzantskih djelovanja i akcija od 1941. do 1945. godine rađena je na osnovu originalnih dokumenata. Raspolagali smo s knjigama djelovodnika (očevidnika) 1 — 5 u kojima je točno opisan svaki i najmanji događaj na prugama NDH od 1941. do 1. veljače 1945. godine. U djelovodnicima su dati svi osnovni podaci, na primjer: redni broj, datum, mjesto, događaj, iz vršilac, šteta, mrtvi, ranjeni, krivci za udes, opaska i broj akta u kojem je događaj šire obrađen. Djelovodnici se nalaze u Sindikatu željezničara RH.";
						echo '<iframe src=' . '"' . '/00003/541.pdf#page=' . mt_rand(237, 383) . '"' . ' width=100% height=800px></iframe>';

						echo '<br><br><br><a href=' . '"' . '/NARA/T311.php?broj=67&f2_strn=285' . '" target=' . '"' . 'new' . '"' . '>' . "<b class=bigTitle>Nemački dokumenti: sabotaže na prugama, decembar 1943 (Streckenstörzungen Dezember 1943)<br>National Archive Washington, T311, roll 285, frames 64-132</b></a><br>";
						echo '<a href=' . '"' . '/NARA/T311.php?broj=67&f2_strn=285' . '" target=' . '"' . 'new' . '"' . '>' . '<img src=' . '"' . '/images/NARA/T311_285/0067.jpg' . '"' . ' width=100%></a><br>';
					}
					?>
				</div>

	</table>
	</div>

</body>

</html>
