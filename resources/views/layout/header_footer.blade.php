<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>RENTAL SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="/css/home.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
	<link rel="icon" href="/image/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style type="text/css">
.dropbtn {
  color: white;
  font-size: 16px;
  border: none;
  cursor: pointer;
}
.dropdown {
  position: relative;
  display: inline-block;
    width: 100%;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 10px 16px;
    font-size: 14px;
    text-decoration: none;
    display: block;
    border-bottom: 1px solid #dee2e6;
}

.dropdown a:hover {background-color: #ddd;}

.new__1 {
	display: block;
	z-index: 99;
	position: absolute;
	width: 100%;
}
.product-fliter .product-img {
    height: 214px!important;
    width: 100%!important;
}

.dropdown-content1 {
    display: none;
    position: absolute;
    left: 0;
    top: 56px;
    background-color: #e3e3e3;
    min-width: 160px;
    z-index: 99;
    box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 28%);
}
.dropdown-content1 a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 16px;
    letter-spacing: 0.2px;
}
.dropdown-content1 a:hover {
    background-color: #0263f6;
    color: #f2f2f2;
    text-decoration: none;
}
.error_mes{
	position: absolute;
}
.eerr{
	top: 100%!important;
}

.icon-text{

	display: flex!important;
	justify-content: space-between;
}
#myDropdown img{

	display: inline-block;
}

#myDropdown h3 a{

	font-size: 16px!important;
}



</style>
<body class="body">
	<div class="co_header" id="dynamic">
		<div class="container">
			<div class="row row1">
				<div class="col-lg-3 col-md-3">
					<div class="logo">
						<a href="index.html"><img src="/image/logo.png"></a>
					</div>
				</div> 
				<div class="col-lg-6 col-md-6">
				    <div class="dropdown">
				    
		              <div class="error_mes text-danger eerr">
		                  
		              </div>
		              	
				    	<form method="post">
				    		@csrf
							  <div  class="dropbtn search-box">
						    	 <input type="text" placeholder="Search Products..." id="s_product" name="product" autocomplete="off">
						    	 @if($errors->has('product')) <p class="error_mes text-danger">{{ $errors->first('product') }}</p> @endif
							    	<button id="search_product" type="submit">search</button>
							   </div>
						   </form>


						  <div id="myDropdown" class="dropdown-content">
						    <a href="">New</a>
						  </div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3">

					@if (Route::has('login'))
					 	<ul class="login">
                
                    @auth
                      	<li class="login"><i class="dropbtn1 fas fa-user">
                      		<ul class="hide_drop">
                      			<li class="hide_drop1"><a href="{{url('/user/edit_profile')}}/{{Auth::id()}}">Edit Profile</a></li>
                      			<li class="hide_drop2"><a href="{{url('/user/logout')}}"><i class="fas fa-lock"></i>Logout</a></li>
                      		</ul>
                      		</i>
                      	</li>
                    @else
                      	<li><a href="{{url('/user/user_login')}}">login</a></li>

                    
                    @endauth
               </ul>
            @endif





				
						
					
						
					
						<!-- <li><a href="#">register</a></li> -->
					
				</div>
			</div>
		</div>
	</div>
	<div class="mobile_manu">
	   <div class="row row1">
	      <div class="col-md-6 col-6">
	        <div class="logo">
	          <a href="index.html"><img src="/image/logo.png"></a>
	        </div>
	      </div>
	      <div class="col-md-6 col-6">
	         <div class="item">
	            <i class="icon1 fas fa-search"></i>
	            <i class="dropbtn1 fas fa-user-alt"></i>
	            <div id="myDropdown1" class="dropdown-content1">
                          <a href="{{url('/user/edit_profile')}}/{{Auth::id()}}">Edit Profile</a>
                          <a href="{{url('/user/logout')}}"><i class="fas fa-lock"></i>Logout</a>
                </div>
	            <div class="mobile-menu">
	               <div id="mySidepanel" class="sidepanel" style="width: 0px;">
	                  <div class="m_menu">
	                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="far fa-times"></i></a>
	                     <nav class="animated bounceInDown">
	                        <ul>
	                           <li class="sub-menu link1"><a href="#">Cloth</a><div class="fa fa-caret-down right"></div>
						               <ul style="display: none;">
						                  <li><a href="men-product.html">Men</a></li>
			                		      <li><a href="men-product.html">women</a></li>
			                		      <li><a href="men-product.html">Kids</a></li>
						               </ul>
	                           </li>
	                           <li class="sub-menu link1"><a href="#">Electronics</a> <div class="fa fa-caret-down right"></div>
						               <ul style="display: none;">                      
						                  <li><a href="men-product.html">laptop</a></li>                      
						               </ul>
	                           </li>
	                           <li class="sub-menu link1"><a href="#">Events</a> <div class="fa fa-caret-down right"></div>
						               <ul style="display: none;">
						                  <li><a href="men-product.html">marriage events</a></li>
			                		      <li><a href="men-product.html">birthday events</a></li>
						               </ul>
	                           </li>
	                           <li class="sub-menu link1"><a href="#">Appliances</a> <div class="fa fa-caret-down right"></div>
						               <ul style="display: none;">
						                  <li><a href="men-product.html">Air Conditioners</a></li>
			                		      <li><a href="men-product.html">Air Coolers</a></li>
			                		      <li><a href="men-product.html">Microwaves & Induction</a></li>
						               </ul>
	                           </li>
	                           <li class="sub-menu link1"><a href="#">Vehicle</a> <div class="fa fa-caret-down right"></div>
						               <ul style="display: none;">
						                  <li><a href="men-product.html">car</a></li>
			                		      <li><a href="men-product.html">bicycle</a></li>
			                		      <li><a href="men-product.html">tempo</a></li>
						               </ul>
	                           </li>
	                        </ul>
	                     </nav>
	                  </div>
	               </div>
	                  <button class="openbtn" onclick="openNav()"><i class="far fa-bars"></i></button> 
	            </div>
	         </div>
	      </div>
	   </div>
      <div class="search-box1">
			<form>
				<input type="text" placeholder="search &amp; enter" name="search" value="">
			</form>
			<a class="srh-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
		</div>
   </div>
	<div class="co_menu">
		<div class="container">
			<div class="menu">
				<nav class="navbar">
	               <ul class="nav">

	               		@foreach($category_data as $cd)
		               <li>
		                	<img src="/uploads/{{$cd->icon}}">
			                {{$cd->category}} <i class="fal fa-angle-down"></i>
		                	<ul class="dropdown">
		                		@foreach($sub_category as $sc)
		                		@if($sc->category_id==$cd->id)
		                		<li><a href="{{url('/category_product')}}/{{$sc->id}}">{{$sc->sub_category_name}}</a></li>
		                		@endif
		                		@endforeach
		                	</ul>
		               </li>
		               @endforeach
		               
	               </ul>
            </nav>	
			</div>
		</div>
	</div>
	
	@yield('content')

   <div class="main_footer">
    	<div class="container1">
    		<div class="footer">
    			<div class="container">
    				<div class="footer_inner">
    					<div class="shape-1"></div>
    					<div class="left-image"></div>
    					<div class="row">
    						<div class="col-lg-4 col-md-4">
    							<div class="footer_silder">
    							    <div class="footer_img">
    								    <img src="/image/f_img3.jpg">
    								    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    								    <button><a href="#">Book Now</a></button>
    							    </div>
    							    <div class="footer_img">
    								    <img src="/image/f_img4.webp">
    								    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    								    <button><a href="#">Book Now</a></button>
    							    </div>
    							</div>
    						</div>
    						<div class="col-lg-5 col-md-5">
    							<div class="footer_right">
						    		<div class="info-footer">
						                <div class="footer-content">
						                    <div class="footer-title"><h4>Contact Details</h4></div>                   
						                    <div class="info">
						                        <ul>
						                            <li>
						                            	<i class="fas fa-map-marker-alt"></i>
						                            	<p>Shop No. 19, Shree Vinayak Homes Apartment, Opp. I, T.I, Bilimora, Maharashtra 396325</p>
						                            </li>
						                            <li>
						                                <i class="fas fa-phone-volume"></i>
						                                <p><a href="tel:+91-9558561212">+91-9558561212</a> /
						                                  <a href="tel:+91-9427112299">+91-9427112299</a></p>
						                            </li>
						                            <li>
						                                <i class="fas fa-envelope-open-text"></i>
						                                <p><a href="mailto:info@digitalinovation.com">info@digitalinovation.com</a></p>
						                            </li>
						                        </ul>
						                    </div>
						                </div>
						            </div>
    							</div>
    						</div>
    						<div class="col-lg-3 col-md-3 ">
    							<div class="footer-last">
    								<div class="footer-title"><h4>What We Do</h4></div>
									<ul>
										<li class="page_item"><a href="#">About Us</a></li>
										<li class="page_item"><a href="#">Contact</a></li>
										<li class="page_item"><a href="#">Renting Policy</a></li>
									</ul>
								</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="footer-bottom">
	            <div class="container">
	                <div class="inner">
	                    <div class="copyright">Copyright © 2020 Langong. All Rights Reserved.</div>
                        <div class="social-links">
						    <ul>
						        <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
						        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
						        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
						        <li><a href="#"><span class="fab fa-linkedin"></span></a></li>
						    </ul>
						</div>
	                </div>
	            </div>
	        </div>
    	</div>
   </div>
   <a class="scrollToTop active">
      <i class="far fa-dot-circle"></i>
      <span>Top</span>
   </a>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script type="text/javascript">

    	$(document).ready(function(){

    		$("#s_product").keyup(function(){
			    
    			var product=$("#s_product").val();

    			$.ajaxSetup({
		          headers: {
		              'X-CSRF-TOKEN': "{{ csrf_token() }}"
		          }
		      	});


	    		$.ajax({

	    			type:"post",
	    			url:"/search_product",
	    			data:{product:product },
	    			datatype:"json",
	    			success:function(response){

	    				

	    				$('#myDropdown').empty();

               			$('#myDropdown').html(response);
	    			},

	    			error:function(response){
	    				
	    			}
	    		});

			  });
    	});

    	setTimeout(function() { $(".error_mes").fadeOut(1500);},5000);
  

    	$(document).ready(function(){

            $('.dropbtn1').click(function(){
            $('.dropdown-content1').toggle();
          });

            
        });
    
       	$(document).ready(function(){
			  $(".search-box").click(function(){
			    $(".dropdown-content").toggleClass('new__1');
			  });
		}); 

		$('.sub-menu ul').hide();
		$(".sub-menu .fa.fa-caret-down").click(function () {
			$(this).parent(".sub-menu").children("ul").slideToggle("100");
			$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
		});


       	function openNav() {
            document.getElementById("mySidepanel").style.width = "100%";
        }
        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }

    	$(document).ready(function(){
            $(".font").click(function(){
                 $(".search-box").slideDown("slow");
             });

            $(".search-close").click(function(){
                $(".search-box").slideUp("slow");
            });
        });

        $(document).ready(function(){
            $(".icon1").click(function(){
                $(".search-box1").slideDown("slow");
            });
            $(".search-box1 a").click(function(){
                $(".search-box1").slideUp("slow");
            });
        });

        $('.search-toggle').addClass('closed');
        $('.search-toggle .search-icon').click(function(e) {
            if ($('.search-toggle').hasClass('closed')) {
                $('.search-toggle').removeClass('closed').addClass('opened');
                $('.search-toggle, .search-container').addClass('opened');
                $('#search-terms').focus();
            } else {
                $('.search-toggle').removeClass('opened').addClass('closed');
                $('.search-toggle, .search-container').removeClass('opened');
            }
        });
      
      $('.sub-menu ul').hide();
		$(".sub-menu .fa.fa-caret-down").click(function () {
			$(this).parent(".sub-menu").children("ul").slideToggle("100");
			$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
		});

    	$(window).scroll(function(){
            if ($(this).scrollTop() > 50) {
                $('#dynamic').addClass('newClass');
            } else {
                $('#dynamic').removeClass('newClass');
            }
        });



    	$('.slider_manu').slick({
    		autoplay:false,
            slidesToShow:6,
            slidesToScroll: 1,
            dots:false,
            arrows:false,
            prevArrow: '<div class="banner-arrow prev-arrow"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="banner-arrow next-arrow"><i class="fas fa-chevron-right"></i></div>'
        });

    	$('.banner-slider').slick({
    		autoplay:false,
    		autoplaySpeed:1500,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots:false,
            arrows:true,
            prevArrow: '<div class="banner-arrow prev-arrow"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="banner-arrow next-arrow"><i class="fas fa-chevron-right"></i></div>'
        });

        $('.category_slider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            infinite: false,
            prevArrow: '<div class="slide-arrow1 prev-arrow1"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slide-arrow1 next-arrow1"><i class="fas fa-chevron-right"></i></div>',
            responsive: [
                 {
                  breakpoint: 1367,
                  settings: {
                  slidesToShow:4,
                  slidesToScroll: 1,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 1024,
                  settings: {
                  slidesToShow:2,
                  slidesToScroll: 1,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow:1,
                    slidesToScroll: 1,
                  },
                },
            ],
        });

        $('.selling_slider').slick({
            slidesToShow: 8,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            infinite:false,
            prevArrow: '<div class="slide-arrow1 prev-arrow1"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slide-arrow1 next-arrow1"><i class="fas fa-chevron-right"></i></div>',
            responsive: [
                {
                  breakpoint: 1367,
                  settings: {
                  slidesToShow:7,
                  slidesToScroll: 1,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 1200,
                  settings: {
                  slidesToShow:6,
                  slidesToScroll: 1,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 1024,
                  settings: {
                  slidesToShow:3,
                  slidesToScroll: 1,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow:1,
                    slidesToScroll: 1,
                  },
                },
            ],
        });

        $('.cloth_slider').slick({
            slidesToShow: 8,
            slidesToScroll: 3,
            dots: false,
            arrows: true,
            infinite: false,
            prevArrow: '<div class="slide-arrow1 prev-arrow1"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slide-arrow1 next-arrow1"><i class="fas fa-chevron-right"></i></div>',
            responsive: [
                {
                  breakpoint: 1367,
                  settings: {
                  slidesToShow:7,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 1200,
                  settings: {
                  slidesToShow:6,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 1024,
                  settings: {
                  slidesToShow:3,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow:1,
                    slidesToScroll: 3,
                  },
                },
            ],
        });

        $('.electronic_slider').slick({
            slidesToShow: 8,
            slidesToScroll: 3,
            dots: false,
            arrows: true,
            infinite: false,
            prevArrow: '<div class="slide-arrow1 prev-arrow1"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slide-arrow1 next-arrow1"><i class="fas fa-chevron-right"></i></div>',
            responsive: [
                {
                  breakpoint: 1367,
                  settings: {
                  slidesToShow:7,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 1200,
                  settings: {
                  slidesToShow:6,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 1024,
                  settings: {
                  slidesToShow:3,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow:1,
                    slidesToScroll: 3,
                  },
                },
            ],
        });

        $('.event_slider').slick({
            slidesToShow: 8,
            slidesToScroll: 3,
            dots: false,
            arrows: true,
            infinite: false,
            prevArrow: '<div class3"slide-arrow1 prev-arrow1"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slide-arrow1 next-arrow1"><i class="fas fa-chevron-right"></i></div>',
            responsive: [
                {
                  breakpoint: 1367,
                  settings: {
                  slidesToShow:7,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
               {
                  breakpoint: 1200,
                  settings: {
                  slidesToShow:6,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 1024,
                  settings: {
                  slidesToShow:3,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow:1,
                    slidesToScroll: 3,
                  },
                },
            ],
        });
        
        $('.app_slider').slick({
            slidesToShow: 8,
            slidesToScroll: 3,
            dots: false,
            arrows: true,
            infinite: false,
            prevArrow: '<div class="slide-arrow1 prev-arrow1"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slide-arrow1 next-arrow1"><i class="fas fa-chevron-right"></i></div>',
            responsive: [
                {
                  breakpoint: 1367,
                  settings: {
                  slidesToShow:7,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
               {
                  breakpoint: 1200,
                  settings: {
                  slidesToShow:6,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 1024,
                  settings: {
                  slidesToShow:3,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow:1,
                    slidesToScroll: 3,
                  },
                },
            ],
        });

        $('.vehicle_slider').slick({
            slidesToShow: 8,
            slidesToScroll: 3,
            dots: false,
            arrows: true,
            infinite: false,
            prevArrow: '<div class="slide-arrow1 prev-arrow1"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slide-arrow1 next-arrow1"><i class="fas fa-chevron-right"></i></div>',
            responsive: [
                {
                  breakpoint: 1367,
                  settings: {
                  slidesToShow:7,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
              {
                  breakpoint: 1200,
                  settings: {
                  slidesToShow:6,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 1024,
                  settings: {
                  slidesToShow:3,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow:1,
                    slidesToScroll: 3,
                  },
                },
            ],
        });

        $('.construction_slider').slick({
            slidesToShow: 8,
            slidesToScroll: 3,
            dots: false,
            arrows: true,
            infinite: false,
            prevArrow: '<div class="slide-arrow1 prev-arrow1"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slide-arrow1 next-arrow1"><i class="fas fa-chevron-right"></i></div>',
            responsive: [
                {
                  breakpoint: 1367,
                  settings: {
                  slidesToShow:7,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
               {
                  breakpoint: 1200,
                  settings: {
                  slidesToShow:6,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 1024,
                  settings: {
                  slidesToShow:3,
                  slidesToScroll: 3,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow:1,
                    slidesToScroll: 3,
                  },
                },
            ],
        });

        $('.footer_silder').slick({
            autoplay:false,
            autoplaySpeed: 2000,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows:false,
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                  slidesToShow:1,
                  slidesToScroll: 1,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow:1,
                    slidesToScroll: 1,
                  },
                },
            ],
        });

        var btn = $('.scrollToTop');
	        $(window).scroll(function() {
	            if ($(window).scrollTop() > 300) {
	                btn.addClass('active');  
	            }
	            else {
	                btn.removeClass('active');
	            }
	        });
	        btn.on('click', function(e) {
	            e.preventDefault();
	        $('html, body').animate({scrollTop:0}, '300');
	    }); 



    </script>
	
</body>
</html>