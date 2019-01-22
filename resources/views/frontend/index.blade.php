@extends('layouts.frontendLayouts.frontend_design')

@section('title', '| Index')

@section('content')
<!-- start banner Area -->
    <section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>	
		<div class="container">
			<div class="row fullscreen">
				<div class="banner-content col-lg-8 col-md-12">
					<h1>
						Crescent <br>
						E-Health Service		
					</h1>
					<p class="pt-10 pb-10 text-white">
						WE ARE HERE FOR YOU, WHEN YOU NEED US.
					</p>
				</div>										
			</div>
		</div>					
	</section>
	<!-- End banner Area -->

	<!-- Start feature Area -->
	<section class="feature-area section-gap" id="service">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="single-feature d-flex flex-row pb-30">
						<div class="icon">
							<span><img src="{{asset('images/frontend_images/1.png')}}" alt=""></span>
						</div>
						<div class="desc">
							<h4 class="text-uppercase">Instant Medical Care</h4>
							<p>
								We are providing instant health care in emergency situations. With our experts help you will heal very quickly. 
							</p>
						</div>
					</div>
					<div class="single-feature d-flex flex-row pb-30">
						<div class="icon">
							<span> <img src="{{asset('images/frontend_images/2.png')}}" alt=""></span>
						</div>
						<div class="desc">
							<h4 class="text-uppercase">Lowest Cost</h4>
							<p>
								We charge a minimum cost for traetment. Every kind of people can take our treatment becuase we provide services not for money.
							</p>
						</div>
					</div>
					<div class="single-feature d-flex flex-row">
						<div class="icon">
							<span><img src="{{asset('images/frontend_images/3.png')}}" alt=""></span>
						</div>
						<div class="desc">
							<h4 class="text-uppercase">Traetment at Home</h4>
							<p>
								You can visit doctors by sitting in your home. With online help from mobile or computer make an appoinment with doctor.
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="single-feature d-flex flex-row pb-30">
						<div class="icon">
							<span><img src="{{asset('images/frontend_images/4.png')}}" alt=""></span>
						</div>
						<div class="desc">
							<h4 class="text-uppercase">Time Saving Process</h4>
							<p>
								Telemedicine's doctors visit patient on mobile or computer. In this process your time will save from travelling. 
							</p>
						</div>
					</div>
					<div class="single-feature d-flex flex-row pb-30">
						<div class="icon">
							<span><img src="{{asset('images/frontend_images/5.png')}}" alt=""></span>
						</div>
						<div class="desc">
							<h4 class="text-uppercase">Selection of Doctors</h4>
							<p>
								Human Health Helpline have lots of treatment department. You can easilly choose a doctor accourding to your desease.
							</p>
						</div>
					</div>
					<div class="single-feature d-flex flex-row">
						<div class="icon">
							<span><img src="{{asset('images/frontend_images/6.png')}}" alt=""></span>
						</div>
						<div class="desc">
							<h4 class="text-uppercase">24 Hours Support</h4>
							<p>
								We are providing 24 hours treatment facilities for you. We are able to give 24 hour services because of online help. 
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End feature Area -->

	<!-- Start about Area -->
	
	<section class="clients-area pt-100 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 single-fact">
					<h2 class="counter">12</h2>
					<p class="text-uppercase">Years of Experience</p>
				</div>
				<div class="col-lg-3 col-md-6 single-fact">
					<h2 class="counter">24</h2>
					<p class="text-uppercase">Awards</p>
				</div>
				<div class="col-lg-3 col-md-6 single-fact">
					<h2 class="counter">1921</h2>
					<p class="text-uppercase">Happy Clients</p>
				</div>
				<div class="col-lg-3 col-md-6 single-fact">
					<h2 class="counter">26892</h2>
					<p class="text-uppercase">People Likes</p>
				</div>
				</div>
		</div>
	</section>
	
	<!-- End about Area -->

	<!-- Start Specialization Area -->
	<section class="specialization-area section-gap" id="consultant">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-8 pb-80 header-text">
					<h1>Available Specialization</h1>
					<p>All our specialists are experienced and well trained from top mediacl institutions in our country.
					</p>
				</div>
			</div>
			<div class="row">
		   <div class="col-md-6 col-lg-3 ftco-animate">
				<div class="staff">
					<div class="img" style="background-image: url({{url('images/frontend_images/Surgery.png')}});"></div>
					<div class="text pt-4">
						<h3>Surgery Specialist</h3>
						<p>Surgery is a the last process of any treatment and it's a complicated process too. We have lots of surgery specialists for your harmless treatment.</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="staff">
					<div class="img" style="background-image: url({{url('images/frontend_images/Dental.png')}});"></div>
					<div class="text pt-4">
						<h3>Dental Specialist</h3>
						<p>We have dental specialists also. To keeping their natural teeth throughout their lives you should regularly checkup your teeth. Here you can do that easily.</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="staff">
					<div class="img" style="background-image: url(images/frontend_images/Neorology.png);"></div>
					<div class="text pt-4">
						<h3>Neorology Specialist</h3>
						<p>A neurologist is a medical doctor who specializes in treating diseases of the nervous system. Preasent days neorological problems one of the mejor desease.</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="staff">
					<div class="img" style="background-image: url(images/frontend_images/Medicine.png);"></div>
					<div class="text pt-4">
						<h3>Medicine Specialist</h3>
						<p>Medecine is one of the important part of any treatment. Right time right medecine can save someones life. We have some medecine specialists for your help.</p>
					</div>
				</div>
			</div>
			</div>
		</div>
	</section>
	<!-- End Specialization Area -->

	<!-- Start Feedback Area -->
	<div class="feedback">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('images/frontend_images/extra.png')}}" data-speed="0.8">
		</div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="feedback_container d-flex flex-row align-items-start justify-content-end">
						<div class="feedback_content">
							<div class="feedback_disc">
								<h4>Our Happy Clients</h4>
								<p>Our healed patients praise us for our great treatment, warm services and instant response. We understand the pain and difficulities what going through a patient. That is the reason we can give a perfect treatment to our patients. We provides the suitable treatment process to our patients. Read what says our happy patient about Human-Health-Helpline. </p>
							</div>
							<div class="feedback_text">
							<h5><i class="fa fa-comments" aria-hidden="true"></i> By Romy Taormina</h5>
								<p> It's a pleasure to take treatment in HHH and it's team. They are personable, responsive, and results-oriented telemedicine company. HHH Always available for our treatment, extremely knowledgeable </p>
							</div>
							<div class="feedback_text">
							<h5><i class="fa fa-comments" aria-hidden="true"></i> By Romy Taormina</h5>
								<p> It's a pleasure to take treatment in HHH and it's team. They are personable, responsive, and results-oriented telemedicine company. HHH Always available for our treatment, extremely knowledgeable </p>
							</div>
							<div class="feedback_text">
							<h5><i class="fa fa-comments" aria-hidden="true"></i> By Romy Taormina</h5>
								<p> It's a pleasure to take treatment in HHH and it's team. They are personable, responsive, and results-oriented telemedicine company. HHH Always available for our treatment, extremely knowledgeable </p>
							</div>
							<div class="feedback_text">
							<h5><i class="fa fa-comments" aria-hidden="true"></i> By Romy Taormina</h5>
								<p> It's a pleasure to take treatment in HHH and it's team. They are personable, responsive, and results-oriented telemedicine company. HHH Always available for our treatment, extremely knowledgeable </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection