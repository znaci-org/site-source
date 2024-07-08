<script>
const praviIkonicu = title => L.divIcon({
  className: '',
  html: `<div style="text-align:center">
      <span class="petokraka">★</span><span class="map-label">${title}</span>
    </div>`,
  iconSize: [30, 42],
  iconAnchor: [12, 24]
})

const praviMarker = data => {
  const url = '/odrednica.php?slug=' + data.slug;
  const slika_src = '/images/ustanak.png';

  const prozor = `<a href='${url}' target='_blank'>
    <h3>${data.naziv} u drugom svetskom ratu</h3>
    <img src='${slika_src}' width='200'>
  </a>`

  return L
    .marker([data.lat, data.lon], { icon: praviIkonicu(data.naziv) })
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

  L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(mapa)

  // L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
  //     attribution: 'Tiles &copy; Esri.'
  // }).addTo(mapa)

  const markeri = L.layerGroup().addTo(mapa)

  gradovi.forEach(grad => {
    markeri.addLayer(praviMarker(grad))
  })
}
</script>