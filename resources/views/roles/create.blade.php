@extends('layouts.backend.app')
@section('content')
    <div>
        <h1>Create Page</h1>

        <div>
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">Role Name</label>
                    <input class="form-control bg-white text-black fs-5" type="text" name="name">
                </div>
                <button class="btn btn-primary" type="submit" name="btn_submit">Create Role</button>
            </form>
        </div>
    @endsection
