<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>hronologija
</title>
<SCRIPT LANGUAGE="JavaScript">
</script>
</head>
<body>
<div class=BELITASTER>
<br><br>
<form method="get" id="f2" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%"  border=1>
<tr><td>
<?php
$niz_knjiga=array(778,776,775,774,773,772,771,770,769,768,767);
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 
	echo $niz_knjiga[0] . "<br>";
	
$brojac=1;	
$upitupit="SELECT * FROM  dokumenti INNER JOIN  dokumenti AS  dokumenti_1 WHERE dokumenti.src = dokumenti_1.src AND dokumenti.rb = dokumenti_1.rb AND dokumenti.id > dokumenti_1.id";
$upit001="SELECT * FROM  dokumenti";
$rezultat = mysqli_query($konekcija,$upit001);
echo "poc" . "<br>";
while($red = mysqli_fetch_assoc($rezultat)){
	$upit002="SELECT * FROM  dokumenti WHERE dokumenti.src =". $red['dokumenti.src'] . " AND dokumenti.rb =" . $red['dokumenti.rb'] . " AND dokumenti.id >" . $red['dokumenti.id'] . ";";
	$rezultat002 = mysqli_query($konekcija,$upit002);
	while($red002 = mysqli_fetch_assoc($rezultat002)){
		echo $brojac . "," . $red['dokumenti.id'] . "=" . $red002['dokumenti.id'] . "<br>";
		$brojac++;
		}
}
echo "krj" . "<br>";
die;
	
//ubac
	$upit="SELECT * FROM `hr1` WHERE dd=10 and mm=11 ORDER BY yy";
	$rezultat = mysqli_query($konekcija,$upit);
while(1){
	$red = mysqli_fetch_assoc($rezultat);
	if(!$red['id']) {break;}
	echo $red['tekst'] . "<br>";
}
die;
//dovde
for ($ii=0;$ii<count($niz_knjiga);$ii++) {
	$upit0="SELECT * FROM knjge WHERE broj_knjige=" . $niz_knjiga[$ii] . ";";
	echo $upit0;
	$rezultat0 = mysqli_query($konekcija,$upit0);
	$red0 = mysqli_fetch_assoc($rezultat0);
	$autor=$red0['a1'];
	if($red0['a2']) {$autor =$autor . ", " . $red0['a2'];}
	if($red0['a3']) {$autor =$autor . ", " . $red0['a3'];}
	if($red0['a4']) {$autor =$autor . ", " . $red0['a4'];}
	$autor=$autor . ": ";
	echo "<div style=" . chr(34) . "font-weight: bold;" . chr(34) . ">";
	echo "<font size=" . chr(34) . "2" . chr(34) . "><a href=" . chr(34) . "/00003/7xx.php?bk=" . $niz_knjiga[$ii] . chr(34) . "target=" . chr(34) . "_blank" . chr(34) . "><span>&nbsp;&nbsp;<font color=#106000>&#9658;</font>&nbsp;";
	echo $autor . $red0['naziv_knjige'] . "</span></a><br /></font></div>";
	echo "\n";
}
?>
</td></tr>
</table>
</form>
</body>
</html>
