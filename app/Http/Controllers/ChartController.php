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
use Illuminate\Support\Facades\Crypt;

class ChartController extends Controller
{

    public function list()
    {

        $groups = DB::select(DB::raw("select
                                        cd.id as id,
                                        mg.weight as berat,
                                        cd.quantity as kuantitas,
                                        d_post as tglMasuk,
                                        (select mg.price1*cd.quantity from master_gold mg
                                        where mg.id=cd.gold_id) as harga
                                    from
                                        chart_detail cd
                                    left join master_gold mg on
                                        cd.gold_id = mg.id
                                    where cd.user_id = ".Auth::user()->id));

        $price = DB::select(DB::raw("select
                                        sum(mg.price1*cd.quantity) as price
                                    from
                                        chart_detail cd
                                    left join master_gold mg on
                                        cd.gold_id = mg.id
                                    where cd.user_id = ".Auth::user()->id));

        return view('pages.chart.list', ['groups'=>$groups,'price'=>$price]);
    }

    public function deletfromchart($id){
        $delete = DB::table('chart_detail')->where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function updateQuantity($id, $quantity){

        $update = DB::table('chart_detail')->where('id', '=' , $id)->update([
            'quantity' => $quantity
        ]);

        if ($update == 1) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function datatables(Request $request){
        $groups = DB::select(DB::raw("select
                                        cd.id as id,
                                        mg.weight as berat,
                                        cd.quantity as kuantitas,
                                        d_post as tglMasuk,
                                        (select mg.price1*cd.quantity from master_gold mg
                                        where mg.id=cd.gold_id) as harga
                                    from
                                        chart_detail cd
                                    left join master_gold mg on
                                        cd.gold_id = mg.id
                                    where cd.user_id = ".Auth::user()->id));

        if ($request->ajax()) {
            return Datatables::of($groups)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function new (){

        $groups = DB::select(DB::raw("select
                                        cd.id as id,
                                        mg.weight as berat,
                                        cd.quantity as kuantitas,
                                        d_post as tglMasuk,
                                        (select
                                            mg.price1 * cd.quantity
                                        from
                                            master_gold mg
                                        where
                                            mg.id = cd.gold_id) as harga,
                                        (select
                                            sum(quantity)
                                        from
                                            chart_detail
                                        where
                                            user_id = cd.user_id) as total_item,
                                        ((cd.quantity*mg.price2) - (cd.quantity*mg.price1)) as tax,
                                        (select
                                            mg.price2 * cd.quantity
                                        from
                                            master_gold mg
                                        where
                                            mg.id = cd.gold_id) as ammount
                                    from
                                        chart_detail cd
                                    left join master_gold mg on
                                        cd.gold_id = mg.id
                                    where
                                        cd.user_id = ".Auth::user()->id));

        return view('pages.chart.checkout', ['details'=>$groups]);
    }

    public function checkout(Request $request){

        $validator = Validator::make($request->all(), [
            'transaction_date' => 'required',
            'due_date' => 'required',
            'message' => 'required',
            'v_total' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }

        DB::table('user_invoice')->insert([
            'email' => Auth::user()->email,
            'vendor' => $request->vendor,
            'address' => $request->address,
            'invoice_date' => Carbon::now()->toDateTimeString(),
            'due_date' => $request->due_date,
            'message' => $request->message,
            'memo' => null,
            'attachments_file' => null,
            'v_total' => $request->v_total,
            'tax_included' => 1
        ]);



        $invoice = DB::select(DB::raw("select id, invoice_date from user_invoice where email = "."'".Auth::user()->email."'"." order by id desc limit 1"));

        foreach($invoice as $invoice){
            $encryptedData = Crypt::encrypt($invoice->id);
            $url = 'http://127.0.0.1:8000/detail-invoice/'.$encryptedData; // Replace with your actual URL
            $qrCode = QrCode::format('png')->size(200)->generate($url);
            $fileName = 'qrcode-' . time() . '.png'; // Generate a unique file name

            Storage::disk('public')->put($fileName,$qrCode);

            $update = DB::table('user_invoice')->where('id', '=' , $invoice->id)->update([
                'attachments_file' => $fileName
            ]);

            $details = DB::select(DB::raw("select
                                            cd.id as id,
                                            concat(cd.quantity,' buah Mini Gold dengan berat ',mg.weight,' gr') as deskripsi,
                                            concat(mg.weight,' gr Mini Gold') as units,
                                            cd.quantity as kuantitas,
                                            d_post as tglMasuk,
                                            (select
                                                mg.price1 * cd.quantity
                                            from
                                                master_gold mg
                                            where
                                                mg.id = cd.gold_id) as v_produk,
                                            ((cd.quantity*mg.price2) - (cd.quantity*mg.price1)) as v_tax,
                                            (select
                                                mg.price2 * cd.quantity
                                            from
                                                master_gold mg
                                            where
                                                mg.id = cd.gold_id) as v_total
                                        from
                                            chart_detail cd
                                        left join master_gold mg on
                                            cd.gold_id = mg.id
                                        where
                                            cd.user_id = ".Auth::user()->id));

            foreach($details as $detail){
                DB::table('invoice_details')->insert([
                    'invoice_id' => $invoice->id,
                    'description' => $detail->deskripsi,
                    'quantity' => $detail->kuantitas,
                    'units' => $detail->units,
                    'created_date' => $invoice->invoice_date,
                    'v_products' => $detail->v_produk,
                    'v_tax' => $detail->v_tax,
                    'v_total' => $detail->v_total,
                ]);
            }
            $delete = DB::table('chart_detail')->where('user_id', Auth::user()->id)->delete();
        }

        Alert::alert('Pesanan Ditambahkan', 'Mohon tunggu konfirmasi penjual untuk melakukan pembayaran', 'Success');

        return redirect('/order');
    }
}
