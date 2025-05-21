@extends('user.layout.master')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Product Variant Items</h3>
      
            <a class="btn btn-primary" href="{{ route('user.product-variant-item.create', ['product_id' => request()->product_id, 'variant_id' => $variant->id]) }}">Create New</a>
        
        </div>
        <div class="card-body">
           <div class="d-flex justify-content-center align-items-center flex-column">
    <h5>Product Name: {{ $product->name }}</h5>
    <h5>Variant Name: {{ $variant->name }}</h5>
    <img src="{{ asset($product->thumb_image) }}" width="150px" alt="{{ $product->name }}">
</div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Variant Item Name</th>
                         <th scope="col">Price</th>
                          <th scope="col">Is Default</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
      
                <tbody>
              
               
                          @forelse ($items as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                          
                            <td>{{ $item->name }}</td>
                               <td>{{ $item->price }}</td>
               

                                 <td>
                                @if ($item->is_default === 1)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-warning">No</span>
                                @endif
                            </td>


                            <td>
                                @if ($item->status === 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-warning">Inactive</span>
                                @endif
                            </td>
                        
                        
                
                                <td><a href="{{ route('user.product-variant-item.edit', ['product_id' => $product->id, 'variant_id' => $variant->id, 'item_id' => $item->id]) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('user.product-variant-item.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
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
