<!DOCTYPE html>
<html>
<head>
	<title>AnekaMotor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @if(!empty($booking))
    <center>
        <p style="color: #008080;"><b style="font-size: 24px;">Bengkel Aneka Motor Wlingi </b><br> Beru, Wlingi, Blitar, East Java 66184, Indonesia <br> No. HP : +62 857-8160-6016
        </p>
    </center>
    <hr style="color: gray;">
    <h6 style="color: gray; font-size: 15px; ">No. Queue&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->queue }} <br> Service Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->service_date }} <br> Name of STNK &nbsp;: {{ $booking->name_stnk }}</h6>
    <br>
    <h4 style="color:  #008080;" > Invoice</h4>
    <table class="table">
        <tbody style="color: gray;">
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
    <table class='table table-striped'>
        <thead>
        <tr style=" color: gray;">
        <th>No.</th>
        <th>Sparepart Name</th>
        <th>Total Sparepart</th>
        <th>Price</th>
        <th style=" text-align: right;">Total Price</th>
        </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach($service_details as $service_detail)
            <tr style="color: gray;">
                <td>{{ $no++ }}</td>
                <td>{{ $service_detail->sparepart->nameS }}</td>
                <td>{{ $service_detail->total_sparepart }} sparepart </td>
                <td>Rp. {{ number_format($service_detail->sparepart->price) }}</td>
                <td align=" right">Rp. {{ number_format($service_detail->total_price) }}</td>
            </tr>
            @endforeach
            <tr style="color: gray;">
                <td colspan=" 4" align="right"><strong>Service Price :</strong></td>
                <td align="right"><strong>Rp. {{ number_format($booking->priceService) }}</strong></td>
            </tr>
            <tr style="color: gray;">
                <td colspan=" 4" align="right"><strong>Total Price :</strong></td>
                <td align="right"><strong>Rp. {{ number_format($booking->total_price) }}</strong></td>
            </tr>
        </tbody>
    </table><br>
    @endif
    <h3 style="font-size: 16px; text-align: center; color: gray;"><b>Hormat Kami,</b></h3>
    <br><br><br><br>
    <h4 style="font-size: 14px; text-align: center; color: gray;">Admin Aneka Motor</h4>
</body>

</html>