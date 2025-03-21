@extends('layouts.master')

@section('title', 'Login OR Register | Online Garden Store, Seeds &amp; Agricultural Products | PhoolPatte.com')

@section('content')

<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  breadcrumb content  =======-->

                <div class="breadcrumb-content">
                    <ul>
                        <li class="has-child"><a href="index-2.html">Home</a></li>
                        <li>Login Register</li>
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

            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">

                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf

<div class="login-form">
<h4 class="login-title">Login</h4>

<div class="row">
    <div class="col-md-12 col-12 mb-20">
        <label for="email">Email Address*</label>
        <input class="mb-0" type="email" id="email" name="email" placeholder="Email Address" required>
    </div>
    <div class="col-12 mb-20">
        <label for="password">Password</label>
        <input class="mb-0" type="password" id="password" name="password" placeholder="Password" required>
    </div>
    <div class="col-md-8">
        <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
            <input type="checkbox" id="remember_me" name="remember_me">
            <label for="remember_me">Remember me</label>
        </div>
    </div>
    <div class="col-md-4 mt-10 mb-20 text-start text-md-end">
        <a href="#"> Forgotten password?</a>
    </div>
    <div class="col-md-12">
        <button type="submit" class="register-button mt-0" name="login">Login</button>
    </div>
</div>
</div>

</form>

            </div>

            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">

         <form action="{{ route('register') }}" method="POST">
            @csrf

<div class="login-form">
    <h4 class="login-title">Register</h4>

    <div class="row">
        <div class="col-md-6 col-12 mb-20">
            <label for="first_name">First Name</label>
            <input class="mb-0" type="text" id="first_name" name="first_name" placeholder="First Name" required>
        </div>
        <div class="col-md-6 col-12 mb-20">
            <label for="last_name">Last Name</label>
            <input class="mb-0" type="text" id="last_name" name="last_name" placeholder="Last Name" required>
        </div>
        <div class="col-md-12 mb-20">
            <label for="email">Email Address*</label>
            <input class="mb-0" type="email" id="email" name="email" placeholder="Email Address"required>
        </div>
        <div class="col-md-6 mb-20">
            <label for="password">Password</label>
            <input class="mb-0" type="password" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="col-md-6 mb-20">
            <label for="confirm_password">Confirm Password</label>
            <input class="mb-0" type="password" id="confirm_password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>

        <div class="col-12">
            <button type="submit" class="register-button mt-0">Register</button>
        </div>
    </div>
</div>

</form>
@if(session('success'))
<div class="alert alert-success mt-5">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger mt-5">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

            </div>


        </div>
    </div>
</div>

@endsection