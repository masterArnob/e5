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
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Variant Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movements as $movement)
                        <tr>
                            <th scope="row">{{ $movement->id }}</th>
                            <td>{{ $movement->product->name }}</td>
                            <td>{{ $movement->variant->name }}</td>
                            <td>{{ $movement->quantity }}</td>
                            <td>{{ $movement->type }}</td>
                            <td>{{ $movement->created_at->format('Y-m-d H:i:s') }}</td>
                            <td><a href="{{ route('user.stock-movement.edit', ['id' => $movement->id]) }}"
                                    class="btn btn-success">Edit</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No stock movements found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $movements->links() }}
        </div>
    </div>
@endsection
