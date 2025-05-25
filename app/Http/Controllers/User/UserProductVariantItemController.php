<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariantItem;
use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

class UserProductVariantItemController extends Controller
{
    public function index($product_id, $variant_id)
    {
        // dd($product_id);
        // dd($variant_id);
        $product = Product::where(['user_id' => Auth::user()->id, 'id' => $product_id])
            ->first();
        $variant = ProductVariant::where(['user_id' => Auth::user()->id, 'id' => $variant_id])
            ->first();

        $items = ProductVariantItem::where(['user_id' => Auth::user()->id, 'product_id' => $product_id, 'product_variant_id' => $variant_id])
            ->get();
        return view('user.product-variant-item.index', compact('product', 'variant', 'items'));
    }


    public function create(Request $request)
    {
        $product = Product::where(['user_id' => Auth::user()->id, 'id' => $request->product_id])->first();
        $variant = ProductVariant::where(['user_id' => Auth::user()->id, 'id' => $request->variant_id])
            ->first();
        return view('user.product-variant-item.create', compact('product', 'variant'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'is_default' => ['required']
        ]);

        $item = new ProductVariantItem();
        $item->product_variant_id = $request->product_variant_id;
        $item->user_id = Auth::user()->id;
        $item->product_id = $request->product_id;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->is_default = $request->is_default;
        $item->status = $request->status;
        $item->save();
        return redirect()->route('user.product-variant-item.index', ['product_id' => $request->product_id, 'variant_id' => $request->product_variant_id]);
    }


    public function edit($product_id, $variant_id, $item_id)
    {
        $product = Product::where(['user_id' => Auth::user()->id, 'id' => $product_id])->first();
        $variant = ProductVariant::where(['user_id' => Auth::user()->id, 'id' => $variant_id])->first();
        $item = ProductVariantItem::where(['user_id' => Auth::user()->id, 'id' => $variant_id, 'id' => $item_id])->first();
        return view('user.product-variant-item.edit', compact('product', 'variant', 'item'));
    }

    public function update(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'is_default' => ['required']
        ]);


        $item = ProductVariantItem::findOrFail($request->item_id);
        // dd($item);

        $item->name = $request->name;
        $item->price = $request->price;
        $item->is_default = $request->is_default;
        $item->status = $request->status;
        $item->save();
        return redirect()->route('user.product-variant-item.index', ['product_id' => $request->product_id, 'variant_id' => $request->product_variant_id]);
    }

    public function destroy($id)
    {
        //dd($id);
        $item = ProductVariantItem::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
