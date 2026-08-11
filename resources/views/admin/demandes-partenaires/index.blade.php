@extends('admin.layouts.app')

@section('title', 'Demandes de Partenariat')

@section('content')
<div class="card">
    <h3>📋 Demandes de Partenariat</h3>
</div>

<div class="card">
    @if(isset($demandes) && count($demandes) > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Entreprise</th>
                <th>Contact</th>
                <th>Type</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandes as $demande)
            <tr>
                <td>{{ $demande->id }}</td>
                <td>{{ $demande->entreprise }}</td>
                <td>{{ $demande->nom_contact }}</td>
                <td>
                    <span class="badge badge-info">
                        @if($demande->type_partenariat == 'partenaire') 🤝 Partenaire
                        @elseif($demande->type_partenariat == 'sponsor') 💰 Sponsor
                        @elseif($demande->type_partenariat == 'mecene') 🎁 Mécène
                        @else 📌 Autre
                        @endif
                    </span>
                </td>
                <td>
                    <span class="badge badge-{{ $demande->traite ? 'success' : 'warning' }}">
                        {{ $demande->traite ? '✅ Traité' : '⏳ En attente' }}
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('admin.demandes-partenaires.show', $demande->id) }}" class="btn btn-gold btn-sm">👁️</a>
                    @if(!$demande->traite)
                    <form method="POST" action="{{ route('admin.demandes-partenaires.traite', $demande->id) }}" style="display:inline;">
                        @csrf @method('PUT')
                        <button type="submit" class="btn btn-success btn-sm">✅</button>
                    </form>
                    @endif
                    <form method="POST" action="{{ route('admin.demandes-partenaires.destroy', $demande->id) }}" onsubmit="return confirm('Supprimer cette demande ?')" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="color: #888; text-align: center;">Aucune demande de partenariat</p>
    @endif
</div>
@endsection
