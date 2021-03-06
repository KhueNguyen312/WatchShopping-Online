@extends("index.layout.index")
@section('title')
    <title>Brand</title>
@endsection
@section('styles')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pagination.css')}}">
@endsection
@section("content")
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url('{{asset('/images/product_background.jpg')}}'); background-position: center; ">
        <h2 class="l-text1 t-center" style="color: #1a2226">
            Brands
        </h2>
    </section>

    <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
        <a href="{{route('index.home.get')}}" class="s-text16">
            Home
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>
        <a href="{{route('index.watches.get')}}" class="s-text16">
            Watches
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <span class="s-text17">
			{{$brand[0]->name}}
		</span>
    </div>
    <!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <!--  -->
                        <h4 class="m-text14 p-b-7">
                            Categories
                        </h4>
                        <ul class="p-b-54 sidebar-menu" data-widget="tree">
                            <div class="wrap-dropdown-content bo7 p-t-15 p-b-14 active-dropdown-content">
                                <span class="s-text13 js-toggle-dropdown-content flex-sb-m cs-pointer color0-hov trans-0-4">
                                    Gender
                                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                                </span>

                                <div class="dropdown-content dis-none p-t-15 p-b-23">
                                    @foreach($genders as $detail)
                                        <li><a>
                                                <label class="s-text10 active1">
                                                    <input name="att[]" type="checkbox" class="icheckbox_minimal-blue "
                                                           value = "{{$detail->id}}">
                                                    {{$detail->value}}</label>
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                            </div>

                            <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                                <span class="s-text13 js-toggle-dropdown-content flex-sb-m cs-pointer color0-hov trans-0-4">
                                    Movement Type
                                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                                </span>

                                <div class="dropdown-content dis-none p-t-15 p-b-23">
                                    @foreach($movements as $detail)
                                        <li><a>
                                                <label class="s-text10 active1">
                                                    <input name="mType[]" type="checkbox" class="icheckbox_minimal-blue "
                                                           value = "{{$detail->id}}">
                                                    {{$detail->value}}</label>
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                            </div>

                            <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                                <span class="s-text13 js-toggle-dropdown-content flex-sb-m cs-pointer color0-hov trans-0-4">
                                    Strap Type
                                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                                </span>

                                <div class="dropdown-content dis-none p-t-15 p-b-23">
                                    @foreach($strap as $detail)
                                        <li><a>
                                                <label class="s-text10 active1">
                                                    <input name="sType[]" type="checkbox" class="icheckbox_minimal-blue "
                                                           value = "{{$detail->id}}">
                                                    {{$detail->value}}</label>
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                            </div>
                        </ul>


                        <div class="filter-price p-t-22 p-b-50 ">
                        </div>


                        <div class="search-product pos-relative bo4 of-hidden">
                            <input class="live-search s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

                            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <!--Introduce brand -->
                    <div class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url('{{$brand[0]->img_list}}'); background-position: center; ">

                    </div>
                    <h4 name="{{$brand[0]->id}}" class="brand-name m-text14 p-t-7 p-b-7">
                        {{$brand[0]->name}}
                    </h4>
                    <p class="s-text8 p-t-7 p-b-7">
                        {{$brand[0]->des}}
                    </p>

                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">
                        <div class="flex-w">
                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <select id="price-sort" class="selection-2" name="sorting">
                                    <option value="-1" >Price</option>
                                    <option value="0" >$0.00 - $1000.00</option>
                                    <option value="1000">$1000 - $2500.00</option>
                                    <option value="2500">$2500.00 - $5000.00</option>
                                    <option value="5000">$5000.00+</option>

                                </select>
                            </div>

                        </div>

                        <span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of {{count($products)}} results
						</span>
                    </div>

                    <!-- Product -->
                    <div class="row filter-result">
                        @foreach($products as $detail)
                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                <!-- Block2 -->
                                <div class="block2">
                                    @if($detail->discount > 0)
                                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale ">
                                            @else
                                                <div class="block2-img wrap-pic-w of-hidden pos-relative ">
                                                    @endif
                                        <img class="responsive-image img-thumbnail "  src="{{$detail->img_link}}" alt="IMG-PRODUCT">
                                        <!-- use for live search -->
                                        <span style="display: none">{{$detail->name}} ${{$detail->price}}</span>

                                        <div class="block2-overlay trans-0-4">
                                            <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                            </a>

                                            <div class=" block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
                                                <button data-for="{{$detail->id}}" class="btn-addcart flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block2-txt p-t-20">

                                        <a href="{{route('index.productDetail.get',[$detail->id])}}" class="block2-name dis-block s-text3 p-b-5">
                                            {{$detail->name}}
                                        </a>


                                        @if($detail->discount > 0)
                                            <span class="block2-oldprice m-text7 p-r-5">
										${{$detail->price}}
									    </span>

                                            <span class="block2-newprice m-text8 p-r-5">
										${{$detail->price * (1-$detail->discount)}}
									    </span>
                                        @else
                                            <span class="block2-price m-text6 p-r-5">
										${{$detail->price}}
									    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div id="tab"></div>
                </div>
            </div>
        </div>
        <!-- Container Selection -->
        <div id="dropDownSelect2"></div>
    </section>
@endsection
@section('scripts')
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <script type="text/javascript">
        /*[ No ui ]
        ===========================================================*/
        var filterBar = document.getElementById('filter-bar');

        noUiSlider.create(filterBar, {
            start: [ 50, 200 ],
            connect: true,
            range: {
                'min': 50,
                'max': 200
            }
        });

        var skipValues = [
            document.getElementById('value-lower'),
            document.getElementById('value-upper')
        ];

        filterBar.noUiSlider.on('update', function( values, handle ) {
            skipValues[handle].innerHTML = Math.round(values[handle]) ;
        });
    </script>
    <!-- iCheck 1.0.1 -->
    <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(function () {
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
    <script>
        $(document).ready(function () {

            var brands = [];
            var gender = [];
            var material = [];
            var strap = [];
            // Listen for 'change' event, so this triggers when the user clicks on the checkboxes labels
            $('input[name="cat[]"],input[name="att[]"],input[name="mType[]"],input[name="sType[]"]' ).on('change', function (e) {

                e.preventDefault();
                brands = []; // reset
                gender = [];
                material = [];
                strap=[];

                $('input[name="cat[]"]:checked').each(function()
                {
                    brands.push($(this).val());

                });
                $('input[name="att[]"]:checked').each(function()
                {
                    gender.push($(this).val());
                });
                $('input[name="mType[]"]:checked').each(function()
                {
                    material.push($(this).val());
                });
                $('input[name="sType[]"]:checked').each(function()
                {
                    strap.push($(this).val());
                });
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var brand_id = $('.brand-name').attr("name");
                $.ajax({
                    url: "{{route('getfilter')}}",
                    type: "POST",
                    data: {
                        "_token": CSRF_TOKEN,
                        "brands": brands,
                        "gender":gender,
                        "material": material,
                        "strap": strap,
                        "page_type": "brand",
                        "id":brand_id
                    },
                    error: function(xhr, textStatus, error){
                        alert(error + "\r\n" + xhr.responseText);
                        console.log(brands);
                    },
                    success: function (dt) {
                        $('.filter-result').html(dt);
                        $("#tab").pagination({
                            items: 12,
                            contents: 'filter-result',
                            previous: 'Previous',
                            next: 'Next',
                            position: 'bottom',
                        });
                    }
                });
            });
        });
    </script>
    <!-- Live search -->
    <script>
        $(document).ready(function(){
            $(".live-search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".filter-result div").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

                });
            });
        });
    </script>
    <!-- Pagination -->
    <script src="js/pagination.js"></script>
    <script>
        $(document).ready(function () {
            $("#tab").pagination({
                items: 12,
                contents: 'filter-result',
                previous: 'Previous',
                next: 'Next',
                position: 'bottom',
            });
        })

    </script>
@endsection