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
                    <li class="breadcrumb-item"><a href="{{ url('serviceHistory') }}">Service History</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Service Detail</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-body" style="color: black;">
                    @if(!empty($booking))
                    <p>Id Service : {{ $booking->id }} / Booking Date : {{ $booking->service_date }}</p>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 style="color: #8B0000;"><i class="fas fa-history" style="color: #8B0000;"></i> Service Detail</h4>
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
                                        <tr>
                                            <td>Service Action</td>
                                            <td>:</td>
                                            <td>{{ $booking->tindakan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Type of Service</td>
                                            <td>:</td>
                                            <td>{{ $booking->jenis_service }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                                <h5 style="color: gray;">Spare parts needed : </h5><br>
                                <table class="table table-striped"">
                                <thead>
                                 <tr style=" color: gray;">
                                    <th>No.</th>
                                    <th>Sparepart Name</th>
                                    <th>Total Sparepart</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach($service_details as $service_detail)
                                        <tr style="color: gray;">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $service_detail->sparepart->nameS }}</td>
                                            <td>{{ $service_detail->total_sparepart }} sparepart </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br>
@endsection