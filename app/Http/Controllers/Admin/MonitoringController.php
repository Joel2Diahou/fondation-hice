<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projet;
use App\Models\DemandePartenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    public function index()
    {
        // ===== Statistiques générales =====
        $stats = [
            'projets' => Projet::count(),
            'demandes_partenaires' => DemandePartenaire::count(),
            'programmes' => DB::table('programmes')->count(),
            'actualites' => DB::table('actualites')->count(),
            'candidatures' => DB::table('candidatures')->count(),
            'partenaires' => DB::table('partenaires')->count(),
        ];

        // ===== Erreurs 24h (via Telescope) =====
        $erreurs24h = DB::table('telescope_entries')
            ->where('type', 'exception')
            ->where('created_at', '>=', now()->subHours(24))
            ->count();

        // ===== Erreurs par heure pour le graphique =====
        $erreursParHeure = DB::table('telescope_entries')
            ->where('type', 'exception')
            ->where('created_at', '>=', now()->subHours(24))
            ->select(
                DB::raw('HOUR(created_at) as heure'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('heure')
            ->orderBy('heure')
            ->get();

        $data_erreurs = array_fill(0, 24, 0);
        foreach ($erreursParHeure as $row) {
            $data_erreurs[(int)$row->heure] = $row->total;
        }

        // ===== Requêtes lentes (via Telescope - structure correcte) =====
        $requetesLentes = DB::table('telescope_entries')
            ->where('type', 'query')
            ->where('created_at', '>=', now()->subHours(24))
            ->whereRaw('JSON_EXTRACT(content, "$.duration") > 500')
            ->orderByRaw('JSON_EXTRACT(content, "$.duration") DESC')
            ->limit(10)
            ->get();

        // ===== Activités admin (via activity_log) =====
        try {
            $activitesRecentes = DB::table('activity_log')
                ->orderBy('created_at', 'desc')
                ->limit(20)
                ->get();
        } catch (\Exception $e) {
            $activitesRecentes = collect();
        }

        // ===== Performance système (Windows compatible) =====
        $cpu = [0, 0, 0];
        $disquePourcentage = 0;

        // Vérifier si on est sur Windows ou Linux
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows : on utilise wmic pour récupérer le CPU
            try {
                $output = shell_exec('wmic cpu get loadpercentage /value');
                if ($output) {
                    preg_match('/LoadPercentage=(\d+)/', $output, $matches);
                    if (isset($matches[1])) {
                        $cpu[0] = (float)$matches[1] / 100;
                    }
                }
            } catch (\Exception $e) {
                $cpu = [0, 0, 0];
            }

            // Disque sur Windows
            try {
                $disque = disk_free_space('C:');
                $disqueTotal = disk_total_space('C:');
                if ($disque && $disqueTotal) {
                    $disquePourcentage = round((($disqueTotal - $disque) / $disqueTotal) * 100, 2);
                }
            } catch (\Exception $e) {
                $disquePourcentage = 0;
            }
        } else {
            // Linux/Unix
            try {
                if (function_exists('sys_getloadavg')) {
                    $cpu = sys_getloadavg();
                }
                $disque = disk_free_space('/');
                $disqueTotal = disk_total_space('/');
                if ($disque && $disqueTotal) {
                    $disquePourcentage = round((($disqueTotal - $disque) / $disqueTotal) * 100, 2);
                }
            } catch (\Exception $e) {
                $cpu = [0, 0, 0];
                $disquePourcentage = 0;
            }
        }

        return view('admin.monitoring.index', compact(
            'stats',
            'erreurs24h',
            'data_erreurs',
            'requetesLentes',
            'activitesRecentes',
            'cpu',
            'disquePourcentage'
        ));
    }
}
