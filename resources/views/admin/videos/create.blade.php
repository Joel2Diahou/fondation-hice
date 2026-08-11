@extends('admin.layouts.app')

@section('title', 'Ajouter une Vidéo - FONDATION HICE')

@section('content')
<div class="card">
    <h3>🎬 Ajouter une vidéo</h3>
    <p style="color: #888; margin-bottom: 20px;">
        Vous pouvez soit <strong>coller un lien</strong> (YouTube, Vimeo), soit <strong>uploader un fichier</strong> depuis votre appareil.
    </p>

    <form method="POST" action="{{ route('admin.videos.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Titre *</label>
            <input type="text" name="titre" required placeholder="Titre de la vidéo">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label>Lien YouTube / Vimeo</label>
                <input type="url" name="url" placeholder="https://www.youtube.com/watch?v=...">
                <small style="color: #888;">Collez un lien YouTube ou Vimeo</small>
            </div>

            <div class="form-group">
                <label>OU Uploader un fichier</label>
                <input type="file" name="fichier" accept="video/*">
                <small style="color: #888;">Formats: MP4, WebM, OGG, AVI, MOV (Max 100MB)</small>
            </div>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="3" placeholder="Description de la vidéo"></textarea>
        </div>

        <div class="form-group">
            <label>Catégorie</label>
            <input type="text" name="categorie" placeholder="Ex: Interview, Formation, Témoignage">
        </div>

        <div class="form-group">
            <label>URL de la miniature (optionnel)</label>
            <input type="url" name="thumbnail" placeholder="https://...image.jpg">
            <small style="color: #888;">Laissez vide pour utiliser la miniature YouTube automatique</small>
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
            <a href="{{ route('admin.videos.index') }}" class="btn btn-gold">Annuler</a>
        </div>
    </form>
</div>
@endsection
