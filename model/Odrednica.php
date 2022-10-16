<?php

require_once __DIR__ . "/../includes/povezivanje.php";
require_once "Dogadjaj.php";
require_once "Dokument.php";
require_once "Fotografija.php";
require_once "Datum.php";

const odrednice_limit = 75;

/*
  Na osnovu id-a odrednice dobavlja sve označene materijale
*/
class Odrednica {

    public
        $id,
        $naziv,
        $vrsta,
        $dogadjaji = [],
        $dokumenti = [],
        $fotografije = [];

    public function __construct($id = null, $slug = null) {
        $this->render_limit = 100;
        $this->fotografije_limit = 20;
        $this->init_info($id, $slug);
        $this->init_dogadjaji();
        $this->init_dokumenti();
        $this->init_fotografije();
        $this->init_odrednice();
    }

    private function init_info($id = null, $slug = null) {
        global $mysqli;
        if ($id) {
            $upit = "SELECT id, naziv, slug, vrsta FROM entia WHERE id=$id;";
        }
        if ($slug) {
            $upit = "SELECT id, naziv, slug, vrsta FROM entia WHERE slug='$slug';";
        }
        $rezultat = $mysqli->query($upit);
        $red = $rezultat->fetch_assoc();
        $this->id = $red["id"];
        $this->slug = $red["slug"];
        $this->vrsta = $red["vrsta"];
        $this->naziv = $this->vrsta == 2 ? $red["naziv"] . " u oslobodilačkom ratu" : $red["naziv"];
    }

    private function init_dogadjaji() {
        global $mysqli;
        $upit = "SELECT hr1.id, hr1.tekst, hr1.dd, hr1.mm, hr1.yy 
        FROM hr1 
        JOIN hr_int 
        ON hr1.id = hr_int.zapis 
        WHERE hr_int.broj = $this->id AND hr_int.vrsta_materijala = 1 
        ORDER BY hr1.yy,hr1.mm,hr1.dd; ";
        if($rezultat = $mysqli->query($upit)) {
            while($red = $rezultat->fetch_assoc()) {
                $datum = Datum::pravi_datum($red["dd"], $red["mm"], $red["yy"]);
                $data = [$datum, $red["tekst"]];
                $this->dogadjaji[$red["id"]] = $data;
            }
            $rezultat->close();
        }
    }

    private function init_dokumenti() {
        global $mysqli;
        $upit = "SELECT dokumenti.id, dokumenti.opis, dokumenti.dan_izv, dokumenti.mesec_izv, dokumenti.god_izv
        FROM dokumenti 
        JOIN hr_int
        ON dokumenti.id = hr_int.zapis
        WHERE hr_int.broj = $this->id AND hr_int.vrsta_materijala = 2
        ORDER BY dokumenti.god_izv, dokumenti.mesec_izv, dokumenti.dan_izv; ";

        if($rezultat = $mysqli->query($upit)) {
            while($red = $rezultat->fetch_assoc()) {
                $this->dokumenti[$red["id"]] = $red["opis"];
            }
            $rezultat->close();
        }
    }

    private function init_fotografije() {
        global $mysqli;
        $upit = "SELECT fotografije.inv, fotografije.datum
        FROM fotografije 
        JOIN hr_int
        ON fotografije.inv = hr_int.zapis
        WHERE hr_int.broj = $this->id AND hr_int.vrsta_materijala = 3
        ORDER BY fotografije.datum; ";

        if($rezultat = $mysqli->query($upit)) {
            while($red = $rezultat->fetch_assoc()) {
                $this->fotografije[] = $red["inv"];
            }
            $rezultat->close();
        }
    }

    private function init_odrednice() {
        $this->odrednice = Odrednica::get_odrednice($this->dogadjaji, $this->dokumenti, $this->fotografije, $this->id);
    }

    function render_dogadjaji() {
        if (!$this->dogadjaji) {
            Dogadjaj::rendaj_prazno();
        }
        $i = 0;
        foreach($this->dogadjaji as $id => $data){
            Dogadjaj::rendaj($id, $data[0], $data[1]);
            $i++;
            if ($i >= $this->render_limit) break;
        }
    }

    function render_dokumenti() {
        if (!$this->dokumenti) {
            Dokument::rendaj_prazno();
        }
        $i = 0;
        foreach($this->dokumenti as $id => $opis){
            Dokument::rendaj($id, $opis);
            $i++;
            if ($i >= $this->render_limit) break;
        }
    }

    function render_fotografije() {
        if (!$this->fotografije) {
            Fotografija::rendaj_prazno();
        }
        $i = 0;
        foreach($this->fotografije as $inv){
            Fotografija::rendaj($inv);
            $i++;
            if ($i >= $this->fotografije_limit) break;
        }
    }

    function render_odrednice() {
        Odrednica::rendaj_oblak($this->odrednice);
    }

    // prima niz, asoc niz
    static function prevedi_odrednice($ids) {
        global $mysqli;
        $ids = implode(',', $ids);
        $upit = "SELECT id, slug, naziv FROM entia WHERE id IN ($ids); ";
        $rezultat = $mysqli->query($upit);
        $recnik = array();
        while ($red = $rezultat->fetch_assoc()){
            $data = [$red['slug'], $red['naziv']];
            $recnik[$red['id']] = $data;
        }
        $rezultat->close();
        return $recnik;
    }

    static function get_odrednice($dogadjaji, $dokumenti, $fotografije, $izuzetak = 0) {
        global $mysqli;
        $dogadjaji = implode(',', array_keys($dogadjaji)) ?: 0;
        $dokumenti = implode(',', array_keys($dokumenti)) ?: 0;
        $fotografije = implode(',', $fotografije) ?: 0;
        $upit = "SELECT broj FROM hr_int 
        WHERE (vrsta_materijala = 1 AND zapis IN ($dogadjaji) 
        OR vrsta_materijala = 2 AND zapis IN ($dokumenti)
        OR vrsta_materijala = 3 AND zapis IN ($fotografije))";
        if ($izuzetak) $upit .= " AND NOT broj=$izuzetak";
        $rezultat = $mysqli->query($upit);
        $odrednice = array();
        while ($red = $rezultat->fetch_assoc()){
            $odrednice[] = (int)$red['broj'];
        }
        $rezultat->close();
        return $odrednice;
    }

    static function rendaj_oblak($odrednice) {
        if (count($odrednice) < 1 ) {
            echo "<p>Nema povezanih odrednica.</p>";
            return;
        }

        $ucestalost_oznaka = array_count_values($odrednice);
        arsort($ucestalost_oznaka);
        if (count($ucestalost_oznaka) > odrednice_limit) 
            $ucestalost_oznaka = array_slice($ucestalost_oznaka, 0, odrednice_limit, true);

        $max = array_values($ucestalost_oznaka)[0];
        $min = end($ucestalost_oznaka);
        $razlika = $max - $min;
        $min_tezina = 99 / $razlika * $min;

        uksort($ucestalost_oznaka, function() { 
            return rand() > rand(); // mesa niz
        });
        $recnik = Odrednica::prevedi_odrednice(array_keys($ucestalost_oznaka));

        foreach ($ucestalost_oznaka as $id => $ucestalost) {
            $procenat = 99 / $razlika * $ucestalost - $min_tezina + 1;
            if ($procenat > 80) {
                $klasa = 'najveci_tag';
            } else if ($procenat > 60) {
                $klasa = 'veliki_tag';
            } else if ($procenat > 40) {
                $klasa = 'srednji_tag';
            } else if ($procenat > 20) {
                $klasa = 'manji_srednji_tag';
            } else if ($procenat > 10) {
                $klasa = 'mali_tag';
            } else {
                $klasa = 'najmanji_tag';
            }
            Odrednica::rendaj($recnik[$id][0], $recnik[$id][1], $klasa);
        }
    }

    static function rendaj($slug, $naziv, $klasa) {
        $url = "/odrednica.php?slug=$slug";
        echo "<a href='$url' class='$klasa'>$naziv </a><span class='najmanji_tag'> &#9733; </span>";
    }

}
