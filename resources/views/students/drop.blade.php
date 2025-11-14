@extends('layouts.app')
@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Header Card --}}
            <div class="card shadow-sm border-0 mb-3 bg-gradient"
                 style="background: linear-gradient(135deg, #ff758c, #ff7eb3); color: white;">
                <div class="card-body text-center p-2">
                    <p class="mb-1 fw-semibold">
                        Drop Subjects for <strong>{{ $student->first_name }} {{ $student->last_name }}</strong>
                    </p>
                    <a href="{{ route('students.show', $student->id) }}"
                       class="btn btn-outline-light btn-sm shadow-sm rounded-pill px-3 py-1">
                        <i class="bi bi-arrow-left me-1"></i> Back
                    </a>
                </div>
            </div>

            {{-- Drop Subjects Form --}}
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-2">

                    <form action="{{ route('students.subjects.drop', $student->id) }}" method="POST">
                        @csrf
                        <h6 class="fw-semibold text-danger border-bottom pb-1 mb-2">
                            Current Subjects
                        </h6>

                        <div class="list-group list-group-flush" style="max-height: 300px; overflow-y: auto;">
                            @forelse($student->subjects as $subject)
                                <label for="subject-{{ $subject->id }}"
                                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center hover-shadow rounded-2 mb-1 py-1 px-2 small">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-bookmark-fill text-primary me-2"></i>
                                        <span>{{ $subject->subject_name }}</span>
                                        <span class="badge bg-warning ms-2">Assigned</span>
                                    </div>
                                    <input
                                        class="form-check-input m-0"
                                        type="checkbox"
                                        name="subjects[]"
                                        value="{{ $subject->id }}"
                                        id="subject-{{ $subject->id }}"
                                    >
                                </label>
                            @empty
                                <div class="list-group-item text-center py-2 small rounded-2">
                                    No subjects assigned yet.
                                </div>
                            @endforelse
                        </div>

                        @error('subjects')
                            <div class="alert alert-danger mt-2 small p-2">{{ $message }}</div>
                        @enderror

                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3 py-1 shadow-sm">
                                <i class="bi bi-trash me-1"></i> Drop Selected
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Optional Custom Styles --}}
<style>
.hover-shadow:hover {
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: all 0.2s ease;
}
.card-body, .list-group-item, button, p, h6 {
    line-height: 1.2;
}
</style>
@endsection
