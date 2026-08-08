
@extends('layouts.backend.app')

@section('title', 'Edit Student')

@section('content')

    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="mb-1">Edit Student</h3>
                <p class="text-muted mb-0">
                    Update student information
                </p>
            </div>

            <a href="{{ route('students.index') }}" class="btn btn-dark">
                Back to Students
            </a>

        </div>

        @if ($errors->any())
            <div>
                <ul class="mb-2">
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- Edit Student Card --}}
        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0">
                    Student Information
                </h5>
            </div>


            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-center">
                    <img
                            src="{{ asset('uploads/' . $student->photo) }}"
                            alt="{{ $student->name }}"
                            class="rounded-circle border mb-3"
                            width="160"
                            height="160"
                            style="object-fit: cover;"
                        >
                </div>

                <form
                    action="{{ route('students.update', $student->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    @include('students._form')


                    <div class="d-flex justify-content-end gap-2">

                        <a
                            href="{{ route('students.index') }}"
                            class="btn btn-dark"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Update Student
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection

