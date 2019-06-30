@extends("index.layout.index")
@section('title')
    <title>Check out</title>
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/checkout.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@endsection
@section("content")
    <!-- Product Detail -->
    <section class="bgwhite p-t-40 p-b-40 p-l-75 p-r-75">
        <div class="row">
            <div class="col-50 bo9 flex-sb bgwhite">
                <div class="container m-b-30">
                    <form id="ordered" action="{{route('index.checkout.ordered')}}" method="post">
                        {{ csrf_field() }}
                        <div class=" m-l-r-auto m-t-30">
                            <h3 class="m-text20 p-b-24">Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <span id="error_name" class="error">This field is required</span>
                            <div class="size1 bo4 m-r-10 ">
                                <input id="fname" name="name" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                       placeholder="John M. Doe">
                            </div>
                            <label for="email"><i class="fa fa-envelope m-t-20"></i> Email</label>
                            <span id="error_email" class="error">A valid email address is required</span>
                            <div class="size1 bo4 m-r-10">
                                <input id="email" name="email" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                       placeholder="john@example.com">
                            </div>
                            <label for="adr"><i class="fa fa-address-card-o m-t-20"></i> Address</label>
                            <span id="error_address" class="error">A valid address is required</span>
                            <div class="size1 bo4 m-r-10 ">
                                <input id="adr" name="address" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                       placeholder="542 W. 15th Street">
                            </div>
                            <label for="city"><i class="fa fa-institution m-t-20"></i> City</label>
                            <span id="error_city" class="error">This field is required</span>
                            <div class="size1 bo4 m-r-10">
                                <input id="city" name="city" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                       placeholder="New York">
                            </div>

                            <div class="row">
                                <div class="col-50">
                                    <label class="m-t-20" for="state">Country</label>
                                    <span id="error_country" class="error">This field is required</span>
                                    <div class="size1 bo4 m-r-10">
                                        <input id="country" name="country" class="sizefull s-text7 p-l-22 p-r-22"
                                               type="text"
                                               placeholder="United States">
                                    </div>
                                </div>
                                <div class="col-50">
                                    <label class="m-t-20" for="phone">Phone</label>
                                    <span id="error_phone" class="error">A valid phone is required</span>
                                    <div class="size1 bo4 m-r-10">
                                        <input id="phone" name="phone" class="sizefull s-text7 p-l-22 p-r-22"
                                               type="text"
                                               placeholder="036871654">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label class="m-t-20 s-text13">
                            <input type="checkbox" class="m-t-20 icheckbox_flat-green " checked="checked"
                                   > Shipping address
                            same as billing
                        </label>
                        <div class="size15 trans-0-4">
                            <!-- Button -->
                            <input type="submit" value="Continue to checkout"
                                   class="submit_btn button flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-5"></div>
            <div class="col-45 flex-sb bgwhite bo9" style="height: 80%">
                <div class="container m-b-30 m-t-30 ">
                    <h4 class=" m-text20">Cart <span class="price m-text20" style="color:black"><i
                                    class="fa fa-shopping-cart"></i> <b>@if(session('cart')) {{count(session('cart'))}} @else
                                    0 @endif</b></span>
                    </h4>
                    <?php $total = 0; $count = 0 ?>
                    <ul class="header-cart-wrapitem">
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <?php $total += $details['price'] * $details['quantity'];$count++; ?>
                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="{{$details['img_link']}}" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="{{route('index.productDetail.get',[$details['id']])}}"
                                           class="header-cart-item-name">
                                            {{$details['name']}}
                                        </a>

                                        <span class="header-cart-item-info">
											{{$details['quantity']}} x $ {{$details['price']}}
										</span>
                                    </div>
                                </li>
                            @endforeach
                        @endif

                    </ul>
                    <hr>
                    <p class="m-text19">Total: <span class="price m-text19"><b class="total">${{$total}}</b></span></p>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script>
        $(function () {
            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })
        })
    </script>
    <script type="text/javascript">
        $("form").submit(function (e) {
            if ($('.total').text() == "$0") {
                e.preventDefault();
                swal("Your cart is empty", "You must add products to cart before checking out !", "warning");
                return false;
            }else{
                var form_data = $("#ordered").serializeArray();
                var error_free = true;
                for (var input in form_data) {
                    var element = $("[name='"+form_data[input]['name']+"']");
                    if(element!=null && form_data[input]['name'] != "_token" ){
                        var valid = element.parent().hasClass("bo4");
                    }
                    var error_element = $("#error_"+form_data[input]['name']);
                    if (!valid && form_data[input]['name'] != "_token") {
                        error_free = false;
                        if(error_element != null){
                            error_element.removeClass("error").addClass("error_show");
                        }
                    }
                    else {
                        error_element.removeClass("error_show").addClass("error");
                    }
                }
                if (!error_free) {
                    e.preventDefault();
                    return false;
                }
            }
        })
        $(document).ready(function () {

            if($('#fname').val()){
                $('#fname').parent().removeClass("invalid").addClass("bo4");
            }
            else {
                $('#fname').parent().removeClass("bo4").addClass("invalid");
            }
            // Name can't be blank
            $('#fname').on('input', function () {
                var input = $(this);
                var is_name = input.val();
                if (is_name) {
                    input.parent().removeClass("invalid").addClass("bo4");
                }
                else {
                    input.parent().removeClass("bo4").addClass("invalid");
                }
            });
            // Email must be an email
            $('#email').on('input', function () {
                var input = $(this);
                var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                var is_email = re.test(input.val());
                if (is_email) {
                    input.parent().removeClass("invalid").addClass("bo4");
                }
                else {
                    input.parent().removeClass("bo4").addClass("invalid");
                }
            });
            if($('#email').val()){
                $('#email').parent().removeClass("invalid").addClass("bo4");
            }
            else {
                $('#email').parent().removeClass("bo4").addClass("invalid");
            }
            // Address can't be blank
            $('#adr').on('input', function () {
                var input = $(this);
                var is_name = input.val();
                if (is_name) {
                    input.parent().removeClass("invalid").addClass("bo4");
                }
                else {
                    input.parent().removeClass("bo4").addClass("invalid");
                }
            });
            if($('#adr').val()){
                $('#adr').parent().removeClass("invalid").addClass("bo4");
            }
            else {
                $('#adr').parent().removeClass("bo4").addClass("invalid");
            }
            // City can't be blank
            $('#city').on('input', function () {
                var input = $(this);
                var is_name = input.val();
                if (is_name) {
                    input.parent().removeClass("invalid").addClass("bo4");
                }
                else {
                    input.parent().removeClass("bo4").addClass("invalid");
                }
            });
            if($('#city').val()){
                $('#city').parent().removeClass("invalid").addClass("bo4");
            }
            else {
                $('#city').parent().removeClass("bo4").addClass("invalid");
            }
            // Country can't be blank
            $('#country').on('input', function () {
                var input = $(this);
                var is_name = input.val();
                if (is_name) {
                    input.parent().removeClass("invalid").addClass("bo4");
                }
                else {
                    input.parent().removeClass("bo4").addClass("invalid");
                }
            });
            if($('#country').val()){
                $('#country').parent().removeClass("invalid").addClass("bo4");
            }
            else {
                $('#country').parent().removeClass("bo4").addClass("invalid");
            }
            // Phone can't be blank
            $('#phone').on('input', function () {
                var input = $(this);
                var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
                var is_phone = numberRegex.test(input.val());
                if (is_phone) {
                    input.parent().removeClass("invalid").addClass("bo4");
                }
                else {
                    input.parent().removeClass("bo4").addClass("invalid");
                }
            });
            if($('#phone').val()){
                $('#phone').parent().removeClass("invalid").addClass("bo4");
            }
            else {
                $('#phone').parent().removeClass("bo4").addClass("invalid");
            }
        });

    </script>
@endsection