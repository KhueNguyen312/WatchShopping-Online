@extends('admin.layout.index')
@section('title')
    <title>List of feedback</title>
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
            Feedback
            <small>Management your feedback</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('ad.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Feedback</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of feedback</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tb-feedback" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contact as $i => $detail)
                                <tr>
                                    <td>{{++$i.'.'}}</td>
                                    <td>{{$detail->name}}</td>
                                    <td>{{$detail->email}}</td>
                                    <td>{{$detail->phone}}</td>
                                    <td>{{$detail->message}}</td>
                                    <td>
                                        <input name="status" type="checkbox" {{$detail->status==1?"checked disabled":""}} class="js-switch" data-color="#81c868" onchange="checkStatus(this,{{$detail->id}})"/>
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
            $('#tb-feedback').DataTable( {
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

    <script type="text/javascript">
        function checkStatus(obj, id) {
            if(obj.checked == true){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{route('ad.contact.status')}}",
                    type: "POST",
                    async: true,
                    data: {
//                        "_token": token,
                        "_token": CSRF_TOKEN,
                        "id": id,
                    },
                    success: function (data) {
                        swal("This contact", "is checked sucessfully !", "success");
                        obj.disabled;
                    }
                });
            } else{
                swal("", " Can not change back contact status ", "error");
                obj.checked;
            }
        }
    </script>
@endsection