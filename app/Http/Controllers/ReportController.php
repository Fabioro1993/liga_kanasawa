<?php

namespace App\Http\Controllers;

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
            $category  = ($request->type_search == null) ? null : $request->type_search;

            $type = 'dojo';
            $positions = Position::where('type', $category)->get()->groupBy('dojo');

            $base = "SELECT
                    dojo,
                    organization,
                    SUM(CASE WHEN positions = 1 THEN 1 ELSE 0 END) AS gold,
                    SUM(CASE WHEN positions = 2 THEN 1 ELSE 0 END) AS silver,
                    SUM(CASE WHEN (positions = 3 OR positions = 4) THEN 1 ELSE 0 END) AS bronze
                FROM
                    positions
                WHERE type = '$category'
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
            $category  = ($request->type_search == null) ? null : $request->type_search;

            $type = 'organization';
            $positions = Position::where('type', $category)->get()->groupBy('organization');

            $base = "SELECT
                    dojo,
                    organization,
                    SUM(CASE WHEN positions = 1 THEN 1 ELSE 0 END) AS gold,
                    SUM(CASE WHEN positions = 2 THEN 1 ELSE 0 END) AS silver,
                    SUM(CASE WHEN (positions = 3 OR positions = 4) THEN 1 ELSE 0 END) AS bronze
                FROM
                    positions
                WHERE type = '$category'
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
