@extends('layouts.adminApp')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card  shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold" style="color: 	#8B0000;">Booking Data</h6>
                    </div>
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Customer's Name</th>
                                        <th>Date</th>
                                        <th>Booking Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->service_date }}</td>
                                        <td>
                                            {{ $service->status }}
                                            <br>
                                            @if($service->queue != null)
                                            No : {{ $service->queue }}
                                        </td>
                                        @endif
                                        <td>
                                            @if($service->status == 'pending' || $service->status == 'Being serviced' || $service->status == 'Queue available')
                                            <a href="{{ url('bookingdata/detail') }}/{{ $service->id }}" class="btn" style="background: #8B0000; color: white;"><i class="fa fa-info"></i> Detail</a>
                                            @elseif($service->status == 'Service complete')
                                            <a href="{{ url('bookingdata/invoice') }}/{{ $service->id }}" class="btn" style="background: #8B0000; color: white;"><i class="fa fa-info"></i> Input Invoice</a>
                                            @elseif($service->status == 'Waiting for payment')
                                            <a href="{{ url('bookingdata/invoiceDone') }}/{{ $service->id }}" class="btn" style="background: #8B0000; color: white;"><i class="fa fa-info"></i> Invoice</a>
                                            @elseif($service->status == 'Payment success'||  $service->status == 'Waiting for payment')
                                            <a href="#" class="btn" style="background: #8B0000; color: white;"><i class="fa fa-info"></i> See Payment</a>
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
</section>
@endsection