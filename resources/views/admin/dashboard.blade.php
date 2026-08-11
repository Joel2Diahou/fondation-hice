@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <h2>{{ $stats['programmes'] ?? 0 }}</h2>
        <p>📚 Programmes</p>
    </div>
    <div class="stat-card">
        <h2>{{ $stats['actualites'] ?? 0 }}</h2>
        <p>📰 Actualités</p>
    </div>
    <div class="stat-card">
        <h2>{{ $stats['candidatures'] ?? 0 }}</h2>
        <p>📋 Candidatures</p>
    </div>
    <div class="stat-card">
        <h2>{{ $stats['partenaires'] ?? 0 }}</h2>
        <p>🤝 Partenaires</p>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
    <div class="card">
        <h3>⚡ Actions rapides</h3>
        <div style="display: flex; flex-direction: column; gap: 10px; margin-top: 15px;">
            <a href="{{ route('admin.programmes.create') }}" class="btn btn-orange" style="text-align: center;">➕ Ajouter un programme</a>
            <a href="{{ route('admin.actualites.create') }}" class="btn btn-orange" style="text-align: center;">➕ Ajouter une actualité</a>
            <a href="{{ route('admin.partenaires.create') }}" class="btn btn-orange" style="text-align: center;">➕ Ajouter un partenaire</a>
        </div>
    </div>
    <div class="card">
        <h3>📋 Dernières candidatures</h3>
        @if(isset($dernieresCandidatures) && count($dernieresCandidatures) > 0)
            @foreach($dernieresCandidatures as $candidature)
                <div style="padding: 10px; border-bottom: 1px solid #333;">
                    <strong style="color: #FF6B00;">{{ $candidature->nom_complet }}</strong>
                    <span class="badge badge-{{ $candidature->statut == 'en_attente' ? 'warning' : ($candidature->statut == 'valide' ? 'success' : 'danger') }}">
                        {{ $candidature->statut }}
                    </span>
                    <br>
                    <small style="color: #888;">{{ $candidature->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        @else
            <p style="color: #888;">Aucune candidature</p>
        @endif
    </div>
</div>
@endsection
