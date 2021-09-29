@extends('frontend.layouts.master')
<link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">

@section('css')
<style type="text/css">

  
        #login .container #login-row #login-column #login-box {
                margin-top: 40px;
                max-width: 600px;
              
                border: 1px solid #9C9C9C;
                background-color: #EAEAEA;
                margin-bottom: 40px;
      }

      #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
      }

      #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
      }

  </style>
@endsection
@section('content')
<div id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="breadcrumbs">
                        <a href="{{url('/')}}">Home</a> <span class="separator">&gt;</span> <span>Dashboard</span>
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
                        <a class="btn-lucian" href="#">Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Header -->
<div id="main-content-area" class="padtop80 padbot25 my2">
            
            <!-- End PageHeader -->
            <div class="page-content mt-10 mb-10">
                <div class="container pt-1">
                    <div class="tab tab-vertical">
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboard')}}" style="font-weight: bold">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="{{route('customer.order.list')}}" style="font-weight: bold;">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();" style="font-weight: bold">Logout</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> 
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="dashboard">
                                <p class="mb-2">
                                    Welcome to Your Personal Dashboard.Here you can check your Order List and Order Details.
                                </p>
                            </div>
                           <!--  <div class="tab-pane" id="orders">
                                <p class=" b-2">No order has been made yet.</p>
                                <a href="#" class="btn btn-primary">Go Shop</a>
                            </div>
                            <div class="tab-pane" id="downloads">
                                <p class="mb-2">No downloads available yet.</p>
                                <a href="#" class="btn btn-primary">Go Shop</a>
                            </div> -->
                           <!--  <div class="tab-pane" id="address">
                                <p class="mb-2">The following addresses will be used on the checkout page by default.
                                </p>
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="card card-address">
                                            <div class="card-body">
                                                <h5 class="card-title">Billing Address</h5>
                                                <p>User Name<br>
                                                    User Company<br>
                                                    John str<br>
                                                    New York, NY 10001<br>
                                                    1-234-987-6543<br>
                                                    yourmail@mail.com<br>
                                                </p>
                                                <a href="#" class="btn btn-link btn-secondary btn-underline">Edit <i
                                                        class="far fa-edit"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card card-address">
                                            <div class="card-body">
                                                <h5 class="card-title">Shipping Address</h5>
                                                <p>You have not set up this type of address yet.</p>
                                                <a href="#" class="btn btn-link btn-secondary btn-underline">Edit <i
                                                        class="far fa-edit"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <form action="#" class="form">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" class="form-control" name="first_name" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" class="form-control" name="last_name" required="">
                                        </div>
                                    </div>

                                    <label>Display Name *</label>
                                    <input type="text" class="form-control mb-0" name="display_name" required="">
                                    <small class="d-block form-text mb-4">This will be how your name will be displayed
                                        in the account section and in reviews</small>

                                    <label>Email address *</label>
                                    <input type="email" class="form-control" name="email" required="">

                                    <label>Current password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control" name="current_password">

                                    <label>New password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control" name="new_password">

                                    <label>Confirm new password</label>
                                    <input type="password" class="form-control" name="confirm_password">

                                    <button type="submit" class="btn btn-primary btn-reveal-right">SAVE CHANGES <i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection