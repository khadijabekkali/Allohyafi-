<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chat | AlloHrayfi</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
:root{
  --bg:#071124;--bg2:#0b1a2e;--bg3:#0f2040;
  --text:#e8f4fd;--text2:rgba(232,244,253,0.7);--text3:rgba(232,244,253,0.45);
  --accent:#06b6d4;--accent2:#0891b2;--accent3:rgba(6,182,212,0.12);
  --green:#10b981;--red:#ef4444;--amber:#f59e0b;
  --border:rgba(6,182,212,0.15);--border2:rgba(255,255,255,0.06);
  --card:rgba(255,255,255,0.03);--nav:rgba(7,17,36,0.95);
}
html,body{height:100%;overflow:hidden;}
body{font-family:'Tajawal',sans-serif;background:var(--bg);color:var(--text);display:flex;flex-direction:column;}
/* NAV */
nav{background:var(--nav);backdrop-filter:blur(20px);border-bottom:1px solid var(--border);padding:0 1.5rem;height:64px;display:flex;align-items:center;justify-content:space-between;flex-shrink:0;z-index:10;}
.nav-logo{display:flex;align-items:center;gap:.5rem;font-size:1.2rem;font-weight:700;color:var(--accent);text-decoration:none;}
.nav-btn{padding:.5rem 1rem;border-radius:8px;border:1px solid var(--border);background:transparent;color:var(--text2);cursor:pointer;font-family:inherit;font-size:.85rem;transition:all .2s;text-decoration:none;display:flex;align-items:center;gap:.4rem;}
.nav-btn:hover{background:var(--accent3);border-color:var(--accent);color:var(--accent);}
.nav-links{display:flex;gap:.5rem;}
/* CHAT LAYOUT */
.chat-layout{display:flex;flex:1;overflow:hidden;}
/* SIDEBAR */
.chat-sidebar{width:300px;border-right:1px solid var(--border2);display:flex;flex-direction:column;flex-shrink:0;}
@media(max-width:768px){.chat-sidebar{width:70px;}}
.sidebar-header{padding:1rem;border-bottom:1px solid var(--border2);}
.search-conv{width:100%;padding:.6rem .85rem;border-radius:8px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text);font-family:inherit;font-size:.85rem;}
.search-conv:focus{outline:none;border-color:var(--accent);}
.search-conv::placeholder{color:var(--text3);}
@media(max-width:768px){.search-conv{display:none;}}
.conv-list{flex:1;overflow-y:auto;padding:.5rem;}
.conv-list::-webkit-scrollbar{width:4px;}
.conv-list::-webkit-scrollbar-thumb{background:var(--border2);border-radius:2px;}
.conv-item{display:flex;align-items:center;gap:.75rem;padding:.75rem .6rem;border-radius:10px;cursor:pointer;transition:all .2s;position:relative;}
.conv-item:hover{background:rgba(255,255,255,.04);}
.conv-item.active{background:var(--accent3);border:1px solid var(--border);}
.conv-avatar{width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent2));display:flex;align-items:center;justify-content:center;font-weight:700;font-size:1rem;color:#fff;flex-shrink:0;position:relative;}
.online-dot{position:absolute;bottom:1px;right:1px;width:10px;height:10px;border-radius:50%;background:var(--green);border:2px solid var(--bg);}
.conv-info{flex:1;min-width:0;}
.conv-name{font-weight:600;font-size:.9rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.conv-last{font-size:.78rem;color:var(--text3);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin-top:.15rem;}
.conv-meta{display:flex;flex-direction:column;align-items:flex-end;gap:.3rem;flex-shrink:0;}
.conv-time{font-size:.72rem;color:var(--text3);}
.conv-badge{background:var(--accent);color:#fff;border-radius:10px;padding:.1rem .45rem;font-size:.72rem;font-weight:700;}
@media(max-width:768px){.conv-info,.conv-meta{display:none;}}
/* CHAT MAIN */
.chat-main{flex:1;display:flex;flex-direction:column;overflow:hidden;}
/* CHAT HEADER */
.chat-header{padding:1rem 1.5rem;border-bottom:1px solid var(--border2);display:flex;align-items:center;justify-content:space-between;background:rgba(255,255,255,.02);}
.chat-header-left{display:flex;align-items:center;gap:.85rem;}
.chat-header-avatar{width:42px;height:42px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent2));display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;}
.chat-header-name{font-weight:700;font-size:1rem;}
.chat-header-status{font-size:.78rem;color:var(--green);display:flex;align-items:center;gap:.3rem;}
.chat-header-actions{display:flex;gap:.5rem;}
.icon-btn{width:36px;height:36px;border-radius:8px;border:1px solid var(--border2);background:transparent;color:var(--text2);cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .2s;}
.icon-btn:hover{border-color:var(--accent);color:var(--accent);background:var(--accent3);}
/* MESSAGES */
.messages-area{flex:1;overflow-y:auto;padding:1.5rem;display:flex;flex-direction:column;gap:.75rem;}
.messages-area::-webkit-scrollbar{width:4px;}
.messages-area::-webkit-scrollbar-thumb{background:var(--border2);border-radius:2px;}
.msg-date-divider{text-align:center;color:var(--text3);font-size:.75rem;padding:.5rem 0;position:relative;}
.msg-date-divider::before,.msg-date-divider::after{content:'';position:absolute;top:50%;width:30%;height:1px;background:var(--border2);}
.msg-date-divider::before{left:5%;}
.msg-date-divider::after{right:5%;}
.msg-row{display:flex;gap:.75rem;align-items:flex-end;animation:msgIn .25s ease;}
@keyframes msgIn{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:translateY(0)}}
.msg-row.own{flex-direction:row-reverse;}
.msg-avatar{width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#6366f1,#4f46e5);display:flex;align-items:center;justify-content:center;font-size:.78rem;font-weight:700;color:#fff;flex-shrink:0;}
.msg-row.own .msg-avatar{background:linear-gradient(135deg,var(--accent),var(--accent2));}
.msg-bubble{max-width:70%;padding:.75rem 1rem;border-radius:16px;font-size:.9rem;line-height:1.5;position:relative;}
.msg-row:not(.own) .msg-bubble{background:rgba(255,255,255,.06);border:1px solid var(--border2);border-bottom-left-radius:4px;}
.msg-row.own .msg-bubble{background:linear-gradient(135deg,var(--accent),var(--accent2));color:#fff;border-bottom-right-radius:4px;}
.msg-time{font-size:.7rem;opacity:.6;margin-top:.35rem;display:block;}
.msg-row.own .msg-time{text-align:right;}
.msg-status{font-size:.7rem;opacity:.7;margin-top:.2rem;text-align:right;}
/* IMAGE MSG */
.msg-image{max-width:220px;border-radius:10px;cursor:pointer;margin-top:.25rem;}
/* LOCATION MSG */
.location-msg{background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.2);border-radius:10px;padding:.6rem .9rem;display:flex;align-items:center;gap:.5rem;font-size:.85rem;color:var(--green);cursor:pointer;margin-top:.25rem;}
/* FILE MSG */
.file-msg{background:rgba(255,255,255,.05);border:1px solid var(--border2);border-radius:10px;padding:.6rem .9rem;display:flex;align-items:center;gap:.6rem;font-size:.85rem;cursor:pointer;margin-top:.25rem;}
.file-msg i{font-size:1.2rem;color:var(--accent);}
/* TYPING */
.typing-indicator{display:flex;align-items:center;gap:.5rem;padding:.5rem 0;color:var(--text3);font-size:.82rem;}
.typing-dots{display:flex;gap:3px;}
.typing-dot{width:6px;height:6px;border-radius:50%;background:var(--text3);animation:bounce .8s infinite;}
.typing-dot:nth-child(2){animation-delay:.15s;}
.typing-dot:nth-child(3){animation-delay:.3s;}
@keyframes bounce{0%,60%,100%{transform:translateY(0)}30%{transform:translateY(-6px)}}
/* INPUT AREA */
.input-area{padding:1rem 1.5rem;border-top:1px solid var(--border2);background:rgba(255,255,255,.02);}
.input-toolbar{display:flex;gap:.4rem;margin-bottom:.5rem;}
.tool-btn{background:transparent;border:none;color:var(--text3);cursor:pointer;padding:.3rem .45rem;border-radius:6px;transition:all .2s;font-size:.95rem;}
.tool-btn:hover{color:var(--accent);background:var(--accent3);}
.input-row{display:flex;gap:.6rem;align-items:flex-end;}
.msg-input{flex:1;padding:.75rem 1rem;border-radius:12px;border:1px solid var(--border2);background:rgba(255,255,255,.04);color:var(--text);font-family:inherit;font-size:.9rem;resize:none;max-height:120px;line-height:1.5;transition:border-color .25s;}
.msg-input:focus{outline:none;border-color:var(--accent);}
.msg-input::placeholder{color:var(--text3);}
.send-btn{width:44px;height:44px;border-radius:12px;border:none;background:linear-gradient(135deg,var(--accent),var(--accent2));color:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:1rem;transition:all .25s;flex-shrink:0;}
.send-btn:hover{transform:scale(1.05);box-shadow:0 4px 15px rgba(6,182,212,.4);}
/* BOOKING QUICK CARD */
.booking-card-msg{background:linear-gradient(135deg,rgba(6,182,212,.1),rgba(8,145,178,.05));border:1px solid var(--border);border-radius:12px;padding:.85rem 1rem;margin-top:.25rem;max-width:280px;}
.booking-card-msg h4{font-size:.88rem;font-weight:700;margin-bottom:.3rem;}
.booking-card-msg p{font-size:.78rem;color:var(--text2);margin-bottom:.5rem;}
.booking-card-msg a{font-size:.8rem;color:var(--accent);text-decoration:none;border:1px solid var(--accent);padding:.25rem .65rem;border-radius:6px;display:inline-block;}
</style>
</head>
<body>
<nav>
  <a href="index.php" class="nav-logo"><i class="fas fa-tools"></i> AlloHrayfi</a>
  <div class="nav-links">
    <a href="annonce.php" class="nav-btn"><i class="fas fa-search"></i> Artisans</a>
    <a href="booking.php" class="nav-btn"><i class="fas fa-calendar"></i> Réserver</a>
    <a href="dashboard.php" class="nav-btn"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
  </div>
</nav>

<div class="chat-layout">
  <!-- SIDEBAR -->
  <div class="chat-sidebar">
    <div class="sidebar-header">
      <input type="text" class="search-conv" placeholder="🔍 Rechercher une conversation..." oninput="filterConvs(this.value)">
    </div>
    <div class="conv-list" id="convList"></div>
  </div>

  <!-- MAIN CHAT -->
  <div class="chat-main">
    <div class="chat-header">
      <div class="chat-header-left">
        <div class="chat-header-avatar" id="headerAvatar">A</div>
        <div>
          <div class="chat-header-name" id="headerName">Ahmed Benhaddou</div>
          <div class="chat-header-status"><span style="width:7px;height:7px;border-radius:50%;background:var(--green);display:inline-block;"></span> En ligne</div>
        </div>
      </div>
      <div class="chat-header-actions">
        <button class="icon-btn" title="Appel" onclick="alert('Fonctionnalité appel — intégration VoIP requise')"><i class="fas fa-phone"></i></button>
        <button class="icon-btn" title="Voir profil" onclick="window.location='artisan-profile.php'"><i class="fas fa-user"></i></button>
        <button class="icon-btn" title="Réserver" onclick="window.location='booking.php'"><i class="fas fa-calendar-check"></i></button>
      </div>
    </div>

    <div class="messages-area" id="messagesArea"></div>

    <div class="input-area">
      <div class="input-toolbar">
        <button class="tool-btn" title="Envoyer une image" onclick="sendImage()"><i class="fas fa-image"></i></button>
        <button class="tool-btn" title="Envoyer un fichier" onclick="sendFile()"><i class="fas fa-paperclip"></i></button>
        <button class="tool-btn" title="Partager ma position" onclick="sendLocation()"><i class="fas fa-map-marker-alt"></i></button>
        <button class="tool-btn" title="Proposer une réservation" onclick="sendBookingCard()"><i class="fas fa-calendar-plus"></i></button>
        <button class="tool-btn" title="Emoji" onclick="toggleEmoji()"><i class="fas fa-smile"></i></button>
      </div>
      <div id="emojiBar" style="display:none;flex-wrap:wrap;gap:.3rem;margin-bottom:.5rem;">
        🙂 😊 👍 🔧 🏠 ✅ ⭐ 🙏 💪 📍 💰 📅
        <small style="color:var(--text3);margin-left:.5rem;cursor:pointer;" onclick="toggleEmoji()">fermer</small>
      </div>
      <div class="input-row">
        <textarea class="msg-input" id="msgInput" rows="1" placeholder="Écrivez votre message..." onkeydown="handleKey(event)" oninput="autoResize(this)"></textarea>
        <button class="send-btn" onclick="sendMessage()"><i class="fas fa-paper-plane"></i></button>
      </div>
    </div>
  </div>
</div>

<script>
const CONVERSATIONS = [
  {id:1,name:'Ahmed Benhaddou',specialty:'Plombier',initial:'A',online:true,unread:2,time:'14:32',last:'D\'accord, je serai là demain matin'},
  {id:2,name:'Khalid Mansouri',specialty:'Électricien',initial:'K',online:false,unread:0,time:'Hier',last:'Merci pour votre confiance !'},
  {id:3,name:'Youssef Alami',specialty:'Menuisier',initial:'Y',online:true,unread:1,time:'Lun',last:'Je peux commencer lundi'},
  {id:4,name:'Hassan Tazi',specialty:'Peintre',initial:'H',online:false,unread:0,time:'Dim',last:'Devis envoyé par message'},
  {id:5,name:'Omar Chraibi',specialty:'Carreleur',initial:'O',online:true,unread:0,time:'Sam',last:'Parfait, à bientôt'},
];

let activeConv = 1;
const MESSAGES = {
  1:[
    {own:false,text:'Bonjour ! J\'ai vu votre demande pour une réparation de fuite.',time:'10:15',type:'text'},
    {own:true,text:'Oui bonjour, c\'est urgent, ça fuit sous l\'évier depuis ce matin.',time:'10:18',type:'text'},
    {own:false,text:'Je comprends. Pouvez-vous m\'envoyer une photo du problème ?',time:'10:20',type:'text'},
    {own:true,text:'',time:'10:22',type:'image',src:'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=300&q=80'},
    {own:false,text:'Je vois. C\'est le joint du siphon qui est usé. Je peux passer demain matin entre 9h et 11h. Estimation: 150–200 DH.',time:'10:25',type:'text'},
    {own:true,text:'Parfait ! Voici mon adresse exacte :',time:'10:27',type:'text'},
    {own:true,text:'',time:'10:27',type:'location',address:'12 Rue Ibn Sina, Maarif, Casablanca'},
    {own:false,text:'',time:'10:30',type:'booking',title:'Réservation proposée',detail:'Demain 09:00 · Réparation fuite · 200 DH'},
    {own:false,text:'D\'accord, je serai là demain matin',time:'14:32',type:'text'},
  ],
  2:[{own:false,text:'Merci pour votre confiance !',time:'Hier',type:'text'}],
  3:[{own:false,text:'Je peux commencer lundi',time:'Lun',type:'text'}],
  4:[{own:false,text:'Devis envoyé par message',time:'Dim',type:'text'}],
  5:[{own:false,text:'Parfait, à bientôt',time:'Sam',type:'text'}],
};

function renderConvList(filter='') {
  const el = document.getElementById('convList');
  el.innerHTML = CONVERSATIONS
    .filter(c => c.name.toLowerCase().includes(filter.toLowerCase()))
    .map(c => `
    <div class="conv-item${c.id===activeConv?' active':''}" onclick="openConv(${c.id})">
      <div class="conv-avatar">${c.initial}${c.online?'<div class="online-dot"></div>':''}</div>
      <div class="conv-info">
        <div class="conv-name">${c.name}</div>
        <div class="conv-last">${c.last}</div>
      </div>
      <div class="conv-meta">
        <div class="conv-time">${c.time}</div>
        ${c.unread?`<div class="conv-badge">${c.unread}</div>`:''}
      </div>
    </div>`).join('');
}

function openConv(id) {
  activeConv = id;
  const conv = CONVERSATIONS.find(c => c.id === id);
  conv.unread = 0;
  document.getElementById('headerAvatar').textContent = conv.initial;
  document.getElementById('headerName').textContent = conv.name;
  renderConvList();
  renderMessages();
  if(!MESSAGES[id]) MESSAGES[id]=[];
}

function filterConvs(v) { renderConvList(v); }

function renderMessages() {
  const msgs = MESSAGES[activeConv] || [];
  const el = document.getElementById('messagesArea');
  el.innerHTML = `<div class="msg-date-divider">Aujourd'hui</div>` +
    msgs.map(m => buildMsg(m)).join('');
  el.scrollTop = el.scrollHeight;
}

function buildMsg(m) {
  let content = '';
  if(m.type==='text') content = `<div>${m.text}</div>`;
  else if(m.type==='image') content = `<img src="${m.src}" class="msg-image" onclick="window.open('${m.src}')">`;
  else if(m.type==='location') content = `<div class="location-msg"><i class="fas fa-map-marker-alt"></i>${m.address}</div>`;
  else if(m.type==='file') content = `<div class="file-msg"><i class="fas fa-file-pdf"></i><div><div style="font-weight:600;">${m.filename}</div><div style="font-size:.75rem;color:var(--text3);">${m.size}</div></div></div>`;
  else if(m.type==='booking') content = `<div class="booking-card-msg"><h4>📅 ${m.title}</h4><p>${m.detail}</p><a href="booking.php">Confirmer la réservation</a></div>`;
  return `<div class="msg-row${m.own?' own':''}">
    <div class="msg-avatar">${m.own?'M':'A'}</div>
    <div>
      <div class="msg-bubble">${content}<span class="msg-time">${m.time}${m.own?' <i class="fas fa-check-double" style="font-size:.65rem;"></i>':''}</span></div>
    </div>
  </div>`;
}

function sendMessage() {
  const input = document.getElementById('msgInput');
  const text = input.value.trim();
  if(!text) return;
  if(!MESSAGES[activeConv]) MESSAGES[activeConv]=[];
  const now = new Date();
  MESSAGES[activeConv].push({own:true,text,time:now.getHours()+':'+(now.getMinutes()<10?'0':'')+now.getMinutes(),type:'text'});
  input.value=''; input.style.height='auto';
  renderMessages();
  // Simulate reply after 1.5s
  setTimeout(() => {
    const replies = ['Je comprends, je vais vérifier ça.','D\'accord, pas de problème !','Je vous confirme ça très vite.','Merci pour l\'info, à bientôt.'];
    MESSAGES[activeConv].push({own:false,text:replies[Math.floor(Math.random()*replies.length)],time:now.getHours()+':'+(now.getMinutes()<10?'0':'')+now.getMinutes(),type:'text'});
    renderMessages();
  }, 1500);
}

function handleKey(e) { if(e.key==='Enter'&&!e.shiftKey){e.preventDefault();sendMessage();} }
function autoResize(t){t.style.height='auto';t.style.height=Math.min(t.scrollHeight,120)+'px';}

function sendImage() {
  MESSAGES[activeConv].push({own:true,type:'image',src:'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=300&q=80',time:new Date().toTimeString().slice(0,5)});
  renderMessages();
}
function sendFile() {
  MESSAGES[activeConv].push({own:true,type:'file',filename:'Devis_plomberie.pdf',size:'124 KB',time:new Date().toTimeString().slice(0,5)});
  renderMessages();
}
function sendLocation() {
  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(
      ()=>{ MESSAGES[activeConv].push({own:true,type:'location',address:'Ma position actuelle · Casablanca',time:new Date().toTimeString().slice(0,5)}); renderMessages(); },
      ()=>{ MESSAGES[activeConv].push({own:true,type:'location',address:'Maarif, Casablanca (partagé)',time:new Date().toTimeString().slice(0,5)}); renderMessages(); }
    );
  }
}
function sendBookingCard() {
  MESSAGES[activeConv].push({own:true,type:'booking',title:'Demande de réservation',detail:'Demain · Service à confirmer',time:new Date().toTimeString().slice(0,5)});
  renderMessages();
}
function toggleEmoji() {
  const bar = document.getElementById('emojiBar');
  bar.style.display = bar.style.display==='none'?'flex':'none';
}
document.querySelectorAll && document.addEventListener('click',e=>{
  if(e.target.textContent && ['🙂','😊','👍','🔧','🏠','✅','⭐','🙏','💪','📍','💰','📅'].includes(e.target.textContent.trim())){
    const inp=document.getElementById('msgInput');
    inp.value+=e.target.textContent.trim();
    inp.focus();
  }
});

renderConvList();
renderMessages();
</script>
</body>
</html>
