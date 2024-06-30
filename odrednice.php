<?php
$naslov = "Spisak odrednica";
include "includes/header.php";

require_once("includes/povezivanje.php");
require "includes/sortiraj-po-nazivu.php";

$upit = "SELECT * FROM entia";  // puca ako nije zvezdica
$rezultat = $mysqli->query($upit);
?>

<div class="okvir pojmovi siri-prored">

    <h2>Spisak odrednica</h2>

    <ul class="">
        <a href="#Jedinice"><li>Jedinice</li></a>
        <a href="#Bitke i operacije"><li>Bitke i operacije</li></a>
        <a href="#Organizacije"><li>Organizacije</li></a>
        <a href="#Ličnosti"><li>Ličnosti</li></a>
        <a href="#Gradovi"><li>Gradovi</li></a>
        <a href="#Zločini"><li>Zločini</li></a>
        <a href="#Teme"><li>Teme</li></a>
    </ul>


    <?php

    while($red = $rezultat->fetch_assoc()){
        $pojam = [];
        $pojam['id'] = $red["id"];
        $pojam['naziv'] = $red["naziv"];
        $pojam['slug'] = $red["slug"];

        switch ($red["vrsta"]) {
            case 0:
                $jedinice[] = $pojam;
                break;
            case 2:
                $gradovi[] = $pojam;
                break;
            case 3:
                $licnosti[] = $pojam;
                break;
            case 4:
                $operacije[] = $pojam;
                break;
            case 5:
                $zlocini[] = $pojam;
                break;
            case 6:
                $teme[] = $pojam;
                break;
            case 7:
                $organizacije[] = $pojam;
                break;
            default:
                $nesvrstani[] = $pojam;
        }
    } // while

    usort($jedinice, 'sortirajPoNazivu');
    usort($gradovi, 'sortirajPoNazivu');
    usort($licnosti, 'sortirajPoNazivu');
    usort($operacije, 'sortirajPoNazivu');
    usort($zlocini, 'sortirajPoNazivu');
    usort($teme, 'sortirajPoNazivu');
    usort($organizacije, 'sortirajPoNazivu');

    ?>

    <h3 id="Jedinice">Jedinice</h3>

    <ul>
        <?php
        for($i = 0; $i < count($jedinice); $i++) {
            $id = $jedinice[$i]['id'];
            $naziv = $jedinice[$i]['naziv'];
            $slug = $jedinice[$i]['slug'];
            echo "<li><a href='odrednica.php?slug=$slug'>" . $jedinice[$i]['naziv'] . "</a>";

            if($ulogovan){
                echo " <select name='vrsta_entia' id='vrsta_entia'>";
                    include "includes/postojece-vrste.php";
                echo "</select> ";
                echo "<span class='dugme js-promeni-vrstu-oznake' data-id='$id'>Promeni vrstu </span><span></span></li>";
            }
        }
        ?>
    </ul>


    <h3 id="Bitke i operacije">Bitke i operacije</h3>

    <ul>
        <?php
        for($i = 0; $i < count($operacije); $i++) {
            $id = $operacije[$i]['id'];
            $naziv = $operacije[$i]['naziv'];
            $slug = $operacije[$i]['slug'];
            echo "<li><a href='odrednica.php?slug=$slug'>" . $operacije[$i]['naziv'] . "</a>";

            if($ulogovan){
                echo " <select name='vrsta_entia' id='vrsta_entia'>";
                    include "includes/postojece-vrste.php";
                echo "</select> ";
                echo "<span class='dugme js-promeni-vrstu-oznake' data-id='$id'>Promeni vrstu </span><span></span></li>";
            }
        }
        ?>
    </ul>

    <h3>Organizacije</h3>

    <ul id="Organizacije">
        <?php
        for($i = 0; $i < count($organizacije); $i++) {
            $id = $organizacije[$i]['id'];
            $naziv = $organizacije[$i]['naziv'];
            $slug = $organizacije[$i]['slug'];
            echo "<li><a href='odrednica.php?slug=$slug'>" . $organizacije[$i]['naziv'] . "</a>";

            if($ulogovan){
                echo " <select name='vrsta_entia' id='vrsta_entia'>";
                    include "includes/postojece-vrste.php";
                echo "</select> ";
                echo "<span class='dugme js-promeni-vrstu-oznake' data-id='$id'>Promeni vrstu </span><span></span></li>";
            }
        }
        ?>
    </ul>


    <h3 id="Ličnosti">Ličnosti</h3>

    <ul>
        <?php
        for($i = 0; $i < count($licnosti); $i++) {
            $id = $licnosti[$i]['id'];
            $naziv = $licnosti[$i]['naziv'];
            $slug = $licnosti[$i]['slug'];
            echo "<li><a href='odrednica.php?slug=$slug'>" . $licnosti[$i]['naziv'] . "</a>";

            if($ulogovan){
                echo " <select name='vrsta_entia' id='vrsta_entia'>";
                    include "includes/postojece-vrste.php";
                echo "</select> ";
                echo "<span class='dugme js-promeni-vrstu-oznake' data-id='$id'>Promeni vrstu </span><span></span></li>";
            }
        }
        ?>
    </ul>


    <h3 id="Gradovi">Gradovi</h3>
    <ul>
        <?php
        for($i = 0; $i < count($gradovi); $i++) {
            $id = $gradovi[$i]['id'];
            $naziv = $gradovi[$i]['naziv'];
            $slug = $gradovi[$i]['slug'];
            echo "<li><a href='odrednica.php?slug=$slug'>" . $gradovi[$i]['naziv'] . " u oslobodilačkom ratu</a>";

            if($ulogovan){
                echo " <select name='vrsta_entia' id='vrsta_entia'>";
                    include "includes/postojece-vrste.php";
                echo "</select> ";
                echo "<span class='dugme js-promeni-vrstu-oznake' data-id='$id'>Promeni vrstu </span><span></span></li>";
            }
        }
        ?>
    </ul>


    <h3 id="Zločini">Zločini</h3>

    <ul>
        <?php
        for($i = 0; $i < count($zlocini); $i++) {
            $id = $zlocini[$i]['id'];
            $naziv = $zlocini[$i]['naziv'];
            $slug = $zlocini[$i]['slug'];
            echo "<li><a href='odrednica.php?slug=$slug'>" . $zlocini[$i]['naziv'] . "</a>";

            if($ulogovan){
                echo " <select name='vrsta_entia' id='vrsta_entia'>";
                    include "includes/postojece-vrste.php";
                echo "</select> ";
                echo "<span class='dugme js-promeni-vrstu-oznake' data-id='$id'>Promeni vrstu </span><span></span></li>";
            }
        }
        ?>
    </ul>


    <h3 id="Teme">Teme</h3>

    <ul>
        <?php
        for($i = 0; $i < count($teme); $i++) {
            $id = $teme[$i]['id'];
            $naziv = $teme[$i]['naziv'];
            $slug = $teme[$i]['slug'];
            echo "<li><a href='odrednica.php?slug=$slug'>" . $teme[$i]['naziv'] . "</a> ";

            if($ulogovan){
                echo " <select name='vrsta_entia' id='vrsta_entia'>";
                    include "includes/postojece-vrste.php";
                echo "</select> ";
                echo "<span class='dugme js-promeni-vrstu-oznake' data-id='$id'>Promeni vrstu </span><span></span></li>";
            }
        }
        ?>
    </ul>


</div>

<?php include "includes/footer.php"; ?>
