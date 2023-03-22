<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KonfirmasiPembayaranController extends Controller
{

    public function list(Request $request)
    {
        $weights = ['0', '0.5', '1', '2', '3', '5', '10', '25', '50', '100', '250', '500', '1000'];

        if ($request->weight != null) {
            $weights = [$request->weight];
        }

        $groups = DB::select(DB::raw("select
                        trx.transaction_no as transaction_no,
                        u.name as pemesan,
                        trx.v_masuk,
                        trx.transaction_file as transaction_file,
                        tt.v_total as pajak
                    from
                        `transaction` trx left join users u on trx.id_user = u.id
                        left join tax_trx tt on tt.transaction_no = trx.transaction_no
                        left join supplies_transaction st on st.no_transaction_depends = trx.transaction_no
                    where trx.transaction_status = '0' "));

        return view('admin.konfirmasi-pembayaran.list')->with('groups', $groups);
    }

}
