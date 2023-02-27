<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;

class QRController extends Controller
{
    public function index()
    {
    	return view('index');
    }
    
    public function create()
    {
		$qrCode = new QrCode('techsolutionstuff.com');
		$qrCode->setSize(300);
		$qrCode->setMargin(20); 
		$qrCode->setEncoding('UTF-8');
		$qrCode->setWriterByName('png');
		$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
		$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
		$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
		$qrCode->setLogoSize(200, 200);
		$qrCode->setValidateResult(false);		
		$qrCode->setRoundBlockSize(true);
		$qrCode->setWriterOptions(['exclude_xml_declaration' => true]);
		header('Content-Type: '.$qrCode->getContentType());
		$qrCode->writeFile(public_path('/qrcode.png'));

		return redirect()->route('index');
    }
}