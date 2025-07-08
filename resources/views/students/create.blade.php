@extends('layouts.app')

@section('content')

    <x-breadcrumb :items="[
        ['label' => 'Students', 'url' => route('students.index')],
        ['label' => 'lists', 'url' => route('students.index')],
        ['label' => 'create', 'url' => route('students.create')],
    ]" />
    <div class="card">
        <div class="card-body">
            {{--  form --}}
            <div class="body-wrapper-inner">
                <h5 class="card-title fw-semibold mb-4">Add New Student Record</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('students.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Student Name</label>
                                <input type="name" class="form-control" id="name" aria-describedby="emailHelp"
                                    name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                    name="email" value="{{ old('email') }}" required>
                                <div id="emailHelp" class="form-text">Please enter a valid student email address
                                </div>
                                   @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="course" class="form-label">Select Course</label>
                                <select class="form-select" id="course" name="course" required>
                                    <option value="" disabled selected>Select a course</option>
                                    <option value="Computer Science"
                                        {{ old('course') == 'Computer Science' ? 'selected' : '' }}>Computer
                                        Science</option>
                                    <option value="Information Technology"
                                        {{ old('course') == 'Information Technology' ? 'selected' : '' }}>
                                        Information Technology</option>
                                    <option value="Business Management"
                                        {{ old('course') == 'Business Management' ? 'selected' : '' }}>
                                        Business Management</option>
                                    <option value="Electrical Engineering"
                                        {{ old('course') == 'Electrical Engineering' ? 'selected' : '' }}>
                                        Electrical Engineering</option>
                                    <option value="Mechanical Engineering"
                                        {{ old('course') == 'Mechanical Engineering' ? 'selected' : '' }}>
                                        Mechanical Engineering</option>
                                    <option value="Civil Engineering"
                                        {{ old('course') == 'Civil Engineering' ? 'selected' : '' }}>Civil
                                        Engineering</option>
                                    <option value="Cyber security"
                                        {{ old('course') == 'Cyber security' ? 'selected' : '' }}>Cyber security
                                    </option>
                                    <option value="Interactive Media"
                                        {{ old('course') == 'Interactive Media' ? 'selected' : '' }}>Interactive Media
                                    </option>
                                    <option value="Data Science" {{ old('course') == 'Data Science' ? 'selected' : '' }}>
                                        Data Science
                                    </option>
                                    <option value="Software Engineering"
                                        {{ old('course') == 'Software Engineering' ? 'selected' : '' }}>Software
                                        Engineering</option>
                                    <option value="Artificial Intelligence"
                                        {{ old('course') == 'Artificial Intelligence' ? 'selected' : '' }}>
                                        Artificial Intelligence</option>
                                    <option value="Accounting" {{ old('course') == 'Accounting' ? 'selected' : '' }}>
                                        Accounting
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age"
                                    value="{{ old('age') }}" required>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Add Student</button>
                        </form>
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
