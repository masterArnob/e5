@extends('user.layout.master')
@section('content')
   <div class="row">
    <div class="col-lg-12">
         <div class="card mx-5">
        <div class="card-header d-flex justify-content-between">
            <h3>Edit Product Variants</h3>
           
        </div>
        <div class="card-body">
            <form action="{{ route('user.product-variant.update', ['variant_id' => $variant->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf

             @method('PUT')
                <label for="" class="form-label">Product Image</label>
                <br>
                <img src="{{ asset($product->thumb_image) }}" width="150px">
                <br>

                <label for="" class="form-label">Product Name</label>
                <input type="text" class="form-control" value="{{ $product->name }}" disabled>

               

                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $variant->name }}">
                   <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

              

             
                <label for="" class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option {{ $variant->status === '1' ? 'selected' : '' }} value="1">Active</option>
                    <option {{ $variant->status === '1' ? 'selected' : '' }} value="0">Inactive</option>
                </select>
                   <x-input-error :messages="$errors->get('status')" class="mt-2" />
        
                <button type="submit" class="mt-3 btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    </div>
   </div>
@endsection
