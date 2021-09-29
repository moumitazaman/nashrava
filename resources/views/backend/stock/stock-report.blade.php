 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{__('back_blade.manage_stock')}}</h1>
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
                <h3>{{__('back_blade.view_stock_list')}}
                   <a class="btn btn-success btn-sm float-right" href="{{route('stock.report.print')}}" target="_blank"><i class="fa fa-print"></i>&nbsp;&nbsp;{{__('back_blade.print_pdf_of_stock')}}</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-sm table-bordered table-hover table-responsive" style="color:#00004d">
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