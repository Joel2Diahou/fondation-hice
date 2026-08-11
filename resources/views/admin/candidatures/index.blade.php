@extends('admin.layouts.app')

@section('title', 'Gestion des Candidatures')

@section('content')
<div class="card">
    <h3>📋 Liste des Candidatures</h3>
</div>

<div class="card">
    @if(isset($candidatures) && count($candidatures) > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Programme</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($candidatures as $candidature)
            <tr>
                <td>{{ $candidature->id }}</td>
                <td>{{ $candidature->nom_complet }}</td>
                <td>{{ $candidature->email }}</td>
                <td>{{ $candidature->programme->titre_fr ?? 'N/A' }}</td>
                <td>
                    <span class="badge badge-{{ $candidature->statut == 'en_attente' ? 'warning' : ($candidature->statut == 'valide' ? 'success' : 'danger') }}">
                        {{ $candidature->statut }}
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('admin.candidatures.show', $candidature->id) }}" class="btn btn-gold btn-sm">👁️</a>
                    <form method="POST" action="{{ route('admin.candidatures.destroy', $candidature->id) }}" onsubmit="return confirm('Supprimer cette candidature ?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="color: #888; text-align: center;">Aucune candidature</p>
    @endif
</div>
@endsection
