@extends('layouts.master')

@section('title', 'PhoolPatte | Online Garden Store, Seeds &amp; Agricultural Products | PhoolPatte.com')

@section('content')
<div class="hero-slider-area mb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  hero slider wrapper  =======-->

                <div class="hero-slider-wrapper">
                    <div class="ht-slick-slider" data-slick-setting='{
                        "slidesToShow": 1,
                        "slidesToScroll": 1,
                        "arrows": false,
                        "dots": true,
                        "autoplay": true,
                        "autoplaySpeed": 5000,
                        "speed": 1000,
                        "fade": true
                    }' data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 1} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 1} },
                        {"breakpoint":991, "settings": {"slidesToShow": 1} },
                        {"breakpoint":767, "settings": {"slidesToShow": 1} },
                        {"breakpoint":575, "settings": {"slidesToShow": 1} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1} }
                    ]'>

                        <!--=======  single slider item  =======-->

                        <div class="single-slider-item">
                            <div class="hero-slider-item-wrapper hero-slider-bg-1">
                                <div class="hero-slider-content pl-60 pl-sm-30">
                                    <p class="slider-title slider-title--small">The Stone Series</p>
                                    <p class="slider-title slider-title--big-bold">A Great Addition</p>
                                    <p class="slider-title slider-title--big-light">To Your Home</p>
                                    <a class="theme-button hero-slider-button"
                                        href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>

                        <!--=======  End of single slider item  =======-->

                        <!--=======  single slider item  =======-->

                        <div class="single-slider-item">
                            <div class="hero-slider-item-wrapper hero-slider-bg-2">
                                <div class="hero-slider-content pl-60 pl-sm-30">
                                    <p class="slider-title slider-title--small">Workshops @PhoolPatte</p>
                                    <p class="slider-title slider-title--big-bold">Plant Make</p>
                                    <p class="slider-title slider-title--big-light">People Happy</p>
                                    <a class="theme-button hero-slider-button"
                                        href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>

                        <!--=======  End of single slider item  =======-->

                        <!--=======  single slider item  =======-->

                        <div class="single-slider-item">
                            <div class="hero-slider-item-wrapper hero-slider-bg-3">
                                <div class="hero-slider-content pl-60 pl-sm-30">
                                    <p class="slider-title slider-title--small">Thursday Through Saturday</p>
                                    <p class="slider-title slider-title--big-bold">Plant Big Sale</p>
                                    <p class="slider-title slider-title--big-light">75% Off</p>
                                    <a class="theme-button hero-slider-button"
                                        href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>

                        <!--=======  End of single slider item  =======-->

                    </div>
                </div>

                <!--=======  End of hero slider wrapper  =======-->
            </div>
        </div>
    </div>
</div>

<!--====================  End of hero slider area  ====================-->

<!--====================  split banner area ====================-->

<div class="split-banner-area mb-40 mb-sm-30">
    <div class="container">
        <div class="row row-5">
            <div class="col-md-6 mb-sm-10">
                <!--=======  single split banner  =======-->

                <div class="single-split-banner">
                    <div class="single-split-banner__image">
                        <a href="{{url("/shop")}}">
                            <img width="550" height="260" src="assets/img/banners/banner1.webp" class="img-fluid" alt="">
                            <div class="single-split-banner__image__content">
                                <p class="split-banner-title split-banner-title--light">New Arrivals</p>
                                <p class="split-banner-title split-banner-title--bold">House Plants</p>
                                <p class="split-banner-title split-banner-title--price">from <span
                                        class="amount">₹200.00</span></p>
                            </div>
                        </a>
                    </div>
                </div>

                <!--=======  End of single split banner  =======-->
            </div>
            <div class="col-md-6 mb-sm-10">
                <!--=======  single split banner  =======-->

                <div class="single-split-banner">
                    <div class="single-split-banner__image">
                        <a href="{{url("/shop")}}">
                            <img width="550" height="260" src="assets/img/banners/banner2.webp" class="img-fluid" alt="">
                            <div class="single-split-banner__image__content">
                                <p class="split-banner-title split-banner-title--light">New Arrivals</p>
                                <p class="split-banner-title split-banner-title--bold">Pothos Neon</p>
                                <p class="split-banner-title split-banner-title--price">from <span
                                        class="amount">₹500.00</span></p>
                            </div>
                        </a>
                    </div>
                </div>

                <!--=======  End of single split banner  =======-->
            </div>
        </div>
    </div>
</div>

@endsection
