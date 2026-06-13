<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Artisans à proximité | AlloHrayfi</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<style>
*{margin:0;padding:0;box-sizing:border-box;}
:root{
  --bg:#071124;--bg2:#0b1a2e;--text:#e8f4fd;--text2:rgba(232,244,253,0.7);--text3:rgba(232,244,253,0.45);
  --accent:#06b6d4;--accent2:#0891b2;--accent3:rgba(6,182,212,0.12);
  --green:#10b981;--amber:#f59e0b;--red:#ef4444;
  --border:rgba(6,182,212,0.15);--border2:rgba(255,255,255,0.06);
  --card:rgba(255,255,255,0.03);--nav:rgba(7,17,36,0.97);
}
html,body{height:100%;overflow:hidden;font-family:'Tajawal',sans-serif;background:var(--bg);color:var(--text);}
nav{position:fixed;top:0;left:0;right:0;z-index:1000;background:var(--nav);backdrop-filter:blur(20px);border-bottom:1px solid var(--border);padding:0 1.5rem;height:60px;display:flex;align-items:center;justify-content:space-between;}
.nav-logo{font-size:1.1rem;font-weight:700;color:var(--accent);text-decoration:none;display:flex;align-items:center;gap:.4rem;}
.nav-links{display:flex;gap:.5rem;}
.nav-btn{padding:.45rem .9rem;border-radius:8px;border:1px solid var(--border);background:transparent;color:var(--text2);cursor:pointer;font-family:inherit;font-size:.82rem;transition:all .2s;text-decoration:none;display:flex;align-items:center;gap:.35rem;}
.nav-btn:hover,.nav-btn.active{background:var(--accent3);border-color:var(--accent);color:var(--accent);}
/* LAYOUT */
.layout{display:flex;height:calc(100vh - 60px);margin-top:60px;}
/* PANEL */
.panel{width:360px;display:flex;flex-direction:column;border-right:1px solid var(--border2);background:var(--bg2);z-index:10;flex-shrink:0;transition:transform .3s;}
@media(max-width:768px){.panel{position:fixed;top:60px;left:0;bottom:0;width:320px;transform:translateX(-100%);z-index:500;}.panel.open{transform:translateX(0);}}
.panel-header{padding:1rem;border-bottom:1px solid var(--border2);}
.panel-header h2{font-size:1rem;font-weight:700;margin-bottom:.75rem;}
.search-row{display:flex;gap:.5rem;}
.search-field{flex:1;position:relative;}
.search-field input{width:100%;padding:.6rem .85rem .6rem 2.2rem;border-radius:8px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text);font-family:inherit;font-size:.85rem;transition:border-color .2s;}
.search-field input:focus{outline:none;border-color:var(--accent);}
.search-field input::placeholder{color:var(--text3);}
.search-field .si{position:absolute;left:.65rem;top:50%;transform:translateY(-50%);color:var(--text3);font-size:.8rem;pointer-events:none;}
.filter-chips{display:flex;gap:.4rem;flex-wrap:wrap;margin-top:.6rem;}
.chip{padding:.28rem .65rem;border-radius:20px;border:1px solid var(--border2);background:transparent;color:var(--text3);font-size:.75rem;cursor:pointer;transition:all .2s;font-family:inherit;}
.chip:hover,.chip.active{border-color:var(--accent);color:var(--accent);background:var(--accent3);}
.gps-btn{padding:.6rem .8rem;border-radius:8px;border:1px solid var(--border);background:var(--accent3);color:var(--accent);cursor:pointer;font-size:.85rem;transition:all .2s;white-space:nowrap;font-family:inherit;}
.gps-btn:hover{background:var(--accent);color:#fff;}
/* ARTISAN LIST */
.artisan-list{flex:1;overflow-y:auto;padding:.75rem;}
.artisan-list::-webkit-scrollbar{width:3px;}
.artisan-list::-webkit-scrollbar-thumb{background:var(--border2);}
.results-header{font-size:.8rem;color:var(--text3);padding:.3rem .25rem .6rem;display:flex;justify-content:space-between;}
.artisan-item{display:flex;gap:.85rem;padding:.85rem;border-radius:12px;border:1px solid var(--border2);margin-bottom:.6rem;cursor:pointer;transition:all .25s;position:relative;}
.artisan-item:hover,.artisan-item.active{border-color:var(--accent);background:var(--accent3);}
.a-avatar{width:48px;height:48px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent2));display:flex;align-items:center;justify-content:center;font-weight:700;font-size:1.1rem;color:#fff;flex-shrink:0;}
.a-info{flex:1;min-width:0;}
.a-name{font-weight:700;font-size:.9rem;margin-bottom:.15rem;}
.a-spec{font-size:.78rem;color:var(--accent);margin-bottom:.2rem;}
.a-loc{font-size:.75rem;color:var(--text3);display:flex;align-items:center;gap:.25rem;}
.a-rating{font-size:.78rem;color:var(--amber);}
.a-dist{font-size:.75rem;color:var(--green);font-weight:600;}
.a-rate{font-size:.78rem;color:var(--text2);}
.avail-dot{width:8px;height:8px;border-radius:50%;background:var(--green);position:absolute;top:.85rem;right:.85rem;}
.avail-dot.busy{background:var(--red);}
/* MAP */
.map-wrap{flex:1;position:relative;}
#map{width:100%;height:100%;}
/* MAP CONTROLS */
.map-controls{position:absolute;top:1rem;right:1rem;z-index:400;display:flex;flex-direction:column;gap:.5rem;}
.map-ctrl-btn{width:38px;height:38px;border-radius:10px;background:var(--bg2);border:1px solid var(--border2);color:var(--text2);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:.9rem;transition:all .2s;}
.map-ctrl-btn:hover{border-color:var(--accent);color:var(--accent);}
/* AI SUGGESTION BANNER */
.ai-banner{position:absolute;bottom:1rem;left:50%;transform:translateX(-50%);z-index:400;background:var(--bg2);border:1px solid var(--border);border-radius:14px;padding:.85rem 1.25rem;max-width:380px;width:90%;backdrop-filter:blur(12px);}
.ai-banner-title{font-size:.82rem;font-weight:700;color:var(--accent);margin-bottom:.3rem;display:flex;align-items:center;gap:.4rem;}
.ai-banner-text{font-size:.8rem;color:var(--text2);line-height:1.5;}
.ai-banner-actions{display:flex;gap:.5rem;margin-top:.6rem;}
.ai-btn{padding:.35rem .8rem;border-radius:8px;border:1px solid var(--border);background:transparent;color:var(--text2);font-size:.78rem;cursor:pointer;font-family:inherit;transition:all .2s;}
.ai-btn.primary{background:var(--accent);border-color:var(--accent);color:#fff;}
.ai-btn:hover:not(.primary){border-color:var(--accent);color:var(--accent);}
/* MOBILE TOGGLE */
.panel-toggle{display:none;position:fixed;bottom:1.5rem;left:1.5rem;z-index:600;padding:.7rem 1.2rem;border-radius:30px;background:var(--accent);color:#fff;border:none;font-family:inherit;font-weight:700;font-size:.88rem;cursor:pointer;box-shadow:0 4px 20px rgba(6,182,212,.5);}
@media(max-width:768px){.panel-toggle{display:flex;align-items:center;gap:.4rem;}}
/* CUSTOM MARKER */
.custom-marker{background:var(--accent);border:3px solid #fff;border-radius:50% 50% 50% 0;width:32px;height:32px;transform:rotate(-45deg);display:flex;align-items:center;justify-content:center;box-shadow:0 3px 12px rgba(0,0,0,.4);}
.custom-marker span{transform:rotate(45deg);font-size:.75rem;font-weight:700;color:#fff;}
/* POPUP */
.leaflet-popup-content-wrapper{background:var(--bg2)!important;border:1px solid var(--border)!important;border-radius:12px!important;color:var(--text)!important;box-shadow:0 8px 32px rgba(0,0,0,.5)!important;}
.leaflet-popup-tip{background:var(--bg2)!important;}
.popup-content{padding:.25rem;}
.popup-name{font-weight:700;font-size:.92rem;margin-bottom:.2rem;}
.popup-spec{color:var(--accent);font-size:.8rem;}
.popup-rating{color:var(--amber);font-size:.8rem;margin:.2rem 0;}
.popup-rate{color:var(--text2);font-size:.78rem;}
.popup-btns{display:flex;gap:.4rem;margin-top:.6rem;}
.popup-btn{padding:.3rem .7rem;border-radius:7px;border:none;font-size:.75rem;cursor:pointer;font-family:inherit;font-weight:600;}
.pb-profile{background:var(--accent3);color:var(--accent);border:1px solid var(--border);}
.pb-book{background:var(--accent);color:#fff;}
</style>
</head>
<body>
<nav>
  <a href="index.php" class="nav-logo"><i class="fas fa-tools"></i> AlloHrayfi</a>
  <div class="nav-links">
    <a href="annonce.php" class="nav-btn"><i class="fas fa-list"></i> Liste</a>
    <a href="booking.php" class="nav-btn"><i class="fas fa-calendar"></i> Réserver</a>
    <a href="chat.php" class="nav-btn"><i class="fas fa-comment-dots"></i> Chat</a>
  </div>
</nav>

<div class="layout">
  <!-- PANEL -->
  <div class="panel" id="panel">
    <div class="panel-header">
      <h2><i class="fas fa-map-marker-alt" style="color:var(--accent)"></i> Artisans à proximité</h2>
      <div class="search-row">
        <div class="search-field">
          <i class="fas fa-search si"></i>
          <input type="text" id="searchInput" placeholder="Métier ou nom..." oninput="filterArtisans()">
        </div>
        <button class="gps-btn" onclick="locateMe()" id="gpsBtn"><i class="fas fa-crosshairs"></i> GPS</button>
      </div>
      <div class="filter-chips" id="filterChips">
        <button class="chip active" data-spec="" onclick="setSpec('',this)">Tous</button>
        <button class="chip" data-spec="Plombier" onclick="setSpec('Plombier',this)">🔧 Plombier</button>
        <button class="chip" data-spec="Électricien" onclick="setSpec('Électricien',this)">⚡ Électricien</button>
        <button class="chip" data-spec="Menuisier" onclick="setSpec('Menuisier',this)">🪵 Menuisier</button>
        <button class="chip" data-spec="Peintre" onclick="setSpec('Peintre',this)">🎨 Peintre</button>
      </div>
    </div>
    <div class="artisan-list">
      <div class="results-header"><span id="resultsCount">12 artisans trouvés</span><span id="radiusLabel">Dans 5 km</span></div>
      <div id="artisanItems"></div>
    </div>
  </div>

  <!-- MAP -->
  <div class="map-wrap">
    <div id="map"></div>
    <!-- MAP CONTROLS -->
    <div class="map-controls">
      <button class="map-ctrl-btn" title="Zoom in" onclick="map.zoomIn()"><i class="fas fa-plus"></i></button>
      <button class="map-ctrl-btn" title="Zoom out" onclick="map.zoomOut()"><i class="fas fa-minus"></i></button>
      <button class="map-ctrl-btn" title="Ma position" onclick="locateMe()"><i class="fas fa-crosshairs"></i></button>
      <button class="map-ctrl-btn" title="Vue satellite" onclick="toggleLayer()"><i class="fas fa-satellite"></i></button>
    </div>
    <!-- AI SUGGESTION -->
    <div class="ai-banner" id="aiBanner">
      <div class="ai-banner-title"><i class="fas fa-robot"></i> Suggestion IA AlloHrayfi</div>
      <div class="ai-banner-text" id="aiText">Ahmed Benhaddou est le plombier le mieux noté à <strong>1.2 km</strong> de vous — disponible demain matin. Estimation: <strong>200 DH</strong>.</div>
      <div class="ai-banner-actions">
        <button class="ai-btn primary" onclick="window.location='booking.php'"><i class="fas fa-calendar-check"></i> Réserver</button>
        <button class="ai-btn" onclick="window.location='artisan-profile.php'">Voir profil</button>
        <button class="ai-btn" onclick="document.getElementById('aiBanner').style.display='none'">✕</button>
      </div>
    </div>
  </div>
</div>

<button class="panel-toggle" id="panelToggle" onclick="document.getElementById('panel').classList.toggle('open')">
  <i class="fas fa-list"></i> Artisans
</button>

<script>
// ===== DATA =====
const ARTISANS = [
  {id:1,name:'Ahmed Benhaddou',spec:'Plombier',initial:'A',lat:33.5898,lng:-7.6325,rating:4.8,reviews:127,rate:250,available:true,dist:1.2},
  {id:2,name:'Khalid Mansouri',spec:'Électricien',initial:'K',lat:33.5950,lng:-7.6180,rating:4.6,reviews:89,rate:200,available:true,dist:2.1},
  {id:3,name:'Youssef Alami',spec:'Menuisier',initial:'Y',lat:33.5820,lng:-7.6400,rating:4.9,reviews:214,rate:300,available:false,dist:3.4},
  {id:4,name:'Hassan Tazi',spec:'Peintre',initial:'H',lat:33.5870,lng:-7.6500,rating:4.3,reviews:56,rate:150,available:true,dist:4.1},
  {id:5,name:'Omar Chraibi',spec:'Plombier',initial:'O',lat:33.6010,lng:-7.6290,rating:4.7,reviews:98,rate:220,available:true,dist:2.8},
  {id:6,name:'Rachid Fassi',spec:'Maçon',initial:'R',lat:33.5780,lng:-7.6200,rating:4.5,reviews:73,rate:180,available:false,dist:5.2},
  {id:7,name:'Mustapha Idrissi',spec:'Serrurier',initial:'M',lat:33.5930,lng:-7.6450,rating:4.4,reviews:41,rate:160,available:true,dist:3.9},
  {id:8,name:'Nabil Zerhouni',spec:'Électricien',initial:'N',lat:33.5850,lng:-7.6100,rating:4.9,reviews:183,rate:230,available:true,dist:1.8},
];

let selectedSpec = '';
let activeId = null;
let satelliteMode = false;

// ===== MAP =====
const map = L.map('map', {zoomControl:false}).setView([33.5898, -7.6325], 14);
const streetLayer = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {attribution:'&copy; OpenStreetMap &copy; CARTO',maxZoom:19});
const satLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',{attribution:'Tiles &copy; Esri',maxZoom:18});
streetLayer.addTo(map);

function toggleLayer(){
  satelliteMode=!satelliteMode;
  if(satelliteMode){map.removeLayer(streetLayer);satLayer.addTo(map);}
  else{map.removeLayer(satLayer);streetLayer.addTo(map);}
}

// User location marker
let userMarker = null;
const userIcon = L.divIcon({html:`<div style="width:16px;height:16px;border-radius:50%;background:#06b6d4;border:3px solid #fff;box-shadow:0 0 0 4px rgba(6,182,212,.3);"></div>`,className:'',iconSize:[16,16],iconAnchor:[8,8]});

function locateMe(){
  const btn = document.getElementById('gpsBtn');
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
  btn.disabled = true;
  navigator.geolocation ? navigator.geolocation.getCurrentPosition(
    pos => {
      const {latitude:lat, longitude:lng} = pos.coords;
      if(userMarker) map.removeLayer(userMarker);
      userMarker = L.marker([lat,lng],{icon:userIcon}).addTo(map).bindPopup('<b style="color:#e8f4fd">Votre position</b>');
      map.flyTo([lat,lng],15,{duration:1.5});
      updateAISuggestion(lat,lng);
      btn.innerHTML='<i class="fas fa-crosshairs"></i> GPS';btn.disabled=false;
    },
    ()=>{
      map.flyTo([33.5898,-7.6325],14);
      btn.innerHTML='<i class="fas fa-crosshairs"></i> GPS';btn.disabled=false;
    }
  ) : (btn.innerHTML='<i class="fas fa-crosshairs"></i> GPS',btn.disabled=false);
}

function updateAISuggestion(lat,lng){
  const sorted=[...ARTISANS].filter(a=>a.available).sort((a,b)=>a.dist-b.dist);
  if(sorted.length){
    const best=sorted[0];
    document.getElementById('aiText').innerHTML=`<strong>${best.name}</strong> est le ${best.spec.toLowerCase()} le mieux noté à <strong>${best.dist} km</strong> de vous — disponible demain matin. Estimation: <strong>${best.rate} DH</strong>.`;
  }
}

// Artisan markers
const markers = {};
const artisanIcon = (initial, available) => L.divIcon({
  html:`<div style="background:${available?'#06b6d4':'#64748b'};border:3px solid #fff;border-radius:50% 50% 50% 0;width:36px;height:36px;transform:rotate(-45deg);display:flex;align-items:center;justify-content:center;box-shadow:0 3px 14px rgba(0,0,0,.5);"><span style="transform:rotate(45deg);font-size:.8rem;font-weight:700;color:#fff;">${initial}</span></div>`,
  className:'',iconSize:[36,36],iconAnchor:[18,36],popupAnchor:[0,-36]
});

ARTISANS.forEach(a => {
  const marker = L.marker([a.lat,a.lng],{icon:artisanIcon(a.initial,a.available)}).addTo(map);
  marker.bindPopup(`<div class="popup-content">
    <div class="popup-name">${a.name}</div>
    <div class="popup-spec">${a.spec}</div>
    <div class="popup-rating">${'★'.repeat(Math.floor(a.rating))} ${a.rating} (${a.reviews})</div>
    <div class="popup-rate">${a.rate} DH/h · ${a.dist} km</div>
    <div style="color:${a.available?'#10b981':'#ef4444'};font-size:.75rem;margin:.2rem 0;">${a.available?'✓ Disponible':'✗ Occupé'}</div>
    <div class="popup-btns">
      <button class="popup-btn pb-profile" onclick="window.location='artisan-profile.php?id=${a.id}'">Profil</button>
      <button class="popup-btn pb-book" onclick="window.location='booking.php?artisan=${a.id}'"${!a.available?' disabled style="opacity:.5;cursor:not-allowed"':''}>Réserver</button>
    </div>
  </div>`,{maxWidth:220});
  marker.on('click',()=>highlightCard(a.id));
  markers[a.id]=marker;
});

function highlightCard(id){
  activeId=id;
  document.querySelectorAll('.artisan-item').forEach(el=>el.classList.remove('active'));
  const el=document.getElementById('card-'+id);
  if(el){el.classList.add('active');el.scrollIntoView({behavior:'smooth',block:'nearest'});}
}

// ===== LIST =====
function setSpec(spec,btn){
  selectedSpec=spec;
  document.querySelectorAll('.chip').forEach(c=>c.classList.remove('active'));
  btn.classList.add('active');
  renderList();
}

function filterArtisans(){renderList();}

function renderList(){
  const q=document.getElementById('searchInput').value.toLowerCase();
  const filtered=ARTISANS.filter(a=>{
    if(selectedSpec && a.spec!==selectedSpec) return false;
    if(q && !a.name.toLowerCase().includes(q) && !a.spec.toLowerCase().includes(q)) return false;
    return true;
  }).sort((a,b)=>a.dist-b.dist);

  document.getElementById('resultsCount').textContent=filtered.length+' artisan'+(filtered.length!==1?'s':'')+' trouvé'+(filtered.length!==1?'s':'');
  document.getElementById('artisanItems').innerHTML=filtered.map(a=>`
    <div class="artisan-item${a.id===activeId?' active':''}" id="card-${a.id}" onclick="selectArtisan(${a.id})">
      <div class="a-avatar">${a.initial}</div>
      <div class="a-info">
        <div class="a-name">${a.name}</div>
        <div class="a-spec">${a.spec}</div>
        <div style="display:flex;gap:.5rem;align-items:center;margin-top:.2rem;">
          <span class="a-rating">${'★'.repeat(Math.floor(a.rating))} ${a.rating}</span>
          <span class="a-dist"><i class="fas fa-location-dot"></i> ${a.dist} km</span>
          <span class="a-rate">${a.rate} DH/h</span>
        </div>
      </div>
      <div class="avail-dot${a.available?'':' busy'}"></div>
    </div>`).join('');
}

function selectArtisan(id){
  activeId=id;
  const a=ARTISANS.find(x=>x.id===id);
  if(!a) return;
  renderList();
  map.flyTo([a.lat,a.lng],16,{duration:1});
  markers[id].openPopup();
}

renderList();
</script>
</body>
</html>
