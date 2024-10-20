<!-- resources/views/teachers/edit.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Edit Teacher</h1>

<form action="{{ route('teachers.update', $teacher) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="teacher_name">Teacher Name</label>
        <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="{{ $teacher->teacher_name }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Teacher</button>
</form>
@endsection
