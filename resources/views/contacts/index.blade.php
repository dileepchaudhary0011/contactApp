@extends('components.layout')

@section('content')
<div class="container">
    <ul class="nav">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
    </ul>
    <a href="{{ url('contacts/create') }}">Add New</a>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    <table border="1px">
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>
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
    </table>
</div>
@endsection
