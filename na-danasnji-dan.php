<?php
$naslov = "Na današnji dan";
include "includes/header.php";
include "includes/pomocne_funkcije.php";

$ddd = $_POST['dan'] ?: date("d");
$mmm = $_POST['mesec'] ?: date("m");
?>

<h2>Hronologija NOR-a: na današnji dan</h2>

<form method="POST" id="f1" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
	dan: <input type="text" value="<?php echo $ddd; ?>" name="dan">
	mesec: <input type="text" value="<?php echo $mmm; ?>" name="mesec">
	<input type="submit" value="pronadji">
</form>

<div style="background-color: #dadada">
	<?php
	$dan_rata1 = 10497 + strtotime(1941 . "-" . $mmm . "-" . $ddd) / 86400;
	$pocni_od = $dan_rata1 < 56 ? 1942 : 1941;

	for ($godina = $pocni_od; $godina < $pocni_od + 4; $godina++) {
		$divizije = string_divizije($ddd, $mmm, $godina);
		echo "<h1 style=margin-bottom:0>$godina</h1>
			<h3>Nemačke divizije na teritoriji Jugoslavije $ddd.$mmm.$godina:</h3>$divizije";
	}
	?>
</div>

<?php include "includes/footer.php"; ?>