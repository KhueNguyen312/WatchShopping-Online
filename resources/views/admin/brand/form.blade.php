@extends('admin.layout.index')
@section('title')
    <title>Add Brand</title>
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
            <li><a href="{{route('ad.brand.list.get')}}">Brands</a></li>
            <li class="active">Add/update brand</li>
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
        if (isset($brand))
            $id = $brand->id;
        else
            $id = 0;
        ?>
        <div class="row ">
            <!-- left column -->
            <div class="col-md-6 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Add brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route("ad.brand.form.post",[$id])}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control"
                                       value="{{old('name',isset($brand)?$brand->name:"")}}"
                                       placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Image link</label>
                                <input name="img_link" type="text" class="form-control"
                                       value="{{old('img_link',isset($brand)?$brand->img_link:"")}}"
                                       placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Image list</label>
                                <textarea name="img_list" class="form-control" rows="3" placeholder="Enter ..."
                                          >{{old('img_list',isset($brand)?$brand->img_list:"")}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="des" class="form-control" rows="4" placeholder="Enter ..."
                                          >{{old('des',isset($brand)?$brand->des:"")}}</textarea>
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
