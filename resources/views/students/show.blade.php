<!-- resources/views/students/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student Details</h1>

        <div class="card">
            <div class="card-header">
                {{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $student->email }}</p>
                <p><strong>Phone Number:</strong> {{ $student->phonenumber }}</p>
                <p><strong>Gender:</strong> {{ ucfirst($student->gender) }}</p>
                <p><strong>Age:</strong> {{ $student->age }}</p>
                <p><strong>School:</strong> {{ $student->school }}</p>
                <p><strong>Address:</strong> {{ $student->address }}</p>

                <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
