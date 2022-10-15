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

<tr><td<?php echo $boja[1];?>> <a href="736.php?broj=<?php echo $niz_strana[0];?>&go!=go!"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPredgovor</td><td align=right>I</td><td align="center" rowspan=30 width="60%"><center><img src="/images/736/736 - <?php echo $ova_strana_str;?>.jpg" width="100%"></td></tr>
<tr><td<?php echo $boja[2];?>> <a href="736.php?broj=<?php echo $niz_strana[1];?>&go!=go!"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUvodne napomene</td><td align=right>XI</td></tr>
<tr><td<?php echo $boja[3];?>> <a href="736.php?broj=<?php echo $niz_strana[2];?>&go!=go!"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNapomena drugom izdanju monografije</td><td align=right>XVI</td></tr>
<tr><td<?php echo $boja[4];?>> <a href="736.php?broj=<?php echo $niz_strana[3];?>&go!=go!"> &#381;upanija bjelovarsko-bilogorska</td><td align=right>1</td></tr>
<tr><td<?php echo $boja[5];?>> <a href="736.php?broj=<?php echo $niz_strana[4];?>&go!=go!"> &#381;upanija brodsko-posavska</td><td align=right>26</td></tr>
<tr><td<?php echo $boja[6];?>><a href="736.php?broj=<?php echo $niz_strana[5];?>&go!=go!"> &#381;upanija dubrova&#269;ko-neretvanska</a></td><td align=right>40</td></tr>
<tr><td<?php echo $boja[7];?>> <a href="736.php?broj=<?php echo $niz_strana[6];?>&go!=go!"> &#381;upanija istarska</td><td align=right>54</td></tr>
<tr><td<?php echo $boja[8];?>> <a href="736.php?broj=<?php echo $niz_strana[7];?>&go!=go!"> &#381;upanija karlova&#269;ka</td><td align=right>65</td></tr>
<tr><td<?php echo $boja[9];?>> <a href="736.php?broj=<?php echo $niz_strana[8];?>&go!=go!"> &#381;upanija koprivni&#269;ko-kri&#382;eva&#269;ka</td><td align=right>85</td></tr>
<tr><td<?php echo $boja[10];?>> <a href="736.php?broj=<?php echo $niz_strana[9];?>&go!=go!"> &#381;upanija krapinsko-zagorska</td><td align=right>94</td></tr>
<tr><td<?php echo $boja[11];?>> <a href="736.php?broj=<?php echo $niz_strana[10];?>&go!=go!"> &#381;upanija li&#269;ko-senjska</td><td align=right>98</td></tr>
<tr><td<?php echo $boja[12];?>> <a href="736.php?broj=<?php echo $niz_strana[11];?>&go!=go!"> &#381;upanija me&#273;imurska</td><td align=right>115</td></tr>
<tr><td<?php echo $boja[13];?>> <a href="736.php?broj=<?php echo $niz_strana[12];?>&go!=go!"> &#381;upanija osje&#269;ko-baranjska</td><td align=right>121</td></tr>
<tr><td<?php echo $boja[14];?>> <a href="736.php?broj=<?php echo $niz_strana[13];?>&go!=go!"> &#381;upanija po&#382;e&#353;ko-slavonska</td><td align=right>151</td></tr>
<tr><td<?php echo $boja[15];?>> <a href="736.php?broj=<?php echo $niz_strana[14];?>&go!=go!"> &#381;upanija primorsko-goranska</td><td align=right>176</td></tr>
<tr><td<?php echo $boja[16];?>> <a href="736.php?broj=<?php echo $niz_strana[15];?>&go!=go!"> &#381;upanija sisa&#269;ko-moslava&#269;ka</td><td align=right>191</td></tr>
<tr><td<?php echo $boja[17];?>> <a href="736.php?broj=<?php echo $niz_strana[16];?>&go!=go!"> &#381;upanija splitsko-dalmatinska</td><td align=right>209</td></tr>
<tr><td<?php echo $boja[18];?>> <a href="736.php?broj=<?php echo $niz_strana[17];?>&go!=go!"> &#381;upanija &#353;ibensko-kninska</td><td align=right>237</td></tr>
<tr><td<?php echo $boja[19];?>> <a href="736.php?broj=<?php echo $niz_strana[18];?>&go!=go!"> &#381;upanija vara&#382;dinska</td><td align=right>249</td></tr>
<tr><td<?php echo $boja[20];?>> <a href="736.php?broj=<?php echo $niz_strana[19];?>&go!=go!"> &#381;upanija viroviti&#269;ko-podravska</td><td align=right>255</td></tr>
<tr><td<?php echo $boja[21];?>> <a href="736.php?broj=<?php echo $niz_strana[20];?>&go!=go!"> &#381;upanija vukovarsko-srijemska</td><td align=right>269</td></tr>
<tr><td<?php echo $boja[22];?>> <a href="736.php?broj=<?php echo $niz_strana[21];?>&go!=go!"> &#381;upanija zadarska</td><td align=right>284</td></tr>
<tr><td<?php echo $boja[23];?>> <a href="736.php?broj=<?php echo $niz_strana[22];?>&go!=go!"> &#381;upanija zagreba&#269;ka</td><td align=right>291</td></tr>
<tr><td<?php echo $boja[24];?>> <a href="736.php?broj=<?php echo $niz_strana[23];?>&go!=go!"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGrad Zagreb</td><td align=right>319</td></tr>
<tr><td<?php echo $boja[25];?>> <a href="736.php?broj=<?php echo $niz_strana[24];?>&go!=go!"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSa&#382;etak</td><td align=right>347</td></tr>
<tr><td<?php echo $boja[26];?>> <a href="736.php?broj=<?php echo $niz_strana[25];?>&go!=go!"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSummary</td><td align=right>349</td></tr>
<tr><td<?php echo $boja[27];?>> <a href="736.php?broj=<?php echo $niz_strana[26];?>&go!=go!"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b><i>Indeks sru&#353;enih, o&#353;te&#263;enih i uklonjenih spomenika po naseljima</i></b></td><td align=right>351</td></tr>
<tr><td<?php echo $boja[28];?>> <a href="736.php?broj=<?php echo $niz_strana[27];?>&go!=go!"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTuma&#269; kratica</td><td align=right>392</td></tr>
<tr><td<?php echo $boja[29];?>> <a href="736.php?broj=<?php echo $niz_strana[28];?>&go!=go!"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBibliografija</td><td align=right>393</td></tr>
<tr><td<?php echo $boja[30];?>> <a href="736.php?broj=<?php echo $niz_strana[29];?>&go!=go!"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDodatak drugom izdanju monografije</td><td align=right>396</td></tr></TABLE>
</div>
</center>
</body>
</html>
