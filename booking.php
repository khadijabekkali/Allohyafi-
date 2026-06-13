<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Réservation | AlloHrayfi</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
:root{
  --bg:#071124;--bg2:#0b1a2e;--bg3:#0f2040;
  --text:#e8f4fd;--text2:rgba(232,244,253,0.7);--text3:rgba(232,244,253,0.45);
  --accent:#06b6d4;--accent2:#0891b2;--accent3:rgba(6,182,212,0.12);
  --green:#10b981;--red:#ef4444;--amber:#f59e0b;--purple:#8b5cf6;
  --border:rgba(6,182,212,0.15);--border2:rgba(255,255,255,0.06);
  --card:rgba(255,255,255,0.03);--shadow:0 8px 40px rgba(0,0,0,0.5);
  --nav:rgba(7,17,36,0.95);
}
body{font-family:'Tajawal',sans-serif;background:var(--bg);color:var(--text);min-height:100vh;}
/* NAV */
nav{position:fixed;top:0;left:0;right:0;z-index:100;background:var(--nav);backdrop-filter:blur(20px);border-bottom:1px solid var(--border);padding:0 2rem;height:64px;display:flex;align-items:center;justify-content:space-between;}
.nav-logo{display:flex;align-items:center;gap:.5rem;font-size:1.2rem;font-weight:700;color:var(--accent);text-decoration:none;}
.nav-logo i{font-size:1.4rem;}
.nav-links{display:flex;align-items:center;gap:.5rem;}
.nav-btn{padding:.5rem 1.1rem;border-radius:8px;border:1px solid var(--border);background:transparent;color:var(--text2);cursor:pointer;font-family:inherit;font-size:.85rem;transition:all .2s;text-decoration:none;display:flex;align-items:center;gap:.4rem;}
.nav-btn:hover,.nav-btn.active{background:var(--accent3);border-color:var(--accent);color:var(--accent);}
/* PAGE */
.page{max-width:1100px;margin:0 auto;padding:84px 1.5rem 3rem;}
.page-title{font-size:1.8rem;font-weight:800;margin-bottom:.4rem;}
.page-subtitle{color:var(--text2);margin-bottom:2rem;font-size:.95rem;}
.booking-grid{display:grid;grid-template-columns:1fr 360px;gap:1.5rem;}
@media(max-width:900px){.booking-grid{grid-template-columns:1fr;}}
/* CARDS */
.card{background:var(--card);border:1px solid var(--border2);border-radius:16px;padding:1.5rem;margin-bottom:1.25rem;}
.card-title{font-size:1rem;font-weight:700;margin-bottom:1.25rem;display:flex;align-items:center;gap:.5rem;color:var(--text);}
.card-title i{color:var(--accent);}
/* ARTISAN SUMMARY */
.artisan-summary{display:flex;align-items:center;gap:1rem;}
.artisan-avatar{width:60px;height:60px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent2));display:flex;align-items:center;justify-content:center;font-size:1.5rem;font-weight:700;color:#fff;flex-shrink:0;}
.artisan-info h3{font-size:1.1rem;font-weight:700;}
.artisan-info p{color:var(--text2);font-size:.85rem;margin:.2rem 0;}
.artisan-rating{display:flex;align-items:center;gap:.3rem;font-size:.85rem;}
.stars{color:var(--amber);}
/* FORM */
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem;}
@media(max-width:600px){.form-row{grid-template-columns:1fr;}}
.form-group{margin-bottom:1rem;}
.form-label{display:block;font-size:.82rem;font-weight:600;color:var(--text2);margin-bottom:.45rem;text-transform:uppercase;letter-spacing:.05em;}
.form-input{width:100%;padding:.75rem 1rem;border-radius:10px;border:1px solid var(--border2);background:rgba(255,255,255,0.04);color:var(--text);font-family:inherit;font-size:.9rem;transition:all .25s;appearance:none;}
.form-input:focus{outline:none;border-color:var(--accent);background:rgba(6,182,212,0.05);box-shadow:0 0 0 3px rgba(6,182,212,0.1);}
.form-input::placeholder{color:var(--text3);}
.form-input option{background:#0b1a2e;}
textarea.form-input{resize:vertical;min-height:100px;}
/* CALENDAR */
.calendar-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;}
.cal-nav{background:transparent;border:1px solid var(--border2);color:var(--text2);width:34px;height:34px;border-radius:8px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .2s;}
.cal-nav:hover{border-color:var(--accent);color:var(--accent);}
.cal-month{font-weight:700;font-size:1rem;}
.calendar-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:4px;}
.cal-day-name{text-align:center;font-size:.72rem;color:var(--text3);padding:.3rem 0;font-weight:600;}
.cal-day{text-align:center;padding:.55rem .2rem;border-radius:8px;cursor:pointer;font-size:.85rem;transition:all .2s;border:1px solid transparent;}
.cal-day:hover:not(.disabled):not(.empty){background:var(--accent3);border-color:var(--accent);color:var(--accent);}
.cal-day.selected{background:var(--accent);color:#fff;font-weight:700;}
.cal-day.today{border-color:var(--accent);color:var(--accent);}
.cal-day.disabled{color:var(--text3);cursor:not-allowed;}
.cal-day.empty{cursor:default;}
/* TIME SLOTS */
.time-slots{display:grid;grid-template-columns:repeat(4,1fr);gap:.5rem;margin-top:.5rem;}
.time-slot{padding:.5rem .3rem;border-radius:8px;border:1px solid var(--border2);background:transparent;color:var(--text2);font-size:.78rem;text-align:center;cursor:pointer;transition:all .2s;font-family:inherit;}
.time-slot:hover:not(.booked){border-color:var(--accent);color:var(--accent);background:var(--accent3);}
.time-slot.selected{background:var(--accent);color:#fff;border-color:var(--accent);}
.time-slot.booked{background:rgba(239,68,68,.1);border-color:rgba(239,68,68,.2);color:rgba(239,68,68,.5);cursor:not-allowed;text-decoration:line-through;}
/* URGENCY */
.urgency-options{display:grid;grid-template-columns:repeat(3,1fr);gap:.6rem;}
.urgency-btn{padding:.7rem .5rem;border-radius:10px;border:1px solid var(--border2);background:transparent;color:var(--text2);text-align:center;cursor:pointer;font-family:inherit;font-size:.82rem;transition:all .25s;}
.urgency-btn i{display:block;font-size:1.1rem;margin-bottom:.3rem;}
.urgency-btn:hover{border-color:var(--accent);color:var(--accent);}
.urgency-btn.active.low{border-color:var(--green);color:var(--green);background:rgba(16,185,129,.1);}
.urgency-btn.active.medium{border-color:var(--amber);color:var(--amber);background:rgba(245,158,11,.1);}
.urgency-btn.active.high{border-color:var(--red);color:var(--red);background:rgba(239,68,68,.1);}
/* PAYMENT */
.payment-options{display:flex;flex-direction:column;gap:.6rem;}
.payment-opt{display:flex;align-items:center;gap:.75rem;padding:.85rem 1rem;border-radius:10px;border:1px solid var(--border2);cursor:pointer;transition:all .25s;}
.payment-opt:hover{border-color:var(--accent);}
.payment-opt.selected{border-color:var(--accent);background:var(--accent3);}
.payment-opt input[type=radio]{accent-color:var(--accent);width:16px;height:16px;}
.payment-icon{width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;}
.payment-opt-info{flex:1;}
.payment-opt-name{font-weight:600;font-size:.9rem;}
.payment-opt-desc{font-size:.75rem;color:var(--text3);}
/* SUMMARY CARD */
.summary-card{background:linear-gradient(135deg,rgba(6,182,212,0.08),rgba(8,145,178,0.04));border:1px solid var(--border);border-radius:16px;padding:1.5rem;position:sticky;top:84px;}
.summary-title{font-size:1rem;font-weight:700;margin-bottom:1.25rem;padding-bottom:.75rem;border-bottom:1px solid var(--border2);}
.summary-row{display:flex;justify-content:space-between;align-items:center;padding:.5rem 0;font-size:.9rem;}
.summary-row .label{color:var(--text2);}
.summary-row .value{font-weight:600;}
.summary-row.total{border-top:1px solid var(--border2);margin-top:.5rem;padding-top:.75rem;font-size:1.05rem;}
.summary-row.total .value{color:var(--accent);font-size:1.2rem;}
.summary-badge{display:flex;align-items:center;gap:.4rem;padding:.5rem .85rem;border-radius:8px;font-size:.78rem;margin-bottom:.75rem;}
.badge-green{background:rgba(16,185,129,.1);color:var(--green);border:1px solid rgba(16,185,129,.2);}
.badge-amber{background:rgba(245,158,11,.1);color:var(--amber);border:1px solid rgba(245,158,11,.2);}
/* SUBMIT */
.submit-btn{width:100%;padding:1rem;border:none;border-radius:12px;background:linear-gradient(135deg,var(--accent),var(--accent2));color:#fff;font-size:1rem;font-weight:700;cursor:pointer;font-family:inherit;transition:all .3s;display:flex;align-items:center;justify-content:center;gap:.5rem;margin-top:1rem;}
.submit-btn:hover{transform:translateY(-2px);box-shadow:0 8px 30px rgba(6,182,212,.4);}
/* STATUS TRACKER */
.status-tracker{display:flex;align-items:center;margin:1.5rem 0;}
.status-step{display:flex;flex-direction:column;align-items:center;flex:1;position:relative;}
.status-step:not(:last-child)::after{content:'';position:absolute;top:15px;left:50%;width:100%;height:2px;background:var(--border2);z-index:0;}
.status-step.done::after{background:var(--accent);}
.step-dot{width:30px;height:30px;border-radius:50%;border:2px solid var(--border2);background:var(--bg);display:flex;align-items:center;justify-content:center;font-size:.75rem;position:relative;z-index:1;transition:all .3s;}
.status-step.done .step-dot{border-color:var(--accent);background:var(--accent);color:#fff;}
.status-step.active .step-dot{border-color:var(--accent);color:var(--accent);box-shadow:0 0 0 4px rgba(6,182,212,.2);}
.step-label{font-size:.72rem;color:var(--text3);margin-top:.4rem;text-align:center;}
.status-step.done .step-label,.status-step.active .step-label{color:var(--accent);}
/* SUCCESS */
.success-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.7);backdrop-filter:blur(8px);z-index:200;align-items:center;justify-content:center;}
.success-overlay.show{display:flex;}
.success-box{background:var(--bg2);border:1px solid var(--border);border-radius:24px;padding:2.5rem;text-align:center;max-width:400px;width:90%;animation:popIn .4s cubic-bezier(.175,.885,.32,1.275);}
@keyframes popIn{from{opacity:0;transform:scale(.8)}to{opacity:1;transform:scale(1)}}
.success-icon{width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,var(--green),#059669);display:flex;align-items:center;justify-content:center;font-size:2rem;color:#fff;margin:0 auto 1.25rem;}
.success-box h2{font-size:1.4rem;font-weight:800;margin-bottom:.5rem;}
.success-box p{color:var(--text2);font-size:.9rem;line-height:1.6;margin-bottom:1.5rem;}
.success-id{background:var(--accent3);border:1px solid var(--border);border-radius:10px;padding:.75rem;margin-bottom:1.5rem;font-family:monospace;font-size:1.1rem;color:var(--accent);letter-spacing:.1em;}
</style>
</head>
<body>
<nav>
  <a href="index.php" class="nav-logo"><i class="fas fa-tools"></i> AlloHrayfi</a>
  <div class="nav-links">
    <a href="annonce.php" class="nav-btn"><i class="fas fa-arrow-left"></i> Artisans</a>
    <a href="chat.php" class="nav-btn"><i class="fas fa-comment-dots"></i> Chat</a>
    <a href="dashboard.php" class="nav-btn"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
  </div>
</nav>

<div class="page">
  <h1 class="page-title">📅 Réserver une intervention</h1>
  <p class="page-subtitle">Planifiez votre rendez-vous avec l'artisan</p>

  <!-- STATUS TRACKER -->
  <div class="status-tracker">
    <div class="status-step done" id="step1"><div class="step-dot"><i class="fas fa-check"></i></div><div class="step-label">Artisan</div></div>
    <div class="status-step active" id="step2"><div class="step-dot">2</div><div class="step-label">Date & Service</div></div>
    <div class="status-step" id="step3"><div class="step-dot">3</div><div class="step-label">Paiement</div></div>
    <div class="status-step" id="step4"><div class="step-dot">4</div><div class="step-label">Confirmation</div></div>
  </div>

  <div class="booking-grid">
    <div>
      <!-- ARTISAN -->
      <div class="card">
        <div class="card-title"><i class="fas fa-user-hard-hat"></i> Artisan sélectionné</div>
        <div class="artisan-summary">
          <div class="artisan-avatar">A</div>
          <div class="artisan-info">
            <h3 id="artisanName">Ahmed Benhaddou</h3>
            <p id="artisanSpec"><i class="fas fa-tools"></i> Plombier · Casablanca</p>
            <div class="artisan-rating">
              <span class="stars">★★★★★</span>
              <span style="font-weight:700;">4.8</span>
              <span style="color:var(--text3)">(127 avis)</span>
              <span style="margin-left:.5rem;background:rgba(16,185,129,.1);color:var(--green);padding:.1rem .5rem;border-radius:6px;font-size:.75rem;">✓ Vérifié</span>
            </div>
          </div>
        </div>
      </div>

      <!-- SERVICE -->
      <div class="card">
        <div class="card-title"><i class="fas fa-wrench"></i> Service & Détails</div>
        <div class="form-group">
          <label class="form-label">Service souhaité</label>
          <select class="form-input" id="serviceSelect" onchange="updateSummary()">
            <option value="">-- Choisir un service --</option>
            <option value="Réparation fuite|150">Réparation fuite — 150–300 DH</option>
            <option value="Installation chauffe-eau|500">Installation chauffe-eau — 500–800 DH</option>
            <option value="Débouchage|200">Débouchage — 200–400 DH</option>
            <option value="Urgence nuit|400">Urgence nuit — 400 DH/h</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Description du problème</label>
          <textarea class="form-input" id="description" placeholder="Décrivez votre problème en détail (localisation, symptômes, depuis quand...)"></textarea>
        </div>
        <div class="form-group">
          <label class="form-label">Adresse d'intervention</label>
          <input type="text" class="form-input" id="address" placeholder="N° rue, Quartier, Ville" oninput="updateSummary()">
        </div>
        <div class="form-group">
          <label class="form-label">Niveau d'urgence</label>
          <div class="urgency-options">
            <button type="button" class="urgency-btn low" onclick="setUrgency('low',this)"><i class="fas fa-clock"></i>Normal<br><small>2–5 jours</small></button>
            <button type="button" class="urgency-btn medium active" onclick="setUrgency('medium',this)"><i class="fas fa-exclamation-triangle"></i>Urgent<br><small>24–48h</small></button>
            <button type="button" class="urgency-btn high" onclick="setUrgency('high',this)"><i class="fas fa-fire"></i>Critique<br><small>Immédiat</small></button>
          </div>
        </div>
      </div>

      <!-- CALENDAR -->
      <div class="card">
        <div class="card-title"><i class="fas fa-calendar-alt"></i> Choisir la date</div>
        <div class="calendar-header">
          <button class="cal-nav" onclick="prevMonth()"><i class="fas fa-chevron-left"></i></button>
          <div class="cal-month" id="calMonth"></div>
          <button class="cal-nav" onclick="nextMonth()"><i class="fas fa-chevron-right"></i></button>
        </div>
        <div class="calendar-grid" id="calGrid"></div>
      </div>

      <!-- TIME SLOTS -->
      <div class="card">
        <div class="card-title"><i class="fas fa-clock"></i> Choisir l'heure</div>
        <div id="selectedDateLabel" style="color:var(--text2);font-size:.85rem;margin-bottom:.75rem;">Sélectionnez d'abord une date</div>
        <div class="time-slots" id="timeSlots"></div>
      </div>

      <!-- PAYMENT -->
      <div class="card">
        <div class="card-title"><i class="fas fa-credit-card"></i> Mode de paiement</div>
        <div class="payment-options">
          <label class="payment-opt selected" onclick="selectPayment(this)">
            <input type="radio" name="payment" value="cash" checked>
            <div class="payment-icon" style="background:rgba(16,185,129,.1);color:var(--green);">💵</div>
            <div class="payment-opt-info">
              <div class="payment-opt-name">Espèces (Cash)</div>
              <div class="payment-opt-desc">Paiement à la fin de l'intervention</div>
            </div>
          </label>
          <label class="payment-opt" onclick="selectPayment(this)">
            <input type="radio" name="payment" value="cih">
            <div class="payment-icon" style="background:rgba(6,182,212,.1);color:var(--accent);">🏦</div>
            <div class="payment-opt-info">
              <div class="payment-opt-name">CIH Pay</div>
              <div class="payment-opt-desc">Carte bancaire marocaine</div>
            </div>
          </label>
          <label class="payment-opt" onclick="selectPayment(this)">
            <input type="radio" name="payment" value="orange">
            <div class="payment-icon" style="background:rgba(245,158,11,.1);color:var(--amber);">📱</div>
            <div class="payment-opt-info">
              <div class="payment-opt-name">Orange Money</div>
              <div class="payment-opt-desc">Portefeuille mobile</div>
            </div>
          </label>
          <label class="payment-opt" onclick="selectPayment(this)">
            <input type="radio" name="payment" value="inwi">
            <div class="payment-icon" style="background:rgba(139,92,246,.1);color:var(--purple);">💜</div>
            <div class="payment-opt-info">
              <div class="payment-opt-name">Inwi Money</div>
              <div class="payment-opt-desc">Portefeuille mobile Inwi</div>
            </div>
          </label>
        </div>
      </div>
    </div>

    <!-- SUMMARY SIDEBAR -->
    <div>
      <div class="summary-card">
        <div class="summary-title">📋 Récapitulatif</div>
        <div class="summary-badge badge-green"><i class="fas fa-shield-alt"></i> Artisan vérifié & assuré</div>
        <div class="summary-badge badge-amber" id="urgencyBadge"><i class="fas fa-exclamation-triangle"></i> Urgence normale</div>
        <div class="summary-row"><span class="label">Service</span><span class="value" id="sumService">—</span></div>
        <div class="summary-row"><span class="label">Date</span><span class="value" id="sumDate">—</span></div>
        <div class="summary-row"><span class="label">Heure</span><span class="value" id="sumTime">—</span></div>
        <div class="summary-row"><span class="label">Adresse</span><span class="value" id="sumAddress" style="font-size:.82rem;text-align:right;max-width:160px;">—</span></div>
        <div class="summary-row"><span class="label">Paiement</span><span class="value" id="sumPayment">Espèces</span></div>
        <div class="summary-row total"><span class="label">Estimation</span><span class="value" id="sumTotal">—</span></div>
        <button class="submit-btn" onclick="submitBooking()">
          <i class="fas fa-calendar-check"></i> Confirmer la réservation
        </button>
        <p style="text-align:center;font-size:.75rem;color:var(--text3);margin-top:.75rem;"><i class="fas fa-lock"></i> Réservation gratuite · Sans engagement</p>
      </div>
    </div>
  </div>
</div>

<!-- SUCCESS MODAL -->
<div class="success-overlay" id="successOverlay">
  <div class="success-box">
    <div class="success-icon"><i class="fas fa-check"></i></div>
    <h2>Réservation envoyée !</h2>
    <p>Votre demande a été transmise à <strong>Ahmed Benhaddou</strong>. Il vous contactera sous 2h pour confirmer.</p>
    <div class="success-id" id="bookingId">REF: AH-2024-0000</div>
    <button class="submit-btn" onclick="window.location='annonce.php'" style="margin-top:0;">
      <i class="fas fa-home"></i> Retour aux artisans
    </button>
  </div>
</div>

<script>
// CALENDAR
let selectedDate = null, selectedTime = null, urgencyLevel = 'medium';
let calYear = new Date().getFullYear(), calMonth = new Date().getMonth();
const MONTHS_FR = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
const DAYS_FR = ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'];
const BOOKED_TIMES = ['09:00','14:00','16:00'];
const ALL_TIMES = ['08:00','09:00','10:00','11:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00'];

function renderCalendar() {
  document.getElementById('calMonth').textContent = MONTHS_FR[calMonth] + ' ' + calYear;
  const grid = document.getElementById('calGrid');
  grid.innerHTML = DAYS_FR.map(d => `<div class="cal-day-name">${d}</div>`).join('');
  const firstDay = new Date(calYear, calMonth, 1).getDay();
  const daysInMonth = new Date(calYear, calMonth + 1, 0).getDate();
  const today = new Date(); today.setHours(0,0,0,0);
  for (let i = 0; i < firstDay; i++) grid.innerHTML += `<div class="cal-day empty"></div>`;
  for (let d = 1; d <= daysInMonth; d++) {
    const date = new Date(calYear, calMonth, d);
    const isPast = date < today;
    const isToday = date.getTime() === today.getTime();
    const isFriday = date.getDay() === 5;
    const isSelected = selectedDate && date.toDateString() === selectedDate.toDateString();
    const cls = ['cal-day', isPast?'disabled':'', isToday?'today':'', isSelected?'selected':'', isFriday?'friday':''].filter(Boolean).join(' ');
    grid.innerHTML += `<div class="${cls}" onclick="${isPast?'':'selectDate('+calYear+','+calMonth+','+d+')'}">${d}</div>`;
  }
}

function selectDate(y, m, d) {
  selectedDate = new Date(y, m, d);
  selectedTime = null;
  renderCalendar();
  renderTimeSlots();
  const label = selectedDate.toLocaleDateString('fr-FR', {weekday:'long',day:'numeric',month:'long'});
  document.getElementById('selectedDateLabel').textContent = '📅 ' + label.charAt(0).toUpperCase() + label.slice(1);
  document.getElementById('sumDate').textContent = selectedDate.toLocaleDateString('fr-FR');
  document.getElementById('sumTime').textContent = '—';
  updateStep(3);
}

function renderTimeSlots() {
  const el = document.getElementById('timeSlots');
  el.innerHTML = ALL_TIMES.map(t => {
    const isBooked = BOOKED_TIMES.includes(t);
    const isSelected = t === selectedTime;
    return `<button type="button" class="time-slot${isBooked?' booked':isSelected?' selected':''}" onclick="${isBooked?'':'selectTime(\''+t+'\')'}">${t}${isBooked?'<br><small>Occupé</small>':''}</button>`;
  }).join('');
}

function selectTime(t) {
  selectedTime = t;
  renderTimeSlots();
  document.getElementById('sumTime').textContent = t;
  updateStep(4);
}

function prevMonth() { calMonth--; if(calMonth<0){calMonth=11;calYear--;} renderCalendar(); }
function nextMonth() { calMonth++; if(calMonth>11){calMonth=0;calYear++;} renderCalendar(); }

function setUrgency(level, btn) {
  urgencyLevel = level;
  document.querySelectorAll('.urgency-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  const labels = {low:'Urgence normale',medium:'Urgence modérée',high:'⚠️ Urgence critique'};
  const badge = document.getElementById('urgencyBadge');
  badge.querySelector('span:last-child') ? null : null;
  badge.innerHTML = `<i class="fas fa-exclamation-triangle"></i> ${labels[level]}`;
  if(level==='high') badge.className='summary-badge'; badge.style.background='rgba(239,68,68,.1)'; badge.style.color='var(--red)';
}

function selectPayment(label) {
  document.querySelectorAll('.payment-opt').forEach(l => l.classList.remove('selected'));
  label.classList.add('selected');
  const names = {cash:'Espèces',cih:'CIH Pay',orange:'Orange Money',inwi:'Inwi Money'};
  const val = label.querySelector('input').value;
  document.getElementById('sumPayment').textContent = names[val] || val;
}

function updateSummary() {
  const sel = document.getElementById('serviceSelect').value;
  if (sel) {
    const [name, price] = sel.split('|');
    document.getElementById('sumService').textContent = name;
    document.getElementById('sumTotal').textContent = price + ' DH';
  }
  const addr = document.getElementById('address').value;
  document.getElementById('sumAddress').textContent = addr || '—';
}

function updateStep(n) {
  for(let i=1;i<=4;i++){
    const s = document.getElementById('step'+i);
    s.classList.remove('done','active');
    if(i<n) s.classList.add('done'), s.querySelector('.step-dot').innerHTML='<i class="fas fa-check"></i>';
    else if(i===n) s.classList.add('active');
  }
}

function submitBooking() {
  if (!document.getElementById('serviceSelect').value) { alert('Veuillez sélectionner un service.'); return; }
  if (!selectedDate) { alert('Veuillez choisir une date.'); return; }
  if (!selectedTime) { alert('Veuillez choisir une heure.'); return; }
  if (!document.getElementById('address').value.trim()) { alert('Veuillez entrer une adresse.'); return; }
  const ref = 'AH-' + new Date().getFullYear() + '-' + String(Math.floor(Math.random()*9999)).padStart(4,'0');
  document.getElementById('bookingId').textContent = 'REF: ' + ref;
  document.getElementById('successOverlay').classList.add('show');
  updateStep(4);
  document.getElementById('step4').classList.remove('active');
  document.getElementById('step4').classList.add('done');
  document.getElementById('step4').querySelector('.step-dot').innerHTML='<i class="fas fa-check"></i>';
}

renderCalendar();
renderTimeSlots();
</script>
</body>
</html>
