@extends('layout.header_footer')


@section('content')

<style type="text/css">
	.mobile_manu,.co_menu{
		display: none!important;
	}
	.page-link i {
	    font-size: 19px;
	    font-weight: 500;
	    line-height: 30px;
	}
</style>


<div class="grey-bg-2 pt_01 pb_01">
		<div class="co_inner-product grey-bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4">
						<div class="left-sidebar">
							<div class="function-1">
								<h2>search</h2>
								<div class="search-box1">
	                                <input type="text" placeholder="Search" name="search">
	                            </div>
							</div>
							<div class="function-1 main-menu">
								<h2>CATEGORIES</h2>
								 <ul class="menux main_drop">
	                                @foreach($category_data as $cd)
	                                <li class="sub-menu link1"><a href="#"><span>{{$cd->category}}</span> <i class="fas fa-chevron-down"></i></a>
	                                	
	                                	<ul style="display: none;">
	                                	@foreach($sub_category_data as $scd)
	                                	@if($scd->category_id==$cd->id)
						                  <li><a href="{{url('/category_product')}}/{{$scd->id}}">{{$scd->sub_category_name}}</a></li>
			                		    @endif
			                		    @endforeach
						               </ul>
						               
	                                </li>
	                                @endforeach
	                            </ul>
							</div>
							<div class="function-1 fun-slider">
								<h2>PRODUCTS <span class="arrowx"></span></h2>
								 <div class="slider f-product">
	                                <div>
	                                    <div class="inner-f-product">
	                                        <div class="f-product-img">
	                                            <img src="/image/product-03.jpg">
	                                        </div>
	                                        <div class="f-product-content">
	                                            <h3>decorate chair</h3>
	                                            <h6><i class="fal fa-rupee-sign"></i>500</h6>
	                                        </div>
	                                    </div>
	                                    <div class="inner-f-product">
	                                        <div class="f-product-img">
	                                            <img src="/image/product-06.jpg">
	                                        </div>
	                                        <div class="f-product-content">
	                                            <h3>kurta</h3>
	                                            <h6><i class="fal fa-rupee-sign"></i>400</h6>
	                                        </div>
	                                    </div>
	                                    <div class="inner-f-product">
	                                        <div class="f-product-img">
	                                            <img src="/image/product-01.png">
	                                        </div>
	                                        <div class="f-product-content">
	                                            <h3>camera</h3>
	                                            <h6><i class="fal fa-rupee-sign"></i>1500</h6>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div>
	                                    <div class="inner-f-product">
	                                        <div class="f-product-img">
	                                            <img src="/image/product-03.jpg">
	                                        </div>
	                                        <div class="f-product-content">
	                                            <h3>decorate chair</h3>
	                                            <h6><i class="fal fa-rupee-sign"></i>500</h6>
	                                        </div>
	                                    </div>
	                                    <div class="inner-f-product">
	                                        <div class="f-product-img">
	                                            <img src="/image/product-06.jpg">
	                                        </div>
	                                        <div class="f-product-content">
	                                            <h3>kurta</h3>
	                                            <h6><i class="fal fa-rupee-sign"></i>400</h6>
	                                        </div>
	                                    </div>
	                                    <div class="inner-f-product">
	                                        <div class="f-product-img">
	                                            <img src="/image/product-01.png">
	                                        </div>
	                                        <div class="f-product-content">
	                                            <h3>camera</h3>
	                                            <h6><i class="fal fa-rupee-sign"></i>1500</h6>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
							</div>
						</div>
					</div>






					<div class="col-lg-9 col-md-8">
						<div class="right-sidebar bg-white">
							<ul class="breadcumbs1">
						    	<li><a href="{{url('/')}}">Home</a>  <i class="fal fa-chevron-double-right"></i></li>
						    	@foreach($sub_category as $sc)
						    	
						    	<li>{{$sc->sub_category_name}}</li>
						    	
						    	@endforeach
					        </ul>
							<div class="product-fliter">
	                    		<div class="row">
	                    			@foreach($product_data as $pd)
	                    			<div class="col-lg-3 col-md-6">
			                        	<div class="product-main">
							            	<div class="product-img">
							            		@foreach($m_product_image as $mpi)
							            		@if($mpi->product_id==$pd->id)
							            		<a href="{{url('/product_detail')}}/{{$pd->id}}"><img src="/uploads/{{$mpi->m_product_image}}"></a>
							            		@break
							            		@endif
							            		@endforeach
							            	</div>
							            	<div class="product-details">
							            		<h1><i class="fal fa-rupee-sign"></i>{{$pd->product_price}} / {{$pd->duration}} Day</h1>
							            		<h3>{{$pd->product_name}}</h3>
							            	</div>
							            </div>
			                        </div>
			                        @endforeach
			                        
	                        	</div>
	                        </div>
				 		    <div class="product-fliter product-filter1">
				                <div class="row row1">
				                    <div class="col-lg-6 col-md-12 col-12">
				                        <div class="showing">
				                            <p>Showing 1 to 9 of 12 (1 Pages)</p>
				                        </div>
				                    </div>
				                    <div class="col-lg-6 col-md-12 col-12">
				                        {{ $product_data->links('vendor.pagination.custom') }}
				                    </div>
				                </div>
				            </div>
				 	    </div>
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
        });    

	    $(document).ready(function(){

	    	$(".sub-menu .fa.fa-caret-down").click(function () {
			$(this).parent(".sub-menu").children("ul").slideToggle("100");
			$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
		});
	    });


    </script>

@endsection


