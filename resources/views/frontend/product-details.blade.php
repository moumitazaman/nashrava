@extends('frontend.layouts.master')

<link rel="stylesheet" href="{{asset('public/frontend/css/slick.css')}}">    
        <link rel="stylesheet" href="{{asset('public/frontend/css/slick-theme.css')}}">	
        <link rel="stylesheet" href="{{ asset('public/backend/plugins/sweetalert2/sweetalert2.min.css') }}">
<style>
    .single-thumb {
    height:20% !important;
}

    </style>

@section('content')


    <!-- Start Breadcrumb -->
    <div id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="breadcrumbs">
                        <a href="{{url('/')}}">Home</a> <span class="separator">&gt;</span> <span>{{$product->title}}<</span>
                    </div>					   
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <!-- Start Banner -->
    <div id="banner-area" style="background: rgba(0, 0, 0, 0) url('img/banners/banner-1.jpg') no-repeat scroll center top;">
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="banner-inner"> 
                        <a class="btn-lucian" href="#">{{$product->title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
    <!-- Start Main Content -->
    <div id="main-content-area" class="padtop80 padbot15 my2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row"> 
                        <div class="col-md-6 col-sm-6">
                            <!-- Start Product Details Area -->
                            <div class="prodcut-details-area"> 
                                <div class="product-details-inner clearfix">
                                    <!-- Start Details Big Thumbnail -->
                                    <div class="details-thumb-big">

                                    @foreach($sub_images as $key => $image)

                                        <a href="#"><img src="{{url('public/upload/product_image/product_sub_images/'. $image->sub_image)}}" alt="" /></a>
                                        
                                        @endforeach


 

                                    </div>
                                    <!-- End Details Big Thumbnail -->
                                    <!-- Start Details Small Thumbnail -->
                                    <div class="details-thumb-small">
                                        <?php $i=0;?>
                                    @foreach($sub_images as $key => $image)
                                    <?php $i++;?>

                                        <div class="single-thumb" data-slick-index="<?php echo $i; ?>">
                                            <img src="{{url('public/upload/product_image/product_sub_images/'. $image->sub_image)}}" alt="thumb1">
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- End Details Big Thumbnail -->								
                                </div>
                            </div>
                            <!-- End Product Details Area -->
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="single-product-details-info">
                                <div class="product-info-area">
                                    <!-- Start Prodcut Top Info -->
                                    <div class="product-top-info">
                                        <h2 class="product-name">{{$product->title}}
</h2>
                                        <!-- Start Star Rating -->
                                       <!-- <div class="star-rating"> 
                                            <ul>
                                                <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                <li class="star"><i aria-hidden="true" class="fa fa-star"></i></li>
                                            </ul>
                                        </div>-->
                                        <!-- End Star Rating -->
                                        <!-- Start Product Description -->
                                        <div class="product-description"> 
                                        
                                      
                                         <p class="stock">Availability : <span>In Stock</span> <label>(<span style="color:blue">{{$product->qty}}</span> Available)</label>
                                          
                                         </p>
                                        </div>
                                        <!-- End Product Description -->
                                    </div>
                                    <!-- End Prodcut Top Info -->
                                    <!-- Start Bottom Top Info -->
                                    
                                    <div class="product-bottom-info"> 
                                    @php
                                     $price = $product->price - $product->discount;
                                   @endphp
                                <span class="price">
                                    <span class="amount">BDT. {{ $price }}</span>@if($product->discount) <span><del>{{$product->price}}</del></span>@else <span><del>0.00</del></span>@endif
                                </span>
                                        <div class="size-quantity-area clearfix">
                                            <!-- Start Size Area -->
                                            <!-- Start Size Area -->
                                            <div class="size-area">
                                                <h4>Size:</h4>
                                                <form  id="cart">
                                         @csrf
                                          <input type="hidden" name="pid" id="pid" value="{{$product->id}}">
                                          @foreach($productcount as $ps)
                                        <input type="hidden" name="sid" id="sid{{$ps->size_id}}" value="{{$ps->sizecount}}">
      
                                                            @endforeach
                                                <div class="search-cat">
                                               
                                                <select name="size_id" id="size_id" class="form-control form-control-sm" required>
                                                        <option value="">Select Size</option>
                                                        @foreach($product_sizes as $size)
                                                            <option value="{{$size->size_id}}">{{$size->size->size_name ?? ''}}</option>
                                                            @endforeach
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                           
                                            
                                            <!-- End Size Area -->
                                            <!-- Start Quantity Area -->
                                            <div class="quantity-area">   
                                                <h4>Quantity:</h4>
                                                <div class="cart-plus-minus">
                                               <input type="text" value="1" id="quantity" name="quantity" class="cart-plus-minus-box">
                                                <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div> 
                                            <!-- End Quantity Area -->
                                        </div>
                                      

                                        
                                        <div class="product-cart-wishlist"> 
                                        <?php if($product->qty==0){?>
                                            <span class="add-to-cart">
                                            <a href="javascript:void(0)" class="cart" ><i aria-hidden="true" class="fa fa-frown-o"></i><span>Out of Stock</span></a>
                                            </span>
                                                    <?php }else{?>
                                            <span class="add-to-cart">
                                            <a href="#" class="cart" onclick="myFunc()"><i aria-hidden="true" class="fa fa-plus"></i><span>Add to Cart</span></a>
                                            </span>
</form>
                                                    <?php }?>                        
                                                      <!-- Start Wish List  -->
                                            <span class="listview-wishlist"> 
                                             <a href="javascript:void(0)" data-id="{{$product->id}}" class="comp"><i aria-hidden="true" class="fa fa-exchange"></i> Compare</a>
                                            </span>
                                            <!-- End Wish List  -->
                                        </div>								
                                    </div>
                                    <!-- End Prodcut Bottom Info -->
                                </div>
                                <!-- End product info -->
                            </div>
                            <!-- End Single Product Details Info -->
                        </div>				   
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Start Product Description Tab -->
                            <div class="product-description-tab">
                                <!-- Start Description Menu -->
                                <div class="description-tab-menu">
                                    <ul role="tablist" class="clearfix">
                                        <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="description" href="#description" aria-expanded="true">Description</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" aria-controls="specification" href="#specification" aria-expanded="false">Measurement</a></li>
                                       <!-- <li role="presentation" class=""><a data-toggle="tab" role="tab" aria-controls="review" href="#review" aria-expanded="false">Reviews</a></li>-->
                                  </ul>
                                </div>
                                <!-- End Description Menu -->
                                <!-- Start Tab Content -->
                                <div class="tab-content">
                                    <!-- Start Tab Panel -->
                                    <div id="description" class="tab-pane active" role="tabpanel">
                                        <p>
                                        {{$product->details}}

</p>
                                    </div>
                                    <!-- End Tab Panel -->
                                    <!-- Start Tab Panel -->
                                   <div id="specification" class="tab-pane" role="tabpanel">
<div class="table-responsive">
                                   <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Position</th>
      <th scope="col">X-Small</th>
      <th scope="col">Small</th>

      <th scope="col">Medium</th>
      <th scope="col">Large</th>
      <th scope="col">X-Large</th>
      <th scope="col">XX-Large</th>


    </tr>
  </thead>
  <tbody>
  <?php 
$measures=App\Model\ProductMeasurement::where('product_id',$product->id)->get();

foreach($measures as $measure){
    $sz=App\Model\SizeMeasurement::where('id',$measure->size_id)->first();

  ?>
    <tr>
      <th scope="row">{{$sz->measurement}}</th>
      <td>{{$measure->x_small}}</td>
      <td>{{$measure->small}}</td>
      <td>{{$measure->medium}}</td>
      <td>{{$measure->large}}</td>
      <td>{{$measure->x_large}}</td>
      <td>{{$measure->xx_large}}</td>



    </tr>
<?php }?>
  </tbody>
</table>
</div>
                                    </div>
                                   
                                    <!-- <div id="review" class="tab-pane" role="tabpanel">
                                        <p>Similique animi consequatur pariatur voluptas tempore, dolores obcaecati dolorum quia odit harum. Quos nemo, minima totam quidem ipsum labore.</p>
                                        <ul>
                                            <li>Minus placeat eligendi neque doloribus sed ratione repellendus a illo similique, sint quisquam perferendis eum nam nihil dolor fugit blanditiis, explicabo, recusandae hic qui exercitationem aspernatur excepturi voluptate unde. </li>
                                            <li>Quaerat magnam, perferendis, sapiente doloremque error omnis esse in saepe quos eveniet quasi ex fugit eligendi consectetur nobis amet. </li>
                                        </ul>
                                    </div>-->
                                    <!-- End Tab Panel -->
                                </div>
                                <!-- End Tab Content -->
                            </div>
                            <!-- Start Product Description Tab -->
                        </div>
                    </div>				   
                </div>
                
                <div class="col-md-4">
                    <!-- Start Sidebar -->
                    <aside>
                        <!-- Start Single Sidebar -->
                      <!--  <div class="single-sidebar"> 
                           <div class="single-category-item">  
                                <div class="category-thumb">
                                    <img alt="" src="img/products/products-details/2.jpg">
                                    <a class="btn-lucian" href="#">Men</a>
                                </div>
                           </div>
                        </div>	-->
                        <!-- End Single Sidebar -->
                        <!-- Start Single Sidebar -->
                        <div class="single-sidebar"> 
                            <div class="related-prodcuts-area"> 
                                <h2 class="related-product-title">related</h2>
                                <!-- Start Related Prodcuts -->
                                <div class="related-produts"> 
                                    <div class="related-product-carousel-active">
                                        <div class="related-produt-group"> 
                                            <!-- Start single product -->
                                            @foreach($all_products as $singleproduct)
                                            <div class="single-related-product">
                                                <div class="related-pro-thumb"> 
                                                    <img src="{{asset($singleproduct->image)}}" alt="product picture" />
                                                    @if($product->qty==0)
                                            <div class="carousel-caption">
              <h5 style="color:#ffffff;">Out of Stock</h5>
            </div>
            @endif
                                                </div>
                                                <div class="relate-product-info"> 
                                                    <div class="product-short-info">
                                                        <!-- Start product short description -->
                                                        <p class="p-short-des"><a href="{{route('product.details',$singleproduct->slug)}}">{{$singleproduct->title}}</a></p>
                                                        <!-- End product short description -->
                                                        <!-- Start Star Rating -->
                                                       <!-- <div class="star-rating"> 
                                                            <ul>
                                                                <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                                <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                                <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                                <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                                <li class="star"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>-->
                                                        <!-- End Star Rating -->
                                                    </div>
                                                    <div class="product-price-area"> 
                                                    @php
                                     $price = $singleproduct->price - $singleproduct->discount;
                                   @endphp
                                <span class="price">
                                    <span class="amount">BDT. {{ $price }}</span>@if($singleproduct->discount) <span><del>{{$singleproduct->price}}</del></span>@else <span><del>0.00</del></span> @endif
                                </span>
                          <span class="add-to-cart"><a href="javascript:void(0)" data-id="{{$singleproduct->id}}" class="comp"><i aria-hidden="true" class="fa fa-exchange"></i> Compare</a>
</span>
                                                    </div>									  
                                                </div>
                                            </div>
                                            <!-- End single product -->
@endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- End Related Prodcuts -->
                            </div>
                        </div>	
                        <!-- End Single Sidebar -->
                    </aside>
                    <!-- End Sidebar -->					
                </div>
            </div>
        </div>	  
        <!-- Start New Products -->
     
        <!-- End New Products -->		
    </div>
    <!-- End Main Content -->
    <!-- Start Brand Logos Area -->
    <div id="brand-logos-area" class="padtop45 padbot45">
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <!-- Brand Logo -->
                    <div class="brand-logos"> 
                        <div id="brand-loago-carousel">
                           <!-- <div class="single-brand"> 
                                <a href="#"><img src="img/brandlogo/brand-logo-1.jpg" alt="Brand Logo" /></a>
                            </div>	
                            <div class="single-brand"> 
                                <a href="#"><img src="img/brandlogo/brand-logo-2.jpg" alt="Brand Logo" /></a>
                            </div>
                            <div class="single-brand"> 
                                <a href="#"><img src="img/brandlogo/brand-logo-3.jpg" alt="Brand Logo" /></a>
                            </div>
                            <div class="single-brand"> 
                                <a href="#"><img src="img/brandlogo/brand-logo-4.jpg" alt="Brand Logo" /></a>
                            </div>
                            <div class="single-brand"> 
                                <a href="#"><img src="img/brandlogo/brand-logo-5.jpg" alt="Brand Logo" /></a>
                            </div>
                            <div class="single-brand"> 
                                <a href="#"><img src="img/brandlogo/brand-logo-6.jpg" alt="Brand Logo" /></a>
                            </div>	
                            <div class="single-brand"> 
                                <a href="#"><img src="img/brandlogo/brand-logo-2.jpg" alt="Brand Logo" /></a>
                            </div>
                            <div class="single-brand"> 
                                <a href="#"><img src="img/brandlogo/brand-logo-4.jpg" alt="Brand Logo" /></a>
                            </div>		
                            <div class="single-brand"> 
                                <a href="#"><img src="img/brandlogo/brand-logo-3.jpg" alt="Brand Logo" /></a>
                            </div>	-->						
                        </div>
                    </div>
                    <!-- End Brand Logo -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand Logos Area -->
    <!-- Start Newsletter Area -->
    <div id="news-letter-area" class="padtop25 padbot25">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-4">
                    <!-- Start Newletter Title -->
                    <div class="news-letter-title"> 
                        <h3>Sign up for newsletter</h3>
                        <p>Duis autem vel eum iriureDuis autem vel eum</p>
                    </div>
                    <!-- End Newletter Title -->
                </div>
                <div class="col-sm-6 col-md-5 col-lg-6">
                <!-- Start Newsletter Form -->
                <div class="newsletter-form">
                    <form action="#" class="news-form">
                        <input type="text" class="f-form"/>
                        <input type="submit" value="subcribe" class="f-submit" />
                    </form>
                </div>
                <!-- End Newsletter Form -->
                </div>
                <div class="hidden-xs hidden-sm col-md-2  col-lg-2">
                    <!-- Start Footer Social Icons -->
                    <div class="social-icons footer-sicons"> 
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss-square"></i></a></li>
                        </ul>
                    </div>	
                    <!-- End Footer Social Icons -->						
                </div>
            </div>
        </div>
    </div>
    		<script src="{{asset('public/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>

	<script src="{{ asset('public/backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
	function myFunc() {
	    
var pid = $('#pid').val();
 var size = $('#size_id').val();
 var quantity=$('#quantity').val();
 var sid = $('#sid'+size).val();
 
 if(quantity<=sid){

var j=0;
$.ajax({
	 headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
   type:"POST",
   url: "{{route('insert.cart')}}",
   data:{id:pid,size:size,quantity:quantity},

   success:function(data){
	Swal.fire({
        text: 'Product Added',
		type: 'success',
		timer: 4000,
		showCancelButton: false,
  showConfirmButton: false
        
      })
	  
      $(".header-cart").load("  .header-cart >*");

	  
   },
   error: function (xhr) {
                        var errorMessage = '<div class="card bg-danger">\n' +
                            '                        <div class="card-body text-center p-5">\n' +
                            '                            <span class="text-white">';
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            errorMessage +=(''+value+'<br>');
                        });
                        errorMessage +='</span>\n' +
                            '                        </div>\n' +
                            '                    </div>';
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            footer: errorMessage,
                        });
                    },

   
 });

}
else if(size==0){
    Swal.fire({
        text: 'Please Select Your Size',
		type: 'error',
		timer: 4000,
		showCancelButton: true,
  showConfirmButton: false
        
      })
}
else{
    Swal.fire({
        text: 'Sorry Less Product in Stock Right Now',
		type: 'error',
		timer: 4000,
		showCancelButton: true,
  showConfirmButton: false
        
      })
    
}
event.preventDefault();
}
</script>
        <script>
	function Single() {
var pid = $('.pid').val();
 var size = $('#size_id').val();
 var quantity=$('#quantity').val();

var j=0;
$.ajax({
	 headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
   type:"POST",
   url: "{{route('insert.cart')}}",
   data:{id:pid,size_id:size,quantity:quantity},

   success:function(data){
	Swal.fire({
        text: 'Product Added',
		type: 'success',
		timer: 4000,
		showCancelButton: false,
  showConfirmButton: false
        
      })
	  

	  
   },
   error: function (xhr) {
                        var errorMessage = '<div class="card bg-danger">\n' +
                            '                        <div class="card-body text-center p-5">\n' +
                            '                            <span class="text-white">';
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            errorMessage +=(''+value+'<br>');
                        });
                        errorMessage +='</span>\n' +
                            '                        </div>\n' +
                            '                    </div>';
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            footer: errorMessage
                        });
                    },

   
 });
event.preventDefault();


}
</script>
    <!-- End Newsletter Area -->
    @endsection