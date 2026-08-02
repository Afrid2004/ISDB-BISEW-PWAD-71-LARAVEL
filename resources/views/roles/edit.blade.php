@extends('layouts.backend.app')
@section('content')
    <div>
        <h1>Edit page</h1>

        <div>
            <form action="{{ route('roles.update', $role->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="name">Role Name</label>
                    <input class="form-control bg-white text-black fs-5" value="{{ $role->name }}" type="text" name="name">
                </div>
                <button class="btn btn-primary" type="submit" name="btn_submit">Update Role</button>
            </form>
        </div>
    @endsection
