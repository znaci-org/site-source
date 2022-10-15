<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
@import url(/normal.css);
-->
</style>
</head>
<body>
<form name="input1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" id='f2'>
<table width="100%"  border=1>
<tr><td class=tamnozeleno colspan=2><center><form method="GET" id="f1" action="<?php echo $_SERVER['PHP_SELF']; ?>"><center><table><tr><td><input type="submit" name="pripadnost" value="knjiga I"></td>
<td class=dubokozeleno><input type="submit" name="pripadnost" value="knjiga II"></td>
<td><input type="submit" name="pripadnost" value="knjiga III"></td>
</tr></table></center></form>
<?php
$knjige=array('knjiga I'=>745,'knjiga II'=>746,'knjiga III'=>747);
if (isset($_GET['pripadnost'])) {
	$tmpm=$_GET['pripadnost'];
	echo $tmpm . "<br>";
	echo $knjige['knjiga+III'] . " * <br>";
	$broj_knjige = $knjige[$tmpm];
	echo " 1. " . $broj_knjige;
} else {
	$broj_knjige = 745;
}
echo " 2. " . $knjige[$broj_knjige] . "<br>" . $_GET['pripadnost'];

foreach($knjige as $x=>$x_value) {
  echo into_roman($x_value);
  echo "<br>";
}
$aaa=$_SERVER['PHP_SELF'];

$aa="<center><form method=" . chr(34) . "GET" . chr(34) . " id=" . chr(34) . "f1" . chr(34) . " action=" . chr(34) . $aaa . chr(34) . "><center><table><tr>";// 
for ($ii=0;$ii<count($knjige);$ii++) {
$aa = $aa . "<td><font size=" . '"' . "4" . '"' . ">[</font><input type=" . '"' . "radio" . '"' . " name=" . '"' . "pripadnost" . '"' . " id=" . '"' . "c1" . '"' . " value=" . '"' . $knjige[$ii] . '"' . "><font size=" . '"' . "4" . '"' . "><label for=" . '"' . "1" . '"' . ">knjiga " . into_roman($knjige[$ii]) . " </label>]</font></td>\n";
}
$aa=$aa . "</tr></table></center>";

echo $aa;


$gradovi = array();
$opstine=array();
$u_opstini=array();


function into_roman($argm) {
$romans_x = array(
    'M' => 1000,
    'CM' => 900,
    'D' => 500,
    'CD' => 400,
    'C' => 100,
    'XC' => 90,
    'L' => 50,
    'XL' => 40,
    'X' => 10,
    'IX' => 9,
    'V' => 5,
    'IV' => 4,
    'I' => 1,
);
$romans_ix=array('M','CM','D','CD','C','XC','L','XL','X','IX','V','IV','I');
	$rr=0;
	echo $argm;
	$aa="!";
	while (1) {
		if($argm<1) {break;}
		if($argm>=$romans_x[$romans_ix[$rr]]) {
			$argm=$argm - $romans_x[$romans_ix[$rr]];
			$aa= $aa . $romans_ix[$rr];
		} else {
			$rr++;
		}
	}
	return $aa;
}
echo into_roman(2975);
die;
$romans = array(
    'M' => 1000,
    'D' => 500,
    'C' => 100,
    'L' => 50,
    'X' => 10,
    'V' => 5,
    'I' => 1,
);
$romans_x = array(
    'M' => 1000,
    'CM' => 900,
    'D' => 500,
    'CD' => 400,
    'C' => 100,
    'XC' => 90,
    'L' => 50,
    'XL' => 40,
    'X' => 10,
    'IX' => 9,
    'V' => 5,
    'IV' => 4,
    'I' => 1,
);
$romans_i=array('M','D','C','L','X','V','I');
$romans_ix=array('M','CM','D','CD','C','XC','L','XL','X','IX','V','IV','I');
//echo $romans[$romans_i[0]];
//echo $romans_i[0];
$argm=3;
$rr=0;
//echo $argm - $romans_x[$romans_ix[$rr]];
//die;
while (1) {
//for ($ii=0;$ii<13;$ii++) {
	if($argm<1) {break;}
	if($argm>=$romans_x[$romans_ix[$rr]]) {
		$argm=$argm - $romans_x[$romans_ix[$rr]];
		$aa= $aa . $romans_ix[$rr];
	} else {
		$rr++;
	}
}	
	die;

/*	$argm=$argm - $romans_x[$romans_ix[$rr]];
	echo $argm . "<br>";
	if($mpte==0) {$rr++;}
	$mpte=intval($argm/$romans_x[$romans_ix[$rr]]);
	echo $mpte . " * " . $rr . "<br>";
}*/
echo $aa . "<br>" . $argm;
die;

while (1) {
	if(!isset($romans_i[$rr])) {break;}
	$mpte=intval($argm/$romans[$romans_i[$rr]]);
	//$mptex=$argm/$romans[$romans_i[$rr]]-$mpte;
	//echo $mptex . "<br>";
	for($xx=0;$xx<$mpte;$xx++) {
		$aa= $aa . $romans_i[$rr];
	}
	$argm=$argm - $xx * $romans[$romans_i[$rr]];
	$rr++;
}
$aa= str_replace('VIIII','IX',$aa);
$aa= str_replace('IIII','IV',$aa);
$aa= str_replace('LXXXX','XC',$aa);
$aa= str_replace('XXXX','XL',$aa);
$aa= str_replace('DCCCC','CM',$aa);
$aa= str_replace('CCCC','CD',$aa);


$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 

if (mysqli_connect_errno()) {
	echo "Ne mogu da se povežem sa bazom. ";
	exit();
}
$uslow="SELECT * FROM cv_po_opstinama";
$uslow_exe=mysqli_query($konekcija,$uslow);
while (1) {
	$uslow_row=mysqli_fetch_assoc($uslow_exe);
	if (!$uslow_row) {break;}
	$brojac++;
	$opstine[$brojac]=$uslow_row['opstina'];
	$rktgovi[$brojac]=$uslow_row['rktg'];
}
$u_opstini=array_keys($opstine, $ii);
$rr=0;
	while (1) {
		if (!$u_opstini[$rr]) {break;}
		//echo $rr . ". " . $rktgovi[$u_opstini[$rr]] . "<br>";
		$rr++;
		}
/*	$upit_max="SELECT * FROM cv_okruzi ORDER BY fajl;";
	$xm = mysqli_query($konekcija,$upit_max);
	while (1) {
		$xmm = mysqli_fetch_assoc($xm);
		if (!$xmm) {break;}
		echo $xmm['okrug'] . "/" . $xmm['fajl'] . "/" . $xmm['naziv'] . "<br>";
	}
	*/
	//echo $xmmm;
?>
</body>
</html>