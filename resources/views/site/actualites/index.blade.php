@extends('layouts.app')

@section('title', 'Actualités - FONDATION HICE')

@section('content')
<div class="container">
    <div class="actus-hero">
        <h1>📰 Nos <span>Actualités</span></h1>
        <p>
            Suivez l'actualité de la Fondation HICE et découvrez les dernières
            nouvelles de nos programmes et événements.
        </p>
    </div>

    <div class="actus-grid">
        @if(isset($actualites) && count($actualites) > 0)
            @foreach($actualites as $actualite)
            <div class="actus-card">
                <div class="actus-date">{{ $actualite->created_at->format('d/m/Y') }}</div>
                <h3>{{ $actualite->titre }}</h3>
                <p>{{ Str::limit($actualite->contenu, 130) }}</p>
                <div class="actus-meta">
                    <span>✍️ {{ $actualite->auteur ?? 'FONDATION HICE' }}</span>
                    @if($actualite->categorie)
                    <span class="actus-category">{{ $actualite->categorie }}</span>
                    @endif
                </div>
                <a href="/actualites/{{ $actualite->id }}" class="btn btn-orange btn-sm">Lire la suite →</a>
            </div>
            @endforeach
        @else
            <p style="color: var(--gris-moyen); text-align: center; grid-column: 1 / -1; padding: 40px 0;">
                Aucune actualité disponible pour le moment.
            </p>
        @endif
    </div>

    @if(isset($actualites) && method_exists($actualites, 'links'))
        <div class="pagination">
            {{ $actualites->links() }}
        </div>
    @endif
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

    .actus-hero {
        text-align: center;
        padding: 40px 0 20px;
    }
    .actus-hero h1 {
        font-size: 40px;
        font-weight: 800;
        color: var(--blanc);
    }
    .actus-hero h1 span {
        color: var(--or);
    }
    .actus-hero p {
        font-size: 17px;
        color: var(--gris-clair);
        max-width: 500px;
        margin: 10px auto 0;
        line-height: 1.7;
    }

    .actus-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        margin: 30px 0 40px;
    }

    .actus-card {
        background: var(--noir-secondaire);
        padding: 28px;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        transition: 0.3s;
    }
    .actus-card:hover {
        transform: translateY(-5px);
        border-color: var(--or);
        box-shadow: 0 8px 30px rgba(0,0,0,0.5);
    }
    .actus-card .actus-date {
        font-size: 13px;
        color: var(--gris-moyen);
        font-weight: 500;
        margin-bottom: 6px;
    }
    .actus-card h3 {
        font-size: 20px;
        color: var(--or);
        margin-bottom: 8px;
    }
    .actus-card p {
        color: var(--gris-clair);
        line-height: 1.7;
        font-size: 15px;
        margin-bottom: 15px;
    }
    .actus-card .actus-meta {
        display: flex;
        gap: 15px;
        font-size: 13px;
        color: var(--gris-moyen);
        margin-bottom: 15px;
        flex-wrap: wrap;
        align-items: center;
    }
    .actus-card .actus-category {
        background: rgba(255,255,255,0.05);
        padding: 2px 12px;
        border-radius: 20px;
        color: var(--gris-moyen);
        font-size: 12px;
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

    .pagination {
        display: flex;
        justify-content: center;
        margin: 30px 0 50px;
        gap: 8px;
    }
    .pagination a, .pagination span {
        padding: 8px 16px;
        border-radius: 8px;
        text-decoration: none;
        color: var(--gris-clair);
        background: var(--noir-secondaire);
        border: 1px solid rgba(255,255,255,0.05);
        transition: 0.3s;
    }
    .pagination a:hover {
        border-color: var(--or);
        color: var(--or);
    }
    .pagination .active span {
        background: var(--or);
        color: var(--noir);
        border-color: var(--or);
    }

    @media (max-width: 768px) {
        .actus-grid { grid-template-columns: 1fr; }
        .actus-hero h1 { font-size: 30px; }
    }
</style>
@endsection
