@extends('user.layout.master')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Product Variants</h3>
            <a class="btn btn-primary" href="{{ route('user.product-variant.create', ['product_id' => request()->product_id]) }}">Create New</a>
        </div>
        <div class="card-body">
           <div class="d-flex justify-content-center align-items-center flex-column">
    <h5>Product Name: {{ $product->name }}</h5>
    <img src="{{ asset($product->thumb_image) }}" width="150px" alt="{{ $product->name }}">
</div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Variant Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
              
               
                          @forelse ($variants as $variant)
                        <tr>
                            <th scope="row">{{ $variant->id }}</th>
                          
                            <td>{{ $variant->name }}</td>
               
                            <td>
                                @if ($variant->status === 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-warning">Inactive</span>
                                @endif
                            </td>
                        
                        
                                <td><a href="{{ route('user.product-variant.edit', ['product_id' => $product->id, 'variant_id' => $variant->id]) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('user.product-variant.destroy', $variant->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                            <td><a href="{{ route('user.product-variant-item.index', ['product_id' => $product->id, 'variant_id' => $variant->id]) }}" class="btn btn-info">Variant Items</a></td>
                        
                    
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No data available!</td>
                        </tr>
                    @endforelse
             

                </tbody>
            </table>
        </div>
    </div>
@endsection
