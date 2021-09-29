<!DOCTYPE html>
<html>
<head><title>Supplier Wise Stock Report</title></head>
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
                <td style="text-align: center;" colspan="2"><h3>OFF & LAB : PLOT NO: YD5+YE6</h3></td>
              </tr>
              <tr>
                <td style="text-align: center;" colspan="2"><p>BASIC TANNERY AREA, HEMAYETPUR, SAVAR<br/>PHONE : 01400591974<br/>E-Mail : tipuakan@gmail.com</p></td>
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
     	 		<table width="100%" style="text-align: center">
     	 			<tbody>
     	 				 <tr>
			            <td><h3>Supplier Wise Stock Report</h3></td>
			         </tr>
     	 			</tbody>
     	 		</table>
     	 	</div>
     	 </div>
     </div>
      <br/>
     <div class="container">
     	 <div class="row">
             <div><strong>Supplier Name : </strong>{{$stock_info['0']->supplier->company_name}}</div>
             <br/>
     	 	<div class="col-md-12"> 
 	 		    <table width="100%" id="border">
                    <thead>
                      <tr>
                        <th width="10%">SL.</th>
                        <th width="20%">Category</th>
                        <th width="20%">Product Name</th>
                        <th width="15%">Unit</th>
                        <th width="10%">In.Qty</th>
                        <th width="10%">Out.Qty</th>
                        <th width="15%">Stock</th>
                      </tr> 
                    </thead>
                    <tbody style="color: #4d0026">
                      @foreach($stock_info as $key => $product)
                       @php
                          $buying_total_qty = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id', $product->id)->where('status','1')->sum('buying_qty');
                                                                 
                          $selling_total_qty = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id', $product->id)->where('status','1')->sum('selling_qty');
                      @endphp
                      <tr>
                        <td># {{$key+1}}</td>
                        <td>{{$product->category->category_name}}</td>
                        <td >{{$product->product_name}}</td>
                        <td>{{$product->unit->unit_name}}</td>
                        <td style="text-align: center;background-color:orange">{{ $buying_total_qty}}</td>
                        <td style="text-align: center;background-color:orange">{{$selling_total_qty}}</td>
                        <td style="text-align: center;background-color:orange">{{$product->quantity}}</td>  
                       </tr> 
                      @endforeach
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
     	 		<table width="100%">
     	 			<tbody>
     	 				<tr>
     	 					<td style="width:40%"></td>
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