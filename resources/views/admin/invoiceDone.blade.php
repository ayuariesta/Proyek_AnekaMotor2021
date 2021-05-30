@extends('layouts.adminApp')

@section('content')
<div class="col-md-12">
    <a href="{{ url('bookingdata') }}" class="btn" style=" background:  #8B0000; color: white;"><i class="fa fa-arrow-left"></i> Back</a>
    @if(!empty($booking))
    <a href="{{ url('bookingdata/invoice/print') }}/{{ $booking->id }}" class="btn" style=" background:  #8B0000; color: white;" target="_blank"><i class="fas fa-print"></i> Print PDF</a>
</div>
<div class="col-md-12">
    <div class="card mt-2">
        <div class="card-body" style="color: black;">
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
                            </tbody>
                        </table>
                        @endforeach
                        <table class="table table-striped"">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Sparepart Name</th>
                                <th>Total Sparepart</th>
                                <th>Price</th>
                                <th style="text-align: right;">Total Price</th>
                        </thead>
                        <tbody >
                            <?php $no = 1; ?>
                            @foreach($service_details as $service_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $service_detail->sparepart->nameS }}</td>
                                <td>{{ $service_detail->total_sparepart }} sparepart </td>
                                <td>Rp. {{ number_format($service_detail->sparepart->price) }}</td>
                                <td align=" right">Rp. {{ number_format($service_detail->total_price) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan=" 4" align="right"><strong>Service Price :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($booking->priceService) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan=" 4" align="right"><strong>Total Price :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($booking->total_price) }}</strong></td>
                            </tr>
                            </tbody>
                        </table><br>
                        @endif
                        <h3 style="font-size: 16px; text-align: center; color: gray;"><b>Hormat Kami,</b></h3>
                        <br><br><br><br>
                        <h4 style="font-size: 14px; text-align: center; color: gray;">Admin Aneka Motor</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection