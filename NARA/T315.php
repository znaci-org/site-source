<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

if (mysqli_connect_errno()) {
	echo "Ne mogu da se povežem sa bazom. ";
	exit();
}


class unit_att
{
	function rec_determin($unitt,$konekcija) {
		$upit_p="SELECT * FROM roll_s WHERE unit=" . $unitt;
		$rezultat_p = mysqli_query($konekcija,$upit_p);
		$red_p = mysqli_fetch_assoc($rezultat_p);
		$novi_p=$red_p['rec'];
		return $novi_p;
	}
	function roll_determin($unitt,$konekcija) {
		$upit_p="SELECT * FROM roll_s WHERE unit=" . $unitt . " ORDER BY roll";
		$rezultat_p = mysqli_query($konekcija,$upit_p);
		$rr=0;
		while($red_p = mysqli_fetch_assoc($rezultat_p)) {
			$novi_r[$rr]=$red_p['roll'];
			$rr++;
		}
		//print_r($novi_r);
		return $novi_r;
	}
	function rr_determin($unitt,$konekcija) {
		$upit_rd="SELECT * FROM entia WHERE id=" . $unitt;
		$rezultat_rd = mysqli_query($konekcija,$upit_rd);
		$red_rd = mysqli_fetch_assoc($rezultat_rd);
		$novi_rd=$red_rd['rang'];
		return $novi_rd;
	}
	function pos_determin($unitt,$konekcija) {
		$upit_rx="SELECT distinct(unit) FROM roll_s WHERE rec=" . $this->rec_determin($unitt,$konekcija) . " ORDER BY unit";
		//echo $upit_rx . "!!!<br>";
		$rezultat_rx = mysqli_query($konekcija,$upit_rx);
		$rr=0;
		while($red_rx = mysqli_fetch_assoc($rezultat_rx)){
			$novi_rx[$rr]=$red_rx['unit'];
			if ($novi_rx[$rr]==$unitt) {
				$novi_rxx=$rr;
				break;
				}
			$rr++;
			}
		return $novi_rxx;
	}
}

function is_unit($rec,$roll,$konekcija) {
	$upt="select unit from roll_s where rec=" . $rec . " and roll=" . $roll;
	$rzlt = mysqli_query($konekcija,$upt);
	$rdd = mysqli_fetch_assoc($rzlt);
	return $rdd['unit']; }

if ($_GET['unit']) {
	$unit = $_GET['unit'];
	$iiix=1;
	$unit_obj = new unit_att;
	$rec=$unit_obj->rec_determin($unit,$konekcija);
	$rolls=$unit_obj->roll_determin($unit,$konekcija);
	$roll=$rolls[0];
	//echo "<br>" . $iiix  . "*%*" . $unit . "-" . $rec . "-" . $roll;
}
	
//$upit_u="SELECT DISTINCT(roll) FROM roll_s WHERE unit=" . $unit;


//$pos=$unit_obj->pos_determin($unit,$konekcija);

/*
echo "::::";
echo $rec . "::::" . $rd;
echo "<br>::::" . $unit_obj->pos_determin(686,$konekcija);
*/

$klasa[0]="Oberkommando der Wehrmacht";
$klasa[1]="Armeegruppe";
$klasa[2]="Panzerarmee";
$klasa[3]="Armeekorps";
$klasa[4]="Division";
$klasa[5]="Besatzungsstäbe";
$klasa[6]="SS";
$klasa[7]="Waffen SS";
$kl_num[0]=78;
$kl_num[1]=311;
$kl_num[2]=313;
$kl_num[3]=314;
$kl_num[4]=315;
$kl_num[5]=501;
$kl_num[6]=354;
$kl_num[7]=175;
for($ii=0;$ii<8;$ii++) {
	$kl_num_str[$ii]=$kl_num[$ii];
	//if($ii==6 or $ii==7) {$kl_num_str[$ii]='175 OR rec=354';}
	}

$kl_prip[0][0]=331;
$kl_prip[0][1]=332;
$kl_prip[1][0]=175;
$kl_prip[1][1]=187;
$kl_prip[1][2]=188;
$kl_prip[1][3]=189;
$kl_prip[1][4]=190;
$kl_prip[1][5]=194;
$kl_prip[1][6]=195;
$kl_prip[1][7]=196;
$kl_prip[1][8]=285;
$kl_prip[1][9]=286;
$kl_prip[2][0]=192;
$kl_prip[2][1]=196;
$kl_prip[2][2]=482;
$kl_prip[2][3]=483;
$kl_prip[2][4]=484;
$kl_prip[2][5]=485;
$kl_prip[2][6]=486;
$kl_prip[2][7]=487;
$kl_prip[2][8]=488;
$kl_prip[3][0]=554;
$kl_prip[3][1]=555;
$kl_prip[3][2]=556;
$kl_prip[3][3]=557;
$kl_prip[3][4]=558;
$kl_prip[3][5]=559;
$kl_prip[3][6]=560;
$kl_prip[3][7]=561;
$kl_prip[3][8]=562;
$kl_prip[3][9]=563;
$kl_prip[3][10]=564;
$kl_prip[3][11]=565;
$kl_prip[3][12]=566;
$kl_prip[3][13]=1630;
$kl_prip[4][0]=1294;
$kl_prip[4][1]=1295;
$kl_prip[4][2]=1296;
$kl_prip[4][3]=2154;
$kl_prip[4][4]=2155;
$kl_prip[4][5]=2170;
$kl_prip[4][6]=2171;
$kl_prip[4][7]=2269;
$kl_prip[4][8]=2270;
$kl_prip[4][9]=2271;
$kl_prip[5][0]=255;
$kl_prip[5][1]=256;
$kl_prip[6][0]=70;
$kl_prip[6][1]=145;
$kl_prip[6][2]=606;

//echo count($kl_prip[3]);

if ($_GET['rec']) {
	$rec = $_GET['rec'];
	$iiiy=1;
	$ndx1=array_search($rec,$kl_num);
} else {
	$ndx1=mt_rand(0,5);
	if($iiix<>1) {$rec = $kl_num[$ndx1];}
}
if ($_GET['roll']) {
	$roll = $_GET['roll'];
	$iiiz=1;
} else {
	//if (!$iiix) {
	$privr1=count($kl_prip[$ndx1])-1;
	$ndx2=mt_rand(0,$privr1);
	$privr=$kl_num[$ndx2];
	if($iiix<>1) {$roll = $kl_prip[$ndx1][$ndx2];}
	//echo $ndx1 . " * " . $rec . " * " . $privr1 . " * " . $ndx2 . " * " . $privr . " * " . $roll;//
	//}
}

if ($_GET['broj']) {
	$ova_strana = $_GET['broj'];
	$iiizz=1;
} else {
	$ova_strana = 12;
}

$rrr1=0;
$rrr2=0;

$upit1="SELECT * FROM roll_s WHERE rec=" . $rec . " AND roll=" . $roll . ";";
$rezultat = mysqli_query($konekcija,$upit1);
$red1 = mysqli_fetch_assoc($rezultat);
//$rec[$rrr1]=$red1['rec'];
//$roll[$rrr1]=$red1['roll'];
$frm1=$red1['frm1'];
$diff=$red1['diff'];
$maxx_i=$red1['maxx_i'];
if($iiix<>1) {$unit=$red1['unit'];}
//echo "######" . $iiix . $unit;
$nule=$red1['nule'];
$upit0="SELECT * FROM entia WHERE id=" . $unit . ";";
$rezultat0 = mysqli_query($konekcija,$upit0);
$red0 = mysqli_fetch_assoc($rezultat0);
$naziv=$red0['naziv'];
$naziv2=$red0['naziv2'];

if ($iiizz!=1) {$ova_strana = mt_rand(5,$maxx_i);}
//echo $ova_strana . " # " . $nule;//
$upit2="SELECT * FROM roll_c WHERE rec=" . $rec . " AND roll=" . $roll . " ORDER BY frm;";
//echo $upit2;//
$rezultat = mysqli_query($konekcija,$upit2);
$red2 = mysqli_fetch_assoc($rezultat);
$dt1[$rrr2]=date('F d, Y', strtotime($red2['dt1']));
$dt2[$rrr2]=date('F d, Y', strtotime($red2['dt2']));



$opis_n[$rrr2]=$red2['opis_n'];
$opis_e[$rrr2]=$red2['opis_e'];
$img[$rrr2]=$red2['img'];
$frm[$rrr2]=$red2['frm'];
$frrm[$rrr2]=$img[0] - $diff;

while ($red2) {
	++$rrr2;
	$red2 = mysqli_fetch_assoc($rezultat);
	$dt1[$rrr2]=date('F d, Y', strtotime($red2['dt1']));
	$dt2[$rrr2]=date('F d, Y', strtotime($red2['dt2']));
	$opis_n[$rrr2]=$red2['opis_n'];
	$opis_e[$rrr2]=$red2['opis_e'];
	$img[$rrr2]=$red2['img'];
	$frm[$rrr2]=$red2['frm'];
	$frrm[$rrr2]=$img[$rrr2] - $diff;
}
$broj_poglavlja= $rrr2;
$rr=0;
//$maxx=816;

if ($ova_strana > $maxx_i) { $ova_strana = $maxx_i; }
if ($ova_strana < 1) { $ova_strana = 1; }
$ova_strana_str=$ova_strana;


for ($ii=1;$ii<($nule);$ii++) {
if (strlen($ova_strana_str)>($nule-1)) {break;}
$ova_strana_str= "0" . $ova_strana_str;
}

for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {$boja[$tt]="";}
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
if ($ova_strana > $img[$ii-1] - 1) {$tt=$ii;}
}
$ova_strana_str= $ova_strana_str . ".jpg";

//echo " --- " . $ova_strana_str;//
$boja[$tt]=" class=srednjezeleno";
$sp4='</td><td align=right vAlign=top>';
$sp5='</td></tr>';

?>
<title><?php echo $naziv; ?> (<?php echo $naziv2; ?>) Documents from National Archive Washington
</title>

</head>
<body>

<div style="text-align: center;">
<center>
<?php
//echo "::" . $rec . "::" . $roll . "::" . $unit . "<br>";
for($ii=0;$ii<count($klasa)-3;$ii++) {
//pronađi distinct units
$upit="Select distinct(unit) from roll_s where rec=" . $kl_num[$ii] . " order by unit;";
//echo $upit;
$rezultat = mysqli_query($konekcija,$upit);
echo "<table class=ttl><tr><td class=brdr_lgray>" . $klasa[$ii] . "</td>";
$ss=0;
$pogodak=-1;
	while($red = mysqli_fetch_assoc($rezultat)) {
		//prikaži distinct units
		$utip="Select * from entia where id=" . $red['unit'] . ";";
		$retuztat = mysqli_query($konekcija,$utip);
		$der = mysqli_fetch_assoc($retuztat);
		$jdnc=is_unit($rec,$roll,$konekcija);
		if($jdnc==$red['unit']) {$pogodak=$red['unit'];}
		$mark1=" class=td_cent";
		if($red['unit']==$unit){$mark1=" class=srednjezeleno_c";}
		echo "<td" . $mark1 . ">" . "<a href=" . chr(34) . $_SERVER['PHP_SELF'] . "?unit=" . $red['unit'] . chr(34) . ">" . $der['naziv2'] . "</a></td>";
		$ss++;
	}
	echo "</tr></table>";
	//ako je pogodak
	if($pogodak>-1) {
		echo "<table class=ttl><tr>";
		$utup="Select * from roll_s where unit=" . $pogodak . " order by roll;";
		$retuzut = mysqli_query($konekcija,$utup);
		while($rud = mysqli_fetch_assoc($retuzut)) { //za svaku rolnu unutar jedinice
			$mark2=" class=td_cent";
			if($rud['roll']==$roll){$mark2=" class=srednjezeleno_c";}
			echo "<td" . $mark2 . ">" . "<a href=" . chr(34) . $_SERVER['PHP_SELF'] . "?rec=" . $rec . "&roll=" . $rud['roll'] . chr(34) . ">" . "T" . $rec . ", r. " . $rud['roll'] . "</a></td>";
		}
		echo "</tr></table>";
	}
}
?>

</div>
<br><b class=bigTitle><?php echo $naziv; ?> (<?php echo $naziv2; ?>) Documents from National Archive Washington
</b>
<br>
<div class=BELITASTER>

<form method="get" id="f2" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%"  border=1>
<tr><td align=center class=svetloplavo colspan=3><center><b class=bigTitle><u>&nbsp;&nbsp; <?php echo $naziv; ?> (<?php echo $naziv2; ?>), T<?php echo $rec;?> roll <?php echo $roll;?>&nbsp;&nbsp;</u></td></tr>

<tr><td class=svetloplavo><b>description</b></td><td align=right class=svetloplavo><b>frame no.</b></td><td align="center" class=svetloplavo><b>the document<br /><CENTER><TABLE border="1">
<TR><TD><input type="button" value="<<" name="previous" onclick="freg(0);">
</TD><TD><b>page no: (1-<?php echo $maxx_i;?>)</b>: <input style="align:right" id="d2" type="text" name="broj" value=<?php echo $ova_strana;?>>
</TD><TD><input type="button" value=">>" name="next" onclick="freg(1);">
</TD><TD rowspan=2><a href="/" target="new"><b>znaci.org</b></a></TD></TR>
<tr><td colspan=3 align=center><input type="submit" value="go_to">
<input type="hidden" id="d1" name="rec" value="<?php echo $rec;?>">
<input type="hidden" id="d1" name="roll" value="<?php echo $roll;?>">
</td></tr>
</TABLE>
</form>
</CENTER></b></td></tr>

<?php
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
	
	$slika=array('</td><td align=' . '"' . 'center' . '"' . ' rowspan=' . $broj_poglavlja . ' width=' . '"' . '70%' . '"' . '><center><img src=' . '"' . '/images/NARA/T' . $rec . '_' . $roll . '/' . $ova_strana_str . '"' . ' width=' . '"' . '100%' . '"' . '>','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
	$spx='<tr><td vAlign=top ' . $boja[$ii] . '> <a href=' . chr(34) . $_SERVER['PHP_SELF'] . "?rec=" . $rec . '&broj=' . $img[$ii-1] . '&roll=' . $roll . '"' . '>' . $opis_n[$ii-1] . ' - ' . $opis_e[$ii-1] . ', ' . $dt1[$ii-1] . ' - ' . $dt2[$ii-1] . '</a>' . $sp4 . $frm[$ii-1] . $slika[$ii-1] . $sp5;
	echo $spx;
	echo "\n";
}
?>
</TABLE>
</div>

</center>
</body>
</html>
