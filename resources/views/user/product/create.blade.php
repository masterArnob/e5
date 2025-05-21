@extends('user.layout.master')
@section('content')
   <div class="row">
    <div class="col-lg-12">
         <div class="card mx-5">
        <div class="card-header d-flex justify-content-between">
            <h3>Create Products</h3>
           
        </div>
        <div class="card-body">
            <form action="{{ route('user.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

             

                <label for="" class="form-label">Thumb Image</label>
                <input type="file" name="thumb_image" class="form-control">
                   <x-input-error :messages="$errors->get('thumb_image')" class="mt-2" />

                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
                   <x-input-error :messages="$errors->get('name')" class="mt-2" />


                 <label for="" class="form-label">Brand Name</label>
                <input type="text" class="form-control" name="brand_name">
                   <x-input-error :messages="$errors->get('brand_name')" class="mt-2" />

                 <label for="" class="form-label">Qty</label>
                <input type="number" class="form-control" name="qty">
                   <x-input-error :messages="$errors->get('qty')" class="mt-2" />

                 <label for="" class="form-label">Short Desription</label>
                <input type="text" class="form-control" name="short_desc">
                   <x-input-error :messages="$errors->get('short_desc')" class="mt-2" />

                 <label for="" class="form-label">Price</label>
                <input type="text" class="form-control" name="price">
                   <x-input-error :messages="$errors->get('price')" class="mt-2" />

                <label for="" class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                   <x-input-error :messages="$errors->get('status')" class="mt-2" />
        
                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
   </div>
@endsection
