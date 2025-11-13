@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mx-auto" style="max-width: 500px;">
        <h2 class="mb-4 text-center text-light">Course Details</h2>

        <ul class="list-group mb-3 bg-dark text-light border border-secondary">
            <li class="list-group-item bg-dark text-light border-0"><strong>Code:</strong> {{ $course->course_code }}</li>
            <li class="list-group-item bg-dark text-light border-0"><strong>Name:</strong> {{ $course->course_name }}</li>
        </ul>

        <a href="{{ route('courses.index') }}" class="btn btn-secondary w-100">Back</a>
    </div>
</div>
@endsection
