<table border="1px">
    <tr>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Address</th>
    </tr>
    @foreach ($contacts as $contact )
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->phone_number }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->address }}</td>
        </tr>
    @endforeach
</table>
