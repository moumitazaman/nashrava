   @extends('backend.layout.master')
  @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         
           <!-- ./col -->
         <div class="col-lg-3 col-6" >
            <!-- small box -->
             <a href="{{route('customer.index')}}" class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box bg-info">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
             Customer Module
           </div>
           </div> 
            </a>
          </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
             <a href="{{route('draft.customer')}}" data-id="2" id="product" class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box bg-success">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
             Draft Customer Module
           </div>
           </div> 
            </a>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <a href="{{route('local.customer')}}" data-id="2" id="product" class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box bg-warning">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
             Local Customer Module
           </div>
           </div> 
            </a>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <a href="{{route('local.customer.due.list')}}" data-id="2" id="product" class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box bg-danger">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
             Local Customer Due  Module
           </div>
           </div> 
            </a>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
        
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
 