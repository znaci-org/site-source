<?php session_start(); ?>	
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Savez antifa&#353;isti&#269;kih boraca Hrvatske: RU&#352;ENJE ANTIFA&#352;ISTI&#268;KIH SPOMENIKA U HRVATSKOJ 1990–2000.
</title>
<style type="text/css">
<!--
@import url(/normal.css);
-->
</style>
<?php
$maxx=436;
if 	(!($_SESSION['id'])) { 
$ova_strana = 6;
} else {
$ova_strana =$_SESSION['id'];
}

$niz_strana = array(6,16,21,23,49,63,77,88,108,117,122,139,145,175,200,215,233,261,273,270,293,308,315,343,370,372,374,415,416,419);
for ($ii=1;$ii<500;$ii++) {
if (!$niz_strana[$ii]) {break;}
}
$broj_poglavlja=$ii;

$niz_oznaka = array("I","XI","XVI",1,26,40,54,65,85,94, 98, 115, 121, 151, 176, 191, 209, 237, 249, 246, 269, 284, 291, 319, 347,349,351,392,393,396);

if ($_GET['go!']) {
	$ova_strana = $_GET['broj'];
	$_SESSION['id'] = $ova_strana;
}

if ($_GET['previous']) {
	$ova_strana = ($ova_strana-1);
	$_SESSION['id'] = $ova_strana;
	//include($fname);
}
if ($_GET['next']) {
	$ova_strana = ($ova_strana+1);
	$_SESSION['id'] = $ova_strana;
	//include($fname);
}
if ($ova_strana > $maxx) { $ova_strana = $maxx; }
if ($ova_strana < 1) { $ova_strana = 1; }
$ova_strana_str=$ova_strana;


for ($ii=1;$ii<4;$ii++) {
if (strlen($ova_strana_str)>3) {break;}
$ova_strana_str= "0" . $ova_strana_str;
}

for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {$boja[$tt]="";}
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
if ($ova_strana > $niz_strana[$ii-1] - 1) {$tt=$ii;}
}
$boja[$tt]=" class=srednjezeleno";
/* $sp1='<tr><td<?php echo $boja[';
$sp2='];?>> <a href=' . '"' . '736.php?broj=<?php echo $niz_strana[';
$sp1='<tr><td';
$sp2='> <a href=' . '"' . '736.php?broj=315';
$sp3='];?>&go!=go!' . '"' . '>'; */
$sp4='</td><td align=right>';
$sp5='</td></tr>';
/* $slika="</td><td align=" . '"' . "center" . '"' . " rowspan=30 width=" . '"' . "60%" . '"' . "><center><img src=" . '"' . "/images/736/736 - <?php echo $ova_strana_str;?>.jpg" . '"' . " width=" . '"' . "100%" . '"' . ">"; */

$naslov=array('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Predgovor',
	'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Uvodne napomene',
	'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Napomena drugom izdanju monografije',
	'&#381;upanija bjelovarsko-bilogorska',
	'&#381;upanija brodsko-posavska',
	'&#381;upanija dubrova&#269;ko-neretvanska',
	'&#381;upanija istarska',
	'&#381;upanija karlova&#269;ka',
	'&#381;upanija koprivni&#269;ko-kri&#382;eva&#269;ka',
	'&#381;upanija krapinsko-zagorska',
	'&#381;upanija li&#269;ko-senjska',
	'&#381;upanija me&#273;imurska',
	'&#381;upanija osje&#269;ko-baranjska',
	'&#381;upanija po&#382;e&#353;ko-slavonska',
	'&#381;upanija primorsko-goranska',
	'&#381;upanija sisa&#269;ko-moslava&#269;ka',
	'&#381;upanija splitsko-dalmatinska',
	'&#381;upanija &#353;ibensko-kninska',
	'&#381;upanija vara&#382;dinska',
	'&#381;upanija viroviti&#269;ko-podravska',
	'&#381;upanija vukovarsko-srijemska',
	'&#381;upanija zadarska',
	'&#381;upanija zagreba&#269;ka',
	'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Grad Zagreb',
	'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sa&#382;etak',
	'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Summary',
	'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Indeks sru&#353;enih, o&#353;te&#263;enih i uklonjenih spomenika po naseljima',
	'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tuma&#269; kratica',
	'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bibliografija',
	'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dodatak drugom izdanju monografije');

?>
</head>
<body>
<br><b class=bigTitle>Savez antifa&#353;isti&#269;kih boraca Hrvatske: RU&#352;ENJE ANTIFA&#352;ISTI&#268;KIH SPOMENIKA U HRVATSKOJ 1990–2000.
</b>
<br>
<div class=BELITASTER>

<table width="100%"  border=1>
<tr><td align=center class=svetloplavo colspan=3><center><b class=bigTitle><a href="736_1.pdf"><u>&nbsp;&nbsp; * indeks sru&#353;enih, o&#353;te&#263;enih i uklonjenih spomenika po naseljima (pdf) * &nbsp;&nbsp;</u></a>
<br /><a href="736_0.pdf"><b class=bigTitle><u>&nbsp;&nbsp; * sadr&#382;aj (pdf) * &nbsp;&nbsp;</u></a></b></td></tr>

<tr><td class=svetloplavo><b>naslov</b></td><td align=right class=svetloplavo><b>broj stranice</b></td><td align="center" class=svetloplavo><b>slika stranice<br /><CENTER><TABLE border="1">
<TR><TD><form name="input1" action="<?php $_SERVER[PHP_SELF]; ?>" method="get"><input type="submit" value="prethodna" name="previous"></form>
</TD><TD><form name="input2" action="<?php $_SERVER[PHP_SELF]; ?>" method="get"><b>page no: (1-436)</b>: <input type="text" name="broj" value=<?php echo $ova_strana;?>><input type="submit" value="go!" name="go!"></form>
</TD><TD><form name="input3" action="<?php $_SERVER[PHP_SELF]; ?>" method="get"><input type="submit" value="sljedeća" name="next">
</form>
</TD><TD><a href="/"><b>znaci.org</b></a></TD></TR>

</TABLE></CENTER></b></td></tr>

<?php
for ($ii=1;$ii<$broj_poglavlja+1;$ii++) {
	$slika=array('</td><td align=' . '"' . 'center' . '"' . ' rowspan=30 width=' . '"' . '60%' . '"' . '><center><img src=' . '"' . '/images/736/736 - ' . $ova_strana_str . '"' . ' width=' . '"' . '100%' . '"' . '>','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
	$spx='<tr><td' . $boja[$ii] . '> <a href=' . '"' . '736.php?broj=' . $niz_strana[$ii-1] . '&go!=go!' . '"' . '>' . $naslov[$ii-1] . $sp4 . $niz_oznaka[$ii-1] . $slika[$ii-1] . $sp5;
	echo $spx;
	echo "\n";
}
?>
</TABLE>
</div>

</center>
</body>
</html>
