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
<table width="100%"  border=1>
<tr><td>
<?php 
    function copyemz($file1,$file2){ 
        $contentx = file_get_contents("e:/znaci/00372.jpg"); 
		echo $contentx . "<br>";
		echo "e:\\znaci\\aaa.jpg";
        if($openedfile = fopen("e:/znaci/aaa.jpg", "w")) {echo "<br><br>*<br>imanešto!<br>*<br>";}; 
		//echo "<br><br>*<br>" . $openedfile . "<br>*<br>";
        $uspeh=fwrite($openedfile, $contentx); 
		echo "<br><br>***<br>" . $uspeh . "<br>***<br>";
        fclose($openedfile); 
        if ($contentx === FALSE) { 
        $status=false; 
        }else $status=true; 
                    
        return $status; 
    } 
?>
<?php
    function url_exists($url){
        $url = str_replace("http://", "", $url);
        if (strstr($url, "/")) {
            $url = explode("/", $url, 2);
            $url[1] = "/".$url[1];
        } else {
            $url = array($url, "/");
        }

        $fh = fsockopen($url[0], 80);
        if ($fh) {
            fputs($fh,"GET ".$url[1]." HTTP/1.1\nHost:".$url[0]."\n\n");
            if (fread($fh, 22) == "HTTP/1.1 404 Not Found") { return FALSE; }
            else { return TRUE;    }

        } else { return FALSE;}
    }
?>
<?php
set_time_limit (7200);
//echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

//$browser = get_browser(null, true);
//print_r($browser);

$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 
/*
$upit1="SELECT * FROM `hr_int` inner join hr_int as hr_int1 on hr_int.zapis=hr_int1.zapis WHERE hr_int.broj=hr_int1.broj and hr_int.id<hr_int1.id;";
$rezultat = mysqli_query($konekcija,$upit1);
while(1) {
	$red1 = mysqli_fetch_assoc($rezultat);
	if(!isset($red1)) {echo "0!"; break;}
	$aa1=$red1['hr_int.broj'];
	$aa2=$red1['hr_int.zapis'];
	echo "<br>" . $red1['hr_int.id'] . "-" . $red1['hr_int1.id'] . " - " . $aa1 . " * " . $aa2;
}
*/
/*echo mktime(0, 0, 0, date("d"), date("m"), date("Y")) . "<br>";
$ddd= date("d");
$mmm= date("m");
$yyy= date("y");
$upit1="SELECT * FROM hr1 inner join hr2 on hr1.id=hr2.id order by yy,mm,dd;";// where dd=20 and mm=11 
$konekcija = mysqli_connect("", getenv(MYSQL_UN), getenv(MYSQL_PW), getenv(MYSQL_DB));
mysqli_set_charset($konekcija, 'utf8'); 
$rezultat = mysqli_query($konekcija,$upit1);
*/
//$dir1="http://www.znaci.net/images/NARA/T311_193_x/";
//$handle = fopen("e:\\znaci\\a.txt", "r");
if (url_exists("http://www.znaci.net/ok/a.txt")) {
    echo "<br>The file $srcc exists";
} else {
    echo "<br>The file $srcc does not exist";
}
if (!$contentx = file_get_contents("http://www.znaci.net/ok/a.txt")) {echo "2222";} 
echo $contentx . "<br>";
$openedfile = fopen("http://www.znaci.net/ok/b.txt", "w");
if(!fwrite($openedfile, $contentx)) {echo "!";}
fclose($openedfile);
die;


$broj=70171;
$dir1="http://wwii.germandocsinrussia.org/pages/" . $broj . "/zooms/7";
$dir2="http://www.znaci.net/ok/rusi/";
//$srcc=$dir1 . "193.0012" . ".jpg";
$srcc=$dir1;
$dst=$dir2 . $broj . ".jpg";
echo $srcc . " *** " . $dst . "<br>";
if (url_exists($srcc)) {
    echo "<br>The file $srcc exists";
} else {
    echo "<br>The file $srcc does not exist";
}

if (!copyemz($srcc, $dst)) {
    echo "<br>failed to copy $file...\n";
}

die;
$numerr=array('&#273;','&#269;','&#263;','&#272;','&#268;','&#262;','&#353;','&#352;','&#382;','&#381;');
$normall=array('đ','č','ć','Đ','Č','Ć','š','Š','ž','Ž');


$upit7="SELECT * FROM entia where vrsta=4";
$rezultat7 = mysqli_query($konekcija,$upit7);

while($red7 = mysqli_fetch_assoc($rezultat7)) {
	if(!isset($red7)) {break;}
	$clanak=$red7['naziv'];
	$clanak=str_replace(" ","_",$clanak);
	$clanak=str_replace($numerr,$normall,$clanak);
	echo "<b><u>" . $clanak . "</b></u><br>";
	$data = file_get_contents("https://sh.wikipedia.org/wiki/" . $clanak);
	//$data=strip_tags($data);
	$ps=0;
	while($ps=strpos($data,"/wiki/Kategorija:",$ps+1)) {
		$ps2=strpos($data,chr(34),$ps+1);
		echo $ps . ": " . substr($data,$ps+17,$ps2-$ps-17) . "<br>";
	}
}


/*
while(1) {
	$red1 = mysqli_fetch_assoc($rezultat);
	if(!isset($red1)) {break;}
	$aa1=$red1['h1.tekst'];
	$aa2=$red1['h1.tekst'];
	*/
/*	$akteri=$red1['akteri'];
	$imali=strpos($aa,"srem");
	$imali2=strpos($aa,"iverz");
	$imali3=strpos($aa,"Srem");
	$imali4=strpos($aa,"Zagreb-Beograd");
	$imali5=strpos($aa,"Beograd-Zagreb");
	*/
	//if(($imali!==FALSE) and ($imali3===FALSE) and ($imali4===FALSE) and ($imali5===FALSE)) {// and ($imali3===FALSE)
	//if((($imali!==FALSE) or ($imali3!==FALSE)) and ($imali2!==FALSE)) {
/*	//if(strlen($akteri)>1 and substr($akteri,strlen($akteri)-2,2)=="11") {
		$rrr++;
		$upit2="INSERT INTO hr_int (vrsta,broj,zapis) VALUES (1,831," . $red1['id'] . ");";
		if(($red1['id']>7501) or ($red1['id']<7200)) {$rezultat2 = mysqli_query($konekcija,$upit2);}
		//$rezultat2 = mysqli_query($konekcija,$upit2);
		echo "<br>" . $aa1 . "-" . $aa2;
	//}
	//echo "<br>" . $red1['yy'] . "-" . $red1['mm'] . "-" . $red1['dd'] . " - " . $aa;
} */
echo "<br>" . "<br>" . $rrr;
die;
