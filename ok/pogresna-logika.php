<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>hronologija
</title>
<SCRIPT LANGUAGE="JavaScript">
<!--

-->
</SCRIPT>
<style type="text/css">
<!--
@import url(/normal.css);
-->
</style>
</head>
<body>
<div class=BELITASTER>
<br><br>
<form method="get" id="f2" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%"  border=1>
<tr><td>
<?php

if ($_GET['dd']) {
	$dan = $_GET['dd'];
	$iiix=1;
} else {
	$dan = date("d");
}
if ($_GET['mm']) {
	$mesec = $_GET['mm'];
	$iiix=1;
} else {
	$mesec = date("m");
}
if ($_GET['yy']) {
	$godina = $_GET['yy'];
	$iiix=1;
} else {
	$godina = 1943;
}
if ($_GET['grad']) {
	$grad_id = $_GET['grad'];
	$iiix=1;
} else {
	$grad_id = 490;
}

$gradovi=array();
$akcije=array();
$rr=0;
$rrr=0;
//echo 10497+ strtotime('1945-5-15')/86400;

$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

$upit_e="SELECT distinct(eventu.ko) FROM entia INNER JOIN eventu ON entia.id=eventu.ko;";
$rezultat_e = mysqli_query($konekcija,$upit_e);

while(1) {
	$red_e=mysqli_fetch_assoc($rezultat_e);
	if(!isset($red_e)) {break;}
	$gradovi[$rr]=$red_e['ko'];
	$rr++;
}
for($ii=0;$ii<$rr;$ii++) {
	$upit_g="SELECT * FROM `entia` WHERE id=" . $gradovi[$ii] . ";";
	$rezultat_g = mysqli_query($konekcija,$upit_g);
	$red_g=mysqli_fetch_assoc($rezultat_g);
	echo "<input type=" . chr(34) . "radio" . chr(34) . " name=" . chr(34) . "grad" . chr(34) . " value=" . chr(34) . $gradovi[$ii] . chr(34) . ">" . $red_g['naziv'] . "<br>\n";
	if($ii==((int)($rr/3)) or $ii==((int)(2 * $rr/3))) {echo "</td><td>\n";}
}
?>
</td><td>dan, mesec i godina: <input type="text" name="dd" /><input type="text" name="mm" /><input type="text" name="yy" /><br><br><br>
<?php

$dan_rata=10497+ strtotime($godina . "-" . $mesec . "-" . $dan)/86400;
$upit_s="SELECT * FROM eventu WHERE ko=$grad_id order by kadyy,kadmm,kadd";
$rezultat_s = mysqli_query($konekcija,$upit_s);
<?php

// izabrati sve gradove i poredjati ih
// videti koji su slobodni a koji ne za danasnji datum 1943

include "ukljuci/povezivanje2.php";

$dan = $_POST['dan'] ? $_POST['dan'] : date("d"); 
$mesec = $_POST['mesec'] ? $_POST['mesec'] : date("m"); 
$godina = $_POST['godina'] ? $_POST['godina'] : 1943; 


$dan_rata = 10497 + strtotime($godina . "-" . $mesec . "-" . $dan) / 86400;

$upit_za_gradove = "SELECT * FROM entia WHERE vrsta=2; ";

if ($rezultat_za_gradove = $mysqli->query($upit_za_gradove)) {
	
	$broj_redova = $rezultat_za_gradove->num_rows;
	$podaci_za_grad = [];
	$gradovi = [];
	
	while ($red_za_gradove = $rezultat_za_gradove->fetch_row()) {
		$podaci_za_grad[] = $grad_id = $red_za_gradove[0];
		$podaci_za_grad[] = $naziv = $red_za_gradove[1];
		$podaci_za_grad[] = $kord_x = $red_za_gradove[5];
		$podaci_za_grad[] = $kord_y = $red_za_gradove[6];

		// nalazi dal je slobodan
		$upit_s = "SELECT * FROM eventu WHERE ko=$grad_id order by kadyy,kadmm,kadd";
		$rezultat_s = $mysqli->query($upit_s);
		$red_s = $rezultat_s->fetch_assoc();

		$dan_akcije = 10497 + strtotime($red_s['kadyy'] . "-" . $red_s['kadmm'] . "-" . $red_s['kadd']) / 86400;

		if($dan_akcije>$dan_rata) {break;}
			
		$podaci_za_grad[] = $slobodan = $red_s['sta'];	
			
		$gradovi[] = $podaci_za_grad;
		unset($podaci_za_grad);	

	}

	$rezultat_za_gradove->free();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Slobodni gradovi</title>
	<meta charset="UTF-8">
	
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc"></script>

    <style type="text/css">
	html, body {
		margin:0;
		border:0;
		width: 100%;
	}
	#mesto-za-mapu {
		width: 100%;
		height: 500px;
	}
	#formular{
		position:absolute;
		top:50px;
		left:50px;
		color:white;
	}
    </style>

    <script>

	var gradovi = <?php echo json_encode($gradovi); ?>;
	var ikonica_slobodan = { url: 'slike/zvezdica.png' };
	var ikonica_okupiran = { url: 'slike/svastika.png' };	
	var kruzic;

	function postaviMapu() {
	
		var opcijeMape = {
			zoom: 7,
			center: new google.maps.LatLng(44.340253, 17.257233),
			//disableDefaultUI: true,		// sakriva kontrole
			mapTypeControl: false,
			scaleControl: false,
			streetViewControl: false,
			overviewMapControl: false,
			
			panControl: true,
			panControlOptions: {
				position: google.maps.ControlPosition.RIGHT_TOP
			},
			
			zoomControl: true,
			zoomControlOptions: {
				position: google.maps.ControlPosition.RIGHT_TOP
			},	

			mapTypeId: google.maps.MapTypeId.TERRAIN,
			types: ['(regions)'],
			styles: [{
				featureType: "administrative",
				stylers: [{
					visibility: "off"
				}]
			}, {
				featureType: "road",
				stylers: [{
					visibility: "off"
				}]
			}, {
				featureType: "poi",
				stylers: [{
					visibility: "off"
				}]
			}, {
				featureType: "landscape.natural.terrain",
				stylers: [{
					visibility: "on"
				}]
			},{
				featureType: "water",
				stylers: [{
					color: "#84afa3"
				}, {
					lightness: 52
				}]
			}, {
				stylers: [{
					saturation: -17
				}, {
					gamma: 0.36
				}]
			}]
		};	// kraj opcija mape

		var mapa = new google.maps.Map(document.getElementById('mesto-za-mapu'), opcijeMape);
		var prozorce = new google.maps.InfoWindow(), marker, i;
		
		for( i = 0; i < gradovi.length; i++ ) {	

			var tekuca_pozicija = new google.maps.LatLng(gradovi[i][2], gradovi[i][3]);
			var ikonica = gradovi[i][4] ? ikonica_slobodan : ikonica_okupiran;
			var boja_kruzica = gradovi[i][4] ? '#FF0000' : '#000000';
			
			marker = new google.maps.Marker({
				position: tekuca_pozicija,
				map: mapa,
				title: gradovi[i][1],
				icon: ikonica,
				zIndex: 102
			});
			
			var opcije_kruzica = {
			  strokeColor: boja_kruzica,
			  strokeOpacity: 0.8,
			  strokeWeight: 2,
			  fillColor: boja_kruzica,
			  fillOpacity: 0.35,
			  map: mapa,
			  center: tekuca_pozicija,
			  radius: 10000
			};
			
			// postavlja kruzice
			kruzic = new google.maps.Circle(opcije_kruzica);

			// pravi prozorcice
			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					prozorce.setContent("<h3>" + gradovi[i][1] + "</h3>");
					prozorce.open(mapa, marker);
				}
			})(marker, i));
			
			// zatvara prozorcice
			google.maps.event.addListener(mapa, 'click', (function(marker, i) {
				return function() {
					prozorce.close();
				}
			})(marker, i));

		}	// kraj for postavlja markere
		
	}	// kraj postaviMapu

    </script>
</head>

<body onload="postaviMapu()">

    <div id="mesto-za-mapu"></div>

	<form id="formular" name="formular" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
		
		<p>Izaberi godinu: <br>
		<input id="godina" name="godina" type="number" min="1941" max="1945" value="<?php echo $godina; ?>" class="ista-sirina"></p>
		
		<p>Izaberi mesec: <br>
		<input id="mesec" name="mesec" type="number" min="1" max="12" value="<?php echo $mesec; ?>" class="ista-sirina"></p>
		
		<p>Izaberi dan: <br>
		<input id="dan" name="dan" type="number" min="1" max="31" value="<?php echo $dan; ?>" class="ista-sirina"></p>

		<input type="submit" id="potvrdi" name="potvrdi" value="Prikaži">

	</form>

	
</body>
</html>
<?php $mysqli->close(); ?>
while(1) {
	$red_s=mysqli_fetch_assoc($rezultat_s);
	if(!isset($red_s)) {break;}
	$dan_akcije=10497+ strtotime($red_s['kadyy'] . "-" . $red_s['kadmm'] . "-" . $red_s['kadd'])/86400;
	if($dan_akcije>$dan_rata) {break;}
	$ishod=$red_s['sta'];
	$rrr++;
}
if ($ishod==1) {$izraz="slobodan";} else {$izraz="okupiran";}
$upit_g="SELECT * FROM `entia` WHERE id=" . $grad_id . ";";
$rezultat_g = mysqli_query($konekcija,$upit_g);
$red_g=mysqli_fetch_assoc($rezultat_g);
echo "datum: " . $dan . "." . $mesec . "." . $godina . "<br>\n";
echo "grad: " . $red_g['naziv'] . "<br>\n";
echo "status: " . $izraz . "<br>\n";
?>
<br><br><br><input type="submit" name="submit" value="Get" />
</td></tr></table>
</form>
</body>
</html>
