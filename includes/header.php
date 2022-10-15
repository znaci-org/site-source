<style>
  header {
    border: 4px groove #00A;
    background-color: #c0c0c0;
    padding: 8px;
    margin-bottom: 8px;
  }

  .site-title {
    margin-bottom: 2px;
    margin-top: 0;
    white-space: nowrap;
  }

  .navigation {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    padding: 0;
    margin: 0;
  }

  .navigation li {
    margin-left: 20px;
    font-weight: bold;
  }

  .active a {
    color: #a00000;
  }

  @media (min-width: 768px) {
    .header-flex {
      display: flex;
    }

    .desna-kolona {
      flex: 90%;
    }

    .navigation {
      justify-content: end;
    }
  }
</style>

<?php
$filename = basename($_SERVER['SCRIPT_FILENAME']);
?>

<header>
  <div class="header-flex">
    <h2 class="site-title"><a href="/">Biblioteka Znaci</a></h2>

    <ul class="desna-kolona navigation">
      <li class="<?php if ($filename == "index.php") echo "active"; ?>"><a href="/">Biblioteka</a></li>
      <li class="<?php if ($filename == "dokumenti.php") echo "active"; ?>"><a href="/dokumenti.php">Dokumenti</a></li>
      <li class="<?php if ($filename == "nemacki-dokumenti.php") echo "active"; ?>"><a href="/nemacki-dokumenti.php">Nemački dokumenti</a></li>
      <li class="<?php if ($filename == "na-danasnji-dan.php") echo "active"; ?>"><a href="/na-danasnji-dan.php">Na današnji dan</a></li>
      <li class="<?php if ($filename == "fotogalerija.php") echo "active"; ?>"><a href="/fotogalerija.php">Fotogalerija</a></li>
    </ul>
  </div>

  <b class="silver">Dokumenti i knjige o drugom svetskom ratu na teritoriji Jugoslavije i povezanim zbivanjima <small><a href="/PoezijuCeSviPisati.html">[priredio:&nbsp;Goran Despotović (1957-2022)]</a></small></b>
</header>
