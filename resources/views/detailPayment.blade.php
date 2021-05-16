@extends('layouts.app')

@section('content')
<div class="container py-4">
<br><br><br>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('history') }}"> History </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> See Payment </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h3 style="color: gray;"><i class="far fa-money-bill-alt"></i> See Payment</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr style="color: gray;">
                                <th>Account Name</th>
                                <th>Date</th>
                                <th>Bank</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($payments as $payment)
                                <tr style="color: gray;">
                                    <td>{{ $payment->namaRek }}</td>
                                    <td>{{ $payment->order_date }}</td>
                                    <td>{{ $payment->bank }}</td>
                                    <td>Rp. {{ number_format($payment->total) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <img src="{{ url('images/bukti') }}/{{ $payment->buktiPayment }}" width="400" alt="..."> 
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection