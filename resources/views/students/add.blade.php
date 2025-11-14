@extends('layouts.app')
@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Header Card --}}
            <div class="card shadow-sm border-0 mb-3 bg-gradient"
                 style="background: linear-gradient(135deg, #4e54c8, #8f94fb); color: white;">
                <div class="card-body text-center p-2">
                    <p class="mb-1 fw-semibold">
                        Add Subjects for <strong>{{ $student->first_name }} {{ $student->last_name }}</strong>
                    </p>
                    <p class="mb-2 small fw-semibold">
                        <span class="text-warning">{{ $student->course->course_name ?? 'N/A' }}</span>
                    </p>
                    
                </div>
            </div>

            {{-- Subject Assignment Form --}}
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-2">

                    <form action="{{ route('students.subjects.add', $student->id) }}" method="POST">
                        @csrf
                        <h6 class="fw-semibold text-primary border-bottom pb-1 mb-2">
                            Available Subjects
                        </h6>

                        <div class="list-group list-group-flush">
                            @forelse($subjects as $subject)
                                @php
                                    $isAssigned = $student->subjects->contains($subject->id);
                                    $cardClass = $isAssigned ? 'bg-light text-muted' : 'hover-shadow';
                                    $icon = $isAssigned ? 'bi bi-check-circle-fill text-success' : 'bi bi-circle text-secondary';
                                @endphp

                                <label for="subject-{{ $subject->id }}"
                                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ $cardClass }} rounded-2 mb-1 py-1 px-2 small">
                                    <div class="d-flex align-items-center">
                                        <i class="{{ $icon }} me-2"></i>
                                        <span>{{ $subject->subject_name }}</span>
                                        @if($isAssigned)
                                            <span class="badge bg-success ms-2">Assigned</span>
                                        @endif
                                    </div>
                                    <input
                                        class="form-check-input m-0"
                                        type="checkbox"
                                        name="subjects[]"
                                        value="{{ $subject->id }}"
                                        id="subject-{{ $subject->id }}"
                                        {{ $isAssigned ? 'checked disabled' : '' }}
                                    >
                                </label>
                            @empty
                                <div class="list-group-item text-center py-2 small rounded-2">
                                    No available subjects to display.
                                </div>
                            @endforelse
                        </div>

                        @error('subjects')
                            <div class="alert alert-danger mt-2 small p-2">{{ $message }}</div>
                        @enderror

                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-success btn-sm rounded-pill px-3 py-1 shadow-sm">
                                <i class="bi bi-save me-1"></i> Update
                            </button>
                            <a href="{{ route('students.show', $student->id) }}"
                       class="btn btn-outline-blue btn-sm shadow-sm rounded-pill px-3 py-1">
                        <i class="bi bi-arrow-left me-1"></i> Back
                    </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Custom Styles --}}
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
