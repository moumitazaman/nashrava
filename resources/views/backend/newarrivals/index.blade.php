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
                <h3>{{__('back_blade.view_product_list')}}
                   <a class="btn btn-success btn-sm float-right" href="{{route('product.create')}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;{{__('back_blade.view_product_add')}}</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-sm table-bordered table-hover table-responsive" style="color:#00004d">
                    <thead >
                      <tr >
                        <th width="5%">SL.</th>
                        <th width="15%">Product Name</th>
                        <th width="14%">Image</th>
                        <th width="12%">Brand</th>
                        <th width="12%">Price</th>
                        <th width="10%">Quantity</th>
                        <th width="10%">New Arrivals</th>
                        <th width="12%">Action</th>
                      </tr>
                    </thead>
                    <tbody >
                      @foreach($products as $key => $product)
                      <tr>
                        <td># {{$key+1}}</td>
                        <td>{{$product->purchase->product_name ?? ''}}</td>
                        <td><img src="{{(!empty($product->image))?url($product->image):url('public/upload/no image found.jpg')}}" width="130px" height="80px" ></td>
                        <td>{{$product->brand->brand_name ?? ''}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->qty}}</td>

                        <td style="text-align: center;">
                          @if($product->new_arrival == '1')
                          <a style="color:white;padding-right:17px;border-radius: 5px;"  class="btn btn-success btn-sm" href="{{route('newarrival.change.status',$product->id)}}">Active</a>
                          @else
                          <a style="color:white;border-radius: 5px;" class="btn btn-danger btn-sm" href="{{route('newarrival.change.status',$product->id)}}">Inactive</a>
                          @endif
                        </td>

                        <td>
                           @php
                           $count_product = App\Model\OrderDetail::where('product_id',$product->purchase->id ?? 0)->count();
                           @endphp
                            <div class="row">&nbsp;&nbsp;
                              <a title="Edit" class="btn btn-sm btn-primary" href="{{route('product.edit',$product->id)}}"><i class="fa fa-edit"></i></a>&nbsp;
                              <a title="Details" class="btn btn-success btn-sm" href="{{route('product.show',$product->id)}}"><i class="fa fa-eye"></i></a>&nbsp

                                @if($count_product < 1)
                                <form action="{{route('product.destroy',$product->id)}}" method="post">
                                   @csrf
                                   @method('delete')
                                  <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-confirm" ><i class="fa fa-trash"></i></a>
                                </form>
                                @endif
                            </div>
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
