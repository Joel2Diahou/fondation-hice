@extends('layouts.app')

@section('title', 'Devenir Partenaire - FONDATION HICE')

@section('content')
<div class="container">
    <div class="devenir-hero">
        <h1>🤝 Devenir <span>Partenaire</span></h1>
        <p>
            Rejoignez la Fondation HICE dans sa mission au service de l'entrepreneuriat scolaire.
            Remplissez le formulaire ci-dessous et nous vous contacterons dans les plus brefs délais.
        </p>
    </div>

    <div class="devenir-form-container">
        <div class="devenir-form-card">
            <h2>Formulaire de partenariat</h2>
            <form method="POST" action="{{ route('partenaires.devenir.store') }}">
                @csrf

                <div class="form-group">
                    <label>Nom de l'entreprise / Organisation *</label>
                    <input type="text" name="entreprise" required placeholder="Nom de votre entreprise">
                </div>

                <div class="form-group">
                    <label>Nom du contact *</label>
                    <input type="text" name="nom_contact" required placeholder="Votre nom et prénom">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" required placeholder="votre@email.com">
                    </div>
                    <div class="form-group">
                        <label>Téléphone *</label>
                        <input type="text" name="telephone" required placeholder="Votre numéro">
                    </div>
                </div>

                <div class="form-group">
                    <label>Ville *</label>
                    <input type="text" name="ville" required placeholder="Votre ville">
                </div>

                <div class="form-group">
                    <label>Type de partenariat *</label>
                    <select name="type_partenariat" required>
                        <option value="">Sélectionnez un type</option>
                        <option value="partenaire">🤝 Partenaire</option>
                        <option value="sponsor">💰 Sponsor</option>
                        <option value="mecene">🎁 Mécène</option>
                        <option value="autre">📌 Autre</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Message *</label>
                    <textarea name="message" rows="5" placeholder="Décrivez votre intérêt pour un partenariat avec la Fondation HICE..." required></textarea>
                </div>

                <button type="submit" class="btn-submit">🤝 Envoyer ma demande</button>
            </form>

            @if(session('success'))
                <div class="flash-success" style="margin-top: 20px;">
                    ✅ {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="devenir-infos">
            <div class="info-card">
                <div class="info-icon">💡</div>
                <h3>Pourquoi devenir partenaire ?</h3>
                <ul>
                    <li>✔️ Soutenir l'entrepreneuriat des jeunes</li>
                    <li>✔️ Valoriser votre marque</li>
                    <li>✔️ Accéder à un réseau d'établissements</li>
                    <li>✔️ Contribuer à un impact social positif</li>
                </ul>
            </div>

            <div class="info-card">
                <div class="info-icon">📞</div>
                <h3>Une question ?</h3>
                <p><strong>Email :</strong> diahoujoel750@gmail.com</p>
                <p><strong>Téléphone :</strong> 01 40 10 61 13</p>
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

    .devenir-hero {
        text-align: center;
        padding: 40px 0 20px;
    }
    .devenir-hero h1 {
        font-size: 40px;
        font-weight: 800;
        color: var(--blanc);
    }
    .devenir-hero h1 span {
        color: var(--or);
    }
    .devenir-hero p {
        font-size: 17px;
        color: var(--gris-clair);
        max-width: 550px;
        margin: 10px auto 0;
        line-height: 1.7;
    }

    .devenir-form-container {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 40px;
        margin: 30px 0 60px;
    }

    .devenir-form-card {
        background: var(--noir-secondaire);
        padding: 35px;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .devenir-form-card h2 {
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
    .form-group select,
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
    .form-group select:focus,
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

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
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

    .devenir-infos {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .info-card {
        background: var(--noir-secondaire);
        padding: 25px;
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .info-card .info-icon {
        font-size: 32px;
        display: block;
        margin-bottom: 10px;
    }
    .info-card h3 {
        font-size: 17px;
        color: var(--or);
        margin-bottom: 10px;
    }
    .info-card ul {
        list-style: none;
        padding: 0;
    }
    .info-card ul li {
        color: var(--gris-clair);
        padding: 6px 0;
        font-size: 14px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .info-card ul li:last-child {
        border-bottom: none;
    }
    .info-card p {
        color: var(--gris-clair);
        font-size: 14px;
        line-height: 1.8;
        margin: 5px 0;
    }
    .info-card p strong {
        color: var(--blanc);
    }

    @media (max-width: 992px) {
        .devenir-form-container {
            grid-template-columns: 1fr;
        }
    }
    @media (max-width: 768px) {
        .devenir-hero h1 { font-size: 30px; }
        .devenir-form-card { padding: 25px; }
        .form-row { grid-template-columns: 1fr; }
    }
</style>
@endsection
