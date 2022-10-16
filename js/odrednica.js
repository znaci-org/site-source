function $(selektor) {
  return document.querySelector(selektor)
}

function $$(selektor) {
  return document.querySelectorAll(selektor)
}

var broj_oznake = null;
var dozvoljeno_ucitavanje = true;
var korak_ucitavanja = 100

// dodaje jos atributa po ucitavanju
var hronologija = {
  api: "api/ajax-dogadjaji.php"
};

var dokumenti = {
  api: "api/ajax-dokumenti.php"
};

var fotografije = {
  api: "api/ajax-fotografije.php"
};

/*** EVENTS ***/

window.addEventListener('load', function () {
  broj_oznake = $('#odrednica_id').value;
  
  hronologija.target = $("#hronologija-sadrzaj");
  hronologija.ukupno = +$('#broj_dogadjaja').value;

  dokumenti.target = $("#dokumenti-sadrzaj");
  dokumenti.ukupno = +$('#broj_dokumenata').value;
  hronologija.od = dokumenti.od = +$('#render_limit').value;

  fotografije.target = $("#fotografije-sadrzaj");
  fotografije.ukupno = +$('#broj_fotografija').value;
  fotografije.od = +$('#fotografije_limit').value;

  $('#hronologija').addEventListener("scroll", function () {
    ucitajJos(hronologija);
  });

  $('#dokumenti').addEventListener("scroll", function () {
    ucitajJos(dokumenti);
  });

  $('#fotografije').addEventListener("scroll", function () {
    ucitajJos(fotografije);
  });

});

document.addEventListener('click', function (e) {
  var element = e.target;
  if (element.id == 'promeni-naziv') promeniNaziv(element.nextElementSibling, broj_oznake, $('#pojam').innerText);
});

/*** FUNKCIJE ***/

function ucitaj(target, url, ucitaj_od, ucitaj_do) {
  var http = new XMLHttpRequest();
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
  for (var i = 0; i < target.childNodes.length; i++) {
    if (target.childNodes[i].className == "ucitavac") target.childNodes[i].className = "hide";
  }
}

function ucitajJos(predmet) {
  if (!dozvoljeno_ucitavanje || predmet.od >= predmet.ukupno) return;
  ucitaj(predmet.target, BASE_URL + predmet.api, predmet.od, predmet.od + korak_ucitavanja);
  predmet.od += korak_ucitavanja;
  dozvoljeno_ucitavanje = false; // brani dalje ucitavanje dok ne stignu podaci
}

function promeniNaziv(element, broj_oznake, novi_naziv) {
  const ajax = napraviAjax(element)
  ajax.open('POST', BASE_URL + 'api/menja-naziv.php')
  ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
  ajax.send('novi_naziv=' + novi_naziv + '&broj_oznake=' + broj_oznake)
}
