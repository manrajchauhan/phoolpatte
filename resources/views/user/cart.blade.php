@extends('layouts.master')

@section('title', 'Cart | Online Garden Store, Seeds & Agricultural Products | PhoolPatte.com')

@section('content')

<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcrumb-content">
                    <ul>
                        <li class="has-child"><a href="index.php">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>

                <!--=======  End of breadcrumb content  =======-->
            </div>
        </div>
    </div>
</div>

<!--====================  End of breadcrumb area  ====================-->

<!--==================== page content ====================-->

<div class="page-section pb-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <!--=======  cart table  =======-->
                    <div class="cart-table table-responsive mb-40">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('checkout') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @if($cartItems->isEmpty())
    <div class="text-center">
        <p>Your cart is empty.</p>
    </div>
@else
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td class="pro-thumbnail">
                                        <a href="{{ url('/shop') }}">
                                            <img width="100" height="100" src="{{ asset('assets/img/' . $item->image) }}" class="img-fluid" alt="Product">
                                        </a>
                                    </td>
                                    <td class="pro-title"><a href="{{url('/shop')}}">{{ $item->product_name }}</a></td>
                                    <td class="pro-price"><span>₹{{ number_format($item->price, 2) }}</span></td>
                                    <td class="pro-quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{ $item->quantity }}">
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>₹{{ number_format($item->price * $item->quantity, 2) }}</span></td>
                                    <td class="pro-remove">
                                        <a href="{{ route('cart.remove', ['id' => $item->id]) }}" onclick="return confirm('Are you sure you want to remove this item from the cart?')">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                    @if(session('success'))
    <div class="alert alert-success mt-5">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger mt-5">
        {{ session('error') }}
    </div>
@endif

                <div class="row">
                    <div class=" col-12 d-flex">
                        <!--=======  Cart summary  =======-->

                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <h4>Cart Summary</h4>
                                <p>Sub Total <span>₹{{ number_format($subTotal, 2) }}</span></p>
                                <p>Shipping Cost <span>₹00.00</span></p>
                                <h2>Grand Total <span>₹{{ number_format($grandTotal, 2) }}</span></h2>
                            </div>
                            <div class="cart-summary-button">
                                <input type="hidden" name="order_data" value="{{ json_encode($cartItems) }}">
                                <input type="hidden" name="grand_total" value="{{ $grandTotal }}">
                                <button type="submit" class="checkout-btn">Checkout</button>
                            </form>
                                    <a href="{{url('/shop')}}" class="text-black">
                                        <button class="update-btn">Shop </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
