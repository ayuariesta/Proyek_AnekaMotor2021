@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active"" aria-current="page"> Order History</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="color: black;">
                    <h3 style="color: black;"><i class="fa fa-history"></i> Order History</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Service Date</th>
                                <th>Name of Motor</th>
                                <th>Queue Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($bookings as $booking)
                            <tr>
                                <td style="color: black;">{{ $no++ }}</td>
                                <td style="color: black;">{{ $booking->service_date }}</td>
                                <td style="color: black;">
                                   {{$order->queue}}
                                   <br>
                                   @if($order->queue != null)
                                   No. Receipt : {{ $order->queue}}
                                </td>
                                @endif
                                <td style="color: black;">Rp. {{ number_format($order->total_price+$order->code_unic) }}</td>
                                <td style="color: black;">
                                <a href="{{ url('history') }}/{{ $order->id }}" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                                @if($order->status == 'Waiting for payment')
                                    <a href="{{ url('payment') }}/{{ $order->id }}" class="btn" style="background-color: 	#FFA07A;"><i class="fa fa-info"></i> Input Payment</a>
                                @else
                                    <a href="{{ url('seePayment') }}/{{ $order->id }}" class="btn" style="background-color: 	#F08080 ;"><i class="fa fa-info"></i> See Payment</a>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection