@extends('user.layout.master')
@section('content')

<div class="text-center">
    <h3>Welcome to {{ Auth::user()->name }} IMS Account</h3>
</div>

      <div class="container-fluid mt-4">
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="card border-0 shadow h-100 p-4 d-flex align-items-center">
                           
                            <div>
                                <h5 class="mb-1">{{ $total_product }}</h5>
                                <p class="text-muted small mb-0">Total Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow h-100 p-4 d-flex align-items-center">
                        
                            <div>
                                <h5 class="mb-1">{{ $low_stock }}</h5>
                                <p class="text-muted small mb-0">Low Stock</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow h-100 p-4 d-flex align-items-center">
                           
                            <div>
                                <h5 class="mb-1">{{ $total_inventory_value }}</h5>
                                <p class="text-muted small mb-0">Total Inventory Value</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow h-100 p-4 d-flex align-items-center">
                           
                            <div>
                                <h5 class="mb-1">{{ $active_products }}</h5>
                                <p class="text-muted small mb-0">Active Products</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection