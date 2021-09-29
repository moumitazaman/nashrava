<!DOCTYPE html>
<html>
<head><title>Customer Credit Report</title>
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
                  <p>Customer Due  List ({{date('d-m-Y',strtotime($start_date))}} to {{date('d-m-Y',strtotime($end_date))}})</p>    
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
          <table id="border" style="color:#00004d">
                    <thead>
                      <tr style="background-color: #1c95eb;">
                        <th width="5%">SL.</th>
                        <th width="40%">Customer Name</th>
                        <th width="20%">Invoice No</th>
                        <th width="15%">Date</th>
                        <th width="20%">Due Amount</th>
                      </tr> 
                    </thead>
                    <tbody style="color: #4d0026">
                      @php
                         $total_sum = '0';
                      @endphp
                      @foreach($daily_customer_due_report as $key => $payment)
                      <tr>
                        <td># {{$key+1}}</td>
                        <td>
                            {{$payment->customer->customer_name}}
                            ({{$payment->customer->mobile_no}}-{{$payment->customer->address}})
                        </td>
                        <td># {{$payment->invoice->invoice_no}}</td>
                        <td>{{date('d-m-Y',strtotime($payment->date))}}</td>
                        <td style="text-align: center;background-color:orange">{{$payment->due_amount}} Tk.</td>
                         @php
                         $total_sum += $payment->due_amount;
                         @endphp
                      </tr> 
                      @endforeach
                       <tr>
                        <td colspan="4" style="text-align: right"><strong>Grand Total Due</strong></td>
                        <td style="background-color: #1c95eb;color: black;font-weight: bold">{{$total_sum}} Tk.</td>
                      </tr>
                    </tbody>  
                </table>
        </div>
      </div>
    <br/>
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