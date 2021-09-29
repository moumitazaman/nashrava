<!--Start Header -->
    <header id="header">
        <!-- Start Header Top -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="hidden-sm hidden-xs col-md-6">
                        <!-- Topbar Menu -->
                        <div class="topbar-menu">
                            <ul>
                                <li class="drop">

                                     <!--<a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe" aria-hidden="true"></i>English</a>
                                    <ul class="dropdown-menu">

                                        <li><a href="#">Bangla</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">German</a></li>
                                        <li><a href="#">Spanish</a></li>
                                    </ul> -->
                                </li>
                                <li><a href="callto:{{ get_static_option('mobile') }}"><i aria-hidden="true" class="fa fa-phone-square"></i>{{ get_static_option('mobile') }}</a></li>
                                <li><a href="mailto:{{ get_static_option('email') }}"><i class="fa fa-envelope-square" aria-hidden="true"></i>{{ get_static_option('email') }}</a></li>
                            </ul>
                        </div>
                        <!-- End Topbar Menu -->
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-4">
                        <!-- Topbar Menu -->
                        <div class="topbar-menu">
                            <ul>
                                <li class="drop">
                                    <a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs" aria-hidden="true"></i>Account</a>




                                    <ul class="dropdown-menu">
                                    @if(@Auth::user()->id != Null)
                                        <li><a href="{{ route('dashboard') }}">My Account</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                                     @else
                                        <li><a href="{{route('customer.login')}}">Login</a></li>

                                        <li><a href="{{route('customer.signup')}}">Register</a></li>
                                        @endif
                                    </ul>
                                </li>
                             <li>

                                        <form id="cpform" method="POST" action="{{route('cart.compare')}}" target="my_iframe">
                                        {{ csrf_field() }}
                                        <input type="hidden"  id="cpid" name="cpid">
												<button type="submit"  id="cp" class="btn pointer com btn-sm  active"  data-toggle="modal" data-target=".bd-example-modal-lg" style="color:#ffffff;background:#f36523;" class="tooltip-test" title="Compare">
												Compare:
            <span class="compare"></span>
                                                </button>

												</form>
                                </li>
                            </ul>
                        </div>
                        <!-- End Topbar Menu -->
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <!-- Start Social Icons -->
                        <div class="social-icons top-sicons">
                            <ul>
                                <li><a href="{{ get_static_option('facebook') }}"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="{{ get_static_option('twitter') }}"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="{{ get_static_option('linkedin') }}"><i class="fa fa-linkedin-square"></i></a></li>
                                <li><a href="{{ get_static_option('google') }}"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="{{ get_static_option('rss') }}"><i class="fa fa-rss-square"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Social Icons -->
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom-wrapper">
            <div class="header-bottom-area" style="background:#000000; padding:10px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8 col-sm-4 col-md-3">
                            <!-- Start Search Form -->
                            <div class="search-box-area header-search">

                                <form action="{{route('search')}}" method="get" onkeypress="this.form.submit()">
                            <input type="search" class="cat-search-box" name="search" placeholder="Enter your keyword" >
                            <i class="fa fa-search"></i>
                        </form>
                            </div>
                            <!-- End Search Form -->
                        </div>
                        <div class="hidden-xs col-sm-4 col-md-6">
                            <div class="logo-area">
                                <!-- Start Logo -->
                                <div class="logo">
                                </div>
                                <!-- End Logo -->
                            </div>
                        </div>
                        @php
                            $contents = Cart::content();
                            $count = Cart::count();
                            $total = 0;
                            $sum = 0;

                        @endphp
                        <div class="col-xs-4 col-sm-4 col-md-3">
                            <!-- Start Cart Area -->
                            <div class="cart-inner header-cart">
                                <a class="backet-area">
                                    <span class="added-total">{{ $count}}</span>
                                    <span class="mobileno">shopping cart</span>
                                </a>
                                <!-- Start Cart Dropdown -->
                                <div class="cart-items-area">
                                    <div class="cart-items-area-inner">
                                        <ul class="cart-items">
                                        @foreach($contents as $content)
                                @php
                                       $sum +=  $content->subtotal;
                                     @endphp
                                            <li>
                                            <a href="#" class="prodcut-thumb"><img src="{{ asset($content->options->image) }}" alt="" /></a>
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

{{--                                @if(@Auth::user()->id != NULL && Session::get('shipping_id') == NULL)--}}
{{--                                     <a href="{{route('customer.checkout')}}" class="btn-checkout"><span>Checkout</span></a>--}}
{{--                                      @elseif(@Auth::user()->id != NULL && Session::get('shipping_id') != NULL)--}}
{{--                                     <a href="{{route('customer.checkout')}}" class="btn-checkout"><span>Checkout</span></a>--}}
{{--                                      @else--}}
{{--                                     <a href="{{route('customer.login')}}" class="btn-checkout"><span>Checkout</span></a>--}}
{{--                                      @endif--}}




                            </span>
                                    </div>
                                </div>
                                <!-- End Cart Dropdown -->
                            </div>
                            <!-- End Cart Area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
        <!-- End Header Top -->
        <!-- Header Bottom -->
        <div class="header-bottom-area">
            <div class="container">
                <div class="row">
                    <!-- Start Header Bottom Inner -->
                    <div class="col-md-12">
                        <div class="header-bottom-inner">
                            <!-- Start Header Bottom Inner -->
                            <div class="header-navigation">
                                <div class="logo-area">
                                    <!-- Start Logo -->
                                    <div class="logo">
                                        <a href="{{ url('/') }}"><img src="{{asset('public/frontend/img/logo/nasrava_orange.png')}}" alt="" /></a>
                                    </div>
                                    <!-- End Logo -->
                                </div>
                                <!-- Start Menu Area -->
                                <div class="menu-area">
                                    <!-- Start Mobile Menu Active Area -->
                                    <div class="mobile-menu-area"></div>
                                    <!-- End Mobile Menu Active Area -->
                                    <!-- Start Main Menu  -->
                                    <nav class="main-menu">
                                        <ul>
                                            <li class="active home"><a href="{{url('/')}}">Home</a>

                                            </li>
                                            <li><a href="{{route('about.page')}}">About Us</a>

                                            </li>
                                            <li class="drop mega-menu hidden-xs hidden-sm"><a href="#">Category</a> <!-- Women -->
                                                <!-- Start Mega Menu -->
                                                <div class="mega-wrap" style=" background: #fff url({{ asset(get_static_option('banner_image')) }}) no-repeat scroll right top;">
                                                    <ul>
                                                    @foreach($categories as $category)
                                                        <li>
                                                            <ul>
                                                            <?php
                                         $subcategories=App\Model\SubCategory::where('category_id',$category->id)->get();
                                       ?>
                                                                <li><a href="{{route('category.wise.product',$category->id)}}"><h3>{{$category->category_name}}</h3></a></li> <!-- Tops -->
                                                                @foreach($subcategories as $subcategory)

                                                                <li><a href="{{route('sub.category.wise.product',$subcategory->id)}}">{{$subcategory->sub_category_name}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        @endforeach


                                                    </ul>
                                                </div>
                                                <!-- End Mega Menu -->
                                            </li>
                                            <li class="drop mobileyes"><a href="#">Category</a> <!-- Pages -->
                                                <ul>
                                                @foreach($categories as $category)
                                                <?php
                                         $subcategories=App\Model\SubCategory::where('category_id',$category->id)->get();
                                       ?>
                                  <li><a href="{{route('category.wise.product',$category->id)}}">{{$category->category_name}}</a>
                                  <ul class="sub-menu-2">
                                  @foreach($subcategories as $subcategory)

<li><a href="{{route('sub.category.wise.product',$subcategory->id)}}">{{$subcategory->sub_category_name}}</a></li>
@endforeach
                                                        </ul>
</li>
                                  @endforeach
</ul></li>
                                            <li class="drop"><a href="#">Brands</a> <!-- Pages -->
                                                <ul>
                                                @foreach($brands as $brand)
                                  <li><a href="{{route('brand.wise.product',$brand->id)}}">{{$brand->brand_name}}</a></li>
                                  
                                  
                                  @endforeach
</ul></li>
<li><a href="{{url('/flashdeals')}}">Flash Deals</a></li>
<li><a href="{{url('/contact')}}">Contact Us</a></li>

                                            <!--<li class="drop"><a href="#">Pages</a>
                                                <ul>
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-detail.html">Blog Details</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li class="drop2"><a href="product-details.html">Product Details</a>
                                                        <ul class="sub-menu-2">
                                                            <li><a href="product-grid.html">Product Grid</a></li>
                                                            <li><a href="product-list.html">Product List</a></li>
                                                            <li><a href="product-details.html">Product Details</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="drop2"><a href="product-grid.html">Shop</a>
                                                        <ul>
                                                            <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="contact.html">Contact Us</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">About</a></li>  -->
                                        </ul>
                                    </nav>
                                    <!-- End Main Menu  -->
                                </div>
                                <!-- End Menu Area -->
                            </div>
                            <!-- End Header Bottom Inner -->
                        </div>
                    </div>
                    <!-- End Header Bottom Inner -->
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>
    <!--End Start Header
