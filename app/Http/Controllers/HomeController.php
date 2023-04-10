<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function welcome(){

        $golds =  DB::select(DB::raw("select * from master_gold mg where created_at like
        (select max(created_at) from master_gold) "));

        return view('welcome')->with('golds', $golds);
    }

    public function addToChart(Request $request){

        $validator = Validator::make($request->all(), [
            'goldid' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }

        DB::table('chart_detail')->insert([
            'user_id' => Auth::user()->id,
            'gold_id' => $request->goldid,
            'quantity' => $request->quantity,
            'd_post' => Carbon::now()->toDateTimeString()
        ]);

        return response()->json(['success' => 'Post created successfully.']);
    }
}
