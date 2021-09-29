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
          <div class="col-lg-3 col-6" >
            <!-- small box -->
             <a href="{{route('user.index')}}" class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box bg-info">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
              User Module
           </div>
           </div> 
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <a href="{{route('product.index')}}" class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box bg-success">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
              Product Module
           </div>
           </div> 
            </a>
          </div>

           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <a href="{{route('home.order.cart')}}"  class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box bg-warning">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
             Order Module
           </div>
           </div> 
            </a>
          </div>

           <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <a href="{{route('purchase.index')}}"  class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box bg-dark">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
              Purchase Module
           </div>
           </div> 
            </a>
          </div>

            <div class="col-lg-3 col-6">
            <!-- small box -->
             <a href="{{route('invoice.index')}}"  class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box" style="background-color: #751a71;">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
              Invoice Module
           </div>
           </div> 
            </a>
          </div>
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <a href="{{route('stock.index')}}"  class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box bg-danger">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
              Stock Module
           </div>
           </div> 
            </a>
          </div>
           <!-- ./col -->
         <div class="col-lg-3 col-6" >
            <!-- small box -->
             <a href="{{route('home.customer.cart')}}" class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box" style="background-color: #940662">
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
             <a href="{{route('home.report.cart')}}" data-id="2" id="product" class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box " style="background-color: #779c0b">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
             All Report Module
           </div>
           </div> 
            </a>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <a href="{{route('home.other.cart')}}"  class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box " style="background-color: #434a75;">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
              Others Module
           </div>
           </div> 
            </a>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <a href="{{route('home.category.cart')}}"  class="small-box-footer">
             <div class="card"> 
             <div class="card-body" style="font-weight: bold;text-align: center">
              <div class="small-box " style="background-color: #fc4e03;">
              <div class="inner" style="text-align: center">
                
                <i class="ion ion-bag"></i>
             
              </div>
            </div>
              Category Module
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
 