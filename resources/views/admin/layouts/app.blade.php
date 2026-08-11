<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - FONDATION HICE</title>
    <style>
        :root {
            --black: #0A0A0A;
            --orange: #FF6B00;
            --gold: #D4AF37;
            --dark: #1A1A1A;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #0A0A0A; color: white; }
        .admin-container { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: #1A1A1A; padding: 20px; border-right: 2px solid var(--gold); min-height: 100vh; }
        .sidebar h2 { color: var(--gold); margin-bottom: 30px; }
        .sidebar a { display: block; color: #ccc; padding: 12px 15px; text-decoration: none; border-radius: 8px; margin-bottom: 5px; transition: 0.3s; }
        .sidebar a:hover { background: var(--orange); color: white; }
        .sidebar a.active { background: var(--gold); color: black; }
        .content { flex: 1; padding: 30px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid #333; }
        .header h1 { color: var(--gold); }
        .btn { padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; text-decoration: none; display: inline-block; transition: 0.3s; font-weight: 600; }
        .btn-orange { background: var(--orange); color: white; }
        .btn-orange:hover { background: #e85a00; }
        .btn-gold { background: var(--gold); color: black; }
        .btn-gold:hover { background: #c4a030; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-danger:hover { background: #b02a37; }
        .btn-success { background: #28a745; color: white; }
        .btn-success:hover { background: #1e7e34; }
        .btn-sm { padding: 5px 12px; font-size: 12px; }
        .card { background: #1A1A1A; padding: 20px; border-radius: 12px; border: 1px solid #333; margin-bottom: 20px; }
        .card h3 { color: var(--gold); margin-bottom: 15px; }
        .card p { color: #ccc; }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 12px; color: var(--gold); border-bottom: 2px solid var(--gold); }
        td { padding: 12px; border-bottom: 1px solid #333; color: #ccc; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px; }
        .stat-card { background: #1A1A1A; padding: 25px; border-radius: 12px; text-align: center; border: 1px solid #333; }
        .stat-card h2 { color: var(--gold); font-size: 36px; }
        .stat-card p { color: #888; }
        .flash-success { background: #1a3a1a; border: 1px solid #00ff00; color: #00ff00; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        .flash-error { background: #3a1a1a; border: 1px solid #ff0000; color: #ff0000; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        .flash-warning { background: #3a3a1a; border: 1px solid #ffc107; color: #ffc107; padding: 15px; border-radius: 8px; margin-bottom: 20px; }

        /* ===== FORMULAIRES CORRIGÉS ===== */
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block;
            font-weight: 600;
            color: var(--gold);
            margin-bottom: 5px;
            font-size: 14px;
        }
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            border: 2px solid #444;
            font-size: 15px;
            transition: 0.3s;
            background: #0A0A0A;
            color: #FFFFFF;
        }
        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #666;
        }
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--gold);
            outline: none;
            background: #1A1A1A;
            color: #FFFFFF;
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.08);
        }
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        .form-group select option {
            background: #0A0A0A;
            color: white;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-success { background: #28a745; color: white; }
        .badge-warning { background: #ffc107; color: black; }
        .badge-danger { background: #dc3545; color: white; }
        .badge-info { background: #17a2b8; color: white; }

        .actions { display: flex; gap: 10px; }
        .actions a { text-decoration: none; }
        hr { border-color: #333; margin: 20px 0; }

        .text-center { text-align: center; }
        .mt-20 { margin-top: 20px; }
        .mb-20 { margin-bottom: 20px; }

        @media (max-width: 768px) {
            .sidebar { width: 200px; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="sidebar">
            <h2>⚡ FONDATION HICE</h2>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">📊 Dashboard</a>
            <a href="{{ route('admin.programmes.index') }}" class="{{ request()->routeIs('admin.programmes*') ? 'active' : '' }}">📚 Programmes</a>
            <a href="{{ route('admin.actualites.index') }}" class="{{ request()->routeIs('admin.actualites*') ? 'active' : '' }}">📰 Actualités</a>
            <a href="{{ route('admin.candidatures.index') }}" class="{{ request()->routeIs('admin.candidatures*') ? 'active' : '' }}">📋 Candidatures</a>
            <a href="{{ route('admin.partenaires.index') }}" class="{{ request()->routeIs('admin.partenaires*') ? 'active' : '' }}">🤝 Partenaires</a>
            <a href="{{ route('admin.demandes.index') }}" class="{{ request()->routeIs('admin.demandes*') ? 'active' : '' }}">📩 Demandes</a>
            <a href="{{ route('admin.demandes-partenaires.index') }}" class="{{ request()->routeIs('admin.demandes-partenaires*') ? 'active' : '' }}">🤝 Demandes Partenaires</a>
            <a href="{{ route('admin.videos.index') }}" class="{{ request()->routeIs('admin.videos*') ? 'active' : '' }}">🎬 Vidéos</a>
            <a href="{{ route('admin.projets.index') }}" class="{{ request()->routeIs('admin.projets*') ? 'active' : '' }}">🚀 Projets</a>
            <a href="{{ route('admin.monitoring.index') }}" class="{{ request()->routeIs('admin.monitoring*') ? 'active' : '' }}">📊 Monitoring</a>
            <hr>
            <a href="{{ route('admin.logout') }}" style="color: #dc3545;">🚪 Déconnexion</a>
        </div>
        <div class="content">
            <div class="header">
                <h1>@yield('title', 'Dashboard')</h1>
                <div><span style="color: #888;">👋 {{ session('admin_nom') }}</span></div>
            </div>

            @if(session('success'))
                <div class="flash-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="flash-error">{{ session('error') }}</div>
            @endif
            @if(session('warning'))
                <div class="flash-warning">{{ session('warning') }}</div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>
