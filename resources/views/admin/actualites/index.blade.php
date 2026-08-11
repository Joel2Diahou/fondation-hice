@extends('admin.layouts.app')

@section('title', 'Gestion des Actualités')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>📰 Liste des Actualités</h3>
        <a href="{{ route('admin.actualites.create') }}" class="btn btn-orange">➕ Ajouter</a>
    </div>
</div>

<div class="card">
    @if(isset($actualites) && count($actualites) > 0)
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
            @foreach($actualites as $actualite)
            <tr>
                <td>{{ $actualite->id }}</td>
                <td>{{ $actualite->titre }}</td>
                <td>
                    @if($actualite->categorie)
                    <span class="badge badge-info">{{ $actualite->categorie }}</span>
                    @else
                    <span style="color: #888;">-</span>
                    @endif
                </td>
                <td>
                    <span class="badge badge-{{ $actualite->est_publie ? 'success' : 'warning' }}">
                        {{ $actualite->est_publie ? '✅ Publié' : '⏳ Brouillon' }}
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('admin.actualites.edit', $actualite->id) }}" class="btn btn-gold btn-sm">✏️</a>
                    <form method="POST" action="{{ route('admin.actualites.destroy', $actualite->id) }}" onsubmit="return confirm('Supprimer cette actualité ?')" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="color: #888; text-align: center;">Aucune actualité</p>
    @endif
</div>
@endsection
