@extends('layouts.frontendLayouts.frontend_design')

@section('title', '| Index')

@section('content')

        <div class="home d-flex flex-column align-items-start justify-content-end">
            <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('images/frontend_images/about.jpg')}}" data-speed="0.8">
            </div>
            
            <div class="home_overlay"><img src="{{asset('images/frontend_images/overlay.png')}}" alt="">
            </div>
            
            <div class="home_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">About us</div>
                                <div class="home_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
               
       <!-- Start service Area -->
		<section class="about-area section-gap" id="about">
			<div class="container">
				<div class="title col-lg-12 col-md-offset-2">
                    <h4>Our Services</h4>
                    <p>We healed patients great treatment process, warm services and instant response. We understand the pain and difficulities what going through a patient. That is the reason we can give a perfect treatment to our patients. We provides the suitable treatment process to our patients. </p>
                </div>
				<div class="row">
					<div class="ser col-lg-6">
						<div class="d-flex flex-row pb-30">
							<div class="icon">
								<span><img src="{{asset('images/frontend_images/about/1.png')}}" alt=""></span>
							</div>
							<div class="about">
								<h4 class="text-uppercase">Emergency Care</h4>
								<p>
									We are ready for emergency situations. 
								</p>
							</div>
						</div>
						<div class="d-flex flex-row pb-30">
							<div class="icon">
								<span> <img src="{{asset('images/frontend_images/about/2.png')}}" alt=""></span>
							</div>
							<div class="about">
								<h4 class="text-uppercase">Ambulance Service</h4>
								<p>
									We are providing ambulance for patients.
								</p>
							</div>
						</div>
						<div class="d-flex flex-row pb-30">
							<div class="icon">
								<span><img src="{{asset('images/frontend_images/about/3.png')}}" alt=""></span>
							</div>
							<div class="about">
								<h4 class="text-uppercase">Vaccination Program</h4>
								<p>
									We provides the best Vaccination Program.
								</p>
							</div>
						</div>
							
						<div class="d-flex flex-row pb-30">
							<div class="icon">
								<span><img src="{{asset('images/frontend_images/about/4.png')}}" alt=""></span>
							</div>
							<div class="about">
								<h4 class="text-uppercase">Medical Report Curiar</h4>
				    			<p>
									Patient can curiar his medial reports. 
			    				</p>
							</div>
						</div>
						<div class="d-flex flex-row pb-30">
							<div class="icon">
								<span><img src="{{asset('images/frontend_images/about/5.png')}}" alt=""></span>
							</div>
							<div class="about">
								<h4 class="text-uppercase">Rear Medecine Supply</h4>
								<p>
									We are able to supply rear medecines.
								</p>
							</div>
						</div>
						<div class="d-flex flex-row">
							<div class="icon">
								<span><img src="{{asset('images/frontend_images/about/6.png')}}" alt=""></span>
							</div>
							<div class="about">
								<h4 class="text-uppercase">Accommodation Services</h4>
								<p>
									Patients family can stay with patient. 
								</p>
							</div>
						</div>
					</div>
                    <div class="photo col-lg-6">
                        <img src="{{asset('images/frontend_images/ser.png')}}" alt="">
                    </div>
                </div>
			</div>
		</section>
		<!-- End feature Area -->
            
        <section class="divider">
            <div class="container">
                <div class="row text-justify">
                    <div class="col-md-6">
                        <h4 class="mt-0">Who we are</h4>
                        <p class="mb-0">Human Health Helpline is telemedicine system. Telemedicine is a specialist medical treatment advice service, where doctors and patients can talk face-to-face, and the doctor prescribes themselves to be eliminated through video conferencing. In Bangladesh, telemedicine services play a very effective and important role in improving the health care of people in remote areas. HHH want give support to all the poor people who can't paying for their treatment. In Bangladesh their are thousands of people who are dies for lots of uknown desease, HHH wants to help them and save them. </p>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mt-0">What we do</h4>
                        <p class="mb-0">We made a website HHH, which is an online health care system. We provides advice service, where doctors and patients can talk face-to-face, and the doctor prescribes themselves to be eliminated through video conferencing. A patient of agent just need to make an account and they can start visit a doctor. First you need to choose a doctor according to your desease, then make a visit with that doctor. Doctor will view your symptoms and give you prescription for your treatment. We have paying and non-paying doctors for every catagories people in village or cities.We want to provide services to everywhere.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team -->

        <div class="team">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center">
                            <div class="section_title">
                                <h2 class="text-uppercase">Meet Our Doctors</h2>
                                <p class="text-capitalize letter-space-4">All our doctors are experienced and well trained from top mediacl institutions in our country.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row team_row">

                    <!-- Team Item -->
                    <div class="col-lg-4 team_col">
                        <div class="team_item text-center d-flex flex-column aling-items-center justify-content-end">
                            <div class="team_image"><img src="{{asset('images/frontend_images/c1.jpg')}}" alt=""></div>
                            <div class="team_content text-center">
                                <div class="team_name"><a href="#">Michael Smith</a></div>
                                <div class="team_title">Cardiologist</div>
                                <div class="social">
                                    <ul>
                                        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Team Item -->
                    <div class="col-lg-4 team_col">
                        <div class="team_item text-center d-flex flex-column aling-items-center justify-content-end">
                            <div class="team_image"><img src="{{asset('images/frontend_images/c2.jpg')}}" alt=""></div>
                            <div class="team_content text-center">
                                <div class="team_name"><a href="#">Michael Smith</a></div>
                                <div class="team_title">Orthopedic Specialist</div>
                                <div class="social">
                                    <ul>
                                        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Team Item -->
                    <div class="col-lg-4 team_col">
                        <div class="team_item text-center d-flex flex-column aling-items-center justify-content-end">
                            <div class="team_image"><img src="{{asset('images/frontend_images/c3.jpg')}}" alt=""></div>
                            <div class="team_content text-center">
                                <div class="team_name"><a href="#">Michael Smith</a></div>
                                <div class="team_title">Gynaecologist</div>
                                <div class="social">
                                    <ul>
                                        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Team Item -->
                    <div class="col-lg-4 team_col">
                        <div class="team_item text-center d-flex flex-column aling-items-center justify-content-end">
                            <div class="team_image"><img src="{{asset('images/frontend_images/c4.jpg')}}" alt=""></div>
                            <div class="team_content text-center">
                                <div class="team_name"><a href="#">Michael Smith</a></div>
                                <div class="team_title">Dentist</div>
                                <div class="social">
                                    <ul>
                                        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Team Item -->
                    <div class="col-lg-4 team_col">
                        <div class="team_item text-center d-flex flex-column aling-items-center justify-content-end">
                            <div class="team_image"><img src="{{asset('images/frontend_images/c5.jpg')}}" alt=""></div>
                            <div class="team_content text-center">
                                <div class="team_name"><a href="#">Samantha Doe</a></div>
                                <div class="team_title">Dentist</div>
                                <div class="social">
                                    <ul>
                                        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Item -->
                    <div class="col-lg-4 team_col">
                        <div class="team_item text-center d-flex flex-column aling-items-center justify-content-end">
                            <div class="team_image"><img src="{{asset('images/frontend_images/c6.jpg')}}" alt=""></div>
                            <div class="team_content text-center">
                                <div class="team_name"><a href="#">James Carl</a></div>
                                <div class="team_title">Gynecologist</div>
                                <div class="social">
                                    <ul>
                                        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection