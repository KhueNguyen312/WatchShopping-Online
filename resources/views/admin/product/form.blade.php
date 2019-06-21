@extends('admin.layout.index')
@section('title')
    <title>Add Product</title>
@endsection
@section('styles')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Products
            <small>Management your Product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('ad.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('ad.product.list.get')}}">Products</a></li>
            <li class="active">Add/update product</li>
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
                        <h3 class="box-title"> Add product</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route("ad.product.form.post",[$id])}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control"
                                       value="{{old('name',isset($product)?$product->name:"")}}"
                                       placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Brand</label>
                                <select class="form-control select2" name="brand_id" style="width: 100%;">
                                    <option value="" selected>--- Choose a brand ---</option>
                                    @foreach ($brands as $detail)
                                        <option value="{{$detail->id}}" @if (old('brand_id',isset($product)?$product->brand_id:"") == $detail->id) selected @endif>{{$detail->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image link</label>
                                <input name="img_link" type="text" class="form-control"
                                       value="{{old('img_link',isset($product)?$product->img_link:"")}}"
                                       placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Image list</label>
                                <textarea name="ïmg_list" class="form-control" rows="3" placeholder="Enter ..."
                                >{{old('img_list',isset($product)?$product->img_list:"")}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input name="price" type="text" class="form-control"
                                       value="{{old('price',isset($product)?$product->price:"")}}"
                                       placeholder="Enter price">
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <input name="discount" type="text" class="form-control"
                                       value="{{old('discount',isset($product)?$product->discount:"")}}"
                                       placeholder="Enter discount">
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input name="stock" type="text" class="form-control"
                                       value="{{old('stock',isset($product)?$product->stock:"")}}"
                                       placeholder="Enter stock">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="des" class="form-control" rows="4" placeholder="Enter ..."
                                >{{old('des',isset($product)?$product->des:"")}}</textarea>
                            </div>
                            <!-- checkbox -->
                            <div class="form-group">
                                <label>
                                    <input name="status" type="checkbox" class="flat-red"
                                           @if ((isset($product)?$product->status:0) == 0) checked @endif
                                           value = "{{old('status',isset($product)?$product->status:0)}}">
                                     Active
                                </label>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts-ori')
    <script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

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
