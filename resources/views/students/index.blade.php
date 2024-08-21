<!-- resources/views/students/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student List</h1>

        <a href="{{ route('students.create') }}" class="btn btn-primary">Add New Student</a>
        <a href="{{ url('/schedules') }}">schedule</a>
        <a href="{{ url('/attendance/mark') }}">Attendance </a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-3">
                {{ $message }}
            </div>
        @endif

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Age</th>                   
                    <th>Schedule</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->firstname }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->schedule->name ?? 'No Schedule' }} ({{ $student->schedule->time_in ?? '' }} - {{ $student->schedule->time_out ?? '' }})</td>
               
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection