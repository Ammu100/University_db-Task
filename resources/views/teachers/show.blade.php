<!-- resources/views/teachers/show.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Teacher Details</h1>

<p>Name: {{ $teacher->teacher_name }}</p>
<a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back to Teachers</a>
@endsection
