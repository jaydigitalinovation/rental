@extends('layout.header_footer')


@section('content')


	<div class="co_breadcumbs1">
		<div class="container">
			<div class="inner-breadcumbs1">
				<h1>checkout</h1>
			    <ul class="breadcumbs1">
		        	<li><a href="{{url('/')}}">Home</a>  <i class="fal fa-chevron-double-right"></i></li>
		        	<li>checkout</li>
		        </ul>
		    </div>
		</div>
	</div>
	<div class="co_checkout">
        <div class="container">
        	<div class="row return_1">
        		<div class="col-lg-12">
		            <div class="return">
		                <h4>Returning customer?<span id="return1" class="c-login">  Click here to login</span></h4>
		            </div>
		            <div id="check-form1" class="check-form">
		                <p>Please login your account.</p>
		                <form>
		                    <div class="row">
		                        <div class="col-md-12 check">
		                        	<label>Username or email</label>
		                            <input type="text" name="name">
		                        </div>
		                        <div class="col-md-12 check">
		                        	<div class="c_lost">
		                        		<label class="c-box">
		                                    <input type="checkbox" name="agree"> Remember me
		                                </label>
		                                <p class="lost"><a href="#">Lost your password?</a></p>
		                        	</div>
		                        </div>
		                    </div>
		                    <button class="btn1">login</button>
		                </form>
		            </div>
		        </div>
		    </div>
		    <div class="row">
		    	<div class="col-lg-7">
				    <div class="co_billing">
				    	<h1 class="bill-head">Billing Details</h1>
				    	<form class="b-detail">
				    		<div class="sec-1">
				                <h5>Personal Information</h5>
				                <div class="row">
				                    <div class="col-md-6 check">
				                        <input type="text" placeholder="First name" name="name">
				                    </div>
				                    <div class="col-md-6 check">
				                        <input type="text" placeholder="Last name" name="name">
				                    </div>
				                    <div class="col-md-6 check">
				                        <input type="email" placeholder="Email address" name="name">
				                    </div>
				                    <div class="col-md-6 check">
				                        <input type="number" placeholder="Phone Number" name="name">
				                    </div>
				                </div>
				            </div>
				            <div class="sec-1">
				                <h5>Address</h5>
				                <div class="row">
				                    <div class="col-md-6 check">
				                        <input type="text" placeholder="House number and street name" name="name">
				                    </div>
				                    <div class="col-md-6 check">
				                        <input type="text" placeholder="Apartment, suite, unit etc. (optional)" name="name">
				                    </div>
				                </div>
				            </div>
				            <div class="sec-1">
				                <div class="row">
				                    <div class="col-md-6 check">
				                        <label>Town/City</label>
				                        <input type="text" placeholder="City" name="name">
				                    </div>
				                    <div class="col-md-6 check">
				                        <label>Zip</label>
				                        <input type="text" placeholder="Zip" name="name">
				                    </div>
				                </div>
				            </div>
			                <label class="c-box1">
			                    <input type="checkbox" name="agree">  Create an account?
			                </label>
			                <div class="check">
			                    <label>Order Notes (optional)</label>
			                    <textarea  rows="5" name="name"></textarea>
			                </div> 
		                </form>
				    </div>
				</div>
		        <div class="col-lg-5 inner-order_1">
		        	<h1 class="bill-head">Your Orders</h1>
		        	<div class="co_order1">
		        		<table class="table">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>lehnga choli <i class="fas fa-times"></i> 2</td>
                                    <td><i class="fal fa-rupee-sign"></i>4000</td>
                                </tr>
                                <tr>
                                    <td>occasion dress</td>
                                    <td><i class="fal fa-rupee-sign"></i>340</td>
                                </tr>
                                <tr>
                                    <td>Generator</td>
                                    <td><i class="fal fa-rupee-sign"></i>1400</td>
                                </tr>
                                <tr>
                                	<th>Total</th>
                                    <th><i class="fal fa-rupee-sign"></i> 8800</th>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn1">place order</button>
		        	</div>
		        </div>
	        </div>
        </div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
    <script type="text/javascript">
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

	    $('.main-menu>ul>li>a, .main-menu ul.drp-menu>li>a').on('click', function(e) {
         var element = $(this).parent('li');
         if (element.hasClass('open')) {
           element.removeClass('open');
           element.find('li').removeClass('open');
           element.find('ul').slideUp(500,"swing");
         }
         else {
           element.addClass('open');
           element.children('ul').slideDown(800,"swing");
           element.siblings('li').children('ul').slideUp(800,"swing");
           element.siblings('li').removeClass('open');
           element.siblings('li').find('li').removeClass('open');
           element.siblings('li').find('ul').slideUp(1000,"swing");
         }
         });


	    $('.f-product').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            infinite: false,
            prevArrow: '<div class="prev-arrow1"><i class="far fa-chevron-left"></i></div>',
            nextArrow: '<div class="next-arrow1"><i class="far fa-chevron-right"></i></div>',
            appendArrows: '.arrowx',
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

	        $(document).ready(function(){

	    	$(".sub-menu .fa.fa-caret-down").click(function () {
			$(this).parent(".sub-menu").children("ul").slideToggle("100");
			$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
		});
	    });


    </script>

    
@endsection