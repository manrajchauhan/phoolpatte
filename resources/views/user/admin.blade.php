@extends('layouts.master')

@section('title', 'Admin Page | Online Garden Store, Seeds &amp; Agricultural Products | PhoolPatte.com')

@section('content')

<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  breadcrumb content  =======-->

                <div class="breadcrumb-content">
                    <ul>
                        <li class="has-child"><a href="index.php">Home</a></li>
                        <li>Admin Page</li>
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

                            <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i>All Orders</a>

                            <a href="#all-users" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>All Users</a>
                            <a href="#all-contacts" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>All Contacts</a>

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
                                                echo "Welcome Admin , " . $user->first_name . " " . $user->last_name;
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
                                    <h3>All Orders</h3>

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
                                                    <td>
                                                        <form action="{{ route('order.updateStatus', ['id' => $order->id]) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <select name="status" onchange="this.form.submit()">
                                                                <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                                <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                                                <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                                                <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                            </select>
                                                        </form>

                                                    </td>
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
                            <div class="tab-pane fade" id="all-users" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>All Users</h3>

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                                    <td>{{ $user->email}}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>₹{{ $user->created_at }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="all-contacts" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>All Users</h3>

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Date</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ $contact->id }}</td>
                                                    <td>{{ $contact->name}}</td>
                                                    <td>{{ $contact->email}}</td>
                                                    <td>{{ $contact->subject }}</td>
                                                    <td>{{ $contact->message }}</td>
                                                    <td>{{ $contact->created_at }}</td>
                                                    <td><a href="{{ route('contact.details', ['id' => $contact->id]) }}" class="btn">View</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>
                @if(session('success'))
                <div class="alert alert-success mt-5">
                    {{ session('success') }}
                </div>
            @endif
            </div>
        </div>
    </div>
</div>

@endsection