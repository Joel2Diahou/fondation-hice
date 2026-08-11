@extends('layouts.app')

@section('title', 'Accueil - FONDATION HICE')

@section('content')
<div class="container">
    <!-- ===== HERO ===== -->
    <div class="hero">
        <div class="hero-content">
            <p class="hero-badge">🚀 FONDATION HICE</p>
            <h1 class="hero-title">De la 6ᵉ à la Licence 3, <br><span>bâtissons l'entrepreneuriat</span> scolaire</h1>
            <p class="hero-desc">
                La Fondation HICE accompagne les élèves et étudiants dans la création de leur projet entrepreneurial.
                Compétitions de pitchs, formations et incubation jusqu'aux premiers bénéfices.
            </p>
            <div class="hero-buttons">
                <a href="{{ route('deposer-projet') }}" class="btn btn-or">🚀 Déposer mon projet</a>
                <a href="/contact" class="btn btn-orange">Nous contacter</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/logo.png') }}" alt="FONDATION HICE" class="hero-logo">
        </div>
    </div>

    <!-- ===== STATS ===== -->
    <div class="stats-section">
        <div class="stat-item">
            <span class="stat-number">150+</span>
            <span class="stat-label">Jeunes formés</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">12</span>
            <span class="stat-label">Programmes lancés</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">25</span>
            <span class="stat-label">Partenaires engagés</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">8</span>
            <span class="stat-label">Projets incubés</span>
        </div>
    </div>

    <!-- ===== PROGRAMMES ===== -->
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">📚 Nos Programmes</h2>
            <a href="/programmes" class="see-all">Voir tout →</a>
        </div>
        <div class="grid-3">
            @if(isset($programmes) && count($programmes) > 0)
                @foreach($programmes as $programme)
                <div class="card card-programme">
                    <div class="card-icon">📖</div>
                    <h3>{{ $programme->titre }}</h3>
                    <p>{{ Str::limit($programme->description, 100) }}</p>
                    <a href="/programmes/{{ $programme->id }}" class="btn btn-orange btn-sm">Voir plus →</a>
                </div>
                @endforeach
            @else
                <p style="color: var(--gris-moyen);">Aucun programme disponible.</p>
            @endif
        </div>
    </div>

    <!-- ===== ACTUALITES ===== -->
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">📰 Dernières Actualités</h2>
            <a href="/actualites" class="see-all">Voir tout →</a>
        </div>
        <div class="grid-3">
            @if(isset($actualites) && count($actualites) > 0)
                @foreach($actualites as $actualite)
                <div class="card card-actualite">
                    <p class="card-date">{{ $actualite->created_at->format('d/m/Y') }}</p>
                    <h3>{{ $actualite->titre }}</h3>
                    <p>{{ Str::limit($actualite->contenu, 80) }}</p>
                    <a href="/actualites/{{ $actualite->id }}" class="btn btn-orange btn-sm">Lire la suite →</a>
                </div>
                @endforeach
            @else
                <p style="color: var(--gris-moyen);">Aucune actualité disponible.</p>
            @endif
        </div>
    </div>

    <!-- ===== VIDEOS ===== -->
    @if(isset($videos) && count($videos) > 0)
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">🎬 Nos Vidéos</h2>
            <a href="/videos" class="see-all">Voir tout →</a>
        </div>
        <div class="videos-grid">
            @foreach($videos as $video)
            <div class="video-card">
                <div class="video-wrapper">
                    @if($video->is_youtube)
                        <iframe src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                                title="{{ $video->titre }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                        </iframe>
                    @elseif($video->is_vimeo)
                        <iframe src="https://player.vimeo.com/video/{{ $video->vimeo_id }}"
                                title="{{ $video->titre }}"
                                frameborder="0"
                                allow="autoplay; fullscreen; picture-in-picture"
                                allowfullscreen>
                        </iframe>
                    @elseif($video->is_fichier)
                        <video controls style="width:100%; height:100%; object-fit:cover;">
                            <source src="{{ $video->video_path }}" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture de vidéos.
                        </video>
                    @else
                        <div style="background: var(--noir-secondaire); padding: 40px; text-align: center;">
                            <span style="font-size: 48px;">🎬</span>
                            <p style="color: var(--gris-moyen);">Vidéo non disponible</p>
                        </div>
                    @endif
                </div>
                <div class="video-info">
                    <h3>{{ $video->titre }}</h3>
                    @if($video->description)
                    <p>{{ Str::limit($video->description, 60) }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

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

    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

    /* ===== HERO ===== */
    .hero {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 50px 0 30px;
        gap: 40px;
        flex-wrap: wrap;
    }
    .hero-content { flex: 1; min-width: 300px; }
    .hero-badge {
        background: rgba(212, 175, 55, 0.15);
        color: var(--or);
        display: inline-block;
        padding: 6px 18px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
    }
    .hero-title {
        font-size: 44px;
        font-weight: 800;
        color: var(--blanc);
        line-height: 1.2;
    }
    .hero-title span { color: var(--or); }
    .hero-desc {
        font-size: 18px;
        color: var(--gris-clair);
        margin: 20px 0 30px;
        max-width: 500px;
        line-height: 1.7;
    }
    .hero-buttons { display: flex; gap: 15px; flex-wrap: wrap; }

    .hero-image {
        flex: 0 0 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }
    .hero-logo {
        max-width: 100%;
        height: auto;
        max-height: 350px;
        object-fit: contain;
        filter: drop-shadow(0 8px 30px rgba(212, 175, 55, 0.15));
        transition: transform 0.4s ease;
    }
    .hero-logo:hover {
        transform: scale(1.03);
    }

    /* ===== BTNS ===== */
    .btn {
        padding: 14px 32px;
        border: none;
        border-radius: 50px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
    }
    .btn-or {
        background: var(--or);
        color: var(--noir);
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
    }
    .btn-or:hover {
        background: var(--or-clair);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.5);
    }
    .btn-orange {
        background: var(--orange);
        color: white;
        box-shadow: 0 4px 15px rgba(230, 126, 34, 0.3);
    }
    .btn-orange:hover {
        background: var(--orange-vif);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 107, 0, 0.4);
    }
    .btn-sm { padding: 8px 20px; font-size: 14px; }

    /* ===== STATS ===== */
    .stats-section {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        padding: 40px 0;
        margin: 20px 0 40px;
        border-top: 1px solid rgba(255,255,255,0.05);
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .stat-item { text-align: center; }
    .stat-number {
        font-size: 40px;
        font-weight: 800;
        color: var(--or);
        display: block;
        text-shadow: 0 0 30px rgba(212, 175, 55, 0.1);
    }
    .stat-label {
        color: var(--gris-moyen);
        font-size: 15px;
        font-weight: 500;
        margin-top: 5px;
        display: block;
    }

    /* ===== SECTIONS ===== */
    .section { margin: 50px 0; }
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }
    .section-title {
        font-size: 28px;
        font-weight: 700;
        color: var(--blanc);
    }
    .see-all {
        color: var(--orange);
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }
    .see-all:hover { color: var(--or); }

    /* ===== GRID ===== */
    .grid-3 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    /* ===== CARDS ===== */
    .card {
        background: var(--noir-secondaire);
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
        border: 1px solid rgba(255,255,255,0.05);
    }
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.5);
        border-color: var(--or);
    }
    .card-programme .card-icon { font-size: 32px; margin-bottom: 10px; }
    .card-programme h3, .card-actualite h3 {
        font-size: 18px;
        color: var(--or);
        margin: 10px 0;
    }
    .card-programme p, .card-actualite p {
        color: var(--gris-clair);
        line-height: 1.6;
        margin-bottom: 15px;
        font-size: 15px;
    }
    .card-actualite .card-date {
        color: var(--gris-moyen);
        font-size: 13px;
        font-weight: 500;
    }

    /* ===== VIDEOS ===== */
    .videos-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 20px;
    }

    .video-card {
        background: var(--noir-secondaire);
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        transition: 0.3s;
    }
    .video-card:hover {
        transform: translateY(-5px);
        border-color: var(--or);
        box-shadow: 0 8px 30px rgba(0,0,0,0.5);
    }

    .video-wrapper {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        background: var(--noir);
    }
    .video-wrapper iframe,
    .video-wrapper video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
    .video-wrapper video {
        object-fit: cover;
    }

    .video-info {
        padding: 15px;
    }
    .video-info h3 {
        font-size: 15px;
        color: var(--or);
        margin-bottom: 5px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .video-info p {
        color: var(--gris-clair);
        font-size: 13px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .grid-3 { grid-template-columns: 1fr 1fr; }
        .videos-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
        .grid-3 { grid-template-columns: 1fr; }
        .videos-grid { grid-template-columns: 1fr; }
        .stats-section { grid-template-columns: 1fr 1fr; gap: 15px; }
        .hero { flex-direction: column-reverse; text-align: center; }
        .hero-desc { margin-left: auto; margin-right: auto; }
        .hero-buttons { justify-content: center; }
        .hero-title { font-size: 32px; }
        .hero-image { flex: 0 0 250px; padding: 10px; }
        .hero-logo { max-height: 200px; }
    }
</style>
@endsection
