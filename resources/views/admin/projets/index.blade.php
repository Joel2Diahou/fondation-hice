@extends('admin.layouts.app')

@section('title', 'Gestion des Projets')

@section('content')
<div class="card">
    <h3>🚀 Liste des Projets</h3>
</div>

<div class="card">
    @if(isset($projets) && count($projets) > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Projet</th>
                <th>Catégorie</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projets as $projet)
            <tr>
                <td>{{ $projet->id }}</td>
                <td>{{ $projet->nom_complet }}</td>
                <td>{{ $projet->email }}</td>
                <td>{{ $projet->nom_projet }}</td>
                <td>
                    <span class="badge badge-info">
                        @if($projet->categorie == 'college') 🏫 Collège
                        @elseif($projet->categorie == 'lycee') 📚 Lycée
                        @else 🎓 Université
                        @endif
                    </span>
                </td>
                <td>
                    <span class="badge badge-{{ $projet->statut == 'en_attente' ? 'warning' : ($projet->statut == 'valide' ? 'success' : 'danger') }}">
                        {{ $projet->statut }}
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('admin.projets.show', $projet->id) }}" class="btn btn-gold btn-sm">👁️</a>
                    <form method="POST" action="{{ route('admin.projets.destroy', $projet->id) }}" onsubmit="return confirm('Supprimer ce projet ?')" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="color: #888; text-align: center;">Aucun projet soumis</p>
    @endif
</div>
@endsection
