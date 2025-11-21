<?php
namespace App\Http\Controllers;
use App\Models\Recharge;
use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsommationController extends Controller
{
    public function index()
    {
        DB::statement("SET lc_time_names = 'fr_FR'");
        $data = DB::table('trajets')
            ->select(
                DB::raw('YEARWEEK(date, 1) AS periode'),
                DB::raw("CONCAT( MONTHNAME(date), ' ', YEAR(date)) as labels"),
                DB::raw('ROUND(AVG(consommation_moyenne), 2) AS consommation_moyenne')
            )
            ->groupBy('periode', 'labels')
            ->orderBy('periode')
            ->get();
        $trajetsParType = DB::table('trajets')
            ->select('type', DB::raw('COUNT(*) AS nombre_trajets'))
            ->groupBy('type')
            ->orderByDesc('nombre_trajets')
            ->get();

        return view('consommation.index', compact('data', 'trajetsParType'));
    }
    public function vue(string $mode)
    {
        DB::statement("SET lc_time_names = 'fr_FR'");
        switch ($mode) {
            case 'semaine':
                $data = DB::table('trajets')
                    ->select(
                        DB::raw('YEARWEEK(date, 1) AS periode'),
                        DB::raw("CONCAT( MONTHNAME(date), ' ', YEAR(date)) as labels"),
                        DB::raw('ROUND(AVG(consommation_moyenne), 2) AS consommation_moyenne')
                    )
                    ->groupBy('periode', 'labels')
                    ->orderBy('periode')
                    ->get();

                $trajetsParType = DB::table('trajets')
                    ->select('type', DB::raw('COUNT(*) AS nombre_trajets'))
                    ->groupBy('type')
                    ->orderByDesc('nombre_trajets')
                    ->get();

                break;

            case 'mois':
                $data = DB::table('trajets')
                    ->select(
                        DB::raw('YEAR(date) AS annee'),
                        DB::raw('MONTH(date) AS periode'),
                        DB::raw("CONCAT( MONTHNAME(date), ' ', YEAR(date)) as labels"),
                        DB::raw('ROUND(AVG(consommation_moyenne), 2) AS consommation_moyenne')
                    )
                    ->groupBy('annee', 'periode', 'labels')
                    ->orderBy('annee')
                    ->orderBy('periode')
                    ->get();

                $trajetsParType = DB::table('trajets')
                    ->select('type', DB::raw('COUNT(*) AS nombre_trajets'))
                    ->groupBy('type')
                    ->orderByDesc('nombre_trajets')
                    ->get();

                break;

            case 'annee':
                $data = DB::table('trajets')
                    ->select(
                        DB::raw('YEAR(date) AS labels'),
                        DB::raw('ROUND(AVG(consommation_moyenne), 2) AS consommation_moyenne')
                    )
                    ->groupBy('labels')
                    ->orderBy('labels')
                    ->get();

                $trajetsParType = DB::table('trajets')
                    ->select('type', DB::raw('COUNT(*) AS nombre_trajets'))
                    ->groupBy('type')
                    ->orderByDesc('nombre_trajets')
                    ->get();

                break;
            default:
                abort(404);
        }

        return view('consommation.index', compact('mode', 'data', 'trajetsParType'));

    }
}
