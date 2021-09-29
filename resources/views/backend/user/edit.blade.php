 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{__('back_blade.manage_user')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('back_blade.user')}}</li>
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
                    <h3>{{__('back_blade.view_user_edit')}}<a class="btn btn-success btn-sm float-right" href="{{route('user.index')}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;{{__('back_blade.view_user_list')}}</a></h3>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <form  action="{{route('user.update',$user_info->id)}}" method="post">
                      @csrf
                      @method('patch')
                      <div class="row">
                          <div class="form-group col-md-4">
                               <label for="user_type">User Type</label>
                               <select name="user_type" class="form-control">
                                  <option value=" ">Select User type</option>
                                  <option value="admin" {{($user_info->user_type == 'admin')?('selected'):' '}}>Admin</option>
                                  <option value="user" {{($user_info->user_type =='user')?('selected'):' '}}>User</option>
                                  <option value="customer" {{($user_info->user_type =='customer')?('selected'):' '}}>Customer</option>

                               </select>
                             <font style="color:red">{{($errors->has('user_type'))?($errors->first('user_type')):' '}}</font>
                          </div>
                          <div class="form-group col-md-4">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{$user_info->name}}" class="form-control">
                                <font style="color:red">{{($errors->has('name'))?($errors->first('name')):' '}}</font>
                          </div>
                          <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{$user_info->email}}" class="form-control">
                                <font style="color:red">{{($errors->has('email'))?($errors->first('email')):' '}}</font>
                          </div>
                          <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                      </div>
                    </form>
                  </div>
               <!-- /.card-body -->
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