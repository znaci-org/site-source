<meta charset="utf-8">

<!DOCTYPE html>

<?php
//karakteristično
$naslx='VOJNOISTORIJSKI INSTITUT BEOGRAD: ZBORNIK DOKUMENATA I PODATAKA NOR-a';
$ld=4;
//$opisi=array();
//$linkovi=array();
$zbornici=array(
	'BORBE U SRBIJI',
	'DOKUMENTI VRHOVNOG ŠTABA NOV I POJ',
	'BORBE U CRNOJ GORI',
	'BORBE U BOSNI I HERCEGOVINI',
	'BORBE U HRVATSKOJ',
	'BORBE U SLOVENIJI',
	'BORBE U MAKEDONIJI',
	'DEJSTVA NA JADRANU',
	'DOKUMENTI ORGANIZACIJA KOMUNISTIČKE PARTIJE',
	'JUGOSLOVENSKO RATNO VAZDUHOPLOVSTVO U NOR-u',
	'OPERACIJE JUGOSLOVENSKE ARMIJE 1945',
	'DOKUMENTI JEDINICA I USTANOVA NEMAČKOG RAJHA',
	'DOKUMENTI JEDINICA I USTANOVA KRALJ. ITALIJE',
	'DOKUMENTI ČETNIČKOG POKRETA DRAŽE MIHAILOVIĆA',
	'DOKUMENTI O UČEŠĆU HORTIJEVSKE MAĐARSKE');
	
$zbornici_broj_knjiga=array(21,15,10,35,39,19,4,3,9,2,4,4,3,4,1);

$zbornici_po_knjigama[1]=array(
	'1941',
	'1941',
	'januar-jun 1942',
	'juli-decembar 1942',
	'1943',
	'BORBE U VOJVODINI 1941 - 1943',
	'januar - maj 1944',
	'BORBE U VOJVODINI 1944',
	'jun - 20. avgust 1944',
	'BORBE U VOJVODINI (novembar-decembar 1944)',
	'21. avgust - 10. septembar 1944',
	'11-30. septembar 1944',
	'1-15. oktobar 1944',
	'15-31. oktobar 1944',
	'novembar - decembar 1944',
	'BORBE U SANDŽAKU 1942 - 1944',
	'BORBE U VOJVODINI 1941 - 1944 (neprijateljski dokumenti)',
	'BORBE U SREMU, januar-mart 1945',
	'KOSOVO I METOHIJA',
	'SRBIJA 1941-1944 - dopuna',
	'SRBIJA 1941-1944 - DOKUMENTI KVISLINŠKIH JEDINICA I USTANOVA');

$zbornici_po_knjigama[12]=array('1941','1942','1943','1944-45');
$zbornici_po_knjigama[13]=array('1941','1942','1943');

$maxx[12]=array(927,1241,925,1320);	
$maxx[13]=array(896,1038,596);	
	
if (isset($_GET['vol'])) {
	$tom_index=$_GET['vol'];
}else{
	$tom_index=12;
}
if (isset($_GET['bk'])) {
	$broj_knjige=$_GET['bk'];
}else{
	$broj_knjige=1;
}
if ($_GET['broj']) {
	$ova_strana = $_GET['broj'];
	$iiix=2;
} else {
	$ova_strana = mt_rand(5,$maxx[$tom_index][$broj_knjige-1]/10);
}

//za zbornike

function into_roman($argm) {
$roem_x = array(
    'M' => 1000,
    'CM' => 900,
    'D' => 500,
    'CD' => 400,
    'C' => 100,
    'XC' => 90,
    'L' => 50,
    'XL' => 40,
    'X' => 10,
    'IX' => 9,
    'V' => 5,
    'IV' => 4,
    'I' => 1
);
$roem_ix=array('M','CM','D','CD','C','XC','L','XL','X','IX','V','IV','I');
	$rr=0;
	$rzlt="";
	while (1) {
		if($argm<1) {break;}
		if($argm>=$roem_x[$roem_ix[$rr]]) {
			$argm=$argm - $roem_x[$roem_ix[$rr]];
			$rzlt= $rzlt . $roem_ix[$rr];
		} else {
			$rr++;
		}
	}
	return $rzlt;
}

$srrc=$ld * 10000 + $tom_index * 100 + $broj_knjige;
$pddf=$ld . "_" . $tom_index . "_" . $broj_knjige . ".pdf";

$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

if (mysqli_connect_errno()) {
	echo "Ne radi veza sa bazom: rr " . mysqli_connect_errno();
	exit();
} 
$upit="SELECT * FROM dokumenti WHERE src=" . $srrc . " ORDER BY rb;";
//echo $upit;
$rezultat = mysqli_query($konekcija,$upit);
$rr=1;
while(1){
	$red = mysqli_fetch_assoc($rezultat);
	if(!isset($red)){break;}
	$opisi[$rr]=$red['opis'];
	$niz_strana[$rr]=$red['strana_pdf'];
	$niz_oznaka[$rr]=$red['p'];
	$linkovi[$rr]="/zb/" . $pddf . "#page=" . $red['strana_pdf'];
	$rr++;
}
$upit="SELECT max(rb) AS maxrb FROM `dokumenti` WHERE src=" . $srrc;
$rezultat = mysqli_query($konekcija,$upit);
$red = mysqli_fetch_assoc($rezultat);
$broj_poglavlja=$red['maxrb'];

$aaa=$_SERVER['PHP_SELF'];
$ct=count($zbornici_po_knjigama[$tom_index]);
$aa="<center><form method=" . chr(34) . "GET" . chr(34) . " id=" . chr(34) . "f1" . chr(34) . " action=" . chr(34) . $aaa . chr(34) . "><table><tr><td colspan=" . $ct . ">" . $zbornici[$tom_index-1] . "<input type=" . chr(34) . "hidden" . chr(34) . " id=" . chr(34) . "hidf11" . chr(34) .  " name=vol value=" . $tom_index . ">" . "<input type=" . chr(34) . "hidden" . chr(34) . " id=" . chr(34) . "hidf12" . chr(34) .  " name=bk value=" . $broj_knjige . " >" . "</td><tr>";
for($rrx=1;$rrx<$ct+1;$rrx++) {
	if($rrx==$broj_knjige) {$ddtk=" class=dubokozeleno";} else {$ddtk="";}
	$aa = $aa . "<td" . $ddtk . "><input type=" . '"' . "button" . '"' . " name=" . '"' . "bk" . '"' .  " onclick=" . '"' . "set_bk(" . $rrx . ");" . '"' . " value=" . '"knjiga ' . into_roman($rrx) . '"' . "></td>\n";
}
$aa=$aa . "</tr></table></form></center>";

$bb="<center><form method=" . chr(34) . "GET" . chr(34) . " id=" . chr(34) . "f3" . chr(34) . " action=" . chr(34) . $aaa . chr(34) . "><table><tr>";
for($rrx=1;$rrx<16;$rrx++) {
	if($rrx==$tom_index) {$ddtk=" class=zlatno";} else {$ddtk="";}
	if($rrx%3==0) {$prelom="</tr><tr>";} else {$prelom="";}
	$bb = $bb . "<td" . $ddtk . ">&nbsp;<input type=" . '"' . "button" . '"' . " name=" . '"' . "bk" . '"' .  " onclick=" . '"' . "set_vol(" . $rrx . ");" . '"' . " value=" . '"tom ' . into_roman($rrx) . ': ' . $zbornici[$rrx-1] . '"' . ">&nbsp;</td>\n" . $prelom;
}
$bb=$bb . "<input type=" . chr(34) . "hidden" . chr(34) . " id=" . chr(34) . "hidf31" . chr(34) .  " name=vol value=" . $tom_index . ">" . "&nbsp;</tr></table></form></center>";

for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {$boja[$tt]="";}
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
if ($ova_strana > $niz_strana[$ii-1] - 1) {$tt=$ii;}
}

$boja[$tt-1]=" class=srednjezeleno";
$sp4='</td><td align=right>';
$sp5='</td></tr>';

//echo $opisi[17] . " - " . $linkovi[17] . " - " . $broj_poglavlja;
//echo $tom_index . " * " . $broj_knjige; //$zbornici_po_knjigama[12][1];
//echo $maxx[$tom_index][$broj_knjige];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $naslx ?>
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
function set_bk(bkk) {
	document.getElementById('hidf12').value = bkk;
	document.getElementById('hidf22').value = bkk;
	document.getElementById("f1").submit();
}
function chck() {
	tm1=document.getElementById('hidf11').value;
	tm2=document.getElementById('hidf21').value;
	tm3=document.getElementById('hidf31').value;
	kg1=document.getElementById('hidf12').value;
	kg2=document.getElementById('hidf22').value;
	alert(tm1);
	alert(tm2);
	alert(tm3);
	alert(kg1);
	alert(kg2);
}
function set_vol(vol) {
	if(vol<10) {
		nula="0";
		voll=nula.concat(vol);
	}else{
		voll=vol;
	}
	poc_lnk="/#zb_";
	res=poc_lnk.concat(voll);
	if(vol!=12 & vol!=13) {window.open(res);}
	else {volll=document.getElementById('hidf31').value; if(volll!=vol) {document.getElementById('hidf31').value = vol; document.getElementById("f3").submit();}}
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
<table width=100% border=1>
<tr><td class=tamnoplavo>
<b class=bigTitle><?php echo $naslx; ?></b>
<br>
<?php echo $bb;?>
</td></tr>
</table>
<b class=bigTitle>tom <?php echo into_roman($tom_index) . "<br>knjiga "  . $broj_knjige . ": " . $zbornici_po_knjigama[$tom_index-1][$broj_knjige-1];?>
<br><?php echo $zbornici[$tom_index-1]; ?></b>

<div style="text-align: center;">

<div class=BELITASTER>
<form name="input1" action="<?php echo $_SERVER[PHP_SELF]; ?>" method="get" id='f2'>
<table width="100%" border=1>
<tr><td class=svetloplavo><b>naslov</b></td><td align=right class=svetloplavo><b>broj stranice</b></td><td align="center" class=svetloplavo><b>slika stranice<br /><CENTER><TABLE border="1">
<TR><TD><input type="button" value="<<" name="previous" onclick="freg(0);">
</TD><TD><b>page no: (1-<?php echo $maxx[$tom_index][$broj_knjige-1];?>)</b>: <input type="text" name="broj" id='d2' value=<?php echo $ova_strana;?>>
</TD><TD><input type="button" value=">>" name="next" onclick="freg(1);">
<TD rowspan=2><a href="/" target="new"><b>znaci.org</b></a>
<tr><td colspan=3 align=center><input type="submit" value="go_to"><input type="hidden" id="hidf22" name=bk value="<?php echo $broj_knjige;?>"><input type="hidden" id="hidf21" name=vol value="<?php echo $tom_index;?>">
</TD></TR></TABLE>
</form>
</td></tr>
<tr><td colspan="2" class=tamnozeleno>
<?php echo $aa;?>
</td><td vAlign=top rowspan=<?php echo $broj_poglavlja+1;?> width="60%" height=1600><center>
<?php
echo '<iframe src=' . '"' . '/zb/' . $pddf . '#page=' . $ova_strana . '"' . ' style=' . '"' . 'width:100%; height:1600; overflow-x:hidden;' . '"' . '></iframe></td></tr>';
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
	$spx='<tr><td' . $boja[$ii] . '>' . $ii . '. <a href=' . '"' . $aaa . '?broj=' . $niz_strana[$ii] . '&vol=' . $tom_index . '&bk=' . $broj_knjige . '"' . '>' . $opisi[$ii] . $sp4 . $niz_oznaka[$ii] . $sp5;
	echo $spx;
	echo "\n";
}
?>

</TABLE></CENTER></b></td></tr>


</div>

</center>
</body>
</html>
