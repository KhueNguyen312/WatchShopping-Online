@extends('admin.layout.index')
@section('title')
    <title>Product detail</title>

@endsection
@section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
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
            <li><a href="{{route('ad.product.list.get')}}">Products</a></li>
            <li class="active">Product detail</li>
        </ol>
    </section>

    @if (count($errors) > 0 || session('error'))
        <div class="alert alert-danger" role="alert">
            <strong>Warning!</strong><br>
            @foreach($errors->all() as $err)
                {{$err}}<br/>
            @endforeach
            {{session('error')}}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            <strong>Success!</strong>
            <button type="button" class="close" data-dismiss="alert">×</button>
            <br/>
            {{session('success')}}
        </div>
    @endif

    <section class="content ">
        <?php
        if (isset($product))
            $id = $product->id;
        else
            $id = 0;
        ?>
        <div class="row ">
            <!-- left column -->
            <div class="col-md-6 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Add new attribute</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route("ad.product.detailForm.post",[$id])}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label>Attribute</label>
                                <select class="form-control select2" id="ätt" name="att" style="width: 100%;">
                                    <option value="" selected>--- Choose an attribute ---</option>
                                    @foreach ($attributes as $detail)
                                        <option value="{{$detail->id}}">{{$detail->name}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label>Value</label>
                                <select class="form-control select2" id="att_value" name="att_value" style="width: 100%;">
                                    <option value="" selected>--- Choose a value ---</option>
                                    {{--@foreach ($attValues as $d)--}}
                                        {{--<option value="{{$d->id}}">{{$d->value}}</option>--}}
                                    {{--@endforeach--}}
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="col-md-6 ">
            <!-- Table -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{$product->name}} detail</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tb_PDetail" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width: 10px">#.</th>
                            <th>Attribute</th>
                            <th>Value</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productDetail as $i => $detail)
                            <tr id="row{{ $detail->id }}">
                                <td>{{++$i.'.'}}</td>
                                <td>{{$detail->attribute_value->attribute->name}}</td>
                                <td>{{$detail->attribute_value->value}}</td>
                                <td>
                                    <button
                                       class="btn btn-icon bg-red delete-model " value="{{ $detail->id }}" title="Delete"> <i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            </div>

        </div>
    </section>
@endsection
@section('scripts-ori')
    <!-- DataTables -->
    <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/jquery.confirm.min.js')}}"></script>
    <script src="{{asset('js/jquery.confirm.js')}}"></script>
    <script>
        $(function () {
            $('#tb_PDetail').DataTable()
            //Initialize Select2 Elements
            $('.select2').select2()

        })

        $('.table').on("click", '.delete-model', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     // SET TOKEN BEFORE DELETE
                }
            });
            var id = $(this).val();
            // var deleteUrl = url + '/' + id;
            $.confirm({
                title: 'Confirm!',
                icon: 'fa fa-spinner fa-spin',
                content: 'Are you sure you want to delete this record?',
                confirmButtonClass: 'btn-danger',
                cancelButtonClass: 'btn-info',
                theme: 'black',
                autoClose: 'cancel|30000',
                animation: 'RotateY',
                closeAnimation: 'scale',
                confirmButton: 'YES',
                cancelButton: 'NO',
                confirm: function(){
                    $.ajax({
                        type: "DELETE",
                        url: '{{route("ad.deleteAtt",[''])}}'+"/"+id,
                        dataType: "JSON",
                        success: function (data) {
                            console.log(data);
                            $("#row" + id).remove();
                        },
                        error: function (data) {
                            console. log('Error:', data.responseText);
                        }
                    });
                },
                cancel: function(){
                }
            });

        });

        $('#ätt').on('change', function() {
            $('#att_value').empty()
            var id = $('#ätt').val();
            $.ajax({
                url: '{{route("ad.loadAtt",[''])}}'+"/"+id,
                type: "GET",
                dataType: "json",
                success: data => {
                    data.attValue.forEach(att =>
                        $('#att_value').append(`<option value="${att.id}">${att.value}</option>`)
                    )
                }
            })
        })
    </script>
@endsection
