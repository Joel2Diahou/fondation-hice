@extends('admin.layouts.app')

@section('title', 'Gestion des Programmes')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>📚 Liste des Programmes</h3>
        <a href="{{ route('admin.programmes.create') }}" class="btn btn-orange">➕ Ajouter</a>
    </div>
</div>

<div class="card">
    @if(isset($programmes) && count($programmes) > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programmes as $programme)
            <tr>
                <td>{{ $programme->id }}</td>
                <td>{{ $programme->titre }}</td>
                <td>
                    <span class="badge badge-{{ $programme->statut == 'ouvert' ? 'success' : ($programme->statut == 'ferme' ? 'danger' : 'warning') }}">
                        {{ $programme->statut }}
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('admin.programmes.edit', $programme->id) }}" class="btn btn-gold btn-sm">✏️</a>
                    <form method="POST" action="{{ route('admin.programmes.destroy', $programme->id) }}" onsubmit="return confirm('Supprimer ce programme ?')" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="color: #888; text-align: center;">Aucun programme enregistré</p>
    @endif
</div>
@endsection
