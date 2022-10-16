<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $s)
        <tr>
            <td>{{ $s->st_code }}</td>
            <td>{{ $s->st_name_kh }}</td>
        </tr>
    @endforeach
    </tbody>
</table>