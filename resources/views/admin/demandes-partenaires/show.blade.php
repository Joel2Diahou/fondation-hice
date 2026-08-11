@extends('admin.layouts.app')

@section('title', 'Détail Demande Partenariat')

@section('content')
<div class="card">
    <h3>📋 Détail de la demande</h3>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 20px;">
        <div>
            <p><strong style="color: #D4AF37;">Entreprise :</strong> {{ $demande->entreprise }}</p>
            <p><strong style="color: #D4AF37;">Contact :</strong> {{ $demande->nom_contact }}</p>
            <p><strong style="color: #D4AF37;">Email :</strong> {{ $demande->email }}</p>
            <p><strong style="color: #D4AF37;">Téléphone :</strong> {{ $demande->telephone }}</p>
            <p><strong style="color: #D4AF37;">Ville :</strong> {{ $demande->ville }}</p>
        </div>
        <div>
            <p><strong style="color: #D4AF37;">Type de partenariat :</strong>
                <span class="badge badge-info">
                    @if($demande->type_partenariat == 'partenaire') 🤝 Partenaire
                    @elseif($demande->type_partenariat == 'sponsor') 💰 Sponsor
                    @elseif($demande->type_partenariat == 'mecene') 🎁 Mécène
                    @else 📌 Autre
                    @endif
                </span>
            </p>
            <p><strong style="color: #D4AF37;">Statut :</strong>
                <span class="badge badge-{{ $demande->traite ? 'success' : 'warning' }}">
                    {{ $demande->traite ? '✅ Traité' : '⏳ En attente' }}
                </span>
            </p>
            <p><strong style="color: #D4AF37;">Date :</strong> {{ $demande->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div style="margin-top: 20px;">
        <h4 style="color: #FF6B00;">📝 Message</h4>
        <p style="color: #444; background: #f8f5f0; padding: 15px; border-radius: 8px;">{{ $demande->message }}</p>
    </div>

    <div style="margin-top: 30px; display: flex; gap: 15px;">
        @if(!$demande->traite)
        <form method="POST" action="{{ route('admin.demandes-partenaires.traite', $demande->id) }}">
            @csrf @method('PUT')
            <button type="submit" class="btn btn-success">✅ Marquer comme traité</button>
        </form>
        @endif
        <a href="{{ route('admin.demandes-partenaires.index') }}" class="btn btn-gold">Retour</a>
    </div>
</div>
@endsection
