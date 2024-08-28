<!-- resources/views/students/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Student</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <h2>Parent Information</h2>
            <div class="parent_info">
                <div class="form-group">
                    <label for="parent_first_name">Parent First Name</label>
                    <input type="text" name="parent_first_name" class="form-control" value="{{ old('parent_first_name') }}">
                </div>
                
                <div class="form-group">
                    <label for="parent_last_name">Parent Last Name</label>
                    <input type="text" name="parent_last_name" class="form-control" value="{{ old('parent_last_name') }}">
                </div>

                <div class="form-group">
                    <label for="parent_email">Parent Email</label>
                    <input type="email" name="parent_email" class="form-control" value="{{ old('parent_email') }}">
                </div>

                <div class="form-group">
                    <label for="phonenumber1">Phone Number</label>
                    <input type="text" name="phonenumber1" class="form-control" value="{{ old('phonenumber1') }}">
                </div>
            </div>
            <h2>Student Information</h2>
                <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}">
            </div>

            <div class="form-group">
                <label for="middlename">Middle Name</label>
                <input type="text" name="middlename" class="form-control" value="{{ old('middlename') }}">
            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}">
            </div>

            <div class="form-group">
                <label for="email">Student Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            
            <div class="form-group">
                <label for="phonenumber2">Phone Number</label>
                <input type="text" name="phonenumber2" class="form-control" value="{{ old('phonenumber2') }}">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control" value="{{ old('age') }}">
            </div>

            <div class="form-group">
                <label for="school">School</label>
                <input type="text" name="school" class="form-control" value="{{ old('school') }}">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
            </div>

            <div class="form-group">
                <label for="fee">Fee</label>
                <input type="number" name="fee" class="form-control" value="{{ old('fee') }}">
            </div>
           
            <div class="form-group">
                <label for="schedule_id">Select Schedule:</label>
                <select name="schedule_id" id="schedule_id" class="form-control" required>
                    <option value="">Select Schedule</option>
                    @foreach($schedules as $schedule)
                        <option value="{{ $schedule->id }}">{{ $schedule->name }} ({{ $schedule->time_in }} - {{ $schedule->time_out }})</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection