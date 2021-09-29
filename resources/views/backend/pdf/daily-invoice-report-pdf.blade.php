<!DOCTYPE html>
<html>
<head><title>Daily Invoice Report</title></head>
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

<body>
      <div class="container">
     	 <div class="row">
     	 	<div class="col-md-12">
     	 		<table width="100%">
            <tbody>
              <tr>
                <td colspan="2"><img src="public/pdf-logo/ankora.jpg" height="100px" weight="160px" alt="logo"></td>
                <td style="text-align:center" colspan="2"><h6>ankora@gmail.com</h6><h6 style="font-size:14px">+8801792985242</h6></td>
                <td style="text-align:right"  colspan="2"><h6>PLOT NUM : YD5+YE6</h6><h6>BSCIC Akora AREA</h6><h6> Dhanmondi, Dhaka</h6></td>
              </tr>
              <tr>
               <td colspan="6"><div style="height:50px"></div></td>  
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
          <table width="100%">
            <tbody>
                 <tr>
                <td>
                  <p>Local Invoice Report ({{date('d-m-Y',strtotime($start_date))}} to {{date('d-m-Y',strtotime($end_date))}})</p>    
                </td>
                <td style="text-align: right"> 
                  @php
                  $date = new DateTime('now',new DateTimezone('Asia/Dhaka'));
                  @endphp
                  <i >Date : {{$date->format('j F,Y,g:i a')}}</i></td>
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
          <table id="border" width="100%">
                    <thead>
                      <tr>
                        <th width="5%">SL.</th>
                        <th width="25%">Customer Name</th>
                        <th width="15%">invoice No</th>
                        <th width="20%">Date</th>
                        <th width="20%">Sell_by</th>
                        <th width="15%">Total Amount</th>  
                      </tr> 
                    </thead>
                    <tbody >
                      @php
                         $total_sum = '0';
                      @endphp
                      @foreach($daily_invoice_report as $key => $invoice)
                      <tr>
                        <td># {{$key+1}}</td>
                        <td>
                            {{$invoice->payment->customer->customer_name}}
                            ({{$invoice->payment->customer->mobile_no}}-{{$invoice->payment->customer->address}})
                        </td>
                         <td># {{$invoice->invoice_no}}</td>
                        <td>{{date('d-m-Y',strtotime($invoice->date))}}</td>
                        <td>{{$invoice->user->name}}</td>
                        <td>{{$invoice->payment->total_amount}}</td>
                         @php
                           $total_sum += $invoice->payment->total_amount;
                         @endphp
                      </tr> 
                      @endforeach
                      <tr>
                        <td colspan="5" style="text-align: right">Grand Total</td>
                        <td style="background-color: #3dfc03">{{$total_sum}}</td>
                      </tr>
                    </tbody>  

                </table>
       </div>
     </div>
    <br/>
    <div style="height:100px;"></div>
     <div class="container">
     	 <div class="row">
     	 	<div class="col-md-12">
     	 		<table width="100%">
     	 			<tbody>
     	 				<tr>
     	 					<td style="width:40%">
     	 						
     	 					</td>
     	 					<td style="width:20%"></td>
     	 					<td style="width:40%;text-align: center;">
     	 						<p style="text-align: center;border-bottom: 1px solid #000;">Owner Signature</p>
     	 					</td>
     	 				</tr>
     	 			</tbody>
     	 		</table>
     	 	</div>
     	 </div>
     </div>
</body>
</html>