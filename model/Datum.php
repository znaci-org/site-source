<?php

require_once __DIR__ . "/../includes/povezivanje.php";
require_once "Dogadjaj.php";
require_once "Dokument.php";
require_once "Fotografija.php";
require_once "Odrednica.php";

/*
    Prikuplja događaje, dokumente i fotografije sa određeni datum
*/
class Datum
{
    public $dogadjaji,
        $dokumenti,
        $fotografije,
        $odrednice;

    // prima opciono datum ili setuje današnji
    function __construct($dan = null, $mesec = null, $godina = null)
    {
        global $mysqli;
        $this->dan = $dan ? $mysqli->real_escape_string($dan) : date("j");
        $this->mesec = $mesec ? $mysqli->real_escape_string($mesec) : date("m");
        $this->godina = $godina ? $mysqli->real_escape_string($godina) : Datum::get_slucajna_godina($mesec);
        $this->datum = $this->pravi_datum($this->dan, $this->mesec, $this->godina);

        $this->init_dogadjaji();
        $this->init_dokumenti();
        $this->init_fotografije();
        $this->init_odrednice(); // mora posle svih prethodnih
    }

    private function init_dogadjaji()
    {
        global $mysqli;
        $upit = "SELECT id, tekst, rang FROM hr1 
        WHERE yy='$this->godina' AND mm='$this->mesec' AND dd='$this->dan' ";
        $rezultat = $mysqli->query($upit);
        $this->dogadjaji = array();
        while ($red = $rezultat->fetch_assoc()) {
            $this->dogadjaji[$red['id']] = array($red['tekst'], $red['rang']);
        }
        $rezultat->close();
    }

    private function init_dokumenti()
    {
        global $mysqli;
        $upit = "SELECT id, opis FROM dokumenti 
        WHERE god_izv='$this->godina' AND mesec_izv='$this->mesec' AND dan_izv='$this->dan' ";
        $rezultat = $mysqli->query($upit);
        $this->dokumenti = array();
        while ($red = $rezultat->fetch_assoc()) {
            $this->dokumenti[$red['id']] = $red['opis'];
        }
        $rezultat->close();
    }

    private function init_fotografije()
    {
        global $mysqli;
        $datum = "$this->godina-$this->mesec-$this->dan";
        $dana_gore_dole = 7;
        $upit = "SELECT inv, datum 
        FROM fotografije 
        WHERE ABS(TIMESTAMPDIFF(DAY, datum, '$datum')) < $dana_gore_dole
        ORDER BY datum
        LIMIT 20";
        $rezultat = $mysqli->query($upit);
        $this->fotografije = array();
        while ($red = $rezultat->fetch_assoc()) {
            $this->fotografije[] = $red['inv'];
        }
        $rezultat->close();
    }

    private function init_odrednice()
    {
        $this->odrednice = Odrednica::get_odrednice($this->dogadjaji, $this->dokumenti, $this->fotografije);
    }

    function render_dogadjaji()
    {
        if (!$this->dogadjaji) {
            Dogadjaj::rendaj_prazno();
        }
        foreach ($this->dogadjaji as $id => $arr) {
            Dogadjaj::rendaj($id, $this->datum, $arr[0], $arr[1]);
        }
    }

    function render_dokumenti()
    {
        if (!$this->dokumenti) {
            Dokument::rendaj_prazno();
        }
        foreach ($this->dokumenti as $k => $v) {
            Dokument::rendaj($k, $v);
        }
    }

    function render_fotografije()
    {
        if (!$this->fotografije) {
            Fotografija::rendaj_prazno();
        }
        foreach ($this->fotografije as $inv) {
            Fotografija::rendaj($inv);
        }
    }

    function render_odrednice()
    {
        Odrednica::rendaj_oblak($this->odrednice);
    }

    static function pravi_datum($dan, $mesec, $godina)
    {
        return $dan . ". " . $mesec . ". " . $godina;
    }

    static function get_ratne_godine($mesec)
    {
        $ratne_godine = [1942, 1943, 1944];
        if ($mesec >= 4) $ratne_godine[] = 1941;
        if ($mesec <= 5) $ratne_godine[] = 1945;
        sort($ratne_godine);
        return $ratne_godine;
    }

    static function get_slucajna_godina($mesec)
    {
        $ratne_godine = Datum::get_ratne_godine($mesec);
        return $ratne_godine[array_rand($ratne_godine)];
    }
}
