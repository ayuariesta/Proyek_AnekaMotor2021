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
                    <li class="breadcrumb-item active"  aria-current="page"> Payment</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 style="color: black;"><i style="color: black;" class="fa fa-pencil-alt"></i> Payment Confirmation</h4>
                    @if(!empty($service))
                    <h2 style="color: red; font-size: 12pt;"  align="right">Your total bill is Rp. </h2>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                    </div>
                    @endif
                    <form method="POST" action="{{ url('payment') }}/{{ $service->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}                     
                        <div class="form-group row" >
                            <label for="pelanggan" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col">
                                <input placeholder="Enter Your name.." style="background-color: #ecebeb; color: black;"id="name" type="text" class="form-control @error('pelanggan') is-invalid @enderror" name="pelanggan">

                                @error('pelanggan')
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
                                <input placeholder="Payment Amount.." style="background-color: #ecebeb; color: black;" id="nohp" type="text"  class="form-control @error('total') is-invalid @enderror" name="total" >

                                @error('total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="buktiPembayaran" class="col-md-2 col-form-label text-md-right">Photo Proof</label>

                            <div class="col">
                                <input value="Upload" placeholder="Enter Photo Proof.." style="background-color: #ecebeb; color: black;" id="password" type="file" class="form-control @error('buktiPembayaran') is-invalid @enderror" name="buktiPembayaran">
                                
                                @error('buktiPembayaran')
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
</div>
@endsection