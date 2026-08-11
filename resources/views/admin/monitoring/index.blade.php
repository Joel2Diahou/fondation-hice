@extends('admin.layouts.app')

@section('title', 'Monitoring - FONDATION HICE')

@section('content')
<div class="monitoring-header">
    <h1>📊 Dashboard de Monitoring</h1>
    <p>Surveillance en temps réel de l'état du site</p>
</div>

<!-- ===== STATS ===== -->
<div class="stats-grid">
    <div class="stat-card" style="border-left: 4px solid #28a745;">
        <div class="stat-number">{{ $stats['projets'] ?? 0 }}</div>
        <div class="stat-label">🚀 Projets soumis</div>
    </div>
    <div class="stat-card" style="border-left: 4px solid #D4AF37;">
        <div class="stat-number">{{ $stats['demandes_partenaires'] ?? 0 }}</div>
        <div class="stat-label">🤝 Demandes partenaires</div>
    </div>
    <div class="stat-card" style="border-left: 4px solid #E67E22;">
        <div class="stat-number">{{ $stats['programmes'] ?? 0 }}</div>
        <div class="stat-label">📚 Programmes</div>
    </div>
    <div class="stat-card" style="border-left: 4px solid #17a2b8;">
        <div class="stat-number">{{ $stats['actualites'] ?? 0 }}</div>
        <div class="stat-label">📰 Actualités</div>
    </div>
</div>

<!-- ===== ERREURS & SYSTEME ===== -->
<div class="monitoring-grid">
    <div class="card">
        <h3>❌ Erreurs (24h)</h3>
        <div style="font-size: 48px; color: #dc3545; font-weight: 700;">{{ $erreurs24h ?? 0 }}</div>
        <p style="color: #888;">Nombre total d'erreurs sur les dernières 24 heures</p>
    </div>

    <div class="card">
        <h3>⚡ Requêtes lentes</h3>
        <div style="font-size: 48px; color: #ffc107; font-weight: 700;">
            {{ $requetesLentes->count() ?? 0 }}
        </div>
        <p style="color: #888;">Requêtes SQL > 500ms</p>
    </div>
</div>

<!-- ===== CPU & DISQUE ===== -->
<div class="monitoring-grid" style="grid-template-columns: repeat(3, 1fr);">
    <div class="card">
        <h3>🧠 CPU (load avg)</h3>
        <div style="font-size: 24px; font-weight: 700; color: #0A0A0A;">
            {{ isset($cpu[0]) ? number_format($cpu[0], 2) : 'N/A' }}
        </div>
        <p style="color: #888;">Charge CPU moyenne (1min)</p>
    </div>
    <div class="card">
        <h3>💾 Disque</h3>
        <div style="font-size: 24px; font-weight: 700; color: #0A0A0A;">
            {{ $disquePourcentage ?? 0 }}%
        </div>
        <p style="color: #888;">Espace disque utilisé</p>
    </div>
    <div class="card">
        <h3>📊 Cache</h3>
        <div style="font-size: 24px; font-weight: 700; color: #28a745;">
            ✅ Actif
        </div>
        <p style="color: #888;">Driver: {{ config('cache.default') }}</p>
    </div>
</div>

<!-- ===== GRAPHIQUE ===== -->
<div class="card">
    <h3>📈 Erreurs par heure</h3>
    <canvas id="chartErreurs" style="max-height: 300px;"></canvas>
</div>

<!-- ===== REQUÊTES LENTES ===== -->
<div class="card">
    <h3>🐢 Requêtes lentes (24h)</h3>
    @if(isset($requetesLentes) && count($requetesLentes) > 0)
    <table>
        <thead>
            <tr>
                <th>Requête</th>
                <th>Temps</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requetesLentes as $query)
            @php
                $content = json_decode($query->content ?? '{}', true);
                $sql = $content['sql'] ?? $query->content ?? 'N/A';
                $duration = $content['duration'] ?? 0;
            @endphp
            <tr>
                <td style="font-size: 13px;">{{ Str::limit($sql, 80) }}</td>
                <td>
                    <span class="badge badge-danger">
                        {{ number_format($duration, 2) }}ms
                    </span>
                </td>
                <td>{{ date('d/m/Y H:i', strtotime($query->created_at)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="color: #888;">✅ Aucune requête lente détectée</p>
    @endif
</div>

<!-- ===== ACTIVITÉS ADMIN ===== -->
<div class="card">
    <h3>📋 Activités Admin</h3>
    @if(isset($activitesRecentes) && count($activitesRecentes) > 0)
    <table>
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Action</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activitesRecentes as $activity)
            <tr>
                <td>{{ $activity->causer_id ?? 'Système' }}</td>
                <td>{{ $activity->description ?? 'Action inconnue' }}</td>
                <td>{{ date('d/m/Y H:i', strtotime($activity->created_at)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="color: #888;">Aucune activité récente</p>
    @endif
</div>

<style>
    .monitoring-header { margin-bottom: 30px; }
    .monitoring-header h1 { font-size: 28px; color: #0A0A0A; }
    .monitoring-header p { color: #666; }

    .monitoring-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin: 20px 0;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        border: 1px solid #eee;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        transition: 0.3s;
    }
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }
    .stat-card .stat-number {
        font-size: 32px;
        font-weight: 700;
        color: #0A0A0A;
    }
    .stat-card .stat-label {
        color: #888;
        font-size: 14px;
        margin-top: 5px;
    }

    .card {
        background: white;
        padding: 25px;
        border-radius: 12px;
        border: 1px solid #eee;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        margin-bottom: 20px;
    }
    .card h3 { color: #0A0A0A; margin-bottom: 15px; }

    .badge {
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    .badge-danger { background: #f8d7da; color: #dc3545; }
    .badge-warning { background: #fff3cd; color: #856404; }
    .badge-success { background: #d4edda; color: #28a745; }

    table { width: 100%; border-collapse: collapse; }
    th { text-align: left; padding: 10px; color: #D4AF37; border-bottom: 2px solid #D4AF37; }
    td { padding: 10px; border-bottom: 1px solid #eee; }

    @media (max-width: 768px) {
        .stats-grid { grid-template-columns: 1fr 1fr; }
        .monitoring-grid { grid-template-columns: 1fr; }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('chartErreurs').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['00h', '01h', '02h', '03h', '04h', '05h', '06h', '07h', '08h', '09h', '10h', '11h', '12h', '13h', '14h', '15h', '16h', '17h', '18h', '19h', '20h', '21h', '22h', '23h'],
                datasets: [{
                    label: 'Erreurs',
                    data: @json(array_values($data_erreurs)),
                    borderColor: '#dc3545',
                    backgroundColor: 'rgba(220, 53, 69, 0.1)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 1 } }
                }
            }
        });
    });
</script>
@endsection
