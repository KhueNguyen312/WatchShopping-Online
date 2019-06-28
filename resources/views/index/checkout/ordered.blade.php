@extends("index.layout.index")
@section('styles')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
@endsection
@section("content")
    <div class=" p-t-40 p-b-40 p-l-75 p-r-75">
        <ul class="timeline">
            <!-- timeline item -->
            <li>
                <!-- timeline icon -->
                <div class="timeline-item">
                    <span class="time" ><i class="fa fa-clock-o"></i></span>

                    <h3 class="timeline-header"><a href="#">Ordered successfully!</a></h3>

                    <div class="timeline-body">
                        Thanks so much for shopping us.
                    </div>

                    <div class="timeline-footer">
                        <a href="{{route('index.home.get')}}" class="btn btn-primary s-text17 btn-sm" style="color: white">Back home</a>
                    </div>
                </div>
            </li>
            <!-- END timeline item -->
        </ul>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var dt = new Date();
        $(".time").text(dt.toLocaleTimeString());
    </script>
@endsection