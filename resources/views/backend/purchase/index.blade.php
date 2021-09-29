 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{__('back_blade.manage_purchase')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('back_blade.purchase')}}</li>
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
                <h3>{{__('back_blade.view_purchase_list')}}
                   <a class="btn btn-success btn-sm float-right" href="{{route('purchase.create')}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;{{__('back_blade.view_purchase_add')}}</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-sm table-bordered table-hover table-striped table-responsive" style="color:#00004d">
                    <thead>
                      <tr>
                        <th width="5%">SL.</th>
                        <th width="5%">Purchase No</th>
                        <th width="15%">Purchase Date</th>
                        <th width="15%">Category Name</th>
                        <th width="15%">Product Name</th>
                        <th width="10%">Buying Quantity</th>
                        <th width="10%">Unit Price</th>
                        <th width="10%">Buying Price</th>
                        <th width="15%">Edit / Delete</th>
                      </tr> 
                    </thead>
                    <tbody style="color: #4d0026">
                      @foreach($purchase_info as $key=>$purchase)
                      <tr>
                        <td># {{$key+1}}</td>
                        <td>{{$purchase->purchase_no}}</td>
                        <td>{{date('d-m-Y',strtotime($purchase->purchase_date))}}</td>
                        <td>{{$purchase->category->category_name}}</td>
                        <td>{{$purchase->product_name}}</td>
                        <td>{{$purchase->buying_qty}}
                        </td>
                        <td>{{$purchase->unit_price}}</td>
                        <td>{{$purchase->buying_price}}</td>
                        <td>
                          <div class="row">
                          @php
                           $count_product = App\Model\Product::where('product_name',$purchase->id)->count();
                           @endphp
                            &nbsp;&nbsp;
                            <a title="Edit" class="btn btn-sm btn-primary" href="{{route('purchase.edit',$purchase->id)}}"><i class="fa fa-edit"></i></a>&nbsp;
                           @if($count_product < 1)
                           <form action="{{route('purchase.destroy',$purchase->id)}}" method="post">
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