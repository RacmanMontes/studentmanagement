<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    public function edit(Student $student)
    {
        $subjects = Subject::where('course_id', $student->course_id)->get();
        $studentSubjects = $student->subjects->pluck('id')->toArray();

        return view('students.assign-subjects', compact('student','subjects','studentSubjects'));
    }

    public function update(Request $request, Student $student)
    {
        $student->subjects()->sync($request->subject_ids);
        return redirect()->route('students.index')->with('success', 'Subjects assigned successfully');
    }
}
