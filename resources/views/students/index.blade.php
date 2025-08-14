@extends('layouts.admin')

@section('title', 'Students')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Students</h1>
        <a href="{{ route('students.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-lg"></i> Add Student
        </a>
    </div>

    @if($students->isEmpty())
        <div class="alert alert-info text-center">No students found. Start by adding a new student.</div>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($students as $student)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $student->fname }} {{ $student->lname }}</h5>
                            <p class="card-text text-truncate"><strong>Email:</strong> {{ $student->email }}</p>
                            <p>
                                <strong>Courses:</strong>
                                @if($student->courses->count())
                                    @foreach ($student->courses as $course)
                                        <span class="badge bg-secondary me-1">{{ $course->name }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">None enrolled</span>
                                @endif
                            </p>

                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');" class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection



