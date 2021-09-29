 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{__('back_blade.manage_unit')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('back_blade.unit')}}</li>
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
                <h3>{{__('back_blade.view_unit_list')}}
                   <a class="btn btn-success btn-sm float-right" href="{{route('unit.create')}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;{{__('back_blade.view_unit_add')}}</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-sm table-bordered table-hover " style="color:#00004d">
                    <thead>
                      <tr>
                        <th width="20%">SL.</th>
                        <th width="60%">Unit Name</th>
                        <th width="20%">Action (Edit / Delete)</th>
                      </tr> 
                    </thead>
                    <tbody style="color: #4d0026">
                      @foreach($unit_info as $key => $unit)
                      <tr>
                        <td># {{$key+1}}</td>
                        <td>{{$unit->unit_name}}</td>
                      
                        <td>
                            <div class="row">
                              &nbsp;&nbsp;
                                  <a title="Edit" class="btn btn-sm btn-primary" href="{{route('unit.edit',$unit->id)}}"><i class="fa fa-edit"></i></a>&nbsp;
                                
                                  <form action="{{route('unit.destroy',$unit->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-confirm" ><i class="fa fa-trash"></i></a>
                                  </form>
                                
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