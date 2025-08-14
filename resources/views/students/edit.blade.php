@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h1 class="display-4">Update Student Profile</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname', $student->fname) }}">
            </div>

            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" value="{{ old('lname', $student->lname) }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Enrolled Courses</label>
                @if ($courses->count() > 0)
                    @foreach ($courses as $course)
                        <div class="form-check">
                            <input 
                                class="form-check-input" 
                                type="checkbox" 
                                name="courses[]" 
                                value="{{ $course->id }}"
                                id="course_{{ $course->id }}"
                                {{ in_array($course->id, old('courses', $student->courses->pluck('id')->toArray())) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="course_{{ $course->id }}">
                                {{ $course->name }}
                            </label>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">Courses: None enrolled</p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
