<script>
  const praviIkonicu = title => L.divIcon({
  className: '',
  html: `<div style="text-align:center">
      <span style="color:red;font-size:2em;display:inline-block;margin-bottom:-5px;">★</span><span style="white-space: nowrap;font-weight:bold">${title}</span>
    </div>`,
  iconSize: [30, 42],
  iconAnchor: [10, 20]
})

const praviMarker = data => {
  const url = '/odrednica.php?slug=' + data.slug;
  const slika_src = '/images/ustanak.jpg';

  const prozor = `<a href='${url}' target='_blank'>
    <h3>${data.naslov} u oslobodilačkom ratu</h3>
    <img src='${slika_src}' width='200'>
  </a>`

  return L
    .marker([data.lokacija.lat, data.lokacija.lon], { icon: praviIkonicu(data.naslov) })
    .bindPopup(prozor)
}

function postaviMapu(gradovi) {
  const jajce = [44.341667, 17.269444]
  const mostar = [43.333333, 17.8]
  const center = window.innerWidth < 768 ? mostar : jajce

  const konfigMape = {
    zoom: 8,
    minZoom: 6,
    maxZoom: 12,
    center,
    scrollWheelZoom: false,
    maxBounds: [
      [39, 10], // jug zapad
      [49, 26]  // sever istok
    ],
  }

  const mapa = L.map('mesto-za-mapu', konfigMape)

  // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  //   attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  // }).addTo(mapa)

  L.tileLayer('http://tile.stamen.com/terrain-background/{z}/{x}/{y}.jpg', {
    attribution: '© design by <a href="http://stamen.com">Stamen Design</a>, data by <a href="http://openstreetmap.org">OpenStreetMap</a>.'
  }).addTo(mapa)

  const markeri = L.layerGroup().addTo(mapa)

  gradovi.forEach(grad => {
    const data = {
      naslov: grad[1],
      lokacija: {
        lat: grad[2],
        lon: grad[3]
      },
      slug: grad[4],
    }
    markeri.addLayer(praviMarker(data))
  })
}
</script>