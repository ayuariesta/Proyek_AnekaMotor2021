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
							<strong class="d-block" data-scrollreveal="enter top over 1.5s after 0.1s">Booking Service</strong>
						</h1><br><br><br><br>
					</center>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- CONTENT =============================-->
<section class="item content">
	<div class="container toparea">
		<div class="underlined-title">
			<div class="editContent">
				<h1 class="text-center latestitems" style="font-size: 18px;">Please complete the form below :)</h1>
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
			<div class="col-md-12 mt-2">
				<form method="POST" action="{{ url('booking') }}/{{ auth()->user()->id }}" id="contactform">
					{{ csrf_field() }}
					<div class="form">
						<div class="col">
							<input class="place @error('name_stnk') is-invalid @enderror" type="text" name="name_stnk" placeholder="Enter the name listed on the STNK">
							@error('name_stnk')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="col">
							<input class="place  @error('number_plat') is-invalid @enderror" type="text" name="number_plat" placeholder="Enter your plate number">
							@error('number_plat')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="col">
							<input class="place @error('service_date') is-invalid @enderror" type="date" name="service_date" placeholder="Enter the service date">
							@error('service_date')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="col">
							<textarea class="place @error('service_complaint') is-invalid @enderror" name="complaint" rows="7" placeholder="Enter your motorcycle complaint"></textarea>
							@error('complaint')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<input type="submit" id="submit" class="clearfix btn" value="Send">
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</section><br><br>
@endsection