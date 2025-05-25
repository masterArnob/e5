<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where(['user_id' => Auth::user()->id])
            ->orderBy('id', 'DESC')
            ->get();
        // dd($products);
        return view('user.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => ['required'],
            'qty' => ['required'],
            'price' => ['required']
        ]);


        $product = new Product();
        if ($request->hasFile('thumb_image')) {
            $document = $request->file('thumb_image');
            $newName = rand() . '.' . $document->getClientOriginalName();
            $document->move(public_path('uploads/'), $newName);
            $path = "/uploads/" . $newName;
            $product->thumb_image = $path;
        }


        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->qty = $request->qty;
        $product->brand_name = $request->brand_name;
        $product->price = $request->price;
        $product->short_desc = $request->short_desc;
        $product->status = $request->status;
        $product->save();

        return redirect()->route('user.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd($id);
        $product = Product::findOrFail($id);
        return view('user.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required'],
            'qty' => ['required'],
            'price' => ['required']
        ]);


        $product = Product::findOrFail($id);
        if ($request->hasFile('thumb_image')) {
            if (File::exists(public_path($product->thumb_image))) {
                File::delete(public_path($product->thumb_image));
            }

            $thumb_image = $request->thumb_image;
            $new_name = rand() . '.' . $thumb_image->getClientOriginalName();
            $thumb_image->move(public_path('uploads'), $new_name);
            $path = "/uploads/" . $new_name;
            $product->thumb_image = $path;
        }


        $product->name = $request->name;
        $product->qty = $request->qty;
        $product->brand_name = $request->brand_name;
        $product->price = $request->price;
        $product->short_desc = $request->short_desc;
        $product->status = $request->status;
        $product->save();

        return redirect()->route('user.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if (File::exists(public_path($product->thumb_image))) {
            File::delete(public_path($product->thumb_image));
        }
        $product->delete();

        return redirect()->back();
    }

    public function variantItemsByProductId($product_id)
    {
        $product = Product::findOrFail($product_id);
        $items = $product->variantItems;

        return response()->json([
            'status' => true,
            'data' => $items,
            'message' => 'Product variant items retrieved successfully.'
        ]);
    }
}
