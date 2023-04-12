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
                                <th scope="col">No</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Cashier Name</th>
                                <th scope="col">Transaction Date</th>
                                <th scope="col" colspan="2">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $transaction->invoice }}</td>
                                    <td>{{ $transaction->cashier->name }}</td>
                                    <td>{{ $transaction->transaction_date }}</td>
                                    <td>{{ number_format($transaction->total) }}</td>
                                    <td> <a class="btn btn-success" href="{{ route('transaction.show',$transaction->id) }}">Show Details</a> </td>
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
