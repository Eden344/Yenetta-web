<!-- resources/views/schedules/schedule_students.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Schedule Details</h1>

        <!-- Display Schedule Information -->
        <div class="card">
            <div class="card-header">
                <h2>{{ $schedule->name }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Time In:</strong> {{ $schedule->time_in }}</p>
                <p><strong>Time Out:</strong> {{ $schedule->time_out }}</p>
            </div>
        </div>
        <div>Schedule Count: {{$schedule_count}}</div>
        <!-- Display List of Students in This Schedule -->
        <h3>Students Enrolled in This Schedule</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($schedule->students as $student)
                    <tr>
                        <td>{{ $student->firstname }}</td>
                        <td>{{ $student->middlename }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phonenumber1 }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->age }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No students are enrolled in this schedule.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Include any necessary JavaScript files -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
