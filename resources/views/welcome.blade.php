@extends('layout.header_footer')


@section('content')

<!-- <style type="text/css">
    @keyframes border-transform {
            0%, 100% {
                border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%;
            }
            14% {
                border-radius: 40% 60% 54% 46% / 49% 60% 40% 51%;
            }
            28% {
                border-radius: 54% 46% 38% 62% / 49% 70% 30% 51%;
            }
            42% {
                border-radius: 61% 39% 55% 45% / 61% 38% 62% 39%;
            }
            56% {
                border-radius: 61% 39% 67% 33% / 70% 50% 50% 30%;
            }
            70% {
                border-radius: 50% 50% 34% 66% / 56% 68% 32% 44%;
            }
            84% {
                border-radius: 46% 54% 50% 50% / 35% 61% 39% 65%;
            }
        }
        @keyframes clips {
          50% {
            clip-path: polygon(40% 0%, 40% 20%, 100% 20%, 100% 80%, 40% 80%, 40% 100%, 0% 50%);
          }
      }

        .main img{
            clip-path: polygon(0% 20%, 60% 20%, 60% 0%, 100% 50%, 60% 100%, 60% 80%, 0% 80%);
            animation: clips 3s ease infinite;
            height: 100%;
        }
</style>
<div class="main">
    <div class="container w-50">
        <img src="/image/banner-1.jpg">
    </div>
</div> -->

    <div class="co_banner">
        <div class="banner-slider">

            @foreach($banner_data as $bd)
            <div>
                <div class="banner-section">
                    <div class="banner-img">
                        <img src="uploads/{{$bd->image}}">
                    </div>
                    <div class="banner-content">
                        <h1>{{$bd->title}}</h1>
                        <p>{{$bd->description}}</p>
                        <!-- <button class="button button-mat btn--7">
                            <div class="psuedo-text"><a href="#">learn more <i class="fal fa-arrow-right"></i></a></div>
                        </button> -->
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
    <div class="grey-bg-2">
        <div class="all_category pt_01">
            <div class="container">
                <div class="bg-white">
                    <!-- <h1 class="product-title1">all categories</h1> -->
                    <div class="head-product">
                        <h1 class="product-title">all categories</h1>
                        <a href="{{url('/all_category')}}">view all</a>
                    </div>
                    <div class="category_slider mb-0">

                        @foreach($category_data as $cd)
                        <div>
                            <div class="category">
                                <div class="category-img">
                                    <a href="#{{$cd->category}}" class="scrolltop"><img src="uploads/{{$cd->image}}"></a>
                                </div>
                                <div class="category-details">
                                    <h2>{{$cd->category}}</h2>
                                    <p>{{$cd->description}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="co_product pt_01 pb_01">
            <div class="container">
                <div class="bg-white">
                    <div class="head-product">
                        <h1 class="product-title">trending products</h1>
                        <a href="cloth-product.html">view all</a>
                    </div>
                    <div class="selling_slider p-slider seller-product">
                        <div>
                            <div class="product-main">
                                <div class="product-img">
                                    <a href="product.html"><img src="/image/product-08.jpg"></a>
                                </div>
                                <div class="product-details">
                                    <h1><i class="fal fa-rupee-sign"></i>2000 / 1 Day</h1>
                                    <h3>lehnga choli</h3>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-main">
                                <div class="product-img">
                                    <a href="product.html"><img src="/image/product-17.jpg"></a>
                                </div>
                                <div class="product-details">
                                    <h1><i class="fal fa-rupee-sign"></i>340 / 1 Day</h1>
                                    <h3>Sewing Machines</h3>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-main">
                                <div class="product-img">
                                    <a href="product.html"><img src="/image/product-24.png"></a>
                                </div>
                                <div class="product-details">
                                    <h1><i class="fal fa-rupee-sign"></i>550 / 1 Day</h1>
                                    <h3>washing machine</h3>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-main">
                                <div class="product-img">
                                    <a href="product.html"><img src="/image/product-19.webp"></a>
                                </div>
                                <div class="product-details">
                                    <h1><i class="fal fa-rupee-sign"></i>1340 / 1 Day</h1>
                                    <h3>weeding chairs</h3>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-main">
                                <div class="product-img">
                                    <a href="product.html"><img src="/image/product-22.jpg"></a>
                                </div>
                                <div class="product-details">
                                    <h1><i class="fal fa-rupee-sign"></i>1340 / 1 Day</h1>
                                    <h3>grown</h3>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-main">
                                <div class="product-img">
                                    <a href="product.html"><img src="/image/product-23.png"></a>
                                </div>
                                <div class="product-details">
                                    <h1><i class="fal fa-rupee-sign"></i>340 / 1 Day</h1>
                                    <h3>Sewing Machines</h3>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-main">
                                <div class="product-img">
                                    <a href="product.html"><img src="/image/cart-1.jpg"></a>
                                </div>
                                <div class="product-details">
                                    <h1><i class="fal fa-rupee-sign"></i>340 / 1 Day</h1>
                                    <h3>occasion dress</h3>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-main">
                                <div class="product-img">
                                    <a href="product.html"><img src="/image/product-11.webp"></a>
                                </div>
                                <div class="product-details">
                                    <h1><i class="fal fa-rupee-sign"></i>3000 / 1 Day</h1>
                                    <h3>Lehenga Choli</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($category_data as $cda)
        
        <div id="{{$cda->category}}" clas="co_product scrolltop cloth-product pb_01">
            <div class="container">
                <div class="bg-white">
                    <div class="head-product">
                        <h1 class="product-title">{{$cda->category}}</h1>
                        <a href="{{url('/view_category')}}/{{$cda->id}}">view all</a>
                    </div>
                    <div class="cloth_slider p-slider">
                        @foreach($cloth_data as $cld)
                        
                        @if($cda->id==$cld->category_id)
                        <div>
                            <div class="product-main">
                                <div class="product-img">
                                    @foreach($product_image as $pi)
                                    @if($pi->product_id==$cld->id)
                                    <a href="{{url('/product')}}/{{$cld->sub_category_id}}"><img src="uploads/{{$pi->m_product_image}}"></a>
                                    @break
                                    @endif
                                    @endforeach
                                </div>
                                <div class="product-details">
                                    <h1><i class="fal fa-rupee-sign"></i>{{$cld->product_price}} / {{$cld->duration}} Day</h1>
                                    <h3>{{$cld->product_name}}</h3>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
       
        @endforeach
        
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){

            $(document).on('click', 'a[href^="#"]', function (event) {
                event.preventDefault();

            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top - 130
            }, 500);
        });
    });

        
    </script>

@endsection


