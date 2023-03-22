<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Master\MasterGold;
use App\Models\Product\Product;
use App\Models\Product\QrProductGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function list(Request $request)
    {
        $weights = ['0', '0.5', '1', '2', '3', '5', '10', '25', '50', '100', '250', '500', '1000'];

        if ($request->weight != null) {
            $weights = [$request->weight];
        }

        $groups = DB::table(DB::raw("(select 0 as weight,
            0 as group_none,
            (select count(*) from products p where qr_group_id = 1) as total,
            (select count(*) from products p where qr_group_id = 1 and p.available = true) as ready
            union
            select distinct weight,
            (select count(distinct qr_group_id)  from products p
            where not qr_group_id = 1 and weight = p.weight) as group_type,
            (select count(*) from products p where not qr_group_id = 1 and weight = p.weight) as total,
            (select count(*) from products p where not qr_group_id = 1 and weight = p.weight and p.available = true) as ready
            from products p
            where not p.qr_group_id = 1) vw"))
            ->select('*')
            ->where(DB::raw(1), '=', DB::raw(1))
            ->whereIn('vw.weight', $weights)
            ->paginate(10);

        return view('admin.product.list')->with('groups', $groups);
    }

    public function listDetail(Request $request, $weight)
    {

    }

    public function addPage()
    {
        $prices = DB::table(DB::raw("select
                count(*) as aggregate
            from
                (
                select
                    distinct weight,
                    (
                    select
                        mg.price1
                    from
                        master_gold mg
                    where
                        mg.weight = master_gold.weight
                    limit 1) as price1 ,
                    (
                    select
                        mg.price2
                    from
                        master_gold mg
                    where
                        mg.weight = master_gold.weight
                    limit 1) as price2 ,
                    (
                    select
                        mg.price3
                    from
                        master_gold mg
                    where
                        mg.weight = master_gold.weight
                    limit 1) as price3
                from
                    master_gold
                group by
                    weight) as aggregate_table"));

        return view('admin.product.add')->with('prices', $prices);
    }

    public function add(Request $request)
    {
        $price = str_replace(".", "", $request->price);
        $price = str_replace(",", ".", $price);

        $leftCount = $request->quantity % $request->grouping;
        $groupCount = ($request->quantity - $leftCount) / $request->grouping;

        $dateCode = date("ymd");

        for ($i = 0; $i < $groupCount; $i++) {
            $codeGroup = Str::random(6);
            $group = QrProductGroup::create([
                'code' => $dateCode . $codeGroup,
                'description' => 'Grouping Logam Mulia dengan berat ' . $request->weight . 'gram dan jumlah ' . $request->grouping . ' pcs'
            ]);
            for ($o = 0; $o < $request->grouping; $o++) {
                $codeQr = Str::random(4);
                Product::create([
                    'qr_group_id' => $group->id,
                    'qr_code' => $group->code . $codeQr,
                    'weight' => $request->weight,
                    'buy_price' => $price,
                    'available' => true
                ]);
            }
        }

        for ($i = 0; $i < $leftCount; $i++) {
            $codeQr = Str::random(16);
            Product::create([
                'qr_group_id' => 1,
                'qr_code' => $codeQr,
                'weight' => $request->weight,
                'buy_price' => $price,
                'available' => true
            ]);
        }
    }

    public function groupPage($group)
    {
        if ($group == 0) {
            $results = DB::table('products as p')
                ->select('p.qr_group_id', 'qrg.code', 'p.weight', 'p.buy_price',
                    DB::raw('(select count(*) from products as p2 where p2.qr_group_id = 1 and p2.weight = p.weight) as total'),
                    DB::raw('(select count(*) from products as p2 where p2.qr_group_id = 1 and p2.weight = p.weight and p2.available = true) as ready')
                )
                ->leftJoin('qr_product_groups as qrg', 'qrg.id', '=', 'p.qr_group_id')
                ->where('p.qr_group_id', 1)
                ->groupBy('p.qr_group_id', 'qrg.code', 'p.weight', 'p.buy_price');
        } else {
            $results = DB::table('products as p')
                ->select('p.qr_group_id', 'qrg.code', 'p.weight', 'p.buy_price',
                    DB::raw('(select count(*) from products as p2 where not p2.qr_group_id = 1 and p2.qr_group_id = p.qr_group_id) as total'),
                    DB::raw('(select count(*) from products as p2 where not p2.qr_group_id = 1 and p2.available = true and p2.qr_group_id = p.qr_group_id) as ready')
                )
                ->leftJoin('qr_product_groups as qrg', 'qrg.id', '=', 'p.qr_group_id')
                ->where('p.qr_group_id', '!=', 1)
                ->groupBy('p.qr_group_id', 'qrg.code', 'p.weight', 'p.buy_price');
        }
        $results = $results->distinct()->paginate(10);
        return view('admin.product.group')->with('groups', $results)->with('selectedGroup', $group);
    }

    public function groupDetailPage($group, $id)
    {
        $results = DB::table('products as p')
            ->select('p.qr_code as code', 'p.weight', 'p.buy_price', 'p.available as ready');
        //no group
        if ($group == 0) {
            $results->where('p.qr_group_id', 1)
                ->where('p.weight', $id);
        } else {
            $results->where('p.weight', $group)
                ->where('p.qr_group_id', $id);
        }

        $results = $results->paginate(5);

        return view('admin.product.item')->with('items', $results)->with('selectedGroup', $group);

    }
}
