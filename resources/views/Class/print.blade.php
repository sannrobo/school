<table>
    <thead>
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Other</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $s)
        <tr>
            <td>{{ $s->st_code }}</td>
            <td>{{ $s->st_name_en }}</td>
            <td>{{ ($s->st_gender==1)?'Male':'Female' }}</td>
            <td>{{ $s->st_dob }}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>