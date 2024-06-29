<?php

include_once('model/Fotografija.php');
include_once('model/Izvor.php');

if (empty($_GET['br'])) die();
$id = filter_input(INPUT_GET, 'br', FILTER_SANITIZE_NUMBER_INT);

$fotografija = new Fotografija($id);
$naslov = $fotografija->getNaslov();
$page_url = "https://znaci.org/fotografija.php?br=" . $fotografija->id;

include_once('includes/header.php');
include_once('css/izvor.php');
?>

<article class="okvir izvor">
    <h1><?php echo $fotografija->getNaslov(); ?></h1>

    <img src="<?php echo $fotografija->url; ?>">

    <div class="podaci_o_izvoru">
        <?php $fotografija->render_opis(); ?>

        <?php
        $datum_prikaz = $fotografija->datum;
        if ($datum_prikaz == "0000-00-00.") $datum_prikaz = " nepoznat";
        ?>
        <b>Datum: </b><span><?php echo $datum_prikaz . "."; ?></span>
        <small>(napomena: neki datumi su okvirni)</small>
        <br>
        <b>Oblast:</b> <?php echo $fotografija->oblast_prevedeno; ?>
        <br>
        <b>Izvor:</b><i> <?php echo $fotografija->izvor; ?></i><br>
        <b>URL:</b> <a href="<?php echo $fotografija->url; ?>"><?php echo $fotografija->url; ?></a><br>

        <?php Izvor::rendaj_oznake($fotografija->tagovi); ?><br>
    </div>
</article>

<?php
include_once("includes/footer.php");
?>