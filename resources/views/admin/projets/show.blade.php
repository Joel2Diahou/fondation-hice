@extends('admin.layouts.app')

@section('title', 'Détail du Projet - FONDATION HICE')

@section('content')
<div class="card">
    <h3>📋 Détail du projet</h3>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 20px;">
        <div>
            <p><strong style="color: #D4AF37;">Nom :</strong> {{ $projet->nom_complet }}</p>
            <p><strong style="color: #D4AF37;">Email :</strong> {{ $projet->email }}</p>
            <p><strong style="color: #D4AF37;">Téléphone :</strong> {{ $projet->telephone }}</p>
            <p><strong style="color: #D4AF37;">Ville :</strong> {{ $projet->ville }}</p>
            <p><strong style="color: #D4AF37;">Établissement :</strong> {{ $projet->etablissement }}</p>
            <p><strong style="color: #D4AF37;">Classe/Niveau :</strong> {{ $projet->classe_niveau }}</p>
        </div>
        <div>
            <p><strong style="color: #D4AF37;">Catégorie :</strong>
                <span class="badge badge-info">
                    @if($projet->categorie == 'college') 🏫 Collège
                    @elseif($projet->categorie == 'lycee') 📚 Lycée
                    @else 🎓 Université
                    @endif
                </span>
            </p>
            <p><strong style="color: #D4AF37;">Statut :</strong>
                <span class="badge badge-{{ $projet->statut == 'en_attente' ? 'warning' : ($projet->statut == 'valide' ? 'success' : 'danger') }}">
                    {{ $projet->statut }}
                </span>
            </p>
            <p><strong style="color: #D4AF37;">Date de soumission :</strong> {{ $projet->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div style="margin-top: 30px;">
        <h4 style="color: #FF6B00;">📌 Nom du projet</h4>
        <p style="color: #ccc; background: #0A0A0A; padding: 15px; border-radius: 8px; border: 1px solid #333;">{{ $projet->nom_projet }}</p>

        <h4 style="color: #FF6B00; margin-top: 20px;">📝 Description du projet</h4>
        <p style="color: #ccc; background: #0A0A0A; padding: 15px; border-radius: 8px; border: 1px solid #333;">{{ $projet->description_projet }}</p>

        <h4 style="color: #FF6B00; margin-top: 20px;">🎯 Objectifs</h4>
        <p style="color: #ccc; background: #0A0A0A; padding: 15px; border-radius: 8px; border: 1px solid #333;">{{ $projet->objectifs }}</p>

        @if($projet->besoins)
        <h4 style="color: #FF6B00; margin-top: 20px;">💡 Besoins</h4>
        <p style="color: #ccc; background: #0A0A0A; padding: 15px; border-radius: 8px; border: 1px solid #333;">{{ $projet->besoins }}</p>
        @endif
    </div>

    <!-- ===== GESTION DU STATUT ===== -->
    <div style="margin-top: 30px; display: flex; gap: 15px; flex-wrap: wrap; align-items: center; border-top: 1px solid #333; padding-top: 20px;">
        <form method="POST" action="{{ route('admin.projets.statut', $projet->id) }}" style="display: flex; gap: 10px; flex-wrap: wrap; align-items: center;">
            @csrf @method('PUT')
            <label style="font-weight: 600; color: #D4AF37;">Changer le statut :</label>
            <select name="statut" style="padding: 10px; border-radius: 8px; background: #0A0A0A; border: 2px solid #444; color: white;">
                <option value="en_attente" {{ $projet->statut == 'en_attente' ? 'selected' : '' }}>⏳ En attente</option>
                <option value="valide" {{ $projet->statut == 'valide' ? 'selected' : '' }}>✅ Validé</option>
                <option value="entretien" {{ $projet->statut == 'entretien' ? 'selected' : '' }}>📞 Entretien</option>
                <option value="rejete" {{ $projet->statut == 'rejete' ? 'selected' : '' }}>❌ Rejeté</option>
            </select>
            <button type="submit" class="btn btn-orange">Mettre à jour</button>
        </form>
        <a href="{{ route('admin.projets.index') }}" class="btn btn-gold">Retour</a>
    </div>
</div>

<!-- ============================================================ -->
<!-- ===== ENVOYER UNE NOTIFICATION PAR EMAIL ===== -->
<!-- ============================================================ -->
<div class="card" style="margin-top: 30px; border: 2px solid #D4AF37;">
    <h3 style="color: #D4AF37;">📨 Envoyer une notification par email</h3>
    <p style="color: #888; margin-bottom: 15px;">
        Envoyer un message au candidat par email.
    </p>

    <form method="POST" action="{{ route('admin.projets.notifier', $projet->id) }}">
        @csrf

        <!-- Afficher le destinataire -->
        <div style="background: #0A0A0A; padding: 10px 15px; border-radius: 8px; margin-bottom: 15px; border: 1px solid #333;">
            <strong style="color: #D4AF37;">📧 Destinataire :</strong>
            <span style="color: #FFFFFF; font-weight: 600;">{{ $projet->email }}</span>
        </div>

        <div class="form-group">
            <label>Sujet de l'email</label>
            <input type="text" name="sujet" placeholder="Sujet de l'email" value="Mise à jour de votre projet">
        </div>

        <div class="form-group">
            <label>Message *</label>
            <textarea name="message" rows="4" required placeholder="Votre message pour le candidat..."></textarea>
        </div>

        <button type="submit" class="btn btn-orange" style="padding: 12px 30px;">
            📨 Envoyer l'email
        </button>
    </form>
</div>

<!-- ============================================================ -->
<!-- ===== HISTORIQUE DES NOTIFICATIONS ===== -->
<!-- ============================================================ -->
@if(isset($notifications) && count($notifications) > 0)
<div class="card">
    <h3 style="color: #D4AF37;">📋 Historique des notifications</h3>
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Destinataire</th>
                <th>Statut</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifications as $notification)
            <tr>
                <td>📧 Email</td>
                <td>{{ $notification->destinataire }}</td>
                <td>
                    <span class="badge badge-{{ $notification->statut == 'envoye' ? 'success' : ($notification->statut == 'erreur' ? 'danger' : 'warning') }}">
                        {{ $notification->statut }}
                    </span>
                </td>
                <td>{{ $notification->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

<style>
    .card {
        background: #1A1A1A;
        padding: 25px;
        border-radius: 12px;
        border: 1px solid #333;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        margin-bottom: 20px;
    }
    .card h3 {
        color: #D4AF37;
        margin-bottom: 15px;
    }
    .badge {
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    .badge-success {
        background: #28a745;
        color: white;
    }
    .badge-warning {
        background: #ffc107;
        color: black;
    }
    .badge-danger {
        background: #dc3545;
        color: white;
    }
    .badge-info {
        background: #17a2b8;
        color: white;
    }
    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
        font-weight: 600;
    }
    .btn-orange {
        background: #E67E22;
        color: white;
    }
    .btn-orange:hover {
        background: #d35400;
    }
    .btn-gold {
        background: #D4AF37;
        color: black;
    }
    .btn-gold:hover {
        background: #c4a030;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        font-weight: 600;
        color: #D4AF37;
        margin-bottom: 5px;
        font-size: 14px;
    }
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border-radius: 10px;
        border: 2px solid #444;
        font-size: 15px;
        transition: 0.3s;
        background: #0A0A0A;
        color: #FFFFFF;
    }
    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #666;
    }
    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #D4AF37;
        outline: none;
        background: #1A1A1A;
        color: #FFFFFF;
        box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.08);
    }
    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th {
        text-align: left;
        padding: 10px;
        color: #D4AF37;
        border-bottom: 2px solid #D4AF37;
    }
    td {
        padding: 10px;
        border-bottom: 1px solid #333;
        color: #ccc;
    }
</style>
@endsection
