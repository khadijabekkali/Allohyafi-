<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Demande de Devis | AlloHrayfi</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
:root{
  --bg:#071124;--bg2:#0b1a2e;--text:#e8f4fd;--text2:rgba(232,244,253,0.7);--text3:rgba(232,244,253,0.45);
  --accent:#06b6d4;--accent2:#0891b2;--accent3:rgba(6,182,212,0.12);
  --green:#10b981;--amber:#f59e0b;--red:#ef4444;--purple:#8b5cf6;
  --border:rgba(6,182,212,0.15);--border2:rgba(255,255,255,0.06);
  --card:rgba(255,255,255,0.03);--nav:rgba(7,17,36,0.97);
}
body{font-family:'Tajawal',sans-serif;background:var(--bg);color:var(--text);min-height:100vh;}
nav{position:fixed;top:0;left:0;right:0;z-index:100;background:var(--nav);backdrop-filter:blur(20px);border-bottom:1px solid var(--border);padding:0 1.5rem;height:60px;display:flex;align-items:center;justify-content:space-between;}
.nav-logo{font-size:1.1rem;font-weight:700;color:var(--accent);text-decoration:none;display:flex;align-items:center;gap:.4rem;}
.nav-links{display:flex;gap:.5rem;}
.nav-btn{padding:.45rem .9rem;border-radius:8px;border:1px solid var(--border2);background:transparent;color:var(--text2);cursor:pointer;font-family:inherit;font-size:.82rem;transition:all .2s;text-decoration:none;display:flex;align-items:center;gap:.35rem;}
.nav-btn:hover{background:var(--accent3);border-color:var(--accent);color:var(--accent);}
.page{max-width:1000px;margin:0 auto;padding:80px 1.5rem 3rem;}
.page-title{font-size:1.7rem;font-weight:800;margin-bottom:.4rem;}
.page-sub{color:var(--text2);margin-bottom:2rem;font-size:.92rem;}
/* TABS */
.view-tabs{display:flex;border-bottom:1px solid var(--border2);margin-bottom:1.5rem;}
.view-tab{padding:.75rem 1.25rem;background:transparent;border:none;color:var(--text2);font-family:inherit;font-size:.9rem;font-weight:500;cursor:pointer;border-bottom:3px solid transparent;transition:all .25s;}
.view-tab.active{color:var(--accent);border-bottom-color:var(--accent);}
.view-tab:hover:not(.active){color:var(--text);}
.view-section{display:none;}
.view-section.active{display:block;}
/* REQUEST FORM */
.form-card{background:var(--card);border:1px solid var(--border2);border-radius:16px;padding:1.5rem;margin-bottom:1.25rem;}
.form-card-title{font-size:1rem;font-weight:700;margin-bottom:1.25rem;display:flex;align-items:center;gap:.5rem;}
.form-card-title i{color:var(--accent);}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem;}
@media(max-width:640px){.form-row{grid-template-columns:1fr;}}
.form-group{margin-bottom:1rem;}
.form-label{display:block;font-size:.78rem;font-weight:700;color:var(--text3);text-transform:uppercase;letter-spacing:.05em;margin-bottom:.4rem;}
.form-input{width:100%;padding:.75rem 1rem;border-radius:10px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text);font-family:inherit;font-size:.9rem;transition:all .25s;}
.form-input:focus{outline:none;border-color:var(--accent);box-shadow:0 0 0 3px rgba(6,182,212,.1);}
.form-input::placeholder{color:var(--text3);}
.form-input option{background:var(--bg2);}
textarea.form-input{resize:vertical;min-height:90px;}
/* PHOTO UPLOAD */
.photo-upload{border:2px dashed var(--border2);border-radius:12px;padding:1.5rem;text-align:center;cursor:pointer;transition:all .25s;}
.photo-upload:hover{border-color:var(--accent);background:var(--accent3);}
.photo-upload i{font-size:2rem;color:var(--text3);margin-bottom:.5rem;display:block;}
.photo-upload p{font-size:.85rem;color:var(--text2);}
.photo-upload small{font-size:.75rem;color:var(--text3);}
.photo-previews{display:flex;gap:.5rem;flex-wrap:wrap;margin-top:.75rem;}
.photo-preview{width:72px;height:72px;border-radius:8px;overflow:hidden;border:1px solid var(--border2);position:relative;}
.photo-preview img{width:100%;height:100%;object-fit:cover;}
.photo-preview .del{position:absolute;top:2px;right:2px;background:rgba(0,0,0,.7);color:#fff;border:none;border-radius:50%;width:18px;height:18px;font-size:.6rem;cursor:pointer;display:flex;align-items:center;justify-content:center;}
/* URGENCY */
.urgency-row{display:grid;grid-template-columns:repeat(3,1fr);gap:.6rem;}
.urg-opt{border:1px solid var(--border2);border-radius:10px;padding:.75rem .5rem;text-align:center;cursor:pointer;transition:all .25s;background:transparent;}
.urg-opt i{display:block;font-size:1.1rem;margin-bottom:.3rem;}
.urg-opt span{font-size:.78rem;}
.urg-opt small{display:block;font-size:.7rem;color:var(--text3);}
.urg-opt.active.low{border-color:var(--green);background:rgba(16,185,129,.08);color:var(--green);}
.urg-opt.active.medium{border-color:var(--amber);background:rgba(245,158,11,.08);color:var(--amber);}
.urg-opt.active.high{border-color:var(--red);background:rgba(239,68,68,.08);color:var(--red);}
.urg-opt:hover{border-color:var(--accent);}
/* ARTISAN SELECTOR */
.artisan-options{display:flex;flex-direction:column;gap:.6rem;}
.artisan-opt{display:flex;align-items:center;gap:.85rem;padding:.85rem 1rem;border-radius:12px;border:1px solid var(--border2);cursor:pointer;transition:all .25s;}
.artisan-opt:hover,.artisan-opt.selected{border-color:var(--accent);background:var(--accent3);}
.artisan-opt input{accent-color:var(--accent);}
.ao-avatar{width:42px;height:42px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent2));display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;flex-shrink:0;}
.ao-info{flex:1;}
.ao-name{font-weight:700;font-size:.9rem;}
.ao-spec{font-size:.78rem;color:var(--text2);}
.ao-rate{font-size:.78rem;color:var(--accent);font-weight:600;}
.ao-rating{font-size:.75rem;color:var(--amber);}
/* SUBMIT */
.submit-btn{width:100%;padding:1rem;border:none;border-radius:12px;background:linear-gradient(135deg,var(--accent),var(--accent2));color:#fff;font-size:1rem;font-weight:700;cursor:pointer;font-family:inherit;transition:all .3s;display:flex;align-items:center;justify-content:center;gap:.5rem;}
.submit-btn:hover{transform:translateY(-2px);box-shadow:0 8px 30px rgba(6,182,212,.4);}
/* RECEIVED DEVIS TABLE */
.devis-list{display:flex;flex-direction:column;gap:1rem;}
.devis-card{background:var(--card);border:1px solid var(--border2);border-radius:16px;overflow:hidden;transition:border-color .25s;}
.devis-card:hover{border-color:var(--border);}
.devis-header{padding:1rem 1.25rem;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--border2);flex-wrap:wrap;gap:.5rem;}
.devis-artisan{display:flex;align-items:center;gap:.75rem;}
.da-avatar{width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent2));display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;}
.da-name{font-weight:700;font-size:.9rem;}
.da-spec{font-size:.75rem;color:var(--text3);}
.devis-status{padding:.25rem .75rem;border-radius:20px;font-size:.75rem;font-weight:700;}
.st-new{background:rgba(6,182,212,.1);color:var(--accent);border:1px solid rgba(6,182,212,.2);}
.st-seen{background:rgba(245,158,11,.1);color:var(--amber);border:1px solid rgba(245,158,11,.2);}
.st-accepted{background:rgba(16,185,129,.1);color:var(--green);border:1px solid rgba(16,185,129,.2);}
.devis-body{padding:1.25rem;}
.devis-details{display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:.75rem;margin-bottom:1rem;}
.devis-detail{background:rgba(255,255,255,.03);border:1px solid var(--border2);border-radius:10px;padding:.65rem .9rem;}
.dd-label{font-size:.72rem;color:var(--text3);text-transform:uppercase;letter-spacing:.05em;margin-bottom:.2rem;}
.dd-value{font-size:.95rem;font-weight:700;}
.dd-value.price{color:var(--green);}
.dd-value.duration{color:var(--amber);}
.devis-note{font-size:.85rem;color:var(--text2);line-height:1.6;margin-bottom:1rem;padding:.75rem;background:rgba(255,255,255,.03);border-radius:8px;border-left:3px solid var(--accent);}
.devis-actions{display:flex;gap:.6rem;flex-wrap:wrap;}
.dv-btn{padding:.55rem 1.1rem;border-radius:9px;border:1px solid;font-family:inherit;font-size:.85rem;font-weight:600;cursor:pointer;transition:all .25s;display:flex;align-items:center;gap:.4rem;}
.btn-accept{border-color:var(--green);color:var(--green);background:transparent;}
.btn-accept:hover{background:rgba(16,185,129,.1);}
.btn-reject{border-color:var(--red);color:var(--red);background:transparent;}
.btn-reject:hover{background:rgba(239,68,68,.1);}
.btn-chat{border-color:var(--accent);color:var(--accent);background:transparent;}
.btn-chat:hover{background:var(--accent3);}
/* AI ESTIMATE */
.ai-estimate{background:linear-gradient(135deg,rgba(139,92,246,.08),rgba(99,102,241,.04));border:1px solid rgba(139,92,246,.2);border-radius:12px;padding:1rem 1.25rem;margin-bottom:1rem;display:flex;align-items:center;gap:.85rem;}
.ai-icon{font-size:1.5rem;}
.ai-text{flex:1;}
.ai-text h4{font-size:.88rem;font-weight:700;color:#a78bfa;margin-bottom:.2rem;}
.ai-text p{font-size:.82rem;color:var(--text2);}
/* SUCCESS */
.success-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.7);backdrop-filter:blur(8px);z-index:500;align-items:center;justify-content:center;}
.success-overlay.show{display:flex;}
.success-box{background:var(--bg2);border:1px solid var(--border);border-radius:20px;padding:2rem;text-align:center;max-width:380px;width:90%;animation:popIn .4s cubic-bezier(.175,.885,.32,1.275);}
@keyframes popIn{from{opacity:0;transform:scale(.8)}to{opacity:1;transform:scale(1)}}
.s-icon{width:70px;height:70px;border-radius:50%;background:linear-gradient(135deg,var(--green),#059669);display:flex;align-items:center;justify-content:center;font-size:1.8rem;color:#fff;margin:0 auto 1rem;}
</style>
</head>
<body>
<nav>
  <a href="index.php" class="nav-logo"><i class="fas fa-tools"></i> AlloHrayfi</a>
  <div class="nav-links">
    <a href="annonce.php" class="nav-btn"><i class="fas fa-arrow-left"></i> Artisans</a>
    <a href="booking.php" class="nav-btn"><i class="fas fa-calendar"></i> Réserver</a>
    <a href="chat.php" class="nav-btn"><i class="fas fa-comment-dots"></i> Chat</a>
  </div>
</nav>

<div class="page">
  <h1 class="page-title">📋 Demandes de Devis</h1>
  <p class="page-sub">Décrivez votre besoin — les artisans vous envoient leurs offres, vous choisissez.</p>

  <div class="view-tabs">
    <button class="view-tab active" onclick="switchView('request',this)">Nouvelle demande</button>
    <button class="view-tab" onclick="switchView('received',this)">Devis reçus <span style="background:var(--accent);color:#fff;border-radius:10px;padding:.1rem .45rem;font-size:.72rem;margin-left:.3rem;">3</span></button>
  </div>

  <!-- REQUEST VIEW -->
  <div class="view-section active" id="view-request">

    <!-- AI ESTIMATE -->
    <div class="ai-estimate">
      <div class="ai-icon">🤖</div>
      <div class="ai-text">
        <h4>Estimation IA AlloHrayfi</h4>
        <p id="aiEstimate">Décrivez votre problème pour obtenir une estimation automatique de prix.</p>
      </div>
    </div>

    <!-- SERVICE -->
    <div class="form-card">
      <div class="form-card-title"><i class="fas fa-wrench"></i> Type de service</div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Catégorie</label>
          <select class="form-input" id="category" onchange="updateAI()">
            <option value="">-- Choisir --</option>
            <option value="plomberie">Plomberie</option>
            <option value="electricite">Électricité</option>
            <option value="menuiserie">Menuiserie</option>
            <option value="peinture">Peinture</option>
            <option value="carrelage">Carrelage</option>
            <option value="maconnerie">Maçonnerie</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Ville</label>
          <select class="form-input" id="city">
            <option>Casablanca</option><option>Rabat</option><option>Fès</option>
            <option>Marrakech</option><option>Tanger</option><option>Agadir</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Description détaillée</label>
        <textarea class="form-input" id="description" placeholder="Décrivez précisément le problème ou les travaux à effectuer (taille de la pièce, matériaux, ancienneté du problème...)" oninput="updateAI()"></textarea>
      </div>
      <div class="form-group">
        <label class="form-label">Photos du problème (optionnel)</label>
        <div class="photo-upload" onclick="addPhotos()">
          <i class="fas fa-camera"></i>
          <p>Cliquez pour ajouter des photos</p>
          <small>JPG, PNG · Max 5 photos · 5 MB chacune</small>
        </div>
        <div class="photo-previews" id="photoPreviews"></div>
      </div>
    </div>

    <!-- URGENCY & BUDGET -->
    <div class="form-card">
      <div class="form-card-title"><i class="fas fa-sliders-h"></i> Urgence & Budget</div>
      <div class="form-group">
        <label class="form-label">Niveau d'urgence</label>
        <div class="urgency-row">
          <div class="urg-opt low" onclick="setUrgency('low',this)"><i class="fas fa-clock"></i><span>Normal</span><small>2–5 jours</small></div>
          <div class="urg-opt medium active" onclick="setUrgency('medium',this)"><i class="fas fa-exclamation-triangle"></i><span>Urgent</span><small>24–48h</small></div>
          <div class="urg-opt high" onclick="setUrgency('high',this)"><i class="fas fa-fire"></i><span>Critique</span><small>Aujourd'hui</small></div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Budget maximum (DH)</label>
          <input type="number" class="form-input" id="budget" placeholder="ex: 500" oninput="updateAI()">
        </div>
        <div class="form-group">
          <label class="form-label">Date souhaitée</label>
          <input type="date" class="form-input" id="preferredDate">
        </div>
      </div>
    </div>

    <!-- ARTISAN SELECTION -->
    <div class="form-card">
      <div class="form-card-title"><i class="fas fa-users"></i> Envoyer à</div>
      <div class="artisan-options" id="artisanOptions">
        <div class="artisan-opt selected" onclick="toggleArtisan(this,'all')">
          <input type="radio" name="artisan_target" value="all" checked>
          <div style="font-size:1.5rem">📢</div>
          <div class="ao-info">
            <div class="ao-name">Tous les artisans disponibles</div>
            <div class="ao-spec">Votre demande sera visible par tous les artisans de la catégorie dans votre ville</div>
          </div>
        </div>
        <div class="artisan-opt" onclick="toggleArtisan(this,'1')">
          <input type="radio" name="artisan_target" value="1">
          <div class="ao-avatar">A</div>
          <div class="ao-info">
            <div class="ao-name">Ahmed Benhaddou</div>
            <div class="ao-spec">Plombier · Casablanca</div>
            <div style="display:flex;gap:.5rem;">
              <span class="ao-rating">★ 4.8</span>
              <span class="ao-rate">250 DH/h</span>
            </div>
          </div>
        </div>
        <div class="artisan-opt" onclick="toggleArtisan(this,'5')">
          <input type="radio" name="artisan_target" value="5">
          <div class="ao-avatar">O</div>
          <div class="ao-info">
            <div class="ao-name">Omar Chraibi</div>
            <div class="ao-spec">Plombier · Casablanca</div>
            <div style="display:flex;gap:.5rem;">
              <span class="ao-rating">★ 4.7</span>
              <span class="ao-rate">220 DH/h</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <button class="submit-btn" onclick="submitDevis()">
      <i class="fas fa-paper-plane"></i> Envoyer la demande de devis
    </button>
  </div>

  <!-- RECEIVED VIEW -->
  <div class="view-section" id="view-received">
    <div class="devis-list" id="devisList"></div>
  </div>
</div>

<!-- SUCCESS -->
<div class="success-overlay" id="successOverlay">
  <div class="success-box">
    <div class="s-icon">✅</div>
    <h2 style="margin-bottom:.5rem;">Demande envoyée !</h2>
    <p style="color:var(--text2);font-size:.9rem;margin-bottom:1.5rem;">Votre demande a été transmise. Vous recevrez des devis sous 24h.</p>
    <button class="submit-btn" onclick="switchView('received',null);document.getElementById('successOverlay').style.display='none'" style="margin-bottom:.5rem;">
      <i class="fas fa-inbox"></i> Voir les devis reçus
    </button>
    <button onclick="document.getElementById('successOverlay').style.display='none'" style="background:transparent;border:1px solid var(--border2);color:var(--text2);padding:.7rem;border-radius:10px;cursor:pointer;font-family:inherit;width:100%;">
      Faire une autre demande
    </button>
  </div>
</div>

<script>
const RECEIVED_DEVIS = [
  {id:1,artisan:'Ahmed Benhaddou',initial:'A',spec:'Plombier',rating:4.8,price:'200 DH',duration:'45 min',startDate:'Demain 09:00',note:'J\'ai examiné votre description. Il s\'agit probablement d\'un joint de siphon à remplacer. Je peux intervenir demain matin. Le prix inclut le déplacement et les pièces.',status:'new',time:'Il y a 2h'},
  {id:2,artisan:'Omar Chraibi',initial:'O',spec:'Plombier',rating:4.7,price:'180 DH',duration:'30 min',startDate:'Demain 14:00',note:'Simple remplacement de joint. Disponible demain après-midi. Prix fixe tout compris.',status:'seen',time:'Il y a 4h'},
  {id:3,artisan:'Samir Benali',initial:'S',spec:'Plombier',rating:4.1,price:'150 DH',duration:'1h',startDate:'Dans 2 jours',note:'Peut nécessiter un remplacement du siphon complet selon l\'état. Tarif compétitif, travail soigné.',status:'new',time:'Il y a 6h'},
];

const AI_ESTIMATES = {
  plomberie:{low:'100–300 DH',medium:'200–500 DH',high:'300–800 DH',label:'Plomberie'},
  electricite:{low:'150–400 DH',medium:'300–700 DH',high:'500–1500 DH',label:'Électricité'},
  menuiserie:{low:'200–500 DH',medium:'400–900 DH',high:'800–2000 DH',label:'Menuiserie'},
  peinture:{low:'300–800 DH',medium:'600–1500 DH',high:'1200–3000 DH',label:'Peinture'},
  carrelage:{low:'400–1000 DH',medium:'800–2000 DH',high:'1500–4000 DH',label:'Carrelage'},
  maconnerie:{low:'500–1200 DH',medium:'1000–3000 DH',high:'2000–6000 DH',label:'Maçonnerie'},
};

let urgencyLevel = 'medium';

function switchView(view, btn) {
  document.querySelectorAll('.view-tab').forEach(t => t.classList.remove('active'));
  document.querySelectorAll('.view-section').forEach(s => s.classList.remove('active'));
  if(btn) btn.classList.add('active');
  else { document.querySelectorAll('.view-tab')[view==='received'?1:0].classList.add('active'); }
  document.getElementById('view-'+view).classList.add('active');
  if(view==='received') renderDevisList();
}

function setUrgency(level, el) {
  urgencyLevel = level;
  document.querySelectorAll('.urg-opt').forEach(o => o.classList.remove('active'));
  el.classList.add('active');
  updateAI();
}

function toggleArtisan(el, val) {
  document.querySelectorAll('.artisan-opt').forEach(o => o.classList.remove('selected'));
  el.classList.add('selected');
  el.querySelector('input').checked = true;
}

function updateAI() {
  const cat = document.getElementById('category').value;
  const desc = document.getElementById('description').value;
  const budget = document.getElementById('budget').value;
  const el = document.getElementById('aiEstimate');

  if (!cat) { el.textContent = 'Sélectionnez une catégorie pour voir l\'estimation.'; return; }
  const est = AI_ESTIMATES[cat];
  const range = est[urgencyLevel];
  let msg = `Pour <strong>${est.label}</strong> (${urgencyLevel==='low'?'urgence normale':urgencyLevel==='medium'?'urgent':'critique'}), l'estimation est: <strong style="color:var(--green)">${range}</strong>.`;
  if (desc.length > 20) msg += ` Basé sur votre description, ce tarif semble approprié.`;
  if (budget && parseInt(budget) < parseInt(range.split('–')[0])) msg += ` <span style="color:var(--amber)">⚠️ Votre budget (${budget} DH) est en dessous de l'estimation.</span>`;
  el.innerHTML = msg;
}

function addPhotos() {
  const mockPhotos = [
    'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=150&q=70',
    'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=150&q=70',
  ];
  const container = document.getElementById('photoPreviews');
  if (container.children.length >= 5) { alert('Maximum 5 photos.'); return; }
  const url = mockPhotos[container.children.length % mockPhotos.length];
  const div = document.createElement('div');
  div.className = 'photo-preview';
  div.innerHTML = `<img src="${url}"><button class="del" onclick="this.parentNode.remove()">×</button>`;
  container.appendChild(div);
}

function submitDevis() {
  if (!document.getElementById('category').value) { alert('Veuillez sélectionner une catégorie.'); return; }
  if (document.getElementById('description').value.trim().length < 20) { alert('Veuillez décrire votre problème en détail (min. 20 caractères).'); return; }
  document.getElementById('successOverlay').style.display = 'flex';
  document.getElementById('successOverlay').classList.add('show');
}

function renderDevisList() {
  const STATUS = {new:'st-new',seen:'st-seen',accepted:'st-accepted'};
  const STATUS_LABEL = {new:'Nouveau',seen:'Vu',accepted:'Accepté'};
  document.getElementById('devisList').innerHTML = RECEIVED_DEVIS.map(d => `
    <div class="devis-card" id="dv-${d.id}">
      <div class="devis-header">
        <div class="devis-artisan">
          <div class="da-avatar">${d.initial}</div>
          <div>
            <div class="da-name">${d.artisan}</div>
            <div class="da-spec">${d.spec} · ★ ${d.rating} · ${d.time}</div>
          </div>
        </div>
        <span class="devis-status ${STATUS[d.status]}">${STATUS_LABEL[d.status]}</span>
      </div>
      <div class="devis-body">
        <div class="devis-details">
          <div class="devis-detail"><div class="dd-label">Prix proposé</div><div class="dd-value price">${d.price}</div></div>
          <div class="devis-detail"><div class="dd-label">Durée estimée</div><div class="dd-value duration">${d.duration}</div></div>
          <div class="devis-detail"><div class="dd-label">Disponible</div><div class="dd-value">${d.startDate}</div></div>
        </div>
        <div class="devis-note">"${d.note}"</div>
        <div class="devis-actions">
          <button class="dv-btn btn-accept" onclick="acceptDevis(${d.id})"><i class="fas fa-check"></i> Accepter</button>
          <button class="dv-btn btn-chat" onclick="window.location='chat.php'"><i class="fas fa-comment-dots"></i> Discuter</button>
          <button class="dv-btn btn-reject" onclick="rejectDevis(${d.id})"><i class="fas fa-times"></i> Refuser</button>
          <button class="dv-btn" style="border-color:var(--border2);color:var(--text2);" onclick="window.location='artisan-profile.php'"><i class="fas fa-user"></i> Profil</button>
        </div>
      </div>
    </div>`).join('');
}

function acceptDevis(id) {
  const d = RECEIVED_DEVIS.find(x => x.id === id);
  if (d) { d.status = 'accepted'; renderDevisList(); alert('Devis accepté ! Redirection vers la réservation...'); setTimeout(()=>window.location='booking.php',1200); }
}
function rejectDevis(id) {
  if (confirm('Refuser ce devis ?')) {
    const i = RECEIVED_DEVIS.findIndex(x => x.id === id);
    if (i !== -1) { RECEIVED_DEVIS.splice(i, 1); renderDevisList(); }
  }
}

// Set min date
document.getElementById('preferredDate').min = new Date().toISOString().split('T')[0];
</script>
</body>
</html>
