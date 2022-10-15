<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>hronologija
</title>
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
   document.getElementById('c9').value = "testing !!!!!";
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
</head>
<body>
<div class=BELITASTER>
<br><br>
<form method="get" id="f2" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%"  border=1>
<tr><td>
<?php

if ($_GET['napad']) {
	$napad = $_GET['napad'];
	$iiix=2;
} else {
	$napad = 0;
}

if ($_GET['arg']) {
	$idd = $_GET['arg'];
	$iiix=2;
} else {
	$idd = 0;
}

$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 
echo $napad . "<br>" . $idd . "<br>";
if(($napad!=0) and ($idd!=0)) {
	$upit0="UPDATE hr1 SET dd=" . $napad . " WHERE id=" . $idd . ";";
	$rezultat = mysqli_query($konekcija,$upit0);
	echo "<br>" . $upit0 . "<br>" . $rezultat . "<br><br><br>";
}
if (mysqli_connect_errno()) {
	echo "Ne mogu da se povežem sa bazom. ";
	exit();
}
$upit1="SELECT * FROM hr1 WHERE yy=1943 and mm=7 and dd=1 order by zona,id";
$rezultat = mysqli_query($konekcija,$upit1);
$red1 = mysqli_fetch_assoc($rezultat);
$pss=$red1['id'];
$aa=$red1['tekst'];
echo "<br>" . $red1['yy'] . "-" . $red1['mm'] . "-" . $red1['dd'] . " - " . $aa;
?>

</td><td width="30%" valign="top" style="text-align:right">
<input type="hidden" name="arg" value="<?php echo $pss;?>">
<input type="text" name="napad" value="100">
<input type="submit">

</td></tr>
</table>
</form>
</body>
</html>
