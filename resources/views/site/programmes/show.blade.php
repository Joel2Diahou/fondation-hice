@extends('layouts.app')

@section('title', 'Détails du Programme - FONDATION HICE')

@section('content')
<div class="container">
    @if(isset($programme))
    <div style="margin: 40px 0;">
        <a href="/programmes" style="color: var(--or); text-decoration: none;">← Retour aux programmes</a>

        <h1 style="color: var(--or); margin: 20px 0; font-size: 36px;">{{ $programme->titre }}</h1>

        <div style="background: var(--noir-secondaire); padding: 30px; border-radius: 16px; border: 1px solid rgba(255,255,255,0.05); box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
            <p style="color: var(--gris-clair); font-size: 17px; line-height: 1.8;">{{ $programme->description }}</p>

            @if($programme->objectifs)
            <h3 style="color: var(--orange); margin-top: 30px;">🎯 Objectifs</h3>
            <p style="color: var(--gris-clair); line-height: 1.8;">{{ $programme->objectifs }}</p>
            @endif

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 30px;">
                @if($programme->duree)
                <div style="background: var(--noir); padding: 15px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.05);">
                    <span style="color: var(--or);">⏱️ Durée :</span>
                    <span style="color: var(--gris-clair);">{{ $programme->duree }}</span>
                </div>
                @endif

                @if($programme->public_cible)
                <div style="background: var(--noir); padding: 15px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.05);">
                    <span style="color: var(--or);">🎯 Public cible :</span>
                    <span style="color: var(--gris-clair);">{{ $programme->public_cible }}</span>
                </div>
                @endif
            </div>

            @if($programme->statut == 'ouvert')
            <div style="margin-top: 30px; text-align: center;">
                <a href="/programmes/{{ $programme->id }}/candidature"
                   style="background: var(--orange); color: white; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-size: 18px; display: inline-block; box-shadow: 0 4px 15px rgba(230, 126, 34, 0.3); transition: 0.3s;">
                    🚀 Postuler maintenant
                </a>
            </div>
            @else
            <div style="margin-top: 30px; text-align: center; color: #dc3545; font-size: 18px;">
                ⚠️ Ce programme n'est pas ouvert aux candidatures
            </div>
            @endif
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
