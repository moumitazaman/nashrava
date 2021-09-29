<!DOCTYPE html>
<html>
<head>
<title>Stock Report PDF</title>
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
       <hr/>
       <br/>
      <div class="container">
     	 <div class="row">
     	 	<div class="col-md-12">
     	 		<table width="100%">
     	 			<tbody>
     	 				 <tr>
			            <td><h3>Stock Report</h3></td>
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
 	 		    <table width="100%" id="border" >
                    <thead>
                      <tr>
                        <th width="5%">SL.</th>
                        <th width="14%">Category</th>
                        <th width="14%">Sub Category</th>
                        <th width="14%">Brand</th>
                        <th width="14%">Product Name</th>
                        <th width="13%">Price</th>
                        <th width="13%">Opening Stock</th>
                        <th width="13%">Current Stcok</th>
                       
                      </tr> 
                    </thead>
                    <tbody style="color: #4d0026">
                      @foreach($stock_info as $key => $product)
                      <tr>
                        <td># {{$key+1}}</td>
                        <td>{{$product->category->category_name}}</td>
                        <td>{{$product->subCategory->sub_category_name}}</td>
                        <td>{{$product->brand->brand_name}}</td>
                        <td >{{$product->purchase->product_name}}</td>
                        <td>{{$product->price}}</td>
                        <td style="text-align: center;background-color:orange">{{$product->purchase->buying_qty}}</td>
                        <td style="text-align: center;background-color:orange">{{$product->qty}}</td>
                  
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
       <div style="height:30px;"></div>
     	 <div class="row">
     	 	<div class="col-md-12">
     	 		<table width="100%">
     	 			<tbody>
     	 				<tr>
     	 					<td style="width:40%"></td>
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