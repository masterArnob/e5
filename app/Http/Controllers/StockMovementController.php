<?php

namespace App\Http\Controllers;

use InventoryService;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StockMovement;
use App\Models\ProductVariantItem;

class StockMovementController extends Controller
{
    /**
     * Display a listing of the stock movements.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movements = auth()->user()->stockMovements()->latest()->paginate(10);
        return view('user.stock-movement.index', compact('movements'));
    }

    /**
     * Show the form for creating a new stock movement.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $products = Product::all();
        return view('user.stock-movement.create', compact('products'));
    }

    /**
     * Store a newly created stock movement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_variant_item_id' => 'nullable|exists:product_variant_items,id',
            'type' => 'required|in:purchase,sale,adjustment,return',
            'quantity' => 'required|integer|min:1',
        ]);

        // Save stock movement
        $movement = StockMovement::create($request->only([
            'product_id',
            'product_variant_item_id',
            'type',
            'quantity',
            'note'
        ]));

        // Update inventory
        InventoryService::applyMovement($movement);

        // Redirect to index with success message
        return redirect()->route('stock-movements.create')->with('success', 'Stock movement created successfully.');
    }

    /**
     * Display the specified stock movement.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        // Logic to display a specific stock movement
    }

    /**
     * Show the form for editing the specified stock movement.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        // Logic to show form for editing a stock movement
    }

    /**
     * Update the specified stock movement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {
        // Logic to update a stock movement
    }

    /**
     * Remove the specified stock movement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy($id)
    {
        // Logic to delete a stock movement
    }
}
