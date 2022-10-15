<?php
if ($_GET['broj']) {
	$fname = $_GET['broj'] . ".htm";
	include($fname);
}
?>
<form name="input" action="formtemp.php" method="get">
broj: <input type="text" name="broj">
<input type="submit" value="ajde!">
</form>
