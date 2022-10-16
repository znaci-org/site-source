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

    <div class="simplesharebuttons">
        <a href="https://www.facebook.com/sharer.php?u=<?php echo $page_url; ?>" target="_blank"><img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" /></a>

        <a href="https://twitter.com/share?url=<?php echo $page_url; ?>&amp;text=<?php echo $fotografija->opis; ?>" target="_blank"><img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" /></a>

        <a href="http://vkontakte.ru/share.php?url=<?php echo $page_url; ?>" target="_blank"><img src="https://simplesharebuttons.com/images/somacro/vk.png" alt="VK" /></a>
    </div>

    <img src="<?php echo $fotografija->url; ?>" class='max-100'>

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