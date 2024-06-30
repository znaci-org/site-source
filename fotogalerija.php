<?php
$naslov = "Fotogalerija";
include "includes/header.php";
include "css/fotogalerija.php";
?>

<h2>Fotogalerija</h2>

<?php
require_once("includes/povezivanje.php");

$upit = "SELECT * FROM `fotografije` ORDER BY `inv` ASC";
$fraza = filter_input(INPUT_GET, 'fraza', FILTER_SANITIZE_STRING) ?: "";
$slika_po_strani = filter_input(INPUT_GET, 'slika_po_strani', FILTER_SANITIZE_STRING) ?: 50;
$trenutna_strana = filter_input(INPUT_GET, 'stranica', FILTER_SANITIZE_STRING) ?: 1;

if ($fraza) {
    $upit = "SELECT * FROM `fotografije` WHERE opis LIKE '%$fraza%' ";
}

$rezultat = $mysqli->query($upit);
$ukupno_fotografija = $rezultat->num_rows;
$ukupno_stranica = ceil($ukupno_fotografija / $slika_po_strani);
if ($trenutna_strana > $ukupno_stranica) {
    $trenutna_strana = 1;
}
?>

<div class="okvir">
    <p>Ukupno fotografija: <?php echo $ukupno_fotografija; ?></p>

    <form method="get">
        <p>
            <label for="slika_po_strani">Fotografija po stranici: </label>
            <input type="number" name="slika_po_strani" value="<?php echo $slika_po_strani; ?>">
            <label for="fraza">Fraza za pretragu: </label>
            <input type="text" name="fraza" value="<?php echo $fraza; ?>">
            <button class="izaberi">Prikaži</button>
        </p>

        <?php
        for ($i = 1; $i <= $ukupno_stranica; $i++) {
            echo "<button type='submit' title='Fotografije strana $i'";
            if ($i == $trenutna_strana) {
                echo "class='trenutna_stranica'";
            }
            echo "name='stranica' value='$i'>$i</button>\n";
        }

        $prikazuje_od = $slika_po_strani * ($trenutna_strana - 1) + 1;
        $prikazuje_do = $slika_po_strani * $trenutna_strana;
        if ($prikazuje_do > $ukupno_fotografija) {
            $prikazuje_do = $ukupno_fotografija;
        }

        echo "<p>Prikazuje fotografije od $prikazuje_od do $prikazuje_do: </p>
        <div class='flex-between'>";

        for ($j = 1; $j <= $ukupno_fotografija; $j++) {
            $red_za_fotke = $rezultat->fetch_assoc();
            $inv = $red_za_fotke['inv'];
            $opis_jpg = $red_za_fotke['opis_jpg'];
            $opis = $red_za_fotke['opis'];

            if ($j >= $prikazuje_od && $j <= $prikazuje_do) {
                $izvor_slike = "/images/thumbnails/$inv.jpg";
                $url = "/fotografija.php?br=$inv";
                echo "<div class='okvir-slike'>
                    <a href='$url'><img class='galerija-slika' height='200px' title='$opis' src=$izvor_slike></a><br>";
                if ($opis) {
                    echo "<div class='tekst-opis'>" . $opis . "</div>";
                } else if ($opis_jpg) {
                    echo "<div class='tekst-opis'>Otvori sliku za opis</div>";
                }
                echo "</div>\n";
            }
        }
        echo "</div>";

        $prethodna = $trenutna_strana - 1;
        $naredna = $trenutna_strana + 1;
        ?>
        <p class="strelice">
            <button class="leva-strelica" name='stranica' value='<?php echo $prethodna; ?>'>&#8592;</button>
            <button class="desna-strelica" name='stranica' value='<?php echo $naredna; ?>'>&#8594;</button>
        </p>
    </form>
</div>

<?php include "includes/footer.php"; ?>