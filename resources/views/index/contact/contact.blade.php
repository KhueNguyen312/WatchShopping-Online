@extends("index.layout.index")
@section('title')
    <title>Contact</title>
@endsection
@section('styles')
@endsection
@section("content")
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m"
             style="background-image: url('{{asset('/images/product_background.jpg')}}'); background-position: center; ">
        <h2 class="l-text1 t-center" style="color: #1a2226">
            Contact
        </h2>
    </section>

    <!-- content page -->
    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-b-30">
                    <div class="p-r-20 p-r-0-lg">
                        <div class="contact-map size21" id="google_map" data-map-x="10.8782025" data-map-y="106.80402" data-pin="{{asset('index_assets/images/icons/icon-position-map.png')}}" data-scrollwhell="0" data-draggable="1"></div>
                    </div>
                </div>

                <div class="col-md-6 p-b-30">
                    <form id="leave-comment" action="{{route('index.contact.post')}}" method="post">
                        {{ csrf_field() }}
                        <h4 class="m-text26 p-b-36 p-t-15">
                            Send us your message
                        </h4>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone" placeholder="Phone Number">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Address">
                        </div>

                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea>

                        <div class="w-size25">
                            <!-- Button -->
                            <input type="submit" value="send" id="submit" class=" flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                            </input>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <!--===============================================================================================-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
    <script src="{{asset('index_assets/js/map-custom.js')}}"></script>
    <!--===============================================================================================-->
    <script>
        $("#leave-comment").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    swal("Congrats",data,"success").then((value) => {
                        window.location.reload();
                    });
                }
            });


        });
    </script>
@endsection