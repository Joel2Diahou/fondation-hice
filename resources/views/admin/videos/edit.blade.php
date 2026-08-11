@extends('admin.layouts.app')

@section('title', 'Modifier une Vidéo - FONDATION HICE')

@section('content')
<div class="card">
    <h3>✏️ Modifier la vidéo</h3>

    <form method="POST" action="{{ route('admin.videos.update', $video->id) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Titre *</label>
            <input type="text" name="titre" value="{{ $video->titre }}" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label>Lien YouTube / Vimeo</label>
                <input type="url" name="url" value="{{ $video->url }}" placeholder="https://www.youtube.com/watch?v=...">
                <small style="color: #888;">Collez un lien YouTube ou Vimeo</small>
            </div>

            <div class="form-group">
                <label>OU Uploader un fichier</label>
                <input type="file" name="fichier" accept="video/*">
                <small style="color: #888;">Formats: MP4, WebM, OGG, AVI, MOV (Max 100MB)</small>
                @if($video->fichier)
                <p style="color: #28a745; margin-top: 5px;">✅ Fichier actuel : {{ basename($video->fichier) }}</p>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="3">{{ $video->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Catégorie</label>
            <input type="text" name="categorie" value="{{ $video->categorie }}" placeholder="Ex: Interview, Formation, Témoignage">
        </div>

        <div class="form-group">
            <label>URL de la miniature</label>
            <input type="url" name="thumbnail" value="{{ $video->thumbnail }}" placeholder="https://...image.jpg">
        </div>

        <div class="form-group">
            <label>Publier ?</label>
            <select name="est_publie">
                <option value="1" {{ $video->est_publie ? 'selected' : '' }}>✅ Oui, publier</option>
                <option value="0" {{ !$video->est_publie ? 'selected' : '' }}>⏳ Garder en brouillon</option>
            </select>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 10px;">
            <button type="submit" class="btn btn-orange">💾 Mettre à jour</button>
            <a href="{{ route('admin.videos.index') }}" class="btn btn-gold">Annuler</a>
        </div>
    </form>
</div>
@endsection
