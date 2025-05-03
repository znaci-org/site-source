<?php 
$naslov = "Knjige";
include "includes/header.php"; 
?>

<h2>Knjige</h2>

<section class="knjige">
  <p>
    <a href="/00002/Guzvica_Komunisticka_partija_Jugoslavije_drugi_print.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
        Stefan Gužvica: PRIJE TITA - Frakcijske borbe u Komunističkoj partiji Jugoslavije 1936-1940</span></a>
  </p>
  <p>
    <a href="/00001/23.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
        Ilija T. Radakovi&#263;: BESMISLENA YU-RATOVANJA 1991-1995</span></a>
  </p>
  <p>
    <a href="/00002/420.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
        Snje&#382;ana Kordi&#263;: JEZIK I NACIONALIZAM</span></a>
  </p>
  <p>
    <a href="/00002/423.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
        NASTAVA MODERNE HISTORIJE JUGOISTO&#268;NE EVROPE (Dodatni nastavni materijal) - Drugi svjetski rat</span></a>
  </p>
  <p>
    <a href="/00003/574.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
        Todor Kulji&#263;: PREVLADAVANJE PRO&#352;LOSTI - uzroci i pravci promene slike istorije krajem XX veka</span></a>
  </p>
  <p>
    <a href="/00003/582.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
        UVOD U PRO&#352;LOST (Boris Buden, &#381;elimir &#381;ilnik, kuda.org i ostali)</span></a>
  </p>
  <p>
    <a href="/00003/736.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
        Savez antifašističkih boraca Hrvatske: RUŠENJE ANTIFAŠISTIČKIH SPOMENIKA U HRVATSKOJ 1990–2000.</span></a><br>
        <img src="/images/thumbnails/736_4m.jpg" width="200"> </p>
  </p>
  <p>
    <a href="/00003/700.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
        Slobodan V. Ristanovi&#263;: TO SU NA&#352;IH RUKU DELA &#8211; Herojska i slavna epopeja omladinskih radnih akcija 1941&#8211;1990.</span></a>
  </p>
  <p>
    <a href="/00003/600.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
        Stevo Ostoji&#263;: NA&#352;E GODINE &#8211; Nova Jugoslavija s naslovnih strana 1943-1983</span></a>
  </p>
  <p>
    <a href="/00003/708.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
        Grupa autora: SVET O TITU 1980.</span></a>
  </p>

<section class="knjige">
  <h3>Periodika</h3>
  <?php
  $konekcija = mysqli_connect("", getenv('MYSQL_UN'), getenv('MYSQL_PW'), getenv('MYSQL_DB'));
  mysqli_set_charset($konekcija, 'utf8');
  $upit0 = "SELECT * FROM periodika ORDER BY broj_periodike DESC;";
  $rezultat0 = mysqli_query($konekcija, $upit0);
  while ($red0 = mysqli_fetch_assoc($rezultat0)) {
    $upit00 = "SELECT * FROM izdavaci WHERE id=" . $red0['izdavac'] . ";";
    $rezultat00 = mysqli_query($konekcija, $upit00);
    $red00 = mysqli_fetch_assoc($rezultat00);
    $izdavac = $red00['naziv'];
    $sediste = $red00['sediste'];
    $god_izdanja = $red0['god'];
    echo "<p>";
    echo "&nbsp;&nbsp;&#9658;&nbsp;" . $red0['naziv_periodike'] . ", " . $izdavac . ", "  . $sediste . "</p>";
    $upit1 = "SELECT DISTINCT god FROM brojevi WHERE broj_periodike = " . $red0['broj_periodike'] . " ORDER BY god;";
    $rezultat1 = mysqli_query($konekcija, $upit1);
    while ($red1 = mysqli_fetch_assoc($rezultat1)) {
      echo "<p>";
      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $red1['god'] . ": ";
      $upit2 = "SELECT * FROM brojevi WHERE broj_periodike = " . $red0['broj_periodike'] . " AND god = "  . $red1['god'] . " ORDER BY broj_knjige;";
      $rezultat2 = mysqli_query($konekcija, $upit2);
      while ($red2 = mysqli_fetch_assoc($rezultat2)) {
        echo "<a href=" . chr(34) . "/00003/7xx.php?bk=" . $red2['broj_knjige'] . chr(34) . " target=" . chr(34) . "_blank" . chr(34) . ">"  . $red2['brojevi_u_godini'] . " " . "</a>" ;
      }
      echo "</p>";
    }
    echo "\n";
  }
  ?>

  <h3>Sve knjige, po redosledu postavljanja, najsvežije na vrhu</h3>
  <?php
  $konekcija = mysqli_connect("", getenv('MYSQL_UN'), getenv('MYSQL_PW'), getenv('MYSQL_DB'));
  mysqli_set_charset($konekcija, 'utf8');
  $upit0 = "SELECT * FROM knjige WHERE broj_knjige < 10000 ORDER BY broj_knjige DESC;";
  $rezultat0 = mysqli_query($konekcija, $upit0);
  while ($red0 = mysqli_fetch_assoc($rezultat0)) {
    $autor = $red0['a1'];
    if ($red0['a2']) {
      $autor = $autor . ", " . $red0['a2'];
    }
    if ($red0['a3']) {
      $autor = $autor . ", " . $red0['a3'];
    }
    if ($red0['a4']) {
      $autor = $autor . ", " . $red0['a4'];
    }
    $autor = $autor . ": ";
    $god_izdanja = $red0['god'];
    $upit00 = "SELECT * FROM izdavaci WHERE id=" . $red0['izdavac'] . ";";
    $rezultat00 = mysqli_query($konekcija, $upit00);
    $red00 = mysqli_fetch_assoc($rezultat00);
    $izdavac = $red00['naziv'];
    $sediste = $red00['sediste'];
    echo "<p>";
    echo "<a href=" . chr(34) . "/00003/7xx.php?bk=" . $red0['broj_knjige'] . chr(34) . " target=" . chr(34) . "_blank" . chr(34) . "><span>&nbsp;&nbsp;&#9658;&nbsp;";
    echo $autor . $red0['naziv_knjige'] . ", " . $izdavac . ", "  . $sediste . " "  . $god_izdanja . ".</span></a></p>";
    echo "\n";
  }
  ?>


    <a href="/00003/1001.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;
        Sergej Flere, Rudi Klanjšek: Was Tito’s Yugoslavia totalitarian?</span></a> </p>

  <tr>
    <td>
      <h3>Drugi svetski rat u Jugoslaviji</h3>
      <table width="100%" border="1">
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name=" a1">-</a> posebno</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/00001/53.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  HRONOLOGIJA NARODNOOSLOBODILA&#268;KOG RATA 1941-1945 </span></a>
            </p>
            <p>
              <a href="/00003/601.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Fitzroy Maclean: THE HERETIC: THE LIFE AND TIMES OF JOSIP BROZ-TITO</span></a>
            </p>
            <p>
              <a href="/00001/129.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Viktor Ku&#269;an: BORCI SUTJESKE</span></a>
            </p>
            <p>
              <a href="/00003/523.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Nikola Ani&#263;, Sekula Joksimovi&#263;, Mirko Guti&#263;: NARODNOOSLOBODILA&#268;KA VOJSKA JUGOSLAVIJE</span></a>
            </p>
            <p>
              <a href="/00001/10.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  NARODNI HEROJI JUGOSLAVIJE</span></a>
            </p>
            <p>
              <a href="/00001/191.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Ja&#353;a Romano: JEVREJI JUGOSLAVIJE 1941 - 1945. &#381;RTVE GENOCIDA I U&#268;ESNICI NARODNOOSLOBODILA&#268;KOG RATA</span></a>
            </p>
            <p>
              <a href="/00001/151.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  OSLOBODILA&#268;KI RAT NARODA JUGOSLAVIJE - knjiga 1</span></a>
            </p>
            <p>
              <a href="/00001/153.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  OSLOBODILA&#268;KI RAT NARODA JUGOSLAVIJE - knjiga 2</span></a>
            </p>
            <p>
              <a href="/00003/436.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Mladenko Coli&#263;: PREGLED OPERACIJA NA JUGOSLOVENSKOM RATI&#352;TU 1941 - 1945</span></a>
            </p>
            <p>
              <a href="/00003/595.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Petar V. Brajovi&#263;-&#272;uro: JUGOSLAVIJA U DRUGOM SVETSKOM RATU</span></a>
            </p>
            <p>
              <a href="/00001/58.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Ljubivoje Pajovi&#263;, Du&#353;an Uzelac, Milovan D&#382;elebd&#382;i&#263;: SREMSKI FRONT 1944-1945</span></a>
            </p>
            <p>
              <a href="/00003/724.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoljub Tmu&#353;i&#263;: SREMSKI FRONT</span></a>
            </p>
            <p>
              <a href="/00001/21.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Olivera Milosavljevi&#263;: POTISNUTA ISTINA</span></a>
            </p>
            <p>
              <a href="/00001/25.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Aleksandar Nenadovi&#263;: RAZGOVORI S KO&#268;OM</span></a>
            </p>
            <p>
              <a href="/00001/29.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Ko&#269;a Popovi&#263;: BELE&#352;KE UZ RATOVANJE (priredio Milo&#353; Vuksanovi&#263;)</span></a>
            </p>
            <p>
              <a href="/00001/219.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Kosta Nad: 1942.</span></a>
            </p>
            <p>
              <a href="/00003/612.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  RATNE USPOMENE KOSTE NA&#272;A; BIHA&#262;KA REPUBLIKA</span></a>
            </p>
            <p>
              <a href="/00001/212.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Gojko Nikoli&#353;: KORIJEN, STABLO, PAVETINA (memoari)</span></a>
            </p>
            <p>
              <a href="/00003/745.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Vladimir Dedijer: DNEVNIK 1941-1944</span></a>
            </p>
            <p>
              <a href="/00003/745.php?pripadnost=knjiga+I" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  prva knjiga - od 6.4.1941 do 27.11.1942.</span></a>
            </p>
            <p>
              <a href="/00003/745.php?pripadnost=knjiga+II" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  druga knjiga - od 28.11.1942. do 9.11.1943.</span></a>
            </p>
            <p>
              <a href="/00003/745.php?pripadnost=knjiga+III" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  tre&#263;a knjiga - od 10.11.1943. do 7.11.1944.</span></a>
            </p>
            <p>
              <a href="/00003/701.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Savo Orovi&#263;: RATNI DNEVNIK 1941&#8211;1945</span></a>
            </p>
            <p>
              <a href="/00001/222.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Veljko Kova&#269;evi&#263;: RATNA SJE&#262;ANJA</span></a>
            </p>
            <p>
              <a href="/00003/495.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Svetozar Vukmanovi&#263; Tempo: REVOLUCIJA KOJA TE&#268;E - MEMOARI, knjiga I</span></a>
            </p>
            <p>
              <a href="/00003/496.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Svetozar Vukmanovi&#263; Tempo: REVOLUCIJA KOJA TE&#268;E - MEMOARI, knjiga II</span></a>
            </p>
            <p>
              <a href="/00003/723.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Ljubodrag &#272;uri&#263;: SE&#262;ANJA NA LJUDE I DOGA&#272;AJE</span></a>
            </p>
            <p>
              <a href="/00001/265.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Milutin Mora&#269;a: RATNI DNEVNIK</span></a>
            </p>
            <p>
              <a href="/00001/59.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  U&#381;I&#268;KA REPUBLIKA - ZBORNIK SE&#262;ANJA</span></a>
            </p>
            <p>
              <a href="/00003/527.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Mirko Tepavac: MOJ DRUGI SVETSKI RAT I MIR</span></a>
            </p>
            <p>
              <a href="/00001/8.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Aleksandar Vojinovi&#263; - HOTEL "PARK"</span></a>
            </p>
            <p>
              <a href="/00003/451.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Gajo Vojvodi&#263; - PRI&#268;A JEDNOG PROLETERA</span></a>
            </p>
            <p>
              <a href="/00001/127.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  NAIL RED&#381;I&#262;: TELMANOVCI (Zapisi o njema&#269;koj partizanskoj &#269;eti "Ernest Telman") </span></a>
            </p>
            <p>
              <a href="/00003/591.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Petar Kleut: PARTIZANSKA TAKTIKA</span></a>
            </p>
            <p>
              <a href="/00001/210.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Rudolf Primorac: OPERATIVNO-TAKTI&#268;KA ISKUSTVA IZ PRVE POLOVINE NARODNOOSLOBODILA&#268;KOG RATA</span></a>
            </p>
            <p>
              <a href="/00001/218.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Jovo Popovi&#263;: VJE&#352;ALA ZA GENERALE</span></a>
            </p>
            <p>
              <a href="/00003/393.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Tone Ferenc: NACISTI&#268;KA POLITIKA DENACIONALIZACIJE U SLOVENIJI U GODINAMA OD 1941. DO 1945.</span></a>
            </p>
            <p>
              <a href="/00003/392.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  André Brissaud, Jean Mabire: NO&#262; I MAGLA; GESTAPO NAD EVROPOM</span></a>
            </p>
            <p>
              <a href="/00003/391.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Slavko Odi&#263;, Slavko Komarica: NO&#262; I MAGLA; GESTAPO U JUGOSLAVIJI</span></a>
            </p>
            <p>
              <a href="/00003/615.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  VOJNI MUZEJ BEOGRAD - &#268;ETRNAEST VEKOVA BORBI ZA SLOBODU</span></a>
            </p>
            <p>
              <a href="/00003/661.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  PETA ZEMALJSKA KONFERENCIJA KPJ - ZBORNIK RADOVA</span></a>
            </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="a2">-</a> knjige savezni&#269;kih autora</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/00001/1.htm" target="_blank">
                &nbsp;&nbsp;&#9658;&nbsp;
                Fitzroy Maclean: EASTERN APPROACHES / RAT NA BALKANU
              </a>
            </p>
            <p>
              <a href="/00001/5.htm" target="_blank">
                &nbsp;&nbsp;&#9658;&nbsp;
                William Deakin: EMBATTLED MOUNTAIN / BOJOVNA PLANINA
              </a>
            </p>
            <p>
              <a href="/00001/3.htm" target="_blank">
                &nbsp;&nbsp;&#9658;&nbsp;
                Basil Davidson: PARTISAN PICTURE (en)
              </a>
            </p>
            <p>
              <a target="_blank" href="/canadian_surgeon/">&nbsp;&nbsp;&#9658;&nbsp;
                Brian Jeffrey Street: THE PARACHUTE WARD - A Canadian Surgeon's Wartime Adventures in Yugoslavia (en)</a>
            </p>
            <p>
              <a href="/00001/171.htm" target="_blank">&nbsp;&nbsp;&#9658;&nbsp;
                Elisabeth Barker: BRITANSKA POLITIKA PREMA JUGOISTO&#268;NOJ EVROPI U DRUGOM SVJETSKOM RATU
              </a>
            </p>
            <p>
              <a href="/00001/6.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Louis Huot: GUNS FOR TITO (en)</span></a>
            </p>
            <p>
              <a href="/00001/13.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Major William Jones: TWELVE MONTHS WITH TITO'S PARTISANS (en)</span></a>
            </p>
            <p>
              <a href="/00001/40.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Jozo Tomasevich: &#268;ETNICI U DRUGOM SVJETSKOM RATU 1941-1945 (Stanford University Press 1975)</span></a>
            </p>
            <p>
              <a href="/00001/293.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  John Cripps: MIHAILOVIC OR TITO? HOW THE CODEBREAKERS HELPED CHURCHILL CHOOSE (en)</span></a>
            </p>
            <p>
              <a href="/00001/294.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  The Secrets War. The Office of Strategic Services in World War II (en)</span></a>
            </p>
            <p>
              <a href="/00001/306.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  (US DEPARTMENT OF THE ARMY): GERMAN ANTIGUERRILLA OPERATIONS IN THE BALKANS (1941-1944) (en)</span></a>
            </p>
            <p>
              <a href="/00001/305.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  RAF MEDITERRANEAN REVIEW (en)</span></a>
            </p>
            <p>
              <a href="/00002/311.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  SPECIAL OPERATIONS: AAF AID TO EUROPEAN RESISTANCE MOVEMENTS (en)</span></a>
            </p>
            <p>
              <a href="/00002/362.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Lieutenant-Colonel Wayne D. Eyre: OPERATION RÖSSELSPRUNG (en)</span></a>
            </p>
            <p>
              <a href="/00002/406.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  AN ANALYSIS OF THE CIRCUMSTANCES SURROUNDING THE RESCUE AND EVACUATION OF ALLIED AIRCREWMEN FROM YUGOSLAVIA, 1941-1945, by Thomas T. Matteson,.Commander, USCG</span></a>
            </p>
            <p>
              <a href="/00002/314.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  William M. Leary: FUELING THE FIRES OF RESISTANCE - Army Air Forces Special Operations in the Balkans during World War II (en)</span></a>
            </p>
            <p>
              <a href="/00002/315.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  AIR POWER IN THE MEDITERRANEAN - November 1942 - February 1945 (en)</span></a>
            </p>
            <p>
              <a href="/00002/316.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  WORLD WAR II - A CHRONOLOGY (en)</span></a>
            </p>
            <p>
              <a href="/00002/323.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  GERMAN MILITARY ABBREVIATIONS</span></a>
            </p>
            <p>
              <a href="/00002/363.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  NUERENBERG TRIALS - The High Command Case & The Hostage Case</span></a>
            </p>
            <p>
              <a href="/00002/373.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Marshal Stalin's Correspondence with Winston Churchill and Clement Attlee (July 1941-November 1945)</span></a>
            </p>
            <p>
              <a href="/00003/603.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Pietro Badoglio: ITALY IN THE SECOND WORLD WAR - MEMORIES AND DOCUMENTS</span></a>
            </p>
            <p>
              <a href="/00003/900.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  James M. Inks: EIGHT BALED OUT</span></a>
            </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="a3">-</a> knjige nema&#269;kih autora</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/00001/194.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Lothar Rendulic: GEKÄMPFT, GESIEGT, GESCHLAGEN (de)</span></a>
            </p>
            <p>
              <a href="/00001/180.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Franz Schraml: KRIEGSSCHAUPLATZ KROATIEN (de)</span></a>
            </p>
            <p>
              <a href="/00001/181.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Roland Kaltenegger: Totenkopf & Edelweiß (de)</span></a>
            </p>
            <p>
              <a href="/00001/200.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Otto Kumm: VORWÄRTS, PRINZ EUGEN! - Geschichte der 7. SS-Freiwilligen-Division "Prinz Eugen" (de)</span></a>
            </p>
            <p>
              <a href="/00001/174.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Thomas Casagrande: DIE VOLKSDEUTSCHE SS-DIVISION "PRINZ EUGEN" (de)</span></a>
            </p>
            <p>
              <a href="/00001/172.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Herman Nojbaher: SPECIJALNI ZADATAK BALKAN</span></a>
            </p>
            <p>
              <a href="/00001/178.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Valter Mano&#353;ek: HOLOKAUST U SRBIJI</span></a>
            </p>
            <p>
              <a href="/00001/289.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Erich Schmidt-Richberg: DER ENDKAMPF AUF DEM BALKAN - Die Operationen der Heeresgruppe E von Griechenland bis zu den Alpen</span></a>
            </p>
            <p>
              <a href="/00001/291.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Karl Hnilicka: DAS ENDE AUF DEM BALKAN 1944/45</span></a>
            </p>
            <p>
              <a href="/00002/310.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Karl Gaiser: THE PARTISAN WARFARE IN CROATIA (en)</span></a>
            </p>
            <p>
              <a href="/00002/426.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Heinz Kühnrich / Franz-Karl Hitze: DEUTSCHE BEI TITOS PARTISANEN 1941-1945 (de)</span></a>
            </p>
            <p>
              <a href="/00003/482.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Mario Roatta: OTTO MILIONI DI BAIONETTE (it)</span></a>
            </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="a4">-</a> knjige doma&#263;ih autora</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/00001/151.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  OSLOBODILA&#268;KI RAT NARODA JUGOSLAVIJE - knjiga 1</span></a>
            </p>
            <p>
              <a href="/00001/153.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  OSLOBODILA&#268;KI RAT NARODA JUGOSLAVIJE - knjiga 2</span></a>
            </p>
            <p>
              <a href="/00003/436.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Mladenko Coli&#263;: PREGLED OPERACIJA NA JUGOSLOVENSKOM RATI&#352;TU 1941 - 1945</span></a>
            </p>
            <p>
              <a href="/00001/58.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Ljubivoje Pajovi&#263;, Du&#353;an Uzelac, Milovan D&#382;elebd&#382;i&#263;: SREMSKI FRONT 1944-1945</span></a>
            </p>
            <p>
              <a href="/00001/53.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  HRONOLOGIJA NARODNOOSLOBODILA&#268;KOG RATA 1941-1945 </span></a>
            </p>
            <p>
              <a href="/00002/366.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Velimir Terzi&#263: SLOM KRALJEVINE JUGOSLAVIJE; uzroci i posledice poraza - knjiga 1</span></a>
            </p>
            <p>
              <a href="/00002/367.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Velimir Terzi&#263: SLOM KRALJEVINE JUGOSLAVIJE; uzroci i posledice poraza - knjiga 2</span></a>
            </p>
            <p>
              <span>&nbsp;&nbsp;&#9658;&nbsp;
                Du&#353;an Luka&#269;: TRE&#262;I RAJH I ZEMLJE JUGOISTO&#268;NE EVROPE:</span></a>
            </p>
            <p>
              <a href="/00003/692.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  1. deo (1933&#8212;1936)
                </span></a>
            </p>
            <p>
              <a href="/00003/693.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  2. deo (1937&#8212;1941)
                </span></a>
            </p>
            <p>
              <a href="/00003/694.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  3. deo (1941&#8212;1945)
                </span></a>
            </p>
            <p>
              <a href="/00003/691.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Mladen Stefanovi&#263;: ZBOR DIMITRIJA LJOTI&#262;A</span></a>
            </p>
            <p>
              <a href="/00001/239.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Bo&#382;o Lazarevi&#263;: VAZDUHOPLOVSTVO U NOR-u 1941-1945.</span></a>
            </p>
            <p>
              <a href="/00001/85.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Venceslav Gli&#353;i&#263;: U&#381;I&#268;KA REPUBLIKA</span></a>
            </p>
            <p>
              <a href="/00001/170.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Mi&#353;o Lekovi&#263;: MARTOVSKI PREGOVORI 1943.</span></a>
            </p>
            <p>
              <a href="/00003/680.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Slavko Komarica, Slavko Odi&#263;: ZA&#352;TO JASENOVAC NIJE OSLOBO&#272;EN</span></a>
            </p>
            <p>
              <a href="/00001/92.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Branko Petranovi&#263;: SRBIJA U DRUGOM SVETSKOM RATU</span></a>
            </p>
            <p>
              <a href="/00001/93.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Branko Petranovi&#263;: ISTORIJA JUGOSLAVIJE, knjiga I - KRALJEVINA JUGOSLAVIJA</span></a>
            </p>
            <p>
              <a href="/00001/96.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Branko Petranovi&#263;: ISTORIJA JUGOSLAVIJE, knjiga II - NARODNOOSLOBODILA&#268;KI RAT I REVOLUCIJA</span></a>
            </p>
            <p>
              <a href="/00001/95.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Branko Petranovi&#263;: ISTORIJA JUGOSLAVIJE, knjiga III - SOCIJALISTI&#268;KA JUGOSLAVIJA 1945-1988</span></a>
            </p>
            <p>
              <a href="/00001/138.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Branko Petranovi&#263;, Mom&#269;ilo Ze&#269;evi&#263;: JUGOSLAVIJA 1918-1988. TEMATSKA ZBIRKA DOKUMENATA
                </span></a>
            </p>
            <p>
              <a href="/00003/461.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Vlado Strugar: JUGOSLAVIJA 1941-1945</span></a>
            </p>
            <p>
              <a href="/00003/459.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Vlado Strugar: DER JUGOSLAWISCHE VOLKSBEFREIUNGSKRIEG 1941 BIS 1945</span></a>
            </p>
            <p>
              <a href="/00001/120.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Ibrahim Latifi&#263;: JUGOSLAVIJA 1945-1990 (razvoj privrede i dru&#353;tvenih djelatnosti)
                </span></a>
            </p>
            <p>
              <a href="/00001/154.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr. Milan Borkovi&#263;: KVISLIN&#352;KA UPRAVA U SRBIJI 1941 - 1944 - knjiga 1
                </span></a>
            </p>
            <p>
              <a href="/00001/155.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr. Milan Borkovi&#263;: KVISLIN&#352;KA UPRAVA U SRBIJI 1941 - 1944 - knjiga 2
                </span></a>
            </p>
            <p>
              <a href="/00001/183.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Mi&#353;o Lekovi&#263;: OFANZIVA PROLETERSKIH BRIGADA U LETO 1942.</span></a>
            </p>
            <p>
              <a href="/00003/659.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Rasim Hurem: KRIZA NOP-A U BOSNI I HERCEGOVINI KRAJEM 1941. I PO&#268;ETKOM 1942.</span></a>
            </p>
            <p>
              <a href="/00001/135.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Ljubomir Bo&#353;njak: DIVERZANTSKA DEJSTVA U NARODNOOSLOBODILA&#268;KOM RATU 1941-1945</span></a>
            </p>
            <p>
              <a href="/00001/107.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Todor Rado&#353;evi&#263;: OFANZIVA ZA OSLOBOÐENJE DALMACIJE</span></a>
            </p>
            <p>
              <a href="/00003/452.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Boro Mitrovski, Venceslav Gli&#353;i&#263;, Tomo Ristovski: BUGARSKA VOJSKA U JUGOSLAVIJI 1941-1945</span></a>
            </p>
            <p>
              <a href="/00003/726.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Venceslav Gli&#353;i&#263;, dr Gojko Miljani&#263;: RUKOVO&#272;ENJE NARODNOOSLOBODILA&#268;KOM BORBOM U SRBIJI 1941&#8211;1945.</span></a>
            </p>
            <p>
              <a href="/00001/141.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Milan In&#273;i&#263;: BORBE ZA TRAVNIK</span></a>
            </p>
            <p>
              <a href="/00002/365.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Titovo doba: Hrvatska prije, za vrijeme i poslije (zbornik radova)</span></a>
            </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="a12">-</a>o ustanku</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/00002/340.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  USTANAK NARODA JUGOSLAVIJE, ZBORNIK - knjiga I</span></a>
            </p>
            <p>
              <a href="/00002/341.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  USTANAK NARODA JUGOSLAVIJE, ZBORNIK - knjiga II</span></a>
            </p>
            <p>
              <a href="/00003/435.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  USTANAK NARODA JUGOSLAVIJE, ZBORNIK - knjiga III</span></a>
            </p>
            <p>
              <a href="/00003/434.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  USTANAK NARODA JUGOSLAVIJE, ZBORNIK - knjiga IV</span></a>
            </p>
            <p>
              <a href="/00002/344.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  USTANAK NARODA JUGOSLAVIJE, ZBORNIK - knjiga V</span></a>
            </p>
            <p>
              <a href="/00002/345.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  USTANAK NARODA JUGOSLAVIJE, ZBORNIK - knjiga VI</span></a>
            </p>
            <p>
              <a href="/00003/535.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Du&#353;an Luka&#269;: USTANAK U BOSANSKOJ KRAJINI</span></a>
            </p>
            <p>
              <a href="/00003/657.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: USTANI&#268;KE ISKRE U HRVATSKOJ 1941.</span></a>
            </p>
            <p>
              <a href="/00001/59.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  U&#381;I&#268;KA REPUBLIKA - ZBORNIK SE&#262;ANJA</span></a>
            </p>
            <p>
              <a href="/00003/729.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: U&#381;I&#268;KA REPUBLIKA &#8211; knjiga 1.</span></a>
            </p>
            <p>
              <a href="/00003/730.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: U&#381;I&#268;KA REPUBLIKA &#8211; knjiga 2.</span></a>
            </p>
            <p>
              <a href="/00003/7xx.php?bk=914" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoslav Dimitrijevi&#263; Beli: PARTIZANI PRED BEOGRADOM I NEMAČKA KAZNENA EKSPEDICIJA</span></a>
            </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="a13">-</a>ndh</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/00003/526.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Bogdan Krizman: PAVELI&#262; I USTA&#352;E</span></a>
            </p>
            <p>
              <a href="/00003/528.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Bogdan Krizman: PAVELI&#262; IZME&#272;U HITLERA I MUSSOLINIJA</span></a>
            </p>
            <p>
              <a href="/00003/530.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Bogdan Krizman: USTA&#352;E I TRE&#262;I REICH - knjiga 1</span></a>
            </p>
            <p>
              <a href="/00003/531.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Bogdan Krizman: USTA&#352;E I TRE&#262;I REICH - knjiga 2</span></a>
            </p>
            <p>
              <a href="/00003/532.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Fikreta Jeli&#263;-Buti&#263;: USTA&#352;E I NEZAVISNA DR&#381;AVA HRVATSKA 1941-1945.</span></a>
            </p>
            <p>
              <a href="/00003/519.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Viktor Novak: MAGNUM CRIMEN</span></a>
            </p>
            <p>
              <a href="/00003/510.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Antun Mileti&#263;: KONCENTRACIONI LOGOR JASENOVAC 1941-1945. - Dokumenta, Knjiga I</span></a>
            </p>
            <p>
              <a href="/00003/513.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Antun Mileti&#263;: KONCENTRACIONI LOGOR JASENOVAC 1941-1945. - Dokumenta, Knjiga II</span></a>
            </p>
            <p>
              <a href="/00003/512.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Antun Mileti&#263;: KONCENTRACIONI LOGOR JASENOVAC 1941-1945. - Dokumenta, Knjiga III</span></a>
            </p>
            <p>
              <a href="/zb/4_25_1.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  ZLO&#268;INI NA JUGOSLOVENSKIM PROSTORIMA U PRVOM I DRUGOM SVETSKOM RATU - ZBORNIK DOKUMENATA: tom I, ZLO&#268;INI NDH - knjiga 1: godina 1941.</span></a>
            </p>
            <p>
              <span>&nbsp;&nbsp;&#9658;&nbsp;
                NEMA&#268;KA OBAVE&#352;TAJNA SLU&#381;BA U OKUPIRANOJ JUGOSLAVIJI, interna publikacija III odeljenja UPRAVE DR&#381;AVNE BEZBEDNOSTI</span>
            </p>
            <p>
              <a href="/00003/511.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  V knjiga: Nema&#269;ka obave&#353;tajna slu&#382;ba u usta&#353;koj NDH</span></a>
            </p>
            <p>
              <a href="/00003/515.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  IX knjiga: Zbirka dokumenata: Usta&#353;ka NDH</span></a>
            </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="a5">-</a> o &#269;etnicima Dra&#382;e Mihailovi&#263;a</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/00001/40.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Jozo Tomasevich: &#268;ETNICI U DRUGOM SVJETSKOM RATU 1941-1945 (Stanford University Press 1975)</span></a>
            </p>
            <p>
              <a href="/00003/457.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Branko Latas, Milovan D&#382;elebd&#382;i&#263;: &#268;ETNI&#268;KI POKRET DRA&#381;E MIHAILOVI&#262;A</span></a>
            </p>
            <p>
              <a href="/00001/11.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Nikola Milovanovi&#263; - DRA&#381;A MIHAILOVI&#262;</span></a>
            </p>
            <p>
              <a href="/00001/41.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Fikreta Jeli&#263;-Buti&#263;. &#268;ETNICI U HRVATSKOJ 1941-1945</span></a>
            </p>
            <p>
              <a href="/00001/9.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Ratko Martinovi&#263; - OD RAVNE GORE DO VRHOVNOG &#352;TABA</span></a>
            </p>
            <p>
              <a href="/00003/639.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Radoje Pajovi&#263;: KONTRAREVOLUCIJA U CRNOJ GORI - &#268;ETNI&#268;KI I FEDERALISTI&#268;KI POKRET 1941 - 1945</span></a>
            </p>
            <p>
              <a href="/00003/609.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  KOLA&#352;INSKI &#268;ETNI&#268;KI ZATVOR 1942. - ZBORNIK RADOVA</span></a>
            </p>
            <p>
              <a href="/00003/584.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Nikola Milovanovi&#263;: DRAGI&#352;A VASI&#262;</span></a>
            </p>
            <p>
              <a href="/00001/22.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoljub Panti&#263;: NO&#262; KAME</span></a>
            </p>
            <p>
              <a href="/00001/15.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Jovo Popovi&#263;, Marko Loli&#263;, Branko Latas: POP IZDAJE (vojvoda Mom&#269;ilo Ðuji&#263;)</span></a>
            </p>
            <p>
              <a href="/00001/38.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Radisav S. Nedovi&#263;, Pantelija M. Vasovi&#263;: ZATAMNJENA ISTINA (&#268;A&#268;AK 2006)</span></a>
            </p>
            <p>
              <a href="/00001/44.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Radisav S. Nedovi&#263;: &#268;A&#268;ANSKI KRAJ I NOB - SLOBODARI NA STRATI&#352;TIMA (Spisak &#382;rtava Drugog svetskog rata u &#269;a&#269;anskom kraju - &#268;A&#268;AK 2009)</span></a>
            </p>
            <p>
              <a href="/00001/242.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Rade Poznanovi&#263;, Milun Raoni&#263;, Milorad Radoj&#269;i&#263;: TRAGOM IZDAJE (zlo&#269;ini i izdaja &#269;etnika tokom U&#382;i&#269;ke republike)</span></a>
            </p>
            <p>
              <a href="/00002/419.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Du&#353;an Prica, Joksim Radojkovi&#263;: MIJAJLOVA JAMA</span></a>
            </p>
            <p>
              <a href="/00001/47.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoslav Dimitrijevi&#263; Beli: GDE JE MOJA MAMA (hronika Avalskog korpusa JVuO)</span></a>
            </p>
            <p>
              <a href="/00003/473.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  ZLO&#268;INI &#268;ETNI&#268;KOG POKRETA U SRBIJI 1941-1945. - Zbornik radova</span></a>
            </p>
            <p>
              <a href="/00001/114.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Branko Latas: DOKUMENTI O SARADNJI &#268;ETNIKA SA OSOVINOM</span></a>
            </p>
            <p>
              <a href="/00001/60.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Miodrag Ze&#269;evi&#263;: DOKUMENTA SA SUÐENJA DRA&#381;I MIHAILOVI&#262;U</span></a>
            </p>
            <p>
              <a href="/00001/60_1_5.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  Optu&#382;nica</span></a>
            </p>
            <p>
              <a href="/00001/60_1_6.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  Sudsko saslu&#353;anje Dra&#382;e Mihailovi&#263;a</span></a>
            </p>
            <p>
              <a href="/00001/60_2_9.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  Ispitivanje svedoka</span></a>
            </p>
            <p>
              <a href="/00001/269.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Jovan Radovanovi&#263;: DRAGOLJUB DRA&#381;A MIHAILOVI&#262; U OGLEDALU ISTORIJSKIH DOKUMENATA</span></a>
            </p>
            <p>
              <a href="/00001/281.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Radoje Pajovi&#263; - Du&#353;an &#381;eljeznov - Branislav Bo&#382;ovi&#263;: PAVLE ÐURI&#352;I&#262; - LOVRO HACIN - JURAJ &#352;PILER</span></a>
            </p>
            <p>
              <a href="/00001/304.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Vladan Tomi&#263;: NEMA MESTA NA NEBU (Vojislav Raj&#269;i&#263; "Po&#382;arevac")</span></a>
            </p>
            <p>
              <a href="/00003/446.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Prof. dr Smail &#268;eki&#263;: GENOCID NAD BO&#352;NJACIMA U DRUGOM SVJETSKOM RATU - DOKUMENTI</span></a>
            </p>
            <p>
              <a href="/00003/764.php" target="_blank"><span>&nbsp;&nbsp;&#9658;
                  Suđenje članovima političkog i vojnog rukovodstva organizacije Draže Mihailovića – STENOGRAFSKE BELEŠKE </span></a>
            </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="a6">-</a> jedinice NOV I POJ</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/00003/523.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Nikola Ani&#263;, Sekula Joksimovi&#263;, Mirko Guti&#263;: NARODNOOSLOBODILA&#268;KA VOJSKA JUGOSLAVIJE</span></a>
            </p>
            <table border="1" width=98%>
              <tr>
                <td style="background-color: #000060; color: #ffffff">-- brigade</td>
              </tr>
              <tr>
                <td>
                  <p>
                    <a href="/00001/99.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        PRVA PROLETERSKA BRIGADA - ZBORNIK SE&#262;ANJA (knjiga 1)</span></a>
                  </p>
                  <p>
                    <a href="/00001/27.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        PRVA PROLETERSKA BRIGADA - ZBORNIK SE&#262;ANJA (knjiga 2)</span></a>
                  </p>
                  <p>
                    <a href="/00001/98.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        PRVA PROLETERSKA BRIGADA - ZBORNIK SE&#262;ANJA (knjiga 3)</span></a>
                  </p>
                  <p>
                    <a href="/00001/97.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        PRVA PROLETERSKA BRIGADA - ZBORNIK SE&#262;ANJA (knjiga 4) - SPISAK BORACA</span></a>
                  </p>
                  <p>
                    <a href="/00001/54.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        PRVA PROLETERSKA BRIGADA - ILUSTROVANA MONOGRAFIJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/382.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milo&#353; Vuksanovi&#263;: PRVA PROLETERSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/207.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                        DALMATINCI U PRVOJ PROLETERSKOJ</span></a>
                  </p>
                  <p>
                    <a href="/00003/493.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                        PRVI CRNOGORSKI BATALJON PRVE PROLETERSKE NOU BRIGADE - ZBORNIK SJE&#262;ANJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/509.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                        Mitar Mitrovi&#263;: RATNIM STAZAMA PROLETERA (&#268;ETVRTI KRALJEVA&#268;KI BATALJON PRVE PROLETERSKE NOU BRIGADE)</span></a>
                  </p>
                  <p>
                    <a href="/00003/748.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                        Branislav Bo&#382;ovi&#263;: RUDARSKA &#268;ETA</span></a>
                  </p>
                  <p>
                    <a href="/00003/499.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                        BEOGRADSKI BATALJON PRVE PROLETERSKE NOU BRIGADE - MONOGRAFIJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/55.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        50 GODINA DRUGE PROLETERSKE BRIGADE - ILUSTROVANA MONOGRAFIJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/387.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Sredoje Uro&#353;evi&#263;: DRUGA PROLETERSKA BRIGADA - RATOVANJE I RATNICI - II IZMENJENO I DOPUNJENO IZDANJE</span></a>
                  </p>
                  <p>
                    <a href="/00001/202.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        DRUGA PROLETERSKA BRIGADA - SE&#262;ANJA BORACA, KNJIGA 2</span></a>
                  </p>
                  <p>
                    <a href="/00001/203.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        DRUGA PROLETERSKA BRIGADA - SE&#262;ANJA BORACA, KNJIGA 4</span></a>
                  </p>
                  <table width=100% border="1">
                    <tr>
                      <td style="background-color: #c0c0c0;" colspan=4>
                        <a href="/00001/56.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                            Slobodan &#352;pegar &#352;pego: ILUSTROVANA MONOGRAFIJA PRVE KRAJI&#352;KE BRIGADE</span></a>
                      </td>
                    </tr>
                    <tr>
                      <td style="margin-left:20px; background-color:#002010; vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="new" href="/00001/56_62.htm"><img width="60%" src="/images/thumbnails/ac062.jpg"></a></td>
                      <td style="margin-left:20px; background-color:#002010; vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="new" href="/00001/56_89.htm"><img width="60%" src="/images/thumbnails/ac089.jpg"></a></td>
                      <td style="margin-left:20px; background-color:#002010; vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="new" href="/00001/56_155.htm"><img width="60%" src="/images/thumbnails/ac155.jpg"></a></td>
                      <td style="margin-left:20px; background-color:#002010; vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="new" href="/00001/56_160.htm"><img width="60%" src="/images/thumbnails/ac160.jpg"></a></td>
                    </tr>
                  </table>
                  <p>
                    <a href="/00001/226.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milorad Gon&#269;in, Stevo Rau&#353;: PRVA KRAJI&#352;KA UDARNA PROLETERSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/2.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        PRVA KRAJI&#352;KA BRIGADA - ZBORNIK SJE&#262;ANJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/164.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#381;arko Vidovi&#263;: TRE&#262;A PROLETERSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/205.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        TRE&#262;A PROLETERSKA SAND&#381;A&#268;KA BRIGADA - SE&#262;ANJA BORACA (knjiga 2)</span></a>
                  </p>
                  <p>
                    <a href="/00001/206.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        TRE&#262;A PROLETERSKA SAND&#381;A&#268;KA BRIGADA - SE&#262;ANJA BORACA (knjiga 3)</span></a>
                  </p>
                  <p>
                    <a href="/00001/148.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Bla&#382;o Jankovi&#263;: &#268;ETVRTA PROLETERSKA CRNOGORSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/282.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#268;ETVRTA PROLETERSKA - ZBORNIK SJE&#262;ANJA, knjiga 1</span></a>
                  </p>
                  <p>
                    <a href="/00001/287.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#268;ETVRTA PROLETERSKA - ZBORNIK SJE&#262;ANJA, knjiga 2</span></a>
                  </p>
                  <p>
                    <a href="/00003/707.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        PETA PROLETERSKA CRNOGORSKA BRIGADA - ZBORNIK SJEĆANJA, knjiga 2.</span></a>
                  </p>
                  <p>
                    <a href="/00001/204.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        ...: PETA PROLETERSKA CRNOGORSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/137.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Jovo Popovi&#263;: PRVA LI&#268;KA PROLETERSKA BRIGADA "MARKO ORE&#352;KOVI&#262;"</span></a>
                  </p>
                  <p>
                    <a href="/00001/140.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Rudi Petovar - Savo Triki&#263;: &#352;ESTA PROLETERSKA ISTO&#268;NOBOSANSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/710.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ahmed &#272;onlagi&#263;: PROLETERI ISTO&#268;NE BOSNE</span></a>
                  </p>
                  <p>
                    <a href="/00001/133.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milorad Gon&#269;in: DRUGA KRAJI&#352;KA UDARNA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/288.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        DRUGA KRAJI&#352;KA BRIGADA - RATNA SJE&#262;ANJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/520.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Du&#353;an Uzelac: GRME&#268;KE BIJELE NO&#262;I (DRUGA KRAJI&#352;KA NARODNOOSLOBODILA&#268;KA UDARNA BRIGADA)</span></a>
                  </p>
                  <p>
                    <a href="/00003/533.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mensur Seferovi&#263;: ISTO&#268;NO I ZAPADNO OD NERETVE (DESETA HERCEGOVA&#268;KA PROLETERSKA BRIGADA)</span></a>
                  </p>
                  <p>
                    <a href="/00001/160.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ðorde Orlovi&#263;: DRUGA LI&#268;KA PROLETERSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/110.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        DRUGA LI&#268;KA PROLETERSKA BRIGADA - SJE&#262;ANJA BORACA</span></a>
                  </p>
                  <p>
                    <a href="/00001/224.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Savo Triki&#263;: TRE&#262;A KRAJI&#352;KA PROLETERSKA BRIGADA </span></a>
                  </p>
                  <p>
                    <a href="/00001/31.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        TRE&#262;A KRAJI&#352;KA BRIGADA - ZBORNIK SJE&#262;ANJA, knjige 1-2</span></a>
                  </p>
                  <p>
                    <a href="/00003/394.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        TRE&#262;A KRAJI&#352;KA BRIGADA - ZBORNIK SJE&#262;ANJA, knjiga 3</span></a>
                  </p>
                  <p>
                    <a href="/00001/108.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mirko Novovi&#263;, Stevan Petkovi&#263;: PRVA DALMATINSKA PROLETERSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/125.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        NA&#352;A PRVA DALMATINSKA - SJE&#262;ANJA BORACA</span></a>
                  </p>
                  <p>
                    <a href="/00001/227.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        TRE&#262;A LI&#268;KA BRIGADA - SJE&#262;ANJA BORACA</span></a>
                  </p>
                  <p>
                    <a href="/00003/539.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ignjatije Peri&#263;: PETA KORDUNA&#352;KA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/767.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Lado Ambrožič-Novljan: CANKARJEVA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/33.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Branko B. Obradovi&#263;: DRUGA DALMATINSKA PROLETERSKA BRIGADA - MONOGRAFIJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/577.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        DRUGA DALMATINSKA PROLETERSKA BRIGADA - SJE&#262;ANJA BORACA</span></a>
                  </p>
                  <p>
                    <a href="/00001/161.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ljubo Vu&#269;kovi&#263;: DALMATINSKI PROLETERI</span></a>
                  </p>
                  <p>
                    <a href="/00001/94.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Rade Zori&#263;: &#268;ETVRTA KRAJI&#352;KA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/586.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Advan Hozi&#263;: KORACI I RIJEKE - &#268;ETVRTA KRAJI&#352;KA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/597.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#268;ETVRTA KRAJI&#352;KA BRIGADA - ZBORNIK SE&#262;ANJA, knjiga 1</span></a>
                  </p>
                  <p>
                    <a href="/00003/598.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#268;ETVRTA KRAJI&#352;KA BRIGADA - ZBORNIK SE&#262;ANJA, knjiga 2</span></a>
                  </p>
                  <p>
                    <a href="/00001/163.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Lj. Borojevi&#263;, D Samard&#382;ija, R. Ba&#353;i&#263;: PETA KOZARA&#268;KA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/241.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        KOZARA - ZBORNIK SJE&#262;ANJA (knjiga 6: 5, 11, 20. kraji&#353;ka brigada)</span></a>
                  </p>
                  <p>
                    <a href="/00001/63.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ljuban Ðuri&#263;: SEDMA BANIJSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/383.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ljuban Ðuri&#263;: OSMA BANIJSKA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/46.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Jovan Kokot: DVANAESTA PROLETERSKA SLAVONSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/166.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milan Kavgi&#263;: VERNA BRDA (dvanaesta slavonska)</span></a>
                  </p>
                  <p>
                    <a href="/00001/69.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Todor Rado&#353;evi&#263;: TRINAESTA PROLETERSKA BRIGADA "RADE KON&#268;AR"</span></a>
                  </p>
                  <p>
                    <a href="/00003/656.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mato Horvati&#263;: PO DRUGI PUT RO&#272;ENI; Zapisi o 13. udarnoj NO proleterskoj brigadi</span></a>
                  </p>
                  <p>
                    <a href="/00003/590.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                        Mamula, Ba&#353;i&#263;, Vurdelja, Peki&#263;: PRVI PROLETERSKI BATALJON HRVATSKE</span></a>
                  </p>
                  <p>
                    <a href="/00003/544.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Vladimir-Du&#353;an Mateti&#263;: 14. PRIMORSKO GORANSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/711.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Branko Damjanovi&#263;, Savo Popovi&#263;: &#352;ESTA KRAJI&#352;KA NARODNOOSLOBODILA&#268;KA UDARNA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/147.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#352;ESTA KRAJI&#352;KA NOU BRIGADA - RATNA SJE&#262;ANJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/396.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Jovan Kljaji&#263;: SEDMA KRAJI&#352;KA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/186.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        SEDMA KRAJI&#352;KA BRIGADA - SJE&#262;ANJA BORACA I SPISAK BORACA BRIGADE (knjiga 2)</span></a>
                  </p>
                  <p>
                    <a href="/00001/159.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ignjatije Peri&#263;: PETNAESTA KORDUNA&#352;KA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/588.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Dragutin Grgurevi&#263;: U ZLOPOLJU (Tre&#263;a dalmatinska narodnooslobodila&#269;ka udarna brigada)</span></a>
                  </p>
                  <p>
                    <a href="/00002/407.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Stevo Pravdi&#263; i Nail Red&#382;i&#263;: 16. SLAVONSKA OMLADINSKA NOU BRIGADA "JO&#381;E VLAHOVI&#262;"</span></a>
                  </p>
                  <p>
                    <a href="/00001/146.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Izudin &#268;au&#353;evi&#263;: OSMA KRAJI&#352;KA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/68.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        OSMA KRAJI&#352;KA BRIGADA - SJE&#262;ANJA BORACA</span></a>
                  </p>
                  <p>
                    <a href="/00001/131.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Zdravko B. Cvetkovi&#263;: SEDAMNAESTA SLAVONSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/101.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Rade Roksandi&#263;, Zdravko B. Cvetkovi&#263;: 18. SLAVONSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/605.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milan Kavgi&#263;: PAPUK PLANINOM - OSAMNAESTA SLAVONSKA NARODNOOSLOBODILA&#268;KA UDARNA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/264.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milorad Gon&#269;in: DESETA KRAJI&#352;KA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/167.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ðuro Milinovi&#263;, Drago Karasijevi&#263;: JEDANAESTA KRAJI&#352;KA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/690.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milutin Vujovi&#263;: ME&#262;AVINA BRIGADA: DVANAESTA KRAJI&#352;KA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/168.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Joco Marjanovi&#263;, Mile Kukolj, Milutin Vujovi&#263;, Boro Ga&#263;e&#353;a, Rade Ranilovi&#263;: DVANAESTA KRAJI&#352;KA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/263.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milan N. Zori&#263;: TRINAESTA KRAJI&#352;KA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/447.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Jovo Borojevi&#263;: SINOVI &#352;AMARICE - tre&#263;a banijska narodnooslobodila&#269;ka udarna brigada</span></a>
                  </p>
                  <p>
                    <a href="/00003/375.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#272;or&#273;e Vasi&#263; - Sreta Savi&#263;: PRVA VOJVO&#272;ANSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/132.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        MLADOST SLOBODI DAROVANA (PRVA VOJVOÐANSKA BRIGADA - SE&#262;ANJA)</span></a>
                  </p>
                  <p>
                    <a href="/00002/408.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        PETNAESTA MAJEVI&#268;KA BRIGADA - SJE&#262;ANJA I &#268;LANCI</span></a>
                  </p>
                  <p>
                    <a href="/00001/254.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Bogdan Bosio&#269;i&#263;:: 21. SLAVONSKA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/72.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#381;arko Atanackovi&#263;: DRUGA VOJVOÐANSKA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/695.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ivo Matovi&#263;: POVRATAK RATNIKA (DRUGA VOJVO&#272;ANSKA UDARNA BRIGADA)</span></a>
                  </p>
                  <p>
                    <a href="/00003/624.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Emil Ivanc : KRUGOVI OKO KALNIKA - Udarna brigada »Bra&#263;e Radi&#263;«</span></a>
                  </p>
                  <p>
                    <a href="/00001/70.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Radovan Pani&#263;: TRE&#262;A VOJVOÐANSKA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/49.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Stanko Petelin Vojko: GRADNIKOVA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/229.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Stanko Petelin: SEDMA NOU BRIGADA "FRANCE PRE&#352;ERN"</span></a>
                  </p>
                  <p>
                    <a href="/00003/574.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Stanko Petelin: VOJKOVA BRIGADA (slov.)</span></a>
                  </p>
                  <p>
                    <a href="/00001/230.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#352;piro Lagator: &#268;ETVRTA VOJVOÐANSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/188.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#268;ETVRTA BANIJSKA BRIGADA - ZBORNIK SJE&#262;ANJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/102.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Isidor Ðukovi&#263;: PRVA &#352;UMADIJSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/118.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Grupa autora: &#352;ESNAESTA MUSLIMANSKA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/89.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mate &#352;alov: &#268;ETVRTA DALMATINSKA (SPLITSKA) BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/570.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Andrija Kri&#382;evi&#263; Drina: KROZ OGANJ I PEPEO (&#268;ETVRTA DALMATINSKA)</span></a>
                  </p>
                  <p>
                    <a href="/00001/105.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Danilo Damjanovi&#263;: &#352;ESTA DALMATINSKA UDARNA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/262.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Nail Red&#382;i&#263;: DVADESET PETA BRODSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/7xx.php?bk=774" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mirko Fajdiga: BRA&#268;I&#268;EVA BRIGADA, 1. knjiga</span></a>
                  </p>
                  <p>
                    <a href="/00003/7xx.php?bk=775" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mirko Fajdiga: BRA&#268;I&#268;EVA BRIGADA, 2. knjiga</span></a>
                  </p>
                  <p>
                    <a href="/00003/7xx.php?bk=773" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Radosav Isakovi&#263; – Rade: KOSOVELOVA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/547.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milan Rako, Slavko Dru&#382;ijani&#263;: JEDANAESTA DALMATINSKA UDARNA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/80.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Nikola Ani&#263;: DVANAESTA DALMATINSKA UDARNA BRIGADA (PRVA OTO&#268;KA)</span></a>
                  </p>
                  <p>
                    <a href="/00001/128.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ivo Ferenca: PARTIZANI JU&#381;NE DALMACIJE (TRINAESTA JU&#381;NODALMATINSKA NARODNOOSLOBODILA&#268;KA UDARNA BRIGADA)</span></a>
                  </p>
                  <p>
                    <a href="/00003/7xx.php?bk=772" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Franjo Bavec – Branko: BAZOVI&#352;KA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/567.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Grupa autora: 17. MAJEVI&#268;KA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/568.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Stevo Popovi&#263; MAJEVI&#268;KI PARTIZANI - knjiga druga</span></a>
                  </p>
                  <p>
                    <a href="/00003/550.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Josef Hanzl, Josef Matu&#353;ek, Adolf Orct: BOJOV&#193; CESTA I. &#268;ESKOSLOVENSK&#201; BRIG&#193;DY "JAN &#381;I&#381;KA Z TROCNOVA" (&#269;e&#353;ki - czech - &#269;e&#353;tina)</span></a>
                  </p>
                  <p>
                    <a href="/00001/251.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        OSAMNAESTA HRVATSKA ISTO&#268;NOBOSANSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/579.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Stevo Samard&#382;ija: 14. SREDNJOBOSANSKA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/122.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Bogdan Mamula: TRE&#262;A PRIMORSKO-GORANSKA UDARNA BRIGADA (Druga brigada 35. divizije)</span></a>
                  </p>
                  <p>
                    <a href="/00003/768.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Borivoj Lah – Boris: LJUBLJANSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/79.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Damijan Gu&#353;tin: LJUBLJANSKA BRIGADA - 10. slovenska narodnoosvobodilna udarna brigada "Ljubljanska" (sloven&#353;&#269;ina)</span></a>
                  </p>
                  <p>
                    <a href="/00003/548.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Daruvarski NOP odred; &#268;ehoslova&#269;ka brigada NOVJ "Jan &#381;i&#382;ka z Trocnova"</span></a>
                  </p>
                  <p>
                    <a href="/00001/81.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Nikola Mraovi&#263;: PETA VOJVOÐANSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/769.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Srečko Vilhar, Albert Klun: PRVA IN DRUGA PREKOMORSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/7xx.php?bk=778" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Karel Levi&#269;nik: ARTILERISTI PREKOMORCI</span></a>
                  </p>
                  <p>
                    <a href="/00001/267.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        DEVETNAESTA BIR&#268;ANSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/243.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Osman Ðiki&#263;: DVANAESTA HERCEGOVA&#268;KA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/537.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#352;ESTA CRNOGORSKA NARODNOOSLOBODILA&#268;KA UDARNA BRIGADA - ZBORNIK SJE&#262;ANJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/136.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Vlado Strezovski - Milan Andri&#263;: TRE&#262;A PROLETERSKA (SRPSKA) BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/697.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milorad Madi&#263;: KOR&#268;AGIN I NJEGOVI DRUGOVI TRE&#262;A SRPSKA (DEVETNAESTA PROLETERSKA) NARODNOOSLOBODILA&#268;KA UDARNA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/149.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milorad Gon&#269;in: &#268;ETVRTA SRPSKA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/271.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#268;ETVRTA SAND&#381;A&#268;KA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/64.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mitar Ðuri&#353;i&#263;: SEDMA CRNOGORSKA OMLADINSKA BRIGADA "BUDO TOMOVI&#262;"</span></a>
                  </p>
                  <p>
                    <a href="/00003/471.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        SEDMA CRNOGORSKA OMLADINSKA BRIGADA "BUDO TOMOVI&#262;" - ZBORNIK SJE&#262;ANJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/261.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Vladimir Valjan: BRIGADA FRANJO OGULINAC - SELJO</span></a>
                  </p>
                  <p>
                    <a href="/00003/7xx.php?bk=776" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mirko Fajdiga: ZIDAN&#352;KOVA BRIGADA, knjiga 2</span></a>
                  </p>
                  <p>
                    <a href="/00001/86.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Stanimir Jovanovi&#263;, Dragoljub Mir&#269;eti&#263;: PETA SRPSKA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/185.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milutin Milkovi&#263;: PRVA KOSOVSKO-METOHIJSKA PROLETERSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/252.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#381;ivan M. Ninkovi&#263;: &#352;ESTA VOJVOÐANSKA</span></a>
                  </p>
                  <p>
                    <a href="/00001/277.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ðura Zlatkovi&#263;, Milo&#353; D. Baki&#263;: SEDMA SRPSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/450.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Zdravko B. Cvetkovi&#263;: OSJE&#268;KA UDARNA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/398.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Petar Damjanov: OSMA SRPSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/546.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Pukovnik Josip Lulik Pepo, Dr &#272;uro Zatezalo: KARLOVA&#268;KA UDARNA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/270.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mensur Seferovi&#263;: TRINAESTA HERCEGOVA&#268;KA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/275.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        OSMA CRNOGORSKA NOU BRIGADA - ZBORNIK SJE&#262;ANJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/529.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Vladimir Kolar: ISTARSKA SVITANJA (Prva istarska brigada Vladimir Gortan)</span></a>
                  </p>
                  <p>
                    <a href="/00001/121.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        DEVETA SRPSKA UDARNA BRIGADA U STROJU I S NARODOM - spomen-knjiga</span></a>
                  </p>
                  <p>
                    <a href="/00001/197.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Isidor Ðukovi&#263;: DRUGA &#352;UMADIJSKA - 21. SRPSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/625.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Vladimir Hlai&#263;: GREBENI IVAN&#268;ICE - Prva zagorska udarna brigada</span></a>
                  </p>
                  <p>
                    <a href="/00003/381.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Radovan Timotijevi&#263;: DESETA SRPSKA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/73.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Nikola Bo&#382;i&#263;: SEDMA VOJVOÐANSKA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/71.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Kiril Mihailovski Grujica: TRE&#262;A MAKEDONSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/66.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Svetislav Miladinovi&#263; Slavko: &#268;ETRNAESTA SRPSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/477.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Vojislav Nik&#269;evi&#263;: 15. SRPSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/274.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Predrag Milenkovi&#263;: SEDAMNAESTA SRPSKA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/184.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Nikola Bo&#382;i&#263;: ROVOVI I MOSTOBRANI (OSMA VOJVOÐANSKA BRIGADA)</span></a>
                  </p>
                  <p>
                    <a href="/00001/268.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#268;ETRNAESTA HERCEGOVA&#268;KA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/88.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Krstivoje Milosavljevi&#263;: OSAMNAESTA SRPSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/87.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Predrag Pej&#269;i&#263;: DEVETNAESTA SRPSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/445.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milorad Gon&#269;in: 22. SRPSKA KOSMAJSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/214.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Dragoljub &#381;. Mir&#269;eti&#263; Du&#353;ko: 23. SRPSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/215.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milorad Madi&#263;, Du&#353;an Jon&#269;i&#263;: 25. SRPSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/190.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Stanko Obradovi&#263;, Antun Mileti&#263;: 4. NOU BRIGADA SLAVONIJE (DRUGA BRODSKA BRIGADA)</span></a>
                  </p>
                  <p>
                    <a href="/00001/231.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Isidor Ðukovi&#263;: TRIDESET PRVA SRPSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/250.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        DVADESET PRVA TUZLANSKA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/384.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Dr Du&#353;an &#381;ivkovi&#263;: PRVA BOKELJSKA NOU BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00001/278.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milorad Gon&#269;in: 1. KONJI&#268;KA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/443.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Branislav Popov Mi&#353;a: 12. VOJVO&#272;ANSKA UDARNA BRIGADA</span></a>
                  </p>
                  <p>
                    <a href="/00003/431.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#272;or&#273;e Mom&#269;ilovi&#263;: KAKO DO BRIGADE (TRINAESTA VOJVOÐANSKA BRIGADA)</span></a>
                  </p>
                  <p>
                    <a href="/00001/115.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Predrag Pej&#269;i&#263;: PRVA I DRUGA ESKADRILA NOVJ</span></a>
                  </p>
              <tr>
                <td style="background-color: #000060; color: #ffffff">-- divizije i korpusi</td>
              </tr>
              <tr>
                <td>
                  <p>
                    <a href="/00003/7xx.php?bk=915" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Todor Rado&#353;evi&#263;: PRVA PROLETERSKA DIVIZIJA. PRVA KNJIGA - Od formiranja do kapitulacije Italije (1.11.1942 – 9.9.1943)</span></a>
                  </p>
                  <p>
                    <a href="/00003/7xx.php?bk=916" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Todor Rado&#353;evi&#263;: PRVA PROLETERSKA DIVIZIJA. DRUGA KNJIGA - Od kapitulacije Italije do Dana pobjede (9.9.1943 – 9.5.1945)</span></a>
                  </p>
                  <p>
                    <a href="/00001/209.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Radovan Vukanovi&#263;: RATNI PUT TRE&#262;E DIVIZIJE</span></a>
                  </p>
                  <p>
                    <a href="/00001/83.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Drago Karasijevi&#263;: &#268;ETVRTA KRAJI&#352;KA NOU DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/253.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milutin Mora&#269;a: PETA KRAJI&#352;KA DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/77.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ðorde Orlovi&#263;: &#352;ESTA LI&#268;KA PROLETERSKA DIVIZIJA "Nikola Tesla"</span></a>
                  </p>
                  <p>
                    <a href="/00003/484.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Grupa autora: &#352;ESTA PROLETERSKA DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/717.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Grupa autora: SEDMA BANIJSKA DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/571.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        ZBORNIK HISTORIJSKOG ARHIVA U KARLOVCU, knjiga 9: Osma korduna&#353;ka udarna divizija</span></a>
                  </p>
                  <p>
                    <a href="/00001/187.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Obrad Egi&#263;: DVA ROÐENJA DEVETE DALMATINSKE DIVIZIJE</span></a>
                  </p>
                  <p>
                    <a href="/00001/76.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Du&#353;an D. Samard&#382;ija: JEDANAESTA KRAJI&#352;KA NOU DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/100.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Lado Ambro&#382;i&#269; Novljan: POHOD &#268;ETRNAESTE DIVIZIJE</span></a>
                  </p>
                  <a name="petnajsta"></a>
                  <table width=100% border="1">
                    <tr>
                      <td style="background-color: #c0c0c0;" colspan=4>
                        <a href="/00003/770.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                            Lado Ambro&#382;i&#269;-Novljan: PETNAJSTA DIVIZIJA</span></a>
                      </td>
                    </tr>
                    <tr>
                      <td style="margin-left:20px; background-color:#002010; vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="new" href="/00003/770.php?broj=20">
                          <center><img width="80%" src="/images/thumbnails/770_563.jpg"><br />
                        </a>
                        Žužemberška operacija
                        </center>
                      </td>
                      <td style="margin-left:20px; background-color:#002010; vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="new" href="/00003/770.php?broj=131">
                          <center><img width="60%" src="/images/thumbnails/770_566.jpg"><br />
                        </a>
                        Wolkenbruch II
                        </center>
                      </td>
                      <td style="margin-left:20px; background-color:#002010; vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="new" href="/00003/770.php?broj=251">
                          <center><img width="60%" src="/images/thumbnails/770_571.jpg"><br />
                        </a>
                        Boj za Žužemberk od 1. do 4. maja 1944
                        </center>
                      </td>
                      <td style="margin-left:20px; background-color:#002010; vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="new" href="/00003/770.php?broj=432">
                          <center><img width="80%" src="/images/thumbnails/770_573.jpg"><br />
                        </a>
                        Sovražnikov vdor v Belo krajino od 13. do 15. novembra 1944
                        </center>
                      </td>
                    </tr>
                  </table>
                  <p>
                    <a href="/00003/376.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Pa&#353;ko Romac: KAZIVANJE O &#352;ESNAESTOJ VOJVO&#272;ANSKOJ DIVIZIJI</span></a>
                  </p>
                  <p>
                    <a href="/00001/75.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Gligorije Gligo Mandi&#263;: 17. ISTO&#268;NOBOSANSKA NOU DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/575.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Dragutin Grgurevi&#263;: DEVETNAESTA SJEVERNODALMATINSKA DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/235.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#381;ivojin Nikoli&#263; Brka: 22. DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/378.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Miladin Ivanovi&#263;: 23. SRPSKA DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/123.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milojica Panteli&#263;: 25. SRPSKA NOU DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/150.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ahmet Ðonlagi&#263;: 27. ISTO&#268;NOBOSANSKA DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/189.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        DVADESET OSMA SLAVONSKA NO UDARNA DIVIZIJA U SJEVEROZAPADNOJ HRVATSKOJ</span></a>
                  </p>
                  <p>
                    <a href="/00001/39.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Danilo Komnenovi&#263;, Muharem Kreso: 29. HERCEGOVA&#268;KA DIVIZIJA</span></a>
                  </p>
                  <a name="enaintrideseta"></a>
                  <table width=100% border="1">
                    <tr>
                      <td style="background-color: #c0c0c0;" colspan=4>
                        <a href="/00003/7xx.php?bk=823" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                            Stanko Petelin: ENAINTRIDESETA DIVIZIJA</span></a>
                      </td>
                    </tr>
                    <tr>
                      <td style="margin-left:20px; background-color:#002010; vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="new" href="/00003/7xx.php?broj=46&bk=823">
                          <center><img width="80%" src="/images/thumbnails/823_047.jpg"><br />
                        </a>
                        Nemška ofenziva *Traufe*
                        </center>
                      </td>
                      <td style="margin-left:20px; background-color:#002010; vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="new" href="/00003/7xx.php?broj=82&bk=823">
                          <center><img width="60%" src="/images/thumbnails/823_083.jpg"><br />
                        </a>
                        Rušenje proge Rakek-Postojna-Košana
                        </center>
                      </td>
                      <td style="margin-left:20px; background-color:#002010; vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="new" href="/00003/7xx.php?broj=88&bk=823">
                          <center><img width="60%" src="/images/thumbnails/823_089.jpg"><br />
                        </a>
                        Osvobajanje Bohinja in blejske kotline
                        </center>
                      </td>
                      <td style="margin-left:20px; background-color:#002010; vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="new" href="/00003/7xx.php?broj=176&bk=823">
                          <center><img width="80%" src="/images/thumbnails/823_176.jpg"><br />
                        </a>
                        Napad na Železnike
                        </center>
                      </td>
                    </tr>
                  </table>
                  <p>
                    <a href="/00003/613.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        32. DIVIZIJA, LJUDI I DOGA&#272;AJI - ZBORNIK DOKUMENATA</span></a>
                  </p>
                  <p>
                    <a href="/00003/542.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Grupa autora: 32. DIVIZIJA NOVJ</span></a>
                  </p>
                  <p>
                    <a href="/00003/540.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Dr Zdravko Krni&#263;: 33. DIVIZIJA NOV JUGOSLAVIJE</span></a>
                  </p>
                  <p>
                    <a href="/00003/626.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Vuka&#353;in Karanovi&#263; : OD MOSLAVA&#268;KIH PARTIZANSKIH ODREDA DO 33. DIVIZIJE</span></a>
                  </p>
                  <p>
                    <a href="/00003/641.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Vladimir Hlai&#263;: 34. UDARNA DIVIZIJA NOV I PO HRVATSKE</span></a>
                  </p>
                  <p>
                    <a href="/00003/486.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Petar Kleut: 35. LI&#268;KA DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/272.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#268;edo Drulovi&#263;: 37. SAND&#381;A&#268;KA DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/152.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Sreta Savi&#263;: 51. VOJVOÐANSKA DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/712.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mladen Vukosavljevi&#263;, Drago Karasijevi&#263;: 53. SREDNJOBOSANSKA NOU DIVIZIJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/61.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Radovan Vukanovi&#263;: DRUGI UDARNI KORPUS</span></a>
                  </p>
                  <p>
                    <a href="/00001/82.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Du&#353;an Bai&#263;: &#268;ETVRTI KORPUS NOV JUGOSLAVIJE odnosno PRVI KORPUS NOV HRVATSKE</span></a>
                  </p>
                  <p>
                    <a href="/00001/158.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Drago Karasijevi&#263;: PETI UDARNI KORPUS NOVJ</span></a>
                  </p>
                  <p>
                    <a href="/00003/498.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Nikola Ani&#263;: POVIJEST OSMOG KORPUSA NARODNOOSLOBODILA&#268;KE VOJSKE HRVATSKE 1943-1945.</span></a>
                  </p>
                  <p>
                    <a href="/00001/67.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Rade Bulat: DESETI "ZAGREBA&#268;KI" KORPUS NOVJ</span></a>
                  </p>
                  <p>
                    <a href="/00001/157.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Petar Kleut: JEDANAESTI KORPUS NOVJ</span></a>
                  </p>
                  <p>
                    <a href="/00001/74.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mitar Ðuri&#353;i&#263;: PRIMORSKA OPERATIVNA GRUPA</span></a>
                  </p>
                  <p>
                    <a href="/00001/90.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Bora Mitrovski: PETNAESTI (MAKEDONSKI) UDARNI KORPUS</span></a>
                  </p>
                  <p>
                    <a href="/00001/173.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milovan D&#382;elebd&#382;i&#263;: DRUGA JUGOSLOVENSKA ARMIJA</span></a>
                  </p>
                  <p>
                    <a href="/00001/238.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Predrag Pej&#269;i&#263;: 42. VAZDUHOPOVNA DIVIZIJA</span></a>
                  </p>
                </td>
              </tr>
              <tr>
                <td style="background-color: #000060; color: #ffffff">-- partizanski odredi</td>
              </tr>
              <tr>
                <td>
                  <p>
                    <a href="/00002/400.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milivoje Stankovi&#263;: PRVI &#352;UMADIJSKI PARTIZANSKI ODRED</span></a>
                  </p>
                  <p>
                    <a href="/00001/196.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Nikola Ljubi&#269;i&#263;: U&#381;I&#268;KI ODRED "DIMITRIJE TUCOVI&#262;"</span></a>
                  </p>
                  <p>
                    <a href="/00001/48.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Dragoslav Parmakovi&#263;: MA&#268;VANSKI PARTIZANSKI ODRED</span></a>
                  </p>
                  <p>
                    <a href="/00001/279.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milosav Boji&#263;: POSAVSKI PARTIZANSKI ODRED</span></a>
                  </p>
                  <p>
                    <a href="/00001/51.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Milojica Panteli&#263;, Radovan M. Marinkovi&#263;, Vladimir Nik&#353;i&#263;: &#268;A&#268;ANSKI NARODNOOSLOBODILA&#268;KI PARTIZANSKI ODRED "Dr DRAGI&#352;A MI&#352;OVI&#262;"
                      </span></a>
                  </p>
                  <p>
                    <a href="/00001/280.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Dragoljub Dini&#263; Mi&#263;a: TOPLI&#268;KI NARODNOOSLOBODILA&#268;KI PARTIZANSKI ODRED</span></a>
                  </p>
                  <p>
                    <a href="/00003/771.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mile Pavlin: JESENIŠKO-BOHINJSKI ODRED</span></a>
                  </p>
                  <p>
                    <a href="/00003/757.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mira Mihevc: NA NEVARNIH POTEH</span></a>
                  </p>
                  <p>
                    <a href="/00001/182.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Enver &#262;emalovi&#263;: MOSTARSKI BATALJON</span></a>
                  </p>
                  <p>
                    <a href="/00003/590.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mamula, Ba&#353;i&#263;, Vurdelja, Peki&#263;: PRVI PROLETERSKI BATALJON HRVATSKE</span></a>
                  </p>
                  <p>
                    <a href="/00003/549.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Ljuban &#272;uri&#263;: BANIJSKI PARTIZANSKI ODREDI '41-'45.</span></a>
                  </p>
                  <p>
                    <a href="/00003/607.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        ZAGREBA&#268;KI PARTIZANSKI ODRED - ZBORNIK DOKUMENATA I SJE&#262;ANJA</span></a>
                  </p>
                  <p>
                    <a href="/00003/490.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Savo Triki&#263;, Du&#353;an Repaji&#263;: PROLETERSKI BATALJON BOSANSKE KRAJINE</span></a>
                  </p>
                  <p>
                    <a href="/00003/508.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Branko J. Bokan: PRVI KRAJI&#352;KI NOP ODRED</span></a>
                  </p>
                  <p>
                    <a href="/00003/596.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Dragutin &#262;urguz, Milorad Vignjevi&#263;: KOZARSKI ODRED</span></a>
                  </p>
                  <p>
                    <a href="/00001/127.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        NAIL RED&#381;I&#262;: TELMANOVCI (Zapisi o njema&#269;koj partizanskoj &#269;eti "Ernest Telman") </span></a>
                  </p>
                  <p>
                    <a href="/00001/225.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Todor Vujasinovi&#263;: OZRENSKI PARTIZANSKI ODRED</span></a>
                  </p>
                  <p>
                    <a href="/00001/302.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Esad Tihi&#263;: POSAVSKO-TREBAVSKI NOP ODRED</span></a>
                  </p>
                  <p>
                    <a href="/00003/469.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Grupa autora: TUZLANSKI NARODNOOSLOBODILA&#268;KI PARTIZANSKI ODRED</span></a>
                  </p>
                  <p>
                    <a href="/00003/558.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        &#381;arko Mili&#263;evi&#263;: KALNI&#268;KI PARTIZANSKI ODRED</span></a>
                  </p>
                  <p>
                    <a href="/00001/290.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Vuka&#353;in Karanovi&#263;: MOSLAVA&#268;KI PARTIZANSKI ODRED</span></a>
                  </p>
                  <p>
                    <a href="/00003/627.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Mirko Belo&#353;evi&#263;: BORBENI PUT DRUGOG ZAGORSKOG PARTIZANSKOG ODREDA</span></a>
                  </p>
                  <p>
                    <a href="/00003/545.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Giacomo Scotti, Luciano Giuricin: CRVENA ZVIJEZDA NA KAPI NAM SJA (Borbeni put talijanskog bataljona »Pino Budicin«)</span></a>
                  </p>
                  <p>
                    <a href="/00003/541.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Vuka&#353;in Karanovi&#263;: TRE&#262;I DIVERZANTSKI ODRED 1941-1945.</span></a>
                  </p>
                  <p>
                    <a href="/00003/543.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                        Vujo Vidakovi&#263;: PRVI TENKOVSKI BATALJON</span></a>
                  </p>
                </td>
              </tr>
            </table>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="a7">-</a> bitke i ratne operacije</td>
        </tr>
        <tr>
          <td>
            <p>
              <span>&nbsp;&nbsp;&#9658;&nbsp;
                EDICIJA ZA POBEDU I SLOBODU:</span>
            </p>
            <p>
              <a href="/00003/706.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 1: Drvarska operacija : naučni skup 23. i 24. maja 1984 : za pobjedu i slobodu : učesnici govore
                </span></a>
            </p>
            <p>
              <x href="/00003/***.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 2: Beogradska operacija : učesnici govore : okrugli sto 18. okt. 1984
                </span></a>
            </p>
            <p>
              <x href="/00003/***.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 3: Kninska operacija : učesnici govore : okrugli sto 1. dec. 1984
                </span></a>
            </p>
            <p>
              <a href="/00003/739.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 4: Armije u strategijskoj koncepciji NOR i revolucije : okrugli sto, 15. januar 1985. : za pobedu i slobodu : učesnici govore
                </span></a>
            </p>
            <p>
              <x href="/00003/***.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 5: Mostarska operacija : učesnici govore : okrugli sto 13. februar 1985.
                </span></a>
            </p>
            <p>
              <a href="/00003/740.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 6: Jugoslavenska mornarica u završnim operacijama za oslobođenje Jugoslavije : učesnici govore : Okrugli sto, Split, 1. marta 1985
                </span></a>
            </p>
            <p>
              <a href="/00003/741.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 7: Vazduhoplovstvo u strategiji NOR : okrugli sto 21. mart 1985. : za pobedu i slobodu : učesnici govore
                </span></a>
            </p>
            <p>
              <a href="/00003/742.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 8: Sarajevska operacija : učesnici govore
                </span></a>
            </p>
            <p>
              <a href="/00003/743.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 9: Završne operacije za oslobođenje Jugoslavije : naučni skup 23. i 24. april 1985 : za pobedu i slobodu : učesnici govore
                </span></a>
            </p>
            <p>
              <a href="/00001/53.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  HRONOLOGIJA NARODNOOSLOBODILA&#268;KOG RATA 1941-1945 </span></a>
            </p>
            <p>
              <a href="/00001/151.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  OSLOBODILA&#268;KI RAT NARODA JUGOSLAVIJE - knjiga 1</span></a>
            </p>
            <p>
              <a href="/00001/153.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  OSLOBODILA&#268;KI RAT NARODA JUGOSLAVIJE - knjiga 2</span></a>
            </p>
            <p>
              <a href="/00003/385.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  ISTORIJSKI ATLAS OSLOBODILA&#268;KOG RATA NARODA JUGOSLAVIJE</span></a>
            </p>
            <p>
              <a href="/00003/436.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Mladenko Coli&#263;: PREGLED OPERACIJA NA JUGOSLOVENSKOM RATI&#352;TU 1941 - 1945</span></a>
            </p>
            <p>
              <a href="/00001/245.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa sovjetskih i jugoslovenskih autora: BEOGRADSKA OPERACIJA</span></a>
            </p>
            <p>
              <a href="/00001/236.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Petar Vi&#353;nji&#263;: BITKA ZA SRBIJU (1. knjiga)</span></a>
            </p>
            <p>
              <a href="/00001/237.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Petar Vi&#353;nji&#263;: BITKA ZA SRBIJU (2. knjiga)</span></a>
            </p>
            <p>
              <a href="/00001/256.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  NERETVA - zbornik, knjiga 1: Proleterske i udarne divizije u bici na Neretvi</span></a>
            </p>
            <p>
              <a href="/00001/257.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  NERETVA - zbornik, knjiga 2: Proleterske i udarne divizije u bici na Neretvi</span></a>
            </p>
            <p>
              <a href="/00001/258.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  NERETVA - zbornik, knjiga 3: Proleterske i udarne divizije u bici na Neretvi</span></a>
            </p>
            <p>
              <a href="/00003/494.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Branko Perovi&#263;: BORBE PRVOG HRVATSKOG I PRVOG BOSANSKOG KORPUSA NOV I POJ U JANUARU I FEBRUARU 1943.</span></a>
            </p>
            <p>
              <a href="/00003/437.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  SUTJESKA - zbornik radova, knjiga 1</span></a>
            </p>
            <p>
              <a href="/00003/438.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  SUTJESKA - zbornik radova, knjiga 2</span></a>
            </p>
            <p>
              <a href="/00003/439.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  SUTJESKA - zbornik radova, knjiga 3</span></a>
            </p>
            <p>
              <a href="/00003/440.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  SUTJESKA - zbornik radova, knjiga 4</span></a>
            </p>
            <p>
              <a href="/00003/441.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  SUTJESKA - zbornik radova, knjiga 5</span></a>
            </p>
            <p>
              <a href="/00003/500.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  BIHA&#262;KA REPUBLIKA, knjiga I - ZBORNIK &#268;LANAKA</span></a>
            </p>
            <p>
              <a href="/00003/501.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  BIHA&#262;KA REPUBLIKA, knjiga II - ZBORNIK DOKUMENATA</span></a>
            </p>
            <p>
              <a href="/00003/749.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: DURMITORSKA PARTIZANSKA REPUBLIKA</span></a>
            </p>
            <p>
              <a href="/00001/249.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Petar Vi&#353;nji&#263;: PRODOR II I V DIVIZIJE NOVJ U SRBIJU 1944</span></a>
            </p>
            <p>
              <a href="/00001/228.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Vojni istorijski institut: ZAVR&#352;NE OPERACIJE ZA OSLOBOÐENJE JUGOSLAVIJE 1944-45</span></a>
            </p>
            <p>
              <a href="/00001/58.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Ljubivoje Pajovi&#263;, Du&#353;an Uzelac, Milovan D&#382;elebd&#382;i&#263;: SREMSKI FRONT 1944-1945</span></a>
            </p>
            <p>
              <a href="/00001/210.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Rudolf Primorac: OPERATIVNO-TAKTI&#268;KA ISKUSTVA IZ PRVE POLOVINE NARODNOOSLOBODILA&#268;KOG RATA</span></a>
            </p>
            <p>
              <a href="/00001/211.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Milorad Gon&#269;in: U ROVOVIMA SREMA</span></a>
            </p>
            <p>
              <a href="/00003/427.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Nikola Bo&#382;i&#263;: BATINSKA BITKA</span></a>
            </p>
            <p>
              <a href="/00003/449.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Slavko Odi&#263;: DESANT NA DRVAR</span></a>
            </p>
            <p>
              <a href="/00001/266.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Petar Mi&#353;kovi&#263;: BITKA ZA DRVAR</span></a>
            </p>
            <p>
              <a href="/00003/534.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Uro&#353; Kosti&#263;: OSLOBO&#272;ENJE ISTRE, SLOVENA&#268;KOG PRIMORJA I TRSTA 1945.</span></a>
            </p>
            <p>
              <a href="/00003/504.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Milan Basta: RAT JE ZAVR&#352;EN SEDAM DANA KASNIJE</span></a>
            </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="a8">-</a> ratna zbivanja po oblastima</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/00003/608.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: NOB MAKEDONIJE</span></a>
            </p>
            <p>
              <a href="/00001/179.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  RESISTANCE, SUFFERING, HOPE - The Slovene Partisan Movement 1941 - 1945</span></a>
            </p>
            <p>
              <a href="/00002/418.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Zdravko Klanj&#353;&#269;ek: NARODNOOSLOBODILA&#268;KI RAT U SLOVENIJI 1941-1945.</span></a>
            </p>
            <p>
              <a href="/00003/576.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Zbornik &#381;RTVE VOJNE IN REVOLUCIJE - Referati in razprava s posveta v Dr&#382;avnem svetu 11. in 12. novembra 2004</span></a>
            </p>
            <p>
              <a href="/00003/720.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Skupina avtorjev / gruppo di autori: KRI&#381;ANI V BOJU ZA SVOBODO / S. CROCE NELLA LOTTA PER LA LIBERTA</span></a>
            </p>
            <p>
              <a href="/00001/193.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  SPOMENICA CRNOGORSKIM ANTIFA&#352;ISTIMA 1941-1945</span></a>
            </p>
            <p>
              <a href="/00002/325.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  ITALIAN CRIMES IN YUGOSLAVIA (YUGOSLAV INFORMATION OFFICE LONDON 1945).</span></a>
            </p>
            <p>
              <a href="/00002/LjubinkaSkodric-PolozajZeneUOkupiranojSrbiji.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Ljubinka Škodrić: POLOŽAJ ŽENE U OKUPIRANOJ SRBIJI 1941-1944 (doktorska disertacija)</span></a>
            </p>
            <p>
              <a href="/00003/614.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: &#381;ENE SRBIJE U NOB</span></a>
            </p>
            <p>
              <a href="/00001/240.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Doj&#269;ilo Mitrovi&#263;: ZAPADNA SRBIJA 1941. (SRBIJA U NARODNOOSLOBODILA&#268;KOJ BORBI)</span></a>
            </p>
            <p>
              <a href="/00003/474.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Milovan - Mika Milosavljevi&#263;, Milorad - Mile Proki&#263;, Ilija - Lala Jovanovi&#263;: PREGLED ISTORIJE NARODNOOSLOBODILA&#268;KE BORBE U &#352;UMADIJI - I</span></a>
            </p>
            <p>
              <a href="/00003/483.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Milovan - Mika Milosavljevi&#263;: PREGLED ISTORIJE NARODNOOSLOBODILA&#268;KE BORBE U &#352;UMADIJI - II</span></a>
            </p>
            <p>
              <a href="/00001/276.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Aleksandar Vitorovi&#263;: CENTRALNA SRBIJA (SRBIJA U NARODNOOSLOBODILA&#268;KOJ BORBI)</span></a>
            </p>
            <p>
              <a href="/00003/709.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: ISTO&#268;NA SRBIJA (SRBIJA U NARODNOOSLOBODILA&#268;KOJ BORBI)</span></a>
            </p>
            <p>
              <a href="/00001/244.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  JU&#381;NA SRBIJA (SRBIJA U NARODNOOSLOBODILA&#268;KOJ BORBI)</span></a>
            </p>
            <p>
              <a href="/00002/368.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  &#381;ivojin Nikoli&#263;-Brka: JUGOISTO&#268;NA SRBIJA U NARODNOOSLOBODILA&#268;KOM RATU I REVOLUCIJI 1941 - 1945</span></a>
            </p>
            <p>
              <a href="/00001/283.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Bo&#353;ko &#381;ivanovi&#263; - Damnjan Popovi&#263; - Miodrag Jovanovi&#263;: POMORAVLJE U NOB-u 1941-1945</span></a>
            </p>
            <p>
              <a href="/00001/285.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Slobodan Bosilj&#269;i&#263;: TIMO&#268;KA KRAJINA</span></a>
            </p>
            <p>
              <a href="/00003/572.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Nikola P. Ili&#263;: KRVAVI FEBRUAR (zlo&#269;in u Bojniku 1942)</span></a>
            </p>
            <p>
              <a href="/00001/284.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Damnjan Popovi&#263;: NA OBRONCIMA BELJANICE</span></a>
            </p>
            <p>
              <a href="/00003/538.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Boro Majdanac: POZORI&#352;TE U OKUPIRANOJ SRBIJI</span></a>
            </p>
            <p>
              <a href="/00001/84.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Venceslav Gli&#353;i&#263;: TEROR I ZLO&#268;INI NACISTI&#268;KE NEMA&#268;KE U SRBIJI 1941-1945</span></a>
            </p>
            <p>
              <a href="/00003/750.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  ISTOČNA BOSNA U NOR-u – SJEĆANJA UČESNIKA, knjiga 1.</span></a>
            </p>
            <p>
              <a href="/00003/751.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  ISTOČNA BOSNA U NOR-u – SJEĆANJA UČESNIKA, knjiga 2.</span></a>
            </p>
            <p>
              <a href="/00003/612.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  RATNE USPOMENE KOSTE NA&#272;A; BIHA&#262;KA REPUBLIKA</span></a>
            </p>
            <p>
              <a href="/00001/106.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoje Luki&#263;: RAT I DJECA KOZARE</span></a>
            </p>
            <p>
              <a href="/00003/594.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Du&#353;an Lazi&#263; - Gojko, Brana Majski: DUDIK</span></a>
            </p>
            <p>
              <a href="/00001/165.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Kozara u narodnooslobodila&#269;koj borbi i socijalisti&#269;koj revoluciji (1941-1945): radovi sa nau&#269;nog skupa odr&#382;anog na Kozari (Mrakovica) 27. i 28. oktobra 1977.</span></a>
            </p>
            <p>
              <a href="/00001/241.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  KOZARA - ZBORNIK SJE&#262;ANJA (knjiga 6)</span></a>
            </p>
            <p>
              <a href="/00003/507.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  DRVAR 1941-1945. - SJE&#262;ANJA U&#268;ESNIKA</span></a>
            </p>
            <p>
              <a href="/00003/722.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  JAJA&#268;KO PODRU&#268JE U OSLOBODILA&#268;KOM RATU I REVOLUCIJI 1941&#8211;1945. &#8211; ZBORNIK SJE&#262;ANJA; knjiga I</span></a>
            </p>
            <p>
              <a href="/00003/721.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  JAJA&#268;KO PODRU&#268JE U OSLOBODILA&#268;KOM RATU I REVOLUCIJI 1941&#8211;1945. &#8211; ZBORNIK SJE&#262;ANJA; knjiga II</span></a>
            </p>
            <p>
              <span>&nbsp;&nbsp;&#9658;&nbsp;
                PETROVAC U NOB &#8211; ZBORNIK SJE&#262;ANJA:</span>
            </p>
            <p>
              <a href="/00003/744.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 1
                </span></a>
            </p>
            <p>
              <a href="/00003/755.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 2
                </span></a>
            </p>
            <p>
              <a href="/00003/682.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 3
                </span></a>
            </p>
            <p>
              <a href="/00003/684.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 4
                </span></a>
            </p>
            <p>
              <a href="/00003/685.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 5
                </span></a>
            </p>
            <p>
              <a href="/00003/686.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 6
                </span></a>
            </p>
            <p>
              <a href="/00003/687.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 7
                </span></a>
            </p>
            <p>
              <a href="/00003/689.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Antun Giron: ZAPADNA HRVATSKA U DRUGOM SVJETSKOM RATU</span></a>
            </p>
            <p>
              <a href="/00003/606.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Emil Ivanc: NEPOKORENA MLADOST (SKOJ U PRVIM GODINAMA USTANKA)</span></a>
            </p>
            <p>
              <a href="/00003/585.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  &#381;ENE HRVATSKE U NARODNOOSLOBODILA&#268;KOJ BORBI</span></a>
            </p>
            <p>
              <a href="/00003/583.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  PARTIZANKE HRVATSKE U NARODNOOSLOBODILA&#268;KOJ BORBI</span></a>
            </p>
            <p>
              <a href="/00003/643.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Desanka Stoji&#263;: PRVA &#381;ENSKA PARTIZANSKA &#268;ETA</span></a>
            </p>
            <p>
              <a href="/00001/124.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Sibe Kvesić: DALMACIJA U NARODNOOSLOBODILAČKOJ BORBI </span></a>
            </p>
            <p>
              <a href="/00003/705.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Drago Gizdi&#263;: DALMACIJA 1942.</span></a>
            </p>
            <p>
              <a href="/00001/119.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Ivan Jeli&#263;: TRAGEDIJA U KERESTINCU (Zagreba&#269;ko ljeto 1941.)</span></a>
            </p>
            <p>
              <a href="/00001/107.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Todor Rado&#353;evi&#263;: OFANZIVA ZA OSLOBOÐENJE DALMACIJE</span></a>
            </p>
            <p>
              <a href="/00003/506.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  &#381;RTVAMA DO POBJEDE I SLOBODE - ZBORNIK POGINULIH BORACA, &#381;RTAVA FA&#352;ISTI&#268;KOG TERORA I &#381;RTAVA RATA &#352;IBENSKE OP&#262;INE OD 1941-1945. GODINE</span></a>
            </p>
            <p>
              <a href="/00003/476.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Sjeverozapadna Hrvatska u NOB-u i socijalisti&#269;koj revoluciji - zbornik</span></a>
            </p>
            <p>
              <a href="/00003/752.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Mijo Kos Zorko: VELIKA GORICA U NOB-U II</span></a>
            </p>
            <p>
              <a href="/00003/485.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  VATRE SA KOMOVA - Narod andrijevi&#269;kog sreza u NOR 1941-1945</span></a>
            </p>
            <p>
              <a href="/00003/462.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: HERCEGOVINA U NOB, knjiga 1</span></a>
            </p>
            <p>
              <a href="/00003/463.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: HERCEGOVINA U NOB, knjiga 2</span></a>
            </p>
            <p>
              <a href="/00003/465.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: HERCEGOVINA U NOB, knjiga 3</span></a>
            </p>
            <p>
              <a href="/00003/467.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: HERCEGOVINA U NOB, knjiga 4</span></a>
            </p>
            <p>
              <a href="/00003/559.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Savo Skoko: POKOLJI HERCEGOVA&#268;KIH SRBA '41.</span></a>
            </p>
            <p>
              <a href="/00001/111.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Mirko &#262;ukovi&#263;: SAND&#381;AK U NARODNOOSLOBODILA&#268;KOJ BORBI</span></a>
            </p>
            <p>
              <a href="/00001/103.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Radivoje Kova&#269;evi&#263;: SJEVERISTO&#268;NA BOSNA 1944-1945 - PRILOG ISTORIOGRAFIJI</span></a>
            </p>
            <p>
              <a href="/00002/372.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Radivoje Kova&#269;evi&#263;: DRAMA U VUKOSAVCIMA</span></a>
            </p>
            <p>
              <a href="/00001/162.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Du&#353;an Lazi&#263; - Gojko: SREMSKO KRVAVO LETO 1942</span></a>
            </p>
            <p>
              <a href="/00001/142.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Du&#353;an Bai&#263;: KOTAR VRGINMOST U NO BORBI 1941 - 1945</span></a>
            </p>
            <p>
              <a href="/00003/560.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  70 godina od osnivanja Moslava&#269;kih brigada i oslobo&#273;enja grada &#268;azme</span></a>
            </p>
            <p>
              <a href="/00003/660.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Milan Brunovi&#263;, Tomo Sovi&#263;: BITKA KOD OBOROVA</span></a>
            </p>
            <p>
              <a href="/00003/561.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Milivoj Dretar: Slobodna Podravina</span></a>
            </p>
            <p>
              <a href="/00003/668.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Filip &#352;kiljan: HRVATSKO ZAGORJE U DRUGOM SVJETSKOM RATU 1941.-1945. - Opredjeljivanja, borbe, &#382;rtve</span></a>
            </p>
            <p>
              <a href="/00003/647.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: HRVATSKO ZAGORJE U REVOLUCIJI (&#352;kolska knjiga, Zagreb 1981)</span></a>
            </p>
            <p>
              <a href="/00003/648.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: HRVATSKO ZAGORJE U REVOLUCIJI (Epoha, Zagreb 1959)</span></a>
            </p>
            <p>
              <a href="/00003/679.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  SPOMENICI l SPOMEN OBILJE&#381;JA RADNI&#268;KOG POKRETA I NARODNE REVOLUCIJE U ZAGREBU</span></a>
            </p>
            <p>
              <a href="/00003/667.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Antun Kozina: USPOMENE NOB UKLESANE U KAMENU (spomenici Krapinsko-pregradskog kraja)</span></a>
            </p>
            <p>
              <a href="/00003/646.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  &#381;UMBERAK-GORJANCI 1941-1945. - ZBORNIK RADOVA</span></a>
            </p>
            <p>
              <a href="/00003/653.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Savo Velagi&#263;:VIROVITICA U NARODNOOSLOBODILA&#268;KOJ BORBI I SOCIJALISTI&#268;KOJ REVOLUCIJI</span></a>
            </p>
            <p>
              <a href="/00003/7xx.php?bk=754" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Slavica Hreckovski, Mile Konjevi&#263;: RADNI&#268;KI I NARODNOOSLOBODILA&#268;KI POKRET U PAKRACU I OKOLINI</span></a>
            </p>
            <p>
              <a href="/00003/655.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Antun Duha&#269;ek: 1941. U NOVOGRADI&#352;KOM KRAJU</span></a>
            </p>
            <p>
              <a href="/00003/649.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Zdravko Krni&#263;: DARUVAR; RADNI&#268;KI I NARODNOOSLOBODILA&#268;KI POKRET</span></a>
            </p>
            <p>
              <a href="/00003/645.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Beki&#263;, Butkovi&#263;, Goldstein: OKRUG KARLOVAC 1941.</span></a>
            </p>
            <p>
              <a href="/00003/569.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Ljubo Drndi&#263;: ORU&#381;JE I SLOBODA ISTRE</span></a>
            </p>
            <p>
              <a href="/00003/610.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  SPLIT U NARODNOOSLOBODILA&#268;KOJ BORBI I SOCIJALISTI&#268;KOJ REVOLUCIJI 1941-1945. - ZBORNIK RADOVA</span></a>
            </p>
            <p>
              <a href="/00001/220.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  KRONOLOGIJA SPLITA 1941-1945.</span></a>
            </p>
            <p>
              <a href="/00003/578.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Tatjana Kova&#269; (priredila): GLAS SPLITA 1943-1944, kriti&#269;ko izdanje</span></a>
            </p>
            <p>
              <a href="/00003/565.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Josip Ba&#353;i&#263; Bepo: MOLAT U DRUGOM SVJETSKOM RATU 1941.-1945 - tragovima doga&#273;aja</span></a>
            </p>
            <p>
              <a href="/00001/144.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  SPOMEN-KNJIGA poginulih TUZLANSKIH BORACA NOR-a i &#382;rtava fa&#353;isti&#269;kog terora 1941-1945.)</span></a>
            </p>
            <p>
              <a href="/00002/403.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  TUZLANSKI NARODNOOSLOBODILA&#268;KI PARTIZANSKI ODRED</span></a>
            </p>
            <p>
              <a href="/00001/248.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Vera Mujbegovi&#263;: TUZLA MOJE MLADOSTI</span></a>
            </p>
            <p>
              <a href="/00001/109.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  PRILOG U KRVI (PLJEVLJA 1941-1945)</span></a>
            </p>
            <p>
              <a href="/00003/734.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  U&#381;I&#268;KI KRAJ U NOR-u I REVOLUCIJI 1941&#8211;1945. &#8211; Zbornik radova sa nau&#269;nog skupa</span></a>
            </p>
            <p>
              <a href="/00001/112.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Gojko &#352;koro: ISTINA JE U IMENIMA (stradali u u&#382;i&#269;kom okrugu u drugom svetskom ratu)</span></a>
            </p>
            <p>
              <a href="/00001/177.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr. Marko Hoare: THE CHETNIKS AND THE JEWS</span></a>
            </p>
            <p>
              <a href="/00001/292.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  OSLOBOÐENJE KRU&#352;EVCA 1944. GODINE - Zbornik dokumenata, studija i se&#263;anja u&#269;esnika i savremenika</span></a>
            </p>
            <p>
              <a href="/00003/395.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dane Petkovski, Vlado Strezoski: BORBENA DEJSTVA U ZAPADNOJ MAKEDONIJI 1941 - 1944.</span></a>
            </p>
            <p>
              <a href="/00001/32_1.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  PRVA DALMATINSKA PROLETERSKA BRIGADA - SPISAK POGINULIH BORACA</span></a>
            </p>
            <p>
              <a href="/00001/47.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoslav Dimitrijevi&#263; Beli: GDE JE MOJA MAMA (hronika Avalskog korpusa JVuO)</span></a>
            </p>
            <p>
              <a href="/00001/259.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoslav Dimitrijevi&#263; - Beli: NARODNI HEROJ DARINKA RADOVI&#262;</span></a>
            </p>
            <p>
              <a href="/00001/198.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoslav Dimitrijevi&#263; Beli: SOFIJA RISTI&#262;, NARODNI HEROJ</span></a>
            </p>
            <p>
              <span>&nbsp;&nbsp;&#9658;&nbsp;
                USTANAK NARODA JUGOSLAVIJE (NEKOLIKO TEKSTOVA)</span><br>
              <a href="/00001/37_11.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&nbsp;&#9658;&nbsp;
                  MIlan Batanovi&#263; Batan: PODRINJSKI PARTIZANSKI ODRED</span></a><br>
              <a href="/00001/37_344.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&nbsp;&#9658;&nbsp;
                  DOGAÐAJI OKO KOSJERI&#262;A</span></a><br>
              <a href="/00001/37_176.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&nbsp;&#9658;&nbsp;
                  Jovan Stamatovi&#263;: PO&#381;EGA U 1941.</span></a>
            </p>
            <p>
              <a href="/00001/182.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Enver &#262;emalovi&#263;: MOSTARSKI BATALJON</span></a>
            </p>
            <p>
              <a href="/00001/246.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoslav Dimitrijevi&#263; - Beli: KOSMAJSKI PARTIZANI (knjiga I)</span></a>
            </p>
            <p>
              <a href="/00001/247.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoslav Dimitrijevi&#263; - Beli: KOSMAJSKI PARTIZANI (knjiga II)</span></a>
            </p>
            <p>
              <a href="/00001/38.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Radisav S. Nedovi&#263;, Pantelija M. Vasovi&#263;: ZATAMNJENA ISTINA (&#268;A&#268;AK 2006)</span></a>
            </p>
            <p>
              <a href="/00001/44.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Radisav S. Nedovi&#263;: &#268;A&#268;ANSKI KRAJ I NOB - SLOBODARI NA STRATI&#352;TIMA (Spisak &#382;rtava Drugog svetskog rata u &#269;a&#269;anskom kraju - &#268;A&#268;AK 2009)</span></a>
            </p>
            <p>
              <a href="/00003/699.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: &#268;A&#268;ANSKI KRAJ U NOB &#8211; HRONOLOGIJA DOGADJAJA</span></a>
            </p>
            <p>
              <a href="/00001/175.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Radisav S. Nedovi&#263;: &#268;A&#268;ANSKI KRAJ U NOB 1941 - 1945. o &#381;ENE BORCI I SARADNICI</span></a>
            </p>
            <p>
              <a href="/00002/409.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Radisav S. Nedovi&#263;: &#268;A&#268;ANSKI KRAJ U NOB 1941 - 1945. o &#268;A&#268;ANI I DRAGA&#268;EVCI - LOGORA&#352;I BANJICE</span></a>
            </p>
            <p>
              <a href="/00003/698.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: &#268;A&#268;ANSKI KRAJ U NOB &#8211; PALI BORCI I &#381;RTVE 1941&#8212;1945.</span></a>
            </p>
            <p>
              <a href="/00003/696.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Jovan R. Radovanovi&#263;: PO&#381;EGA U NOR I REVOLUCIJI 1941&#8212;1945</span></a>
            </p>
            <p>
              <a href="/00003/636.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dimitrije &#272;uli&#263;, Miodrag Mila&#269;i&#263;: NA MORAVI &#262;UPRIJA</span></a>
            </p>
            <p>
              <a href="/00001/303.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Pantelija Pule Proki&#263;: SRE&#262;A I TALIJA</span></a>
            </p>
            <p>
              <a href="/00001/304.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Vladan Tomi&#263;: NEMA MESTA NA NEBU</span></a>
            </p>
            <p>
              <a href="/00002/320.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Zoran Laki&#263;: RAZMJENA RATNIH ZAROBLJENIKA U CRNOJ GORI U TOKU NARODNOOSLOBODILA&#268;KOG RATA</span></a>
            </p>
            <p>
              <a href="/00002/321.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Davor Marijan: "LIVNO MORA PASTI": borbe dijelova V. usta&#353;kog staja&#263;eg zdruga s II. proleterskom divizijom za Livno u prosincu 1942. godine</span></a>
            </p>
            <p>
              <a href="/00002/322.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Marica Karaka&#353; Obradov: SAVEZNI&#268;KA BOMBARDIRANJA SLAVONSKOG I BOSANSKOG BRODA I OKOLNIH MJESTA TIJEKOM DRUGOG SVJETSKOG RATA</span></a>
            </p>
            <p>
              <a href="/00002/324.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Milan Terzi&#263;: JUGOSLOVENSKA KRALJEVSKA VLADA, GENERAL DRAGOLJUB MIHAILOVI&#262; I SAVEZNI&#268;KO BOMBARDOVANJE CILJEVA U JUGOSLAVIJI 1942-1944. GODINE</span></a>
            </p>
            </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="a9">-</a> antifa&#353;isti&#269;ka borba u gradovima</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/00003/592.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Slavko Vuk&#269;evi&#263;: BORBE I OTPORI U OKUPIRANIM GRADOVIMA JUGOSLAVIJE 1941-1945.</span></a>
            </p>
            <p>
              <a href="/00001/216.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Jovan Marjanovi&#263;: BEOGRAD (SRBIJA U NARODNOOSLOBODILA&#268;KOJ BORBI)</span></a>
            </p>
            <p>
              <a href="/00001/232.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  BEOGRAD U RATU I REVOLUCIJI - knjiga 1</span></a>
            </p>
            <p>
              <a href="/00001/233.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  BEOGRAD U RATU I REVOLUCIJI - knjiga 2</span></a>
            </p>
            <p>
              <span>&nbsp;&nbsp;&#9658;&nbsp;
                ZAGREB 1941-1945. &#8211; ZBORNIK SJE&#262;ANJA:</span></a>
            </p>
            <p>
              <a href="/00003/4_24_1.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 1
                </span></a>
            </p>
            <p>
              <a href="/00003/4_24_2.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 2
                </span></a>
            </p>
            <p>
              <a href="/00003/4_24_3.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 3
                </span></a>
            </p>
            <p>
              <a href="/00003/4_24_4.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga 4
                </span></a>
              <p>
                <a href="/00001/217.htm	" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                    Revolucionarni omladinski pokret u Zagrebu 1941-1945 - I - Zbornik povijesnih pregleda i sje&#263;anja</span></a>
              </p>
              <p>
                <a href="/00003/650.htm	" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                    Revolucionarni omladinski pokret u Zagrebu 1941-1945 - II - Zbornik povijesnih pregleda i sje&#263;anja</span></a>
              </p>
              <p>
                <a href="/00001/126.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                    ZAGREB 1941-1945 - ZBORNIK SJE&#262;ANJA</span></a>
              </p>
              <p>
                <a href="/00003/488.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                    LJUBLJANA U BORBI 1941-1945. - ZBORNIK SE&#262;ANJA</span></a>
              </p>
              <p>
                <a href="/00001/220.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                    KRONOLOGIJA SPLITA 1941-1945.</span></a>
              </p>
              <p>
                <a href="/00003/578.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                    Tatjana Kova&#269; (priredila): GLAS SPLITA 1943-1944, kriti&#269;ko izdanje</span></a>
              </p>
              <p>
                <a href="/00003/479.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                    Grupa autora: SARAJEVO U REVOLUCIJI - tom 1</span></a>
              </p>
              <p>
                <a href="/00003/480.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                    Grupa autora: SARAJEVO U REVOLUCIJI - tom 2</span></a>
              </p>
              <p>
                <a href="/00003/481.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                    Grupa autora: SARAJEVO U REVOLUCIJI - tom 3</span></a>
              </p>
              <p>
                <a href="/00003/478.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                    Grupa autora: SARAJEVO U REVOLUCIJI - tom 4</span></a>
              </p>
              <p>
                <a href="/00001/8.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                    Aleksandar Vojinovi&#263; - HOTEL "PARK"</span></a>
              </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="a11">-</a> vazduhoplovstvo</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/00001/239.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Bo&#382;o Lazarevi&#263;: VAZDUHOPLOVSTVO U NOR-u 1941-1945.</span></a>
            </p>
            <p>
              <a href="/00001/115.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Predrag Pej&#269;i&#263;: PRVA I DRUGA ESKADRILA NOVJ</span></a>
            </p>
            <p>
              <a href="/00001/238.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Predrag Pej&#269;i&#263;: 42. VAZDUHOPOVNA DIVIZIJA</span></a>
            </p>
            <p>
              <a href="/00003/719.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: VAZDUHOPLOVSTVO U NARODNOOSLOBODILA&#268;KOM RATU JUGOSLAVIJE</span></a>
            </p>
            <p>
              <a href="/00001/295.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Mi&#353;o Lekovi&#263;: PRVA PARTIZANSKA KRILA</span></a>
            </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="mornarica">-</a> mornarica</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/00003/652.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Ka&#382;imir Pribilovi&#263;: &#268;ETVRTI POMORSKI OBALNI SEKTOR MORNARICE NARODNOOSLOBODILA&#268;KE VOJSKE JUGOSLAVIJE 1943-1945.</span></a>
            </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="sluzbe">-</a> razli&#269;ite slu&#382;be</td>
        </tr>
        <tr>
          <td>
            <p>
              <span>&nbsp;&nbsp;&#9658;&nbsp;
                NEMA&#268;KA OBAVE&#352;TAJNA SLU&#381;BA U OKUPIRANOJ JUGOSLAVIJI, interna publikacija III odeljenja UPRAVE DR&#381;AVNE BEZBEDNOSTI</span></a>
            </p>
            <p>
              <a href="/00003/514.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  I knjiga: Obave&#353;tajna slu&#382;ba Tre&#263;eg Reich-a</span></a>
            </p>
            <p>
              <a href="/00003/517.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  II knjiga: Nema&#269;ka obave&#353;tajna slu&#382;ba u staroj Jugoslaviji</span></a>
            </p>
            <p>
              <a href="/00003/518.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  III knjiga: Nema&#269;ka obave&#353;tajna slu&#382;ba u okupiranoj Sloveniji</span></a>
            </p>
            <p>
              <a href="/00003/521.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  IV knjiga: Nema&#269;ka obave&#353;tajna slu&#382;ba u okupiranoj Srbiji</span></a>
            </p>
            <p>
              <a href="/00003/511.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  V knjiga: Nema&#269;ka obave&#353;tajna slu&#382;ba u usta&#353;koj NDH</span></a>
            </p>
            <p>
              <a href="/00003/552.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  VI knjiga: Primeri rada nema&#269;ke obave&#353;tajne slu&#382;be</span></a>
            </p>
            <p>
              <a href="/00003/516.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  VII knjiga: Zbirka dokumenata: Op&#353;ti deo. Slovenija</span></a>
            </p>
            <p>
              <a href="/00003/522.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  VIII knjiga: Zbirka dokumenata: Srbija</span></a>
            </p>
            <p>
              <a href="/00003/515.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  IX knjiga: Zbirka dokumenata: Usta&#353;ka NDH</span></a>
            </p>
            <p>
              <a href="/00002/424.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Milovan D&#382;elebd&#382;i&#263;: OBAVE&#352;TAJNA SLU&#381;BA U NARODNOOSLOBODILA&#268;KOM RATU 1941-1945</span></a>
            </p>
            <p>
              <a href="/00002/417.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Slavko Odi&#263;, Slavko Komarica: PARTIZANSKA OBAVJE&#352;TAJNA SLU&#381;BA, knjiga 1</span></a>
            </p>
            <p>
              <a href="/00003/503.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Slavko Odi&#263;, Slavko Komarica: PARTIZANSKA OBAVJE&#352;TAJNA SLU&#381;BA, knjiga 2</span></a>
            </p>
            <p>
              <a href="/00003/502.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Slavko Odi&#263;, Slavko Komarica: PARTIZANSKA OBAVJE&#352;TAJNA SLU&#381;BA, knjiga 3</span></a>
            </p>
            <p>
              <a href="/00002/370.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  &#272;urica Labovi&#263;, Milan Basta: PARTIZANI ZA PREGOVARA&#268;KIM STOLOM 1941-1945.</span></a>
            </p>
            <p>
              <a href="/00003/380.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Milo&#353; Pajevi&#263;: ARTILJERIJA U NOR</span></a>
            </p>
            <p>
              <a href="/00003/7xx.php?bk=826" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Borivoj Lah-Boris: PRVA SLOVENSKA ARTILERIJSKA BRIGADA</span></a>
            </p>
            <p>
              <a href="/00003/7xx.php?bk=824" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Borivoj Lah-Boris: ARTILERIJA 9. KORPUSA</span></a>
            </p>
            <p>
              <span>&nbsp;&nbsp;&#9658;&nbsp;VEZE U NOB-u 1941-1945. &#8211; RATNA SE&#262;ANJA
                <a href="/00003/669.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;
                    knjiga 1</span></a>
            </p>
            <p>
              <a href="/00003/670.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
                  &#9658;&nbsp;knjiga 2
                </span></a>
            </p>
            <p>
              <a href="/00003/671.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
                  &#9658;&nbsp;knjiga 3
                </span></a>
            </p>
            <p>
              <a href="/00003/672.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
                  &#9658;&nbsp;knjiga 4
                </span></a>
            </p>
            <p>
              <a href="/00003/673.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
                  &#9658;&nbsp;knjiga 5
                </span></a>
            </p>
            <p>
              <a href="/00003/675.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Mirko &#262;etkovi&#263;: VEZE U NOB-u 1941-1942, knjiga 1</span></a>
            </p>
            <p>
              <a href="/00003/760.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Veseljko Hulji&#263;, Milovan D&#382;elebd&#382;i&#263;: VEZE U NOB-u 1943-1945, knjiga 2</span></a>
            </p>
            <p>
              <a href="/00003/674.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  VEZE U NOB-u 1941&#8212;1945.; &#352;EME 1&#8212;15</span></a>
            </p>
            <p>
              <span>&nbsp;&nbsp;&#9658;&nbsp;
                SANITETSKA SLU&#381;BA U NOR-U, zbornik radova</span></a>
            </p>
            <p>
              <a href="/00003/386.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga I
                </span></a>
            </p>
            <p>
              <a href="/00003/388.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga II
                </span></a>
            </p>
            <p>
              <a href="/00003/389.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga III
                </span></a>
            </p>
            <p>
              <a href="/00001/199.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
                  knjiga IV
                </span></a>
            </p>
            <p>
              <a href="/00003/7xx.php?bk=756" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Anton Ikovic, Marijan Linasi: KOROŠKO PARTIZANSKO ZDRAVSTVO</span></a>
            </p>
            <p>
              <a href="/00003/766.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Grupa autora: VOJNOTEHNI&#268;KA RADIONICA VRHOVNOG &#352;TABA NOV I POJ U GRME&#268;U</span></a>
            </p>
            <p>
              <a href="/00003/718.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Aleksandar Jelenkovi&#263;: SAOBRA&#262;AJ U NOR-u JUGOSLAVIJE</span></a>
            </p>
          </td>
        </tr>
        <tr>
          <td style="background-color: #000060; color: #ffffff"><a name="zlocini"></a>- zlo&#269;ini</td>
        </tr>
        <tr>
          <td>
            <p>
              <a href="/zb/4_25_1.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  ZLO&#268;INI NA JUGOSLOVENSKIM PROSTORIMA U PRVOM I DRUGOM SVETSKOM RATU - ZBORNIK DOKUMENATA: tom I, ZLO&#268;INI NDH - knjiga 1: godina 1941.</span></a>
            </p>
            <p>
              <a href="/00003/399.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Miodrag &#272;. Ze&#269;evi&#263;, Jovan P. Popovi&#263;: DOKUMENTI IZ ISTORIJE JUGOSLAVIJE, DR&#381;AVNA KOMISIJA ZA UTVR&#272;IVANJE ZLO&#268;INA OKUPATORA I NJIHOVIH POMAGA&#268;A IZ DRUGOG SVETSKOG RATA;, III tom
                </span></a>
            </p>
            <p>
              <a href="/00003/444.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Miodrag &#272;. Ze&#269;evi&#263;, Jovan P. Popovi&#263;: DOKUMENTI IZ ISTORIJE JUGOSLAVIJE, DR&#381;AVNA KOMISIJA ZA UTVR&#272;IVANJE ZLO&#268;INA OKUPATORA I NJIHOVIH POMAGA&#268;A IZ DRUGOG SVETSKOG RATA;, IV tom
                </span></a>
            </p>
            <p>
              <a href="/00001/191.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr Ja&#353;a Romano: JEVREJI JUGOSLAVIJE 1941 - 1945. &#381;RTVE GENOCIDA I U&#268;ESNICI NARODNOOSLOBODILA&#268;KOG RATA</span></a>
            </p>
            <p>
              <a href="/00003/510.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Antun Mileti&#263;: KONCENTRACIONI LOGOR JASENOVAC 1941-1945. - Dokumenta, Knjiga I</span></a>
            </p>
            <p>
              <a href="/00003/513.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Antun Mileti&#263;: KONCENTRACIONI LOGOR JASENOVAC 1941-1945. - Dokumenta, Knjiga II</span></a>
            </p>
            <p>
              <a href="/00003/512.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Antun Mileti&#263;: KONCENTRACIONI LOGOR JASENOVAC 1941-1945. - Dokumenta, Knjiga III</span></a>
            </p>
            <p>
              <a href="/00003/611.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Nata&#353;a Matau&#353;i&#263;: JASENOVAC, FOTOMONOGRAFIJA</span></a>
            </p>
            <p>
              <a href="/00003/759.php" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Milko Riffer: GRAD MRTVIH, JASENOVAC 1943.</span></a>
            </p>
            <p>
              <a href="/00003/559.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Savo Skoko: POKOLJI HERCEGOVA&#268;KIH SRBA '41.</span></a>
            </p>
            <p>
              <a href="/00001/84.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Venceslav Gli&#353;i&#263;: TEROR I ZLO&#268;INI NACISTI&#268;KE NEMA&#268;KE U SRBIJI 1941-1945</span></a>
            </p>
            <p>
              <a href="/00003/637.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dr &#272;or&#273;e N. Lopi&#269;i&#263;: NEMA&#268;KI RATNI ZLO&#268;INI 1941-1945, presude jugoslovenskih vojnih sudova</span></a>
            </p>
            <p>
              <a href="/00003/599.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Goran Babi&#263;: PAOR SA BAJONETOM - Zlo&#269;in i kazna vojvo&#273;anskih folksdoj&#269;era</span></a>
            </p>
            <p>
              <a href="/00001/106.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoje Luki&#263;: RAT I DJECA KOZARE</span></a>
            </p>
            <p>
              <a href="/00003/563.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Ivan Fumi&#263;: DJECA - &#381;RTVE USTA&#352;KOG RE&#381;IMA</span></a>
            </p>
            <p>
              <a href="/00003/683.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Biografije strijeljanih na Dotr&#353;&#263;ini 1941. - 1945.</span></a>
            </p>
            <p>
              <a href="/00003/tanja_tulekovic.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Tanja Tulekovi&#263;: KNJIGA IZ TI&#352;INE (Usta&#353;ki zlo&#269;in genocida u selu Me&#273;e&#273;a, 1941-1945. godine)</span></a>
            </p>
            <p>
              <a href="/00001/162.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Du&#353;an Lazi&#263; - Gojko: SREMSKO KRVAVO LETO 1942</span></a>
            </p>
            <p>
              <a href="/00001/142.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Du&#353;an Bai&#263;: KOTAR VRGINMOST U NO BORBI 1941 - 1945</span></a>
            </p>
            <p>
              <a href="/00003/580.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Filip &#352;kiljan: Teror usta&#353;kog re&#382;ima nad srpskim stanovni&#353;tvom na podru&#269;ju kotareva Vrbovsko, Delnice i Ogulin u prolje&#263;e i ljeto 1941. godine (Radovi - Zavod za hrvatsku povijest, Vol. 43)</span></a>
            </p>
            <p>
              <a href="/00003/581.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Filip &#352;kiljan: STRADANJE SRBA, ROMA I &#381;IDOVA U VIROVITI&#268;KOM I SLATINSKOM KRAJU TIJEKOM 1941. I PO&#268;ETKOM 1942. GODINE (Scrinia Slavonica 10)</span></a>
            </p>
            <p>
              <a href="/00003/565.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Josip Ba&#353;i&#263; Bepo: MOLAT U DRUGOM SVJETSKOM RATU 1941.-1945 - tragovima doga&#273;aja</span></a>
            </p>
            <p>
              <a href="/00001/144.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  SPOMEN-KNJIGA poginulih TUZLANSKIH BORACA NOR-a i &#382;rtava fa&#353;isti&#269;kog terora 1941-1945.)</span></a>
            </p>
            <p>
              <a href="/00003/576.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Zbornik &#381;RTVE VOJNE IN REVOLUCIJE - Referati in razprava s posveta v Dr&#382;avnem svetu 11. in 12. novembra 2004</span></a>
            </p>
            <p>
              <a href="/00001/109.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  PRILOG U KRVI (PLJEVLJA 1941-1945)</span></a>
            </p>
            <p>
              <a href="/00001/112.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Gojko &#352;koro: ISTINA JE U IMENIMA (stradali u u&#382;i&#269;kom okrugu u drugom svetskom ratu)</span></a>
            </p>
            <p>
              <a href="/00003/609.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  KOLA&#352;INSKI &#268;ETNI&#268;KI ZATVOR 1942. - ZBORNIK RADOVA</span></a>
            </p>
            <p>
              <a href="/00001/22.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoljub Panti&#263;: NO&#262; KAME</span></a>
            </p>
            <p>
              <a href="/00001/44.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Radisav S. Nedovi&#263;: &#268;A&#268;ANSKI KRAJ U NOB - SLOBODARI NA STRATI&#352;TIMA (Spisak &#382;rtava Drugog svetskog rata u &#269;a&#269;anskom kraju - &#268;A&#268;AK 2009)</span></a>
            </p>
            <p>
              <a href="/00002/419.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Du&#353;an Prica, Joksim Radojkovi&#263;: MIJAJLOVA JAMA</span></a>
            </p>
            <p>
              <a href="/00001/47.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Dragoslav Dimitrijevi&#263; Beli: GDE JE MOJA MAMA (hronika Avalskog korpusa JVuO)</span></a>
            </p>
            <p>
              <a href="/00003/473.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  ZLO&#268;INI &#268;ETNI&#268;KOG POKRETA U SRBIJI 1941-1945. - Zbornik radova</span></a>
            </p>
            <p>
              <a href="/00003/572.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Nikola P. Ili&#263;: KRVAVI FEBRUAR (zlo&#269;in u Bojniku 1942)</span></a>
            </p>
            <p>
              <a href="/00001/281.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Radoje Pajovi&#263; - Du&#353;an &#381;eljeznov - Branislav Bo&#382;ovi&#263;: PAVLE ÐURI&#352;I&#262; - LOVRO HACIN - JURAJ &#352;PILER</span></a>
            </p>
            <p>
              <a href="/00001/304.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Vladan Tomi&#263;: NEMA MESTA NA NEBU (Vojislav Raj&#269;i&#263; "Po&#382;arevac")</span></a>
            </p>
            <p>
              <a href="/00003/446.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Prof. dr Smail &#268;eki&#263;: GENOCID NAD BO&#352;NJACIMA U DRUGOM SVJETSKOM RATU - DOKUMENTI</span></a>
            </p>
            <p>
              <a href="/00001/84.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Venceslav Gli&#353;i&#263;: TEROR I ZLO&#268;INI NACISTI&#268;KE NEMA&#268;KE U SRBIJI 1941-1945</span></a>
            </p>
            <p>
              <a href="/00003/393.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Tone Ferenc: NACISTI&#268;KA POLITIKA DENACIONALIZACIJE U SLOVENIJI U GODINAMA OD 1941. DO 1945.</span></a>
            </p>
            <p>
              <a href="/00001/178.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Valter Mano&#353;ek: HOLOKAUST U SRBIJI</span></a>
            </p>
            <p>
              <a href="/00002/325.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  ITALIAN CRIMES IN YUGOSLAVIA (YUGOSLAV INFORMATION OFFICE LONDON 1945).</span></a>
            </p>
            <p>
              <a href="/00002/410.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  ZLO&#268;INI I TEROR U DALMACIJI 1943.-1948. PO&#268;INJENI OD PRIPADNIKA NOV, JA, OZN-e I UDB-e. DOKUMENTI</span></a>
            </p>
            <p>
              <a href="/00003/562.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  BLEIBURG i Kri&#382;ni put 1945. - Zbornik radova sa znanstvenoga skupa, Zagreb 12. travnja 2006.</span></a>
            </p>
            <p>
              <a href="/00003/677.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  PARTIZANSKA I KOMUNISTI&#268;KA REPRESIJA I ZLO&#268;INI U HRVATSKOJ 1944-1946.; DOKUMENTI</span></a>
            </p>
            <p>
              <a href="/00003/665.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  PARTIZANSKA I KOMUNISTI&#268;KA REPRESIJA I ZLO&#268;INI U HRVATSKOJ 1944. - 1946.; DOKUMENTI 3 &#8211; Zagreb i sredi&#353;nja Hrvatska</span></a>
            </p>
            <p>
              <a href="/00002/kazna_i_zlocin.pdf" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Milan Radanović: KAZNA I ZLOČIN - Snage kolaboracije u Srbiji </span></a>
            </p>
      </table>
      <table width="100%" border="1">
        <h3>Italija</h3>
        <tr>
          <td>
            <p>
              <a href="/00003/725.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Pietro Secchia, Filippo Frassati: STORIA DELLA RESISTENZA, vol. II</span></a>
            </p>
            <p>
              <a href="/00003/720.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
                  Skupina avtorjev / gruppo di autori: KRI&#381;ANI V BOJU ZA SVOBODO / S. CROCE NELLA LOTTA PER LA LIBERTA</span></a>
            </p>
          </td>
        </tr>
      </table>
</section>

<?php include "includes/footer.php"; ?>