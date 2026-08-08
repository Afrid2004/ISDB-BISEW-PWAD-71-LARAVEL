@extends('layouts.backend.app')

@section('title', 'Deleted Students')

@section('content')

<div class="container-fluid">

{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="mb-1">Deleted Students</h3>
        <p class="text-muted mb-0">
            Manage deleted student records
        </p>
    </div>

    <div class="d-flex gap-2">

        {{-- Back to all students --}}
        <a href="{{ route('students.index') }}" class="btn btn-dark">
            All Students
        </a>

        {{-- Create new student --}}
        <a href="{{ route('students.create') }}" class="btn btn-primary">
            + Create Student
        </a>

    </div>

</div>


{{-- Success Message --}}
@if (session('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>
    </div>

@endif


{{-- Search Card --}}
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <form
            class="input-group"
            action="{{ route('students.deleted') }}"
            method="GET"
        >

            {{-- Search input --}}
            <input
                type="text"
                name="search"
                value="{{ old('search', $search) }}"
                class="form-control"
                placeholder="Search deleted students..."
            >

            {{-- Search button --}}
            <button
                type="submit"
                class="btn btn-primary"
            >
                Search
            </button>

            {{-- Clear button --}}
            @if (request('search'))

                <a
                    href="{{ route('students.deleted') }}"
                    class="btn btn-outline-secondary"
                >
                    Clear
                </a>

            @endif

        </form>

    </div>

</div>


{{-- Deleted Students Table --}}
<div class="card border-0 shadow-sm">

    <div class="card-header bg-white border-0 py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h5 class="mb-1">
                    Deleted Student List
                </h5>

                <small class="text-muted">
                    {{ $students->total() }} deleted students found
                </small>
            </div>

            {{-- Deleted badge --}}
            <span class="badge bg-danger">
                Deleted Records
            </span>

        </div>

    </div>


    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="ps-4">#</th>

                        <th>Student</th>

                        <th>Email</th>

                        <th>Batch</th>

                        <th>Photo</th>

                        <th>Status</th>

                        <th>Deleted At</th>

                        <th class="text-end pe-4">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($students as $student)

                        <tr>

                            {{-- Serial number --}}
                            <td class="ps-4 text-muted">
                                {{ $students->firstItem() + $loop->index }}
                            </td>


                            {{-- Student name --}}
                            <td>

                                <div class="d-flex align-items-center gap-2">

                                    <img
                                        src="{{ asset('uploads/' . $student->photo) }}"
                                        width="45"
                                        height="45"
                                        class="rounded-circle border"
                                        style="object-fit: cover;"
                                        alt="{{ $student->name }}"
                                    >

                                    <div>

                                        <div class="fw-semibold">
                                            {{ $student->name }}
                                        </div>

                                        <small class="text-muted">
                                            ID #{{ $student->id }}
                                        </small>

                                    </div>

                                </div>

                            </td>


                            {{-- Email --}}
                            <td>
                                {{ $student->email }}
                            </td>


                            {{-- Batch --}}
                            <td>

                                <span class="badge bg-secondary">
                                    {{ $student->batch }}
                                </span>

                            </td>


                            {{-- Photo --}}
                            <td>

                                <img
                                    src="{{ asset('uploads/' . $student->photo) }}"
                                    width="50"
                                    height="50"
                                    class="rounded border"
                                    style="object-fit: cover;"
                                    alt="{{ $student->name }}"
                                >

                            </td>


                            {{-- Status --}}
                            <td>

                                @if ($student->status)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Inactive
                                    </span>

                                @endif

                            </td>


                            {{-- Deleted date --}}
                            <td>

                                <div>
                                    {{ $student->deleted_at?->format('d M Y') }}
                                </div>

                                <small class="text-muted">
                                    {{ $student->deleted_at?->format('h:i A') }}
                                </small>

                            </td>


                            {{-- Actions --}}
                            <td class="text-end pe-4">

                                <div class="btn-group">

                                    {{-- Restore --}}
                                    <a
                                        href="{{ route('student.restore', $student->id) }}"
                                        class="btn btn-sm btn-success"
                                        title="Restore Student"
                                    >
                                        Restore
                                    </a>


                                    {{-- Permanent Delete --}}
                                    <a
                                        href="{{ route('student.delete', $student->id) }}"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to permanently delete this student?')"
                                        title="Delete Permanently"
                                    >
                                        Delete Permanently
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="8"
                                class="text-center py-5"
                            >

                                <div class="text-muted">

                                    <h5>
                                        No Deleted Students Found
                                    </h5>

                                    <p class="mb-0">
                                        There are no deleted student records.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Pagination --}}
    @if ($students->hasPages())

        <div class="card-footer bg-white border-0">

            <div class="d-flex justify-content-end">

                {{ $students->links() }}

            </div>

        </div>

    @endif

</div>

</div>

@endsection
