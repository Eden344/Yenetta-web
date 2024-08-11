@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Schedules</h2>
    <a href="{{ route('schedules.create') }}" class="btn btn-primary">Create Schedule</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Actions</th>
            </tr>
        </thead>
        @if($schedules->isEmpty())
    <p>No schedules available.</p>
@else
    <ul>
        @foreach($schedules as $schedule)
            <li>
                <a href="{{ route('schedules.students', $schedule->id) }}">
                    {{ $schedule->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endif
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->name }}</td>
                <td>{{ $schedule->time_in }}</td>
                <td>{{ $schedule->time_out }}</td>
                <td>
                    <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('schedules.students', $schedule->id) }}" class="btn btn-info">View Students</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
