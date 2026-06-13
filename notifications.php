<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Notifications | AlloHrayfi</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
:root{
  --bg:#071124;--bg2:#0b1a2e;--text:#e8f4fd;--text2:rgba(232,244,253,0.7);--text3:rgba(232,244,253,0.45);
  --accent:#06b6d4;--accent2:#0891b2;--accent3:rgba(6,182,212,0.12);
  --green:#10b981;--amber:#f59e0b;--red:#ef4444;--purple:#8b5cf6;
  --border:rgba(6,182,212,0.15);--border2:rgba(255,255,255,0.06);
  --nav:rgba(7,17,36,0.97);
}
body{font-family:'Tajawal',sans-serif;background:var(--bg);color:var(--text);min-height:100vh;}
nav{position:fixed;top:0;left:0;right:0;z-index:100;background:var(--nav);backdrop-filter:blur(20px);border-bottom:1px solid var(--border);padding:0 1.5rem;height:60px;display:flex;align-items:center;justify-content:space-between;}
.nav-logo{font-size:1.1rem;font-weight:700;color:var(--accent);text-decoration:none;display:flex;align-items:center;gap:.4rem;}
.nav-links{display:flex;gap:.5rem;}
.nav-btn{padding:.45rem .9rem;border-radius:8px;border:1px solid var(--border2);background:transparent;color:var(--text2);cursor:pointer;font-family:inherit;font-size:.82rem;transition:all .2s;text-decoration:none;display:flex;align-items:center;gap:.35rem;}
.nav-btn:hover{background:var(--accent3);border-color:var(--accent);color:var(--accent);}
.page{max-width:760px;margin:0 auto;padding:80px 1.5rem 3rem;}
/* HEADER */
.page-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.75rem;flex-wrap:wrap;gap:.75rem;}
.page-title{font-size:1.5rem;font-weight:800;display:flex;align-items:center;gap:.6rem;}
.unread-count{background:var(--red);color:#fff;border-radius:20px;padding:.1rem .55rem;font-size:.8rem;font-weight:700;}
.header-actions{display:flex;gap:.5rem;}
.hdr-btn{padding:.45rem .9rem;border-radius:8px;border:1px solid var(--border2);background:transparent;color:var(--text2);font-family:inherit;font-size:.82rem;cursor:pointer;transition:all .2s;}
.hdr-btn:hover{border-color:var(--accent);color:var(--accent);background:var(--accent3);}
/* FILTER TABS */
.filter-tabs{display:flex;gap:.4rem;flex-wrap:wrap;margin-bottom:1.25rem;}
.ftab{padding:.4rem .9rem;border-radius:20px;border:1px solid var(--border2);background:transparent;color:var(--text2);font-family:inherit;font-size:.82rem;cursor:pointer;transition:all .2s;display:flex;align-items:center;gap:.35rem;}
.ftab:hover,.ftab.active{border-color:var(--accent);background:var(--accent3);color:var(--accent);}
.ftab.active{font-weight:700;}
.ftab-count{background:var(--red);color:#fff;border-radius:10px;padding:.05rem .38rem;font-size:.68rem;font-weight:700;}
/* NOTIF GROUPS */
.notif-group{margin-bottom:1.5rem;}
.group-title{font-size:.75rem;font-weight:700;color:var(--text3);text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;padding-left:.25rem;}
/* NOTIF ITEM */
.notif-item{display:flex;align-items:flex-start;gap:.85rem;padding:1rem 1.1rem;border-radius:14px;border:1px solid var(--border2);margin-bottom:.5rem;cursor:pointer;transition:all .25s;position:relative;}
.notif-item.unread{border-color:var(--border);background:rgba(6,182,212,.04);}
.notif-item.unread::before{content:'';position:absolute;left:-1px;top:20%;bottom:20%;width:3px;border-radius:2px;background:var(--accent);}
.notif-item:hover{transform:translateX(3px);border-color:var(--border);}
.notif-icon{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0;}
.notif-body{flex:1;min-width:0;}
.notif-title{font-weight:700;font-size:.9rem;margin-bottom:.2rem;}
.notif-msg{font-size:.82rem;color:var(--text2);line-height:1.5;}
.notif-meta{display:flex;align-items:center;gap:.6rem;margin-top:.45rem;flex-wrap:wrap;}
.notif-time{font-size:.72rem;color:var(--text3);}
.notif-action-btn{padding:.22rem .65rem;border-radius:7px;border:1px solid var(--border);background:transparent;color:var(--accent);font-size:.72rem;cursor:pointer;font-family:inherit;transition:all .2s;}
.notif-action-btn:hover{background:var(--accent3);}
.notif-action-btn.primary{background:var(--accent);color:#fff;border-color:var(--accent);}
.notif-dismiss{width:28px;height:28px;border-radius:8px;border:none;background:transparent;color:var(--text3);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:.85rem;transition:all .2s;flex-shrink:0;margin-top:-.2rem;}
.notif-dismiss:hover{background:rgba(239,68,68,.1);color:var(--red);}
/* EMPTY STATE */
.empty-state{text-align:center;padding:3rem 1rem;color:var(--text3);}
.empty-state i{font-size:3rem;margin-bottom:1rem;display:block;color:var(--border2);}
/* SETTINGS CARD */
.settings-card{background:rgba(255,255,255,.03);border:1px solid var(--border2);border-radius:14px;padding:1.25rem;margin-top:2rem;}
.settings-title{font-size:.95rem;font-weight:700;margin-bottom:1rem;display:flex;align-items:center;gap:.5rem;}
.settings-title i{color:var(--accent);}
.setting-row{display:flex;align-items:center;justify-content:space-between;padding:.6rem 0;border-bottom:1px solid var(--border2);}
.setting-row:last-child{border-bottom:none;}
.setting-label{font-size:.88rem;}
.setting-sub{font-size:.75rem;color:var(--text3);}
.toggle{position:relative;width:40px;height:22px;flex-shrink:0;}
.toggle input{opacity:0;width:0;height:0;}
.toggle-slider{position:absolute;inset:0;background:var(--border2);border-radius:11px;cursor:pointer;transition:.3s;}
.toggle-slider:before{content:'';position:absolute;width:16px;height:16px;left:3px;top:3px;background:#fff;border-radius:50%;transition:.3s;}
.toggle input:checked+.toggle-slider{background:var(--accent);}
.toggle input:checked+.toggle-slider:before{transform:translateX(18px);}
/* TOAST */
.toast{position:fixed;bottom:1.5rem;left:50%;transform:translateX(-50%) translateY(80px);background:var(--bg2);border:1px solid var(--border);border-radius:12px;padding:.75rem 1.25rem;font-size:.88rem;z-index:500;transition:transform .3s;white-space:nowrap;box-shadow:0 8px 30px rgba(0,0,0,.4);}
.toast.show{transform:translateX(-50%) translateY(0);}
@media(max-width:600px){.page{padding:74px 1rem 2rem;}.filter-tabs{gap:.3rem;}.notif-item{padding:.85rem .9rem;}}
</style>
</head>
<body>
<nav>
  <a href="index.php" class="nav-logo"><i class="fas fa-tools"></i> AlloHrayfi</a>
  <div class="nav-links">
    <a href="dashboard.php" class="nav-btn"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="chat.php" class="nav-btn"><i class="fas fa-comment-dots"></i> Chat</a>
  </div>
</nav>

<div class="page">
  <div class="page-header">
    <div class="page-title">
      <i class="fas fa-bell" style="color:var(--accent)"></i>
      Notifications
      <span class="unread-count" id="unreadCount">5</span>
    </div>
    <div class="header-actions">
      <button class="hdr-btn" onclick="markAllRead()"><i class="fas fa-check-double"></i> Tout lire</button>
      <button class="hdr-btn" onclick="clearAll()"><i class="fas fa-trash"></i> Vider</button>
    </div>
  </div>

  <!-- FILTER TABS -->
  <div class="filter-tabs">
    <button class="ftab active" data-filter="all" onclick="setFilter('all',this)">Tous <span class="ftab-count" id="cnt-all">8</span></button>
    <button class="ftab" data-filter="booking" onclick="setFilter('booking',this)">📅 Réservations <span class="ftab-count" id="cnt-booking">2</span></button>
    <button class="ftab" data-filter="message" onclick="setFilter('message',this)">💬 Messages <span class="ftab-count" id="cnt-message">2</span></button>
    <button class="ftab" data-filter="review" onclick="setFilter('review',this)">⭐ Avis <span class="ftab-count" id="cnt-review">1</span></button>
    <button class="ftab" data-filter="devis" onclick="setFilter('devis',this)">📋 Devis <span class="ftab-count" id="cnt-devis">1</span></button>
    <button class="ftab" data-filter="system" onclick="setFilter('system',this)">🔔 Système</button>
  </div>

  <div id="notifContainer"></div>

  <!-- SETTINGS -->
  <div class="settings-card">
    <div class="settings-title"><i class="fas fa-sliders-h"></i> Préférences de notifications</div>
    <div class="setting-row">
      <div><div class="setting-label">Nouvelles réservations</div><div class="setting-sub">Quand un client réserve une intervention</div></div>
      <label class="toggle"><input type="checkbox" checked><div class="toggle-slider"></div></label>
    </div>
    <div class="setting-row">
      <div><div class="setting-label">Nouveaux messages</div><div class="setting-sub">Messages reçus dans le chat</div></div>
      <label class="toggle"><input type="checkbox" checked><div class="toggle-slider"></div></label>
    </div>
    <div class="setting-row">
      <div><div class="setting-label">Avis clients</div><div class="setting-sub">Quand un client vous évalue</div></div>
      <label class="toggle"><input type="checkbox" checked><div class="toggle-slider"></div></label>
    </div>
    <div class="setting-row">
      <div><div class="setting-label">Demandes de devis</div><div class="setting-sub">Nouvelles demandes dans votre zone</div></div>
      <label class="toggle"><input type="checkbox" checked><div class="toggle-slider"></div></label>
    </div>
    <div class="setting-row">
      <div><div class="setting-label">Notifications SMS</div><div class="setting-sub">Recevoir aussi par SMS (+212...)</div></div>
      <label class="toggle"><input type="checkbox" checked><div class="toggle-slider"></div></label>
    </div>
    <div class="setting-row">
      <div><div class="setting-label">Notifications push</div><div class="setting-sub">Via le navigateur / application mobile</div></div>
      <label class="toggle"><input type="checkbox"><div class="toggle-slider"></div></label>
    </div>
    <div class="setting-row">
      <div><div class="setting-label">Résumé hebdomadaire</div><div class="setting-sub">Rapport de performance chaque lundi</div></div>
      <label class="toggle"><input type="checkbox" checked><div class="toggle-slider"></div></label>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
let activeFilter = 'all';

let NOTIFICATIONS = [
  {id:1,type:'booking',icon:'📅',bg:'rgba(6,182,212,.12)',title:'Nouvelle réservation',msg:'<strong>Karim Benali</strong> a réservé une intervention pour demain à 09:00 — Réparation fuite.',time:'Il y a 5 min',unread:true,actions:[{label:'Accepter',primary:true,fn:"acceptBooking(1)"},{label:'Voir',fn:"window.location='booking.php'"}]},
  {id:2,type:'message',icon:'💬',bg:'rgba(139,92,246,.12)',title:'Nouveau message',msg:'<strong>Fatima Zouari</strong> : "Bonjour, est-ce que vous êtes disponible vendredi ?"',time:'Il y a 23 min',unread:true,actions:[{label:'Répondre',primary:true,fn:"window.location='chat.php'"}]},
  {id:3,type:'review',icon:'⭐',bg:'rgba(245,158,11,.12)',title:'Nouvel avis 5 étoiles',msg:'<strong>Hassan Tazi</strong> vous a donné 5 étoiles : "Excellent travail, très professionnel !"',time:'Il y a 1h',unread:true,actions:[{label:'Voir l\'avis',fn:"window.location='artisan-profile.php#reviews'"}]},
  {id:4,type:'booking',icon:'✅',bg:'rgba(16,185,129,.12)',title:'Réservation confirmée',msg:'Votre réservation <strong>AH-002</strong> avec Fatima Zouari a été confirmée pour jeudi 14:00.',time:'Il y a 2h',unread:true,actions:[{label:'Voir détails',fn:"window.location='booking.php'"}]},
  {id:5,type:'devis',icon:'📋',bg:'rgba(96,165,250,.12)',title:'Demande de devis',msg:'<strong>Omar Kadiri</strong> cherche un plombier à Casablanca — Budget: 300 DH. Installation chauffe-eau solaire.',time:'Il y a 3h',unread:true,actions:[{label:'Répondre',primary:true,fn:"window.location='devis.php'"},{label:'Ignorer',fn:"dismissNotif(5)"}]},
  {id:6,type:'message',icon:'💬',bg:'rgba(139,92,246,.12)',title:'Nouveau message',msg:'<strong>Sara Alaoui</strong> : "Combien coûterait le remplacement de la robinetterie ?"',time:'Hier 18:30',unread:false,actions:[{label:'Répondre',fn:"window.location='chat.php'"}]},
  {id:7,type:'system',icon:'🏆',bg:'rgba(245,158,11,.12)',title:'Badge débloqué !',msg:'Félicitations ! Vous avez débloqué le badge <strong>Top Artisan</strong> — 50 missions complétées avec 4.5+.',time:'Hier 10:00',unread:false,actions:[{label:'Voir mon score',fn:"window.location='trust.php'"}]},
  {id:8,type:'system',icon:'📊',bg:'rgba(16,185,129,.12)',title:'Rapport hebdomadaire',msg:'Cette semaine: <strong>6 missions</strong>, <strong>4,200 DH</strong> de revenus, note moyenne <strong>4.9/5</strong>. +12% vs semaine dernière.',time:'Lun 08:00',unread:false,actions:[{label:'Voir dashboard',fn:"window.location='dashboard.php'"}]},
];

function setFilter(filter, btn) {
  activeFilter = filter;
  document.querySelectorAll('.ftab').forEach(t => t.classList.remove('active'));
  btn.classList.add('active');
  renderNotifications();
}

function renderNotifications() {
  const filtered = activeFilter === 'all'
    ? NOTIFICATIONS
    : NOTIFICATIONS.filter(n => n.type === activeFilter);

  const unread = filtered.filter(n => n.unread);
  const read = filtered.filter(n => !n.unread);
  const container = document.getElementById('notifContainer');

  if (!filtered.length) {
    container.innerHTML = `<div class="empty-state"><i class="fas fa-bell-slash"></i><p>Aucune notification dans cette catégorie.</p></div>`;
    return;
  }

  let html = '';
  if (unread.length) {
    html += `<div class="notif-group"><div class="group-title">Non lues (${unread.length})</div>` +
      unread.map(n => buildNotif(n)).join('') + `</div>`;
  }
  if (read.length) {
    html += `<div class="notif-group"><div class="group-title">Lues</div>` +
      read.map(n => buildNotif(n)).join('') + `</div>`;
  }

  container.innerHTML = html;
  document.getElementById('unreadCount').textContent = NOTIFICATIONS.filter(n => n.unread).length;
  updateCounts();
}

function buildNotif(n) {
  return `<div class="notif-item${n.unread?' unread':''}" id="notif-${n.id}" onclick="markRead(${n.id})">
    <div class="notif-icon" style="background:${n.bg};">${n.icon}</div>
    <div class="notif-body">
      <div class="notif-title">${n.title}</div>
      <div class="notif-msg">${n.msg}</div>
      <div class="notif-meta">
        <span class="notif-time"><i class="fas fa-clock"></i> ${n.time}</span>
        ${n.actions.map(a => `<button class="notif-action-btn${a.primary?' primary':''}" onclick="event.stopPropagation();${a.fn}">${a.label}</button>`).join('')}
      </div>
    </div>
    <button class="notif-dismiss" onclick="event.stopPropagation();dismissNotif(${n.id})" title="Supprimer"><i class="fas fa-times"></i></button>
  </div>`;
}

function markRead(id) {
  const n = NOTIFICATIONS.find(x => x.id === id);
  if (n && n.unread) { n.unread = false; renderNotifications(); }
}

function markAllRead() {
  NOTIFICATIONS.forEach(n => n.unread = false);
  renderNotifications();
  showToast('✅ Toutes les notifications marquées comme lues');
}

function dismissNotif(id) {
  NOTIFICATIONS = NOTIFICATIONS.filter(n => n.id !== id);
  renderNotifications();
  showToast('🗑️ Notification supprimée');
}

function clearAll() {
  if (confirm('Supprimer toutes les notifications ?')) {
    NOTIFICATIONS = [];
    renderNotifications();
    showToast('🗑️ Toutes les notifications supprimées');
  }
}

function acceptBooking(id) {
  const n = NOTIFICATIONS.find(x => x.id === id);
  if (n) {
    n.icon = '✅'; n.bg = 'rgba(16,185,129,.12)'; n.title = 'Réservation acceptée';
    n.msg = n.msg.replace('réservé', 'réservation acceptée'); n.unread = false;
    n.actions = [{label:'Voir détails',fn:"window.location='booking.php'"}];
    renderNotifications();
    showToast('✅ Réservation acceptée — Le client sera notifié');
  }
}

function updateCounts() {
  const types = ['booking','message','review','devis'];
  types.forEach(t => {
    const el = document.getElementById('cnt-'+t);
    if (el) {
      const c = NOTIFICATIONS.filter(n => n.type === t && n.unread).length;
      el.textContent = c; el.style.display = c ? 'inline' : 'none';
    }
  });
  const allEl = document.getElementById('cnt-all');
  if (allEl) allEl.textContent = NOTIFICATIONS.filter(n => n.unread).length;
}

function showToast(msg) {
  const el = document.getElementById('toast');
  el.textContent = msg; el.classList.add('show');
  setTimeout(() => el.classList.remove('show'), 2500);
}

renderNotifications();

// Simulate new notification after 8s
setTimeout(() => {
  NOTIFICATIONS.unshift({
    id:99,type:'message',icon:'💬',bg:'rgba(139,92,246,.12)',
    title:'Nouveau message',
    msg:'<strong>Youssef Alami</strong> : "Pouvez-vous passer ce soir ?"',
    time:'À l\'instant',unread:true,
    actions:[{label:'Répondre',primary:true,fn:"window.location='chat.php'"}]
  });
  renderNotifications();
  showToast('🔔 Nouveau message reçu');
}, 8000);
</script>
</body>
</html>
