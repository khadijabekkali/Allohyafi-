<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion | AlloHrayfi</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    *{margin:0;padding:0;box-sizing:border-box;}
    :root {
      --bg-primary:#071124; --bg-secondary:#0b1724;
      --bg-card:linear-gradient(135deg,rgba(255,255,255,0.05),rgba(255,255,255,0.02));
      --text-primary:#e6eef6; --text-secondary:rgba(255,255,255,0.7);
      --accent-color:#06b6d4; --accent-hover:#0891b2;
      --border-color:rgba(255,255,255,0.08);
      --input-bg:rgba(255,255,255,0.08); --input-border:rgba(255,255,255,0.2);
      --shadow:0 10px 40px rgba(2,6,23,0.6); --nav-bg:rgba(15,23,36,0.97);
      --footer-bg:linear-gradient(180deg,rgba(255,255,255,0.02),rgba(255,255,255,0.01));
      --social-btn-bg:rgba(255,255,255,0.05); --user-type-bg:rgba(255,255,255,0.05);
      --camera-bg:rgba(0,0,0,0.3);
    }
    .light-mode {
      --bg-primary:#f8fafc; --bg-secondary:#e2e8f0;
      --bg-card:linear-gradient(135deg,rgba(255,255,255,0.9),rgba(255,255,255,0.7));
      --text-primary:#1e293b; --text-secondary:#475569;
      --accent-color:#06b6d4; --accent-hover:#0891b2;
      --border-color:rgba(0,0,0,0.08);
      --input-bg:rgba(0,0,0,0.05); --input-border:rgba(0,0,0,0.2);
      --shadow:0 10px 40px rgba(0,0,0,0.1); --nav-bg:rgba(255,255,255,0.97);
      --footer-bg:linear-gradient(180deg,rgba(0,0,0,0.02),rgba(0,0,0,0.01));
      --social-btn-bg:rgba(0,0,0,0.05); --user-type-bg:rgba(0,0,0,0.05);
      --camera-bg:rgba(0,0,0,0.1);
    }
    body {
      font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
      background:linear-gradient(135deg,var(--bg-primary) 0%,var(--bg-secondary) 100%);
      color:var(--text-primary); min-height:100vh;
      display:flex; flex-direction:column;
      transition:all 0.3s ease;
    }
    /* NAVBAR */
    .navbar {
      background:transparent; padding:1rem 2rem;
      position:fixed; top:0; left:0; width:100%; z-index:1000;
      transition:all 0.3s ease;
    }
    .navbar.scrolled { background:var(--nav-bg); backdrop-filter:blur(12px); box-shadow:0 4px 20px rgba(0,0,0,0.15); }
    .nav-container { max-width:1200px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; }
    .logo { display:flex; align-items:center; gap:0.5rem; text-decoration:none; }
    .logo img { height:50px; width:auto; object-fit:contain; }
    .nav-buttons { display:flex; align-items:center; gap:0.75rem; }
    .nav-btn {
      border:1px solid; padding:8px 16px; border-radius:9999px;
      font-weight:500; transition:all 0.3s ease;
      display:flex; align-items:center; gap:5px;
      text-decoration:none; background:transparent; cursor:pointer;
    }
    .back-btn { border-color:#64748b; color:#64748b; }
    .back-btn:hover { background:#64748b; color:white; }
    .lang-btn { border-color:var(--accent-color); color:var(--accent-color); }
    .lang-btn:hover { background:var(--accent-color); color:white; }
    .theme-toggle {
      background:transparent; border:1px solid var(--accent-color);
      color:var(--accent-color); width:40px; height:40px;
      border-radius:50%; display:flex; align-items:center; justify-content:center;
      cursor:pointer; transition:all 0.3s ease;
    }
    .theme-toggle:hover { background:var(--accent-color); color:white; }
    /* MAIN */
    .main-content {
      flex:1; display:flex; align-items:center; justify-content:center;
      padding:100px 2rem 2rem; min-height:100vh;
    }
    .auth-container {
      width:100%; max-width:460px;
      background:var(--bg-card); border-radius:20px;
      box-shadow:var(--shadow); border:1px solid var(--border-color);
      backdrop-filter:blur(10px); overflow:hidden;
    }
    /* TABS */
    .auth-tabs { display:flex; background:rgba(255,255,255,0.05); }
    .light-mode .auth-tabs { background:rgba(0,0,0,0.05); }
    .auth-tab {
      flex:1; padding:1.2rem; text-align:center;
      background:transparent; border:none;
      color:var(--text-secondary); font-size:1rem;
      font-weight:600; cursor:pointer; transition:all 0.3s ease;
      position:relative; font-family:inherit;
    }
    .auth-tab.active { color:var(--accent-color); }
    .auth-tab.active::after {
      content:''; position:absolute; bottom:0; left:0;
      width:100%; height:3px; background:var(--accent-color);
    }
    .auth-tab:hover:not(.active) { color:var(--text-primary); background:rgba(255,255,255,0.03); }
    /* FORMS */
    .auth-forms { padding:2rem; }
    .auth-form { display:none; }
    .auth-form.active { display:block; animation:fadeIn 0.4s ease; }
    @keyframes fadeIn { from{opacity:0;transform:translateY(8px)} to{opacity:1;transform:translateY(0)} }
    .form-header { text-align:center; margin-bottom:1.75rem; }
    .form-header h2 { font-size:1.6rem; margin-bottom:0.4rem; color:var(--text-primary); }
    .form-header p { color:var(--text-secondary); font-size:0.9rem; }
    .form-icon {
      width:64px; height:64px;
      background:linear-gradient(135deg,var(--accent-color),var(--accent-hover));
      border-radius:50%; display:flex; align-items:center; justify-content:center;
      margin:0 auto 1.25rem;
    }
    .form-icon i { font-size:1.6rem; color:white; }
    .form-group { margin-bottom:1.25rem; }
    .form-label { display:block; margin-bottom:0.4rem; color:var(--text-primary); font-weight:500; font-size:0.9rem; }
    .form-input {
      width:100%; padding:0.9rem 1rem; border-radius:10px;
      border:1px solid var(--input-border); background:var(--input-bg);
      color:var(--text-primary); font-size:0.95rem;
      transition:all 0.3s ease; font-family:inherit;
    }
    .form-input:focus { outline:none; border-color:var(--accent-color); box-shadow:0 0 0 3px rgba(6,182,212,0.2); }
    .form-input::placeholder { color:var(--text-secondary); }
    .input-with-icon { position:relative; }
    .input-icon { position:absolute; left:1rem; top:50%; transform:translateY(-50%); color:var(--text-secondary); pointer-events:none; }
    .input-with-icon .form-input { padding-left:2.75rem; }
    .password-toggle {
      position:absolute; right:1rem; top:50%; transform:translateY(-50%);
      background:none; border:none; color:var(--text-secondary); cursor:pointer; padding:4px;
    }
    .password-toggle:hover { color:var(--text-primary); }
    .form-options { display:flex; justify-content:space-between; align-items:center; margin-bottom:1.25rem; font-size:0.875rem; }
    .remember-me { display:flex; align-items:center; gap:0.4rem; color:var(--text-primary); cursor:pointer; }
    .remember-me input[type="checkbox"] { width:15px; height:15px; accent-color:var(--accent-color); }
    .forgot-password { color:var(--accent-color); text-decoration:none; transition:color 0.3s; }
    .forgot-password:hover { color:var(--accent-hover); }
    /* SUBMIT */
    .submit-btn {
      width:100%; padding:0.9rem; border:none; border-radius:10px;
      background:linear-gradient(135deg,var(--accent-color),var(--accent-hover));
      color:white; font-size:1rem; font-weight:600;
      cursor:pointer; transition:all 0.3s ease;
      display:flex; align-items:center; justify-content:center; gap:0.5rem;
      font-family:inherit;
    }
    .submit-btn:hover { transform:translateY(-2px); box-shadow:0 6px 20px rgba(6,182,212,0.4); }
    .submit-btn:active { transform:translateY(0); }
    /* DIVIDER */
    .divider { display:flex; align-items:center; margin:1.5rem 0; color:var(--text-secondary); font-size:0.85rem; }
    .divider::before,.divider::after { content:''; flex:1; border-bottom:1px solid var(--input-border); }
    .divider::before { margin-right:0.75rem; }
    .divider::after { margin-left:0.75rem; }
    /* SOCIAL */
    .social-login { display:grid; grid-template-columns:1fr 1fr; gap:0.75rem; margin-bottom:1.25rem; }
    .social-btn {
      padding:0.75rem; border:1px solid var(--input-border);
      border-radius:10px; background:var(--social-btn-bg); color:var(--text-primary);
      font-size:0.875rem; cursor:pointer; transition:all 0.3s ease;
      display:flex; align-items:center; justify-content:center; gap:0.5rem;
      font-family:inherit;
    }
    .social-btn:hover { transform:translateY(-2px); border-color:var(--accent-color); }
    .social-btn.google { color:#ea4335; }
    .social-btn.facebook { color:#1877f2; }
    /* USER TYPE */
    .user-type { display:grid; grid-template-columns:1fr 1fr; gap:0.75rem; margin-bottom:1.25rem; }
    .user-type-btn {
      padding:0.9rem; border:2px solid var(--input-border);
      border-radius:10px; background:var(--user-type-bg);
      color:var(--text-secondary); text-align:center; cursor:pointer;
      transition:all 0.3s ease; font-family:inherit;
    }
    .user-type-btn.active { border-color:var(--accent-color); background:rgba(6,182,212,0.1); color:var(--accent-color); }
    .user-type-btn:hover:not(.active) { border-color:var(--accent-color); }
    .user-type-btn i { display:block; font-size:1.4rem; margin-bottom:0.4rem; }
    /* FACIAL RECOGNITION */
    .facial-section { margin-bottom:1.25rem; display:none; }
    .facial-section.active { display:block; animation:fadeIn 0.4s ease; }
    .camera-container {
      position:relative; width:100%; height:220px;
      background:var(--camera-bg); border-radius:10px;
      overflow:hidden; margin-bottom:0.75rem;
    }
    #videoElement { width:100%; height:100%; object-fit:cover; }
    .camera-controls { display:flex; justify-content:center; gap:0.75rem; margin-bottom:0.75rem; flex-wrap:wrap; }
    .camera-btn {
      padding:0.65rem 1.2rem; border:none; border-radius:8px;
      background:var(--accent-color); color:white; font-weight:500;
      cursor:pointer; transition:all 0.3s ease;
      display:flex; align-items:center; gap:0.4rem; font-family:inherit;
    }
    .camera-btn:hover { background:var(--accent-hover); }
    .camera-btn:disabled { opacity:0.5; cursor:not-allowed; }
    .camera-btn.secondary { background:var(--input-bg); color:var(--text-primary); }
    .camera-btn.secondary:hover { background:var(--input-border); }
    .capture-instructions { text-align:center; color:var(--text-secondary); margin-bottom:0.75rem; font-size:0.85rem; min-height:1.2rem; }
    .capture-steps { display:flex; justify-content:space-between; margin-bottom:0.75rem; }
    .capture-step { flex:1; text-align:center; padding:0.4rem; color:var(--text-secondary); font-size:0.78rem; transition:all 0.3s; }
    .capture-step.active { color:var(--accent-color); font-weight:600; }
    .capture-step i { display:block; font-size:1.1rem; margin-bottom:0.2rem; }
    .captured-images { display:grid; grid-template-columns:repeat(3,1fr); gap:0.4rem; margin-top:0.75rem; }
    .captured-image { position:relative; width:100%; height:70px; border-radius:8px; overflow:hidden; border:2px solid var(--input-border); }
    .captured-image img { width:100%; height:100%; object-fit:cover; }
    .captured-image.active { border-color:var(--accent-color); }
    .remove-img-btn {
      position:absolute; top:2px; right:2px;
      background:rgba(0,0,0,0.6); color:white; border:none;
      border-radius:50%; width:18px; height:18px; font-size:0.65rem;
      cursor:pointer; display:flex; align-items:center; justify-content:center;
    }
    /* LINK TEXT */
    .switch-link { text-align:center; color:var(--text-secondary); font-size:0.875rem; margin-top:1rem; }
    .switch-link a { color:var(--accent-color); text-decoration:none; font-weight:500; }
    .switch-link a:hover { color:var(--accent-hover); }
    /* VALIDATION ERROR */
    .field-error { color:#ef4444; font-size:0.78rem; margin-top:4px; display:none; }
    .field-error.show { display:block; }
    /* FOOTER */
    .footer { background:var(--footer-bg); border-top:1px solid var(--border-color); padding:1.5rem 1rem; margin-top:auto; }
    .footer-content { max-width:1200px; margin:0 auto; text-align:center; color:var(--text-secondary); }
    .footer-links { display:flex; justify-content:center; gap:1.5rem; margin-bottom:0.75rem; flex-wrap:wrap; }
    .footer-links a { color:var(--text-secondary); text-decoration:none; font-size:0.875rem; transition:color 0.3s; }
    .footer-links a:hover { color:var(--accent-color); }
    .footer-links span[data-lang] { display:inline; }
    /* RESPONSIVE */
    @media(max-width:768px) {
      .auth-container { margin:1rem; }
      .auth-forms { padding:1.5rem; }
      .social-login { grid-template-columns:1fr; }
      .form-options { flex-direction:column; gap:0.75rem; align-items:flex-start; }
    }
    @media(max-width:480px) {
      .user-type { grid-template-columns:1fr; }
      .camera-controls { flex-direction:column; align-items:center; }
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar" id="navbar">
    <div class="nav-container">
      <a href="index.php" class="logo">
        <img src="img/logo-removebg-preview.png" alt="AlloHrayfi Logo">
      </a>
      <div class="nav-buttons">
        <a href="index.php" class="nav-btn back-btn">
          <i class="fas fa-arrow-left"></i>
          <span data-lang="fr">Retour</span>
          <span data-lang="ar" style="display:none">رجوع</span>
        </a>
        <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
          <i class="fas fa-moon"></i>
        </button>
        <button class="nav-btn lang-btn" id="langSwitch">
          <span class="lang-flag">🇫🇷</span>
          <span data-lang="fr">Français</span>
          <span data-lang="ar" style="display:none">العربية</span>
        </button>
      </div>
    </div>
  </nav>

  <!-- MAIN -->
  <main class="main-content">
    <div class="auth-container">
      <div class="auth-tabs">
        <button class="auth-tab active" data-tab="login">
          <span data-lang="fr">Connexion</span>
          <span data-lang="ar" style="display:none">تسجيل الدخول</span>
        </button>
        <button class="auth-tab" data-tab="register">
          <span data-lang="fr">Inscription</span>
          <span data-lang="ar" style="display:none">إنشاء حساب</span>
        </button>
      </div>

      <div class="auth-forms">
        <!-- LOGIN FORM -->
        <form class="auth-form active" id="loginForm" novalidate>
          <div class="form-header">
            <div class="form-icon"><i class="fas fa-sign-in-alt"></i></div>
            <h2 data-lang="fr">Content de vous revoir</h2>
            <h2 data-lang="ar" style="display:none">سعيد برؤيتك مرة أخرى</h2>
            <p data-lang="fr">Connectez-vous à votre compte</p>
            <p data-lang="ar" style="display:none">سجل الدخول إلى حسابك</p>
          </div>
          <div class="form-group">
            <label class="form-label" for="loginEmail">
              <span data-lang="fr">Adresse Email</span>
              <span data-lang="ar" style="display:none">البريد الإلكتروني</span>
            </label>
            <div class="input-with-icon">
              <i class="fas fa-envelope input-icon"></i>
              <input type="email" id="loginEmail" name="email" class="form-input"
                     data-placeholder-fr="votre@email.com"
                     data-placeholder-ar="بريدك@الإلكتروني.com"
                     placeholder="votre@email.com" required>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="loginPassword">
              <span data-lang="fr">Mot de passe</span>
              <span data-lang="ar" style="display:none">كلمة المرور</span>
            </label>
            <div class="input-with-icon">
              <i class="fas fa-lock input-icon"></i>
              <input type="password" id="loginPassword" name="password" class="form-input"
                     data-placeholder-fr="Votre mot de passe"
                     data-placeholder-ar="كلمة المرور الخاصة بك"
                     placeholder="Votre mot de passe" required>
              <button type="button" class="password-toggle" onclick="togglePassword('loginPassword')" aria-label="Toggle password visibility">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </div>
          <div class="form-options">
            <label class="remember-me">
              <input type="checkbox" id="rememberMe" name="remember_me">
              <span data-lang="fr">Se souvenir de moi</span>
              <span data-lang="ar" style="display:none">تذكرني</span>
            </label>
            <a href="#" class="forgot-password">
              <span data-lang="fr">Mot de passe oublié ?</span>
              <span data-lang="ar" style="display:none">نسيت كلمة المرور؟</span>
            </a>
          </div>
          <button type="submit" class="submit-btn">
            <i class="fas fa-sign-in-alt"></i>
            <span data-lang="fr">Se Connecter</span>
            <span data-lang="ar" style="display:none">تسجيل الدخول</span>
          </button>
          <div class="divider">
            <span data-lang="fr">Ou continuer avec</span>
            <span data-lang="ar" style="display:none">أو تابع باستخدام</span>
          </div>
          <div class="social-login">
            <button type="button" class="social-btn google">
              <i class="fab fa-google"></i> Google
            </button>
            <button type="button" class="social-btn facebook">
              <i class="fab fa-facebook-f"></i> Facebook
            </button>
          </div>
          <div class="switch-link">
            <span data-lang="fr">Pas encore de compte ?</span>
            <span data-lang="ar" style="display:none">ليس لديك حساب؟</span>
            <a href="#" onclick="switchTab('register');return false;">
              <span data-lang="fr"> S'inscrire</span>
              <span data-lang="ar" style="display:none"> سجل الآن</span>
            </a>
          </div>
        </form>

        <!-- REGISTER FORM -->
        <form class="auth-form" id="registerForm" novalidate>
          <div class="form-header">
            <div class="form-icon"><i class="fas fa-user-plus"></i></div>
            <h2 data-lang="fr">Créer un compte</h2>
            <h2 data-lang="ar" style="display:none">إنشاء حساب</h2>
            <p data-lang="fr">Rejoignez notre communauté d'artisans</p>
            <p data-lang="ar" style="display:none">انضم إلى مجتمع الحرفيين لدينا</p>
          </div>
          <input type="hidden" name="user_type" id="userType" value="client">
          <div class="user-type">
            <div class="user-type-btn active" data-type="client" role="button" tabindex="0">
              <i class="fas fa-user"></i>
              <span data-lang="fr">Client</span>
              <span data-lang="ar" style="display:none">زبون</span>
            </div>
            <div class="user-type-btn" data-type="artisan" role="button" tabindex="0">
              <i class="fas fa-tools"></i>
              <span data-lang="fr">Artisan</span>
              <span data-lang="ar" style="display:none">حرفي</span>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="registerName">
              <span data-lang="fr">Nom complet</span>
              <span data-lang="ar" style="display:none">الاسم الكامل</span>
            </label>
            <div class="input-with-icon">
              <i class="fas fa-user input-icon"></i>
              <input type="text" id="registerName" name="full_name" class="form-input"
                     data-placeholder-fr="Votre nom complet"
                     data-placeholder-ar="اسمك الكامل"
                     placeholder="Votre nom complet" required>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="registerEmail">
              <span data-lang="fr">Adresse Email</span>
              <span data-lang="ar" style="display:none">البريد الإلكتروني</span>
            </label>
            <div class="input-with-icon">
              <i class="fas fa-envelope input-icon"></i>
              <input type="email" id="registerEmail" name="email" class="form-input"
                     data-placeholder-fr="votre@email.com"
                     data-placeholder-ar="بريدك@الإلكتروني.com"
                     placeholder="votre@email.com" required>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="registerPhone">
              <span data-lang="fr">Téléphone</span>
              <span data-lang="ar" style="display:none">رقم الهاتف</span>
            </label>
            <div class="input-with-icon">
              <i class="fas fa-phone input-icon"></i>
              <input type="tel" id="registerPhone" name="phone" class="form-input"
                     data-placeholder-fr="+212 6 XX XX XX XX"
                     data-placeholder-ar="+212 6 XX XX XX XX"
                     placeholder="+212 6 XX XX XX XX" required>
            </div>
          </div>

          <!-- FACIAL RECOGNITION (artisans only) -->
          <div class="facial-section" id="facialSection">
            <label class="form-label">
              <span data-lang="fr">Vérification faciale</span>
              <span data-lang="ar" style="display:none">التحقق بالوجه</span>
            </label>
            <div class="capture-steps">
              <div class="capture-step active" id="stepFront">
                <i class="fas fa-user"></i>
                <span data-lang="fr">Face</span>
                <span data-lang="ar" style="display:none">أمام</span>
              </div>
              <div class="capture-step" id="stepLeft">
                <i class="fas fa-arrow-left"></i>
                <span data-lang="fr">Gauche</span>
                <span data-lang="ar" style="display:none">يسار</span>
              </div>
              <div class="capture-step" id="stepRight">
                <i class="fas fa-arrow-right"></i>
                <span data-lang="fr">Droite</span>
                <span data-lang="ar" style="display:none">يمين</span>
              </div>
            </div>
            <p class="capture-instructions" id="captureInstructions"></p>
            <div class="camera-container">
              <video id="videoElement" autoplay playsinline muted></video>
              <canvas id="canvasElement" style="display:none;"></canvas>
            </div>
            <div class="camera-controls">
              <button type="button" class="camera-btn" id="startCameraBtn">
                <i class="fas fa-camera"></i>
                <span data-lang="fr">Démarrer</span>
                <span data-lang="ar" style="display:none">تشغيل</span>
              </button>
              <button type="button" class="camera-btn" id="captureBtn" disabled>
                <i class="fas fa-camera-retro"></i>
                <span data-lang="fr">Capturer</span>
                <span data-lang="ar" style="display:none">التقاط</span>
              </button>
              <button type="button" class="camera-btn secondary" id="stopCameraBtn" disabled>
                <i class="fas fa-stop"></i>
                <span data-lang="fr">Arrêter</span>
                <span data-lang="ar" style="display:none">إيقاف</span>
              </button>
            </div>
            <div class="captured-images" id="capturedImages"></div>
            <input type="hidden" id="facialData" name="facial_data">
          </div>

          <div class="form-group">
            <label class="form-label" for="registerPassword">
              <span data-lang="fr">Mot de passe</span>
              <span data-lang="ar" style="display:none">كلمة المرور</span>
            </label>
            <div class="input-with-icon">
              <i class="fas fa-lock input-icon"></i>
              <input type="password" id="registerPassword" name="password" class="form-input"
                     data-placeholder-fr="Créez un mot de passe (min. 6 caractères)"
                     data-placeholder-ar="أنشئ كلمة مرور (6 أحرف على الأقل)"
                     placeholder="Créez un mot de passe (min. 6 caractères)" required minlength="6">
              <button type="button" class="password-toggle" onclick="togglePassword('registerPassword')" aria-label="Toggle password visibility">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="registerConfirmPassword">
              <span data-lang="fr">Confirmer le mot de passe</span>
              <span data-lang="ar" style="display:none">تأكيد كلمة المرور</span>
            </label>
            <div class="input-with-icon">
              <i class="fas fa-lock input-icon"></i>
              <input type="password" id="registerConfirmPassword" name="confirm_password" class="form-input"
                     data-placeholder-fr="Confirmez votre mot de passe"
                     data-placeholder-ar="أكد كلمة المرور"
                     placeholder="Confirmez votre mot de passe" required>
              <button type="button" class="password-toggle" onclick="togglePassword('registerConfirmPassword')" aria-label="Toggle password visibility">
                <i class="fas fa-eye"></i>
              </button>
            </div>
            <div class="field-error" id="passwordError">
              <span data-lang="fr">Les mots de passe ne correspondent pas.</span>
              <span data-lang="ar" style="display:none">كلمات المرور غير متطابقة.</span>
            </div>
          </div>
          <div class="form-group">
            <label class="remember-me" style="align-items:flex-start;">
              <input type="checkbox" id="acceptTerms" name="accept_terms" required style="margin-top:3px;">
              <span>
                <span data-lang="fr">J'accepte les <a href="#" style="color:var(--accent-color)">conditions d'utilisation</a></span>
                <span data-lang="ar" style="display:none">أوافق على <a href="#" style="color:var(--accent-color)">شروط الاستخدام</a></span>
              </span>
            </label>
          </div>
          <button type="submit" class="submit-btn">
            <i class="fas fa-user-plus"></i>
            <span data-lang="fr">Créer mon compte</span>
            <span data-lang="ar" style="display:none">إنشاء حسابي</span>
          </button>
          <div class="switch-link">
            <span data-lang="fr">Déjà un compte ?</span>
            <span data-lang="ar" style="display:none">لديك حساب بالفعل؟</span>
            <a href="#" onclick="switchTab('login');return false;">
              <span data-lang="fr"> Se connecter</span>
              <span data-lang="ar" style="display:none"> تسجيل الدخول</span>
            </a>
          </div>
        </form>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-links">
        <a href="#"><span data-lang="fr">À propos</span><span data-lang="ar" style="display:none">حول</span></a>
        <a href="#"><span data-lang="fr">Contact</span><span data-lang="ar" style="display:none">اتصال</span></a>
        <a href="#"><span data-lang="fr">Mentions légales</span><span data-lang="ar" style="display:none">الشروط القانونية</span></a>
        <a href="#"><span data-lang="fr">Aide</span><span data-lang="ar" style="display:none">مساعدة</span></a>
      </div>
      <p style="font-size:0.85rem;">&copy; 2024
        <span data-lang="fr">AlloHrayfi. Tous droits réservés.</span>
        <span data-lang="ar" style="display:none">ألو حرايفي. جميع الحقوق محفوظة.</span>
      </p>
    </div>
  </footer>

  <script>
    // ========== STATE ==========
    let currentLang = localStorage.getItem('lang') || 'fr';
    let currentTheme = localStorage.getItem('theme') || 'dark';
    let cameraStream = null;
    let currentStep = 'front';
    const capturedImages = { front: null, left: null, right: null };

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

    // ========== NAVBAR ==========
    window.addEventListener('scroll', () => {
      document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 50);
    });

    // ========== LANGUAGE ==========
    function updateLanguage() {
      document.querySelectorAll('[data-lang]').forEach(el => {
        const show = el.getAttribute('data-lang') === currentLang;
        el.style.display = show ? 'inline' : 'none';
      });
      if (currentLang === 'ar') {
        document.body.style.direction = 'rtl';
        document.body.style.textAlign = 'right';
      } else {
        document.body.style.direction = 'ltr';
        document.body.style.textAlign = 'left';
      }
      document.querySelectorAll('.lang-flag').forEach(f => f.textContent = currentLang === 'fr' ? '🇫🇷' : '🇲🇦');
      document.querySelectorAll('[data-placeholder-fr]').forEach(inp => {
        inp.placeholder = currentLang === 'fr'
          ? inp.getAttribute('data-placeholder-fr')
          : inp.getAttribute('data-placeholder-ar');
      });
      updateCaptureInstructions();
    }
    document.getElementById('langSwitch').addEventListener('click', () => {
      currentLang = currentLang === 'fr' ? 'ar' : 'fr';
      localStorage.setItem('lang', currentLang);
      updateLanguage();
    });

    // ========== TABS ==========
    function switchTab(tabName) {
      document.querySelectorAll('.auth-tab').forEach(t => {
        t.classList.toggle('active', t.dataset.tab === tabName);
      });
      document.querySelectorAll('.auth-form').forEach(f => {
        f.classList.toggle('active', f.id === tabName + 'Form');
      });
    }
    document.querySelectorAll('.auth-tab').forEach(tab => {
      tab.addEventListener('click', () => switchTab(tab.dataset.tab));
    });

    // ========== USER TYPE ==========
    document.querySelectorAll('.user-type-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.user-type-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('userType').value = btn.dataset.type;
        const facialSection = document.getElementById('facialSection');
        if (btn.dataset.type === 'artisan') {
          facialSection.classList.add('active');
          updateCaptureInstructions();
        } else {
          facialSection.classList.remove('active');
          stopCamera();
        }
      });
      // keyboard accessibility
      btn.addEventListener('keydown', e => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); btn.click(); } });
    });

    // ========== PASSWORD TOGGLE ==========
    function togglePassword(inputId) {
      const inp = document.getElementById(inputId);
      const icon = inp.parentNode.querySelector('.password-toggle i');
      if (inp.type === 'password') {
        inp.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
      } else {
        inp.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
      }
    }

    // ========== CAMERA ==========
    const videoEl = document.getElementById('videoElement');
    const canvasEl = document.getElementById('canvasElement');
    const startBtn = document.getElementById('startCameraBtn');
    const captureBtn = document.getElementById('captureBtn');
    const stopBtn = document.getElementById('stopCameraBtn');
    const capturedImgsEl = document.getElementById('capturedImages');

    startBtn.addEventListener('click', async () => {
      try {
        cameraStream = await navigator.mediaDevices.getUserMedia({
          video: { width: { ideal: 640 }, height: { ideal: 480 }, facingMode: 'user' }
        });
        videoEl.srcObject = cameraStream;
        startBtn.disabled = true; captureBtn.disabled = false; stopBtn.disabled = false;
      } catch {
        alert(currentLang === 'fr'
          ? "Impossible d'accéder à la caméra. Vérifiez les permissions."
          : 'تعذر الوصول إلى الكاميرا. تحقق من الأذونات.');
      }
    });
    stopBtn.addEventListener('click', stopCamera);

    function stopCamera() {
      if (cameraStream) {
        cameraStream.getTracks().forEach(t => t.stop());
        cameraStream = null; videoEl.srcObject = null;
        startBtn.disabled = false; captureBtn.disabled = true; stopBtn.disabled = true;
      }
    }

    captureBtn.addEventListener('click', () => {
      if (!cameraStream) return;
      const ctx = canvasEl.getContext('2d');
      canvasEl.width = videoEl.videoWidth;
      canvasEl.height = videoEl.videoHeight;
      ctx.drawImage(videoEl, 0, 0);
      capturedImages[currentStep] = canvasEl.toDataURL('image/jpeg', 0.8);
      renderCapturedImages();
      advanceStep();
    });

    function renderCapturedImages() {
      capturedImgsEl.innerHTML = '';
      ['front','left','right'].forEach(step => {
        if (!capturedImages[step]) return;
        const div = document.createElement('div');
        div.className = `captured-image${step === currentStep ? ' active' : ''}`;
        const img = document.createElement('img');
        img.src = capturedImages[step]; img.alt = step;
        const btn = document.createElement('button');
        btn.className = 'remove-img-btn'; btn.type = 'button';
        btn.innerHTML = '<i class="fas fa-times"></i>';
        btn.onclick = () => { capturedImages[step] = null; renderCapturedImages(); };
        div.appendChild(img); div.appendChild(btn);
        capturedImgsEl.appendChild(div);
      });
    }

    function advanceStep() {
      const steps = ['front','left','right'];
      const idx = steps.indexOf(currentStep);
      if (idx < steps.length - 1) {
        setStep(steps[idx + 1]);
      } else {
        setStep('front');
        const allDone = Object.values(capturedImages).every(Boolean);
        if (allDone) alert(currentLang === 'fr' ? 'Toutes les photos capturées !' : 'تم التقاط جميع الصور!');
      }
    }

    function setStep(step) {
      currentStep = step;
      document.querySelectorAll('.capture-step').forEach(el => el.classList.remove('active'));
      const id = 'step' + step.charAt(0).toUpperCase() + step.slice(1);
      document.getElementById(id).classList.add('active');
      updateCaptureInstructions();
      renderCapturedImages();
    }

    function updateCaptureInstructions() {
      const el = document.getElementById('captureInstructions');
      const msgs = {
        fr: { front: 'Regardez droit devant la caméra', left: 'Tournez la tête à gauche', right: 'Tournez la tête à droite' },
        ar: { front: 'انظر مباشرة إلى الكاميرا', left: 'أدر رأسك إلى اليسار', right: 'أدر رأسك إلى اليمين' }
      };
      el.textContent = msgs[currentLang][currentStep] || msgs['fr'][currentStep];
    }

    // ========== FORM VALIDATION ==========
    document.getElementById('loginForm').addEventListener('submit', e => {
      const email = document.getElementById('loginEmail').value.trim();
      const pass = document.getElementById('loginPassword').value;
      if (!email || !pass) {
        e.preventDefault();
        alert(currentLang === 'fr' ? 'Veuillez remplir tous les champs.' : 'يرجى ملء جميع الحقول.');
      }
      // In real app: submit to PHP backend
    });

    document.getElementById('registerForm').addEventListener('submit', e => {
      const pass = document.getElementById('registerPassword').value;
      const confirm = document.getElementById('registerConfirmPassword').value;
      const errEl = document.getElementById('passwordError');
      errEl.classList.remove('show');

      if (pass.length < 6) {
        e.preventDefault();
        alert(currentLang === 'fr'
          ? 'Le mot de passe doit contenir au moins 6 caractères.'
          : 'يجب أن تحتوي كلمة المرور على 6 أحرف على الأقل.');
        return;
      }
      if (pass !== confirm) {
        e.preventDefault();
        errEl.classList.add('show');
        document.getElementById('registerConfirmPassword').focus();
        return;
      }
      const isArtisan = document.querySelector('.user-type-btn[data-type="artisan"]').classList.contains('active');
      if (isArtisan) {
        const allCaptured = Object.values(capturedImages).every(Boolean);
        if (!allCaptured) {
          e.preventDefault();
          alert(currentLang === 'fr'
            ? 'Veuillez capturer toutes les photos de vérification faciale.'
            : 'يرجى التقاط جميع صور التحقق بالوجه.');
          return;
        }
        document.getElementById('facialData').value = JSON.stringify(capturedImages);
      }
      if (!document.getElementById('acceptTerms').checked) {
        e.preventDefault();
        alert(currentLang === 'fr'
          ? "Veuillez accepter les conditions d'utilisation."
          : 'يرجى قبول شروط الاستخدام.');
      }
    });

    // ========== INIT ==========
    updateLanguage();
    setStep('front');
  </script>
</body>
</html>
