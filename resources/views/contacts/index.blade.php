@extends('components.layout')

@section('content')
<div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $contact )
          <tr>
              <td>{{ $contact->name }}</td>
              <td>{{ $contact->phone_number }}</td>
              <td>
                  <a href="{{ url('contacts/view/'.$contact->id) }}">View</a>

                  <form action="{{ url('contacts',$contact->id) }}" method="post">
                      @csrf
                      <input type="hidden" name="_method" value="delete">
                      <button type="submit">Delete</button>
                  </form>
                  <a href="{{ url('contacts/'.$contact->id) }}">Edit</a>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
