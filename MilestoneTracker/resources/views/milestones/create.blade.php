@extends('layouts.app')

@section('content')
<h2>Create a Milestone</h2>

<form action="{{ route('milestones.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Type</label>
        <select name="type" class="form-select">
            <option value="personal">Personal</option>
            <option value="work">Work</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Due Date</label>
        <input type="date" name="due_date" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Create</button>
    <a href="{{ route('milestones.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
