@extends('frontend.layouts.master')
@section('content')
    <!-- Start Breadcrumb -->
    <div id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <a href="{{url('/')}}">Home</a> <span class="separator">&gt;</span> <span>About Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <!-- Start Banner -->
    <div id="banner-area" class="gradient-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-inner blog-banner">
                        <a class="btn-lucian" href="#">About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
    <!-- Start Main Content -->
    <div id="main-content-area" class="padtop80 padbot60">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-10">
                    <!-- Start Single Bloag Post -->
                    <article id="post" class="single-post-content">
                        <!-- Start Thumbnail Image -->
                        
                        <!-- End Thumbnail Image-->
                        <!-- Entry Header -->
                        <header class="entry-header">
                            <h2 class="entry-title">Exchange Policy </h2>
                            
                        </header>
                        <!-- End Entry Header -->
                        <!-- Start Entry Content -->
                        <div class="entry-content">
                            <p>
                            
To guarantee that you are fully satisfied with your purchases, we are happy to exchange within 15 days with a valid receipt. 
</br>Returned item’s condition must be unworn, unused with all price tags plus barcodes intact along with the original packaging.

                        
                            </p>
                            <h4>Exchange Request Form:</h4>
                            <p>
                            <form class="ml-lg-2 pt-8 pb-10 pl-4 pr-4 pl-lg-6 pr-lg-6 grey-section" action="{{ url('exchange')}}" method="POST">
                        @csrf
                            <div class="row comment-form-inner">
                                <div class=" col-sm-6 col-md-6">
                                    <!-- Name Field -->
                                   
                                    <input type="text" placeholder="Name" class="form-field" name="name">
                                </div>
                                <div class=" col-sm-6 col-md-6">
                                    <!-- Name Field -->
                                   
                                    <input type="text" placeholder="Phone" class="form-field" name="phone">
                                </div>
                                <div class=" col-sm-6 col-md-6">
                                    <!-- Emial Field -->
                                    <input type="email" placeholder="Email" class="form-field" name="email">
                                </div>
                                <div class=" col-sm-6 col-md-6">
                                    <!-- Name Field -->
                                   
                                    <input type="text" placeholder="Order No" class="form-field" name="order_no">
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <!-- Your Message Field -->
                                    <textarea placeholder="Reason for Exchange" class="form-field text-box" name="message_body"></textarea>
                                </div>
                                <h3>List of Product you want to return</h3>
                                <div class=" col-sm-6 col-md-6">
                                <input type="text" placeholder="Style Number" class="form-field" name="exstyle">
                                </div>
                                <div class=" col-sm-6 col-md-6">
                                    <!-- Emial Field -->
                                    <input type="text" placeholder="Size" class="form-field" name="exsize">
                                </div>
                                
                                <h3>List of Product you want in Exchange</h3>
                                <div class=" col-sm-6 col-md-6">
                                <input type="text" placeholder="Style Number" class="form-field" name="style">
                                </div>
                                <div class=" col-sm-6 col-md-6">
                                    <!-- Emial Field -->
                                    <input type="text" placeholder="Size" class="form-field" name="size">
                                </div>
                               
                                <div class="col-sm-12 col-md-12">
                                    <!-- Your Message Field -->
                                    <textarea placeholder="Your Message" class="form-field text-box" name="message"></textarea>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <!-- Submit Button -->
                                    <button type="submit" class="lucian-gray-btn"><span>Submit</span></button>
                                </div>
                            </div>
                        </form>
                            
                            </p>
                            <p>
                            <i>Exchange Conditions:</i>
ADDITIONAL DELIVERY CHARGE FOR EXCHANGE For exchange customer must receive the delivery, make the payment and keep the product unused.
 </br>
 Customer Care Team should be informed by calling: <span style="color:#F36523;">01309286974 </span>within <span style="color:#F36523;">3 days of receiving the delivery</span>. Customer has to mention size of desired product that they want to exchange with. We will send the exchanged product. </br>
 While receiving the new product customer has to return the previous product to deliverymanplus delivery charge. In case of exchanging with a product of higher value, additional amount must be paid during exchange delivery. If customer is from out of Dhaka, unfortunately customer must pay additional delivery charge of Shundarban/ S.A Paribahan to return the product to our office.</br>
  NashraVa will bear the cost of resending the exchanged product. The product must be returned to our office first via any courier service. After receiving the product we will send the exchanged product. Customer can exchange any ordered product for 1 time only.
</p>
<p><span style="color:#F36523;">Returned product must be in unused condition with no marks and all packaging intact, including the shoe box.We will not accept any used /damaged product.</span>
                            
                            </p>
                        </div>
                        <!-- End Entry Content -->
                       
                    </article>
                    <!-- End Single Bloag Post -->
                   
                    <!-- Start Comment Form -->
                    
                    <!-- End Comment Form -->
                </div>
                <div class="hidden-xs col-sm-2 col-md-2">
                    <!-- Start Social Shares -->
                   <!-- <div class="social-shares">
                        <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a href="#" class="vimeo"><i class="fa fa-vimeo-square" aria-hidden="true"></i></a>
                        <a href="#" class="pinterest"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>-->
                    <!-- End Social Shares -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
    <!-- Start Brand Logos Area -->
   
    <!-- End Brand Logos Area -->
   @endsection