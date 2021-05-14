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
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('history') }}">Booking History</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Booking Detail</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-body" style="color: black;">
                    @if(!empty($booking))
                    <p  style="color: #008080">Status booking is {{ $booking->status }} / A.n {{ $booking->name_stnk }} </p>
                    <p >No. Booking : {{ $booking->id }} / Booking Date : {{ $booking->service_date }}</p><br>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 style="color: #8B0000;"><i class="fas fa-history" style="color: #8B0000;"></i> Booking Detail</h4>
                                <table class="table">
                                    <tbody>
                                        @foreach($bookings as $booking)
                                        <tr>
                                            <td>Name of STNK</td>
                                            <td>:</td>
                                            <td>{{ $booking->name_stnk }}</td>
                                        </tr>
                                        <tr>
                                            <td>Motorcycle Name</td>
                                            <td>:</td>
                                            <td>{{ $booking->nama_motor }}</td>
                                        </tr>
                                        <tr>
                                            <td>Motorcycle Type</td>
                                            <td>:</td>
                                            <td>{{ $booking->jenis_motor }}</td>
                                        </tr>
                                        <tr>
                                            <td>Motorcycle license plate</td>
                                            <td>:</td>
                                            <td>{{ $booking->number_plat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Complaint</td>
                                            <td>:</td>
                                            <td>{{ $booking->complaint }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 style="color: #8B0000;"><i style="color: #8B0000;" class="fa fa-pencil-alt"></i> Edit Booking</h4>
                    <br>
                    <form method="POST" action="{{ url('historyEdit') }}/{{ $booking->id }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name_stnk" class="col-md-2 col-form-label text-md-right">Name of STNK</label>

                            <div class="col-md-6">
                                <input style="background-color: #ecebeb; color: black;" id="name_stnk" type="text" class="form-control @error('name_stnk') is-invalid @enderror" name="name_stnk" value="{{ $booking->name_stnk }}">

                                @error('name_stnk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number_plat" class="col-md-2 col-form-label text-md-right">Motorcycle license plate</label>

                            <div class="col-md-6">
                                <input style="background-color: #ecebeb; color: black;" id="number_plat" type="text" class="form-control @error('number_plat') is-invalid @enderror" name="number_plat" value="{{ $booking->number_plat }}">

                                @error('number_plat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name_motor" class="col-md-2 col-form-label text-md-right">Motorcycle Name</label>

                            <div class="col-md-6">
                                <input style="background-color: #ecebeb; color: black;" id="nama_motor" type="text" class="form-control @error('nama_motor') is-invalid @enderror" name="nama_motor" value="{{ $booking->nama_motor }}" required autocomplete="nama_motor">

                                @error('nama_motor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis_motor" class="col-md-2 col-form-label text-md-right">Motorcycle Type</label>

                            <div class="col-md-6">
                                <input style="background-color: #ecebeb; color: black;" id="jenis_motor" type="text" class="form-control @error('jenis_motor') is-invalid @enderror" name="jenis_motor" value="{{ $booking->jenis_motor }}" required autocomplete="jenis_motor" autofocus>

                                @error('jenis_motor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="complaint" class="col-md-2 col-form-label text-md-right">Complaint</label>

                            <div class="col-md-6">
                                <textarea style="background-color: #ecebeb; color: black;" name="complaint" class="form-control @error('complaint') is-invalid @enderror" required="">{{ $booking->complaint }}</textarea>

                                @error('complaint')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary" style="width: 100%; font-weight: bold; font-size: 16px;">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br>
@endsection