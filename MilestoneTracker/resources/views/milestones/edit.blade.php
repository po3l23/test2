@extends('layouts.app')

@section('content')
<h2>Edit Milestone</h2>

<form action="{{ route('milestones.update', $milestone) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $milestone->title }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ $milestone->description }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Type</label>
        <select name="type" class="form-select">
            <option value="personal" {{ $milestone->type == 'personal' ? 'selected' : '' }}>Personal</option>
            <option value="work" {{ $milestone->type == 'work' ? 'selected' : '' }}>Work</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Due Date</label>
        <input type="date" name="due_date" class="form-control" value="{{ $milestone->due_date }}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('milestones.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
