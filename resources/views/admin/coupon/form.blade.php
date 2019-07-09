@extends('admin.layout.index')
@section('title')
    <title>Add Coupon</title>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Coupons
            <small>Management your coupons</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('ad.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('ad.coupon.list.get')}}">Coupons</a></li>
            <li class="active">Add/update coupon</li>
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
        if (isset($coupon))
            $id = $coupon->id;
        else
            $id = 0;
        ?>
        <div class="row ">
            <!-- left column -->
            <div class="col-md-6 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Add coupon</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route("ad.coupon.form.post",[$id])}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control select2" name="type" style="width: 100%;">
                                    <option value="" selected>--- Choose an attribute ---</option>
                                    <option value="0" @if (old('type',isset($coupon)?$coupon->type:"") == 0) selected @endif>Percent</option>
                                    <option value="1" @if (old('type',isset($coupon)?$coupon->type:"") == 1) selected @endif>Fix cost</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Value</label>
                                <input name="value" type="text" class="form-control"
                                       value="{{old('value',isset($coupon)?$coupon->value:"")}}"
                                       placeholder="Enter value">
                            </div>
                            <div class="form-group">
                                <label>Start date</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="startdate" type="text" value="{{old('startdate',isset($coupon)?$coupon->startdate:"")}}"
                                           class="form-control pull-right" id="datepicker1">
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>End date</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="enddate" type="text" value="{{old('enddate',isset($coupon)?$coupon->enddate:"")}}"
                                           class="form-control pull-right" id="datepicker2">
                                </div>
                                <!-- /.input group -->
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

    <script type="text/javascript">
        $('#datepicker1').datepicker({ format: 'yyyy-mm-dd' })

        $('#datepicker2').datepicker({ format: 'yyyy-mm-dd' })
    </script>
@endsection

