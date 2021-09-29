 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{__('back_blade.manage_category')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('back_blade.category')}}</li>
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
                <h3>{{__('back_blade.view_category_list')}}
                   <a class="btn btn-success btn-sm float-right" href="{{route('category.create')}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;{{__('back_blade.view_category_add')}}</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
               <table id="example1" class="table table-sm table-bordered table-hover" style="color:#00004d">
                    <thead>
                      <tr>
                        <th width="10%">SL.</th>
                        <th width="30%">Category Name</th>
                        <th width="20%">Status</th>
                        <th width="15%">Action</th>
                      </tr> 
                    </thead>
                    <tbody style="color: #4d0026">
                      @foreach($category_info as $key => $cat_info)
                      <tr>
                        <td># {{$key+1}}</td>
                        <td>{{$cat_info->category_name}}</td>
                        <td>
                            &nbsp;&nbsp; &nbsp;&nbsp;
                            @if($cat_info->status == '1')
                              <a style="color:white;padding-right:30px;border-radius: 5px;"  class="btn btn-success btn-sm" href="{{route('change.category.status',$cat_info->id)}}">Active</a>
                            @else
                              <a style="color:white;padding-right:17px;border-radius: 5px;"  class="btn btn-danger btn-sm" href="{{route('change.category.status',$cat_info->id)}}">Deactive</a>
                            @endif 
                        </td>
                        <td>
                           @php
                           $count_cat = App\Model\Product::where('category_id',$cat_info->id)->count();
                           $count_purchase_cat = App\Model\Purchase::where('category_id',$cat_info->id)->count();
                           @endphp
                           <div class="row">
                             &nbsp;&nbsp; &nbsp;&nbsp;
                              <a title="Edit" class="btn btn-sm btn-primary" href="{{route('category.edit',$cat_info->id)}}"><i class="fa fa-edit"></i></a>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                              @if($count_cat < 1 &&  $count_purchase_cat < 1)
                                <form action="{{route('category.destroy',$cat_info->id)}}" method="post">
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