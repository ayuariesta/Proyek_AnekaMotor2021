@extends('layouts.adminApp')

@section('content')
<div class="col-md-12">
    <a href="{{ url('bookingdata') }}" class="btn" style=" background:  #8B0000; color: white;"><i class="fa fa-arrow-left"></i> Back</a>
</div>
<div class="col-md-12">
    <div class="card mt-2">
        <div class="card-body" style="color: black;">
            @if(!empty($booking))
            <div class="col-md-12">
                <center>
                    <p style="color: #008080;"><b style="font-size: 20px;">Bengkel Aneka Motor Wlingi </b><br> Beru, Wlingi, Blitar, East Java 66184, Indonesia <br> No. HP : +62 857-8160-6016
                    </p>
                </center>
                <hr>
                <h6 style="color: gray;">No. Queue&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->queue }} <br> Service Date &nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->service_date }} <br> Name of STNK &nbsp;: {{ $booking->name_stnk }}</h6>
                <div class="card">
                    <div class="card-body">
                        <h4 style="color: #8B0000;" <i class="fas fa-receipt" style="color: #8B0000;"></i> Invoice</h4>
                        <table class="table">
                            <tbody>
                                @foreach($bookings as $booking)
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('bookingdata/detail/input_queue') }}/{{ $booking->id }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="squareInput" class="col-md-5 col-form-label" style="color: #8B0000;">Type of services</label>
                                <div class="col-md-7">
                                    <select class="custom-select" name="id_ongkir">
                                        <option selected>Select Type of Service</option>
                                        @foreach($jenisServices as $jenisService)
                                        <option value="{{ $jenisService->id }}">{{ $jenisService->name }} - Rp. {{number_format($jenisService->price)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="queue" class="col-md-5 col-form-label" style="color: #8B0000;">Service Actions</label>

                                <div class="col-md-7">
                                    <textarea placeholder="Enter service actions..." required="" style="color: gray;" id="tindakan" class="form-control @error('tindakan') is-invalid @enderror" name="tindakan"></textarea>
                                    
                                    @error('tindakan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row mb-0 mt-0">
                                <div class="col-md-12 offset-md-0" align="right">
                                <button type="submit" class="btn" style=" width: 200px;font-weight: bold; font-size: 16px; background:  black; color: white;">
                                Add Spareparts
                                    </button>
                                    <button type="submit" class="btn" style=" width: 100px;font-weight: bold; font-size: 16px; background:  #8B0000; color: white;">
                                        Send
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection