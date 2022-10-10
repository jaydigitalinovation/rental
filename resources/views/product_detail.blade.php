@extends('layout.header_footer')


@section('content')


	
	<div class="grey-bg-2 pb_01">
	    <div class="co_single-product">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-5">
						<div class="main">
							@foreach($product_data as $pda)
	                        <div class="slider slider-for">
	                        	@foreach($product_image as $pi)
	                            <div class="top-image"><img src="/uploads/{{$pi->m_product_image}}"></div>
	                            @endforeach
	                        </div>
	                        <div class="slider slider-nav">
	                        	@foreach($product_image as $pi)
	                            <div class="bottom-image"><img src="/uploads/{{$pi->m_product_image}}"></div>
	                            @endforeach
	                        </div>
	                        
	                    </div>
					</div>
					<div class="col-lg-7 col-md-7">
						<div class="single-product-details">
							<h1>{{$pda->product_name}}</h1>
							<h6 class="product-price"><i class="fal fa-rupee-sign"></i>{{$pda->product_price}} / {{$pda->duration}} Day</h6>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
							<p class="d-inline"><strong>Category:</strong><p class="d-inline">{{$pda->product_name}}</p>,
								@foreach($sub_category as $sc)
								@if($sc->id==$pda->sub_category_id)
								<p class="d-inline">{{$sc->sub_category_name}}</p>
								@endif
								@endforeach
							</p>
							<div class="row row1">
								<div class="col-lg-6 col-md-6 col-6">
	                                 <div class="dropdown select-days">
	                                    <input class="text-box" type="text" placeholder="Select Days" readonly>
	                                    <div class="options">
	                                      <div onclick="show('1 Days')">1 Days</div>
	                                      <div onclick="show('2 Days')">2 Days</div>
	                                      <div onclick="show('3 Days')">3 Days</div>
	                                      <div onclick="show('4 Days')">4 Days</div>
	                                      <div onclick="show('1 week')">1 week</div>
	                                      <div onclick="show('1 month')">1 month</div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-lg-6 col-md-6 col-6">
	                                <div class="quality">
	                                    <h3 class="cart-title">Qty</h3>
	                                    <div class="number">
	                                        <span class="minus">-</span>
	                                        <input type="text" value="1"/>
	                                        <span class="plus">+</span>
	                                    </div> 
	                                </div>
	                            </div>
	                        </div>
							<div class="book-btn">
								<div class="call-btn">
									<a href="tel:123-456-7890"><span class="call-icon"><i class="fal fa-phone"></i></span> call now</a>
								</div>
							    <div class="call-btn read-more1">
	                            	<a href="{{url('/book_now')}}/{{$pda->id}}"><span class="call-icon"><i class="fal fa-arrow-right"></i></span> book now</a>
	                            </div>
	                        </div>
						</div>
					</div>
				</div>
				@endforeach
				<div class="product-tab">
					<div class="row">
						<div class="col-lg-3 col-md-3 set-product-tab">
					        <ul class="nav" role="tablist">
		                        <li class="nav-item">
		                        	<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
		                        </li>
		                        <li class="nav-item">
		                        	<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"> Additional information </a>
		                        </li>
	                        </ul>
	                    </div>
	                    <div class="col-lg-9 col-md-9">
	                        <div class="tab-content">
	                        	@foreach($product_data as $pda)
	                	        <div class="tab-pane active" id="tabs-1" role="tabpanel">
	                		        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
	                	        </div>
	                	        <div class="tab-pane" id="tabs-2" role="tabpanel">
	                	        	<table class="table table-bordered">
						        	    <tbody>
						        	        <tr>
						        	          <th scope="row">Color:</th>
						        	          <td>{{$pda->color}}</td>
						        	        </tr>
						        	        <tr>
						        	          <th scope="row">Sizes:</th>
						        	          @foreach($size as $s)
						        	          @if($s->id==$pda->size_id)
						        	          <td>{{$s->name}}</td>
						        	          @endif
						        	          @endforeach
						        	          
						        	        </tr>
						        	    </tbody>
						        	</table>
	                	        </div>
	                	        @endforeach
	                        </div>
	                    </div>
	                </div>
				</div>
			</div>
	    </div>

	    @foreach($category_name as $ca)
	    <div class="co_product cloth-product">
		    <div class="container">
		    	<div class="bg-white">
		    		<div class="head-product">
					    <h1 class="product-title">related products</h1>
					    <a href="{{url('/category_product')}}/{{$sub_category_id}}">view all</a>
					</div>
					<div class="cloth_slider p-slider">

						@foreach($product_data_all as $pda)
						<div>
                        	<div class="product-main">
			                    <div class="product-img">
			                    	@foreach($product_image_all as $pi)
						            @if($pi->product_id==$pda->id)
			                    	<a href="{{url('/product_detail')}}/{{$pda->id}}"><img src="/uploads/{{$pi->m_product_image}}"></a>
			                    	@break
						            @endif
						            @endforeach
			                    </div>
			                	<div class="product-details">
			                		<h1><i class="fal fa-rupee-sign"></i>{{$pda->product_price}} / {{$pda->duration}} Day</h1>
			                		<h3>{{$pda->product_name}}</h3>
			                	</div>
			                </div>
                        </div>
                        @endforeach
                        
					</div>
				</div>
		    </div>
	    </div>
	    @endforeach
	</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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

		
    	function show(value) {
            document.querySelector(".text-box").value = value;
        };
        $(".dropdown").click(function(){
            $(".dropdown").toggleClass("active1");
        });

    	$(window).scroll(function(){
            if ($(this).scrollTop() > 50) {
                $('#dynamic').addClass('newClass');
            } else {
                $('#dynamic').removeClass('newClass');
            }
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


        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav',
        });

        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            focusOnSelect: true,
            infinite: false,
            prevArrow: '<div class="cart-arrow slide-arrow prev-arrow"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="cart-arrow slide-arrow next-arrow"><i class="fas fa-chevron-right"></i></div>',
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  },
                },
            ],
        });

        

        $('.minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        }); 
       
        $('.cloth_slider').slick({
            slidesToShow: 8,
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
                  slidesToShow:6,
                  slidesToScroll: 1,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 1024,
                  settings: {
                  slidesToShow:4,
                  slidesToScroll: 1,
                  adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow:2,
                    slidesToScroll: 1,
                  },
                },
            ],
        });

        $(document).ready(function(){

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
        });

        $(document).ready(function(){

	    	$(".sub-menu .fa.fa-caret-down").click(function () {
			$(this).parent(".sub-menu").children("ul").slideToggle("100");
			$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
		});
	    });


    </script>

@endsection


    