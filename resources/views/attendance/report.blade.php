<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            @foreach ($dates as $date)
                <th>{{ $date }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->firstname }}</td>
                <td>{{ $student->middlename }}</td>
                <td>{{ $student->lastname }}</td>
                @foreach ($dates as $date)
                    <td>
                        {{ $attendanceStatus[$student->id][$date] }}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
