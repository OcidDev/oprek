@extends('layouts.be-app')

@section('title')
    Dashboard | Category
@endsection
@push('before-style')
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="" class="table-responsive" method="POST">
                            <label for="seacrh_product" class="form-label">Seacrh Product</label>
                            <input class="form-control" list="products" name="products_id" id="seacrh_product" placeholder="Type to search...">
                            <datalist id="products">
                            @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </datalist>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive mt-2">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">qty</th>
                                <th scope="col">Sub Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($carts as $item)
                                <tr>
                                    <th scope="col">{{ $no++ }}</th>
                                    <th scope="col">{{ $item->products->name }}</th>
                                    <th scope="col">{{ $item->qty }}</th>
                                    <th scope="col">{{ $item->qty * $item->products->price}}</th>
                                    <th scope="col">
                                        <a class="btn btn-warning" href="{{ route('category.destroy', $item->id) }}"
                                            role="button">Edit</a>
                                        <form method="post" action="{{ route('category.destroy', $item->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div> <!-- container -->
@endsection

@push('before-script')
@endpush
