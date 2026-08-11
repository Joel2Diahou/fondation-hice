@extends('layouts.app')

@section('title', 'Candidature - EMPIRE HICE')

@section('content')
<div class="container">
    <div style="max-width: 700px; margin: 40px auto;">
        <h1 style="color: #D4AF37; text-align: center;">Candidature</h1>
        <p style="text-align: center; color: #ccc; margin-bottom: 30px;">
            Pour le programme : <strong style="color: #FF6B00;">{{ $programme->titre_fr ?? 'Non spécifié' }}</strong>
        </p>

        <form method="POST" action="/programmes/{{ $programme->id }}/postuler" style="background: #1A1A1A; padding: 30px; border-radius: 12px; border: 1px solid #333;">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="color: #D4AF37; display: block; margin-bottom: 5px;">Nom complet *</label>
                <input type="text" name="nom_complet" required style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #333; background: #0A0A0A; color: white;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="color: #D4AF37; display: block; margin-bottom: 5px;">Email *</label>
                <input type="email" name="email" required style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #333; background: #0A0A0A; color: white;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="color: #D4AF37; display: block; margin-bottom: 5px;">Téléphone</label>
                <input type="text" name="telephone" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #333; background: #0A0A0A; color: white;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="color: #D4AF37; display: block; margin-bottom: 5px;">Âge</label>
                <input type="number" name="age" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #333; background: #0A0A0A; color: white;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="color: #D4AF37; display: block; margin-bottom: 5px;">Ville</label>
                <input type="text" name="ville" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #333; background: #0A0A0A; color: white;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="color: #D4AF37; display: block; margin-bottom: 5px;">Motivation *</label>
                <textarea name="motivation_fr" required rows="5" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #333; background: #0A0A0A; color: white;"></textarea>
            </div>

            <button type="submit" style="background: #FF6B00; color: white; padding: 15px 40px; border: none; border-radius: 8px; font-size: 18px; cursor: pointer; width: 100%;">
                Envoyer ma candidature
            </button>
        </form>
    </div>
</div>
@endsection
