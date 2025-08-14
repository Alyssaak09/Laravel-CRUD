@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">
                Update Course
            </h1>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('course.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ old('name', $course->name) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" aria-describedby="description" value="{{ old('description', $course->description) }}">
            </div>

            {{--Professor Select Dropdown --}}
            <div class="mb-3">
                <label for="professor_id" class="form-label">Professor</label>
                <select class="form-select" id="professor_id" name="professor_id" required>
                    <option value="" disabled {{ old('professor_id', $course->professor_id) ? '' : 'selected' }}>Select a Professor</option>
                    @foreach($professors as $professor)
                        <option value="{{ $professor->id }}" {{ old('professor_id', $course->professor_id) == $professor->id ? 'selected' : '' }}>
                            {{ $professor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

