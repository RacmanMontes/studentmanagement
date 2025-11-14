<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

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
        $student->subjects()->sync($request->subject_ids ?? []);
        return redirect()->route('students.index')->with('success', 'Subjects updated successfully');
    }

    
    public function addSubjectsForm(Student $student)
{
   
    $subjects = Subject::where('course_id', $student->course_id)->get();

    return view('students.add', compact('student', 'subjects'));
}


   
    public function addSubjects(Request $request, Student $student)
    {
        $request->validate([
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

       
        $newSubjects = $request->subjects;

        
        $currentSubjects = $student->subjects()->pluck('subjects.id')->toArray(); 

        
        $subjectsToAttach = array_diff($newSubjects, $currentSubjects);

        if (!empty($subjectsToAttach)) {
            $student->subjects()->attach($subjectsToAttach);

           
            foreach ($subjectsToAttach as $subjectId) {
                ActivityLog::create([
                    'student_id' => $student->id,
                    'subject_id' => $subjectId,
                    'action' => 'add'
                ]);
            }
        }

        return redirect()->route('students.show', $student->id)
            ->with('success', 'Subjects added successfully.');
    }

   
    public function dropSubjectsForm(Student $student)
    {
        $subjects = $student->subjects;
        return view('students.drop', compact('student', 'subjects'));
    }

    
    public function dropSubjects(Request $request, Student $student)
    {
        $request->validate([
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $subjectsToDetach = $request->subjects;

        if (!empty($subjectsToDetach)) {
            $student->subjects()->detach($subjectsToDetach);

          
            foreach ($subjectsToDetach as $subjectId) {
                ActivityLog::create([
                    'student_id' => $student->id,
                    'subject_id' => $subjectId,
                    'action' => 'drop'
                ]);
            }
        }

        return redirect()->route('students.show', $student->id)
            ->with('success', 'Subjects dropped successfully.');
    }
}
