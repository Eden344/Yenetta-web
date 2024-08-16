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
            <a href="/attendance/mark">Attendance</a>
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
    </main>
    <footer></footer>

    
</body>
</html>