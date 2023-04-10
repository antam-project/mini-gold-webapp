<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Auth;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QrCodeController extends Controller
{
    public function example(){
        $url = 'https://example.com'; // Replace with your actual URL
        $qrCode = QrCode::size(200)->generate($url);
        $fileName = 'qrcode-' . time() . '.png'; // Generate a unique file name

        Storage::disk('public')->put($fileName,$qrCode); // Save the QR code as a file

        return $qrCode;
    }
}
