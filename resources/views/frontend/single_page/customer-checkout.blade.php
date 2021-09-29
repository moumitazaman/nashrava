@extends('frontend.layouts.master')

@section('css')
 <!-- Main CSS File -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/demo2.min.css">

@endsection

@section('content')
<!-- End Header -->
<!-- End Header -->

    <!-- Start Breadcrumb -->
    <div id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <a href="{{url('/')}}">Home</a> <span class="separator">&gt;</span> <span>Checkout</span>
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
                        <a class="btn-lucian" href="#">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    
   .chkdisabled{
       pointer-events: none !important;
       cursor: default !important;
       color:white !important;
      
}
.order-table,.btn-order{
    background:#F36523;
    color:white;
}
</style>
			<!-- End PageHeader -->
			<div id="main-content-area" class="padtop80 padbot25 my2">
				<div class="container mt-4">
					<form action="{{route('customer.checkout.store')}}" method="POST" class="form">
						@csrf

						<div class="row gutter-lg">
							<div class="col-lg-6 mb-6">
								<h3 class="title title-simple text-left">Billing Details</h3>

								<div class="row">
									<div class="col-xs-12">
									@if ($errors->any())
										<div class="alert alert-danger">
											<ul>
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label>First Name *</label>
										<input type="text" class="form-control" name="first_name" required="" />
									</div>
									<div class="col-xs-6">
										<label>Last Name *</label>
										<input type="text" class="form-control" name="last_name" required="" />
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label>Email address</label>
										<input type="email" class="form-control" name="email"  />
									</div>
									<div class="col-xs-6">
										<label>Phone *</label>
										<input type="text" class="form-control" name="mobile_no" required="" />
									</div>
								</div>
								<label>Address *</label>
								<textarea class="form-control" name="address" placeholder="Please Give Us Your Address in Details" required=""></textarea>

								<label>Town / City </label>
								<input type="text" class="form-control" name="city" />
								<label>Country </label>
								<input type="text" class="form-control" name="country" />

								<!-- <div class="form-checkbox mt-8">
									<input type="checkbox" class="custom-checkbox" id="create-account"
										name="create-account">
									<label class="form-control-label" for="create-account">Create an account?</label>
								</div>
								<div class="form-checkbox mb-8">
									<input type="checkbox" class="custom-checkbox" id="different-address"
										name="different-address">
									<label class="form-control-label" for="different-address">Ship to a different
										address?</label>
								</div> -->
								<!-- <label>Order Notes (optional)</label>
								<textarea class="form-control" cols="30" rows="6"
									placeholder="Notes about your order, e.g. special notes for delivery"></textarea> -->

							</div>
							<aside class="col-lg-6 sticky-sidebar-wrapper mt-4">
								<div class="sticky-sidebar" data-sticky-options="{'bottom': 50}">
									<h3 class="title title-simple text-left">Your Order</h3>
									<div class="summary mb-4">
										<table class="table order-table">
											@php
											$totals=0;
											$pricetotal=0;
											$pricediscount=0;
			                                 $contents = Cart::content();
											   
							                @endphp
											<thead>
												<tr>
													<th>Product</th>
													<th>Total</th>
												</tr>
											</thead>
											<tbody>
												@foreach($contents as $content)
												<tr>
													<td class="product-name">{{$content->name}}</td>
													<td class="product-total">BDT. {{$content->price}} @if($content->price != get_discount_price_by_product_id($content->id))
                                                            to {{ get_discount_price_by_product_id($content->id) }} @endif
                                                    </td>
												</tr>
												@php
												if($order==0){
												
                                     
                                     
                                     $pricetotal+=$content->qty * $content->price;
												$totals+=$content->qty * get_discount_price_by_product_id($content->id);
												$firstPurchasediscount=$totals*0.1;
                                     $pricediscount=$totals-$firstPurchasediscount;

												}
												else{
												$pricetotal+=$content->qty * $content->price;
												$pricediscount+=$content->qty * get_discount_price_by_product_id($content->id);

												}
											

												@endphp
												@endforeach

																						<tr class="order-total">
													<td>Total:</td>
													<td>BDT. {{$pricetotal}}
                                                        
                                                    </td>
                                                    </tr><tr>
													<td>With Discount:</td>
													<td>BDT. 
														 {{$pricediscount}}
														 
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                    <td>
                                                        <?php
                                     $shipdhaka=App\Model\ShippingCost::where('shipping_area','Dhaka')->first();
                                                                          $shipout=App\Model\ShippingCost::where('id',2)->first();
                                    $dhakatotal=$pricediscount+$shipdhaka->shipping_cost;
                                    $outdhaka=$pricediscount+$shipout->shipping_cost;
                                     ?>
                                                       Select Shipping Zone: 
                                                          <div class="form-check">
  <input class="form-check-input" type="radio" name="ship" id="dhaka" value="{{$shipdhaka->shipping_cost}}">
  <label class="form-check-label" for="dhaka">
    Inside Dhaka <span class="shiptotals1"></span>
  </label>
</div>
                                                      <div class="form-check">
  <input class="form-check-input" type="radio" name="ship" id="outdhaka" value="{{$shipout->shipping_cost}}">
  <label class="form-check-label" for="outdhaka">
    Outside Dhaka <span class="shiptotals2"></span>
  </label>
</div>
                                                      
                                                        
                                                    </td>
                                                
                                                        <td  class="shippingtotal">
                                                    <span  class="dhakatotal">BDT. {{$dhakatotal}}</span>

                                                <span class="outtotal">BDT. {{ $outdhaka}}</span>
                                                </td>
												</tr>
											</tbody>
										</table>
										<!-- <div class="payment accordion radio-type">
											<div class="card">
												<div class="card-header">
													<a href="#collapse1" class="collapse">Direct bank transfer</a>
												</div>
												<div id="collapse1" class="expanded">
													<div class="card-body">
														Make your payment directly into our bank account. Please use
														your Order ID as the payment reference. Your order will not be
														shipped until the funds have cleared in our account.
													</div>
												</div>
											</div>
											<div class="card">
												<div class="card-header">
													<a href="#collapse2" class="expand">Check payments</a>
												</div>
												<div id="collapse2" class="collapsed">
													<div class="card-body">
														Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.
														Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
													</div>
												</div>
											</div>
											<div class="card">
												<div class="card-header">
													<a href="#collapse3" class="expand">Cash on delivery</a>
												</div>
												<div id="collapse3" class="collapsed">
													<div class="card-body">
														Quisque volutpat mattis eros. Lorem ipsum dolor sit amet,
														consectetuer adipiscing elit. Donec odio. Quisque volutpat
														mattis eros.
													</div>
												</div>
											</div>
											<div class="card">
												<div class="card-header">
													<a href="#collapse4" class="expand">PayPal</a>
												</div>
												<div id="collapse4" class="collapsed">
													<div class="card-body">
														Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra
														non, semper suscipit, posuere a, pede. Donec nec justo eget
														felis facilisis fermentum.
													</div>
												</div>
											</div>
											<div class="card">
												<div class="card-header">
													<a href="#collapse5" class="expand">Credit Card (Stripe)</a>
												</div>
												<div id="collapse5" class="collapsed">
													<div class="card-body">
														Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor
														sit amet, consectetuer adipiscing elit. Donec odio. Quisque
														volutpat mattis eros. Lorem ipsum dolor sit ame.
													</div>
												</div>
											</div>
										</div> -->
									</div>
									<button type="submit" class="btn btn-order chk-btn">Place Order</button>
								</div>
							</aside>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection
<script src="{{asset('public/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@section('js')
    <script>
               $(document).ready(function () {
                    $('.dhakatotal').hide();

        $('.outtotal').hide();
            $('.chk-btn').addClass('chkdisabled');
            $("#dhaka").click(function()
{
    var valnum = $(this).val();
    $('.shiptotals1').text(valnum);
   
 $('.dhakatotal').show();
 $('.shipi').hide();
 $('.outtotal').hide();
 $('.shiptotals2').hide();
 $('.shiptotals1').show();
            $('.chk-btn').removeClass('chkdisabled');

  
});

 $("#outdhaka").click(function()
{
    var valnum = $(this).val();
    $('.shiptotals2').text(valnum);
$('.outtotal').show();
 $('.shipi').hide();
 $('.dhakatotal').hide();
  $('.shiptotals1').hide();
  $('.shiptotals2').show();

            $('.chk-btn').removeClass('chkdisabled');

  
});

});
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#detailsForm').validate({
    rules: {
     size_id: {
        required: true,

      },
    },
    messages: {
      size_id: {
        required: "Please select Size",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

@endsection
