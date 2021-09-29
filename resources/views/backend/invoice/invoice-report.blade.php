 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{__('back_blade.manage_invoice')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('back_blade.invoice')}}</li>
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
                <h3>{{__('back_blade.select_criteria')}}
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="get" action="{{route('local.invoice.daily.report.print')}}" target="_blank" id="myForm">
                   <div class="row">
                       <div class="form-group col-md-4">
                          <label for="start_date">Start Date</label>
                          <input type="text" name="start_date"   class="form-control form-control-sm datepicker"  id="start_date" placeholder="YYYY-MM-DD"  readonly>
                      </div>
                       <div class="form-group col-md-4">
                          <label for="end_date">End Date</label>
                          <input type="text" name="end_date"   class="form-control form-control-sm datepicker1"  id="end_date" placeholder="YYYY-MM-DD"  readonly>
                      </div>
                      <div class="form-group col-md-2" style="padding-top: 30px;">
                          <button type="submit" class="btn btn-primary btn-sm ">Search</button>
                      </div>
                  </div>
                </form>
              </div><!-- /.card-body -->
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
  $('#myForm').validate({
    rules: {
      start_date: {
        required: true,
      },
      end_date: {
        required: true,
      },
    },
    messages: {
      start_date: {
        required: "Please enter start Date ",
      },
      end_date: {
        required: "Please enter end Date",
      },
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

        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd',
          });

        $('.datepicker1').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd',
          });
    </script>
 @endsection