@extends('components.layout')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br/>
    <form action="{{ url('contacts',$contact->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="put">
        <lable>Name</lable>
        <input type="text" name="name" value="{{ $contact->name }}"><br/>

        <lable>Address</lable>
        <input type="text" name="address" value="{{ $contact->address }}"><br/>

        <lable>Email</lable>
        <input type="email" name="email" value="{{ $contact->email }}"><br/>

        <lable>Phone Number</lable>
        <input type="text" name="phoneNumber" value="{{ $contact->phone_number }}"><br/>

        <div class="mb-3">
            <label class="form-label">Profile</label>
            <input type="file" class="form-control" name="profile">
            <span>Current Profile</span>
            <img src="{{ asset($contact->profile) }}" width="70px" class="d-block">
        </div>

        <button type="submit">Submit</button>
    </form>
</div>
@endsection
