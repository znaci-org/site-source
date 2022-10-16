<?php

require_once __DIR__ . "/../includes/povezivanje.php";
require_once "Izvor.php";

class Fotografija extends Izvor
{
    public $opis_jpg;

    function __construct($id)
    {
        global $mysqli;
        parent::__construct($id, 3);

        $upit = "SELECT fotografije.datum, fotografije.opis, fotografije.opis_jpg, fotografije.oblast, mesta.naziv as oblast_prevedeno
        FROM fotografije
        INNER JOIN mesta ON fotografije.oblast=mesta.id
        WHERE inv=$id";
        $rezultat = $mysqli->query($upit);
        $red = $rezultat->fetch_assoc();

        $this->datum = $red["datum"];
        $this->opis = $red["opis"];
        $this->opis_jpg = $red["opis_jpg"];
        $this->lokacija = $red["oblast"];
        $this->oblast_prevedeno = $red['oblast_prevedeno'];
        $this->izvor = "Muzej revolucije naroda Jugoslavije";
        $this->url = "http://www.znaci.org/images/" . $this->id . ".jpg";
        $this->relativ_url = "/images/" . $this->id . ".jpg";

        $rezultat->close();
    }

    function render_opis() {
        parent::render_opis();
        if ($this->opis_jpg) {
            echo "<div><b>Izvorni opis:</b><br>
            <img src='http://www.znaci.org/o_slikama/$this->opis_jpg.jpg' class='max-100' /></div>";
        }
    }

    static function rendaj_prazno() {
        echo "Nema pronađenih fotografija za ovaj pojam. ";
    }

    static function rendaj($id) {
        $izvor_slike = "https://znaci.org/images/$id.jpg";
        $url = "/fotografija.php?br=$id";
        echo "<a href='$url'><img class='slike' height=200 src='$izvor_slike'></a>";
    }
}
