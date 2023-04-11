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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('cart.store') }}" class="table-responsive" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="products_id">Select Product</label>
                                <select class="form-select" id="products_id" name="products_id"
                                    @error('products_id') is-invalid @enderror" required
                                    aria-label="Default select example">
                                    <option selected disabled>Open this select menu</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @error('products_id')
                                    <span class="text-danger"></span>
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="qty" class="form-label">Quantity</label>
                                <input type="number" id="qty" name="qty" class="form-control"
                                    aria-labelledby="passwordHelpBlock">
                            </div>
                            <button type="submit" class="btn btn-primary">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>

        <div class="card">
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
                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $item->products->name }}<br>{{ $item->products->categories->name }}</td>
                                    <td><input name="qty" type="number" style="width:100px !important"
                                            value="{{ $item->qty }}" class="form-control w-10" size="20"></td>
                                    <td>Rp {{ number_format($item->products->price * $item->qty) }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-warning me-2">Update</button>
                                            </form>
                                            <form method="post" action="{{ route('cart.destroy', $item->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                    </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><b>Total</b></td>
                                <td colspan="2"><b>Rp {{ number_format($total) }}</b></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div> <!-- container -->
@endsection

@push('before-script')
@endpush
