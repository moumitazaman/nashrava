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
            <h1 class="m-0 text-dark">Shipping Cost Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">shipping cost</li>
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
                <h3>Shipping Cost Edit
                  <a class="btn btn-success btn-sm float-right" href="{{route('shipping-cost.index')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;shipping cost list</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form  method="post" action="{{route('shipping-cost.update',$shipping_cost->id)}}"  id="myForm" enctype="multipart/form-data"> 
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="category_name">Area</label>
                            <select name="shipping_area" class="form-control form-control-sm" required>
                               <option value="">--select shipping area--</option>
                               <option value="Dhaka" {{$shipping_cost->shipping_area == 'Dhaka' ? 'selected' : ''}}>Dhaka</option>
                               <option value="Outside Of Dhaka" {{$shipping_cost->shipping_area == 'Outside Of Dhaka' ? 'selected' : ''}}>Outside Of Dhaka</option>
                            </select>
                            <font style="color:#e60000">
                                 {{($errors->has('shipping_area'))?($errors->first('shipping_area')):' '}}
                            </font>
                        </div>
                        
                     
                        <div class="form-group col-md-6">
                           <label for="category_image">Shipping Cost</label>
                            <input type="text" name="shipping_cost" value="{{$shipping_cost->shipping_cost}}" class="form-control form-control-sm" required>
                            <font style="color:#e60000">
                                  {{($errors->has('shipping_cost'))?($errors->first('shipping_cost')):' '}}
                            </font>
                        </div>
                       
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