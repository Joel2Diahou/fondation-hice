@extends('admin.layouts.app')

@section('title', 'Ajouter une Actualité - FONDATION HICE')

@section('content')
<div class="card">
    <h3>➕ Ajouter une actualité</h3>
    <p style="color: #888; margin-bottom: 20px;">
        Remplissez le formulaire ci-dessous pour créer une nouvelle actualité.
    </p>

    <form method="POST" action="{{ route('admin.actualites.store') }}">
        @csrf

        <div class="form-group">
            <label>Titre *</label>
            <input type="text" name="titre" required placeholder="Titre de l'actualité">
        </div>

        <div class="form-group">
            <label>Contenu *</label>
            <textarea name="contenu" rows="6" required placeholder="Rédigez le contenu de l'actualité..."></textarea>
        </div>

        <div class="form-group">
            <label>Catégorie</label>
            <input type="text" name="categorie" placeholder="Ex: Événement, Programme, Témoignage">
        </div>

        <div class="form-group">
            <label>Auteur</label>
            <input type="text" name="auteur" placeholder="Nom de l'auteur">
        </div>

        <div class="form-group">
            <label>Date de publication</label>
            <input type="date" name="date_publication">
        </div>

        <div class="form-group">
            <label>Publier ?</label>
            <select name="est_publie">
                <option value="1">✅ Oui, publier</option>
                <option value="0" selected>⏳ Garder en brouillon</option>
            </select>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 10px;">
            <button type="submit" class="btn btn-orange">💾 Enregistrer</button>
            <a href="{{ route('admin.actualites.index') }}" class="btn btn-gold">Annuler</a>
        </div>
    </form>
</div>
@endsection
