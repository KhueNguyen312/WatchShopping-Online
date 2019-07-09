@extends("index.layout.index")
@section('title')
    <title>Register</title>
@endsection
@section('styles')
@endsection
@section("content")
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m"
             style="background-image: url('{{asset('/images/product_background.jpg')}}'); background-position: center; ">
        <h2 class="l-text1 t-center" style="color: #1a2226">
            Register
        </h2>
    </section>

    <section class="bgwhite p-t-40 p-b-40 p-l-75 p-r-75">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="pos-relative">
                        <img class="img-fluid" src="{{asset('\images\login.jpg')}}" alt="Alt">
                        <div class="sizefull ab-t-l flex-col-c-m">
                            <h4 class="m-text4 t-center w-size3 p-b-8" style="color: white">
                                Sign up & get 20% off
                            </h4>

                            <p class="t-center w-size18" style="color: floralwhite">
                                Be the frist to know about the latest watch news and get exclu-sive offers
                            </p>
                            <div class="w-size2 p-t-25">
                                <!-- Button -->
                                <a href="{{route('index.login.get')}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 bo9 flex-sb bgwhite" >
                    <div class="m-b-20">
                        <h3 class="m-text20 text-center p-b-24 p-t-24">Register</h3>
                        <form class="row m-b-20" action="#" method="post" id="contactForm">
                            {{ csrf_field() }}
                            <label for="fname"><i class="fa fa-user m-l-100"></i> Name</label>
                            <div class="size1 bo4 m-l-100 m-r-100 ">
                                <input id="fname" name="name" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                       placeholder="Name">
                            </div>

                            <label for="mail"><i class="fa fa-mail-reply m-t-20 m-l-100"></i> Email</label>
                            <div class="size1 bo4 m-l-100 m-r-100 ">
                                <input id="mail" name="mail" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                       placeholder="Email">
                            </div>

                            <label for="password"><i class="fa fa-lock m-t-20 m-l-100"></i> Password</label>
                            <div class="size1 bo4 m-l-100 m-r-100 ">
                                <input id="password" name="password" class="sizefull s-text7 p-l-22 p-r-22" type="password"
                                       placeholder="Password">
                            </div>

                            <label for="cpassword"><i class="fa fa-lock m-t-20 m-l-100"></i> Confirm Password</label>
                            <div class="size1 bo4 m-l-100 m-r-100 ">
                                <input id="cpassword" name="cpassword" class="sizefull s-text7 p-l-22 p-r-22" type="password"
                                       placeholder="Confirm Password">
                            </div>

                            <label for="address"><i class="fa fa-address-card-o m-t-20 m-l-100"></i> Address</label>
                            <div class="size1 bo4 m-l-100 m-r-100 ">
                                <input id="address" name="address" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                       placeholder="Address">
                            </div>

                            <label for="phone"><i class="fa fa-phone m-t-20 m-l-100"></i> Phone</label>
                            <div class="size1 bo4 m-l-100 m-r-100 ">
                                <input id="phone" name="phone" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                       placeholder="Phone">
                            </div>

                            <label class=" m-l-100 s-text13">
                                <input type="checkbox" class="m-t-20 icheckbox_flat-green " checked="checked">
                                Keep me logged in
                            </label>

                            <div class="size15 m-l-100 m-r-100 trans-0-4">
                                <!-- Button -->
                                <input type="submit" value="Register"
                                       class="submit_btn button flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')

@endsection