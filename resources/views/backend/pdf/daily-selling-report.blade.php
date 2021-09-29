<!DOCTYPE html>
<html>
<head><title>Selling Report</title>
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
      <div class="container">
     	 <div class="row">
     	 	<div class="col-md-12">
     	 		<table width="100%">
     	 			<tbody>
     	 				 <tr>
                <td style="text-align: center;" colspan="2"><h3>Company Name: Nashrava</h3></td>
              </tr>
              <tr>
                <td style="text-align: center;" colspan="2"><p>Address: House# 03(4th floor), Road# 19, Sector# 13, Uttara, Dhaka-1230.<br/>Phone Number: 01309286974<br/>E-mail: support@nashrava.co</p></td>
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
                  <p>Selling Report ({{date('d-m-Y',strtotime($start_date))}} to {{date('d-m-Y',strtotime($end_date))}})</p>    
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
          <table id="border"  width="100%" >
                    <thead>
                      <tr >
                        <th width="10%">SL.</th>
                        <th width="20%">Order ID</th>
                        <th width="20%">Selling Date</th>
                        <th width="20%">Selling Quantity</th>
                        <th width="30%">Total Price</th>
                      </tr> 
                    </thead>
                    <tbody>
                      @php
                         $total_sum = '0';
                      @endphp
                      @foreach($daily_invoice_report as $key => $sell)  
                      <tr>
                        @php
                             $order_details  =  App\Model\OrderDetail::where('order_id' , $sell->id)->sum('quantity');
                        @endphp
                        <td># {{$key+1}}</td>
                        <td>{{$sell->order_no}}</td>
                        <td>{{date('d-m-Y',strtotime($sell->selling_date))}}</td>
                         <td style="text-align: center;background-color:orange">{{$order_details}}
                        </td>
                        <td style="text-align: center;background-color:orange">{{$sell->order_total_amount}}</td>
                        @php
                           $total_sum += $sell->order_total_amount;
                        @endphp
                      </tr> 
                      @endforeach
                       <tr>
                        <td colspan="4" style="text-align: right"><strong>Grand Total</strong></td>
                        <td style="background-color: #1c95eb;color: black;font-weight: bold">{{$total_sum}}</td>
                      </tr>
                    </tbody>  
          </table>
       </div>
     </div>
    <br/>
     <div style="height:50px;"></div>
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
     	 						<p style="text-align: center;border-top: 1px solid #000;">Owner Signature</p>
     	 					</td>
     	 				</tr>
     	 			</tbody>
     	 		</table>
     	 	</div>
     	 </div>
     </div>
</body>
</html>