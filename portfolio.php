<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Portfolio | AlloHrayfi</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
:root{
  --bg:#071124;--bg2:#0b1a2e;--text:#e8f4fd;--text2:rgba(232,244,253,0.7);--text3:rgba(232,244,253,0.45);
  --accent:#06b6d4;--accent2:#0891b2;--accent3:rgba(6,182,212,0.12);
  --green:#10b981;--amber:#f59e0b;--red:#ef4444;
  --border:rgba(6,182,212,0.15);--border2:rgba(255,255,255,0.06);
  --card:rgba(255,255,255,0.03);--nav:rgba(7,17,36,0.97);
}
body{font-family:'Tajawal',sans-serif;background:var(--bg);color:var(--text);min-height:100vh;}
nav{position:fixed;top:0;left:0;right:0;z-index:100;background:var(--nav);backdrop-filter:blur(20px);border-bottom:1px solid var(--border);padding:0 1.5rem;height:60px;display:flex;align-items:center;justify-content:space-between;}
.nav-logo{font-size:1.1rem;font-weight:700;color:var(--accent);text-decoration:none;display:flex;align-items:center;gap:.4rem;}
.nav-links{display:flex;gap:.5rem;}
.nav-btn{padding:.45rem .9rem;border-radius:8px;border:1px solid var(--border2);background:transparent;color:var(--text2);cursor:pointer;font-family:inherit;font-size:.82rem;transition:all .2s;text-decoration:none;display:flex;align-items:center;gap:.35rem;}
.nav-btn:hover{background:var(--accent3);border-color:var(--accent);color:var(--accent);}
.page{max-width:1100px;margin:0 auto;padding:80px 1.5rem 3rem;}
/* HEADER */
.page-header{display:flex;align-items:center;gap:1.25rem;margin-bottom:2rem;flex-wrap:wrap;}
.artisan-mini{display:flex;align-items:center;gap:.85rem;}
.mini-avatar{width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent2));display:flex;align-items:center;justify-content:center;font-size:1.3rem;font-weight:700;color:#fff;}
.mini-name{font-size:1.2rem;font-weight:800;}
.mini-spec{font-size:.85rem;color:var(--accent);}
.verified-badge{background:rgba(16,185,129,.1);color:var(--green);border:1px solid rgba(16,185,129,.25);padding:.25rem .7rem;border-radius:20px;font-size:.78rem;font-weight:600;display:flex;align-items:center;gap:.3rem;}
/* FILTER TABS */
.filter-row{display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:1.75rem;align-items:center;}
.filter-tab{padding:.45rem 1rem;border-radius:20px;border:1px solid var(--border2);background:transparent;color:var(--text2);font-family:inherit;font-size:.85rem;cursor:pointer;transition:all .2s;}
.filter-tab:hover,.filter-tab.active{border-color:var(--accent);background:var(--accent3);color:var(--accent);}
.filter-tab.active{font-weight:700;}
.sort-select{margin-left:auto;padding:.45rem .9rem;border-radius:8px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text2);font-family:inherit;font-size:.82rem;cursor:pointer;}
.sort-select option{background:var(--bg2);}
/* STATS BAR */
.stats-bar{display:flex;gap:1.5rem;flex-wrap:wrap;margin-bottom:1.75rem;}
.stat-pill{display:flex;align-items:center;gap:.5rem;font-size:.85rem;color:var(--text2);}
.stat-pill i{color:var(--accent);}
.stat-pill strong{color:var(--text);}
/* PORTFOLIO GRID */
.portfolio-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:1.25rem;}
/* PROJECT CARD */
.project-card{background:var(--card);border:1px solid var(--border2);border-radius:16px;overflow:hidden;transition:all .35s;cursor:pointer;}
.project-card:hover{transform:translateY(-4px);border-color:var(--accent);box-shadow:0 12px 40px rgba(0,0,0,.4),0 0 40px rgba(6,182,212,.08);}
/* BEFORE/AFTER SLIDER */
.ba-container{position:relative;height:220px;overflow:hidden;user-select:none;}
.ba-after{width:100%;height:100%;object-fit:cover;display:block;}
.ba-before-wrap{position:absolute;top:0;left:0;height:100%;overflow:hidden;transition:width 0s;}
.ba-before{width:100%;height:100%;object-fit:cover;display:block;min-width:320px;}
.ba-slider{position:absolute;top:0;bottom:0;width:3px;background:#fff;cursor:ew-resize;z-index:10;transition:none;}
.ba-slider::before{content:'';position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:36px;height:36px;border-radius:50%;background:#fff;box-shadow:0 2px 10px rgba(0,0,0,.5);display:flex;align-items:center;justify-content:center;}
.ba-slider::after{content:'◀ ▶';position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);font-size:.6rem;color:#333;white-space:nowrap;pointer-events:none;margin-top:1px;}
.ba-label{position:absolute;top:.6rem;padding:.2rem .65rem;border-radius:20px;font-size:.72rem;font-weight:700;pointer-events:none;z-index:5;}
.label-before{left:.6rem;background:rgba(239,68,68,.85);color:#fff;}
.label-after{right:.6rem;background:rgba(16,185,129,.85);color:#fff;}
/* CARD BODY */
.card-body{padding:1rem;}
.card-title{font-weight:700;font-size:.95rem;margin-bottom:.4rem;}
.card-meta{display:flex;align-items:center;gap:.75rem;flex-wrap:wrap;margin-bottom:.6rem;}
.card-tag{background:var(--accent3);color:var(--accent);padding:.18rem .55rem;border-radius:8px;font-size:.72rem;font-weight:600;}
.card-date{font-size:.75rem;color:var(--text3);}
.card-desc{font-size:.82rem;color:var(--text2);line-height:1.5;margin-bottom:.75rem;}
.card-footer{display:flex;align-items:center;justify-content:space-between;}
.card-rating{color:var(--amber);font-size:.82rem;}
.card-likes{font-size:.78rem;color:var(--text3);display:flex;align-items:center;gap:.3rem;cursor:pointer;transition:color .2s;}
.card-likes:hover{color:var(--red);}
.card-likes.liked{color:var(--red);}
/* LIGHTBOX */
.lightbox{display:none;position:fixed;inset:0;background:rgba(0,0,0,.9);z-index:2000;align-items:center;justify-content:center;flex-direction:column;padding:1.5rem;}
.lightbox.open{display:flex;}
.lb-close{position:absolute;top:1rem;right:1rem;background:rgba(255,255,255,.1);border:none;color:#fff;width:42px;height:42px;border-radius:50%;font-size:1.1rem;cursor:pointer;display:flex;align-items:center;justify-content:center;}
.lb-container{position:relative;width:100%;max-width:800px;height:0;padding-bottom:56%;border-radius:16px;overflow:hidden;}
.lb-ba-after{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;}
.lb-ba-before-wrap{position:absolute;top:0;left:0;height:100%;overflow:hidden;}
.lb-ba-before{position:absolute;top:0;left:0;height:100%;object-fit:cover;min-width:800px;}
.lb-slider{position:absolute;top:0;bottom:0;width:4px;background:#fff;cursor:ew-resize;z-index:10;}
.lb-slider::before{content:'';position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:44px;height:44px;border-radius:50%;background:#fff;box-shadow:0 3px 14px rgba(0,0,0,.6);}
.lb-slider::after{content:'◀ ▶';position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);font-size:.72rem;color:#333;white-space:nowrap;}
.lb-info{margin-top:1rem;text-align:center;}
.lb-info h3{font-size:1.1rem;font-weight:700;margin-bottom:.25rem;}
.lb-info p{color:var(--text2);font-size:.88rem;}
.lb-nav{display:flex;gap:.75rem;margin-top:.85rem;}
.lb-nav-btn{padding:.45rem 1.1rem;border-radius:8px;border:1px solid var(--border2);background:transparent;color:var(--text2);cursor:pointer;font-family:inherit;font-size:.85rem;transition:all .2s;}
.lb-nav-btn:hover{border-color:var(--accent);color:var(--accent);}
/* VERIFICATION BANNER */
.verification-banner{background:linear-gradient(135deg,rgba(16,185,129,.08),rgba(5,150,105,.04));border:1px solid rgba(16,185,129,.2);border-radius:14px;padding:1.25rem 1.5rem;margin-bottom:1.75rem;display:flex;align-items:center;gap:1rem;flex-wrap:wrap;}
.vb-icon{font-size:2rem;}
.vb-text{flex:1;}
.vb-text h3{font-size:.95rem;font-weight:700;margin-bottom:.2rem;color:var(--green);}
.vb-text p{font-size:.82rem;color:var(--text2);}
@media(max-width:600px){.portfolio-grid{grid-template-columns:1fr;}.page{padding:74px 1rem 2rem;}}
</style>
</head>
<body>
<nav>
  <a href="index.php" class="nav-logo"><i class="fas fa-tools"></i> AlloHrayfi</a>
  <div class="nav-links">
    <a href="artisan-profile.php" class="nav-btn"><i class="fas fa-arrow-left"></i> Profil</a>
    <a href="map.php" class="nav-btn"><i class="fas fa-map-marker-alt"></i> Carte</a>
    <a href="booking.php" class="nav-btn"><i class="fas fa-calendar-check"></i> Réserver</a>
  </div>
</nav>

<div class="page">
  <!-- HEADER -->
  <div class="page-header">
    <div class="artisan-mini">
      <div class="mini-avatar">A</div>
      <div>
        <div class="mini-name">Ahmed Benhaddou</div>
        <div class="mini-spec"><i class="fas fa-tools"></i> Plombier · Casablanca</div>
      </div>
    </div>
    <div class="verified-badge"><i class="fas fa-certificate"></i> Portfolio vérifié</div>
  </div>

  <!-- VERIFICATION BANNER -->
  <div class="verification-banner">
    <div class="vb-icon">🏆</div>
    <div class="vb-text">
      <h3>Portfolio vérifié par AlloHrayfi</h3>
      <p>Toutes les photos ont été vérifiées par notre équipe. Les résultats "Avant/Après" sont authentiques et correspondent à des travaux réels effectués par cet artisan.</p>
    </div>
  </div>

  <!-- STATS -->
  <div class="stats-bar">
    <div class="stat-pill"><i class="fas fa-images"></i><span><strong>8</strong> projets</span></div>
    <div class="stat-pill"><i class="fas fa-star"></i><span>Note moy. <strong>4.8 ⭐</strong></span></div>
    <div class="stat-pill"><i class="fas fa-heart"></i><span><strong>94</strong> likes</span></div>
    <div class="stat-pill"><i class="fas fa-eye"></i><span><strong>1,240</strong> vues</span></div>
  </div>

  <!-- FILTER ROW -->
  <div class="filter-row">
    <button class="filter-tab active" data-cat="" onclick="filterCat('',this)">Tous</button>
    <button class="filter-tab" data-cat="Plomberie" onclick="filterCat('Plomberie',this)">Plomberie</button>
    <button class="filter-tab" data-cat="Salle de bain" onclick="filterCat('Salle de bain',this)">Salle de bain</button>
    <button class="filter-tab" data-cat="Urgence" onclick="filterCat('Urgence',this)">Urgence</button>
    <select class="sort-select" onchange="sortProjects(this.value)">
      <option value="recent">Plus récents</option>
      <option value="likes">Plus aimés</option>
      <option value="rating">Mieux notés</option>
    </select>
  </div>

  <!-- GRID -->
  <div class="portfolio-grid" id="portfolioGrid"></div>
</div>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
  <button class="lb-close" onclick="closeLightbox()"><i class="fas fa-times"></i></button>
  <div class="lb-container" id="lbContainer">
    <img class="lb-ba-after" id="lbAfter" src="" alt="Après">
    <div class="lb-ba-before-wrap" id="lbBeforeWrap" style="width:50%">
      <img class="lb-ba-before" id="lbBefore" src="" alt="Avant">
    </div>
    <div class="lb-slider" id="lbSlider" style="left:50%"></div>
    <div class="ba-label label-before">AVANT</div>
    <div class="ba-label label-after">APRÈS</div>
  </div>
  <div class="lb-info">
    <h3 id="lbTitle"></h3>
    <p id="lbDesc"></p>
  </div>
  <div class="lb-nav">
    <button class="lb-nav-btn" onclick="navLightbox(-1)"><i class="fas fa-chevron-left"></i> Précédent</button>
    <button class="lb-nav-btn" onclick="closeLightbox()"><i class="fas fa-times"></i> Fermer</button>
    <button class="lb-nav-btn" onclick="navLightbox(1)">Suivant <i class="fas fa-chevron-right"></i></button>
  </div>
</div>

<script>
const PROJECTS = [
  {id:1,title:'Rénovation salle de bain complète',cat:'Salle de bain',date:'Jan 2024',desc:'Remplacement complet de la robinetterie, pose d\'une douche à l\'italienne et installation d\'un nouveau lavabo.',rating:5,likes:24,
   before:'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=600&q=70',
   after:'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=600&q=90'},
  {id:2,title:'Réparation fuite urgence',cat:'Urgence',date:'Déc 2023',desc:'Fuite sous évier cuisine — joint du siphon remplacé et étanchéité refaite en 45 minutes.',rating:5,likes:18,
   before:'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=70',
   after:'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&q=90'},
  {id:3,title:'Installation chauffe-eau solaire',cat:'Plomberie',date:'Nov 2023',desc:'Pose et raccordement d\'un chauffe-eau solaire 200L avec installation du ballon de stockage.',rating:5,likes:31,
   before:'https://images.unsplash.com/photo-1558618047-3c8e0b14e2a2?w=600&q=70',
   after:'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&q=90'},
  {id:4,title:'Débouchage canalisation',cat:'Plomberie',date:'Oct 2023',desc:'Débouchage complet d\'une colonne principale bouchée avec inspection caméra et nettoyage haute pression.',rating:4,likes:12,
   before:'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?w=600&q=70',
   after:'https://images.unsplash.com/photo-1585771724684-38269d6639fd?w=600&q=90'},
  {id:5,title:'Pose robinetterie cuisine',cat:'Plomberie',date:'Sep 2023',desc:'Remplacement robinet mitigeur cuisine, installation douchette et flexible inox.',rating:5,likes:9,
   before:'https://images.unsplash.com/photo-1484154218962-a197022b5858?w=600&q=70',
   after:'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&q=90'},
  {id:6,title:'Rénovation WC',cat:'Salle de bain',date:'Août 2023',desc:'Remplacement WC complet, pose abattant, raccordement alimentation et évacuation.',rating:5,likes:15,
   before:'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=600&q=70',
   after:'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=600&q=90'},
];

let activeCat = '';
let likedIds = new Set();
let lbIndex = 0;
let filteredProjects = [...PROJECTS];

function filterCat(cat, btn) {
  activeCat = cat;
  document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
  btn.classList.add('active');
  renderGrid();
}

function sortProjects(val) {
  if (val === 'likes') filteredProjects.sort((a,b) => b.likes - a.likes);
  else if (val === 'rating') filteredProjects.sort((a,b) => b.rating - a.rating);
  else filteredProjects.sort((a,b) => b.id - a.id);
  renderGrid();
}

function renderGrid() {
  filteredProjects = PROJECTS.filter(p => !activeCat || p.cat === activeCat);
  const grid = document.getElementById('portfolioGrid');
  grid.innerHTML = filteredProjects.map((p, i) => `
    <div class="project-card">
      <div class="ba-container" id="ba-${p.id}">
        <img class="ba-after" src="${p.after}" alt="Après" loading="lazy">
        <div class="ba-before-wrap" id="bw-${p.id}" style="width:50%">
          <img class="ba-before" src="${p.before}" alt="Avant">
        </div>
        <div class="ba-slider" id="bs-${p.id}" style="left:50%"></div>
        <div class="ba-label label-before">AVANT</div>
        <div class="ba-label label-after">APRÈS</div>
      </div>
      <div class="card-body">
        <div class="card-title">${p.title}</div>
        <div class="card-meta">
          <span class="card-tag">${p.cat}</span>
          <span class="card-date"><i class="fas fa-calendar"></i> ${p.date}</span>
        </div>
        <div class="card-desc">${p.desc}</div>
        <div class="card-footer">
          <span class="card-rating">${'★'.repeat(p.rating)}${'☆'.repeat(5-p.rating)} ${p.rating}.0</span>
          <div style="display:flex;gap:.75rem;align-items:center;">
            <span class="card-likes${likedIds.has(p.id)?' liked':''}" id="likes-${p.id}" onclick="toggleLike(${p.id})">
              <i class="fas fa-heart"></i> <span id="lcount-${p.id}">${p.likes + (likedIds.has(p.id)?1:0)}</span>
            </span>
            <button style="background:transparent;border:1px solid var(--border2);color:var(--text2);padding:.25rem .65rem;border-radius:7px;font-size:.75rem;cursor:pointer;font-family:inherit;" onclick="openLightbox(${i})">
              <i class="fas fa-expand"></i> Agrandir
            </button>
          </div>
        </div>
      </div>
    </div>`).join('');

  // Init sliders
  filteredProjects.forEach(p => initSlider(`ba-${p.id}`, `bw-${p.id}`, `bs-${p.id}`));
}

function initSlider(containerId, wrapId, sliderId) {
  const container = document.getElementById(containerId);
  const wrap = document.getElementById(wrapId);
  const slider = document.getElementById(sliderId);
  if (!container || !wrap || !slider) return;
  let dragging = false;

  function setPos(x) {
    const rect = container.getBoundingClientRect();
    const pct = Math.max(0, Math.min(100, ((x - rect.left) / rect.width) * 100));
    wrap.style.width = pct + '%';
    slider.style.left = pct + '%';
  }

  slider.addEventListener('mousedown', e => { dragging = true; e.preventDefault(); });
  container.addEventListener('mousemove', e => { if (dragging) setPos(e.clientX); });
  window.addEventListener('mouseup', () => { dragging = false; });

  slider.addEventListener('touchstart', e => { dragging = true; e.preventDefault(); }, {passive:false});
  container.addEventListener('touchmove', e => { if (dragging) setPos(e.touches[0].clientX); e.preventDefault(); }, {passive:false});
  window.addEventListener('touchend', () => { dragging = false; });
}

function toggleLike(id) {
  const p = PROJECTS.find(x => x.id === id);
  if (likedIds.has(id)) { likedIds.delete(id); }
  else { likedIds.add(id); }
  renderGrid();
}

// LIGHTBOX
function openLightbox(idx) {
  lbIndex = idx;
  const p = filteredProjects[idx];
  document.getElementById('lbAfter').src = p.after;
  document.getElementById('lbBefore').src = p.before;
  document.getElementById('lbTitle').textContent = p.title;
  document.getElementById('lbDesc').textContent = p.desc;
  document.getElementById('lbBeforeWrap').style.width = '50%';
  document.getElementById('lbSlider').style.left = '50%';
  document.getElementById('lightbox').classList.add('open');
  initLbSlider();
}

function initLbSlider() {
  const container = document.getElementById('lbContainer');
  const wrap = document.getElementById('lbBeforeWrap');
  const slider = document.getElementById('lbSlider');
  let dragging = false;

  function setPos(x) {
    const rect = container.getBoundingClientRect();
    const pct = Math.max(0, Math.min(100, ((x - rect.left) / rect.width) * 100));
    wrap.style.width = pct + '%';
    slider.style.left = pct + '%';
  }

  const newSlider = slider.cloneNode(true);
  slider.parentNode.replaceChild(newSlider, slider);

  newSlider.addEventListener('mousedown', e => { dragging = true; e.preventDefault(); });
  container.addEventListener('mousemove', e => { if (dragging) setPos(e.clientX); });
  window.addEventListener('mouseup', () => { dragging = false; });
  newSlider.addEventListener('touchstart', e => { dragging = true; e.preventDefault(); }, {passive:false});
  container.addEventListener('touchmove', e => { if (dragging) setPos(e.touches[0].clientX); e.preventDefault(); }, {passive:false});
  window.addEventListener('touchend', () => { dragging = false; });
}

function closeLightbox() { document.getElementById('lightbox').classList.remove('open'); }
function navLightbox(dir) {
  lbIndex = (lbIndex + dir + filteredProjects.length) % filteredProjects.length;
  openLightbox(lbIndex);
}

document.getElementById('lightbox').addEventListener('click', e => {
  if (e.target === document.getElementById('lightbox')) closeLightbox();
});

renderGrid();
</script>
</body>
</html>
