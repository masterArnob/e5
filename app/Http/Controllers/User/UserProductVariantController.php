<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

class UserProductVariantController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->product_id);
        $product = Product::where(['user_id' => Auth::user()->id, 'id' => $request->product_id])->first();
        //dd($product);
        $variants = ProductVariant::where(['user_id' => Auth::user()->id, 'product_id' => $request->product_id])
            ->get();
        // dd($variants);
        return view('user.product-variant.index', compact('product', 'variants'));
    }

    public function create(Request $request)
    {
        $product = Product::where(['user_id' => Auth::user()->id, 'id' => $request->product_id])->first();
        return view('user.product-variant.create', compact('product'));
    }

    public function store(Request $request)
    {
        ///dd($request->all());
        $request->validate([
            'name' => ['required'],
            'product_id' => ['required'],
            'status' => ['required'],
        ]);

        $variant = new ProductVariant();
        $variant->name = $request->name;
        $variant->product_id = $request->product_id;
        $variant->user_id = Auth::user()->id;
        $variant->status = $request->status;
        $variant->save();
        return redirect()->route('user.product-variant.index', ['product_id' => $request->product_id]);
    }

    public function edit($product_id, $variant_id)
    {
        //dd($product_id);
        //dd($variant_id);
        $product = Product::findOrFail($product_id);
        $variant = ProductVariant::findOrFail($variant_id);
        return view('user.product-variant.edit', compact('product', 'variant'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => ['required'],
            'product_id' => ['required'],
            'status' => ['required'],
        ]);

        $variant = ProductVariant::findOrFail($request->variant_id);
        $variant->name = $request->name;
        $variant->status = $request->status;
        $variant->save();
        return redirect()->route('user.product-variant.index', ['product_id' => $request->product_id]);
    }

    public function destroy($id)
    {
        //dd($id);
        $variant = ProductVariant::findOrFail($id);
        $variant->delete();
        return redirect()->back();
    }
}
