<?php
$naslov = "Nemački dokumenti";
include "includes/header.php";
?>

<h2>Originalna nemačka i saveznička dokumentacija</h2>

<?php
$konekcija = mysqli_connect("", getenv('MYSQL_UN'), getenv('MYSQL_PW'), getenv('MYSQL_DB'));
mysqli_set_charset($konekcija, 'utf8');
$upit3 = "SELECT sum(maxx_i) AS sumof_maxxi FROM roll_s" . ";";
$rezultat3 = mysqli_query($konekcija, $upit3);
$red3 = mysqli_fetch_assoc($rezultat3);
$totalpages = $red3['sumof_maxxi'];
$upit3 = "SELECT count(id) as countof_id FROM roll_s" . ";";
$rezultat3 = mysqli_query($konekcija, $upit3);
$red3 = mysqli_fetch_assoc($rezultat3);
$totalrolls = $red3['countof_id'];
$upit3 = "SELECT count(id) as countof_id FROM roll_c WHERE tip=1" . ";";
$rezultat3 = mysqli_query($konekcija, $upit3);
$red3 = mysqli_fetch_assoc($rezultat3);
$totalnotes = $red3['countof_id'];
?>

<div style="margin-bottom:8px; padding:4px">
  <small>
    Vojnoistorijski institut je početkom šezdesetih godina dobio od <a href="http://www.archives.gov/" target="new">National Archive</a> nemačke zaplenjene dokumetne koji se odnose na Jugoslaviju u obliku mikrofilmova.
    To je dovelo do značajnog skoka u kvalitetu istoriografskog istraživanja u Jugoslaviji. Oko 2.000 dokumenata je prevedeno i objavljeno u ediciji Zbornika Vojnoistorijskog instituta (takođe dostupnih na sajtu, videti <a href="dokumenti.php">dokumente</a>).
    Međutim, radilo se o redakcijskom izboru, a rolne su bile samo ograničeno dostupne iz tehničkih razloga, pa se često postavljalo pitanje reprezentativnosti i pouzdanosti.
    S obzirom da je danas dostupna velika masa originalnih nemačkih dokumenata iz WW2 u digitalnom formatu, i to ne u obliku nekog redakcijskog izbora, nego svi redom, u obliku kompletnih rolni, i s obzirom da
    interesovanje postoji, pravljenje neke vrste javnih beleški o sadržaju pojavilo se kao logična i korisna ideja koja može olakšati navigaciju i ubrzati pretragu. Ovaj posao je tek u začetku
    - na sajtu je trenutno dostupno ukupno <b class=bigbigTitle_c><?php echo $totalrolls; ?></b> kompletnih rolni dokumenata, sa ukupno <b class=bigbigTitle_c><?php echo $totalpages; ?></b> listova dokumenata,
    a broj beleški uz dokumente je trenutno svega <b class=bigbigTitle_c><?php echo $totalnotes; ?></b> (dakle oko 1%) - ali nadamo se značajnom porastu s vremenom.<br>
    Beleške radi više istoričara, pa ima dosta stilskih i sadržajnih nedoslednosti. Neka imena navedena su u sh obliku, a neka u nemačkom originalu, pa je stoga dobra ideja izbegavati dijakritike, ili ponoviti traženu reč u obliku sa i bez dijakritika.
    Pretraga kroz beleške radi tako što unesete traženu reč (ili deo reči) u jedno polje, a u drugo unesete alternativni oblik pisanja tog pojma, ili neki drugi pojam, i pritisnete dugme "traži!".
    Pretraga je "case sensitive", odnosno, ako reč u belešci počinje velikim slovom, a Vi je ukucate malim slovima, ta beleška neće biti uvrštena u rezultat. U rezultate će biti uvrštene sve beleške u kojima se nalazi bilo koja od unetih reči. Niz rezultata sa slikama odgovarajućih dokumenata će biti prikazan u novom tabu odnosno prozoru.<br>
    Par saveta: S obzirom na aktuelnost, najtraženiji su dokumenti koji se odnose na DM-četnike. Trenutno takvih beleški ima 430. Ako Vas npr zanimaju izveštaji o gubicima, njih u dokumentima ima veoma mnogo, ali su u beleškama slabije zastupljeni.
    Pri tome treba imati u vidu da se ponekad pojavljuju sa rečju "mrtvih", "mrtav", "poginuli", i varijantama, a ima ih priličan broj koji su obeleženi sa "KIA" - profesionalna deformacija istoričara rata &#128512;.
  </small>
</div>

<table width="100%" border=1 style="background-color: #fff">
  <tr>
    <td style="background-color: #909090" colspan=2>
      <span class=bigbigTitleW>- arhivski fond:<br /><a href="/NARA/T316.php" target="new">- Nemački dokumenti sa mikrofilmova National Archive Washington (Documents from National Archive Washington)<br />
          ukupno trenutno sadrži <b class=bigbigTitle_c><?php echo $totalrolls; ?></b> kompletnih rolni sa ukupno <b class=bigbigTitle_c><?php echo $totalpages; ?></b> listova dokumenata</a>
      </span><br />
      <span class=bigbigTitleW><a href="/ok/T317.php" target="new">- Pretraga kroz beleške uz nemačke dokumente sa mikrofilmova National Archive Washington (Documents from National Archive Washington - notes search)</a>
      </span>
    </td>
  </tr>
  <tr>
    <td>
      <a name="ktb"> </a>
      <div style="font-weight: bold;">
        KRIEGSTAGEBUCH DES OBERKOMMANDOS DER WEHRMACHT<br />
        <a href="/zb/7_1.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            BAND I.: 1940-1941.</span></a><br />
      </div>
      <div style="font-weight: bold;">
        &nbsp;&nbsp;&#9658;&nbsp;BAND II.: 1942.<br />
        <a href="/zb/7_2_1.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
            ERSTER HALBBAND</span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/zb/7_2_2.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
            ZWEITER HALBBAND</span></a><br />
      </div>
      <div style="font-weight: bold;">
        &nbsp;&nbsp;&#9658;&nbsp;BAND III.: 1943.<br />
        <a href="/zb/7_3_1.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
            ERSTER HALBBAND</span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/zb/7_3_2.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
            ZWEITER HALBBAND</span></a><br />
      </div>
      <div style="font-weight: bold;">
        &nbsp;&nbsp;&#9658;&nbsp;BAND IV.: 1944-1945.<br />
        <a href="/zb/7_4_1.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
            ERSTER HALBBAND</span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/zb/7_4_2.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&#9658;&nbsp;
            ZWEITER HALBBAND</span></a><br />
      </div>
      <br />
      <div style="font-weight: bold;">
        <span>&nbsp;&nbsp;&#9658;&nbsp;
          nekoliko vodi&#269;a kroz nema&#269;ke zaplenjene dokumente (iz NARA publikacije T733)</span><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/00002/327.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;&#9658;&nbsp;
            <u>
              Guides to German Records Microfilmed at Alexandria, Virginia from Publication
              T733 - High Command of the Army
            </u>
          </span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/00002/328.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;&#9658;&nbsp;
            <u>
              Guides to German Records Microfilmed at Alexandria, Virginia from Publication
              T733 - Army Groups
            </u>
          </span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/00002/329.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;&#9658;&nbsp;
            <u>
              Guides to German Records Microfilmed at Alexandria, Virginia from Publication
              T733 - Armies
            </u>
          </span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/00002/330.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;&#9658;&nbsp;
            <u>
              Guides to German Records Microfilmed at Alexandria, Virginia from Publication
              T733 - Army Corps
            </u>
          </span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/00002/331.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;&#9658;&nbsp;
            <u>
              Guides to German Records Microfilmed at Alexandria, Virginia from Publication
              T733 - Divisions
            </u>
          </span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/00002/332.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;&#9658;&nbsp;
            <u>
              Guides to German Records Microfilmed at Alexandria, Virginia from Publication
              T733 - 2. Panzer Army
            </u>
          </span></a><br />
      </div><a name="a16"> </a>
    </td>
  </tr>
  <tr>
    <td style="background-color: #aaaaaa">
      <div style="font-weight: bold;">
        <span class=bigTitle>- National Archives and Records Administration, US, German
          documents</span><br />
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div style="font-weight: bold;">
        <span>&nbsp;&nbsp;&#9658;
          &nbsp;
          <u>
            <a href="/NARA/T316.php?rec=78" target="_blank">Microfilmed German Supreme
              Army Command (Oberkommando des Heeres) Documents from National Archive Washington</a>
          </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=78&roll=331" target="_blank"><span>&nbsp;&nbsp;
            &#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T311, Roll 331 - Supreme Army Command (Oberkommando des Heeres, Tagesmeldungen
              Ob. Südost), 1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=78&roll=332" target="_blank"><span>&nbsp;&nbsp;
            &#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T311, Roll 332 - Supreme Army Command (Oberkommando des Heeres, Tagesmeldungen
              Ob. Südost), 1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <x href="/00002/333.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T78, Roll 414 (delovi) - Zbirka dokumenata Vrhovne komande armije (Oberkommando
              des Heeres) - prikazi armijskih snaga i gubitaka po armijskim grupama
            </u> </span></x><br />
      </div>
      <div style="font-weight: bold;">
        <x href="/00002/361.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              Himmler file - Drawer # 6 - Folder # 232 (Handschar Division) T175 roll 70
            </u> </span></x>
      </div>
      <div style="font-weight: bold;">
        <span>&nbsp;&nbsp;&#9658;
          &nbsp;
          <u>
            <a href="/NARA/T316.php?unit=626" target="_blank">Microfilmed Army Group E
              Headquarters (Heeresgruppe E Oberkommando) Documents from National Archive Washington</a>
          </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <span>&nbsp;&nbsp;&#9658;
          &nbsp;
          <u>
            <a href="/NARA/T316.php?unit=627" target="_blank">Microfilmed Army Group F
              Headquarters (Heeresgruppe F Oberkommando) Documents from National Archive Washington</a>
          </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=311&roll=187" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T311, Roll 187 - Army Group F (Heeresgruppe F), 1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=311&roll=188" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T311, Roll 188 - Army Group F (Heeresgruppe F), 1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=311&roll=189" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T311, Roll 189 - Army Group F (Heeresgruppe F), 1944/1945.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=311&roll=190" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T311, Roll 190 - Army Group F (Heeresgruppe F), 1944/1945.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=311&roll=194" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T311, Roll 194 - Army Group F (Heeresgruppe F), 1944.
            </u> </span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=311&roll=195" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T311, Roll 195 - Army Group F (Heeresgruppe F), 1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=311&roll=196" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T311, Roll 196 - Army Group F (Heeresgruppe F),1944/1945.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=311&roll=285" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T311, Roll 285 - Army Group F (Heeresgruppe F), 1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=311&roll=286" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T311, Roll 286 - Army Group F (Heeresgruppe F), 1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <span>&nbsp;&nbsp;&#9658;
          &nbsp;
          <u>
            <a href="/NARA/T316.php?unit=630" target="_blank">Microfilmed 2nd Panzer Army
              Documents (Panzerarmee 2) from National Archive Washington</a>
          </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=313&roll=192" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T313, Roll 192 - 2nd Panzer Army (2. Panzerarmee) Documents - 1943.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=313&roll=196" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T313, Roll 196 - 2nd Panzer Army (2. Panzerarmee) Documents - 1943.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=313&roll=482&f1_prip=2" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T313, Roll 482 - 2nd Panzer Army (2. Panzerarmee) Documents - 1943.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=313&roll=483&f1_prip=3" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T313, Roll 483 - 2nd Panzer Army (2. Panzerarmee) Documents - 1943.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=313&roll=484&f1_prip=4" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T313, Roll 484 - 2nd Panzer Army (2. Panzerarmee) Documents - 1943.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=313&roll=485&f1_prip=5" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T313, Roll 485 - 2nd Panzer Army (2. Panzerarmee) Documents - 1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=313&roll=486&f1_prip=6" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T313, Roll 486 - 2nd Panzer Army (2. Panzerarmee) Documents - 1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=313&roll=487&f1_prip=7" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T313, Roll 487 - 2nd Panzer Army (2. Panzerarmee) Documents - 1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=313&roll=488&f1_prip=8" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T313, Roll 488 - 2nd Panzer Army (2. Panzerarmee) Documents - 1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <span>&nbsp;&nbsp;&#9658;
          &nbsp;
          <u>
            <a href="/NARA/T316.php?unit=634" target="_blank">Microfilmed Documents of
              German 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) from National Archive Washington</a>
          </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=554" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, Roll 554 - 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents -
              1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=555" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, Roll 555 - 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents -
              1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=556" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, Roll 556 - 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents -
              1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=557" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, Roll 557 - 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents -
              1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=558" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, Roll 558 - 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents -
              1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=559" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, Roll 559 - 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents -
              1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=560" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, Roll 560 - 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents -
              1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=561" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, Roll 561 - 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents -
              1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=562" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, Roll 562 - 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents -
              1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=563" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, Roll 563 - 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents -
              1944.
            </u> </span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=564" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents - 1944.
            </u> </span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=565" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, Roll 565 - 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents -
              1944.
            </u> </span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=314&roll=566" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T314, Roll 566 - 15th Mountain Army Corps (XV. Gebirgs-Armeekorps) Documents -
              1942-1943.
            </u> </span></a><br />
      </div>
      <div style="font-weight: bold;">
        <span>&nbsp;&nbsp;&#9658;
          &nbsp;
          <u>
            <a href="/NARA/T316.php?unit=643" target="_blank">Microfilmed Documents of
              German 91st Army Corps (LXXXXI. Armeekorps) from National Archive Washington</a>
          </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <span>&nbsp;&nbsp;&#9658;
          &nbsp;
          <u>
            <a href="/NARA/T316.php?unit=653" target="_blank">Microfilmed Documents of
              German 114th Jäger Division from National Archive Washington</a>
          </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=315&roll=1294" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T315, roll 1294, 714. Infanterie / 114. Jäger Division Documents - 1943.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=315&roll=1295" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T315, roll 1295, 114. Jäger Division Documents - 1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=315&roll=1296" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T315, roll 1296, 114. Jäger Division Documents - 1943/1945.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <span>&nbsp;&nbsp;&#9658;
          &nbsp;
          <u>
            <a href="/NARA/T316.php?unit=654" target="_blank">Microfilmed Documents of
              German 717th Infantry / 117th Jäger Division from National Archive Washington</a>
          </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=315&roll=2263" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T315, roll 2263, 717. Infanterie / 117. Jäger Division Documents - 1943.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <span>&nbsp;&nbsp;&#9658;
          &nbsp;
          <u>
            <a href="/NARA/T316.php?unit=655" target="_blank">Microfilmed Documents of
              German 718th Infantry / 118th Jäger Division from National Archive Washington</a>
          </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=315&roll=2269" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T315, roll 2269, 718. Infanterie / 118. Jäger Division Documents - 1942.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=315&roll=2270" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T315, roll 2270, 718. Infanterie / 118. Jäger Division Documents - 1942.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=315&roll=2271" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T315, roll 2271, 718. Infanterie / 118. Jäger Division Documents - 1942/1943.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <span>&nbsp;&nbsp;&#9658;
          &nbsp;
          <u>
            <a href="/NARA/T316.php?unit=685" target="_blank">Microfilmed Documents of
              German 369th Infantry (Croatian) Division from National Archive Washington</a>
          </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=315&roll=2154" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T315, roll 2154, 369. Infanterie (Kroat.) Division Documents - 1942/1943.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=315&roll=2155" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T315, roll 2155, 369. Infanterie (Kroat.) Division Documents - 1943.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <span>&nbsp;&nbsp;&#9658;
          &nbsp;
          <u>
            <a href="/NARA/T316.php?unit=686" target="_blank">Microfilmed Documents of
              German 373rd Infantry (Croatian) Division from National Archive Washington</a>
          </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=315&roll=2170" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T315, roll 2170, 373. Infanterie (Kroat.) Division Documents - 1943.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <a href="/NARA/T316.php?rec=315&roll=2171" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T315, roll 2171, 373. Infanterie (Kroat.) Division Documents - 1943/1944.
            </u> </span></a>
      </div>
      <div style="font-weight: bold;">
        <x href="/NARA/T354_606/T354_606.php" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;
            <u>
              T354, Roll 606 - Zbirka dokumenata II SS oklopnog korpusa jun-decembar 1943 (II.
              SS-Panzerkorps, Juni-Dezember 1943)
            </u> </span></x><br />
      </div>
      <div style="font-weight: bold;">
        <x href="/00002/317.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;&nbsp;
            <u>
              T501, Roll 255 - Zbirka dokumenata okupacionih komandanata na Balkanu 1944.
            </u> </span></x><br />
      </div>
  <tr>
    <td style="background-color: #aaaaca">
      <div style="font-weight: bold;">
        &nbsp;
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div style="font-weight: bold;">
        <a href="/00002/336.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;
            <u>
              QUADRANT CONFERENCE (Quebec, 14-24 August 1943) (en)
            </u></span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/00002/334.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;
            <u>
              SEXTANT/EUREKA CONFERENCES (Cairo and Tehran. 22 November-7 December 1943) (en)
            </u></span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/00002/335.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;
            <u>
              OCTAGON CONFERENCE September 1944 - papers and minutes of meetings (en)
            </u></span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/00002/337.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;
            <u>
              ARGONAUT CONFERENCE January-February 1945 (Malta and Yalta, 20 January-11
              February 1945) (en)
            </u></span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/00002/318.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;
            <u>
              American Army Interrogation Reports - Selection (en)
            </u></span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/00002/319.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;
            <u>
              Izve&#353;taji sa ispitivanja nema&#269;kih zvani&#269;nika (Institut für
              Zeitgeschishte - München) (de)
            </u></span></a><br />
      </div>
      <div style="font-weight: bold;">
        <a href="/00002/402.htm" target="_blank"><span>&nbsp;&nbsp;&#9658;
            &nbsp;
            THE GERMAN CAMPAIGNS IN THE BALKANS (SPRING 1941) - DEPARTMENT OF THE ARMY PAMPHLET NO. 20-260
            (en)</span></a><br />
      </div>
</table>

<?php include "includes/footer.php"; ?>