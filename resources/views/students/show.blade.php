@extends('layouts.backend.app')

@section('title', "Student Details")

@section('content')

    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success mb-3 text-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-1">Student Details</h3>
                <p class="text-muted mb-0">View student information</p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('students.index') }}" class="btn btn-dark">
                    Back
                </a>

                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">
                    Edit Student
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <div class="row align-items-center">

                    <div class="col-md-4 text-center border-end">

                        <img src="{{ asset('uploads/' . $student->photo) }}" alt="{{ $student->name }}"
                            class="rounded-circle border mb-3" width="160" height="160" style="object-fit: cover;">

                        <h4 class="mb-1">
                            {{ $student->name }}
                        </h4>

                        @if ($student->status == 1)
                            <span class="badge bg-success">
                                Active
                            </span>
                        @else
                            <span class="badge bg-danger">
                                Inactive
                            </span>
                        @endif

                    </div>


                    {{-- Student Information --}}
                    <div class="col-md-8 ps-md-5 mt-4 mt-md-0">

                        <h5 class="mb-4">
                            Personal Information
                        </h5>

                        <div class="row">

                            {{-- Student ID --}}
                            <div class="col-md-6 mb-4">
                                <small class="text-muted d-block">
                                    Student ID
                                </small>

                                <strong class="text-dark">
                                    #{{ $student->id }}
                                </strong>
                            </div>


                            {{-- Name --}}
                            <div class="col-md-6 mb-4">
                                <small class="text-muted d-block">
                                    Full Name
                                </small>

                                <strong class="text-dark">
                                    {{ $student->name }}
                                </strong>
                            </div>


                            {{-- Email --}}
                            <div class="col-md-6 mb-4">
                                <small class="text-muted d-block">
                                    Email Address
                                </small>

                                <strong class="text-dark">
                                    {{ $student->email }}
                                </strong>
                            </div>


                            {{-- Phone --}}
                            <div class="col-md-6 mb-4">
                                <small class="text-muted d-block">
                                    Phone Number
                                </small>

                                <strong class="text-dark">
                                    {{ $student->phone }}
                                </strong>
                            </div>


                            {{-- Batch --}}
                            <div class="col-md-6 mb-4">
                                <small class="text-muted d-block">
                                    Batch
                                </small>

                                <strong class="text-dark">
                                    {{ $student->batch }}
                                </strong>
                            </div>


                            {{-- Status --}}
                            <div class="col-md-6 mb-4">
                                <small class="text-muted d-block">
                                    Status
                                </small>

                                @if ($student->status == 1)
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>
                                @endif
                            </div>


                            {{-- Created At --}}
                            <div class="col-md-6">
                                <small class="text-muted d-block">
                                    Created At
                                </small>

                                <strong class="text-dark">
                                    {{ $student->created_at->format('d M Y, h:i A') }}
                                </strong>
                            </div>


                            {{-- Updated At --}}
                            <div class="col-md-6">
                                <small class="text-muted d-block">
                                    Last Updated
                                </small>

                                <strong class="text-dark">
                                    {{ $student->updated_at->format('d M Y, h:i A') }}
                                </strong>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
