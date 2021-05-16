@extends('layouts.app')

@section('content')
<header class="item1 header margin-top-0" style="background-image: url(images/getstarted.jpeg);  width: 100%;
    height: 500px; " id="section-home" data-stellar-background-ratio="0.5">
    <div class="wrapper">
        <div class="container">
            <div class="row intro-text align-items-center justify-content-center">
                <div class="col-md-10 animated tada">
                    <center>
                        <h1 class="site-heading site-animate" style="font-size: 47px;">
                            <strong class="d-block" data-scrollreveal="enter top over 1.5s after 0.1s">Service History</strong>
                        </h1><br><br><br><br><br><br><br>
                    </center>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="item content">
    <div class="container toparea1">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Motorcycle Name</th>
                                    <th>Service Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($bookings as $booking)
                                <tr class="text-center">
                                    <td style="color: #444;">{{ $no++ }}</td>
                                    <td style="color: #444;">{{ $booking->nama_motor }}</td>
                                    <td style="color: #444;">{{ $booking->service_date }}</td>
                                    <td style="color: #444;">
                                        <a href="{{ url('serviceHistory') }}/{{ $booking->id }}" class="btn btn-primary"><i class="fa fa-info"></i> Detail History Service</a>
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
</section><br><br>
@endsection