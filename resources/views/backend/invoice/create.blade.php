 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{__('back_blade.manage_invoice')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('back_blade.invoice')}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>{{__('back_blade.view_invoice_add')}}
                  <a class="btn btn-success btn-sm float-right" href="{{route('invoice.index')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;{{__('back_blade.view_invoice_list')}}</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form id="invoice_form" method="POST">
                  @csrf
                  <div class="row">
                      <div class="form-group col-md-3">
                          <label for="invoice_no">Invoice No</label>
                          <input type="text" name="invoice_no" value="{{$invoice_no}}"  class="form-control form-control-sm" id='invoice_no' readonly style="background-color: #D8FDBA">
                      </div>
                       <div class="form-group col-md-3">
                          <label for="date">Date</label>
                          <input type="text" name="date" value="{{$selling_date}}"  class="form-control form-control-sm datepicker"  id="date" placeholder="MM-DD-YYYY"  readonly>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="category_name">Category Name</label>
                          <select name="category_id" class="form-control select2 form-control-sm" id="category_id"> 
                              <option value="">Select category Name</option>
                              @foreach($categories as $k => $category)
                              <option value="{{$category->id}}">{{$category->category_name}}</option>
                              @endforeach
                          </select>
                          <font style="color:#e60000">
                              {{($errors->has('category_id'))?($errors->first('category_id')):' '}}
                          </font>
                      </div>
                     
                      <div class="form-group col-md-3">
                          <label for="product_name">Product Name</label>
                           <select name="product_id" class="form-control select2 form-control-sm" id="product_id" required>
                              <option value="">Select Product</option>
                          </select>
                      </div>
                       <div class="form-group col-md-3">
                          <label for="qty">QTY</label>
                          <input type="number" name="quantity"  class="form-control form-control-sm" id="quantity" required>
                      </div>
                       <div class="form-group col-md-3">
                        <label for="chalan_no">Challan No.</label>
                        <input type="text" name="chalan_no" id="chalan_no" class="form-control form-control-sm" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="selling_price">Selling Price</label>
                        <input type="text" name="price" id="selling_price" class="form-control form-control-sm" readonly >
                      </div>
                      
                     
                      <div class="form-group col-md-2" style="padding-top: 30px;">
                          <button  class="btn btn-success btn-sm  addeventmore"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add To Cart</button>
                      </div>
                  </div>
                </form>  
              </div><!-- /.card-body -->
              <!--second card body-->
              <div class="card-body">
              <form action="{{route('invoice.store')}}" method="post">
                @csrf
                <table class="table-sm table-bordered" width="100%">
                  <thead>
                    <tr>
                      <th width="20%">Category Name</th>
                      <th width="20%">Product Name</th>
                      <th width="10%">Unit</th>
                      <th width="20%">Unit Price</th>
                      <th width="20%">Total Price</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody id="addRow" class="addRow">
                  </tbody>
                  <tbody>
                    <tr>
                      <td colspan="4">Discount</td>
                      <td><input type="text" name="discount_amount"  id="discount_amount" class="form-control form-control-sm  discount_amount text-right" placeholder="Enter discount amount"></td> 
                      <td></td>
                    </tr>
                      <tr>
                      <td colspan="4">Vat</td>
                      <td><input type="double" name="vat"  id="vat" class="form-control form-control-sm  vat text-right" placeholder="Enter Vat Amount"></td> 
                      <td></td>
                    </tr>
                     <tr>
                      <td colspan="4">Shipping Cost</td>
                      <td><input type="double" name="shipping_cost"  id="shipping_cost" class="form-control form-control-sm  vat text-right" placeholder="Enter Shipping Cost Amount"></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan="4">Grand Total</td>
                      <td><input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA"></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
                 <br/>
                <div class="form-row">
                   <div class="form-group col-md-4">
                       <label for="paid-status">Paid status</label>
                       <select name="paid_status" id="paid-status" class="form-control form-control-sm">
                         <option value="">Select Status</option>
                         <option value="full_paid">Full Paid</option>
                         <option value="full_due">Full Due</option>
                         <option value="partial_paid">Partial Paid</option>
                       </select>
                       <input type="number" name="paid_amount" class="form-control form-control-sm paid_amount" style="display:none" placeholder="Enter Paid Amount">
                   </div>
                   <div>
                   </div>
                   <div class="form-group col-md-4">
                       <label for="paid-status">Payment</label>
                       <select name="payment_type" id="payment_type" class="form-control form-control-sm" required>
                         <option value="">Select Payment Type</option>
                         <option value="bkash">Bkash</option>
                         <option value="cash">Cash</option>
                       </select>
                   </div>
                    
                   <div class="form-group col-md-4">
                      <label for="customer_name">Customer Name</label>
                      <select name="customer_id" id="customer_id" class="form-control form-control-sm select2">
                        <option value="">Select Customer</option>
                          @foreach($customers as $cus)
                        <option value="{{$cus->id}}">{{$cus->customer_name}}({{$cus->mobile_no}}-{{$cus->address}})</option>
                          @endforeach
                        <option value="0">New Customer</option>
                      </select>
                   </div>
                </div>
                <div class="form-row new_customer" style="display:none">
                  <div class="form-group col-md-4">
                      <input type="text" name="customer_name" id="name" class="form-control form-control-sm" placeholder="Enter Customer name">
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="mobile_no" id="mobile_no " class="form-control form-control-sm" placeholder="Enter Mobile No">
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="address" id="address " class="form-control form-control-sm" placeholder="Enter Address">
                  </div>
                </div>
                 <div class="form-group col-md-12">
                    <input type="hidden" name="invoice_no" value="{{$invoice_no}}">
                </div>
                 <div class="form-group col-md-12">
                    <input type="hidden" name="date" value="{{$selling_date}}">
                </div>
            
                <div class="form-group">
                  <button type="submit" class="btn btn-primary"  id="storeButton">Invoice Store</button>
                </div>
               </form> 

              <!-- /.card-body -->
              </div>
            </div>
          </section>
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



 <script type="text/javascript">    

 $(function(){
      
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


        $('.addeventmore').click(function (e) {
        e.preventDefault();
        let data = $('#invoice_form').serialize();
        console.log(data);
        $.ajax({
          data: data,
          url: "{{ route('inserts.cart') }}",
          method: "POST",
          success: function (data) {
           console.log(data);
            $("#addRow").empty(); 
            var total = 0;
            $.each(data,function(key,v){  
            $("#addRow").append(
            $('<tr>',{class:"delete_add_more_item",id:"delete_add_more_item"}).append(
              $('<td>').append('<input type="hidden" name="category_id[]" value="'+v.options.category_id+'">',v.options.category_name),
              $('<td>').append('<input type="hidden" name="product_id[]" value="'+v.id+'">',v.name),
              $('<td>').append('<input type="number" min="1" class="form-control form-control-sm text-right selling_qty" readonly name="selling_qty[]" value="'+v.qty+'">'),
              $('<td>').append('<input type="number"  class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="'+v.price+'">'),
              $('<td>').append('<input type="number" class="form-control form-control-sm text-right selling_price" name="selling_price[]" value="'+v.subtotal+'" readonly>','<input type="hidden" class="form-control form-control-sm text-right " name="chalan_no" value="'+v.options.chalan_no+'">'),
              $('<td>').append('<i class="btn btn-danger btn-sm fa fa-window-close removeeventmore" data-id="'+v.rowId+'"></i>')
              )
          )
            $(function(){

              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
                });


             $('.removeeventmore').click(function(){
                var id = $(this).data('id'); 
                console.log(id);
                $.ajax({
                url : "{{url('delete-cart')}}"+'/'+id, 
                method : 'GET', 
                success: function (data) {
                console.log('data');  
                console.log('success');        
             }               
             });
               
               });
           });

            $(document).on("click",".removeeventmore",function(){
                 $(this).closest(".delete_add_more_item").remove();
                 totalAmountPrice(); 
            });

            total += v.subtotal; 

          });
 
            $('#estimated_amount').val(total);

            $(document).on("keyup","#discount_amount",function(){
            totalAmountPrice();
            });
            
            $(document).on("keyup","#vat",function(){
            totalAmountPrice();
            });  
            
            
             
            $(document).on("keyup","#shipping_cost",function(){
            totalAmountPrice();
            });


            function totalAmountPrice(){
             var  total = 0;
             $(".selling_price").each(function(){
                 var value = $(this).val();
                 if(!isNaN(value) && value.length != 0){
                    total += parseFloat(value);
    
                 }
             });

                var dicount_amount = parseFloat($('#discount_amount').val());
                if(!isNaN(dicount_amount) && dicount_amount.length != 0){
                  total -= parseFloat(dicount_amount);
                }

              
               
                var vat = parseFloat($('#vat').val());
                if(!isNaN(vat) && vat.length != 0){
                   total += parseFloat(vat);
                 }

                 var shipping_cost = parseFloat($('#shipping_cost').val());
                if(!isNaN(shipping_cost) && shipping_cost.length != 0){
                   total += parseFloat(shipping_cost);
                 }

                $('#estimated_amount').val(total);
              }
               
          },
          error: function (data) {
              console.log('Error:', data);
          }
      });

       });   

  });


//category selected

  $(function(){
    $(document).on('change','#category_id',function(){

       var category_id = $(this).val();
      // console.log( supplier_id);
       $.ajax({
          url:"{{route('get-product')}}",
          dataType:'json', 
          type:"GET",
          data:{category_id:category_id},
          success:function(data){
            
            var html = '<option value=" ">Select Product</option>';
             
            $.each(data,function(key,v){
                html +='<option value = "'+v.id+'">'+v.product_name+'</option>';
                
            });
                 $('#product_id').html(html);
          }

       });

    });


 });

//check-product-stock
  $(function(){
    $(document).on('change','#product_id',function(){
          var product_id = $(this).val();
          $.ajax({
               url: "{{route('check-product-stock')}}",
               type: "GET",
               data: {product_id:product_id},
               success: function(data){
                   $('quantity').val(data);             
                }
          }); 
      });
  });

//get price
$(function(){
    $(document).on('change','#product_id',function(){
          var product_id = $(this).val();
          console.log(product_id);
          $.ajax({
               url: "{{route('check-product-price')}}",
               type: "GET",
               data: {product_id:product_id},
               success: function(data){
                   $('#selling_price').val(data);               }
          }); 
      });
  });

 //display hide show
 
 $(document).on('change','#customer_id',function(){
    var customer_id = $(this).val();
    if(customer_id == '0'){
        $('.new_customer').show();
    }else{
        $('.new_customer').hide();
    }

 }); 
 
 $(function(){
    
     $(document).on('change','#paid-status',function(){
    var payment_type = $(this).val();
    console.log(payment_type);
    if(payment_type == 'partial_paid'){
        $('.paid_amount').show();
    }else{
        $('.paid_amount').hide();
    }

 }); 

 });


//date picker
       $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
          });
    </script>
 @endsection
