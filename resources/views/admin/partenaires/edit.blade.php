@extends('admin.layouts.app')

@section('title', 'Modifier un Partenaire')

@section('content')
<div class="card">
    <h3>✏️ Modifier le partenaire</h3>
    <form method="POST" action="{{ route('admin.partenaires.update', $partenaire->id) }}">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Nom *</label>
            <input type="text" name="nom" value="{{ $partenaire->nom }}" required>
        </div>

        <div class="form-group">
            <label>Site web</label>
            <input type="url" name="site_web" value="{{ $partenaire->site_web }}" placeholder="https://exemple.com">
        </div>

        <div class="form-group">
            <label>Description (FR)</label>
            <textarea name="description_fr">{{ $partenaire->description_fr }}</textarea>
        </div>

        <div class="form-group">
            <label>Description (EN)</label>
            <textarea name="description_en">{{ $partenaire->description_en }}</textarea>
        </div>

        <div class="form-group">
            <label>Type</label>
            <select name="type">
                <option value="partenaire" {{ $partenaire->type == 'partenaire' ? 'selected' : '' }}>Partenaire</option>
                <option value="mecene" {{ $partenaire->type == 'mecene' ? 'selected' : '' }}>Mécène</option>
                <option value="sponsor" {{ $partenaire->type == 'sponsor' ? 'selected' : '' }}>Sponsor</option>
            </select>
        </div>

        <button type="submit" class="btn btn-orange">💾 Mettre à jour</button>
        <a href="{{ route('admin.partenaires.index') }}" class="btn btn-gold">Annuler</a>
    </form>
</div>
@endsection
