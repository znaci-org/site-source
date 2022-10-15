<meta charset="utf-8">

<!DOCTYPE html>

<?php

$knjige=array();
for($xx=0;$xx<9;$xx++) {$knjige[$xx]=$xx+767;}

if (isset($_GET['bk'])) {
	$broj_knjige=$_GET['bk'];
} else {
	$broj_knjige = 767;
}
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

if (mysqli_connect_errno()) {
	echo "Ne mogu da se povežem sa bazom. ";
	exit();
}
$tip=array();
$rr=0;
$iiix=0;
//$br_knj=771;
$upitt="SELECT * FROM knjige WHERE broj_knjige=" . $broj_knjige . ";";
$rezultat = mysqli_query($konekcija,$upitt);
$red = mysqli_fetch_assoc($rezultat);
$autor=$red['a1'];
$maxx=$red['brstr'];
if(strlen($red['a2'])>3) {$autor = $autor . ", " . $red['a2'];}
$nasl_knj=$red['naziv_knjige'];

if ($_GET['broj']) {
	$ova_strana = $_GET['broj'];
	$iiix=2;
} else {
	$ova_strana = mt_rand(5,$maxx/5);
}
$niz_s="";
$niz_o="";
$nasl="";
$upitt="SELECT * FROM sadrzaji WHERE knjiga=" . $broj_knjige . " ORDER BY id";
$rezultat = mysqli_query($konekcija,$upitt);
//$red = mysqli_fetch_assoc($rezultat);

while (1) {
	$red = mysqli_fetch_assoc($rezultat);
	if(!isset($red)){break;}
	$niz_strana[$rr]=$red['strana_pdf'];
	$niz_oznaka[$rr]=$red['strana_str'];
	if($red['naslov']) {
		$naslov[$rr]=$red['autor'] . ": " . $red['naslov'];
	}else{
		$naslov[$rr]=$red['poglavlje'];
	}
	$tip[$rr]=$red['tip'];
	$rr++;
}

$broj_poglavlja=count($niz_strana)+1;
if ($iiix!=2) {$ova_strana = mt_rand(5,$maxx/5);}

if ($ova_strana > $maxx) { $ova_strana = $maxx; }
if ($ova_strana < 1) { $ova_strana = "-"; }

for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {$boja[$ii]="";}
for ($ii=1;$ii<$broj_poglavlja;$ii++) {
	if ($ova_strana > ($niz_strana[$ii-1] - 1)) {
		$tt=$ii;
	}
}
$boja[$tt]=" class=srednjezeleno";
$sp4='</td><td align=right' . $boja[$ii] . '>';
$sp5='</td></tr>';

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
<form name="input1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" id='f2'>
<table width="100%"  border=1>
<tr><td class=svetloplavo><b>naslov</b></td><td align=right class=svetloplavo><b>broj stranice</b></td><td align="center" class=svetloplavo><b>slika stranice<br />
<CENTER>
<TABLE border="1">
<TR><TD><input type="button" value="<<" name="previous" onclick="freg(0);">
</TD><TD><b>page no: (1-<?php echo $maxx;?>)</b>: <input type="text" name="broj" id='d2' value=<?php echo $ova_strana;?>>
</TD><TD><input type="button" value=">>" name="next" onclick="freg(1);">
<TD rowspan=2><a href="/" target="new"><b>znaci.org</b></a><input type="hidden" name="bk" value="<?php echo $broj_knjige; ?>">
<tr><td colspan=3 align=center><input type="submit" value="go_to">
</TD></TR>
</TABLE>
</CENTER></td></tr>
</form>

<?php
for ($ii=1;$ii<$broj_poglavlja;$ii++) {
	$bold1="";
	$bold2="";
	$bold3="";
	$bold4="";
	$ispred="";
	if ($tip[$ii-1]==1) {$bold1="<b>"; $bold2="</b>";}
	if ($tip[$ii-1]==2) {$bold3="<i>"; $bold4="</i>";}
	if ($tip[$ii-1]==0) {$ispred=" - ";}
	if($ova_strana != 0) {
		$hlink1='<a href=' . '"' . $_SERVER['PHP_SELF'] . '?broj=' . $niz_strana[$ii-1] . '&bk=' . $broj_knjige . '"' . '>';
	}else{
		$hlink1='';
	}
	if($ova_strana != 0) {$bold4='</a>' . $bold4;}
	$spx='<tr><td' . $boja[$ii] . '>' . $hlink1 . $bold1 . $bold3 . $ispred . $naslov[$ii-1] . $bold4 . $bold2 . '</td><td align=right' . $boja[$ii] . '>' . $niz_oznaka[$ii-1] . $sp5;
	if ($ii==1) {
		echo substr($spx,0,strlen($spx)-5) . '<td vAlign=' . '"' . 'top' . '"' . ' rowspan=' . $broj_poglavlja . ' style=' . '"' . 'text-align: left; width:60%;' . '"' . '><center><iframe src=' . '"' . '/00003/' . $broj_knjige . '.pdf#page=' . $ova_strana . '"' . ' style=' . '"' . 'width:110%; height:1600;' . '"' . '></iframe></td></tr>';
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
