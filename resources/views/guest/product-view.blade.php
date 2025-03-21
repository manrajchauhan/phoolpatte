    @extends('layouts.master')

    @section('title', 'Product View | Online Garden Store, Seeds &amp; Agricultural Products | PhoolPatte.com')

    @section('content')

    <div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb content  =======-->

                    <div class="breadcrumb-content">
                        <ul>
                            <li class="has-child"><a href="{{url("/")}}">Home</a></li>
                            <li class="has-child"><a href="{{url("/shop")}}">Shop</a></li>
                            <li>Product Details</li>
                        </ul>
                    </div>

                    <!--=======  End of breadcrumb content  =======-->
                </div>
            </div>
        </div>
    </div>

    <div class="product-details-area mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-md-30 mb-sm-25">
                    <!--=======  product details slider  =======-->

                    <!--=======  big image slider  =======-->

                    <div class="big-image-slider-wrapper big-image-slider-wrapper--change-cursor">
                        <div class="ht-slick-slider big-image-slider99" data-slick-setting='{
                                "slidesToShow": 1,
                                "slidesToScroll": 1,
                                "dots": false,
                                "autoplay": false,
                                "autoplaySpeed": 5000,
                                "speed": 1000
                            }' data-slick-responsive='[
                                {"breakpoint":1501, "settings": {"slidesToShow": 1} },
                                {"breakpoint":1199, "settings": {"slidesToShow": 1} },
                                {"breakpoint":991, "settings": {"slidesToShow": 1} },
                                {"breakpoint":767, "settings": {"slidesToShow": 1} },
                                {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                {"breakpoint":479, "settings": {"slidesToShow": 1} }
                            ]'>

                            <!--=======  big image slider single item  =======-->

                            <div class="big-image-slider-single-item">
                                <img width="700" height="700" src="{{ asset('assets/img' . $product['image']) }}" class="img-fluid" alt="">
                            </div>

                            <div class="big-image-slider-single-item">
                                <img width="700" height="700" src="assets/img/products/big1-2.webp" class="img-fluid" alt="">
                            </div>

                            <!--=======  End of big image slider single item  =======-->

                            <!--=======  big image slider single item  =======-->

                            <div class="big-image-slider-single-item">
                                <img width="700" height="700" src="assets/img/products/big1-3.webp" class="img-fluid" alt="">
                            </div>

                            <!--=======  End of big image slider single item  =======-->

                            <!--=======  big image slider single item  =======-->

                            <div class="big-image-slider-single-item">
                                <img width="700" height="700" src="assets/img/products/big1-4.webp" class="img-fluid" alt="">
                            </div>


                            <div class="big-image-slider-single-item">
                                <img width="700" height="700" src="assets/img/products/big1-5.webp" class="img-fluid" alt="">
                            </div>

                            <div class="big-image-slider-single-item">
                                <img width="700" height="700" src="assets/img/products/big1-6.webp" class="img-fluid" alt="">
                            </div>

                        </div>
                    </div>

        {{-- blank --}}

                </div>

                <div class="col-lg-6">
                    <!--=======  product details content  =======-->

                    <div class="product-detail-content">
                        <div class="tags mb-5">
                            <span class="tag-title">Tags:</span>
                            <ul class="tag-list">
                                <li><a href="#">Plant</a>,</li>
                                <li><a href="#">Garden</a></li>
                            </ul>
                        </div>

                        <h3 class="product-details-title mb-15">{{ $product['name'] ?? '' }}</h3>
                        <p class="product-price product-price--big mb-10">
                            @if (isset($product['discounted_price']))
                                <span class="discounted-price">₹{{ $product['discounted_price'] }}</span>
                                @if (isset($product['main_price']))
                                    <span class="main-price discounted">₹{{ $product['main_price'] }}</span>
                                @endif
                            @else
                                <span class="discounted-price">₹{{ $product['price'] ?? '' }}</span>
                            @endif
                        </p>


                        <div class="product-info-block mb-30">
                            <div class="single-info">
                                <span class="title">Brand:</span>
                                <span class="value"><a href="#">PhoolPatte</a></span>
                            </div>
                            <div class="single-info">
                                <span class="title">Product Code:</span>
                                <span class="value">{{ $product['code']  ?? '' }}</span>
                            </div>

                            <div class="single-info">
                                <span class="title">Availability:</span>
                                <span class="value stock-red">In stock</span>
                            </div>
                        </div>

                        <div class="product-short-desc mb-25">
                            <p>{{ $product['short_info']  ?? ''  }}</p>
                        </div>

                        <div class="quantity mb-20">
                            <span class="quantity-title mr-20">Qty</span>
                            <form id="addToCartForm" action="/add-to-cart" method="POST">
                                @csrf <!-- Add CSRF token for Laravel -->
                                <div class="pro-qty mr-15 mb-lg-20 mb-md-20 mb-sm-20">
                                    <input type="number" id="quantity-input" name="quantity" value="1" min="1">
                                </div>
                                <button type="submit" class="theme-button product-cart-button">+ Add to Cart</button>
                                <!-- Hidden input fields to store product details -->
                                <input type="hidden" name="productId" value="{{ $product['id'] }}">
                                <input type="hidden" name="productImage" value="{{ $product['image'] }}">
                                <input type="hidden" name="productName" value="{{ $product['name'] }}">
                                <input type="hidden" name="productPrice" value="{{ $product['price'] }}">
                            </form>
                        </div>


                        </div>

                        <div class="product-details-feature-wrapper d-flex justify-content-start mt-20">
                            <!--=======  single icon feature  =======-->

                            <div class="single-icon-feature single-icon-feature--product-details">
                                <div class="single-icon-feature__icon">
                                    <img width="38" height="32" src="assets/img/icons/free-shipping.webp" class="img-fluid" alt="">
                                </div>
                                <div class="single-icon-feature__content">
                                    <p class="feature-text">Free Shipping</p>
                                    <p class="feature-text">Ships Today</p>
                                </div>
                            </div>

                            <!--=======  End of single icon feature  =======-->

                            <!--=======  single icon feature  =======-->

                            <div
                                class="single-icon-feature single-icon-feature--product-details ml-30 ml-xs-0 ml-xxs-0">
                                <div class="single-icon-feature__icon">
                                    <img width="38" height="30" src="assets/img/icons/return.webp" class="img-fluid" alt="">
                                </div>
                                <div class="single-icon-feature__content">
                                    <p class="feature-text">Easy</p>
                                    <p class="feature-text">Returns</p>
                                </div>
                            </div>


                            <div
                                class="single-icon-feature single-icon-feature--product-details ml-30 ml-xs-0 ml-xxs-0">
                                <div class="single-icon-feature__icon">
                                    <img width="33" height="30" src="assets/img/icons/guarantee.webp" class="img-fluid" alt="">
                                </div>
                                <div class="single-icon-feature__content">
                                    <p class="feature-text">Lowest Price</p>
                                    <p class="feature-text">Guarantee</p>
                                </div>
                            </div>

                            <!--=======  End of single icon feature  =======-->
                        </div>

                        <div class="social-share-buttons mt-20">
                            <h3>share this product</h3>
                            <ul>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="product-description-review-area mb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="tab-slider-wrapper product-description-review-container">
                        <nav>
                            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="description-tab" data-bs-toggle="tab"
                                    href="#product-description" role="tab" aria-selected="true">Description</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <!--=======  product description  =======-->

                                <div class="product-description">
                                    <p>{{ $product['description']  ?? ''  }}</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    @endsection
