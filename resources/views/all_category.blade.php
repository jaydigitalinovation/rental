@extends('layout.header_footer')


@section('content')


	<div class="co_breadcumbs1">
		<div class="container">
			<div class="inner-breadcumbs1">
				<h1>All Categories</h1>
			    <ul class="breadcumbs1">
		        	<li><a href="{{url('/')}}">Home</a>  <i class="fal fa-chevron-double-right"></i></li>
		        	<li>All Categories</li>
		        </ul>
		    </div>
		</div>
	</div>
	<div class="all-caterory inner_category">
		<div class="container">
			<div class="row">

				@foreach($category_data as $cd)
				<div class="col-xl-2 col-lg-3 col-md-4 mb_01">
					<div class="category">
						<div class="category-img">
			    	        <a href="{{url('/view_category')}}/{{$cd->id}}"><img src="uploads/{{$cd->image}}"></a>
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




@endsection