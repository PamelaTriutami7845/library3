@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	 <div class="container"><li class="breadcrumb-item active text-primary" aria-current="page">Shop</li></div>
	  </ol>
</nav>
<section class="shop-section text-center py-5">
	<div class="head-box text-center mb-5 col-md-12">
		{!! option('shops.title') !!}
	</div>
	<div class="container  mt-3 text-center">
		<ul class="outer_nav_area">
			<li class="listing clickme">
				<a href="{{ url('shops') }}" data-tag="one">All</a>
			</li>
			@foreach($shop_product_categories as $key => $shop_product_category)
				@if(count($shop_product_category->childs))
					<li class="listing  clickme">
						<a href="{{ URL::route('shops','?category='.$shop_product_category->name) }}" data-tag="{{$key}}">
							{{$shop_product_category->name}} <i class="fa fa-caret-down" aria-hidden="true"></i>
							
						</a>
						@include('categories/manageChild',['childs' => $shop_product_category->childs])
					</li>
				@else
					<li class="listing clickme">
						<a href="{{ URL::route('shops','?category='.$shop_product_category->name) }}" data-tag="{{$key}}">{{$shop_product_category->name}}</a>
					</li>
				@endif
			@endforeach
		</ul>
		@if(count($shop_products))
			<div class="tab-content">
				<div class="container tab-pane active" id="home">
					<section class="team-section bg-light py-5">
						<div class="container">
							<div class="row mb-5">
								@foreach($shop_products as $shop_product)
									<div class="col-md-3 mb-md-0 mb-sm-3">
										<div class="shop-box t-bottom box-shadow text-center">
											@if($shop_product->image)
									       		<img class="img-fluid" src="{{ Voyager::image($shop_product->image) }}" alt="">
									       	@else
									       		 <img class="img-fluid" src="/storage/icon/no-preview-available.jpeg" alt="">
									       	@endif
									       	<h5 class="head-club pt-4 mx-1">8.5" x 11" sheet labels</h5>
												{{-- <h3 class="head-club pt-4 px-3">{!! str_limit($shop_product->title,30, '...') !!}</h3> --}}
											<p class="decription pt-1 mx-1">8.5" x 11" - repositionable full sheet labels - 100 sheets $45.00</p>
									        <a href="{{ url('shops') . '/' . $shop_product->slug }}" class="btn btn-primary text-dark float-right mx-4 mt-3 mb-4">View</a>
									    </div>
									</div>
								@endforeach
							</div>
						</div>
					</section>
				</div>
			</div>
		@else
			<div class="jumbotron text-center mb-5 col-md-12">
				<p><strong> No Products Found .. </strong> </p>
			</div>
		@endif
	</div>
</section>
@endsection

@section('javascript')
<script>
	$(document).ready(function(){
		$('.listing a').click(function(){
			$('.listing a').removeClass('activelink');
			$(this).addClass('activelink');
			var tagid = $(this).data('tag');
			$('.list').removeClass('active').addClass('hide');
			$('#'+tagid).addClass('active').removeClass('hide');
		});
	});
	
</script>
@endsection