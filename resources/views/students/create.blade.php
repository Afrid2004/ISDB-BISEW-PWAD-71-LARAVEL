@extends('layouts.backend.app')

@section('content')
    <div>

        <h2>Create Page</h2>
        @if ($errors->any())
            <div>
                <ul class="mb-2">
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('students._form')

            <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-dark">
                    Cancel
                </button>

                <button class="btn btn-primary">
                    Save Student
                </button>
            </div>
        </form>
    </div>
@endsection
