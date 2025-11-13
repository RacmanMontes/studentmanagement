<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
   public function index(Request $request)
{
    $query = Subject::with('course');

    if ($request->filled('course_id')) {
        $query->where('course_id', $request->course_id);
    }

    $subjects = $query->paginate(10)->withQueryString();
    $courses = \App\Models\Course::all();

    return view('subjects.index', compact('subjects', 'courses'));
}


    public function create()
    {
        $courses = Course::all();
        return view('subjects.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_code' => 'required|unique:subjects',
            'subject_name' => 'required',
            'units' => 'required|integer',
            'course_id' => 'required',
        ]);

        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success','Subject created');
    }
     public function show(Subject $subject)
{
    $subject->load('course');
    return view('subjects.show', compact('subject'));
}


    public function edit(Subject $subject)
    {
        $courses = Course::all();
        return view('subjects.edit', compact('subject','courses'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'subject_code' => 'required|unique:subjects,subject_code,' . $subject->id,
            'subject_name' => 'required',
            'units' => 'required|integer',
            'course_id' => 'required',
        ]);

        $subject->update($request->all());
        return redirect()->route('subjects.index')->with('success','Subject updated');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success','Subject deleted');
    }
}
