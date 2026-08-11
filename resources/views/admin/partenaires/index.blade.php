@extends('admin.layouts.app')

@section('title', 'Gestion des Partenaires')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>🤝 Liste des Partenaires</h3>
        <a href="{{ route('admin.partenaires.create') }}" class="btn btn-orange">➕ Ajouter</a>
    </div>
</div>

<div class="card">
    @if(isset($partenaires) && count($partenaires) > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partenaires as $partenaire)
            <tr>
                <td>{{ $partenaire->id }}</td>
                <td>{{ $partenaire->nom }}</td>
                <td>
                    <span class="badge badge-info">{{ $partenaire->type }}</span>
                </td>
                <td class="actions">
                    <a href="{{ route('admin.partenaires.edit', $partenaire->id) }}" class="btn btn-gold btn-sm">✏️</a>
                    <form method="POST" action="{{ route('admin.partenaires.destroy', $partenaire->id) }}" onsubmit="return confirm('Supprimer ce partenaire ?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="color: #888; text-align: center;">Aucun partenaire</p>
    @endif
</div>
@endsection
