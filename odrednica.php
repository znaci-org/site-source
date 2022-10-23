<?php
require_once("model/Odrednica.php");

$odrednica = new Odrednica($_GET['br'], $_GET['slug']);
$broj_dogadjaja = count($odrednica->dogadjaji);
$broj_dokumenata = count($odrednica->dokumenti);
$broj_fotografija = count($odrednica->fotografije);
$naslov = $odrednica->naziv;
include_once('includes/header.php');
include_once('css/glavno.php');
?>

<div class="okvir pojam">

    <section class="gornji-odeljak">
        <div class="gore-levo">
            <img class="slika-ustanak" src="/images/ustanak.png" alt="ustanak" />
            <h1 id='pojam' class="no-outline"><?php echo $odrednica->naziv ?></h1>

            <p class="krasnopis siva-donja-crta padding-sm-bottom inline-block">Za ovaj pojam je pronađeno <span><?php echo $broj_dogadjaja; ?></span> hronoloških zapisa, <span><?php echo $broj_dokumenata; ?></span> dokumenata i <span><?php echo $broj_fotografija; ?></span> fotografija.</p>

            <input type="hidden" id="odrednica_id" value="<?php echo $odrednica->id; ?>">
            <input type="hidden" id="broj_dogadjaja" value="<?php echo $broj_dogadjaja; ?>">
            <input type="hidden" id="broj_dokumenata" value="<?php echo $broj_dokumenata; ?>">
            <input type="hidden" id="broj_fotografija" value="<?php echo $broj_fotografija; ?>">
            <input type="hidden" id="render_limit" value="<?php echo $odrednica->render_limit; ?>">
            <input type="hidden" id="fotografije_limit" value="<?php echo $odrednica->fotografije_limit; ?>">
        </div>
        <div class="clear"></div>
    </section>

    <div class="dve-kolone">
        <div class="hronologija-drzac relative">
            <div class="hide-lg kruzic prstodrzac prstodrzac-dole"></div>
            <div class="hide-lg prstodrzac polukrug-levo"></div>
            <div class="hide-lg prstodrzac polukrug-desno"></div>
            <section id="hronologija" class="podeok hronologija">
                <h2 class="naslov-odeljka">Događaji</h2>
                <div id="hronologija-sadrzaj">
                    <?php $odrednica->render_dogadjaji(); ?>
                    <?php if ($broj_dogadjaja > $odrednica->render_limit) { ?>
                        <div class="ucitavac">
                            <img src="/images/ajax-loader.gif" alt="loading" />
                            <p>Hronološki zapisi se učitavaju...</p>
                        </div>
                    <?php } ?>
                </div>
            </section>
        </div>

        <div class="relative full">
            <?php include('includes/prstodrzaci.php'); ?>
            <section id="dokumenti" class="podeok dokumenti">
                <h2 class="naslov-odeljka">Dokumenti </h2>
                <div id="dokumenti-sadrzaj">
                    <?php $odrednica->render_dokumenti(); ?>
                    <?php if ($broj_dokumenata > $odrednica->render_limit) { ?>
                        <div class="ucitavac">
                            <img src="/images/ajax-loader.gif" alt="loading" />
                            <p>Molimo sačekajte, dokumenti se učitavaju...</p>
                        </div>
                    <?php } ?>
                </div>
            </section>
        </div>
    </div>

    <div class="relative">
        <?php include('includes/prstodrzaci.php'); ?>
        <section id="fotografije" class="podeok fotografije">
            <h2 class="naslov-odeljka">Fotografije </h2>
            <div id="fotografije-sadrzaj">
                <?php $odrednica->render_fotografije(); ?>
                <?php if ($broj_fotografija > $odrednica->fotografije_limit) { ?>
                    <div class="ucitavac">
                        <img src="/images/ajax-loader.gif" alt="loading" />
                        <p>Istorijske fotografije se učitavaju...</p>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>

    <div class="relative">
        <div class="hide-lg kruzic prstodrzac prstodrzac-gore"></div>
        <section class="podeok tagovi">
            <h2 class="naslov-odeljka">Povezane odrednice </h2>
            <?php $odrednica->render_odrednice(); ?>
        </section>
    </div>

</div>

<?php
include_once("js/odrednica.php");
include_once("includes/footer.php");
?>