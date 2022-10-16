<script>
  const $ = (selektor) => document.querySelector(selektor)

  const broj_oznake = $('#odrednica_id').value;
  const korak_ucitavanja = 100

  let dozvoljeno_ucitavanje = true;

  const hronologija = {
    api: "/api/ajax-dogadjaji.php",
    target: $("#hronologija-sadrzaj"),
    ukupno: Number($('#broj_dogadjaja').value),
  };

  const dokumenti = {
    api: "/api/ajax-dokumenti.php",
    target: $("#dokumenti-sadrzaj"),
    ukupno: Number($('#broj_dokumenata').value),
  };

  const fotografije = {
    api: "/api/ajax-fotografije.php",
    target: $("#fotografije-sadrzaj"),
    ukupno: Number($('#broj_fotografija').value),
    od: Number($('#fotografije_limit').value),
  };

  hronologija.od = dokumenti.od = Number($('#render_limit').value);

  /*** EVENTS ***/

  $('#hronologija').addEventListener("scroll", () => ucitajJos(hronologija));

  $('#dokumenti').addEventListener("scroll", () => ucitajJos(dokumenti));

  $('#fotografije').addEventListener("scroll", () => ucitajJos(fotografije));

  /*** FUNKCIJE ***/

  function ucitaj(target, url, ucitaj_od, ucitaj_do) {
    const http = new XMLHttpRequest();
    http.open("GET", url + "?br=" + broj_oznake + "&ucitaj_od=" + ucitaj_od + "&ucitaj_do=" + ucitaj_do);
    http.send();
    http.onreadystatechange = function() {
      if (http.readyState != 4 || http.status != 200) return;
      sakrijUcitavace(target);
      target.innerHTML += http.responseText; // dodaje tekst i novi učitavač
      dozvoljeno_ucitavanje = true;
    };
  }

  function sakrijUcitavace(target) {
    [...target.childNodes].forEach(child => {
      if (child.className == "ucitavac") child.className = "hide";
    })
  }

  function ucitajJos(predmet) {
    if (!dozvoljeno_ucitavanje || predmet.od >= predmet.ukupno) return;
    ucitaj(predmet.target, predmet.api, predmet.od, predmet.od + korak_ucitavanja);
    predmet.od += korak_ucitavanja;
    dozvoljeno_ucitavanje = false; // brani dalje ucitavanje dok ne stignu podaci
  }
</script>