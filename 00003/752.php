<meta charset="utf-8">

<?php session_start(); ?>	
<!DOCTYPE html>

<?php

$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

if (mysqli_connect_errno()) {
	echo "Ne mogu da se povežem sa bazom. ";
	exit();
} 
$niz_strana = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$niz_oznaka = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$naslov=array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
$rr=0;
$maxx=588;
$br_knj=752;
$autor="Mijo Kos Zorko";
$nasl_knj="VELIKA GORICA U NOB-U II";
if 	(!($_SESSION['id'])) { 
$ova_strana = 6;
} else {
$ova_strana =$_SESSION['id'];
}
$niz_s="";
$niz_o="";
$nasl="";
$upitt="SELECT * FROM sadrzaji WHERE knjiga=" . $br_knj . " ORDER BY id";
$rezultat = mysqli_query($konekcija,$upitt);
$red = mysqli_fetch_assoc($rezultat);

$naslx=$red['naslov'];
$niz_strana[$rr]=$red['strana_pdf'];
$niz_oznaka[$rr]=$red['strana'];
$naslov[$rr]=$red['poglavlje'];
while ($red) {
	$red = mysqli_fetch_assoc($rezultat);
	$rr++;
	$niz_strana[$rr]=$red['strana_pdf'];
	$niz_oznaka[$rr]=$red['strana'];
	$naslov[$rr]=$red['poglavlje'];
}

for ($ii=1;$ii<500;$ii++) {
if (!$niz_strana[$ii]) {break;}
}
$broj_poglavlja=$ii;

//echo $niz_strana[$ii-1] . " - " . $broj_poglavlja . "<br>";
//echo $naslov[$ii-1];

if ($_GET['go!']) {
	$ova_strana = $_GET['broj'];
	$_SESSION['id'] = $ova_strana;
}

if ($_GET['previous']) {
	$ova_strana = ($ova_strana-1);
	$_SESSION['id'] = $ova_strana;
}
if ($_GET['next']) {
	$ova_strana = ($ova_strana+1);
	$_SESSION['id'] = $ova_strana;
}
if ($ova_strana > $maxx) { $ova_strana = $maxx; }
if ($ova_strana < 1) { $ova_strana = 1; }

for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {$boja[$tt]="";}
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
if ($ova_strana > $niz_strana[$ii-1] - 1) {$tt=$ii;}
}

$boja[$tt]=" class=srednjezeleno";
$sp4='</td><td align=right>';
$sp5='</td></tr>';

/*for ($ii=0;$ii<$broj_poglavlja;$ii++) {
	$upit="INSERT INTO sadrzaji (poglavlje,strana,strana_pdf) VALUES ('$naslov[$ii]',$niz_oznaka[$ii],$niz_strana[$ii]);";
	$uspex=mysqli_query($konekcija,$upit);
	echo $upit . "###" . $uspex . '<br>';
}*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $autor . ": " . $nasl_knj; ?>
</title>
<style type="text/css">
<!--
@import url(/normal.css);
-->
</style>
</head>
<body>
<br><b class=bigTitle><?php echo $autor . ": " . $nasl_knj; ?>
</b>
<br>
<div class=BELITASTER>

<table width="100%"  border=1>

<tr><td class=svetloplavo><b>naslov</b></td><td align=right class=svetloplavo><b>broj stranice</b></td><td align="center" class=svetloplavo><b>slika stranice<br /><CENTER><TABLE border="1">
<TR><TD><form name="input1" action="<?php $_SERVER[PHP_SELF]; ?>" method="get"><input type="submit" value="prethodna" name="previous"></form>
</TD><TD><form name="input2" action="<?php $_SERVER[PHP_SELF]; ?>" method="get"><b>page no: (1-925)</b>: <input type="text" name="broj" value=<?php echo $ova_strana;?>><input type="submit" value="go!" name="go!"></form>
</TD><TD><form name="input3" action="<?php $_SERVER[PHP_SELF]; ?>" method="get"><input type="submit" value="sljedeća" name="next">
</form>
</TD><TD><a href="/"><b>znaci.org</b></a></TD></TR>

</TABLE></CENTER></b></td></tr>

<?php
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
	$spx='<tr><td' . $boja[$ii] . '> <a href=' . '"' . $br_knj . '.php?broj=' . $niz_strana[$ii-1] . '&go!=go!' . '"' . '>' . $naslov[$ii-1] . $sp4 . $niz_oznaka[$ii-1] . $sp5;
	if ($ii==1) {
		echo substr($spx,0,strlen($spx)-5) . '<td vAlign=' . '"' . 'top' . '"' . ' rowspan=' . $broj_poglavlja . ' width=' . '"' . '60%' . '"' . ' height=1000><center><iframe src=' . '"' . '/00003/' . $br_knj . '.pdf#page=' . $ova_strana . '"' . ' style=' . '"' . 'width:100%; height:1000; overflow-x:hidden;' . '"' . '></iframe></td></tr>';
	} else {
		echo $spx;
	}
		
	echo "\n";
}
?>
</TABLE>
</div>

</center>
</body>
</html>
