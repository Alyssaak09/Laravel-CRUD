@extends('layouts.admin')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4">Student Profile</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $student->fname }} {{ $student->lname }}</h5>
                    
                    <p class="card-text">
                        <strong>Email:</strong> {{ $student->email }}
                    </p>

                    <p class="card-text">
                        <strong>Courses:</strong><br>
                        @if ($student->courses->isNotEmpty())
                            @foreach ($student->courses as $course)
                                <span class="badge bg-primary">{{ $course->name }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">None enrolled</span>
                        @endif
                    </p>

                    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">← Back to Students</a>
                </div>
            </div>
        </div>
    </div>
@endsection
