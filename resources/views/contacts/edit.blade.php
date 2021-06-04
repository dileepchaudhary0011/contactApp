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
<form action="{{ url('contacts',$contact->id) }}" method="post">
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

    <button type="submit">Submit</button>
</form>
