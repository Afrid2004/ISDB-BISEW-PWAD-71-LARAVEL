@extends('layouts.backend.app')

@section('title', 'Deleted Students')

@section('content')

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-1">Deleted Students</h3>
                <p class="text-muted mb-0">
                    Manage deleted student records
                </p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('students.index') }}" class="btn btn-dark">
                    All Students
                </a>
                <a href="{{ route('students.create') }}" class="btn btn-primary">
                    + Create Student
                </a>
            </div>

        </div>


        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success fade show">
                {{ session('success') }}
            </div>
        @endif


        {{-- Search Card --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <form class="input-group" method="GET">
                    <input type="text" name="search" value="{{ old('search', $search) }}" class="form-control"
                        placeholder="Search deleted students...">
                    <button type="submit" class="btn btn-primary">
                        Search
                    </button>
                    @if (request('search'))
                        <a href="{{ route('students.deleted') }}" class="btn btn-outline-secondary">
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

                </div>

            </div>


            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped border align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Id</th>
                                <th>Student</th>
                                <th>Email</th>
                                <th>Batch</th>
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
                                    <td class="ps-4 text-muted">
                                        {{ $students->firstItem() + $loop->index }}
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="{{ asset('uploads/' . $student->photo) }}" width="45"
                                                height="45" class="rounded-circle border" style="object-fit: cover;"
                                                alt="{{ $student->name }}">
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
                                    <td>
                                        {{ $student->email }}
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ $student->batch }}
                                        </span>
                                    </td>
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
                                            <a href="{{ route('students.restore', $student->id) }}"
                                                class="btn btn-sm btn-success" title="Restore Student">
                                                Restore
                                            </a>
                                            {{-- Permanent Delete --}}
                                            <form action="{{ route('students.delete', $student->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to permanently delete this student?')"
                                                    title="Delete Permanently">
                                                    Delete Permanently
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5">
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
            <div class="card-footer bg-white border-0">
                <div class="d-flex justify-content-end">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
