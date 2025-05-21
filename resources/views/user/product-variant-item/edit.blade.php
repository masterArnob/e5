@extends('user.layout.master')
@section('content')
   <div class="row">
    <div class="col-lg-12">
         <div class="card mx-5">
        <div class="card-header d-flex justify-content-between">
            <h3>Edit Product Variant Item</h3>
           
        </div>
        <div class="card-body">
            <form action="{{ route('user.product-variant-item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

             
                <label for="" class="form-label">Product Image</label>
                <br>
                <img src="{{ asset($product->thumb_image) }}" width="150px">
                <br>

                <label for="" class="form-label">Product Name</label>
                <input type="text" class="form-control" value="{{ $product->name }}" disabled>

                  <label for="" class="form-label">Variant Name</label>
                <input type="text" class="form-control" value="{{ $variant->name }}" disabled>
               

                <label for="" class="form-label">Variant Item Name</label>
                <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                   <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                     <input type="hidden" name="product_variant_id" value="{{ $variant->id }}">
                       <input type="hidden" name="item_id" value="{{ $item->id }}">

              
                       <label for="" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" value="{{ $item->price }}">
                   <x-input-error :messages="$errors->get('price')" class="mt-2" />


                                    <label for="" class="form-label">Is Default:</label>
                <select name="is_default" class="form-control">
                    <option {{ $item->is_default === '1' ? 'selected' : '' }} value="1">Yes</option>
                    <option {{ $item->is_default === '0' ? 'selected' : '' }} value="0">No</option>
                </select>
             
                <label for="" class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option {{ $item->status === '1' ? 'selected' : '' }} value="1">Active</option>
                    <option {{ $item->status === '0' ? 'selected' : '' }} value="0">Inactive</option>
                </select>
                   <x-input-error :messages="$errors->get('status')" class="mt-2" />
        
                <button type="submit" class="mt-3 btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    </div>
   </div>
@endsection
