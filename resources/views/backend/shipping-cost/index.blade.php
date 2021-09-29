 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Shipping Cost</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">Shipping Cost</li>
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
                <h3>Shipping Cost List
                   <a class="btn btn-success btn-sm float-right" href="{{route('shipping-cost.create')}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Shipping</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
               <table id="example1" class="table table-sm table-bordered table-hover" style="color:#00004d">
                    <thead>
                      <tr>
                        <th width="10%">SL.</th>
                        <th width="30%">Shipping Area</th>
                        <th width="25%">Shipping Cost</th>
                        <th width="15%">Action</th>
                      </tr> 
                    </thead>
                    <tbody style="color: #4d0026">
                      @foreach($shipping_costs as $key => $shipping_cost)
                      <tr>
                        <td># {{$key+1}}</td>
                        <td>{{$shipping_cost->shipping_area}}</td>
                        <td>{{$shipping_cost->shipping_cost}}</td>
                        <td>
                           <div class="row">
                             &nbsp;&nbsp; &nbsp;&nbsp;
                              <a title="Edit" class="btn btn-sm btn-primary" href="{{route('shipping-cost.edit',$shipping_cost->id)}}"><i class="fa fa-edit"></i></a>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
                          </div>

                        </td>
                        
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