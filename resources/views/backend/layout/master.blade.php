<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{ csrf_token() }}"/>
  <title>Nashrava</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- jQuery -->
  <script src="{{asset('public/backend')}}/plugins/jquery/jquery.min.js"></script>
  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!--Datepicker-->
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- notify -->
  <style type="text/css">
     .notifyjs-corner{
     z-index: 10000 !important;
  }
  </style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
 @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #505F6D;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/admin/home')}}" class="nav-link"><strong style="color:white">Home</strong></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span><strong style="color:white">{{ Auth::user()->name }}</strong></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a  href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
          class="dropdown-item dropdown-footer">Logout</a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>

        </div>
      </li>
    </ul>
  </nav>

  <!-- /.navbar -->
    @if ( Request::is('admin/product') || Request::is('admin/product/*') || Request::is('admin/product/create') || Request::is('admin/product-measurement') || Request::is('admin/product-measurement/*') || Request::is('admin/product-measurement/create'))
    @include('backend.layout.sidebar_product')

    @elseif ( Request::is('admin/invoice') || Request::is('admin/invoice/*') || Request::is('admin/invoice/create') )
    @include('backend.layout.sidebar_invoice')

    @elseif ( Request::is('admin/user') || Request::is('admin/user/*') || Request::is('admin/user/create') || Request::is('admin/profile') || Request::is('admin/profile/*') || Request::is('admin/view-password') || Request::is('admin/customer.password.update'))
    @include('backend.layout.sidebar_user')

     @elseif ( Request::is('admin/user') || Request::is('admin/user/*') || Request::is('admin/user/create') )

    @elseif ( Request::is('admin/purchase') || Request::is('admin/pruchase/*') || Request::is('admin/purchase/create') )
    @include('backend.layout.sidebar_purchase')

    @elseif ( Request::is('admin/category') || Request::is('admin/category/*') || Request::is('admin/category/create') || Request::is('admin/category-cart') ||  Request::is('admin/sub-category') || Request::is('admin/sub-category/*') || Request::is('admin/sub-category/create')) 
    @include('backend.layout.sidebar_category')

    
    @elseif ( Request::is('admin/customer/index') || Request::is('admin/customer-cart') ||  Request::is('admin/customer/draft/view') || Request::is('admin/local/customer/view') || Request::is('admin/local/customer/due-list') || Request::is('admin/local/customer/edit/invoice/*') )
    @include('backend.layout.sidebar_customer')

    @elseif ( Request::is('admin/order') || Request::is('admin/pending-list') || Request::is('admin/approve-list') || Request::is('admin/order-cart') || Request::is('admin/details/*') )
    @include('backend.layout.sidebar_order')
    
    @elseif ( Request::is('admin/purchase/daily/report') || Request::is('admin/stock/report') || Request::is('admin/invoice/daily/report') || Request::is('admin/local/invoice/daily/report') )
    @include('backend.layout.sidebar-report')

    @elseif ( Request::is('admin/size')  || Request::is('admin/size/create')  || Request::is('admin/size/*') || Request::is('admin/size-measurement') || Request::is('admin/size-measurement/create') || Request::is('admin/size-measurement/*') || Request::is('admin/brand')  || Request::is('admin/brand/create') || Request::is('admin/brand/*') || Request::is('admin/slider') || Request::is('admin/slider/create') || Request::is('admin/slider/*') || Request::is('admin/supplier') || Request::is('admin/supplier/create') || Request::is('admin/supplier/*') || Request::is('admin/unit') || Request::is('admin/unit/create') || Request::is('admin/unit/*') || Request::is('admin/other-cart') )
    @include('backend.layout.sidebar-other')

    @elseif ( Request::is('admin/stock') )
    @include('backend.layout.sidebar_stock')
    
    @else

 @include('backend.layout.sidebar')
        @endif
   



  @yield('content')
  @if(session()->has('success'))
   <script type="text/javascript">
      $(function(){

         $.notify("{{session()->get('success')}}",{globalPosition:'top right',className:'success'})
      });

   </script>
   @endif
    @if(session()->has('error'))
   <script type="text/javascript">
      $(function(){

         $.notify("{{session()->get('error')}}",{globalPosition:'top right',className:'error'})
      });

   </script>
   @endif
  @include('backend.layout.footer')
</div>
<!-- ./wrapper -->
  @yield('js')

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/backend')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('public/backend')}}/plugins/chart.js/Chart.min.js"></script>
<!-- JQVMap -->
<script src="{{asset('public/backend')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/backend')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('public/backend')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('public/backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/backend')}}/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="{{asset('public/backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- jquery-validation -->
<script src="{{asset('public/backend')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript" src="{{asset('public/purchase_js')}}/handlebars.min.js"></script>
<!-- Select2 -->
<script src="{{asset('public/backend')}}/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive":true,
      "autoWidth": true,
       "ordering":false,
      "lengthChange": true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth":true,
      "responsive": false,
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader= new FileReader();
      reader.onload=function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
   
     });
  });
  </script>


<!-- approve -->
<script type="text/javascript">
    $(function(){

      $(document).on('click','.approveBtn',function(e){
          e.preventDefault();
          var link = $(this).attr('href');
           Swal.fire({
              title: 'Are you sure?',
              text: "You want to Approve Data",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, approve it!'
            }).then((result) => {
              if (result.value){
                   // form.submit();
               window.location.href = link;
                Swal.fire(
                  'Approved!',
                  'Your file has been approved.',
                  'success'
                )
              }
            })
      });
  });
</script>
<!-- delete -->
<script type="text/javascript">
    $(function(){
           $('.delete-confirm').click(function(event) {
              var form = $(this).closest("form");
              event.preventDefault();
              Swal.fire({
              title: 'Are you sure?',
              text: "You want to Delete Data",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed){
                   form.submit();
                 // window.location.href = link;
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })

    });
  });
</script>
<script type="text/javascript">
  $(function(){
     //Initialize Select2 Elements
    $('.select2').select2();
  })
</script>
 <script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader= new FileReader();
      reader.onload=function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
   
     });
  });
  </script>

  <script type="text/javascript">
    $(function(){

      $(document).on('click','.deleteBtn',function(e){
          e.preventDefault();
          var link = $(this).attr('href');
           Swal.fire({
              title: 'Are you sure?',
              text: "You want to Delete Data",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
              if (result.value){
                   // form.submit();
                window.location.href = link;
                Swal.fire(
                  'Deleted!',
                  'Your file has been Deleted.',
                  'success'
                )
              }
            })
      });
  });
</script>
<!-- for status change -->
<script>
function show_status(_this, id) {
    var status = $(_this).prop('checked') == true ? 1 : 0;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `coupon-status-change/`,
        type: 'post',
        data: {
            _token: _token,
            id: id,
            status: status 
        },
        success: function (result) {
        }
    });
}

</script>



</body>
</html>
