@extends('frontend.layouts.master')
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
<!-- End Header -->
       <!-- End Header -->
<!-- End Header -->
<div id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <a href="{{url('/')}}">Home</a> <span class="separator">&gt;</span> <span>Order Details</span>
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
                        <a class="btn-lucian" href="#">Order Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- End PageHeader -->
            <div id="main-content-area" class="padtop80 padbot25 my2">
                <div class="container">
                    <div class="tab tab-vertical">
                        <ul class="nav nav-tabs mb-4" role="tablist">
                           <li class="nav-item">
                                <a  href="{{route('dashboard')}}" style="font-weight: bold">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a  href="{{route('customer.order.list')}}" style="font-weight: bold;">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();" style="font-weight: bold">Logout</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                        <div class="tab-content">
                        <div class="container mt-8 mb-4">
					<div class="row gutter-lg">
						<div class="col-lg-12 col-md-12">
							<table class="txt-center myTable" width="100%" border="1">
               <tr>
                 <td width="30%">
                   <a href="{{url('')}}"><img src="{{url('public/frontend/img/logo/nasrava_orange.png')}}" alt="IMG-LOGO" style="width:115px;height:77px;padding : 5px 0px 0px 15px"></a>
                 </td>
                 <td width="40%" style="text-align: center;">
                   <h4><strong>Company Name: Nashrava</strong></h4>
                    <span><strong>Address:</strong>House# 03(4th floor), Road# 19, Sector# 13, Uttara, Dhaka-1230.</span>
                   <span><strong>Phone Number: </strong>01309286974</span><br/>
                    <span><strong>Email:</strong>support@nashrava.co</span>

                 </td>
                 <td width="30%" style="padding-left: 5px;">
                   <strong>Order No: # {{$order->order_no}}</strong>
                 </td>
               </tr>
               <tr>
                <td style="padding-left: 5px;"><strong>Billing Info</strong></td>
                <td colspan="2" style="text-align: left;padding-left: 5px;">
                  <strong >Name :&nbsp;</strong>{{$order->shipping->first_name}} {{$order->shipping->last_name}} <br/>
                  <strong >Mobile No :&nbsp;</strong>{{$order->shipping->mobile_no}}<br/>
                  <strong >Email :&nbsp;</strong>{{$order->shipping->email}}<br/>
                  <strong >Address :&nbsp;</strong>{{$order->shipping->address}}<br/>
                  <strong>Payment :&nbsp;</strong>{{$order->payment->payment_method}}
                       @if($order->payment->payment_method == 'Bkash')
                         (Transaction no:{{$order->payment->transaction_no}})
                       @endif
                </td>
               </tr>
               <tr>
                 <td colspan="3" style="padding-left: 5px;">
                   <strong>Order Dtails</strong>
                 </td>
               </tr>
               <tr>
                 <td style="padding-left: 5px;"><strong>Product Name & Image</strong></td>
                 <td style="padding-left: 5px;"><strong>Size</strong></td>
                 <td style="padding-left: 5px;"><strong>Quantity & Price</strong></td>
               </tr>
               @foreach($order['OrderDetail'] as $details)

               <tr>
                <td style="padding : 5px 0px 0px 5px;">
                  <img src="{{url($details->product->image)}}"
                            style="width:50px;height:55px;border:1px solid #000;"> &nbsp; {{$details->product->product_name}}
                </td>
                <td style="padding-left: 5px;">
               <?php
                if(!$details->size==0 ){

                ?>
                 {{$details->size->size_name}}

                <?php }?>

                </td>
                <td style="padding-left: 5px;">
                    @if($details->coupon_id)
                    {{$details->quantity}} x <del> {{$details->product->price - $details->product->discount ?? 0}} = {{ $details->quantity * $details->product->price - $details->product->discount ?? 0}} </del> <br>
                    {{$details->quantity}} x  {{ discount_price($details->customer_id,$details->product_id,$details->coupon_id) }} = {{ $details->quantity * discount_price($details->customer_id,$details->product_id,$details->coupon_id) }}
                     
                    @else
                        {{$details->quantity}} x  {{$details->product->price - $details->product->discount ?? 0}} = {{ $details->quantity * ($details->product->price - $details->product->discount ?? 0) }}
                    @endif
                </td>
               </tr>
               @endforeach
               <tr>
                <td colspan="2" style="text-align: right;"><strong>SubTotal @php if($ordernum==1){ echo "(10 % Discount on Your First Purchase)";} @endphp</strong></td>
                <td style="padding-left: 5px;">{{$order->order_total_amount}}</td>
               </tr>
               <tr>
                                                   <td colspan="2" style="text-align: right;padding-right: 5px;">Shipping Charge:</td>
                                                                                                                      <td style="padding-left: 5px;">{{$order->shipping->shipping_cost}}</td>

                                                   </tr>
<tr>
                <td colspan="2" style="text-align: right;padding-right: 5px;"><strong>Grand Total</strong></td>

                <td style="padding-left: 5px;">{{$order->order_total_amount + $order->shipping->shipping_cost}}</td>
               </tr>
             </table>

						</div>
					</div>
				</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
