@extends('components.layout')

@section('content')
<div class="container">
    <h3>View Page</h3>
    <a href="{{ route('contacts.index') }}">Back</a>
    <strong>Name:</strong>{{ $contact->name }}<br/>
    <strong>Address:</strong>{{ $contact->address }}<br/>
    <strong>Phone Number:</strong>{{ $contact->phone_number }}<br/>
    <strong>Email:</strong>{{ $contact->email }}<br/>
    <strong>Created By: </strong> {{ $contact->user->name }}

    <span>Current Profile</span>
    <img src="{{ asset($contact->profile) }}" width="200px" class="d-block">
</div>
@endsection
