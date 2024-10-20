<!-- resources/views/teachers/index.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Teachers</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('teachers.create') }}" class="btn btn-primary">Add Teacher</a>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->teacher_name }}</td>
                <td>
                    <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
