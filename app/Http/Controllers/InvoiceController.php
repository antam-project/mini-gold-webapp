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

class InvoiceController extends Controller
{
    public function invoice()
    {
        $order = DB::select(DB::raw("select
                                        row_number() over(
                                        order by id) as nomor,
                                        id as id,
                                        DATE_FORMAT(invoice_date , '%Y-%m-%d %H:%i') as tanggal_transaksi,
                                        DATE_FORMAT(due_date , '%Y-%m-%d %H:%i') as tanngal_sampai,
                                        address as alamat_tujuan,
                                        message as message,
                                        v_total as jumlahtrx,
                                        (case
                                            when (select 1 from `transaction` t where invoice_id = ui.id) = 1
                                                then (select transaction_status  from `transaction` where invoice_id = ui.id)
                                            else '0'
                                        end) as status
                                    from
                                        user_invoice ui"));

        $order = collect($order)->map(function ($order) {
            $order->id = encrypt($order->id);
            return $order;
        })->toArray();

        return view('admin.invoice.list', ['order'=>$order]);
    }

    public function details($param)
    {
        $decryptedData = decrypt($param);

        $details = DB::select(DB::raw("select
                                        row_number() over(
                                        order by id) as nomor,
                                        id as id,
                                        ui.vendor  as vendor,
                                        DATE_FORMAT(ui.invoice_date , '%Y-%m-%d %H:%i') as tanggal_transaksi,
                                        DATE_FORMAT(due_date , '%Y-%m-%d %H:%i') as tanngal_sampai,
                                        address as alamat_tujuan,
                                        message as message,
                                        v_total as jumlahtrx,
                                        ui.attachments_file as qrcode,
                                        (case
                                            when (
                                            select
                                                1
                                            from
                                                `transaction` t
                                            where
                                                invoice_id = ui.id) = 1
                                            then (
                                            select
                                                transaction_status
                                            from
                                                `transaction`
                                            where
                                                invoice_id = ui.id)
                                            else '0'
                                        end) as status,
                                        IFNULL(cast((select transaction_no  from `transaction` where invoice_id = ui.id) as char), '-') as no_transaksi
                                    from
                                        user_invoice ui where ui.id = ".intval($decryptedData)));

        $rinci = DB::select(DB::raw("select units as unit,
                                        description as description,
                                        quantity as quantity,
                                        v_products as v_product,
                                        v_tax as v_tax,
                                        v_total as v_total
                                    from invoice_details
                                        where invoice_id = ".intval($decryptedData)));

        return view('pages.invoice.details', ['details'=>$details, 'rinci'=>$rinci]);
    }

}
