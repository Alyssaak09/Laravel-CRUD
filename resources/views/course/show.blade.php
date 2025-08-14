@extends('layouts.admin')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-2">Course Display</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->name }}</h5>

                    <p class="card-text">
                        <strong>Description:</strong><br>
                        {{ $course->description ?? 'No description provided.' }}
                    </p>

                    <p class="card-text">
                        <strong>Professor:</strong><br>
                        @if($course->professor)
                            {{ $course->professor->name }}
                        @else
                            <span class="text-muted">No professor assigned</span>
                        @endif
                    </p>

                    <a href="{{ route('course.index') }}" class="btn btn-secondary mt-3">← Back to Courses</a>
                </div>
            </div>
        </div>
    </div>
@endsection
