@extends('admin.layouts.app')

@section('title', 'Modifier un Programme')

@section('content')
<div class="card">
    <h3>✏️ Modifier le programme</h3>
    <form method="POST" action="{{ route('admin.programmes.update', $programme->id) }}">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Titre *</label>
            <input type="text" name="titre" value="{{ $programme->titre }}" required>
        </div>

        <div class="form-group">
            <label>Description *</label>
            <textarea name="description" rows="4" required>{{ $programme->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Objectifs</label>
            <textarea name="objectifs" rows="3">{{ $programme->objectifs }}</textarea>
        </div>

        <div class="form-group">
            <label>Durée</label>
            <input type="text" name="duree" value="{{ $programme->duree }}" placeholder="Ex: 3 mois">
        </div>

        <div class="form-group">
            <label>Public cible</label>
            <input type="text" name="public_cible" value="{{ $programme->public_cible }}" placeholder="Ex: Jeunes de 18-35 ans">
        </div>

        <div class="form-group">
            <label>Date de début</label>
            <input type="date" name="date_debut" value="{{ $programme->date_debut }}">
        </div>

        <div class="form-group">
            <label>Date de fin</label>
            <input type="date" name="date_fin" value="{{ $programme->date_fin }}">
        </div>

        <div class="form-group">
            <label>Statut</label>
            <select name="statut">
                <option value="a_venir" {{ $programme->statut == 'a_venir' ? 'selected' : '' }}>À venir</option>
                <option value="ouvert" {{ $programme->statut == 'ouvert' ? 'selected' : '' }}>Ouvert</option>
                <option value="ferme" {{ $programme->statut == 'ferme' ? 'selected' : '' }}>Fermé</option>
            </select>
        </div>

        <button type="submit" class="btn btn-orange">💾 Mettre à jour</button>
        <a href="{{ route('admin.programmes.index') }}" class="btn btn-gold">Annuler</a>
    </form>
</div>
@endsection
