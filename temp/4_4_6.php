<!DOCTYPE php>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ZBORNIK NOR-a. tom IV - BORBE U BOSNI I HERCEGOVINI - knjiga 6  - juli-avgust 1942.</title>
<style type="text/css">
<!--
@import url(/normal.css);
-->
</style>
</head>
<body>
<br><b class=bigTitle>ZBORNIK NOR-a. tom V - BOSNI I HERCEGOVINI - knjiga 6 - juli-avgust 1942.</b>
<br>
<CENTER><TABLE border="1"><TR><TD><a href="/"><b>BIBLIOTEKA</b></a></TD></TR></TABLE></CENTER>
<p class=BELITASTER>
<table width="100%" border=1>
<tr><td colspan=2 align=center><b> *  *  * </b></td></tr>
<tr><td colspan=2 align=center><a href="4_4_6.pdf"><b class=bigTitle>cijela knjiga</b></a></td></tr>
<tr><td colspan=2 align=center><b> *  *  * </b></td></tr>
<tr><td colspan=2 align=center><a href="4_4_6_0.pdf"><b class=bigTitle>sadr&#382;aj</b></a></td></tr>
<tr><td colspan=2 align=center><b> *  *  * </b></td></tr>
<tr><td colspan=2 align=center><a href="4_4_6_1.pdf"><b class=bigTitle>Dokumenti NOV i POJ</b></a></td></tr>
<tr><td colspan=2 align=center><a href="4_4_6_2.pdf"><b class=bigTitle>Usta&#353;ko-domobranski dokumenti</b></a></td></tr>
<tr><td colspan=2 align=center><b> *  *  * </b></td></tr>
<tr><td colspan=2><CENTER><TABLE border="1"><TR><TD><a href="/"><b>BIBLIOTEKA</b></a></TD></TR></TABLE></CENTER>
</TABLE>
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
</body>
</html>
