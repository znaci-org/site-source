<?php

/* enable error reporting */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli('', getenv('MYSQL_UN'), getenv('MYSQL_PW'), getenv('MYSQL_DB'));

$mysqli->set_charset('utf8');