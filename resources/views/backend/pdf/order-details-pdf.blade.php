<!DOCTYPE html>
<html>
<head><title>Order Report</title>
<style>
 #border {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#border td, #border th {
  border: 1px solid #ddd;
  padding: 8px;
}

#border tr:nth-child(even){background-color: #f2f2f2;}
</style>

</head>
<body>
      <div class="col-md-9">
                   <div class="card">
                        <div class="card-header">{{ __('Customer Dasboard') }}</div>
                        <div class="card-body" style="min-height:215px">
                        <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td style="width: 50%; vertical-align: top;" class="text-left">Order Details</td>
                        <td style="width: 50%; vertical-align: top;" class="text-left">Shipping / Customer Address</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-left">
                            <b>Order ID:</b> {{$order->order_no}}<br>
                            <b>Order date:</b>{{$order->created_at->format('d/m/Y')}}<br>
                            <b>Order Status:</b>
                            @if($order->status == '0')
                            <span>Pending</span>
                            @elseif($order->status == '1')
                            <span>Confirmed</span>
                            @endif<br>
                            <b>Payment Method:</b> {{$order->payment_method}}
                        </td>
                        <td class="text-left">
                          @php
                            $shipping = App\Model\Shipping::latest()->where('user_id' , $order->user_id)->first();
                          @endphp
                            <span>Name :</span>  {{ $shipping->first_name}} {{ $shipping->last_name}}
                            <br><span>Mobile No :</span> {{ $shipping->mobile_no}}
                            <br><span>Address :</span> {{ $shipping->address}}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%">
                        <thead>
                            <tr class="text-center" style="background: #d1d1d1">
                                <th class="t-pro" width="20%">Product</th>
                                <th class="t-price">Variation</th>
                                <th class="t-price">Price</th>
                                <th class="t-qty">Quantity</th>
                                <th class="t-total">Total</th>
                            </tr>
                        </thead>
                        @php
                        $ordernum = App\Model\Order::where('user_id' , $order->user_id)->count();

                           $orderDetails = App\Model\OrderDetail::where('order_id' , $order->id)->get();
                           $subTotal = 0;
                            $mytotal = 0;
                        @endphp
                        <tbody>

                          @foreach($orderDetails as $key => $order)
                              <tr>
                                <td class="t-pro d-flex">
                                    <div class="t-img">
                                        <a href="#"><img src="{{ url($order->product->image) }}" alt="" width="100px" height="100px"></a>
                                    </div>&nbsp;&nbsp;
                                    <div class="t-content">
                                        <p class="t-heading"><a href="#">{{$order->product->purchase->product_name}}</a></p>

                                    </div>
                                </td>
                                <td>
                                    <span>Size: {{$order->size->size_name ?? 'No Size'}}</span><br/>
                                </td>


                                <td>
                                    @if($order->coupon_id) <del> BDT. {{$order->product->price}} </del> <br>
                                        BDT. {{ discount_price($order->customer_id,$order->product_id,$order->coupon_id) }}
                                    @else
                                        BDT. {{$order->product->price}}
                                    @endif

                                </td>
                                <td class="t-total">{{$order->quantity}}</td>
                                <td>
                                    @if($order->coupon_id) <del> BDT. {{$order->product->price * $order->quantity}} </del> <br>
                                    BDT. {{ discount_price($order->customer_id,$order->product_id,$order->coupon_id) * $order->quantity}}
                                    @else
                                        BDT. {{$order->product->price * $order->quantity}}
                                    @endif
                                </td>

                            </tr>
                            @php
                            if ($order->coupon_id){
                                    $subTotal = (discount_price($order->customer_id,$order->product_id,$order->coupon_id) * $order->quantity);
                                }
                                 elseif($ordernum==1){
                              $mytotal += (($order->product->price- $order->product->discount ?? 0 )* $order->quantity);
                                                                   $firstPurchasediscount=$mytotal*0.1;
                                                                   $subTotal=$mytotal;
                            $subTotals=$mytotal-$firstPurchasediscount;

                                }
                                else{
                                    $subTotal = ($order->product->price * $order->quantity);
                                }
                            @endphp
                          @endforeach
                        </tbody>



                        <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Sub-Total</b>
                            </td>
                            <td class="text-right">{{ $subTotal}}</td>
                        </tr>
                         <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Shipping Charge:</b>
                            </td>
                            <td class="text-right">{{ $shipping->shipping_cost}}</td>
                        </tr>

                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Total @php if($ordernum==1){ echo "(10 % Discount on Your First Purchase)";} @endphp</b>
                            </td>
                            <td class="text-right">@php if($ordernum==1){ echo $subTotals+ + $shipping->shipping_cost;}else{ echo $subTotal+ + $shipping->shipping_cost;} @endphp</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                        </div>
                    </div>
               </div>
</body>
</html>
