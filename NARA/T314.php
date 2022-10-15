<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>German 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents from National Archive Washington
</title>
<SCRIPT LANGUAGE="JavaScript">
<!--
function showBoxes(frm){
   var message;
   for (var i = 0; i < frm.pripadnost.length; i++){
      if (frm.pripadnost[i].checked){
         message = message + "\n" + frm.pripadnost[i].value;
         break;
      }
   }
   alert(message);
   document.getElementById('c99').value = "testing !!!!!";
}
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
<?php
$iiix=0;
if ($_GET['f2_strn']) {
	$kontrol = $_GET['f2_strn'];
	$iiix=1;
} else {
	$kontrol = 558;
}
if ($_GET['pripadnost']) {
	$kontrol = $_GET['pripadnost'];
} else {
	if ($iiix==0) {$kontrol = 558;}
}

if ($_GET['broj']) {
	$ova_strana = $_GET['broj'];
	$iiix=2;
} else {
	$ova_strana = 12;
}

$rrr1=0;
$rrr2=0;
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

if (mysqli_connect_errno()) {
	echo "Ne mogu da se povežem sa bazom. ";
	exit();
}
$upit1="SELECT * FROM roll_s WHERE rec=314 AND roll=" . $kontrol . ";";
$rezultat = mysqli_query($konekcija,$upit1);
$red1 = mysqli_fetch_assoc($rezultat);
$rec[$rrr1]=$red1['rec'];
$roll[$rrr1]=$red1['roll'];
$frm1[$rrr1]=$red1['frm1'];
$diff[$rrr1]=$red1['diff'];
$maxx_i[$rrr1]=$red1['maxx_i'];
$unit[$rrr1]=$red1['unit'];
$nule[$rrr1]=$red1['nule'];

if ($iiix!=2) {$ova_strana = mt_rand(5,$maxx_i[0]);}

$upit2="SELECT * FROM roll_c WHERE rec=314 AND roll=" . $kontrol . " ORDER BY frm;";
$rezultat = mysqli_query($konekcija,$upit2);
$red2 = mysqli_fetch_assoc($rezultat);
$dt1[$rrr2]=date('F d, Y', strtotime($red2['dt1']));
$dt2[$rrr2]=date('F d, Y', strtotime($red2['dt2']));



$opis_n[$rrr2]=$red2['opis_n'];
$opis_e[$rrr2]=$red2['opis_e'];
$img[$rrr2]=$red2['img'];
$frm[$rrr2]=$red2['frm'];
$frrm[$rrr2]=$img[0] - $diff[0];

while ($red2) {
	++$rrr2;
	$red2 = mysqli_fetch_assoc($rezultat);
	$dt1[$rrr2]=date('F d, Y', strtotime($red2['dt1']));
	$dt2[$rrr2]=date('F d, Y', strtotime($red2['dt2']));
	$opis_n[$rrr2]=$red2['opis_n'];
	$opis_e[$rrr2]=$red2['opis_e'];
	$img[$rrr2]=$red2['img'];
	$frm[$rrr2]=$red2['frm'];
	$frrm[$rrr2]=$img[$rrr2] - $diff[0];
}
$broj_poglavlja= $rrr2;
$rr=0;
//$maxx=816;

if ($ova_strana > $maxx_i[0]) { $ova_strana = $maxx_i[0]; }
if ($ova_strana < 1) { $ova_strana = 1; }
$ova_strana_str=$ova_strana;


for ($ii=1;$ii<($nule[0]);$ii++) {
if (strlen($ova_strana_str)>($nule[0]-1)) {break;}
$ova_strana_str= "0" . $ova_strana_str;
}

for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {$boja[$tt]="";}
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
if ($ova_strana > $img[$ii-1] - 1) {$tt=$ii;}
}
$ova_strana_str= $ova_strana_str . ".jpg";
$boja[$tt]=" class=srednjezeleno";
$sp4='</td><td align=right vAlign=top>';
$sp5='</td></tr>';

?>
</head>
<body>

<div style="text-align: center;">
<center>
<form method="get" id="f1" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table>
<tr>
	<td><input type="submit" value="T314, roll no."></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c1" value="558"><font size="4"><label for="c1">558</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c2" value="559"><font size="4"><label for="c2">559</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c3" value="560"><font size="4"><label for="c3">560</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c4" value="561"><font size="4"><label for="c4">561</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c5" value="562"><font size="4"><label for="c5">562</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c6" value="563"><font size="4"><label for="c6">563</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c7" value="564"><font size="4"><label for="c7">564</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c8" value="565"><font size="4"><label for="c8">565</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c9" value="566"><font size="4"><label for="c9">566</label>]</font>
	</td>
</tr>
</table>
</form>
</center>
</div>
<br><b class=bigTitle>German 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents from National Archive Washington
</b>
<br>
<div class=BELITASTER>

<form method="get" id="f2" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%"  border=1>
<tr><td align=center class=svetloplavo colspan=3><center><b class=bigTitle><u>&nbsp;&nbsp; German 15th Mountain Army Corps (XV. Gebirgs-Armeekorps), T<?php echo $rec[0];?> roll <?php echo $roll[0];?>&nbsp;&nbsp;</u></td></tr>

<tr><td class=svetloplavo><b>description</b></td><td align=right class=svetloplavo><b>frame no.</b></td><td align="center" class=svetloplavo><b>the document<br /><CENTER><TABLE border="1">
<TR><TD><input type="button" value="<<" name="previous" onclick="freg(0);">
</TD><TD><b>page no: (1-<?php echo $maxx_i[0];?>)</b>: <input style="align:right" id="d2" type="text" name="broj" value=<?php echo $ova_strana;?>>
</TD><TD><input type="button" value=">>" name="next" onclick="freg(1);">
</TD><TD rowspan=2><a href="/" target="new"><b>znaci.org</b></a></TD></TR>
<tr><td colspan=3 align=center><input type="submit" value="go_to">
<input type="hidden" id="d1" name="f2_strn" value="<?php echo $kontrol;?>">
</td></tr>
</TABLE>
</form>
</CENTER></b></td></tr>

<?php
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
	
	$slika=array('</td><td align=' . '"' . 'center' . '"' . ' rowspan=' . $broj_poglavlja . ' width=' . '"' . '70%' . '"' . '><center><img src=' . '"' . '/images/NARA/T' . $rec[0] . '_' . $roll[0] . '/' . $ova_strana_str . '"' . ' width=' . '"' . '100%' . '"' . '>','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
	$spx='<tr><td vAlign=top ' . $boja[$ii] . '> <a href=' . '"' . 'T' . $rec[0] . '.php?' . 'broj=' . $img[$ii-1] . '&f2_strn=' . $kontrol . '"' . '>' . $opis_n[$ii-1] . ' - ' . $opis_e[$ii-1] . ', ' . $dt1[$ii-1] . ' - ' . $dt2[$ii-1] . '</a>' . $sp4 . $frm[$ii-1] . $slika[$ii-1] . $sp5;
	echo $spx;
	echo "\n";
}
?>
</TABLE>
</div>

</center>
</body>
</html>
