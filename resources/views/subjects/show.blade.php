@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mx-auto" style="max-width: 500px;">
        <h2 class="mb-4 text-center text-light">Subject Details</h2>

        <div class="bg-dark p-4 rounded shadow border border-secondary mb-3">
            <div class="text-light mb-2"><strong>Code:</strong> {{ $subject->subject_code }}</div>
            <div class="text-light mb-2"><strong>Name:</strong> {{ $subject->subject_name }}</div>
            <div class="text-light mb-2"><strong>Units:</strong> {{ $subject->units }}</div>
            <div class="text-light"><strong>Course:</strong> {{ $subject->course->course_name }}</div>
        </div>

        <a href="{{ route('subjects.index') }}" class="btn btn-secondary w-100">Back</a>
    </div>
</div>
@endsection
