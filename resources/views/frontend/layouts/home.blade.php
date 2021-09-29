@extends('frontend.layouts.master')
 @section('content')
 @include('frontend.layouts.slider')
 <!-- Start Category Search Bar -->
   <!-- <div class="cartegory-search-bar last-in2 mobileyes">
        <div class="container">
            <div class="row">
                <div class="hidden-xs col-sm-4 col-sm-4 col-md-3">
                    <div class="category-menu-area">
                        <ul class="category-menu">
                            <li><span class="cat-heading">categories</span>
                                <ul class="cat-toggle">
                                @foreach($categories as $category)

                                    <li class="arrow">
                                        <a href="{{route('category.wise.product',$category->id)}}"><i class="fa fa-minus" aria-hidden="true"></i> {{$category->category_name}}</a>
                                        <?php
                                        $subcategories=App\Model\SubCategory::where('category_id',$category->id)->get();
                                       ?>
                                       <ul>
                                     @foreach($subcategories as $subcategory)

                                            <li><a href="{{route('sub.category.wise.product',$subcategory->id)}}">{{$subcategory->sub_category_name}}</a></li>





                                            @endforeach
                                            </ul>
                                    </li>
                               @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xm-12 col-sm-8 col-md-6 col-md-offset-3">
                    <div class="search-box-area">

                    <form action="{{route('search')}}" method="get" onkeypress="this.form.submit()">
                            <input type="search" class="cat-search-box" name="search" placeholder="Enter your keyword" >
                            <i class="fa fa-search"></i>
                        </form>


                    </div>
                    @php
                            $contents = Cart::content();
                            $count = Cart::count();
                            $total = 0;
                            $sum = 0;

                        @endphp
                    <div class="hidden-xs nav-cart-area">
                        <div class="cart-inner">
                            <a class="backet-area"><span class="added-total">{{ $count}}</span></a>
                            <div class="cart-items-area">
                                <ul class="cart-items">
                                @foreach($contents as $content)
                                @php
                                       $sum +=  $content->subtotal;
                                     @endphp
                                    <li>
                                        <a href="#" class="prodcut-thumb"><img src="{{$content->options->image}}" alt="" /></a>
                                        <div class="item-details">
                                            <a href="#" class="item-name">{{$content->name}}</a>
                                            <span class="item-quantity">QTY: {{$content->qty}}</span>
                                            <span class="item-price">{{$content->price}}</span>
                                            <span class="item-remove-btn"><a href="{{route('del.cart',$content->rowId)}}"><i class="fa fa-trash"></i></a></span>
                                        </div>
                                    </li>
                                     @php
                                       $total += $content->subtotal;
                                       $count ++;
                                    @endphp
                                   	@endforeach
                                </ul>
                                <p class="cart-total total">Total <span class="amount">{{$total}}</span></p>
                                <span>
                                    @if(Auth::user())
                                     <a href="{{route('view.cart')}}" class="btn-checkout"><span>Checkout</span></a>
                                      @else
                                     <a href="{{route('customer.login')}}" class="btn-checkout"><span>Checkout</span></a>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- End Category Search Bar -->
    <!-- Start Quick Category Area -->
    <!--<div id="quick-category-area" class="padtop10 padbot25">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    
                    <div class="single-category-item last-in">
                        <div class="category-thumb">
                            <img src="img/category-thumbs/4.png" alt="" />
                            <a href="#" class="btn-lucian">Shoes</a>
                        </div>
                    </div>
                   
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    
                    <div class="single-category-item">
                        <div class="category-thumb">
                            <img src="img/category-thumbs/5.png" alt="" />
                            <a href="#" class="btn-lucian">Men</a>
                        </div>
                    </div>
                    
                </div>
                <div class="clearfix hidden-sm"></div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                   
                    <div class="single-category-item">
                        <div class="category-thumb">
                            <img src="img/category-thumbs/6.png" alt="" />
                            <a href="#" class="btn-lucian">Bags</a>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    
                    <div class="single-category-item last-in3">
                        <div class="category-thumb">
                            <img src="img/category-thumbs/7.png" alt="" />
                            <a href="#" class="btn-lucian">Bags</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>-->
    <!-- End Quick Category Area -->
    <section id="best-seller-area" class="padtop10 padbot25">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Start Section Title -->
                    <div class="section-title title-box" style="padding-bottom:5px;">
                        <h2>Best Seller</h2>
                    </div>
                    <!-- End Section Title -->
                </div>
                <div class="col-sm-4 col-md-4">

                    <!--<ul role="tablist" class="tab-icons pull-right">
                            <li class="" role="presentation"><a data-toggle="tab" role="tab" aria-controls="grid" title="Grid" href="#grid1" aria-expanded="true"><i class="fa fa-th-large"></i></a></li>
                            <li role="presentation" class="active"><a data-toggle="tab" role="tab" aria-controls="list" title="List" href="#list1" aria-expanded="false"><i class="fa fa-th-list"></i></a></li>
                        </ul>-->
                        </div>
            </div>
            <div class="row">
                <!-- Start Best seller carousel -->
                <div class="tab-content">
                    <!-- Start Grid products -->
                    <div id="grid1" class="tab-pane active in fade" role="tabpanel">
                        <div class="products-gridview-inner">
                        @foreach($best_sell_products as $key => $cat_product)

                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
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
                                    <a href="{{route('product.details',$cat_product->slug)}}"><i class="fa fa-eye"></i>View Details</a>

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
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <span class="view-more">
                            <span class="amount">
                                                    <a href="{{route('bestseller.list')}}"   ><span style="color:#ffffff;">View More</span></a>
                                                </span>
                                                </span>
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









                    <div id="list1" class="tab-pane " role="tabpanel">
                        <!-- Start Products List View  -->
                        <div class="products-listview-inner">

                        @foreach($best_sell_products as $key => $cat_product)

                            <div class="col-xs-6 col-sm-12 col-md-12">
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
                                                <span class="add-to-cart">
                                                    <a href="{{route('product.details', $cat_product->slug)}}"   ><i class="fa fa-eye" aria-hidden="true"></i><span>View Details</span></a>
                                                </span>

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
                            <div class="col-md-12 text-center">
                            <span class="view-more">
                            <span class="amount">
                                                    <a href="{{route('bestseller.list')}}"   ><span style="color:#ffffff;">View More</span></a>
                                                </span>
                                                </span>
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
            </div>
        </div>
    </section>
    <!-- Start New Products -->
    <section id="new-products-area" class="padtop10 padbot15 lst">
        <div class="container">
            <div class="row">
            
                <div class="col-md-8">
                    <div class="section-title title-box" style="padding-bottom:5px;">
                        <h2>What's New</h2>
                    </div>
                    
                        
                </div>
                <div class="col-sm-2 col-md-4">

                    <!--<ul role="tablist" class="tab-icons pull-right">
                            <li class="" role="presentation"><a data-toggle="tab" role="tab" aria-controls="grid" title="Grid" href="#grid" aria-expanded="true"><i class="fa fa-th-large"></i></a></li>
                            <li role="presentation" class="active"><a data-toggle="tab" role="tab" aria-controls="list" title="List" href="#list" aria-expanded="false"><i class="fa fa-th-list"></i></a></li>
                        </ul>-->
                        </div>
            </div>
            <div class="row">

            <div class="tab-content">
                    <!-- Start Grid products -->
                    <div id="grid" class="tab-pane active in fade" role="tabpanel">
                        <div class="products-gridview-inner">
                        @foreach($products as $cat_product)

                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
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
                                    <a href="{{route('product.details',$cat_product->slug)}}"><i class="fa fa-eye"></i>View Details</a>

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
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <span class="view-more">
                            <span class="amount">
                                                    <a href="{{route('product.list')}}"   ><span style="color:#ffffff;">View More</span></a>
                                                </span>
                                                </span>
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









                    <div id="list" class="tab-pane " role="tabpanel">
                        <!-- Start Products List View  -->
                        <div class="products-listview-inner">

                        @foreach($products as $cat_product)

                            <div class="col-xs-6 col-sm-12 col-md-12">
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
                                                <span class="add-to-cart">
                                                    <a href="{{route('product.details', $cat_product->slug)}}"   ><i class="fa fa-eye" aria-hidden="true"></i><span>View Details</span></a>
                                                </span>

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
                            <div class="col-md-12 text-center">
                            <span class="view-more">
                            <span class="amount">
                                                    <a href="{{route('product.list')}}"   ><span style="color:#ffffff;">View More</span></a>
                                                </span>
                                                </span>
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
            </div>
        </div>
    </section>
    <!-- End New Products -->
    <!-- Start Best Seller -->
    
    <!-- End Best Seller -->
    <!--Start Offer -->

    <!-- Start Ads Area -->
    <div id="ads-area" class="padtop20 padbot35">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ads-inner">
                        <!-- Start Single Ad -->
                        <div class="single-ad">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <h3>{{ get_static_option('mobile') }}</h3>
                        </div>
                        <!-- End Single Ad -->
                        <!-- Start Single Ad -->
                        <div class="single-ad">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <h3>Home of Comfort & Class</h3>
                        </div>
                        <!-- End Single Ad -->
                        <!-- Start Single Ad -->
                        <div class="single-ad">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <h3>Super Fast Delivery</h3>
                        </div>
                        <!-- End Single Ad -->
                        <!-- Start Single Ad -->
                        <div class="single-ad">
                            <i class="fa fa-history" aria-hidden="true"></i>
                            <h3>Easy Exchange Policy</h3>
                        </div>
                        <!-- End Single Ad -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Ads Area -->
    <!-- Start Blog Area -->

    <!-- End Blog Area -->
    <!-- Start Testimonial Area -->
@endsection
