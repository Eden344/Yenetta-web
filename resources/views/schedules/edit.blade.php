@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Schedule</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <label for="name">Schedule Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $schedule->name) }}" required>
        </div>
    
        <div class="form-group">
            <label for="time_in">Time In:</label>
            <input type="time" id="time_in" name="time_in" value="{{ old('time_in', $schedule->time_in) }}" required>
        </div>
    
        <div class="form-group">
            <label for="time_out">Time Out:</label>
            <input type="time" id="time_out" name="time_out" value="{{ old('time_out', $schedule->time_out) }}" required>
        </div>
    
        <button type="submit">Update Schedule</button>
    </form>
</div>
@endsection
