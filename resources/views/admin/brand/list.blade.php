@extends('admin.layout.index')
@section('title')
    <title>List of brand</title>
@endsection
@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Brands
            <small>Management your brands</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('ad.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Products</a></li>
            <li class="active">Brands</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of brands</h3>

                    </div>
                    <div class="form-group box-body">
                        <a href="{{route('ad.brand.form.get',['id'=>0])}}">
                            <button class="btn btn-default bg-green " data-style="expand-right">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>  Add brand
                            </button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="brand_table" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Image List</th>
                                <th>Description</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $i => $brand)
                                <tr>
                                    <td>{{++$i.'.'}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>
                                        <img width="100px" src="{{$brand->img_link}}" class="img-rounded img-thumbnail img-responsive">
                                    </td>
                                    <td>{{$brand->img_list}}</td>
                                    <td>{{$brand->des}}</td>
                                    <td>

                                        <a href="{{route('ad.brand.form.get',[$brand->id])}}"
                                           class="btn btn-icon bg-light-blue " title="Edit"> <i class="fa fa-pencil"></i></a>
                                        <br></br>
                                        {{--<a href="#"--}}
                                           {{--class="btn btn-icon bg-red " title="Delete"> <i class="fa fa-trash-o"></i></a>--}}
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
            $('#brand_table').DataTable( {
                columnDefs: [ {
                    targets: 4,
                    render: function ( data, type, row ) {
                        return type === 'display' && data.length > 250 ?
                            data.substr( 0, 250 ) +'…' :
                            data;
                    }
                } ],
                language: {
                    search: '<i class="btn btn-default fa fa-search"></i>',
                    searchPlaceholder: "Search",
                }
            } );
        })
    </script>
@endsection