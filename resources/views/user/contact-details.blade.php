@extends('layouts.master')

@section('title', 'Contact Details | Online Garden Store, Seeds & Agricultural Products | PhoolPatte.com')

@section('content')
<div class="container" style="padding-top: 10px; padding-bottom: 10px;">
    <h2>Contact Details</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $contact->name }}</h5>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                    <p><strong>Subject:</strong> {{ $contact->subject }}</p>
                    <p><strong>Message:</strong> {{ $contact->message }}</p>
                    <p><strong>Created At:</strong> {{ $contact->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
