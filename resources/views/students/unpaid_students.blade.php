<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        @foreach ($students as $student)
        @if (is_null($student->fee) || (int)$student->fee === 0)
            <li>{{ $student->firstname . " " . $student->lastname }}</li>
        @endif
        @endforeach
    
    </ul>
    
</body>
</html>