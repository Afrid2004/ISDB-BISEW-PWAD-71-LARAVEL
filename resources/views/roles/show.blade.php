@extends('layouts.backend.app')
@section('content')
    <div>
        <ul>
            <li class="text-dark fw-bold fs-6">Id: {{ $role->id }}</li>
            <li class="text-dark fw-bold fs-6">Name: {{ $role->name }}</li>
            <li class="text-dark fw-bold fs-6">Created: {{ $role->created_at }}</li>
            <li class="text-dark fw-bold fs-6">Updated: {{ $role->updated_at }}</li>
        </ul>
    </div>
@endsection
