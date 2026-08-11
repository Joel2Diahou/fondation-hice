@extends('admin.layouts.app')

@section('title', 'Détail Candidature')

@section('content')
<div class="card">
    <h3>👤 Détail de la candidature</h3>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 20px;">
        <div>
            <p><strong style="color: #D4AF37;">Nom :</strong> {{ $candidature->nom_complet }}</p>
            <p><strong style="color: #D4AF37;">Email :</strong> {{ $candidature->email }}</p>
            <p><strong style="color: #D4AF37;">Téléphone :</strong> {{ $candidature->telephone ?? 'Non renseigné' }}</p>
            <p><strong style="color: #D4AF37;">Âge :</strong> {{ $candidature->age ?? 'Non renseigné' }}</p>
            <p><strong style="color: #D4AF37;">Ville :</strong> {{ $candidature->ville ?? 'Non renseigné' }}</p>
        </div>
        <div>
            <p><strong style="color: #D4AF37;">Programme :</strong> {{ $candidature->programme->titre_fr ?? 'N/A' }}</p>
            <p><strong style="color: #D4AF37;">Statut :</strong>
                <span class="badge badge-{{ $candidature->statut == 'en_attente' ? 'warning' : ($candidature->statut == 'valide' ? 'success' : 'danger') }}">
                    {{ $candidature->statut }}
                </span>
            </p>
            <p><strong style="color: #D4AF37;">Date :</strong> {{ $candidature->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
    <div style="margin-top: 20px;">
        <h4 style="color: #FF6B00;">Motivation</h4>
        <p style="color: #ccc; background: #0A0A0A; padding: 15px; border-radius: 8px;">{{ $candidature->motivation_fr }}</p>
    </div>

    <div style="margin-top: 30px; display: flex; gap: 15px;">
        <form method="POST" action="{{ route('admin.candidatures.statut', $candidature->id) }}">
            @csrf @method('PUT')
            <select name="statut" style="padding: 10px; border-radius: 8px; background: #0A0A0A; color: white; border: 1px solid #333;">
                <option value="en_attente" {{ $candidature->statut == 'en_attente' ? 'selected' : '' }}>En attente</option>
                <option value="valide" {{ $candidature->statut == 'valide' ? 'selected' : '' }}>Valider</option>
                <option value="entretien" {{ $candidature->statut == 'entretien' ? 'selected' : '' }}>Entretien</option>
                <option value="rejete" {{ $candidature->statut == 'rejete' ? 'selected' : '' }}>Rejeter</option>
            </select>
            <button type="submit" class="btn btn-orange">Mettre à jour</button>
        </form>
        <a href="{{ route('admin.candidatures.index') }}" class="btn btn-gold">Retour</a>
    </div>
</div>
@endsection
