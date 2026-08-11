@extends('admin.layouts.app')

@section('title', 'Modifier une Actualité')

@section('content')
<div class="card">
    <h3>✏️ Modifier l'actualité</h3>
    <form method="POST" action="{{ route('admin.actualites.update', $actualite->id) }}">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Titre *</label>
            <input type="text" name="titre" value="{{ $actualite->titre }}" required>
        </div>

        <div class="form-group">
            <label>Contenu *</label>
            <textarea name="contenu" rows="6" required>{{ $actualite->contenu }}</textarea>
        </div>

        <div class="form-group">
            <label>Catégorie</label>
            <input type="text" name="categorie" value="{{ $actualite->categorie }}" placeholder="Ex: Événement, Programme, Témoignage">
        </div>

        <div class="form-group">
            <label>Auteur</label>
            <input type="text" name="auteur" value="{{ $actualite->auteur }}" placeholder="Nom de l'auteur">
        </div>

        <div class="form-group">
            <label>Date de publication</label>
            <input type="date" name="date_publication" value="{{ $actualite->date_publication }}">
        </div>

        <div class="form-group">
            <label>Publier ?</label>
            <select name="est_publie">
                <option value="1" {{ $actualite->est_publie ? 'selected' : '' }}>✅ Oui, publier</option>
                <option value="0" {{ !$actualite->est_publie ? 'selected' : '' }}>⏳ Garder en brouillon</option>
            </select>
        </div>

        <button type="submit" class="btn btn-orange">💾 Mettre à jour</button>
        <a href="{{ route('admin.actualites.index') }}" class="btn btn-gold">Annuler</a>
    </form>
</div>
@endsection
