<!DOCTYPE html>
<html>
<head><title>Invoice PDF</title>
<style>
 #border {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#border td, #border th {
  border: 1px solid #ddd;
  padding: 4px;
}

#border tr:nth-child(even){background-color: #f2f2f2;}
</style>
</head>	
<body>
      <div class="container">
     	 <div class="row">
     	 	<div class="col-md-12">
     	 		<table width="100%">
     	 			<tbody>
              <tr>
                <td colspan="2"><img src="public/pdf-logo/ankora.jpg" height="100px" weight="160px" alt="logo"></td>
                <td style="text-align:center" colspan="2"><h6>nashrava@gmail.com</h6><h6 style="font-size:14px">+8801792985242</h6></td>
                <td style="text-align:right"  colspan="2"><h6>PLOT NUM : YD5+YE6</h6><h6>Uttra AREA</h6><h6> Uttra, Dhaka</h6></td>
              </tr>
     	 			  <tr>
               <td colspan="6"><div style="height:50px"></div></td>  
              </tr>
     	 			</tbody>
     	 		</table>
          <div style="height:50px;"></div>
          <table width="100%">
            <tr>
              <td >
            <table width="50%">
              <tbody>
               <tr>
                      <td><strong>Customer Information </strong></td>
               </tr>
            </tbody>
            <tbody>
                @php
                $payment = App\Model\Invoice_Payment::where('invoice_id',$invoice->id)->first();
                $payment_type = App\Model\Invoice_Payment_Detail::select('payment_type')->where('invoice_id',$invoice->id)->first();
                
                @endphp
                <tr>
                  <td>
                    <h6>{{$payment->customer->customer_name}}</h6>
                    <h6>{{$payment->customer->mobile_no}}</h6>
                    <h6>{{$payment->customer->address}}</h6>
                  </td>
                  <td>
                    
                  </td>
                </tr>
            </tbody>
          </table>
        </td>
        <td></td>
        <td style="text-align: right">
            
           <table width="50%">
              <tbody>
               <tr>
                      <td><strong>INVOICE</strong></td>
               </tr>
            </tbody>
            <tbody>
                <tr>
                  <td>
                    <h6><strong>Invoice No:</strong># {{$invoice->invoice_no}}</h6>
                    <h6><strong>Challan No:</strong>#{{$invoice->chalan_no}}</h6>
                    <h6><strong>Date:</strong>{{date('d-m-Y',strtotime($invoice->date))}}</h6>
                    <h6><strong>Transaction:</strong>{{$payment_type->payment_type}}</h6>
                  </td>
                  <td>
                    
                  </td>
                </tr>
            </tbody>
          </table>
        </td>
        </tr>  
        </table>   
     	 	</div>
     	 </div>
     </div>
       <hr/>
       <br/>
      
   
      <br/>
     <div class="container">
     	 <div class="row">
     	 	<div class="col-md-12">
 	 		    <table id="border"  width="100%" style="text-align: center;">
              <thead>
                <tr>
                  <th width="10%">SL.</th>
                  <th width="30%">Product Name</th>
                  <th width="20%">Quantity</th>
                  <th width="20%">Unit Price</th>
                  <th width="20%">Total Price</th>
                </tr> 
              </thead>
              <tbody>
                @php
                  $total_sum = '0';
                @endphp
                @foreach($invoice['invoiceDetails'] as $key => $details)
                <tr>
                  <td># {{$key + 1}}</td>
                  <td>{{$details->product->product_name}}</td>
                  <td>{{$details->selling_qty}}</td>
                  <td>{{$details->unit_price}}</td>
                  <td>{{$details->selling_price}}</td>
                </tr>
                @php
                  $total_sum += $details->selling_price;
                @endphp
                @endforeach
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Sub Total</strong></td>
                    <td style="background-color: #D8FDBA" ><strong>{{$total_sum}}</strong></td>
                </tr > 
                <tr >
                    <td colspan="4" style="text-align: right;"><strong>Discount</strong></td>
                    <td style="background-color: #D8FDBA" ><strong>{{$payment->discount_amount}}</strong></td>
                </tr>
                 <tr >
                              <td colspan="4" style="text-align: right;"><strong>Vat</strong></td>
                              <td style="background-color: #D8FDBA" ><strong>{{$payment->vat}}</strong></td>
                          </tr>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Paid Amount</strong></td>
                    <td style="background-color: #D8FDBA" ><strong>{{$payment->paid_amount}}</strong></td>
                </tr> 
                <tr >
                    <td colspan="4" style="text-align: right;"><strong>Due Amount</strong></td>
                    <td style="background-color: #D8FDBA" ><strong>{{$payment->due_amount}}</strong></td>
                </tr> 
               
                    <tr>
                        <td colspan="4" style="text-align: right;"><strong>Grand Total</strong></td>
                        <td style="background-color: #D8FDBA" ><strong>
                          @if($invoice->test_price == '1')
                            0
                          @else   
                            {{ $payment->total_amount}}
                          @endif</strong></td>
                    </tr> 
              </tbody>  
          </table>
                <h6>
                @php
                  $date = new DateTime('now',new DateTimezone('Asia/Dhaka'));
                @endphp
                <i >Printing time : {{$date->format('j F,Y,g:i a')}}</i></h6>
     	 	</div>
     	 </div>
     	 <div class="row">
        <br/>
        
        <!--  <div style="height:70px"></div> -->
     	 	<div class="col-md-12">
     	 		<hr style="margin-bottom: 0px">
     	 		<table width="100%">
     	 			<tbody>
     	 				<tr>
     	 					<td style="width:40%">
     	 						<p style="text-align: center;margin-left: 20px">Customer Signature</p>
     	 					</td>
     	 					<td style="width:20%"></td>
     	 					<td style="width:40%;text-align:right;">
     	 						<p style="text-align: center;">Seller Signature</p>
     	 					</td>
     	 				</tr>
     	 			</tbody>
     	 		</table>
     	 	</div>
     	 </div>
     </div>
</body>
</html>