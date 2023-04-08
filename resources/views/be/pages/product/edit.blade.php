@extends('layouts.be-app')

@section('title')
    Dashboard | Product Edit
@endsection
@push('before-style')
@endpush

@section('content')
    <div class="container-fluid">

        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('product.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="categories_id" class="form-label">Product Category</label>
                        <select class="form-select" aria-label="Default select example" id="categories_id"
                            name="categories_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $item->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="name"
                            value="{{ $item->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_description" class="form-label">Product Description</label>
                        <input type="text" class="form-control" id="product_description" name="description"
                            value="{{ $item->description }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_price" class="form-label">Product Price</label>
                        <input type="text" class="form-control" id="product_price" name="price"
                            value="{{ $item->price }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>

    </div> <!-- container -->
@endsection

@push('before-script')
@endpush
