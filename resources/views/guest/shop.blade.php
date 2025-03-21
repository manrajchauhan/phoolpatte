@extends('layouts.master')

@section('title', 'Shop | Online Garden Store, Seeds &amp; Agricultural Products | PhoolPatte.com')

@section('content')

<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  breadcrumb content  =======-->

                <div class="breadcrumb-content">
                    <ul>
                        <li class="has-child"><a href="index.php">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="page-section pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-1">
                <!--=======  shop banner  =======-->

                <div class="shop-banner mb-30 text-center d-none">
                    <img width="825" height="220" src="assets/img/banners/shop-banner.webp" class="img-fluid" alt="">
                </div>

                <!--=======  shop header  =======-->

                <div class="shop-header mb-30">
                    <div class="shop-header__left">
                        <div class="grid-icons mr-20">
                            <button data-target="grid three-column" data-tippy="3" data-tippy-inertia="true"
                                data-tippy-animation="fade" data-tippy-delay="50" data-tippy-arrow="true"
                                data-tippy-theme="sharpborder" class="three-column"></button>
                            <button data-target="grid four-column" data-tippy="4" data-tippy-inertia="true"
                                data-tippy-animation="fade" data-tippy-delay="50" data-tippy-arrow="true"
                                data-tippy-theme="sharpborder"
                                class="active four-column d-none d-lg-block"></button>

                        </div>

                        {{-- <div class="shop-header__left__message">
                            Showing 1 to 9 of 15 (2 Pages)
                        </div> --}}
                    </div>

                    <div class="shop-header__right">

                        <div class="single-select-block d-inline-block mr-50 mr-lg-10 mr-md-10 mr-sm-10">
                            <span class="select-title">Show:</span>
                            <select>
                                <option value="1">10</option>
                                <option value="2">20</option>
                                <option value="3">30</option>
                                <option value="4">40</option>
                            </select>
                        </div>

                        <div class="single-select-block d-inline-block">
                            <span class="select-title">Sort By:</span>
                            <select>
                                <option value="1">Default</option>
                                <option value="2">Name (A-Z)</option>
                                <option value="3">Price (min - max)</option>
                                <option value="4">Color</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!--=======  End of shop header  =======-->

                <!--=======  shop page content  =======-->

                <div class="row shop-product-wrap grid four-column mb-10">
                    @if ($plants)
                        @foreach ($plants as $plant)
                            <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-20">
                                <div class="single-slider-product grid-view-product">
                                    <div class="single-slider-product__image">
                                        <!-- Modify the anchor tag to link to the product details page with the product ID -->
                                        <a href="{{ route('product.details', ['id' => $plant['id']]) }}">
                                            <img src="{{ asset('assets/img/' . $plant['image']) }}" class="img-fluid" alt="{{ $plant['name'] }}">
                                        </a>
                                        @if (isset($plant['discount']) && $plant['discount'] > 0)
                                            <span class="discount-label discount-label--green">-{{ $plant['discount'] }}%</span>
                                        @endif
                                    </div>
                                    <div class="single-slider-product__content">
                                        <p class="product-title">
                                            <!-- Similarly, modify the anchor tag for the product title -->
                                            <a href="{{ route('product.details', ['id' => $plant['id']]) }}">{{ $plant['name'] }}</a>
                                        </p>
                                        <p class="product-price">
                                            @if (isset($plant['discount']) && $plant['discount'] > 0)
                                                <span class="discounted-price">₹{{ $plant['price'] - ($plant['price'] * $plant['discount'] / 100) }}</span>
                                                @if (isset($plant['old_price']))
                                                    <span class="main-price discounted">₹{{ $plant['old_price'] }}</span>
                                                @endif
                                            @else
                                                <span class="discounted-price">₹{{ $plant['price'] }}</span>
                                            @endif
                                        </p>
                                        {{-- <!-- Add an id attribute to the cart icon -->
                                        <span class="cart-icon"><a href="{{route("add-to-cart")}}"><i class="icon-shopping-cart"></i></a></span> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                </div>


            </div>
        </div>
    </div>
</div>

@endsection