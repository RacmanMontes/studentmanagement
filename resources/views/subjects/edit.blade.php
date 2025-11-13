@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mx-auto" style="max-width: 500px;">
        <h2 class="mb-4 text-center text-light">Edit Subject</h2>

        <form action="{{ route('subjects.update', $subject->id) }}" method="POST" class="bg-dark p-4 rounded shadow border border-secondary">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label text-light">Subject Code</label>
                <input type="text" name="subject_code" value="{{ $subject->subject_code }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-light">Subject Name</label>
                <input type="text" name="subject_name" value="{{ $subject->subject_name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-light">Units</label>
                <input type="number" name="units" value="{{ $subject->units }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-light">Course</label>
                <select name="course_id" class="form-select" required>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ $subject->course_id == $course->id ? 'selected' : '' }}>
                            {{ $course->course_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
