<?php

$servername = "localhost";
$username = "pozor_admin";
$password = "prdez";

/*$konekcija = new mysqli($servername, $username, $password);

if ($konekcija->connect_error) {
    die("Ne mogu da se povezem sa bazom: " . $konekcija->connect_error);
}
echo "Povezao sam se sa bazom!";
*/
$konekcija = mysqli_connect($servername, $username, $password, "pozorista");

$upit="SELECT * FROM r WHERE dd=9";
echo $upit;
$rezultat = mysqli_query($konekcija,$upit);
var_dump($rezultat);
print_r($rezultat);
$red = mysqli_fetch_assoc($rezultat);
var_dump($red);
print_r($red);
echo $red['predstava'];

?> 