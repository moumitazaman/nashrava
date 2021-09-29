@extends('backend.layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('back_blade.manage_customer')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('back_blade.customer')}}</li>
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
                                <h3>Local customer due list</h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-sm table-bordered table-hover" style="color:#00004d">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Customer Name</th>
                                        <th>Mobile No</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Paid</th>
                                        <th>Due</th>
                                        <th>Discount</th>
                                        <th>Vat</th>
                                        <th>Invoice</th>
                                    </tr>
                                    </thead>
                                    <tbody style="color: #4d0026">
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $payment->customer->customer_name ?? '' }}</td>
                                            <td>{{ $payment->customer->mobile_no ?? '' }}</td>
                                            <td>{{ $payment->customer->email ?? '' }}</td>
                                            <td>{{ $payment->customer->address ?? '' }}</td>
                                            <td>{{ $payment->paid_amount ?? '' }}</td>
                                            <td>{{ $payment->due_amount ?? '' }}</td>
                                            <td>{{ $payment->discount_amount ?? '' }}</td>
                                            <td>{{ $payment->vat ?? '' }}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm float-right" href="{{route('invoice.print',$payment->invoice_id)}}" target="_blank"><i class="fa fa-print"></i></a>
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
