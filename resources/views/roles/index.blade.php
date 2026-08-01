<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Roles</title>
</head>

<body>

    <div>
        <div>
            <h1>All Roles</h1>
            <a href="{{ route('roles.create') }}">Create New</a>
        </div>

        <div>
            @if (session('success'))
                <span> {{ session('success') }}</span>
            @endif
            <table border="1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <th>{{ $role->id }}</th>
                            <th>{{ $role->name }}</th>
                            <th>{{ $role->created_at }}</th>
                            <th>
                                <div>
                                    <div>
                                        <a href="{{ route('roles.show', $role->id) }}">
                                            <button>Show</button>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('roles.edit', $role->id) }}">
                                            <button>Edit</button>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
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

</body>

</html>
