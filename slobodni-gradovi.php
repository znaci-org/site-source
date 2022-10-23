<?php

include_once "includes/povezivanje.php";

$dan = $mysqli->real_escape_string($_GET['dan']);
$mesec = $mysqli->real_escape_string($_GET['mesec']);
$godina = $mysqli->real_escape_string($_GET['godina']);
$dan_rata = 10497 + strtotime($godina . "-" . $mesec . "-" . $dan) / 86400;

$upit_gradovi = sprintf("SELECT * FROM entia WHERE vrsta=2;");

if ($rezultat_gradovi = $mysqli->query($upit_gradovi)) {
	$data = [];
	$gradovi = [];

	while ($red = $rezultat_gradovi->fetch_assoc()) {
		$data[] = $grad_id = $red['id']; // 0
		$data[] = $red['naziv'];	// 1
		$data[] = $red['n'];		// 2
		$data[] = $red['e'];		// 3
		$data[] = $red['slug'];		// 4

		$slobodan = 2;	// podrazumeva da nije slobodan

		$upit_s = "SELECT * FROM eventu WHERE ko=$grad_id order by kadyy,kadmm,kadd";
		$rezultat_s = $mysqli->query($upit_s);
		while ($red_s = $rezultat_s->fetch_assoc()) {
			$dan_akcije = 10497 + strtotime($red_s['kadyy'] . "-" . $red_s['kadmm'] . "-" . $red_s['kadd']) / 86400;
			if ($dan_akcije > $dan_rata) break;
			$slobodan = $red_s['sta'];
		}

		$data[] = $slobodan;
		$gradovi[] = $data;
		unset($data);
	}

	$rezultat_gradovi->free();
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Slobodni gradovi</title>
	<meta charset="UTF-8">
	<style>
		html,
		body {
			margin: 0;
			border: 0;
			width: 100%;
		}

		#mesto-za-mapu {
			width: 100%;
			height: 700px;
		}

		.nazivi {
			color: red;
			background-color: white;
			font-family: "Lucida Grande", "Arial", sans-serif;
			font-size: 10px;
			font-weight: bold;
			text-align: center;
			border: 2px solid black;
			white-space: nowrap;
		}

		.gm-style-iw a {
			color: red;
		}
	</style>
	<?php include_once('libs/leaflet.css.php'); ?>
</head>

<body>

	<div id="mapa"></div>
	<div id="mesto-za-mapu"></div>

	<?php
	include_once('libs/leaflet.js.php');
	include_once('js/mapa.php');
	?>
	<script>
		window.onload = function() {
			postaviMapu(<?php echo json_encode($gradovi); ?>);
		}
	</script>
</body>

</html>