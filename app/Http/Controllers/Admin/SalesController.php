<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SalesController extends Controller
{
    public function invoice(Request $request) {
        return view('admin.sales');
    }
}
