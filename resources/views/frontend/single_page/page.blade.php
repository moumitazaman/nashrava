@extends('frontend.layouts.master')
@section('content')
    <!-- Start Breadcrumb -->
    <div id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <a href="{{url('/')}}">Home</a> <span class="separator">&gt;</span> <span>{{$page_name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <!-- Start Banner -->
    <div id="banner-area" class="gradient-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-inner blog-banner">
                        <a class="btn-lucian" href="#">{{$page_name}}</a>
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
                            <h2 class="entry-title"> {{$page_name}}</h2>
                            <!-- Start Meta -->
                            
                            <!-- End Meta -->
                        </header>
                        <!-- End Entry Header -->
                        <!-- Start Entry Content -->
                        <div class="entry-content">
                        {!! html_entity_decode(get_static_option($page_text)) !!}         
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