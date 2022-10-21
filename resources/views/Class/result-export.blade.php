<table>
    <thead>
        <tr>

        
        <th>#</th>
        <th>Name</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Asg</th>
        <th>reading</th>
        <th>writing</th>
        <th>speaking</th>
        <th>Grammar</th>
        <th>Listening</th>
        <th>Total</th>
        <th>Pass/Fail</th>
    </tr>
    </thead>
    <tbody>
        @php
        $i=1
    @endphp
    @foreach ($score as $s)
    @php
        $student = DB::table('students')->where('id' , $s->student_id)->first(); 
        $total = $s->asg + $s->reading + $s->writing +  $s->speaking +  $s->grammar;
    @endphp
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $student->st_name_kh }}</td>
            <td>{{ ($student->st_gender == 1)?'M':'F' }}</td>
            <td>{{ $student->st_dob }}</td>
            <td>{{ $s->asg }}</td>
            <td>{{ $s->reading }}</td>
            <td>{{ $s->writing }}</td>
            <td>{{ $s->speaking }}</td>
            <td>{{ $s->grammar }}</td>
            <td>{{ $s->listening  }}</td>
            <td>{{ $total }}</td>
            @if($total<120)
            <td>F</td>
            @else
            <td>P</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>


