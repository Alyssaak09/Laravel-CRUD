@extends('layouts.admin')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4">All Courses</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('course.create') }}" class="btn btn-success">+ Add Course</a>
        </div>
    </div>

    <div class="row">
        @forelse($course as $cours)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cours->name }}</h5>
                        <p class="card-text">{{ $cours->description }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('course.show', $cours->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('course.edit', $cours->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('course.destroy', $cours->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
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
                <div class="alert alert-info">No courses found.</div>
            </div>
        @endforelse
    </div>
@endsection
