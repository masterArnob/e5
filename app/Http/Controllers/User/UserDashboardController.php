<?php

namespace App\Http\Controllers\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserDashboardController extends Controller
{
    public function dashboard(){


        $total_product = Product::where(['user_id' => Auth::user()->id])->count();
       $low_stock = Product::where('user_id', Auth::user()->id)
                    ->where('qty', '<', 3)
                    ->count();
       
    
        $total_inventory_value = Product::where('user_id', Auth::user()->id)
                               ->sum(DB::raw('price * qty'));

        $active_products = Product::where(['user_id' => Auth::user()->id, 'status' => '1'])->count();
        return view('user.dashboard', compact('total_product', 'low_stock', 'total_inventory_value', 'active_products'));
    }
}
