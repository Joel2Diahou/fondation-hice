@extends('admin.layouts.app')

@section('title', 'Gestion des Vidéos - FONDATION HICE')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>🎬 Liste des Vidéos</h3>
        <a href="{{ route('admin.videos.create') }}" class="btn btn-orange">➕ Ajouter une vidéo</a>
    </div>
</div>

<div class="card">
    @if(isset($videos) && count($videos) > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Publié</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
            <tr>
                <td>{{ $video->id }}</td>
                <td>{{ $video->titre }}</td>
                <td>
                    @if($video->categorie)
                    <span class="badge badge-info">{{ $video->categorie }}</span>
                    @else
                    <span style="color: #888;">-</span>
                    @endif
                </td>
                <td>
                    <span class="badge badge-{{ $video->est_publie ? 'success' : 'warning' }}">
                        {{ $video->est_publie ? '✅ Publié' : '⏳ Brouillon' }}
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-gold btn-sm">✏️</a>
                    <form method="POST" action="{{ route('admin.videos.destroy', $video->id) }}" onsubmit="return confirm('Supprimer cette vidéo ?')" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="color: #888; text-align: center;">Aucune vidéo ajoutée.</p>
    @endif
</div>
@endsection
