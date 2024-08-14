<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
</head>
<body>
    <h1>Mark Attendance</h1>

    <form action="{{ route('attendance.mark') }}" method="POST">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Date</th>
                    <th>Present</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->firstname }}</td>
                        <td>{{ $student->middlename }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td><input type="date" name="attendance[{{ $student->id }}][date]" value="{{ today()->toDateString() }}"></td>
                        <td><input type="checkbox" name="attendance[{{ $student->id }}][present]" value="1"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
