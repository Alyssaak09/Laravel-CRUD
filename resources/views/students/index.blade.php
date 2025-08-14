@extends('layouts.admin')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4">All Students</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('students.create') }}" class="btn btn-success">+ Add Student</a>
        </div>
    </div>

    <div class="row">
        @forelse($students as $student)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $student->fname }} {{ $student->lname }}</h5>
                        <p class="card-text"><strong>Email:</strong> {{ $student->email }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-info">No students found.</div>
            </div>
        @endforelse
    </div>
@endsection


