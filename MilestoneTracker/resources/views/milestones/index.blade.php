@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Milestones</h2>
    <a href="{{ route('milestones.create') }}" class="btn btn-primary">Add Milestone</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($milestones as $milestone)
            <tr>
                <td>{{ $milestone->title }}</td>
                <td>{{ ucfirst($milestone->type) }}</td>
                <td>{{ $milestone->due_date ?? 'No deadline' }}</td>
                <td>{{ $milestone->completed ? '✔️ Completed' : '❌ Pending' }}</td>
                <td>
                    <a href="{{ route('milestones.show', $milestone) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('milestones.edit', $milestone) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('milestones.destroy', $milestone) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete milestone?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection