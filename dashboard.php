<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Artisan | AlloHrayfi</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
<style>
*{margin:0;padding:0;box-sizing:border-box;}
:root{
  --bg:#071124;--bg2:#0b1a2e;--bg3:#0f2040;
  --text:#e8f4fd;--text2:rgba(232,244,253,0.7);--text3:rgba(232,244,253,0.45);
  --accent:#06b6d4;--accent2:#0891b2;--accent3:rgba(6,182,212,0.12);
  --green:#10b981;--red:#ef4444;--amber:#f59e0b;--purple:#8b5cf6;
  --border:rgba(6,182,212,0.15);--border2:rgba(255,255,255,0.06);
  --card:rgba(255,255,255,0.03);--nav:rgba(7,17,36,0.95);
  --sidebar-w:240px;
}
body{font-family:'Tajawal',sans-serif;background:var(--bg);color:var(--text);min-height:100vh;display:flex;}
/* SIDEBAR */
.sidebar{width:var(--sidebar-w);background:rgba(255,255,255,.02);border-right:1px solid var(--border2);position:fixed;top:0;left:0;bottom:0;display:flex;flex-direction:column;z-index:50;transition:transform .3s;}
@media(max-width:900px){.sidebar{transform:translateX(-100%);}.sidebar.open{transform:translateX(0);}}
.sidebar-logo{padding:1.5rem;display:flex;align-items:center;gap:.5rem;font-size:1.15rem;font-weight:800;color:var(--accent);border-bottom:1px solid var(--border2);text-decoration:none;}
.sidebar-logo i{font-size:1.3rem;}
.sidebar-user{padding:1.25rem;display:flex;align-items:center;gap:.75rem;border-bottom:1px solid var(--border2);}
.sidebar-avatar{width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent2));display:flex;align-items:center;justify-content:center;font-weight:700;font-size:1.1rem;color:#fff;}
.sidebar-user-name{font-weight:700;font-size:.9rem;}
.sidebar-user-role{font-size:.75rem;color:var(--green);display:flex;align-items:center;gap:.3rem;}
.sidebar-nav{flex:1;padding:.75rem .75rem;overflow-y:auto;}
.nav-section{font-size:.7rem;font-weight:700;color:var(--text3);text-transform:uppercase;letter-spacing:.08em;padding:.5rem .5rem .25rem;margin-top:.5rem;}
.nav-link{display:flex;align-items:center;gap:.7rem;padding:.7rem .85rem;border-radius:10px;color:var(--text2);text-decoration:none;font-size:.9rem;transition:all .2s;cursor:pointer;border:none;background:transparent;width:100%;font-family:inherit;position:relative;}
.nav-link:hover{background:rgba(255,255,255,.05);color:var(--text);}
.nav-link.active{background:var(--accent3);color:var(--accent);border:1px solid var(--border);}
.nav-link i{width:18px;text-align:center;}
.nav-badge{margin-left:auto;background:var(--red);color:#fff;border-radius:10px;padding:.1rem .45rem;font-size:.7rem;font-weight:700;}
.sidebar-bottom{padding:1rem;border-top:1px solid var(--border2);}
/* MAIN */
.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh;}
@media(max-width:900px){.main{margin-left:0;}}
/* TOP BAR */
.topbar{padding:1rem 1.5rem;border-bottom:1px solid var(--border2);display:flex;align-items:center;justify-content:space-between;background:rgba(7,17,36,.98);backdrop-filter:blur(10px);position:sticky;top:0;z-index:40;}
.topbar-left{display:flex;align-items:center;gap:1rem;}
.menu-toggle{background:transparent;border:1px solid var(--border2);color:var(--text2);width:36px;height:36px;border-radius:8px;cursor:pointer;display:none;align-items:center;justify-content:center;}
@media(max-width:900px){.menu-toggle{display:flex;}}
.page-title-bar{font-size:1.1rem;font-weight:700;}
.topbar-right{display:flex;align-items:center;gap:.75rem;}
.topbar-btn{padding:.5rem 1rem;border-radius:8px;border:1px solid var(--border2);background:transparent;color:var(--text2);cursor:pointer;font-family:inherit;font-size:.85rem;transition:all .2s;display:flex;align-items:center;gap:.4rem;text-decoration:none;}
.topbar-btn:hover{border-color:var(--accent);color:var(--accent);background:var(--accent3);}
.notif-dot{width:8px;height:8px;border-radius:50%;background:var(--red);margin-left:.2rem;}
/* CONTENT */
.content{padding:1.5rem;flex:1;}
/* STATS */
.stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin-bottom:1.5rem;}
.stat-card{background:var(--card);border:1px solid var(--border2);border-radius:16px;padding:1.25rem;position:relative;overflow:hidden;transition:all .3s;}
.stat-card:hover{border-color:var(--border);transform:translateY(-2px);}
.stat-card::before{content:'';position:absolute;top:0;right:0;width:80px;height:80px;border-radius:50%;opacity:.06;background:var(--accent);}
.stat-card.green::before{background:var(--green);}
.stat-card.amber::before{background:var(--amber);}
.stat-card.purple::before{background:var(--purple);}
.stat-icon{width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;margin-bottom:.85rem;}
.stat-icon.blue{background:var(--accent3);color:var(--accent);}
.stat-icon.green{background:rgba(16,185,129,.12);color:var(--green);}
.stat-icon.amber{background:rgba(245,158,11,.12);color:var(--amber);}
.stat-icon.purple{background:rgba(139,92,246,.12);color:var(--purple);}
.stat-value{font-size:1.75rem;font-weight:900;margin-bottom:.2rem;}
.stat-label{font-size:.82rem;color:var(--text2);}
.stat-change{font-size:.78rem;margin-top:.3rem;display:flex;align-items:center;gap:.25rem;}
.stat-change.up{color:var(--green);}
.stat-change.down{color:var(--red);}
/* SECTION TITLE */
.section-title{font-size:1rem;font-weight:700;margin-bottom:1rem;display:flex;align-items:center;justify-content:space-between;}
.section-title a{font-size:.8rem;color:var(--accent);text-decoration:none;font-weight:500;}
/* GRID 2 COL */
.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:1.25rem;margin-bottom:1.5rem;}
@media(max-width:1100px){.grid-2{grid-template-columns:1fr;}}
.card{background:var(--card);border:1px solid var(--border2);border-radius:16px;padding:1.25rem;}
/* CHART */
.chart-wrap{position:relative;height:200px;}
/* TRUST SCORE */
.trust-ring{display:flex;justify-content:center;margin:1rem 0;}
.trust-score-big{font-size:2.5rem;font-weight:900;color:var(--accent);text-align:center;line-height:1;}
.trust-label-big{font-size:.8rem;color:var(--text3);text-align:center;margin-bottom:1rem;}
.trust-factors{display:flex;flex-direction:column;gap:.6rem;}
.trust-factor{display:flex;align-items:center;gap:.75rem;font-size:.85rem;}
.factor-name{flex:1;color:var(--text2);}
.factor-bar{flex:2;height:6px;background:var(--border2);border-radius:3px;overflow:hidden;}
.factor-fill{height:100%;border-radius:3px;transition:width 1s ease;}
.factor-val{width:30px;text-align:right;font-weight:600;font-size:.82rem;}
/* BOOKINGS TABLE */
.bookings-table{width:100%;border-collapse:collapse;}
.bookings-table th{text-align:left;font-size:.75rem;font-weight:700;color:var(--text3);text-transform:uppercase;letter-spacing:.05em;padding:.5rem .75rem;border-bottom:1px solid var(--border2);}
.bookings-table td{padding:.75rem;border-bottom:1px solid rgba(255,255,255,.03);font-size:.88rem;vertical-align:middle;}
.bookings-table tr:hover td{background:rgba(255,255,255,.02);}
.status-pill{padding:.25rem .7rem;border-radius:20px;font-size:.75rem;font-weight:600;}
.pill-pending{background:rgba(245,158,11,.1);color:var(--amber);border:1px solid rgba(245,158,11,.2);}
.pill-accepted{background:rgba(16,185,129,.1);color:var(--green);border:1px solid rgba(16,185,129,.2);}
.pill-done{background:rgba(6,182,212,.1);color:var(--accent);border:1px solid rgba(6,182,212,.2);}
.pill-rejected{background:rgba(239,68,68,.1);color:var(--red);border:1px solid rgba(239,68,68,.2);}
.action-btns{display:flex;gap:.4rem;}
.act-btn{padding:.28rem .65rem;border-radius:6px;border:1px solid;font-size:.75rem;cursor:pointer;font-family:inherit;transition:all .2s;}
.btn-accept{border-color:var(--green);color:var(--green);background:transparent;}
.btn-accept:hover{background:rgba(16,185,129,.1);}
.btn-reject{border-color:var(--red);color:var(--red);background:transparent;}
.btn-reject:hover{background:rgba(239,68,68,.1);}
/* NOTIFICATIONS */
.notif-list{display:flex;flex-direction:column;gap:.5rem;}
.notif-item{display:flex;align-items:flex-start;gap:.75rem;padding:.75rem;border-radius:10px;border:1px solid var(--border2);transition:all .2s;cursor:pointer;}
.notif-item:hover{border-color:var(--border);background:rgba(255,255,255,.02);}
.notif-item.unread{border-color:var(--border);background:var(--accent3);}
.notif-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:.9rem;flex-shrink:0;}
.notif-text{flex:1;font-size:.85rem;line-height:1.5;color:var(--text2);}
.notif-text strong{color:var(--text);}
.notif-time{font-size:.72rem;color:var(--text3);flex-shrink:0;}
/* PROFILE VIEWS */
.views-chart{display:flex;align-items:flex-end;gap:4px;height:60px;margin:1rem 0;}
.view-bar{flex:1;border-radius:3px 3px 0 0;background:var(--accent3);transition:height .5s ease;position:relative;cursor:pointer;}
.view-bar:hover{background:var(--accent);}
.view-bar::after{content:attr(data-val);position:absolute;bottom:100%;left:50%;transform:translateX(-50%);font-size:.65rem;color:var(--text3);white-space:nowrap;opacity:0;transition:.2s;}
.view-bar:hover::after{opacity:1;}
/* AVAILABILITY TOGGLE */
.avail-toggle{display:flex;align-items:center;justify-content:space-between;padding:.6rem 0;}
.day-name-t{font-size:.88rem;color:var(--text2);}
.toggle{position:relative;width:40px;height:22px;}
.toggle input{opacity:0;width:0;height:0;}
.toggle-slider{position:absolute;inset:0;background:var(--border2);border-radius:11px;cursor:pointer;transition:.3s;}
.toggle-slider:before{content:'';position:absolute;width:16px;height:16px;left:3px;top:3px;background:#fff;border-radius:50%;transition:.3s;}
.toggle input:checked+.toggle-slider{background:var(--accent);}
.toggle input:checked+.toggle-slider:before{transform:translateX(18px);}
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
  <a href="index.php" class="sidebar-logo"><i class="fas fa-tools"></i> AlloHrayfi</a>
  <div class="sidebar-user">
    <div class="sidebar-avatar">A</div>
    <div>
      <div class="sidebar-user-name">Ahmed Benhaddou</div>
      <div class="sidebar-user-role"><span style="width:7px;height:7px;background:var(--green);border-radius:50%;display:inline-block;"></span> Artisan actif</div>
    </div>
  </div>
  <nav class="sidebar-nav">
    <div class="nav-section">Principal</div>
    <button class="nav-link active" onclick="showTab('overview',this)"><i class="fas fa-tachometer-alt"></i> Vue d'ensemble</button>
    <button class="nav-link" onclick="showTab('bookings',this)"><i class="fas fa-calendar-check"></i> Réservations <span class="nav-badge">3</span></button>
    <button class="nav-link" onclick="showTab('devis',this)"><i class="fas fa-file-invoice"></i> Devis</button>
    <button class="nav-link" onclick="window.location='chat.php'"><i class="fas fa-comment-dots"></i> Messages <span class="nav-badge">2</span></button>
    <div class="nav-section">Profil</div>
    <button class="nav-link" onclick="showTab('profile',this)"><i class="fas fa-user-edit"></i> Mon profil</button>
    <button class="nav-link" onclick="showTab('portfolio',this)"><i class="fas fa-images"></i> Portfolio</button>
    <button class="nav-link" onclick="showTab('reviews',this)"><i class="fas fa-star"></i> Avis clients</button>
    <button class="nav-link" onclick="showTab('availability',this)"><i class="fas fa-clock"></i> Disponibilités</button>
    <div class="nav-section">Compte</div>
    <button class="nav-link" onclick="showTab('earnings',this)"><i class="fas fa-coins"></i> Revenus</button>
    <button class="nav-link" onclick="showTab('notifications',this)"><i class="fas fa-bell"></i> Notifications</button>
    <button class="nav-link" onclick="showTab('settings',this)"><i class="fas fa-cog"></i> Paramètres</button>
  </nav>
  <div class="sidebar-bottom">
    <a href="artisan-profile.php" class="nav-link"><i class="fas fa-eye"></i> Voir mon profil public</a>
  </div>
</aside>

<!-- MAIN -->
<div class="main">
  <div class="topbar">
    <div class="topbar-left">
      <button class="menu-toggle" onclick="document.getElementById('sidebar').classList.toggle('open')"><i class="fas fa-bars"></i></button>
      <div class="page-title-bar" id="pageTitle">Vue d'ensemble</div>
    </div>
    <div class="topbar-right">
      <a href="chat.php" class="topbar-btn"><i class="fas fa-comment-dots"></i> Messages <span class="notif-dot"></span></a>
      <a href="annonce.php" class="topbar-btn"><i class="fas fa-search"></i> Trouver des clients</a>
    </div>
  </div>

  <div class="content" id="mainContent"><!-- filled by JS --></div>
</div>

<script>
const TABS = {
  overview: renderOverview,
  bookings: renderBookings,
  devis: renderDevis,
  profile: renderProfile,
  portfolio: renderPortfolio,
  reviews: renderReviews,
  availability: renderAvailability,
  earnings: renderEarnings,
  notifications: renderNotifications,
  settings: renderSettings,
};
const TITLES = {
  overview:'Vue d\'ensemble',bookings:'Réservations',devis:'Demandes de devis',
  profile:'Mon profil',portfolio:'Portfolio',reviews:'Avis clients',
  availability:'Mes disponibilités',earnings:'Mes revenus',
  notifications:'Notifications',settings:'Paramètres',
};
let activeChart = null;

function showTab(tab, btn) {
  document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
  if(btn) btn.classList.add('active');
  document.getElementById('pageTitle').textContent = TITLES[tab] || tab;
  if(activeChart){activeChart.destroy();activeChart=null;}
  document.getElementById('mainContent').innerHTML = '';
  TABS[tab]();
  if(window.innerWidth<=900) document.getElementById('sidebar').classList.remove('open');
}

// ======= OVERVIEW =======
function renderOverview() {
  document.getElementById('mainContent').innerHTML = `
  <div class="stats-grid">
    <div class="stat-card"><div class="stat-icon blue"><i class="fas fa-calendar-check"></i></div><div class="stat-value">127</div><div class="stat-label">Missions complétées</div><div class="stat-change up"><i class="fas fa-arrow-up"></i> +12% ce mois</div></div>
    <div class="stat-card green"><div class="stat-icon green"><i class="fas fa-coins"></i></div><div class="stat-value">18,450 DH</div><div class="stat-label">Revenus ce mois</div><div class="stat-change up"><i class="fas fa-arrow-up"></i> +8% vs mois dernier</div></div>
    <div class="stat-card amber"><div class="stat-icon amber"><i class="fas fa-star"></i></div><div class="stat-value">4.8 ⭐</div><div class="stat-label">Note moyenne</div><div class="stat-change up"><i class="fas fa-arrow-up"></i> +0.1 ce mois</div></div>
    <div class="stat-card purple"><div class="stat-icon purple"><i class="fas fa-eye"></i></div><div class="stat-value">1,240</div><div class="stat-label">Vues du profil</div><div class="stat-change up"><i class="fas fa-arrow-up"></i> +34% cette semaine</div></div>
  </div>
  <div class="grid-2">
    <div class="card">
      <div class="section-title">Revenus (6 derniers mois) <a href="#" onclick="showTab('earnings',null);return false;">Voir tout</a></div>
      <div class="chart-wrap"><canvas id="earningsChart"></canvas></div>
    </div>
    <div class="card">
      <div class="section-title">Score de confiance</div>
      <div class="trust-score-big" id="tscore">78</div>
      <div class="trust-label-big">/ 100 · Niveau: <strong style="color:var(--amber)">Professionnel</strong></div>
      <div class="trust-factors" id="tFactors"></div>
    </div>
  </div>
  <div class="card" style="margin-bottom:1.5rem;">
    <div class="section-title">Réservations récentes <a href="#" onclick="showTab('bookings',null);return false;">Voir tout</a></div>
    <div id="recentBookings"></div>
  </div>
  <div class="grid-2">
    <div class="card">
      <div class="section-title">Vues du profil (7 jours)</div>
      <div class="views-chart" id="viewsChart"></div>
      <div style="display:flex;justify-content:space-between;font-size:.72rem;color:var(--text3);">
        <span>Lun</span><span>Mar</span><span>Mer</span><span>Jeu</span><span>Ven</span><span>Sam</span><span>Dim</span>
      </div>
    </div>
    <div class="card">
      <div class="section-title">Notifications récentes</div>
      <div id="recentNotifs"></div>
    </div>
  </div>`;
  // Chart
  const ctx = document.getElementById('earningsChart').getContext('2d');
  activeChart = new Chart(ctx,{type:'bar',data:{labels:['Nov','Déc','Jan','Fév','Mar','Avr'],datasets:[{label:'Revenus (DH)',data:[12400,15200,13800,16500,14200,18450],backgroundColor:'rgba(6,182,212,0.3)',borderColor:'rgba(6,182,212,0.8)',borderWidth:2,borderRadius:6}]},options:{responsive:true,maintainAspectRatio:false,plugins:{legend:{display:false}},scales:{x:{grid:{display:false},ticks:{color:'rgba(232,244,253,0.5)',font:{family:'Tajawal'}}},y:{grid:{color:'rgba(255,255,255,0.04)'},ticks:{color:'rgba(232,244,253,0.5)',font:{family:'Tajawal'},callback:v=>v/1000+'k'}}}}});
  // Trust factors
  const factors=[{n:'Avis clients',v:92,c:'#10b981'},{n:'Missions complétées',v:85,c:'#06b6d4'},{n:'Badges vérification',v:70,c:'#8b5cf6'},{n:'Taux de réponse',v:88,c:'#f59e0b'},{n:'Satisfaction',v:95,c:'#10b981'}];
  document.getElementById('tFactors').innerHTML=factors.map(f=>`<div class="trust-factor"><div class="factor-name">${f.n}</div><div class="factor-bar"><div class="factor-fill" style="width:${f.v}%;background:${f.c};"></div></div><div class="factor-val" style="color:${f.c}">${f.v}</div></div>`).join('');
  // Views
  const vals=[120,95,180,140,210,175,160];
  const max=Math.max(...vals);
  document.getElementById('viewsChart').innerHTML=vals.map((v,i)=>`<div class="view-bar" style="height:${(v/max*100)}%" data-val="${v}" title="${v} vues"></div>`).join('');
  // Recent bookings
  renderBookingRows(document.getElementById('recentBookings'), BOOKINGS.slice(0,3));
  // Recent notifs
  document.getElementById('recentNotifs').innerHTML=NOTIFICATIONS.slice(0,4).map(n=>`<div class="notif-item${n.unread?' unread':''}"><div class="notif-icon" style="background:${n.bg};color:${n.color};">${n.icon}</div><div class="notif-text"><strong>${n.title}</strong><br>${n.msg}</div><div class="notif-time">${n.time}</div></div>`).join('');
}

// ======= BOOKINGS =======
const BOOKINGS=[
  {id:'AH-001',client:'Karim Benali',service:'Réparation fuite',date:'Demain 09:00',price:'200 DH',status:'pending'},
  {id:'AH-002',client:'Fatima Zouari',service:'Installation chauffe-eau',date:'Jeu 14:00',price:'650 DH',status:'accepted'},
  {id:'AH-003',client:'Mohamed Tazi',service:'Débouchage',date:'Ven 10:30',price:'300 DH',status:'pending'},
  {id:'AH-004',client:'Sara Alaoui',service:'Urgence nuit',date:'Hier 22:00',price:'400 DH',status:'done'},
  {id:'AH-005',client:'Hassan Kadiri',service:'Réparation fuite',date:'Lun 16:00',price:'180 DH',status:'rejected'},
];
const STATUS_MAP={pending:{label:'En attente',cls:'pill-pending'},accepted:{label:'Accepté',cls:'pill-accepted'},done:{label:'Terminé',cls:'pill-done'},rejected:{label:'Refusé',cls:'pill-rejected'}};

function renderBookingRows(el,list){
  el.innerHTML=`<table class="bookings-table"><thead><tr><th>Réf</th><th>Client</th><th>Service</th><th>Date</th><th>Prix</th><th>Statut</th><th>Action</th></tr></thead><tbody>`+
  list.map(b=>{const s=STATUS_MAP[b.status];return`<tr><td style="font-family:monospace;font-size:.8rem;color:var(--accent)">${b.id}</td><td>${b.client}</td><td>${b.service}</td><td style="color:var(--text2);font-size:.82rem">${b.date}</td><td style="font-weight:700;color:var(--green)">${b.price}</td><td><span class="status-pill ${s.cls}">${s.label}</span></td><td>${b.status==='pending'?`<div class="action-btns"><button class="act-btn btn-accept" onclick="changeStatus('${b.id}','accepted')">✓</button><button class="act-btn btn-reject" onclick="changeStatus('${b.id}','rejected')">✗</button></div>`:b.status==='accepted'?`<button class="act-btn btn-accept" onclick="changeStatus('${b.id}','done')">Terminer</button>`:'—'}</td></tr>`}).join('')+
  `</tbody></table>`;
}
function changeStatus(id,status){
  const b=BOOKINGS.find(x=>x.id===id);
  if(b){b.status=status;renderBookings();}
}
function renderBookings(){
  document.getElementById('mainContent').innerHTML=`<div class="card"><div class="section-title">Toutes les réservations</div><div id="allBookings"></div></div>`;
  renderBookingRows(document.getElementById('allBookings'),BOOKINGS);
}

// ======= DEVIS =======
function renderDevis(){
  const devis=[
    {client:'Youssef M.',desc:'Remplacement complet installation sanitaire salle de bain',date:'Aujourd\'hui',status:'new'},
    {client:'Aicha B.',desc:'Fuite sous évier cuisine + installation robinetterie',date:'Hier',status:'sent'},
    {client:'Omar K.',desc:'Installation chauffe-eau solaire 200L',date:'Il y a 2j',status:'accepted'},
  ];
  document.getElementById('mainContent').innerHTML=`
  <div class="stats-grid" style="grid-template-columns:repeat(3,1fr);">
    <div class="stat-card"><div class="stat-icon blue"><i class="fas fa-file-invoice"></i></div><div class="stat-value">8</div><div class="stat-label">Devis ce mois</div></div>
    <div class="stat-card green"><div class="stat-icon green"><i class="fas fa-check"></i></div><div class="stat-value">6</div><div class="stat-label">Acceptés</div></div>
    <div class="stat-card amber"><div class="stat-icon amber"><i class="fas fa-percentage"></i></div><div class="stat-value">75%</div><div class="stat-label">Taux d'acceptation</div></div>
  </div>
  <div class="card">
    <div class="section-title">Demandes de devis</div>
    ${devis.map(d=>`<div style="display:flex;align-items:flex-start;justify-content:space-between;padding:1rem 0;border-bottom:1px solid var(--border2);gap:1rem;flex-wrap:wrap;">
      <div style="flex:1;">
        <div style="font-weight:700;margin-bottom:.25rem;">${d.client}</div>
        <div style="color:var(--text2);font-size:.88rem;">${d.desc}</div>
        <div style="font-size:.75rem;color:var(--text3);margin-top:.25rem;">${d.date}</div>
      </div>
      <div style="display:flex;flex-direction:column;gap:.4rem;align-items:flex-end;">
        <span class="status-pill ${d.status==='new'?'pill-pending':d.status==='sent'?'pill-accepted':'pill-done'}">${d.status==='new'?'Nouveau':d.status==='sent'?'Devis envoyé':'Accepté'}</span>
        ${d.status==='new'?`<button class="act-btn btn-accept" onclick="alert('Formulaire de devis — à implémenter')">Envoyer devis</button>`:''}
      </div>
    </div>`).join('')}
  </div>`;
}

// ======= PROFILE =======
function renderProfile(){
  document.getElementById('mainContent').innerHTML=`
  <div class="grid-2">
    <div class="card">
      <div class="section-title">Informations personnelles</div>
      ${['Nom complet|Ahmed Benhaddou|text','Téléphone|+212 6 61 23 45 67|tel','Email|ahmed@example.com|email','Ville|Casablanca|text','Zone d\'intervention|Grand Casablanca, Rabat|text'].map(f=>{const[l,v,t]=f.split('|');return`<div style="margin-bottom:1rem;"><label style="display:block;font-size:.78rem;color:var(--text3);text-transform:uppercase;letter-spacing:.06em;margin-bottom:.35rem;">${l}</label><input type="${t}" value="${v}" style="width:100%;padding:.7rem 1rem;border-radius:8px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text);font-family:inherit;font-size:.9rem;" oninput="this.style.borderColor='var(--accent)'"></div>`;}).join('')}
      <button style="padding:.75rem 1.5rem;background:linear-gradient(135deg,var(--accent),var(--accent2));border:none;border-radius:10px;color:#fff;font-family:inherit;font-size:.9rem;font-weight:700;cursor:pointer;" onclick="alert('Profil mis à jour !')">Sauvegarder</button>
    </div>
    <div class="card">
      <div class="section-title">Ma spécialité & Bio</div>
      <div style="margin-bottom:1rem;"><label style="display:block;font-size:.78rem;color:var(--text3);text-transform:uppercase;letter-spacing:.06em;margin-bottom:.35rem;">Spécialité</label>
      <select style="width:100%;padding:.7rem 1rem;border-radius:8px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text);font-family:inherit;font-size:.9rem;">
        <option selected>Plombier</option><option>Électricien</option><option>Menuisier</option><option>Peintre</option>
      </select></div>
      <div style="margin-bottom:1rem;"><label style="display:block;font-size:.78rem;color:var(--text3);text-transform:uppercase;letter-spacing:.06em;margin-bottom:.35rem;">Tarif horaire (DH)</label>
      <input type="number" value="250" style="width:100%;padding:.7rem 1rem;border-radius:8px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text);font-family:inherit;font-size:.9rem;"></div>
      <div><label style="display:block;font-size:.78rem;color:var(--text3);text-transform:uppercase;letter-spacing:.06em;margin-bottom:.35rem;">Biographie</label>
      <textarea style="width:100%;padding:.7rem 1rem;border-radius:8px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text);font-family:inherit;font-size:.9rem;resize:vertical;min-height:120px;">Plombier professionnel avec 12 ans d'expérience...</textarea></div>
    </div>
  </div>`;
}

// ======= PORTFOLIO =======
function renderPortfolio(){
  document.getElementById('mainContent').innerHTML=`
  <div class="card">
    <div class="section-title">Mon portfolio avant/après</div>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:1rem;">
      ${[1,2,3,4].map(i=>`<div style="border:1px solid var(--border2);border-radius:12px;overflow:hidden;">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:2px;background:var(--border2);">
          <div style="height:130px;background:linear-gradient(135deg,rgba(6,182,212,.1),rgba(8,145,178,.05));display:flex;align-items:center;justify-content:center;flex-direction:column;gap:.3rem;cursor:pointer;" onclick="alert('Ajouter photo avant')">
            <i class="fas fa-camera" style="font-size:1.4rem;color:var(--text3);"></i>
            <span style="font-size:.72rem;color:var(--text3);">Avant</span>
          </div>
          <div style="height:130px;background:linear-gradient(135deg,rgba(16,185,129,.08),rgba(5,150,105,.04));display:flex;align-items:center;justify-content:center;flex-direction:column;gap:.3rem;cursor:pointer;" onclick="alert('Ajouter photo après')">
            <i class="fas fa-camera" style="font-size:1.4rem;color:var(--green);opacity:.5;"></i>
            <span style="font-size:.72rem;color:var(--text3);">Après</span>
          </div>
        </div>
        <div style="padding:.75rem;">
          <input placeholder="Titre du projet" style="width:100%;background:transparent;border:none;border-bottom:1px solid var(--border2);color:var(--text);font-family:inherit;font-size:.85rem;padding:.3rem 0;" value="Projet ${i}">
        </div>
      </div>`).join('')}
      <div style="border:2px dashed var(--border2);border-radius:12px;height:200px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:.5rem;cursor:pointer;color:var(--text3);transition:.2s;" onmouseover="this.style.borderColor='var(--accent)'" onmouseout="this.style.borderColor='var(--border2)'">
        <i class="fas fa-plus" style="font-size:1.5rem;"></i>
        <span style="font-size:.85rem;">Ajouter un projet</span>
      </div>
    </div>
  </div>`;
}

// ======= REVIEWS =======
function renderReviews(){
  const reviews=[
    {name:'Karim M.',rating:5,date:'Jan 2024',text:'Excellent travail, très professionnel et ponctuel. Je recommande vivement !',verified:true},
    {name:'Fatima Z.',rating:5,date:'Déc 2023',text:'Réparation rapide et efficace. Prix honnête. Ahmed est très sérieux.',verified:true},
    {name:'Hassan B.',rating:4,date:'Nov 2023',text:'Bon travail dans l\'ensemble, quelques petits détails à améliorer.',verified:true},
    {name:'Sara A.',rating:5,date:'Oct 2023',text:'Parfait ! Intervention en urgence, disponible le soir même.',verified:false},
  ];
  document.getElementById('mainContent').innerHTML=`
  <div class="stats-grid" style="grid-template-columns:repeat(4,1fr);">
    <div class="stat-card"><div class="stat-value">4.8 ⭐</div><div class="stat-label">Note globale</div></div>
    <div class="stat-card"><div class="stat-value">127</div><div class="stat-label">Total avis</div></div>
    <div class="stat-card green"><div class="stat-value">94%</div><div class="stat-label">Avis positifs</div></div>
    <div class="stat-card amber"><div class="stat-value">100%</div><div class="stat-label">Avis vérifiés</div></div>
  </div>
  <div class="card">
    <div class="section-title">Avis récents</div>
    ${reviews.map(r=>`<div style="padding:1rem 0;border-bottom:1px solid var(--border2);">
      <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:.4rem;">
        <div>
          <span style="font-weight:700;">${r.name}</span>
          ${r.verified?'<span style="background:rgba(16,185,129,.1);color:var(--green);font-size:.7rem;padding:.1rem .45rem;border-radius:6px;margin-left:.4rem;">✓ Vérifié</span>':'<span style="background:rgba(239,68,68,.1);color:var(--red);font-size:.7rem;padding:.1rem .45rem;border-radius:6px;margin-left:.4rem;">Non vérifié</span>'}
          <div style="color:var(--amber);font-size:.9rem;margin-top:.15rem;">${'★'.repeat(r.rating)}${'☆'.repeat(5-r.rating)}</div>
        </div>
        <span style="font-size:.78rem;color:var(--text3);">${r.date}</span>
      </div>
      <p style="color:var(--text2);font-size:.88rem;line-height:1.6;">${r.text}</p>
    </div>`).join('')}
  </div>`;
}

// ======= AVAILABILITY =======
const DAYS=[{k:'monday',fr:'Lundi'},{k:'tuesday',fr:'Mardi'},{k:'wednesday',fr:'Mercredi'},{k:'thursday',fr:'Jeudi'},{k:'friday',fr:'Vendredi'},{k:'saturday',fr:'Samedi'},{k:'sunday',fr:'Dimanche'}];
function renderAvailability(){
  document.getElementById('mainContent').innerHTML=`
  <div class="card">
    <div class="section-title">Gérer mes disponibilités</div>
    <p style="color:var(--text2);font-size:.88rem;margin-bottom:1.25rem;">Activez les jours où vous êtes disponible. Les clients ne pourront pas réserver les jours désactivés.</p>
    ${DAYS.map((d,i)=>`<div class="avail-toggle">
      <div class="day-name-t">${d.fr}</div>
      <div style="display:flex;align-items:center;gap:1rem;">
        <input type="time" value="${i<5?'08:00':'09:00'}" style="padding:.35rem .7rem;border-radius:7px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text);font-family:inherit;font-size:.85rem;"> 
        <span style="color:var(--text3);">–</span>
        <input type="time" value="${i===5?'13:00':i===6?'00:00':'18:00'}" style="padding:.35rem .7rem;border-radius:7px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text);font-family:inherit;font-size:.85rem;">
        <label class="toggle"><input type="checkbox" ${i<6?'checked':''}><div class="toggle-slider"></div></label>
      </div>
    </div>`).join('')}
    <button style="margin-top:1.25rem;padding:.75rem 1.5rem;background:linear-gradient(135deg,var(--accent),var(--accent2));border:none;border-radius:10px;color:#fff;font-family:inherit;font-size:.9rem;font-weight:700;cursor:pointer;" onclick="alert('Disponibilités mises à jour !')">Sauvegarder</button>
  </div>`;
}

// ======= EARNINGS =======
function renderEarnings(){
  document.getElementById('mainContent').innerHTML=`
  <div class="stats-grid">
    <div class="stat-card green"><div class="stat-icon green"><i class="fas fa-coins"></i></div><div class="stat-value">18,450 DH</div><div class="stat-label">Ce mois</div></div>
    <div class="stat-card"><div class="stat-icon blue"><i class="fas fa-chart-line"></i></div><div class="stat-value">90,600 DH</div><div class="stat-label">Total annuel</div></div>
    <div class="stat-card amber"><div class="stat-icon amber"><i class="fas fa-clock"></i></div><div class="stat-value">245 h</div><div class="stat-label">Heures travaillées</div></div>
  </div>
  <div class="card">
    <div class="section-title">Évolution des revenus</div>
    <div class="chart-wrap"><canvas id="earningsLine"></canvas></div>
  </div>
  <div class="card" style="margin-top:1.25rem;">
    <div class="section-title">Derniers paiements</div>
    <table class="bookings-table"><thead><tr><th>Date</th><th>Client</th><th>Service</th><th>Montant</th><th>Mode</th></tr></thead><tbody>
      ${[['15 Avr','Karim M.','Fuite urgence','200 DH','Espèces'],['14 Avr','Fatima Z.','Chauffe-eau','650 DH','CIH Pay'],['12 Avr','Hassan B.','Débouchage','300 DH','Espèces'],['10 Avr','Sara A.','Nuit urgence','400 DH','Orange Money']].map(r=>`<tr>${r.map((c,i)=>`<td style="${i===3?'color:var(--green);font-weight:700;':i===4?'color:var(--text3);':''}">${c}</td>`).join('')}</tr>`).join('')}
    </tbody></table>
  </div>`;
  const ctx=document.getElementById('earningsLine').getContext('2d');
  activeChart=new Chart(ctx,{type:'line',data:{labels:['Nov','Déc','Jan','Fév','Mar','Avr'],datasets:[{label:'Revenus',data:[12400,15200,13800,16500,14200,18450],borderColor:'#06b6d4',backgroundColor:'rgba(6,182,212,0.1)',borderWidth:2.5,pointBackgroundColor:'#06b6d4',pointRadius:5,fill:true,tension:.4}]},options:{responsive:true,maintainAspectRatio:false,plugins:{legend:{display:false}},scales:{x:{grid:{display:false},ticks:{color:'rgba(232,244,253,0.5)',font:{family:'Tajawal'}}},y:{grid:{color:'rgba(255,255,255,0.04)'},ticks:{color:'rgba(232,244,253,0.5)',font:{family:'Tajawal'},callback:v=>v/1000+'k DH'}}}}});
}

// ======= NOTIFICATIONS =======
const NOTIFICATIONS=[
  {icon:'📅',bg:'rgba(6,182,212,.12)',color:'var(--accent)',title:'Nouvelle réservation',msg:'Karim Benali a réservé pour demain 09:00',time:'Il y a 5min',unread:true},
  {icon:'⭐',bg:'rgba(245,158,11,.12)',color:'var(--amber)',title:'Nouvel avis',msg:'Fatima Z. vous a donné 5 étoiles',time:'Il y a 1h',unread:true},
  {icon:'💬',bg:'rgba(139,92,246,.12)',color:'var(--purple)',title:'Nouveau message',msg:'Hassan B. vous a envoyé un message',time:'Il y a 2h',unread:true},
  {icon:'✅',bg:'rgba(16,185,129,.12)',color:'var(--green)',title:'Réservation confirmée',msg:'AH-002 acceptée avec succès',time:'Hier',unread:false},
  {icon:'📋',bg:'rgba(6,182,212,.12)',color:'var(--accent)',title:'Demande de devis',msg:'Omar K. souhaite un devis pour chauffe-eau',time:'Hier',unread:false},
];
function renderNotifications(){
  document.getElementById('mainContent').innerHTML=`
  <div class="card">
    <div class="section-title">Toutes les notifications <a href="#" onclick="NOTIFICATIONS.forEach(n=>n.unread=false);renderNotifications();return false">Tout marquer lu</a></div>
    <div class="notif-list">${NOTIFICATIONS.map((n,i)=>`<div class="notif-item${n.unread?' unread':''}" onclick="NOTIFICATIONS[${i}].unread=false;this.classList.remove('unread')"><div class="notif-icon" style="background:${n.bg};color:${n.color};">${n.icon}</div><div class="notif-text"><strong>${n.title}</strong><br>${n.msg}</div><div class="notif-time">${n.time}</div></div>`).join('')}</div>
  </div>`;
}

// ======= SETTINGS =======
function renderSettings(){
  document.getElementById('mainContent').innerHTML=`
  <div class="grid-2">
    <div class="card">
      <div class="section-title">Notifications</div>
      ${[['Nouvelles réservations',true],['Nouveaux messages',true],['Avis clients',true],['Rappels de RDV',true],['Newsletter',false]].map(([l,v])=>`<div style="display:flex;justify-content:space-between;align-items:center;padding:.6rem 0;border-bottom:1px solid var(--border2);">
        <span style="font-size:.9rem;">${l}</span>
        <label class="toggle"><input type="checkbox" ${v?'checked':''}><div class="toggle-slider"></div></label>
      </div>`).join('')}
    </div>
    <div class="card">
      <div class="section-title">Sécurité</div>
      <div style="margin-bottom:1rem;"><label style="display:block;font-size:.78rem;color:var(--text3);margin-bottom:.35rem;">Mot de passe actuel</label><input type="password" placeholder="••••••••" style="width:100%;padding:.7rem 1rem;border-radius:8px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text);font-family:inherit;"></div>
      <div style="margin-bottom:1rem;"><label style="display:block;font-size:.78rem;color:var(--text3);margin-bottom:.35rem;">Nouveau mot de passe</label><input type="password" placeholder="••••••••" style="width:100%;padding:.7rem 1rem;border-radius:8px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text);font-family:inherit;"></div>
      <button style="padding:.75rem 1.5rem;background:linear-gradient(135deg,var(--accent),var(--accent2));border:none;border-radius:10px;color:#fff;font-family:inherit;font-weight:700;cursor:pointer;" onclick="alert('Mot de passe mis à jour !')">Mettre à jour</button>
      <div style="margin-top:1.25rem;padding:1rem;background:rgba(239,68,68,.08);border:1px solid rgba(239,68,68,.2);border-radius:10px;">
        <div style="font-weight:700;color:var(--red);margin-bottom:.3rem;">Zone dangereuse</div>
        <div style="font-size:.85rem;color:var(--text2);margin-bottom:.75rem;">La suppression de votre compte est irréversible.</div>
        <button style="padding:.5rem 1rem;border:1px solid var(--red);background:transparent;color:var(--red);border-radius:8px;cursor:pointer;font-family:inherit;" onclick="confirm('Supprimer votre compte ?')&&alert('Compte supprimé.')">Supprimer mon compte</button>
      </div>
    </div>
  </div>`;
}

// INIT
showTab('overview', document.querySelector('.nav-link.active'));
</script>
</body>
</html>
