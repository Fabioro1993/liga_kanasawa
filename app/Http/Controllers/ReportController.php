<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function dojo(Request $request)
    {
        $report = 'Dojo';
        $url = 'reports.dojo';

        if ($request->ajax()) {

            $type = 'dojo';

            $base = "SELECT
                    dojo,
                    organization,
                    SUM(CASE WHEN positions = 1 THEN 1 ELSE 0 END) AS gold,
                    SUM(CASE WHEN positions = 2 THEN 1 ELSE 0 END) AS silver,
                    SUM(CASE WHEN (positions = 3 OR positions = 4) THEN 1 ELSE 0 END) AS bronze
                FROM
                    positions
                GROUP BY
                    $type
                ";

            $results = DB::select("$base");

            $results = collect($results);

            return response()->json($results);
        }

        return view('reports.index', compact('report', 'url'));
    }

    public function organization(Request $request)
    {
        $report = 'Organizacion';
        $url = 'reports.organization';

        if ($request->ajax()) {

            $type = 'organization';

            $base = "SELECT
                    dojo,
                    organization,
                    SUM(CASE WHEN positions = 1 THEN 1 ELSE 0 END) AS gold,
                    SUM(CASE WHEN positions = 2 THEN 1 ELSE 0 END) AS silver,
                    SUM(CASE WHEN (positions = 3 OR positions = 4) THEN 1 ELSE 0 END) AS bronze
                FROM
                    positions
                GROUP BY
                    $type
                ";

            $results = DB::select("$base");

            $results = collect($results);

            return response()->json($results);
        }

        return view('reports.index', compact('report', 'url'));
    }

    public function dev(Request $request)
    {
        $report = 'Dojo Desarrollo';
        $url = 'reports.dojo.dev';

        if ($request->ajax()) {

            $type = 'dojo';
            $categoryType = Category::DEV;

            $base = "SELECT
                    dojo,
                    organization,
                    SUM(CASE WHEN positions = 1 THEN 1 ELSE 0 END) AS gold,
                    SUM(CASE WHEN positions = 2 THEN 1 ELSE 0 END) AS silver,
                    SUM(CASE WHEN (positions = 3 OR positions = 4) THEN 1 ELSE 0 END) AS bronze
                FROM
                    positions
                LEFT JOIN competencies ON positions.competition_id = competencies.id
                LEFT JOIN categories ON competencies.category_id = categories.id
                WHERE categories.type = '$categoryType'
                GROUP BY
                    $type
                ";

            $results = DB::select("$base");

            $results = collect($results);

            return response()->json($results);
        }

        return view('reports.index', compact('report', 'url'));
    }

    public function formation(Request $request)
    {
        $report = 'Dojo Formacion';
        $url = 'reports.dojo.formation';

        if ($request->ajax()) {

            $type = 'dojo';
            $categoryType = Category::FORMATION;

            $base = "SELECT
                    dojo,
                    organization,
                    SUM(CASE WHEN positions = 1 THEN 1 ELSE 0 END) AS gold,
                    SUM(CASE WHEN positions = 2 THEN 1 ELSE 0 END) AS silver,
                    SUM(CASE WHEN (positions = 3 OR positions = 4) THEN 1 ELSE 0 END) AS bronze
                FROM
                    positions
                LEFT JOIN competencies ON positions.competition_id = competencies.id
                LEFT JOIN categories ON competencies.category_id = categories.id
                WHERE categories.type = '$categoryType'
                GROUP BY
                    $type
                ";

            $results = DB::select("$base");

            $results = collect($results);

            return response()->json($results);
        }

        return view('reports.index', compact('report', 'url'));
    }
}
