@extends('admin.layout.index')
@section('title')
    <title>List of Products</title>
@endsection

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Products
            <small>Management your products</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('ad.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of products</h3>

                    </div>
                    <div class="form-group box-body">
                        <a href="{{route('ad.product.form.get',['id'=>0])}}">
                            <button class="btn btn-default bg-green " data-style="expand-right">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>  Add product
                            </button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="productTable" class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>

                                <th style="width: 10px"># </th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Image link</th>
                                <th>Image list</th>
                                <th>View</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $i => $product)
                                <tr>
                                    <td>{{++$i.'.'}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->brand->name}}</td>
                                    <td>
                                        <img width="100px" src="{{$product->img_link}}" class="img-rounded img-thumbnail img-responsive">
                                    </td>
                                    <td>{{$product->img_list}}</td>
                                    <td>{{$product->view}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->discount}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>{{$product->des}}</td>
                                    <td>@if ($product->status == 0) Active @else Inactive @endif</td>
                                    <td>

                                        <a href="{{route('ad.product.form.get',[$product->id])}}"
                                           class="btn btn-icon bg-light-blue " title="Edit"> <i class="fa fa-pencil"></i></a>
                                        <br></br>
                                        <a href="{{route('ad.product.detailForm.get',[$product->id])}}"
                                           class="btn btn-icon bg-purple " title="More detail"> <i class="fa fa-gear"></i></a>
                                        <br></br>
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
            $('#productTable').DataTable( {
                columnDefs: [ {
                    targets: 9,
                    render: function ( data, type, row ) {
                        return type === 'display' && data.length > 100 ?
                            data.substr( 0, 100 ) +'…' :
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