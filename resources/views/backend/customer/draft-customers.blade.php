 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{__('back_blade.manage_customer')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('back_blade.customer')}}</li>
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
                <h3>{{__('back_blade.view_draft_customer_list')}}
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-sm table-bordered table-hover" style="color:#00004d">
                    <thead>
                      <tr>
                         <th width="5%">SL.</th>
                        <th width="20%">Name</th>
                        <th width="15%">Email</th>
                        <th width="15%">Mobile No</th>
                        <th width="15%">Signup status</th>
                        <th width="20%">Address</th>
                        <th width="10%">Action</th>
                      </tr> 
                    </thead>
                    <tbody>
                      @foreach($draft_customer as $key => $draft_cus)
                      @php
                          $created = new Carbon\Carbon($draft_cus->created_at);
                          $now = Carbon\Carbon::now();
                          $difference = ($created->diff($now)->days < 1)?'today':$created->diffForHumans($now);
                      @endphp
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$draft_cus->name}}</td>
                        <td>{{$draft_cus->email}}</td>
                        <td>{{$draft_cus->mobile}}</td>
                        <td>{{$difference}}</td>
                        <td>{{$draft_cus->address}}</td>
                        <td>
                           <a href="{{route('draft.customer.delete',$draft_cus->id)}}" class="btn btn-danger btn-sm deleteBtn" ><i class="fa fa-trash"></i></a>
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