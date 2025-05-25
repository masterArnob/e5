@extends('user.layout.master')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Stock Movement</h3>
            <a class="btn btn-primary" href="{{ route('user.stock-movement.create') }}">Create New</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Variant Name</th>
                        <th scope="col">Variant Item Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movements as $movement)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $movement->product?->name }}</td>
                            <td>{{ $movement->productVariantItem ? $movement->productVariantItem?->productVariant?->name : 'N/A' }}
                            </td>
                            <td>{{ $movement->productVariantItem?->name ?? 'N/A' }}</td>
                            <td>{{ $movement->quantity }}</td>
                            <td>{{ Str::ucfirst($movement->type) }}</td>
                            <td>{{ $movement->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No stock movements found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $movements->links() }}
        </div>
    </div>
@endsection
