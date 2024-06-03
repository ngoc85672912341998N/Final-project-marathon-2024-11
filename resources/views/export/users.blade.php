<table>
    <thead>
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>    
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td> 
        </tr>       
    @endforeach
    </tbody>
</table>