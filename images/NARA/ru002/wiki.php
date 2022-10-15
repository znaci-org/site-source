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

$targets=array("http://wwii.germandocsinrussia.org/system/pages/000/701/25/images/small/ae9835c3289e1ef0fa07d750a9a22ae2f308938e.jpg?1426414940","http://wwii.germandocsinrussia.org/system/pages/000/701/32/images/small/b8d1d29b7e130a1146f8ae4f40794f0a96dfa7ae.jpg?1426414974","http://wwii.germandocsinrussia.org/system/pages/000/701/42/images/small/037f8712b8dea7afa4ba3458292ce2cce9e1ec85.jpg?1426415011","http://wwii.germandocsinrussia.org/system/pages/000/701/55/images/small/171ffe8ac7dd5319b5216ce4847c3bcd7faeb190.jpg?1426415061","http://wwii.germandocsinrussia.org/system/pages/000/701/69/images/small/4889aaec6a3a8fc42067c1e3283afcb386172816.jpg?1426415121","http://wwii.germandocsinrussia.org/system/pages/000/701/82/images/small/aaf07de8d2b68928d733a7f7885876d5da5629f5.jpg?1426415174","http://wwii.germandocsinrussia.org/system/pages/000/701/96/images/small/5215925cd4edbb808c54b14beaba7b8cfb34a545.jpg?1426415221","http://wwii.germandocsinrussia.org/system/pages/000/702/10/images/small/e440269f82a21bac7ee0f9d437a5b6f6681805f6.jpg?1426415279","http://wwii.germandocsinrussia.org/system/pages/000/702/24/images/small/473d186725e6b79166b6ba01e4a24aea1965ac0e.jpg?1426415329","http://wwii.germandocsinrussia.org/system/pages/000/702/38/images/small/829d8ae80fc2d39138ea28aa47e80cfa27a15b92.jpg?1426415378","http://wwii.germandocsinrussia.org/system/pages/000/702/52/images/small/11ce175e935fea895f9f3971bedb89df4c619d65.jpg?1426415431","http://wwii.germandocsinrussia.org/system/pages/000/702/66/images/small/8ce21dd06ee0be6478b5e421d3610ee81990756d.jpg?1426415479","http://wwii.germandocsinrussia.org/system/pages/000/702/80/images/small/761188947346942d7054847d27040166bcc9d9b0.jpg?1426415533","http://wwii.germandocsinrussia.org/system/pages/000/702/92/images/small/87e44f484a18dd82d01b8df5b516a0956fcb4b9e.jpg?1426415577","http://wwii.germandocsinrussia.org/system/pages/000/703/06/images/small/80b0586e0a9a5fc12f9fac88ab89941d474813e9.jpg?1426415635","http://wwii.germandocsinrussia.org/system/pages/000/703/19/images/small/976c077dcad908ff8e36762a1224f1fa5eb2e810.jpg?1426415681","http://wwii.germandocsinrussia.org/system/pages/000/703/33/images/small/36821db28495ee2bef3c86ca76af2f95c397966b.jpg?1426415734","http://wwii.germandocsinrussia.org/system/pages/000/703/46/images/small/1538b4c592976f30851358a2cc9161f06d081276.jpg?1426415785","http://wwii.germandocsinrussia.org/system/pages/000/703/60/images/small/8df10a5567af7e2d5e49aad0a39eba391660ec37.jpg?1426415847","http://wwii.germandocsinrussia.org/system/pages/000/703/72/images/small/9fd0803524c3c5afbf70bac3dcbf3fbab4a20885.jpg?1426415898","http://wwii.germandocsinrussia.org/system/pages/000/703/84/images/small/462f28888b3d12d3e99518b8007513648f9610fc.jpg?1426415952","http://wwii.germandocsinrussia.org/system/pages/000/703/95/images/small/2b4d408e1cd5a0e35e13a76b91e3b429626b0cf8.jpg?1426415998","http://wwii.germandocsinrussia.org/system/pages/000/704/07/images/small/ec81723985dcc63f5208c7da14adc644aefcac2c.jpg?1426416046","http://wwii.germandocsinrussia.org/system/pages/000/704/20/images/small/a9357fb444f2ddb9345503d29c6db8bf5faa72d5.jpg?1426416103","http://wwii.germandocsinrussia.org/system/pages/000/704/32/images/small/34265567f83ea8dd081c15ce1ea8987e35e6b7fa.jpg?1426416153","http://wwii.germandocsinrussia.org/system/pages/000/704/45/images/small/a9dc1d5a9909d9506ec86cf3a2b0f0805b348e68.jpg?1426416199","http://wwii.germandocsinrussia.org/system/pages/000/704/57/images/small/249e0d7e10e9edfb96602b55c087567e83612c6a.jpg?1426416247","http://wwii.germandocsinrussia.org/system/pages/000/704/70/images/small/842ae4fb5fa85fd26fd5b826675e0daf1df3579e.jpg?1426416294","http://wwii.germandocsinrussia.org/system/pages/000/704/82/images/small/129a28dc4ad7de75334f3b011c617111aed45787.jpg?1426416341","http://wwii.germandocsinrussia.org/system/pages/000/704/93/images/small/956be4d09dfeba08d08fb76092ef0130ca3af02c.jpg?1426416387","http://wwii.germandocsinrussia.org/system/pages/000/705/03/images/small/d4bbbb92d3247597e1c411b988f71d90eb77dc70.jpg?1426416425","http://wwii.germandocsinrussia.org/system/pages/000/705/13/images/small/4bb5e9a83b59929da37292dafab18c8aed11d325.jpg?1426416461","http://wwii.germandocsinrussia.org/system/pages/000/705/23/images/small/5ee02dbaac7e0f1ea909a933dcf7e5b52c1d386d.jpg?1426416503","http://wwii.germandocsinrussia.org/system/pages/000/705/32/images/small/82f24651ed563dde79661b3e240891807ac55e41.jpg?1426416539","http://wwii.germandocsinrussia.org/system/pages/000/705/42/images/small/93b46a56cd7a3f60b1223c9f547a0be7a4ebbfce.jpg?1426416576","http://wwii.germandocsinrussia.org/system/pages/000/705/52/images/small/727b9a0c6503cec02e1e3d28fd56a41ab2e1f647.jpg?1426416619","http://wwii.germandocsinrussia.org/system/pages/000/705/62/images/small/8ce1e07735be2757d8f23e929ef2f7aff3d4aa41.jpg?1426416661","http://wwii.germandocsinrussia.org/system/pages/000/705/72/images/small/297032774ef7cae325fcc3da148aa18daffe0d51.jpg?1426416697","http://wwii.germandocsinrussia.org/system/pages/000/705/82/images/small/da0105784c783a7c466534c0c9ef966a70bd2874.jpg?1426416737","http://wwii.germandocsinrussia.org/system/pages/000/705/92/images/small/bf8ad48fe47ea6796a6253df5277bac240896fa6.jpg?1426416772","http://wwii.germandocsinrussia.org/system/pages/000/706/01/images/small/b5238c30e830010a9b2bcf46926747966fc2a4a3.jpg?1426416808","http://wwii.germandocsinrussia.org/system/pages/000/706/11/images/small/b9589c70ceb249bd7368a934e17b9c480d9c0144.jpg?1426416842","http://wwii.germandocsinrussia.org/system/pages/000/706/21/images/small/4b0c9eceea68e40a1302b68900291f46b41af6b6.jpg?1426416881","http://wwii.germandocsinrussia.org/system/pages/000/706/31/images/small/2e69ce1167cba5d98c3c9bac37fce0818231f7b4.jpg?1426416915","http://wwii.germandocsinrussia.org/system/pages/000/706/40/images/small/a0fc809d23de40e8da6035afc4bae9f9c59742c5.jpg?1426416958","http://wwii.germandocsinrussia.org/system/pages/000/706/49/images/small/4919caa2e8fadb3de9e61c34dc281882d4208a8f.jpg?1426416996","http://wwii.germandocsinrussia.org/system/pages/000/706/58/images/small/d1385868f2a107f830cd427ee2b17903c03ff687.jpg?1426417027","http://wwii.germandocsinrussia.org/system/pages/000/706/67/images/small/c645413893e5bd136f719b41a321179816b39ced.jpg?1426417059","http://wwii.germandocsinrussia.org/system/pages/000/706/77/images/small/3d056e22bdde8f3d99a19600c31863541e779820.jpg?1426417093","http://wwii.germandocsinrussia.org/system/pages/000/706/85/images/small/f6a26383b221af3c7d060f1d753d8c56f1cd7373.jpg?1426417124","http://wwii.germandocsinrussia.org/system/pages/000/706/94/images/small/a668e65b0bee04b800ac398838321e735d4cc0dc.jpg?1426417157","http://wwii.germandocsinrussia.org/system/pages/000/707/03/images/small/215f95c881875ccd6d07bc69bbf493d1142e4821.jpg?1426417187","http://wwii.germandocsinrussia.org/system/pages/000/707/12/images/small/a05bd468cc72ceb33eb4082c9fd89e426923b95c.jpg?1426417221","http://wwii.germandocsinrussia.org/system/pages/000/707/22/images/small/bfc53485c0bcb846d574db04c13fca6f039b4236.jpg?1426417256","http://wwii.germandocsinrussia.org/system/pages/000/707/32/images/small/2579b1c3553e8dac0ca49e73dc2b8b5fd4cd7422.jpg?1426417286","http://wwii.germandocsinrussia.org/system/pages/000/707/41/images/small/440cd97233a48c8f5c6aeb5466be6d002c279bce.jpg?1426417324","http://wwii.germandocsinrussia.org/system/pages/000/707/50/images/small/a0b31d2da5c1dbe8a4d4aa5051bec61165f32a71.jpg?1426417354","http://wwii.germandocsinrussia.org/system/pages/000/707/59/images/small/43910140b78f2d1a148e3cc4c85637ad04589119.jpg?1426417390","http://wwii.germandocsinrussia.org/system/pages/000/707/68/images/small/8ffc6bbc33f0a8886121b335665caf1fe68f88ca.jpg?1426417421","http://wwii.germandocsinrussia.org/system/pages/000/707/76/images/small/f61ea9dea5b74e634de3005853b4ff1c34518542.jpg?1426417450","http://wwii.germandocsinrussia.org/system/pages/000/707/84/images/small/088581862da490a32cd305f835145cf3c9082bb0.jpg?1426417479","http://wwii.germandocsinrussia.org/system/pages/000/707/91/images/small/302c7376166a7beda93f0c8dd3de891e63fc4adb.jpg?1426417503","http://wwii.germandocsinrussia.org/system/pages/000/707/99/images/small/01a497fa2d67ee90722f22f20f492030b7c4bf45.jpg?1426417533","http://wwii.germandocsinrussia.org/system/pages/000/708/08/images/small/83e4b3ce08a24d9fcd04d0a4bf11a580eebd58bb.jpg?1426417563","http://wwii.germandocsinrussia.org/system/pages/000/708/15/images/small/2d720a045537b9c0aab7c6ce2217507f3466f0bf.jpg?1426417589","http://wwii.germandocsinrussia.org/system/pages/000/708/22/images/small/ef9fa13158391437fb71abe05c34852f3b924d8a.jpg?1426417609","http://wwii.germandocsinrussia.org/system/pages/000/708/30/images/small/8830d958ef0e8642b2049fd5b40a4ec73072b149.jpg?1426417637","http://wwii.germandocsinrussia.org/system/pages/000/708/38/images/small/9379e32a596b8c5ac74700aca38d4b91dfd78b21.jpg?1426417664","http://wwii.germandocsinrussia.org/system/pages/000/708/45/images/small/ee4808b45a10f703746356cc165a2603644691f0.jpg?1426417693","http://wwii.germandocsinrussia.org/system/pages/000/708/51/images/small/03ce161266134794c4b234d3341fd421f1a0d33c.jpg?1426417712","http://wwii.germandocsinrussia.org/system/pages/000/708/57/images/small/880c92aaf33dafbee942c5df7e7603f5bef7b599.jpg?1426417735","http://wwii.germandocsinrussia.org/system/pages/000/708/63/images/small/3cf117fe390a9cd7ded6ed46f81e73169b418383.jpg?1426417755","http://wwii.germandocsinrussia.org/system/pages/000/708/70/images/small/9b4e2deeb107397bfed70c48461491f2b435afe6.jpg?1426417777","http://wwii.germandocsinrussia.org/system/pages/000/708/77/images/small/4238fbcfc6182716354df1e3119f017eade886f0.jpg?1426417798","http://wwii.germandocsinrussia.org/system/pages/000/708/83/images/small/1c2d7aa1ffdc92c4b73a2a2477f1c187416b1ea2.jpg?1426417819","http://wwii.germandocsinrussia.org/system/pages/000/708/89/images/small/ee1bac0a0e597c997bd97658ac89348d888100f4.jpg?1426417837","http://wwii.germandocsinrussia.org/system/pages/000/708/96/images/small/037325e16689d8571dbfe93388e9135028e5a112.jpg?1426417855","http://wwii.germandocsinrussia.org/system/pages/000/709/03/images/small/6b10e311e46ed9ae1029bb976092ba3d38e37e52.jpg?1426417877","http://wwii.germandocsinrussia.org/system/pages/000/709/10/images/small/7a0e635050bf5cc1468efc135187cb5f604a8dd7.jpg?1426417896","http://wwii.germandocsinrussia.org/system/pages/000/709/18/images/small/a267361bd09e8f697f9119ea29f360325d39057f.jpg?1426417920","http://wwii.germandocsinrussia.org/system/pages/000/709/23/images/small/01524d7d9a61525c67c759b690e965ca431f904b.jpg?1426417935","http://wwii.germandocsinrussia.org/system/pages/000/709/28/images/small/e6ec1cfad83c269fd7358202ec0ce5901daba969.jpg?1426417950","http://wwii.germandocsinrussia.org/system/pages/000/709/33/images/small/b583e0132b1a405c35e4d7a3e23bfe9f714b5d13.jpg?1426417966","http://wwii.germandocsinrussia.org/system/pages/000/709/39/images/small/fdcca9748ca990f1f65918fc174a91e43dedf9c5.jpg?1426417981","http://wwii.germandocsinrussia.org/system/pages/000/709/44/images/small/d21c5df39922ef7291122dfcb762b24b4ab8731d.jpg?1426417996","http://wwii.germandocsinrussia.org/system/pages/000/709/49/images/small/fa7da4e8021902863c78055ec0e6ce92f9d72362.jpg?1426418013","http://wwii.germandocsinrussia.org/system/pages/000/709/54/images/small/12598b621dab07ccddb940a920353684bca651a2.jpg?1426418028","http://wwii.germandocsinrussia.org/system/pages/000/709/60/images/small/005f30b88d227065f1f7c0b5fdeaeeb312ed0d65.jpg?1426418042","http://wwii.germandocsinrussia.org/system/pages/000/709/64/images/small/d00eeaa3ee6c47a97f5da36dbdd90d373ae98209.jpg?1426418058","http://wwii.germandocsinrussia.org/system/pages/000/709/69/images/small/6046ea9d42bf783e0e3ec0cabdf46c0b8c20637e.jpg?1426418072","http://wwii.germandocsinrussia.org/system/pages/000/709/75/images/small/03c1bd946d70727812f7a5fbb575493ebac9d222.jpg?1426418090","http://wwii.germandocsinrussia.org/system/pages/000/709/80/images/small/14d1b1b2674dcfa642eb350e873ef2e4de102216.jpg?1426418107","http://wwii.germandocsinrussia.org/system/pages/000/709/83/images/small/964f7aa036805aca180608be7b651da25b762860.jpg?1426418123","http://wwii.germandocsinrussia.org/system/pages/000/709/87/images/small/0edc8426977fa0cfa5c03f4826d4f02cfe5ce1d5.jpg?1426418137");


for ($xx=1;$xx<96;$xx++) {
	$nulex="";
	if ($xx<100) {$nulex.="0";}
	if ($xx<10) {$nulex.="0";}
	$meta=$_SERVER["DOCUMENT_ROOT"] . '/images/NARA/ru002/' . $nulex . $xx . ".jpg";
	echo $targets[$xx-1];
	echo "<br>" . $meta . "<br>";
	copy($targets[$xx-1],$meta);
}

die;

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
