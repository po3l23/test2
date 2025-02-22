@extends('layouts.app')

@section('content')
<h2>{{ $milestone->title }}</h2>
<p><strong>Type:</strong> {{ ucfirst($milestone->type) }}</p>
<p><strong>Description:</strong> {{ $milestone->description ?? 'No description provided' }}</p>
<p><strong>Due Date:</strong> {{ $milestone->due_date ?? 'No deadline' }}</p>
<p><strong>Status:</strong> {{ $milestone->completed ? '✔️ Completed' : '❌ Pending' }}</p>

<a href="{{ route('milestones.index') }}" class="btn btn-secondary">Back</a>
<a href="{{ route('milestones.edit', $milestone) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('milestones.destroy', $milestone) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete milestone?')">Delete</button>
</form>
@endsection
