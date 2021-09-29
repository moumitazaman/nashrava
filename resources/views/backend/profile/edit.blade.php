 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0 text-dark">{{__('back_blade.manage profile')}}</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('back_blade.profile')}}</li>
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
          <section class="col-md-12" >
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card" >
              <div class="card-header">
                <h3 style="color:deeppink">{{__('back_blade.edit_profile')}}
                   <a class="btn btn-success btn-sm float-right" href="{{route('profile.index')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;{{__('back_blade.your_profile')}}</a>
                </h3>
              </div><!-- /.card-header -->
                  <div class="card-body">
                    <form action="{{route('profile.update',$user_id->id)}}"  method="post" id="myForm"   enctype="multipart/form-data">
                      @csrf
                      @method('patch')
                      <div class="row">
                          <div class="form-group col-md-4">
                              <label for="name">Name</label>
                              <input type="text" name="name" value="{{$user_id->name}}" class="form-control">
                              <font style="color:red">{{($errors->has('name'))?($errors->first('name')):' '}}</font>
                          </div>
                          <div class="form-group col-md-4">
                              <label for="email">Email</label>
                              <input type="email" name="email" value="{{$user_id->email}}" class="form-control">
                              <font style="color:red">{{($errors->has('email'))?($errors->first('email')):' '}}</font>
                          </div>
                          <div class="form-group col-md-4">
                              <label for="mobile">Mobile</label>
                              <input type="number" name="mobile" value="{{$user_id->mobile}}" class="form-control">
                              <font style="color:red">{{($errors->has('mobile'))?($errors->first('mobile')):' '}}</font>
                          </div>
                          <div class="form-group col-md-4">
                              <label for="address">Address</label>
                              <input type="text" name="address" value="{{$user_id->address}}" class="form-control">
                              <font style="color:red">{{($errors->has('address'))?($errors->first('address')):' '}}</font>
                          </div>
                          <div class="form-group col-md-4">
                              <label for="image">Image</label>
                              <input type="file" name="image" class="form-control" id="image">
                          </div>
                          <div class="form-group col-md-12">
                              <img id="showImage" src="{{(!empty($user_id->image))?url($user_id->image):url('public/upload/image_avatar.jpg')}}" style="width:150px;height:160px;border:1px solid #000;">
                          </div>
                          <div class="form-group col-md-6">
                              <input type="submit" name="submit" value="Update" class="btn btn-primary">
                          </div>
                      </div>
                    </form>
              </div><!-- /.card-body -->
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