@extends('user.layout.master')
@section('content')
   <div class="row">
    <div class="col-lg-12">
         <div class="card mx-5">
        <div class="card-header d-flex justify-content-between">
            <h3>Edit Products</h3>
           
        </div>
        <div class="card-body">
            <form action="{{ route('user.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

             

                
                <label for="" class="form-label">Thumb Image</label>
                <br>
                <img src="{{ asset($product->thumbb_image) }}" width="150px">
                <br>
                <input type="file" name="thumb_image" class="form-control">
                   <x-input-error :messages="$errors->get('thumb_image')" class="mt-2" />

                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                   <x-input-error :messages="$errors->get('name')" class="mt-2" />


                 <label for="" class="form-label">Brand Name</label>
                <input type="text" class="form-control" name="brand_name" value="{{ $product->brand_name }}">
                   <x-input-error :messages="$errors->get('brand_name')" class="mt-2" />

                 <label for="" class="form-label">Qty</label>
                <input type="number" class="form-control" name="qty" value="{{ $product->qty }}">
                   <x-input-error :messages="$errors->get('qty')" class="mt-2" />

                 <label for="" class="form-label">Short Desription</label>
                <input type="text" class="form-control" name="short_desc" value="{{ $product->short_desc }}">
                   <x-input-error :messages="$errors->get('short_desc')" class="mt-2" />

                 <label for="" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                   <x-input-error :messages="$errors->get('price')" class="mt-2" />

                <label for="" class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option {{ $product->status === '1' ? 'selected' : '' }} value="1">Active</option>
                    <option {{ $product->status === '0' ? 'selected' : '' }} value="0">Inactive</option>
                </select>
                   <x-input-error :messages="$errors->get('status')" class="mt-2" />
        
                <button type="submit" class="mt-3 btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    </div>
   </div>
@endsection
