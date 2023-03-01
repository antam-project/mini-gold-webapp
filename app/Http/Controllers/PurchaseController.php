<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PurchaseController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view('purchase.edit', [
            'admin' => $request->admin(),
        ]);
    }
}