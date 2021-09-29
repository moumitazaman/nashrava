 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
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
                <h3>Add Slider
                   <a class="btn btn-success btn-sm float-right" href="{{route('slider.index')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;View Slider List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <form  method="post" action="{{route('slider.store')}}"  id="myForm" enctype="multipart/form-data">
                    @csrf
                   
                      <div class="row">
                          <div class="form-group col-md-6">
                              <label for="slider_name">Slider Name</label>
                              <input type="text" name="slider_name" class="form-control" placeholder="Please enter slider name">
                              <font style="color:#e60000">
                                  {{($errors->has('slider_name'))?($errors->first('slider_name')):' '}}
                              </font>
                          </div>
                          
                        
                       <div class="form-group col-md-6">
                          <label for="name">Headline Text</label>
                          <input type="text" class="form-control" name="highlight" placeholder="Enter Highlighted Text" required>
                          <font style="color:#e60000">
                                  {{($errors->has('highlight'))?($errors->first('highlight')):' '}}
                              </font>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="name">Subtitle Text</label>
                          <input type="text" class="form-control" name="shorttext" placeholder="Enter Short Text" required>
                          <font style="color:#e60000">
                                  {{($errors->has('shorttext'))?($errors->first('shorttext')):' '}}
                              </font>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="name">Shop Now URL </label>
                          <input type="text" class="form-control" name="shopnow_url" placeholder="Enter Shop Now Link">
                          <font style="color:#e60000">
                                  {{($errors->has('shopnow_url'))?($errors->first('shopnow_url')):' '}}
                              </font>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Explore URL</label>
                          <input type="text" class="form-control" name="explore_url" placeholder="Enter Explore Link">
                          <font style="color:#e60000">
                                  {{($errors->has('explore_url'))?($errors->first('explore_url')):' '}}
                              </font>
                      </div>

                      <div class="form-group col-md-6">
                           <label for="image">Image</label>
                           <input type="file" name="image" class="form-control" id="image">
                           <font style="color:#e60000">
                                 {{($errors->has('image'))?($errors->first('image')):' '}}
                           </font>

                           <img id="showImage" src="{{url('public/upload/no image found.jpg')}}" style="width:150px;height:160px;border:1px solid #000;">

                       </div>
                       <div class="form-group col-md-4" style="padding-top: 30px">
                       </div>

                          <div class="form-group col-md-4" style="padding-top: 30px">
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