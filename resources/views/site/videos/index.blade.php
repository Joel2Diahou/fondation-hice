@extends('layouts.app')

@section('title', 'Vidéos - FONDATION HICE')

@section('content')
<div class="container">
    <div class="videos-hero">
        <h1>🎬 Nos <span>Vidéos</span></h1>
        <p>
            Découvrez nos vidéos : interviews, formations, témoignages et moments forts de la Fondation HICE.
        </p>
    </div>

    @if(isset($videos) && count($videos) > 0)
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
                    <div style="background: var(--noir-secondaire); padding: 60px; text-align: center;">
                        <span style="font-size: 48px;">🎬</span>
                        <p style="color: var(--gris-moyen); margin-top: 10px;">Vidéo non disponible</p>
                    </div>
                @endif
            </div>
            <div class="video-info">
                <h3>{{ $video->titre }}</h3>
                @if($video->description)
                <p>{{ Str::limit($video->description, 100) }}</p>
                @endif
                @if($video->categorie)
                <span class="video-category">{{ $video->categorie }}</span>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p style="color: var(--gris-moyen); text-align: center; padding: 40px 0;">Aucune vidéo disponible pour le moment.</p>
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

    .videos-hero {
        text-align: center;
        padding: 40px 0 20px;
    }
    .videos-hero h1 {
        font-size: 40px;
        font-weight: 800;
        color: var(--blanc);
    }
    .videos-hero h1 span {
        color: var(--or);
    }
    .videos-hero p {
        font-size: 17px;
        color: var(--gris-clair);
        max-width: 500px;
        margin: 10px auto 0;
        line-height: 1.7;
    }

    .videos-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin: 30px 0 50px;
    }

    .video-card {
        background: var(--noir-secondaire);
        border-radius: 16px;
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
    .video-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
    .video-wrapper video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .video-info {
        padding: 20px;
    }
    .video-info h3 {
        font-size: 18px;
        color: var(--or);
        margin-bottom: 8px;
    }
    .video-info p {
        color: var(--gris-clair);
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 10px;
    }
    .video-category {
        display: inline-block;
        background: rgba(255,255,255,0.05);
        padding: 4px 14px;
        border-radius: 20px;
        font-size: 12px;
        color: var(--gris-moyen);
        border: 1px solid rgba(255,255,255,0.05);
    }

    @media (max-width: 992px) {
        .videos-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
        .videos-grid { grid-template-columns: 1fr; }
        .videos-hero h1 { font-size: 30px; }
    }
</style>
@endsection
