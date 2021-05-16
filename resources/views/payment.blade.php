@extends('layouts.app')

@section('content')
<div class="container py-4">
    <br><br><br>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('history') }}"> History</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Payment</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card shadow">
                <div class="card-body" style="color: black;">
                    <p>For payment, please transfer to the account below:</p>
                    <div class="media">
                        <img class="mr-3" src="{{ url('images/bri.png') }}" alt="Bank BRI" width="60">
                        <div class="media-body">
                            <h5 class="mt-0" style="color: black;">BANK BRI</h5>
                            No. Rekening 025190-002-842 on behalf of the <strong>Bengkel Aneka Motor Wlingi</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 style="color: black;"><i style="color: black;" class="fa fa-pencil-alt"></i> Payment Confirmation</h4>
                    @if(!empty($service))
                    <h2 style="color: red; font-size: 12pt;" align="right">Your total bill is Rp. {{ number_format($service->total_price)}}</h2>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br />
                        @endforeach
                    </div>
                    @endif
                    <form method="POST" action="{{ url('payment') }}/{{ $service->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="namaRek" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col">
                                <input placeholder="Enter Your name.." style="background-color: #ecebeb; color: black;" id="namaRek" type="text" class="form-control @error('namaRek') is-invalid @enderror" name="namaRek">

                                @error('namaRek')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank" class="col-md-2 col-form-label text-md-right">Bank</label>

                            <div class="col">
                                <input placeholder="The sending bank.." style="background-color: #ecebeb; color: black;" id="email" type="text" class="form-control @error('bank') is-invalid @enderror" name="bank">

                                @error('bank')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total" class="col-md-2 col-form-label text-md-right">Total</label>

                            <div class="col">
                                <input placeholder="Payment Amount.." style="background-color: #ecebeb; color: black;" id="total" type="text" class="form-control @error('total') is-invalid @enderror" name="total">

                                @error('total')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="buktiPayment" class="col-md-2 col-form-label text-md-right">Photo Proof</label>

                            <div class="col">
                                <input value="Upload" placeholder="Enter Photo Proof.." style="background-color: #ecebeb; color: black;" id="buktiPayment" type="file" class="form-control @error('buktiPayment') is-invalid @enderror" name="buktiPayment">

                                @error('buktiPayment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div><br><br>
@endsection