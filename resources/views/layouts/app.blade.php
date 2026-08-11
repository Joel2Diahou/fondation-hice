<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FONDATION HICE - @yield('title', 'Accueil')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-favicon.png') }}">
    <style>
        /* ===== COULEURS ===== */
        :root {
            --noir: #0A0A0A;
            --noir-secondaire: #1A1A1A;
            --or: #D4AF37;
            --or-clair: #F0D060;
            --orange: #E67E22;
            --orange-vif: #FF6B00;
            --blanc: #FFFFFF;
            --gris-clair: #CCCCCC;
            --gris-moyen: #888888;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--noir);
            color: var(--blanc);
        }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        /* ===== NAVBAR ===== */
        nav {
            background: var(--noir);
            padding: 15px 0;
            border-bottom: 2px solid var(--or);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 30px rgba(0,0,0,0.8);
        }
        nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        nav .logo img {
            height: 45px;
            width: auto;
            display: block;
        }
        nav .nav-links {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
            align-items: center;
        }
        nav .nav-links a {
            color: var(--gris-clair);
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
            padding: 5px 0;
            border-bottom: 2px solid transparent;
        }
        nav .nav-links a:hover {
            color: var(--or);
            border-bottom-color: var(--or);
        }
        nav .nav-links a.active {
            color: var(--or);
            border-bottom-color: var(--or);
        }

        /* ===== MAIN ===== */
        main { min-height: 60vh; padding: 30px 0; }

        /* ===== FOOTER ===== */
        footer {
            background: var(--noir-secondaire);
            padding: 40px 0 25px;
            margin-top: 50px;
            border-top: 2px solid var(--or);
            text-align: center;
        }
        footer .footer-logo img {
            height: 40px;
            width: auto;
            display: inline-block;
        }
        footer p { color: var(--gris-moyen); margin: 8px 0; }
        footer .footer-text {
            color: var(--or);
            font-weight: 500;
        }
        footer .socials {
            margin: 15px 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        footer .socials a {
            color: var(--gris-moyen);
            text-decoration: none;
            font-size: 20px;
            transition: 0.3s;
        }
        footer .socials a:hover { color: var(--or); }

        /* ===== FLASH MESSAGES ===== */
        .flash {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .flash-success {
            background: #1a3a1a;
            border-left: 5px solid #28a745;
            color: #28a745;
        }
        .flash-error {
            background: #3a1a1a;
            border-left: 5px solid #dc3545;
            color: #dc3545;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            nav .nav-links { display: none; }
            nav .container { justify-content: center; }
            nav .logo img { height: 35px; }
        }
    </style>
</head>
<body>
    <nav>
        <div class="container">
            <a href="/" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="FONDATION HICE">
            </a>
            <div class="nav-links">
                <a href="/" class="{{ request()->routeIs('accueil') ? 'active' : '' }}">Accueil</a>
                <a href="/programmes" class="{{ request()->routeIs('programmes*') ? 'active' : '' }}">Programmes</a>
                <a href="/actualites" class="{{ request()->routeIs('actualites*') ? 'active' : '' }}">Actualités</a>

                <a href="/partenaires" class="{{ request()->routeIs('partenaires*') ? 'active' : '' }}">Partenaires</a>
                <a href="/a-propos" class="{{ request()->routeIs('a-propos') ? 'active' : '' }}">À propos</a>
                <a href="/contact" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            </div>
        </div>
    </nav>

    <main>
        @if(session('success'))
            <div class="container">
                <div class="flash flash-success">{{ session('success') }}</div>
            </div>
        @endif
        @if(session('error'))
            <div class="container">
                <div class="flash flash-error">{{ session('error') }}</div>
            </div>
        @endif
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <a href="/" class="footer-logo">
                <img src="{{ asset('images/logo.png') }}" alt="FONDATION HICE">
            </a>
            <p class="footer-text">De la 6ᵉ à la Licence 3, bâtissons l'entrepreneuriat scolaire</p>
            <p style="color: var(--gris-moyen); font-size: 14px;">
                📞 01 40 10 61 13 | ✉️ diahoujoel750@gmail.com
            </p>
            <div class="socials">
                <a href="#">📘</a>
                <a href="#">📸</a>
                <a href="#">🐦</a>
                <a href="#">💼</a>
            </div>
            <p>© {{ date('Y') }} FONDATION HICE - Tous droits réservés</p>
        </div>
    </footer>
</body>
</html>
