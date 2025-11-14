@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> Please fix the following errors:</strong>
        <ul class="mt-2 mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-dark text-light text-center">
                    <h3 class="mb-0">Student Registration Form</h3>
                </div>
                <div class="card-body bg-dark text-light">

                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf

                        {{-- Personal Information --}}
                        <h5 class="mb-3">Personal Information</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" name="middle_name" id="middle_name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="student_number" class="form-label">Student Number</label>
                                <input type="text" name="student_number" id="student_number" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="year_section" class="form-label">Year & Section</label>
                                <input type="text" name="year_section" id="year_section" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-select" required>
                                    <option value="">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                            </div>
                        </div>

                        {{-- Contact Information --}}
                        <h5 class="mb-3">Contact Information</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="contact_number" class="form-label">Contact Number</label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" id="address" class="form-control">
                            </div>
                        </div>

                        {{-- Academic Information --}}
                        <h5 class="mb-3">Academic Information</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="courseSelect" class="form-label">Course</label>
                                <select name="course_id" id="courseSelect" class="form-select" required>
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->course_code }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div >
                                <label class="form-label">Subjects</label>
                                <div id="subjectsContainer" class="row g-2">
                                    
                                </div>
                                <div class="form-text">Check the subjects for the selected course</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.getElementById('courseSelect').addEventListener('change', function() {
    let courseId = this.value;
    const container = document.getElementById('subjectsContainer');
    container.innerHTML = ''; 

    if (!courseId) return;

    fetch(`/courses/${courseId}/subjects`) 
        .then(res => res.json())
        .then(subjects => {
            if(subjects.length === 0){
                container.innerHTML = '<div class="col-12"><p class="text-muted">No subjects available for this course.</p></div>';
            } else {
                subjects.forEach(subject => {
                    container.innerHTML += `
                    <div class="col-6">
                        <div>
                            <input style="margin:20px; " class="form-check-input" type="checkbox" name="subjects[]" value="${subject.id}" id="subject-${subject.id}">
                            <label class="form-check-label fw-medium ms-2" for="subject-${subject.id}" >
                                ${subject.subject_name}
                            </label>
                        </div>
                    </div>`;
                });
            }
        });
});
</script>

{{-- Optional Hover Shadow --}}
<style>
.hover-shadow:hover {
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
}
</style>

@endsection
