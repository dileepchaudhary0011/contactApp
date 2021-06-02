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
<form action="{{ url('contacts') }}" method="post">
    @csrf
    <lable>Name</lable>
    <input type="text" name="name"><br/>

    <lable>Address</lable>
    <input type="text" name="address"><br/>

    <lable>Email</lable>
    <input type="email" name="email"><br/>

    <lable>Phone Number</lable>
    <input type="text" name="phoneNumber"><br/>

    <button type="submit">Submit</button>
</form>
