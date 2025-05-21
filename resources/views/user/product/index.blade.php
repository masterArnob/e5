@extends('user.layout.master')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Products</h3>
        <a class="btn btn-primary" href="{{ route('user.product.create') }}">Create New</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Thumb Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Short Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                     <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>
                            <img src="{{ asset($product->thumb_image) }}" width="150px">
                        </td>
                        <td>{{ $product->name }}</td>
                         <td>{{ $product->brand_name }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->short_desc }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            @if ($product->status === 1)
                                <span class="badge bg-success">Active</span>
                            @else
                             <span class="badge bg-warning">Inactive</span>                             
                            @endif
                        </td>
                         <td><a href="{{ route('user.product.edit', $product->id) }}" class="btn btn-success">Edit</a></td>
                          <td>
                        <form action="{{ route('user.product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                          <td>
                            <div class="btn-group dropstart">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    More
  </button>
  <ul class="dropdown-menu">
 <li><a href="{{ route('user.product-variant.index', ['product_id' => $product->id]) }}" class="dropdown-item" type="button">Variant</a></li>

    
  </ul>
</div>
                          </td>
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