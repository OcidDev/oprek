@extends('layouts.be-app')

@section('title')
    Dashboard | Category
@endsection
@push('before-style')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive mt-2">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">Invoice</th>
                                <th scope="col">Cashier Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Transaction Date</th>
                                <th scope="col" colspan="2">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $transactions->invoice }}</td>
                                <td>{{ $transactions->cashier->name }}</td>
                                <td>{{ $transactions->transaction_details->products->name }}</td>
                                <td>{{ $transactions->transaction_date }}</td>
                                <td>{{ number_format($transactions->total) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div> <!-- container -->
@endsection

@push('before-script')
@endpush
