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
				<form method="post" id="contactform">
					<div class="form">
						<input class="place" type="text" name="name" placeholder="The name of the booking">
						<input class="place" type="text" name="namestnk" placeholder="Enter the name listed on the STNK">
						<input class="place" type="text" name="number" placeholder="Enter your plate number">
						<input class="place" type="date" name="date" placeholder="Enter the service date">
						<textarea class="place" name="comment" rows="7" placeholder="Enter your motorcycle complaint"></textarea>
						<input type="submit" id="submit" class="clearfix btn" value="Send">
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</section><br><br>
@endsection