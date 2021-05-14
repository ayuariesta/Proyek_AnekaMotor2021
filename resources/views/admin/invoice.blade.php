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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><br>
            <div class="col-md-12">
                <div class="form-group row mb-0 mt-0">
                    <div class="col-md-12 offset-md-0">
                        <a href="/addSaprepart" class="btn" style=" width: 200px;font-weight: bold; font-size: 16px; background:  black; color: white;">
                            Add Spareparts
                        </a>
                    </div>
                    @endforeach
                </div><br>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped"">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Sparepart Name</th>
                                <th>Total Sparepart</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php $no = 1; ?>
                            @foreach($service_details as $service_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $service_detail->sparepart->nameS }}</td>
                                <td>{{ $service_detail->total_sparepart }} sparepart </td>
                                <td>Rp. {{ number_format($service_detail->sparepart->price) }}</td>
                                <td>Rp. {{ number_format($service_detail->total_price) }}</td>
                                <td>
                                    <form action=" {{ url('sparepartDelete') }}/{{ $service_detail->id }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete data?');"><i class="fa fa-trash"></i></button>
                            </form>
                            </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Price :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($booking->total_price) }}</strong></td>
                            </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('InvoiceCompleted') }}/{{ $booking->id }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="squareInput" class="col-md-5 col-form-label" style="color: #8B0000;">Type of services</label>
                                <div class="col-md-7">
                                    <select class="custom-select" name="id_jenisService">
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
                                    <button type="submit" class="btn" style=" width: 540px;font-weight: bold; font-size: 16px; background:  #8B0000; color: white;">
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