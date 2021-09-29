 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{__('back_blade.manage_supplier')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('back_blade.supplier')}}</li>
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
                <h3>{{__('back_blade.view_supplier_edit')}}
                  <a class="btn btn-success btn-sm float-right" href="{{route('supplier.index')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;{{__('back_blade.view_supplier_list')}}</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <form  method="post" action="{{route('supplier.update',$supplier_info->id)}}"  id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                   
                      <div class="row">
                        <div class="form-group col-md-6">
                           <label for="company_name">Company Name</label>
                           <input type="text" name="company_name" class="form-control"  value="{{$supplier_info->company_name}}">
                           <font style="color:#e60000">
                                 {{($errors->has('company_name'))?($errors->first('company_name')):' '}}
                           </font>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="mobile_no">Mobile No</label>
                           <input type="text"  name="mobile_no" class="form-control"  value="{{$supplier_info->mobile_no}}">
                           <font style="color:#e60000">
                                 {{($errors->has('mobile_no'))?($errors->first('mobile_no')):' '}}
                           </font>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email (optional)</label>
                            <input type="email"  name="email" class="form-control" value="{{$supplier_info->email}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input type="text"  name="address" class="form-control" value="{{$supplier_info->address}}" >
                            <font style="color:#e60000">
                                 {{($errors->has('address'))?($errors->first('address')):' '}}
                           </font>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" name="submit" value="Update" class="btn btn-primary">
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