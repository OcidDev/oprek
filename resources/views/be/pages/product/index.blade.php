@extends('layouts.be-app')

@section('title')
    Dashboard | Product
@endsection
@push('before-style')
@endpush

@section('content')
    <div class="container-fluid">

        <div class="card mt-4">
            <div class="card-body">
                <a class="btn btn-primary" href="{{ route('product.create') }}" role="button">Add Data</a>
                <div class="table-responsive mt-2">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Category</th>
                                <th scope="col">Product Description</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($products as $item)
                                <tr>
                                    <th scope="col">{{ $no++ }}</th>
                                    <th scope="col">{{ $item->name }}</th>
                                    <th scope="col">{{ $item->categories->name }}</th>
                                    <th scope="col">{{ $item->description }}</th>
                                    <th scope="col">{{ $item->price }}</th>
                                    <th scope="col">
                                        <a class="btn btn-warning" href="{{ route('product.edit', $item->id) }}"
                                            role="button">Edit</a>
                                        <form method="post" action="{{ route('product.destroy', $item->id) }}">
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
