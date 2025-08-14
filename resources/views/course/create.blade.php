@extends('layouts.admin')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4">Add a Course</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('course.store') }}" method="POST">
                @csrf

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
                    <label for="name" class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                </div>

                <div class="mb-3">
                    <label for="professor_id" class="form-label">Assign Professor</label>
                    <select name="professor_id" id="professor_id" class="form-select">
                        <option value="">-- Select a Professor --</option>
                        @foreach ($professors as $professor)
                            <option value="{{ $professor->id }}" {{ old('professor_id') == $professor->id ? 'selected' : '' }}>
                                {{ $professor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
