@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mx-auto" style="max-width: 500px;">
        <h2 class="mb-4 text-center text-light">Add Course</h2>

        <form action="{{ route('courses.store') }}" method="POST" class="bg-dark p-4 rounded shadow border border-secondary">
            @csrf

            <div class="mb-3">
                <label class="form-label text-light">Course Code</label>
                <input type="text" name="course_code" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-light">Course Name</label>
                <input type="text" name="course_name" class="form-control" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success w-50">Save</button>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary w-50">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
