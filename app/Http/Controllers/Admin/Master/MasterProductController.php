<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\MasterProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MasterProductController extends Controller
{
    public function list(Request $request)
    {
        $products = MasterProduct::whereNotNull('created_at');

        if ($request->search) {
            $products = $products->where('weight', $request->search);
        }

        $products = $products->orderBy('weight')->paginate(5);
        return view('admin.master.product.list')->with('products', $products);
    }

    public function updatePage($id)
    {
        $product = MasterProduct::where('id', $id)->first();

        if ($product == null) {
            toastr()->error('Produk tidak ditemukan');
            return redirect(route('admin.master.product.list'));
        }

        return view('admin.master.product.edit')->with('product', $product);
    }

    public function update(Request $request, $id)
    {

        $product = MasterProduct::where('id', $id)->first();

        if ($product == null) {
            toastr()->error('Produk tidak ditemukan');
            return redirect(route('admin.master.product.list'));
        }

        $rules = [
            'image' => 'max:2048|mimes:jpg,png,jpeg'
        ];

       $validator = Validator::make($request->all(),$rules);

       if ($validator->fails()){
           toastr()->error('Format file tidak sesuai');
           return redirect()->back();
       }

        if($request->image != null){
            $img = $request->file('image');
            $imgSave = Storage::put('public/master/produk', $img);
        }else{
            $imgSave = $product->img_url;
        }

        $product->update([
           'img_url'=>$imgSave
        ]);

        toastr()->success('Berhasil Update Master Produk');
        return redirect()->back();
    }

}
