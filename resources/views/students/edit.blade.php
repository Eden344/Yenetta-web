<!-- resources/views/students/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Student</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" class="form-control" value="{{ $student->firstname }}">
            </div>

            <div class="form-group">
                <label for="middlename">Middle Name</label>
                <input type="text" name="middlename" class="form-control" value="{{ $student->middlename }}">
            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" class="form-control" value="{{ $student->lastname }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $student->email }}">
            </div>

            <div class="form-group">
                <label for="phonenumber1">Phone Number 1</label>
                <input type="text" name="phonenumber1" class="form-control" value="{{ $student->phonenumber1 }}">
            </div>
            <div class="form-group">
                <label for="phonenumber2">Phone Number 2</label>
                <input type="text" name="phonenumber2" class="form-control" value="{{ $student->phonenumber2 }}">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control">
                    <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control" value="{{ $student->age }}">
            </div>

            <div class="form-group">
                <label for="fee">Fee</label>
                <input type="number" name="fee" class="form-control" value="{{ $student->fee }}">
            </div>

            <div class="form-group">
                <label for="school">School</label>
                <input type="text" name="school" class="form-control" value="{{ $student->school }}">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ $student->address }}">
            </div>
            
            <div class="form-group">
                <label for="schedule_id">Select Schedule:</label>
                <select name="schedule_id" id="schedule_id" class="form-control" required>
                    <option value="">Select Schedule</option>
                    @foreach($schedules as $schedule)
                        <option value="{{ $schedule->id }}" {{ $student->schedule_id == $schedule->id ? 'selected' : '' }}>
                            {{ $schedule->name }} ({{ $schedule->time_in }} - {{ $schedule->time_out }})
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection