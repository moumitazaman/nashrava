@extends('frontend.layouts.master')
 @section('content')
    <!-- Start Breadcrumb -->
    <div id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <a href="{{url('/')}}">Home</a> <span class="separator">&gt;</span> <span> Category</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Breadcrumb -->
    <!-- Start Banner -->
    <div id="banner-area" style="background: rgba(0, 0, 0, 0) url('img/banners/banner-1.jpg') no-repeat scroll center top;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-inner">
                        <a class="btn-lucian" href="#">{{$cat_name->category_name}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
    <!-- Start Main Content -->
    <div id="main-content-area" class="padtop85 padbot65">
        <div class="container">
            <div class="row">
                <div class="prodcut-toolbar">
                    <form action="{{ route('category.wise.product', $cat_name->id) }}" method="get">
                        <div class="col-sm-8 col-md-8">
                            <div class="toolbar-form">
                                <div class="option-select">
                                    <select name="short" class="options-inner" onchange="this.form.submit()">
                                        <option value="new-first">Sort by newness</option>
                                        <option value="low-to-high">Sort by price: low to high</option>
                                        <option value="high-to-low">Sort by price: high to low</option>
                                    </select>
                                </div>
                                <div class="option-select">
                                    <select name="pagination" class="options-inner"  onchange="this.form.submit()">
                                        <option value="12">Show: 12 items per page</option>
                                        <option value="18"> 18 items per page</option>
                                        <option value="20"> 20 items per page</option>
                                        <option value="24"> 24 items per page</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-sm-4 col-md-4">
                        <!-- Nav tabs -->
                        <ul role="tablist" class="tab-icons pull-right">
                            <li class="" role="presentation"><a data-toggle="tab" role="tab" aria-controls="grid" title="Grid" href="#grid" aria-expanded="true"><i class="fa fa-th-large"></i></a></li>
                            <li role="presentation" class="active"><a data-toggle="tab" role="tab" aria-controls="list" title="List" href="#list" aria-expanded="false"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start Tab Content -->
                <div class="tab-content">
                    <!-- Start Grid products -->
                    <div id="grid" class="tab-pane" role="tabpanel">
                        <div class="products-gridview-inner">
                        @foreach($cat_products as $cat_product)

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                               <!-- Start Single Prodcut -->
                               <div class="single-product">
                                    <!-- Start Product Thumbnail -->
                                    <div class="product-thumb-area">
                                        <!-- Start Product Image -->
                                        <div class="product-thumb">
                                            <a href="{{route('product.details', $cat_product->slug)}}"><img src="{{url($cat_product->image)}}" alt="product" /></a>
                                          <!--  <span class="product-new">New</span>
                                            <span class="product-Sale">Sale</span>-->
                                             @if($cat_product->qty==0)
                                            <div class="carousel-caption">
              <h5 style="color:#ffffff;">Out of Stock</h5>
            </div>
            @endif
                                        </div>
                                        <!-- End Product Image -->

                                        <!-- Start Product Hidden Info -->
                                       <div class="product-hidden-info">
                                            <div class="quick-view">
                                                <a href="{{route('product.details', $cat_product->slug)}}"><i class="fa fa-eye"></i>View Details</a>
                                                <a href="javascript:void(0)" data-id="{{$cat_product->id}}" class="comp"><i aria-hidden="true" class="fa fa-exchange"></i> Compare</a>

                                            </div>

                                            
                                        </div>
                                        <!-- End Product Hidden Info -->
                                    </div>
                                    <!-- End Product Thumbnail -->
                                    <!-- Start Color Buttons -->
                                    <div class="prodcut-color-btn">
                                   
                                                <ul>
                                                    

                                                </ul>
                                    </div>
                                    <!-- End Color Buttons -->
                                    <!-- Start Product Info -->
                                    <div class="product-short-info">
                                        <!-- Start product short description -->
                                        <p class="p-short-des"><a href="{{route('product.details', $cat_product->slug)}}">{{$cat_product->title}}</a></p>
                                        <!-- End product short description -->
                                        <!-- Start Star Rating -->
                                       <!-- <div class="star-rating">
                                            <ul>
                                                <li class="star yes"><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li class="star yes"><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li class="star yes"><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li class="star yes"><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li class="star"><i class="fa fa-star" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>-->
                                        <!-- End Star Rating -->
                                    </div>
                                    <!-- End Product Info -->
                                    <!-- Start Prodcut Price Area -->
                                    <div class="product-price-area">
                                    @php
                                     $price = $cat_product->price - $cat_product->discount;
                                   @endphp
                                <span class="price">
                                    <span class="amount">BDT. {{ $price }}</span>@if($cat_product->discount) <span><del>{{$cat_product->price}}</del></span>@else <span><del>0.00</del></span>@endif
                                </span>
                                  
@if($cat_product->qty==0)
                                <span class="add-to-cart">
                                                    <a href="{{route('product.details', $cat_product->slug)}}"   ><i class="fa fa-frown-o" aria-hidden="true"></i><span>Out Of Stock</span></a>
                                                </span>
                                @else
                                                <span class="add-to-cart">
                                                    <a href="{{route('product.details', $cat_product->slug)}}"   ><i class="fa fa-eye" aria-hidden="true"></i><span>View Details</span></a>
                                                </span>
                                                @endif   
                            </div>
                                    <!-- End Prodcut Price Area -->

                               </div>
                               <!-- End Single Prodcut -->
                            </div>
                           @endforeach
                        </div>
                        <!-- Start Product Paginations -->
                    <div class="prodcuts-pagination">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                            {!! $cat_products->links('frontend.library.pagination.custom') !!}

                                <!--<ul class="licuan-pagination">
                                    <li class="pre-page"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                    <li class="current"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li class="next-page"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                </ul>-->
                            </div>
                        </div>	
                        <!-- End Product Paginations -->
                    </div>
                    <!-- End Grid products -->
                    <!-- Start List products -->









                    <div id="list" class="tab-pane active in fade" role="tabpanel">
                        <!-- Start Products List View  -->
                        <div class="products-listview-inner">

                        @foreach($cat_products as $cat_product)

                            <div class="col-xs-12 col-sm-12 col-md-12">
                               <!-- Start Single Prodcut -->
                                <div class="single-product">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <!-- Start Product Thumbnail -->
                                            <div class="product-thumb-area">
                                                <!-- Start Product Image -->
                                                <div class="product-thumb">
                                                    <a href="{{route('product.details', $cat_product->slug)}}"><img src="{{url($cat_product->image)}}" alt="product" /></a>
                                                    <span class="product-new">New</span>
                                                     @if($cat_product->qty==0)
                                            <div class="carousel-caption">
              <h5 style="color:#ffffff;">Out of Stock</h5>
            </div>
            @endif
                                                </div>
                                                <!-- End Product Image -->
                                            </div>
                                            <!-- End Product Thumbnail -->
                                            <!-- Start Color Buttons -->
                                            <div class="prodcut-color-btn">
                                                <ul>
                                               
                                                </ul>
                                            </div>
                                            <!-- End Color Buttons -->
                                        </div>
                                        <div class="col-xs-12 col-sm-8 col-md-8">
                                            <!-- Start Product Info -->
                                            <div class="product-short-info">
                                                <!-- Start product short description -->
                                                <p class="p-short-des"><a href="{{route('product.details', $cat_product->slug)}}">{{$cat_product->title}}</a></p>
                                                <!-- End product short description -->
                                                <!-- Start Star Rating -->
                                                <!--<div class="star-rating">
                                                    <ul>
                                                        <li class="star yes"><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li class="star yes"><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li class="star yes"><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li class="star yes"><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li class="star"><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    </ul>
                                                </div>-->
                                                <!-- End Star Rating -->
                                                <div class="product-desc">
                                                    <p>{{$cat_product->detail}}</p>
                                                </div>
                                            </div>
                                            <!-- End Product Info -->
                                            <!-- Start Prodcut Price Area -->
                                            <div class="product-price-area">
                                            @php
                                     $price = $cat_product->price - $cat_product->discount;
                                   @endphp
                                <span class="price">
                                    <span class="amount">BDT. {{ $price }}</span>@if($cat_product->discount) <span><del>{{$cat_product->price}}</del></span>@else <span><del>0.00</del></span>@endif
                                </span>
                                                @if($cat_product->qty==0)
                                <span class="add-to-cart">
                                                    <a href="{{route('product.details', $cat_product->slug)}}"   ><i class="fa fa-frown-o" aria-hidden="true"></i><span>Out Of Stock</span></a>
                                                </span>
                                @else
                                                <span class="add-to-cart">
                                                    <a href="{{route('product.details', $cat_product->slug)}}"   ><i class="fa fa-eye" aria-hidden="true"></i><span>View Details</span></a>
                                                </span>
                                                @endif   

                                                <!-- Start Wish List  -->
                                            <span class="listview-wishlist">
                                           <a href="javascript:void(0)" data-id="{{$cat_product->id}}" class="comp"><i aria-hidden="true" class="fa fa-exchange"></i> Compare</a>
                                                </span>
                                            </div>
                                            <!-- Start Prodcut Price Area -->
                                       </div>
                                   </div>
                               </div>
                               <!-- Start Single Prodcut -->
                            </div>

                               @endforeach

                        </div>
                        <!-- End Product List View -->
                        <!-- Start Pagination -->
                      <div class="licuan-pagination-area">
                            <div class="col-md-12">
                            {!! $cat_products->links('frontend.library.pagination.custom') !!}

                               <!-- <ul class="licuan-pagination">
                                    <li class="pre-page"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                    <li class="current"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li class="next-page"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                </ul>-->
                            </div>
                        </div>	
                        <!-- End Pagination -->
                    </div>
                    <!-- End List products -->
                </div>
            <!-- End Tab Content -->
            </div>
        </div>
    </div>
    <!-- End Main Content -->
    <!-- Start Brand Logos Area -->

    <!-- End Brand Logos Area -->
    <!-- Start Newsletter Area -->
    <div id="news-letter-area" class="padtop25 padbot25">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-4">
                    <!-- Start Newletter Title -->
                    <div class="news-letter-title">
                        <h3>Sign up for newsletter</h3>
                        <p>Duis autem vel eum iriureDuis autem vel eum</p>
                    </div>
                    <!-- End Newletter Title -->
                </div>
                <div class="col-sm-6 col-md-5 col-lg-6">
                   <!-- Start Newsletter Form -->
                   <div class="newsletter-form">
                        <form action="#" class="news-form">
                            <input type="text" class="f-form"/>
                            <input type="submit" value="subcribe" class="f-submit" />
                        </form>
                   </div>
                   <!-- End Newsletter Form -->
                </div>
                <div class="hidden-xs hidden-sm col-md-2  col-lg-2">
                    <!-- Start Footer Social Icons -->
                    <div class="social-icons footer-sicons">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss-square"></i></a></li>
                        </ul>
                    </div>
                    <!-- End Footer Social Icons -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Newsletter Area -->
    <!-- Start Footer Area -->
   @endsection
