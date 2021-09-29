@extends('backend.layout.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" style="color:#ff3300">Slider</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" >
       
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12" >
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card" >
              <div class="card-header">
               <h3 style="color:deeppink">Edit Slider

               <a class="btn btn-success btn-sm float-right" href="{{route('slider.index')}}"><i class="fa fa-list"></i>Sliders List</a>
               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">
              
              <form  method="post" action="{{route('slider.update',$data->id)}}"  id="myForm" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                  <div class="form-group col-md-6">
                              <label for="slider_name">Slider Name</label>
                              <input type="text" name="slider_name" class="form-control" value="{{$data->slider_name}}">
                             
                          </div>
                          <div class="form-group col-md-6">
                          <label for="name">Headline Text</label>
                          <input type="text" class="form-control" name="highlight" value="{{$data->highlight}}">
                         
                        </div>
                        <div class="form-group col-md-6">
                          <label for="name">Subtitle Text</label>
                          <input type="text" class="form-control" name="shorttext" value="{{$data->short_text}}">
                          
                        </div>
                        <div class="form-group col-md-6">
                          <label for="name">Shop Now URL </label>
                          <input type="text" class="form-control" name="shopnow_url" value="{{$data->shopnow_url}}">
                          
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Explore URL</label>
                          <input type="text" class="form-control" name="explore_url" value="{{$data->explore_url}}">
                          
                      </div>
                        
                       <div class="form-group col-md-6">
                           <label for="image">Image</label>
                           <input type="file" name="image" class="form-control" id="image">
                            
                       </div>
                        <div class="form-group col-md-4">
                           
                           <img id="showImage" src="{{(!empty($data->image))?url('public/upload/slider_image/'.$data->image):url('public/upload/no image found.jpg')}}" style="width:150px;height:160px;border:1px solid #000;">
                       </div>
                 
                 
                  <div class="form-group col-md-6">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                 </div>
                  

              </form>

              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </section>
          
              
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  


    <!-- /.content -->
  
  </div>
  @endsection
 