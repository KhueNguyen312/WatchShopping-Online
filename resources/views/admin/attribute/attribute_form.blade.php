@extends('admin.layout.index')
@section('title')
    <title>Add Attribute</title>
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
            <li><a href="{{route('ad.attribute.list.get')}}">Attributes</a></li>
            <li class="active">Add Attribute</li>
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
        if (isset($attribute))
            $id = $attribute->id;
        else
            $id = 0;
        ?>
        <div class="row ">
            <!-- left column -->
            <div class="col-md-6 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Add attribute</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route("ad.attribute.form.post",[$id])}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control"
                                       value="{{old('name',isset($attribute)?$attribute->name:"")}}"
                                       placeholder="Enter name">
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
