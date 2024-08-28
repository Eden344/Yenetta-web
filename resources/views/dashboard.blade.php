<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <a href="/">Dashboard</a>
            <a href="/students">Students</a>
            <a href="/schedules">Schedule</a>
            <a href="{{ route('attendance.mark_form') }} ">Attendance</a>
            <a href="/logout">Logout</a>
        </nav>
    </header>
    <main>
       <div>
        Total students: {{$student_count}}
        </div>
        <div>
            Total Schedules: {{$schedule_count}}
        </div>
        <div>
            Total Money Paid: {{$total_cash}}
        </div>
        
        <div>
            Number of students who haven't paid: {{$not_paid}}
        </div>
        <div>
            Paid Students:
            <ul>
                @foreach ($paid_students as $paid)
                <li>{{$paid}}</li>
                @endforeach
            </ul>
        </div>
        @if($not_paid != 0)
        <div>
            <a href="/unpaid_students">Unpaid Students</a>
            <br>
        </div>
        @else
        <div>
            <p>All students have paid.</p>
        </div>
        @endif
    
    </main>
    <footer><br>&copy; {{date('Y')}} Yenetta Code. All Rights Reserved.</footer>

    
</body>
</html>