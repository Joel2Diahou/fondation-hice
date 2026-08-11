<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - EMPIRE HICE</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #0A0A0A; color: white; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-box { background: #1A1A1A; padding: 40px; border-radius: 16px; border: 2px solid #D4AF37; width: 100%; max-width: 400px; }
        .login-box h1 { color: #D4AF37; text-align: center; margin-bottom: 10px; }
        .login-box .subtitle { color: #FF6B00; text-align: center; margin-bottom: 30px; font-size: 16px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; color: #D4AF37; margin-bottom: 5px; }
        .form-group input { width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #333; background: #0A0A0A; color: white; }
        .btn { width: 100%; padding: 15px; border: none; border-radius: 8px; background: #FF6B00; color: white; font-size: 16px; cursor: pointer; transition: 0.3s; }
        .btn:hover { background: #D4AF37; color: black; }
        .flash-error { background: #3a1a1a; border: 1px solid #ff0000; color: #ff0000; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center; }
        .flash-success { background: #1a3a1a; border: 1px solid #00ff00; color: #00ff00; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center; }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>🔐 ADMIN</h1>
        <p class="subtitle">EMPIRE HICE - Fondation</p>

        @if(session('error'))
            <div class="flash-error">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="flash-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required placeholder="admin@empirehice.com">
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>
            <button type="submit" class="btn">Se connecter</button>
        </form>
        <p style="text-align: center; color: #888; margin-top: 20px; font-size: 14px;">
            Contactez l'administrateur si vous n'avez pas de compte
        </p>
    </div>
</body>
</html>
