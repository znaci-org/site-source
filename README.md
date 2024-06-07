# ZNACI.ORG

## Stvar je u tome da se svet promeni (poziv za saradnju)

Ovo je repo sa HTML (i CSS) fajlovima sajta *Znaci.org* - arhive dokumentacije iz 2. svetskog rata, koji je originalno pripremio i održavao na domenu *Znaci.net* naš preminuli drug Goran Despotović, a sada ga održava grupa volontera i entuzijasta.

Osim ovih HTML/CSS fajlova, sajt *Znaci.org* sadrži i oko 150GB dokumenata, čiji najvažniji deo sačinjavaju skenirani mikrofilmovi zaplenjene dokumentacije nacističke Nemačke, koju je Vojnoistorijski institut početkom šezdesetih godina dobio od National Archive. 

Prema Goranovom komentaru, "Ovaj posao je tek u začetku - na sajtu je trenutno dostupno ukupno 84 kompletnih rolni dokumenata, sa ukupno 94175 listova dokumenata, a broj beleški uz dokumente je trenutno svega 993 (dakle oko 1%) - ali nadamo se značajnom porastu s vremenom."

U tom smislu smo stvorili ovaj github repo, kao mehanizam koji bi omogućio komforan i upravljiv način da veći broj saradnika učestvuje u stvaranju beleški uz dokumente - i time, s vremenom, učini sajt *Znaci.org* još korisnijim i informativnijim.

Ovaj github repo je javno dobro (kao i ostatak sajta) - i možete ga klonirati kod sebe i pregledati detaljnije, razumeti njegovu strukturu, uporediti sa sadržajem sajta, i slično. Ako već nemate Github račun, registracija je besplatna i možete je uraditi ovde: https://github.com/signup

Kod sebe, lokalno, možete pokušati/početi da proširujete sadržaje, menjajući postojeće HTML dokumente ili dodajući nove, koje možete uključiti u strukturu sajta koristeći HTML reference koje dodate u postojeće dokumente (apsolutne ili relativne, ali molimo vas bez navođenja domena ispred). Osnovnu kontrolu promena možete uraditi i lokalno, otvaranjem HTML dokumenata vašim uobičajenim internet pretraživačem. Slike će nedostajati, ali možete proveriti promenjeni/dodati sadržaj i ispravnost referenci.

Da bi vaše izmene bile trajno integrisane na sajt biće potrebno da nam se javite i objasnite/prikažete svoje priloge radnoj grupi za održavanje sajta, koja bi vam odobrila status saradnika (repo collaborator), koji vam omogućava da prosleđujete svoje izmene/dopune u glavnu granu repoa, koja se automatizovano integriše na sajt svakog minuta.

Ako nemate puno iskustva u radu sa git sistemom za održavanje verzija izvornog koda / dokumenata, najtoplije preporučujemo da instalirate Github desktop GUI alat ( https://desktop.github.com/ ), koji omogućava vrlo jednostavnu interakciju sa github repoima. Kroz ovaj alat možete napraviti kopiju repoa kod sebe (clone), pregledati vaše izmene i (kada dobijete status saradnika) integrisati izmene u repo i time i na sajt.

## Development

```
php -S localhost:8000
```