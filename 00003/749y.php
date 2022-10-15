<?php session_start(); ?>	
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Grupa autora: DURMITORSKA PARTIZANSKA REPUBLIKA
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

$niz_strana = array(5,6,9,12,22,32,47,59,69,94,121,152,159,171,188,205,213,218,221,253,267,280,294,313,325,338,359,392,409,425,432,443,471,496,526,542,546,570,584,603,612,636,651,682,686,713,731,750,754,762,804,825,832,837,854,862,871,876,888,899,910,914,916,920);
for ($ii=1;$ii<500;$ii++) {
if (!$niz_strana[$ii]) {break;}
}
$broj_poglavlja=$ii;

$niz_oznaka = array(5,7,10,13,23,33,48,60,70,95,122,153,160,172,189,203,214,219,222,254,268,281,295,314,326,339,360,393,410,426,433,444,472,497,527,543,547,571,585,604,613,637,652,683,687,714,732,751,755,763,805,826,833,838,855,863,872,877,889,900,911,914,917,921);

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
/* $slika="</td><td align=" . '"' . "center" . '"' . " rowspan=30 width=" . '"' . "60%" . '"' . "><center><img src=" . '"' . "/images/748/748 - <?php echo $ova_strana_str;?>.jpg" . '"' . " width=" . '"' . "100%" . '"' . ">"; */

$naslov=array('Napomena Redakcije',
'<i>Dr Dimo Vujovi&#263;</i></br>Otvaranje skupa',
'<i>Miju&#353;ko &#352;ibali&#263;</i></br>Pozdravna rije&#269;',
'<i>Pero Mora&#269;a</i></br>Vrijeme Durmitorske partizanske republike',
'<i>Dr Jovan R. Bojovi&#263;</i></br>Titovo prisustvo Pokrajinskoj konferenciji Komunisti&#269;ke partije Jugoslavije za Crnu Goru u Barama &#381;ugi&#263;a 1940. god.',
'<i>Mr Budimir Mili&#269;i&#263;</i></br>Dru&#353;tveno-ekonomske i politi&#269;ke pretpostavke ustanka u durmitorskom kraju 1941. godine',
'<i>Dr Miroljub Vasi&#263;</i></br>Uloga revolucionarnog omladinskog pokreta u pripremama Komunisti&#269;ke partije Jugoslavije za revoluciju (1935&#8212;1941)',
'<i>Veljko Zekovi&#263;</i></br>Neka zapa&#382;anja o politi&#269;kim osobenostima durmitorskog kraja izme&#273;u dva rata i naro&#269;ito za vrijeme Narodnooslobodila&#269;ke borbe',
'<i>Stojan &#381;ugi&#263;</i></br>Komunisti&#269;ka partija Jugoslavije kao organizator i ruko-vodilac oru&#382;ane borbe u durmitorskom kraju (1941&#8212;1942)',
'<i>Radovan Vukanovi&#263;</i></br>Operativno-strategijski zna&#269;aj durmitorskog podru&#269;ja u narodnooslobodila&#269;kom ratu',
'<i>Branko Perovi&#263;</i></br>Neki aspekti organizacije ustanka i doprinosa durmitorskog podru&#269;ja i Durmitorskog narodnooslobodila&#269;kog partizanskog odreda razvoju ustanka na &#353;irem jugoslovenskom planu',
'<i>Radovan Vojinovi&#263;</i></br>&#381;ivot i rad gerilskih odreda u avgustu&#8212;oktobru 1941. god.',
'<i>Mom&#269;ilo Poleksi&#263;</i></br>Neki fragmenti iz &#382;ivota i rada Durmitorske partizanske republike',
'<i>Milija Stani&#353;i&#263;</i></br>Napredna inteligencija durmitorskog kraja u prvoj godini narodnooslobodila&#269;kog rata',
'<i>Dara Krstaji&#263;-Blagojevi&#263;</i></br>Crtice iz uspomena na Durmitor u ustanku',
'<i>Pero Krstaji&#263;</i></br>O slobodarskim i revolucionarnim pretpostavkama Durmitorske partizanske republike',
'<i>&#381;ivan Kne&#382;evi&#263;</i></br>Partijska tehnika Mjesnog komiteta Komunisti&#269;ke partije Jugoslavije &#352;avnik 1941&#8212;1942. godine',
'<i>Janko Tadi&#263;</i></br>Oru&#382;ane akcije Pivljana na podru&#269;ju Hercegovine uo&#269;i julskog ustanka 1941. godine',
'<i>Dr Savo Skoko</i></br>Saradnja ustani&#269;kih i partizanskih snaga durmitorskog kraja i sjeveroisto&#269;ne Hercegovine u ratnoj 1941. godini',
'<i>Obrad Bjelica</i></br>O nekim dejstvima i saradnji jedinica Durmitorskog i Nik&#353;i&#263;kog narodnooslobodila&#269;kog partizanskog odreda u isto&#269;noj Bosni i sjeveroisto&#269;noj Hercegovini u vrijeme Durmitorske republike (novembar 1941 – maj 1942. godine)',
'<i>Dr Venceslav Gli&#353;i&#263;</i></br>Povla&#269;enje partizanskih jedinica iz Srbije krajem 1941. godine, sa posebnim osvrtom na posledice tog povla&#269;enja na U&#382;i&#269;ku i Durmitorsku republiku',
'<i>Dr Veselin &#272;ureti&#263;</i></br>Londonski odjeci ustani&#269;kih zbivanja u Crnoj Gori 1941. g.',
'<i>Dr Slobodan Milo&#353;evi&#263;</i></br>Stvaranje jedinstvene slobodne teritorije Crne Gore, isto&#269;ne Hercegovine i jugoisto&#269;ne Bosne 1942. godine i pitanja ishrane partizanskih jedinica i stanovni&#353;tva na teritoriji Durmitorske partizanske republike',
'<i>Akademik Mihailo Apostolski</i></br>Vojno-politi&#269;ka situacija u Makedoniji u vreme Durmitorske partizanske republike',
'<i>Dr Mile Todorovski</i></br>Neke karakteristike razvitka oslobodila&#269;kog rata i revolucije u Makedoniji u vreme Durmitorske partizanske republike',
'<i>Mi&#353;o Lekovi&#263;</i></br>Boravak Vrhovnog &#353;taba i Centralnog komiteta Komunisti&#269;ke partije Jugoslavije na teritoriji Durmitorskog partizan-skog odreda (maj&#8212;jun 1942)',
'<i>Bogdan Gledovi&#263;</i></br>Narodnooslobodila&#269;ki pokret u Sand&#382;aku u vrijeme Durmitorske partizanske republike',
'<i>Dr Gojko Miljani&#263;</i></br>Mesto Durmitorske partizanske republike u strategiji rukovodstva narodnooslobodila&#269;kog pokreta 1942. godine',
'<i>Obrad Bjelica</i></br>Prolje&#263;na (tre&#263;a) neprijateljska ofanziva 1942. godine na slobodnu teritoriju Crne Gore, Sand&#382;aka, isto&#269;ne Bosne i Hercegovine sa posebnim osvrtom na tok dejstva na &#353;ire poru&#269;je Durmitorske partizanske republike',
'<i>Jovo Mihaljevi&#263;</i></br>Aktivnost Partije u jedinicama Lov&#263;enskog narodnooslobodila&#269;kog partizanskog odreda prilikom povla&#269;enja iz Crne Gore 1942. godine',
'<i>Dr Petar Ka&#269;avenda</i></br>Vojnopoliti&#269;ka aktivnost Saveza komunisti&#269;ke omladine Jugoslavije u prvoj godini rata (1941&#8212;1942)',
'<i>Teodor S. Srdanovi&#263;</i></br>Durmitorski omladinski udarni bataljon',
'<i>Dr Obren Blagojevi&#263;</i></br>Durmitor – zna&#269;ajno upori&#353;te narodnooslobodila&#269;ke borbe i izrazito podru&#269;je narodne vlasti',
'<i>Dr Du&#353;an &#381;ivkovi&#263;</i></br>Narodna vlast – osnovna tekovina socijalisti&#269;ke revolucije Jugoslavije',
'<i>Dr Zoran Laki&#263;</i></br>Organizaciona struktura i karakter vlasti u Crnoj Gori u vrijeme Durmitorske partizanske republike',
'<i>Gojko &#381;arkovi&#263;</i></br>Neke osobenosti u oblicima politi&#269;kog djelovanja i organizacije ustanka i narodne vlasti u durmitorskom kraju',
'<i>Dr Mitar Pileti&#263;</i></br>Durmitorsko podru&#269;je kao koncentracijska prostorija ranjenika i bolesnika iz narodnooslobodila&#269;ke borbe',
'<i>Dr &#272;ura Me&#353;terovi&#263;</i></br>Organizacija rada i le&#269;enja ranjenika u bolnici u &#381;abljaku od kraja decembra 1941. do sredine februara 1942.',
'<i>Dr Ilija F. Kosti&#263;</i></br>Bolnica na &#381;abljaku 1941&#8212;1942. – Zna&#269;ajno iskustvo u razvitku partizanskog saniteta i brige za ranjenike',
'<i>Danica Rosi&#263;-Abramovi&#263;</i></br>Sje&#263;anje na nastanak partizanskog saniteta u pljevaljskom kraju i na prebacivanje ranjenika u partizansku bolnicu na &#381;abljaku',
'<i>Mr Miomir Da&#353;i&#263;</i></br>Kulturno-prosvjetne prilike u narodnooslobodila&#269;kom ratu u Crnoj Gori 1941. i 1942. godine s posebnim osvrtom na kulturni &#382;ivot u Durmitorskoj partizanskoj republici',
'<i>Krsto Popivoda</i></br>Marksisti&#269;ko obrazovanje partizanskih kadrova',
'<i>Milika Pavlovi&#263;</i></br>Pjesme snova i otpora – Prometejsko i antejsko u revolucionarnim narodnim pjesmama durmitorskog kraja',
'<i>Bo&#353;ko Pu&#353;onji&#263;</i></br>Odjek Durmitorske partizanske republike u umjetnosti',
'<i>Milan Obradovi&#263;</i></br>Rad Partije na razvijanju obave&#353;tajno-bezbedonosnih i samoza&#353;titnih funkcija narodnooslobodila&#269;kog rata na podru&#269;ju Durmitorske partizanske republike',
'<i>Miju&#353;ko &#352;ibali&#263;</i></br>Sje&#263;anja na Peti bataljon &#268;etvrte proleterske crnogorske brigade',
'<i>Pero Krstaji&#263;</i></br>Od Durmitorske partizanske republike do Sutjeske',
'<i>Veljko Kova&#269;evi&#263;</i></br>Sje&#263;anje na Vojina Popovi&#263;a',
'<i>Dr &#272;uro Vujovi&#263;</i></br>O nekim aspektima polo&#382;aja i rada gerile u Crnoj Gori 1942&#8212;1943. godine',
'<i>Milorad M. Zarubica</i></br>Narodnooslobodila&#269;ki pokret u op&#353;tini &#381;abljak od jula 1942. do juna 1943. godine',
'<i>Ljubo &#381;arkovi&#263;</i></br>Gerila u Pivi (jun 1942 – april 1943)',
'<i>Slobodan Ne&#353;ovi&#263;</i></br>O jednom memorandumu dr Jovana &#272;onovi&#263;a',
'<i>Jovan Pavi&#263;evi&#263;</i></br>Ratni aerodrom na Njegovu&#273;i',
'<i>Mr Novica Bojovi&#263;</i></br>Narodnooslobodila&#269;ki rat u durmitorskom kraju od kapitulacije Italije do oslobo&#273;enja Crne Gore',
'<i>Slavko Stani&#353;i&#263;</i></br>Rad omladinskih organizacija durmitorskog kraja 1943&#8212;1945. godine',
'<i>Dr Radoje Pajovi&#263;</i></br>U&#269;e&#353;&#263;e crnogorskih &#269;etnika u Durmitorskoj operaciji u avgustu 1944. godine',
'<i>Mr Tomislav &#381;ugi&#263;</i></br>Ljudske i materijalne &#382;rtve durmitorskog kraja u toku rata',
'<i>Dr &#268;edomir Pejovi&#263;</i></br>Durmitorska partizanska republika 1941. u sa&#269;uvanim dokumentima',
'<i>Mr Milan Mati&#263;</i></br>Osvrt na objavljene izvore i literaturu o Durmitorskoj partizanskoj republici (1945&#8212;1977)',
'<i>Milivoje Lau&#353;evi&#263;</i></br>Poslijeratni razvoj durmitorskog kraja',
'Rezime',
'Summary',
'Sadr&#382;aj',
'Table of Contents'
);

?>
</head>
<body>
<br><b class=bigTitle>Grupa autora: DURMITORSKA PARTIZANSKA REPUBLIKA
</b>
<br>
<div class=BELITASTER>

<table width="100%"  border=1>

<br /><a href="749_0.pdf"><b class=bigTitle><u>&nbsp;&nbsp; * sadr&#382;aj (pdf) * &nbsp;&nbsp;</u></a></b></td></tr>

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
	$spx='<tr><td' . $boja[$ii] . '> <a href=' . '"' . '748.php?broj=' . $niz_strana[$ii-1] . '&go!=go!' . '"' . '>' . $naslov[$ii-1] . $sp4 . $niz_oznaka[$ii-1] . $slika[$ii-1] . $sp5;
	echo $spx;
	echo "\n";
}
?>
</TABLE>
</div>

</center>
</body>
</html>
