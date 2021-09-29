 @extends('backend.layout.master') 
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{__('back_blade.manage_product')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('back_blade.product')}}</li>
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
                <h3>{{__('back_blade.product_details_information')}}
                   <a class="btn btn-success btn-sm float-right" href="{{route('product.index')}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp; {{__('back_blade.view_product_list')}}</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover table-sm" >
                  
                  <tbody style="color:#660033">
                      <tr>
                        <td width="50%">Category</td>
                        <td width="50%">{{$product_details->category->category_name}}</td>
                      </tr>
                      <tr>
                        <td width="50%">Category</td>
                        <td width="50%">{{$product_details->subCategory->sub_category_name}}</td>
                      </tr>
                      <tr>
                        <td width="50%">Brand</td>
                        <td width="50%">{{$product_details->brand->brand_name}}</td>
                      </tr>
                      <tr>
                        <td width="50%">Product Name</td>
                        <td width="50%">{{$product_details->product_name}}</td>
                      </tr>
                      <tr>
                        <td width="50%">Product Title</td>
                        <td width="50%">{{$product_details->title}}</td>
                      </tr>
                      <tr>
                        <td width="50%">Price</td>
                        <td width="50%">{{$product_details->price}}</td>
                      </tr>
                       <tr>
                        <td width="50%">Discounted Price</td>
                        <td width="50%">{{$product_details->discount}}</td>
                      </tr>
                      <tr>
                        <td width="50%">Quantity</td>
                        <td width="50%">{{$product_details->qty}}</td>
                      </tr>
                      <tr>
                        <td width="50%">Details</td>
                        <td width="50%">{{$product_details->details}}</td>
                      </tr>
                      <tr>
                        <td width="50%">Image</td>
                        <td width="50%"><img src="{{(!empty($product_details->image))?url($product_details->image):url('public/upload/no image found.jpg')}}"
                            style="width:174px;height:100px;border:1px solid #000;"></td>
                      </tr>
                      <tr>
                        <td width="50%"></td>
                        <td width="50%">
                         
                        </td>
                      </tr>

                       <tr>
                        <td width="50%">Size</td>
                        <td width="50%">
                          @php
                            $sizes = App\Model\ProductSize::where('product_id',$product_details->id)->get();
                          @endphp
                          @foreach($sizes as $siz)
                            {{$siz->size->size_name}},
                          @endforeach
                        </td>
                       </tr>

                        <tr>
                        <td width="50%">Prodcut subImages</td>
                        <td width="50%">
                          @php
                             $sub_images = App\Model\ProductSubImage::where('product_id',$product_details->id)->get();
                          @endphp
                          @foreach($sub_images as $subimg)
                            <img src="{{url('public/upload/product_image/product_sub_images/'.$subimg->sub_image)}}"
                            style="width:100px;height:57px;border:1px solid #000;">
                          @endforeach
                        </td>
                       </tr>
                  </tbody>
               </table>
               <!-- /.card-body -->
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection