@extends('layouts.app')

@section('content')
<div class="container py-4" style="margin-top:-15px;">

 
   <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 no-print">
        <div class="d-flex align-items-center gap-3">
           

            
            <form method="GET" action="{{ route('students.index') }}" class="d-flex align-items-center">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control form-control-sm bg-dark text-light border-secondary" 
                    placeholder="Search..." 
                    value="{{ request('search') }}"
                    style="width: 200px; height:5px; border-radius:5px; color: white;"
                >
            </form>
        </div>

       
        <div class="d-flex flex-wrap align-items-center gap-2">

            <form method="GET" action="{{ route('students.index') }}" id="filterForm" class="d-flex align-items-center gap-2">
                <select name="course_year" id="course_year" class="form-select form-select-sm bg-dark text-light border-secondary" style="width:150px;">
                    <option value="">All Students</option>
                    @foreach($mergedOptions as $option)
                        <option value="{{ $option }}" {{ request('course_year') == $option ? 'selected' : '' }}>
                            {{ $option }}
                        </option>
                    @endforeach
                </select>
            </form>

            <script>
                
                document.getElementById('course_year').addEventListener('change', function() {
                    document.getElementById('filterForm').submit();
                });
            </script>

            <form method="GET" action="{{ route('students.index') }}" id="filterForm" class="d-flex flex-wrap align-items-center gap-2">
              

             


                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm no-print">
                    + Add Student
                </a>
                
            </form>
        </div>
    </div>

  
   <div id="print-area">
        <div class="row g-4">
            @foreach ($students as $student)
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card bg-dark text-light border-secondary shadow-sm student-card">
                    <div class="card-body">

                        <table class="table table-bordered table-dark table-sm mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>Student #</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Yr & Sec</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>{{ $student->student_number }}</td>
                                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                    <td>{{ $student->course->course_code }}</td>
                                    <td>{{ $student->year_section }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="subject-table-wrapper">
                            <table class="table table-bordered table-dark table-sm mb-0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Code</th>
                                        <th>Unit</th>
                                        <th>Subject</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($student->subjects as $subject)
                                    <tr class="text-center">
                                        <td>{{ $subject->subject_code }}</td>
                                        <td>{{ $subject->units }}</td>
                                        <td>{{ $subject->subject_name }}</td>
                                        <td>{{ $subject->pivot->grade ?? '—' }}</td>
                                    </tr>
                                    @empty
                                    <tr class="text-center text-muted">
                                        <td colspan="4">No subjects</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    
                        <div class="student-actions no-print mt-2" >
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm text-whie">Edit</a>
                             <a href="" class="btn btn-success btn-sm text-white">Add</a>
                              <a href="" class="btn btn-danger btn-sm text-white">Drop</a>
                           
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
   </div>

   
    <div class="mt-4 d-flex justify-content-center bg-dark p-2 rounded no-print">
        {{ $students->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>


@endsection
