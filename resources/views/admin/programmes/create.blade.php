@extends('admin.layouts.app')

@section('title', 'Ajouter un Programme')

@section('content')
<div class="card">
    <h3>➕ Ajouter un programme</h3>
    <form method="POST" action="{{ route('admin.programmes.store') }}">
        @csrf

        <div class="form-group">
            <label>Titre *</label>
            <input type="text" name="titre" required placeholder="Titre du programme">
        </div>

        <div class="form-group">
            <label>Description *</label>
            <textarea name="description" rows="4" required placeholder="Description du programme"></textarea>
        </div>

        <div class="form-group">
            <label>Objectifs</label>
            <textarea name="objectifs" rows="3" placeholder="Objectifs du programme"></textarea>
        </div>

        <div class="form-group">
            <label>Durée</label>
            <input type="text" name="duree" placeholder="Ex: 3 mois">
        </div>

        <div class="form-group">
            <label>Public cible</label>
            <input type="text" name="public_cible" placeholder="Ex: Jeunes de 18-35 ans">
        </div>

        <div class="form-group">
            <label>Date de début</label>
            <input type="date" name="date_debut">
        </div>

        <div class="form-group">
            <label>Date de fin</label>
            <input type="date" name="date_fin">
        </div>

        <div class="form-group">
            <label>Statut</label>
            <select name="statut">
                <option value="a_venir">À venir</option>
                <option value="ouvert">Ouvert</option>
                <option value="ferme">Fermé</option>
            </select>
        </div>

        <button type="submit" class="btn btn-orange">💾 Enregistrer</button>
        <a href="{{ route('admin.programmes.index') }}" class="btn btn-gold">Annuler</a>
    </form>
</div>
@endsection
