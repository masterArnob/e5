<?php

use App\Models\Inventory;
use App\Models\StockMovement;

class InventoryService
{
    public static function applyMovement(StockMovement $movement)
    {
        // Find or create inventory record
        $inventory = Inventory::firstOrCreate([
            'product_id' => $movement->product_id,
            'product_variant_item_id' => $movement->product_variant_item_id,
        ]);

        // Determine quantity adjustment
        $qty = $movement->quantity;

        switch ($movement->type) {
            case 'purchase':
            case 'return':
                $inventory->stock += $qty;
                break;

            case 'sale':
                $inventory->stock -= $qty;
                break;

            case 'adjustment':
                $inventory->stock = $qty;
                break;
        }

        $inventory->save();
    }
}
