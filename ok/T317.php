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

if ($_GET['sta1']) {
	$sta1= $_GET['sta1'];
}
else { $sta1= "etni";
}
if ($_GET['sta2']) {
	$sta2= $_GET['sta2'];
}
else { $sta2= "D.M";
}
if ($_GET['idem']) {
	$preneto=17;
	$idem= $_GET['idem'];
}

$rrr2=0;
$upit1="SELECT * FROM roll_c where tip=1;";// where dd=20 and mm=11 
//echo $upit1 . "<br>" . $sta1 . "<br>" . $sta2 . "<br>";
$rezultat = mysqli_query($konekcija,$upit1);

while($red1 = mysqli_fetch_assoc($rezultat)) {
	$ii1=strpos($red1['opis_e'], $sta1);
	$jj1=strpos($red1['opis_n'], $sta1);
	$ii2=strpos($red1['opis_e'], $sta2);
	$jj2=strpos($red1['opis_n'], $sta2);
	$atresa="/NARA/T316.php?rec=" . $red1['rec'] . "&roll=" . $red1['roll'] . "&broj=" . $red1['img'];
	//echo $ii1 . " - <br>" . $jj1 . " - <br>" . $ii2 . " - <br>" . $jj2 . " - <br>";
	$a_tag="<a href=" . chr(34) . $atresa . chr(34) . " target=new>";
	if($ii1>0 or $jj1>0 or $ii2>0 or $jj2>0) {
		$opis_n[$rrr2]=$red1['opis_n'];
		$opis_e[$rrr2]=$red1['opis_e'];
		$img[$rrr2]=$red1['img'];
		$frm[$rrr2]=$red1['frm'];
		$idi[$rrr2]=$red1['id'];
		$recc[$rrr2]=$red1['rec'];
		$rolll[$rrr2]=$red1['roll'];
		if ($idi[$rrr2]==$idem) {$redni_broj=$rrr2;}
		//$frrm[$rrr2]=$img[$rrr2] - $diff;
		//echo $opis_n[$rrr2] . "<br>";
		++$rrr2;
		//++$rr;
		}
	}
$broj_poglavlja= $rrr2;
if (!$preneto) {
	$redni_broj=mt_rand(0,$broj_poglavlja-1);
	$idem=$idi[$redni_broj];
}
//echo $idem . " - <br>" . $sta1 . " - <br>" . $sta2 . " - <br>" . $redni_broj . " - <br>";

$upit2="SELECT * FROM roll_c where id=$idem;";
$rezultat2 = mysqli_query($konekcija,$upit2);
$red2 = mysqli_fetch_assoc($rezultat2);
$rec=$red2['rec'];
$roll=$red2['roll'];
$ova_strana_str=$red2['img'];
$ova_strana_x=$red2['img'];
$ovaj_frejm=$red2['frm'];
//die;
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

	/* getovi

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
*/
/*
echo "::::";
echo $rec . "::::" . $rd;
echo "<br>::::" . $unit_obj->pos_determin(686,$konekcija);
*/
/* getovi

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
*/
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

for ($ii=1;$ii<($nule);$ii++) {
if (strlen($ova_strana_str)>($nule-1)) {break;}
$ova_strana_str= "0" . $ova_strana_str;
}

//if ($iiizz!=1) {$ova_strana = mt_rand(5,$maxx_i);}

$upit3="SELECT sum(maxx_i) AS sumof_maxxi FROM roll_s" . ";";
$rezultat3 = mysqli_query($konekcija,$upit3);
$red3 = mysqli_fetch_assoc($rezultat3);
//print_r($red3);
$totalpages=$red3['sumof_maxxi'];

$upit3="SELECT count(id) as countof_id FROM roll_c where tip=1" . ";";
$rezultat3 = mysqli_query($konekcija,$upit3);
$red3 = mysqli_fetch_assoc($rezultat3);
//print_r($red3);
$totalnotes=$red3['countof_id'];

//echo $ova_strana . " # " . $nule;//

/*
$upit2="SELECT * FROM roll_c WHERE rec=" . $rec . " AND roll=" . $roll . " AND tip=1" . " ORDER BY frm;";
//echo $upit2;//
$rezultat = mysqli_query($konekcija,$upit2);
while ($red2 = mysqli_fetch_assoc($rezultat)) {
	$dt1[$rrr2]=date('F d, Y', strtotime($red2['dt1']));
	$dt2[$rrr2]=date('F d, Y', strtotime($red2['dt2']));
	$opis_n[$rrr2]=$red2['opis_n'];
	$opis_e[$rrr2]=$red2['opis_e'];
	$img[$rrr2]=$red2['img'];
	$frm[$rrr2]=$red2['frm'];
	$frrm[$rrr2]=$img[$rrr2] - $diff;
	++$rrr2;
}
$broj_poglavlja= $rrr2;
*/
$rr=0;

//umetak
/*

$upit2a="SELECT * FROM roll_c WHERE rec=" . $rec . " AND roll=" . $roll . " AND tip>0" . " ORDER BY frm;";
$rezultata = mysqli_query($konekcija,$upit2a);
$rrr3=0;
$rrr4=0;
while ($red2a = mysqli_fetch_assoc($rezultata)) {
	$opis_na[$rrr3]=$red2a['opis_n'];
	$opis_ea[$rrr3]=$red2a['opis_e'];
	$imga[$rrr3]=$red2a['img'];
	while($imga[$rrr3]>$img[$rrr4+1]) {
		if(($rrr4+1)>$broj_poglavlja) {
		$rrr4=$broj_poglavlja-1;
		break;}
		++$rrr4;
	}
	$frrma[$rrr3]=$red2a['frm'];
	$detalj[$rrr4] = $detalj[$rrr4] . '<br> - <a href=' . chr(34) . $_SERVER['PHP_SELF'] . "?rec=" . $rec . '&broj=' . $imga[$rrr3] . '&roll=' . $roll . '"' . '>' . $opis_na[$rrr3] . ' - ' . $opis_ea[$rrr3] . ' (frame no. ' . $frrma[$rrr3] . ')</a>';
	++$rrr3;
	//echo $rrr4 . ' ::: ' . $detalj[$rrr4] . '<br>';
	//echo "<br>" . $rrr4 . " *** " . $detalj[$rrr4];
}
*/

//
//$detalj[$rrr4-1]=$detalj[$rrr4-1] . $detalj[$rrr4];
/*
if ($ova_strana > $maxx_i) { $ova_strana = $maxx_i; }
if ($ova_strana < 1) { $ova_strana = 1; }
$ova_strana_str=$ova_strana;


for ($ii=1;$ii<($nule);$ii++) {
if (strlen($ova_strana_str)>($nule-1)) {break;}
$ova_strana_str= "0" . $ova_strana_str;
}
*/



for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
	$boja[$tt]="";
	if($ii==$redni_broj+1) {$boja[$tt]=" class=srednjezeleno";}
	}
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
if ($ova_strana > $img[$ii-1] - 1) {$tt=$ii;}
}
$ova_strana_str= $ova_strana_str . ".jpg";

//echo " --- " . $ova_strana_str;//
$boja[$redni_broj+1]=" class=srednjezeleno";
$sp4='</td><td align=right vAlign=top>';
$sp5='</td></tr>';
$sp6='<br/><u>izdvojeno:</u>';
$sp7=chr(34) . '>izdvojeno:</a></u>';
//echo $boja[$redni_broj];
?>
<title>Documents from National Archive Washington - notes search
</title>

</head>
<body>
<p class=bigTitle>
Pretraga kroz beleške uz nemačke dokumente sa mikrofilmova National Archive Washington<br />
Documents from National Archive Washington - notes search<br />
Dostupno listova dokumenata (total pages): <?php echo $totalpages; ?> - od toga tagovano (total notes): <?php echo $totalnotes; ?></p>
<TABLE border="1">
<TR><TD>
<form method="GET" id="f17" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	search string 1: <input type="text" name="sta1" value="<?php echo $sta1;?>"><br>
	search string 2: <input type="text" name="sta2" value="<?php echo $sta2;?>"><br>
	<input type="submit" value="go!">
</td></tr>
</TABLE>
</form>
<p class=bigTitle>
Ukupno pronađeno (total results): <?php echo $broj_poglavlja; ?></p>

<center>
<?php
/* neću sad
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

*/

?>

<br>
<div class=BELITASTER>

<table width="100%"  border=1>

<tr><td class=svetloplavo><b>description</b></td><td align=right class=svetloplavo><b>frame no.</b></td><td align="center" class=svetloplavo><b>the document<br />
<b class=bigTitle><?php echo $naziv; ?> (<?php echo $naziv2; ?>) National Archive Washington, T<?php echo $rec; ?> roll <?php echo $roll; ?>, frame <?php echo $ovaj_frejm; ?></b>
<br /><i><?php echo $opis_n[$redni_broj] . ' - ' . $opis_e[$redni_broj]; ?></i>
<CENTER>
<a href="/NARA/T316.php?rec=<?php echo $rec; ?>&roll=<?php echo $roll; ?>&broj=<?php echo $ova_strana_x; ?>" target="new"><u>link za pregled dokumenta u okviru njegove rolne T<?php echo $rec; ?> roll <?php echo $roll; ?> (the whole T<?php echo $rec; ?> roll <?php echo $roll; ?>)</u></a>
</b>
</CENTER></b></td></tr>

<?php
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
	
	$slika=array('</td><td align=' . '"' . 'center' . '"' . ' vAlign=top rowspan=' . $broj_poglavlja . ' width=' . '"' . '70%' . '"' . '><center><img src=' . '"' . '/images/NARA/T' . $rec . '_' . $roll . '/' . $ova_strana_str . '"' . ' width=' . '"' . '100%' . '"' . '>','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
	$spx='<tr><td vAlign=top ' . $boja[$ii] . '> <a href=' . chr(34) . $_SERVER['PHP_SELF'] . "?sta1=" . $sta1 . '&sta2=' . $sta2 . '&idem=' . $idi[$ii-1] . '"' . '><b>' . $opis_n[$ii-1] . ' - ' . $opis_e[$ii-1] . ', ' . $dt1[$ii-1] . ' - ' . $dt2[$ii-1] . '</b></a>' . $sp66 . $detalj[$ii-1] . $sp4 . "T" . $recc[$ii-1] . "-r" . $rolll[$ii-1] . "-f" . $frm[$ii-1] . $slika[$ii-1] . $sp5;
	echo $spx;
	echo "\n";
}
?>
</TABLE>
</div>

</center>
</body>
</html>
