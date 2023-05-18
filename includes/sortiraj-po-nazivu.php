<?php

function sortirajPoNazivu(array $a, array $b) {
    if ($a['naziv'] < $b['naziv']) {
        return -1;
    } else if ($a['naziv'] > $b['naziv']) {
        return 1;
    } else {
        return 0;
    }
}
