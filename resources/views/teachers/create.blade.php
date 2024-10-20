<!-- resources/views/teachers/create.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Add Teacher</h1>

<form action="{{ route('teachers.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="teacher_name">Teacher Name</label>
        <input type="text" class="form-control" id="teacher_name" name="teacher_name" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Teacher</button>
</form>
@endsection
