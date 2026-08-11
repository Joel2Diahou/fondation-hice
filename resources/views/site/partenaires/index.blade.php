@extends('layouts.app')

@section('title', 'Partenaires - FONDATION HICE')

@section('content')
<div class="container">
    <div class="partenaires-hero">
        <h1>🤝 Nos <span>Partenaires</span></h1>
        <p>
            Découvrez les entreprises et organisations qui nous accompagnent
            dans notre mission au service de la jeunesse.
        </p>
    </div>

    <div class="partenaires-grid">
        @if(isset($partenaires) && count($partenaires) > 0)
            @foreach($partenaires as $partenaire)
            <div class="partenaire-card">
                <div class="partenaire-icon">🏢</div>
                <h3>{{ $partenaire->nom }}</h3>
                <p>{{ $partenaire->description_fr ?? 'Partenaire officiel de la Fondation HICE' }}</p>
                <span class="partenaire-type">
                    @if($partenaire->type == 'partenaire') 🤝 Partenaire
                    @elseif($partenaire->type == 'mecene') 🎁 Mécène
                    @else 💰 Sponsor
                    @endif
                </span>
                @if($partenaire->site_web)
                <a href="{{ $partenaire->site_web }}" target="_blank" class="btn btn-orange btn-sm">🌐 Visiter</a>
                @endif
            </div>
            @endforeach
        @else
            <p style="color: var(--gris-moyen); text-align: center; grid-column: 1 / -1; padding: 40px 0;">
                Aucun partenaire enregistré pour le moment.
            </p>
        @endif
    </div>

    <div class="devenir-partenaire">
        <h2>💼 Devenir partenaire</h2>
        <p>
            Rejoignez-nous pour soutenir l'entrepreneuriat des jeunes et contribuer
            à un avenir meilleur pour la jeunesse.
        </p>
        <p style="color: var(--gris-moyen); margin-bottom: 15px;">
            📞 01 40 10 61 13 | ✉️ diahoujoel750@gmail.com
        </p>
        <div class="btn-group">
            <a href="{{ route('partenaires.devenir') }}" class="btn btn-or">🤝 Devenir partenaire</a>
            <a href="/contact" class="btn btn-orange">📞 Nous contacter</a>
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

    .partenaires-hero {
        text-align: center;
        padding: 40px 0 20px;
    }
    .partenaires-hero h1 {
        font-size: 40px;
        font-weight: 800;
        color: var(--blanc);
    }
    .partenaires-hero h1 span {
        color: var(--or);
    }
    .partenaires-hero p {
        font-size: 17px;
        color: var(--gris-clair);
        max-width: 500px;
        margin: 10px auto 0;
        line-height: 1.7;
    }

    .partenaires-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin: 30px 0 50px;
    }

    .partenaire-card {
        background: var(--noir-secondaire);
        padding: 28px;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        text-align: center;
        transition: 0.3s;
    }
    .partenaire-card:hover {
        transform: translateY(-5px);
        border-color: var(--or);
        box-shadow: 0 8px 30px rgba(0,0,0,0.5);
    }
    .partenaire-card .partenaire-icon {
        font-size: 40px;
        display: block;
        margin-bottom: 12px;
    }
    .partenaire-card h3 {
        font-size: 20px;
        color: var(--or);
        margin-bottom: 8px;
    }
    .partenaire-card p {
        color: var(--gris-clair);
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 12px;
    }
    .partenaire-card .partenaire-type {
        display: inline-block;
        background: rgba(255,255,255,0.05);
        padding: 4px 16px;
        border-radius: 20px;
        font-size: 13px;
        color: var(--gris-moyen);
        margin-bottom: 12px;
        border: 1px solid rgba(255,255,255,0.05);
    }

    .btn {
        padding: 10px 24px;
        border: none;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
    }
    .btn-or {
        background: var(--or);
        color: var(--noir);
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
    }
    .btn-or:hover {
        background: var(--or-clair);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
    }
    .btn-orange {
        background: var(--orange);
        color: white;
        box-shadow: 0 4px 15px rgba(230, 126, 34, 0.2);
    }
    .btn-orange:hover {
        background: var(--orange-vif);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 107, 0, 0.3);
    }
    .btn-sm { font-size: 14px; padding: 8px 18px; }

    .devenir-partenaire {
        background: var(--noir-secondaire);
        padding: 40px;
        border-radius: 16px;
        text-align: center;
        margin: 30px 0 50px;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .devenir-partenaire h2 {
        font-size: 28px;
        color: var(--or);
        margin-bottom: 10px;
    }
    .devenir-partenaire p {
        color: var(--gris-clair);
        font-size: 17px;
        max-width: 500px;
        margin: 0 auto 20px;
        line-height: 1.7;
    }
    .devenir-partenaire .btn-group {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    @media (max-width: 992px) {
        .partenaires-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
        .partenaires-grid { grid-template-columns: 1fr; }
        .partenaires-hero h1 { font-size: 30px; }
        .devenir-partenaire { padding: 25px; }
        .devenir-partenaire h2 { font-size: 22px; }
    }
</style>
@endsection
