<meta charset="utf-8">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ISTOČNA BOSNA U NOR-u – SJEĆANJA UČESNIKA, knjiga 1.
</title>
<style type="text/css">
<!--
@import url(/normal.css);
-->
</style>
<?php session_start(); ?>	
<!DOCTYPE html>

<?php

$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

if (mysqli_connect_errno()) {
	echo "Ne mogu da se povežem sa bazom. ";
	exit();
} else {
	echo "Povezao sam se sa bazom.<br>";
}
$niz_strana = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$niz_oznaka = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$naslov=array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
$rr=0;
$maxx=925;
if 	(!($_SESSION['id'])) { 
$ova_strana = 6;
} else {
$ova_strana =$_SESSION['id'];
}
$niz_s="";
$niz_o="";
$nasl="";
$upitt="SELECT * FROM sadrzaji WHERE knjiga=750 ORDER BY id";
$rezultat = mysqli_query($konekcija,$upitt);
$red = mysqli_fetch_assoc($rezultat);

$naslx=$red['naslov'];
$niz_strana[$rr]=$red['strana'];
$niz_oznaka[$rr]=$red['strana_pdf'];
$naslov[$rr]=$red['poglavlje'];
while ($red) {
	$red = mysqli_fetch_assoc($rezultat);
	$rr++;
	$niz_strana[$rr]=$red['strana'];
	$niz_oznaka[$rr]=$red['strana_pdf'];
	$naslov[$rr]=$red['poglavlje'];
}

//$niz_strana = array(5,7,24,42,66,72,115,117,126,139,139,142,149,165,170,173,177,190,200,212,223,237,250,254,260,278,285,289,316,322,326,330,334,337,342,352,367,375,378,383,422,423,427,435,437,443,449,467,480,486,497,499,517,522,527,532,544,556,565,573,581,583,590,607,613,636,654,656,661,665,678,692,700,708,712,717,745,763,767,775,780,787,807,811,814,826,830,837,850,854,857,868,872,884);
for ($ii=1;$ii<500;$ii++) {
if (!$niz_strana[$ii]) {break;}
}
$broj_poglavlja=$ii;

echo $niz_strana[$ii-1] . " - " . $broj_poglavlja . "<br>";
echo $naslov[$ii-1];
//die;

//$niz_oznaka = array(5,7,24,42,66,72,115,117,126,139,139,142,149,165,170,173,177,190,200,212,223,237,250,254,260,278,285,289,316,322,326,330,334,337,342,352,367,375,378,383,422,423,427,435,437,443,449,467,480,486,497,499,517,522,527,532,544,556,565,573,581,583,590,607,613,636,654,656,661,665,678,692,700,708,712,717,745,763,767,775,780,787,807,811,814,826,830,837,850,854,857,868,872,885);

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

/*$naslov=array('Uvodna re&#269\; druga Tita',
'<i>Rodoljub &#268\;olakovi&#263\;</i>: O dru&#353\;tveno-politi&#269\;kim prilikama u isto&#269\;noj Bosni uo&#269\;i izbijanja ustanka 1941.',
'<i>Pa&#353\;aga Mand&#382\;i&#263\;</i>: Pripreme i po&#269\;etak ustanka u isto&#269\;noj Bosni',
'<i>Nisim Albahari</i>: Partijska organizacija sarajevske oblasti u periodu priprema ustanka',
'<i>Iso Jovanovi&#263\;</i>: Sjednica Pokrajinskog komiteta KPJ za Bosnu i Hercegovinu 13. jula 1941.',
'<i>Avdo Humo</i>: Razvitak ustanka 1941. u isto&#269\;noj Bosni i borba Partije za bratstvo i jedinstvo naroda i jedinstvo ustani&#269\;kih redova',
'<i>&#272\;or&#273\;e Pani&#263\;</i>: Tenk je uni&#353\;ten',
'<i>Cvjetin Mijatovi&#263\;</i>: Po&#269\;etak ustanka u Bir&#269\;u',
'<i>Bogoljub Kisi&#263\;</i>: Organizovanje ustanka i prva borba 1941. u Ra&#382\;ljevu',
'<i>Radovan Ili&#263\; Radika</i>: Semberska partizanska &#269\;eta u Ma&#269\;vi',
'<i>Pero Todorovi&#263\;</i>: Prve oru&#382\;ane akcije u okolini Kaknja',
'<i>&#272\;oko Se&#353\;lak</i>: Formiranje i rad partijske &#263\;elije u Bosanskom Perovom Selu',
'<i>Esad &#268\;engi&#263\;</i>: U okupiranom Sarajevu',
'<i>Nikola Simi&#263\;</i>: Prva partizanska &#269\;eta u Posavini 1941. godine',
'<i>Kazimir Frankovi&#263\;</i>: Serijska proizvodnja petokrakih zvijezda u Sarajevu',
'<i>Mevla Jakupovi&#263\;</i>: Prvi dani u partizanima',
'<i>Slobodan Kezunovi&#263\;</i>: Prve borbe Kalinova&#269\;kog partizanskog odreda',
'<i>Boro Tepav&#269\;evi&#263\;</i>: Podru&#269\;je gornje Drine u prvim danima ustanka',
'<i>Radivoje Luki&#263\;</i>: Pripreme za ustanak i prve borbe u srezu br&#269\;anskom',
'<i>Obrad Cicmil</i>: Prve veze Durmitorskih partizana sa isto&#269\;nom Bosnom',
'<i>Ervin Stanko Salcberger</i>: Partizanski odred »Zvijezda«',
'<i>Todor Vujasinovi&#263\;</i>: Ozrenski partizanski odred',
'<i>Naum Zafirovski</i>: Rogatica, oktobra 1941.',
'<i>Dedo Trampi&#263\;</i>: Pripreme za ustanak u Doboju – uni&#353\;tenje vojnog skladi&#353\;ta u Usori',
'<i>Drago Borov&#269\;anin</i>: Nastanak organa narodne vlasti na Romaniji 1941.',
'<i>&#262\;amil Kazazovi&#263\;</i>: Formiranje i borbe Zeni&#269\;kog NOP odreda',
'<i>Re&#353\;ad Saletovi&#263\;</i>: Partijska organizacija Vare&#353\;a u periodu priprema za oru&#382\;anu borbu',
'<i>Mujo Hod&#382\;i&#263\;</i>: Formiranje i borbeni put Muslimanskog bataljona Romanijskog NOP odreda',
'<i>Vojin Bobar</i>: Ustanak u selima oko Bijeljine',
'<i>Boro Pockov (Mirko Juki&#263\;)</i>: &#352\;panski borci u partizanskim jedinicama isto&#269\;ne Bosne',
'<i>Remzija &#262\;ori&#263\;</i>: Ustanak u Miljevini kod Fo&#269\;e',
'<i>Esad &#268\;engi&#263\;</i>: Bila je skroman i neustra&#353\;iv vojnik revolucije',
'<i>Brano Savi&#263\;</i>: Stvaranje prvih NOO u Srebrenici i okolini',
'<i>Fikret Dedi&#263\;</i>: O ustanku na Ozrenu 1941/1942.',
'<i>lgnjat Radoj&#269\;i&#263\;</i>: Diverzantske i druge akcije Lipa&#269\;ke &#269\;ete',
'<i>Ratko Peri&#263\;</i>: Na Majevici',
'<i>Cviko Radovanovi&#263\;</i>: Rad skojevske organizacije u bijeljinskom srezu od 1941. do 1943.',
'<i>Haso Buri&#263\;</i>: Ahmet Kobi&#263\; Kobo',
'<i>Ratko Jovi&#269\;i&#263\;</i>: Priprema i po&#269\;etak ustanka u rogati&#269\;kom kraju',
'<i>Uglje&#353\;a Danilovi&#263\;</i>: Kriza ustanka u isto&#269\;noj Bosni u prolje&#263\;e 1942.',
'<i>Milo&#353\; Popovi&#263\;</i>: Konjuh planinom',
'<i>Milutin &#272\;ura&#353\;kovi&#263\;</i>: Herojska smrt Slavi&#353\;e Vajnera &#268\;i&#269\;e',
'<i>Vojo Ljuji&#263\;</i>: Formiranje grupe udarnih bataljona',
'<i>Esad &#268\;engi&#263\;</i>: Sje&#263\;anje na Aliju Hod&#382\;i&#263\;a',
'<i>Rade Jak&#353\;i&#263\;</i>: Njema&#269\;ko-&#269\;etni&#269\;ka saradnja u isto&#269\;noj Bosni',
'<i>Abdulah Sarajli&#263\;</i>: Stvaranje dobrovolja&#269\;kih jedinica u isto&#269\;noj Bosni',
'<i>Savo Pre&#273\;a</i>: Udarni bataljon Romanijskog NOP odreda',
'<i>Uglje&#353\;a Danilovi&#263\;</i>: Savjetovanje u Ivan&#269\;i&#263\;ima',
'<i>Rajko Gagovi&#263\;</i>: Boravak Vrhovnog &#353\;taba u fo&#269\;anskom kraju',
'<i>Radivoje Kova&#269\;evi&#263\;</i>: &#268\;etni&#269\;ki napad na &#353\;tab Majevi&#269\;kog partizanskog odreda',
'<i>Cvijetin Mijatovi&#263\; Majo</i>: Ivan Markovi&#263\; Irac',
'<i>Slavko Mi&#263\;unovi&#263\;</i>: &#268\;etnici protiv partizana na Majevici i Semberiji',
'<i>Stevo Popovi&#263\;</i>: Dvadeseti februar 1942.',
'<i>Teodosije Parezanovi&#263\;</i>: Igmanski mar&#353\;',
'<i>&#268\;edo Miljanovi&#263\;</i>: Dragaljevac i okolna sela u NOB-u',
'<i>Ahmet &#272\;onlagi&#263\;</i>: Podaci o usta&#353\;ko-&#269\;etni&#269\;koj sprezi',
'<i>Luka Bo&#382\;ovi&#263\;</i>: Narodna vlast u Fo&#269\;i u prvoj polovini 1942.',
'<i>Mirko Simi&#263\;</i>: Han Pogled',
'<i>Luka Bo&#382\;ovi&#263\;</i>: Fo&#269\;anska omladinska &#269\;eta',
'<i>Mirko Ostoji&#263\;</i>: Dani i no&#263\;i Bir&#269\;a',
'<i>Veselin Radoj&#269\;i&#263\;</i>: Iz kurirskog &#382\;ivota',
'<i>lgnjat Radoj&#269\;i&#263\;</i>: &#268\;etni&#269\;ka izdaja i teror na Ozrenu',
'<i>Jeremija Je&#353\;o Peri&#263\;</i>: Razvoj NOP-a u nekim selima Semberije 1942.',
'<i>Dane Olbina</i>: Na&#353\; komandir Milenko Verki&#263\;',
'<i>Milo&#353\; Zeki&#263\;</i>: Borbeni put &#352\;este proleterske isto&#269\;nobosanske brigade',
'<i>Oskar Danon</i>: S pjesmom po &#353\;umama i gorama isto&#269\;ne Bosne',
'<i>Veselin Radoj&#269\;i&#263\;</i>: Susret partizana sa domobranskim natporu&#269\;nikom',
'<i>Vojo Ljuji&#263\;</i>: Borba na Han-Kramu',
'<i>Nikola Simi&#263\;</i>: Prilike u Posavini 1942.',
'<i>Moni Finci</i>: U Bosutskim &#353\;umama',
'<i>Vojo Ili&#263\;</i>: Od &#352\;ekovi&#263\;a preko Majevice do Srema i natrag',
'<i>Vojo Ljuji&#263\;</i>: &#352\;esta isto&#269\;nobosanska brigada u Sremu',
'<i>Jovan Veselinov &#381\;arko</i>: Susret sremskih i bosanskih partizana',
'<i>Ahmet &#272\;onlagi&#263\;</i>: Baca&#269\; iz bosutskih &#353\;uma',
'<i>Cvijetin Mijatovi&#263\;</i>: Oru&#382\;ano bratstvo i jedinstvo Isto&#269\;nobosanaca i Vojvo&#273\;ana',
'<i>Grujo Novakovi&#263\;</i>: Legendarna Romanija',
'<i>Vuka&#353\;in Suboti&#263\;</i>: Velika pobjeda partizana nad &#269\;etnicima na Male&#353\;evcima',
'<i>Cvjetko Peri&#263\;</i>: Osnivanje i rad NOO u nekim selima Semberije',
'<i>Radovan Ore&#353\;&#269\;anin</i>: Prve borbe Sremaca na Majevici',
'<i>Mi&#353\;o Voki&#263\;</i>: Boravak Vladimira Peri&#263\;a Valtera u Tuzli 1942–43.',
'<i>Radovan Ore&#353\;&#269\;anin</i>: Ve&#263\; puca mitraljez i pu&#353\;ka',
'<i>Joco Jovi&#263\;</i>: Borbeni put 15. majevi&#269\;ke NOU brigade',
'<i>Dane Olbina</i>: Prve stranice partizanskog dnevnika',
'<i>Luka Nedi&#263\;</i>: Zapis sa Hranjena',
'<i>Bo&#353\;ko Todorovi&#263\;</i>: Od Rasto&#353\;nice do zavr&#353\;etka pete neprijateljske ofanzive',
'<i>Dane Olbina</i>: Pod planinom',
'<i>Asim Mujki&#263\; i Joco Vo&#263\;ki&#263\;</i>: Ilegalni partijski rad u Br&#269\;kom 1941/1942.',
'<i>Milenko Radovanov</i>: Stvaranje prvih vojvo&#273\;anskih brigada',
'<i>Jovan Popovi&#263\;</i>: Na&#353\;i slavni i ponosni brigadiri',
'<i>&#268\;edo Minderovi&#263\;</i>: Uz prvi broj lista &#352\;este isto&#269\;nobosanske brigade',
'<i>Moni Finci</i>: Vu&#269\;evo',
'<i>Vaso Radi&#263\;</i>: Suza na Ko&#353\;uru',
'<i>Rudi Petovar</i>: 6. isto&#269\;nobosanska i 1. majevi&#269\;ka brigada u V neprijateljskoj ofanzivi',
'Sadr&#382\;aj');*/

/*for ($ii=0;$ii<$broj_poglavlja;$ii++) {
	$upit="INSERT INTO sadrzaji (poglavlje,strana,strana_pdf) VALUES ('$naslov[$ii]',$niz_oznaka[$ii],$niz_strana[$ii]);";
	$uspex=mysqli_query($konekcija,$upit);
	echo $upit . "###" . $uspex . '<br>';
}*/
?>

</head>
<body>
<br><b class=bigTitle>ISTOČNA BOSNA U NOR-u – SJEĆANJA UČESNIKA, knjiga 1.
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
	$spx='<tr><td' . $boja[$ii] . '> <a href=' . '"' . '750.php?broj=' . $niz_strana[$ii-1] . '&go!=go!' . '"' . '>' . $naslov[$ii-1] . $sp4 . $niz_oznaka[$ii-1] . $sp5;
	if ($ii==1) {
		echo substr($spx,0,strlen($spx)-5) . '<td vAlign=' . '"' . 'top' . '"' . ' rowspan=' . $broj_poglavlja . ' width=' . '"' . '60%' . '"' . ' height=1000><center><iframe src=' . '"' . '/00003/750.pdf#page=' . $ova_strana . '"' . ' style=' . '"' . 'width:100%; height:1000; overflow-x:hidden;' . '"' . '></iframe></td></tr>';
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
