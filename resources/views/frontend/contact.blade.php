@extends('layouts.frontendLayouts.frontend_design')

@section('title', '| Index')

@section('content')

        <div class="home d-flex flex-column align-items-start justify-content-end">
            <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('images/frontend_images/contact.jpg')}}" data-speed="0.8"></div>
            <div class="home_overlay"><img src="{{asset('images/frontend_images/overlay.png')}}" alt=""></div>
            <div class="home_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">Contact us</div>
                                <div class="home_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Contact -->

        <div class="contact">
            <div class="container">
                <div class="row">

                    <!-- Contact Form -->
                    <div class="col-lg-6">
                        <div class="contact_form_container">
                            <div class="contact_form_title">Interested in discussing?</div>
                            <form action="#" class="contact_form" id="contact_form">
                                <div class="d-flex flex-row align-items-start justify-content-between flex-wrap">
                                    <input type="text" class="contact_input" placeholder="Your Name" required="required">
                                    <input type="email" class="contact_input" placeholder="Your E-mail" required="required">
                                    <input type="tel" class="contact_input" placeholder="Your Phone" required="required">
                                    <input type="text" class="contact_input" placeholder="Subject" required="required">
                                    <input type="text" class="message" placeholder="Message" required="required">
                                </div>
                                <button class="button button_1 contact_button trans_200">Send</button>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Content -->
                    <div class="col-lg-5 offset-lg-1 contact_col">
                        <div class="contact_content">
                            <div class="contact_content_title">Our Office Location</div>
                            <div class="contact_content_text">
                                <p>885 (3rd floor) Jigjag Road, Masterpara, Gaibandha.</p>
                            </div>
                            <div class="direct_line d-flex flex-row align-items-center justify-content-start">
                                <div class="direct_line_title text-center">Direct Line</div>
                                <div class="direct_line_num text-center">+8801730 578154</div>
                            </div>
                            <div class="contact_info">
                                <ul>
                                    <li class="d-flex flex-row align-items-start justify-content-start">
                                        <div>Phone</div>
                                        <div>+8801730 578154</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-start justify-content-start">
                                        <div>E-mail</div>
                                        <div>info@ctinternet.tech</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="contact_social">
                                <ul class="d-flex flex-row align-items-center justify-content-start">
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row google_map_row">
                    <div class="col">

                        <!-- Contact Map -->

                        <div class="contact_map">

                            <!-- Google Map -->

                            <div class="map">
                                <div id="google_map" class="google_map">
                                    <div class="map_container">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3606.379624650166!2d89.54617021442292!3d25.32503928383685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fd22d49c014903%3A0xac5d27b88d6d41b5!2sMasterpara%2C+Gaibandha!5e0!3m2!1sen!2sbd!4v1540880057261" width="1080" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection