<a href="{{ url('contacts/create') }}">Add New</a>
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
