@extends('layouts.app')

@section('content')
<header class="item header margin-top-0" style="background-image: url(images/getstarted.jpeg); width: 100%; " id="section-home" data-stellar-background-ratio="0.5">
	<div class="wrapper">
		<div class="container">
			<div class="row intro-text align-items-center justify-content-center">
				<div class="col-md-10 animated tada">
					<center>
						<h1 class="site-heading site-animate" style="font-size: 47px;">
							Service quality assurance<strong class="d-block" data-scrollreveal="enter top over 1.5s after 0.1s">ANEKA MOTOR</strong></h1>

					</center><br><br>
					<div class="item content">
						<div class="container text-center">
							<a href="{{ url('booking') }}" class="homebrowseitems">Booking Service
								<div class="homebrowseitemsicon">
									<i class="fa fa-star fa-spin"></i>
								</div>
							</a>
						</div>
					</div>
					<br />
				</div>
			</div>
		</div>
	</div>
</header>

<div class="item content">
	<div class="container toparea">
		<div class="row text-center">
			<div class="col-md-4">
				<div class="col editContent">
					<span class="numberstep"><i class="far fa-laugh-beam"></i></span>
					<h3 class="numbertext">Satisfaction Guaranteed</h3>
					<p>
						After finishing the service, of course, your motorbike will be more comfortable and make your trip more comfortable.
					</p>
				</div>
				<!-- /.col-md-4 -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4 editContent">
				<div class="col">
					<span class="numberstep"><i class="far fa-calendar-alt"></i></i></span>
					<h3 class="numbertext">Operational Hours</h3>
					<p>
						Our motorbike repair shop operating hours are Monday-Saturday from 8 am-7pm and are closed every Sunday.
					</p>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4 editContent">
				<div class="col">
					<span class="numberstep"><i class="fas fa-tags"></i></i></span>
					<h3 class="numbertext">Promo</h3>
					<p>
						Every motorbike service in our service shop 10 times will get a 10% discount for the next service (use discount is only valid once).
					</p>
				</div>
			</div>
		</div>
	</div>
</div><br><br>
<!-- CONTENT =============================-->
<section class="item content">
	<div class="container toparea2">
	<div class="underlined-title">
		<div class="editContent">
			<h1 class="text-center latestitems">READ THIS, HEHE</h1>
		</div>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>
		<div class="row">
			<div class="col-md-8">
				<div class="productbox2">
					<img src="images/getstarted.jpg" alt="" width="100%">
					<div class="clearfix">
					</div>
					<br />
					<div class="product-details text-left">
						<p style="font-size: 15px; color: #444; text-align:justify;"> Motorbikes are a valuable asset in society because motorbikes can be a means of transportation, a hobby and, a lifestyle.
							Therefore, it is necessary to repair it periodically so that it is not damaged.
							Aneka Motor Wlingi provides a workshop that guarantees excellent, fast and affordable service quality
							<a target="_blank" rel="nofollow" href="{{ url('booking') }}">for booking now...</a>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<h2 class="btn btn-buynow">Price list</h2>
				<div class="properties-box">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Type of Service</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>
							@foreach($jenis_services as $jenis_service )
							<tr>
								<td style="color: #444;">{{ $no++ }}</td>
								<td style="color: #444;">{{ $jenis_service->name }}</td>
								<td style="color: #444;">Rp. {{ number_format($jenis_service->price) }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div><br>
</section>
<!-- LATEST ITEMS =============================-->
<section class="item content">
	<div class="container">
		<div class="underlined-title">
			<div class="editContent">
				<h1 class="text-center latestitems" style="color: #444;;">LATEST NEWS</h1>
			</div>
			<div class="wow-hr type_short">
				<span class="wow-hr-h">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3>okesport</h3>
							<p>
								Andrea Dovizioso bakal jajal RSGP di tes permusim Jerez pada Juli mendatang - MotoGP...
							</p>
							<p>
								<a href="https://sports.okezone.com/read/2021/03/17/38/2379563/kejutan-dovizioso-ambil-bagian-di-motogp-2021?page=1" class="learn-more detailslearn"><i class="fab fa-readme"></i></i> Read</a>
							</p>
						</div>
						<span class="maxproduct"><img src="images/product1-1.jpg" ajpeglt=""></span>
					</div>
					<div class="product-details" style="font-weight: bold;">
						<h1>Kejutan! Dovizioso Ambil Bagian di MotoGP 2021</h1>
					</div>
				</div>
			</div>
			<!-- /.productbox -->
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3>detiksport</h3>
							<p>
								Franco Morbidelli menilai persaingan MotoGP
								2021 bakal berkutat di antara Ducati, Yamaha
								dan Suzuki ...
							</p>
							<p>
								<a href="https://sport.detik.com/moto-gp/d-5499093/morbidelli-motogp-2021-hadirkan-duel-ducati-yamaha-suzuki" class="learn-more detailslearn"><i class="fab fa-readme"></i></i> Read</a>
							</p>
						</div>
						<span class="maxproduct"><img src="images/product2.jpeg" alt=""></span>
					</div>
					<div class="product-details">
						<h1>Morbidelli: MotoGP 2021 Hadirkan Duel Ducati-Yamaha-Suzuki</h1>
					</div>
				</div>
			</div>
			<!-- /.productbox -->
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3>okesport</h3>
							<p>
								Pembalap Suzuki Ecstar, Alex Rins, mengaku
								tak sabar untuk segera kembali bersaing di
								lintasan pada MotoGP 2021 inI ...
							</p>
							<p>
								<a href="https://sports.okezone.com/read/2021/03/19/38/2380317/jelang-motogp-2021-rins-tak-sabar-kembali-bersaing-di-lintasan" class="learn-more detailslearn"><i class="fab fa-readme"></i></i> Read</a>
							</p>
						</div>
						<span class="maxproduct"><img src="images/product2-3.jpg" alt=""></span>
					</div>
					<div class="product-details">
						<h1>Jelang MotoGP 2021, Rins Tak Sabar
							Kembali Bersaing di Lintasan</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
</div><br><br>
@endsection