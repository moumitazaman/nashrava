
//purchase js
$(document).ready(function(){
    $(document).on("click",".addeventmore",function(){
         var purchase_date = $('#purchase_date').val();    
         var purchase_no = $('#purchase_no').val(); 
         var supplier_id = $('#supplier_id').val();
        //var supplier_name = $('#supplier_id').find('option:selected').text(); 
         var category_id = $('#category_id').val(); 
         var category_name = $('#category_id').find('option:selected').text(); 
         var product_id = $('#product_id').val();    
         var product_name = $('#product_id').find('option:selected').text(); 

         if(purchase_date == ''){
          $.notify("Date is required",{globalPosition: 'top right',className: 'error'});
          return false;
         }
         if(purchase_no == ''){
          $.notify("Purchase_no is required",{globalPosition: 'top right',className: 'error'});
          return false;
         }
          if(supplier_id == ''){
          $.notify("Supplier_id is required",{globalPosition: 'top right',className: 'error'});
          return false;
         }
         if(category_id == ''){
          $.notify("Category_id is required",{globalPosition: 'top right',className: 'error'});
          return false;
         }
         if(product_id == ''){
          $.notify("Product_id is required",{globalPosition: 'top right',className: 'error'});
          return false;
         }

         var source = $('#document-template').html();
         var template = Handlebars.compile(source);
         var data = {
                   purchase_date:purchase_date,
                   purchase_no:purchase_no,
                   supplier_id:supplier_id,
                   category_id:category_id,
                   category_name:category_name,
                   product_id:product_id,
                   product_name:product_name

                  };
          var html = template(data);
          $("#addRow").append(html);        
    });

      $(document).on("click",".removeeventmore",function(){
         $(this).closest(".delete_add_more_item").remove();
         totalAmountPrice();
      });
      $(document).on('keyup click','.unit_price,.buying_qty',function(){
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.buying_qty").val();
            var total = unit_price*qty;
            $(this).closest("tr").find("input.buying_price").val(total);
            totalAmountPrice(); 
      });

      function totalAmountPrice(){
         var sum = 0;
         $(".buying_price").each(function(){
             var value = $(this).val();
             if(!isNaN(value) && value.length != 0){
               sum += parseFloat(value);
             }
         });
           $('#estimated_amount').val(sum);
      } 
  }); 

  //Supplier selected 

 $(function(){
    $(document).on('change','#supplier_id',function(){

       var supplier_id = $(this).val();
      // console.log( supplier_id);
       $.ajax({
          url:"{{route('get-category')}}",
          dataType:'json', 
          type:"GET",
          data:{supplier_id:supplier_id},
          success:function(data){
            
            var html = '<option value="">Select Category</option>';
             
            $.each(data,function(key,v){
                html +='<option value = "'+v.category_id+'">'+v.category.category_name+'</option>';
                
            });
                 $('#category_id').html(html);
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

//date picker

