
<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- Mirrored from www.thetahmid.com/themes/xemart-v1.0/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Jan 2021 17:15:29 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Nashrava</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('public/details/images/favicon.ico" type="image/x-icon')}}">
        <link rel="icon" href="{{asset('public/details/images/favicon.ico" type="image/x-icon')}}">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('public/details/css/assets/bootstrap.min.css')}}">

        <!-- Fontawesome Icon -->
        <link rel="stylesheet" href="{{asset('public/details/css/assets/font-awesome.min.css')}}">

        <!-- Animate Css -->
        <link rel="stylesheet" href="{{asset('public/details/css/assets/animate.css')}}">

        <!-- Owl Slider -->
        <link rel="stylesheet" href="{{asset('public/details/css/assets/owl.carousel.min.css')}}">
 
        <!-- Custom Style -->
        <link rel="stylesheet" href="{{asset('public/details/css/assets/normalize.css')}}">
        <link rel="stylesheet" href="{{asset('public/details/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('public/details/css/assets/responsive.css')}}">
        <script src="{{asset('public/details/js/assets/vendor/jquery-1.12.4.min.js')}}"></script> 

    </head>
    <body>

    <div style="width: 100%;height:40px;background-color:black;padding-top: 5px;" class="row">
        <ul class="row"> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                       
            <li><a href="callto:+8801973-833508"><i  class="fa fa-phone-square"></i><span style="color: white;text-align: right;">+88 01973-833508</span></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a href="#"><i class="fa fa-envelope-square" ></i><span style="color: white">info@nashrava.co</span></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <li><a href="#"><i class="fa fa-envelope-square" ></i><span style="color: white">Nashrava</span></a></li></ul>
        </ul> 
     
    </div>
    <!-- Breadcrumb Area -->
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline" >
                                <li class="list-inline-item"><a href="{{url('/')}}">Home</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li class="list-inline-item"><a href="{{url('/')}}">Category</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li class="list-inline-item"><a href="{{url('/')}}">Brand</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li class="list-inline-item"><a href="{{url('/')}}">All Products</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li class="list-inline-item"><a href="{{url('/')}}">About</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Single Product Area -->
        <section class="sg-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="sg-img">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        @foreach($sub_images as $key => $image)
                                        <div class="tab-pane fade show {{$key == 0 ? 'active' : ''}}" id="sg{{$image->id}}" role="tabpanel">
                                            <img src="{{url('public/upload/product_image/product_sub_images/'. $image->sub_image)}}" alt="" class="img-fluid">
                                        </div>
                        
                                        @endforeach
                                    </div>
                                    <div class="nav d-flex justify-content-between">
                                         @foreach($sub_images as $key => $image)
                                        <a class="nav-item nav-link {{$key == 0 ? 'active' : ''}}" data-toggle="tab" href="#sg{{$image->id}}"><img src="{{url('public/upload/product_image/product_sub_images/'. $image->sub_image)}}" alt=""></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="sg-content">
                                    <div class="pro-tag">
                                        <ul class="list-unstyled list-inline">
                                            <li class="list-inline-item" style="color:#dc3545;"><strong>Category Item: </strong><a href="{{route('category.wise.product', $product->category_id)}}"><strong style="color:#dc3545;">{{$product->category->category_name}}</strong></a></li>
                                        </ul>
                                    </div>
                                     <div class="pro-name">
                                         <p>{{$product->title}}</p>
                                     </div>
                                    <!--  <div class="pro-rating">
                                         <ul class="list-unstyled list-inline">
                                             <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                             <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                             <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                             <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                             <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                             <li class="list-inline-item"><a href="#">( 09 Review )</a></li>
                                         </ul>
                                     </div> -->
                                     <div class="pro-price">
                                         <ul class="list-unstyled list-inline">
                                            @php
                                              $discount_price = $product->price - $product->discount;
                                            @endphp
                                             <li class="list-inline-item">{{$discount_price}}</li>
                                             <li class="list-inline-item">{{$product->price}}</li>
                                         </ul>
                                         <p>Availability : <span>In Stock</span> <label>(<span style="color:blue">{{$product->qty}}</span> Available)</label></p>
                                     </div>
                                      <form action="{{route('insert.cart')}}" method="post" id="cart">
                                        @csrf
                                         
                                           <div class="colo-siz">
                                    
                                           <label class="list-inline-item">Size:</label>
                                           <div class="product-form product-variations product-size col-md-6">
                                                <div class="product-form-group">
                                                    <div class="select-box">
                                                        <select name="size_id" id="size_id" class="form-control form-control-sm" required>
                                                            <option value="" >Select Size</option>
                                                            @foreach($product_sizes as $size)
                                                            <option value="{{$size->size_id}}">{{$size->size->size_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <font style="color:red">
                                                        {{($errors->has('size_id'))?($errors->first('size_id')):' '}}
                                                        </font>
                                                    </div>
                                                </div>
                                           </div>
                                         <div class="qty-box mt-3">
                                             <ul class="list-unstyled list-inline">
                                                 <li class="list-inline-item">Qty :</li>
                                                 <li class="list-inline-item quantity buttons_added">
                                                     <input type="button" value="-" class="minus">
                                                     <input type="number" step="1" min="1" max="10" value="1" name="quantity" class="qty text" size="4" readonly>
                                                     <input type="button" value="+" class="plus">
                                                 </li>
                                             </ul>
                                         </div>
                                          <input type="hidden" name="id" value="{{$product->id}}">
                                         <div class="pro-btns">
                                              <a href="javascript:void(0)" class="cart" onclick="cartFunction()">Add To Cart</a>
                                      
                                         </div>
                                       
                                           </div>
                                      </form>     
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="sg-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#pro-det">Product Details</a></li>
                                       <!--  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rev">Reviews (03)</a></li> -->
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="pro-det" role="tabpanel">
                                            <p>{{$product->details}}</p>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                           
                                
                           
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- End Single Product Area -->
        <section class="breadcrumb-area" style="height:300px;background-color: black;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="list-inline-item"><span>||</span> Single Product</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<script type="text/javascript">
    function cartFunction() {
        document.getElementById("cart").submit();
    }
</script>


        <!-- Bootstrap -->
        <script src="{{asset('public/details/js/assets/popper.min.js')}}"></script>
        <script src="{{asset('public/details/js/assets/bootstrap.min.js')}}"></script>

        <!-- Owl Slider -->
        <script src="{{asset('public/details/js/assets/owl.carousel.min.js')}}"></script>

        <!-- Wow Animation -->
        <script src="{{asset('public/details/js/assets/wow.min.js')}}"></script>

        <!-- Price Filter -->
        <script src="{{asset('public/details/js/assets/price-filter.js')}}"></script>

        <!-- Mean Menu -->
        <script src="{{asset('public/details/js/assets/jquery.meanmenu.min.js')}}"></script>

        <!-- Custom JS -->
        <script src="{{asset('public/details/js/plugins.js')}}"></script>
        <script src="{{asset('public/details/js/custom.js')}}"></script>
    </body>
</html>
