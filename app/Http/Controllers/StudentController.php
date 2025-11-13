<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;


class StudentController extends Controller
{
   
public function index(Request $request)
{
    $query = Student::query();

    // Search filter (case-insensitive)
    if ($request->filled('search')) {
        $search = strtolower($request->search);
        $query->where(function($q) use ($search) {
            $q->whereRaw('LOWER(first_name) LIKE ?', ["%{$search}%"])
              ->orWhereRaw('LOWER(last_name) LIKE ?', ["%{$search}%"])
              ->orWhereRaw('LOWER(student_number) LIKE ?', ["%{$search}%"])
              ->orWhereRaw('LOWER(year_section) LIKE ?', ["%{$search}%"])
              ->orWhereHas('course', function($q2) use ($search) {
                  $q2->whereRaw('LOWER(course_name) LIKE ?', ["%{$search}%"])
                     ->orWhereRaw('LOWER(course_code) LIKE ?', ["%{$search}%"]);
              });
        });
    }

    // Merged Course + Year filter
    if ($request->filled('course_year')) {
        $parts = explode(' ', $request->course_year, 2); // e.g., "BSIT 1A"
        $course_code = $parts[0] ?? null;
        $year_section = $parts[1] ?? null;

        if ($course_code) {
            $query->whereHas('course', function($q) use ($course_code) {
                $q->where('course_code', $course_code);
            });
        }

        if ($year_section) {
            $query->where('year_section', $year_section);
        }
    }

    // Load relations and paginate
    $students = $query->with('course', 'subjects')->paginate(10)->withQueryString();

    // Build merged options for dropdown (all distinct course+year)
    $mergedOptions = Student::with('course')
        ->get()
        ->map(function($s) {
            return $s->course->course_code . ' ' . $s->year_section;
        })
        ->unique()
        ->values()
        ->toArray();

    return view('students.index', compact('students', 'mergedOptions'));
}




   public function create()
{
    $courses = Course::all();
    $subjects = Subject::all();
    $yearSections = ['1st Year', '2nd Year', '3rd Year', '4th Year'];

    return view('students.create', compact('courses', 'subjects', 'yearSections'));
}

   
    public function store(Request $request)

    {   
        //dd($request->all());
       // dd($request->subjects);


        $data = $request->validate([
            'student_number' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'contact_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'year_section' => 'nullable|string|max:50',
            'course_id' => 'required|exists:courses,id',
            'subjects' => 'nullable|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $student = Student::create($data);

        if ($request->has('subjects')) {
            $student->subjects()->attach($request->subjects);
        }

        return redirect()->route('students.index');
    }

   
    public function show(Student $student)
    {
        $student->load('course', 'subjects');
        return view('students.show', compact('student'));
    }

    public function print()
    {
        
        $students = Student::with(['course', 'subjects'])->get();
        return view('students.print', compact('students'));
    }


   
    public function edit(Student $student)
    {
        $courses = Course::all();
        $subjects = Subject::all();
        $student->load('subjects'); 

        return view('students.edit', compact('student', 'courses', 'subjects'));
    }

    
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'student_number' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'contact_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'year_section' => 'nullable|string|max:50',
            'course_id' => 'required|exists:courses,id',
            'subjects' => 'nullable|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $student->update($data);

        
        $student->subjects()->sync($request->subjects ?? []);

        return redirect()->route('students.index');
    }
            public function getSubjects($courseId)
        {
            $subjects = Subject::where('course_id', $courseId)->get();
            return response()->json($subjects);
        }

    
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
