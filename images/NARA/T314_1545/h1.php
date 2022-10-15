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


// define some variables

$conn_id = ftp_connect("ftp.maparchive.ru");
$login_result = ftp_login($conn_id, "gorran@maparchive.ru", "gorran-despotovic");
print_r($login_result);

for ($xx=1;$xx<1373;$xx++) {
$f_n=$xx;
for ($ii=1;$ii<4;$ii++) {
if (strlen($f_n)>(3)) {break;}
$f_n= "0" . $f_n;
}
$f_n=$f_n . ".jpg";

$local_file = $f_n;
$server_file = '/T314 R1545/' . $f_n;
echo $local_file . $server_file;
// set up basic connection


// login with username and password
// try to download $server_file and save to $local_file
$gettt=ftp_get($conn_id, $local_file, $server_file, FTP_BINARY);
print_r($gettt);
if ($gettt) {
    echo "Successfully written to $local_file\n";
} else {
    echo "There was a problem\n";
}
}
// close the connection
ftp_close($conn_id);

die;
echo mktime(0, 0, 0, date("d"), date("m"), date("Y")) . "<br>";
$ddd= date("d");
$mmm= date("m");
$yyy= date("y");

$upit1="SELECT * FROM hr1 order by yy,mm,dd;";// where dd=20 and mm=11 
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 
$rezultat = mysqli_query($konekcija,$upit1);

$numerr=array('&#273;','&#269;','&#263;','&#272;','&#268;','&#262;','&#353;','&#352;','&#382;','&#381;');
$normall=array('đ','č','ć','Đ','Č','Ć','š','Š','ž','Ž');
/*
$upit7="SELECT * FROM entia where id>695";
$rezultat7 = mysqli_query($konekcija,$upit7);

while(1) {
	$red7 = mysqli_fetch_assoc($rezultat7);
	if(!isset($red7)) {break;}
	$grad=$red7['naziv'];
	$grad=str_replace(" ","_",$grad);
	$grad=str_replace($numerr,$normall,$grad);

	$data = file_get_contents("https://en.wikipedia.org/wiki/" . $grad);
	echo "<pre>" . $grad . "*" . $red7['id'] . "*" . substr($data,strpos($data,"°")-2,6) . "*" . substr($data,strpos($data,"°",strpos($data,"°")+2)-2,6) . "</pre>";

}
*/
while(1) {
	$red1 = mysqli_fetch_assoc($rezultat);
	if(!isset($red1)) {break;}
	$aa=$red1['tekst'];
	$akteri=$red1['akteri'];
	$imali=strpos($aa,"Kalni");
	$imali2=strpos($aa,"odred");
	$imali3=strpos($aa,"Šamca");
	$imali4=strpos($aa,"Zagreb-Beograd");
	$imali5=strpos($aa,"Beograd-Zagreb");
	//if(($imali!==FALSE) and ($imali3===FALSE) and ($imali4===FALSE) and ($imali5===FALSE)) {// and ($imali3===FALSE)
	//if((($imali!==FALSE) or ($imali3!==FALSE)) or ($imali2!==FALSE)) {
	$imali_reg=preg_match($aa,'(^Prv[A-z] prolet[A-z] brig)');
	//if($imali!==FALSE and $imali2!==FALSE) {
	if($imali_reg==1) {
	//if(strlen($akteri)>1 and substr($akteri,strlen($akteri)-2,2)=="11") {
		$rrr++;
		$upit2="INSERT INTO hr_int (vrsta,broj,zapis) VALUES (1,906," . $red1['id'] . ");";
		//if(($red1['id']>7501) or ($red1['id']<7200)) {$rezultat2 = mysqli_query($konekcija,$upit2);}
		//$rezultat2 = mysqli_query($konekcija,$upit2);
		echo "<br>" . $red1['id'] . "-" . $red1['yy'] . "-" . $red1['mm'] . "-" . $red1['dd'] . " - " . $aa;
	}
	//echo "<br>" . $red1['yy'] . "-" . $red1['mm'] . "-" . $red1['dd'] . " - " . $aa;
}
echo "<br>" . "<br>" . $rrr;
die;

$datumi=array(6,8,15,18,18,21,22,25,28,13,13,18,18,21,21,25,26,4,4,12,3,4,11,22,23,26,28,12,23,2,3,7,11,23,11,11,13,13,16,17,19,19,24,10,16,20,24,5,5);

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
	$upit0="UPDATE hr1 SET akcije=" . $napad . " WHERE id=" . $idd . ";";
	$rezultat = mysqli_query($konekcija,$upit0);
	echo "<br>" . $upit0 . "<br>" . $rezultat . "<br><br><br>";
}
if (mysqli_connect_errno()) {
	echo "Ne mogu da se povežem sa bazom. ";
	exit();
}
$upit1="SELECT * FROM hr1 WHERE akcije>-1 AND akcije<10 AND (yy>1941 OR mm>6) order by yy,mm,dd";

$upit1="SELECT * FROM hr1 WHERE yy=1945 and tip=-1 order by id";

$rezultat = mysqli_query($konekcija,$upit1);
$rr=0;
while(1) {
	$red1 = mysqli_fetch_assoc($rezultat);
	if(!isset($red1)) {break;}
	$aa=$red1['id'];
	$upit2="UPDATE hr1 set dd=" . $datumi[$rr] . " WHERE id=" . $aa . ";";
	$rezultat2 = mysqli_query($konekcija,$upit2);
	$rr++;
	echo $rezultat2 . ",";
}
die;
while(1) {
	$red1 = mysqli_fetch_assoc($rezultat);
	if(!isset($red1)) {break;}
	$aa=$red1['tekst'];
	if(strpos($aa,"zauz")!=false) {
		$pss=$red1['id'];
		echo "<br>" . $red1['yy'] . "-" . $red1['mm'] . "-" . $red1['dd'] . " - " . $aa;
		break;
		}
	}
?>
<input type="hidden" name="arg" value="<?php echo $pss;?>">
</td><td width="30%" valign="top" style="text-align:right">
<input type="submit" name="napad" value="10">
<input type="submit" name="napad" value="20">
<input type="submit" name="napad" value="30">
<input type="submit" name="napad" value="40">
<input type="submit" name="napad" value="50">
<input type="submit" name="napad" value="-1">

</td></tr>
</table>
</form>
</body>
</html>
