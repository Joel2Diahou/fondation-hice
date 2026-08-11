@extends('layouts.app')

@section('title', 'Détail Actualité - FONDATION HICE')

@section('content')
<div class="container">
    @if(isset($actualite))
    <div style="margin: 40px 0;">
        <a href="/actualites" style="color: var(--or); text-decoration: none;">← Retour aux actualités</a>

        <h1 style="color: var(--or); margin: 20px 0; font-size: 36px;">{{ $actualite->titre }}</h1>
        <p style="color: var(--gris-moyen); font-size: 14px;">
            {{ $actualite->created_at->format('d/m/Y') }}
            @if($actualite->auteur)
            | Par {{ $actualite->auteur }}
            @endif
            @if($actualite->categorie)
            | <span style="background: rgba(255,255,255,0.05); padding: 2px 12px; border-radius: 20px; color: var(--gris-moyen); border: 1px solid rgba(255,255,255,0.05);">{{ $actualite->categorie }}</span>
            @endif
        </p>

        <div style="background: var(--noir-secondaire); padding: 30px; border-radius: 16px; border: 1px solid rgba(255,255,255,0.05); box-shadow: 0 4px 20px rgba(0,0,0,0.3); margin-top: 20px;">
            <p style="color: var(--gris-clair); font-size: 17px; line-height: 1.9;">{{ $actualite->contenu }}</p>
        </div>
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
</style>
@endsection
