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
                <h3>{{__('back_blade.view_user_add')}}
                  <a class="btn btn-success btn-sm float-right" href="{{route('user.index')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;{{__('back_blade.view_user_list')}}</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <form method="post"  action="{{route('user.store')}}" id="myForm">
                    @csrf
                    <div class="row">
                      <div class="form-group col-md-4">
                          <label for="user_type">User Type</label>
                            <select name="user_type" id="user_type" class="form-control">
                                <option value=" ">Select User Type</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                                <option value="customer">Customer</option>

                            </select>
                          <font style="color:red">{{($errors->has('user_type'))?($errors->first('user_type')):' '}}</font>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="name">Name</label>
                          <input type="text" name="name" class="form-control" placeholder="please enter your name">
                          <font style="color:red">{{($errors->has('name'))?($errors->first('name')):' '}}</font>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="email">Email</label>
                          <input type="email" name="email" id="email" class="form-control" placeholder="please enter your email"> 
                          <font style="color:red">{{($errors->has('email'))?($errors->first('email')):' '}}</font>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="password">Password</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="please enter your password">
                          <font style="color:red">{{($errors->has('password'))?($errors->first('password')):' '}}</font>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="password">Confirm Password</label>
                          <input type="password" name="password2" id="password2" class="form-control" placeholder="please enter your confirm password">
                          <font style="color:red">{{($errors->has('password2'))?($errors->first('password2')):' '}}</font>
                      </div>
                      <div class="form-group col-md-6 "> 
                          <input type="submit"  value="submit" class="btn btn-primary">
                      </div> 
                    </div>
                  </form>
              <!-- /.card-body -->
              </div>
            </div>
          </section>
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
 @endsection