@extends('layouts.frontendLayouts.frontend_design')

@section('title', '| Index')

@push('styles')
	<link rel="stylesheet" href="{{asset('css/frontend_css/linearicons.css')}}">
	<link rel="stylesheet" href="{{asset('css/frontend_css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/frontend_css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('css/frontend_css/nice-select.css')}}">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="{{asset('css/frontend_css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('css/frontend_css/main.css')}}">
	<link rel="stylesheet" href="{{asset('css/frontend_css/about.css')}}">
	<link rel="stylesheet" href="{{asset('css/frontend_css/salvattore.css')}}">
@endpush

@section('content')

	<div class="home d-flex flex-column align-items-start justify-content-end">
            <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('images/frontend_images/gellary.jpg')}}" data-speed="0.8"></div>
            <div class="home_overlay"><img src="{{asset('images/frontend_images/overlay.png')}}" alt=""></div>
            <div class="home_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">Gallery</div>
                                <div class="home_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
	
	<div id="gly-main">
		<div class="container">

			<div class="row">

        <div id="gly-board" data-columns>

        	<div class="item">
        		<div class="animate-box">
	        		<a href="{{asset('images/frontend_images/g1.jpg')}}" class="image-popup gly-board-img" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, eos?"><img src="{{asset('images/frontend_images/g1.jpg')}}" alt="Free HTML5 Bootstrap template"></a>
        		</div>
        		<div class="gly-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, eos?</div>
        	</div>
        	<div class="item">
        		<div class="animate-box">
	        		<a href="{{asset('images/frontend_images/g2.jpg')}}" class="image-popup gly-board-img"><img src="{{asset('images/frontend_images/g2.jpg')}}" alt=""></a>
	        		<div class="gly-desc">Veniam voluptatum voluptas tempora debitis harum totam vitae hic quos.</div>
        		</div>
        	</div>
        	<div class="item">
        		<div class="animate-box">
	        		<a href="{{asset('images/frontend_images/g3.jpg')}}" class="image-popup gly-board-img"><img src="{{asset('images/frontend_images/g3.jpg')}}" alt=""></a>
	        		<div class="gly-desc">Optio commodi quod vitae, vel, officiis similique quaerat odit dicta.</div>
        		</div>
        	</div>
        	<div class="item">
        		<div class="animate-box">
	        		<a href="{{asset('images/frontend_images/g4.jpg')}}" class="image-popup gly-board-img"><img src="{{asset('images/frontend_images/g4.jpg')}}" alt=""></a>
	        		<div class="gly-desc">Dolore itaque deserunt sit, at exercitationem delectus, consequuntur quaerat sapiente.</div>
        		</div>
        	</div>
        	<div class="item">
        		<div class="animate-box">
	        		<a href="{{asset('images/frontend_images/g5.jpg')}}" class="image-popup gly-board-img"><img src="{{asset('images/frontend_images/g5.jpg')}}" alt=""></a>
	        		<div class="gly-desc">Tempora distinctio inventore, nisi excepturi pariatur tempore sit quasi animi.</div>
        		</div>
        	</div>
        	<div class="item">
        		<div class="animate-box">
	        		<a href="{{asset('images/frontend_images/g6.jpg')}}" class="image-popup gly-board-img"><img src="{{asset('images/frontend_images/g6.jpg')}}" alt=""></a>
	        		<div class="gly-desc">Sequi, eaque suscipit accusamus. Necessitatibus libero, unde a nesciunt repellendus!</div>
        		</div>
        	</div>
        	<div class="item">
        		<div class="animate-box">
	        		<a href="{{asset('images/frontend_images/g7.jpg')}}" class="image-popup gly-board-img"><img src="{{asset('images/frontend_images/g7.jpg')}}" alt=""></a>
	        		<div class="gly-desc">Necessitatibus distinctio eos ipsam cum hic temporibus assumenda deleniti, soluta.</div>
        		</div>
        	</div>
        	<div class="item">
        		<div class="animate-box">
	        		<a href="{{asset('images/frontend_images/g8.jpg')}}" class="image-popup gly-board-img"><img src="{{asset('images/frontend_images/g8.jpg')}}" alt=""></a>
	        		<div class="gly-desc">Necessitatibus distinctio eos ipsam cum hic temporibus assumenda deleniti, soluta.</div>
        		</div>
        	</div>
                </div>
            </div>
        </div>
        </div>

@endsection

@push('scripts')
	<script src="{{asset('js/frontend_js/jquery-2.2.4.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="{{asset('js/frontend_js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/frontend_js/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{asset('js/frontend_js/jquery.nice-select.min.js')}}"></script>
	<script src="{{asset('js/frontend_js/jquery.sticky.js')}}"></script>
	<script src="{{asset('js/frontend_js/parallax.min.js')}}"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="{{asset('js/frontend_js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/frontend_js/waypoints.min.js')}}"></script>
	<script src="{{asset('js/frontend_js/jquery.counterup.min.js')}}"></script>
	<script src="{{asset('js/frontend_js/main.js')}}"></script>
	<script src="{{asset('js/frontend_js/salvattore.min.js')}}"></script>
@endpush