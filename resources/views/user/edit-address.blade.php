@extends('layouts.master')

@section('title', 'Edit Address | Online Garden Store, Seeds & Agricultural Products | PhoolPatte.com')

@section('content')

    <div class="myaccount-content">
        <h3>Edit Address</h3>
        <div class="account-details-form">
            <form action="{{ route('address.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4 mb-30">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{ $address->name ?? ''}}" required>
                    </div>

                    <div class="col-md-4 mb-30">
                        <label for="address">Address</label>
                        <input id="address" name="address" type="text" class="form-control" value="{{ $address->address ?? '' }}" required>
                    </div>

                    <div class="col-md-4 mb-30">
                        <label for="phone">Phone</label>
                        <input id="phone" name="phone" type="text" class="form-control" value="{{ $address->phone ?? '' }}" required>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </div>
            </form>

            @if(session('success'))
            <div class="alert alert-success mt-5">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
@endsection
