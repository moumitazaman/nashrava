 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Product Measurement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">product measurement</li>
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
                <h3>Product-Measurement List
                   <a class="btn btn-success btn-sm float-right" href="{{route('product-measurement.create')}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Product-Measurement</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
               <table id="example1" class="table table-sm table-bordered table-hover" style="color:#00004d">
                    <thead>
                      <tr>
                        <th width="10%">SL.</th>
                        <th width="10%">Product</th>
                        <th width="10%">Position</th>
                        <th width="10%">X-Small</th>
                        <th width="10%">Small</th>
                        <th width="10%">Medium</th>
                        <th width="10%">Large</th>
                        <th width="10%">X-Large</th>
                        <th width="20%">XX-Large</th>
                      <!--   <th width="15%">Action</th> -->
                      </tr>
                    </thead>
                    <tbody style="color: #4d0026">
                      @foreach($measurements as $key => $measurement)
                      <tr>
                        <td># {{$key+1}}</td>
                        <td>{{$measurement->product->purchase->product_name ?? ''}}</td>
                        <td>{{$measurement->sizeMeasurement->measurement ?? ''}}</td>
                        <td>{{$measurement->x_small}}</td>
                        <td>{{$measurement->small}}</td>
                        <td>{{$measurement->medium}}</td>
                        <td>{{$measurement->large}}</td>
                        <td>{{$measurement->x_large}}</td>
                        <td>{{$measurement->xx_large}}</td>
                       <!--  <td>
                           <div class="row">&nbsp;&nbsp;&nbsp;
                              <a title="Edit" class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i></a>&nbsp;
                              &nbsp;
                                <form action="#" method="post">
                                   @csrf
                                   @method('delete')
                                  <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-confirm" ><i class="fa fa-trash"></i></a>
                                </form>
                          </div>

                        </td> -->

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
