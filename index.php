<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AlloHrayfi | Plateforme d'Artisans Marocains</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-primary: #071124;
      --bg-secondary: #0b1724;
      --bg-card: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      --text-primary: #e6eef6;
      --text-secondary: rgba(255,255,255,0.7);
      --text-muted: rgba(255,255,255,0.65);
      --accent-color: #06b6d4;
      --accent-hover: #0891b2;
      --border-color: rgba(255,255,255,0.06);
      --input-bg: transparent;
      --input-border: rgba(255,255,255,0.1);
      --shadow: 0 6px 30px rgba(2,6,23,0.6);
      --nav-bg: rgba(15, 23, 36, 0.97);
      --footer-bg: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      --social-btn-bg: rgba(255,255,255,0.05);
      --card-bg: linear-gradient(145deg, rgba(255,255,255,0.05), rgba(255,255,255,0.02));
      --card-border: rgba(255,255,255,0.1);
      --suggestion-bg: #0b1220;
      --suggestion-hover: rgba(6,182,212,0.08);
    }
    .light-mode {
      --bg-primary: #f8fafc;
      --bg-secondary: #e2e8f0;
      --bg-card: linear-gradient(180deg, rgba(0,0,0,0.02), rgba(0,0,0,0.01));
      --text-primary: #1e293b;
      --text-secondary: #475569;
      --text-muted: #64748b;
      --accent-color: #06b6d4;
      --accent-hover: #0891b2;
      --border-color: rgba(0,0,0,0.06);
      --input-bg: transparent;
      --input-border: rgba(0,0,0,0.1);
      --shadow: 0 6px 30px rgba(0,0,0,0.1);
      --nav-bg: rgba(255,255,255,0.97);
      --footer-bg: linear-gradient(180deg, rgba(0,0,0,0.02), rgba(0,0,0,0.01));
      --social-btn-bg: rgba(0,0,0,0.05);
      --card-bg: linear-gradient(145deg, rgba(0,0,0,0.05), rgba(0,0,0,0.02));
      --card-border: rgba(0,0,0,0.1);
      --suggestion-bg: #f8fafc;
      --suggestion-hover: rgba(6,182,212,0.08);
    }
    * { box-sizing: border-box; }
    body {
      font-family: 'Tajawal', sans-serif;
      background: linear-gradient(180deg, var(--bg-primary) 0%, var(--bg-secondary) 100%);
      color: var(--text-primary);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding: 32px;
      padding-top: 100px; /* account for fixed navbar */
      transition: background 0.3s ease, color 0.3s ease;
      margin: 0;
    }
    /* ===== NAVBAR ===== */
    .navbar {
      background: transparent;
      transition: all 0.3s ease;
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      z-index: 50;
    }
    .navbar.scrolled {
      background: var(--nav-bg);
      backdrop-filter: blur(12px);
      box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }
    .nav-container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 1.5rem;
      position: relative;
    }
    .logo-container {
      display: flex;
      justify-content: center;
      width: 100%;
      position: absolute;
      left: 0;
      pointer-events: none;
    }
    .logo-content {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: var(--text-primary);
      font-size: 1.25rem;
      font-weight: bold;
      pointer-events: auto;
      text-decoration: none;
    }
    .logo-content img { height: 50px; width: auto; object-fit: contain; }
    .hamburger-menu {
      display: flex;
      flex-direction: column;
      cursor: pointer;
      padding: 5px;
      z-index: 60;
      background: transparent;
      border: none;
    }
    .hamburger-line {
      width: 25px; height: 3px;
      background-color: var(--text-primary);
      margin: 3px 0;
      transition: 0.3s;
      border-radius: 2px;
    }
    .nav-buttons {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      z-index: 60;
    }
    .theme-toggle {
      background: transparent;
      border: 1px solid var(--accent-color);
      color: var(--accent-color);
      width: 40px; height: 40px;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
      flex-shrink: 0;
    }
    .theme-toggle:hover { background: var(--accent-color); color: white; }
    .nav-btn {
      border: 1px solid;
      padding: 8px 16px;
      border-radius: 9999px;
      font-weight: 500;
      transition: all 0.3s ease;
      display: flex; align-items: center; gap: 5px;
      white-space: nowrap;
      text-decoration: none;
      background: transparent;
      cursor: pointer;
      font-size: 0.9rem;
    }
    .login-btn { border-color: var(--accent-color); color: var(--accent-color); }
    .login-btn:hover { background: var(--accent-color); color: white; }
    .lang-btn { border-color: var(--accent-color); color: var(--accent-color); }
    .lang-btn:hover { background: var(--accent-color); color: white; }
    /* Mobile nav */
    .mobile-nav {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: var(--nav-bg);
      backdrop-filter: blur(12px);
      z-index: 100;
      display: flex; flex-direction: column;
      justify-content: center; align-items: center;
      transform: translateX(-100%);
      transition: transform 0.3s ease;
    }
    .mobile-nav.active { transform: translateX(0); }
    .mobile-nav a {
      color: var(--text-primary);
      text-decoration: none;
      font-size: 1.5rem;
      margin: 12px 0;
      padding: 10px 20px;
      border-radius: 5px;
      transition: background 0.3s;
    }
    .mobile-nav a:hover { background: rgba(6,182,212,0.2); }
    .mobile-nav .nav-btn {
      margin: 8px 0;
      font-size: 1.1rem;
      padding: 12px 24px;
      width: 80%; max-width: 250px;
      justify-content: center;
    }
    .close-menu {
      position: absolute;
      top: 20px; right: 20px;
      background: none; border: none;
      color: var(--text-primary);
      font-size: 2rem;
      cursor: pointer;
      z-index: 110;
    }
    /* ===== HERO SECTION ===== */
    .hero-section {
      width: 100%;
      max-width: 1200px;
      display: flex;
      flex-direction: column;
      gap: 2.5rem;
      align-items: center;
      margin-bottom: 2rem;
    }
    @media (min-width: 768px) {
      .hero-section { flex-direction: row; }
    }
    .hero-img {
      border-radius: 1.25rem;
      box-shadow: 0 10px 40px rgba(0,0,0,0.4);
      width: 100%;
      object-fit: cover;
      transition: transform 0.3s;
    }
    .hero-img:hover { transform: translateY(-6px); }
    .hero-text h2 {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--accent-color);
      margin-bottom: 1rem;
    }
    .hero-text p {
      color: var(--text-secondary);
      line-height: 1.7;
      margin-bottom: 1.5rem;
    }
    .see-more-btn {
      background: var(--accent-color);
      color: white;
      border: none;
      padding: 0.6rem 1.5rem;
      border-radius: 9999px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s;
      font-size: 1rem;
    }
    .see-more-btn:hover { background: var(--accent-hover); transform: translateY(-2px); }
    /* ===== SEARCH CARD ===== */
    .search-card {
      width: 100%;
      max-width: 920px;
      background: var(--bg-card);
      border-radius: 12px;
      box-shadow: var(--shadow);
      padding: 20px;
      border: 1px solid var(--border-color);
      margin-bottom: 2rem;
    }
    .search-card h2 { margin: 0 0 12px 0; font-size: 1.1rem; font-weight: 600; color: var(--text-primary); }
    .controls { display: flex; gap: 12px; flex-wrap: wrap; }
    .field { flex: 1 1 240px; position: relative; }
    .field input {
      width: 100%;
      padding: 12px 40px 12px 14px;
      border-radius: 8px;
      border: 1px solid var(--input-border);
      background: var(--input-bg);
      color: var(--text-primary);
      outline: none;
      font-size: 15px;
      font-family: 'Tajawal', sans-serif;
      transition: border-color 0.3s;
    }
    .field input:focus { border-color: var(--accent-color); }
    .field input::placeholder { color: var(--text-muted); }
    .field .icon {
      position: absolute; right: 12px; top: 50%;
      transform: translateY(-50%);
      color: var(--text-secondary);
      pointer-events: none;
    }
    .btn {
      background: var(--accent-color);
      color: white;
      border: none;
      padding: 12px 18px;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      display: flex; gap: 8px; align-items: center;
      font-family: 'Tajawal', sans-serif;
      transition: background 0.3s, transform 0.1s;
    }
    .btn:hover { background: var(--accent-hover); }
    .btn:active { transform: translateY(1px); }
    .suggestions {
      position: absolute; left: 0; right: 0;
      top: calc(100% + 6px);
      background: var(--suggestion-bg);
      border-radius: 8px;
      box-shadow: var(--shadow);
      max-height: 220px; overflow: auto;
      border: 1px solid var(--border-color);
      z-index: 40;
    }
    .suggestions button {
      width: 100%; text-align: left;
      padding: 10px 12px; border: none;
      background: transparent;
      color: var(--text-primary);
      cursor: pointer; font-size: 14px;
      font-family: 'Tajawal', sans-serif;
    }
    .suggestions button:hover { background: var(--suggestion-hover); }
    .gps-btn {
      background: transparent;
      color: var(--text-primary);
      border: 1px solid var(--border-color);
    }
    .gps-btn:hover { background: var(--border-color); }
    .results { margin-top: 14px; display: grid; gap: 10px; }
    .result {
      padding: 12px;
      background: var(--bg-card);
      border-radius: 8px;
      border: 1px solid var(--border-color);
      cursor: pointer;
      transition: border-color 0.2s;
      text-decoration: none;
      display: block;
    }
    .result:hover { border-color: var(--accent-color); }
    .result strong { color: var(--text-primary); }
    .meta { font-size: 13px; color: var(--text-muted); margin-top: 3px; }
    /* ===== WHY US CARDS ===== */
    .why-us-section { width: 100%; max-width: 1200px; margin: 2rem auto; padding: 0 4px; }
    .why-us-title {
      font-size: clamp(2rem, 5vw, 3rem);
      font-weight: 800; text-align: center; margin-bottom: 12px;
      background: linear-gradient(45deg, #06b6d4, #10b981, #f59e0b, #ec4899);
      background-size: 400% 400%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      animation: gradientShift 8s ease infinite;
    }
    @keyframes gradientShift {
      0%,100% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
    }
    .why-us-subtitle {
      text-align: center; color: var(--text-secondary);
      margin-bottom: 40px; font-size: 1.1rem;
      max-width: 600px; margin-left: auto; margin-right: auto;
    }
    .crazy-cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
      gap: 24px;
    }
    .crazy-card {
      background: var(--card-bg);
      border-radius: 20px; padding: 28px;
      border: 1px solid var(--card-border);
      position: relative; overflow: hidden;
      transition: all 0.4s cubic-bezier(0.175,0.885,0.32,1.275);
      animation: float 6s ease-in-out infinite;
    }
    .crazy-card:nth-child(1) { animation-delay: 0s; border-top: 4px solid #06b6d4; }
    .crazy-card:nth-child(2) { animation-delay: 1s; border-top: 4px solid #10b981; }
    .crazy-card:nth-child(3) { animation-delay: 2s; border-top: 4px solid #f59e0b; }
    .crazy-card:nth-child(4) { animation-delay: 3s; border-top: 4px solid #ec4899; }
    @keyframes float {
      0%,100% { transform: translateY(0); }
      50% { transform: translateY(-8px); }
    }
    .crazy-card::before {
      content: ''; position: absolute;
      top: 0; left: -100%; width: 100%; height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.06), transparent);
      transition: left 0.6s ease;
    }
    .crazy-card:hover::before { left: 100%; }
    .crazy-card:hover {
      transform: translateY(-12px) scale(1.03);
      box-shadow: 0 20px 40px rgba(0,0,0,0.3), 0 0 60px rgba(6,182,212,0.15);
    }
    .glow {
      position: absolute; width: 180px; height: 180px;
      border-radius: 50%; filter: blur(55px); opacity: 0.25; z-index: 0;
    }
    .card-1 .glow { background: #06b6d4; top: -50px; right: -50px; }
    .card-2 .glow { background: #10b981; bottom: -50px; left: -50px; }
    .card-3 .glow { background: #f59e0b; top: -50px; left: -50px; }
    .card-4 .glow { background: #ec4899; bottom: -50px; right: -50px; }
    .particles { position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1; }
    .particle {
      position: absolute; width: 4px; height: 4px;
      background: var(--text-secondary); border-radius: 50%;
      animation: particleFloat 8s infinite linear;
    }
    @keyframes particleFloat {
      0% { transform: translateY(100%) translateX(0); opacity: 0; }
      10% { opacity: 0.7; }
      90% { opacity: 0.7; }
      100% { transform: translateY(-100%) translateX(15px); opacity: 0; }
    }
    .card-icon {
      width: 70px; height: 70px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 20px; font-size: 1.8rem;
      position: relative; z-index: 2;
      transition: transform 0.4s ease;
      color: white;
    }
    .crazy-card:hover .card-icon { transform: scale(1.15) rotate(12deg); }
    .card-1 .card-icon { background: linear-gradient(135deg,#06b6d4,#0891b2); box-shadow: 0 8px 25px rgba(6,182,212,0.4); }
    .card-2 .card-icon { background: linear-gradient(135deg,#10b981,#059669); box-shadow: 0 8px 25px rgba(16,185,129,0.4); }
    .card-3 .card-icon { background: linear-gradient(135deg,#f59e0b,#d97706); box-shadow: 0 8px 25px rgba(245,158,11,0.4); }
    .card-4 .card-icon { background: linear-gradient(135deg,#ec4899,#db2777); box-shadow: 0 8px 25px rgba(236,72,153,0.4); }
    .card-title { font-size: 1.3rem; font-weight: 700; margin-bottom: 12px; color: var(--text-primary); position: relative; z-index: 2; }
    .card-text { color: var(--text-secondary); line-height: 1.6; margin-bottom: 16px; position: relative; z-index: 2; font-size: 0.95rem; }
    .card-features { display: flex; flex-wrap: wrap; gap: 7px; position: relative; z-index: 2; }
    .feature-tag {
      background: var(--social-btn-bg); color: var(--text-primary);
      padding: 5px 11px; border-radius: 20px; font-size: 0.78rem;
      font-weight: 500; border: 1px solid var(--card-border);
      transition: all 0.3s ease;
    }
    .crazy-card:hover .feature-tag { transform: translateY(-2px); background: var(--suggestion-hover); }
    /* ===== FOOTER ===== */
    .footer {
      width: 100%; background: var(--footer-bg);
      border-top: 1px solid var(--border-color);
      margin-top: 60px; padding: 40px 20px;
    }
    .footer-content {
      max-width: 1200px; margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 28px;
    }
    .footer-section h3 { color: var(--text-primary); font-size: 1.1rem; margin-bottom: 16px; font-weight: 600; }
    .footer-section p, .footer-section a {
      color: var(--text-secondary); line-height: 1.7;
      margin-bottom: 8px; display: block;
      text-decoration: none; transition: color 0.3s;
    }
    .footer-section a:hover { color: var(--accent-color); }
    .social-links { display: flex; gap: 12px; margin-top: 12px; }
    .social-links a {
      display: flex; align-items: center; justify-content: center;
      width: 36px; height: 36px; border-radius: 50%;
      background: var(--social-btn-bg);
      color: var(--text-secondary);
      transition: all 0.3s;
    }
    .social-links a:hover { background: var(--accent-color); color: white; transform: translateY(-3px); }
    .footer-bottom {
      max-width: 1200px; margin: 24px auto 0;
      padding-top: 20px; border-top: 1px solid var(--border-color);
      text-align: center; color: var(--text-muted); font-size: 0.9rem;
    }
    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
      .nav-buttons .login-btn, .nav-buttons .lang-btn { display: none; }
    }
    @media (min-width: 1025px) {
      .hamburger-menu { display: none; }
      .mobile-nav .login-btn, .mobile-nav .lang-btn { display: none !important; }
    }
    @media (max-width: 560px) {
      .controls { flex-direction: column; }
      .btn { width: 100%; justify-content: center; }
    }
    @media (max-width: 768px) {
      body { padding: 16px; padding-top: 85px; }
      .crazy-cards-container { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <header class="navbar" id="navbar">
    <div class="nav-container">
      <button class="hamburger-menu" id="hamburgerBtn" aria-label="Menu">
        <div class="hamburger-line"></div>
        <div class="hamburger-line"></div>
        <div class="hamburger-line"></div>
      </button>
      <div class="logo-container">
        <a href="index.php" class="logo-content">
          <img src="img/logo-removebg-preview.png" alt="AlloHrayfi Logo">
        </a>
      </div>
      <div class="nav-buttons">
        <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
          <i class="fas fa-moon"></i>
        </button>
        <a href="login.php" class="nav-btn login-btn">
          <i class="bi bi-person"></i>
          <span data-lang="fr">Se connecter</span>
          <span data-lang="ar" style="display:none">تسجيل الدخول</span>
        </a>
        <button id="langSwitch" class="nav-btn lang-btn">
          <span class="lang-flag">🇫🇷</span>
          <span data-lang="fr">Français</span>
          <span data-lang="ar" style="display:none">العربية</span>
        </button>
      </div>
    </div>
  </header>

  <!-- MOBILE NAV -->
  <div class="mobile-nav" id="mobileNav">
    <button class="close-menu" id="closeMenu" aria-label="Close menu">
      <i class="bi bi-x-lg"></i>
    </button>
    <a href="index.php" data-lang="fr">Accueil</a>
    <a href="index.php" data-lang="ar" style="display:none">الرئيسية</a>
    <a href="annonce.php" data-lang="fr">Artisans</a>
    <a href="annonce.php" data-lang="ar" style="display:none">الحرفيون</a>
    <a href="login.php" class="nav-btn login-btn mobile-only">
      <i class="bi bi-person"></i>
      <span data-lang="fr">Se connecter</span>
      <span data-lang="ar" style="display:none">تسجيل الدخول</span>
    </a>
    <button id="mobileLangSwitch" class="nav-btn lang-btn mobile-only">
      <span class="lang-flag">🇫🇷</span>
      <span data-lang="fr">Français</span>
      <span data-lang="ar" style="display:none">العربية</span>
    </button>
  </div>

  <!-- HERO SECTION -->
  <section class="hero-section" style="margin-top:1rem;">
    <div style="flex:1;min-width:0;">
      <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=900&q=80"
           alt="Construction site" class="hero-img">
    </div>
    <div class="hero-text" style="flex:1;min-width:0;">
      <h2 data-lang="fr">Connecter des artisans qualifiés avec des clients à travers le Maroc</h2>
      <h2 data-lang="ar" style="display:none">ربط الحرفيين المؤهلين مع العملاء في مختلف المدن المغربية</h2>
      <p id="artisan-desc" data-lang="fr">
        La plateforme marocaine <strong>AlloHrayfi</strong> vise à connecter des artisans qualifiés avec des clients qui ont besoin de leurs services. Que vous soyez un artisan cherchant des clients ou un client cherchant un professionnel, vous êtes au bon endroit.
      </p>
      <p id="artisan-desc-ar" data-lang="ar" style="display:none">
        تهدف منصة <strong>AlloHrayfi</strong> إلى ربط الحرفيين المهرة بالعملاء الذين يحتاجون إلى خدماتهم. سواء كنت حرفيًا تبحث عن عملاء أو عميلًا يبحث عن صانع ماهر، فأنت في المكان الصحيح.
      </p>
      <button id="seeMoreBtn" class="see-more-btn">
        <span data-lang="fr">Voir Plus</span>
        <span data-lang="ar" style="display:none">عرض المزيد</span>
      </button>
    </div>
  </section>

  <!-- SEARCH SECTION -->
  <div class="search-card" role="region" aria-label="Recherche artisans">
    <h2 data-lang="fr">Trouvez des artisans près de chez vous</h2>
    <h2 data-lang="ar" style="display:none">ابحث عن حرفيين بالقرب منك</h2>
    <div class="controls">
      <div class="field" style="flex:1 1 360px">
        <input id="job"
               placeholder="Rechercher un métier (ex: Plombier, Électricien)"
               autocomplete="off"
               aria-autocomplete="list"
               aria-controls="job-suggestions"
               aria-expanded="false">
        <i class="fa-solid fa-briefcase icon"></i>
        <div id="job-suggestions" class="suggestions" role="listbox" hidden></div>
      </div>
      <div class="field">
        <input id="location"
               placeholder="Ville ou région"
               autocomplete="off"
               aria-autocomplete="list"
               aria-controls="loc-suggestions"
               aria-expanded="false">
        <i class="fa-solid fa-location-dot icon"></i>
        <div id="loc-suggestions" class="suggestions" role="listbox" hidden></div>
      </div>
      <button id="searchBtn" class="btn">
        <i class="fa-solid fa-magnifying-glass"></i>
        <span data-lang="fr">Rechercher</span>
        <span data-lang="ar" style="display:none">بحث</span>
      </button>
    </div>
    <div style="margin-top:12px;display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
      <button id="gpsBtn" class="btn gps-btn">
        <i class="fa-solid fa-location-crosshairs"></i>
        <span data-lang="fr">Utiliser ma position</span>
        <span data-lang="ar" style="display:none">استخدم موقعي</span>
      </button>
      <small style="color:var(--text-muted);" data-lang="fr">Essayez: "plombier", "électricien", "menuisier"</small>
      <small style="color:var(--text-muted);display:none;" data-lang="ar">جرب: "سباك"، "كهربائي"، "نجار"</small>
    </div>
    <div id="results" class="results" aria-live="polite"></div>
  </div>

  <!-- WHY US SECTION -->
  <section class="why-us-section">
    <h2 class="why-us-title" data-lang="fr">Pourquoi Nous Choisir ?</h2>
    <h2 class="why-us-title" data-lang="ar" style="display:none">لماذا تختارنا؟</h2>
    <p class="why-us-subtitle" data-lang="fr">Découvrez les avantages uniques de notre plateforme</p>
    <p class="why-us-subtitle" data-lang="ar" style="display:none">اكتشف المزايا الفريدة لمنصتنا</p>
    <div class="crazy-cards-container">
      <div class="crazy-card card-1">
        <div class="glow"></div>
        <div class="particles" id="particles-1"></div>
        <div class="card-icon"><i class="fas fa-shield-alt"></i></div>
        <h3 class="card-title" data-lang="fr">Sécurité Maximale</h3>
        <h3 class="card-title" data-lang="ar" style="display:none">أقصى درجات الأمان</h3>
        <p class="card-text" data-lang="fr">Données et transactions protégées par chiffrement bancaire. Confidentialité totale garantie.</p>
        <p class="card-text" data-lang="ar" style="display:none">بياناتك ومعاملاتك محمية بتشفير على مستوى البنوك. سرية تامة مضمونة.</p>
        <div class="card-features">
          <span class="feature-tag" data-lang="fr">SSL 256-bit</span>
          <span class="feature-tag" data-lang="ar" style="display:none">تشفير 256 بت</span>
          <span class="feature-tag" data-lang="fr">Données protégées</span>
          <span class="feature-tag" data-lang="ar" style="display:none">حماية البيانات</span>
          <span class="feature-tag" data-lang="fr">Paiements sécurisés</span>
          <span class="feature-tag" data-lang="ar" style="display:none">مدفوعات آمنة</span>
        </div>
      </div>
      <div class="crazy-card card-2">
        <div class="glow"></div>
        <div class="particles" id="particles-2"></div>
        <div class="card-icon"><i class="fas fa-award"></i></div>
        <h3 class="card-title" data-lang="fr">Artisans Vérifiés</h3>
        <h3 class="card-title" data-lang="ar" style="display:none">حرفيون موثوقون</h3>
        <p class="card-text" data-lang="fr">Chaque artisan est rigoureusement sélectionné et noté. Seuls les meilleurs professionnels rejoignent notre réseau.</p>
        <p class="card-text" data-lang="ar" style="display:none">كل حرفي يتم فحصه بدقة. فقط أفضل المحترفين ينضمون إلى شبكتنا.</p>
        <div class="card-features">
          <span class="feature-tag" data-lang="fr">Certifications vérifiées</span>
          <span class="feature-tag" data-lang="ar" style="display:none">شهادات موثقة</span>
          <span class="feature-tag" data-lang="fr">Avis authentiques</span>
          <span class="feature-tag" data-lang="ar" style="display:none">تقييمات حقيقية</span>
          <span class="feature-tag" data-lang="fr">Background check</span>
          <span class="feature-tag" data-lang="ar" style="display:none">فحص الخلفية</span>
        </div>
      </div>
      <div class="crazy-card card-3">
        <div class="glow"></div>
        <div class="particles" id="particles-3"></div>
        <div class="card-icon"><i class="fas fa-eye"></i></div>
        <h3 class="card-title" data-lang="fr">Transparence Totale</h3>
        <h3 class="card-title" data-lang="ar" style="display:none">شفافية كاملة</h3>
        <p class="card-text" data-lang="fr">Prix détaillés, avis vérifiés, historique complet. Aucune surprise à chaque étape.</p>
        <p class="card-text" data-lang="ar" style="display:none">أسعار مفصلة وتقييمات موثقة. لا مفاجآت في كل خطوة.</p>
        <div class="card-features">
          <span class="feature-tag" data-lang="fr">Devis détaillés</span>
          <span class="feature-tag" data-lang="ar" style="display:none">عروض مفصلة</span>
          <span class="feature-tag" data-lang="fr">Avis transparents</span>
          <span class="feature-tag" data-lang="ar" style="display:none">تقييمات شفافة</span>
          <span class="feature-tag" data-lang="fr">Suivi en temps réel</span>
          <span class="feature-tag" data-lang="ar" style="display:none">متابعة فورية</span>
        </div>
      </div>
      <div class="crazy-card card-4">
        <div class="glow"></div>
        <div class="particles" id="particles-4"></div>
        <div class="card-icon"><i class="fas fa-headset"></i></div>
        <h3 class="card-title" data-lang="fr">Support Premium</h3>
        <h3 class="card-title" data-lang="ar" style="display:none">دعم ممتاز</h3>
        <p class="card-text" data-lang="fr">Notre équipe est disponible 24h/24 et 7j/7 pour résoudre rapidement tout problème.</p>
        <p class="card-text" data-lang="ar" style="display:none">فريقنا متاح 24/7 لحل أي مشكلة بسرعة.</p>
        <div class="card-features">
          <span class="feature-tag" data-lang="fr">Support 24/7</span>
          <span class="feature-tag" data-lang="ar" style="display:none">دعم 24/7</span>
          <span class="feature-tag" data-lang="fr">Résolution garantie</span>
          <span class="feature-tag" data-lang="ar" style="display:none">حل مضمون</span>
          <span class="feature-tag" data-lang="fr">Multi-canaux</span>
          <span class="feature-tag" data-lang="ar" style="display:none">قنوات متعددة</span>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-section">
        <h3 data-lang="fr">AlloHrayfi</h3>
        <h3 data-lang="ar" style="display:none">ألو حرايفي</h3>
        <p data-lang="fr">La plateforme de référence pour connecter artisans qualifiés et clients à travers le Maroc.</p>
        <p data-lang="ar" style="display:none">المنصة المرجعية لربط الحرفيين المؤهلين بالعملاء في جميع أنحاء المغرب.</p>
        <div class="social-links">
          <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="footer-section">
        <h3 data-lang="fr">Liens Rapides</h3>
        <h3 data-lang="ar" style="display:none">روابط سريعة</h3>
        <a href="index.php" data-lang="fr">Accueil</a>
        <a href="index.php" data-lang="ar" style="display:none">الرئيسية</a>
        <a href="annonce.php" data-lang="fr">Artisans</a>
        <a href="annonce.php" data-lang="ar" style="display:none">الحرفيون</a>
        <a href="login.php" data-lang="fr">Connexion</a>
        <a href="login.php" data-lang="ar" style="display:none">تسجيل الدخول</a>
      </div>
      <div class="footer-section">
        <h3 data-lang="fr">Services</h3>
        <h3 data-lang="ar" style="display:none">الخدمات</h3>
        <a href="annonce.php" data-lang="fr">Plomberie</a>
        <a href="annonce.php" data-lang="ar" style="display:none">السباكة</a>
        <a href="annonce.php" data-lang="fr">Électricité</a>
        <a href="annonce.php" data-lang="ar" style="display:none">الكهرباء</a>
        <a href="annonce.php" data-lang="fr">Menuiserie</a>
        <a href="annonce.php" data-lang="ar" style="display:none">النجارة</a>
        <a href="annonce.php" data-lang="fr">Peinture</a>
        <a href="annonce.php" data-lang="ar" style="display:none">الدهان</a>
      </div>
      <div class="footer-section">
        <h3 data-lang="fr">Contact</h3>
        <h3 data-lang="ar" style="display:none">اتصل بنا</h3>
        <p><i class="fas fa-map-marker-alt" style="color:var(--accent-color);margin-right:6px;"></i>Casablanca, Maroc</p>
        <p><i class="fas fa-phone" style="color:var(--accent-color);margin-right:6px;"></i>+212 5 22 22 22 22</p>
        <p><i class="fas fa-envelope" style="color:var(--accent-color);margin-right:6px;"></i>contact@allohrayfi.ma</p>
      </div>
    </div>
    <div class="footer-bottom">
      <p data-lang="fr">&copy; 2024 AlloHrayfi. Tous droits réservés.</p>
      <p data-lang="ar" style="display:none">&copy; 2024 ألو حرايفي. جميع الحقوق محفوظة.</p>
    </div>
  </footer>

  <script>
    // ========== STATE ==========
    let currentLang = localStorage.getItem('lang') || 'fr';
    let currentTheme = localStorage.getItem('theme') || 'dark';
    let expanded = false;

    const JOBS = ['Plombier','Électricien','Menuisier','Peintre','Carreleur','Maçon','Serrurier','Chauffagiste','Ébéniste'];
    const LOCS = ['Casablanca','Rabat','Fès','Marrakech','Tanger','Agadir','Salé','Meknès','Oujda'];

    // ========== THEME ==========
    function applyTheme() {
      if (currentTheme === 'light') {
        document.body.classList.add('light-mode');
        document.getElementById('themeToggle').innerHTML = '<i class="fas fa-sun"></i>';
      } else {
        document.body.classList.remove('light-mode');
        document.getElementById('themeToggle').innerHTML = '<i class="fas fa-moon"></i>';
      }
    }
    document.getElementById('themeToggle').addEventListener('click', () => {
      currentTheme = currentTheme === 'dark' ? 'light' : 'dark';
      localStorage.setItem('theme', currentTheme);
      applyTheme();
    });
    applyTheme();

    // ========== NAVBAR SCROLL ==========
    window.addEventListener('scroll', () => {
      document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 50);
    });

    // ========== MOBILE MENU ==========
    document.getElementById('hamburgerBtn').addEventListener('click', () => {
      document.getElementById('mobileNav').classList.add('active');
    });
    document.getElementById('closeMenu').addEventListener('click', () => {
      document.getElementById('mobileNav').classList.remove('active');
    });
    document.querySelectorAll('#mobileNav a').forEach(link => {
      link.addEventListener('click', () => document.getElementById('mobileNav').classList.remove('active'));
    });

    // ========== LANGUAGE ==========
    function updateLanguage() {
      const html = document.documentElement;
      document.querySelectorAll('[data-lang]').forEach(el => {
        const show = el.getAttribute('data-lang') === currentLang;
        el.style.display = show ? (el.tagName === 'SPAN' || el.tagName === 'SMALL' ? 'inline' : 'block') : 'none';
      });
      if (currentLang === 'ar') {
        html.dir = 'rtl'; html.lang = 'ar';
        document.body.style.textAlign = 'right';
      } else {
        html.dir = 'ltr'; html.lang = 'fr';
        document.body.style.textAlign = 'left';
      }
      document.querySelectorAll('.lang-flag').forEach(f => f.textContent = currentLang === 'fr' ? '🇫🇷' : '🇲🇦');
      document.getElementById('job').placeholder = currentLang === 'fr'
        ? 'Rechercher un métier (ex: Plombier, Électricien)'
        : 'ابحث عن مهنة (مثال: سباك، كهربائي)';
      document.getElementById('location').placeholder = currentLang === 'fr' ? 'Ville ou région' : 'المدينة أو المنطقة';
      expanded = false;
      updateSeeMoreBtn();
    }
    function switchLanguage() {
      currentLang = currentLang === 'fr' ? 'ar' : 'fr';
      localStorage.setItem('lang', currentLang);
      updateLanguage();
    }
    document.getElementById('langSwitch').addEventListener('click', switchLanguage);
    document.getElementById('mobileLangSwitch').addEventListener('click', switchLanguage);

    // ========== SEE MORE ==========
    const extraText = ' Grâce à des profils vérifiés et une interface intuitive, AlloHrayfi rend la mise en relation simple et rapide.';
    const extraTextAr = ' بفضل الملفات الشخصية الموثوقة وواجهة سهلة الاستخدام، يجعل AlloHrayfi التواصل بسيطًا وسريعًا.';
    const baseText = "La plateforme marocaine AlloHrayfi vise à connecter des artisans qualifiés avec des clients qui ont besoin de leurs services. Que vous soyez un artisan cherchant des clients ou un client cherchant un professionnel, vous êtes au bon endroit.";
    const baseTextAr = "تهدف منصة AlloHrayfi إلى ربط الحرفيين المهرة بالعملاء الذين يحتاجون إلى خدماتهم. سواء كنت حرفيًا تبحث عن عملاء أو عميلًا يبحث عن صانع ماهر، فأنت في المكان الصحيح.";

    function updateSeeMoreBtn() {
      const btn = document.getElementById('seeMoreBtn');
      if (currentLang === 'fr') {
        btn.innerHTML = expanded ? '<span data-lang="fr">Voir Moins</span>' : '<span data-lang="fr">Voir Plus</span>';
      } else {
        btn.innerHTML = expanded ? '<span data-lang="ar">عرض أقل</span>' : '<span data-lang="ar">عرض المزيد</span>';
      }
    }
    document.getElementById('seeMoreBtn').addEventListener('click', () => {
      const desc = document.getElementById('artisan-desc');
      const descAr = document.getElementById('artisan-desc-ar');
      if (!expanded) {
        desc.innerHTML = baseText.replace('AlloHrayfi', '<strong>AlloHrayfi</strong>') + extraText;
        descAr.innerHTML = baseTextAr.replace('AlloHrayfi', '<strong>AlloHrayfi</strong>') + extraTextAr;
        expanded = true;
      } else {
        desc.innerHTML = baseText.replace('AlloHrayfi', '<strong>AlloHrayfi</strong>');
        descAr.innerHTML = baseTextAr.replace('AlloHrayfi', '<strong>AlloHrayfi</strong>');
        expanded = false;
      }
      updateSeeMoreBtn();
    });

    // ========== SEARCH ==========
    const jobInput = document.getElementById('job');
    const locInput = document.getElementById('location');
    const jobSug = document.getElementById('job-suggestions');
    const locSug = document.getElementById('loc-suggestions');
    const resultsEl = document.getElementById('results');

    function normalize(s) { return s ? s.trim().toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,'') : ''; }
    function filterJobs(q) { const n = normalize(q); return n ? JOBS.filter(j => normalize(j).includes(n)).slice(0,6) : JOBS.slice(0,6); }
    function filterLocs(q) { const n = normalize(q); return n ? LOCS.filter(l => normalize(l).includes(n)).slice(0,6) : LOCS.slice(0,6); }

    function showSuggestions(container, list, inputEl) {
      container.innerHTML = '';
      if (!list.length) { container.hidden = true; inputEl.setAttribute('aria-expanded','false'); return; }
      list.forEach(item => {
        const btn = document.createElement('button');
        btn.type = 'button'; btn.textContent = item; btn.setAttribute('role','option');
        btn.addEventListener('click', () => {
          inputEl.value = item; container.hidden = true;
          inputEl.setAttribute('aria-expanded','false'); inputEl.focus();
        });
        container.appendChild(btn);
      });
      container.hidden = false; inputEl.setAttribute('aria-expanded','true');
    }

    jobInput.addEventListener('input', e => showSuggestions(jobSug, filterJobs(e.target.value), jobInput));
    locInput.addEventListener('input', e => showSuggestions(locSug, filterLocs(e.target.value), locInput));
    document.addEventListener('click', e => {
      if (!e.target.closest('.field')) {
        jobSug.hidden = true; locSug.hidden = true;
        jobInput.setAttribute('aria-expanded','false'); locInput.setAttribute('aria-expanded','false');
      }
    });

    function doSearch() {
      const jobQ = normalize(jobInput.value);
      const locQ = normalize(locInput.value);
      const matchedJobs = JOBS.filter(j => jobQ ? normalize(j).includes(jobQ) : true);
      const matchedLocs = LOCS.filter(l => locQ ? normalize(l).includes(locQ) : true);
      resultsEl.innerHTML = '';
      if (!matchedJobs.length) {
        resultsEl.innerHTML = `<div class="result"><span>${currentLang==='fr'?'Aucun résultat — essayez des termes plus généraux.':'لم يتم العثور على نتائج — جرب مصطلحات أخرى.'}</span></div>`;
        return;
      }
      const displayLocs = matchedLocs.length ? matchedLocs.slice(0,6) : LOCS.slice(0,3);
      matchedJobs.slice(0,6).forEach((j, i) => {
        const loc = displayLocs[i % displayLocs.length];
        const count = Math.floor(Math.random() * 10) + 1;
        const a = document.createElement('a');
        a.className = 'result'; a.href = 'annonce.php';
        a.innerHTML = `<strong>${j}</strong><div class="meta">${loc} &bull; ${count} ${currentLang==='fr'?'artisans disponibles':'حرفي متاح'}</div>`;
        resultsEl.appendChild(a);
      });
    }

    document.getElementById('searchBtn').addEventListener('click', doSearch);
    jobInput.addEventListener('keydown', e => { if (e.key === 'Enter') doSearch(); });
    locInput.addEventListener('keydown', e => { if (e.key === 'Enter') doSearch(); });

    // GPS button
    document.getElementById('gpsBtn').addEventListener('click', () => {
      if (!navigator.geolocation) { alert(currentLang==='fr'?'Géolocalisation non supportée':'الموقع الجغرافي غير مدعوم'); return; }
      const btn = document.getElementById('gpsBtn');
      btn.disabled = true;
      btn.innerHTML = `<i class="fa-solid fa-location-crosshairs fa-spin"></i> ${currentLang==='fr'?'Localisation...':'جاري التحديد...'}`;
      navigator.geolocation.getCurrentPosition(pos => {
        const {latitude} = pos.coords;
        let city = latitude > 34 ? 'Fès' : latitude > 31 ? 'Casablanca' : 'Marrakech';
        locInput.value = city;
        locInput.dispatchEvent(new Event('input'));
        btn.disabled = false;
        btn.innerHTML = `<i class="fa-solid fa-location-crosshairs"></i> <span data-lang="fr">${currentLang==='fr'?'Utiliser ma position':'استخدم موقعي'}</span>`;
      }, () => {
        btn.disabled = false;
        btn.innerHTML = `<i class="fa-solid fa-location-crosshairs"></i> <span>${currentLang==='fr'?'Utiliser ma position':'استخدم موقعي'}</span>`;
      });
    });

    // ========== PARTICLES ==========
    function createParticles(id, count = 12) {
      const c = document.getElementById(id);
      if (!c) return;
      for (let i = 0; i < count; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        p.style.left = `${Math.random() * 100}%`;
        p.style.animationDelay = `${Math.random() * 8}s`;
        p.style.animationDuration = `${6 + Math.random() * 4}s`;
        c.appendChild(p);
      }
    }

    // ========== INIT ==========
    updateLanguage();
    showSuggestions(jobSug, JOBS.slice(0,6), jobInput);
    showSuggestions(locSug, LOCS.slice(0,6), locInput);
    ['particles-1','particles-2','particles-3','particles-4'].forEach(id => createParticles(id));
  </script>
</body>
</html>
