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
                DB::raw("CONCAT( LEFT(MONTHNAME(date), 4), '-', WEEK(date, 1) - WEEK(DATE_SUB(date, INTERVAL DAY(date)-1 DAY), 1) + 1 ) as periode"),
                DB::raw('ROUND(SUM(consommation_moyenne)/COUNT(*), 2) as consommation_moyenne')
            )
            ->groupBy('periode')
            ->orderByRaw('MIN(date)')
            ->get();
        return view('consommation.index', compact('data'));
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
                break;
            default:
                abort(404);
        }

        return view('consommation.index', compact('mode', 'data'));

    }
}
