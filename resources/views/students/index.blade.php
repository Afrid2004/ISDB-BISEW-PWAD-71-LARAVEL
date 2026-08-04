@extends('layouts.backend.app');

@section('content')
    <h1>All Students</h1>
    <div>
        <form action="{{ route('students.index') }}" method="GET">
            <div class="input-group">
                <input type="text" value="{{ old('search', $search) }}" name="search" class="form-control bg-white"
                    placeholder="Search student id, name, email, batch...">
                <button class="btn btn-primary" type="button">Search</button>
                @if (request("search"))
                    <a href="{{ route('students.index') }}" class="btn btn-dark" type="button">Clear</a>
                @endif
            </div>

        </form>
    </div>
    <div class="table-responsive">
        <table class="table border table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $key => $student)
                    <tr>
                        <td scope="row" class="text-dark">{{ $students->firstItem() + $loop->index }}</td>
                        <td scope="row" class="text-dark">{{ $student->name }}</td>
                        <td scope="row" class="text-dark">{{ $student->email }}</td>
                        <td scope="row" class="text-dark">{{ $student->batch }}</td>
                        <td scope="row">
                            <img src={{ $student->photo }} width="50" height="50" alt={{ $student->name }}>
                        </td>
                        <td scope="row">
                            <div class="btn-group">
                                <a href="" class="btn btn-success">Show</a>
                                <a href="" class="btn btn-dark">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                        <td scope="row" class="text-dark">{{ $student->status ? 'Active' : 'Inactive' }}</td>
                        <td scope="row" class="text-dark">{{ $student->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $students->links() }}
        </div>
    </div>
@endsection
