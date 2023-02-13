<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\MasterGold;
use Illuminate\Http\Request;

class MasterGoldController extends Controller
{
    public function list(Request $request)
    {
        $golds = MasterGold::whereNotNull('created_at');

        if ($request->date) {
            $golds = $golds->where('date',$request->date);
        }

        if ($request->weight) {
         $golds = $golds->where('weight',$request->weight);
        }

        $golds = $golds->paginate(10);
        return view('admin.master.gold.list')->with('golds', $golds);
    }
}
