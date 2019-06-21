@extends('admin.layout.index')
@section('title')
    <title>List of attributes</title>
@endsection
@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Attributes
            <small>attributes of all products</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('ad.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Products</a></li>
            <li class="active">Attributes</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of attributes</h3>

                    </div>
                    <div class="form-group box-body">
                        <a href="{{route('ad.attribute.form.get',['id'=>0])}}">
                            <button class="btn btn-default bg-green " data-style="expand-right">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>  Add attribute
                            </button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <table id="tbAtt" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Name</th>
                                <th>Option</th>
                            </tr>
                            </thead>

                            @foreach($attributes as $i => $att)
                            <tr>
                                <td>{{++$i.'.'}}</td>
                                <td>{{$att->name}}</td>
                                <td>

                                    <a href="{{route('ad.attribute.form.post',[$att->id])}}"
                                       class="btn btn-icon bg-light-blue " title="Edit"> <i class="fa fa-pencil"></i></a>
                                    <a href="#"
                                       class="btn btn-icon bg-red " title="Delete"> <i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of attribute values</h3>

                    </div>

                    <div class="form-group box-body">
                        <a href="{{route('ad.attribute.attValueForm.get',['id'=>0])}}">
                            <button class="btn btn-default bg-green " data-style="expand-right">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>  Add value
                            </button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tbAttValue" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Attribute</th>
                                <th>Value</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attValues as $i => $detail)
                                <tr>
                                    <td>{{++$i.'.'}}</td>
                                    <td>{{$detail->attribute->name}}</td>
                                    <td>{{$detail->value}}</td>
                                    <td>

                                        <a href="{{route('ad.attribute.attValueForm.get',[$detail->id])}}"
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
    <script>
        $(function () {
            $('#tbAtt').DataTable( {
                language: {
                    search: '<i class="btn btn-default fa fa-search"></i>',
                    searchPlaceholder: "Search",
                }
            } );
            $('#tbAttValue').DataTable( {
                language: {
                    search: '<i class="btn btn-default fa fa-search"></i>',
                    searchPlaceholder: "Search",
                }
            } );
        })
    </script>
@endsection