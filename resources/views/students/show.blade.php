@extends('layouts.app')

@section('content')
<div class="container py-4" style="max-width: 1000px;">

    <div id="print-area" class="card shadow-sm" 
         style="background-color: #f6faf6; border: 2px solid #cfe3cf; color: black;">
        <div class="card-body">

            {{-- Student Info Table --}}
            <table class="table table-bordered text-center align-middle" 
                   style="border-color: black; color: black; background-color: #d4e9d4;">
                <thead style="background-color: #b9dcb9; color: black;">
                    <tr>
                        <th>Student number</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year & Section</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="color: black;">
                        <td>{{ $student->student_number }}</td>
                        <td>{{ $student->first_name }} {{ $student->middle_name ? $student->middle_name . ' ' : '' }}{{ $student->last_name }}</td>
                        <td>{{ strtoupper($student->course->course_name ?? 'N/A') }}</td>
                        <td>{{ $student->year_section ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>

            {{-- Subjects Table --}}
            @php
                $totalUnits = $student->subjects->sum('units');
                $averageGrade = $student->subjects->count() > 0
                    ? number_format($student->subjects->avg('grade'), 2)
                    : '—';
            @endphp

            <table class="table table-bordered text-center align-middle mt-4" 
                   style="border-color: black; color: black; background-color: #d4e9d4;">
                <thead style="background-color: #b9dcb9; color: black;">
                    <tr>
                        <th>Code</th>
                        <th>Unit</th>
                        <th>Subject</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($student->subjects as $subject)
                        <tr style="color: black;">
                            <td>{{ $subject->subject_code }}</td>
                            <td>{{ $subject->units }}</td>
                            <td>{{ $subject->subject_name }}</td>
                            <td>{{ $subject->grade ?? '—' }}</td>
                        </tr>
                    @empty
                        <tr style="color: black;">
                            <td colspan="4">No subjects enrolled.</td>
                        </tr>
                    @endforelse

                    @if($student->subjects->count() > 0)
                    <tr style="font-weight: bold; background-color: #b9dcb9; color: black;">
                        <td colspan="1" class="text-end">Total Units:</td>
                        <td>{{ $totalUnits }}</td>
                        <td class="text-end">Average Grade:</td>
                        <td>{{ $averageGrade }}</td>
                    </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

    
    <div class="d-flex justify-content-end mt-4 no-print">
      
        <a href="{{ route('students.index') }}" class="btn btn-outline-dark" 
           style="border-color:#6f9e6f; color:black;">
            Back
        </a>
    </div>

</div>



<style>

#print-area, #print-area * {
    color: black !important;
    background: #fff !important;
}
*{
    color:white !important;
}


@media print {
    body, #print-area {
        background: #fff !important;
        color: black !important;
    }

    table, th, td {
        color: black !important;
        border-color: black !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    .navbar, .sidebar, .no-print {
        display: none !important;
    }
}
</style>

@endsection
