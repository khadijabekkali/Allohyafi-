<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artisans | AlloHrayfi</title>
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
      --sidebar-bg:rgba(255,255,255,0.02);
      --tag-bg:rgba(6,182,212,0.12);
    }
    .light-mode{
      --bg-primary:#f1f5f9;--bg-secondary:#e2e8f0;
      --text-primary:#1e293b;--text-secondary:#475569;
      --text-muted:#94a3b8;
      --border-color:rgba(0,0,0,0.08);
      --input-bg:rgba(0,0,0,0.04);--input-border:rgba(0,0,0,0.15);
      --card-bg:linear-gradient(145deg,#ffffff,#f8fafc);
      --card-border:rgba(0,0,0,0.08);
      --shadow:0 8px 32px rgba(0,0,0,0.08);
      --nav-bg:rgba(255,255,255,0.97);
      --sidebar-bg:rgba(0,0,0,0.02);
      --tag-bg:rgba(6,182,212,0.1);
    }
    body{
      font-family:'Tajawal',sans-serif;
      background:linear-gradient(180deg,var(--bg-primary),var(--bg-secondary));
      color:var(--text-primary);min-height:100vh;
      transition:all 0.3s ease;
    }
    /* NAVBAR */
    .navbar{
      background:transparent;padding:1rem 1.5rem;
      position:fixed;top:0;left:0;width:100%;z-index:1000;
      transition:all 0.3s ease;
    }
    .navbar.scrolled{background:var(--nav-bg);backdrop-filter:blur(12px);box-shadow:0 4px 20px rgba(0,0,0,0.15);}
    .nav-container{max-width:1400px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;position:relative;}
    .logo{display:flex;align-items:center;gap:.5rem;text-decoration:none;}
    .logo img{height:46px;width:auto;object-fit:contain;}
    .nav-buttons{display:flex;align-items:center;gap:.75rem;}
    .nav-btn{
      border:1px solid;padding:8px 16px;border-radius:9999px;
      font-weight:500;transition:all .3s;display:flex;align-items:center;gap:5px;
      text-decoration:none;background:transparent;cursor:pointer;font-family:inherit;font-size:.9rem;
    }
    .home-btn{border-color:#64748b;color:#64748b;}
    .home-btn:hover{background:#64748b;color:#fff;}
    .login-btn{border-color:var(--accent-color);color:var(--accent-color);}
    .login-btn:hover{background:var(--accent-color);color:#fff;}
    .lang-btn{border-color:var(--accent-color);color:var(--accent-color);}
    .lang-btn:hover{background:var(--accent-color);color:#fff;}
    .theme-toggle{
      background:transparent;border:1px solid var(--accent-color);
      color:var(--accent-color);width:38px;height:38px;border-radius:50%;
      display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .3s;
    }
    .theme-toggle:hover{background:var(--accent-color);color:#fff;}
    /* LAYOUT */
    .page-layout{
      max-width:1400px;margin:0 auto;
      padding:90px 1.5rem 2rem;
      display:grid;
      grid-template-columns:280px 1fr;
      gap:1.5rem;
    }
    @media(max-width:1024px){.page-layout{grid-template-columns:1fr;}}
    /* SIDEBAR */
    .sidebar{
      background:var(--sidebar-bg);border:1px solid var(--border-color);
      border-radius:16px;padding:1.5rem;height:fit-content;
      position:sticky;top:90px;
    }
    @media(max-width:1024px){.sidebar{position:static;}}
    .sidebar-title{font-size:1.1rem;font-weight:700;margin-bottom:1.25rem;color:var(--text-primary);}
    .filter-group{margin-bottom:1.25rem;}
    .filter-label{font-size:.85rem;font-weight:600;color:var(--text-secondary);margin-bottom:.6rem;display:block;text-transform:uppercase;letter-spacing:.05em;}
    .filter-input{
      width:100%;padding:.7rem 1rem;border-radius:8px;
      border:1px solid var(--input-border);background:var(--input-bg);
      color:var(--text-primary);font-family:inherit;font-size:.9rem;
      transition:border-color .3s;
    }
    .filter-input:focus{outline:none;border-color:var(--accent-color);}
    .filter-input::placeholder{color:var(--text-muted);}
    .filter-input option{background:var(--bg-secondary);color:var(--text-primary);}
    .range-container{display:flex;flex-direction:column;gap:.4rem;}
    .range-slider{width:100%;accent-color:var(--accent-color);}
    .range-labels{display:flex;justify-content:space-between;font-size:.78rem;color:var(--text-muted);}
    .checkbox-group{display:flex;flex-direction:column;gap:.5rem;}
    .checkbox-item{display:flex;align-items:center;gap:.5rem;cursor:pointer;font-size:.9rem;color:var(--text-primary);}
    .checkbox-item input[type=checkbox]{accent-color:var(--accent-color);width:15px;height:15px;}
    .stars-filter{display:flex;gap:.35rem;flex-wrap:wrap;}
    .star-btn{
      padding:.35rem .75rem;border:1px solid var(--card-border);border-radius:20px;
      background:transparent;color:var(--text-secondary);cursor:pointer;font-size:.82rem;
      transition:all .3s;font-family:inherit;display:flex;align-items:center;gap:.3rem;
    }
    .star-btn.active,.star-btn:hover{border-color:var(--accent-color);color:var(--accent-color);background:var(--tag-bg);}
    .apply-btn{
      width:100%;padding:.8rem;border:none;border-radius:10px;
      background:linear-gradient(135deg,var(--accent-color),var(--accent-hover));
      color:#fff;font-size:1rem;font-weight:600;cursor:pointer;
      transition:all .3s;font-family:inherit;margin-top:.5rem;
    }
    .apply-btn:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(6,182,212,.35);}
    .reset-btn{
      width:100%;padding:.6rem;border:1px solid var(--border-color);border-radius:10px;
      background:transparent;color:var(--text-secondary);font-size:.9rem;cursor:pointer;
      transition:all .3s;font-family:inherit;margin-top:.5rem;
    }
    .reset-btn:hover{border-color:var(--accent-color);color:var(--accent-color);}
    /* MAIN CONTENT */
    .main-content{display:flex;flex-direction:column;gap:1.25rem;}
    .search-bar-wrapper{
      background:var(--card-bg);border:1px solid var(--card-border);
      border-radius:14px;padding:1rem 1.25rem;
      display:flex;align-items:center;gap:.75rem;flex-wrap:wrap;
    }
    .search-input-wrap{flex:1 1 200px;position:relative;}
    .search-input-wrap input{
      width:100%;padding:.75rem 1rem .75rem 2.75rem;
      border:1px solid var(--input-border);border-radius:10px;
      background:var(--input-bg);color:var(--text-primary);
      font-family:inherit;font-size:.95rem;transition:border-color .3s;
    }
    .search-input-wrap input:focus{outline:none;border-color:var(--accent-color);}
    .search-input-wrap input::placeholder{color:var(--text-muted);}
    .search-input-wrap .search-icon{position:absolute;left:.85rem;top:50%;transform:translateY(-50%);color:var(--text-muted);pointer-events:none;}
    .sort-select{
      padding:.7rem 1rem;border:1px solid var(--input-border);border-radius:10px;
      background:var(--input-bg);color:var(--text-primary);font-family:inherit;
      font-size:.9rem;cursor:pointer;transition:border-color .3s;
    }
    .sort-select:focus{outline:none;border-color:var(--accent-color);}
    .sort-select option{background:var(--bg-secondary);}
    .results-info{
      display:flex;align-items:center;justify-content:space-between;
      flex-wrap:wrap;gap:.5rem;color:var(--text-secondary);font-size:.9rem;
    }
    .active-filters{display:flex;gap:.5rem;flex-wrap:wrap;}
    .filter-tag{
      background:var(--tag-bg);color:var(--accent-color);
      padding:.3rem .75rem;border-radius:20px;font-size:.8rem;
      display:flex;align-items:center;gap:.4rem;
    }
    .filter-tag button{background:none;border:none;color:var(--accent-color);cursor:pointer;font-size:.9rem;line-height:1;padding:0;}
    /* ARTISAN GRID */
    .artisans-grid{
      display:grid;
      grid-template-columns:repeat(auto-fill,minmax(280px,1fr));
      gap:1.25rem;
    }
    .artisan-card{
      background:var(--card-bg);border:1px solid var(--card-border);
      border-radius:16px;overflow:hidden;
      transition:all .35s cubic-bezier(.175,.885,.32,1.275);
      cursor:pointer;text-decoration:none;display:block;color:inherit;
    }
    .artisan-card:hover{
      transform:translateY(-6px);
      box-shadow:0 16px 40px rgba(0,0,0,.3),0 0 50px rgba(6,182,212,.1);
      border-color:var(--accent-color);
    }
    .card-header{position:relative;padding:1.25rem 1.25rem .75rem;}
    .card-avatar{
      width:72px;height:72px;border-radius:50%;
      border:3px solid var(--accent-color);
      object-fit:cover;background:linear-gradient(135deg,#06b6d4,#0891b2);
      display:flex;align-items:center;justify-content:center;
      font-size:1.7rem;color:#fff;font-weight:700;
      overflow:hidden;flex-shrink:0;
    }
    .card-avatar img{width:100%;height:100%;object-fit:cover;}
    .available-badge{
      position:absolute;top:1rem;right:1rem;
      background:#10b981;color:#fff;
      padding:.25rem .65rem;border-radius:20px;font-size:.75rem;font-weight:600;
      display:flex;align-items:center;gap:.3rem;
    }
    .available-badge.busy{background:#ef4444;}
    .card-info{padding:0 1.25rem 1.25rem;}
    .artisan-name{font-size:1.1rem;font-weight:700;margin-bottom:.25rem;color:var(--text-primary);}
    .artisan-specialty{
      color:var(--accent-color);font-size:.9rem;font-weight:500;
      margin-bottom:.5rem;display:flex;align-items:center;gap:.35rem;
    }
    .artisan-location{
      color:var(--text-secondary);font-size:.85rem;
      display:flex;align-items:center;gap:.35rem;margin-bottom:.75rem;
    }
    .rating-row{display:flex;align-items:center;gap:.5rem;margin-bottom:.75rem;}
    .stars{color:#f59e0b;font-size:.95rem;letter-spacing:.05em;}
    .rating-num{font-weight:700;color:var(--text-primary);font-size:.9rem;}
    .review-count{color:var(--text-muted);font-size:.82rem;}
    .card-tags{display:flex;flex-wrap:wrap;gap:.4rem;margin-bottom:.9rem;}
    .tag{
      background:var(--tag-bg);color:var(--accent-color);
      padding:.25rem .6rem;border-radius:12px;font-size:.75rem;font-weight:500;
    }
    .card-footer{
      display:flex;align-items:center;justify-content:space-between;
      padding:.75rem 1.25rem;border-top:1px solid var(--card-border);
    }
    .artisan-rate{font-size:1rem;font-weight:700;color:var(--text-primary);}
    .artisan-rate span{font-size:.8rem;font-weight:400;color:var(--text-muted);}
    .contact-btn{
      padding:.5rem 1rem;border:none;border-radius:8px;
      background:linear-gradient(135deg,var(--accent-color),var(--accent-hover));
      color:#fff;font-size:.85rem;font-weight:600;cursor:pointer;
      transition:all .3s;font-family:inherit;
    }
    .contact-btn:hover{transform:translateY(-1px);box-shadow:0 4px 12px rgba(6,182,212,.35);}
    /* PAGINATION */
    .pagination{display:flex;align-items:center;justify-content:center;gap:.5rem;margin-top:1rem;flex-wrap:wrap;}
    .page-btn{
      padding:.5rem .9rem;border:1px solid var(--card-border);border-radius:8px;
      background:transparent;color:var(--text-secondary);cursor:pointer;
      transition:all .3s;font-family:inherit;
    }
    .page-btn:hover,.page-btn.active{border-color:var(--accent-color);background:var(--tag-bg);color:var(--accent-color);}
    /* EMPTY STATE */
    .empty-state{text-align:center;padding:3rem;color:var(--text-secondary);}
    .empty-state i{font-size:3rem;color:var(--text-muted);margin-bottom:1rem;display:block;}
    /* MOBILE FILTER TOGGLE */
    .filter-toggle-btn{
      display:none;padding:.7rem 1.25rem;border:1px solid var(--accent-color);
      border-radius:10px;background:transparent;color:var(--accent-color);
      font-family:inherit;font-size:.9rem;cursor:pointer;
      align-items:center;gap:.5rem;
    }
    @media(max-width:1024px){.filter-toggle-btn{display:flex;}}
    .sidebar.mobile-hidden{display:none;}
    @media(max-width:600px){
      .page-layout{padding:80px 1rem 2rem;}
      .artisans-grid{grid-template-columns:1fr;}
    }
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
        <a href="index.php" class="nav-btn home-btn">
          <i class="fas fa-home"></i>
          <span data-lang="fr">Accueil</span>
          <span data-lang="ar" style="display:none">الرئيسية</span>
        </a>
        <a href="login.php" class="nav-btn login-btn">
          <i class="fas fa-user"></i>
          <span data-lang="fr">Connexion</span>
          <span data-lang="ar" style="display:none">دخول</span>
        </a>
        <button class="nav-btn lang-btn" id="langSwitch">
          <span class="lang-flag">🇫🇷</span>
          <span data-lang="fr">Français</span>
          <span data-lang="ar" style="display:none">العربية</span>
        </button>
      </div>
    </div>
  </nav>

  <!-- PAGE LAYOUT -->
  <div class="page-layout">

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
      <h2 class="sidebar-title">
        <i class="fas fa-sliders-h" style="color:var(--accent-color);margin-right:.5rem;"></i>
        <span data-lang="fr">Filtres</span>
        <span data-lang="ar" style="display:none">فلاتر</span>
      </h2>

      <div class="filter-group">
        <label class="filter-label" data-lang="fr">Spécialité</label>
        <label class="filter-label" data-lang="ar" style="display:none">التخصص</label>
        <select class="filter-input" id="filterSpecialty">
          <option value="">-- Toutes --</option>
          <option value="Plombier">Plombier</option>
          <option value="Électricien">Électricien</option>
          <option value="Menuisier">Menuisier</option>
          <option value="Peintre">Peintre</option>
          <option value="Carreleur">Carreleur</option>
          <option value="Maçon">Maçon</option>
          <option value="Serrurier">Serrurier</option>
          <option value="Chauffagiste">Chauffagiste</option>
          <option value="Ébéniste">Ébéniste</option>
        </select>
      </div>

      <div class="filter-group">
        <label class="filter-label" data-lang="fr">Ville</label>
        <label class="filter-label" data-lang="ar" style="display:none">المدينة</label>
        <select class="filter-input" id="filterCity">
          <option value="">-- Toutes --</option>
          <option>Casablanca</option><option>Rabat</option>
          <option>Fès</option><option>Marrakech</option>
          <option>Tanger</option><option>Agadir</option>
          <option>Salé</option><option>Meknès</option><option>Oujda</option>
        </select>
      </div>

      <div class="filter-group">
        <label class="filter-label">
          <span data-lang="fr">Tarif horaire max: </span>
          <span data-lang="ar" style="display:none">الحد الأقصى للسعر: </span>
          <strong id="rateDisplay">500 DH</strong>
        </label>
        <div class="range-container">
          <input type="range" min="50" max="1000" value="500" step="50" class="range-slider" id="rateSlider">
          <div class="range-labels"><span>50 DH</span><span>1000 DH</span></div>
        </div>
      </div>

      <div class="filter-group">
        <label class="filter-label" data-lang="fr">Note minimale</label>
        <label class="filter-label" data-lang="ar" style="display:none">الحد الأدنى للتقييم</label>
        <div class="stars-filter" id="starsFilter">
          <button class="star-btn active" data-min="0" type="button">
            <span data-lang="fr">Tous</span><span data-lang="ar" style="display:none">الكل</span>
          </button>
          <button class="star-btn" data-min="3" type="button">3+ ⭐</button>
          <button class="star-btn" data-min="4" type="button">4+ ⭐</button>
          <button class="star-btn" data-min="4.5" type="button">4.5+ ⭐</button>
        </div>
      </div>

      <div class="filter-group">
        <label class="filter-label" data-lang="fr">Disponibilité</label>
        <label class="filter-label" data-lang="ar" style="display:none">التوفر</label>
        <div class="checkbox-group">
          <label class="checkbox-item">
            <input type="checkbox" id="availableOnly">
            <span data-lang="fr">Disponible uniquement</span>
            <span data-lang="ar" style="display:none">المتاحون فقط</span>
          </label>
          <label class="checkbox-item">
            <input type="checkbox" id="certifiedOnly">
            <span data-lang="fr">Certifiés uniquement</span>
            <span data-lang="ar" style="display:none">المعتمدون فقط</span>
          </label>
        </div>
      </div>

      <button class="apply-btn" id="applyFilters" type="button">
        <i class="fas fa-check"></i>
        <span data-lang="fr"> Appliquer les filtres</span>
        <span data-lang="ar" style="display:none"> تطبيق الفلاتر</span>
      </button>
      <button class="reset-btn" id="resetFilters" type="button">
        <i class="fas fa-undo"></i>
        <span data-lang="fr"> Réinitialiser</span>
        <span data-lang="ar" style="display:none"> إعادة تعيين</span>
      </button>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="main-content">

      <!-- SEARCH BAR -->
      <div class="search-bar-wrapper">
        <button class="filter-toggle-btn" id="filterToggle" type="button">
          <i class="fas fa-sliders-h"></i>
          <span data-lang="fr">Filtres</span>
          <span data-lang="ar" style="display:none">فلاتر</span>
        </button>
        <div class="search-input-wrap">
          <i class="fas fa-search search-icon"></i>
          <input type="text" id="searchInput"
                 data-placeholder-fr="Rechercher par nom ou spécialité..."
                 data-placeholder-ar="ابحث بالاسم أو التخصص..."
                 placeholder="Rechercher par nom ou spécialité...">
        </div>
        <select class="sort-select" id="sortSelect">
          <option value="rating" data-lang="fr">Mieux notés</option>
          <option value="rate_asc" data-lang="fr">Tarif ↑</option>
          <option value="rate_desc" data-lang="fr">Tarif ↓</option>
          <option value="experience" data-lang="fr">Expérience</option>
        </select>
      </div>

      <!-- RESULTS INFO -->
      <div class="results-info">
        <span id="resultsCount"></span>
        <div class="active-filters" id="activeFilters"></div>
      </div>

      <!-- ARTISAN GRID -->
      <div class="artisans-grid" id="artisansGrid"></div>

      <!-- PAGINATION -->
      <div class="pagination" id="pagination"></div>
    </div>
  </div>

  <script>
    // ========== STATE ==========
    let currentLang = localStorage.getItem('lang') || 'fr';
    let currentTheme = localStorage.getItem('theme') || 'dark';
    let filters = { specialty: '', city: '', maxRate: 500, minRating: 0, availableOnly: false, certifiedOnly: false };
    let searchQuery = '';
    let sortBy = 'rating';
    let currentPage = 1;
    const PER_PAGE = 9;

    // ========== MOCK DATA ==========
    const ARTISANS = [
      { id:1, name:'Ahmed Benhaddou', specialty:'Plombier', city:'Casablanca', rating:4.8, reviews:127, rate:250, experience:12, available:true, certified:true, tags:['Urgences','Chauffe-eau','Sanitaire'] },
      { id:2, name:'Khalid Mansouri', specialty:'Électricien', city:'Rabat', rating:4.6, reviews:89, rate:200, experience:8, available:true, certified:true, tags:['Tableau électrique','Éclairage','Domotique'] },
      { id:3, name:'Youssef Alami', specialty:'Menuisier', city:'Fès', rating:4.9, reviews:214, rate:300, experience:15, available:false, certified:true, tags:['Portes','Fenêtres','Cuisine'] },
      { id:4, name:'Hassan Tazi', specialty:'Peintre', city:'Marrakech', rating:4.3, reviews:56, rate:150, experience:6, available:true, certified:false, tags:['Intérieur','Façade','Décoratif'] },
      { id:5, name:'Omar Chraibi', specialty:'Carreleur', city:'Casablanca', rating:4.7, reviews:98, rate:220, experience:10, available:true, certified:true, tags:['Faïence','Sol','Salle de bain'] },
      { id:6, name:'Rachid Fassi', specialty:'Maçon', city:'Tanger', rating:4.5, reviews:73, rate:180, experience:9, available:false, certified:false, tags:['Rénovation','Construction','Enduit'] },
      { id:7, name:'Mustapha Idrissi', specialty:'Serrurier', city:'Agadir', rating:4.4, reviews:41, rate:160, experience:7, available:true, certified:true, tags:['Urgences 24h','Blindage','Coffre-fort'] },
      { id:8, name:'Abdellatif Berrada', specialty:'Chauffagiste', city:'Casablanca', rating:4.2, reviews:33, rate:280, experience:11, available:true, certified:true, tags:['Climatisation','Chaudière','VMC'] },
      { id:9, name:'Tarik Oulhaj', specialty:'Ébéniste', city:'Meknès', rating:4.6, reviews:67, rate:350, experience:14, available:true, certified:false, tags:['Meubles sur-mesure','Restauration','Bois précieux'] },
      { id:10, name:'Samir Benali', specialty:'Plombier', city:'Rabat', rating:4.1, reviews:22, rate:190, experience:5, available:false, certified:false, tags:['Fuite','Chauffe-eau','WC'] },
      { id:11, name:'Nabil Zerhouni', specialty:'Électricien', city:'Casablanca', rating:4.9, reviews:183, rate:230, experience:13, available:true, certified:true, tags:['Solaire','Onduleur','Câblage'] },
      { id:12, name:'Hamid Louafi', specialty:'Menuisier', city:'Oujda', rating:3.9, reviews:18, rate:140, experience:4, available:true, certified:false, tags:['Parquet','Portes','Placard'] },
    ];

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
      renderResults();
    }
    document.getElementById('langSwitch').addEventListener('click', () => {
      currentLang = currentLang === 'fr' ? 'ar' : 'fr';
      localStorage.setItem('lang', currentLang);
      updateLanguage();
    });

    // ========== MOBILE FILTER TOGGLE ==========
    document.getElementById('filterToggle').addEventListener('click', () => {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('mobile-hidden');
    });
    // Initialize sidebar hidden on mobile
    if (window.innerWidth <= 1024) {
      document.getElementById('sidebar').classList.add('mobile-hidden');
    }

    // ========== RANGE SLIDER ==========
    document.getElementById('rateSlider').addEventListener('input', function() {
      filters.maxRate = parseInt(this.value);
      document.getElementById('rateDisplay').textContent = this.value + ' DH';
    });

    // ========== STARS FILTER ==========
    document.querySelectorAll('.star-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.star-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        filters.minRating = parseFloat(btn.dataset.min);
      });
    });

    // ========== APPLY / RESET ==========
    document.getElementById('applyFilters').addEventListener('click', () => {
      filters.specialty = document.getElementById('filterSpecialty').value;
      filters.city = document.getElementById('filterCity').value;
      filters.availableOnly = document.getElementById('availableOnly').checked;
      filters.certifiedOnly = document.getElementById('certifiedOnly').checked;
      currentPage = 1;
      renderResults();
      if (window.innerWidth <= 1024) document.getElementById('sidebar').classList.add('mobile-hidden');
    });

    document.getElementById('resetFilters').addEventListener('click', () => {
      filters = { specialty:'', city:'', maxRate:500, minRating:0, availableOnly:false, certifiedOnly:false };
      document.getElementById('filterSpecialty').value = '';
      document.getElementById('filterCity').value = '';
      document.getElementById('rateSlider').value = 500;
      document.getElementById('rateDisplay').textContent = '500 DH';
      document.getElementById('availableOnly').checked = false;
      document.getElementById('certifiedOnly').checked = false;
      document.querySelectorAll('.star-btn').forEach(b => b.classList.remove('active'));
      document.querySelector('.star-btn[data-min="0"]').classList.add('active');
      searchQuery = '';
      document.getElementById('searchInput').value = '';
      currentPage = 1;
      renderResults();
    });

    // ========== SEARCH ==========
    document.getElementById('searchInput').addEventListener('input', function() {
      searchQuery = this.value.trim().toLowerCase();
      currentPage = 1;
      renderResults();
    });

    // ========== SORT ==========
    document.getElementById('sortSelect').addEventListener('change', function() {
      sortBy = this.value;
      renderResults();
    });

    // ========== STARS HTML ==========
    function starsHtml(rating) {
      let s = '';
      for (let i = 1; i <= 5; i++) {
        if (rating >= i) s += '★';
        else if (rating >= i - 0.5) s += '½';
        else s += '☆';
      }
      return s;
    }

    // ========== RENDER ==========
    function getFiltered() {
      return ARTISANS.filter(a => {
        if (filters.specialty && a.specialty !== filters.specialty) return false;
        if (filters.city && a.city !== filters.city) return false;
        if (a.rate > filters.maxRate) return false;
        if (a.rating < filters.minRating) return false;
        if (filters.availableOnly && !a.available) return false;
        if (filters.certifiedOnly && !a.certified) return false;
        if (searchQuery && !a.name.toLowerCase().includes(searchQuery) && !a.specialty.toLowerCase().includes(searchQuery)) return false;
        return true;
      }).sort((a, b) => {
        if (sortBy === 'rating') return b.rating - a.rating;
        if (sortBy === 'rate_asc') return a.rate - b.rate;
        if (sortBy === 'rate_desc') return b.rate - a.rate;
        if (sortBy === 'experience') return b.experience - a.experience;
        return 0;
      });
    }

    function renderResults() {
      const filtered = getFiltered();
      const total = filtered.length;
      const pages = Math.ceil(total / PER_PAGE);
      const start = (currentPage - 1) * PER_PAGE;
      const page = filtered.slice(start, start + PER_PAGE);

      // Count
      document.getElementById('resultsCount').textContent = currentLang === 'fr'
        ? `${total} artisan${total !== 1 ? 's' : ''} trouvé${total !== 1 ? 's' : ''}`
        : `${total} حرفي تم العثور عليه`;

      // Active filter tags
      const af = document.getElementById('activeFilters');
      af.innerHTML = '';
      if (filters.specialty) addTag(af, filters.specialty, () => { filters.specialty = ''; document.getElementById('filterSpecialty').value=''; renderResults(); });
      if (filters.city) addTag(af, filters.city, () => { filters.city = ''; document.getElementById('filterCity').value=''; renderResults(); });
      if (filters.minRating > 0) addTag(af, `${filters.minRating}+ ⭐`, () => { filters.minRating=0; document.querySelector('.star-btn[data-min="0"]').classList.add('active'); renderResults(); });
      if (filters.availableOnly) addTag(af, currentLang==='fr'?'Disponible':'متاح', () => { filters.availableOnly=false; document.getElementById('availableOnly').checked=false; renderResults(); });
      if (filters.certifiedOnly) addTag(af, currentLang==='fr'?'Certifié':'معتمد', () => { filters.certifiedOnly=false; document.getElementById('certifiedOnly').checked=false; renderResults(); });

      // Grid
      const grid = document.getElementById('artisansGrid');
      if (!page.length) {
        grid.innerHTML = `<div class="empty-state" style="grid-column:1/-1"><i class="fas fa-search"></i><p>${currentLang==='fr'?'Aucun artisan trouvé.':'لم يتم العثور على حرفيين.'}</p></div>`;
      } else {
        grid.innerHTML = page.map(a => {
          const initial = a.name.charAt(0);
          const avail = a.available
            ? `<span class="available-badge"><i class="fas fa-circle" style="font-size:.6rem;"></i>${currentLang==='fr'?'Disponible':'متاح'}</span>`
            : `<span class="available-badge busy"><i class="fas fa-circle" style="font-size:.6rem;"></i>${currentLang==='fr'?'Occupé':'مشغول'}</span>`;
          const cert = a.certified ? `<span class="tag"><i class="fas fa-certificate"></i> ${currentLang==='fr'?'Certifié':'معتمد'}</span>` : '';
          const tagHtml = [...a.tags.slice(0,2).map(t => `<span class="tag">${t}</span>`), cert].join('');
          return `<a class="artisan-card" href="artisan-profile.php?id=${a.id}">
            <div class="card-header">
              <div class="card-avatar">${initial}</div>
              ${avail}
            </div>
            <div class="card-info">
              <div class="artisan-name">${a.name}</div>
              <div class="artisan-specialty"><i class="fas fa-tools"></i>${a.specialty}</div>
              <div class="artisan-location"><i class="fas fa-map-marker-alt"></i>${a.city}</div>
              <div class="rating-row">
                <span class="stars">${starsHtml(a.rating)}</span>
                <span class="rating-num">${a.rating}</span>
                <span class="review-count">(${a.reviews} ${currentLang==='fr'?'avis':'تقييم'})</span>
              </div>
              <div class="card-tags">${tagHtml}</div>
            </div>
            <div class="card-footer">
              <div class="artisan-rate">${a.rate} DH<span>/${currentLang==='fr'?'heure':'ساعة'}</span></div>
              <button class="contact-btn" onclick="event.preventDefault();event.stopPropagation();window.location='artisan-profile.php?id=${a.id}'">
                ${currentLang==='fr'?'Contacter':'تواصل'}
              </button>
            </div>
          </a>`;
        }).join('');
      }

      // Pagination
      renderPagination(pages);
    }

    function addTag(container, text, removeFn) {
      const tag = document.createElement('div');
      tag.className = 'filter-tag';
      tag.innerHTML = `${text}<button type="button" aria-label="Remove filter">×</button>`;
      tag.querySelector('button').addEventListener('click', removeFn);
      container.appendChild(tag);
    }

    function renderPagination(pages) {
      const el = document.getElementById('pagination');
      el.innerHTML = '';
      if (pages <= 1) return;
      const prev = document.createElement('button');
      prev.className = 'page-btn'; prev.textContent = '‹'; prev.type = 'button';
      prev.disabled = currentPage === 1;
      prev.addEventListener('click', () => { if (currentPage > 1) { currentPage--; renderResults(); window.scrollTo(0,200); } });
      el.appendChild(prev);
      for (let i = 1; i <= pages; i++) {
        const btn = document.createElement('button');
        btn.className = `page-btn${i === currentPage ? ' active' : ''}`;
        btn.textContent = i; btn.type = 'button';
        btn.addEventListener('click', () => { currentPage = i; renderResults(); window.scrollTo(0,200); });
        el.appendChild(btn);
      }
      const next = document.createElement('button');
      next.className = 'page-btn'; next.textContent = '›'; next.type = 'button';
      next.disabled = currentPage === pages;
      next.addEventListener('click', () => { if (currentPage < pages) { currentPage++; renderResults(); window.scrollTo(0,200); } });
      el.appendChild(next);
    }

    // ========== INIT ==========
    updateLanguage();
    renderResults();
  </script>
</body>
</html>
