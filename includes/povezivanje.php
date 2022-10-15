<?php

/* enable error reporting */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli('', 'gorran02', 'pavlica21', 'znaci');

$mysqli->set_charset('utf8');