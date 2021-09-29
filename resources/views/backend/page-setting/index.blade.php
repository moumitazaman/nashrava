@extends('backend.layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Page Settings</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
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
                            <div class="card-body">
                                <form action="{{ route('page.setting') }}"  method="post" id="myForm"   enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                       
                                       
                                        <div class="form-group col-md-6">
                                            <label for="address">About Us</label>
                                            <textarea class="ckeditor form-control" name="aboutus">{{ get_static_option('aboutus') }}</textarea>                                            @error('address')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="address">Delivery Details & Charges</label>
                                            <textarea class="ckeditor form-control" name="delivery">{{ get_static_option('delivery') }}</textarea>                                            @error('address')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="address">Terms & Conditions</label>
                                            <textarea class="ckeditor form-control" name="terms">{{ get_static_option('terms') }}</textarea>                                            @error('address')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        
                                        
                                        

                                        <div class="form-group col-md-12 text-center">
                                            <input type="submit" name="submit" value="Update" class="btn btn-primary col-6">
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

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection
