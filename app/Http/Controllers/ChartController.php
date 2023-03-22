<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChartController extends Controller
{

    public function list()
    {
        // $weights = ['0', '0.5', '1', '2', '3', '5', '10', '25', '50', '100', '250', '500', '1000'];

        // if ($request->weight != null) {
            // $weights = [$request->weight];
        // }

        $groups = DB::select(DB::raw("select
                    cd.id as id,
                    mg.weight as berat,
                    cd.quantity as kuantitas,
                    d_click as tglMasuk
                from
                    chart_detail cd
                left join master_gold mg on
                    cd.gold_id = mg.id"));

        return view('pages.chart.list')->with('groups', $groups);
    }

    public function new (){

        return view('pages.chart.checkout');
    }
}
