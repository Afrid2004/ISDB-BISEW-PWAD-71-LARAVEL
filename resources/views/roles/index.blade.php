@extends('layouts.backend.app')
@section('content')
    <div>
        @if (session('success'))
                <div class="alert alert-success text-success fw-bold"> {{ session('success') }}</div>
            @endif
        <div class="d-flex align-items-center justify-content-between gap-2">
            <h1>All Roles</h1>
            <a class="btn btn-success" href="{{ route('roles.create') }}">Create New</a>
        </div>

        <div>
            <div class="table-responsive">
                <table class="table table-white table-striped boreder">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <th>{{ $role->name }}</th>
                                <th>{{ $role->created_at }}</th>
                                <th>
                                    <div class="btn-group">
                                        <div>
                                            <a href="{{ route('roles.show', $role->id) }}">
                                                <button class="btn btn-dark">Show</button>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('roles.edit', $role->id) }}">
                                                <button class="btn btn-success">Edit</button>
                                            </a>
                                        </div>
                                        <div>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit"
                                                    onclick="confirm('Do you want to delete this role?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
