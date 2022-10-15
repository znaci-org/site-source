<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>registar žrtava komisije za tajne grobnice ubijenih posle 12. septembra 1944.</title>
<SCRIPT LANGUAGE="JavaScript">
<!--

function prenos() {
var x = document.getElementById("s_1");
var txt = "";
for (var i = 0; i < x.length; i++)
  {
  txt = txt + x.options[i].text + "<br>";
  }
  document.getElementById("cilj").innerHTML = txt;
}
function objava() {
	alert ('!');
}

-->
</SCRIPT>
<style type="text/css">
<!--
@import url(/normal.css);
-->
</style>

<?php
set_time_limit (1200);
$ciscenje=0;
$ciscenje_g=0;
$broj_rezultata=0;
$gradovi = array();
$opstine=array();
$rktgovi=array();
$u_opstini=array();
$rktgovi2=array();
/*$naps=array();
$dods=array();
$p_is=array();*/

$brojac=0;
//$uslow = array();
function skup_reset($konekcija) {
	global $koje_ip;
	$upit="DELETE FROM cv_tmp_" . $koje_ip;
	mysqli_query($konekcija,$upit);
	return 1;
}

function upis($elem,$konekcija,$scc,$flag,$koje) {
	global $koje_ip;
	if (!$flag) {
		$upit_max="SELECT MAX(idd) AS maxxx FROM cv_tmp_" . $koje_ip . ";";
		$xm = mysqli_query($konekcija,$upit_max);
		$xmm = mysqli_fetch_assoc($xm);
		$xmmm = $xmm['maxxx']+1;
		if ($scc) { $pokolj=ispis($xmmm,$konekcija); }
	}
	$kupit="SELECT * FROM cv_tmp_" . $koje_ip . " WHERE rktg=" . $elem . ";";
	//echo $kupit . " ***<br>";
	$rkupit=mysqli_query($konekcija,$kupit);
	$rrkupit=mysqli_fetch_assoc($rkupit);
	$ima=$rrkupit['rktg'];
	if (!$ima) {
		$upit="INSERT INTO cv_tmp_" . $koje_ip . " (rktg) VALUES (" . $elem . ");";
		//echo $upit . " +++<br>";
		mysqli_query($konekcija,$upit);
	}
	return 1;
}

function ispis($dokle,$konekcija) {
	global $koje_ip;
	$upit_cisti_staro="DELETE FROM cv_tmp_" . $koje_ip . " WHERE idd<" . $dokle . ";";
	mysqli_query($konekcija,$upit_cisti_staro);
	return 1;
}
$konekcija = mysqli_connect("", getenv('MYSQL_UN'), getenv('MYSQL_PW'), getenv('MYSQL_DB'));
mysqli_set_charset($konekcija, 'utf8'); 

if (mysqli_connect_errno()) {
	echo "Ne mogu da se povežem sa bazom. ";
	exit();
}


function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$koje_ip=get_client_ip();
$koje_ip=str_replace ('.','_',$koje_ip);
if (isset($koje_ip)) {
	$upit_x="INSERT INTO cv_ipaddr (adr) VALUES (" . chr(39) . $koje_ip . chr(39) . ");";
	$xox = mysqli_query($konekcija,$upit_x);
}

$upit="CREATE TABLE IF NOT EXISTS `cv_tmp_" . $koje_ip . "` (`idd` bigint(20) NOT NULL AUTO_INCREMENT,`rktg` bigint(20) NOT NULL,PRIMARY KEY (`idd`)) ENGINE=InnoDB  DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci AUTO_INCREMENT=0;";
//echo $upit; //**************
$xoxo = mysqli_query($konekcija,$upit);

$uslow="SELECT * FROM cv_po_opstinama";
$uslow_exe=mysqli_query($konekcija,$uslow);
while (1) {
	$uslow_row=mysqli_fetch_assoc($uslow_exe);
	if (!$uslow_row) {break;}
	$brojac++;
	$opstine[$brojac]=$uslow_row['opstina'];
	$rktgovi[$brojac]=$uslow_row['rktg'];
}
$brojac=0;
$uslow="SELECT * FROM cv_tmp_" . $koje_ip;
$uslow_exe=mysqli_query($konekcija,$uslow);
while (1) {
	$uslow_row=mysqli_fetch_assoc($uslow_exe);
	if (!$uslow_row) {break;}
	$brojac++;
	$rktgovi2[$brojac]=$uslow_row['rktg'];
}
$brojac=0;
/*$uslow="SELECT * FROM cv_zrtve";
$uslow_exe=mysqli_query($konekcija,$uslow);
while (1) {
	$uslow_row=mysqli_fetch_assoc($uslow_exe);
	if (!$uslow_row) {break;}
	$brojac++;
	$rktgovi2[$brojac]=$uslow_row['rktg'];
	$naps[$brojac]=$uslow_row['nap'];
	$dods[$brojac]=$uslow_row['dod'];
	//$p_is[$brojac]=$uslow_row['p_i'];
}
*/
function f_select($konekcija,$pp,$qq) {
	switch ($qq) {
		case 1:
			$naslov="kvalifikacija";
			break;
		case 2:
			$naslov="potkvalifikacija";
			break;
		case 3:
			$naslov="nacionalnost";
			break;
		case 4:
			$naslov="status";
			break;
		case 5:
			$naslov="zemlja rođenja";
			break;
		case 6:
			$naslov="način smrti";
			break;
	}
	$niz="<option name=" . chr(39) . "$qq" . "n" . chr(39) . " value=" .  chr(39) . "0" . chr(39) . ">" . $naslov . "</option>\n";
	$uslov="SELECT * FROM $pp ORDER by id";
	$rezultat = mysqli_query($konekcija,$uslov);
	for ($xx=1;$xx<100;$xx++) {
		$red = mysqli_fetch_assoc($rezultat);
		if (!$red) {break;}
		$nizz= "<option name=" . chr(39) . "$qq" . "n" . chr(39) . " value=" .  chr(39) . "$xx" . chr(39) . ">" . $red['izraz'] . "</option>\n";
		$niz=$niz . $nizz;
	}
	return $niz;
}
function prikazx($konekcija) {
	$spsk_oo="<table>\n<tr><td class=smtxt>\n";
	$oo_count=0;
	$upit_oo="SELECT * FROM cv_okruzi ORDER BY fajl;";
	$xoo = mysqli_query($konekcija,$upit_oo);
	while (1) {
		$redoo = mysqli_fetch_assoc($xoo);
		if (!$redoo) {break;}
		$oo_count++;
		if (($oo_count % 61)==0) {
			$prekid="</td><td class=smtxt vAlign=top>";
		} else {
			$prekid="<br>";
		}
		$broj_rezultata++;
		$spsk_oo_tmp="<input type=" . chr(34) . "checkbox" . chr(34) . " name=" . chr(34) . "oo[]" . chr(34) . " value=" . chr(34) . $redoo['fajl'] . chr(34) . ">" . $redoo['naziv'] . $prekid . "\n";
		if ($broj_rezultata<2001) {$spsk_oo=$spsk_oo . $spsk_oo_tmp;}
	}
	$spsk_oo=substr($spsk_oo,0,strlen($spsk_oo)-28);
	$spsk_oo=$spsk_oo . "\n</tr></table>\n";
	return $spsk_oo;
}
function prikazz($konekcija) {
	global $koje_ip;
	$spsk="<table>\n<tr><td>\n";
	$rec_count=0;
	$upit="SELECT DISTINCT rktg FROM cv_tmp_" . $koje_ip;
	$rzltt = mysqli_query($konekcija,$upit);
	while (1) {
		$redx = mysqli_fetch_assoc($rzltt);
		if (!$redx) {break;}
		$rec_count++;
		$upit2="SELECT * FROM cv_zrtve WHERE rktg=" . $redx['rktg'] . ";";
		$rzltt2 = mysqli_query($konekcija,$upit2);
		$redx2 = mysqli_fetch_assoc($rzltt2);
		$spsk_tmp="<tr><td align=right>" . $rec_count . ".</td><td><u><a href=" . chr(34) . "http://otvorenaknjiga.komisija1944.mpravde.gov.rs/cr/okrug/00/70246/" . $redx2['rktg'] . ".htm" . chr(34) . " target=new>" . $redx2['rktg'] . "</a></u></td><td>" . $redx2['p_i'] . " (" . $redx2['g_r'] . "), " . $redx2['z_o'] . "</td><td>" . $redx2['nap'] . " * " . $redx2['dod'] . "</td></tr>\n";
		if ($broj_rezultata<2000) {$spsk=$spsk . $spsk_tmp;}
		$broj_rezultata++;
	}
	$spsk=$spsk . "\n</table>\n";
	return $spsk;
}

if ($_POST['g_r']) {
	$g_r_0=" AND g_r=0 ";}
if ($_POST['g_r_1']) {
	$g_r_1=$_POST['g_r_1'];}
if ($_POST['g_r_2']) {
	$g_r_2=$_POST['g_r_2'];}

if($g_r_1) {$g_r_1 = " AND g_r<" . $g_r_1;}
if($g_r_2) {$g_r_2 = " AND g_r>" . $g_r_2;}
//echo " * " . $g_r_1 . " * " , $g_r_2 . "<br>";
$q_str="";
$srrc="cv_zrtve";
$srrc_g="cv_tmp_" . $koje_ip;
if ($_POST['vrsta']) {
	$vrstx=$_POST['vrsta'];
	//echo "----------" . $vrstx;
	if ($vrstx=="baza") { $srrc="cv_zrtve"; }
	if ($vrstx=="rezult") {
		$srrc=" (cv_tmp_" . $koje_ip . " inner join cv_zrtve on cv_tmp_" . $koje_ip . ".rktg=cv_zrtve.rktg) ";
		$ciscenje=1;
	}
}
if ($_POST['vrsta_g']) {
	$vrstx=$_POST['vrsta_g'];
	//echo "----------" . $vrstx;
	if ($vrstx=="baza") { $srrc_g="cv_zrtve"; }
	if ($vrstx=="rezult") {
		$srrc_g=" (cv_tmp_" . $koje_ip . " inner join cv_zrtve on cv_tmp_" . $koje_ip . ".rktg=cv_zrtve.rktg) ";
		$ciscenje_g=1;
		//echo "ovde sam se upisao " . $ciscenje_g . "<br>";
	}
}
if ($_POST['prikaz']) {
	$redund=skup_reset($konekcija);
	$iiii="&nbsp;";
}
if ($_POST['s_1']) {
	$s_1=$_POST['s_1'];
	$q_kval= " AND cv_zrtve.kv_num=$s_1";
}
if ($_POST['s_2']) {
	$s_2=$_POST['s_2'];
	$q_pkv= " AND cv_zrtve.pkv_num=$s_2";
}
if ($_POST['s_3']) {
	$s_3=$_POST['s_3'];
	$q_nc= " AND cv_zrtve.nc_num=$s_3";
}
if ($_POST['s_4']) {
	$s_4=$_POST['s_4'];
	$q_st= " AND cv_zrtve.st_num=$s_4";
}
if ($_POST['s_5']) {
	$s_5=$_POST['s_5'];
	$q_zr= " AND cv_zrtve.z_r_num=$s_5";
}
if ($_POST['s_6']) {
	$s_6=$_POST['s_6'];
	$q_ns= " AND cv_zrtve.n_s_num=$s_6";
}

$aa1=$_POST['z_o'];
$aa2=$_POST['nap'];
$aa3=$_POST['dod'];

$q_str=$q_kval . $q_pkv . $q_nc . $q_st . $q_zr . $q_ns . $g_r_0 . $g_r_1 . $g_r_2;
if (strlen($q_str)>5) { $q_str=substr($q_str,4);}

if($aa1) {
	$aaa1=" OR cv_zrtve.z_o LIKE " . chr(39) . "%" . $aa1 . "%" . chr(39) . " ";
}
if($aa2) {
	$aaa2=" OR cv_zrtve.nap LIKE " . chr(39) . "%" . $aa2 . "%" . chr(39) . " ";
}
if($aa3) {
	$aaa3=" OR cv_zrtve.dod LIKE " . chr(39) . "%" . $aa3 . "%" . chr(39) . " ";
}

$aaaa=$aaa1 . $aaa2 . $aaa3;
if (strlen($q_str)<5) { $aaaa=substr($aaaa,3);}
$q_str = $q_str . $aaaa;

for ($ii=0;$ii<183;$ii++)  {
	if (!$_POST['oo'][$ii]) {break;}
	$gradovi[$ii]=$_POST['oo'][$ii];
}
$gradovi_broj = $ii;
//echo $gradovi_broj;
$gradovix=array(70017,70025,70033,70041,70050,70068,70076,70084,70092,70122,70157,70165,70173,70190,70238,70246,70262,70289,70297,70319,70327,70335,70343,70351,70360,70378,70386,70394,70408,70416,70424,70432,70459,70467,70475,70483,70491,70505,70513,70521,70530,70548,70556,70564,70572,70599,70602,70629,70637,70645,70653,70661,70670,70688,70696,70700,70718,70726,70734,70742,70769,70777,70785,70793,70807,70815,70823,70831,70840,70866,70874,70882,70904,70912,70939,70947,70955,70963,70971,70980,70998,71005,71013,71021,71030,71048,71056,71064,71072,71099,71102,71129,71137,71145,71153,71161,71170,71188,71196,71200,71218,71226,71234,71242,71269,71277,71285,71331,71340,80012,80039,80047,80055,80063,80071,80080,80098,80101,80110,80128,80136,80144,80152,80179,80187,80195,80209,80217,80225,80233,80241,80250,80268,80276,80284,80292,80306,80314,80322,80349,80357,80365,80373,80381,80390,80403,80411,80420,80438,80446,80454,80462,80489,80497,90018,90026,90034,90042,90069,90085,90093,90107,90115,90123,90131,90140,90158,90166,90182,90204,90212,90239,90247,90255,90263,90271,90280,90298,90301,90310,90328,90336,90352);

/*for ($ii=0;$ii<183;$ii++) {
	echo $ooo[$ii] . "-<br>";
}*/

if ($gradovi_broj) {
	$rl=0;
	$flag=0;
	$uspeh=0;
	for ($ii=0;$ii<$gradovi_broj;$ii++)  {
		$u_opstini=array_keys($opstine, $gradovi[$ii]);
		$rr=0;
		while (1) {
			if (!$u_opstini[$rr]) {break;}
			if ($vrstx=="baza") {$arg=$rktgovi[$u_opstini[$rr]];}
			if ($vrstx=="rezult") {
				$xx=1;
				while (1) {
					if (!$rktgovi2[$xx]) {break;}
					if (in_array($rktgovi[$u_opstini[$rr]],$rktgovi2,true)) {$arg=$rktgovi[$u_opstini[$rr]]; break;} 
					$xx++;
					}
				}
			$rr++;
			if ($arg) {upis($arg,$konekcija,$ciscenje_g,$flag,2); $flag=1; $uspeh=1;}
			}
		}
	if (!$uspeh) {
		echo "in";
		$redund=skup_reset($konekcija);
		$iiii="&nbsp;";
	}
}
if ($_POST['s_1'] OR $_POST['s_2'] OR $_POST['s_3'] OR $_POST['s_4'] OR $_POST['s_5'] OR $_POST['s_6'] OR $_POST['z_o'] OR $_POST['nap'] OR $_POST['dod'] OR $_POST['dod'] OR $_POST['g_r_1'] OR $_POST['g_r_2'] OR $_POST['g_r']) {
	$rl=0;
	$flag=0;
	$s_1=$_POST['s_1'];
	//$uslov="SELECT * FROM ((cv_po_opstinama INNER JOIN cv_okruzi ON cv_okruzi.fajl=cv_po_opstinama.opstina) INNER JOIN " . $srrc . " ON cv_zrtve.rktg=cv_po_opstinama.rktg) WHERE " . $q_str . ";";
	$uslov="SELECT * FROM " . $srrc . " WHERE " . $q_str . ";";
	$rzltt3 = mysqli_query($konekcija,$uslov);
	while (1) {
		$redx3 = mysqli_fetch_assoc($rzltt3);
		if (!$redx3) {
			if ($ciscenje) {
				if ($rl==0) {
					$upit_cisti_sve="DELETE FROM cv_tmp_" . $koje_ip . ";";
					mysqli_query($konekcija,$upit_cisti_sve);
				}
			}
			break;
		}
		$rl++;
		upis($redx3['rktg'],$konekcija,$ciscenje,$flag,1);
		$flag=1;
	}
}

?>
</head>
<body>
<div class=bigbigTitle_c>registar žrtava komisije za tajne grobnice ubijenih posle 12. septembra 1944.</div>
<table width="100%" border="1">
<tr>
<td colspan="2" style="background-color:#90A0A0">
<center>
<table border="2">
<tr>
<td>
<form name="f3" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<input type='submit' name="prikaz" value="reset">
</form>
</td><td> broj rezultata: <?php 
	$uslov_b="SELECT COUNT('rktg') AS broj_rez FROM cv_tmp_" . $koje_ip . ";";
	$br = mysqli_query($konekcija,$uslov_b);
	$brr = mysqli_fetch_assoc($br);
	$broj_rezultata = "<b class=bigbigTitle_r>" . $brr['broj_rez'] . "</b>";
	if ($broj_rezultata==0) {$iiii="&nbsp;";}
	echo $broj_rezultata; ?>
</td><td> 
<form name="f4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<input type='submit' name="prikazzz" value="prikaži rezultate">
</form>
</td></tr>
</table>
</center>
</td>
</tr>
<tr>
<td vAlign=top>
<table border="2">
<tr>
<td vAlign=top style="background-color:#C0D0D0">
<form name="f1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<select name='s_1'">
<?php echo f_select($konekcija,'cv_kvalifikacije',1);?>
</select>
<center>- (i) -</center>
<br>
<select name='s_2'">
<?php echo f_select($konekcija,'cv_pkv_num_izraz',2);?>
</select>
<center>- (i) -</center>
<br>
<select name='s_3'">
<?php echo f_select($konekcija,'cv_nc_num_izraz',3);?>
</select>
<center>- (i) -</center>
<br>
<select name='s_4'">
<?php echo f_select($konekcija,'cv_status',4);?>
</select>
<center>- (i) -</center>
<br>
<select name='s_5'">
<?php echo f_select($konekcija,'cv_z_r_num_izraz',5);?>
</select>
<center>- (i) -</center>
<br>
<select name='s_6'">
<?php echo f_select($konekcija,'cv_n_s_num_izraz',6);?>
</select>
<br>
<center>
<table border="2"><tr><td>
<input type="radio" name="vrsta" value="baza">dodaj iz baze</td><td>
<input type="radio" name="vrsta" value="rezult">izdvoj iz rezultata
</td></tr>
</table>
<br>
<br>
<br><input type="text" name="z_o" value=""> - <u>(ili)</u> u polju "zanimanje / obrazovanje"
<br>
<br>
<br><input type="text" name="nap" value=""> - <u>(ili)</u> u polju "napomena"
<br>
<br>
<br><input type="text" name="dod" value=""> - <u>(ili)</u> u polju "izvor - arhiv"
<br>
<br>
<input type='submit' name="ff1" value="traži po uslovu"><center>
<br>
<br>- godina rođenja nije upisana <input type="radio" name="g_r" value="rezult">
<br>
<br>
<br>- <u>(ili)</u> godina rođenja pre <input type="text" name="g_r_1" value="">
<br>
<br>
<br>- <u>(i)</u> godina rođenja posle (nije uključeno) <input type="text" name="g_r_2" value="">
<form name="f2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
</center>
</td></tr></table>
<br>
<table border="2">
<tr>
<td vAlign=top style="background-color:#C0D0D0">
<center>
<input type='submit' name="ff2" value="u gradovima"><center>
<br>
<center>
<table border="2"><tr><td>
<input type="radio" name="vrsta_g" value="rezult">izdvoj iz rezultata
<input type="radio" name="vrsta_g" value="baza">dodaj iz baze</td><td>
</td></tr>
</table>
<br>
<?php echo prikazx($konekcija); ?>
</form>
</center>
</td></tr></table>

</td>
<td id='cilj' width="70%" vAlign=top  style="background-color:#E0FFE0"><?php echo $iiii; ?><?php if ($_POST['prikazzz']) {echo prikazz($konekcija);} else {echo "&nbsp;";}?>
</td>
</tr>
</table>
</body>
</html>
