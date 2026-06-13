<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Artisan | AlloHrayfi</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
  <style>
    *{margin:0;padding:0;box-sizing:border-box;}
    :root{
      --bg-primary:#071124;--bg-secondary:#0b1724;
      --text-primary:#e6eef6;--text-secondary:rgba(255,255,255,0.7);
      --text-muted:rgba(255,255,255,0.5);
      --accent-color:#06b6d4;--accent-hover:#0891b2;
      --border-color:rgba(255,255,255,0.08);
      --input-bg:rgba(255,255,255,0.06);--input-border:rgba(255,255,255,0.15);
      --card-bg:linear-gradient(145deg,rgba(255,255,255,0.05),rgba(255,255,255,0.02));
      --card-border:rgba(255,255,255,0.1);
      --shadow:0 8px 32px rgba(2,6,23,0.5);
      --nav-bg:rgba(15,23,36,0.97);
      --tag-bg:rgba(6,182,212,0.12);
      --review-bg:rgba(255,255,255,0.03);
    }
    .light-mode{
      --bg-primary:#f1f5f9;--bg-secondary:#e2e8f0;
      --text-primary:#1e293b;--text-secondary:#475569;--text-muted:#94a3b8;
      --border-color:rgba(0,0,0,0.08);
      --input-bg:rgba(0,0,0,0.04);--input-border:rgba(0,0,0,0.15);
      --card-bg:linear-gradient(145deg,#ffffff,#f8fafc);
      --card-border:rgba(0,0,0,0.08);
      --shadow:0 8px 32px rgba(0,0,0,0.08);
      --nav-bg:rgba(255,255,255,0.97);
      --tag-bg:rgba(6,182,212,0.1);
      --review-bg:rgba(0,0,0,0.02);
    }
    body{
      font-family:'Tajawal',sans-serif;
      background:linear-gradient(180deg,var(--bg-primary),var(--bg-secondary));
      color:var(--text-primary);min-height:100vh;transition:all .3s;
    }
    /* NAVBAR */
    .navbar{background:transparent;padding:1rem 1.5rem;position:fixed;top:0;left:0;width:100%;z-index:1000;transition:all .3s;}
    .navbar.scrolled{background:var(--nav-bg);backdrop-filter:blur(12px);box-shadow:0 4px 20px rgba(0,0,0,.15);}
    .nav-container{max-width:1200px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;}
    .logo{display:flex;align-items:center;text-decoration:none;}
    .logo img{height:46px;width:auto;object-fit:contain;}
    .nav-buttons{display:flex;align-items:center;gap:.75rem;}
    .nav-btn{
      border:1px solid;padding:8px 16px;border-radius:9999px;
      font-weight:500;transition:all .3s;display:flex;align-items:center;gap:5px;
      text-decoration:none;background:transparent;cursor:pointer;font-family:inherit;font-size:.9rem;
    }
    .back-btn{border-color:#64748b;color:#64748b;}
    .back-btn:hover{background:#64748b;color:#fff;}
    .lang-btn{border-color:var(--accent-color);color:var(--accent-color);}
    .lang-btn:hover{background:var(--accent-color);color:#fff;}
    .theme-toggle{
      background:transparent;border:1px solid var(--accent-color);
      color:var(--accent-color);width:38px;height:38px;border-radius:50%;
      display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .3s;
    }
    .theme-toggle:hover{background:var(--accent-color);color:#fff;}
    /* LAYOUT */
    .page-container{max-width:1200px;margin:0 auto;padding:90px 1.5rem 2rem;}
    .profile-grid{display:grid;grid-template-columns:340px 1fr;gap:1.5rem;}
    @media(max-width:900px){.profile-grid{grid-template-columns:1fr;}}
    /* PROFILE CARD */
    .profile-card{
      background:var(--card-bg);border:1px solid var(--card-border);
      border-radius:20px;overflow:hidden;height:fit-content;
      position:sticky;top:90px;
    }
    @media(max-width:900px){.profile-card{position:static;}}
    .profile-header{
      background:linear-gradient(135deg,#06b6d4,#0891b2);
      padding:2rem 1.5rem 3.5rem;text-align:center;position:relative;
    }
    .profile-avatar{
      width:100px;height:100px;border-radius:50%;
      border:4px solid rgba(255,255,255,.9);
      background:rgba(255,255,255,.2);
      display:flex;align-items:center;justify-content:center;
      font-size:2.5rem;font-weight:700;color:#fff;
      margin:0 auto 1rem;overflow:hidden;
    }
    .profile-avatar img{width:100%;height:100%;object-fit:cover;}
    .profile-name{font-size:1.4rem;font-weight:700;color:#fff;margin-bottom:.25rem;}
    .profile-specialty{font-size:1rem;color:rgba(255,255,255,.85);display:flex;align-items:center;justify-content:center;gap:.4rem;}
    .availability-badge{
      position:absolute;top:1rem;right:1rem;
      padding:.3rem .8rem;border-radius:20px;font-size:.78rem;font-weight:600;
      display:flex;align-items:center;gap:.3rem;
    }
    .badge-available{background:rgba(16,185,129,.2);color:#10b981;border:1px solid #10b981;}
    .badge-busy{background:rgba(239,68,68,.2);color:#ef4444;border:1px solid #ef4444;}
    .profile-stats{
      display:grid;grid-template-columns:repeat(3,1fr);
      padding:1.5rem;border-bottom:1px solid var(--border-color);
      margin-top:-1.5rem;background:var(--card-bg);position:relative;z-index:1;
      border-radius:12px 12px 0 0;
    }
    .stat-item{text-align:center;}
    .stat-value{font-size:1.4rem;font-weight:700;color:var(--text-primary);}
    .stat-label{font-size:.75rem;color:var(--text-muted);}
    .profile-body{padding:1.5rem;}
    .section-label{font-size:.78rem;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.08em;margin-bottom:.75rem;}
    .info-row{
      display:flex;align-items:flex-start;gap:.75rem;
      padding:.6rem 0;border-bottom:1px solid var(--border-color);
      font-size:.9rem;
    }
    .info-row:last-child{border-bottom:none;}
    .info-row i{color:var(--accent-color);width:18px;flex-shrink:0;margin-top:2px;}
    .info-label{color:var(--text-muted);font-size:.82rem;margin-bottom:.1rem;}
    .info-value{color:var(--text-primary);}
    .skills-list{display:flex;flex-wrap:wrap;gap:.4rem;margin-bottom:1.25rem;}
    .skill-tag{
      background:var(--tag-bg);color:var(--accent-color);
      padding:.3rem .7rem;border-radius:12px;font-size:.8rem;font-weight:500;
    }
    .cta-btn{
      width:100%;padding:.85rem;border:none;border-radius:12px;
      background:linear-gradient(135deg,var(--accent-color),var(--accent-hover));
      color:#fff;font-size:1rem;font-weight:600;cursor:pointer;
      transition:all .3s;font-family:inherit;
      display:flex;align-items:center;justify-content:center;gap:.5rem;margin-bottom:.6rem;
    }
    .cta-btn:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(6,182,212,.4);}
    .cta-btn.outline{background:transparent;border:1px solid var(--accent-color);color:var(--accent-color);}
    .cta-btn.outline:hover{background:var(--accent-color);color:#fff;}
    /* TABS */
    .content-card{background:var(--card-bg);border:1px solid var(--card-border);border-radius:20px;overflow:hidden;}
    .profile-tabs{display:flex;background:rgba(255,255,255,.03);border-bottom:1px solid var(--border-color);overflow-x:auto;}
    .light-mode .profile-tabs{background:rgba(0,0,0,.03);}
    .profile-tab{
      padding:.85rem 1.25rem;white-space:nowrap;
      background:transparent;border:none;color:var(--text-secondary);
      font-size:.9rem;font-weight:500;cursor:pointer;
      transition:all .3s;font-family:inherit;
      border-bottom:3px solid transparent;
    }
    .profile-tab.active{color:var(--accent-color);border-bottom-color:var(--accent-color);}
    .profile-tab:hover:not(.active){color:var(--text-primary);}
    .tab-content{display:none;padding:1.5rem;animation:fadeIn .3s ease;}
    .tab-content.active{display:block;}
    @keyframes fadeIn{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:translateY(0)}}
    /* ABOUT */
    .bio-text{color:var(--text-secondary);line-height:1.7;margin-bottom:1.25rem;font-size:.95rem;}
    /* SERVICES */
    .services-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:1rem;}
    .service-card{
      background:var(--review-bg);border:1px solid var(--border-color);
      border-radius:12px;padding:1.1rem;transition:all .3s;
    }
    .service-card:hover{border-color:var(--accent-color);}
    .service-name{font-weight:600;margin-bottom:.35rem;color:var(--text-primary);}
    .service-price{color:var(--accent-color);font-weight:700;margin-bottom:.4rem;}
    .service-desc{color:var(--text-secondary);font-size:.85rem;}
    /* PORTFOLIO */
    .portfolio-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:.75rem;}
    .portfolio-item{
      border-radius:10px;overflow:hidden;
      height:140px;background:linear-gradient(135deg,rgba(6,182,212,.15),rgba(8,145,178,.1));
      border:1px solid var(--border-color);
      display:flex;align-items:center;justify-content:center;
      transition:all .3s;cursor:pointer;position:relative;
    }
    .portfolio-item:hover{transform:scale(1.03);border-color:var(--accent-color);}
    .portfolio-item i{font-size:2rem;color:var(--accent-color);}
    /* REVIEWS */
    .reviews-summary{
      display:flex;align-items:center;gap:2rem;
      padding:1.25rem;background:var(--review-bg);
      border-radius:12px;margin-bottom:1.25rem;flex-wrap:wrap;
    }
    .big-rating{text-align:center;}
    .big-rating .num{font-size:3rem;font-weight:800;color:var(--text-primary);line-height:1;}
    .big-rating .stars{color:#f59e0b;font-size:1.3rem;}
    .big-rating .count{font-size:.85rem;color:var(--text-muted);}
    .rating-bars{flex:1;min-width:150px;}
    .bar-row{display:flex;align-items:center;gap:.5rem;margin-bottom:.35rem;font-size:.82rem;color:var(--text-muted);}
    .bar-track{flex:1;height:6px;background:var(--border-color);border-radius:3px;overflow:hidden;}
    .bar-fill{height:100%;background:var(--accent-color);border-radius:3px;transition:width .6s ease;}
    .reviews-list{display:flex;flex-direction:column;gap:.85rem;}
    .review-item{
      background:var(--review-bg);border:1px solid var(--border-color);
      border-radius:12px;padding:1.1rem;
    }
    .review-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:.5rem;flex-wrap:wrap;gap:.5rem;}
    .reviewer-name{font-weight:600;color:var(--text-primary);}
    .review-date{font-size:.8rem;color:var(--text-muted);}
    .review-stars{color:#f59e0b;font-size:.9rem;}
    .review-text{color:var(--text-secondary);font-size:.9rem;line-height:1.6;}
    /* AVAILABILITY */
    .availability-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(130px,1fr));gap:.6rem;}
    .day-slot{
      background:var(--review-bg);border:1px solid var(--border-color);
      border-radius:10px;padding:.75rem;text-align:center;font-size:.85rem;
    }
    .day-name{font-weight:600;margin-bottom:.3rem;color:var(--text-primary);}
    .day-hours{color:var(--text-muted);font-size:.78rem;}
    .day-slot.available{border-color:rgba(16,185,129,.4);background:rgba(16,185,129,.05);}
    .day-slot.unavailable{opacity:.45;}
    /* BOOK MODAL */
    .modal-overlay{
      display:none;position:fixed;inset:0;background:rgba(0,0,0,.6);
      backdrop-filter:blur(6px);z-index:2000;
      align-items:center;justify-content:center;padding:1rem;
    }
    .modal-overlay.active{display:flex;}
    .modal{
      background:var(--bg-secondary);border:1px solid var(--card-border);
      border-radius:20px;padding:2rem;width:100%;max-width:480px;
      max-height:90vh;overflow-y:auto;
    }
    .modal-title{font-size:1.2rem;font-weight:700;margin-bottom:1.25rem;color:var(--text-primary);}
    .modal-close{
      float:right;background:none;border:none;
      color:var(--text-secondary);font-size:1.4rem;cursor:pointer;margin-top:-4px;
    }
    .form-group{margin-bottom:1rem;}
    .form-label{display:block;font-size:.85rem;font-weight:600;color:var(--text-secondary);margin-bottom:.4rem;}
    .form-input{
      width:100%;padding:.75rem 1rem;border-radius:10px;
      border:1px solid var(--input-border);background:var(--input-bg);
      color:var(--text-primary);font-family:inherit;font-size:.9rem;transition:border-color .3s;
    }
    .form-input:focus{outline:none;border-color:var(--accent-color);}
    textarea.form-input{resize:vertical;min-height:90px;}
    @media(max-width:600px){.page-container{padding:80px 1rem 2rem;}.reviews-summary{flex-direction:column;}.profile-stats{grid-template-columns:repeat(3,1fr);}}
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar" id="navbar">
    <div class="nav-container">
      <a href="index.php" class="logo">
        <img src="img/logo-removebg-preview.png" alt="AlloHrayfi">
      </a>
      <div class="nav-buttons">
        <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme"><i class="fas fa-moon"></i></button>
        <a href="annonce.php" class="nav-btn back-btn">
          <i class="fas fa-arrow-left"></i>
          <span data-lang="fr">Retour</span>
          <span data-lang="ar" style="display:none">رجوع</span>
        </a>
        <button class="nav-btn lang-btn" id="langSwitch">
          <span class="lang-flag">🇫🇷</span>
          <span data-lang="fr">Français</span>
          <span data-lang="ar" style="display:none">العربية</span>
        </button>
      </div>
    </div>
  </nav>

  <!-- MAIN -->
  <div class="page-container">
    <div class="profile-grid">

      <!-- LEFT: PROFILE CARD -->
      <aside>
        <div class="profile-card">
          <div class="profile-header">
            <div class="availability-badge badge-available" id="availBadge">
              <i class="fas fa-circle" style="font-size:.55rem;"></i>
              <span data-lang="fr" id="availTextFr">Disponible</span>
              <span data-lang="ar" style="display:none" id="availTextAr">متاح</span>
            </div>
            <div class="profile-avatar" id="profileAvatar">A</div>
            <div class="profile-name" id="profileName">Ahmed Benhaddou</div>
            <div class="profile-specialty"><i class="fas fa-tools"></i><span id="profileSpecialty">Plombier</span></div>
          </div>

          <div class="profile-stats">
            <div class="stat-item">
              <div class="stat-value" id="statRating">4.8</div>
              <div class="stat-label" data-lang="fr">Note</div>
              <div class="stat-label" data-lang="ar" style="display:none">التقييم</div>
            </div>
            <div class="stat-item">
              <div class="stat-value" id="statJobs">127</div>
              <div class="stat-label" data-lang="fr">Missions</div>
              <div class="stat-label" data-lang="ar" style="display:none">مهام</div>
            </div>
            <div class="stat-item">
              <div class="stat-value" id="statExp">12<span style="font-size:.85rem">ans</span></div>
              <div class="stat-label" data-lang="fr">Expérience</div>
              <div class="stat-label" data-lang="ar" style="display:none">خبرة</div>
            </div>
          </div>

          <div class="profile-body">
            <div class="section-label" data-lang="fr">Informations</div>
            <div class="section-label" data-lang="ar" style="display:none">معلومات</div>
            <div class="info-row">
              <i class="fas fa-map-marker-alt"></i>
              <div><div class="info-label" data-lang="fr">Ville</div><div class="info-label" data-lang="ar" style="display:none">المدينة</div><div class="info-value" id="infoCity">Casablanca</div></div>
            </div>
            <div class="info-row">
              <i class="fas fa-money-bill-wave"></i>
              <div><div class="info-label" data-lang="fr">Tarif/heure</div><div class="info-label" data-lang="ar" style="display:none">السعر/ساعة</div><div class="info-value" id="infoRate">250 DH</div></div>
            </div>
            <div class="info-row">
              <i class="fas fa-certificate"></i>
              <div><div class="info-label" data-lang="fr">Certification</div><div class="info-label" data-lang="ar" style="display:none">شهادة</div><div class="info-value" id="infoCert">—</div></div>
            </div>
            <div class="info-row">
              <i class="fas fa-map-road"></i>
              <div><div class="info-label" data-lang="fr">Zone d'intervention</div><div class="info-label" data-lang="ar" style="display:none">منطقة التدخل</div><div class="info-value" id="infoZone">—</div></div>
            </div>

            <div style="margin-top:1.1rem;margin-bottom:.5rem;" class="section-label" data-lang="fr">Compétences</div>
            <div style="margin-top:1.1rem;margin-bottom:.5rem;" class="section-label" data-lang="ar" style="display:none">المهارات</div>
            <div class="skills-list" id="skillsList"></div>

            <button class="cta-btn" id="bookBtn" type="button">
              <i class="fas fa-calendar-check"></i>
              <span data-lang="fr">Réserver maintenant</span>
              <span data-lang="ar" style="display:none">احجز الآن</span>
            </button>
            <button class="cta-btn outline" id="msgBtn" type="button">
              <i class="fas fa-comment-dots"></i>
              <span data-lang="fr">Envoyer un message</span>
              <span data-lang="ar" style="display:none">أرسل رسالة</span>
            </button>
            <button class="cta-btn outline" id="favBtn" type="button" style="margin-top:.35rem;">
              <i class="fas fa-heart"></i>
              <span data-lang="fr">Ajouter aux favoris</span>
              <span data-lang="ar" style="display:none">أضف للمفضلة</span>
            </button>
          </div>
        </div>
      </aside>

      <!-- RIGHT: TABS -->
      <div>
        <div class="content-card">
          <div class="profile-tabs" id="profileTabs">
            <button class="profile-tab active" data-tab="about">
              <i class="fas fa-user"></i>
              <span data-lang="fr"> À propos</span>
              <span data-lang="ar" style="display:none"> حول</span>
            </button>
            <button class="profile-tab" data-tab="services">
              <i class="fas fa-tools"></i>
              <span data-lang="fr"> Services</span>
              <span data-lang="ar" style="display:none"> الخدمات</span>
            </button>
            <button class="profile-tab" data-tab="portfolio">
              <i class="fas fa-images"></i>
              <span data-lang="fr"> Portfolio</span>
              <span data-lang="ar" style="display:none"> المعرض</span>
            </button>
            <button class="profile-tab" data-tab="reviews">
              <i class="fas fa-star"></i>
              <span data-lang="fr"> Avis</span>
              <span data-lang="ar" style="display:none"> التقييمات</span>
            </button>
            <button class="profile-tab" data-tab="availability">
              <i class="fas fa-calendar-alt"></i>
              <span data-lang="fr"> Disponibilité</span>
              <span data-lang="ar" style="display:none"> التوفر</span>
            </button>
          </div>

          <!-- ABOUT -->
          <div class="tab-content active" id="tab-about">
            <p class="bio-text" id="bioText"></p>
            <div class="section-label" data-lang="fr">Certifications</div>
            <div class="section-label" data-lang="ar" style="display:none">الشهادات</div>
            <div id="certsList" style="margin-bottom:1.25rem;"></div>
          </div>

          <!-- SERVICES -->
          <div class="tab-content" id="tab-services">
            <div class="services-grid" id="servicesGrid"></div>
          </div>

          <!-- PORTFOLIO -->
          <div class="tab-content" id="tab-portfolio">
            <div class="portfolio-grid" id="portfolioGrid"></div>
          </div>

          <!-- REVIEWS -->
          <div class="tab-content" id="tab-reviews">
            <div class="reviews-summary">
              <div class="big-rating">
                <div class="num" id="bigRating">4.8</div>
                <div class="stars">★★★★★</div>
                <div class="count" id="reviewCount">127 avis</div>
              </div>
              <div class="rating-bars" id="ratingBars"></div>
            </div>
            <div class="reviews-list" id="reviewsList"></div>
          </div>

          <!-- AVAILABILITY -->
          <div class="tab-content" id="tab-availability">
            <div class="availability-grid" id="availabilityGrid"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- BOOK MODAL -->
  <div class="modal-overlay" id="bookModal">
    <div class="modal">
      <h3 class="modal-title">
        <span data-lang="fr">Réserver une intervention</span>
        <span data-lang="ar" style="display:none">حجز تدخل</span>
        <button class="modal-close" id="closeModal" type="button">×</button>
      </h3>
      <form id="bookForm" novalidate>
        <div class="form-group">
          <label class="form-label" data-lang="fr">Service souhaité</label>
          <label class="form-label" data-lang="ar" style="display:none">الخدمة المطلوبة</label>
          <select class="form-input" id="bookService">
            <option value="">-- Choisir --</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label" data-lang="fr">Date souhaitée</label>
          <label class="form-label" data-lang="ar" style="display:none">التاريخ المرغوب</label>
          <input type="date" class="form-input" id="bookDate">
        </div>
        <div class="form-group">
          <label class="form-label" data-lang="fr">Heure</label>
          <label class="form-label" data-lang="ar" style="display:none">الوقت</label>
          <input type="time" class="form-input" id="bookTime">
        </div>
        <div class="form-group">
          <label class="form-label" data-lang="fr">Description du problème</label>
          <label class="form-label" data-lang="ar" style="display:none">وصف المشكلة</label>
          <textarea class="form-input" id="bookDesc"
                    data-placeholder-fr="Décrivez brièvement votre besoin..."
                    data-placeholder-ar="اشرح مشكلتك بإيجاز..."
                    placeholder="Décrivez brièvement votre besoin..."></textarea>
        </div>
        <button type="submit" class="cta-btn">
          <i class="fas fa-check"></i>
          <span data-lang="fr">Confirmer la réservation</span>
          <span data-lang="ar" style="display:none">تأكيد الحجز</span>
        </button>
      </form>
    </div>
  </div>

  <!-- MESSAGE MODAL -->
  <div class="modal-overlay" id="msgModal">
    <div class="modal">
      <h3 class="modal-title">
        <span data-lang="fr">Envoyer un message</span>
        <span data-lang="ar" style="display:none">إرسال رسالة</span>
        <button class="modal-close" id="closeMsgModal" type="button">×</button>
      </h3>
      <form id="msgForm" novalidate>
        <div class="form-group">
          <label class="form-label" data-lang="fr">Votre message</label>
          <label class="form-label" data-lang="ar" style="display:none">رسالتك</label>
          <textarea class="form-input" id="msgText"
                    data-placeholder-fr="Bonjour, j'aurais besoin de vos services pour..."
                    data-placeholder-ar="مرحبا، أحتاج إلى خدماتك من أجل..."
                    placeholder="Bonjour, j'aurais besoin de vos services pour..."
                    style="min-height:120px;"></textarea>
        </div>
        <button type="submit" class="cta-btn">
          <i class="fas fa-paper-plane"></i>
          <span data-lang="fr">Envoyer</span>
          <span data-lang="ar" style="display:none">إرسال</span>
        </button>
      </form>
    </div>
  </div>

  <script>
    // ========== STATE ==========
    let currentLang = localStorage.getItem('lang') || 'fr';
    let currentTheme = localStorage.getItem('theme') || 'dark';
    let isFav = false;

    // Read artisan id from URL
    const urlParams = new URLSearchParams(window.location.search);
    const artisanId = parseInt(urlParams.get('id')) || 1;

    // ========== MOCK DATA ==========
    const ARTISANS = {
      1:{ name:'Ahmed Benhaddou', specialty:'Plombier', city:'Casablanca', rating:4.8, reviews:127, rate:250, experience:12, available:true, certified:true, zone:'Grand Casablanca', initial:'A',
          bio:'Plombier professionnel avec 12 ans d\'expérience, spécialisé dans la plomberie résidentielle et commerciale. Expert en installation de chauffe-eau, réparation de fuites, installation sanitaire et traitement des urgences. Diplômé du CFPA de Casablanca.',
          skills:['Plomberie sanitaire','Chauffe-eau','Détection fuites','Urgences 24h','Installation WC','Chauffage central'],
          services:[
            {name:'Réparation fuite',price:'150–300 DH',desc:'Détection et réparation rapide de fuites'},
            {name:'Installation chauffe-eau',price:'500–800 DH',desc:'Pose et raccordement chauffe-eau'},
            {name:'Débouchage',price:'200–400 DH',desc:'Débouchage canalisations bouchées'},
            {name:'Urgence nuit',price:'400 DH/h',desc:'Intervention d\'urgence 24h/24'},
          ],
          certifications:['CFPA Casablanca – Diplôme Plomberie','Certification Sécurité Gaz 2022'],
          portfolioCount:8,
          reviewsList:[
            {name:'Karim M.',rating:5,date:'Jan 2024',text:'Excellent travail, très professionnel et ponctuel.'},
            {name:'Fatima Z.',rating:5,date:'Dec 2023',text:'Réparation rapide et efficace. Je recommande.'},
            {name:'Hassan B.',rating:4,date:'Nov 2023',text:'Bon travail, prix raisonnable.'},
          ],
          availability:{ monday:{avail:true,hours:'08:00–18:00'},tuesday:{avail:true,hours:'08:00–18:00'},wednesday:{avail:true,hours:'08:00–18:00'},thursday:{avail:true,hours:'08:00–18:00'},friday:{avail:true,hours:'08:00–17:00'},saturday:{avail:true,hours:'09:00–13:00'},sunday:{avail:false,hours:'—'} }
      },
      2:{ name:'Khalid Mansouri', specialty:'Électricien', city:'Rabat', rating:4.6, reviews:89, rate:200, experience:8, available:true, certified:true, zone:'Rabat–Salé', initial:'K',
          bio:'Électricien diplômé spécialisé dans l\'installation électrique résidentielle et l\'éclairage intelligent. 8 ans d\'expérience dans la rénovation et la mise aux normes électriques.',
          skills:['Tableau électrique','Éclairage LED','Domotique','VMC','Solaire','Câblage'],
          services:[
            {name:'Tableau électrique',price:'800–1500 DH',desc:'Installation et mise aux normes'},
            {name:'Éclairage',price:'300–600 DH',desc:'Pose spots, lustre, éclairage LED'},
            {name:'Prise & interrupteur',price:'100–200 DH',desc:'Remplacement ou nouvelle pose'},
          ],
          certifications:['ISTA Rabat – Électricité du bâtiment'],
          portfolioCount:5,
          reviewsList:[
            {name:'Sara L.',rating:5,date:'Feb 2024',text:'Travail soigné et bien expliqué.'},
            {name:'Youssef A.',rating:4,date:'Jan 2024',text:'Rapide et fiable.'},
          ],
          availability:{ monday:{avail:true,hours:'09:00–18:00'},tuesday:{avail:true,hours:'09:00–18:00'},wednesday:{avail:false,hours:'—'},thursday:{avail:true,hours:'09:00–18:00'},friday:{avail:true,hours:'09:00–16:00'},saturday:{avail:false,hours:'—'},sunday:{avail:false,hours:'—'} }
      }
    };

    // Fallback to artisan 1 if not found
    const artisan = ARTISANS[artisanId] || ARTISANS[1];

    // ========== THEME ==========
    function applyTheme() {
      document.body.classList.toggle('light-mode', currentTheme === 'light');
      document.getElementById('themeToggle').innerHTML = currentTheme === 'light'
        ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
    }
    document.getElementById('themeToggle').addEventListener('click', () => {
      currentTheme = currentTheme === 'dark' ? 'light' : 'dark';
      localStorage.setItem('theme', currentTheme);
      applyTheme();
    });
    applyTheme();

    // ========== NAVBAR ==========
    window.addEventListener('scroll', () => {
      document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 40);
    });

    // ========== LANGUAGE ==========
    function updateLanguage() {
      document.querySelectorAll('[data-lang]').forEach(el => {
        el.style.display = el.getAttribute('data-lang') === currentLang ? 'inline' : 'none';
      });
      document.documentElement.dir = currentLang === 'ar' ? 'rtl' : 'ltr';
      document.querySelectorAll('.lang-flag').forEach(f => f.textContent = currentLang === 'fr' ? '🇫🇷' : '🇲🇦');
      document.querySelectorAll('[data-placeholder-fr]').forEach(inp => {
        inp.placeholder = inp.getAttribute(`data-placeholder-${currentLang}`) || inp.getAttribute('data-placeholder-fr');
      });
    }
    document.getElementById('langSwitch').addEventListener('click', () => {
      currentLang = currentLang === 'fr' ? 'ar' : 'fr';
      localStorage.setItem('lang', currentLang);
      updateLanguage();
    });

    // ========== TABS ==========
    document.querySelectorAll('.profile-tab').forEach(tab => {
      tab.addEventListener('click', () => {
        document.querySelectorAll('.profile-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
        tab.classList.add('active');
        document.getElementById('tab-' + tab.dataset.tab).classList.add('active');
      });
    });

    // ========== POPULATE PROFILE ==========
    function populate() {
      document.getElementById('profileAvatar').textContent = artisan.initial;
      document.getElementById('profileName').textContent = artisan.name;
      document.getElementById('profileSpecialty').textContent = artisan.specialty;
      document.getElementById('statRating').textContent = artisan.rating;
      document.getElementById('statJobs').textContent = artisan.reviews;
      document.getElementById('statExp').innerHTML = artisan.experience + '<span style="font-size:.85rem"> ans</span>';
      document.getElementById('infoCity').textContent = artisan.city;
      document.getElementById('infoRate').textContent = artisan.rate + ' DH';
      document.getElementById('infoCert').textContent = artisan.certified ? '✅ Certifié' : '—';
      document.getElementById('infoZone').textContent = artisan.zone;
      document.title = artisan.name + ' | AlloHrayfi';

      // Availability badge
      const badge = document.getElementById('availBadge');
      badge.className = 'availability-badge ' + (artisan.available ? 'badge-available' : 'badge-busy');
      document.getElementById('availTextFr').textContent = artisan.available ? 'Disponible' : 'Occupé';
      document.getElementById('availTextAr').textContent = artisan.available ? 'متاح' : 'مشغول';

      // Skills
      const sl = document.getElementById('skillsList');
      sl.innerHTML = artisan.skills.map(s => `<span class="skill-tag">${s}</span>`).join('');

      // Bio
      document.getElementById('bioText').textContent = artisan.bio;

      // Certifications
      const cl = document.getElementById('certsList');
      cl.innerHTML = artisan.certifications.map(c => `
        <div style="display:flex;align-items:center;gap:.5rem;padding:.5rem 0;border-bottom:1px solid var(--border-color);font-size:.9rem;">
          <i class="fas fa-certificate" style="color:var(--accent-color);"></i>
          <span style="color:var(--text-secondary);">${c}</span>
        </div>`).join('');

      // Services
      document.getElementById('servicesGrid').innerHTML = artisan.services.map(s => `
        <div class="service-card">
          <div class="service-name">${s.name}</div>
          <div class="service-price">${s.price}</div>
          <div class="service-desc">${s.desc}</div>
        </div>`).join('');

      // Book modal service select
      const bs = document.getElementById('bookService');
      artisan.services.forEach(s => {
        const opt = document.createElement('option');
        opt.value = s.name; opt.textContent = `${s.name} — ${s.price}`;
        bs.appendChild(opt);
      });

      // Portfolio placeholder tiles
      document.getElementById('portfolioGrid').innerHTML = Array.from({length: artisan.portfolioCount}, (_,i) => `
        <div class="portfolio-item" title="Projet ${i+1}">
          <i class="fas fa-${i%3===0?'tools':i%3===1?'wrench':'hammer'}"></i>
        </div>`).join('');

      // Reviews
      document.getElementById('bigRating').textContent = artisan.rating;
      document.getElementById('reviewCount').textContent = artisan.reviews + ' avis';
      const bars = document.getElementById('ratingBars');
      [5,4,3,2,1].forEach(n => {
        const pct = n===5?62:n===4?25:n===3?8:n===2?3:2;
        bars.innerHTML += `<div class="bar-row">
          <span style="width:14px;">${n}★</span>
          <div class="bar-track"><div class="bar-fill" style="width:${pct}%"></div></div>
          <span>${pct}%</span></div>`;
      });
      document.getElementById('reviewsList').innerHTML = artisan.reviewsList.map(r => `
        <div class="review-item">
          <div class="review-header">
            <div>
              <div class="reviewer-name">${r.name}</div>
              <div class="review-stars">${'★'.repeat(r.rating)}${'☆'.repeat(5-r.rating)}</div>
            </div>
            <div class="review-date">${r.date}</div>
          </div>
          <div class="review-text">${r.text}</div>
        </div>`).join('');

      // Availability
      const days = {
        fr:{monday:'Lundi',tuesday:'Mardi',wednesday:'Mercredi',thursday:'Jeudi',friday:'Vendredi',saturday:'Samedi',sunday:'Dimanche'},
        ar:{monday:'الإثنين',tuesday:'الثلاثاء',wednesday:'الأربعاء',thursday:'الخميس',friday:'الجمعة',saturday:'السبت',sunday:'الأحد'}
      };
      document.getElementById('availabilityGrid').innerHTML = Object.entries(artisan.availability).map(([k,v]) => `
        <div class="day-slot ${v.avail?'available':'unavailable'}">
          <div class="day-name">${days[currentLang]?.[k] || days.fr[k]}</div>
          <div class="day-hours">${v.avail ? v.hours : (currentLang==='fr'?'Indisponible':'غير متاح')}</div>
        </div>`).join('');
    }

    // ========== MODALS ==========
    document.getElementById('bookBtn').addEventListener('click', () => {
      document.getElementById('bookModal').classList.add('active');
      const today = new Date().toISOString().split('T')[0];
      document.getElementById('bookDate').min = today;
      document.getElementById('bookDate').value = today;
    });
    document.getElementById('closeModal').addEventListener('click', () => {
      document.getElementById('bookModal').classList.remove('active');
    });
    document.getElementById('bookModal').addEventListener('click', e => {
      if (e.target === document.getElementById('bookModal')) document.getElementById('bookModal').classList.remove('active');
    });

    document.getElementById('msgBtn').addEventListener('click', () => {
      document.getElementById('msgModal').classList.add('active');
    });
    document.getElementById('closeMsgModal').addEventListener('click', () => {
      document.getElementById('msgModal').classList.remove('active');
    });
    document.getElementById('msgModal').addEventListener('click', e => {
      if (e.target === document.getElementById('msgModal')) document.getElementById('msgModal').classList.remove('active');
    });

    document.getElementById('bookForm').addEventListener('submit', e => {
      e.preventDefault();
      const service = document.getElementById('bookService').value;
      const date = document.getElementById('bookDate').value;
      if (!service || !date) {
        alert(currentLang==='fr' ? 'Veuillez remplir tous les champs.' : 'يرجى ملء جميع الحقول.');
        return;
      }
      alert(currentLang==='fr'
        ? `Réservation envoyée pour ${service} le ${date}. ${artisan.name} vous contactera bientôt.`
        : `تم إرسال الحجز لـ ${service} في ${date}. سيتصل بك ${artisan.name} قريبًا.`);
      document.getElementById('bookModal').classList.remove('active');
      document.getElementById('bookForm').reset();
    });

    document.getElementById('msgForm').addEventListener('submit', e => {
      e.preventDefault();
      const msg = document.getElementById('msgText').value.trim();
      if (!msg) { alert(currentLang==='fr'?'Veuillez écrire votre message.':'يرجى كتابة رسالتك.'); return; }
      alert(currentLang==='fr' ? 'Message envoyé !' : 'تم إرسال الرسالة!');
      document.getElementById('msgModal').classList.remove('active');
      document.getElementById('msgForm').reset();
    });

    // Favorites
    document.getElementById('favBtn').addEventListener('click', () => {
      isFav = !isFav;
      const btn = document.getElementById('favBtn');
      btn.innerHTML = isFav
        ? `<i class="fas fa-heart" style="color:#ef4444;"></i> <span data-lang="fr">${currentLang==='fr'?'Retiré des favoris':'حُذف من المفضلة'}</span>`
        : `<i class="fas fa-heart"></i> <span data-lang="fr">${currentLang==='fr'?'Ajouter aux favoris':'أضف للمفضلة'}</span>`;
    });

    // ========== INIT ==========
    populate();
    updateLanguage();
  </script>
</body>
</html>
