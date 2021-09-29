@extends('backend.layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('back_blade.manage_product')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('back_blade.product')}}</li>
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
                    <section class=" content col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3>{{__('back_blade.view_product_edit')}}
                                    <a class="btn btn-success btn-sm float-right" href="{{route('product.index')}}"><i
                                            class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;{{__('back_blade.view_product_list')}}
                                    </a>
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
                                <form method="post" action="{{route('product.update',$product->id)}}"
                                      class="form-horizontal" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <section class="col-md-5">
                                            <div class="card" style="border-top:5px solid #007bff;">
                                                <div class="card-header">
                                                    <h4>Categories</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <!-- form start -->
                                                        <div class=" form-group col-md-12">
                                                            <select name="category_id" id="category"
                                                                    class="form-control form-control-sm " required>
                                                                <option value="">Select Category</option>
                                                                @foreach($categories as $category)
                                                                    <option
                                                                        value="{{$category->id}}" {{($product->category_id == $category->id)?'selected':''}}>{{$category->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!--  <div class="form-group new_category col-md-12" style="display:none;">
                                                           <input type="text" name="category_id" id="category_name" class="form-control form-control-sm" placeholder="Enter Category Name"  style="border:2px solid #007bff">
                                                         </div> -->

                                                        <div class="form-group col-md-12">
                                                            <select name="sub_category_id" id="sub_category"
                                                                    class="form-control-sm form-control" required>
                                                                <option value="">Select Sub Category</option>
                                                                @foreach($sub_categories as $sub_category)
                                                                    <option
                                                                        value="{{$sub_category->id}}" {{$product->sub_category_id == $sub_category->id ? 'selected' : ''}}>{{$sub_category->sub_category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card" style="border-top:5px solid #007bff;">
                                                <div class="card-header">
                                                    <h4>Brand</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class='form-group col-md-12'>
                                                        <select name="brand_id" id="brand_id"
                                                                class="form-control form-control-sm" required>
                                                            <option value="">Select Brand</option>
                                                            @foreach($brands as $brand)
                                                                <option
                                                                    value="{{$brand->id}}" {{($product->brand_id == $brand->id)?'selected':''}}>{{$brand->brand_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!--  <div class="form-group new_brand col-md-12" style="display:none;">
                                                         <input type="text" name="brand_id" id="brand_name" class="form-control form-control-sm" placeholder="Enter Brand Name"  style="border:2px solid #007bff">
                                                     </div> -->
                                                </div>
                                            </div>
                                            <div class="card" style="border-top:5px solid #007bff;">
                                                <div class="card-header">
                                                    <h4>Image</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group col-md-12">
                                                        <input type="file" name="image" id="image"
                                                               class="form-control form-control-sm">
                                                        <font style="color:#e60000">
                                                            {{($errors->has('image'))?($errors->first('image')):' '}}
                                                        </font>
                                                    </div>
                                                    <div class="form-group col-md-4" id="show">
                                                        <img id="showImage"
                                                             src="{{(!empty($product->image))?url($product->image):url('public/upload/image_avatar.jpg')}}"
                                                             style="width:150px;height:160px;border:1px solid #000;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card" style="border-top:5px solid #007bff;">
                                                <div class="card-header">
                                                    <h4> Sub Image (Multiple Image)</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group col-md-12">
                                                        <input type="file" name="sub_image[]"
                                                               class="form-control form-control-sm" multiple>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div style="height:32px;"></div>
                                            </div>
                                        </section>
                                        <section class='content col-md-7'>
                                            <div class="card" style="border-top:5px solid #007bff;">
                                                <div class='card-header'>
                                                    <h4>Product Information</h4>
                                                </div>
                                                <div class="card-body">
                                                    <!-- form start -->
                                                    <div class="form-group">
                                                        <div class="form-row">
                                                            <label for="title" class="col-md-3 control-label">Product
                                                                Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="product_name" id="title"
                                                                       class="form-control form-control-sm"
                                                                       value="{{$product->product_name}}" required>
                                                                <font style="color:#e60000">
                                                                    {{($errors->has('product_name'))?($errors->first('product_name')):' '}}
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <div class="form-row">
                                                            <label for="title"
                                                                   class="col-md-3 control-label">Title</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="title" id="title"
                                                                       class="form-control form-control-sm"
                                                                       value="{{$product->title}}" required>
                                                                <font style="color:#e60000">
                                                                    {{($errors->has('title'))?($errors->first('title')):' '}}
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <div class="form-row">
                                                            <label for="slug"
                                                                   class="col-md-3 control-label">Slug</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="slug"
                                                                       class="form-control form-control-sm"
                                                                       value="{{$product->slug}}" required>
                                                                <font style="color:#e60000">
                                                                    {{($errors->has('slug'))?($errors->first('slug')):' '}}
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <div class="form-row">
                                                            <label for="url"
                                                                   class="col-md-3 control-label">Price</label>
                                                            <div class="col-md-5">
                                                                <input type="number" name="price"
                                                                       class="form-control form-control-sm"
                                                                       value="{{$product->price}}" required>
                                                                <font style="color:#e60000">
                                                                    {{($errors->has('price'))?($errors->first('price')):' '}}
                                                                </font>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="number" name="discount"
                                                                       class="form-control form-control-sm" id=""
                                                                       value="{{$product->discount}}">
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <div class="form-row">
                                                            <label for="quantity" class="col-md-3 control-label">Quantity</label>
                                                            <div class="col-md-9">
                                                                <input type="number"
                                                                       class="form-control form-control-sm" name="qty"
                                                                       value="{{$product->qty}}" required>
                                                                <font style="color:#e60000">
                                                                    {{($errors->has('qty'))?($errors->first('qty')):' '}}
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <div class="form-row">
                                                            <label for="details"
                                                                   class="col-md-3 control-label">Details</label>
                                                            <div class="col-md-9">
                                                                <textarea name="details" rows="4"
                                                                          class="form-control form-control-sm"
                                                                          required>{{$product->details}}</textarea>
                                                                <font style="color:#e60000">
                                                                    {{($errors->has('details'))?($errors->first('details')):' '}}
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <br/>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card" style="border-top:5px solid #007bff;">
                                                <div class="card-header">
                                                    <h4>Size</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class='form-group col-md-12'>
                                                            <table class="table responsive">
                                                                <tr>
                                                                    <th>Size</th>
                                                                    <th>Quantity</th>
                                                                </tr>
                                                                @foreach($sizes as $size)
                                                                    <tr>
                                                                        <td>{{ $size->size_name }}</td>
                                                                        <td>
                                                                            <input type="number" name="size_qty_of_{{ Str::slug($size->size_name, '_') }}"
                                                                                   class="form-control form-control-sm"
                                                                                   placeholder="QTY" required value="{{ $size->productSizes()->where('product_id', $product->id)->count() ?? 0 }}">
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10" style="text-align: center">
                                                <button type="submit" class="btn btn-primary">Update</button>
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
                    alert("Form successful submitted!");
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
    <script>
        $(document).on('change', '#category', function () {
            var category_id = $(this).val();
            if (category_id == '0') {
                $('.new_category').show();
            } else {
                $('.new_category').hide();
            }

        });

        $(document).on('change', '#brand_id', function () {
            var brand_id = $(this).val();
            if (brand_id == '0') {
                $('.new_brand').show();
            } else {
                $('.new_brand').hide();
            }

        });


        $(document).on('click', '#image', function () {

            $('#show').show();

        });

        // Get sub Sub category by Sub Category
        $("#sub_category").on('change', function () {
            var sub_category = $("#sub_category").val();

        });

        $(document).on('change', '#category', function () {
            var category_id = $(this).val();
            console.log(category_id);
            $.ajax({
                url: "{{route('get-sub-category')}}",
                dataType: 'json',
                type: "GET",
                data: {category_id: category_id},
                success: function (data) {
                    var html = '';
                    $.each(data, function (key, v) {
                        html += '<option value = "' + v.id + '">' + v.sub_category_name + '</option>';

                    });
                    $('#sub_category').html(html);
                }

            });

        });

    </script>
@endsection
