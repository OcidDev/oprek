@extends('layouts.be-app')

@section('title')
    Dashboard | Product Create
@endsection
@push('before-style')
@endpush

@section('content')
    <div class="container-fluid">

        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="categories_id" class="form-label">Product Name</label>
                        <select class="form-select" aria-label="Default select example" id="categories_id"
                            name="categories_id" required>
                            <option disabled selected>Choose one category</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_description" class="form-label">Product Description</label>
                        <input type="text" class="form-control" id="product_description" name="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_price" class="form-label">Product Price</label>
                        <input type="number" class="form-control" id="product_price" name="price" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>

    </div> <!-- container -->
@endsection

@push('before-script')
@endpush
