@extends('admin.layouts.app')

@section('title', 'Gestion des Demandes')

@section('content')
<div class="card">
    <h3>📩 Liste des Demandes</h3>
</div>

<div class="card">
    @if(isset($demandes) && count($demandes) > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Traité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandes as $demande)
            <tr>
                <td>{{ $demande->id }}</td>
                <td><span class="badge badge-info">{{ $demande->type }}</span></td>
                <td>{{ $demande->nom }}</td>
                <td>{{ $demande->email }}</td>
                <td>
                    <span class="badge badge-{{ $demande->traite ? 'success' : 'warning' }}">
                        {{ $demande->traite ? '✅ Traité' : '⏳ En attente' }}
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('admin.demandes.show', $demande->id) }}" class="btn btn-gold btn-sm">👁️</a>
                    @if(!$demande->traite)
                    <form method="POST" action="{{ route('admin.demandes.traite', $demande->id) }}" style="display:inline;">
                        @csrf @method('PUT')
                        <button type="submit" class="btn btn-success btn-sm">✅</button>
                    </form>
                    @endif
                    <form method="POST" action="{{ route('admin.demandes.destroy', $demande->id) }}" onsubmit="return confirm('Supprimer cette demande ?')" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="color: #888; text-align: center;">Aucune demande</p>
    @endif
</div>
@endsection
