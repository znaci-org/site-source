<?php
$naslov = "Na današnji dan";
include "includes/header.php";
?>

<h2>Hronologija NOR-a: na današnji dan</h2>

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

$ddd = $_POST['dan'] ?: date("d");
$mmm = $_POST['mesec'] ?: date("m");

?>

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

<div style="background-color: #dadada">
	<?php
	$dan_rata1 = 10497 + strtotime(1941 . "-" . $mmm . "-" . $ddd) / 86400;
	if ($dan_rata1 < 56) {
		$raspon = 1942;
	} else {
		$raspon = 1941;
	}

	for ($godina = $raspon; $godina < $raspon + 4; $godina++) {
		echo "<div style='background-color: #dadada'>
			<h1 style=margin-bottom:0>$godina:</h1>
			<h3>Nemačke divizije na teritoriji Jugoslavije na dan $ddd.$mmm.$godina (crveno):</h3>";
		echo string_divizije($ddd, $mmm, $godina);
		echo "</div>";
	}
	?>
</div>

<?php include "includes/footer.php"; ?>