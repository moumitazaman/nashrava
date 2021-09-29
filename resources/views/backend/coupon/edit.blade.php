 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{__('back_blade.manage_coupon')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('back_blade.coupon')}}</li>
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
            @if(Session::has('success_message'))
            <div>
              {{Session::get('success_message')}}
            </div>
            @endif
            <div class="card">
              <div class="card-header">
                <h3>{{__('back_blade.view_coupon_add')}}
                  <a class="btn btn-success btn-sm float-right" href="{{route('coupons.index')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;{{__('back_blade.view_coupon_list')}}</a>
                </h3>

                  @if ($errors->any())
                      <br>
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
              </div><!-- /.card-header -->
               <div class="card-body">
                <form  method="post" action="{{route('coupons.update',$coupon->id)}}" class="form-horizontal" id="myForm" enctype="multipart/form-data">
                 @csrf
                      @method('patch')
                  <div class="row">
                   <section class="col-md-6">
                    <div class="card" style="border-top:5px solid #007bff;">
                      <div class="card-header">
                        <h4>Coupon Option & Coupon Types</h4>
                      </div>
                      <div class="card-body ">
                        <div class="row">
                              <!-- form start -->
                               <label for="coupon_type" class="col-md-4">Coupon Option</label>
                              <div class=" form-group col-md-12 d-flex justify-content-between align-items-center">
                                 <span><input type="radio" name="coupon_option" id="automatic_coupon" value="Automatic" <?php if($coupon->coupon_option=='Automatic'){ echo "checked";} ?>>&nbsp;&nbsp;Automatic</span>
                                  <span><input type="radio" name="coupon_option" id="manual_coupon" value="Manual" <?php if($coupon->coupon_option=='Manual'){ echo "checked";} ?>>&nbsp;&nbsp;Manual</span>
                              </div>
                            <div class='form-group col-md-12'style="display:none;" id="couponField">
                            <input type="text" name="coupon_code" id="coupon_code" class="form-control form-control-sm" value="{{$coupon->coupon_code}}">
                            </div>

                             <label for="coupon_type" class="col-md-4">Coupon Type</label>
                            <div class=" form-group col-md-12 d-flex justify-content-between align-items-center">
                                 <span><input type="radio" name="coupon_type"  value="Multiple Times" <?php if($coupon->coupon_type=='Multiple Times'){ echo "checked";} ?>>&nbsp;&nbsp;Multiple Times</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span><input type="radio" name="coupon_type" value="Single Times" <?php if($coupon->coupon_type=='Single Times'){ echo "checked";} ?>>&nbsp;&nbsp;Single Times</span>
                            </div>

                        </div>
                      </div>
                    </div>
                     <div class="card" style="border-top:5px solid #007bff;">
                      <div class='card-header'>
                        <h4>Amount Type & Amount</h4>
                      </div>
                      <div class="card-body">
                    <!-- form start -->
                        <div class="row">
                          <div class="col-md-12">
                            <label for="amount_type" class="col-md-4">Amount Type</label>
                            <div class=" form-group col-md-12 d-flex justify-content-between align-items-center">
                                 <span><input type="radio" name="amount_type"  value="Percentage"  <?php if($coupon->amount_type=='Percentage'){ echo "checked";} ?>>&nbsp;&nbsp;Percentage&nbsp;(in %)&nbsp;</span>
                                  <span><input type="radio" name="amount_type" value="Fixed"  <?php if($coupon->amount_type=='Fixed'){ echo "checked";} ?>>&nbsp;&nbsp;Fixed&nbsp;(in BDT OR USD)&nbsp;</span>
                            </div>
                            <label for="amount_type" class="col-md-4">Amount</label>
                            <div class='form-group col-md-12'>
                            <input type="text" name="amount" id="amount" class="form-control form-control-sm" value="{{$coupon->amount}}" >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                   </section>
                   <section class='content col-md-6'>
                     <div class="card" style="border-top:5px solid #007bff;">
                      <div class="card-header">
                        <h4>Select Sub Categories & Users</h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                              <!-- form start -->
                              <div class=" form-row col-md-12">
                                <label for="$product" class="col-md-4">Product</label>
                                <div class="col-md-8">
                                  <select name="products[]" id="product" class="form-control select2" data-live-search="true" multiple="" required>
                                      @foreach($products as $product)
                                        <option value="{{$product->id}}"   <?php $proarray=explode(",", $coupon->products); foreach($proarray as $psc){ ?>{{($psc== $product->id)?'selected':''}}<?php }?>>{{$product->purchase->product_name}}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div><br/><br/>
                              <div class=" form-row col-md-12">
                                <label for="user" class="col-md-4">User</label>
                                <div class="col-md-8">
                                  <select name="users[]" class="form-control form-control-sm select2" multiple>
                                      @foreach($users as $user)
                                        <option value="{{$user['email']}}" <?php $userarray=explode(",", $coupon->users); foreach($userarray as $usc){ ?>{{($usc== $user['email'])?'selected':''}}<?php }?>>{{$user['email']}}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>
                            <div style="height:96px">
                                <div class="form-check">
  <input class="form-check-input" name="alluser" type="checkbox" value="1" id="flexCheckChecked"   <?php if($coupon->users=="all"){ echo "checked";} ?>>
  <label class="form-check-label" for="flexCheckChecked">
   Select  All User
  </label>
</div>
                            </div>
                      </div>
                    </div>
                  </div>
                  
                     <div class="card" style="border-top:5px solid #007bff;">
                      <div class='card-header'>
                        <h4>Expiry Date</h4>
                      </div>
                      <div class="card-body">
                    <!-- form start -->
                        <input type="text" name="expiry_date"  class="form-control form-control-sm datepicker"  id="expiry_date" value="{{$coupon->expiry_date}}" readonly required>
                      </div>
                    </div>
                        <div class="col-md-10" style="text-align: center">
                          <button type="submit" class="btn btn-primary ">Save</button>
                        </div>
                       </section>
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
 @section('js')
 <script type="text/javascript">
    $('#automatic_coupon').click(function(){
         $('#couponField').hide();
    });

    $('#manual_coupon').click(function(){
         $('#couponField').show();
    });

    //date picker
    $('.datepicker').datepicker({
      uiLibrary: 'bootstrap4',
    });
</script>
 @endsection
