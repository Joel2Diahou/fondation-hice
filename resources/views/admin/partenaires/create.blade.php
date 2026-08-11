@extends('admin.layouts.app')

@section('title', 'Ajouter un Partenaire')

@section('content')
<div class="card">
    <h3>➕ Ajouter un partenaire</h3>
    <form method="POST" action="{{ route('admin.partenaires.store') }}">
        @csrf

        <div class="form-group">
            <label>Nom *</label>
            <input type="text" name="nom" required>
        </div>

        <div class="form-group">
            <label>Site web</label>
            <input type="url" name="site_web" placeholder="https://exemple.com">
        </div>

        <div class="form-group">
            <label>Description (FR)</label>
            <textarea name="description_fr"></textarea>
        </div>

        <div class="form-group">
            <label>Description (EN)</label>
            <textarea name="description_en"></textarea>
        </div>

        <div class="form-group">
            <label>Type</label>
            <select name="type">
                <option value="partenaire">Partenaire</option>
                <option value="mecene">Mécène</option>
                <option value="sponsor">Sponsor</option>
            </select>
        </div>

        <button type="submit" class="btn btn-orange">💾 Enregistrer</button>
        <a href="{{ route('admin.partenaires.index') }}" class="btn btn-gold">Annuler</a>
    </form>
</div>
@endsection
