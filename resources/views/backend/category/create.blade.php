 @extends('backend.layout.master')
 @section('css')
 <!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
 @endsection
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
                <h3>{{__('back_blade.view_category_add')}}
                  <a class="btn btn-success btn-sm float-right" href="{{route('category.index')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;{{__('back_blade.view_category_list')}}</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form  method="post" action="{{route('category.store')}}"  id="myForm" enctype="multipart/form-data"> 
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="category_name">Category Name</label>
                            <input type="text" name="category_name" class="form-control" placeholder="Please enter category name">
                            <font style="color:#e60000">
                                 {{($errors->has('category_name'))?($errors->first('category_name')):' '}}
                            </font>
                        </div>
                        
                     
                        <!--<div class="form-group col-md-6">
                           <label for="category_image">Category Image</label>
                            <input type="file" name="category_image" id="image" class="form-control form-control-sm" >
                            <font style="color:#e60000">
                                  {{($errors->has('category_image'))?($errors->first('category_image')):' '}}
                            </font>
                        </div>
                        <div class="form-group col-md-4" style="display:none" id="show">
                          <img id="showImage" src="{{url('public/upload/no image found.jpg')}}" style="width:150px;height:160px;border:1px solid #000;">
                        </div>-->
                     
                    
                        <div class="form-group col-md-6" style="padding-top: 30px">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
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

  $(document).on('click','#image',function(){

        $('#show').show();
   
 });

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