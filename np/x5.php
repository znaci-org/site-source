<?php

$servername = "localhost";
$username = "pozor_admin";
$password = "prdez";

function dan_u_nedelji($ddd,$mmm,$yyy) {
	$u = strtotime($yyy . "-" . $mmm . "-" . $ddd) . "\n\n";
	$ttt = date("l",$u);
	switch ($ttt) {
		case "Monday":
			return "PONEDEQAK";
			break;
		case "Tuesday":
			return "UTORAK";
			break;
		case "Wednesday":
			return "SREDA";
			break;
		case "Thursday":
			return "^ETVRTAK";
			break;
		case "Friday":
			return "PETAK";
			break;
		case "Saturday":
			return "SUBOTA";
			break;
		case "Sunday":
			return "NEDEQA";
			break;
		}
}

$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

$niz = bliske("1943-12-10",$konekcija);
echo $niz[0] . "," . $niz[1] . "," . $niz[2] . "," . $niz[3] . "," . $niz[4] . "," . $niz[5] . "," . $niz[6] . "," . $niz[7] . "," . $niz[8] . "," . $niz[9];

function bliske($datum,$konekcija) {
	$niz = array();
	$brojac = 0;
	$razlika = 0;
	$dtm_unix = strtotime($datum) / 86400;
	while ($brojac < 20) {
		$upit = "SELECT * FROM fotografije WHERE ABS(dat_unix - $dtm_unix) = $razlika";
		//echo $upit;
		$rezultat = mysqli_query($konekcija,$upit);
		while($red = mysqli_fetch_assoc($rezultat)) {
			$niz[$brojac] = $red['id'];
			$brojac++;
			if( $brojac == 20) { break; }
		}
		$razlika++;
	}
	//
	return $niz;
}

die;
$upit_0="SELECT * FROM fotografije";
$rezultat_0 = mysqli_query($konekcija,$upit_0);
while($red_0 = mysqli_fetch_assoc($rezultat_0)) {
  
  $datstr = $red_0['datum'];
  $pp1=substr($datstr,0,4);
  $pp2=substr($datstr,5,2);
  $pp3=substr($datstr,8,2);
  $u = strtotime($pp1 . "-" . $pp2 . "-" . $pp3) / 86400;
  $uu = strtotime($datstr) / 86400;
  $upit_z="UPDATE fotografije SET dat_unix=$uu WHERE id=" . $red_0['id'] . ";";
  $rezultat_z = mysqli_query($konekcija,$upit_z);
  echo $red_0['id'] . " - " . $u . " - " . $uu . "<br />";

}
die;
$konekcija = mysqli_connect($servername, $username, $password, "pozorista");
mysqli_set_charset($konekcija, 'utf8');

for($xx=25366;$xx<25382;$xx++) {
	$upit_2="SELECT * FROM r WHERE id=" . $xx;
	echo "<pre>".$upit_2 . "</pre>";
	$rezultat_2 = mysqli_query($konekcija,$upit_2);
	$rr =0;
	$utip="";
		while($red_2 = mysqli_fetch_assoc($rezultat_2)) {
		  $id=$red_2['id'];
		  $datstr=$red_2['dat_str'];
		  $vr_str=$red_2['vr_str'];
		  $pp1=substr($datstr,0,4);
		  $pp2=substr($datstr,5,2);
		  $pp3=substr($datstr,8,2);
		  $vv1=substr($vr_str,0,2);
		  $vv2=substr($vr_str,3,2);
		  echo ("$id,$datstr,$pp1,$pp2,$pp3,$vv1,$vv2 \n" . "<br />");
		  $upti = "UPDATE r SET dd='$pp3', mm='$pp2', yy='$pp1', hh='$vv1', min='$vv2' WHERE id='$id' " . ";";
		  echo "<pre>".$upti . "</pre>";
		  $rezultat_ = mysqli_query($konekcija,$upti);
		  echo ($upti . "<br />");
		}
}

die;

$daleki = "http://www.pozorista.com/site/img/bilten/r_id.txt";

$daleki = "ftp://pozkarte_0:Zbu5Wyh8@pozorista.com/site/img/bilten/r_id.txt"; 

$daleki = "c_svi.txt"; 
$bliski = "c_fale.txt";

if(file_exists($daleki)) {
    echo "File Found."; }
$openedfile = fopen($daleki, "r");
$openedfile2 = fopen($bliski, "w");
$fileContents = fread($openedfile, filesize($daleki));
//fclose($handle);
//echo "<pre>".$fileContents."</pre>";
//echo "<pre>".$fileContents[0]."</pre>";
$niz = explode(",",$fileContents);
//$openedfile2 = fopen($bliski, "w");
//for($xx=0;$xx<count($niz);$xx++) {
	$upit_2="SELECT * FROM cene";
	$rezultat_2 = mysqli_query($konekcija,$upit_2);
	while($red_2 = mysqli_fetch_assoc($rezultat_2)) {
		$id=$red_2['id'];
		$uspeh = array_search($id,$niz);
		if($uspeh === false) {
			echo "<pre>" . $id . "</pre>";
		}
	
	}
//}
fclose($daleki);
fclose($bliski);
die;


for($xx=0;$xx<count($niz);$xx++) {
	$upit_1="SELECT * FROM r WHERE id=" . $niz[$xx];
	//echo "<pre>".$xx . "</pre>";
	$rezultat_1 = mysqli_query($konekcija,$upit_1);
	$red_1 = mysqli_fetch_assoc($rezultat_1);
	$iid=$red_1['id'];
	if(!$iid) { 

		$upit_2="SELECT * FROM r WHERE id=" . $niz[$xx] . "$iid order by id";
		echo "<pre>".$upit_2 . "</pre>";
		$rezultat_2 = mysqli_query($konekcija,$upit_2);
		$rr =0;
		$utip="";
		while($red_2 = mysqli_fetch_assoc($rezultat_2)) {
		  $id=$red_2['id'];
		  $datstr=$red_2['dat_str'];
		  $vr_str=$red_2['vr_str'];
		  $pp1=substr($datstr,0,4);
		  $pp2=substr($datstr,5,2);
		  $pp3=substr($datstr,8,2);
		  $vv1=substr($vr_str,0,2);
		  $vv2=substr($vr_str,3,2);
		  echo ("$id,$datstr,$pp1,$pp2,$pp3,$vv1,$vv2 \n" . "<br />");
		  $upti = "UPDATE r SET dd='$pp3', mm='$pp2', yy='$pp1', hh='$vv1', min='$vv2' WHERE id='$id' " . ";";
		  $rezultat_ = mysqli_query($konekcija,$upti);
		  echo ($upti . "<br />");
		}
	
	
		//fwrite($openedfile2, $niz[$xx] . ","); 
	}
}
//fclose($openedfile2);

die;

$upit_1="SELECT * FROM r WHERE id>24987 AND mesto=6 AND predstava>0  AND id<>25245 order by mm,dd";
$rezultat_1 = mysqli_query($konekcija,$upit_1);
$openedfile = fopen($_SERVER["DOCUMENT_ROOT"] . '/clan11.txt', "w");
while($red_1 = mysqli_fetch_assoc($rezultat_1)) {
  $iid=$red_1['id'];
  $ddx=$red_1['dd'];
  $mmx=$red_1['mm'];
  $yyx=$red_1['yy'];
  $hhx=$red_1['hh'];
  $minx=$red_1['min'];
  $upit_2="SELECT * FROM cene WHERE dogadjaj=$iid";
  $rezultat_2 = mysqli_query($konekcija,$upit_2);
  $red_2 = mysqli_fetch_assoc($rezultat_2);
  $preds=$red_1['predstava'];
  $upit_3="SELECT * FROM predstave WHERE id=$preds";
  $rezultat_3 = mysqli_query($konekcija,$upit_3);
  $red_3 = mysqli_fetch_assoc($rezultat_3);
  $predx=$red_3['naslyuscii'];
  $mesto=$red_1['mesto'];
  $skretn=$red_1['gled'];
  $upit_4 ="SELECT * FROM pozorista WHERE id=$mesto";
  $rezultat_4 = mysqli_query($konekcija,$upit_4);
  $red_4 = mysqli_fetch_assoc($rezultat_4);
  $sx=$red_4['naziv2'];
  $punac=$red_2['punacena'];
  $nsl=$red_3['naslyuscii'];
  //echo ("$preds,$nsl,$punac,$ddx,$mmmx,$yyx,$hhx,$minx \n" . "<br />");
  $blankovi = "        ";
  $blankovix = chr(13) . $blankovi;
  if($minx == "0") { $minx = "00"; }
  
 if($skretn == 5) {
  for($xx=1;$xx<13;$xx++) {
    $unutra = $blankovi . $predx . $blankovix . $sx . $blankovix . "PARTER LEVO RED 5 MESTO " . $xx . $blankovix . dan_u_nedelji($ddx,$mmx,$yyx) . ", $ddx.$mmx.$yyx U $hhx:$minx" . $blankovix . "CENA: " . $punac . ",00 DINARA" . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) ;
    $unutrax .= $unutra;
    echo ("$unutra ***$preds***\n" . "<br />");
  }
  for($xx=12;$xx>0;$xx--) {
    $unutra = $blankovi . $predx . $blankovix . $sx . $blankovix . "PARTER DESNO RED 5 MESTO " . $xx . $blankovix . dan_u_nedelji($ddx,$mmx,$yyx) . ", $ddx.$mmx.$yyx U $hhx:$minx" . $blankovix . "CENA: " . $punac . ",00 DINARA" . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) ;
    $unutrax .= $unutra;
    //echo ("$unutra, $unutrax \n" . "<br />");
  }
 } else {
  for($xx=1;$xx<14;$xx++) {
    $unutra = $blankovi . $predx . $blankovix . $sx . $blankovix . "PARTER LEVO RED 6 MESTO " . $xx . $blankovix . dan_u_nedelji($ddx,$mmx,$yyx) . ", $ddx.$mmx.$yyx U $hhx:$minx" . $blankovix . "CENA: " . $punac . ",00 DINARA" . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) ;
    $unutrax .= $unutra;
    echo ("$unutra ***$preds***\n" . "<br />");
  }
  for($xx=12;$xx>0;$xx--) {
    $unutra = $blankovi . $predx . $blankovix . $sx . $blankovix . "PARTER DESNO RED 6 MESTO " . $xx . $blankovix . dan_u_nedelji($ddx,$mmx,$yyx) . ", $ddx.$mmx.$yyx U $hhx:$minx" . $blankovix . "CENA: " . $punac . ",00 DINARA" . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) . chr(13) ;
    $unutrax .= $unutra;
    //echo ("$unutra, $unutrax \n" . "<br />");
  }

}   
        //if($openedfile = fopen("e:/znaci/aaa.jpg", "w")) {echo "<br><br>*<br>imanešto!<br>*<br>";};
		//echo "<br><br>*<br>" . $openedfile . "<br>*<br>";



}
$contentx = $unutrax;
echo "$contentx<br>";
$uspeh=fwrite($openedfile, $contentx);
echo $uspeh;

fclose($openedfile);


die;

$upit_1="SELECT * FROM r WHERE id>25245 order by id";
$rezultat_1 = mysqli_query($konekcija,$upit_1);
$rr =0;
$utip="";
while($red_1 = mysqli_fetch_assoc($rezultat_1)) {
  $id=$red_1['id'];
  $datstr=$red_1['dat_str'];
  $vr_str=$red_1['vr_str'];
  $pp1=substr($datstr,0,4);
  $pp2=substr($datstr,5,2);
  $pp3=substr($datstr,8,2);
  $vv1=substr($vr_str,0,2);
  $vv2=substr($vr_str,3,2);
  echo ("$id,$datstr,$pp1,$pp2,$pp3,$vv1,$vv2 \n" . "<br />");
  $upti = "UPDATE r SET dd='$pp3', mm='$pp2', yy='$pp1', hh='$vv1', min='$vv2' WHERE id='$id' " . ";";
  $rezultat_ = mysqli_query($konekcija,$upti);
  echo ($upti . "<br />");
}

die;
$upit_1="SELECT * FROM r WHERE id>24987 order by id";
$rezultat_1 = mysqli_query($konekcija,$upit_1);
$rr =0;
$utip="";
while($red_1 = mysqli_fetch_assoc($rezultat_1)) {
  $id=$red_1['id'];
  $datstr=$red_1['dat_str'];
  $vr_str=$red_1['vr_str'];
  $pp1=substr($datstr,0,4);
  $pp2=substr($datstr,5,2);
  $pp3=substr($datstr,8,2);
  $vv1=substr($vr_str,0,2);
  $vv2=substr($vr_str,3,2);
  echo ("$id,$datstr,$pp1,$pp2,$pp3,$vv1,$vv2 \n" . "<br />");
  $upti = "UPDATE r SET dd='$pp3', mm='$pp2', yy='$pp1', hh='$vv1', min='$vv2' WHERE id='$id' " . ";";
  $rezultat_ = mysqli_query($konekcija,$upti);
  echo ($upti . "<br />");
}

die;


$upit_t="SELECT UNIX_TIMESTAMP(CURRENT_TIMESTAMP) AS tt";
$rezultat_t = mysqli_query($konekcija,$upit_t);
$red_t = mysqli_fetch_assoc($rezultat_t);
$sekund=$red_t['tt'] + 7200;
$danas=intval($sekund / 86400);
$ostatak=$sekund-(86400 * $danas);
//echo ($ostatak);

?>
