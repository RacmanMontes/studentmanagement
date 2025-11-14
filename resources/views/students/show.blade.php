@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 1000px;">

    {{-- Header --}}
    <div class="card shadow-lg border-0 mb-4 bg-gradient" style="background: linear-gradient(135deg, #4e54c8, #8f94fb); color: white;">
        <div class="card-body text-center">
            <h2 class="fw-bold mb-2"><i class="bi bi-person-badge me-2"></i>Student Profile</h2>
            <p class="lead mb-0">{{ $student->first_name }} {{ $student->middle_name ? $student->middle_name . ' ' : '' }}{{ $student->last_name }}</p>
        </div>
    </div>

    {{-- Student Info Card --}}
    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">
            <div class="row text-center text-md-start">
                <div class="col-md-3 mb-3 mb-md-0">
                    <h6 class="text-muted">Student Number</h6>
                    <p class="fw-semibold">{{ $student->student_number }}</p>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <h6 class="text-muted">Course</h6>
                    <p class="fw-semibold">{{ strtoupper($student->course->course_name ?? 'N/A') }}</p>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <h6 class="text-muted">Year & Section</h6>
                    <p class="fw-semibold">{{ $student->year_section ?? 'N/A' }}</p>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <h6 class="text-muted">Total Units</h6>
                    <p class="fw-semibold">{{ $student->subjects->sum('units') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Subjects & Grades Table --}}
    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">

            @php
                $totalUnits = $student->subjects->sum('units');
                $averageGrade = $student->subjects->count() > 0
                    ? number_format($student->subjects->avg('grade'), 2)
                    : '—';
            @endphp

            <h4 class="mb-3 fw-semibold text-primary border-bottom pb-2">Enrolled Subjects</h4>

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center table-black-text">
                    <thead class="table-primary">
                        <tr>
                            <th>Code</th>
                            <th>Units</th>
                            <th>Subject</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($student->subjects as $subject)
                            <tr>
                                <td>{{ $subject->subject_code }}</td>
                                <td>{{ $subject->units }}</td>
                                <td class="text-start ps-4">{{ $subject->subject_name }}</td>
                                <td>
                                    @if($subject->grade !== null)
                                        <span class="badge bg-success">{{ $subject->grade }}</span>
                                    @else
                                        <span class="badge bg-secondary">—</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No subjects enrolled.</td>
                            </tr>
                        @endforelse
                        @if($student->subjects->count() > 0)
                            <tr class="fw-bold table-secondary">
                                <td class="text-end">Total Units:</td>
                                <td>{{ $totalUnits }}</td>
                                <td class="text-end">Average Grade:</td>
                                <td>{{ $averageGrade }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="d-flex justify-content-end mb-5">
        <a href="{{ route('students.index') }}" 
   class="btn btn-outline-dark me-2 shadow-sm" 
   style="color: white !important; border-color: green !important;">
    <i class="bi bi-arrow-left me-1"></i> Back
</a>

        <a href="{{ route('students.logs', $student->id) }}" class="btn btn-warning shadow-sm">
            <i class="bi bi-card-list me-1"></i> View Activity Logs
        </a>
    </div>

</div>

{{-- Custom Styles for Black Table Text --}}
<style>
.table-black-text th,
.table-black-text td {
    color: black !important;
}
</style>
@endsection
