<?php

require_once __DIR__ . "/../includes/povezivanje.php";
require_once "Izvor.php";

class Dogadjaj extends Izvor
{

    function __construct($id)
    {
        global $mysqli;
        parent::__construct($id, 1);

        $upit = "SELECT hr1.*, mesta.naziv as oblast_prevedeno
        FROM hr1
        INNER JOIN mesta ON hr1.zona=mesta.id
        WHERE hr1.id=$id";

        $rezultat = $mysqli->query($upit);
        $red = $rezultat->fetch_assoc();

        $this->dan = $red["dd"];
        $this->mesec = $red["mm"];
        $this->godina = $red["yy"];
        $dan = $red["dd"] ? $red["dd"] . ". " : "";
        $this->datum = $dan . $red["mm"] . ". " . $red["yy"];
        $this->opis = $red["tekst"];
        $this->lokacija = $red["zona"];
        $this->oblast_prevedeno = $red['oblast_prevedeno'];
        $this->rang = $red["rang"];

        $izvor = $red["izvor"];
        if ($izvor == 1) {
            $this->izvor = "Izveštaji Komande srpske državne straže za okrug Moravski 1941-1944";
            $this->url = "https://znaci.org/00003/470.htm";
            $this->relativ_url = "/00003/470.htm";
        } else {
            $this->izvor = "Hronologija narodnooslobodilačkog rata 1941-1945";
            $this->url = "https://znaci.org/00001/53.htm";
            $this->relativ_url = "/00001/53.htm";
        }
        $rezultat->close();
    }

    static function rendaj_prazno() {
        echo "Nema hronoloških zapisa za ovaj pojam. ";
    }

    static function rendaj($id, $datum, $opis, $rang) {
        $url = "/dogadjaj.php?br=$id";
        $css = $rang == 1 ? 'vazno' : '';
        echo "<p class='zapisi'><a href='$url'><b>" . $datum . ".</b> <span class='$css'>" . $opis . "</span></a></p>";
    }
}
