    @extends('backend.layout.master')
 @section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background:#d3dede">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" style="color:#ff3300">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>User List
                  <a class="btn btn-success float-right btn-sm" href="{{route('user.create')}}"><i class="fa fa-plus-circle"></i>Add User</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                   <table id="example1" class="table table-bordered table-hover table-responsive" style="color:#00004d">
                    <thead>
                      <tr>
                        <th width="5%">SL.</th>
                        <th width="25%">Usertype</th>
                        <th width="30%">Name</th>
                        <th width="20%">Email</th>
                        <th width="20%">Action</th>
                      </tr> 
                    </thead>
                    <tbody style="color: #4d0026">
                      @foreach($user_info as $key=>$user)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->user_type}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="row">
                                <a title="Edit" class="btn btn-sm btn-primary" href="{{route('user.edit',$user->id)}}"><i class="fa fa-edit"></i></a>&nbsp;
                               
                                <form action="{{route('user.destroy',$user->id)}}" method="post">
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
               
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </section>
          
              
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  


    <!-- /.content -->
  
  </div>
  <!-- /.content-wrapper -->
  @endsection