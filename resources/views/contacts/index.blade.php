@extends('components.layout')

@section('content')
<div class="container">
    <div>
        <form action="" method="get">
            <input type="text" name="key" placeholder="Enter search key" value="{{ $key }}">
            <button type="submit">Search</button>
        </form>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Created At</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $contact )
          <tr>
              <td>{{ $contact->name }}</td>
              <td>{{ $contact->phone_number }}</td>
              <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d-M-Y') }}</td>
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

    {{ $contacts->links() }}
</div>
@endsection
