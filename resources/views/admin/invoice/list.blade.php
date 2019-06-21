@extends('admin.layout.index')
@section('title')
    <title>List of Invoices</title>
@endsection
@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Checkbox-Type -->
    <link href="{{asset('plugins/switchery/css/switchery.min.css')}}" rel="stylesheet"/>
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Invoices
            <small>Management your invoices</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('ad.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Invoices</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of invoices</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tbInvoice" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Customer</th>
                                <th>Order date</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $i => $invoice)
                                <tr>
                                    <td>{{++$i.'.'}}</td>
                                    <td>{{$invoice->customer->name}}</td>
                                    <td>{{$invoice->order_date}}</td>
                                    <td>{{$invoice->total}}</td>
                                    <td>
                                        <input name="status" type="checkbox" {{$invoice->status==0?"checked disabled":""}} class="flat-red" data-color="#81c868" onchange="checkStatus(this,{{$invoice->id}})"/>
                                    </td>
                                    <td>
                                        <a href="{{route('ad.invoice.detail.get',[$invoice->id])}}"
                                           class="btn btn-icon bg-purple " title="More detail"> <i class="fa fa-gear"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

@endsection

@section('scripts-ori')
    <!-- DataTables -->
    <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/switchery/js/switchery.min.js')}}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(function () {
            $('#tbInvoice').DataTable( {
                language: {
                    search: '<i class="btn btn-default fa fa-search"></i>',
                    searchPlaceholder: "Search",
                }
            } );

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass   : 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            })
        })
    </script>
@endsection