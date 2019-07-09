@extends("index.layout.index")
@section('styles')
    <!-- DataTables -->

@endsection
@section('title')
    <title>Home</title>
@endsection
@section("content")
    <!-- Slide1 -->
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach($banners as $detail)
                    <div class="item-slick1 item1-slick1" style="background-image: url('{{$detail->img}}');">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 l-text1 t-center animated visible-false m-b-37 " data-appear="fadeInDown">
							{{$detail->name}}
						</span>

                        <h2 class="caption2-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInUp">
                            {{$detail->des}}
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <!-- Button -->
                            <a href="{{route('index.watches.get')}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Banner -->
    <section class="banner bgwhite p-t-40 p-b-40">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img class=" banner-image img-thumbnail "  src="images/men_watches_background.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="{{route('index.menWatches.get')}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Men's watches
                            </a>
                        </div>
                    </div>

                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img class="banner-image img-thumbnail " src="images/back_in_stock_background.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Back in stock
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img class="banner-image img-thumbnail" src="images/ladies_watches_background.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="{{route('index.ladiesWatches.get')}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Ladies watches
                            </a>
                        </div>
                    </div>

                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img class="banner-image img-thumbnail " src="images/on_sale_background.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                On sale
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img class="banner-image img-thumbnail" src="images/couple_watches_background.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Couple watches
                            </a>
                        </div>
                    </div>

                    <!-- block2 -->
                    <div class="block2 wrap-pic-w pos-relative m-b-30">
                        <img class="banner-image img-thumbnail" src="index_assets/images/icons/bg-01.jpg" alt="IMG">

                        <div class="block2-content sizefull ab-t-l flex-col-c-m">
                            <h4 class="m-text4 t-center w-size3 p-b-8">
                                Sign up & get 20% off
                            </h4>

                            <p class="t-center w-size4">
                                Be the frist to know about the latest watch news and get exclu-sive offers
                            </p>

                            <div class="w-size2 p-t-25">
                                <!-- Button -->
                                <a href="{{route('index.login.get')}}" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                                    Sign Up
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Product -->
    <section class="newproduct bgwhite p-t-45 p-b-105">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Featured Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">

                    @foreach($products as $detail)
                        <div class="item-slick2 p-l-15 p-r-15">
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

                                <span class="block2-price m-text6 p-r-5">
									${{$detail->price}}
								</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{--<div class="item-slick2 p-l-15 p-r-15">--}}
                        {{--<!-- Block2 -->--}}
                        {{--<div class="block2">--}}
                            {{--<div class="block2-img wrap-pic-w of-hidden pos-relative">--}}
                                {{--<img src="images/item-03.jpg" alt="IMG-PRODUCT">--}}

                                {{--<div class="block2-overlay trans-0-4">--}}
                                    {{--<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">--}}
                                        {{--<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>--}}
                                        {{--<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>--}}
                                    {{--</a>--}}

                                    {{--<div class="block2-btn-addcart w-size1 trans-0-4">--}}
                                        {{--<!-- Button -->--}}
                                        {{--<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">--}}
                                            {{--Add to Cart--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="block2-txt p-t-20">--}}
                                {{--<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">--}}
                                    {{--Denim jacket blue--}}
                                {{--</a>--}}

                                {{--<span class="block2-price m-text6 p-r-5">--}}
									{{--$92.50--}}
								{{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="item-slick2 p-l-15 p-r-15">--}}
                        {{--<!-- Block2 -->--}}
                        {{--<div class="block2">--}}
                            {{--<div class="block2-img wrap-pic-w of-hidden pos-relative">--}}
                                {{--<img src="images/item-05.jpg" alt="IMG-PRODUCT">--}}

                                {{--<div class="block2-overlay trans-0-4">--}}
                                    {{--<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">--}}
                                        {{--<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>--}}
                                        {{--<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>--}}
                                    {{--</a>--}}

                                    {{--<div class="block2-btn-addcart w-size1 trans-0-4">--}}
                                        {{--<!-- Button -->--}}
                                        {{--<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">--}}
                                            {{--Add to Cart--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="block2-txt p-t-20">--}}
                                {{--<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">--}}
                                    {{--Coach slim easton black--}}
                                {{--</a>--}}

                                {{--<span class="block2-price m-text6 p-r-5">--}}
									{{--$165.90--}}
								{{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="item-slick2 p-l-15 p-r-15">--}}
                        {{--<!-- Block2 -->--}}
                        {{--<div class="block2">--}}
                            {{--<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">--}}
                                {{--<img src="images/item-07.jpg" alt="IMG-PRODUCT">--}}

                                {{--<div class="block2-overlay trans-0-4">--}}
                                    {{--<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">--}}
                                        {{--<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>--}}
                                        {{--<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>--}}
                                    {{--</a>--}}

                                    {{--<div class="block2-btn-addcart w-size1 trans-0-4">--}}
                                        {{--<!-- Button -->--}}
                                        {{--<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">--}}
                                            {{--Add to Cart--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="block2-txt p-t-20">--}}
                                {{--<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">--}}
                                    {{--Frayed denim shorts--}}
                                {{--</a>--}}

                                {{--<span class="block2-oldprice m-text7 p-r-5">--}}
									{{--$29.50--}}
								{{--</span>--}}

                                {{--<span class="block2-newprice m-text8 p-r-5">--}}
									{{--$15.90--}}
								{{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="item-slick2 p-l-15 p-r-15">--}}
                        {{--<!-- Block2 -->--}}
                        {{--<div class="block2">--}}
                            {{--<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">--}}
                                {{--<img src="images/item-02.jpg" alt="IMG-PRODUCT">--}}

                                {{--<div class="block2-overlay trans-0-4">--}}
                                    {{--<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">--}}
                                        {{--<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>--}}
                                        {{--<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>--}}
                                    {{--</a>--}}

                                    {{--<div class="block2-btn-addcart w-size1 trans-0-4">--}}
                                        {{--<!-- Button -->--}}
                                        {{--<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">--}}
                                            {{--Add to Cart--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="block2-txt p-t-20">--}}
                                {{--<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">--}}
                                    {{--Herschel supply co 25l--}}
                                {{--</a>--}}

                                {{--<span class="block2-price m-text6 p-r-5">--}}
									{{--$75.00--}}
								{{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="item-slick2 p-l-15 p-r-15">--}}
                        {{--<!-- Block2 -->--}}
                        {{--<div class="block2">--}}
                            {{--<div class="block2-img wrap-pic-w of-hidden pos-relative">--}}
                                {{--<img src="images/item-03.jpg" alt="IMG-PRODUCT">--}}

                                {{--<div class="block2-overlay trans-0-4">--}}
                                    {{--<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">--}}
                                        {{--<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>--}}
                                        {{--<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>--}}
                                    {{--</a>--}}

                                    {{--<div class="block2-btn-addcart w-size1 trans-0-4">--}}
                                        {{--<!-- Button -->--}}
                                        {{--<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">--}}
                                            {{--Add to Cart--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="block2-txt p-t-20">--}}
                                {{--<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">--}}
                                    {{--Denim jacket blue--}}
                                {{--</a>--}}

                                {{--<span class="block2-price m-text6 p-r-5">--}}
									{{--$92.50--}}
								{{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="item-slick2 p-l-15 p-r-15">--}}
                        {{--<!-- Block2 -->--}}
                        {{--<div class="block2">--}}
                            {{--<div class="block2-img wrap-pic-w of-hidden pos-relative">--}}
                                {{--<img src="images/item-05.jpg" alt="IMG-PRODUCT">--}}

                                {{--<div class="block2-overlay trans-0-4">--}}
                                    {{--<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">--}}
                                        {{--<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>--}}
                                        {{--<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>--}}
                                    {{--</a>--}}

                                    {{--<div class="block2-btn-addcart w-size1 trans-0-4">--}}
                                        {{--<!-- Button -->--}}
                                        {{--<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">--}}
                                            {{--Add to Cart--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="block2-txt p-t-20">--}}
                                {{--<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">--}}
                                    {{--Coach slim easton black--}}
                                {{--</a>--}}

                                {{--<span class="block2-price m-text6 p-r-5">--}}
									{{--$165.90--}}
								{{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="item-slick2 p-l-15 p-r-15">--}}
                        {{--<!-- Block2 -->--}}
                        {{--<div class="block2">--}}
                            {{--<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">--}}
                                {{--<img src="images/item-07.jpg" alt="IMG-PRODUCT">--}}

                                {{--<div class="block2-overlay trans-0-4">--}}
                                    {{--<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">--}}
                                        {{--<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>--}}
                                        {{--<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>--}}
                                    {{--</a>--}}

                                    {{--<div class="block2-btn-addcart w-size1 trans-0-4">--}}
                                        {{--<!-- Button -->--}}
                                        {{--<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">--}}
                                            {{--Add to Cart--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="block2-txt p-t-20">--}}
                                {{--<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">--}}
                                    {{--Frayed denim shorts--}}
                                {{--</a>--}}

                                {{--<span class="block2-oldprice m-text7 p-r-5">--}}
									{{--$29.50--}}
								{{--</span>--}}

                                {{--<span class="block2-newprice m-text8 p-r-5">--}}
									{{--$15.90--}}
								{{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>

        </div>
    </section>

    <!-- Blog -->
    {{--<section class="blog bgwhite p-t-94 p-b-65">--}}
        {{--<div class="container">--}}
            {{--<div class="sec-title p-b-52">--}}
                {{--<h3 class="m-text5 t-center">--}}
                    {{--Our Blog--}}
                {{--</h3>--}}
            {{--</div>--}}

            {{--<div class="row">--}}
                {{--<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">--}}
                    {{--<!-- Block3 -->--}}
                    {{--<div class="block3">--}}
                        {{--<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">--}}
                            {{--<img src="index_assets/images/blog-01.jpg" alt="IMG-BLOG">--}}
                        {{--</a>--}}

                        {{--<div class="block3-txt p-t-14">--}}
                            {{--<h4 class="p-b-7">--}}
                                {{--<a href="blog-detail.html" class="m-text11">--}}
                                    {{--Black Friday Guide: Best Sales & Discount Codes--}}
                                {{--</a>--}}
                            {{--</h4>--}}

                            {{--<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>--}}
                            {{--<span class="s-text6">on</span> <span class="s-text7">July 22, 2017</span>--}}

                            {{--<p class="s-text8 p-t-16">--}}
                                {{--Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">--}}
                    {{--<!-- Block3 -->--}}
                    {{--<div class="block3">--}}
                        {{--<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">--}}
                            {{--<img src="index_assets/images/blog-02.jpg" alt="IMG-BLOG">--}}
                        {{--</a>--}}

                        {{--<div class="block3-txt p-t-14">--}}
                            {{--<h4 class="p-b-7">--}}
                                {{--<a href="blog-detail.html" class="m-text11">--}}
                                    {{--The White Sneakers Nearly Every Fashion Girls Own--}}
                                {{--</a>--}}
                            {{--</h4>--}}

                            {{--<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>--}}
                            {{--<span class="s-text6">on</span> <span class="s-text7">July 18, 2017</span>--}}

                            {{--<p class="s-text8 p-t-16">--}}
                                {{--Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit ame--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">--}}
                    {{--<!-- Block3 -->--}}
                    {{--<div class="block3">--}}
                        {{--<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">--}}
                            {{--<img src="index_assets/images/blog-03.jpg" alt="IMG-BLOG">--}}
                        {{--</a>--}}

                        {{--<div class="block3-txt p-t-14">--}}
                            {{--<h4 class="p-b-7">--}}
                                {{--<a href="blog-detail.html" class="m-text11">--}}
                                    {{--New York SS 2018 Street Style: Annina Mislin--}}
                                {{--</a>--}}
                            {{--</h4>--}}

                            {{--<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>--}}
                            {{--<span class="s-text6">on</span> <span class="s-text7">July 2, 2017</span>--}}

                            {{--<p class="s-text8 p-t-16">--}}
                                {{--Proin nec vehicula lorem, a efficitur ex. Nam vehicula nulla vel erat tincidunt, sed hendrerit ligula porttitor. Fusce sit amet maximus nunc--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

@endsection