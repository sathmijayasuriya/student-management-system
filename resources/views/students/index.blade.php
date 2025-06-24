@extends('layouts.app')
@section('content')
    <x-breadcrumb :items="[
        ['label' => 'Students', 'url' => route('students.index')],
        ['label' => 'lists', 'url' => route('students.index')],
    ]" />
    <div class="bg-gray-100 rounded py-5 px-20">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('students.create') }}" class="btn btn-outline-primary">
                + Add Student
            </a>

            <form method="GET" action="{{ route('students.index') }}" class="d-flex">
                <input type="text" name="search" placeholder="Search..." class="form-control me-2">
                <button class="btn btn-outline-grey-s">Search</button>
            </form>
        </div>


        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead class="bg-gray-150 ">
                <tr>
                    <th class="p-4 text-left">Name</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Course</th>
                    <th class="p-4 text-left">Added By</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="border-t cursor-pointer"
                        onclick="openViewModal({{ $student->id }}, '{{ $student->name }}', '{{ $student->email }}', '{{ $student->course }}', '{{ $student->age }}')">
                        <td class="p-3">{{ $student->name }}</td>
                        <td class="p-3">{{ $student->email }}</td>
                        <td class="p-3">{{ $student->course }}</td>
                        <td class="p-3">{{ $student->addedBy?->first_name ?? 'N/A' }}</td>

                        <td class="p-3 text-right space-x-4">
                            <button class="btn btn-light btn-sm" 
                                style="background-color: transparent !important; border-color: #ffffff !important; color: #000000 !important;"
                                onclick="event.stopPropagation(); openEditModal({{ $student->id }}, '{{ $student->name }}', '{{ $student->email }}', '{{ $student->course }}', '{{ $student->age }}')">
                                <i class="ti ti-pencil"></i>
                                Edit
                            </button>
                            <button href="javascript:void(0);"
                                onclick="event.stopPropagation(); openDeleteModal({{ $student->id }}, '{{ $student->name }}')"
                                class="btn btn-outline-danger btn-sm ">
                                <i class="ti ti-trash"></i>
                                Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            @include('students.delete')
            <script>
                // Hide success alert
                setTimeout(function() {
                    let alert = document.getElementById('success-alert');
                    if (alert) {
                        alert.classList.remove('show');
                        alert.classList.add('fade');
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 1000);
            </script>
            @include('students.edit')
            @include('students.view')
        @endsection
