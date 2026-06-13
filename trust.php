<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Score de Confiance | AlloHrayfi</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&display=swap" rel="stylesheet">
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
.page{max-width:960px;margin:0 auto;padding:80px 1.5rem 3rem;}
/* HERO */
.hero{text-align:center;padding:2rem 1rem 2.5rem;}
.hero h1{font-size:clamp(1.6rem,4vw,2.2rem);font-weight:900;margin-bottom:.5rem;}
.hero p{color:var(--text2);max-width:560px;margin:0 auto;font-size:.95rem;}
/* SCORE DISPLAY */
.score-section{display:flex;flex-direction:column;align-items:center;margin-bottom:2.5rem;}
.score-ring-wrap{position:relative;width:200px;height:200px;margin-bottom:1.25rem;}
.score-ring-wrap svg{transform:rotate(-90deg);}
.score-bg{fill:none;stroke:var(--border2);stroke-width:14;}
.score-fill{fill:none;stroke-width:14;stroke-linecap:round;stroke-dasharray:502;transition:stroke-dashoffset 1.5s cubic-bezier(.4,0,.2,1);}
.score-center{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;}
.score-num{font-size:3rem;font-weight:900;line-height:1;}
.score-max{font-size:.9rem;color:var(--text3);}
.score-level{font-size:.88rem;font-weight:700;margin-top:.2rem;}
.score-subtitle{color:var(--text2);font-size:.88rem;margin-top:.5rem;}
/* LEVEL BADGES */
.levels-row{display:flex;gap:.75rem;justify-content:center;flex-wrap:wrap;margin-bottom:2rem;}
.level-badge{display:flex;flex-direction:column;align-items:center;padding:.75rem 1rem;border-radius:14px;border:1px solid var(--border2);min-width:100px;transition:all .3s;}
.level-badge.current{border-width:2px;}
.level-icon{font-size:1.5rem;margin-bottom:.3rem;}
.level-name{font-size:.78rem;font-weight:700;}
.level-range{font-size:.7rem;color:var(--text3);}
/* FACTORS */
.factors-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1rem;margin-bottom:2rem;}
.factor-card{background:rgba(255,255,255,.03);border:1px solid var(--border2);border-radius:14px;padding:1.1rem;transition:all .3s;}
.factor-card:hover{border-color:var(--border);transform:translateY(-2px);}
.factor-header{display:flex;align-items:center;gap:.75rem;margin-bottom:.85rem;}
.factor-icon{width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;}
.factor-title{font-weight:700;font-size:.9rem;}
.factor-desc{font-size:.75rem;color:var(--text3);}
.factor-score-row{display:flex;align-items:center;gap:.75rem;}
.factor-bar-bg{flex:1;height:8px;background:var(--border2);border-radius:4px;overflow:hidden;}
.factor-bar-fill{height:100%;border-radius:4px;transition:width 1.4s cubic-bezier(.4,0,.2,1);}
.factor-score-val{font-size:.88rem;font-weight:700;min-width:35px;text-align:right;}
.factor-tip{font-size:.75rem;color:var(--text3);margin-top:.6rem;padding-top:.6rem;border-top:1px solid var(--border2);}
.factor-tip i{color:var(--amber);}
/* BADGES */
.badges-section{margin-bottom:2rem;}
.section-title{font-size:1.05rem;font-weight:700;margin-bottom:1rem;display:flex;align-items:center;gap:.5rem;}
.section-title i{color:var(--accent);}
.badges-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:.85rem;}
.badge-card{background:rgba(255,255,255,.03);border:1px solid var(--border2);border-radius:14px;padding:1.1rem;text-align:center;transition:all .3s;position:relative;overflow:hidden;}
.badge-card.earned{border-color:var(--border);}
.badge-card.locked{opacity:.45;filter:grayscale(.8);}
.badge-card:hover.earned{transform:translateY(-3px);box-shadow:0 8px 24px rgba(0,0,0,.3);}
.badge-emoji{font-size:2.2rem;margin-bottom:.5rem;display:block;}
.badge-name{font-size:.85rem;font-weight:700;margin-bottom:.2rem;}
.badge-desc{font-size:.72rem;color:var(--text3);line-height:1.4;}
.badge-earned-label{position:absolute;top:.5rem;right:.5rem;background:var(--green);color:#fff;border-radius:8px;padding:.1rem .45rem;font-size:.65rem;font-weight:700;}
/* VERIFICATION TRACKS */
.tracks-section{margin-bottom:2rem;}
.track-item{background:rgba(255,255,255,.03);border:1px solid var(--border2);border-radius:14px;padding:1.1rem;margin-bottom:.75rem;display:flex;align-items:flex-start;gap:1rem;transition:all .3s;}
.track-item:hover{border-color:var(--border);}
.track-icon{width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0;}
.track-info{flex:1;}
.track-title{font-weight:700;font-size:.92rem;margin-bottom:.2rem;}
.track-desc{font-size:.8rem;color:var(--text2);line-height:1.5;margin-bottom:.5rem;}
.track-action{padding:.35rem .85rem;border-radius:8px;font-size:.78rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all .2s;}
.track-status{display:flex;align-items:center;gap:.4rem;font-size:.78rem;font-weight:700;}
.ts-done{color:var(--green);}
.ts-pending{color:var(--amber);}
.ts-todo{color:var(--text3);}
/* HISTORY */
.history-list{display:flex;flex-direction:column;gap:.6rem;}
.history-item{display:flex;align-items:center;gap:.75rem;padding:.7rem .9rem;background:rgba(255,255,255,.02);border-radius:10px;font-size:.85rem;}
.h-icon{width:30px;height:30px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.8rem;flex-shrink:0;}
.h-text{flex:1;color:var(--text2);}
.h-text strong{color:var(--text);}
.h-change{font-weight:700;}
.h-change.up{color:var(--green);}
.h-change.down{color:var(--red);}
.h-date{font-size:.72rem;color:var(--text3);}
@media(max-width:600px){.page{padding:74px 1rem 2rem;}.factors-grid{grid-template-columns:1fr;}}
</style>
</head>
<body>
<nav>
  <a href="index.php" class="nav-logo"><i class="fas fa-tools"></i> AlloHrayfi</a>
  <div class="nav-links">
    <a href="artisan-profile.php" class="nav-btn"><i class="fas fa-arrow-left"></i> Profil</a>
    <a href="dashboard.php" class="nav-btn"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
  </div>
</nav>

<div class="page">
  <div class="hero">
    <h1>🏆 Score de Confiance AlloHrayfi</h1>
    <p>Votre score reflète votre fiabilité, la qualité de votre travail et votre engagement envers les clients.</p>
  </div>

  <!-- SCORE RING -->
  <div class="score-section">
    <div class="score-ring-wrap">
      <svg viewBox="0 0 180 180" width="200" height="200">
        <circle class="score-bg" cx="90" cy="90" r="80"/>
        <circle class="score-fill" id="scoreRing" cx="90" cy="90" r="80" stroke="#06b6d4"/>
      </svg>
      <div class="score-center">
        <div class="score-num" id="scoreNum" style="color:var(--accent)">0</div>
        <div class="score-max">/ 100</div>
        <div class="score-level" style="color:var(--amber)" id="scoreLevel">—</div>
      </div>
    </div>
    <div class="score-subtitle">Mis à jour en temps réel · Visible sur votre profil public</div>
  </div>

  <!-- LEVELS -->
  <div class="levels-row">
    <div class="level-badge" style="border-color:#94a3b8;" id="lv1"><div class="level-icon">🌱</div><div class="level-name" style="color:#94a3b8">Débutant</div><div class="level-range">0–40</div></div>
    <div class="level-badge" style="border-color:#60a5fa;" id="lv2"><div class="level-icon">⚡</div><div class="level-name" style="color:#60a5fa">Confirmé</div><div class="level-range">41–60</div></div>
    <div class="level-badge" style="border-color:var(--amber);background:rgba(245,158,11,.05);" id="lv3" class="current"><div class="level-icon">🔥</div><div class="level-name" style="color:var(--amber)">Professionnel</div><div class="level-range">61–80</div></div>
    <div class="level-badge" style="border-color:var(--accent);" id="lv4"><div class="level-icon">💎</div><div class="level-name" style="color:var(--accent)">Expert</div><div class="level-range">81–95</div></div>
    <div class="level-badge" style="border-color:#f59e0b;" id="lv5"><div class="level-icon">👑</div><div class="level-name" style="color:#f59e0b">Maâlem</div><div class="level-range">96–100</div></div>
  </div>

  <!-- FACTORS -->
  <div class="section-title"><i class="fas fa-chart-bar"></i> Détail du score</div>
  <div class="factors-grid" id="factorsGrid"></div>

  <!-- BADGES -->
  <div class="badges-section">
    <div class="section-title"><i class="fas fa-medal"></i> Badges & Certifications</div>
    <div class="badges-grid" id="badgesGrid"></div>
  </div>

  <!-- VERIFICATION TRACKS -->
  <div class="tracks-section">
    <div class="section-title"><i class="fas fa-shield-check"></i> Voies de vérification</div>
    <div id="tracksList"></div>
  </div>

  <!-- HISTORY -->
  <div class="section-title"><i class="fas fa-history"></i> Historique du score</div>
  <div class="history-list" id="historyList"></div>
</div>

<script>
const TARGET_SCORE = 78;

const FACTORS = [
  {title:'Avis clients',desc:'Basé sur la note moyenne et le nombre d\'avis.',score:92,color:'#10b981',icon:'⭐',bg:'rgba(16,185,129,.12)',tip:'Vous avez 127 avis avec une moyenne de 4.8/5. Excellent !'},
  {title:'Missions complétées',desc:'Nombre et régularité des missions terminées.',score:85,color:'#06b6d4',icon:'✅',bg:'rgba(6,182,212,.12)',tip:'127 missions complétées. Continuez pour atteindre 150 et débloquer un badge.'},
  {title:'Badges de vérification',desc:'Certificats, portfolio, et vérifications d\'identité.',score:70,color:'#8b5cf6',icon:'🏅',bg:'rgba(139,92,246,.12)',tip:'Ajoutez votre vidéo de présentation (+10 pts) pour améliorer ce score.'},
  {title:'Taux de réponse',desc:'Rapidité et régularité de vos réponses aux clients.',score:88,color:'#f59e0b',icon:'💬',bg:'rgba(245,158,11,.12)',tip:'Répondez en moins d\'1h pour maintenir ce score. Actuellement: 1h 20min.'},
  {title:'Satisfaction client',desc:'Taux de clients satisfaits après intervention.',score:95,color:'#10b981',icon:'😊',bg:'rgba(16,185,129,.12)',tip:'95% de satisfaction. Vous êtes dans le top 5% des artisans !'},
  {title:'Ancienneté plateforme',desc:'Durée de présence active sur AlloHrayfi.',score:60,color:'#60a5fa',icon:'📅',bg:'rgba(96,165,250,.12)',tip:'2 ans sur la plateforme. Le score augmente automatiquement chaque mois.'},
];

const BADGES = [
  {emoji:'🎓',name:'Diplômé',desc:'Certificat professionnel vérifié',earned:true},
  {emoji:'📸',name:'Portfolio Pro',desc:'10+ projets avant/après vérifiés',earned:true},
  {emoji:'👥',name:'Vérifié Clients',desc:'3+ clients ont confirmé votre travail',earned:true},
  {emoji:'⭐',name:'Top Artisan',desc:'50+ missions, avg 4.5+',earned:true},
  {emoji:'⚡',name:'Réponse Rapide',desc:'Répond en moins de 30 min',earned:true},
  {emoji:'🔧',name:'Spécialiste',desc:'Expert dans votre domaine certifié',earned:false},
  {emoji:'🎥',name:'Vidéo Pro',desc:'Vidéo de présentation publiée',earned:false},
  {emoji:'👴',name:'Maâlem',desc:'Reconnu par un maître artisan',earned:false},
  {emoji:'💯',name:'Satisfaction 100%',desc:'30 missions consécutives 5 étoiles',earned:false},
  {emoji:'👑',name:'Elite',desc:'Score de confiance 96+',earned:false},
];

const TRACKS = [
  {icon:'🎓',title:'Voie Diplôme',desc:'Téléversez votre certificat professionnel (OFPPT, CFPA, ISTA) pour obtenir le badge Diplômé et +15 points.',bg:'rgba(6,182,212,.1)',color:var(--accent),status:'done',statusLabel:'Complété'},
  {icon:'📸',title:'Voie Portfolio',desc:'Ajoutez 10 projets avant/après vérifiés par notre équipe. +20 points une fois validé.',bg:'rgba(16,185,129,.1)',status:'done',statusLabel:'Complété'},
  {icon:'👥',title:'Voie Clients',desc:'Invitez 3 anciens clients à confirmer vos travaux via SMS. +15 points par validation.',bg:'rgba(245,158,11,.1)',status:'done',statusLabel:'3/3 confirmés'},
  {icon:'🎥',title:'Voie Vidéo',desc:'Publiez une courte vidéo de présentation (30–60s) et une vidéo de travaux récents. +10 points.',bg:'rgba(139,92,246,.1)',status:'todo',statusLabel:'À faire',action:'Ajouter une vidéo'},
  {icon:'🔧',title:'Test Pratique',desc:'Un inspecteur AlloHrayfi vous évalue sur site (50 DH). Le badge le plus valorisé. +25 points.',bg:'rgba(96,165,250,.1)',status:'todo',statusLabel:'Disponible',action:'Planifier l\'évaluation'},
];

const HISTORY = [
  {icon:'⭐',bg:'rgba(245,158,11,.15)',text:'Nouvel avis <strong>5 étoiles</strong> reçu de Karim M.',change:'+1',dir:'up',date:'Il y a 2h'},
  {icon:'✅',bg:'rgba(16,185,129,.15)',text:'Mission <strong>AH-127</strong> complétée avec succès.',change:'+0.5',dir:'up',date:'Hier'},
  {icon:'💬',bg:'rgba(6,182,212,.15)',text:'Taux de réponse amélioré — réponse en 45 min.',change:'+2',dir:'up',date:'Il y a 3j'},
  {icon:'📸',bg:'rgba(139,92,246,.15)',text:'Portfolio mis à jour avec 2 nouveaux projets.',change:'+3',dir:'up',date:'Il y a 1 sem'},
  {icon:'⚠️',bg:'rgba(245,158,11,.15)',text:'Réservation annulée par l\'artisan.',change:'-2',dir:'down',date:'Il y a 2 sem'},
];

// Render factors
document.getElementById('factorsGrid').innerHTML = FACTORS.map(f => `
  <div class="factor-card">
    <div class="factor-header">
      <div class="factor-icon" style="background:${f.bg};">${f.icon}</div>
      <div><div class="factor-title">${f.title}</div><div class="factor-desc">${f.desc}</div></div>
    </div>
    <div class="factor-score-row">
      <div class="factor-bar-bg"><div class="factor-bar-fill" style="width:0%;background:${f.color};" data-target="${f.score}"></div></div>
      <div class="factor-score-val" style="color:${f.color}">${f.score}</div>
    </div>
    <div class="factor-tip"><i class="fas fa-lightbulb"></i> ${f.tip}</div>
  </div>`).join('');

// Render badges
document.getElementById('badgesGrid').innerHTML = BADGES.map(b => `
  <div class="badge-card${b.earned?' earned':' locked'}">
    ${b.earned?'<div class="badge-earned-label">✓</div>':''}
    <span class="badge-emoji">${b.emoji}</span>
    <div class="badge-name">${b.name}</div>
    <div class="badge-desc">${b.desc}</div>
  </div>`).join('');

// Render tracks
document.getElementById('tracksList').innerHTML = TRACKS.map(t => `
  <div class="track-item">
    <div class="track-icon" style="background:${t.bg};">${t.icon}</div>
    <div class="track-info">
      <div class="track-title">${t.title}</div>
      <div class="track-desc">${t.desc}</div>
      ${t.status==='done'
        ? `<div class="track-status ts-done"><i class="fas fa-check-circle"></i> ${t.statusLabel}</div>`
        : `<button class="track-action" style="background:var(--accent3);border:1px solid var(--border);color:var(--accent);" onclick="alert('${t.action} — fonctionnalité à venir')">${t.action}</button>`}
    </div>
  </div>`).join('');

// Render history
document.getElementById('historyList').innerHTML = HISTORY.map(h => `
  <div class="history-item">
    <div class="h-icon" style="background:${h.bg};">${h.icon}</div>
    <div class="h-text">${h.text}</div>
    <div class="h-change ${h.dir}">${h.dir==='up'?'+':''}${h.change} pts</div>
    <div class="h-date">${h.date}</div>
  </div>`).join('');

// Animate score ring
window.addEventListener('load', () => {
  const circumference = 2 * Math.PI * 80;
  const ring = document.getElementById('scoreRing');
  const numEl = document.getElementById('scoreNum');
  const levelEl = document.getElementById('scoreLevel');

  const levels = [{min:0,max:40,label:'Débutant',color:'#94a3b8'},{min:41,max:60,label:'Confirmé',color:'#60a5fa'},{min:61,max:80,label:'Professionnel',color:'#f59e0b'},{min:81,max:95,label:'Expert',color:'#06b6d4'},{min:96,max:100,label:'Maâlem',color:'#f59e0b'}];
  const lv = levels.find(l => TARGET_SCORE >= l.min && TARGET_SCORE <= l.max);
  ring.style.stroke = lv ? lv.color : '#06b6d4';
  numEl.style.color = lv ? lv.color : '#06b6d4';

  let current = 0;
  const interval = setInterval(() => {
    current = Math.min(current + 1, TARGET_SCORE);
    numEl.textContent = current;
    ring.style.strokeDashoffset = circumference - (current / 100) * circumference;
    if (current === TARGET_SCORE) {
      clearInterval(interval);
      levelEl.textContent = lv ? lv.label : '';
      levelEl.style.color = lv ? lv.color : '#fff';
    }
  }, 15);

  // Animate factor bars
  setTimeout(() => {
    document.querySelectorAll('.factor-bar-fill').forEach(bar => {
      bar.style.width = bar.dataset.target + '%';
    });
  }, 300);
});
</script>
</body>
</html>
