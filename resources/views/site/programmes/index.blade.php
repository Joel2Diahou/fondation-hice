@extends('layouts.app')

@section('title', 'Programmes - FONDATION HICE')

@section('content')
<div class="container">
    <div class="programmes-hero">
        <h1>📚 Nos <span>Programmes</span></h1>
        <p>
            Découvrez nos programmes d'accompagnement pour les jeunes entrepreneurs
            de la 6ᵉ à la Licence 3.
        </p>
    </div>

    <div class="programmes-grid">
        @if(isset($programmes) && count($programmes) > 0)
            @foreach($programmes as $programme)
            <div class="programme-card">
                <div class="programme-status">
                    <span class="status-badge status-{{ $programme->statut }}">
                        {{ $programme->statut == 'ouvert' ? '✅ Ouvert' : ($programme->statut == 'ferme' ? '❌ Fermé' : '⏳ À venir') }}
                    </span>
                </div>
                <div class="programme-icon">📖</div>
                <h3>{{ $programme->titre }}</h3>
                <p>{{ Str::limit($programme->description, 120) }}</p>
                <div class="programme-meta">
                    <span>⏱️ {{ $programme->duree ?? 'Durée variable' }}</span>
                    <span>🎯 {{ $programme->public_cible ?? 'Tous publics' }}</span>
                </div>
                <a href="/programmes/{{ $programme->id }}" class="btn btn-or btn-sm">Voir les détails →</a>
            </div>
            @endforeach
        @else
            <p style="color: var(--gris-moyen); text-align: center; grid-column: 1 / -1; padding: 40px 0;">
                Aucun programme disponible pour le moment.
            </p>
        @endif
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

    .programmes-hero {
        text-align: center;
        padding: 40px 0 20px;
    }
    .programmes-hero h1 {
        font-size: 40px;
        font-weight: 800;
        color: var(--blanc);
    }
    .programmes-hero h1 span {
        color: var(--or);
    }
    .programmes-hero p {
        font-size: 17px;
        color: var(--gris-clair);
        max-width: 500px;
        margin: 10px auto 0;
        line-height: 1.7;
    }

    .programmes-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin: 20px 0 50px;
    }

    .programme-card {
        background: var(--noir-secondaire);
        padding: 28px;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        transition: 0.3s;
        position: relative;
    }
    .programme-card:hover {
        transform: translateY(-5px);
        border-color: var(--or);
        box-shadow: 0 8px 30px rgba(0,0,0,0.5);
    }
    .programme-card .programme-icon {
        font-size: 32px;
        margin-bottom: 10px;
    }
    .programme-card h3 {
        font-size: 20px;
        color: var(--or);
        margin-bottom: 8px;
    }
    .programme-card p {
        color: var(--gris-clair);
        line-height: 1.6;
        font-size: 15px;
        margin-bottom: 15px;
    }
    .programme-card .programme-meta {
        display: flex;
        gap: 15px;
        font-size: 13px;
        color: var(--gris-moyen);
        margin-bottom: 15px;
        flex-wrap: wrap;
    }
    .programme-card .programme-status {
        position: absolute;
        top: 15px;
        right: 15px;
    }
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    .status-ouvert {
        background: #1a3a1a;
        color: #28a745;
        border: 1px solid #28a745;
    }
    .status-ferme {
        background: #3a1a1a;
        color: #dc3545;
        border: 1px solid #dc3545;
    }
    .status-a_venir {
        background: #3a3a1a;
        color: #ffc107;
        border: 1px solid #ffc107;
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
    .btn-sm { font-size: 14px; padding: 8px 18px; }

    @media (max-width: 992px) {
        .programmes-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
        .programmes-grid { grid-template-columns: 1fr; }
        .programmes-hero h1 { font-size: 30px; }
    }
</style>
@endsection
