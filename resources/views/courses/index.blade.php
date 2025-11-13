@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3 align-items-center">
    <h2 class="h5 text-light">Courses</h2>
    <a href="{{ route('courses.create') }}" class="btn btn-success btn-sm">
        Add Course
    </a>
</div>

<div class="table-responsive bg-dark rounded p-2">
    <table class="table table-dark table-hover table-bordered mb-0 text-center">
        <thead>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">
                                View
                            </a>

                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm text-dark">
                                Edit
                            </a>

                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Delete course?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-muted text-center">No courses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


@if ($courses->hasPages())
<div class="mt-3 d-flex justify-content-center">
    <div class="bg-dark p-2 px-3 rounded shadow-sm" style="margin-right:100px;">
        {{ $courses->links('pagination::bootstrap-5') }}
    </div>
</div>

@endif
@endsection

