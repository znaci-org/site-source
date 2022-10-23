<?php
$naslov = "Na današnji dan u Drugom svetskom ratu";

include_once('includes/header.php');
include_once('css/glavno.php');
include_once('css/slobodni-gradovi.php');

include_once('funkcije/prevedi-mesec.php');
include_once('model/Dogadjaj.php');
include_once('model/Dokument.php');
include_once('model/Datum.php');

$dan = $_GET['dan'] ?: date("d");
$mesec = $_GET['mesec'] ?: date("m");
$godina = $_GET['godina'] ?: Datum::get_slucajna_godina($mesec);

$datum = new Datum($dan, $mesec, $godina);
$filename = basename($_SERVER['SCRIPT_FILENAME']);
?>

<div class="okvir naslovna">
    <section class="slobodni-gradovi">
        <h1>Jugoslovensko ratište na dan <?php echo $datum->datum; ?>. godine</h1>

        <form method="get">
            Dan: <input id="dan" name="dan" type="number" min="1" max="31" value="<?php echo $dan; ?>" class="unos-sirina"> Mesec: <input id="mesec" name="mesec" type="number" min="1" max="12" value="<?php echo $mesec; ?>" class="unos-sirina"> Godina: <input id="godina" name="godina" type="number" min="1941" max="1945" value="<?php echo $godina; ?>" class="unos-sirina"> <button type="submit">Prikaži</button>
        </form>

        <div class="ratne-godine">
            <?php
            foreach (Datum::get_ratne_godine($mesec) as $ratna_godina) {
                $css_klasa = 'ratna-godina';
                if ($datum->godina == $ratna_godina) $css_klasa .= ' ova-godina';
                echo "<a href='$filename?godina=$ratna_godina&mesec=$datum->mesec&dan=$datum->dan'><p class='$css_klasa'>$ratna_godina.</p></a>";
            }
            ?>
        </div>
        <div class="drzac-mape relative">
            <div class="hide-lg kruzic prstodrzac prstodrzac-dole"></div>
            <div class="hide-lg prstodrzac polukrug-levo"></div>
            <div class="hide-lg prstodrzac polukrug-desno"></div>

            <iframe class="mapa-frejm" name="mapa-frejm" scrolling="no" src="/slobodni-gradovi.php?godina=<?php echo $datum->godina; ?>&mesec=<?php echo $datum->mesec; ?>&dan=<?php echo $datum->dan; ?>"></iframe>

            <div class="legenda">
                <span style="color:red;font-size:1.4em">★</span><span> Slobodni gradovi</span>
            </div>
        </div>
    </section>

    <div class="dve-kolone">
        <div class="hronologija-drzac relative">
            <?php include('includes/prstodrzaci.php'); ?>
            <section class="podeok hronologija">
                <h2>Događaji</h2>
                <?php $datum->render_dogadjaji(); ?>
            </section>
        </div>

        <div class="relative full">
            <?php include('includes/prstodrzaci.php'); ?>
            <section class="podeok dokumenti">
                <h2>Dokumenti</h2>
                <?php $datum->render_dokumenti(); ?>
            </section>
        </div>
    </div>

    <div class="relative">
        <?php include('includes/prstodrzaci.php'); ?>
        <section class="podeok fotografije">
            <h2>Fotografije </h2>
            <?php $datum->render_fotografije(); ?>
        </section>
    </div>

    <div class="relative">
        <div class="hide-lg kruzic prstodrzac prstodrzac-gore"></div>
        <section class="podeok tagovi">
            <h2>Povezane odrednice</h2>
            <?php $datum->render_odrednice(); ?>
        </section>
    </div>

</div>

<?php
include_once("includes/footer.php");
?>