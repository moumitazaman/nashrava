 <!-- Start Footer Area -->
    <footer id="footer-area">
        <!-- Start Footer Top Area -->
        <div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8 col-xm-12 col-sm-6 col-md-3"> 
                        <!-- Start Wedget -->
                        <div class="footer-wedget wedget-contact"> 
                            <!-- Start Wedget Title -->
                            <h4 class="wedget-title">Contact us</h4>
                            <!-- End Wedget Title -->
                            <!-- Start Wedget Lists -->
                            <ul>
                                <li class="phone"><a href="callto:{{ get_static_option('mobile') }}">{{ get_static_option('mobile') }}</a></li>
                                <li class="info-email"><a href="mailto:{{ get_static_option('email') }}">{{ get_static_option('email') }}</a></li>
                                <li class="location">Address :{{ get_static_option('address') }}</li>
                            </ul>
                            <!-- End Wedget Lists -->
                        </div>
                        <!-- End Wedget -->
                    </div>
                    <div class="col-xs-4 col-xm-12 col-sm-6 col-md-3"> 
                        <!-- Start Wedget -->
                        <div class="footer-wedget"> 
                            <!-- Start Wedget Title -->
                            <h4 class="wedget-title">MY ACCOUNT</h4>
                            <!-- End Wedget Title -->
                            <!-- Start Wedget Lists -->
                            <ul>
                               <li><a href="{{route('customer.login')}}">Login</a></li>
                               <li><a href="{{route('customer.checkout')}}">Checkout</a></li>
                               <li><a href="{{ route('dashboard') }}">Account</a></li>
                              
                            </ul>
                            <!-- End Wedget Lists -->
                        </div>
                        <!-- End Wedget -->
                    </div>
                    <div class="col-xs-6 col-xm-12 col-sm-6 col-md-3"> 
                        <!-- Start Wedget -->
                        <div class="footer-wedget"> 
                            <!-- Start Wedget Title -->
                            <h4 class="wedget-title">Payment & Shipping</h4>
                            <!-- End Wedget Title -->
                            <!-- Start Wedget Lists -->
                            <ul>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Payment Methods</a></li>
                                <li><a href="#">Shipping Guide</a></li>
                                <li><a href="#">Locations We Ship To</a></li>
                                <li><a href="#">Estimated Delivery Time	</a></li>
                            </ul>
                            <!-- End Wedget Lists -->
                        </div>
                        <!-- End Wedget -->
                    </div>	
                    <div class="col-xs-6 col-xm-12 col-sm-6 col-md-3"> 
                        <!-- Start Wedget -->
                        <div class="footer-wedget"> 
                            <!-- Start Wedget Title -->
                            <h4 class="wedget-title">Customer Service</h4>
                            <!-- End Wedget Title -->
                            <!-- Start Wedget Lists -->
                            <ul>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Compensation First</a></li>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Return Policy</a></li>
                                <li><a href="{{url('/contact')}}">Contact Us</a></li>
                            </ul>
                            <!-- End Wedget Lists -->
                       </div>
                       <!-- End Wedget -->
                    </div>	
                </div>
                <div class="row">
                    <div class="col-md-12"> 
                        	
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top Area -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4"> 
                        <!-- Start Copyright Text -->
                        <div class="copy-right-text"> 
                            <p>Copyright &copy; 2021 <a href="#" target="_blank">Nashrava</a> All Rights Reserved</p>
                        </div>
                        <!-- End Copyright Text -->
                    </div>
                    <div class="col-md-4">
                        <!-- Start Cards -->
                        <div class="card-buttons"> 
                            <img src="{{asset('public/frontend/img/cart/cards.png')}}" alt="" />
                        </div>
                        <!-- End Cards -->
                    </div>
                    <div class="col-md-4">
                    <span style="float:right;">Site By <a href="https://www.iciclecorporation.com/">ICICLE CORPORATION</a></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer Area -->