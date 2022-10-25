<?php

require_once "includes/povezivanje.php";
require_once "includes/pomocne_funkcije.php";

$dan = $mysqli->real_escape_string($_GET['dan']);
$mesec = $mysqli->real_escape_string($_GET['mesec']);
$godina = $mysqli->real_escape_string($_GET['godina']);

$gradovi = get_slobodni_gradovi($dan, $mesec, $godina);
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

		.petokraka {
			color:red;
			font-size:2.4em;
			display:inline-block;
			margin-bottom:-5px;
		}

		.map-label {
			white-space: nowrap;
			font-weight:bold;
			font-size:1.2em;
			text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
		}

		.leaflet-tile-pane {
			filter: sepia(55%) grayscale(.2);
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