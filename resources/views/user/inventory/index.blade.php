@extends('user.layout.master')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Inventory</h3>
            <a class="btn btn-primary" href="{{ route('user.stock-movement.create') }}">Create New</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Variant Item Name</th>
                        <th scope="col">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inventories as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->product?->name }}</td>
                            <td>{{ $item->productVariantItem?->name ?? 'N/A' }}</td>
                            <td>{{ $item->stock }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No inventory stock found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $inventories->links() }}
        </div>
    </div>
@endsection
