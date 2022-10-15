<meta charset="utf-8">

<!DOCTYPE html>

<?php

$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

if (mysqli_connect_errno()) {
	echo "Ne mogu da se povežem sa bazom. ";
	exit();
}
$tip=array();
$rr=0;
$iiix=0;
$maxx=564;
$br_knj=764;
$autor="";
$nasl_knj="Suđenje članovima političkog i vojnog rukovodstva organizacije Draže Mihailovića – STENOGRAFSKE BELEŠKE";
if ($_GET['broj']) {
	$ova_strana = $_GET['broj'];
	$iiix=2;
} else {
	$ova_strana = mt_rand(5,$maxx);
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
if ($red['autor']) {
	$naslov[$rr]=$red['autor'] . ": <i>" . $red['naslov'] . "</i>";
} else {
	$naslov[$rr]=$red['poglavlje'];
}
while ($red) {
	$red = mysqli_fetch_assoc($rezultat);
	$rr++;
	$niz_strana[$rr]=$red['strana_pdf'];
	$niz_oznaka[$rr]=$red['strana'];
	$tip[$rr]=$red['tip'];
	if ($red['autor']) {
		$naslov[$rr]=$red['autor'] . ": <i>" . $red['naslov'] . "</i>";
	} else {
		$naslov[$rr]=$red['poglavlje'];
	}
}

for ($ii=1;$ii<500;$ii++) {
if (!$niz_strana[$ii]) {break;}
}
$broj_poglavlja=$ii;
if ($iiix!=2) {$ova_strana = mt_rand(5,$maxx);}

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
<SCRIPT LANGUAGE="JavaScript">
<!--
function freg(smer){
	var f2_val;
	f2_val=document.getElementById('d2').value;
	if (smer==0) { 
		--f2_val; }
	if (smer==1) { 
		++f2_val; }
	if (f2_val<1) { 
		f2_val=1; }
	document.getElementById('d2').value = f2_val;
	document.getElementById("f2").submit();
}
-->
</SCRIPT>
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
<form name="input1" action="<?php echo $_SERVER[PHP_SELF]; ?>" method="get" id='f2'>
<table width="100%"  border=1>
<tr><td class=svetloplavo><b>naslov</b></td><td align=right class=svetloplavo><b>broj stranice</b></td><td align="center" class=svetloplavo><b>slika stranice<br /><CENTER><TABLE border="1">
<TR><TD><input type="button" value="<<" name="previous" onclick="freg(0);">
</TD><TD><b>page no: (1-<?php echo $maxx;?>)</b>: <input type="text" name="broj" id='d2' value=<?php echo $ova_strana;?>>
</TD><TD><input type="button" value=">>" name="next" onclick="freg(1);">
<TD rowspan=2><a href="/" target="new"><b>znaci.org</b></a>
<tr><td colspan=3 align=center><input type="submit" value="go_to">
</TD></TR>
</TABLE></CENTER></b></td></tr>
</form>

<?php
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
	$bold1="";
	$bold2="";
	$bold3="";
	$bold4="";
	if ($tip[$ii-1]==1) {$bold1="<b>"; $bold2="</b>";}
	if ($tip[$ii-1]==2) {$bold3="<i>"; $bold4="</i>";}
	$spx='<tr><td' . $boja[$ii] . '> <a href=' . '"' . $br_knj . '.php?broj=' . $niz_strana[$ii-1] . '"' . '>' . $bold1 . $bold3 . $naslov[$ii-1] . $bold4 . $bold2 . $sp4 . $niz_oznaka[$ii-1] . $sp5;
	if ($ii==1) {
		echo substr($spx,0,strlen($spx)-5) . '<td vAlign=' . '"' . 'top' . '"' . ' rowspan=' . $broj_poglavlja . ' style=' . '"' . 'text-align: left; width:60%; overflow-x:hidden;' . '"' . '><center><iframe src=' . '"' . '/00003/' . $br_knj . '.pdf#page=' . $ova_strana . '"' . ' style=' . '"' . 'position:relative; left:-160px; text-align: left; width:120%; height:1600; overflow-x:hidden;' . '"' . '></iframe></td></tr>';
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
