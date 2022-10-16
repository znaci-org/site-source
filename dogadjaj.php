<?php

include_once('model/Dogadjaj.php');
include_once('model/Izvor.php');

if (empty($_GET['br'])) die();
$id = filter_input(INPUT_GET, 'br', FILTER_SANITIZE_NUMBER_INT);

$dogadjaj = new Dogadjaj($id);
$naslov = $dogadjaj->getNaslov();
include_once('includes/header.php');
include_once('css/izvor.php');
?>

<article class="okvir izvor">
    <h1><?php echo $dogadjaj->getNaslov(); ?></h1>

    <div class="podaci_o_izvoru">
        <?php $dogadjaj->render_opis(); ?>
        <?php
        $datum_prikaz = $dogadjaj->datum;
        if ($datum_prikaz == "0000-00-00.") $datum_prikaz = " nepoznat";
        ?>
        <b>Datum: </b><span><?php echo $datum_prikaz . "."; ?></span>
        <small>(napomena: neki datumi su okvirni)</small>
        <br>
        <b>Oblast:</b> <?php echo $dogadjaj->oblast_prevedeno; ?><br>
        <b>Izvor:</b><i> <?php echo $dogadjaj->izvor; ?></i><br>
        <b>URL:</b> <a href="<?php echo $dogadjaj->url; ?>"><?php echo $dogadjaj->url; ?></a><br>

        <?php Izvor::rendaj_oznake($dogadjaj->tagovi); ?>
    </div>
    <div class="clear"></div>

    <iframe id='datoteka-frejm' src='<?php echo $dogadjaj->url; ?>' frameborder='0'></iframe>
</article>

<?php
include_once("includes/footer.php");
?>