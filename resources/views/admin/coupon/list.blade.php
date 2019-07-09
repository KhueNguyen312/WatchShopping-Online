@extends('admin.layout.index')
@section('title')
    <title>List of Coupon</title>
@endsection
@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Checkbox-Type -->
    <link href="{{asset('plugins/switchery/css/switchery.min.css')}}" rel="stylesheet"/>

    <link rel="stylesheet" href="{{asset('plugins/switchery-master/dist/switchery.css')}}"/>
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Coupon
            <small>Management your coupons</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('ad.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Coupon</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of coupons</h3>

                    </div>
                    <div class="form-group box-body">
                        <a href="{{route('ad.coupon.form.get',['id'=>0])}}">
                            <button class="btn btn-default bg-green " data-style="expand-right">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>  Add coupon
                            </button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tb-Coupon" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Value</th>
                                <th>start date</th>
                                <th>end date</th>
                                <th>status</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $i => $detail)
                                <tr>
                                    <td>{{++$i.'.'}}</td>
                                    <td>{{$detail->code}}</td>
                                    @if($detail->type == 1)
                                        <td>Fix cost</td>
                                    @else
                                        <td>Percent</td>
                                    @endif
                                    <td>{{$detail->value}}</td>
                                    <td>{{$detail->startdate}}</td>
                                    <td>{{$detail->enddate}}</td>
                                    @if($detail->status == 1)
                                        <td>Used</td>
                                    @else
                                        <td>Available</td>
                                    @endif
                                    <td>
                                        <a href="{{route('ad.coupon.form.get',[$detail->id])}}"
                                           class="btn btn-icon bg-light-blue " title="Edit"> <i class="fa fa-pencil"></i></a>

                                        <a href="#"
                                           class="btn btn-icon bg-red " title="Delete"> <i class="fa fa-trash-o"></i></a>
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

    <script src="{{asset('plugins/switchery-master/dist/switchery.js')}}"></script>
    <script>
        $(function () {
            $('#tb-Coupon').DataTable( {
                language: {
                    search: '<i class="btn btn-default fa fa-search"></i>',
                    searchPlaceholder: "Search",
                }
            } );
        })
    </script>
    <script type="text/javascript">
        // var elem = document.querySelectorAll('.js-switch');
        // var init = new Switchery(elem,{ size: 'small' });
        if (Array.prototype.forEach) {
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            elems.forEach(function(html) {
                var switchery = new Switchery(html,{ size: 'small' });
            });
        } else {
            var elems = document.querySelectorAll('.js-switch');

            for (var i = 0; i < elems.length; i++) {
                var switchery = new Switchery(elems[i],{ size: 'small' });
            }
        }
    </script>
@endsection