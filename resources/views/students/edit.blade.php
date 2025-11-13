@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
           <div class="card shadow-sm border-2">
                <div class="card shadow-sm border-2">
                    <div class="card-header bg-dark text-light text-center">
                        <h3 class="mb-0">Edit Student Information</h3>
                    </div>
                </div>
                <div class="card-body bg-dark text-light">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Section 1: Personal Info -->
                        <h5 class="mb-3">Personal Information</h5>
                        <div class="row g-3 mb-4">
                            

                            <div class="col-md-4">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $student->first_name }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ $student->middle_name }}">
                            </div>
                            <div class="col-md-4">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $student->last_name }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="student_number" class="form-label">Student Number</label>
                                <input type="text" name="student_number" id="student_number" class="form-control" value="{{ $student->student_number }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="year_section" class="form-label">Year & Section</label>
                                <input type="text" name="year_section" id="year_section" class="form-control" value="{{ $student->year_section }}">
                            </div>

                            <div class="col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-select" required>
                                    <option value="">Select</option>
                                    <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $student->date_of_birth }}">
                            </div>
                        </div>

                        <!-- Section 2: Contact Info -->
                        <h5 class="mb-3">Contact Information</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="contact_number" class="form-label">Contact Number</label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ $student->contact_number }}">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ $student->address }}">
                            </div>
                        </div>

                        <!-- Section 3: Academic Info -->
                        <h5 class="mb-3">Academic Information</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="courseSelect" class="form-label">Course</label>
                                <select name="course_id" id="courseSelect" class="form-select" required>
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>
                                            {{ $course->course_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="subjectSelect" class="form-label">Subjects</label>
                                <select name="subjects[]" id="subjectSelect" class="form-select" multiple>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ $student->subjects->contains($subject->id) ? 'selected' : '' }}>
                                            {{ $subject->subject_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">Hold Ctrl (Cmd on Mac) to select multiple subjects</div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
