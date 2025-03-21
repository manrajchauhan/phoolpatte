@extends('layouts.master')

@section('title', 'Orders Details | Online Garden Store, Seeds & Agricultural Products | PhoolPatte.com')

@section('content')

<div class="container" style="padding-top: 10px; padding-bottom: 10px;">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-5">
                <div class="card-header text-white">
                    <h3 class="mb-0">Order Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Order ID:</strong> {{ $order->id }}</p>
                            <td>
                                @php
                                    $orderName = json_decode($order->name, true);
                                @endphp
                                <ul>
                                    @foreach($orderName as $item)
                                        <li>
                                            Product: {{ $item['product_name'] }},
                                            Quantity: {{ $item['quantity'] }},
                                            Price: {{ $item['price'] }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <p><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>
                            <p><strong>Status:</strong><p style="color:
                                @if($order->status == 'Pending')
                                    orange;
                                @elseif($order->status == 'Processing')
                                    blue;
                                @elseif($order->status == 'Cancelled')
                                    red;
                                @elseif($order->status == 'Delivered')
                                    green;
                                @endif">{{ $order->status }}</p></p>
                            <p><strong>Total:</strong> ₹{{ $order->total }}</p>
                            <p><strong>Mode:</strong> Cash On Delivery</p>

                            @auth
                            @if(auth()->user()->role === 'admin')
                                <p><strong>User Name:</strong> {{ $order->user->first_name }} {{ $order->user->last_name }}</p>
                                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                <p><strong>Address:</strong> {{ $order->user->address->address }}</p>
                                <p><strong>Phone:</strong> {{ $order->user->address->phone }}</p>
                            @endif
                        @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
