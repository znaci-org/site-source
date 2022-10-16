<?php

if (empty($_GET['br']) || empty($_GET['vrsta'])) die();
$id = filter_input(INPUT_GET, 'br', FILTER_SANITIZE_NUMBER_INT);
$vrsta = filter_input(INPUT_GET, 'vrsta', FILTER_SANITIZE_NUMBER_INT);

if ($vrsta == 1) Header("Location: dogadjaj.php?br=".$id);
if ($vrsta == 2) Header("Location: dokument.php?br=".$id);
if ($vrsta == 3) Header("Location: fotografija.php?br=".$id);

