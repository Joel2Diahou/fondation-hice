@extends('layouts.app')

@section('title', 'Contact - FONDATION HICE')

@section('content')
<div class="container">
    <div class="contact-hero">
        <h1>📞 Nous <span>contacter</span></h1>
        <p>
            Une question ? Un projet à déposer ? Une proposition de partenariat ?
            N'hésitez pas à nous écrire, nous vous répondrons dans les plus brefs délais.
        </p>
    </div>

    <div class="contact-grid">
        <div class="contact-form">
            <h2>Envoyez-nous un message</h2>
            <form method="POST" action="{{ route('contact.envoyer') }}">
                @csrf

                <div class="form-group">
                    <label>Nom complet *</label>
                    <input type="text" name="nom" required placeholder="Votre nom et prénom">
                </div>

                <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" required placeholder="votre@email.com">
                </div>

                <div class="form-group">
                    <label>Téléphone</label>
                    <input type="text" name="telephone" placeholder="Votre numéro de téléphone">
                </div>

                <div class="form-group">
                    <label>Entreprise / Établissement</label>
                    <input type="text" name="entreprise" placeholder="Nom de votre entreprise ou établissement">
                </div>

                <div class="form-group">
                    <label>Message *</label>
                    <textarea name="message" rows="5" required placeholder="Votre message..."></textarea>
                </div>

                <button type="submit" class="btn-submit">📩 Envoyer le message</button>
            </form>

            @if(session('success'))
                <div class="flash-success" style="margin-top: 20px;">
                    ✅ {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="contact-infos">
            <div class="info-card">
                <div class="info-icon">📍</div>
                <h3>Adresse</h3>
                <p>Abidjan, Côte d'Ivoire</p>
            </div>

            <div class="info-card">
                <div class="info-icon">📱</div>
                <h3>Téléphone</h3>
                <p><strong>01 40 10 61 13</strong></p>
            </div>

            <div class="info-card">
                <div class="info-icon">✉️</div>
                <h3>Email</h3>
                <p><strong>diahoujoel750@gmail.com</strong></p>
            </div>

            <div class="info-card">
                <div class="info-icon">🕐</div>
                <h3>Horaires</h3>
                <p>Lun - Ven : 08h00 - 18h00</p>
            </div>

            <div class="info-card social-card">
                <h3>Suivez-nous</h3>
                <div class="social-links">
                    <a href="#" class="social-link">📘</a>
                    <a href="#" class="social-link">📸</a>
                    <a href="#" class="social-link">🐦</a>
                    <a href="#" class="social-link">💼</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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

    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

    .contact-hero {
        text-align: center;
        padding: 40px 0 30px;
    }
    .contact-hero h1 {
        font-size: 40px;
        font-weight: 800;
        color: var(--blanc);
    }
    .contact-hero h1 span {
        color: var(--or);
    }
    .contact-hero p {
        font-size: 17px;
        color: var(--gris-clair);
        max-width: 550px;
        margin: 12px auto 0;
        line-height: 1.7;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 40px;
        margin: 40px 0 60px;
    }

    .contact-form {
        background: var(--noir-secondaire);
        padding: 35px;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .contact-form h2 {
        font-size: 24px;
        color: var(--or);
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 18px;
    }
    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--or);
        margin-bottom: 5px;
        font-size: 14px;
    }
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border-radius: 10px;
        border: 1px solid rgba(255,255,255,0.1);
        font-size: 15px;
        transition: 0.3s;
        background: var(--noir);
        color: var(--blanc);
    }
    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: var(--gris-moyen);
    }
    .form-group input:focus,
    .form-group textarea:focus {
        border-color: var(--or);
        outline: none;
        background: var(--noir);
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
    }
    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .btn-submit {
        background: var(--or);
        color: var(--noir);
        padding: 14px 30px;
        border: none;
        border-radius: 50px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
        width: 100%;
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
    }
    .btn-submit:hover {
        background: var(--or-clair);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
    }

    .flash-success {
        background: #1a3a1a;
        border-left: 5px solid #28a745;
        color: #28a745;
        padding: 12px 18px;
        border-radius: 10px;
        font-weight: 500;
    }

    .contact-infos {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .info-card {
        background: var(--noir-secondaire);
        padding: 20px;
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        transition: 0.3s;
    }
    .info-card:hover {
        border-color: var(--or);
    }
    .info-card .info-icon {
        font-size: 28px;
        display: block;
        margin-bottom: 6px;
    }
    .info-card h3 {
        font-size: 16px;
        color: var(--or);
        margin-bottom: 4px;
    }
    .info-card p {
        color: var(--gris-clair);
        font-size: 15px;
        line-height: 1.6;
    }
    .info-card p strong {
        color: var(--blanc);
    }

    .social-card h3 {
        margin-bottom: 10px;
    }
    .social-links {
        display: flex;
        gap: 12px;
    }
    .social-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: var(--noir);
        color: var(--gris-moyen);
        text-decoration: none;
        font-size: 20px;
        transition: 0.3s;
        border: 1px solid rgba(255,255,255,0.05);
    }
    .social-link:hover {
        background: var(--or);
        color: var(--noir);
        transform: translateY(-3px);
        border-color: var(--or);
    }

    @media (max-width: 992px) {
        .contact-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
        .contact-hero h1 { font-size: 30px; }
        .contact-form { padding: 25px; }
    }
</style>
@endsection
