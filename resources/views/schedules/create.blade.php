@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Schedule</h2>
    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Schedule Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="time_in">Time In:</label>
            <input type="time" class="form-control" id="time_in" name="time_in" required>
        </div>
        <div class="form-group">
            <label for="time_out">Time Out:</label>
            <input type="time" class="form-control" id="time_out" name="time_out" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Schedule</button>
    </form>
</div>
@endsection
