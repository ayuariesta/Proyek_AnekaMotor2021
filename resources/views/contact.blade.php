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
							<strong class="d-block" data-scrollreveal="enter top over 1.5s after 0.1s">Contact Us</strong>
						</h1>

						<h3 style="font-size: 18px; font-family: system-ui; font-weight: normal; color: white"> Thank you for visiting our website, if you have any questions, you can Thank you for visiting our website, if you have questions, you can
							contact us at phone number +62 857-8160-6016 or fill out the following form: </h3><br><br>
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
				<h1 class="text-center latestitems">Submit here</h1>
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
				<form method="POST" action="{{ url('contact') }}/{{ auth()->user()->id }}" id="contactform">
					{{ csrf_field() }}
					<div class="form">
						<div class="col">
							<input class="place @error('name') is-invalid @enderror" type="text" name="name" placeholder="Your Name...">
							@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="col">
							<input class="place  @error('email') is-invalid @enderror" type="text" name="email" placeholder="Your E-mail Address...">
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="col">
							<textarea class="place @error('pesan') is-invalid @enderror" name="pesan" rows="7" placeholder="Type your Message..."></textarea>
							@error('pesan')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<input type="submit" id="submit" class="clearfix btn" value="Send">
					</div>
				</form>
				<br>
				<br>
				<div class="row">

					<!-- Content Column -->
					<div class="col-lg-6 mb-4">

						<!-- Project Card Example -->
						<div class="card shadow mb-4">
							<div class="card-header py-3 " style="background-color: #333">
								<h6 class="m-0 font-weight-bold" style="color: 	#fff;">History your message</h6>
							</div>
							<div class="card-body">
							<table class="table" >
							<tbody>
								@foreach($contacts as $contact)
								<tr>
									<td style="font-size: 13px; color: #444;">{{ $contact->pesan }}</td>
									<td style="font-size: 13px; color: #444; text-align:right;">{{ $contact->created_at }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
							</div>
						</div>

					</div>

					<div class="col-lg-6 mb-4">

						<!-- Illustrations -->
						<div class="card shadow mb-4">
							<div class="card-header py-3" style="background-color: 	#333;">
								<h6 class="m-0 font-weight-bold" style="color: 	#fff;">Read about the repair shop</h6>
							</div>
							<div class="card-body">
								<div class="text-center">
									<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="images/undraw_posting_photo.svg" alt="">
								</div>
								<p style="font-size: 13px; color: #444; text-align:justify;"> Motorbikes are a valuable asset in society because motorbikes can be a means of transportation, a hobby and, a lifestyle. 
									Therefore, it is necessary to repair it periodically so that it is not damaged. 
									Aneka Motor Wlingi provides a workshop that guarantees excellent, fast and affordable service quality 
								<a target="_blank" rel="nofollow" href="{{ route('booking') }}">for booking now...</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</section><br><br>
@endsection