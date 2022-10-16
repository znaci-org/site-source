<?php

include_once('model/Dokument.php');
include_once('model/Izvor.php');

if (empty($_GET['br'])) die();
$id = filter_input(INPUT_GET, 'br', FILTER_SANITIZE_NUMBER_INT);

$dokument = new Dokument($id);
$naslov = $dokument->getNaslov();
include_once('includes/header.php');
include_once('css/izvor.php');
?>

<article class="okvir izvor">
    <h1><?php echo $dokument->getNaslov(); ?></h1>

    <div class="podaci_o_izvoru">
        <?php $dokument->render_opis(); ?>
        <?php
        $datum_prikaz = $dokument->datum;
        if ($datum_prikaz == "0000-00-00.") $datum_prikaz = " nepoznat";
        ?>
        <b>Datum: </b><span><?php echo $datum_prikaz . "."; ?></span>
        <small>(napomena: neki datumi su okvirni)</small>
        <br>
        <b>Oblast:</b> <?php echo $dokument->oblast_prevedeno; ?><br>
        <b>Dokument izdali:</b> <?php echo $dokument->pripadnost; ?><br>

        <b>Izvor:</b><i> <?php echo $dokument->izvor; ?></i><br>
        <b>URL:</b> <a href="<?php echo $dokument->url; ?>"><?php echo $dokument->url; ?></a><br>

        <?php Izvor::rendaj_oznake($dokument->tagovi); ?><br>

    </div>
    <div class="clear"></div>

    <object data="<?php echo $dokument->url; ?>" type="application/pdf" width="100%" height="800">
        <p>Vaš pregledač ne podržava PDF. Možete <a href="<?php echo $dokument->url; ?>">preuzeti fajl</a> radi čitanja.</p>
    </object>

</article>

<?php
include_once("includes/footer.php");
?>