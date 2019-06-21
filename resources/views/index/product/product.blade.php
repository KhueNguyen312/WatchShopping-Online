@extends("index.layout.index")
@section('styles')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@endsection
@section("content")
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url('{{asset('/images/product_background.jpg')}}'); background-position: center; ">
        <h2 class="l-text1 t-center" style="color: #1a2226">
            Watches
        </h2>
    </section>

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
                            <li class="treeview p-t-4">
                                <a href="#" class="s-text13 active1">
                                    <i class="fa fa-list"></i> <span>Brands</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    @foreach($brands as $detail)
                                        <li><a>
                                                <label class="s-text10 active1">
                                                    <input name="cat[]" type="checkbox" class="icheckbox_minimal-blue "
                                                           value = "{{$detail->id}}">
                                                     {{$detail->name}}</label>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="treeview p-t-4">
                                <a href="#" class="s-text13 active1 ">
                                    <i class="fa fa-list"></i> <span>Gender</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    @foreach($genders as $detail)
                                        <li><a>
                                                <label class="s-text10 active1">
                                                    <input name="att[]" type="checkbox" class="icheckbox_minimal-blue "
                                                           value = "{{$detail->id}}">
                                                    {{$detail->value}}</label>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="treeview p-t-4">
                                <a href="#" class="s-text13 active1 ">
                                    <i class="fa fa-list"></i> <span>Movement Type</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    @foreach($movements as $detail)
                                        <li><a>
                                                <label class="s-text10 active1">
                                                    <input name="mType[]" type="checkbox" class="icheckbox_minimal-blue "
                                                           value = "{{$detail->id}}">
                                                    {{$detail->value}}</label>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="treeview p-t-4">
                                <a href="#" class="s-text13 active1">
                                    <i class="fa fa-table"></i> <span>Strap Type</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i>Sales Report</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i>Revenue Report</a></li>
                                </ul>
                            </li>

                        </ul>

                        <!--  -->
                        <h4 class="m-text14 p-b-32">
                            Filters
                        </h4>

                        <div class="filter-price p-t-22 p-b-50 bo3">
                            <div class="m-text15 p-b-17">
                                Price
                            </div>

                            <div class="wra-filter-bar">
                                <div id="filter-bar"></div>
                            </div>

                            <div class="flex-sb-m flex-w p-t-16">
                                <div class="w-size11">
                                    <!-- Button -->
                                    <button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
                                        Filter
                                    </button>
                                </div>

                                <div class="s-text3 p-t-10 p-b-10">
                                    Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
                                </div>
                            </div>
                        </div>

                        <div class="filter-color p-t-22 p-b-50 bo3">
                            <div class="m-text15 p-b-12">
                                Color
                            </div>

                            <ul class="flex-w">
                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
                                    <label class="color-filter color-filter1" for="color-filter1"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
                                    <label class="color-filter color-filter2" for="color-filter2"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
                                    <label class="color-filter color-filter3" for="color-filter3"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
                                    <label class="color-filter color-filter4" for="color-filter4"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
                                    <label class="color-filter color-filter5" for="color-filter5"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
                                    <label class="color-filter color-filter6" for="color-filter6"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
                                    <label class="color-filter color-filter7" for="color-filter7"></label>
                                </li>
                            </ul>
                        </div>

                        <div class="search-product pos-relative bo4 of-hidden">
                            <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

                            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">
                        <div class="flex-w">
                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <select class="selection-2" name="sorting">
                                    <option>Default Sorting</option>
                                    <option>Popularity</option>
                                    <option>Price: low to high</option>
                                    <option>Price: high to low</option>
                                </select>
                            </div>

                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <select class="selection-2" name="sorting">
                                    <option>Price</option>
                                    <option>$0.00 - $50.00</option>
                                    <option>$50.00 - $100.00</option>
                                    <option>$100.00 - $150.00</option>
                                    <option>$150.00 - $200.00</option>
                                    <option>$200.00+</option>

                                </select>
                            </div>
                        </div>

                        <span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
                    </div>

                    <!-- Product -->
                    <div class="row filter-result">
                        @foreach($products as $detail)
                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                    <img class="responsive-image img-thumbnail "  src="{{$detail->img_link}}" alt="IMG-PRODUCT">
                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                        {{$detail->name}}
                                    </a>

                                    <span class="block2-price m-text6 p-r-5">
										${{$detail->price}}
									</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination flex-m flex-w p-t-26">
                        <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                        <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                    </div>
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
            var material = []
            // Listen for 'change' event, so this triggers when the user clicks on the checkboxes labels
            $('input[name="cat[]"],input[name="att[]"],input[name="mType[]"]' ).on('change', function (e) {

                e.preventDefault();
                brands = []; // reset
                gender = [];
                material = []

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
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{route('getfilter')}}",
                    type: "POST",
                    data: {
                        "_token": CSRF_TOKEN,
                        "brands": brands,
                        "gender":gender,
                        "material": material
                    },
                    error: function(xhr, textStatus, error){
                        alert(error + "\r\n" + xhr.responseText);
                        console.log(brands);
                    },
                    success: function (dt) {
                        $('.filter-result').html(dt);
                    }
                });
            });
        });
    </script>
@endsection