@extends('admin.layout.index')
@section('title')
    <title>Sale Report</title>
@endsection
@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Report
            <small>Management report</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('ad.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Report</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Sale Report</h3>

                    </div>
                    <div class="form-group box-body">
                        <label>Date range:</label>

                        <div class="input-group" style="width: 300px">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="reservation">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="report_table" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Discount</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody id="result">
                            </tbody>
                            <tfoot id="result2">
                            <tr>
                                <th>Total</th>
                                <th>#</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="row">
                        <div class="col-xs-6"></div>
                        <div class="col-xs-6">
                            <div class="table-responsive">

                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Discount on invoice</th>
                                        <td id="dis">-$0</td>
                                    </tr>
                                    <tr>
                                        <th>Total revenue</th>
                                        <td id="reveneu">$0</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row no-print" style="padding-bottom: 10px;padding-left: 10px;padding-right: 10px">
                        <div class="col-xs-12">
                            <button onclick="window.print()" class="print btn pull-right btn-default"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </div>
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
    <script>
        $(function () {

            //Date range picker
            $('#reservation').daterangepicker(
                {locale: {
                        format: 'YYYY-MM-DD'
                    }}
                )
        })
        $('#reservation').on('apply.daterangepicker', function(ev, picker) {
            var start = $('#reservation').data('daterangepicker').startDate.format('YYYY-MM-DD');
            var end = $('#reservation').data('daterangepicker').endDate.format('YYYY-MM-DD');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('ad.report.load')}}",
                type: "get",
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN, start:start,end:end, },
                success: function (response) {
                    //alert(response[0]);
                    $('#result').html(response[0]);
                    $('#result2').html(response[1]);
                    $('#dis').text("-$"+response[3]);
                    $('#reveneu').text("$"+response[2]);
                    //window.location.reload();
                },
                error: function(xhr, textStatus, error){
                    alert(error + "\r\n" + xhr.responseText);
                },
            });
        });
    </script>
@endsection