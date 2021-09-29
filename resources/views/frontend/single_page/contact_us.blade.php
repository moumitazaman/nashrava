@extends('frontend.layouts.master')
@section('content')
 <!-- Start Banner Wrap -->
 <div id="banner-area" class="contact-banner-area" style="background: rgba(0, 0, 0, 0) no-repeat scroll center top;
">
    <div class="contact-page-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <!-- Start Banner Inner -->
                    <div class="contact-banner-inner"> 
                        <div class="contact-info-area"> 
                            <!-- Start Single Contact Item -->
                            <div class="single-contact-item"> 
                                <div class="lucian-table"> 
                                    <div class="lucian-table-cell"> 
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p>{{ get_static_option('address') }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Contact Item -->
                            <!-- Start Single Contact Item -->
                            <div class="single-contact-item"> 
                                <div class="lucian-table"> 
                                    <div class="lucian-table-cell"> 
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <h4>{{ get_static_option('mobile') }}</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Contact Item -->
                            <!-- Start Single Contact Item -->
                            <div class="single-contact-item"> 
                               <div class="lucian-table"> 
                                   <div class="lucian-table-cell"> 
                                       <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                       <p>{{ get_static_option('email') }}</p>
                                   </div>
                               </div>
                           </div>
                           <!-- End Single Contact Item -->
                           <!-- Start Single Contact Item -->
                           
                           <!-- End Single Contact Item -->
                        </div>
                    </div>
                    <!-- End Banner Inner -->
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Start Main Content -->
 <div id="main-content-area" class="padtop70 padbot65 cntnt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            @include('frontend.layouts.flash')

                <!-- Start Contact Form Content -->
                <div class="contact-form-content">
                    <!-- Start Comment Form -->
                    <div class="comment-form-area">
                        <h1 class="comment-title">Leave a message</h1>
                        <form class="ml-lg-2 pt-8 pb-10 pl-4 pr-4 pl-lg-6 pr-lg-6 grey-section" action="{{ url('contact-us')}}" method="POST">
                        @csrf
                            <div class="row comment-form-inner">
                                <div class=" col-sm-6 col-md-6">
                                    <!-- Name Field -->
                                   
                                    <input type="text" placeholder="Name" class="form-field" name="name">
                                </div>
                                <div class=" col-sm-6 col-md-6">
                                    <!-- Emial Field -->
                                    <input type="email" placeholder="Email" class="form-field" name="email">
                                </div>
                                
                                <div class="col-sm-12 col-md-12">
                                    <!-- Your Message Field -->
                                    <textarea placeholder="Your Message" class="form-field text-box" name="message_body"></textarea>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <!-- Submit Button -->
                                    <button type="submit" class="lucian-gray-btn"><span>Submit Comment</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Comment Form -->
                </div>
                <!-- End Contact Form Content -->
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->

   

@endsection