<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>German 2nd Panzer Army (Panzerarmee 2) Documents from National Archive Washington
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
   document.getElementById('c9').value = "testing !!!!!";
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
	$kontrol = 192;
}
if ($_GET['pripadnost']) {
	$kontrol = $_GET['pripadnost'];
} else {
	if ($iiix==0) {$kontrol = 192;}
}
if ($_GET['broj']) {
	$iiix=2;
	$ova_strana = $_GET['broj'];
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
$upit1="SELECT * FROM roll_s WHERE rec=313 AND roll=" . $kontrol . ";";
$rezultat = mysqli_query($konekcija,$upit1);
$red1 = mysqli_fetch_assoc($rezultat);
$rec[$rrr1]=$red1['rec'];
$roll[$rrr1]=$red1['roll'];
$frm1[$rrr1]=$red1['frm1'];
$diff[$rrr1]=$red1['diff'];
$maxx_i[$rrr1]=$red1['maxx_i'];
$unit[$rrr1]=$red1['unit'];

if ($iiix!=2) {$ova_strana = mt_rand(5,$maxx_i[0]);}

$upit2="SELECT * FROM roll_c WHERE rec=313 AND roll=" . $kontrol . " ORDER BY frm;";
$rezultat = mysqli_query($konekcija,$upit2);
$red2 = mysqli_fetch_assoc($rezultat);
$dt1[$rrr2]=date('F d, Y', strtotime($red2['dt1']));
$dt2[$rrr2]=date('F d, Y', strtotime($red2['dt2']));
$opis_n[$rrr2]=$red2['opis_n'];
$opis_e[$rrr2]=$red2['opis_e'];
$img[$rrr2]=$red2['img'];
$frrm[$rrr2]=$img[0] - $diff[0];
$frm[$rrr2]=$red2['frm'];

while ($red2) {
	++$rrr2;
	$red2 = mysqli_fetch_assoc($rezultat);
	$dt1[$rrr2]=date('F d, Y', strtotime($red2['dt1']));
	$dt2[$rrr2]=date('F d, Y', strtotime($red2['dt2']));
	$opis_n[$rrr2]=$red2['opis_n'];
	$opis_e[$rrr2]=$red2['opis_e'];
	$img[$rrr2]=$red2['img'];
	$frrm[$rrr2]=$img[$rrr2] - $diff[0];
	$frm[$rrr2]=$red2['frm'];
}
$broj_poglavlja= $rrr2;
$rr=0;
//$maxx=816;

if ($ova_strana > $maxx_i[0]) { $ova_strana = $maxx_i[0]; }
if ($ova_strana < 1) { $ova_strana = 1; }
$ova_strana_str=$ova_strana;


for ($ii=1;$ii<5;$ii++) {
if (strlen($ova_strana_str)>4) {break;}
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
	<td><input type="submit" value="T313, roll no."></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c1" value="192"><font size="4"><label for="1">192</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c2" value="482"><font size="4"><label for="2">482</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c3" value="483"><font size="4"><label for="3">483</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c4" value="484"><font size="4"><label for="4">484</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c5" value="485"><font size="4"><label for="5">485</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c6" value="486"><font size="4"><label for="6">486</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c7" value="487"><font size="4"><label for="7">487</label>]</font></td>
	<td><font size="4">[</font><input type="radio" name="pripadnost" id="c8" value="488"><font size="4"><label for="8">488</label>]</font>
	</td>
</tr>
</table>
</form>
</center>
</div>
<br><b class=bigTitle>German 2nd Panzer Army (Panzerarmee 2) Documents from National Archive Washington
</b>
<br>
<div class=BELITASTER>

<form method="get" id="f2" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%"  border=1>
<tr><td align=center class=svetloplavo colspan=3><center><b class=bigTitle><u>&nbsp;&nbsp; German 2nd Panzer Army (Panzerarmee 2), T<?php echo $rec[0];?> roll <?php echo $roll[0];?>&nbsp;&nbsp;</u></td></tr>

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
