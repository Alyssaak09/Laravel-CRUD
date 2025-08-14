<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Professor;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('professor')->get();  

        return view('course.index', compact('courses'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professors = \App\Models\Professor::all();
        return view('course.create', compact('professors'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());

        Session::flash('success', 'Course added successfully');
        return redirect() -> route('course.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('course.show', compact('course'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $professors = Professor::all();  
        return view('course.edit', compact('course', 'professors'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->validated();

        if ($request->has('professor_id')) {
            $data['professor_id'] = $request->input('professor_id');
        }

        $course->update($data);

        Session::flash('success', 'Course updated successfully');
        return redirect()->route('course.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
     
    }

   // public function destroy($id)
   // {
      //$student = Student::where('id', $id) -> first();
      //$student -> forceDelete();
      //Session::Flash('sucess', 'Student deleted successfully');
     // return redirect() -> route('students.index');  
  //  }

  public function destroy(Course $course)
  {
    $course->delete();
    return redirect()->route('course.index');
  }

    public function restore($id)
    {
       
    }
}

