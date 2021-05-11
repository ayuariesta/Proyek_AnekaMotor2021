@extends('layouts.adminApp')

@section('content')
<div class="col-md-12">
    <a href="{{ url('bookingdata') }}" class="btn" style=" background:  #8B0000; color: white;"><i class="fa fa-arrow-left"></i> Back</a>
</div>
<div class="col-md-12">
    <div class="card mt-2">
        <div class="card-body" style="color: black;">
            @if(!empty($booking))
            <p style="color: #008080">Status booking is {{ $booking->status }} / A.n {{ $booking->name_stnk }} </p>
            <p>No. Booking : {{ $booking->id }} / Booking Date : {{ $booking->service_date }}</p><br>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('bookingdata/detail/input_queue') }}/{{ $booking->id }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="status" class="col-md-5 col-form-label" style="color: #8B0000;">Status</label>

                                <div class="col-md-7">
                                    <select style="width: 100%;  padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;  resize: vertical; color: gray;" name="status">
                                        <option value="">Select status</option>
                                        <option value="pending">pending</option>
                                        <option value="Queue available">Queue available</option>
                                        <option value="Being serviced">Being serviced</option>
                                        <option value="Service complete">Service complete</option>
                                        <option value="Payment confirmed">Payment confirmed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="queue" class="col-md-5 col-form-label" style="color: #8B0000;">Queue</label>

                                <div class="col-md-7">
                                    <input placeholder="Enter the queue number..." style="background-color: #ecebeb; color: gray;" id="queue" type="text" value="{{ $booking->queue }}" class="form-control @error('queue') is-invalid @enderror" name="queue">

                                    @error('queue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0 mt-0">
                                <div class="col-md-12 offset-md-0" align="right">
                                    <button type="submit" class="btn" style=" width: 100px;font-weight: bold; font-size: 16px; background:  #8B0000; color: white;">
                                        Save
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