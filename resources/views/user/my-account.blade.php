@extends('layouts.master')

@section('title', 'My Account | Online Garden Store, Seeds &amp; Agricultural Products | PhoolPatte.com')

@section('content')

<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  breadcrumb content  =======-->

                <div class="breadcrumb-content">
                    <ul>
                        <li class="has-child"><a href="index.php">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>

                <!--=======  End of breadcrumb content  =======-->
            </div>
        </div>
    </div>
</div>


<div class="page-section pb-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                Dashboard</a>

                            <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>

                            <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> address</a>

                            <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>

                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->

                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Dashboard</h3>

                                    <div class="welcome mb-20">
                                        <p><strong>
                                            <?php
                                            use Illuminate\Support\Facades\Auth;

                                            $user = Auth::user();

                                            if ($user) {
                                                echo "Welcome, " . $user->first_name . " " . $user->last_name;
                                            } else {
                                                echo "User not authenticated.";
                                            }
                                               ?>
                                        </strong></p>
                                    </div>

                                    <p class="mb-0">From your account dashboard. you can easily check &amp; view
                                        your
                                        recent orders, manage your shipping and billing addresses and edit your
                                        password and account details.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Orders</h3>

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
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
                                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                                    <td style="color:
                                                        @if($order->status == 'Pending')
                                                            orange;
                                                        @elseif($order->status == 'Processing')
                                                            blue;
                                                        @elseif($order->status == 'Completed')
                                                            green;
                                                        @elseif($order->status == 'Cancelled')
                                                            red;
                                                        @elseif($order->status == 'Delivered')
                                                            purple;
                                                        @endif">{{ $order->status }}</td>
                                                    <td>₹{{ $order->total }}</td>
                                                    <td><a href="{{ route('order.details', ['id' => $order->id]) }}" class="btn">View</a></td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->


                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Billing Address</h3>
                                    <address>
                                        <p><strong>{{ $address->name ?? '' }}</strong></p>
                                        <p>{{ $address->address ?? ''}}</p>
                                        <p>Mobile: {{ $address->phone ?? ''}}</p>
                                    </address>
                                    <a href="{{ route('address.edit') }}" class="btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>Edit Address</a>
                                </div>
                            </div>

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>

                                    <div class="account-details-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="first-name" placeholder="First Name" type="text" value="{{ auth()->user()->first_name }}" disabled>
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="last-name" placeholder="Last Name" type="text" value="{{ auth()->user()->last_name }}" disabled>
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="display-name" placeholder="Display Name" type="text" value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" disabled>
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="email" placeholder="Email Address" type="email" value="{{ auth()->user()->email }}" disabled>
                                                </div>
                                            </form>

                                                <div class="col-12 mb-30">
                                                    <h4>Password change</h4>
                                                </div>
                                                <form action="{{ route('change.password') }}" method="post">
                                                    @csrf
                                                    <div class="col-12 mb-30">
                                                        <input name="current_password" id="current-pwd" placeholder="Current Password" type="password">
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-30">
                                                        <input name="new_password" id="new-pwd" placeholder="New Password" type="password">
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-30">
                                                        <input name="new_password_confirmation" id="confirm-pwd" placeholder="Confirm Password" type="password">
                                                    </div>

                                                    <div class="col-12">
                                                        <button type="submit" class="save-change-btn">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            @if(session('success'))
    <div class="alert alert-success mt-5">
        {{ session('success') }}
    </div>
@endif
                                    </div>

                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>

            </div>
        </div>
    </div>
</div>

@endsection