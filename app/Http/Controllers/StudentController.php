<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\Course; 

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('students.index', [
            'students' => Student::with('courses')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'courses' => 'array|exists:courses,id',
        ]);

       
        $student = Student::create([
            'fname' => $validated['fname'],
            'lname' => $validated['lname'],
            'email' => $validated['email'],
        ]);

       
        $student->courses()->sync($validated['courses']);

        Session::flash('success', 'Student created successfully.');
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        
        $student->load('courses');
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        
        $courses = \App\Models\Course::all();
        $student->load('courses');
        return view('students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        $student->courses()->sync($request->courses ?? []); // sync to empty if none selected
    
        Session::flash('success', 'Student updated successfully');
        return redirect()->route('students.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        // Reserved for soft delete / trash logic
    }

    // public function destroy($id)
    // {
    //     $student = Student::where('id', $id)->first();
    //     $student->forceDelete();
    //     Session::flash('success', 'Student deleted successfully');
    //     return redirect()->route('students.index');
    // }

    public function destroy(Student $student)
    {
        
        $student->delete();
        return redirect()->route('students.index');
    }

    public function restore($id)
    {
        // Reserved for soft delete restore
    }
}

