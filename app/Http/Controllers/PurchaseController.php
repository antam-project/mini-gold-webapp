<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PurchaseController extends Controller
{
    public function invoice(Request $request) {
        return view('purchase.invoice');
    }
    public function delivery(Request $request) {
        return view('purchase.delivery');
    }
}
