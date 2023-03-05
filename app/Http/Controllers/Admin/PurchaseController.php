<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PurchaseController extends Controller
{
    public function invoice(Request $request) {
        return view('admin.purchase.invoice');
    }
    public function delivery(Request $request) {
        return view('admin.purchase.delivery');
    }
}
