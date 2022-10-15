<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

if ($_POST['sta1']) {
	$sta1= $_POST['sta1'];
}
//else { $sta1= chr(32) . chr(32) . chr(32);
//}
if ($_POST['sta2']) {
	$sta2= $_POST['sta2'];
}
//else { $sta2= chr(32) . chr(32) . chr(32);
//}

if ($sta1 or $sta2) {
	$get_upit=1;
}
else {
	$get_upit=0;
}

$upit3="SELECT sum(maxx_i) AS sumof_maxxi FROM roll_s" . ";";
$rezultat3 = mysqli_query($konekcija,$upit3);
$red3 = mysqli_fetch_assoc($rezultat3);
//print_r($red3);
$totalpages=$red3['sumof_maxxi'];

$upit3="SELECT count(id) as countof_id FROM roll_s" . ";";
$rezultat3 = mysqli_query($konekcija,$upit3);
$red3 = mysqli_fetch_assoc($rezultat3);
//print_r($red3);
$totalrolls=$red3['countof_id'];

$upit3="SELECT count(id) as countof_id FROM roll_c WHERE tip=1" . ";";
$rezultat3 = mysqli_query($konekcija,$upit3);
$red3 = mysqli_fetch_assoc($rezultat3);
//print_r($red3);
$totalnotes=$red3['countof_id'];
?>
<script type="text/javascript">

function prozor() {
	hocemoli = document.getElementById("lanser").value;
	str_1 = document.getElementById("a01").value;
	str_2 = document.getElementById("a02").value;
	url_x= "/ok/T317.php";
	if (str_1.length>0 || str_2.length>0) {upitnik="?";} else {upitnik="";}
	if (upitnik=="?") {
		url_x=url_x + upitnik;
		if (str_1.length>0) {
			url_x=url_x + "sta1=" + str_1;
			if (str_2.length>0) { 
				url_x=url_x + "&" + "sta2=" + str_2;}
				else {
					url_x=url_x + "&" + "sta2=" + "!!!";
				}
		}
		else {
			url_x=url_x + "sta2=" + str_2 + "&" + "sta1=" + "!!!";
		}
		}
	//url_x= "/ok/T317.php?sta1=" + str_1 + "&sta2=" + str_2;
	//alert(hocemoli);
	//alert(url_x + "*" + str_1 + "*" + str_2);
	if (hocemoli==1) {
		window.open(url_x);
	}
}

</script>
</head>

<body onload="prozor()">
<div class=BELITASTER>
<table width="100%" border=1>
<tr>
<td style="background-color: #606060" colspan=2>
<font size="2"><span class=bigbigTitleW>- dokumenti i knjige o drugom svetskom ratu na teritoriji Jugoslavije i povezanim zbivanjima</span></font>
</td></tr>

<tr>
<td style="background-color: #606060" colspan=2>
<font size="2"><span class=bigbigTitleW>- aktuelno</span></font>
</td></tr>
Pretraga kroz beleške uz nemačke dokumente sa mikrofilmova National Archive Washington<br />
Documents from National Archive Washington - notes search<br />
Dostupno listova dokumenata (total pages): <?php echo $totalpages; ?> - od toga tagovano (total notes): <?php echo $totalnotes; ?></p>
<TABLE border="1">
<TR><TD>
<form method="POST" id="f17" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	search string 1: <input type="text" id="a01" name="sta1" value="<?php echo $sta1;?>"><br>
	search string 2: <input type="text" id="a02" name="sta2" value="<?php echo $sta2;?>"><br>
	<input type="hidden" id="lanser" value="<?php echo $get_upit;?>">
	<input type="submit" value="traži!">
</td>
<td>
Vojnoistorijski institut je početkom šezdesetih godina dobio od <a href="http://www.archives.gov/" target="new">National Archive</a> nemačke zaplenjene dokumetne koji se odnose na Jugoslaviju u obliku mikrofilmova. 
 To je dovelo do značajnog skoka u kvalitetu istoriografskog istraživanja u Jugoslaviji. Oko 2.000 dokumenata je prevedeno i objavljeno u ediciji Zbornika Vojnoistorijskog instituta (takođe dostupnih na sajtu, videti linkove dole).
 Međutim, radilo se o redakcijskom izboru, a rolne su bile samo ograničeno dostupne iz tehničkih razloga, pa se često postavljalo pitanje reprezentativnosti i pouzdanosti. 
 S obzirom da je danas dostupna velika masa originalnih nemačkih dokumenata iz WW2 u digitalnom formatu, i to ne u obliku nekog redakcijskog izbora, nego svi redom, u obliku kompletnih rolni, i s obzirom da
 interesovanje postoji, pravljenje neke vrste javnih beleški o sadržaju pojavilo se kao logična i korisna ideja koja može olakšati navigaciju i ubrzati pretragu. Ovaj posao je tek u začetku
 - na sajtu je trenutno dostupno ukupno <b class=bigbigTitle_c><?php echo $totalrolls; ?></b> kompletnih rolni dokumenata, sa ukupno <b class=bigTitle><?php echo $totalpages; ?></b> listova dokumenata, 
 a broj beleški uz dokumente je trenutno svega <b class=bigbigTitle_c><?php echo $totalnotes; ?></b> (dakle oko 1%) - ali nadamo se značajnom porastu s vremenom.<br />
 Beleške radi više istoričara, pa ima dosta stilskih i sadržajnih nedoslednosti. Neka imena navedena su u s-h obliku, a neka u nemačkom originalu, pa je stoga dobra ideja izbegavati dijakritike, ili ponoviti traženu reč u obliku sa i bez dijakritika.
 Pretraga kroz beleške radi tako što unesete traženu reč (ili deo reči) u jedno polje, a u drugo unesete alternativni oblik pisanja tog pojma, ili neki drugi pojam, i pritisnete dugme "traži!".
 Pretraga je "case sensitive", odnosno, ako reč u belešci počinje velikim slovom, a Vi je ukucate malim slovima, ta beleška neće biti uvrštena u rezultat. U rezultate će biti uvrštene sve beleške u kojima se nalazi bilo koja od unetih reči. Niz rezultata sa slikama odgovarajućih dokumenata će biti prikazan u novom tabu odnosno prozoru.<br />
 Par saveta: S obzirom na aktuelnost, najtraženiji su dokumenti koji se odnose na DM-četnike. Trenutno takvih beleški ima 430. Ako Vas npr zanimaju izveštaji o gubicima, njih u dokumentima ima veoma mnogo, ali su u beleškama slabije zastupljeni.
 Pri tome treba imati u vidu da se ponekad pojavljuju sa rečju "mrtvih", "mrtav", "poginuli", i vrijantama, a ima ih priličan broj koji su obeleženi sa "KIA" - profesionalna deformacija istoričara rata
 <img src="/ok/smile.gif">.
</td>
</tr>
</TABLE>
</form>


</td></tr>
</table>
