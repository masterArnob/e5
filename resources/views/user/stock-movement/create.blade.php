@extends('user.layout.master')
@section('content')
    <div class="container mt-5">
        <h2>Create Stock Movement</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('user.stock-movement.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="product_id" class="form-label">Product</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">Select Product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="product_variant_item_id" class="form-label">Variant (if any)</label>
                <select name="product_variant_item_id" id="product_variant_item_id" class="form-control">
                    <option value="">Select Variant</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Movement Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="purchase">Purchase</option>
                    <option value="sale">Sale</option>
                    <option value="adjustment">Adjustment</option>
                    <option value="return">Return</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Note (optional)</label>
                <textarea name="note" id="note" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Movement</button>
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#product_id').change(function() {
                var productId = $(this).val();
                if (productId) {
                    $.ajax({
                        url: '/user/product/variant-items/' + productId,
                        type: 'GET',
                        success: function(data) {
                            $('#product_variant_item_id').empty();
                            $('#product_variant_item_id').append(
                                '<option value="">Select Variant</option>');
                            $.each(data.data, function(key, value) {
                                $('#product_variant_item_id').append('<option value="' +
                                    value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#product_variant_item_id').empty();
                    $('#product_variant_item_id').append('<option value="">Select Variant</option>');
                }
            });
        });
    </script>
@endpush
