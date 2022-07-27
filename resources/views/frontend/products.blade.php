@extends('frontend.layouts.master')
@section('title','Myqueen | Products')
@section('body')
<main class="main">
	<nav class="breadcrumb-nav">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}"><i class="d-icon-home"></i></a></li>
				<li>@lang('auth.shop1')</li>
			</ul>
		</div>
	</nav>
	<div class="page-header pl-4 pr-4" style="background-image: url(images/shop-banner.jpg)">

		<!-- <h1 class="page-title font-weight-bold lh-1 text-capitalize">Shop</h1> -->

	</div>
	<!-- End PageHeader -->
	<div class="page-content mb-10 pb-3">
		<div class="container">
			<div class="row main-content-wrap gutter-lg">
				<aside class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
					<div class="sidebar-overlay"></div>
					<a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
					<div class="sidebar-content">
						<div class="sticky-sidebar" data-sticky-options="{'top': 10}">


							<div class="widget widget-collapsible">
								<h3 class="widget-title">@lang('auth.Size')</h3>
								<ul class="widget-body filter-items">
									<li><a href="#">@lang('auth.Extra Large')</a></li>
									<li><a href="#">@lang('auth.Large')</a></li>
									<li><a href="#">@lang('auth.Medium')</a></li>
									<li><a href="#">@lang('auth.Small')</a></li>
								</ul>
							</div>


						</div>
					</div>
				</aside>
				<div class="col-lg-9 main-content">
					<nav class="toolbox sticky-toolbox sticky-content fix-top">
						<div class="toolbox-left">
							<a href="#" class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary btn-rounded btn-icon-right d-lg-none">@lang('auth.Filter')<i class="d-icon-arrow-right"></i></a>
							<div class="toolbox-item toolbox-sort select-box text-dark">
								<label>@lang('auth.Sort By')</label>
								<select name="orderby" class="form-control">
									<option value="default">@lang('auth.Default')</option>
									<option value="popularity" selected="selected">@lang('auth.Most Popular')</option>
									<option value="rating">@lang('auth.Average rating')</option>
									<option value="date">@lang('auth.Latest')</option>
									<option value="price-low">@lang('auth.sortLow')</option>
									<option value="price-high">@lang('auth.sortHigh')</option>
									<option value="">@lang('auth.clearSort')</option>
								</select>
							</div>
						</div>
						<div class="toolbox-right">
							<div class="toolbox-item toolbox-show select-box text-dark">
								<label>@lang('auth.show')</label>
								<select name="count" class="form-control">
									<option value="12">12</option>
									<option value="24">24</option>
									<option value="36">36</option>
								</select>
							</div>

						</div>
					</nav>
					<div class="row cols-2 cols-sm-3 product-wrapper">
						@foreach ($products as $product)
						<div class="product-wrap">
							<div class="product">
								<figure class="product-media">
								<a href="{{ route('Product-Details', $product->id) }}">
                            <img src="{{ asset($product->productimagee) }}" alt="product" width="280" height="315">
                        </a>

									<div class="product-label-group">
										<label class="product-label label-new">@lang('auth.new')</label>
										<label class="product-label label-sale">12% @lang('auth.off1')</label>
									</div>
									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a>
										<a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
									</div>
									<div class="product-action">
										<a href="#" class="btn-product btn-quickview" title="Quick View">@lang('auth.Quick View')</a>
									</div>
								</figure>
								<div class="product-details">
                        <div class="product-cat">
                            <a href="{{ route('Product-Details', $product->id) }}">@lang('auth.productDetails')</a>
                        </div>
                        <h3 class="product-name">
                            <a href="{{ route('Product-Details', $product->id) }}">{{ $product->title }}</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">${{ $product->saleprice }}</ins><del class="old-price">${{ $product->regularprice }}</del>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:60%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="{{ route('Product-Details', $product->id) }}" class="rating-reviews">( 16
                                @lang('auth.reviews') )</a>
                        </div>
                    </div>
							</div>
						</div>
						@endforeach
					</div>
					<nav class="toolbox toolbox-pagination">
						<p class="show-info"> @lang('auth.Showing') <span>12 of 56</span> @lang('auth.Products')</p>
						<ul class="pagination">
							<li class="page-item disabled">
								<a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
									<i class="d-icon-arrow-left"></i>@lang('auth.prev')
								</a>
							</li>
							<li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
							<li class="page-item">
								<a class="page-link page-link-next" href="#" aria-label="Next">
									@lang('auth.next')<i class="d-icon-arrow-right"></i>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</main>
<!-- End Main -->
@endsection
