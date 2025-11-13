@extends('layouts.app')

@section('content')


<div class="page-container" style="margin-top:-30px;">
    <div class="content-section container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            
            <h2 class="h5 text-light mb-0">Subjects</h2>
            
            <div class="d-flex align-items-center gap-2">
               
                <form method="GET" action="{{ route('subjects.index') }}" id="courseFilterForm" class="mb-0">
                    <select name="course_id" class="form-select form-select-sm bg-dark text-light border-secondary" onchange="this.form.submit()" style="width:110px;">
                        <option value="">All Courses</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                                {{ $course->course_name }}
                            </option>
                        @endforeach
                    </select>
                </form>

                
                <a href="{{ route('subjects.create') }}" class="btn btn-success btn-sm">
                    Add Subject
                </a>
            </div>

        </div>
    </div>
</div>



        <div class="table-responsive bg-dark rounded p-2 mb-4">
            <table class="table table-dark table-hover table-bordered mb-0 text-center">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Name</th>
                        <th>Units</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subjects as $s)
                        <tr>
                            <td>{{ $s->subject_code }}</td>
                            <td>{{ $s->subject_name }}</td>
                            <td>{{ $s->units }}</td>
                            <td>{{ $s->course->course_name }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('subjects.show', $s->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('subjects.edit', $s->id) }}" class="btn btn-warning btn-sm text-dark">Edit</a>
                                    <form action="{{ route('subjects.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Delete subject?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-muted text-center">No subjects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($subjects->hasPages())
        <div class="pagination-wrapper" style="margin-right:45%;">
            {{ $subjects->links('pagination::bootstrap-5') }}
        </div>
    @endif

</div>
@endsection
