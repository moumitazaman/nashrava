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
                <td style="text-align: center;" colspan="2"><h3>OFF & LAB : PLOT NO: YD5+YE6</h3></td>
              </tr>
              <tr>
                <td style="text-align: center;" colspan="2"><p>BASIC TANNERY AREA, HEMAYETPUR, SAVAR<br/>PHONE : 01400591974<br/>E-Mail : tipuakan@gmail.com</p></td>
              </tr>>
     	 				<tr>
     	 					<td><strong>Invoice NO :# {{$invoice->invoice_no}}</strong></td>
     	 					<td style="text-align: right"><strong>Date :{{date('d-m-Y',strtotime($invoice->date))}}</strong></td>
     	 				</tr>
     	 			</tbody>
     	 		</table>
     	 	</div>
     	 </div>
     </div>
       <hr/>
       <br/>
      <div class="container">
     	 <div class="row">
     	 	<div class="col-md-12">
     	 		<table width="100%">
     	 			<tbody>
     	 				 <tr>
			              	<td><strong><u>Customer Info :</u></strong></td>
			              </tr>
     	 			</tbody>
     	 		</table>
     	 	</div>
     	 </div>
    </div>
    <div class="container">
     	<div class="row">
     	 	<div class="col-md-12">
     	 		  @php
                $payment = App\Model\Payment::where('invoice_id',$invoice->id)->first();
            @endphp
              <table width="100%" >
		            <tbody style="color: #4d0026" width="100%">	
		              <tr>
		                <td width="30%"><strong>Name : </strong>{{$payment->customer->customer_name}}</td>
		                <td width="40%"><strong>Mobile No : </strong>{{$payment->customer->mobile_no}}</td>
		                <td width="30%"><strong>Address : </strong>{{$payment->customer->address}}</td>
		              </tr>
		              <tr>
		              </tr>
	    	        </tbody>  
               </table>    
     	 	</div>
     	</div>
    </div>
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
                <tr class="text-center">
                    <td colspan="4" style="text-align: right;"><strong>Discount</strong></td>
                    <td style="background-color: #D8FDBA" ><strong>{{$payment->discount_amount}}</strong></td>
                </tr>
                <tr class="text-center">
                    <td colspan="4" style="text-align: right;"><strong>Paid Amount</strong></td>
                    <td style="background-color: #D8FDBA" ><strong>{{$payment->paid_amount}}</strong></td>
                </tr> 
                <tr class="text-center">
                    <td colspan="4" style="text-align: right;"><strong>Due Amount</strong></td>
                    <td style="background-color: #D8FDBA" ><strong>{{$payment->due_amount}}</strong></td>
                </tr> 
               
                    <tr class="text-center">
                        <td colspan="4" class="text-right"><strong>Grand Total</strong></td>
                        <td style="background-color: #D8FDBA" ><strong>
                          @if($invoice->test_price == '1')
                            0
                          @else   
                            {{ $payment->total_amount}}
                          @endif</strong></td>
                    </tr> 
              </tbody>  
          </table>
                <br/>
                @php
                  $date = new DateTime('now',new DateTimezone('Asia/Dhaka'));
                @endphp
                <i >Printing time : {{$date->format('j F,Y,g:i a')}}</i>
     	 	</div>
     	 </div>
     	 <div class="row">
     	 	<div class="col-md-12">
     	 		<hr style="margin-bottom: 0px">
     	 		<table width="100%">
     	 			<tbody>
     	 				<tr>
     	 					<td style="width:40%">
     	 						<p style="text-align: center;margin-left: 20px">Customer Signature</p>
     	 					</td>
     	 					<td style="width:20%"></td>
     	 					<td style="width:40%;text-align: center;">
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