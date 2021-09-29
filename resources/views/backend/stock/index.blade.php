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
              <li class="breadcrumb-item active">{{__('back_blade.stock')}}</li>
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
                <h3>{{__('back_blade.view_stock_list')}}</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-sm table-striped table-bordered table-hover table-responsive" style="color:#00004d">
                    <thead>
                      <tr>
                        <th width="5%">SL.</th>
                        <th width="13%">Product Name</th>
                        <th width="13%">Product Title</th>

                        <th width="10%">Category</th>
                        <th width="10%">Sub Category</th>
                        <th width="13%">Brand</th>
                        <th width="13%">Price</th>
                        <th width="13%">Opening Stock</th>
                        <th width="13%">Current Stock</th>
                        <th width="10%">Action</th>
                      </tr> 
                    </thead>
                    <tbody>
                      @foreach($stock_info as $key => $stock)
                      <tr>
                        <td># {{$key+1}}</td>
                        <?php 
$name=App\Model\Purchase::where('id',$stock->product_name)->first();
                        ?>
                        <td>{{$name->product_name}}</td>
                        <td>{{$stock->title}}</td>

                        <td>{{$stock->category->category_name}}</td>
                        <td>{{$stock->subCategory->sub_category_name}}</td>
                        <td>{{$stock->brand->brand_name}}</td>
                        <td>{{$stock->price}}</td>
                        <td>Total:{{$stock->purchase->buying_qty}}</br>
                        
                        
                        </td>
                        <td>{{$stock->qty}}</br>
                        @foreach(\App\Model\Size::all() as $size)
                                 {{ $size->size_name }} : {{ $size->productSizes()->where('product_id', $stock->id)->count() ?? 0 }}
                                <br>
                            @endforeach
                        
                        </td>
                        <td>
                          <a title="Edit" class="btn btn-sm btn-primary" href="{{route('stock.edit',$stock->id)}}"><i class="fa fa-edit"></i></a>
                        </td>
                      </tr> 
                      @endforeach
                    </tbody>
                   <!--  -->
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