 @extends('backend.layout.master')
 @section('')
 @endsection
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
                <h3>View Slider List
                   <a class="btn btn-success btn-sm float-right" href="{{route('slider.create')}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Slider </a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-sm table-bordered table-hover " style="color:#00004d">
                    <thead>
                      <tr>
                        <th width="10%">SL.</th>
                        <th width="20%">Slider Name</th>
                        <th width="30%">Image</th>
                        <th width="10%">Upper</th>
                        <th width="10%">Lower</th>
                        <th width="20%">Action (Edit / Delete)</th>
                      </tr> 
                    </thead>
                    <tbody style="color: #4d0026">
                      @foreach($sliders as $key => $slider)
                      <tr>
                        <td># {{$key+1}}</td>
                        <td>{{$slider->slider_name}}</td>
                          <td><img src="{{(!empty($slider->image))?url('public/upload/slider_image/'.$slider->image):url('public/upload/no image found.jpg')}}" width="160px" height="90px" ></td>
                          <td>
                             &nbsp;&nbsp; &nbsp;&nbsp;
                            @if($slider->upper == '1')
                              <a style="color:white;padding-right:30px;border-radius: 5px;"  class="btn btn-success btn-sm" href="{{route('change.upper.status',$slider->id)}}">Active</a>
                            @else
                              <a style="color:white;padding-right:17px;border-radius: 5px;"  class="btn btn-danger btn-sm" href="{{route('change.upper.status',$slider->id)}}">Deactive</a>
                            @endif 
                          </td>
                            <!--<td>-->
                            <!--   &nbsp;&nbsp; &nbsp;&nbsp;-->
                            <!--@if($slider->middle == '2')-->
                            <!--  <a style="color:white;padding-right:30px;border-radius: 5px;"  class="btn btn-success btn-sm" href="{{route('change.middle.status',$slider->id)}}">Active</a>-->
                            <!--@else-->
                            <!--  <a style="color:white;padding-right:17px;border-radius: 5px;"  class="btn btn-danger btn-sm" href="{{route('change.middle.status',$slider->id)}}">Deactive</a>-->
                            <!--@endif -->
                            <!--</td>-->
                          <td>
                            &nbsp;&nbsp; &nbsp;&nbsp;
                            @if($slider->lower == '3')
                              <a style="color:white;padding-right:30px;border-radius: 5px;"  class="btn btn-success btn-sm" href="{{route('change.lower.status',$slider->id)}}">Active</a>
                            @else
                              <a style="color:white;padding-right:17px;border-radius: 5px;"  class="btn btn-danger btn-sm" href="{{route('change.lower.status',$slider->id)}}">Deactive</a>
                            @endif 
                          </td>
                         <!--  <td style="text-align: center;">  
                          @if($slider->status == '0')
                          <a style="color:white;border-radius: 5px;"  class="btn btn-success btn-sm" href="{{route('change.status',$slider->id)}}">Upper</a>
                          @else
                          <a  style="color:white;border-radius: 5px;" class="btn btn-danger btn-sm" href="{{route('change.status',$slider->id)}}">Lower</a>
                          @endif
                          </td> -->
                       
                        <td>
                            <div class="row" style="text-align: center;padding-top: 20px;">
                              &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                  <a title="Edit" class="btn btn-sm btn-primary" href="{{route('slider.edit',$slider->id)}}"><i class="fa fa-edit"></i></a>&nbsp;
                                  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                  <form action="{{route('slider.destroy',$slider->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-confirm" ><i class="fa fa-trash"></i></a>
                                  </form>
                                
                            </div>
                        </td>                        
                      </tr> 
                      @endforeach
                    </tbody>  

                   </table>
               <!-- /.card-body -->
              </div>
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