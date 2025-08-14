@extends('layouts.admin')

@section('title', 'Courses')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Courses</h1>
        <a href="{{ route('course.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-lg"></i> Add Course
        </a>
    </div>

    @if($courses->isEmpty())
        <div class="alert alert-info text-center">No courses available. Add new courses to get started.</div>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($courses as $course)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $course->name }}</h5>

                            <p class="card-text text-truncate">
                                {{ $course->description ?? 'No description provided.' }}
                            </p>

                            <p>
                                <strong>Professor:</strong>
                                @if($course->professor)
                                    {{ $course->professor->name }}
                                @else
                                    <span class="text-muted">No professor assigned</span>
                                @endif
                            </p>

                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('course.show', $course->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('course.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');" class="mb-0">
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
